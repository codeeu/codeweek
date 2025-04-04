@extends('layout.new_base')

@section('title', 'Storytelling – A Creative Coding at Home Activity')
@section('description', 'Learn how to use coding to create and tell interactive stories in this fun and educational activity.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', ['title' => __('coding-at-home.storytelling.title')])

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    12. @lang('coding-at-home.storytelling.title')
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    @lang('coding-at-home.storytelling.text')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 flex flex-wrap gap-2">
                    @lang('coding-at-home.material.required'):
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">@lang('coding-at-home.material2.chequered-with-labels')</a>; @lang('coding-at-home.material2.cards'); @lang('coding-at-home.material2.larger-cards').
                    @lang('coding-at-home.material2.pieces-of-paper').
                    <a href="http://codemooc.org/wp-content/uploads/2020/02/storytelling-characters.pdf">@lang('coding-at-home.material2.small-drawings')</a>.
                    @lang('coding-at-home.material2.rest-of-cards').
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'fUtMFBmv-P8'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('coding-at-home.questions')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('coding-at-home.storytelling.questions.content.1')<br/><br/>
                    @lang('coding-at-home.storytelling.questions.content.2')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    @lang('coding-at-home.texts.3')
                </p>
            </div>
        </section>

        @include("include.licence")
    </section>
@endsection