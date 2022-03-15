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




                <section class="grid grid-cols-1 gap-6 md:grid-cols-1">

                        @include('2021._podcast_full', ['podcast' => $podcast, 'bg' => 'bg-gray-300'])


                </section>


            </div>
        </section>


    </section>

@endsection

