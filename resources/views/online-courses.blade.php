@extends('layout.base')

@section('title', 'Free Online Coding Courses – EU Code Week')
@section('description', 'Learn coding at your own pace with free online courses from EU Code Week. Ideal for beginners, teachers, and anyone interested in programming.')

@section('title', 'Online Courses')

<x-tailwind></x-tailwind>
@section('content')

    <section id="codeweek-about-page" class="codeweek-page">

        <section class="codeweek-banner about">
            <div class="text">
                <h2>EU Code Week</h2>
                <h1>Online Courses</h1>
            </div>
            <div class="image">
                <img src="/images/banner_training.svg" class="static-image">
            </div>
        </section>

        <section id="online-courses">

            <div class="m-12">
<div class="m-6 -mb-8">
            <h1>@lang('online-courses.title')</h1>

            <p style="margin-top:-30px;">
                @lang('online-courses.description.0')
                <br/><br/>
                @lang('online-courses.description.1')
                <br/><br/>
                @lang('online-courses.description.2')
                <br/><br/>
                @lang('online-courses.more-info')
            </p>
</div>
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
                    description="The course aims to introduce participants to EU Code Week and familiarize with the new EU Code Week website for schools, explore and access free lesson plans to register activities for EU Code Week, discover various classroom support resources, and become acquainted with the toolkit designed for teachers."
                    date="3 – 26 June 2019"
                    img="icebreaker-2019.png"
            >
            </x-cards.online-courses>

            </div>

        </section>


    </section>

@endsection

@section("extra-css")
    <style>
        #online-courses a, #online-courses a:visited {
            color: #FE6824;
            text-decoration: none; /* Optional: Remove underline from links */
        }

        #online-courses a:hover {
            color: #D6551B; /* Darker shade of orange for hover */
        }


    </style>
@endsection
