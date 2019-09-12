@extends('layout.base')

@section('content')
    <section id="codeweek-report-events-page" class="codeweek-page">

        <section class="codeweek-content-header">
            <h1>@lang('eventreports.reports_by'){{ Auth::user()->fullName }}</h1>
            <p>@lang('eventreports.report')</p>
        </section>

        <section class="codeweek-content-wrapper">

            @if($events->isEmpty())
                <p>@lang('eventreports.no_reports')</p>
            @else
                <div class="codeweek-grid-layout">
                    @foreach($events as $event)
                        @component('event.event_tile', ['event'=>$event])
                        @endcomponent
                    @endforeach
                </div>
                {{ $events->links() }}
            @endif

        </section>

    </section>

@endsection