#!/usr/bin/env bash
# Snappier blog mobile menu: instant toggles, no max-height animation, larger chevron tap targets.
set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
THEME="${THEME:-$WP_ROOT/wp-content/themes/eucodewe-1389}"
CACHE_VER="${CACHE_VER:-$(date +%Y%m%d%H%M)}"
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

[[ -d "$WP_ROOT" ]] || { echo "WP_ROOT not found"; exit 1; }

cd "$THEME"
chmod u+w new.css 2>/dev/null || true

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

    #menuToggle,
    #menuToggle a,
    #menuToggle .sub-menu {
        -webkit-tap-highlight-color: transparent;
        touch-action: manipulation;
    }

    /* Kill slow max-height animations from legacy menu CSS */
    #menuToggle .sub-menu,
    #menuToggle .menu-menu-1-container ul .sub-menu {
        transition: none !important;
    }

    /* Laravel-style parent row: label left, chevron right */
    #menuToggle .menu-item-has-children > a {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 8px !important;
        width: 100% !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        color: #1C4DA1 !important;
        padding: 12px 0 !important;
        text-decoration: none !important;
    }

    #menuToggle .menu-item-has-children > a::after {
        display: none !important;
    }

    #menuToggle .menu-item-has-children > a .arrow-icon {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
        margin-left: auto;
        padding: 12px;
        margin-right: -12px;
        box-sizing: content-box;
        cursor: pointer;
        transition: none;
    }

    #menuToggle .menu-item-has-children.active > a .arrow-icon {
        transform: scaleY(-1);
    }

    #menuToggle #menu-item-5845,
    #menuToggle #menu-item-5847,
    #menuToggle #menu-item-5848,
    #menuToggle li#menu-item-5842,
    #menuToggle li.box-featured,
    #menuToggle li.rt-custom-menu-field-item,
    #menuToggle .rt-wp-menu-custom-fields-wrapper {
        display: none !important;
        pointer-events: none !important;
        height: 0 !important;
        max-height: 0 !important;
        overflow: hidden !important;
        margin: 0 !important;
        padding: 0 !important;
        visibility: hidden !important;
    }

    /* Faster than :has() — class toggled in JS */
    #menuToggle.menu-section-open .menu-wrapper > .menu-item-has-children:not(.active),
    #menuToggle.menu-section-open .menu-wrapper > .menu-item:not(.menu-item-has-children) {
        display: none !important;
    }

    #menuToggle .menu-item-has-children:not(.active) > .sub-menu {
        display: none !important;
        pointer-events: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    #menuToggle .menu-item-has-children.active > .sub-menu {
        display: block !important;
        pointer-events: auto !important;
        padding: 0 0 24px !important;
    }

    #menuToggle .menu-item-has-children.active > .sub-menu > li {
        display: list-item !important;
        pointer-events: auto !important;
        margin-top: 16px !important;
    }

    #menuToggle .menu-item-has-children.active > .sub-menu > li > a {
        display: block !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        color: #1C4DA1 !important;
        padding: 0 !important;
    }

    #menuToggle .mega-menu-nav.active > .sub-menu > li.col-menu {
        display: list-item !important;
        margin-top: 20px !important;
    }

    #menuToggle .mega-menu-nav.active > .sub-menu > li.col-menu > a {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        font-size: 16px !important;
        font-weight: 600 !important;
    }

    #menuToggle .mega-menu-nav .col-menu:not(.active) > .sub-menu {
        display: none !important;
        pointer-events: none !important;
    }

    #menuToggle .mega-menu-nav .col-menu.active > .sub-menu {
        display: block !important;
        pointer-events: auto !important;
        padding-left: 0 !important;
        margin-top: 8px !important;
    }

    #menuToggle .mega-menu-nav .col-menu.active > .sub-menu > li {
        display: list-item !important;
        margin-top: 12px !important;
    }

    #menuToggle .mega-menu-nav .col-menu.active > .sub-menu a {
        display: block !important;
        font-weight: 600 !important;
        color: #1C4DA1 !important;
    }
}
"""

if marker in text:
    text = re.sub(r"/\* Mobile nav clickability fix \*/[\s\S]*?(?=\n/\* |\Z)", block.strip() + "\n", text, count=1)
else:
    text = text.rstrip() + "\n\n" + block.strip() + "\n"

css.write_text(text)
print("Patched new.css for snappy toggles")
PY

for header in header.php header-v2.php; do
  [[ -f "$header" ]] || continue
  sed -i "s|/new.css?v=[0-9]*|/new.css?v=$CACHE_VER|g; s|/new.css' ?>|/new.css?v=$CACHE_VER' ?>|g" "$header"
done

bash "$SCRIPT_DIR/fix-blog-footer-script-clean.sh"
