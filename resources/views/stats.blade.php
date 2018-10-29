@extends('layout.base')

@section('content')
    <div class="container">

        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 20px">
            <li class="nav-item">
                <a class="nav-link active"  href="{{route('stats')}}" >
                    Events per year and country
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("stats.organiser")}}">Events per organizer type and country</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            @if ($flag)
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
                <h1>Total events: {{$total}} events</h1>
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

            @else
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