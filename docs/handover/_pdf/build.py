#!/usr/bin/env python3
"""Build a single combined PDF from the docs/handover chapter set.

Pipeline: markdown -> preprocessed markdown -> pandoc HTML -> headless Chrome -> PDF.

Mermaid blocks are emitted as escaped `<div class="mermaid">` so mermaid.js can
render them in the browser before Chrome prints. Code-reference fences of the
form ```START:END:path are turned into captioned code blocks.
"""

import html
import re
import shutil
import subprocess
import sys
from datetime import date
from pathlib import Path

HERE = Path(__file__).resolve().parent
HANDOVER = HERE.parent
BUILD = HERE / "build"
REPO_BLOB = "https://github.com/codeeu/codeweek/blob/master"

CHAPTERS = [
    ("readme", "README.md"),
    ("00", "00-access-checklist.md"),
    ("01", "01-architecture.md"),
    ("02", "02-environments-and-deployment.md"),
    ("03", "03-configuration.md"),
    ("04", "04-domain-model.md"),
    ("05", "05-nova-admin.md"),
    ("06", "06-bulk-uploads-and-imports.md"),
    ("07", "07-partner-feeds-and-apis.md"),
    ("08", "08-certificates.md"),
    ("09", "09-wordpress-blog.md"),
    ("10", "10-scheduled-jobs-and-runbooks.md"),
    ("11", "11-testing-and-local-dev.md"),
    ("12", "12-risks-and-known-issues.md"),
    ("13", "13-visual-tour.md"),
]

SLUG_BY_FILE = {fname: f"chapter-{cid}" for cid, fname in CHAPTERS}

EXT_LANG = {
    ".php": "php",
    ".yaml": "yaml",
    ".yml": "yaml",
    ".xml": "xml",
    ".sh": "bash",
    ".js": "javascript",
    ".json": "json",
    ".sql": "sql",
    ".css": "css",
}

CODE_REF = re.compile(r"^```(\d+):(\d+):(\S+)\s*$")
FENCE = re.compile(r"^```")


def convert_mermaid_and_coderefs(text: str) -> str:
    """Rewrite fenced blocks that pandoc cannot handle natively."""
    out, lines, i = [], text.split("\n"), 0
    while i < len(lines):
        line = lines[i]

        if line.strip() == "```mermaid":
            body, i = [], i + 1
            while i < len(lines) and not FENCE.match(lines[i]):
                body.append(lines[i])
                i += 1
            i += 1  # closing fence
            # Emit as a pandoc raw HTML block. A bare HTML block would be
            # terminated by the first blank line inside the diagram source,
            # and pandoc would then parse the remainder as markdown.
            out += [
                "",
                "```{=html}",
                '<div class="mermaid-wrap"><div class="mermaid">',
                html.escape("\n".join(body)),
                "</div></div>",
                "```",
                "",
            ]
            continue

        m = CODE_REF.match(line)
        if m:
            start, end, path = m.group(1), m.group(2), m.group(3)
            lang = EXT_LANG.get(Path(path).suffix, "")
            body, i = [], i + 1
            while i < len(lines) and not FENCE.match(lines[i]):
                body.append(lines[i])
                i += 1
            i += 1
            out += [
                "",
                "::: coderef",
                f"[`{path}`]({REPO_BLOB}/{path}#L{start}-L{end}){{.coderef-head}} "
                f"[lines {start}–{end}]{{.coderef-lines}}",
                "",
                f"```{lang}",
                *body,
                "```",
                ":::",
                "",
            ]
            continue

        out.append(line)
        i += 1
    return "\n".join(out)


def rewrite_links(text: str) -> str:
    """Point intra-set links at anchors and repo-relative links at GitHub."""

    def repl(m):
        label, target = m.group(1), m.group(2)
        anchor = ""
        if "#" in target:
            target, anchor = target.split("#", 1)
            anchor = "#" + anchor
        if target in SLUG_BY_FILE:
            return f"[{label}](#{SLUG_BY_FILE[target]})"
        if target.startswith("../../"):
            return f"[{label}]({REPO_BLOB}/{target[6:]}{anchor})"
        if target.startswith("../"):
            return f"[{label}]({REPO_BLOB}/docs/{target[3:]}{anchor})"
        return m.group(0)

    return re.sub(r"\[([^\]]+)\]\(((?!https?://)[^)]+)\)", repl, text)


def demote_headings(text: str) -> str:
    """Chapter files each start at h1; push everything down one level."""
    return re.sub(r"^(#{1,5}) ", r"#\1 ", text, flags=re.MULTILINE)


def build_markdown() -> Path:
    BUILD.mkdir(parents=True, exist_ok=True)
    parts = []
    for cid, fname in CHAPTERS:
        raw = (HANDOVER / fname).read_text()
        # Chapter title comes from the file's own h1.
        m = re.match(r"^#\s+(.+)$", raw.split("\n")[0])
        title = m.group(1) if m else fname
        body = "\n".join(raw.split("\n")[1:])
        body = convert_mermaid_and_coderefs(body)
        body = rewrite_links(body)
        body = demote_headings(body)
        parts.append(f'\n\n# {title} {{#chapter-{cid} .chapter}}\n\n{body}\n')
    combined = BUILD / "combined.md"
    combined.write_text("\n".join(parts))
    return combined


def main() -> int:
    for tool in ("pandoc",):
        if not shutil.which(tool):
            print(f"error: {tool} not found on PATH", file=sys.stderr)
            return 1
    chrome = Path("/Applications/Google Chrome.app/Contents/MacOS/Google Chrome")
    if not chrome.exists():
        print("error: Google Chrome not found", file=sys.stderr)
        return 1

    combined = build_markdown()
    html_out = BUILD / "handover.html"
    pdf_out = HANDOVER / "codeweek-technical-handover.pdf"

    subprocess.run(
        [
            "pandoc", str(combined),
            "--standalone",
            "--from",
            "markdown+fenced_divs+bracketed_spans+pipe_tables"
            "+backtick_code_blocks+raw_attribute",
            "--to", "html5",
            "--toc", "--toc-depth=3",
            "--highlight-style", "tango",
            "--metadata", "title=EU Code Week — Technical Handover",
            "--metadata", "lang=en",
            "--css", str(HERE / "style.css"),
            "--include-in-header", str(HERE / "head.html"),
            "--include-before-body", str(HERE / "cover.html"),
            "--resource-path", str(HANDOVER),
            "-o", str(html_out),
        ],
        check=True,
    )

    # Absolute file: URLs so Chrome resolves the stylesheet and screenshots.
    doc = html_out.read_text()
    doc = doc.replace(f'href="{HERE / "style.css"}"', f'href="file://{HERE / "style.css"}"')
    doc = doc.replace('src="assets/', f'src="file://{HANDOVER}/assets/')
    doc = doc.replace("{{BUILD_DATE}}", date.today().strftime("%-d %B %Y"))
    html_out.write_text(doc)

    subprocess.run(
        [
            str(chrome),
            "--headless=new",
            "--disable-gpu",
            "--no-sandbox",
            "--run-all-compositor-stages-before-draw",
            "--virtual-time-budget=90000",
            "--no-pdf-header-footer",
            f"--print-to-pdf={pdf_out}",
            f"file://{html_out}",
        ],
        check=True,
        capture_output=True,
    )

    size = pdf_out.stat().st_size / 1024 / 1024
    print(f"built {pdf_out}  ({size:.1f} MB)")
    return 0


if __name__ == "__main__":
    sys.exit(main())
