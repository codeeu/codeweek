@extends('layout.app')

@section('content')
    <section>

        <div class="container">
            <h1>Pending Events</h1>

            @role('super admin')
            <country-select :code="'{{$country_iso}}'" :countries="{{$countries}}" ></country-select>



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



