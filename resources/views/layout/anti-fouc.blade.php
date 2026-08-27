{{--
  Prevent the first-paint flash of unstyled HTML. The main Vite stylesheet
  sets html { visibility: visible } once it has applied.
--}}
<style>
    html { visibility: hidden; }
    .hide { display: none !important; }
    .sub-menu { display: none; }
    [x-cloak] { display: none !important; }
    @@media (min-width: 1280px) {
        .xl\:hidden { display: none !important; }
    }
</style>
<noscript>
    <style>html { visibility: visible; }</style>
</noscript>
<script>
    setTimeout(function () {
        document.documentElement.style.visibility = 'visible';
    }, 2500);
</script>
