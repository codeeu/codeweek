@extends('layout.base')

@section('content')


    <section>

        <div class="container">
            <h1 style="display: inline-block;">@lang('certificates.certificates_for'){{ Auth::user()->fullName }}</h1>
            <hr>

            @if($reported_events->isEmpty())
                <div class="row">
                    <p>@lang('certificates.no_certificates')</p>
                </div>
            @else

                <div class="row">

                    @foreach($reported_events as $event)
                        @component('event.event_tile', ['event'=>$event])
                        @endcomponent
                    @endforeach

                </div>
                {{ $reported_events->links() }}
            @endif

        </div>

    </section>


@endsection