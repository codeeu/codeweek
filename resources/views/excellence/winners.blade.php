@extends('layout.base')

@section('content')
    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header">
            <h1>Excellence Winners for {{$edition}} - {{count($details)}}</h1>
        </section>


        <table class="codeweek-table">
            <thead>
            <tr>
                <th>Code</th>
                <th><a href="?participants={{request()->input('participants')==-1?1:-1}}"># Participants</a></th>
                <th><a href="?teachers={{request()->input('teachers')==-1?1:-1}}"># Teachers</a></th>
                <th><a href="?countries={{request()->input('countries')==-1?1:-1}}"># Countries</a></th>
                <th><a href="?activities={{request()->input('activities')==-1?1:-1}}"># Activities</a></th>
            </tr>
            </thead>
            <tbody>

            @if(!$details->isEmpty())
                @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->codeweek_for_all_participation_code}}</td>
                        <td>{{$detail->total_participants}}</td>
                        <td>{{$detail->total_creators}}</td>
                        <td>{{$detail->total_countries}}</td>
                        <td>{{$detail->total_activities}}</td>
                    </tr>

                @endforeach
            @endif


            </tbody>
        </table>
        <form action="#" method="get">
            <input type="hidden" name="clear_cache" value="1" />
            <button class="codeweek-blank-button" type="submit">
                Clear Cache
            </button>
        </form>



        {{--   <section class="codeweek-content-wrapper" style="margin-top:0px;">
               <ul>
                   @foreach($details as $detail)
                       <li>
                           {{$detail->codeweek_for_all_participation_code}} - {{$detail->total_participants}}
                           - {{$detail->total_creators}} - {{$detail->total_countries}}
                       </li>
                   @endforeach


               </ul>

               {{ $details->links() }}

           </section>--}}

    </section>
@endsection
