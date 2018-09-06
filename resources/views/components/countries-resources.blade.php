@foreach($countries as $country)

    <strong>

        <a href="{{ route('resources_by_country',['country'=>$country]) }}">{{ ucwords(str_replace('_', ' ', $country)) }}</a>

        @if(!$loop->last)
            -
        @endif

    </strong>

@endforeach

