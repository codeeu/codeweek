@extends('layout.new_base')

@section('title', 'CodyColor KIT – Unplugged Coding Method')
@section('description',
    'Discover the CodyColor unplugged coding method designed by Alessandro Bogliolo. A color-based,
    multilingual approach to computational thinking for all ages and school levels.')

@section('content')
    <section id="codeweek-codycolor-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', [
            'author' => 'Alessandro Bogliolo - EU Code Week Italian Ambassador; University of Urbino',
            'title' => 'CodyColor KIT',
        ])

        <section class="relative z-10">
            <div class="relative z-10 py-10 codeweek-container-lg">
                {{-- Contributors --}}
                <div class="text-[#6B7280] font-normal text-sm md:text-base p-4 bg-gray-50 rounded mb-6">
                    <p class="text-[#20262C] font-normal text-lg md:text-xl"><strong>Scientific author:</strong> Alessandro
                        Bogliolo - EU Code Week Italian
                        ambassador; University of Urbino</p>
                    <p class="text-[#20262C] font-normal text-lg md:text-xl"><strong>Contributors and testimonials:</strong>
                        Fabrizia Agnello, Carmela Cundari,
                        Alfonsina Cinzia Troisi - EU Code Week Italian Leading Teachers</p>
                    <p class="text-[#20262C] font-normal text-lg md:text-xl"><strong>Instructional design, project
                            management, internationalisation:</strong>
                        Veronica Ruberti - EU Code Week Italian HUB Coordinator; Fondazione LINKS</p>
                    <p class="text-[#20262C] font-normal text-lg md:text-xl"><strong>Internationalisation and
                            translation:</strong> Lucia Terrone - EU Code Week
                        Italian HUB Coordinator; Fondazione LINKS</p>
                    <p class="mt-4">This resource is developed in collaboration with <a target="_blank"
                            href="https://academy.codyroby.it/"><strong>CodyRoby Academy</strong></a></p>
                </div>

                {{-- Short Paragraph --}}
                <div class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-6">
                    CodyColor is an unplugged coding method (without the use of electronic devices) designed by Alessandro
                    Bogliolo, professor of Information Processing Systems at the University of Urbino, aiming at lowering
                    barriers to practice computational thinking. Based on extremely simple rules, CodyColor can be
                    introduced from early childhood education, but also supports challenging activities for lower/upper
                    secondary school and adults.
                </div>

                <div class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-6">
                    In this kit you'll find thorough explanations of the principles and potential of the CodyColor method,
                    concrete proposals for teaching activities using the kit to promote computational thinking skills, and
                    detailed guidelines to create the tools and bring the activities into your classroom.
                </div>

                {{-- Who is the CodyColor KIT for? --}}
                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-4">
                    Who is the CodyColor KIT for?
                </h2>

                <div class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-4">
                    CodyColor KIT is aimed at <strong>teachers of all school levels and educators</strong>. It can be
                    applied in formal and informal learning contexts, complementing both STEM and humanities because it
                    strengthens:
                </div>

                <ul class="pl-8 m-0 mb-6 list-disc">
                    <li class="p-0 text-lg font-normal leading-7 text-default">
                        Logical thinking and computational thinking
                    </li>
                    <li class="p-0 text-lg font-normal leading-7 text-default">
                        Spatial orientation and rotations
                    </li>
                    <li class="p-0 text-lg font-normal leading-7 text-default">
                        Strategy development, comparing hypotheses, and group decision-making
                    </li>
                    <li class="p-0 text-lg font-normal leading-7 text-default">
                        Collaboration, communication, and respect for rules
                    </li>
                </ul>

                <div class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    CodyColor KIT is aimed at <strong>families</strong> because unplugged coding activities can be carried
                    out playfully outside formal learning contexts, are engaging, require no prerequisites, no specific
                    equipment, and are suitable for all ages.
                </div>

                {{-- Why discover CodyColor --}}
                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-4">
                    Why discover, experiment with, and learn the CodyColor method?
                </h2>

                <ul class="m-0 mb-6 list-none">
                    <li class="p-0 mb-2 text-lg font-normal leading-7 text-default">
                        <strong>Unplugged</strong> ⭢ No digital device required ⭢ Highly accessible
                    </li>
                    <li class="p-0 mb-2 text-lg font-normal leading-7 text-default">
                        <strong>Color-based</strong> ⭢ Multilingual ⭢ International collaboration
                    </li>
                    <li class="p-0 mb-2 text-lg font-normal leading-7 text-default">
                        <strong>Versatile</strong> ⭢ Different ages ⭢ Cross-age collaboration
                    </li>
                    <li class="p-0 mb-2 text-lg font-normal leading-7 text-default">
                        <strong>Multidisciplinary</strong> ⭢ Interdisciplinary collaboration ⭢ Community activation
                    </li>
                </ul>

                {{-- How does this kit work --}}
                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-4">
                    How does this kit work?
                </h2>

                <div class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    In this page you will discover the CodyColor method through an asynchronous training path in small,
                    sequential, easy-to-follow steps, using accessible language. Every step is a downloadable PDF, designed
                    to be easy to print and use in class, containing theoretical background, lesson outlines, activity
                    descriptions, facilitation prompts, and guidelines for teachers.
                </div>

                <div class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    The objective is to guide you from learning the methods to applying them in the classroom, from learning
                    to teaching with the CodyColor lesson plans as scaffolding materials.
                </div>

                <div class="text-[#333E48] font-medium text-xl md:text-2xl p-0 mb-6">
                    Let's start!
                </div>

                {{-- PDF Downloads --}}
                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-4">
                    CodyColor Challenges
                </h2>

                <ul class="m-0 mb-6 list-none">
                    <li class="p-0 mb-2 font-normal leading-7 text-default">
                        <a class="text-lg text-dark-blue hover:underline" href="#">
                            1 – DISCOVER THE METHOD
                        </a>
                    </li>
                    <li class="p-0 mb-2 font-normal leading-7 text-default">
                        <a class="text-lg text-dark-blue hover:underline" href="#">
                            2 – PREPARE THE LEARNING SPACE
                        </a>
                    </li>
                    <li class="p-0 mb-2 font-normal leading-7 text-default">
                        <a class="text-lg text-dark-blue hover:underline" href="#">
                            3 – PASSO A DUE CHALLENGE
                        </a>
                    </li>
                    <li class="p-0 mb-2 font-normal leading-7 text-default">
                        <a class="text-lg text-dark-blue hover:underline" href="#">
                            4 – CODY COLOR GAME CHALLENGE
                        </a>
                    </li>
                    <li class="p-0 mb-2 font-normal leading-7 text-default">
                        <a class="text-lg text-dark-blue hover:underline" href="#">
                            5 – WALTZ DANCE CHALLENGE
                        </a>
                    </li>
                    <li class="p-0 mb-2 font-normal leading-7 text-default">
                        <a class="text-lg font-medium text-dark-blue hover:underline" href="#">
                            6 – DOWNLOAD THE COMPLETE KIT
                        </a>
                    </li>
                </ul>

                {{-- Contacts --}}
                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-4">
                    Contacts
                </h2>

                <div class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-8">
                    For information, curiosities, and insights contact:
                    <a href="mailto:codeweek@linksfoundation.com" class="text-dark-blue hover:underline">
                        codeweek@linksfoundation.com
                    </a>
                </div>

                <a class="max-xl:!hidden bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300"
                    href="/add?skip=1">
                    <span class="text-base font-semibold leading-7 text-black normal-case">
                        Register activity </span>
                </a>
                <div class="pb-8"></div>
                <div class="p-6 mb-8 bg-blue-50 border-l-4 border-dark-blue">
                    <p class="text-[#333E48] font-normal text-base md:text-lg ">
                        Every time you run a CodyColor challenge in class, during a school event, a team building, or a
                        training course, register it on the
                        <a href="https://codeweek.eu/add?skip=1" class="font-medium text-dark-blue hover:underline"
                            target="_blank">
                            map of the European Code Week
                        </a>.
                        Every organizer will receive a participation certificate for their commitment and will contribute to
                        a campaign raising awareness of the importance of computational thinking skills.
                    </p>
                    <p class="text-[#333E48] font-normal text-base md:text-lg">
                        If you want to get in touch with an international group of enthusiastic teachers, sign up for the
                        <a href="https://www.facebook.com/groups/774720866253044/?source_id=377506999042215"
                            class="font-medium text-dark-blue hover:underline" target="_blank">
                            EU Code Week teachers' Facebook group
                        </a>!
                        To take a further step and collaborate with other schools in your country or across borders, join
                        the
                        <a href="https://codeweek.eu/codeweek4all" class="font-medium text-dark-blue hover:underline"
                            target="_blank">
                            Code Week 4 All challenge
                        </a>.
                    </p>
                </div>

            </div>
        </section>

        @include('include.licence')
    </section>
@endsection
