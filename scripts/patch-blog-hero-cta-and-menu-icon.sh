#!/usr/bin/env bash
# Fix blog hero CTA button + Blog dropdown arrow visibility.
# Run on server: bash patch-blog-hero-cta-and-menu-icon.sh

set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
THEME="${THEME:-$WP_ROOT/wp-content/themes/eucodewe-1389}"
SHARE_URL="https://forms.office.com/Pages/ResponsePage.aspx?id=18F13DIal06vkB3AGRHqbCnyIKB_vXdLsUgagfjd7DRUN1dZTVYxSkJNQ1VWSlVZNlpBOFAyN0g4UC4u&embed=true"
SHARE_TEXT="Share your stories"
HERO_DESCRIPTION="Have a story, activity, or inspiring EU Code Week experience to share? We'd love to hear from you! Submit your experiences, highlights, and initiatives through the form and help us showcase the amazing work happening across the EU Code Week community."

[[ -d "$THEME" ]] || { echo "Theme not found: $THEME"; exit 1; }
command -v wp >/dev/null 2>&1 || { echo "wp-cli required"; exit 1; }

cd "$THEME"
chmod u+w front-page.php new.css acf-json/group_5efc9e8719cc2.json 2>/dev/null || true

# --- 1) front-page.php: render hero CTA after description ---
python3 <<'PY'
import re
from pathlib import Path

path = Path("front-page.php")
content = path.read_text()
snippet = """
            <?php if (! empty($hero['cta_button'])) : $cta = $hero['cta_button']; ?>
                <a href="<?php echo esc_url($cta['url']); ?>" class="hero-button" target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>" rel="noopener noreferrer"><?php echo esc_html($cta['title']); ?></a>
            <?php endif; ?>"""

if "cta_button" in content:
    print("front-page.php already has cta_button")
else:
    match = re.search(r'(<p[^>]*class="hero-description"[^>]*>.*?</p>)', content, re.S)
    if not match:
        raise SystemExit("Could not find hero-description in front-page.php")
    path.write_text(content[: match.end()] + snippet + content[match.end() :])
    print("Patched front-page.php with hero CTA")
PY

# --- 2) ACF JSON: ensure cta_button sub-field exists ---
python3 <<'PY'
import json
from pathlib import Path

path = Path("acf-json/group_5efc9e8719cc2.json")
data = json.loads(path.read_text())
for field in data.get("fields", []):
    if field.get("name") != "hero_section":
        continue
    subs = field.setdefault("sub_fields", [])
    if any(s.get("name") == "cta_button" for s in subs):
        print("ACF JSON already has cta_button")
        break
    subs.append({
        "key": "field_codeweek_hero_cta_button",
        "label": "Button",
        "name": "cta_button",
        "type": "link",
        "return_format": "array",
    })
    path.write_text(json.dumps(data, indent=4) + "\n")
    print("Added cta_button to ACF JSON")
    break
PY

# --- 3) CSS: Blog simple dropdown — flex layout so arrow img is visible ---
python3 <<'PY'
from pathlib import Path

css = Path("new.css")
text = css.read_text()
block = """
/* Blog dropdown: show Share your stories arrow icon */
#menu-item-5643 > .sub-menu > #menu-item-8142 {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
#menu-item-5643 > .sub-menu > #menu-item-8142 .rt-wp-menu-custom-fields-wrapper {
    display: flex;
    align-items: center;
    flex-shrink: 0;
}
#menu-item-5643 > .sub-menu > #menu-item-8142 .rt-wp-menu-custom-fields-custom-html img {
    display: block;
    width: 20px;
    height: auto;
}
"""
marker = "/* Blog dropdown: show Share your stories arrow icon */"
if marker in text:
    print("Menu arrow CSS already present")
else:
    css.write_text(text.rstrip() + "\n" + block)
    print("Added Blog dropdown arrow CSS")
PY

# --- 4) WP-CLI: hero CTA data + menu arrow meta ---
cd "$WP_ROOT"
wp acf sync --allow-root 2>/dev/null || true

HERO_DESC_JSON=$(HERO_DESCRIPTION="$HERO_DESCRIPTION" python3 -c 'import json,os; print(json.dumps(os.environ["HERO_DESCRIPTION"]))')
wp eval --allow-root "
  \$hero = get_field('hero_section', 2) ?: [];
  \$hero['description'] = ${HERO_DESC_JSON};
  \$hero['cta_button'] = [
    'title' => '${SHARE_TEXT}',
    'url' => '${SHARE_URL}',
    'target' => '_blank',
  ];
  update_field('hero_section', \$hero, 2);
  echo 'Hero CTA field saved on page 2\n';
"

SHARE_ID=$(wp menu item list 2 --fields=db_id,title --format=csv --allow-root \
  | awk -F, -v t="$SHARE_TEXT" '$2 ~ t {print $1; exit}')

if [[ -n "${SHARE_ID:-}" ]]; then
  wp eval --allow-root "
    \$ref = 5845;
    \$target = (int) ${SHARE_ID};
    \$meta = get_post_meta(\$ref, 'rt-wp-menu-custom-fields', true);
    if (empty(\$meta)) {
      \$meta = [
        'selected-feature' => 'html',
        'html' => ['custom-html' => '<img src=\"https://codeweek.eu/blog/wp-content/uploads/2025/02/arrow.png\" alt=\"arrow right\" />'],
      ];
    }
    update_post_meta(\$target, '_menu_item_url', '${SHARE_URL}');
    update_post_meta(\$target, 'rt-wp-menu-custom-fields', \$meta);
    delete_transient('rt-wp-menu-custom-fields-' . \$target);
    echo \"Menu item \$target arrow meta applied\n\";
  "
fi

wp cache flush --allow-root 2>/dev/null || true
echo "Done. Hard-refresh https://codeweek.eu/blog/"
