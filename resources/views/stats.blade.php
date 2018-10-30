@extends('layout.base')

@section('content')
    <div class="container">

        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 20px">
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
        </ul>
        <div class="tab-content" id="myTabContent">
            @if ($flag == 0)
                <form class="form-inline">
                    <div class="form-group">
                        <label for="yearSelector">Year </label>
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
                    <button type="submit" class="btn btn-primary" style="margin-left: 20px">Search events</button>
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
                               <span style="font-size: 30pt; font-weight: bold"><counter :to="{{$creatorsWithOneEvent}}"></counter></span>
                            </b>

                            <span style="font-size: 20pt"> creators with at least 1 event.</span>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <p>
                            <i class="fa fa-users fa-5x" style="color:#ff8c00; margin-right: 10px"
                               aria-hidden="true"></i>

                            <b>
                                <span style="font-size: 30pt; font-weight: bold"><counter :to="{{$totalParticipants}}"></counter></span>
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
                            <i class="fa fa-thumbs-up fa-5x" style="color:#ff8c00; margin-right: 10px"
                               aria-hidden="true"></i>

                            <b>
                                <span style="font-size: 30pt; font-weight: bold"><counter :to="{{$eventsFinished}}"></counter></span>
                            </b>

                            <span style="font-size: 20pt"> events finished successfully.</span>
                        </p>
                    </div>
                </div>

            @elseif($flag == 1)
                <form class="form-inline">
                    <div class="form-group">
                        <label for="yearSelector">Year </label>
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
                    <button type="submit" class="btn btn-primary" style="margin-left: 20px">Search events</button>
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
            @else($flag == 2)
                <form class="form-inline">
                    <div class="form-group">
                        <label for="typeSelector">Type of organiser </label>
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
                    <button type="submit" class="btn btn-primary" style="margin-left: 20px">Search events</button>
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
            @endif

        </div>
    </div>
@stop