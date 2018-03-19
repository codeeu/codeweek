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
                    <li><a href="/">Home</a></li>
                    <li class=""><a href="{{url('/')}}">Events</a></li>
                    <li class=""><a href="{{url('ambassadors')}}">Ambassadors</a></li>
                    <li><a href="/resources/">Resources</a></li>
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
                        <a href="/" class="first" id="zoomEU">
					<span class="fa-stack fa-lg">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
					</span>
                            Map
                        </a>
                    </li>
                    <li>
                        <a href="{{route('create_event')}}" class="{% current 'web.create_event' %}">
					<span class="fa-stack fa-lg">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
					</span>
                            Add Event
                        </a>
                    </li>
                    <li>
                        <a href="{{route('search_events')}}" class="{% current 'web.search_events' %}">
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



                        {{--{% if user.profile.is_ambassador %}--}}
                        {{--<li>--}}
                        {{--{% if user.profile.country %}--}}
                        {{--<a href="{% url 'web.pending_events' user.profile.country %}">--}}
                        {{--<i class="fa fa-clock-o"></i>--}}
                        {{--{% if user.is_staff %}--}}
                        {{--Pending events--}}
                        {{--{% else %}--}}
                        {{--Pending events in {{ user.profile.country.name }}--}}
                        {{--{% endif %}</a>--}}
                        {{--{% else %}--}}
                        {{--<a href="{% url 'profile' %}"><i class="fa fa-map-marker"></i>--}}
                        {{--Set your country</a>--}}
                        {{--{% endif %}--}}
                        {{--</li>--}}
                        {{--<li><a href="{% url 'profile' %}"><i class="fa fa-pencil-square-o"></i>--}}
                        {{--Edit your profile</a></li>--}}
                        {{--<li class="divider"></li>--}}
                        {{--{% endif %}--}}



                        @if (Auth::check())
                            <a href="/profile" class="dropdown-toggle avatar" data-toggle="dropdown">
                                Hi, {{ Auth::user()->name }}
                                <img src="{{Auth::user()->avatar}}" alt="{{ Auth::user()->name }}" class="img-circle" height="30" width="30">
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu profile-menu" role="menu">
                                <li><a href="/created_events"><i
                                                class="fa fa-user"></i> Your events</a></li>
                                <li><a href="/events_to_report"><i
                                                class="fa fa-user"></i> Report your events</a></li>
                                <li><a href="/logout"><i
                                                class="fa fa-sign-out"></i> Sign out</a></li>
                            </ul>
                        @else
                            <a href="/login" class="signin">
                                <i class="fa fa-sign-in"></i>
                                Sign in</a>
                        @endif
                        {{--{% endif %}--}}
                    </li>
                </ul>
            </nav>

            <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

        </div>

    </div>

</div>




