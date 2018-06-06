@extends('layout.base')

@section('content')

    <section>

        <div class="container">
            <h1>Thanks for reporting your event!</h1>
            <h2>Your certificate is ready. <a href="{{$event->certificate_url}}">Click here to download it.</a></h2>
            <h4><a href="{{$event->path()}}">Go back to your event</a></h4>

        </div>

    </section>



@endsection