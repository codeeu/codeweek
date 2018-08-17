@extends('layout.base')

@section('content')

    <section>

        <div class="container">
            <h1>@lang('report.thanks_page.title')</h1>
            <h2>
                @lang('report.thanks_page.certificate_ready')
                <a href="{{$event->certificate_url}}">@lang('report.thanks_page.download_button')</a>
            </h2>
            <h4><a href="{{$event->path()}}">@lang('report.thanks_page.back_events')</a></h4>

        </div>

    </section>



@endsection