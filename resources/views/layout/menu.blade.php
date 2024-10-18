<header>
    <div id="logo-wrapper">
        <a id="primary-menu-trigger" href="/"><img class="menu" src="/images/menu.svg"><img class="close hide"
                                                                                            src="/images/close_menu.svg"></a>
        <a id="logo" href="/"><img src="/images/logo.svg" alt="CodeWeek"></a>
    </div>
    <nav id="primary-menu">
        <ul>
            <li>
                <a href="javascript:void(null);">@lang('menu.events')</a>
                <ul>
                    {{--                    <li><a href="{{route('codeweek2020')}}">Codeweek 2020</a></li>--}}
                    <li><a href="{{route('events_map')}}">@lang('menu.map')</a></li>
                    <li><a href="{{route('featured_activities')}}">@lang('menu.featured_activities')</a></li>
                    <li><a href="{{route('create_event')}}">@lang('menu.add_event')</a></li>
                    <li><a href="{{route('scoreboard')}}">@lang('event.scoreboard_by_country')</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(null);">@lang('menu.resources')</a>
                <ul>
                    <li><a href="{{route('coding@home')}}">@lang('menu.coding@home')</a></li>
                    <li><a href="/podcasts">Podcasts</a></li>
                    <li><a href="{{route('hackathons')}}">Hackathons</a></li>
                    <li><a href="{{route('online-courses')}}">Online Courses</a></li>
                    <li><a href="{{route('training.index')}}">@lang('menu.training')</a></li>
                    <li><a href="{{route('challenges')}}">@lang('menu.challenges')</a></li>
                    <li><a href="{{route('dance')}}">@lang('snippets.dance.menu')</a></li>
                    <li><a href="{{route('resources_learn')}}">@lang('menu.learn')</a></li>
                    <li><a href="{{route('resources_teach')}}">@lang('menu.teach')</a></li>
                    <li><a href="{{route('toolkits')}}">@lang('menu.toolkits')</a></li>

                </ul>
            </li>

            {{--            <li><a href="{{route('ambassadors')}}">@lang('menu.ambassadors')</a></li>--}}
            <li><a href="{{route('community')}}">@lang('community.titles.0')</a></li>

            <li>
                <a href="javascript:void(null);">@lang('menu.schools')</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('schools')}}">@lang('menu.why')?</a></li>
                    <li><a href="/remote-teaching">@lang('remote-teaching.remote-teaching')</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(null);">@lang('menu.about')</a>
                <ul>
                    <li><a href="/about">Code Week</a></li>

                    <li><a href="{{route('codeweek4all')}}">Code Week 4 All</a></li>
                    <li><a href="/treasure-hunt">@lang('snippets.treasure-hunt.menu')</a></li>
                    <li><a href="/why-coding">@lang('why-coding.titles.0')</a></li>
                    <li><a href="/our-values">@lang('menu.values')</a></li>
                    <li><a href="/partners">@lang('about.partners_and_sponsors')</a></li>
                </ul>
            </li>
            <li><a href="/blog/" target="_blank" rel="noreferer noopener">@lang('menu.blog')</a></li>
        </ul>
    </nav>
    <div id="right-menu">
        @if (Auth::check())
            <div class="round-button-user-menu menu-trigger user-menu">
                <a href="javascript:void(null);">
                    <img src="/images/user.svg" class="button-icon">
                </a>
                <ul class="menu-dropdown">
                    <li>
                        <img src="/images/user_menu_profile.svg" class="icon">
                        <a href="{{route('profile')}}">
                            @lang('menu.profile')
                        </a>
                    </li>
                    <li>
                        <img src="{{asset('svg/address-book.svg')}}" class="static-image">
                        <a href="{{route('activities-locations')}}">
                            Activities Locations
                        </a>
                    </li>
                    @role('super admin|leading teacher')
                    <li class="p-1 text-orange-600 rounded">

                        <img src="/images/user_menu_badges.svg">

                        <a href="{{route('my-badges')}}">
                            My Badges
                        </a>
                    </li>
                    @endrole
                    @role('ambassador')
                    <li>
                        <img src="/images/user_menu_volunteers.svg" class="icon">
                        <a href="{{route('admin.online-events')}}">
                            @lang('menu.online_events')
                        </a>
                    </li>

                    @endrole
                    @role('super admin')
                    <li>
                        <img src="/images/user_menu_volunteers.svg" class="icon">
                        <a href="{{route('promoted_events')}}">
                            @lang('menu.online_events')
                        </a>
                    </li>

                    @endrole

{{--                    @role('super admin')--}}
{{--                    <li>--}}
{{--                        <img src="/images/user_menu_pending_events.svg" class="icon">--}}
{{--                        <a href="{{route('pending')}}">--}}
{{--                            @lang('menu.pending') v1--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @endrole--}}

                    @role('ambassador|super admin')
                    <li>
                        <img src="/images/user_menu_pending_events.svg" class="icon">
                        <a href="{{route('pending')}}">
                            @lang('menu.pending')
                        </a>
                    </li>
                    @endrole


                    <li>
                        <img src="/images/user_menu_your_events.svg" class="icon">
                        <a href="{{route('my_events')}}">
                            @lang('menu.your_events')
                        </a>
                    </li>
                    <li>
                        <img src="/images/user_menu_certificates.svg" class="icon">
                        <a href="{{route('certificates')}}">
                            @lang('menu.your_certificates')
                        </a>
                    </li>
                    <li>
                        <img src="/images/user_menu_report_events.svg" class="icon">
                        <a href="/events_to_report">
                            @lang('menu.report')
                        </a>
                    </li>
                    <li>
                        <img src="/images/user_menu_certificates.svg" class="icon">
                        <a href="/participation">
                            @lang('menu.participation')
                        </a>
                    </li>
                    @role('super admin')
                    <li>
                        <img src="/images/user_menu_activities.svg" class="icon">
                        <a href="{{route('excellence_winners')}}">
                            Excellence Winners
                        </a>
                    </li>
                    @endrole

                    @role('super admin|leading teacher admin')
                    <li class="p-1 text-orange-600 rounded">

                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none"/>
                            <path d="M2 6h12v2H2zm0 4h12v2H2zm0 4h8v2H2zm14.01 3L13 14l-1.5 1.5 4.51 4.5L23 13l-1.5-1.5z"
                                  fill="#FE6824"/>
                        </svg>

                        <a href="{{route('leading_teachers_list')}}">
                            Leading Teachers
                        </a>
                    </li>

                    <li class="p-1 text-orange-600 rounded">

                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" height="24">
                            <path fill="#FE6824"
                                  d="M22 7h-5.67V4v0c0-.56-.45-1-1-1H8.66v0c-.56 0-1 .44-1 1v7H1.99v0c-.56 0-1 .44-1 1v8 0c0 .55.44 1 1 1h20v0c.55 0 1-.45 1-1V8v0c0-.56-.45-1-1-1ZM7.66 19H2.99v-6h4.66Zm6.666 0h-4.67V5h4.66Zm6.66 0h-4.67V9h4.66Z"
                            />
                        </svg>

                        <a href="{{route('badges-leaderboard-year')}}">
                            Badges Leaderboard
                        </a>
                    </li>

                    @endrole

                    <li>
                        <img src="/images/user_menu_logout.svg" class="icon">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
            <div class="round-button-sign">
                <a href="/login">
                    <img src="/images/sign-in.svg" alt="Sign-in" class="button-icon">
                </a>
            </div>
        @endif

        <div id="tools">
            <div class="round-button menu-trigger lang-menu">
                <a href="javascript:void(null);">{{App::getLocale()}}</a>
                <div class="menu-dropdown">
                    <ul>
                        @foreach ($locales as $key => $value)
                            <li>
                                <a class="dropdown-item"
                                   href="/setlocale/?locale={{$value}}">@lang('base.languages_menu.' . $value)</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
{{--            @if(!isset(Request::header()["dnt"]))--}}
{{--                @if (Cookie::get('codeweek_cookie_consent') == 1)--}}
{{--                    <div class="round-button menu-trigger facebook-menu">--}}
{{--                        <img src="/images/facebook.svg" alt="Facebook" class="button-icon">--}}
{{--                        <div class="menu-dropdown">--}}
{{--                            <div class="fb-page" data-width="400"--}}
{{--                                 data-href="https://www.facebook.com/codeEU" data-tabs="timeline"--}}
{{--                                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"--}}
{{--                                 data-show-facepile="true">--}}
{{--                                <blockquote cite="https://www.facebook.com/codeEU" class="fb-xfbml-parse-ignore"><a--}}
{{--                                            href="https://www.facebook.com/codeEU">EU Code Week</a></blockquote>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="round-button menu-trigger twitter-menu">--}}
{{--                        <img src="/images/x-twitter.svg" alt="Twitter" class="button-icon">--}}
{{--                        <div class="menu-dropdown">--}}
{{--                            <a class="twitter-timeline" href="https://twitter.com/CodeWeekEU" data-width="400"--}}
{{--                               data-height="300" data-chrome="noscrollbar" data-link-color="#E95F28"--}}
{{--                               data-tweet-limit="4"></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endif--}}
        </div>
    </div>
</header>
