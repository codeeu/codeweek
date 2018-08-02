@extends('layout.base')

@section('content')



    <div class="container">


        <div class="content-wrap">

            <div class="container clearfix">

                <div class="heading-block center">
                    <h1>#codeEU Events Scoreboard</h1>
                    <span></span>
                    <p>Which countries in Europe are buzzing with coding activity? The scoreboard is sorted by the
                        number of listed coding events per population, so don't be surprised to see some of the smaller
                        countries higher up on the list!</p>
                </div>


                <div class="sb-wrapper">
                    <ol class="one-row">
                        @foreach($events as $event)


                            <li class="col-md-3 col-sm-4 col-xs-12 sb-box">

                                <img src="{{asset('flags/'.strtolower($event->iso).'.png')}}"
                                     alt=" {{$event->country_name}}"/>


                                <div class="box-inner">
                                    <span class="country-name">{{$event->country_name}}</span>
                                    <p> is participating with </p>
                                    <a href="/search?country_iso={{$event->iso}}&past=no">
                                        <span class="event-number">{{ $event->total }} events</span></a>
                                </div>

                            </li>
                        @endforeach

                    </ol>
                </div>
            </div>
        </div>
    </div>





@endsection