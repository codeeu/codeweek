@extends("layout.app")

@section('content')
<section>
    <div class="container">

        <h3>Scoreboard page</h3>
    @foreach($events as $event)
        Event: {{$event->country}} - {{$event->total}} - {{$event->country_name}}<br/><br/>
        @endforeach

    </div>
</section>

@endsection