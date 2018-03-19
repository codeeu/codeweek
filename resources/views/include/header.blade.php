<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="ti-align-left"></i>
        </button>

        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img src="{{asset('img/codeweek-logo.png')}}" class="logo logo-display" alt="">
                <img src="{{asset('img/codeweek-logo.png')}}" class="logo logo-scrolled" alt="">
            </a>
        </div>

        @include('include.menu')

        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">

            @if (Auth::check())
                <li class="no-pd dropdown">
                    <a href="add-listing.html" class="addlist"><img src="{{asset('img/avatar.jpg')}}" class="img-responsive img-circle avater-img" alt="" /><strong>{{ Auth::user()->name }}</strong></a>
                    <ul class="dropdown-menu animated navbar-left fadeOutUp">
                        <li><a href="{{route('profile')}}">Profile</a></li>
                        <li><a href="{{route('my_events')}}">My Events</a></li>

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

                <li><a class="addlist" href="javascript:void(0)"  data-toggle="modal" data-target="#signup">Sign In</a></li>
            @endif


        </ul>
    </div>
</nav>
<!-- End Navigation -->
<div class="clearfix"></div>