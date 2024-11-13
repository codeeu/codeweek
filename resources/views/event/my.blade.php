@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')
    <section id="codeweek-myevents-page" class="codeweek-page">

        <section class="codeweek-content-header">
            <h1>@lang('myevents.created_by') {{ Auth::user()->fullName }}</h1>
        </section>

        <section class="codeweek-content-wrapper">

            @if(!$events || (count($events) == 0))
                <div class="row">
                    <p>
                        @lang('myevents.no_events.first_call_to_action')
                        <a href="{{route('create_event')}}">@lang('myevents.no_events.first_link')</a>
                        @lang('myevents.no_events.second_call_to_action')
                        <a href="{{route('guide')}}">@lang('myevents.no_events.second_link')</a>?
                    </p>
                </div>
            @else
                <div class="codeweek-grid-layout">
                    @foreach($events as $event)
                        @component('event.event_tile', ['event'=>$event])
                        @endcomponent
                    @endforeach
                </div>
                <div class="codeweek-pagination">
                    {{ $events->links() }}
                </div>
            @endif

        </section>

    </section>
@endsection
