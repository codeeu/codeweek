@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            <h3>Ambassadors</h3>


            @if(app('request')->input('country_iso'))
                @foreach ($countries as $country)
                    @if($country->iso === app('request')->input('country_iso'))
                        Country: {{$country->name}}

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

            @forelse ($ambassadors as $ambassador)
                Name: {{$ambassador->fullName}} - <a
                        href="/ambassadors?country_iso={{$ambassador->country->iso}}">{{$ambassador->country->iso}}</a>
                <br/>
            @empty
                No ambassadors yet :(<br/>
            @endforelse




            {{ $ambassadors->appends(['country_iso'=>app('request')->input('country_iso')])->links() }}
            @role('ambassador')
            @else
                <div class="text-3xl mt-8 text-center"> Why don't you <a href="{{route('volunteer')}}">volunteer?</div>
                @endrole

        </div>
    </section>

@endsection