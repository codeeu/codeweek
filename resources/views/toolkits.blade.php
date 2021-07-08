@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        <section class="codeweek-banner learn-teach">
            <div class="text">
                <h2>#CodeWeek</h2>
                <h1>@lang('menu.toolkits')</h1>
            </div>
            <div class="image">
                <img src="/images/banner_learn_teach.svg" class="static-image">
            </div>
        </section>








                <div class="codeweek-content-wrapper">
                    <h3>@lang('snippets.toolkits.0')</h3>
                    <ul>
<li>
    <h2>EU Code Week 2021</h2>
                        <li> <strong>@lang('snippets.toolkits.1')</strong>: @lang('snippets.toolkits.2') (

                            @foreach($languages as $lang)
                                @if($lang === $locale)
                                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2021/communications-toolkit-{{strtoupper($lang)}}.zip">@lang('base.languages.' . $lang)</a>

                                @endif
                            @endforeach

                            @if($locale !== 'en')
                                - <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2021/communications-toolkit-EN.zip">@lang('base.languages.en')</a>
                            @endif
                        )
                        </li>


                        <li> <strong>@lang('snippets.toolkits.3')</strong>: @lang('snippets.toolkits.4') (

                            @foreach($languages as $lang)
                                @if($lang === $locale)
                                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2021/teachers-toolkit-{{strtoupper($lang)}}.zip">@lang('base.languages.' . $lang)</a>
                                @endif
                            @endforeach

                            @if($locale !== 'en')
                                -
                                <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2021/teachers-toolkit-EN.zip">@lang('base.languages.en')</a>
                            @endif
                        )
                        </li>

                        <li><strong>@lang('snippets.toolkits.5')</strong> (

                            @foreach($languages as $lang)
                                @if($lang === $locale)
                                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2021/Codeweek_2021_{{strtoupper($lang)}}.pdf">@lang('base.languages.' . $lang)</a>
                                @endif
                            @endforeach

                            @if($locale !== 'en')
                                -
                                <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2021/Codeweek_2021_EN.pdf">@lang('base.languages.en')</a>
                            @endif
                        )
                        </li>
                        <li>
                            <a href="{{route("guide")}}">@lang('resources.how_to_organise_an_activity')</a>
                        </li>

                    </ul>
                </div>









@endsection
