@extends("layout.app")

@section('content')
    <section>
        <div class="container">
            <h3>Ambassadors</h3>

            @foreach($ambassadors as $ambassador)
                Name: {{$ambassador->name}} - <a href="/ambassadors?country_iso={{$ambassador->country->iso}}">{{$ambassador->country->iso}}</a><br/>
            @endforeach
            {{ $ambassadors->appends(['country_iso'=>app('request')->input('country_iso')])->links() }}
        </div>
    </section>

@endsection