#!/usr/bin/env bash
# Match blog mobile menu to Laravel: inline chevrons, visible submenus, sibling hide.
set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
THEME="${THEME:-$WP_ROOT/wp-content/themes/eucodewe-1389}"
CACHE_VER="${CACHE_VER:-$(date +%Y%m%d%H%M)}"

[[ -d "$WP_ROOT" ]] || { echo "WP_ROOT not found"; exit 1; }
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
        transition: transform 0.3s ease;
    }

    #menuToggle .menu-item-has-children.active > a .arrow-icon {
        transform: scaleY(-1);
    }

    /* Hide duplicate submenu header rows with WP custom arrow blocks */
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

    /* Laravel: when a section is open, hide other top-level items */
    #menuToggle:has(.menu-wrapper > .menu-item-has-children.active) .menu-wrapper > .menu-item-has-children:not(.active),
    #menuToggle:has(.menu-wrapper > .menu-item-has-children.active) .menu-wrapper > .menu-item:not(.menu-item-has-children) {
        display: none !important;
    }

    /* Collapsed submenus */
    #menuToggle .menu-item-has-children:not(.active) > .sub-menu {
        max-height: 0 !important;
        overflow: hidden !important;
        visibility: hidden !important;
        pointer-events: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    /* Expanded direct submenu */
    #menuToggle .menu-item-has-children.active > .sub-menu {
        max-height: none !important;
        overflow: visible !important;
        visibility: visible !important;
        pointer-events: auto !important;
        display: block !important;
        padding: 0 0 24px !important;
    }

    #menuToggle .menu-item-has-children.active > .sub-menu > li {
        display: list-item !important;
        visibility: visible !important;
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

    /* Mega-menu: nested column sections */
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
        max-height: 0 !important;
        overflow: hidden !important;
        visibility: hidden !important;
        pointer-events: none !important;
    }

    #menuToggle .mega-menu-nav .col-menu.active > .sub-menu {
        max-height: none !important;
        overflow: visible !important;
        visibility: visible !important;
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
print("Patched new.css")
PY

for header in header.php header-v2.php; do
  [[ -f "$header" ]] || continue
  python3 - "$header" "$CACHE_VER" <<'PY'
import re, sys
path, ver = sys.argv[1], sys.argv[2]
text = open(path).read()
new = re.sub(
    r"(get_stylesheet_directory_uri\(\)\s*\.\s*'/new\.css')(\?v=[^']*)?'",
    rf"\1'?v={ver}'",
    text,
    count=1,
)
if new == text:
    new = text.replace(
        "get_stylesheet_directory_uri(). '/new.css' ?>",
        f"get_stylesheet_directory_uri(). '/new.css?v={ver}' ?>",
    )
open(path, "w").write(text if new == text else new)
print(f"Cache-busted {path} -> ?v={ver}")
PY
done

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

(function () {
  var ARROW_SRC = "https://codeweek.eu/images/chevron-down-icon.svg";

  function toggleItem(parentItem, open) {
    var willOpen = typeof open === "boolean" ? open : !parentItem.classList.contains("active");
    var siblings = parentItem.parentElement ? parentItem.parentElement.children : [];

    Array.prototype.forEach.call(siblings, function (sibling) {
      if (sibling !== parentItem && sibling.classList && sibling.classList.contains("menu-item-has-children")) {
        sibling.classList.remove("active");
      }
    });

    if (willOpen) {
      parentItem.classList.add("active");
    } else {
      parentItem.classList.remove("active");
    }
  }

  function initBlogMobileMenu() {
    var toggle = document.querySelector("#menuToggle input, #menuToggleCheckbox");
    if (toggle) {
      toggle.addEventListener("change", function () {
        document.body.style.overflow = this.checked ? "hidden" : "";
        if (!this.checked) {
          document.querySelectorAll("#menuToggle .menu-item-has-children.active").forEach(function (el) {
            el.classList.remove("active");
          });
        }
      });
    }

    document.querySelectorAll("#menuToggle .menu-item-has-children > a").forEach(function (menuItem) {
      if (!menuItem.querySelector(".arrow-icon")) {
        var arrow = document.createElement("img");
        arrow.className = "arrow-icon";
        arrow.src = ARROW_SRC;
        arrow.alt = "";
        arrow.setAttribute("aria-hidden", "true");
        menuItem.appendChild(arrow);
      }

      menuItem.addEventListener("click", function (event) {
        var href = menuItem.getAttribute("href") || "";
        var isVoidHref = !href || href === "#" || href.indexOf("javascript:") === 0;
        var clickedArrow = event.target.closest(".arrow-icon");

        if (clickedArrow || isVoidHref) {
          event.preventDefault();
          toggleItem(menuItem.parentElement);
        }
      });
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initBlogMobileMenu);
  } else {
    initBlogMobileMenu();
  }
})();
JS;

$updated = false;
foreach ($settings as $key => $value) {
    if (! is_string($value) || strpos($value, 'menuToggle') === false) {
        continue;
    }

    $value = preg_replace(
        '/document\.querySelector\("#menuToggle input[\s\S]*?initBlogMobileMenu[\s\S]*?\}\)\(\);\s*/m',
        '',
        $value
    );
    $value = preg_replace(
        '/document\.querySelectorAll\([\'"]#menuToggle \.menu-item-has-children > a[\'"]\)[\s\S]*?\}\);\s*/m',
        '',
        $value
    );
    $value = preg_replace(
        '/document\.querySelectorAll\([\'"]\.mobile-nav nav\.menu-menu-1-container \.menu-item-has-children > a[\'"]\)[\s\S]*?\}\);\s*/m',
        '',
        $value
    );
    $value = preg_replace(
        '/document\.querySelector\("#menuToggle input, #menuToggleCheckbox"\)\.addEventListener\("change"[\s\S]*?\}\);\s*/m',
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
    echo "Rebuilt Laravel-style mobile menu JS in auhfc_settings_sitewide[{$key}]\n";
    break;
}

if (! $updated) {
    fwrite(STDERR, "ERROR: footer script not found\n");
    exit(1);
}

update_option('auhfc_settings_sitewide', $settings);
PHP

wp eval-file "$PATCH_PHP" --allow-root
rm -f "$PATCH_PHP"

wp cache flush --allow-root 2>/dev/null | tail -1 || true

for svc in php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm; do
  if systemctl is-active --quiet "$svc" 2>/dev/null; then
    systemctl reload "$svc"
    echo "Reloaded $svc"
    break
  fi
done

echo "Done. new.css cache version: $CACHE_VER"
