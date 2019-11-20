@extends('layout.base')

@section('content')
    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header" style="display: flex; justify-content: space-between;">
            <h1>CW4ALL Detail for {{$result['codeweek_for_all_participation_code']}}</h1>

        </section>

        <section class="codeweek-content-wrapper">
            <span>Members: {{$result['total_creators']}}</span>
            <span>Activities Count: {{$result['total_activities']}}</span>
            <span>Participants Count: {{$result['total_participants']}}</span>
            <span>Countries: {{sizeof($countries)}} (
                @foreach($countries as $country)
                    {{$country['name']}} [{{$country['event_per_country']}}]@if(!$loop->last) - @endif
                @endforeach
            )</span>
            <span>Reported percentage: {{number_format($result['reporting_percentage'],2)}}%</span>
        </section>


    </section>
@endsection
