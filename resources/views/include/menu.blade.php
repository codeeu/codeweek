<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
        <li class="dropdown">
            <a href="login.html" class="dropdown-toggle" data-toggle="dropdown">Event</a>
            <ul class="dropdown-menu animated fadeOutUp">
                <li><a href="{{route('create_event')}}">Add</a></li>
                <li><a href="{{route('search_event')}}">Search</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="login.html" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
            <ul class="dropdown-menu animated fadeOutUp">
                <li><a href="{{route('scoreboard')}}">Scoreboard</a></li>
                <li><a href="{{route('guide')}}">Guide</a></li>
                <li><a href="{{route('ambassadors')}}">Ambassadors</a></li>
                <li><a href="{{route('schools')}}">Schools</a></li>
            </ul>
        </li>

        <li class="dropdown">


            <ul class="">

                <form method="get" action="/setlocale/">

                    <select class="form-control custom-select custom-select-sm" name="locale" onchange="this.form.submit()" >
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
<!-- /.navbar-collapse -->