@extends('layout.base')

@section('content')
    <section>

        <div class="container">
            <h1 style="display: inline-block;">@lang('myevents.created_by') {{ Auth::user()->fullName }}</h1>
            <hr>

            @if(!$events || (count($events) == 0))
            <div class="row">
                <p>@lang('myevents.no_events.first_call_to_action') <a href="{{route('create_event')}}">@lang('myevents.no_events.first_link')</a> @lang('myevents.no_events.second_call_to_action') <a href="{{route('guide')}}">@lang('myevents.no_events.second_link')</a>?</p>
            </div>
            @else


            <div class="row">
            @foreach($events as $event)
                @component('event.event_tile', ['event'=>$event])
                @endcomponent
                @endforeach

            </div>
                {{ $events->links() }}
            @endif

        </div>

    </section>


@endsection



