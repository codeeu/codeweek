<script>
    window.$(function ($) {
        var codeweekDate = new Date(2019, 9, 5);
        var now = new Date();
        if (codeweekDate > now) {
            $('#countdown-ex1').countdown({until: codeweekDate});
        }
    });
</script>