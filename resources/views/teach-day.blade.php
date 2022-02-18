@extends('layout.base')
<x-tailwind></x-tailwind>
@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="codeweek-banner">


                <img src="{{asset('images/teach-day/banner-2.jpeg')}}" class="static-image">



        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">
                <h1>EU Code Week Teach Day</h1>


                <h4 class="text-xl font-semibold">Free online conference with real-life experience</h4>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3 mt-6">
                    <div><img src="{{asset('images/teach-day/panel-1.png')}}"></div>
                    <div><img src="{{asset('images/teach-day/panel-2.png')}}"></div>
                    <div><img src="{{asset('images/teach-day/panel-3.png')}}"></div>
                </div>

                <div class="p-5 leading-6"><p style="text-align: left; font-size: 15px;">On <strong>22 May 2021</strong>,
                        EU Code Week invites teachers of all subjects and levels to take part in our first<span
                                style="color: #025b95;"> <a class="image-link" style="color: #025b95;"
                                                            href="https://codeweek.eu/" target="_blank" rel="noreferer noopener">#CodeWeek</a> </span>#TeachDay.
                        At this online event, you will hear about different aspects of <strong>coding</strong>, <strong>digital</strong>
                        <strong>creativity</strong> <strong>and other topics from inspiring speakers</strong>, including
                        decision makers, developers, education experts and enthusiasts. You will <strong>freely engage
                            and interact within an international community</strong>, encounter fresh ideas, and learn
                        insightful techniques and practices for teaching and learning coding. You will also get the
                        opportunity to network and discover new ways of looking at coding as a driver of transformation
                        within the education ecosystem.</p>

                    <p style="text-align: left; font-size: 15px;">The #TeachDay will combine discussions with <strong>practical
                            and interactive workshops</strong> aimed at inspiring progress through education. You will
                        walk away with new ideas to share with your colleagues, use with your students, and foster
                        supportive connections with other community members.</p>

                    <p style="text-align: left; font-size: 15px;">We invite you to be part of this unique initiative and
                        support the continued development of a strong and diverse community of educators.</p></div>

                <div class="flex items-center justify-center">
                    <a target="_blank" rel="noreferer noopener"
                       href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/%23CodeWeek+%23TeachDay+(22+May)+Agenda.pdf"
                       class="codeweek-action-link-button">AGENDA</a>
                </div>

            </div>


            <div style="background-color:#DBEFF3" class="p-10">
                <div><h2><strong>What to expect from Teach Day?</strong></h2>
                    <ul class="leading-7 ml-2 mt-0 checklist">
                        <li style="font-size: 15px; font-family: PT Sans;">Opening speech by <strong>Thierry Breton,
                                European Commissioner for Internal Market</strong></li>
                        <li style="font-size: 15px; font-family: PT Sans;"><strong>Keynotes</strong> and different point
                            of views on coding, digital creativity, and other topics from inspiring speakers such as
                            <strong>Massimo Banzi</strong>, Co-founder of Arduino and <strong>Alessandro
                                Bogliolo</strong>, EU Code Week ambassador coordinator, Professor, School of
                            Information, Science and Technology at the University of Urbino
                        </li>
                        <li style="font-size: 15px; font-family: PT Sans;"><strong>Panel debates</strong> with education
                            experts and researchers
                        </li>
                        <li style="font-size: 15px; font-family: PT Sans;"><strong>Workshops</strong> hosted by
                            international education experts addressing various topics and sharing fresh ideas from the
                            coding world
                        </li>
                        <li style="font-size: 15px; font-family: PT Sans;"><strong>Exhibitions</strong> organized by top
                            IT companies and major NGOs active in the education field and supporting coding in schools.
                            Among them: Code Club, Code.org, Google, Meet&amp;Code, Public Libraries 2030
                        </li>
                        <li style="font-size: 15px; font-family: PT Sans;">Enjoying an online experience similar to a
                            <strong>real-life</strong> event
                        </li>
                        <li style="font-size: 15px; font-family: PT Sans;"><strong>Interactions</strong> with
                            participants and speakers, exchange ideas, knowledge, success stories and have fun
                        </li>
                    </ul>
                    <p>&nbsp;</p>
                    <h2><strong>Our workshops</strong></h2>
                    <ul class="leading-7 ml-2 mt-0 checklist">
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>AI and machine learning: real life use cases </strong>– Marco Neves, Informatics Teacher, AE Batalha<br>An ecosystem of various digital technologies is revolutionizing our way of life. Artificial intelligence is probably the most powerful and impactful, especially through Machine Learning. During the workshop, you will explore some of the most striking examples of AI in our lives and understand how they shape our daily activities.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong> Computational thinking and 3D modelling/printing in mobile devices </strong>– Artur Coelho, EU Code Week Leading Teacher <br>This workshop will demonstrate how to use 3D design and printing on mobile devices to foster computational thinking skills, within interdisciplinary approaches in arts and ICT: developing activities which use CT skills to foster creativity, artistic skills and understanding additive manufacturing.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong> Create challenges for learning to code in the classroom at home </strong>– Laurent Touché, EU Code Week Leading Teacher <br>This workshop will explore how a robotics platform can help you to teach code in the classroom and at home. Students will be able to learn programming by following mini challenges of your choice, without having to create an account.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong> Creative coding in JavaScript </strong>– Elina Ingelande, EU Code Week ambassador for Latvia <br>This is an inventive hands-on workshop ideally for 7th – 12th grade teachers. During the workshop you will program different shapes and colours to make interactive animations in JavaScript.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>e-literature, the poetic side of coding </strong>– Jaka Zeleznikar, Guest Teacher, School of Arts of the University of Nova Gorica<br>This workshop will provide an introduction toe-literature (creative writing + digital platforms + computation, not e-books). In practice, you will focus on a simple but interesting task: writing over websites. No damage will be done as changes will be only local, but this task provides great insight into the importance of the context of a message, as well as practical experience of the easy manipulation of digital content, raising awareness of the dangers of on-line manipulation.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong> Escornabot: A hand-made programmable floor robot </strong>– María Isabel Blanco Pumar, EU Code Week Leading Teacher <br>Escornabot is an affordable open source and free software project that aims to bring coding and robotics to kids. It is a robot that executes the sequence of movements previously coded by kids and is used together with educative mats to work on subject contents.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>Game design for starters! Creating interactive experiences in 30 minutes or less</strong> – Matthias Löwe, EU Code Week ambassador for Germany<br>Games can be many things – from big 3D worlds to a form of artistic expression to an experimental performance…In this workshop, we will showcase some games, talk about game design as a creative method, and actually: create a full game in 30min or less. No prior knowledge necessary!</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>Inclusion, accessibility and coding </strong> – Danijel Forjan, ICT teacher, O.Š Pantovčak; Marijana Smolcec, EFL teacher and eTwinning featured group Inclusive Education administrator, Gimnazija i strukovna škola Bernardina Frankopana<br>The workshop will deal with making learning materials accessible to all learners and will answer the question “how can various free tools and apps such as Immersive Reader and Microbits get students more engaged and motivated for learning.”</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong> In the age of Web 3.0</strong> – Adil Tugyan, EU Code Week ambassador for Turkey <br>Web 3.0 shifts the web from an informational medium to a service-oriented and community-based medium. Web 3.0 is being referred to by experts as the ‘semantic web’ (semantic meaning data driven). The data will come from the user and the web will essentially adjust to meet their needs.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>Learn to code creatively with music! </strong> – Elisabetta Nanni, EU Code Week Leading Teacher &amp; Music Teacher and Digital Innovator, Istituto Comprensivo Rovereto Nord<br>STEM or STEAM? What’s the meaning of A in STEAM? A is for arts and schools must develop creativity in their students with arts and music. Elisabetta Nanni will introduce you to a digital toolbox that can help to improve the creativity of your students. Scratch3.0 and Sonic Pi will help you learn to compose or perform music using code.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong> Learning with online coding game </strong> – Stefania Altieri, EU Code Week Leading Teacher <br>Play with the audience using a game created by the speaker with the students. During the lockdown and distance learning teaching was possible, above all, thanks to technological tools and engaging activities. Coding is funny and it was a good start, so they tried to create new games.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>Makecode Arcade: Hands-on with game design and development</strong> – Kyriakos Koursaris, EU Code Week Leading Teacher &amp; Learning Innovation and Technology Integration Specialist, United Lisbon International School<br>In this workshop, you will experience how block-based coding is used to create video games with MakeCode Arcade. The workshop will explore fundamental game and coding concepts like sprites, variables, and coordinates, and use these concepts to create and customize a playable game.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong> RoboSport: robotics and sport </strong> – Francisco Javier Masero Suárez, EU Code Week Leading Teacher; Sonia Barrás Nogales, EU Code Week Leading Teacher <br>With RoboSport, you will be able to carry out activities cooperatively, learning the rules related to each of the sports modalities and applying computational thinking in the classroom. It is proposed to use robots and micro: bit to develop activities to know more about sports.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>Schools, defenders of the Earth</strong> – Anthi Arkouli, Kindergarten Teacher of 2nd Kindergarten of Peristeri &amp; ICT Trainer; Maria Tsapara, EU Code Week Leading Teacher, Kindergarten Teacher of 2nd Kindergarten of Perama, ICT Trainer &amp; Scientix Ambassador<br>This workshop will present activities inspired by the framework of the 17 sustainable development goals as a part of an eTwinning project called “Schools, defenders of the Earth”. The purpose of the project was to inform and raise awareness of the causes of climate change and to take action to eradicate them. In this project, coding has become a tool to enrich the educational practices of teachers. Through these activities pre-primary school pupils can develop and cultivate competencies such as collaboration, communication, creativity and computational thinking.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>ScratchJr, a tool to promote CT in preschool education</strong> – Stamatis Papadakis, EU Code Week Leading Teacher<br>ScratchJr is an introductory programming language that enables young children (ages 5-7) to create their own interactive stories and games. Children snap together graphical programming blocks to make characters move, jump, dance and sing.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>Tinkering and STEAM with micro:bit</strong> – Pauline Maas, EU Code Week ambassador for the Netherlands &amp; EU Code Week Leading Teacher<br>This workshop will demonstrate how to use micro:bit in your STEAM lessons. You will learn about the creative ideas and kind of tinkering Pauline Maas uses with her students. She will explain the use of a design canvas for micro:bit, so you can use the 21st century learning skills in your lessons. Take a look at her Instagram to get an idea: @microbit101.</li>
                            <li style="font-size: 15px; font-family: PT Sans;"><strong>Women in Science! Let’s learn Python programming</strong> – Ellen Walker, Ellen Walker, EU Code Week ambassador for Switzerland &amp; Founder, RightsTech Women; Brice Copy, Fellow Swiss Code Week ambassador &amp; RightsTech Women Board Member<br>This workshop will introduce a fun activity that any teacher can do with their students, using just a computer and a web browser, to help them learn computational thinking using the Python programming language. You will explore Python dictionaries and how they store and retrieve information, and at the same time, you will learn about famous women in science, technology, engineering and mathematics (STEM).</li>
                        </ul>
                    </ul>
                    <div>
                        <span style="font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;"><span
                                    style="font-size: 14px;">&nbsp;</span></span></div>
                </div>

                <div class="flex items-center justify-center">
                    <a target="_blank" type="button" rel="noreferer noopener"
                       class="codeweek-action-link-button" style="   pointer-events: none;
    cursor: default; opacity: 75% ">Registration is full</a>
                </div>
            </div>

            <div class="m-6">
                <h2><strong>Find out more about Code Week</strong></h2>
                <div class="h-full">

                    @include('static.youtube', ['video_id' => 'UkT2jRslGvQ'])
                </div>

            </div>

        </section>

    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '✓ ';
            color: #ee6a2c;
            font-weight: bold;
        }
    </style>
@endsection
