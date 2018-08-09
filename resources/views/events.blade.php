@extends('layout.base')

@section('content')

    @include('include.map')

    <section>

        <div class="container">


            <div class="content-wrap nopadding">

                <div class="container clearfix ">

                    <div class="change-location-wrapper">
                        <div id="showcountries" class="clearfix">

                            @foreach($countries as $country)

                                <div class="country-link" id="{{$country->iso}}" data-name="{{$country->name}}">

                                    <img src="https://s3-eu-west-1.amazonaws.com/codeweek-s3/flags/{{strtolower($country->iso)}}.png" alt="{{$country->name}}">

                                    <div class="country-name">
                                        {{$country->name}}
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>

                    <div class="flex justify-center">
                        <a href="{{route('scoreboard')}}">
                            <i class="fa fa-trophy"></i>
                            Events Scoreboard by country
                        </a>
                    </div>

                    <hr>
                    <div class="how-to">
                        <p><strong>Get involved:</strong>
                            <a href="/guide/" class="btn btn-primary btn-sm">
                                Organize or support events in your city
                            </a></p>
                        <p>or
                            <a href="ambassadors?country_iso={{$current_country_iso}}">
                                contact your <strong>EU Code Week Ambassadors</strong>

                                @foreach($ambassadors as $ambassador)
                                    <img src="{{$ambassador->avatar}}" alt="" class="img-circle" height="45" width="45">
                                @endforeach

                            </a>
                        </p>

                    </div>

                <!--<div class="col-md-12">
                    <h3>Nearby upcoming events:</h3>

                    <div class="justify-between md:flex sm:flex-row">
                        @component('components.close-events',['closeEvents'=>$events])
                        @endcomponent

                    </div>
                </div>-->
            </div>
        </div>

    </section>


@endsection