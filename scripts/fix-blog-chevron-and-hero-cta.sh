#!/usr/bin/env bash
# Blog nav chevron (Blog is last item) + hero ACF CTA button.
# Run on server:
#   curl -fsSL "https://gist.githubusercontent.com/bernardhanna/REPLACE/raw/fix-blog-chevron-and-hero-cta.sh" | bash

set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
THEME="${THEME:-$WP_ROOT/wp-content/themes/eucodewe-1389}"
SHARE_URL="https://forms.office.com/Pages/ResponsePage.aspx?id=18F13DIal06vkB3AGRHqbCnyIKB_vXdLsUgagfjd7DRUN1dZTVYxSkJNQ1VWSlVZNlpBOFAyN0g4UC4u&embed=true"
SHARE_TEXT="Share your stories"

[[ -d "$THEME" ]] || { echo "Theme not found: $THEME"; exit 1; }
command -v wp >/dev/null 2>&1 || { echo "wp-cli required"; exit 1; }

cd "$THEME"
chmod u+w new.css front-page.php 2>/dev/null || true

# --- 1) Blog dropdown chevron (last nav item overrides :last-child { display:none }) ---
python3 <<'PY'
from pathlib import Path

css = Path("new.css")
text = css.read_text()
marker = "/* Blog nav: restore dropdown chevron (last menu item) */"
block = """
/* Blog nav: restore dropdown chevron (last menu item) */
.header__menu nav > ul > li#menu-item-5643.menu-item-has-children > a:after,
#menu-item-5643.menu-item-has-children > a:after {
    content: "";
    width: 10px;
    height: 10px;
    background: url(https://codeweek.eu/blog/wp-content/uploads/2025/01/Vector-6.svg);
    display: block;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    transition: 0.3s;
}
.header__menu nav > ul > li#menu-item-5643.menu-item-has-children > a:hover:after,
#menu-item-5643.menu-item-has-children > a:hover:after {
    transform: scale(-1);
}
"""
if marker in text:
    print("Blog chevron CSS already present")
else:
    css.write_text(text.rstrip() + "\n" + block)
    print("Added Blog nav chevron CSS")
PY

# --- 2) front-page.php: render hero ACF cta_button ---
cp -a front-page.php "front-page.php.bak.$(date +%Y%m%d%H%M%S)" 2>/dev/null || true

python3 <<'PY'
import re
from pathlib import Path

path = Path("front-page.php")
content = path.read_text()

snippet = """
            <?php
            $hero_cta = $hero['cta_button'] ?? (get_field('hero_section')['cta_button'] ?? null);
            if (! empty($hero_cta) && ! empty($hero_cta['url'])) :
                $cta_target = ! empty($hero_cta['target']) ? $hero_cta['target'] : '_blank';
                $cta_title = ! empty($hero_cta['title']) ? $hero_cta['title'] : 'Share your stories';
            ?>
                <a href="<?php echo esc_url($hero_cta['url']); ?>" class="hero-button" target="<?php echo esc_attr($cta_target); ?>" rel="noopener noreferrer"><?php echo esc_html($cta_title); ?></a>
            <?php endif; ?>"""

content = re.sub(
    r"\s*<\?php if \(! empty\(\$hero\['cta_button'\]\)\).*?<\?php endif; \?>",
    "",
    content,
    flags=re.S,
)
content = re.sub(
    r"\s*<\?php\s+\$hero_cta = \$hero\['cta_button'\].*?<\?php endif; \?>",
    "",
    content,
    flags=re.S,
)

match = re.search(r'(<p[^>]*class="hero-description"[^>]*>.*?</p>)', content, re.S)
if not match:
    raise SystemExit("Could not find hero-description in front-page.php")

if 'class="hero-button"' not in content[match.start():match.end() + 800]:
    content = content[: match.end()] + snippet + content[match.end() :]
    path.write_text(content)
    print("Inserted hero CTA block after hero-description")
else:
    print("Hero CTA block already present after hero-description")
PY

echo "--- front-page.php hero lines ---"
grep -n "hero-description\|hero-button\|hero_cta\|cta_button" front-page.php | head -15

# --- 3) ACF data for hero button ---
cd "$WP_ROOT"
wp eval --allow-root "
  \$hero = get_field('hero_section', 2) ?: [];
  \$hero['cta_button'] = [
    'title' => '${SHARE_TEXT}',
    'url' => '${SHARE_URL}',
    'target' => '_blank',
  ];
  update_field('hero_section', \$hero, 2);
  echo 'hero_section.cta_button saved on page 2' . PHP_EOL;
" 2>/dev/null | tail -1

wp cache flush --allow-root 2>/dev/null || true

for svc in php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm php7.4-fpm; do
  if systemctl is-active --quiet "$svc" 2>/dev/null; then
    systemctl reload "$svc" 2>/dev/null && echo "Reloaded $svc" && break
  fi
done

echo "Done. Hard-refresh https://codeweek.eu/blog/"
