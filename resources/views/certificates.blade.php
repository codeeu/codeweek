@extends('layout.base')

@section('content')


    <div class=" mt-6   flex justify-around">
        <div class="w-4/5">

            <h1>@lang('certificates.certificates_for'){{ Auth::user()->fullName }}</h1>

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
    </div>


@endsection