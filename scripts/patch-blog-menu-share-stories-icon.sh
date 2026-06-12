#!/usr/bin/env bash
# Fix "Share your stories" Blog submenu: arrow icon + Office form URL.
# Run on server: WP_ROOT=/var/www/html/blog bash patch-blog-menu-share-stories-icon.sh

set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
SHARE_TEXT="Share your stories"
SHARE_URL="https://forms.office.com/Pages/ResponsePage.aspx?id=18F13DIal06vkB3AGRHqbCnyIKB_vXdLsUgagfjd7DRUN1dZTVYxSkJNQ1VWSlVZNlpBOFAyN0g4UC4u&embed=true"
ARROW_HTML='<img src="https://codeweek.eu/blog/wp-content/uploads/2025/02/arrow.png" alt="arrow right" />'

[[ -d "$WP_ROOT" ]] || { echo "WP_ROOT not found: $WP_ROOT"; exit 1; }
command -v wp >/dev/null 2>&1 || { echo "wp-cli required"; exit 1; }

cd "$WP_ROOT"

SHARE_ID=""
for menu in primary header main "Menu 1" 2; do
  SHARE_ID=$(wp menu item list "$menu" --fields=db_id,title --format=csv --allow-root 2>/dev/null \
    | awk -F, -v t="$SHARE_TEXT" '$2 ~ t {print $1; exit}') || true
  [[ -n "${SHARE_ID:-}" ]] && break
done

if [[ -z "${SHARE_ID:-}" ]]; then
  echo "Menu item '$SHARE_TEXT' not found"
  exit 1
fi

echo "Patching menu item ID $SHARE_ID"

# Copy arrow icon meta from an existing submenu item that already shows the arrow
REF_ID=$(wp menu item list 2 --fields=db_id,title --format=csv --allow-root 2>/dev/null \
  | awk -F, '$2 ~ /^Activities$/ {print $1; exit}') || true
REF_ID="${REF_ID:-5845}"

wp eval --allow-root "
\$ref = (int) ${REF_ID};
\$target = (int) ${SHARE_ID};
\$meta = get_post_meta(\$ref, 'rt-wp-menu-custom-fields', true);
if (empty(\$meta) || ! is_array(\$meta)) {
  \$meta = [
    'selected-feature' => 'html',
    'html' => [
      'custom-html' => '${ARROW_HTML}',
    ],
  ];
}
update_post_meta(\$target, '_menu_item_url', '${SHARE_URL}');
update_post_meta(\$target, 'rt-wp-menu-custom-fields', \$meta);
delete_transient('rt-wp-menu-custom-fields-' . \$target);
echo \"Menu item \$target: URL + arrow icon meta applied (copied from \$ref)\n\";
"

wp cache flush --allow-root 2>/dev/null || true
echo "Done. Hard-refresh https://codeweek.eu/blog/ and open Blog dropdown."
