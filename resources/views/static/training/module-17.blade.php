@extends('layout.new_base')

@section('title', 'Feel the Code – Interactive Coding Training')
@section('description', 'Discover a hands-on approach to coding with EU Code Week’s ""Feel the Code"" training, designed for an engaging learning experience.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', [
          'author' => __('training.lessons.17.author'),
          'title' => __('training.lessons.11.title')
        ])

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <p class="text-[#20262C] font-normal text-lg md:text-xl">
                    @lang('training.lessons.17.text.0')
                </p>
                <p class="text-[#20262C] font-normal text-lg md:text-xl pt-0">
                    @lang('training.lessons.17.text.1')
                </p>
                <p class="text-[#20262C] font-normal text-lg md:text-xl pt-0">
                    @lang('training.lessons.17.text.2')
                </p>
                <p class="text-[#20262C] font-normal text-lg md:text-xl pt-0">
                    @lang('training.lessons.17.text.3')
                </p>

                <div class="mb-10" style="height:700px;">
                    <iframe src="https://view.genial.ly/629299576bc63f0012075f0f" height="700em"
                            width="100%" title="Feel the code"></iframe>
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('training.ready_to_share')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-4">
                    @lang('training.choose_lessons')
                </p>
                <ul class="list-none m-0 mb-6">
                    <li class="p-0 text-default font-normal leading-7">
                        <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-017-ACTIVITY-01-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.17.activities.1')
                        </a>
                    </li>
                    <li class="p-0 text-default font-normal leading-7">
                        <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-017-ACTIVITY-02-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.17.activities.2')
                        </a>
                    </li>
                    <li class="p-0 text-default font-normal leading-7">
                        <a class="text-dark-blue" href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-017-ACTIVITY-03-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.17.activities.3')
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
