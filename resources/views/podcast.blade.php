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
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full uppercase">
                        <h1>EU Code Week Podcasts</h1>
                    </div>
                </div>
            </div>

            <div class="md:w-full md:flex hidden">
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
                    innovation closer to you, your community and your school. Join Eugenia Casariego and Arjana Blazic, from the Code Week Team, as they explore a range of topics, from media literacy to robotics, with the help of expert guests –
                    to empower you to equip your students with the skills to confront the challenges and opportunities
                    posed by a digital future.
                </div>
                <div class="mb-4">
                    You can listen to the podcasts here or on <a
                            href="https://open.spotify.com/show/5AHSuZvjLSdbaO381lv3Qk" target="_blank" rel="noreferer noopener">Spotify</a>, <a
                            href="https://podcasts.google.com/feed/aHR0cHM6Ly9jb2Rld2Vlay5ldS9mZWVkL3BvZGNhc3Rz"
                            target="_blank" rel="noreferer noopener">Google podcasts</a> or <a
                            href="https://podcasts.apple.com/us/podcast/eu-code-week-podcast-series/id1592076780"
                            target="_blank" rel="noreferer noopener">Apple podcasts</a>.
                </div>

                <section class="grid grid-cols-1 gap-6 md:grid-cols-1">

                        @include('2021._podcast_full', ['podcast' => $podcast, 'bg' => 'bg-gray-300'])


                </section>


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
