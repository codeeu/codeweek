@extends('layout.base')

@section('content')
    <section>

        <div class="container">

            <h1 style="display:inline-block;">@lang('eventreports.reports_by'){{ Auth::user()->fullName }}</h1>
            <p>@lang('eventreports.report')</p>
            <hr>

            @if($events->isEmpty())
                <div class="row">
                    <p>@lang('eventreports.no_reports')</p>
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