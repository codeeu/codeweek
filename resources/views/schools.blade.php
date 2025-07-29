@extends('layout.new_base')

@section('title', 'EU Code Week for Schools – Bring Coding to Your Classroom')
@section('description', 'Empower students with coding! Access resources, lesson plans, and activities to integrate coding into your school curriculum.')

@php
    $list = [
        (object) ['label' => 'Schools', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')

    <section id="codeweek-schools-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient md:py-20">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col justify-end md:justify-start md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28 h-[560px]">
                        <div class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                @lang('menu.why')
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @lang('schools.title')
                            </p>
                        </div>
                        <div
                            class="absolute top-0 -left-1/4 w-[150vw] h-full !max-w-none md:hidden bg-blue-gradient"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        >
                            <img src="images/banner_training.svg" class="mx-auto h-full static-image translate-y-[10%]">
                        </div>
                        <div
                            class="absolute top-0 right-0 !h-full w-full max-w-[calc(70vw)] object-cover hidden md:block bg-blue-gradient"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        >
                            <img src="images/banner_training.svg" class="mx-auto h-full static-image translate-y-[10%]">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden">
            <div class="relative z-10 py-10 md:py-20 codeweek-container-lg">
                @foreach($questions as $index => $question)
                    <div class="relative flex gap-x-8 pb-4 tablet:pb-16 last:pb-0">
                        <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                            {{ $index + 1 }}
                        </div>
                        @if(!$loop->last)
                        <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                        @endif
                        <div class="flex-1">
                            <p class="font-semibold text-dark-blue text-2xl tablet:text-3xl mb-2 p-0">{{ $question['title1'] }}</p>
                            <p class="font-semibold text-[#20262C] text-xl tablet:text-2xl mb-2 p-0">{{ $question['title2'] }}</p>
                            <div>
                                @foreach($question['content'] as $content)
                                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-3 last:mb-0">
                                        {{ $content }}
                                    </p>
                                @endforeach
                            </div>
                            @if($question['map'])
                                <iframe class="w-full h-[400px] border-0" src="/map" scrolling="no"></iframe>
                            @endif
                            @if($question['button']['show'])
                                <div class="mt-4 flex justify-start">
                                    <a href="{{$question['button']['link']}}" class="xl:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-3 px-4 text-center md:px-16 font-semibold text-lg">
                                        <span>{{ $question['button']['label'] }}</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </section>
    </section>

@endsection