@extends('layout.base')

@section('content')
<section>
    <div class="container">

        <h3>Scoreboard page</h3>
    @foreach($events as $event)
        Event: {{$event->country_name}} - {{$event->total}} <br/><br/>
        @endforeach

    </div>
</section>

@endsection