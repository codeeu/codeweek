<li>
    <img src="/images/user_menu_profile.svg" class="icon">
    <a class="cookweek-link hover-underline" href="{{route('profile')}}">
        @lang('menu.profile')
    </a>
</li>
<li>
    <img src="{{asset('svg/address-book.svg')}}" class="static-image">
    <a class="cookweek-link hover-underline" href="{{route('activities-locations')}}">
        @lang('menu.activities_locations')
    </a>
</li>
@role('super admin|leading teacher')
<li class="p-1 text-orange-600 rounded">

    <img src="/images/user_menu_badges.svg">

    <a class="cookweek-link hover-underline" href="{{route('my-badges')}}">
        @lang('menu.my_badges')
    </a>
</li>
@endrole
@role('ambassador')
<li>
    <img src="/images/user_menu_volunteers.svg" class="icon">
    <a class="cookweek-link hover-underline" href="{{route('admin.online-events')}}">
        @lang('menu.online_events')
    </a>
</li>

@endrole
@role('super admin')
<li>
    <img src="/images/user_menu_volunteers.svg" class="icon">
    <a class="cookweek-link hover-underline" href="{{route('promoted_events')}}">
        @lang('menu.online_events')
    </a>
</li>

@endrole

@role('ambassador|super admin')
<li>
    <img src="/images/user_menu_pending_events.svg" class="icon">
    <a class="cookweek-link hover-underline" href="{{route('pending')}}">
        @lang('menu.pending')
    </a>
</li>
@endrole

<li>
    <img src="/images/user_menu_your_events.svg" class="icon">
    <a class="cookweek-link hover-underline" href="{{route('my_events')}}">
        @lang('menu.your_events')
    </a>
</li>
<li>
    <img src="/images/user_menu_certificates.svg" class="icon">
    <a class="cookweek-link hover-underline" href="{{route('certificates')}}">
        @lang('menu.your_certificates')
    </a>
</li>
<li>
    <img src="/images/user_menu_report_events.svg" class="icon">
    <a class="cookweek-link hover-underline" href="/events_to_report">
        @lang('menu.report')
    </a>
</li>
<li>
    <img src="/images/user_menu_certificates.svg" class="icon">
    <a class="cookweek-link hover-underline" href="/participation">
        @lang('menu.participation')
    </a>
</li>
@role('super admin')
<li>
    <img src="/images/user_menu_activities.svg" class="icon">
    <a class="cookweek-link hover-underline" href="{{route('excellence_winners')}}">
        @lang('menu.excellence_winners')
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

    <a class="cookweek-link hover-underline" href="{{route('leading_teachers_list')}}">
        @lang('menu.leading_teachers')
    </a>
</li>

<li class="p-1 text-orange-600 rounded">

    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" height="24">
        <path fill="#FE6824"
              d="M22 7h-5.67V4v0c0-.56-.45-1-1-1H8.66v0c-.56 0-1 .44-1 1v7H1.99v0c-.56 0-1 .44-1 1v8 0c0 .55.44 1 1 1h20v0c.55 0 1-.45 1-1V8v0c0-.56-.45-1-1-1ZM7.66 19H2.99v-6h4.66Zm6.666 0h-4.67V5h4.66Zm6.66 0h-4.67V9h4.66Z"
        />
    </svg>

    <a class="cookweek-link hover-underline" href="{{route('badges-leaderboard-year')}}">
        @lang('menu.badges_leaderboard')
    </a>
</li>

@endrole

<li>
    <img src="/images/user_menu_logout.svg" class="icon">
    <a class="cookweek-link hover-underline" class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('menu.logout') }}
    </a>
</li>

<form id="logout-form" action="{{ route('logout') }}" method="POST"
      style="display: none;">
    {{ csrf_field() }}
</form>
