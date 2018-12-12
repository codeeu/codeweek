<!-- Header -->
<header id="header" class="page-section full-header">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo -->
            <div id="logo">
                <a href="/" class="standard-logo" data-dark-logo="/img/codeweekeu.png"><img src="/img/codeweekeu.png"
                                                                                            alt="CodeWeekES"></a>
                <a href="/" class="retina-logo" data-dark-logo="/img/codeweekeu.png"><img src="/img/codeweekeu.png"
                                                                                          alt="CodeWeekES"></a>
            </div>

            <!-- Main Menu -->
            <nav id="primary-menu">
                <ul>
                    <li class=""><a href="{{route('events_map')}}">@lang('menu.events')</a></li>
                    <li class=""><a href="{{route('ambassadors')}}">@lang('menu.ambassadors')</a></li>
                    <li><a href="/resources/">@lang('menu.resources')</a></li>
                    <li><a href="{{route('schools')}}">@lang('menu.schools')</a></li>
                    <li><a href="/about/">@lang('menu.about')</a></li>
                    <li><a href="http://blog.codeweek.eu/">@lang('menu.news')</a></li>
                </ul>

            </nav>

            <!-- Twitter Feed -->
            <div id="twitter-feed">
                <ul class="nav navbar navbar-right nobottommargin">
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 60px;display: flex;align-items: center;">
                            <i class="fa fa-twitter"></i>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu twitter-menu" role="menu" style="width: 400px;height: 820px;overflow: auto;">
                            <a class="twitter-timeline" href="https://twitter.com/CodeWeekEU" data-width="400" data-height="300" data-chrome="noscrollbar" data-link-color="#E95F28" data-tweet-limit="4"></a>
                            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </ul>
                    </li>
                </ul>
            </div>


            <!-- Language Menu -->
            <div id="top-language">
                <ul class="nav navbar navbar-right nobottommargin">
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            <span class="name">@lang('base.languages.' . App::getLocale())</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu language-menu" role="menu">
                            <ul>
                                @foreach ($locales as $key => $value)
                                    <li>
                                        <a class="dropdown-item"
                                           href="/setlocale/?locale={{$value}}">@lang('base.languages.' . $value)</a>
                                    </li>
                                @endforeach
                            </ul>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- User Menu -->
            <div id="top-login">
                @if (Auth::check())
                    <ul class="nav navbar navbar-right nobottommargin">
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                @if(empty(Auth::user()->avatar))
                                    <img src="{{Auth::user()->avatar}}" alt="{{ Auth::user()->name }}"
                                         class="img-circle"
                                         height="30" width="30">
                                @else
                                    <i class="fa fa-user-circle"></i>
                                @endif

                                <span class="name">{{ Auth::user()->firstname }}</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu profile-menu" role="menu">

                                @role('ambassador|super admin')
                                <li>
                                    <a href="{{route('profile')}}">
                                        <i class="fa fa-user"></i>
                                        @lang('menu.profile')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('pending')}}">
                                        <i class="fa fa-calendar"></i>
                                        @lang('menu.pending')
                                    </a>
                                </li>
                                @endrole

                                <li>
                                    <a href="{{route('my_events')}}">
                                        <i class="fa fa-calendar"></i>
                                        @lang('menu.your_events')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('certificates')}}">
                                        <i class="fa fa-file"></i>
                                        @lang('menu.your_certificates')
                                    </a>
                                </li>
                                <li>
                                    <a href="/events_to_report">
                                        <i class="fa fa-calendar-check-o"></i>
                                        @lang('menu.report')
                                    </a>
                                </li>

                                @role('super admin')
                                <li>
                                    <a href="{{route('activities')}}">
                                        <i class="fa fa-list"></i>
                                        Activities
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('volunteers')}}">
                                        <i class="fa fa-users"></i>
                                        Volunteers
                                    </a>
                                </li>
                                <li><a href="{{route('stats')}}"><i class="fa fa-thumbs-up"></i> @lang('menu.stats')</a></li>
                                @endrole

                                <li>
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
                        </li>
                    </ul>
                @else
                    <a href="/login" class="signin" style="text-align: center;">
                        <i class="fa fa-sign-in"></i>
                        <span class="login_text">@lang('menu.signin')</span>
                    </a>
                @endif
            </div>


        </div>
    </div>
</header>

@if (Route::getCurrentRoute() && Route::getCurrentRoute()->uri() != 'home'  && Route::getCurrentRoute()->uri() != '/')

    <div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title">CodeWeek <span>EU</span></div>

                <nav class="one-page-menu eventsm">

                    <ul class="nav navbar navbar-left" role="menu">

                        <li>
                            <a href="{{route('events_map')}}" class="first" id="zoomEU">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                </span>
                                @lang('menu.map')
                            </a>
                        </li>

                        <li>
                            <a href="{{route('create_event')}}">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                                </span>
                                @lang('menu.add_event')
                            </a>
                        </li>

                        <li>
                            <a href="{{route('search_event')}}">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                                </span>
                                @lang('menu.search_event')
                            </a>
                        </li>

                    </ul>

                </nav>

                <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

            </div>

        </div>

    </div>

@endif




