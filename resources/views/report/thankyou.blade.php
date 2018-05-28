@extends('layout.base')

@section('content')

    <section>

        <div class="container">
            <h1>Thanks for reporting your event!</h1>
            <h4><a href="{{$event->path()}}">Go back to your event</a></h4>

        </div>

    </section>



@endsection