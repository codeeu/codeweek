@extends('layout.new_base')

@section('title', 'Making and Coding – Hands-On Digital Creativity')
@section('description', 'Explore the intersection of coding and making with creative, practical projects.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner')

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('training.lessons.21.title')
                </h2>
                <div class="w-fit px-4 py-1.5 bg-light-blue-100 rounded-full flex items-center gap-2">
                    <p class="text-slate-500 p-0 text-default font-semibold">@lang('training.lessons.21.author')</p>
                </div>
                <p class="text-[#20262C] font-normal text-lg md:text-xl">
                    @lang('training.lessons.21.text.0')
                </p>
                <p class="text-[#20262C] font-normal text-lg md:text-xl pt-0">
                    @lang('training.lessons.21.text.1')
                </p>
                <p class="text-[#20262C] font-normal text-lg md:text-xl pt-0">
                    @lang('training.lessons.21.text.2')
                </p>
                <p class="text-[#20262C] font-normal text-lg md:text-xl pt-0">
                    @lang('training.lessons.21.text.3')
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'cUBq7igIRlI'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('training.ready_to_share')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-4">
                    @lang('training.choose_lessons')
                </p>

                @php
                    $missingLocales = ['DA', 'FI', 'ME', 'MT', 'PL'];
                    $currentLocale = app()->getLocale();
                @endphp

                @if(in_array(strtoupper($currentLocale), $missingLocales))
                    <ul class="list-none m-0 mb-6">
                        <li class="p-0 text-default font-normal leading-7">
                            <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-021-ACTIVITY-01.docx">
                                @lang('training.lessons.21.activities.1')
                            </a>
                        </li>
                        <li class="p-0 text-default font-normal leading-7">
                            <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-021-ACTIVITY-02.docx">
                                @lang('training.lessons.21.activities.2')
                            </a>
                        </li>
                        <li class="p-0 text-default font-normal leading-7">
                            <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-021-ACTIVITY-03.docx">
                                @lang('training.lessons.21.activities.3')
                            </a>
                        </li>
                    </ul>
                @else
                    <ul class="list-none m-0 mb-6">
                        <li class="p-0 text-default font-normal leading-7">
                            <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-021-ACTIVITY-01.docx">
                                @lang('training.lessons.21.activities.1')
                            </a>
                        </li>
                        <li class="p-0 text-default font-normal leading-7">
                            <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-021-ACTIVITY-02.docx">
                                @lang('training.lessons.21.activities.2')
                            </a>
                        </li>
                        <li class="p-0 text-default font-normal leading-7">
                            <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-021-ACTIVITY-03.docx">
                                @lang('training.lessons.21.activities.3')
                            </a>
                        </li>
                    </ul>
                @endif
                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat']">
                    @lang('training.footer.title')
                </h2>

                <div class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('training.footer.text')
                </div>
            </div>
        </section>

        @include("include.licence")
    </section>
@endsection
