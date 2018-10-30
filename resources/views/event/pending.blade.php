@extends('layout.base')

@section('content')
    <section>

        <div class="container" style="padding-top:30px;">
            <h1 style="display: inline-block;">
                Pending Events
            </h1>
            <hr>

            @role('super admin')
            <country-select :code="'{{$country_iso}}'" :countries="{{$countries}}"></country-select>
            <br/>
            @endrole

            <div>Total of pending events: {{$events->total()}}</div>

            @if($events->count() > 0)
                <div class="row pending">
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



