@extends("layout.app")

@section('content')
    <section>



    <div class="container">
        <h1>All events created by {{ Auth::user()->fullName }}</h1>

        @if(!$events)
        <div class="row">
            <p>You haven't added any events yet. Why don't you <a href="{{route('create_event')}}">add one now</a> or read our <a href="{{route('guide')}}">guide for organizers</a>?</p>
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



