@extends("layout.app")

@section('content')
    <section>
        <div class="container">
            <h3>Ambassadors</h3>

            @foreach ($countries as $country)

                <a href="/ambassadors?country_iso={{$country->iso}}">{{$country->iso}}</a>
            @endforeach
            <br/>
            @foreach($ambassadors as $ambassador)
                Name: {{$ambassador->fullName}} - <a
                        href="/ambassadors?country_iso={{$ambassador->country->iso}}">{{$ambassador->country->iso}}</a>
                <br/>
            @endforeach
            {{ $ambassadors->appends(['country_iso'=>app('request')->input('country_iso')])->links() }}
        </div>
    </section>

@endsection