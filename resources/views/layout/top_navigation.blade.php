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
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class=""><a href="{{route('events_map')}}">Events</a></li>
                    <li class=""><a href="{{route('ambassadors')}}">Ambassadors</a></li>
                    <li><a href="/resources/">Resources</a></li>
                    <li><a href="{{route('schools')}}">Schools</a></li>
                    <li><a href="/about/">About</a></li>
                    <li><a href="http://blog.codeweek.eu/">News</a></li>
                </ul>

                <!-- Top Search -->
                <!-- ============================================= -->
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="/search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type & hit Enter...">
                    </form>
                </div><!-- #top-search end -->

            </nav>
            <!-- #primary-menu end -->
        </div>
    </div>
</header>

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
                            Map
                        </a>
                    </li>
                    <li>
                        <a href="{{route('create_event')}}">
					<span class="fa-stack fa-lg">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
					</span>
                            Add Event
                        </a>
                    </li>
                    <li>
                        <a href="{{route('search_event')}}">
				<span class="fa-stack fa-lg">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-search fa-stack-1x fa-inverse"></i>
				</span>
                            Search Events
                        </a>
                    </li>



                </ul>


                <ul class="nav navbar navbar-right nobottommargin">
                    <li class="dropdown pull-right">


                        @if (Auth::check())
                            <a href="/profile" class="dropdown-toggle avatar" data-toggle="dropdown">
                                Hello, {{ Auth::user()->firstname }}
                                <img src="{{Auth::user()->avatar}}" alt="{{ Auth::user()->name }}" class="img-circle"
                                     height="30" width="30">
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu profile-menu" role="menu">
                                <li><a href="{{route('profile')}}">Profile</a></li>
                                @role('ambassador|super admin')
                                <li><a href="{{route('pending')}}">Pending Events</a></li>
                                @endrole

                                <li><a href="{{route('my_events')}}"><i
                                                class="fa fa-user"></i> Your events</a></li>
                                <li><a href="{{route('certificates')}}"><i
                                                class="fa fa-user"></i> Your certificates</a></li>
                                <li><a href="/events_to_report"><i
                                                class="fa fa-user"></i> Report your events</a></li>


                                @role('super admin')
                                <li><a href="{{route('activities')}}">Activities</a></li>
                                <li><a href="{{route('volunteers')}}">Volunteers</a></li>
                                @endrole
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>



                            </ul>
                        @else
                            <a href="/login" class="signin">
                                <i class="fa fa-sign-in"></i>
                                Sign in</a>
                        @endif
                        {{--{% endif %}--}}
                    </li>


                    <li>
                        <form class="inline" method="get" action="/setlocale/">

                            <select class="custom-select custom-select-sm" name="locale"
                                    onchange="this.form.submit()">
                                @foreach ($locales as $key => $value)
                                    <option value="{{ $value }}"
                                            @if ($value == session('locale'))
                                            selected="selected"
                                            @endif
                                    >{{ $value }}</option>
                                @endforeach
                            </select>

                        </form>
                    </li>
                </ul>
            </nav>

            <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

        </div>

    </div>

</div>




