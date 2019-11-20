@extends('layout.base')

@section('content')
    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header" style="display: flex; justify-content: space-between;">
            <h1>Excellence Winners for {{$edition}}</h1>

            <form action="{{route('excellence_excel')}}" method="post">
                {{ csrf_field() }}

                <button class="codeweek-action-button" type="submit">
                    Download Excel
                </button>
            </form>
        </section>


        <table class="codeweek-table">
            <thead>
            <tr>
                <th>Code</th>
                <th><a href="?participants={{request()->input('participants')==-1?1:-1}}"># Participants</a></th>
                <th><a href="?teachers={{request()->input('teachers')==-1?1:-1}}"># Teachers</a></th>
                <th><a href="?countries={{request()->input('countries')==-1?1:-1}}"># Countries</a></th>
                <th><a href="?activities={{request()->input('activities')==-1?1:-1}}"># Activities</a></th>
                <th><a href="?super={{request()->input('super')==-1?1:-1}}">Super winner</a></th>
                <th><a href="?reporting={{request()->input('reporting')==-1?1:-1}}">Reporting %</a></th>
            </tr>
            </thead>
            <tbody>

            @if(!$details->isEmpty())
                @foreach($details as $detail)
                    <tr>
                        <td>
                            <a href="{{route('codeweek4all_details',['code'=>$detail->codeweek_for_all_participation_code])}}">{{$detail->codeweek_for_all_participation_code}}</a>
                        </td>
                        <td>{{$detail->total_participants}}</td>
                        <td>{{$detail->total_creators}}</td>
                        <td>{{$detail->total_countries}}</td>
                        <td>{{$detail->total_activities}}</td>
                        <td>{{$detail->super_winner}}</td>
                        <td>{{number_format($detail->reporting_percentage,2)}}%</td>
                    </tr>

                @endforeach
            @endif


            </tbody>
        </table>
        <form action="#" method="get">
            <input type="hidden" name="clear_cache" value="1"/>
            <button class="codeweek-blank-button" type="submit">
                Clear Cache
            </button>
        </form>


    </section>
@endsection
