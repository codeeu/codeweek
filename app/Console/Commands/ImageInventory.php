<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

/**
 * Stock-image traceability: one sheet per public page (Laravel routes + WP blog posts),
 * listing every <img> found on that page.
 *
 * php artisan images:inventory
 */
class ImageInventory extends Command
{
    protected $signature = 'images:inventory
        {--base=https://codeweek.eu : Site root to crawl}
        {--blog= : Blog root (default config codeweek.blog_url)}
        {--out= : Output xlsx path (default storage/app/image-inventory-<date>.xlsx)}
        {--max-pages=0 : Limit Laravel pages (0 = all)}
        {--blog-limit=0 : Limit blog posts (0 = all)}
        {--no-blog : Skip blog posts}
        {--only= : Comma separated paths to crawl instead of route discovery}
        {--csv-dir= : Also write one CSV per page into this directory}';

    protected $description = 'Build an Excel workbook: one sheet per public page, listing all images on that page';

    /** URI prefixes that are not public content pages */
    protected $skipPrefixes = [
        'admin', 'nova', 'api', 'login', 'logout', 'register', 'password', 'oauth',
        'sitemap', 'search', 'certificates', 'certificate', 'verify', 'setlocale',
        'lang', 'storage', 'cron', 'queue', 'blog', 'activities', 'activity',
        'events', 'event', 'tutorials', 'ambassador-', 'preview', 'test', 'email',
        'unsubscribe', 'img/', 'images/',
    ];

    /** Response bodies kept from discovery so pages are fetched only once */
    protected array $bodyCache = [];

    public function handle()
    {
        $base = rtrim($this->option('base'), '/');
        $blog = rtrim($this->option('blog') ?: config('codeweek.blog_url', 'https://codeweek.eu/blog'), '/');
        $out = $this->option('out') ?: storage_path('app/image-inventory-'.date('Ymd-Hi').'.xlsx');

        $paths = $this->discoverPaths();
        if ($this->option('only')) {
            $paths = array_values(array_filter(array_map(function ($p) {
                $p = trim($p);
                return Str::startsWith($p, 'http') ? parse_url($p, PHP_URL_PATH) : $p;
            }, explode(',', $this->option('only')))));
        }
        $max = (int) $this->option('max-pages');
        if ($max > 0) {
            $paths = array_slice($paths, 0, $max);
        }

        $this->info(count($paths).' page(s) discovered; crawling '.$base);

        $pages = [];   // [['title'=>, 'url'=>, 'images'=>[]]]
        $failed = [];
        foreach ($paths as $path) {
            $url = $base.'/'.ltrim($path, '/');
            $body = $this->fetch($url);
            if ($body === null) {
                $failed[] = [$url, 'HTTP error'];
                continue;
            }
            $images = $this->extractImages($body, $base);
            $pages[] = ['title' => $path, 'url' => $url, 'images' => $images];
            $this->line('  '.$path.' -> '.count($images).' images');
        }

        if (! $this->option('no-blog')) {
            $blogPages = $this->crawlBlog($blog, (int) $this->option('blog-limit'), $failed);
            $pages = array_merge($pages, $blogPages);
            $this->info(count($blogPages).' blog post(s) crawled');
        }

        // How many pages each image appears on (flags shared header/footer/social chrome).
        $freq = [];
        foreach ($pages as $page) {
            foreach ($page['images'] as $img) {
                $freq[$img['src']] = ($freq[$img['src']] ?? 0) + 1;
            }
        }

        if ($dir = $this->option('csv-dir')) {
            @mkdir($dir, 0775, true);
            $used = [];
            foreach ($pages as $page) {
                $fh = fopen($dir.'/'.$this->sheetName($page['title'], $used).'.csv', 'w');
                fputcsv($fh, ['#', 'Image URL', 'File name', 'Alt text', 'Width', 'Height', 'Class', 'Seen on pages']);
                foreach ($page['images'] as $i => $img) {
                    fputcsv($fh, [$i + 1, $img['src'], basename(parse_url($img['src'], PHP_URL_PATH) ?: ''), $img['alt'], $img['w'], $img['h'], $img['class'], $freq[$img['src']] ?? 1]);
                }
                fclose($fh);
            }
            $this->info('CSV per page: '.$dir);
        }

        $this->writeWorkbook($pages, $freq, $failed, $out);
        $this->info('Workbook: '.$out.' ('.count($pages).' sheets, '.(count($pages) ? array_sum(array_map(fn ($p) => count($p['images']), $pages)) : 0).' image rows)');

        return 0;
    }

    protected function discoverPaths(): array
    {
        $paths = ['/'];
        try {
            $routes = Route::getRoutes();
        } catch (\Throwable $e) {
            $this->warn('Route discovery unavailable ('.$e->getMessage().'); crawling live links instead');
            return $this->discoverLinks();
        }
        foreach ($routes as $route) {
            if (! in_array('GET', $route->methods())) {
                continue;
            }
            if ($route->getDomain()) {
                continue;
            }
            $uri = ltrim($route->uri(), '/');
            if ($uri === '' || str_contains($uri, '{') || str_contains($uri, '.')) {
                continue;
            }
            foreach ($this->skipPrefixes as $skip) {
                if (Str::startsWith($uri, $skip)) {
                    continue 2;
                }
            }
            $paths['/'.$uri] = true;
        }

        return array_values(array_unique($paths));
    }

    /** Fallback page discovery: breadth-first crawl of same-host links from the site root. */
    protected function discoverLinks(): array
    {
        $base = rtrim($this->option('base'), '/');
        $host = parse_url($base, PHP_URL_HOST);
        $limit = (int) $this->option('max-pages') ?: 500;
        $paths = ['/'];
        $seen = ['/' => true];
        $queue = ['/'];
        while ($queue && count($paths) < $limit) {
            $path = array_shift($queue);
            $html = $this->fetch($base.$path);
            if ($html === null || ! preg_match_all('/href\s*=\s*[\"\']([^\"\']+)[\"\']/i', $html, $m)) {
                continue;
            }
            foreach ($m[1] as $href) {
                $parts = parse_url(html_entity_decode($href));
                if ($parts === false) {
                    continue;
                }
                if (isset($parts['host']) && $parts['host'] !== $host) {
                    continue;
                }
                $clean = rtrim($parts['path'] ?? '', '/');
                $rel = ltrim($clean, '/');
                if ($rel === '' || isset($seen['/'.$rel])) {
                    continue;
                }
                foreach ($this->skipPrefixes as $skip) {
                    if (Str::startsWith($rel, $skip)) {
                        continue 2;
                    }
                }
                $seen['/'.$rel] = true;
                $paths[] = '/'.$rel;
                $queue[] = '/'.$rel;
                if (count($paths) >= $limit) {
                    break;
                }
            }
        }
        $this->info(count($paths).' link(s) discovered by crawling');

        return $paths;
    }

    protected function fetch(string $url): ?string
    {
        if (isset($this->bodyCache[$url])) {
            return $this->bodyCache[$url];
        }
        try {
            $res = Http::timeout(30)->withHeaders(['User-Agent' => 'CodeWeekImageInventory/1.0'])->get($url);
        } catch (\Throwable $e) {
            return null;
        }

        return $res->successful() ? $this->bodyCache[$url] = $res->body() : null;
    }

    protected function extractImages(string $html, string $base): array
    {
        $images = [];
        if (! preg_match_all('/<img\b[^>]*>/i', $html, $matches)) {
            return [];
        }
        foreach ($matches[0] as $tag) {
            if (! preg_match('/\bsrc\s*=\s*["\']([^"\']+)["\']/i', $tag, $m)) {
                continue;
            }
            $src = html_entity_decode(trim($m[1]));
            if ($src === '' || Str::startsWith($src, 'data:')) {
                continue; // inline placeholder / lazy-load stub
            }
            $width = preg_match('/\bwidth\s*=\s*["\']?(\d+)/i', $tag, $w) ? $w[1] : '';
            $height = preg_match('/\bheight\s*=\s*["\']?(\d+)/i', $tag, $h) ? $h[1] : '';
            if ($width === '1' && $height === '1') {
                continue; // tracking pixel
            }
            $src = $this->absolute($src, $base);
            if (isset($images[$src])) {
                continue;
            }
            $images[$src] = [
                'src' => $src,
                'alt' => preg_match('/\balt\s*=\s*["\']([^"\']*)["\']/i', $tag, $a) ? html_entity_decode($a[1]) : '',
                'class' => preg_match('/\bclass\s*=\s*["\']([^"\']*)["\']/i', $tag, $c) ? $c[1] : '',
                'w' => $width,
                'h' => $height,
            ];
        }

        return array_values($images);
    }

    protected function absolute(string $src, string $base): string
    {
        if (Str::startsWith($src, '//')) {
            return 'https:'.$src;
        }
        if (Str::startsWith($src, 'http')) {
            return $src;
        }

        return $base.'/'.ltrim($src, '/');
    }

    protected function crawlBlog(string $blog, int $limit, array &$failed): array
    {
        $pages = [];
        $page = 1;
        $perPage = 100;
        do {
            try {
                $res = Http::timeout(60)->get($blog.'/wp-json/wp/v2/posts', [
                    'per_page' => $perPage,
                    'page' => $page,
                    '_fields' => 'id,link,title,date,content',
                ]);
            } catch (\Throwable $e) {
                break;
            }
            if (! $res->successful()) {
                break;
            }
            $posts = $res->json();
            if (! is_array($posts) || ! $posts) {
                break;
            }
            foreach ($posts as $post) {
                $title = html_entity_decode(strip_tags($post['title']['rendered'] ?? ''));
                $pages[] = [
                    'title' => 'blog-'.($title !== '' ? Str::slug($title) : 'post-'.$post['id']),
                    'url' => $post['link'] ?? '',
                    'images' => $this->extractImages($post['content']['rendered'] ?? '', $blog),
                ];
                if ($limit > 0 && count($pages) >= $limit) {
                    return $pages;
                }
            }
            $this->line('  blog page '.$page.' ('.count($posts).' posts)');
            $page++;
        } while (count($posts) === $perPage);

        return $pages;
    }

    protected function writeWorkbook(array $pages, array $freq, array $failed, string $out): void
    {
        @mkdir(dirname($out), 0775, true);

        $book = new Spreadsheet();
        $book->removeSheetByIndex(0);

        $summary = $book->createSheet();
        $summary->setTitle('Summary');
        $summary->fromArray(['Page', 'URL', 'Sheet', 'Images', 'Content images (not global chrome)'], null, 'A1');
        $summary->getStyle('A1:E1')->getFont()->setBold(true);

        $row = 2;
        $used = ['summary' => true];
        $rows = [];
        foreach ($pages as $page) {
            $sheetName = $this->sheetName($page['title'], $used);
            $sheet = $book->createSheet();
            $sheet->setTitle($sheetName);
            $header = ['#', 'Image URL', 'File name', 'Alt text', 'Width', 'Height', 'Class', 'Seen on pages'];
            $data = [$header];
            $i = 1;
            $contentImages = 0;
            foreach ($page['images'] as $img) {
                $seen = $freq[$img['src']] ?? 1;
                if ($seen <= 2) {
                    $contentImages++;
                }
                $data[] = [$i++, $img['src'], basename(parse_url($img['src'], PHP_URL_PATH) ?: ''), $img['alt'], $img['w'], $img['h'], $img['class'], $seen];
            }
            $sheet->fromArray($data, null, 'A1');
            $sheet->getStyle('A1:H1')->getFont()->setBold(true);
            $sheet->getColumnDimension('B')->setWidth(80);
            $sheet->getColumnDimension('D')->setWidth(40);
            $sheet->freezePane('A2');

            $summary->fromArray([$page['title'], $page['url'], $sheetName, count($page['images']), $contentImages], null, 'A'.$row++);
            $rows[$sheetName] = count($page['images']);
        }

        if ($failed) {
            $fail = $book->createSheet();
            $fail->setTitle('Fetch failures');
            $fail->fromArray(array_merge([['URL', 'Error']], $failed));
        }

        $summary->getColumnDimension('A')->setWidth(60);
        $summary->getColumnDimension('B')->setWidth(70);
        $summary->getColumnDimension('C')->setWidth(34);
        $summary->freezePane('A2');

        (new XlsxWriter($book))->save($out);
        $book->disconnectWorksheets();
    }

    protected function sheetName(string $raw, array &$used): string
    {
        $name = str_replace(['[', ']', '*', '?', '/', '\\', ':', "'"], '-', $raw);
        $name = trim($name, ' -');
        $name = $name === '' ? 'page' : $name;
        $name = mb_substr($name, 0, 31);
        $base = $name;
        $n = 2;
        while (isset($used[mb_strtolower($name)])) {
            $suffix = '-'.$n++;
            $name = mb_substr($base, 0, 31 - mb_strlen($suffix)).$suffix;
        }
        $used[mb_strtolower($name)] = true;

        return $name;
    }
}
