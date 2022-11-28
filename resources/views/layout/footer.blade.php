<footer>
    <div class="content">
        <div class="question">
            <div class="text">
                @lang('base.still_have_question') @lang('base.drop_us_a_line')
            </div>
            <div class="get-in-touch">
                @if(Route::current() && (Route::current()->getName() == 'community' || Route::current()->getName() == 'ambassadors'))
                    <a href="mailto:info@codeweek.eu">
                        <div class="button">@lang('base.get_in_touch')</div>
                    </a>
                @else
                    <a href="/ambassadors">
                        <div class="button">@lang('base.get_in_touch')</div>
                    </a>
                @endif

                <div>
                    <img src="/images/get_in_touch.svg" class="static-image">
                </div>
            </div>

        </div>
        <div class="about">
            <img src="/images/EU_logo.png">
            <div class="phrase">
                <div class="text">@lang('base.footer_msg')</div>
                <div class="text"><a
                            href="{{route('privacy')}}">{{ucfirst(mb_strtolower(__('privacy-statement.title'),'UTF-8'))}}</a> - <a
                            href="{{route('cookie')}}">@lang('cookie_policy.title')</a></div>
            </div>
            <img src="/images/logo.svg" class="logo_footer">
            <img src="/images/bubbles_footer.svg" class="static-image bubbles_footer">
        </div>
        <div class="social-media-buttons">
            <div class="social-network">
                <a href="https://t003c459d.emailsys2a.net/26/4369/b41355c7db/subscribe/form.html?_g=1663162661"
                   target="_blank" rel="noreferer, noopener">
                    <div style="margin-right: 2px">
                        <svg style="margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" height="24"
                             viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none"/>
                            <path fill="#a2a2a2"
                                  d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 4.99L4 6h16zm0 12H4V8l8 5 8-5v10z"/>
                        </svg>
                    </div>
                    @lang('base.newsletter')
                </a>
            </div>
            <div class="social-network">
                <a href="https://www.facebook.com/codeEU/" target="_blank" rel="noreferer, noopener">
                    <div style="margin-right: 2px"><img src="/images/facebook.svg" alt="Facebook" class="button-icon">
                    </div>
                    Facebook
                </a>
            </div>
            <div class="social-network">
                <a href="https://twitter.com/CodeWeekEU" target="_blank" rel="noreferer, noopener">
                    <div style="margin-right: 4px"><img src="/images/twitter.svg" alt="Twitter" class="button-icon">
                    </div>
                    Twitter
                </a>
            </div>
            <div class="social-network">
                <a href="https://www.instagram.com/codeweekeu/" target="_blank" rel="noreferer, noopener">
                    <div style="margin-right: 4px"><img src="/images/instagram.svg" alt="Instagram" class="button-icon">
                    </div>
                    Instagram
                </a>
            </div>

            <div class="social-network">
                <a href="https://www.youtube.com/channel/UCw30ZaWtCvGb4yudW6tCXAA" target="_blank"
                   rel="noreferer, noopener">
                    <div style="margin-right: 4px"><img src="/images/youtube.svg" alt="Youtube" class="button-icon">
                    </div>
                    Youtube
                </a>
            </div>

            <div class="social-network">
                <a href="https://github.com/codeeu/codeweek" target="_blank" rel="noreferer, noopener">
                    <div style="margin-right: 4px"><img src="/images/github.svg" alt="Github" class="button-icon">
                    </div>
                    Github
                </a>
            </div>

            <div class="social-network">
                <a href="https://www.linkedin.com/company/codeweek/" target="_blank" rel="noreferer, noopener">
                    <div style="margin-right: 4px"><img src="/images/linkedin.svg" alt="LinkedIn" class="button-icon">
                    </div>
                    LinkedIn
                </a>
            </div>
        </div>

    </div>
</footer>
