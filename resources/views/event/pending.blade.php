@extends('layout.base')

@section('content')
    <section id="codeweek-pending-events" class="codeweek-page">

            <h1>Pending Events</h1>


            <section class="codeweek-searchbox">
                @role('super admin')
                    <country-select :code="'{{$country_iso}}'" :countries="{{$countries}}"></country-select>
                @endrole
                <div>Total of pending events: {{$events->total()}}</div>
            </section>

            <section class="codeweek-content-wrapper">
                @if($events->count() > 0)
                    <div class="codeweek-grid-layout">
                        @foreach($events as $event)
                            @component('event.event_tile', ['event'=>$event])
                            @endcomponent
                        @endforeach

                    </div>
                    {{ $events->links() }}
                @else
                    No Pending Event found for {{$country_name}}
                @endif
            </section>

        </div>

    </section>
@endsection
