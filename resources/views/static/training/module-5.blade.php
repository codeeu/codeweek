@extends('layout.new_base')

@section('title', 'Robotics & Tinkering – EU Code Week Training')
@section('description', 'The integration of coding, tinkering, robotics, and microelectronics as teaching and learning tools in the school curricula is key in 21st century education.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', [
          'author' => __('training.lessons.5.author'),
          'title' => __('training.lessons.5.title')
        ])

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <div class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('training.lessons.5.text')
                </div>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => '5V9G-vWWSik'])
                </div>

                <a class="text-dark-blue text-lg font-medium font-['Montserrat'] underline block mb-6" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-005-VIDEO-SCRIPT-{{strtoupper(App::getLocale())}}.DOCX">
                    @lang('training.download_video_script')
                </a>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('training.ready_to_share')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-4">
                    @lang('training.choose_lessons')
                </p>
                <ul class="list-none m-0 mb-6">
                    <li class="p-0 text-default font-normal leading-7">
                        <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-005-ACTIVITY-01-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.5.activities.1')
                        </a>
                    </li>
                    <li class="p-0 text-default font-normal leading-7">
                        <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-005-ACTIVITY-02-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.5.activities.2')
                        </a>
                    </li>
                    <li class="p-0 text-default font-normal leading-7">
                        <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-005-ACTIVITY-03-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.5.activities.3')
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