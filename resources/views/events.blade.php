@extends('layout.base')

@section('content')

    @include('include.map')

    <section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">





    <div class="flex justify-center">

        <h2>
            <a href="{{route('scoreboard')}}">Scoreboard</a>
        </h2>

    </div>


    <div class="col-md-12">
        <h3>Nearby upcoming events:</h3>


        <div class="justify-between md:flex sm:flex-row">
            @component('components.close-events',['closeEvents'=>$events])
            @endcomponent

        </div>
    </div>

                </div></div></div></section>


@endsection