@extends('layout.base')

@section('title', 'EU Code Week Podcasts – Inspiring Talks on Coding')
@section('description', 'Listen to expert discussions on coding, education, and digital literacy. Stay inspired with EU Code Week’s podcast series.')

<x-tailwind></x-tailwind>
<x-alpine></x-alpine>

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
                    innovation closer to you, your community and your school. Join Arjana Blazic, Eugenia Casariego and Eirini Symeonidou, from the Code Week Team, as they explore a range of topics, from media literacy to robotics, with the help of expert guests –
                    to empower you to equip your students with the skills to confront the challenges and opportunities
                    posed by a digital future.
                </div>
                <div class="mb-4">
                    You can listen to the podcasts here or on <a
                            href="https://open.spotify.com/show/5AHSuZvjLSdbaO381lv3Qk" target="_blank" rel="noreferer noopener">Spotify</a>, <a
                            href="https://podcasts.apple.com/us/podcast/eu-code-week-podcast-series/id1592076780"
                            target="_blank" rel="noreferer noopener">Apple podcasts</a>.
                </div>





                    <section class="grid grid-cols-1 gap-6 md:grid-cols-3" x-data="{}">
                    @foreach($podcasts as $key => $podcast)
                        @include('2021._podcast_tile', ['podcast' => $podcast, 'bg' => $key%2 ?'bg-gray-300':'bg-gray-200'])

                    @endforeach
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
