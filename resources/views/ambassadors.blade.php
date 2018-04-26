@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            <h3>Ambassadors</h3>


            @if(app('request')->input('country_iso'))
                @foreach ($countries as $country)
                    @if($country->iso === app('request')->input('country_iso'))
                        @if($country->facebook)
                            <div>Visit the <a href="{{$country->facebook}}">local Facebook page</a></div>
                        @endif

                        @if($country->website)
                            <div><a href="{{$country->website}}">Local Website</a></div>
                        @endif
                    @endif
                @endforeach
            @endif

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