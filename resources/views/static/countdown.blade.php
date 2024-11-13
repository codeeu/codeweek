<script>
    window.$(function ($) {
        var codeweekDate = new Date(2024, 9, 14);
        var now = new Date();
        if (codeweekDate > now) {
            $('#countdown').countdown({
                until: codeweekDate,
                layout:
                    '<div class="day">{dnn}</div>' +
                    '<div class="separator">:</div>' +
                    '<div class="hours">{hnn}</div>' +
                    '<div class="separator">:</div>' +
                    '<div class="minutes">{mnn}</div>' +
                    '<div class="separator">:</div>' +
                    '<div class="seconds">{snn}</div>'
            });
        }
    });
</script>
