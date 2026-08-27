{{--
  Hide only the bits that dump unstyled on first paint (dropdowns / mobile clones).
  Do not hide the document — that also hid the header menu.
--}}
<style>
    .hide { display: none !important; }
    .sub-menu,
    .menu-dropdown { display: none; }
    [x-cloak] { display: none !important; }
    @@media (min-width: 1280px) {
        .xl\:hidden { display: none !important; }
    }
</style>
