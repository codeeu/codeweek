#!/usr/bin/env bash
# Fix blog mobile menu: hide overlapping promo, scope JS to .mobile-nav, repair footer script.
set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
THEME="${THEME:-$WP_ROOT/wp-content/themes/eucodewe-1389}"

[[ -d "$WP_ROOT" ]] || { echo "WP_ROOT not found"; exit 1; }
[[ -f "$THEME/new.css" ]] || { echo "Theme new.css not found"; exit 1; }
command -v wp >/dev/null 2>&1 || { echo "wp-cli required"; exit 1; }

cd "$THEME"
chmod u+w new.css 2>/dev/null || true

python3 <<'PY'
from pathlib import Path
import re

css = Path("new.css")
text = css.read_text()
marker = "/* Mobile nav clickability fix */"
block = """
/* Mobile nav clickability fix */
@media (max-width: 1080px) {
    .header__menu.menu-header {
        display: none !important;
        pointer-events: none !important;
    }

    .mobile-nav li.box-featured,
    .mobile-nav li.rt-custom-menu-field-item,
    .mobile-nav #menu-item-5842,
    .mobile-nav .rt-wp-menu-custom-fields-wrapper {
        display: none !important;
        pointer-events: none !important;
        max-height: 0 !important;
        overflow: hidden !important;
        margin: 0 !important;
        padding: 0 !important;
        min-height: 0 !important;
    }

    .mobile-nav .menu-item-has-children:not(.active) > .sub-menu {
        max-height: 0 !important;
        overflow: hidden !important;
        visibility: hidden !important;
        pointer-events: none !important;
        padding-top: 0 !important;
    }

    .mobile-nav .menu-item-has-children.active > .sub-menu {
        max-height: none !important;
        overflow: visible !important;
        visibility: visible !important;
        pointer-events: auto !important;
    }

    .mobile-nav nav.menu-menu-1-container a {
        display: block;
        position: relative;
        z-index: 5;
        pointer-events: auto;
    }
}
"""

if marker in text:
    text = re.sub(r"/\* Mobile nav clickability fix \*/[\s\S]*?(?=\n/\* |\Z)", block.strip() + "\n", text, count=1)
else:
    text = text.rstrip() + "\n\n" + block.strip() + "\n"

css.write_text(text)
print("Patched new.css")
PY

cd "$WP_ROOT"

PATCH_PHP="$(mktemp)"
cat > "$PATCH_PHP" <<'PHP'
<?php
$settings = get_option('auhfc_settings_sitewide');
if (! is_array($settings)) {
    fwrite(STDERR, "ERROR: auhfc_settings_sitewide missing\n");
    exit(1);
}

$mobileJs = <<<'JS'

document.querySelector("#menuToggle input, #menuToggleCheckbox").addEventListener("change", function () {
  document.body.style.overflow = this.checked ? "hidden" : "";
});

document.querySelectorAll(".mobile-nav nav.menu-menu-1-container .menu-item-has-children > a").forEach(function (menuItem) {
  menuItem.addEventListener("click", function (event) {
    var href = menuItem.getAttribute("href") || "";
    var isVoidHref = !href || href === "#" || href.indexOf("javascript:") === 0;
    var rect = menuItem.getBoundingClientRect();
    var clickedChevron = event.clientX >= rect.right - 40;

    if (!isVoidHref && !clickedChevron) {
      return;
    }

    event.preventDefault();
    var parentItem = menuItem.parentElement;
    var willOpen = !parentItem.classList.contains("active");

    document.querySelectorAll(".mobile-nav nav.menu-menu-1-container .menu-item-has-children").forEach(function (otherItem) {
      otherItem.classList.remove("active");
    });

    if (willOpen) {
      parentItem.classList.add("active");
    }
  });
});
JS;

$updated = false;
foreach ($settings as $key => $value) {
    if (! is_string($value) || strpos($value, 'menuToggle') === false) {
        continue;
    }

    $value = preg_replace(
        '/document\.querySelector\("#menuToggle input"\)\.addEventListener\("change"[\s\S]*?menu-item-has-children > a"\)[\s\S]*?\}\);\s*(?:\}\);\s*)?/m',
        '',
        $value
    );
    $value = preg_replace(
        '/document\.querySelectorAll\([\'"]\.?mobile-nav nav\.menu-menu-1-container \.menu-item-has-children > a[\'"]\)[\s\S]*?\}\);\s*(?:\}\);\s*)?/m',
        '',
        $value
    );
    $value = preg_replace(
        '/document\.querySelectorAll\([\'"]nav\.menu-menu-1-container \.menu-item-has-children > a[\'"]\)[\s\S]*?\}\);\s*(?:\}\);\s*)?/m',
        '',
        $value
    );

    $insertBefore = '</script>';
    $pos = strrpos($value, $insertBefore);
    if ($pos === false) {
        fwrite(STDERR, "ERROR: no </script> in {$key}\n");
        exit(1);
    }

    $settings[$key] = substr($value, 0, $pos) . trim($mobileJs) . "\n" . substr($value, $pos);
    $updated = true;
    echo "Rebuilt scoped mobile menu JS in auhfc_settings_sitewide[{$key}]\n";
    break;
}

if (! $updated) {
    fwrite(STDERR, "ERROR: footer script not found\n");
    exit(1);
}

update_option('auhfc_settings_sitewide', $settings);
PHP

wp eval-file "$PATCH_PHP" --allow-root 2>/dev/null | grep -E '^(Patched|Rebuilt|Success)' || true
rm -f "$PATCH_PHP"

wp cache flush --allow-root 2>/dev/null | tail -1 || true
for svc in php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm; do
  if systemctl is-active --quiet "$svc" 2>/dev/null; then
    systemctl reload "$svc"
    echo "Reloaded $svc"
    break
  fi
done

echo "Done."
