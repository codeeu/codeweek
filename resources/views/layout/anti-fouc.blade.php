{{--
  Hide dropdown panels only. Superfish adds .sub-menu to the top-level <li>s,
  so a bare .sub-menu { display:none } hides the whole header nav.
--}}
<style>
    .hide { display: none !important; }
    ul.sub-menu,
    .menu-dropdown { display: none; }
    [x-cloak] { display: none !important; }
    @@media (min-width: 1280px) {
        .xl\:hidden { display: none !important; }
    }
</style>
