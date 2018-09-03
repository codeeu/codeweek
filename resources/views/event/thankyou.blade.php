@extends('layout.base')

@section('content')

    <section>

        <div class="container">

            <h1>@lang('event.thanks_page.title')</h1>

            <p>
                @lang('event.thanks_page.phrase1')
                <a href="{{$event->path()}}"><strong>{{ $event->title }}</strong></a>
                @lang('event.thanks_page.phrase2')
                <br/>
                @lang('event.thanks_page.phrase3')
                <a href="{{route('ambassadors')}}">@lang('event.thanks_page.phrase4')</a>
                @lang('event.thanks_page.phrase5')
                <a href="mailto:info@codeweek.eu?subject=Code Week events">@lang('event.thanks_page.phrase6')</a>.</p>

            <p>
                @if($event->codeweek_for_all_participation_code)
                    @lang('event.thanks_page.phrase7')
                    <strong>{{$event->codeweek_for_all_participation_code}}</strong>
                @endif
            </p>

        </div>

    </section>

@endsection