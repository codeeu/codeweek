@extends('layout.base')

@section('content')
    <section id="codeweek-pending-events-page" class="codeweek-page">

        <section class="codeweek-content-header">

            <div class="header">
                <div>
                    <h1>@lang('menu.pending')</h1>
                    <p>@lang('event.total_pending_events') {{$events->total()}}</p>
                </div>
                <div class="actions">
                    @if($country_iso)
                        <a class="codeweek-action-link-button" href="{{'/api/event/approveAll/' . $country_iso}}">Approve all events</a>
                    @endif
                </div>
            </div>
            @role('super admin')
                <country-select :code="'{{$country_iso}}'" :countries="{{$countries}}"></country-select>
            @endrole

        </section>


        <section class="codeweek-content-wrapper">

            @if($events->count() > 0)
                <div class="codeweek-grid-layout">
                    @foreach($events as $event)
                        @component('event.event_tile', ['event'=>$event, 'moderation'=>'true'])
                        @endcomponent
                    @endforeach

                </div>
                <div class="codeweek-pagination">
                    {{ $events->links() }}
                </div>
            @else
                @lang('event.no_pending_events') @lang('countries.' . $country_name)
            @endif
        </section>

    </section>
@endsection
