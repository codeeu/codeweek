@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Seasonal LP', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-digital-girls" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-[7.5rem]">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="home-activity codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 px-6 flex-1 py-10 max-md:w-full md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <img
                                class="mb-4 max-w-full"
                                src="/images/digital-girls/digital_girls_logo.svg"
                            />
                            <p class="text-xl md:text-2xl leading-8 text-[#333E48] p-0">
                                Empower, inspire and celebrate the next generation of girls and young Europeans!
                            </p>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10">
                            @include('layout.video-player', [
                                'id' => 'girls-digital-hero',
                                'src' => 'https://www.youtube.com/embed/z4IkeLRuF9E?si=hLAEtN4PDfbigb5M',
                            ])
                        </div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/digital-girls/digital_girls_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/digital-girls/digital_girls_bg.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="animation-section relative z-10">
            <div class="relative z-10 codeweek-container-lg flex flex-col-reverse md:flex-row items-center py-20 pb-32 md:pb-48 gap-12">
                <div class="flex-1">
                    <div class="inline-block observer-element relative">
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
                        About Girls in Digital
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        Get ready to celebrate <span class="font-semibold">Girls in Digital Week</span> from <span class="font-semibold">24–28 March 2025</span>, as we put a spotlight on inclusion, innovation, and the limitless opportunities digital skills offer to all!
                    </p>
                    <p class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-6">
                        Girls in Digital is part of a larger movement to inspire and empower the next generation of young Europeans—regardless of gender—to thrive in an inclusive digital world. Our purpose? To break down barriers and ensure that every young person—girl, boy, or non-binary—has the confidence to explore STE(A)M fields, embrace tech careers, and drive the future of innovation.
                    </p>
                    <div class="flex flex-col xl:flex-row gap-4">
                        <a
                            class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                            target="_blank"
                            href="/docs/girls-in-digital/girls-in-digital-about.pdf"
                        >
                            <span>Read more</span>
                            <div class="flex gap-2 w-4 overflow-hidden">
                                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                            </div>
                        </a>
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

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden md:block" style="clip-path: ellipse(88% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-12 md:pt-48 md:pb-28">
                <div class="codeweek-container-lg">
                    <h2 class="text-white md:text-center text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-16">
                        Resources
                    </h2>
                    <div class="flex flex-col md:flex-row justify-between gap-6 md:gap-20">
                        <div class="bg-white rounded-2xl px-6 py-8 md:p-12 w-full">
                            <h3 class="text-[#1C4DA1] text-2xl md:text-3xl font-medium font-['Montserrat'] mb-6">
                                Are you a young person or parent?
                            </h3>
                            <p class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-10">
                                You are a <span class="font-semibold">young person</span> passionate about technology, coding, or digital creativity; explore activities near you and begin your journey today.
                                </br>
                                You are a <span class="font-semibold">parent</span> looking for inclusive activities for your child to participate in a safe and supportive space; discover opportunities that nurture their interest in technology and digital skills.
                            </p>
                            <div class="flex flex-wrap gap-4">
                                <a
                                    class="w-full md:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg"
                                    href="/events"
                                >
                                    <span>Search an activity</span>
                                </a>
                            </div>
                        </div>
                        <div class="bg-white rounded-2xl px-6 py-8 md:p-12 w-full">
                            <h3 class="text-[#1C4DA1] text-2xl md:text-3xl font-medium font-['Montserrat'] mb-6">
                                Are you an educator?
                            </h3>
                            <p class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-10">
                                You are an educator looking to organise an activity to empower youth with digital skills in a safe and inclusive environment, where all feel welcomed to explore the endless opportunities that digital has to offer. Check our resources below for guidance and support in bringing your activity to life.
                            </p>
                            <div class="flex flex-wrap gap-4">
                                <a
                                    class="w-full md:w-auto flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg"
                                    href="/events"
                                >
                                    <span>Organise an activity</span>
                                </a>
                                <a
                                    class="w-full md:w-auto flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-6 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                    target="_blank"
                                    href="/docs/girls-in-digital/girls-in-digital-activity-guidelines.pdf"
                                >
                                    <span>Girls in DIgital Activity Guideline</span>
                                    <div class="flex gap-2 w-4 overflow-hidden">
                                        <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                        <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                    </div>
                                </a>
                                <a
                                    class="w-full md:w-auto flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-6 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                    target="_blank"
                                    href="/docs/girls-in-digital/girls-in-digital-media-kit.pdf"
                                >
                                    <span>Social Media Kit</span>
                                    <div class="flex gap-2 w-4 overflow-hidden">
                                        <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                        <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden">
            <div class="relative py-20 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-16">
                    Some visual elements showing relevant Statistics
                </h2>
                <div class="flex flex-col lg:flex-row justify-between gap-12">
                    <div class="w-full">
                        <a
                            class="block mb-12 p-6 rounded-lg border-2 border-[#A4B8D9]"
                            href="https://ec.europa.eu/eurostat/statistics-explained/index.php?title=Young_people_-_digital_world"
                        >
                            <img src="/images/digital-girls/fig-1.png" alt="Young people – digital world. Eurostat 2023" />
                        </a>
                        <a
                            class="block mb-12 p-6 rounded-lg border-2 border-[#A4B8D9]"
                            href="https://ec.europa.eu/eurostat/statistics-explained/index.php?title=ICT_specialists_in_employment#Explore_further"
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

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-light-blue md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-light-blue hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-light-blue hidden lg:block" style="clip-path: ellipse(98% 90% at 50% 90%);"></div>
            <div class="relative pt-28 md:pt-48 pb-28 codeweek-container-lg flex justify-center">
                <div class="w-full max-w-[708px]">
                    <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-10">
                        FAQ’s
                    </h2>

                    <div class="accordion">
                        {{-- General FAQs --}}
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>What is Girls in Digital?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Girls in Digital (GiD) is an EU Code Week initiative aimed at empowering girls and young women to explore and excel in digital skills, STEM fields, and technology-driven careers while fostering gender equality.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Who can participate in Girls in Digital activities?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
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
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Girls are underrepresented in digital fields, STEM careers, and ICT studies. GiD aims to bridge these gaps and inspire a new generation of women in technology by breaking down gender stereotypes and promoting equality. A more gender-balanced workforce in these fields will not only foster innovation but also contribute to building a better, more inclusive future.
                                </div>
                            </div>
                        </div>

                        {{-- For Educators and Organisers --}}
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How can I organise a Girls in Digital activity?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    You can use the Girls in Digital Activity Guidelines, which provide step-by-step instructions, resources, and tips to plan and execute engaging activities tailored to your group’s needs.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Do I need prior experience in digital skills to organise an activity?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
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
                                <p>What types of activities can I organise?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Activities range from coding workshops and robotics challenges to interactive discussions on digital careers and gender equality. The guidelines also include creative projects that encourage teamwork and innovation.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Are there any funding opportunities for Girls in Digital events?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
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
                                <p>Do I need any prior knowledge of coding or digital skills to join?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Not at all! GiD activities are designed to be fun and beginner-friendly, encouraging everyone to explore and learn regardless of their starting point.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>What skills will I gain by participating?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    You’ll learn a variety of skills, including coding, problem-solving, teamwork, creativity, and critical thinking. You’ll also gain insights into digital careers and STE(A)M opportunities.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Can boys or nonbinary students participate in GiD activities?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                  Yes, GiD is inclusive of all genders. While the initiative aims to address the underrepresentation of girls in digital fields by providing them with tailored support and encouragement, it is important for all citizens–irrespective of their age, gender, nationalities ethnicity, abilities–to be aware of the current gender gap and help create a more inclusive digital future, making it essential for all individuals to engage, learn, and be part of the solution.
                                </div>
                            </div>
                        </div>
                        {{-- Impact and Vision --}}
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How does Girls in Digital promote gender equality?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    By creating opportunities, breaking down stereotypes, and inspiring girls to pursue careers in technology, GiD contributes to bridging the gender gap in digital fields and fostering equality.
                                </div>
                            </div>
                        </div>
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>What is the long-term goal of the initiative?</p>
                                <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Our long-term goal is to foster equality in STE(A)M, as a more gender-balanced workforce drives innovation, brings diverse perspectives, and creates a more inclusive environment. When everyone has equal opportunities to contribute, we unlock new ideas, fuel creativity, and develop stronger, more equitable solutions for the future. By breaking down barriers and encouraging diverse talent, we not only shape a fairer industry but also ensure that STE(A)M continues to thrive with fresh insights and groundbreaking advancements—paving the way for a future where everyone has equal access to opportunities in digital and STEM fields.
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