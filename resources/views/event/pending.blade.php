@extends('layout.base')

@section('content')
    <section>

        <div class="container">
            <h1>Pending Events</h1>

            @role('super admin')
            <country-select :code="'{{$country_iso}}'" :countries="{{$countries}}"></country-select>


            <br/>
            @endrole


            @if($events->count() > 0)
                <div class="row">
                    @foreach($events as $event)
                        @component('event.event_tile', ['event'=>$event])
                        @endcomponent
                    @endforeach

                </div>
                {{ $events->links() }}
            @else

                No Pending Event found for {{$country_name}}
            @endif

        </div>

    </section>



@endsection



