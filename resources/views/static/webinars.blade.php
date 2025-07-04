@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
      (object) ['label' => 'Webinars', 'href' => ''],
    ];

    $results = [
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'AI Needs More Than Coders',
            'description' => "AI isn't just about building tools, it's about choosing the right questions, spotting what others miss, and turning data into decisions that matter.",
            'date' => '16 June 2025, Monday - 16.00 - 17.00 CET',
            'label' => 'Past Webinar',
            'link' => 'https://youtu.be/TKkB0z5k9tc',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/collaboration.png',
            'title' => 'From Idea to Impact: How to turn Dreams into ICT Success Stories',
            'description' => "Discover the Girls In Digital webinar, an inspiring Code4Europe initiative empowering girls and women to explore the European programmes ecosystem and pursue careers in tech and innovation.",
            'date' => '12 May 2025 - 14.00 - 15.00 CET',
            'label' => 'Past Webinar',
            'link' => 'https://youtu.be/ijXArs4NZIc',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/Linda_Liukas.jpg',
            'title' => 'Code Week Mini Series with Linda Liukas - Building Communities in Computer Science',
            'description' => "Join Linda Liukas for an inspiring webinar on fostering connection, creativity, and collaboration in tech, with a focus on empowering the next generation of learners.",
            'date' => '8 May 2025 - 18.30 - 19.15 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=fwiTPbiZuTc&list=PLnqp3yQre_1iU1qMK7vMSzC_jfMkqxXky&index=1',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'NuGamers: How to foster gender inclusive gaming education?',
            'description' => "Explore how to foster gender-inclusive gaming education in this CodeWeek 2025 webinar, addressing gender biases in the gaming industry.",
            'date' => '24 March 2025 - 14.00 - 14.50 CET',
            'label' => 'Past Webinar',
            'link' => 'https://events.teams.microsoft.com/event/47c8f739-183d-48a1-acae-de3d28cd3b7d@8d8b2be4-0c2e-4b10-8d42-9ef10987a89f',
            'link_type' => 'form'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'Empower, Inspire & Celebrate: Girls in Digital Week 2025',
            'description' => "Explore Girls in Digital, an EU Code Week initiative empowering young Europeans to embrace STE(A)M fields and drive innovation.",
            'date' => '18 March 2025 - 16.00 - 16.45 CET',
            'label' => 'Past Webinar',
            'link' => 'https://events.teams.microsoft.com/event/964e1126-8038-43bd-8cae-fa000e261e62@8d8b2be4-0c2e-4b10-8d42-9ef10987a89f',
            'link_type' => 'form'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'Beyond Code: Empowering generations of innovators',
            'description' => "Explore the impact of diversity in STEM and how inclusivity drives innovation, with practical examples and strategies.",
            'date' => '04 March 2025 – 13.00 - 14.00 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=cMdu9_BSz4k&list=PLnqp3yQre_1iU1qMK7vMSzC_jfMkqxXky',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/Linda_Liukas.jpg',
            'title' => 'Code Week Mini Series with Linda Liukas - Charting New Constellations: How Code, Creativity and Curiosity form a Caree',
            'description' => "Author and educator Linda Liukas explored how tech careers can be creatively built by connecting interests and passions.",
            'date' => '26 February 2025 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=52LaQA9342k&list=PLnqp3yQre_1iU1qMK7vMSzC_jfMkqxXky&index=2',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'From Ideas to Businesses opportunities: Empowering the Next Generation and supporting Innovation in Education with AI',
            'description' => "Explore AI's role in entrepreneurship education, focusing on guiding students in transforming ideas into sustainable businesses.",
            'date' => '24 February 2025 – 16.00 - 17.00 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=COeuznAWLEI',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'Thinking in the future: activating students towards innovation',
            'description' => "This webinar explored Future Thinking and Design Thinking to foster student creativity and innovation.",
            'date' => '18 February 2025 – 13.00 - 14.00 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=pe-mCuVB-Ro',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'Diversity Drives Solutions: How to Make Your Hackathon Count',
            'description' => "Explore Clusity, Belgium's largest women-in-tech community, fostering connection, mentorship, and diversity in tech.",
            'date' => '13 February 2025 – 12.00 - 13.00 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=R2MdySoc6YQ',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'DigiEduHack and the Social Dimension of Hackathons ',
            'description' => 'Discover how DigiEduHack fosters collaboration, creativity, and problem-solving in digital education.',
            'date' => '5 February 2025 – 16.30 - 17.00 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=wMK3pfk2G3U&t=647s',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'Create a Creature with OctoStudio!',
            'description' => 'Discover how educators and students can create interactive stories, games, and projects by blending physical crafts with digital coding.',
            'date' => '2 December 2024 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=1pxlMRl3wec',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'Hackathons - learning from experience',
            'description' => 'Get ready for the EU Code Week Hackathon 2024 with expert tips and insights on how to prepare, compete, and succeed in coding challenges.',
            'date' => '24 October 2024 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=wgLetp-Jgrk',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'Exploring the Impact of AI on Teaching Coding',
            'description' => 'Explore how AI is transforming coding education and pedagogy with expert insights from Lidija Kralj.',
            'date' => '21 October 2024 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=ziNOVfsckRM&t=126s',
            'link_type' => 'video'
        ],
        [
            'image' => '/images/webinars/blue_visual.jpg',
            'title' => 'Mix Music and Coding: Discover Music Lab',
            'description' => 'Explore how Music Lab by Code.org combines coding and music creation, with live demos and insights on integrating it into education.',
            'date' => '17 October 2024 CET',
            'label' => 'Past Webinar',
            'link' => 'https://www.youtube.com/watch?v=MQ-pbnQ5Vm0',
            'link_type' => 'video'
        ],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Coding at Home – Fun & Educational Activities for All')
@section('description', 'Explore EU Code Week’s Coding at Home series—fun, interactive coding activities for kids, families, and educators.')

@section('content')
    <section id="webinars-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-20">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Webinars
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                @lang('webinars.webinars-text')
                            </p>
                            <span class="text-dark-blue font-semibold text-lg ">
                                <a href="/" class="cursor-pointer text-dark-blue underline mr-1">
                                    Optional secondary CTA introduction to webinars
                                </a>
                                ›
                            </span>

                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10">
{{--                            <button class="bg-yellow hover:bg-primary rounded-full w-20 h-20 duration-300 flex justify-center items-center">--}}
{{--                                <img class="duration-300 ml-2" src="/images/fi_play.svg" />--}}
{{--                            </button>--}}
                        </div>
                        <img
                                class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                                loading="lazy"
                                src="/images/training/training_bg.png"
                                style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                                class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                                loading="lazy"
                                src="/images/training/training_bg.png"
                                style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10">
            <div class="relative py-10 md:py-20 codeweek-container-lg flex justify-center">
                <div class="w-full max-w-[880px] gap-2 z-10">
                    <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        Webinars
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        @lang('webinars.webinars-sub-text1')
                        @lang('webinars.webinars-sub-text2')
                    </p>
                    <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                        @lang('webinars.recordings-youtube-list-title')<br />
                        @lang('webinars.2024-webinar-series-title') <a class="text-dark-blue underline" target="_blank" href="https://www.youtube.com/playlist?list=PLnqp3yQre_1gaiLYx-_QIB6NMYLOhrAcf">https://www.youtube.com/playlist?list=PLnqp3yQre_1gaiLYx-_QIB6NMYLOhrAcf</a> <br />
                       @lang('webinars.2025-webinar-series-title') <a class="text-dark-blue underline" target="_blank" href="https://www.youtube.com/playlist?list=PLnqp3yQre_1iU1qMK7vMSzC_jfMkqxXky">https://www.youtube.com/playlist?list=PLnqp3yQre_1iU1qMK7vMSzC_jfMkqxXky</a>
                    </p>
                </div>
            </div>
            <div
                    class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
                    style="transform: translate(-16px, -24px)"
            ></div>
            <div
                    class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-32 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
                    style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28">
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 xl:gap-10">
                    @foreach($results as $result)
                        <div class="flex flex-col rounded-lg bg-white overflow-hidden">
                            <div class="relative">
                                <a href="{{ $result['link'] }}" class="w-full">
                                    <img src="{{ $result['image'] }}" class="w-full" />
                                </a>
                                <div class="absolute bottom-0 translate-y-1/2 left-6 px-4 py-1 bg-[#FFD700] rounded-full text-[#164194] font-semibold text-[16px] leading-[22px] pointer-events-none">
                                    {{ $result['label'] }}
                                </div>
                            </div>
                            <div class="flex-grow px-6 py-8 flex flex-col justify-between">
                                <div>
                                    <a  href="{{ $result['link'] }}" class="text-dark-blue text-lg p-0 font-semibold mb-2 font-['Montserrat']">
                                        {{ $result['title'] }}
                                    </a>
                                    <p class="text-slate-500 text-default p-0 font-bold mb-2 font-['Blinker']">
                                        {{ $result['date'] }}
                                    </p>
                                    <p class="text-[#333E48] font-normal text-[16px] leading-[22px] p-0 mb-4">
                                        {{ $result['description'] }}
                                    </p>
                                </div>
                                <a
                                    class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                    href="{{ $result['link'] }}"
                                >
                                    <span>{{ $result['link_type'] == 'form' ? 'Register' : 'Watch' }}</span>
                                    <div class="flex gap-2 w-4 overflow-hidden">
                                        <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                        <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
@endsection