@extends("layout.app")

@section('content')
<section>

    Scoreboard page
    @foreach($events as $event)
        Event: {{$event->country}} - {{$event->total}} - {{$event->country_name}}<br/><br/>
        @endforeach
</section>

@endsection