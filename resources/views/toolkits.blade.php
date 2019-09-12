@extends('layout.base')

@section('content')

    <section id="codeweek-toolkits-page" class="codeweek-page">

            <section class="codeweek-banner learn-teach">
                <div class="text">
                    <h2>#Codeweek</h2>
                    <h1>@lang('menu.toolkits')</h1>
                </div>
                <div class="image">
                    <img src="/images/banner_learn_teach.svg" class="static-image">
                </div>
            </section>

            <div class="codeweek-content-wrapper">
                <ul>




                    <li>EU Code Week 2019 @lang('resources.communication_toolkit') (

                        @foreach($languages as $lang)
                            @if($lang === $locale)
                                <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/communications-toolkit-{{strtoupper($lang)}}.pdf">@lang('base.languages.' . $lang)</a>

                            @endif
                        @endforeach

                        @if($locale !== 'en')
                            - <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/communications-toolkit-EN.pdf">@lang('base.languages.en')</a>
                    @endif
                )
                    <li>


                    <li>EU Code Week 2019 @lang('resources.teachers_toolkit') (

                        @foreach($languages as $lang)
                            @if($lang === $locale)
                                <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/teachers-toolkit-{{strtoupper($lang)}}.pdf">@lang('base.languages.' . $lang)</a>
                            @endif
                        @endforeach

                        @if($locale !== 'en')
                            - <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/teachers-toolkit-EN.pdf">@lang('base.languages.en')</a>
                    @endif
                )
                    <li>

                    <li>EU Code Week 2019 @lang('resources.leaflet') (

                            @foreach($languages as $lang)
                                @if($lang === $locale)
                                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2019/Codeweek_2019_{{strtoupper($lang)}}.pdf">@lang('base.languages.' . $lang)</a>
                                @endif
                            @endforeach

                            @if($locale !== 'en')
                                 - <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2019/Codeweek_2019_EN.pdf">@lang('base.languages.en')</a>
                            @endif
                        )
                    <li>
                        <a href="/guide">@lang('resources.how_to_organise_an_activity')</a>
                    </li>

                </ul>
            </div>

    </section>

@endsection