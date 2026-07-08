#!/usr/bin/env bash
# Fix blog mobile menu v2: nested mega-menu pointer-events, hide promo, cache-bust new.css.
set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
THEME="${THEME:-$WP_ROOT/wp-content/themes/eucodewe-1389}"
CACHE_VER="${CACHE_VER:-$(date +%Y%m%d%H%M)}"

[[ -d "$WP_ROOT" ]] || { echo "WP_ROOT not found"; exit 1; }
[[ -f "$THEME/new.css" ]] || { echo "Theme new.css not found"; exit 1; }
command -v wp >/dev/null 2>&1 || { echo "wp-cli required"; exit 1; }

cd "$THEME"
chmod u+w new.css header.php header-v2.php 2>/dev/null || true

python3 <<'PY'
from pathlib import Path
import re

css = Path("new.css")
text = css.read_text()
marker = "/* Mobile nav clickability fix */"
block = """/* Mobile nav clickability fix */
@media (max-width: 1080px) {
    .header__menu.menu-header {
        display: none !important;
        pointer-events: none !important;
    }

    /* Always hide desktop promo card in mobile drawer */
    #menuToggle li#menu-item-5842,
    #menuToggle li.box-featured,
    #menuToggle li.rt-custom-menu-field-item,
    .mobile-nav li#menu-item-5842,
    .mobile-nav li.box-featured,
    .mobile-nav li.rt-custom-menu-field-item,
    .mobile-nav .rt-wp-menu-custom-fields-wrapper {
        display: none !important;
        pointer-events: none !important;
        height: 0 !important;
        max-height: 0 !important;
        overflow: hidden !important;
        margin: 0 !important;
        padding: 0 !important;
        min-height: 0 !important;
        opacity: 0 !important;
        visibility: hidden !important;
    }

    /* Collapse all submenu levels when parent is closed (mega-menu nests ul.sub-menu) */
    #menuToggle .menu-item-has-children:not(.active) > .sub-menu,
    #menuToggle .menu-item-has-children:not(.active) .sub-menu .sub-menu {
        max-height: 0 !important;
        overflow: hidden !important;
        visibility: hidden !important;
        pointer-events: none !important;
        padding-top: 0 !important;
        margin: 0 !important;
    }

    #menuToggle .menu-item-has-children:not(.active) .sub-menu *,
    #menuToggle .menu-item-has-children:not(.active) .sub-menu .sub-menu * {
        pointer-events: none !important;
    }

    #menuToggle .menu-item-has-children.active > .sub-menu {
        max-height: none !important;
        overflow: visible !important;
        visibility: visible !important;
        pointer-events: auto !important;
    }

    #menuToggle .menu-item-has-children.active .sub-menu a,
    #menuToggle .menu-item-has-children.active .sub-menu li {
        pointer-events: auto !important;
        visibility: visible !important;
    }

    #menuToggle nav.menu-menu-1-container a {
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

for header in header.php header-v2.php; do
  if [[ -f "$header" ]]; then
  python3 - "$header" "$CACHE_VER" <<'PY'
import re, sys
path, ver = sys.argv[1], sys.argv[2]
text = open(path).read()
new = re.sub(
    r"(get_stylesheet_directory_uri\(\)\s*\.\s*'/new\.css')(\s*\?v=[^']*)?'",
    rf"\1'?v={ver}'",
    text,
    count=1,
)
if new == text:
    new = text.replace(
        "get_stylesheet_directory_uri(). '/new.css' ?>",
        f"get_stylesheet_directory_uri(). '/new.css?v={ver}' ?>",
    )
open(path, "w").write(new)
print(f"Cache-busted {path} -> ?v={ver}")
PY
  fi
done

cd "$WP_ROOT"
wp cache flush --allow-root 2>/dev/null | tail -1 || true

for svc in php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm; do
  if systemctl is-active --quiet "$svc" 2>/dev/null; then
    systemctl reload "$svc"
    echo "Reloaded $svc"
    break
  fi
done

echo "Done. new.css cache version: $CACHE_VER"
