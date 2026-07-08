#!/usr/bin/env bash
# Repair blog mobile menu footer JS (broken change listener + menu handler).
set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
[[ -d "$WP_ROOT" ]] || { echo "WP_ROOT not found"; exit 1; }
command -v wp >/dev/null 2>&1 || { echo "wp-cli required"; exit 1; }

cd "$WP_ROOT"

PATCH_PHP="$(mktemp)"
cat > "$PATCH_PHP" <<'PHP'
<?php
$settings = get_option('auhfc_settings_sitewide');
if (! is_array($settings)) {
    fwrite(STDERR, "ERROR: auhfc_settings_sitewide missing\n");
    exit(1);
}

$mobileBlock = <<<'JS'

document.querySelector("#menuToggle input, #menuToggleCheckbox").addEventListener("change", function () {
  document.body.style.overflow = this.checked ? "hidden" : "";
});

document.querySelectorAll("nav.menu-menu-1-container .menu-item-has-children > a").forEach(function (menuItem) {
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
    parentItem.classList.toggle("active");

    document.querySelectorAll("nav.menu-menu-1-container .menu-item-has-children").forEach(function (otherItem) {
      if (otherItem !== parentItem) {
        otherItem.classList.remove("active");
      }
    });
  });
});
JS;

$updated = false;
foreach ($settings as $key => $value) {
    if (! is_string($value) || strpos($value, 'menuToggle') === false) {
        continue;
    }

    // Drop broken mobile-menu block from prior patches.
    $value = preg_replace(
        '/document\.querySelector\("#menuToggle input"\)\.addEventListener\("change"[\s\S]*?menu-item-has-children > a"\)[\s\S]*?\}\);\s*(?:\}\);\s*)?/m',
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

    $settings[$key] = substr($value, 0, $pos) . trim($mobileBlock) . "\n" . substr($value, $pos);
    $updated = true;
    echo "Rebuilt mobile menu JS in auhfc_settings_sitewide[{$key}]\n";
    break;
}

if (! $updated) {
    fwrite(STDERR, "ERROR: footer script not found\n");
    exit(1);
}

update_option('auhfc_settings_sitewide', $settings);
PHP

wp eval-file "$PATCH_PHP" --allow-root 2>/dev/null | grep -E '^(Rebuilt|Menu|Done|Success)' || true
rm -f "$PATCH_PHP"
wp cache flush --allow-root 2>/dev/null | tail -1 || true
echo "Done."
