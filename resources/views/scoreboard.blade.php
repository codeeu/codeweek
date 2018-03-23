@extends("layout.app")

@section('content')
<section>
    <div class="container">

    Scoreboard page
    @foreach($events as $event)
        Event: {{$event->country}} - {{$event->total}} - {{$event->country_name}}<br/><br/>
        @endforeach

    </div>
</section>

@endsection