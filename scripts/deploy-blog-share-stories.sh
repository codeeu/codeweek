#!/usr/bin/env bash
# Production blog deploy — run on server as root:
#   WP_ROOT=/var/www/html/blog bash deploy-blog-share-stories-inline.sh

set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
THEME="${THEME:-$WP_ROOT/wp-content/themes/eucodewe-1389}"

if [[ ! -d "$THEME" ]]; then
  THEME=$(find /var/www -maxdepth 8 -type d -name 'eucodewe-1389' 2>/dev/null | head -1 || true)
  if [[ -n "${THEME:-}" ]]; then
    WP_ROOT="$(dirname "$(dirname "$(dirname "$THEME")")")"
  fi
fi

SHARE_URL="https://forms.office.com/Pages/ResponsePage.aspx?id=18F13DIal06vkB3AGRHqbCnyIKB_vXdLsUgagfjd7DRUN1dZTVYxSkJNQ1VWSlVZNlpBOFAyN0g4UC4u&embed=true"
SHARE_TEXT="Share your stories"
HERO_DESCRIPTION="Have a story, activity, or inspiring EU Code Week experience to share? We'd love to hear from you! Submit your experiences, highlights, and initiatives through the form and help us showcase the amazing work happening across the EU Code Week community."

[[ -d "$THEME" ]] || { echo "Theme eucodewe-1389 not found under /var/www"; find /var/www -maxdepth 6 -name wp-config.php 2>/dev/null; exit 1; }
echo "Using WP_ROOT=$WP_ROOT"
cd "$THEME"
echo "Using THEME=$THEME"

chmod u+w new.css front-page.php functions.php acf-json/group_5efc9e8719cc2.json 2>/dev/null || true
cp -a new.css "new.css.bak.$(date +%Y%m%d%H%M%S)"
cp -a front-page.php "front-page.php.bak.$(date +%Y%m%d%H%M%S)"

# --- 1) Enlarge hero so description + CTA fit comfortably ---
python3 <<'PY'
from pathlib import Path
import re

css = Path("new.css")
text = css.read_text()

# Desktop hero section
text = re.sub(
    r"(\.hero-section\s*\{[^}]*?)min-height:\s*\d+px;",
    r"\1min-height: 580px;",
    text,
    count=1,
    flags=re.S,
)
text = re.sub(
    r"(\.hero-section\s*\{[^}]*?)height:\s*250px;",
    r"\1min-height: 580px;\n    height: auto;",
    text,
    count=1,
    flags=re.S,
)
text = re.sub(
    r"(\.hero-section\s*\{[^}]*?)padding:\s*[^;]+;",
    r"\1padding: 3rem 0;",
    text,
    count=1,
    flags=re.S,
)

# Hero white card — more room for description + button
text = re.sub(
    r"(\.hero-content\s*\{[^}]*?)padding:\s*2rem;",
    r"\1padding: 2.5rem 3rem 3rem;",
    text,
    count=1,
    flags=re.S,
)

if ".hero-description {" in text and "margin-bottom:" not in text.split(".hero-description {", 1)[1].split("}", 1)[0]:
    text = text.replace(
        ".hero-description {\n    color: var(--Slate-500, #333E48);",
        ".hero-description {\n    margin-bottom: 1.25rem;\n    color: var(--Slate-500, #333E48);",
        1,
    )

# Tablet breakpoint
text = re.sub(
    r"(\t\.hero-section\s*\{[^}]*?)min-height:\s*\d+px;",
    r"\1min-height: 520px;",
    text,
    count=1,
    flags=re.S,
)
text = re.sub(
    r"(\t\.hero-section\s*\{[^}]*?)height:\s*330px;",
    r"\1min-height: 520px;\n\t\theight: auto;",
    text,
    count=1,
    flags=re.S,
)

# Mobile breakpoint — stack layout
text = re.sub(
    r"(\t\.hero-section\s*\{\n        flex-direction: column-reverse;[^}]*?)padding:\s*[^;]+;",
    r"\1padding: 0 0 3rem;\n        min-height: 520px;",
    text,
    count=1,
    flags=re.S,
)

if ".hero-button {" in text and "margin-top:" not in text.split(".hero-button {", 1)[1].split("}", 1)[0]:
    text = text.replace(
        ".hero-button {\n    background-color: #F95C22;",
        ".hero-button {\n    display: inline-block;\n    margin-top: 1.5rem;\n    background-color: #F95C22;",
        1,
    )
elif ".hero-button {" in text:
    text = re.sub(
        r"(\.hero-button\s*\{[^}]*?)margin-top:\s*[^;]+;",
        r"\1margin-top: 1.5rem;",
        text,
        count=1,
        flags=re.S,
    )

css.write_text(text)
print("Updated new.css hero sizing (580px desktop)")
PY

# --- 2) ACF JSON: add cta_button to hero_section ---
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
        "instructions": "",
        "required": 0,
        "conditional_logic": 0,
        "wrapper": {"width": "", "class": "", "id": ""},
        "return_format": "array",
    })
    path.write_text(json.dumps(data, indent=4) + "\n")
    print("Added cta_button to ACF JSON")
    break
else:
    raise SystemExit("hero_section not found in ACF JSON")
PY

# --- 3) front-page.php: render hero CTA (mirror info section button) ---
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
    print("front-page.php already references cta_button")
else:
    match = re.search(r'(<p[^>]*class="hero-description"[^>]*>.*?</p>)', content, re.S)
    if not match:
        raise SystemExit("Could not find hero-description in front-page.php")
    content = content[: match.end()] + snippet + content[match.end() :]
    path.write_text(content)
    print("Patched front-page.php")
PY

# --- 4) WP-CLI: defaults + menu ---
if command -v wp >/dev/null 2>&1; then
  cd "$WP_ROOT"
  wp acf sync --allow-root 2>/dev/null || true

  HERO_DESC_JSON=$(HERO_DESCRIPTION="$HERO_DESCRIPTION" python3 -c 'import json,os; print(json.dumps(os.environ["HERO_DESCRIPTION"]))')
  wp eval --allow-root "
    \$hero = get_field('hero_section', 2) ?: [];
    \$hero['description'] = ${HERO_DESC_JSON};
    \$hero['cta_button'] = ['title' => '$SHARE_TEXT', 'url' => '$SHARE_URL', 'target' => '_blank'];
    update_field('hero_section', \$hero, 2);
  " 2>/dev/null || true

  ARROW_HTML='<img src="https://codeweek.eu/blog/wp-content/uploads/2025/02/arrow.png" alt="arrow right" />'
  SHARE_ID=""
  for menu in primary header main "Menu 1" 2; do
    SHARE_ID=$(wp menu item list "$menu" --fields=db_id,title --format=csv --allow-root 2>/dev/null \
      | awk -F, -v t="$SHARE_TEXT" '$2 ~ t {print $1; exit}') || true
    if [[ -n "${SHARE_ID:-}" ]]; then
      echo "Share your stories already in $menu (ID $SHARE_ID)"
      break
    fi
    BLOG_PARENT=$(wp menu item list "$menu" --fields=db_id,title --format=csv --allow-root 2>/dev/null | awk -F, '$2 ~ /Blog/ {print $1; exit}')
    if [[ -n "${BLOG_PARENT:-}" ]]; then
      SHARE_ID=$(wp menu item add-custom "$menu" "$SHARE_TEXT" "$SHARE_URL" --parent-id="$BLOG_PARENT" --porcelain --allow-root 2>/dev/null || true)
      [[ -n "${SHARE_ID:-}" ]] && echo "Added menu item to $menu (ID $SHARE_ID)" && break
    fi
  done

  if [[ -n "${SHARE_ID:-}" ]]; then
    wp eval --allow-root "
      \$id = (int) ${SHARE_ID};
      update_post_meta(\$id, '_menu_item_url', '${SHARE_URL}');
      update_post_meta(\$id, 'rt-wp-menu-custom-fields', [
        'selected-feature' => 'html',
        'html' => ['custom-html' => '${ARROW_HTML}'],
      ]);
      delete_transient('rt-wp-menu-custom-fields-' . \$id);
      echo \"Menu item \$id: URL + arrow icon meta set\n\";
    " 2>/dev/null || true
  fi

  wp cache flush --allow-root 2>/dev/null || true
  echo "WP-CLI done"
fi

echo "Done. Verify https://codeweek.eu/blog/"
