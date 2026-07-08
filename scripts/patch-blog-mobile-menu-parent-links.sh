#!/usr/bin/env bash
# Match main codeweek.eu mobile menu: parent labels navigate, chevron/void links expand submenu.
# Run on blog server: bash patch-blog-mobile-menu-parent-links.sh

set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
COMMUNITY_URL="${COMMUNITY_URL:-https://codeweek.eu/community}"
RESOURCES_URL="${RESOURCES_URL:-https://codeweek.eu/educational-resources}"
BLOG_URL="${BLOG_URL:-https://codeweek.eu/blog/}"

[[ -d "$WP_ROOT" ]] || { echo "WP_ROOT not found: $WP_ROOT"; exit 1; }
command -v wp >/dev/null 2>&1 || { echo "wp-cli required"; exit 1; }

cd "$WP_ROOT"

PATCH_PHP="$(mktemp)"
cat > "$PATCH_PHP" <<'PHP'
<?php
$settings = get_option('auhfc_settings_sitewide');
if (! is_array($settings)) {
    fwrite(STDERR, "ERROR: auhfc_settings_sitewide missing or invalid\n");
    exit(1);
}

$newHandler = <<<'JS'
document.querySelectorAll('nav.menu-menu-1-container .menu-item-has-children > a').forEach(function(menuItem) {
            menuItem.addEventListener('click', function(event) {
                var href = menuItem.getAttribute('href') || '';
                var isVoidHref = !href || href === '#' || href.indexOf('javascript:') === 0;
                var rect = menuItem.getBoundingClientRect();
                var clickedChevron = event.clientX >= rect.right - 36;

                if (!isVoidHref && !clickedChevron) {
                    return;
                }

                event.preventDefault();
                var parentItem = menuItem.parentElement;
                parentItem.classList.toggle('active');

                document.querySelectorAll('nav.menu-menu-1-container .menu-item-has-children').forEach(function(otherItem) {
                    if (otherItem !== parentItem) {
                        otherItem.classList.remove('active');
                    }
                });
            });
        });
JS;

$pattern = '/document\.querySelectorAll\(\x27nav\.menu-menu-1-container \.menu-item-has-children > a\x27\)[\s\S]*?(?:\}\);\s*){1,3}/';

$updated = false;
foreach ($settings as $key => $value) {
    if (! is_string($value) || strpos($value, 'menu-item-has-children') === false) {
        continue;
    }

    $value = preg_replace($pattern, '', $value);
    $value = preg_replace('/\s*\}\);\s*\}\);\s*(<\/script>)/', "\n$1", $value);

    $insertBefore = '</script>';
    $pos = strrpos($value, $insertBefore);
    if ($pos === false) {
        continue;
    }

    $settings[$key] = substr($value, 0, $pos) . "\n" . trim($newHandler) . "\n" . substr($value, $pos);
    $updated = true;
    echo "Patched mobile menu script in auhfc_settings_sitewide[{$key}]\n";
    break;
}

if (! $updated) {
    fwrite(STDERR, "ERROR: could not find mobile menu script in auhfc_settings_sitewide\n");
    exit(1);
}

update_option('auhfc_settings_sitewide', $settings);

$menuPatches = [
    5637 => getenv('COMMUNITY_URL') ?: 'https://codeweek.eu/community',
    29   => getenv('RESOURCES_URL') ?: 'https://codeweek.eu/educational-resources',
    5643 => getenv('BLOG_URL') ?: 'https://codeweek.eu/blog/',
];

foreach ($menuPatches as $id => $url) {
    update_post_meta((int) $id, '_menu_item_url', $url);
    echo "Menu item {$id} -> {$url}\n";
}
PHP

COMMUNITY_URL="$COMMUNITY_URL" RESOURCES_URL="$RESOURCES_URL" BLOG_URL="$BLOG_URL" \
  wp eval-file "$PATCH_PHP" --allow-root
rm -f "$PATCH_PHP"

wp cache flush --allow-root 2>/dev/null || true
for svc in php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm; do
  if systemctl is-active --quiet "$svc" 2>/dev/null; then
    systemctl reload "$svc"
    echo "Reloaded $svc"
    break
  fi
done

echo "Done. Hard-refresh https://codeweek.eu/blog/ on mobile."
