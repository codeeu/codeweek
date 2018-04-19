@extends("layout.app")

@section('content')
    <section>


        <div class="container">
            <h1>Pending Events</h1>

            @role('super admin')
            <select class="search-form-element" id="id_country" name="country_iso">
                <option value=""> All countries</option>
                <option value="">---------------</option>

                @foreach($countries as $country)
                    <option value="{{$country->iso}}"
                            {{ ($country_iso == $country->iso)?'selected':'' }}
                    >{{$country->name}}</option>
                @endforeach


            </select>

            <br/>
            <br/>
            @endrole


            @if($events)


                <div class="row">
                    @foreach($events as $event)
                        @component('event.event_tile', ['event'=>$event])
                        @endcomponent
                    @endforeach

                </div>
                {{ $events->links() }}
            @endif

        </div>

    </section>



@endsection



