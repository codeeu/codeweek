@extends('layout.base')

@section('content')



    <div class="container">


        <div class="content-wrap">

            <div class="container clearfix">

                <div class="heading-block center">
                    <h1>@lang('scoreboard.title')</h1>
                    <span></span>
                    <p>@lang('scoreboard.paragraph')</p>
                </div>

                <form style="border:0px" id="faceted-search-events" method="get" action="/scoreboard" enctype="multipart/form-data">

                    <div class="scoreboard-total">
                        {{$total}} @lang('scoreboard.events') - 
                        <select id="edition" name="edition" onchange="this.form.submit()">

                            @foreach($years as $year_label)
                                <option value="{{$year_label}}"
                                        {{ ($year_label == $edition)?'selected':'' }}
                                >{{$year_label}}</option>
                            @endforeach


                        </select>

                    </div>

                </form>



                <div class="sb-wrapper">
                    <ol class="one-row">
                        @foreach($events as $event)


                            <li class="col-md-3 col-sm-4 col-xs-12 sb-box">

                                <img src="{{asset('flags/'.strtolower($event->iso).'.png')}}"
                                     alt=" {{$event->country_name}}"/>


                                <div class="box-inner flex-row" style="padding-right:5px;">
                                    <div>
                                        <span class="scoreboard-country-name {{strtolower($event->country_name)}}">@lang('countries.'.$event->country_name)</span>
                                        <p style="margin-bottom: 5px !important;"> @lang('scoreboard.parcipating_with') </p>
                                    </div>
                                    <a href="/search?country_iso={{$event->iso}}&past=no">
                                        <span class="event-number">{{ $event->total }} @lang('search.' . str_plural('event', $event->total))</span>
                                    </a>
                                </div>

                            </li>
                        @endforeach

                    </ol>
                </div>
            </div>
        </div>
    </div>





@endsection