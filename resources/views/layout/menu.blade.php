<header class="sticky top-0 pt-16 md:pt-12 !px-5 md:!px-0 pb-5 z-[1000] border-b-[3px] border-primary">
    <div class="codeweek-container-lg flex items-center gap-6">
        <div id="logo-wrapper" class="relative w-full flex justify-center sm:block sm:w-auto">
            <a id="primary-menu-trigger" class="absolute sm:static sm:pr-6 -left-6 top-1/2 -translate-y-1/2 sm:translate-y-0" href="/">
                <img class="menu" src="/images/menu_icon.svg">
                <img class="close hide" src="/images/close_menu_icon.svg">
            </a>
            <a id="logo" href="/">
                <img src="/images/logo_icon.svg" alt="CodeWeek">
            </a>
        </div>
        <nav id="primary-menu" class="flex-grow font-['Montserrat']">
            <ul class="max-xl:flex max-xl:flex-col max-xl:!items-start max-xl:overflow-auto main-menu">
                <li class="!pt-16 md:!pt-12 pb-5 xl:hidden max-xl:w-full">
                    <div class="relative flex justify-center">
                      <a id="primary-menu-trigger" class="absolute xl:static left-0 sm:left-5 top-1/2 sm:top-2 -translate-y-1/2 sm:translate-y-0" href="/">
                          <img class="close hide" src="/images/close_menu_icon.svg">
                      </a>
                      <a id="logo" href="/">
                          <img src="/images/logo_icon.svg" alt="CodeWeek">
                      </a>
                    </div>
                </li>

                <li class="xl:hidden">
                    <a
                        class="flex items-center gap-1 !text-[#1C4DA1] !text-[16px] font-semibold"
                        href="javascript:void(null);"
                    >
                        @lang('menu.select_language')
                        <img src="/images/chevron-down-icon.svg" alt="">
                    </a>

                    <ul class="sub-menu lang-list">
                        @foreach ($locales as $key => $value)
                            <li class="w-40">
                                <a href="/setlocale/?locale={{$value}}">@lang('base.languages_menu.' . $value)</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a
                        class="flex items-center gap-1 !text-[#1C4DA1] !text-[16px] font-semibold"
                        href="javascript:void(null);"
                    >
                        @lang('menu.events')
                        <img src="/images/chevron-down-icon.svg" alt="">
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('events_map')}}">@lang('menu.map')</a></li>
                        <li><a href="{{route('featured_activities')}}">@lang('menu.featured_activities')</a></li>
                        <li><a href="{{route('create_event')}}">@lang('menu.add_event')</a></li>
                        <li><a href="{{route('scoreboard')}}">@lang('event.scoreboard_by_country')</a></li>
                    </ul>
                </li>

                <li>
                    <a
                        class="flex items-center gap-1 !text-[#1C4DA1] !text-[16px] font-semibold"
                        href="javascript:void(null);"
                    >
                        @lang('menu.resources')
                        <img src="/images/chevron-down-icon.svg" alt="">
                    </a>
                    <ul class="sub-menu">
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

                <li class="menu-item">
                    <a class="!text-[#1C4DA1] !text-[16px] font-semibold" href="{{route('community')}}">
                        @lang('community.titles.0')
                    </a>
                </li>

                <li>
                    <a
                        class="flex items-center gap-1 !text-[#1C4DA1] !text-[16px] font-semibold"
                        href="javascript:void(null);"
                    >
                        @lang('menu.schools')
                        <img src="/images/chevron-down-icon.svg" alt="">
                    </a>
                    <ul class="dropdown-menu sub-menu">
                        <li><a href="{{route('schools')}}">@lang('menu.why')?</a></li>
                        <li><a href="/remote-teaching">@lang('remote-teaching.remote-teaching')</a></li>
                    </ul>
                </li>
                <li>
                    <a
                        class="flex items-center gap-1 !text-[#1C4DA1] !text-[16px] font-semibold"
                        href="javascript:void(null);"
                    >
                        @lang('menu.about')
                        <img src="/images/chevron-down-icon.svg" alt="">
                    </a>
                    <ul class="sub-menu">
                        <li><a href="/about">Code Week</a></li>

                        <li><a href="{{route('codeweek4all')}}">Code Week 4 All</a></li>
                        <li><a href="/treasure-hunt">@lang('snippets.treasure-hunt.menu')</a></li>
                        <li><a href="/why-coding">@lang('why-coding.titles.0')</a></li>
                        <li><a href="/our-values">@lang('menu.values')</a></li>
                        <li><a href="/partners">@lang('about.partners_and_sponsors')</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a
                        class="!text-[#1C4DA1] !text-[16px] font-semibold"
                        href="https://codeweek.eu/blog/"
                        rel="noreferer noopener"
                    >
                        @lang('menu.blog')
                    </a>
                </li>
                <li class="flex-grow flex h-full items-end xl:hidden max-xl:w-full">
                    <div class="flex flex-col gap-4 items-center w-full pb-12 pt-5">
                        <a class="border-2 border-[#1C4DA1] bg-[#1C4DA1] !text-white rounded-full px-6 py-[7px]" href="/search">
                            <span class="text-[16px] leading-[30px] font-semibold">
                                @lang('menu.search_site')
                            </span>
                        </a>
                        @if (Auth::check())
                            <a class="bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300" href="/add">
                                <span class="text-[16px] leading-7 font-semibold">@lang('menu.register_activity')</span>
                            </a>
                        @else
                            <a class="border-2 border-[#1C4DA1] !text-[#1C4DA1] rounded-full px-6 py-[7px]" href="/login">
                                <span class="text-[16px] leading-[30px] font-semibold">
                                    @lang('menu.login') / @lang('menu.signup')
                                </span>
                            </a>
                        @endif
                    </div>
                </li>
            </ul>
        </nav>
        <div id="right-menu" class="flex gap-2">
            <a class="border-2 border-[#1C4DA1] hover:bg-[#E8EDF6] duration-300 rounded-full p-[13px] font-['Blinker']" href="/search">
                <img class="text-dark-blue" src="/images/search-icon.svg" alt="">
            </a>
            @if (Auth::check())
                <div class="bg-[#1C4DA1] rounded-full p-[13px] font-['Blinker'] hover:bg-hover-blue duration-300 round-button-user-menu menu-trigger user-menu">
                    <a href="javascript:void(null);">
                        <img src="/images/user_icon.svg" class="text-white">
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
                <a class="bg-[#1C4DA1] rounded-full p-[13px] font-['Blinker'] hover:bg-[#001E52] duration-300"  href="/login">
                    <img src="/images/user_icon.svg" alt="Sign-in" class="text-white">
                </a>
            @endif

            <a class="max-xl:hidden bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300" href="/add">
                <span class="text-base leading-7 font-semibold text-black normal-case">
                    @lang('menu.register_activity')
                </span>
            </a>

            <div id="tools" class="h-[50px]">
                <div class="menu-trigger lang-menu relative flex items-center gap-1 cursor-pointer px-2 h-full menu-item">
                    <a class="flex items-center gap-1 !text-[#1C4DA1] !text-[16px] font-semibold font-['Montserrat']" href="javascript:void(null);">
                      {{App::getLocale()}}
                      <img class="text-[#1C4DA1]" src="/images/chevron-down-icon.svg" alt="">
                    </a>


                    <div class="menu-dropdown absolute top-14">
                        <ul class="sub-menu">
                            @foreach ($locales as $key => $value)
                                <li>
                                    <a class="dropdown-item !text-lg font-['Montserrat']"
                                       href="/setlocale/?locale={{$value}}">@lang('base.languages_menu.' . $value)</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
