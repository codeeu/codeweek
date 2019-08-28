@section("extra-js")
    <script>

        window.laravelCookieConsent = (function () {

            const COOKIE_VALUE = 1;

            function consentWithCookies() {
                setCookie('{{ $cookieConsentConfig['cookie_name'] }}', COOKIE_VALUE, {{ $cookieConsentConfig['cookie_lifetime'] }});
                hideCookieDialog();
            }

            function cookieExists(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
            }

            function hideCookieDialog() {
                const dialogs = document.getElementsByClassName('cookie-consent-banner');

                for (let i = 0; i < dialogs.length; ++i) {
                    dialogs[i].style.display = 'none';
                }
            }

            function setCookie(name, value, expirationInDays) {
                const date = new Date();
                date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + value + '; ' + 'expires=' + date.toUTCString() +';path=/{{ config('session.secure') ? ';secure' : null }}';
            }

            if(cookieExists('{{ $cookieConsentConfig['cookie_name'] }}')) {
                hideCookieDialog();
            }

            const buttons = document.getElementsByClassName('js-cookie-consent-agree');

            for (let i = 0; i < buttons.length; ++i) {
                buttons[i].addEventListener('click', consentWithCookies);
            }

            return {
                consentWithCookies: consentWithCookies,
                hideCookieDialog: hideCookieDialog
            };
        })();
    </script>
@endsection

@if($cookieConsentConfig['enabled'] && ! $alreadyConsentedWithCookies)

    <div id="cookie-consent-banner" class="codeweek-cookie-consent-banner">
        <h2>@lang("cookie.cookies")</h2>
        <p class="cookie-consent-inform">@lang("cookie.uses_cookies"). @lang("cookie.find_out_more_on")
            <a id="cookie-notice" href="https://ec.europa.eu/info/cookies_{{App::getLocale()}}" target="_blank">@lang("cookie.how_we_use")</a>.
        </p>
        <div class="actions">
            <a class="codeweek-action-link-button"
               style="margin-right: 10px;"
               href="javascript:laravelCookieConsent.consentWithCookies()">@lang("cookie.accept")</a>
            <a class="codeweek-action-link-button"
               href="javascript:laravelCookieConsent.hideCookieDialog()">@lang("cookie.refuse")</a>
        </div>
    </div>



@endif
