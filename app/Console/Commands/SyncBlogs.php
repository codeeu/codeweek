<?php

namespace App\Console\Commands;

use App\Blog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SyncBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch blogs from an API and store them in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = config('codeweek.blog_url') . '/wp-json/wp/v2/posts';
        $perPage = 10;
        $page = 1;

        try {
            do {
                $response = Http::get("{$url}?per_page={$perPage}&page={$page}");

                if (!$response->successful()) {
                    $this->error("Failed to fetch data from API: {$url}?per_page={$perPage}&page={$page}");
                    break;
                }

                $data = $response->json();
                $totalPages = $response->header('X-WP-TotalPages', 1);

                foreach ($data as $item) {
                    Blog::updateOrCreate(
                        ['path' => $item['link']],
                        [
                            'name' => data_get($item, 'title.rendered', ''),
                            'categories' => json_encode($item['categories']),
                            'tags' => json_encode($item['tags']),
                            'description' => strip_tags(data_get($item, 'excerpt.rendered', '')),
                            'content' => data_get($item, 'content.rendered', ''),
                            'thumbnail' => $this->fetchThumbnail(data_get($item, '_links.wp:featuredmedia', [])),
                            'path' => $item['link'],
                            'date' => $item['date'],
                            'modified' => $item['modified'],
                            'status' => $item['status'],
                            'type' => $item['type'],
                            'slug' => $item['slug'],
                        ]
                    );
                }

                $this->info("Page {$page} synchronized.");
                $page++;
            } while ($page <= $totalPages);

            $this->info('Blogs synchronized successfully!');
        } catch (\Exception $e) {
            Log::error("Error syncing blogs: {$e->getMessage()}");
            $this->error("Error: {$e->getMessage()}");
        }
    }

    private function fetchThumbnail($mediaLinks)
    {
        if (!empty($mediaLinks) && isset($mediaLinks[0]['href'])) {
            try {
                $mediaResponse = Http::get($mediaLinks[0]['href']);
                if ($mediaResponse->successful()) {
                    return data_get($mediaResponse->json(), 'source_url', '');
                }
            } catch (\Exception $e) {
                Log::error("Failed to fetch media data: {$e->getMessage()}");
            }
        }

        return null;
    }
}
