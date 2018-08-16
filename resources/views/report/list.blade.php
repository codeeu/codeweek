@extends('layout.base')

@section('content')


    <div class=" mt-6   flex justify-around">
        <div class="w-4/5">

            <h1>@lang('eventreports.reports_by'){{ Auth::user()->fullName }}</h1>

            @if($events->isEmpty())
                <div class="row">
                    <p>@lang('eventreports.no_reports')</p>
                </div>
            @else


                <div class="row">
                    <p>@lang('eventreports.report')</p>
                    @foreach($events as $event)
                        @component('event.event_tile', ['event'=>$event])
                        @endcomponent
                    @endforeach

                </div>
                {{ $events->links() }}
            @endif

        </div>
    </div>

@endsection