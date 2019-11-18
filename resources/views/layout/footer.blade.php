<footer>
    <div class="content">
        <div class="question">
            <div class="text">
                @lang('base.still_have_question') @lang('base.drop_us_a_line')
            </div>
            <div class="get-in-touch">
                <a href="/ambassadors"><div class="button">@lang('base.get_in_touch')</div></a>
                <div>
                    <img src="/images/get_in_touch.svg" class="static-image">
                </div>
            </div>

        </div>
        <div class="about">
            <img src="/images/EU_logo.png">
            <div class="phrase">
                <div class="text">@lang('base.footer_msg')</div>
                <div class="text"><a href="{{route('privacy')}}">@lang('footer.privacy_policy')</a> - <a href="https://ec.europa.eu/info/cookies_{{App::getLocale()}}" target="_blank">@lang('footer.cookies_policy')</a></div>
            </div>
            <img src="/images/logo.svg" class="logo_footer">
            <img src="/images/bubbles_footer.svg" class="static-image bubbles_footer">
        </div>

    </div>
</footer>