@extends('layout.base')

@section('content')
    <section id="codeweek-pending-events-page no-banner" class="codeweek-page">

        <section class="codeweek-content-header">

            <h1>@lang('menu.pending')</h1>
            <p>Total of pending events: {{$events->total()}}</p>
            @role('super admin')
                <country-select :code="'{{$country_iso}}'" :countries="{{$countries}}"></country-select>
            @endrole

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

    </section>
@endsection
