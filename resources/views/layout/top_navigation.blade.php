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

            <nav id="primary-menu">

                <!-- Primary Navigation -->
                <!-- ============================================= -->
                <ul>
                    <li><a href="{{route('home')}}">@lang('menu.home')</a></li>
                    <li class=""><a href="{{route('events_map')}}">@lang('menu.events')</a></li>
                    <li class=""><a href="{{route('ambassadors')}}">@lang('menu.ambassadors')</a></li>
                    <li><a href="/resources/">@lang('menu.resources')</a></li>
                    <li><a href="{{route('schools')}}">@lang('menu.schools')</a></li>
                    <li><a href="/about/">@lang('menu.about')</a></li>
                    <li><a href="http://blog.codeweek.eu/">@lang('menu.news')</a></li>
                </ul>

                <!-- Top Search -->
                <!-- ============================================= -->
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="/search" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="@lang('menu.search')">
                    </form>
                </div><!-- #top-search end -->

            </nav>
            <!-- #primary-menu end -->
        </div>
    </div>
</header>

@if (Route::getCurrentRoute()->uri() != 'home'  && Route::getCurrentRoute()->uri() != '/')

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


                    <ul class="nav navbar navbar-right nobottommargin">
                        <li class="dropdown">


                            @if (Auth::check())
                                <a href="/profile" class="dropdown-toggle avatar" data-toggle="dropdown">
                                    @lang('menu.hello'), {{ Auth::user()->firstname }}
                                    <img src="{{Auth::user()->avatar}}" alt="{{ Auth::user()->name }}" class="img-circle"
                                         height="30" width="30">
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu profile-menu" role="menu">

                                    @role('ambassador|super admin')
                                    <li>
                                        <a href="{{route('profile')}}">
                                            <i class="fa fa-user"></i>
                                            <span class="menu-li-item">@lang('menu.profile')</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('pending')}}">
                                            <i class="fa fa-calendar"></i>
                                            <span class="menu-li-item">@lang('menu.pending')</span>
                                        </a>
                                    </li>
                                    @endrole

                                    <li>
                                        <a href="{{route('my_events')}}">
                                            <i class="fa fa-calendar"></i>
                                            <span class="menu-li-item">@lang('menu.your_events')</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('certificates')}}">
                                            <i class="fa fa-file"></i>
                                            <span class="menu-li-item">@lang('menu.your_certificates')</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/events_to_report">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <span class="menu-li-item">@lang('menu.report')</span>
                                        </a>
                                    </li>

                                    @role('super admin')
                                    <li>
                                        <a href="{{route('activities')}}">
                                            <i class="fa fa-list"></i>
                                            <span class="menu-li-item">Activities</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('volunteers')}}">
                                            <i class="fa fa-users"></i>
                                            <span class="menu-li-item">Volunteers</span>
                                        </a>
                                    </li>
                                    @endrole

                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>
                                            <span class="menu-li-item">{{ __('menu.logout') }}</span>
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>



                                </ul>
                            @else
                                <a href="/login" class="signin">
                                    <i class="fa fa-sign-in"></i>
                                    @lang('menu.signin')</a>
                            @endif
                            {{--{% endif %}--}}
                        </li>

                        {{--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('base.languages.' . App::getLocale())
                                <b class="caret"></b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($locales as $key => $value)
                                    <a class="dropdown-item" href="/setlocale/?locale={{$value}}">@lang('base.languages.' . $value)</a>
                                @endforeach
                            </div>
                        </li>--}}

                    </ul>
                </nav>

                <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

            </div>

        </div>

    </div>
@endif




