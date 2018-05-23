@extends('layout.base')

@section('content')

    @include('include.map')

    <div class="col-md-12">
        <h3>Nearby upcoming events:</h3>


        <div class="justify-between md:flex sm:flex-row">
            @component('components.close-events',['closeEvents'=>$events])
            @endcomponent

        </div>
    </div>


@endsection