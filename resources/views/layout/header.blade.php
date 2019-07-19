<!-- Header -->
<header id="header">
    <div id="logo-wrapper">
        <a id="primary-menu-trigger" href="/"><img class="menu" src="/images/menu.svg"><img class="close hide" src="/images/close_menu.svg"></a>
        <a id="logo" href="/"><img src="/images/logo.svg" alt="CodeWeek"></a>
    </div>
    <nav id="primary-menu">
        <ul>
            <li>
                <a href="#">@lang('menu.events')</a>
                <ul>
                    <li><a href="{{route('events_map')}}">@lang('menu.map')</a></li>
                    <li><a href="{{route('create_event')}}">@lang('menu.add_event')</a></li>
                    <li><a href="{{route('scoreboard')}}">@lang('event.scoreboard_by_country')</a></li>
                </ul>
            </li>
            <li><a href="/">@lang('menu.ambassadors')</a></li>
            <li>
                <a href="#">@lang('menu.resources')</a>
                <ul>
                    <li><a href="{{route('resources_learn')}}">@lang('menu.learn')</a></li>
                    <li><a href="{{route('resources_teach')}}">@lang('menu.teach')</a></li>
                    <li><a href="{{route('toolkits')}}">@lang('menu.toolkits')</a></li>
                </ul>
            </li>
            <li>
                <a href="#">@lang('menu.schools')</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('schools')}}">@lang('menu.why')?</a></li>
                    <li><a href="{{route('training.index')}}">@lang('menu.training')</a></li>
                    <li><a href="{{route('codeweek4all')}}">CODE WEEK 4 ALL</a></li>
                </ul>
            </li>
            <li><a href="/">@lang('menu.about')</a></li>
            <li><a href="/">@lang('menu.blog')</a></li>
        </ul>
    </nav>
    <div id="right-menu">
        @if (Auth::check())
            <div class="round-button-user-menu menu-trigger user-menu">
                <a href="#">
                    <img src="/images/user.svg" class="button-icon">
                </a>
                <ul class="menu-dropdown">
                    @role('ambassador|super admin')
                    <li>
                        <img src="/images/user_menu_profile.svg" class="icon">
                        <a href="{{route('profile')}}">
                            <i class="fa fa-user"></i>
                            @lang('menu.profile')
                        </a>
                    </li>
                    <li>
                        <img src="/images/user_menu_pending_events.svg" class="icon">
                        <a href="{{route('pending')}}">
                            <i class="fa fa-calendar"></i>
                            @lang('menu.pending')
                        </a>
                    </li>
                    @endrole
                    <li>
                        <img src="/images/user_menu_your_events.svg" class="icon">
                        <a href="{{route('my_events')}}">
                            <i class="fa fa-calendar"></i>
                            @lang('menu.your_events')
                        </a>
                    </li>
                    <li>
                        <img src="/images/user_menu_certificates.svg" class="icon">
                        <a href="{{route('certificates')}}">
                            <i class="fa fa-file"></i>
                            @lang('menu.your_certificates')
                        </a>
                    </li>
                    <li>
                        <img src="/images/user_menu_report_events.svg" class="icon">
                        <a href="/events_to_report">
                            <i class="fa fa-calendar-check-o"></i>
                            @lang('menu.report')
                        </a>
                    </li>
                    <li>
                        <img src="/images/user_menu_certificates.svg" class="icon">
                        <a href="/participation">
                            <i class="fa fa-copy"></i>
                            @lang('menu.participation')
                        </a>
                    </li>
                    @role('super admin')
                    <li>
                        <img src="/images/user_menu_activities.svg" class="icon">
                        <a href="{{route('activities')}}">
                            <i class="fa fa-list"></i>
                            Activities
                        </a>
                    </li>
                    <li>
                        <img src="/images/user_menu_volunteers.svg" class="icon">
                        <a href="{{route('volunteers')}}">
                            <i class="fa fa-users"></i>
                            Volunteers
                        </a>
                    </li>
                    <li>
                        <img src="/images/user_menu_statistics.svg" class="icon">
                        <a href="{{route('stats')}}"><i class="fa fa-thumbs-up"></i> @lang('menu.stats')</a>
                    </li>
                    @endrole

                    <li>
                        <img src="/images/user_menu_logout.svg" class="icon">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                            {{ __('menu.logout') }}
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        @else
            <div class="round-button-sign"><a href="/login">@lang('menu.signin')</a></div>
        @endif

        <div id="tools">
            <div class="round-button menu-trigger lang-menu">
                <a href="#">{{App::getLocale()}}</a>
                <div class="menu-dropdown">
                    <ul>
                        @foreach ($locales as $key => $value)
                            <li>
                                <a class="dropdown-item"
                                   href="/setlocale/?locale={{$value}}">@lang('base.languages.' . $value)</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="round-button menu-trigger facebook-menu">
                <img src="/images/facebook.svg" alt="Facebook" class="button-icon">
                <div class="menu-dropdown">
                    <div class="fb-page" data-width="400"
                         data-href="https://www.facebook.com/codeEU" data-tabs="timeline"
                         data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                         data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/codeEU" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/codeEU">Europe Code Week</a></blockquote>
                    </div>
                </div>
            </div>
            <div class="round-button menu-trigger twitter-menu">
                <img src="/images/twitter.svg" alt="Twitter" class="button-icon">
                <div class="menu-dropdown">
                    <a class="twitter-timeline" href="https://twitter.com/CodeWeekEU" data-width="400"
                       data-height="300" data-chrome="noscrollbar" data-link-color="#E95F28"
                       data-tweet-limit="4"></a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->