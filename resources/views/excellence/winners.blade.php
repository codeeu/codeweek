@extends('layout.base')

@section('content')
    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header">
            <h1>Excellence Winners for {{$edition}}</h1>
        </section>

        <section class="codeweek-content-wrapper" style="margin-top:0px;">
            <ul>
                @foreach($details as $detail)
                    <li>
                        {{$detail->codeweek_for_all_participation_code}} - {{$detail->total_participants}}
                        - {{$detail->total_creators}} - {{$detail->total_countries}}
                    </li>
                @endforeach


            </ul>

            {{ $details->links() }}

        </section>

    </section>
@endsection