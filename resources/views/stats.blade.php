@extends('layout.base')

@section('content')
    <div class="container">

        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 20px; display: flex; width:100%;">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('stats')}}">
                    General metrics
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('stats.year')}}">
                    Events per year and country
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("stats.organiser")}}">Events per organizer type</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("stats_notreported")}}">Not reported events</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            @if ($flag == 0)
                <form class="form-inline" style="display: flex; flex-direction: row-reverse;">
                    <div style="flex:1; display: flex; justify-content: right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-refresh" style="color:#ffffff;"></i>
                        </button>
                    </div>
                    <div class="form-group" style="padding-left:20px; display:flex;align-items: center; flex:1">
                        <label for="yearSelector" style="margin-top:14px">Year: </label>
                        <select name="yearSelector" onchange="this.form.submit()">
                            @foreach ($years as $year)
                                @if ($year == $selectedYear)
                                    <option selected>{{$year}}</option>
                                @else
                                    <option>{{$year}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </form>
                <hr>
                <h1>General metrics of {{$selectedYear}}</h1>
                <hr>
                <br>
                <br>
                <div class="row" style="margin-bottom:100px;">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <p>
                            <i class="fa fa-user fa-5x" style="color:#ff8c00; margin-right: 10px"
                               aria-hidden="true"></i>

                            <b>
                                <span style="font-size: 30pt; font-weight: bold"><counter
                                            :to="{{$creatorsWithOneEvent}}"></counter></span>
                            </b>

                            <span style="font-size: 20pt"> creators with at least 1 event.</span>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <p>
                            <i class="fa fa-users fa-5x" style="color:#ff8c00; margin-right: 10px"
                               aria-hidden="true"></i>

                            <b>
                                <span style="font-size: 30pt; font-weight: bold"><counter
                                            :to="{{$totalParticipants}}"></counter></span>
                            </b>

                            <span style="font-size: 20pt"> total participants.</span>
                        </p>
                    </div>
                </div>
                <div class="row" style="margin-top:100px; margin-bottom: 100%">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <p>
                            <i class="fa fa-exclamation fa-5x" style="color:#ff8c00; margin-right: 10px"
                               aria-hidden="true"></i>

                            <b>
                                <span style="font-size: 30pt; font-weight: bold"><counter :to="{{$eventsNotReported}}"></counter></span>
                            </b>

                            <span style="font-size: 20pt"> events not reported.</span>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <p>
                            <i class="fa fa-calendar fa-5x" style="color:#ff8c00; margin-right: 10px"
                               aria-hidden="true"></i>

                            <b>
                                <span style="font-size: 30pt; font-weight: bold"><counter
                                            :to="{{$eventsFinished}}"></counter></span>
                            </b>

                            <span style="font-size: 20pt"> events finished.</span>
                        </p>
                    </div>
                </div>

            @elseif($flag == 1)
                <form class="form-inline" style="display: flex; flex-direction: row-reverse;">
                    <div style="flex:1; display: flex; justify-content: right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-refresh" style="color:#ffffff;"></i>
                        </button>
                    </div>
                    <div class="form-group" style="padding-left:20px; display:flex;align-items: center; flex:1">
                        <label for="yearSelector" style="margin-top: 14px">Year: </label>
                        <select name="yearSelector" onchange="this.form.submit()">
                            @foreach ($years as $year)
                                @if ($year == $selectedYear)
                                    <option selected>{{$year}}</option>
                                @else
                                    <option>{{$year}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </form>
                <hr>
                <h1>Total events:
                    <counter :to={{$total}}></counter>
                    events
                </h1>
                <hr>
                <div>{!! $chart->container() !!}</div>
                {!! $chart->script() !!}
                <br/>
                <br/>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Country</th>
                        <th scope="col">Total approved events</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($eventsPerYear as $country => $events)
                        <tr>
                            <td scope="row">{{$country}}</td>
                            <td scope="row">{{$events}} </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @elseif($flag == 2)
                <form class="form-inline" style="display: flex; flex-direction: row-reverse;">
                    <div style="flex:1; display: flex; justify-content: right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-refresh" style="color:#ffffff;"></i>
                        </button>
                    </div>
                    <div class="form-group" style="padding-left:20px; display:flex;align-items: center; flex:1">
                        <label for="yearSelector" style="margin-top: 14px">Organiser: </label>
                        <select name="typeSelector" onchange="this.form.submit()">
                            @foreach ($types as $organiser => $value)
                                @if ($organiser == $selectedType)
                                    <option selected>{{$organiser}}</option>
                                @else
                                    <option>{{$organiser}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </form>
                <hr>
                <h1>Events organised by {{$selectedType}} in {{$year}}</h1>
                <hr>
                <div>{!! $chart->container() !!}</div>
                {!! $chart->script() !!}
                <br/>
                <br/>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Country</th>
                        <th scope="col">Total approved events</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($eventsPerYear as $country => $events)
                        <tr>
                            <td scope="row">{{$country}}</td>
                            <td scope="row">{{$events}} </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @elseif($flag == 3)
                <form class="form-inline" style="display: flex; flex-direction: row-reverse;">
                    <div style="flex:1; display: flex; justify-content: right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-refresh" style="color:#ffffff;"></i>
                        </button>
                    </div>
                    <div class="form-group" style="padding-left:20px; display:flex;align-items: center; flex:1">
                        <label for="yearSelector" style="margin-top: 14px">Country: </label>

                        @component('components.select-country',['countries'=>$active_countries, 'country_iso'=>$selectedCountry->iso])
                        @endcomponent
                        {{--<select name="countrySelector" onchange="this.form.submit()">--}}
                            {{--@foreach ($countries as $country)--}}
                                {{--@if ($country['iso'] == $selectedCountry)--}}
                                    {{--<option value="{{$country['iso']}}" selected>{{$country['name']}}</option>--}}
                                {{--@else--}}
                                    {{--<option value="{{$country['iso']}}">{{$country['name']}}</option>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</select>--}}


                    </div>

                </form>
                <hr>
                <h1>Non reported events {{$year}} - {{$selectedCountry->name}} Top 50:</h1>
                <hr>
                <br/>
                <br/>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Event title</th>
                        <th scope="col">Country</th>
                        <th scope="col">Organizer name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Total participants</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($notReportedEvents as $event)
                        <tr>
                            <td scope="row"><a href="{{$event->path()}}" target="_blank">{{$event->title}}</a></td>
                            <td scope="row">{{$event->name}} </td>
                            <td scope="row">{{$event->organizer}}</td>
                            <td scope="row">{{$event->contact_person}}</td>
                            <td scope="row">{{$event->participants_count}} </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif

        </div>
    </div>
@stop