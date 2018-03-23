@extends("layout.app")

@section('content')

<section>

    <div class="container">
        <h1>Thanks for adding your event!</h1>

        <p>One of our local ambassadors will now review your event
            <a href="{{$event->path()}}"><strong>{{ $event->title }}</strong></a>
            and make sure everything looks ok. <br/>
            If you have any questions, get in touch with one of our
            <a href="{{route('ambassadors')}}">national ambassadors</a> or send us an <a
                    href="mailto:info@codeweek.eu?subject=Code Week events">email</a>.</p>
    </div>

</section>

@endsection