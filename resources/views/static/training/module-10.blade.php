@extends('layout.new_base')

@section('title', 'Creative Coding with Python – Learn Programming Creatively')
@section('description', 'Explore Python’s potential for creative projects, from digital art to interactive applications.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', [
          'author' => __('training.lessons.10.author'),
          'title' => __('training.lessons.10.title')
        ])
        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <div class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('training.lessons.10.text')
                </div>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'nr6GpD6EbVo'])
                </div>

                <a class="text-dark-blue text-lg font-medium font-['Montserrat'] underline block mb-6" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-010-VIDEO-SCRIPT-{{strtoupper(App::getLocale())}}.DOCX">
                    @lang('training.download_video_script')
                </a>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('training.ready_to_share')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-4">
                    @lang('training.choose_lessons')
                </p>
                <ul class="m-0 mb-6 list-none">
                    <li class="p-0 font-normal leading-7 text-default">
                        <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-010-ACTIVITY-01-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.10.activities.1')
                        </a>
                    </li>
                    <li class="p-0 font-normal leading-7 text-default">
                        <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-010-ACTIVITY-02-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.10.activities.2')
                        </a>
                    </li>
                    <li class="p-0 font-normal leading-7 text-default">
                        <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-010-ACTIVITY-03-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.10.activities.3')
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