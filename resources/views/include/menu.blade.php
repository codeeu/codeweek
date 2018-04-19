<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Event</a>
            <ul class="dropdown-menu animated fadeOutUp">
                <li><a href="{{route('create_event')}}">Add</a></li>
                <li><a href="{{route('search_event')}}">Search</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
            <ul class="dropdown-menu animated fadeOutUp">
                <li><a href="{{route('scoreboard')}}">Scoreboard</a></li>
                <li><a href="{{route('guide')}}">Guide</a></li>
                <li><a href="{{route('ambassadors')}}">Ambassadors</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('school.school')</a>
            <ul class="dropdown-menu animated fadeOutUp">
                <li><a href="{{route('school.create')}}">@lang('school.add')</a></li>
                <li><a href="{{route('school.index')}}">@lang('school.list')</a></li>
            </ul>
        </li>

        <li class="dropdown">


            <ul class="">

                <form method="get" action="/setlocale/">

                    <select class="form-control custom-select custom-select-sm" name="locale"
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

                <!-- Authentication Links -->

            </ul>

        </li>


        <!--<li><a  href="javascript:void(0)"  data-toggle="modal" data-target="#signup">Sign In</a></li>-->
    </ul>
</div>

<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">

    @if (Auth::check())
        <li class="no-pd dropdown">
            <a href="#" class="addlist"><img src="{{Auth::user()->avatar_path}}"
                                             class="img-responsive img-circle avater-img"
                                             alt=""/><strong>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</strong></a>
            <ul class="dropdown-menu animated navbar-left fadeOutUp">
                @role('ambassador|super admin')
                <li><a href="{{route('pending')}}">Pending Events</a></li>
                @endrole

                <li><a href="{{route('profile')}}">Profile</a></li>
                <li><a href="{{route('my_events')}}">My Events</a></li>
                @role('super admin')
                <li><a href="{{route('activities')}}">Activities</a></li>
                @endrole

                <li>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </li>
    @else

        <li><a class="addlist" href="{{route('login')}}">Sign In</a></li>
    @endif


</ul>
<!-- /.navbar-collapse -->