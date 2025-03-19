@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Learn & Teach', 'href' => '/learn'],
      (object) ['label' => 'Online Courses', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Free Online Coding Courses – EU Code Week')
@section('description', 'Learn coding at your own pace with free online courses from EU Code Week. Ideal for beginners, teachers, and anyone interested in programming.')

@section('title', 'Online Courses')

<x-tailwind></x-tailwind>
@section('content')
    <section id="webinars-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient pt-32 pb-0 md:py-20">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Online Courses
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                Massive open online courses (MOOCs) aiming to support teachers in effectively incorporating coding and computational thinking into their teaching practice.
                            </p>
                            <span class="text-dark-blue font-semibold text-lg ">
                                <a href="/" class="cursor-pointer text-dark-blue underline mr-1">
                                    Optional secondary CTA introduction to online courses
                                </a>
                                ›
                            </span>

                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10">
                            <button class="bg-yellow hover:bg-primary rounded-full w-20 h-20 duration-300 flex justify-center items-center">
                                <img class="duration-300 ml-2" src="/images/fi_play.svg" />
                            </button>
                        </div>
                        <img
                                class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                                loading="lazy"
                                src="/images/webinars/webinar_bg.png"
                                style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                                class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                                loading="lazy"
                                src="/images/webinars/webinar_bg.png"
                                style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:py-20 codeweek-container-lg flex justify-center">
                <div class="w-full max-w-[880px] gap-2">
                    <h2 class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                        EU Code Week Online Courses
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        EU Code Week MOOCs are open to all educators, regardless of their students' age or the subject they teach, and no prior experience or knowledge is required to participate.<br/>
                        EU Code Week MOOCs offer free and accessible resources, materials, ideas and best practice examples to find inspiration and empower students by introducing coding and computational thinking, emerging technologies, and artificial intelligence safely into the classroom.
                    </p>
                    <p class="text-[#333E48] font-normal leading-[22px] md:leading-[30px] text-[16px] md:text-xl p-0">
                        Although some of the courses have concluded, the content remains accessible; however, badges and certificates are no longer issued.
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
                <x-cards.online-courses
                        title="Navigating Innovative Technologies Across the Curriculum"
                        url="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+NavigatingTech+2023/about"
                        date="9 October – 15 November 2023 "
                        img="navigating-innovative-technologies-across-the-curriculum.png"
                        description="The online course Navigating Innovative Technologies Across the Curriculum welcomes educators interested in integrating coding, computational thinking, virtual and augmented reality into their classrooms through interdisciplinary and cross-curricular projects, encouraging exploration of innovative technologies and their effective use."
                >
                </x-cards.online-courses>

                <x-cards.online-courses
                        title="Unlocking the Power of AI in Education"
                        url="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+AI_Education+2023/about"
                        date="13 March – 19 April 2023"
                        img="unlocking-the-power-of-ai.png"
                        description="The Unlocking the Power of AI in Education MOOC aims to provide teachers with a basic understanding of AI's potentials and challenges in education, safe and effective use of educational data, ethical implications of AI in the classroom and the implementation of AI-related resources and materials in teaching practice."
                >
                </x-cards.online-courses>

                <x-cards.online-courses
                        title="EU Code Week Bootcamp 2022"
                        url="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Bootcamp+2022/about"
                        description="The EU Code Week Bootcamp is designed for teachers who want to integrate coding and computational thinking into their classrooms with practical ideas and resources, while promoting diversity and inclusion in coding and exploring the potentials of artificial intelligence in education."
                        date="10 October – 16 November 2022"
                        img="eu-code-week-bootcamp-2022.jpg"
                >
                </x-cards.online-courses>

                <x-cards.online-courses
                        title="EU Code Week Online Bootcamp"
                        url="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+OnlineBootcamp+2021/about"
                        date="27 September – 27 October 2021"
                        img="eu-code-week-online-bootcamp.jpg"
                        description="The EU Code Week Online Bootcamp introduces teachers to the EU Code Week initiative and the opportunities it offers. Pre-primary, primary, and secondary school teachers are provided with practical ideas, tools, and resources for incorporating coding and computational thinking into the classroom."
                >
                </x-cards.online-courses>

                <x-cards.online-courses
                        title="AI Basics for Schools"
                        url="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+AI+2021/about"
                        description="The course introduces teachers to the basic concepts of AI. It provides them with examples of effective use of AI in the classroom and supports them in the integration and creation of AI-related activities in the classroom. Teachers learn to recognize and raise awareness of threats and benefits of AI and examine the ethical use of AI."
                        date="8 March – 7 April 2021"
                        img="ai-basics-for-schools.jpg"
                >
                </x-cards.online-courses>

                <x-cards.online-courses
                        title="EU Code Week Deep Dive MOOC 2020"
                        url="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+CWDive+2020/about"
                        description="The course aims to raise awareness about integrating coding and computational thinking into the classroom, familiarize teachers with innovative tools and approaches, offer free training materials in 29 languages, teach how to register activities for the EU Code Week initiative, explore the Code Week 4 all challenge and foster a community of enthusiastic teachers for best practice sharing."
                        date="16 September – 20 October 2020"
                        img="eu-code-week-deep-dive-mooc-2020.jpg"
                >
                </x-cards.online-courses>

                <x-cards.online-courses
                        title="EU Code Week Icebreaker Rerun"
                        url="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2020/about"
                        description="This short introductory course aims to make EU Code Week more appealing and meaningful for teachers, schools, and parents while raising awareness about the importance of integrating coding and computational thinking into their lesson. Learning how to code can empower students to be at the forefront of a digitally competent society, develop a better understanding of the world that surrounds them, and increase their chances to succeed in their personal and professional lives."
                        date="11 May – 15 June 2020"
                        img="icebreaker.jpg"
                >
                </x-cards.online-courses>

                <x-cards.online-courses
                        title="EU Code Week - Deep Dive MOOC"
                        url="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+CWDive+2019/about"
                        description="The course aims to help participants understand the importance of integrating coding and computational thinking in the classroom, become familiar with innovative tools and approaches, gain basic knowledge of the Code.org CS fundamentals curriculum, access free training materials and resources, explore the EU Code Week campaign, including activity registration and reporting."
                        date="16 September – 30 October 2019"
                        img="eu-code-week-deep-dive-mooc-2019.png"
                >
                </x-cards.online-courses>

                <x-cards.online-courses
                        title="EU Code Week - Ice-breaker MOOC"
                        url="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2019/about"
                        description="The course aims to introduce participants to EU Code Week and familiarize with the new EU Code Week website, explore and access free lesson plans to register activities for EU Code Week, discover various classroom support resources, and become acquainted with the toolkit designed for teachers."
                        date="3 – 26 June 2019"
                        img="icebreaker-2019.png"
                >
                </x-cards.online-courses>
            </div>
        </section>
    </section>
@endsection