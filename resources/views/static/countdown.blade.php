<script>
    window.$(function ($) {
        var codeweekDate = new Date(2018, 9, 6);
        var now = new Date();
        if (codeweekDate > now) {
            $('#countdown-ex1').countdown({until: codeweekDate});
        }
    });
</script>