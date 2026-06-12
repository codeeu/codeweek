#!/usr/bin/env bash
# Fix Blog chevron (root cause: last-child rule) + hero button typography.
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

# ROOT FIX: don't hide chevron on last nav item when it has a dropdown
text = text.replace(
    ".header__menu nav > ul > li:last-child a:after {\n    display: none;\n}",
    ".header__menu nav > ul > li:last-child:not(.menu-item-has-children) a:after {\n    display: none;\n}",
)

# Hero button: no top margin, 1.125rem font
text = re.sub(
    r"(\.hero-button\s*\{[^}]*?)margin-top:\s*[^;]+;\s*",
    r"\1",
    text,
    count=1,
    flags=re.S,
)
if "font-size: 1.125rem" not in text.split(".hero-button {", 1)[1].split("}", 1)[0]:
    text = re.sub(
        r"(\.hero-button\s*\{[^}]*?font-weight:\s*600;\s*)",
        r"\1\n    font-size: 1.125rem;\n",
        text,
        count=1,
        flags=re.S,
    )

# Keep hero content left-aligned
if ".hero-content {\n    text-align: left;" not in text:
    text = re.sub(
        r"(\.hero-content\s*\{[^}]*?)text-align:\s*center;",
        r"\1text-align: left;",
        text,
        count=1,
        flags=re.S,
    )

# Strip redundant blog chevron override blocks (root fix handles it)
for pat in [
    r"\n/\* Blog nav: restore dropdown chevron.*?(?=\n/\* |\Z)",
    r"\n/\* Blog nav: chevron on Blog.*?(?=\n/\* |\Z)",
]:
    text = re.sub(pat, "\n", text, flags=re.S)

# Ensure submenu left-align block exists (keep if already there)
submenu_marker = "/* Blog dropdown: Share your stories — left aligned */"
if submenu_marker not in text:
    text = text.rstrip() + """

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
"""

css.write_text(text)
print("Patched new.css")
PY

echo "--- verify ---"
grep -n "last-child" new.css | head -5
grep -n -A6 "^\.hero-button {" new.css | head -10

cd /var/www/html/blog
wp cache flush --allow-root 2>/dev/null | tail -1 || true
for svc in php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm; do
  systemctl is-active --quiet "$svc" 2>/dev/null && systemctl reload "$svc" && echo "Reloaded $svc" && break
done
echo "Done. Hard-refresh https://codeweek.eu/blog/"
