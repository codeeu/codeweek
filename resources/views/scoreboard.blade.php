@extends('layout.base')

@section('content')

    <section id="codeweek-scoreboard-page" class="codeweek-page">

        <section class="codeweek-banner scoreboard">
            <div class="text">
                <h2>#CodeWeek</h2>
                <h1>@lang('event.scoreboard_by_country')</h1>
            </div>
            <div class="image">
                <img src="images/banner_scoreboard.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-searchbox">
            <div class="total">
                <span class="number">{{$total}}</span>
                <span class="label">@lang('scoreboard.events')</span>
            </div>
            <form style="border:0px" id="faceted-search-events" method="get" action="/scoreboard" enctype="multipart/form-data">
                <select id="edition" name="edition" onchange="this.form.submit()" class="codeweek-input-select">
                    @foreach($years as $year_label)
                        <option value="{{$year_label}}" {{ ($year_label == $edition)?'selected':'' }} >
                            {{$year_label}}
                        </option>
                    @endforeach
                </select>
            </form>
        </section>

        <section class="codeweek-content-wrapper">

            <h1>@lang('scoreboard.title')</h1>

            <p>@lang('scoreboard.paragraph')</p>

            <div class="scoreboard-first-country">
                <div class="scoreboard-card first">
                    <div class="image">
                        <div class="position">1</div>
                        <img src="/images/trophy.svg" class="static-image" style="height:160px;">
                    </div>
                    <div class="country-data">
                        <div class="country-name">@lang('countries.'.$events{0}->country_name)</div>
                        <div class="participating-with">@lang('scoreboard.parcipating_with')</div>
                        <div class="number">
                            <div class="count">
                                @foreach(str_split($events{0}->total) as $digit)
                                    <div class="digit">{{ $digit }}</div>
                                @endforeach
                            </div>
                            @if(count(str_split($events{0}->total)) < 4)
                                <div class="text">@lang('search.' . str_plural('event', $events{0}->total))</div>
                            @endif
                        </div>
                        @if(count(str_split($events{0}->total)) >= 4)
                            <div class="text">@lang('search.' . str_plural('event', $events{0}->total))</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="codeweek-content-grid-scoreboard">

                @foreach($events as $event)
                    @if ($loop->first) @continue @endif
                    <div class="scoreboard-card">
                        <div class="image">
                            <div class="position">{{ $loop->iteration }}</div>
                            <img src="/images/trophy.svg" class="static-image" style="height:130px;">
                        </div>
                        <div class="country-data">
                            <div class="country-name">@lang('countries.'.$event->country_name)</div>
                            <div class="participating-with">@lang('scoreboard.parcipating_with')</div>
                            <div class="number">
                                <div class="count">
                                    @foreach(str_split($event->total) as $digit)
                                        <div class="digit">{{ $digit }}</div>
                                    @endforeach
                                </div>
                                @if(count(str_split($event->total)) < 4)
                                    <div class="text">@lang('search.' . str_plural('event', $event->total))</div>
                                @endif
                            </div>
                            @if(count(str_split($event->total)) >= 4)
                                <div class="text">@lang('search.' . str_plural('event', $event->total))</div>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>

        </section>
    </section>

@endsection