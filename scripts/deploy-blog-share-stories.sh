#!/usr/bin/env bash
# Run on the WordPress blog server (SSH as root):
#   bash scripts/deploy-blog-share-stories.sh
#
# Adds hero CTA ACF fields, enlarges the blog hero, and adds "Share your stories"
# to the Blog menu dropdown.

set -euo pipefail

THEME="/var/www/html/wp-content/themes/eucodewe-1389"
WP_ROOT="/var/www/html"
SHARE_URL="https://forms.office.com/Pages/ResponsePage.aspx?id=18F13DIal06vkB3AGRHqbCnyIKB_vXdLsUgagfjd7DRUN1dZTVYxSkJNQ1VWSlVZNlpBOFAyN0g4UC4u&embed=true"
SHARE_TEXT="Share your stories"
HERO_DESCRIPTION="Have a story, activity, or inspiring EU Code Week experience to share? We'd love to hear from you! Submit your experiences, highlights, and initiatives through the form and help us showcase the amazing work happening across the EU Code Week community."

if [[ ! -d "$THEME" ]]; then
  echo "Theme not found at $THEME"
  exit 1
fi

cd "$THEME"
cp new.css "new.css.bak.$(date +%Y%m%d%H%M%S)"
[[ -f front-page.php ]] && cp front-page.php "front-page.php.bak.$(date +%Y%m%d%H%M%S)"

# --- 1) Enlarge hero so description + CTA fit ---
python3 <<'PY'
from pathlib import Path

css = Path("new.css")
text = css.read_text()

text = text.replace(
    ".hero-section {\n    display: flex;\n    align-items: center;\n    justify-content: flex-start;\n    background: linear-gradient(332deg, #F95C22 30.37%, #FF885C 72.96%), #F95C22;\n    background-position: center;\n    padding: 0rem 0;\n    position: relative;\n    overflow: hidden;\n    height: 250px;\n}",
    ".hero-section {\n    display: flex;\n    align-items: center;\n    justify-content: flex-start;\n    background: linear-gradient(332deg, #F95C22 30.37%, #FF885C 72.96%), #F95C22;\n    background-position: center;\n    padding: 2rem 0;\n    position: relative;\n    overflow: hidden;\n    min-height: 420px;\n    height: auto;\n}",
    1,
)

text = text.replace("\t.hero-section {\n\t\tz-index: -2;\n\t\theight: 330px;\n\t}", "\t.hero-section {\n\t\tz-index: -2;\n\t\tmin-height: 400px;\n\t\theight: auto;\n\t}", 1)

if ".hero-button {" in text and "margin-top:" not in text.split(".hero-button {", 1)[1].split("}", 1)[0]:
    text = text.replace(
        ".hero-button {\n    background-color: #F95C22;",
        ".hero-button {\n    display: inline-block;\n    margin-top: 1.5rem;\n    background-color: #F95C22;",
        1,
    )

css.write_text(text)
print("Updated new.css hero sizing")
PY

# --- 2) ACF fields for hero CTA (editable in WP admin) ---
mkdir -p inc
cat > inc/acf-blog-hero-cta.php <<'PHP'
<?php

if (! function_exists('acf_add_local_field_group')) {
    return;
}

acf_add_local_field_group([
    'key' => 'group_codeweek_blog_hero_cta',
    'title' => 'Blog homepage hero',
    'fields' => [
        [
            'key' => 'field_blog_hero_title',
            'label' => 'Hero title',
            'name' => 'hero_title',
            'type' => 'text',
            'instructions' => 'Use HTML for highlighted words, e.g. Talk <span>code</span> to me',
        ],
        [
            'key' => 'field_blog_hero_description',
            'label' => 'Hero description',
            'name' => 'hero_description',
            'type' => 'textarea',
            'rows' => 4,
            'new_lines' => '',
        ],
        [
            'key' => 'field_blog_hero_cta_text',
            'label' => 'Hero CTA text',
            'name' => 'hero_cta_text',
            'type' => 'text',
            'default_value' => 'Share your stories',
        ],
        [
            'key' => 'field_blog_hero_cta_link',
            'label' => 'Hero CTA link',
            'name' => 'hero_cta_link',
            'type' => 'url',
            'default_value' => 'https://forms.office.com/Pages/ResponsePage.aspx?id=18F13DIal06vkB3AGRHqbCnyIKB_vXdLsUgagfjd7DRUN1dZTVYxSkJNQ1VWSlVZNlpBOFAyN0g4UC4u&embed=true',
        ],
        [
            'key' => 'field_blog_hero_image',
            'label' => 'Hero image',
            'name' => 'hero_image',
            'type' => 'image',
            'return_format' => 'url',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ],
        ],
    ],
    'position' => 'acf_after_title',
    'style' => 'default',
    'active' => true,
]);
PHP

if ! grep -q "acf-blog-hero-cta.php" functions.php; then
  printf "\n// Blog homepage hero CTA fields\nrequire_once get_template_directory() . '/inc/acf-blog-hero-cta.php';\n" >> functions.php
  echo "Registered ACF field group in functions.php"
fi

# --- 3) front-page.php: CTA button after hero description ---
if [[ -f front-page.php ]] && ! grep -q "hero_cta_text" front-page.php; then
  python3 <<'PY'
import re
from pathlib import Path

path = Path("front-page.php")
content = path.read_text()
snippet = """
            <?php if ($hero_cta_text = get_field('hero_cta_text')) : ?>
                <a href="<?php echo esc_url(get_field('hero_cta_link') ?: '#'); ?>" class="hero-button" target="_blank" rel="noopener noreferrer"><?php echo esc_html($hero_cta_text); ?></a>
            <?php endif; ?>"""

if "hero_cta_text" in content:
    print("front-page.php already has hero CTA")
else:
    match = re.search(r'(<p[^>]*class="hero-description"[^>]*>.*?</p>)', content, re.S)
    if not match:
        raise SystemExit("Could not find hero-description paragraph in front-page.php")
    insert_at = match.end()
    content = content[:insert_at] + snippet + content[insert_at:]
    path.write_text(content)
    print("Inserted hero CTA into front-page.php")
PY
fi

# --- 4) Default field values on homepage (page ID 2) ---
if command -v wp >/dev/null 2>&1; then
  cd "$WP_ROOT"
  wp option update blogdescription "Inspiring Digital Creativity – One Line of Code at a Time!" >/dev/null 2>&1 || true

  wp post meta update 2 hero_cta_text "$SHARE_TEXT" 2>/dev/null || wp acf update 2 hero_cta_text "$SHARE_TEXT" 2>/dev/null || true
  wp post meta update 2 hero_cta_link "$SHARE_URL" 2>/dev/null || wp acf update 2 hero_cta_link "$SHARE_URL" 2>/dev/null || true
  wp post meta update 2 hero_description "$HERO_DESCRIPTION" 2>/dev/null || wp acf update 2 hero_description "$HERO_DESCRIPTION" 2>/dev/null || true

  # Blog menu: add "Share your stories" under Blog (menu item 5643)
  if ! wp menu item list primary --fields=db_id,title,url 2>/dev/null | grep -q "Share your stories"; then
    BLOG_PARENT=$(wp menu item list primary --fields=db_id,title --format=csv 2>/dev/null | awk -F, '$2 ~ /Blog/ {print $1; exit}')
    if [[ -n "${BLOG_PARENT:-}" ]]; then
      wp menu item add-custom primary "$SHARE_TEXT" "$SHARE_URL" --parent-id="$BLOG_PARENT" 2>/dev/null \
        || wp menu item add-custom header "$SHARE_TEXT" "$SHARE_URL" --parent-id="$BLOG_PARENT" 2>/dev/null \
        || wp menu item add-custom main "$SHARE_TEXT" "$SHARE_URL" --parent-id="$BLOG_PARENT" 2>/dev/null \
        || echo "Could not auto-add menu item — add '$SHARE_TEXT' under Blog in Appearance → Menus"
    else
      echo "Could not find Blog menu item — add '$SHARE_TEXT' under Blog in Appearance → Menus"
    fi
  fi

  wp cache flush >/dev/null 2>&1 || true
  echo "WP-CLI updates applied"
else
  echo "wp-cli not found — set hero_cta_text / hero_cta_link on the homepage in WP admin"
fi

echo "Done. Verify: https://codeweek.eu/blog/"
