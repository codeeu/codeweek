@extends('layout.new_base')

@section('title', 'CodyPlotter & CodyPrinter – Coding for Digital Creativity')
@section('description', 'Explore how to use coding to design and generate drawings with CodyPlotter and CodyPrinter in this hands-on activity.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner')

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    18. @lang('coding-at-home.codyplotter-and-codyprinter.title')
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    @lang('coding-at-home.codyplotter-and-codyprinter.text')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 flex flex-wrap gap-2">
                    @lang('coding-at-home.material.required'): @lang('coding-at-home.codyplotter-and-codyprinter.material')
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'nIAxdFHQyxA'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('coding-at-home.questions')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('coding-at-home.codyplotter-and-codyprinter.questions.content.1')<br/><br/>
                    @lang('coding-at-home.codyplotter-and-codyprinter.questions.content.2')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    @lang('coding-at-home.texts.3')
                </p>
            </div>
        </section>

        @include("include.licence")
    </section>
@endsection
