@extends("layout.app")

@section('content')
    <section>
        <div class="container">
            <h3>Ambassadors</h3>

            @foreach($ambassadors as $ambassador)
                Name: {{$ambassador->name}}
            @endforeach
        </div>
    </section>

@endsection