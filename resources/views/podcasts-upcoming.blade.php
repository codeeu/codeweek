@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

{{--        <section class="codeweek-banner training" style="background-color: #FDAF31">--}}
{{--            <div class="text">--}}
{{--                <h1>EU Code Week Podcasts</h1>--}}
{{--            </div>--}}
{{--            <div class="image">--}}
{{--                <img src="{{asset('images/banner_podcast.png')}}" class="static-image">--}}
{{--            </div>--}}
{{--        </section>--}}

        <section class="flex flex-row justify-between codeweek-banner training" style="background-color: #FDAF31">
            <div class="flex items-center justify-center w-full">
                <div class="m-12 text-center">
                    <div class="w-full text-xl text-white uppercase">
                        <h1>EU Code Week Podcasts</h1>
                    </div>
                </div>
            </div>

            <div class="hidden md:w-full md:flex">
                <img src="{{asset('images/banner_podcast.png')}}">

            </div>


        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                <div class="leading-6">
                    <h2 class="subtitle">EU Code Week Podcasts</h2>

                </div>

                <div class="mb-4 leading-7">
                    Welcome to the EU Code Week Podcast Series. We bring coding, computational thinking, robotics and
                    innovation closer to you, your community and your school. Join Eugenia Casariego and Arjana Blazic
                    as they explore a range of topics, from media literacy to robotics, with the help of expert guests –
                    to empower you to equip your students with the skills to confront the challenges and opportunities
                    posed by a digital future.
                </div>
                <div class="mb-4">
                    You can listen to the podcasts here or on <a href="https://open.spotify.com/show/5AHSuZvjLSdbaO381lv3Qk" target="_blank" rel="noreferer noopener">Spotify</a>, or <a href="https://podcasts.apple.com/us/podcast/eu-code-week-podcast-series/id1592076780" target="_blank">Apple podcasts</a>.
                </div>

                <section class="grid grid-cols-1 gap-6 md:grid-cols-1">
                    @foreach($podcasts as $key => $podcast)
                        @include('2021._podcast-upcoming', ['podcast' => $podcast, 'bg' => $podcast->active ?'bg-green-200':'bg-gray-200'])

                    @endforeach
                </section>

                {{--                <div class="text-3xl orange">--}}
                {{--                    @lang('challenges.main.1')--}}
                {{--                </div>--}}

                {{--                <div class="text-base leading-6 text-left">--}}
                {{--                    <p>--}}
                {{--                        @lang('challenges.main.2')--}}

                {{--                    </p>--}}
                {{--                    <p>--}}
                {{--                        @lang('challenges.main.3')--}}

                {{--                    </p>--}}
                {{--                    <p>--}}
                {{--                        @lang('challenges.main.4')--}}
                {{--                    </p>--}}


                {{--                    <section class="grid grid-cols-1 gap-6 md:grid-cols-3">--}}


                {{--                        @include('2021._thumbnail', ['slug' => 'chatbot'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'paper-circuit'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'dance'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'compose-song'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'sensing-game'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'ai-hour-of-code'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'calming-leds'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'computational-thinking-and-computational-fluency'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'create-a-dance', 'author' => 'Code.org'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'create-a-simulation', 'author' => 'Code.org'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'create-your-own-masterpiece', 'author' => 'Code.org'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'cs-first-unplugged-activities', 'author' => 'Google'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'family-care', 'author'=>'Allen Yan / MakeX'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'virtual-flower-field'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'haunted-house'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'inclusive-app-design'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'silly-eyes'])--}}
                {{--                        @include('2021._thumbnail', ['slug' => 'train-ai-bot', 'author'=>'Code.org'])--}}


                {{--                    </section>--}}

                {{--                </div>--}}

                {{--                <section>--}}
                {{--                    <div class="mt-8 text-3xl orange">--}}
                {{--                        @lang('challenges.main.5')--}}
                {{--                    </div>--}}
                {{--                    <div class="mt-2 text-base leading-6 text-left">--}}
                {{--                        @lang('challenges.main.6')--}}
                {{--                    </div>--}}
                {{--                </section>--}}

                {{--                <section>--}}
                {{--                    <div class="mt-6 text-3xl orange">--}}
                {{--                        @lang('challenges.main.7')--}}
                {{--                    </div>--}}
                {{--                    <div class="text-base leading-6 text-left">--}}
                {{--                        <ul class="mt-2 ml-6 list-decimal">--}}
                {{--                            <li>--}}
                {{--                                @lang('challenges.main.8')--}}

                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                @lang('challenges.main.9')--}}

                {{--                            </li>--}}
                {{--                        </ul>--}}


                {{--                    </div>--}}

                {{--                    <div class="mt-6 text-3xl orange">--}}
                {{--                        @lang('challenges.main.10')--}}

                {{--                    </div>--}}
                {{--                    <div class="text-base leading-6 text-left">--}}

                {{--                        <div class="mt-2 text-base leading-6 text-left">--}}
                {{--                            @lang('challenges.main.11')--}}
                {{--                            <br>--}}
                {{--                            @lang('challenges.main.12')--}}
                {{--                            <br/>--}}
                {{--                            @lang('challenges.main.13')--}}
                {{--                            <br/>--}}

                {{--                        </div>--}}

                {{--                        <div class="mt-2 text-base leading-6 text-left">--}}
                {{--                            <strong> @lang('challenges.share.0')</strong>--}}

                {{--                            <ul class="mt-0 mt-2 ml-2 leading-7 checklist">--}}
                {{--                                <li>@lang('challenges.share.1')</li>--}}
                {{--                                <li>@lang('challenges.share.2')</li>--}}
                {{--                                <li>@lang('challenges.share.3')</li>--}}
                {{--                                <ul class="mt-0 ml-6 leading-7 sub-checklist">--}}
                {{--                                    <ol>--}}
                {{--                                        <li>@lang('challenges.share.4')</li>--}}
                {{--                                        <li>@lang('challenges.share.5')</li>--}}
                {{--                                        <li>@lang('challenges.share.6')</li>--}}
                {{--                                        <li>@lang('challenges.share.7')</li>--}}
                {{--                                        <li>@lang('challenges.share.8')</li>--}}
                {{--                                    </ol>--}}
                {{--                                </ul>--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}

                {{--                        <div class="mt-2 text-base leading-6 text-left">--}}

                {{--                            <strong>@lang('challenges.share.9')</strong><br/>--}}
                {{--                            <div class="mt-2">--}}
                {{--                                @lang('challenges.share.10') <a href="https://www.facebook.com/codeEU">@lang('challenges.share.11')</a> @lang('challenges.share.12')  <br/>--}}

                {{--                                @lang('challenges.share.13')--}}
                {{--                                <ul class="mt-0 ml-2 leading-7 checklist">--}}
                {{--                                    <li>--}}
                {{--                                        @lang('challenges.share.14')--}}
                {{--                                    </li>--}}
                {{--                                </ul>--}}


                {{--                            </div>--}}
                {{--                        </div>--}}


                {{--                        <div class="mt-2 text-base leading-6 text-left">--}}

                {{--                            <strong>@lang('challenges.bingo.0')</strong><br/>--}}
                {{--                            <div class="mt-2">--}}
                {{--                                @lang('challenges.bingo.1') <a--}}
                {{--                                        href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Bingo+card.pdf">@lang('challenges.bingo.2')</a> @lang('challenges.bingo.3')--}}
                {{--                                <br/>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}

                {{--                        <div class="mt-6 text-base leading-6 text-left">--}}

                {{--                            <strong>@lang('challenges.bingo.4')</strong><br/>--}}
                {{--                            <div class="mt-2">--}}
                {{--                                @lang('challenges.bingo.5') <strong>@lang('challenges.bingo.6')</strong><br/>--}}
                {{--                                @lang('challenges.bingo.7') <strong>#EUCodeWeekChallengesBingo</strong><br/>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}


                {{--                    </div>--}}

                {{--                    <div class="mt-6 text-3xl orange">--}}
                {{--                        @lang('challenges.take-part.0')--}}
                {{--                    </div>--}}
                {{--                    <div class="text-base leading-6 text-left">--}}
                {{--                        <ul class="mt-0 mt-2 ml-2 leading-7 checklist">--}}
                {{--                            <li>--}}
                {{--                                @lang('challenges.take-part.1')--}}

                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                @lang('challenges.take-part.2')--}}

                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                @lang('challenges.take-part.3')--}}

                {{--                            </li>--}}
                {{--                        </ul>--}}


                {{--                    </div>--}}
                {{--                </section>--}}

            </div>
        </section>


    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '• ';
            color: #ee6a2c;
            font-weight: bold;
        }

        ul.sub-checklist li:before {
            content: '- ';
            color: #9d5025;
            font-weight: bold;
        }
    </style>
@endsection
