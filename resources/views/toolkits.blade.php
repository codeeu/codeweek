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

                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BCommunications%2BToolkit.zip">EU Code Week 2019 Communications Toolkit</a></li>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BTeachers%2BToolkit.zip">EU Code Week 2019 Teachers Toolkit</a></li>
                    <li>
                        EU Code Week 2019 Leaflet (

                            @foreach($languages as $lang)
                                @if($lang === $locale)
                                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2019/Codeweek_2019_{{strtoupper($lang)}}.pdf">@lang('base.languages.' . $lang)</a>
                                @endif
                            @endforeach

                            @if($locale !== 'en')
                                 - <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2019/Codeweek_2019_EN.pdf">@lang('base.languages.en')</a>
                            @endif
                        )
                    <li><a href="/guide">How to organise an activity ?</a>

                    </li>

                </ul>
            </div>

    </section>

@endsection