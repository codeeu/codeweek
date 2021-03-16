<header class="hackathons">
    <div id="logo-wrapper">
        <a id="primary-menu-trigger" href="/"><img class="menu" src="/images/menu.svg">
            <img class="close hide" src="/images/close_menu.svg">
        </a>
        <a id="logo" href="/"><img src="/images/minilogo.svg" alt="CodeWeek"></a>
    </div>
    <div class="hackathons-content-header">
        <nav id="secondary-menu">
            <ul>

                @if($enabled_language !== "en")
                    <li>

                        <div class="round-button menu-trigger lang-menu">

                            <a href="javascript:void(null);"><img src="/images/tick.svg" class="static-image"> Choose
                                your language</a>
                            <div class="menu-dropdown">
                                <ul style="width: 410px;">
                                    @foreach ($locales as $key => $value)
                                        @if($value == "en" || $value == $enabled_language)
                                            <li>
                                                <a class="dropdown-item"
                                                   href="/setlocale/?locale={{$value}}">@lang('base.languages_menu.' . $value)</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @endif

                <li>
                    <a href="https://codeweek.eu"><img src="/images/tick.svg" class="static-image">TO CODEWEEK.EU</a>
                </li>


            </ul>
        </nav>
        <nav id="primary-menu">
            <ul>
                <li>
                    <a href="#challenge">The challenge</a>
                </li>
                <li>
                    <a href="#programme">Programme</a>
                </li>
                <li>
                    <a href="#programme">Practical info</a>
                </li>
                <li>
                    <a href="#jury-mentors">Jury & Mentors</a>
                </li>
                <li>
                    <a href="#side-events">Side events</a>
                </li>
                <li>
                    <a href="#about-codeweek">About CODEWEEK.EU</a>
                </li>
            </ul>
        </nav>
    </div>


    <div id="right-menu">
        <div id="hackathons-register-button">
            <a target="_blank" href="{{$registration_link}}">REGISTER</a>
        </div>
    </div>
</header>
