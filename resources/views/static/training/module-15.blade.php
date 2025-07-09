@extends('layout.new_base')

@section('title', 'Mining Media Literacy – Free Training Course')
@section('description', 'This Learning Bit will enable you to implement various strategies and techniques to empower your students to become media literate. ')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', [
          'author' => __('training.lessons.15.author'),
          'title' => __('training.lessons.15.title')
        ])

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <p class="text-[#20262C] font-normal text-lg md:text-xl">
                    @lang('training.lessons.15.text.1')
                </p>
                <p class="text-[#20262C] font-normal text-lg md:text-xl pt-0">
                    @lang('training.lessons.15.text.2')
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'sZkXQ6-Nemk'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('training.ready_to_share')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-4">
                    @lang('training.lessons.15.text.2')
                </p>
                <ul class="m-0 mb-6 list-none">
                    <li class="p-0 font-normal leading-7 text-default">
                        <a class="text-dark-blue" href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-015-ACTIVITY-01.docx">
                            @lang('training.lessons.15.activities.1')
                        </a>
                    </li>
                    <li class="p-0 font-normal leading-7 text-default">
                        <a class="text-dark-blue" href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-015-ACTIVITY-02.docx">
                            @lang('training.lessons.15.activities.2')
                        </a>
                    </li>
                    <li class="p-0 font-normal leading-7 text-default">
                        <a class="text-dark-blue" href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-015-ACTIVITY-03.docx">
                            @lang('training.lessons.15.activities.3')
                        </a>
                    </li>
                </ul>
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
