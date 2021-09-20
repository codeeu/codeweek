@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="flex flex-row justify-between" style="background-color: #908CA5">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full">

                        <div class="text-5xl text-white">@lang('challenges.title')</div>
                        <div class="text-3xl text-yellow-200">@lang('challenges.date')</div>
                    </div>
                </div>
            </div>

            <div class="md:w-full md:flex hidden">
                <img src="{{asset('img/2021/challenges/main-banner.png')}}">

            </div>


        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                <div class="leading-6">
                    <p class="text-xl text-left text-blue-600">@lang('challenges.main.0')</p>
                </div>

                <div class="orange text-3xl">
                    @lang('challenges.main.1')
                </div>

                <div class="leading-6 text-base text-left">
                    <p>
                        @lang('challenges.main.2')

                    </p>
                    <p>
                        @lang('challenges.main.3')

                    </p>
                    <p>
                        @lang('challenges.main.4')
                    </p>


                    <section class="grid grid-cols-1 gap-6 md:grid-cols-3">


                        @include('2021._thumbnail', ['slug' => 'chatbot'])
                        @include('2021._thumbnail', ['slug' => 'paper-circuit'])
                        @include('2021._thumbnail', ['slug' => 'dance'])
                        @include('2021._thumbnail', ['slug' => 'compose-song'])
                        @include('2021._thumbnail', ['slug' => 'sensing-game'])
                        @include('2021._thumbnail', ['slug' => 'ai-hour-of-code'])
                        @include('2021._thumbnail', ['slug' => 'calming-leds'])
                        @include('2021._thumbnail', ['slug' => 'computational-thinking-and-computational-fluency'])
                        @include('2021._thumbnail', ['slug' => 'create-a-dance', 'author' => 'Code.org'])
                        @include('2021._thumbnail', ['slug' => 'create-a-simulation', 'author' => 'Code.org'])
                        @include('2021._thumbnail', ['slug' => 'create-your-own-masterpiece', 'author' => 'Code.org'])
                        @include('2021._thumbnail', ['slug' => 'cs-first-unplugged-activities', 'author' => 'Google'])
                        @include('2021._thumbnail', ['slug' => 'family-care'])
                        @include('2021._thumbnail', ['slug' => 'virtual-flower-field'])
                        @include('2021._thumbnail', ['slug' => 'haunted-house'])
                        @include('2021._thumbnail', ['slug' => 'inclusive-app-design'])
                        @include('2021._thumbnail', ['slug' => 'silly-eyes'])
                        @include('2021._thumbnail', ['slug' => 'train-ai-bot'])


                    </section>

                </div>

                <section>
                    <div class="mt-8 orange text-3xl">
                        @lang('challenges.main.5')
                    </div>
                    <div class="leading-6 text-base text-left mt-2">
                        @lang('challenges.main.6')
                    </div>
                </section>

                <section>
                    <div class="mt-6 orange text-3xl">
                        @lang('challenges.main.7')
                    </div>
                    <div class="leading-6 text-base text-left">
                        <ul class="list-decimal ml-6 mt-2">
                            <li>
                                @lang('challenges.main.8')

                            </li>
                            <li>
                                @lang('challenges.main.9')

                            </li>
                        </ul>


                    </div>

                    <div class="mt-6 orange text-3xl">
                        @lang('challenges.main.10')

                    </div>
                    <div class="leading-6 text-base text-left">

                        <div class="leading-6 text-base text-left mt-2">
                            @lang('challenges.main.11')
                            <br>
                            @lang('challenges.main.12')
                            <br/>
                            @lang('challenges.main.13')
                            <br/>

                        </div>

                        <div class="leading-6 text-base text-left mt-2">
                            <strong> @lang('challenges.share.0')</strong>

                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>@lang('challenges.share.1')</li>
                                <li>@lang('challenges.share.2')</li>
                                <li>@lang('challenges.share.3')</li>
                                <ul class="leading-7 ml-6 mt-0 sub-checklist">
                                    <ol>
                                        <li>@lang('challenges.share.4')</li>
                                        <li>@lang('challenges.share.5')</li>
                                        <li>@lang('challenges.share.6')</li>
                                        <li>@lang('challenges.share.7')</li>
                                        <li>@lang('challenges.share.8')</li>
                                    </ol>
                                </ul>
                            </ul>
                        </div>

                        <div class="leading-6 text-base text-left mt-2">

                            <strong>@lang('challenges.share.9')</strong><br/>
                            <div class="mt-2">
                                @lang('challenges.share.10')<br/>

                                @lang('challenges.share.11')
                                <ul class="leading-7 ml-2 mt-0 checklist">
                                    <li>
                                        @lang('challenges.share.12')
                                    </li>
                                </ul>


                            </div>
                        </div>


                    </div>

                    <div class="mt-6 orange text-3xl">
                        @lang('challenges.take-part.0')
                    </div>
                    <div class="leading-6 text-base text-left">
                        <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                            <li>
                                @lang('challenges.take-part.1')

                            </li>
                            <li>
                                @lang('challenges.take-part.2')

                            </li>
                            <li>
                                @lang('challenges.take-part.3')

                            </li>
                        </ul>


                    </div>
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
