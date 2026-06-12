#!/usr/bin/env bash
# Force hero CTA to render on blog homepage.
# Run: bash fix-blog-hero-cta-render.sh

set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
THEME="${THEME:-$WP_ROOT/wp-content/themes/eucodewe-1389}"
SHARE_URL="https://forms.office.com/Pages/ResponsePage.aspx?id=18F13DIal06vkB3AGRHqbCnyIKB_vXdLsUgagfjd7DRUN1dZTVYxSkJNQ1VWSlVZNlpBOFAyN0g4UC4u&embed=true"
SHARE_TEXT="Share your stories"

cd "$THEME"
chmod u+w front-page.php 2>/dev/null || true
cp -a front-page.php "front-page.php.bak.$(date +%Y%m%d%H%M%S)"

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

# Remove any prior cta_button block we may have inserted
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
    raise SystemExit("Could not find hero-description paragraph in front-page.php")

if 'class="hero-button"' in content[match.start():match.end() + 500]:
    print("Hero button markup already follows hero-description")
else:
    content = content[: match.end()] + snippet + content[match.end() :]
    path.write_text(content)
    print("Inserted hero CTA render block after hero-description")
PY

echo "--- front-page.php (hero area) ---"
grep -n "hero-description\|hero-button\|cta_button\|hero_cta" front-page.php | head -20

cd "$WP_ROOT"
wp eval --allow-root "
  \$hero = get_field('hero_section', 2) ?: [];
  if (empty(\$hero['cta_button']['url'])) {
    \$hero['cta_button'] = [
      'title' => '${SHARE_TEXT}',
      'url' => '${SHARE_URL}',
      'target' => '_blank',
    ];
    update_field('hero_section', \$hero, 2);
    echo \"Set hero_section.cta_button on page 2\n\";
  } else {
    echo \"cta_button already set: \" . \$hero['cta_button']['url'] . \"\n\";
  }
" 2>/dev/null | tail -3

wp cache flush --allow-root 2>/dev/null || true

# Clear PHP opcache if FPM is available
for svc in php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm php7.4-fpm; do
  if systemctl is-active --quiet "$svc" 2>/dev/null; then
    systemctl reload "$svc" 2>/dev/null && echo "Reloaded $svc" && break
  fi
done

echo "Done. Hard-refresh https://codeweek.eu/blog/ and check for class=\"hero-button\""
