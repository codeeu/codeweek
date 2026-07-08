#!/usr/bin/env bash
# Repair corrupted blog footer script and apply Laravel-style mobile menu JS.
set -euo pipefail

WP_ROOT="${WP_ROOT:-/var/www/html/blog}"
CACHE_VER="${CACHE_VER:-$(date +%Y%m%d%H%M)}"

cd "$WP_ROOT"
command -v wp >/dev/null 2>&1 || { echo "wp-cli required"; exit 1; }

PATCH_PHP="$(mktemp)"
cat > "$PATCH_PHP" <<'PHP'
<?php
$settings = get_option('auhfc_settings_sitewide');
if (! is_array($settings) || empty($settings['footer'])) {
    fwrite(STDERR, "ERROR: footer missing\n");
    exit(1);
}

$footer = <<<'FOOTER'
<script>
	$(window).scroll(function(){
	  if ($(window).scrollTop() >= 330) {
		$('.sticky-btn').addClass('fixed');
	   }
	   else {
		$('.sticky-btn').removeClass('fixed');
	   }
	});
	$(window).scroll(function(){
	  if ($(window).scrollTop() >= 330) {
		$('.header').addClass('header-fixed');
	   }
	   else {
		$('.header').removeClass('header-fixed');
	   }
	});
	$(document).ready(function () {
	  var actionButtons = `
	    <div class="action-btn">
	      <a class="btn-links btn-lg" href="https://codeweek.eu/login">Login / Sign up</a>
	    </div>
	  `;
	  $(".mobile-nav .menu-menu-1-container").append(actionButtons);
	});

(function () {
  var ARROW_SRC = "https://codeweek.eu/images/chevron-down-icon.svg";

  function getMenuLabel(menuItem) {
    var label = "";
    menuItem.childNodes.forEach(function (node) {
      if (node.nodeType === Node.TEXT_NODE) {
        label += node.textContent;
      }
    });
    return label.replace(/\s+/g, " ").trim();
  }

  function injectMobileParentLinks(menuItem) {
    var href = menuItem.getAttribute("href") || "";
    var isVoidHref = !href || href === "#" || href.indexOf("javascript:") === 0;
    if (isVoidHref) {
      return;
    }

    var parentItem = menuItem.parentElement;
    var submenu = parentItem.querySelector(":scope > .sub-menu");
    if (!submenu || submenu.querySelector(".mobile-parent-link")) {
      return;
    }

    var li = document.createElement("li");
    li.className = "menu-item mobile-parent-link menu-item-type-custom menu-item-object-custom";
    var link = document.createElement("a");
    link.href = href;
    link.textContent = getMenuLabel(menuItem) || menuItem.textContent.replace(/\s+/g, " ").trim();
    li.appendChild(link);
    submenu.insertBefore(li, submenu.firstChild);
  }

  function syncMenuSectionOpen() {
    var menuToggle = document.getElementById("menuToggle");
    if (!menuToggle) {
      return;
    }
    menuToggle.classList.toggle(
      "menu-section-open",
      !!menuToggle.querySelector(".menu-wrapper > .menu-item-has-children.active")
    );
  }

  function toggleItem(parentItem) {
    var willOpen = !parentItem.classList.contains("active");
    var siblings = parentItem.parentElement ? parentItem.parentElement.children : [];

    Array.prototype.forEach.call(siblings, function (sibling) {
      if (sibling !== parentItem && sibling.classList && sibling.classList.contains("menu-item-has-children")) {
        sibling.classList.remove("active");
      }
    });

    parentItem.classList.toggle("active", willOpen);
    syncMenuSectionOpen();
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
          syncMenuSectionOpen();
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

      injectMobileParentLinks(menuItem);

      var arrow = menuItem.querySelector(".arrow-icon");
      if (arrow && !arrow.dataset.bound) {
        arrow.dataset.bound = "1";
        arrow.addEventListener("click", function (event) {
          event.preventDefault();
          event.stopPropagation();
          toggleItem(menuItem.parentElement);
        });
      }

      if (menuItem.dataset.bound) {
        return;
      }
      menuItem.dataset.bound = "1";

      menuItem.addEventListener("click", function (event) {
        if (event.target.closest(".arrow-icon")) {
          return;
        }

        var href = menuItem.getAttribute("href") || "";
        var isVoidHref = !href || href === "#" || href.indexOf("javascript:") === 0;

        if (isVoidHref) {
          event.preventDefault();
          toggleItem(menuItem.parentElement);
        }
      });
    });

    syncMenuSectionOpen();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initBlogMobileMenu);
  } else {
    initBlogMobileMenu();
  }
})();
</script>
FOOTER;

$settings['footer'] = $footer;
update_option('auhfc_settings_sitewide', $settings);
echo "Rebuilt clean footer script\n";
PHP

wp eval-file "$PATCH_PHP" --allow-root 2>/dev/null | grep -E '^(Rebuilt|Success)' || wp eval-file "$PATCH_PHP" --allow-root | tail -3
rm -f "$PATCH_PHP"

THEME="$WP_ROOT/wp-content/themes/eucodewe-1389"
for header in header.php header-v2.php; do
  [[ -f "$THEME/$header" ]] || continue
  sed -i "s|/new.css?v=[0-9]*|/new.css?v=$CACHE_VER|g; s|/new.css' ?>|/new.css?v=$CACHE_VER' ?>|g" "$THEME/$header"
done

wp cache flush --allow-root 2>/dev/null | tail -1 || true
echo "Done. CSS v=$CACHE_VER"
