#!/usr/bin/env bash
# Remove stray }); breaking blog footer JS.
set -euo pipefail
WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
cd "$WP_ROOT"
wp eval --allow-root '
$settings = get_option("auhfc_settings_sitewide");
$footer = $settings["footer"] ?? "";
$footer = str_replace(
    "$(\".mobile-nav .menu-menu-1-container\").append(actionButtons);\n});\n\t});",
    "$(\".mobile-nav .menu-menu-1-container\").append(actionButtons);\n});",
    $footer
);
$settings["footer"] = $footer;
update_option("auhfc_settings_sitewide", $settings);
echo "Removed stray }); from footer script\n";
' 2>/dev/null | grep -v '^Deprecated:\|^Notice:\|^Warning:\|^PHP Warning:' || true
wp cache flush --allow-root 2>/dev/null | tail -1 || true
echo Done.
