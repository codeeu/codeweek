#!/usr/bin/env bash
# Fix Blog chevron (desktop uses class not id) + left-align hero CTA + submenu item.
set -euo pipefail

THEME="${THEME:-/var/www/html/blog/wp-content/themes/eucodewe-1389}"
[[ -d "$THEME" ]] || { echo "Theme not found"; exit 1; }

cd "$THEME"
chmod u+w new.css 2>/dev/null || true

python3 <<'PY'
from pathlib import Path
import re

css = Path("new.css")
text = css.read_text()

# Strip old blog chevron / submenu patches
for pat in [
    r"\n/\* Blog nav: restore dropdown chevron.*?(?=\n/\* |\Z)",
    r"\n/\* Blog nav: chevron on Blog.*?(?=\n/\* |\Z)",
    r"\n/\* Blog dropdown: show Share your stories.*?(?=\n/\* |\Z)",
    r"\n/\* Blog dropdown: Share your stories.*?(?=\n/\* |\Z)",
    r"\n/\* Hero CTA: align left.*?(?=\n/\* |\Z)",
]:
    text = re.sub(pat, "\n", text, flags=re.S)

block = """
/* Blog nav: chevron on Blog (last item; desktop uses .menu-item-5643 without id) */
.header__menu nav > ul > li.menu-item-has-children:last-child > a:after,
.header__menu nav > ul > li.menu-item-5643.menu-item-has-children > a:after,
li#menu-item-5643.menu-item-has-children > a:after {
    content: "" !important;
    width: 10px;
    height: 10px;
    background: url(https://codeweek.eu/blog/wp-content/uploads/2025/01/Vector-6.svg);
    display: block !important;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    transition: 0.3s;
}
.header__menu nav > ul > li.menu-item-has-children:last-child > a:hover:after,
.header__menu nav > ul > li.menu-item-5643.menu-item-has-children > a:hover:after,
li#menu-item-5643.menu-item-has-children > a:hover:after {
    transform: scale(-1);
}

/* Hero CTA: align left (hero-content defaults to text-align: center) */
.hero-content {
    text-align: left;
}

/* Blog dropdown: Share your stories — left aligned */
.menu-item-5643 > .sub-menu > .menu-item-8142,
li#menu-item-5643 > .sub-menu > li#menu-item-8142 {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 8px;
}
.menu-item-5643 > .sub-menu > .menu-item-8142 a,
li#menu-item-5643 > .sub-menu > li#menu-item-8142 a {
    text-align: left;
}
.menu-item-5643 > .sub-menu > .menu-item-8142 .rt-wp-menu-custom-fields-wrapper,
li#menu-item-5643 > .sub-menu > li#menu-item-8142 .rt-wp-menu-custom-fields-wrapper {
    display: flex;
    align-items: center;
    flex-shrink: 0;
}
.menu-item-5643 > .sub-menu > .menu-item-8142 .rt-wp-menu-custom-fields-custom-html img,
li#menu-item-5643 > .sub-menu > li#menu-item-8142 .rt-wp-menu-custom-fields-custom-html img {
    display: block;
    width: 20px;
    height: auto;
}
"""

css.write_text(text.rstrip() + "\n" + block)
print("Patched new.css")
PY

cd /var/www/html/blog
wp cache flush --allow-root 2>/dev/null | tail -1 || true
for svc in php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm; do
  systemctl is-active --quiet "$svc" 2>/dev/null && systemctl reload "$svc" && echo "Reloaded $svc" && break
done
echo "Done. Hard-refresh https://codeweek.eu/blog/"
