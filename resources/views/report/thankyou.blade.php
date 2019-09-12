@extends('layout.base')

@section('content')

    <section id="codeweek-thankyou-report-page" class="codeweek-page">

        <section class="codeweek-content-header">

            <h1>@lang('report.thanks_page.title')</h1>

        </section>

        <section class="codeweek-content-wrapper">

            <h2>
                @lang('report.thanks_page.certificate_ready')
                <a href="{{$event->certificate_url}}">@lang('report.thanks_page.download_button')</a>
            </h2>
            <h4><a href="{{$event->path()}}">@lang('report.thanks_page.back_events')</a></h4>


        </section>

    </section>



@endsection