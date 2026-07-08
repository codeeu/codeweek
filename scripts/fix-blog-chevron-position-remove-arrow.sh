#!/usr/bin/env bash
# Chevron position (right: -.8rem) + remove arrow.png from Share your stories submenu.
set -euo pipefail

THEME="${THEME:-/var/www/html/blog/wp-content/themes/eucodewe-1389}"
WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
SHARE_TEXT="Share your stories"

[[ -d "$THEME" ]] || { echo "Theme not found: $THEME"; exit 1; }
[[ -d "$WP_ROOT" ]] || { echo "WP_ROOT not found: $WP_ROOT"; exit 1; }

cd "$THEME"
chmod u+w new.css 2>/dev/null || true

python3 <<'PY'
from pathlib import Path
import re

css = Path("new.css")
text = css.read_text()

# Don't hide chevron on last top-level item when it has children (Blog)
text = text.replace(
    ".header__menu nav > ul > li:last-child a:after {\n    display: none;\n}",
    ".header__menu nav > ul > li:last-child:not(.menu-item-has-children) a:after {\n    display: none;\n}",
)

chevron_sel = (
    "li.menu-item.menu-item-type-custom.menu-item-object-custom.menu-item-has-children a:after"
)
chevron_block = """li.menu-item.menu-item-type-custom.menu-item-object-custom.menu-item-has-children a:after {
    content: "";
    width: 10px;
    height: 10px;
    background: url(https://codeweek.eu/blog/wp-content/uploads/2025/01/Vector-6.svg);
    display: block;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    transition: 0.3s;
    right: -.8rem;
}"""

pattern = re.compile(
    r"li\.menu-item\.menu-item-type-custom\.menu-item-object-custom\.menu-item-has-children a:after\s*\{[^}]+\}",
    re.S,
)
if pattern.search(text):
    text = pattern.sub(chevron_block, text, count=1)
    print("Updated chevron rule with right: -.8rem")
else:
    print("WARNING: chevron rule not found — append manually if needed")

# Remove submenu arrow layout overrides (no longer needed)
for pat in [
    r"\n/\* Blog dropdown: Share your stories.*?(?=\n/\* |\Z)",
    r"\n/\* Blog nav: restore dropdown chevron.*?(?=\n/\* |\Z)",
    r"\n/\* Blog nav: chevron on Blog.*?(?=\n/\* |\Z)",
]:
    text = re.sub(pat, "\n", text, flags=re.S)

css.write_text(text)
print("Patched new.css")
PY

echo "--- chevron rule ---"
grep -n -A12 "menu-item-has-children a:after" new.css | head -15

cd "$WP_ROOT"
command -v wp >/dev/null 2>&1 || { echo "wp-cli required for menu arrow removal"; exit 1; }

SHARE_ID=""
for menu in primary header main "Menu 1" 2; do
  SHARE_ID=$(wp menu item list "$menu" --fields=db_id,title --format=csv --allow-root 2>/dev/null \
    | awk -F, -v t="$SHARE_TEXT" '$2 ~ t {print $1; exit}') || true
  [[ -n "${SHARE_ID:-}" ]] && break
done
SHARE_ID="${SHARE_ID:-8142}"

wp eval --allow-root "
\$id = (int) ${SHARE_ID};
delete_post_meta(\$id, 'rt-wp-menu-custom-fields');
delete_transient('rt-wp-menu-custom-fields-' . \$id);
echo \"Removed arrow custom HTML from menu item \$id\n\";
"

wp cache flush --allow-root 2>/dev/null | tail -1 || true
for svc in php8.3-fpm php8.2-fpm php8.1-fpm php8.0-fpm; do
  systemctl is-active --quiet "$svc" 2>/dev/null && systemctl reload "$svc" && echo "Reloaded $svc" && break
done
echo "Done. Hard-refresh https://codeweek.eu/blog/"
