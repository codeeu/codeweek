@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Girls in Digital', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@php
    $useDynamic = $page && $page->use_dynamic_content;
    $btn = function($key) use ($page, $useDynamic) {
        if (!$useDynamic) {
            return null;
        }
        return $page ? $page->getButton($key) : null;
    };
    $content = function($key) use ($page, $useDynamic) {
        if (!$useDynamic || !$page) {
            return '';
        }
        return $page->contentForLocale($key);
    };
@endphp
@section('content')
    <section id="codeweek-digital-girls" class="font-['Blinker'] overflow-hidden">
        <section class="flex overflow-hidden relative">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-[7.5rem]">
                <div class="flex overflow-hidden flex-col flex-shrink-0 justify-end pb-10 w-full md:p-0 md:flex-row md:items-center">
                    <div class="flex flex-col gap-28 duration-1000 home-activity codeweek-container-lg md:flex-row md:items-center md:gap-4 xl:gap-28">
                        <div class="order-1 px-6 flex-1 py-10 max-md:w-full md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <img
                                class="mb-4 max-w-full"
                                src="/images/digital-girls/digital_girls_logo.svg"
                            />
                            <p class="text-xl md:text-2xl leading-8 text-[#333E48] p-0">
                                @if($useDynamic && $page->hero_intro)
                                    {!! $page->hero_intro !!}
                                @else
                                    {{ $content('landing_header') ?: "We're excited to announce Girls in Digital Week 2026! Empower, inspire and celebrate the next generation of girls and young Europeans!" }}
                                @endif
                            </p>
                        </div>
                        <div class="flex z-10 flex-1 justify-center items-center order-0 md:order-2">
                            @include('layout.video-player', [
                                'id' => 'girls-digital-hero',
                                'src' => ($useDynamic && $page->hero_video_url) ? $page->hero_video_url : 'https://www.youtube.com/embed/XfYqEYLbPWY?si=7JQaVoVM6bJLuuoT',
                            ])
                        </div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/digital-girls/banner_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/digital-girls/banner_bg.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 animation-section">
            <div class="flex relative z-10 flex-col-reverse gap-12 items-center py-20 pb-32 codeweek-container-lg md:flex-row md:pb-48">
                <div class="flex-1">
                    <div class="inline-block relative observer-element">
                        <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/digital-girls/about-girls.png" />
                        <img
                            class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                            loading="lazy"
                            src="/images/shape.png"
                            style="transform: translate(-16px, -24px)"
                        />
                    </div>
                </div>
                <div class="flex-1">
                    <h2 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        {{ $content('about_girls_title') ?: 'About Girls in Digital' }}
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                       {{ $content('about_girls_description_1') ?: 'Get ready to celebrate Girls in Digital Week from 23–27 March 2026, as we put a spotlight on inclusion, innovation, and the limitless opportunities digital skills offer to all!' }}
                    </p>
                    <p class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-6">
                        {!! $content('about_girls_description_2') ?: 'Girls in Digital encourages communities to get involved in meaningful ways. Through <strong>Girls Code It Better (GCIB) Sprints</strong>, educators and organisations can offer hands-on learning experiences where girls collaborate, build confidence, and solve real-world challenges using digital tools. The <strong>Female Role Model Database</strong> connects young people with women and gender-diverse professionals in STE(A)M, sharing stories and guidance that support their digital journeys. <strong>Together, these initiatives help turn curiosity into confidence and ideas into possibility.</strong>' !!}
                    </p>
                    <div class="flex flex-col gap-4 mb-4 xl:flex-row xl:mb-6">
                        @if($b = $btn('gcib_sprint_hero'))
                        <a
                            class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                            href="{{ $b->url }}"
                            @if($b->open_new_tab) target="_blank" rel="noopener" @endif
                        >
                            <span>{{ $b->label }}</span>
                            <div class="flex overflow-hidden gap-2 w-4">
                                <img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                            </div>
                        </a>
                        @else
                        <a
                            class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                            href="https://codeweek.eu/blog/girls-in-digital-week-2026/"
                        >
                            <span>Girls Code It Better Sprint</span>
                            <div class="flex overflow-hidden gap-2 w-4">
                                <img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                            </div>
                        </a>
                        @endif
                    </div>
                    <div class="flex flex-col gap-4 2xl:flex-row">
                        <div class="flex flex-wrap gap-4">
                            @if($b = $btn('female_role_models'))
                            <a
                                class="w-full xl:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-3 px-8 font-semibold text-lg"
                                href="{{ $b->url }}"
                                @if($b->open_new_tab) target="_blank" rel="noopener" @endif
                            >
                                <span>{{ $b->label }}</span>
                            </a>
                            @else
                            <a
                                class="w-full xl:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-3 px-8 font-semibold text-lg"
                                href="https://codeweek.ecwt.eu/"
                                target="_blank"
                            >
                                <span>Female Role Models Database</span>
                            </a>
                            @endif
                        </div>
                        <div class="flex flex-wrap gap-4">
                            @if($b = $btn('open_call_challenges'))
                            <a
                                class="w-full xl:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-3 px-8 font-semibold text-lg"
                                href="{{ $b->url }}"
                                @if($b->open_new_tab) target="_blank" rel="noopener" @endif
                            >
                                <span>{{ $b->label }}</span>
                            </a>
                            @else
                            <a
                                class="w-full xl:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-3 px-8 font-semibold text-lg"
                                href="/docs/girls-in-digital/open-call-for-new-code-week-challenges_v2.pdf"
                                target="_blank"
                            >
                                <span>Open Call for GiD Challenges</span>
                            </a>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-2/3 -right-14 md:-right-36 w-28 md:w-72 h-28 md:h-72 bg-[#A4B8D9] rounded-full lg:hidden xl:block"
                style="transform: translate(-16px, -24px)"
            ></div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 -bottom-28 right-40 w-28 h-28 hidden xl:block bg-[#A4B8D9] rounded-full"
                style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-blue-gradient md:block" style="clip-path: ellipse(88% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-12 md:pt-48 md:pb-28">
                <div class="codeweek-container-lg">
                    <h2 class="text-white md:text-center text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-16">
                        {{ $content('resource_title') ?: 'Resources' }}
                    </h2>
                    <div class="flex flex-col gap-6 justify-between md:flex-row md:gap-20">
                        <div class="px-6 py-8 w-full bg-white rounded-2xl md:p-12">
                            <h3 class="text-[#1C4DA1] text-2xl md:text-3xl font-medium font-['Montserrat'] mb-6">
                                {{ $content('resource_person_title') ?: 'Are you a young person or parent?' }}
                            </h3>
                            <p class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-10">
                                {!! $content('resource_person_description_1') ?: 'You are a <span class="font-semibold">young person</span> curious about technology, coding, or digital creativity; search for activities near you or connect with a role model through the Female Role Model Database. You are a <span class="font-semibold">parent</span> seeking safe, inclusive digital activities; find opportunities nearby and explore the Female Role Model Database for inspiring role models.' !!}
                            </p>
                            <div class="flex flex-wrap gap-4">
                                @if($b = $btn('search_activity'))
                                <a class="w-full md:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg" href="{{ $b->url }}" @if($b->open_new_tab) target="_blank" rel="noopener" @endif><span>{{ $b->label }}</span></a>
                                @else
                                <a class="w-full md:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg" href="/events"><span>Search an activity</span></a>
                                @endif
                                @if($b = $btn('meet_role_model'))
                                <a class="w-full md:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg" href="{{ $b->url }}" @if($b->open_new_tab) target="_blank" rel="noopener" @endif><span>{{ $b->label }}</span></a>
                                @else
                                <a class="w-full md:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg" href="https://codeweek.ecwt.eu/role-models/" target="_blank"><span>Meet a Role Model</span></a>
                                @endif
                            </div>
                        </div>
                        <div class="px-6 py-8 w-full bg-white rounded-2xl md:p-12">
                            <h3 class="text-[#1C4DA1] text-2xl md:text-3xl font-medium font-['Montserrat'] mb-6">
                                {{ $content('resource_educator_title') ?: 'Are you an educator?' }}
                            </h3>
                            <p class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-10">
                                {{ $content('resource_educator_description') ?: 'You are an educator looking to organise an activity to empower youth with digital skills in a safe and inclusive environment, where all feel welcomed to explore the endless opportunities that digital has to offer. Check our resources below for guidance and support in bringing your activity to life.' }}
                            </p>
                            <div class="flex flex-wrap gap-4">
                                @if($b = $btn('organise_gcib_sprint'))
                                <a class="w-full md:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg" href="{{ $b->url }}" @if($b->open_new_tab) target="_blank" rel="noopener" @endif><span>{{ $b->label }}</span></a>
                                @else
                                <a class="w-full md:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg" href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/GCIB-Sprint-materials.zip"><span>Organise a GCIB Sprint</span></a>
                                @endif
                                @if($b = $btn('activity_guideline'))
                                <a class="w-full md:w-auto flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-6 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group" href="{{ $b->url }}" @if($b->open_new_tab) target="_blank" rel="noopener" @endif>
                                    <span>{{ $b->label }}</span>
                                    <div class="flex overflow-hidden gap-2 w-4"><img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" /><img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" /></div>
                                </a>
                                @else
                                <a class="w-full md:w-auto flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-6 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group" target="_blank" href="/docs/girls-in-digital/girls-in-digital-activity-guidelines.pdf">
                                    <span>Girls in Digital Activity Guideline</span>
                                    <div class="flex overflow-hidden gap-2 w-4"><img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" /><img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" /></div>
                                </a>
                                @endif
                                @if($b = $btn('social_media_kit'))
                                <a class="w-full md:w-auto flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-6 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group" href="{{ $b->url }}" @if($b->open_new_tab) target="_blank" rel="noopener" @endif>
                                    <span>{{ $b->label }}</span>
                                    <div class="flex overflow-hidden gap-2 w-4"><img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" /><img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" /></div>
                                </a>
                                @else
                                <a class="w-full md:w-auto flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-6 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group" target="_blank" href="/docs/girls-in-digital/girls-in-digital-media-kit.pdf">
                                    <span>Social Media Kit</span>
                                    <div class="flex overflow-hidden gap-2 w-4"><img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" /><img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" /></div>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="overflow-hidden relative">
            <div class="relative py-20 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-16">
                    Why Girls in Digital Matters
                </h2>
                <div class="flex flex-col gap-12 justify-between lg:flex-row">
                    <div class="w-full">
                        <a
                            class="block mb-12 p-6 lg:py-10 rounded-lg border-2 border-[#A4B8D9]"
                            href="https://ec.europa.eu/eurostat/statistics-explained/index.php?title=Young_people_-_digital_world"
                            target="_blank"
                        >
                            <img src="/images/digital-girls/fig-1.png" alt="Young people – digital world. Eurostat 2023" />
                        </a>
                        <a
                            class="block mb-12 p-6 rounded-lg border-2 border-[#A4B8D9]"
                            href="https://ec.europa.eu/eurostat/statistics-explained/index.php?title=ICT_specialists_in_employment#Explore_further"
                            target="_blank"
                        >
                            <img src="/images/digital-girls/fig-2.png" alt="ICT specialists in employment. Eurostat 2023" />
                        </a>
                        <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-10">
                            The graphs illustrate the persistent gender gap in ICT across different stages of a young European’s journey, from education to professional life. While female representation has gradually increased between 2013 and 2023, the sector remains male-dominated, highlighting the need for further progress in closing the gap.
                        </p>
                    </div>
                    <div class="w-full">
                        <a
                            class="block mb-12 p-6 rounded-lg border-2 border-[#A4B8D9]"
                            href="https://unesdoc.unesco.org/ark:/48223/pf0000253479"
                            target="_blank"
                        >
                            <img src="/images/digital-girls/fig-3.png" alt="Cracking the code: Girls’ and women’s education in science, technology, engineering and mathematics (STEM). United Nations Educational, Scientific and Cultural Organization (UNESCO), 2017." />
                        </a>
                       <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-10">
                            Multiple interconnected factors influence girls' and women's participation, achievement, and progression in STEM, with individual beliefs shaped by family, peers, education, and broader societal influences. This diagram illustrates the various factors at different levels influencing female representation in STEM. Addressing these factors holistically has been shown to positively impact confidence and motivation, encouraging more girls and women to pursue STEM education and careers.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-light-blue md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-light-blue md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-light-blue lg:block" style="clip-path: ellipse(98% 90% at 50% 90%);"></div>
            <div class="flex relative justify-center pt-28 pb-28 md:pt-48 codeweek-container-lg">
                <div class="w-full max-w-[708px]">
                    <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-10">
                        FAQ’s
                    </h2>

                    <div class="accordion">
                        {{-- General FAQs --}}
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>What is Girls in Digital?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Girls in Digital (GiD) is an EU Code Week initiative aimed at empowering girls and young women to explore and excel in digital skills, STE(A)M fields, and technology-driven careers while fostering gender equality. 
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Who can participate in Girls in Digital activities?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    The initiative is inclusive of all genders, but its primary focus is on encouraging and empowering girls and young women. Activities can be tailored for girls-only groups or mixed-gender settings. 
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Why does Girls in Digital focus on girls?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                   Girls are underrepresented in digital fields, STE(A)M careers, and ICT studies. GiD aims to bridge these gaps and inspire a new generation of women in technology by breaking down gender stereotypes and promoting equality. A more gender-balanced workforce in these fields will not only foster innovation but also contribute to building a better, more inclusive future.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Who can participate in Girls in Digital activities?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    The initiative is inclusive of all genders, but its primary focus is on encouraging and empowering girls and young women. Activities can be tailored for girls-only groups or mixed-gender settings. 
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>What is a Girls Code it Better (GCIB) Sprint?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    <a class="cookweek-link hover-underline" href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/GCIB-Sprint-materials.zip" target="_blank">GCIB Sprint</a>  blogpost is a short, 3–4-hour hands-on learning experience where girls collaborate to tackle real-world challenges using digital tools. It encourages participants to explore the creative potential of technology while strengthening problem-solving, teamwork, and digital skills in a supportive and inclusive environment.
                                    <br>
                                    GCIB Sprints can be organised both online and in person, making them flexible and accessible for different settings and audiences.
                                </div>
                            </div>
                        </div>
                        {{-- For Educators and Organisers --}}
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How can I organise a Girls in Digital activity?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    You can use the Girls Code it Better Sprint Replication Kit and <a class="cookweek-link hover-underline" href="https://codeweek-resources.s3.eu-west-1.amazonaws.com/GCIB-Sprint-materials.zip" target="_blank">supporting materials</a>, which provide step-by-step instructions, resources, and tips to plan and execute an engaging Sprint tailored to your group’s needs. You will need a device for each participant, a stable internet connection and a physical or virtual space.
                                </div>
                            </div>
                        </div>
                        {{-- For Organisers --}}
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Can I organise a GCIB Sprint in a mixed classroom?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                 Yes, you definitely can! The primary target group of the GCIB initiative is girls aged 11–19. However, we recognise that organising girls-only activities may not always be possible. In such cases, GCIB Sprints can also be organised in mixed classrooms, as long as girls make up approximately 75–80% of the participants.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Do I need prior experience in digital skills to organise an activity?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    No, the guidelines are designed to be accessible for everyone, regardless of their expertise. They include examples, templates, and resources to help you get started.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Do I need prior experience in digital skills to organise a GCIB Sprint?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                            A GCIB Sprint requires two coaches—one of the two coaches must have strong skills in the chosen technological area, and the second coach must have skills in the educational field with the age group of the participating girls.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Are there any funding opportunities for Girls in Digital events?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    This depends on your region and local resources. Check with your national or regional hubs or reach out to partners affiliated with the initiative. Find the list of EU Code Week national and regional hubs <a href="/community">HERE</a>.
                                </div>
                            </div>
                        </div>
                        {{-- For Students and Participants --}}
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>What is the Female Role Model Database and who is it for?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    <a href="https://codeweek.ecwt.eu/" target="_blank">The Female Role Model Database</a> is a collection of inspiring European women and gender-diverse professionals working in STE(A)M. It is designed for young people, parents, educators, and anyone curious about STE(A)M careers. The database helps users discover real role models, learn about different career paths, and feel more confident exploring opportunities in science, technology, engineering, arts, and mathematics.
                                    
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How can I search for and choose a role model that matches my interests or career goals in STE(A)M?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
You can browse the database using filters such as STE(A)M field and professional title. Each profile shares the role model’s background, what they work on, and the topics they are happy to discuss. This makes it easy to find someone who matches your interests or future goals.

                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How can I contact a role model and what can I ask them?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
Each role model profile includes links to their preferred social media or professional platforms enabling you to get in contact with them. You can reach out to ask questions about studies, careers, skills to learn, or challenges they’ve faced. Please be polite, clear, and respectful when contacting role models, as they are volunteering their time to support others.

                                </div>
                            </div>
                        </div>
                        {{-- Impact and Vision --}}
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How can I become a role model and be included in the Female Role Model Database?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
If you would like to join the Female Role Models Database as a role model, you can register by filling out the <a href="https://codeweek.ecwt.eu/questionnaire/" target="_blank">Questionnaire</a> available on the Female Role Models page. The questionnaire takes around 5–10 minutes to complete and helps us understand your background, areas of expertise, and how you would like to support others. Once submitted, your profile will be reviewed before being added to the database.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>What is the long-term goal of the initiative?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Our long-term goal is to foster equality in STE(A)M, as a more gender-balanced workforce drives innovation, brings diverse perspectives, and creates a more inclusive environment. When everyone has equal opportunities to contribute, we unlock new ideas, fuel creativity, and develop stronger, more equitable solutions for the future. By breaking down barriers and encouraging diverse talent, we not only shape a fairer industry but also ensure that STE(A)M continues to thrive with fresh insights and groundbreaking advancements—paving the way for a future where everyone has equal access to opportunities in digital and STE(A)M fields. 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
      const waitForDOM = (callback, interval = 100, maxRetries = 50) => {
        let retries = 0;
        const checkDOM = () => {
          const target = document.getElementById('codeweek-digital-girls');
          if (target) {
            callback(target);
          } else if (retries < maxRetries) {
            retries++;
            setTimeout(checkDOM, interval);
          } else {
            console.error('DOM not ready after retries');
          }
        };
        checkDOM();
      };

      waitForDOM((target) => {
        triggerAnimations(target);
      });

      document.addEventListener('DOMContentLoaded', function() {
        const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

        accordionItemHeaders.forEach(accordionItemHeader => {
          accordionItemHeader.addEventListener("click", event => {

            accordionItemHeader.classList.toggle("active");

            const button = accordionItemHeader.querySelector("button");

            button.classList.toggle("!bg-primary");
            button.classList.toggle("!hover:bg-hover-orange");

            const arrowIcon = accordionItemHeader.querySelector("svg");

            arrowIcon.classList.toggle("rotate-180");


            const accordionItemBody = accordionItemHeader.nextElementSibling;
            if(accordionItemHeader.classList.contains("active")) {
              accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
            }
            else {
              accordionItemBody.style.maxHeight = 0;
            }

          });
        });
      });
    </script>
@endpush