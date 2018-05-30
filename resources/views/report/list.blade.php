@extends('layout.base')

@section('content')


    <div class=" mt-6   flex justify-around">
        <div class="w-4/5">

            <h1>Events pending for report by {{ Auth::user()->fullName }}</h1>

            @if($events->isEmpty())
                <div class="row">
                    <p>There are no events to be reported yet.</p>
                </div>
            @else


                <div class="row">
                    <p>The events listed below have started or already finished. Fill in a few numbers for
                        statistical purposes for the event and claim your Code Week participation certificate. You
                        will get one certificate per event.</p>
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