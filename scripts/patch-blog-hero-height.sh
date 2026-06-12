#!/usr/bin/env bash
# Quick hero height bump — run on the blog server (SSH as root):
#   bash patch-blog-hero-height.sh

set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
THEME="${THEME:-$WP_ROOT/wp-content/themes/eucodewe-1389}"

if [[ ! -d "$THEME" ]]; then
  THEME=$(find /var/www -maxdepth 8 -type d -name 'eucodewe-1389' 2>/dev/null | head -1 || true)
fi

[[ -d "$THEME" ]] || { echo "Theme not found"; exit 1; }

cd "$THEME"
chmod u+w new.css 2>/dev/null || true
cp -a new.css "new.css.bak.$(date +%Y%m%d%H%M%S)"

python3 <<'PY'
from pathlib import Path
import re

css = Path("new.css")
text = css.read_text()

replacements = [
    (r"(\.hero-section\s*\{[^}]*?)min-height:\s*\d+px;", r"\1min-height: 580px;"),
    (r"(\.hero-section\s*\{[^}]*?)padding:\s*[^;]+;", r"\1padding: 3rem 0;"),
    (r"(\.hero-content\s*\{[^}]*?)padding:\s*2rem;", r"\1padding: 2.5rem 3rem 3rem;"),
    (r"(\t\.hero-section\s*\{[^}]*?)min-height:\s*\d+px;", r"\1min-height: 520px;"),
    (r"(\t\.hero-section\s*\{\n        flex-direction: column-reverse;[^}]*?)padding:\s*[^;]+;", r"\1padding: 0 0 3rem;\n        min-height: 520px;"),
]

for pattern, repl in replacements:
    text, n = re.subn(pattern, repl, text, count=1, flags=re.S)
    if n:
        print(f"Patched: {pattern[:40]}...")

if ".hero-description {" in text and "margin-bottom:" not in text.split(".hero-description {", 1)[1].split("}", 1)[0]:
    text = text.replace(
        ".hero-description {\n    color: var(--Slate-500, #333E48);",
        ".hero-description {\n    margin-bottom: 1.25rem;\n    color: var(--Slate-500, #333E48);",
        1,
    )
    print("Added hero-description margin-bottom")

css.write_text(text)
print("Done — hero min-height is now 580px (desktop)")
PY

if command -v wp >/dev/null 2>&1; then
  wp cache flush --path="$WP_ROOT" --allow-root 2>/dev/null || true
fi

echo "Verify: https://codeweek.eu/blog/"
