@extends('layout.base')

@section('content')
    <section>

        <div class="container resources-container">

            <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                <h1>Resources and guides</h1>
                <span>EU Code Week 2018</span>
            </div>

            <hr>

            <p>EU Code Week is a grass-root movement run by volunteers who promote coding in their countries as <a
                        href="http://events.codeweek.eu/ambassadors">Code Week Ambassadors</a>. Anyone – schools,
                teachers,
                libraries, code clubs, businesses, public authorities – can organise a #CodeEU event and add it to the
                <a
                        href="http://codeweek.eu/">codeweek.eu</a> map. To make organising and running coding events
                easier, we
                have prepared different toolkits and selected some of the best lesson plans, guides and other resources.
            </p>

            <p><a href="http://events.codeweek.eu/guide/">How do I organise a Code Week event?</a></p>

            <div class="flex align-center justify-center">
                <div class="btn btn-primary btn-directional btn-lg submit-button-wrapper">
                    <button onclick="window.location.href='/add/'" style="padding: 15px;">Don't forget to pin your event on the map!</button>
                </div>
            </div>

            <hr/>

            <h2>Presentations and toolkits</h2>
            <ul>

                <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU+Code+Week+2018+Communications+Toolkit.zip">EU Code Week 2018 Communications Toolkit</a></li>
                <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/Teachers+Toolkit.zip">EU Code Week 2018 Teachers Toolkit</a></li>
                <li>EU Code Week 2018 Leaflet.

                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_EN.pdf">EN</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180314_Codeweek_2018_BG.pdf">BG</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_BO.pdf">BO</a>
                    -

                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_CS.pdf">CS</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_DA.pdf">DA</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_DE.pdf">DE</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_EL.pdf">EL</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_ES.pdf">ES</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_ET.pdf">ET</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180416_Codeweek_FI.pdf">FI</a> -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_FR.pdf">FR</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_HR.pdf">HR</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_HU.pdf">HU</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_IT.pdf">IT</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_LT.pdf">LT</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180416_Codeweek_LV.pdf">LV</a> -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_ME.pdf">ME</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_MK.pdf">MK</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180314_Codeweek_2018_MT.pdf">MT</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_NL.pdf">NL</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180507_Codeweek_PL.pdf">PL</a> -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_PT.pdf">PT</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_RO.pdf">RO</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_SK.pdf">SK</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_SL.pdf">SL</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_SQ.pdf">SQ</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_SR.pdf">SR</a>
                    -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180416_Codeweek_SV.pdf">SV</a> -
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/leaflets/20180326_Codeweek_2018_TR.pdf">TR</a>


                </li>


            </ul>

            <h2>Local resources in your language</h2>

            <div id="country-list">
                @component('components.countries-resources',['countries'=>$countries])
                @endcomponent
            </div>

            <hr>

            <h2>Coding lessons for beginners of all ages</h2>
            <ul>


                <li><strong><a href="https://websitesetup.org/javascript-cheat-sheet">Javascript Cheat
                            Sheet</a></strong>
                    compiles many of the most basic and important operators, functions, principles, and methods. It
                    provides a
                    good overview of the language and a reference for both developers and learners.
                </li>
                <li>This <strong><a href="http://ccea.org.uk/training/python" target="_blank">free Python coding /
                            education
                            resource</a></strong> for 11-14 age learners has been developed by the UK Council for the
                    Curriculum, Examinations & Assessment (CCEA) in conjunction with Queen's University of Belfast, a
                    leading
                    centre in cyber security. It has tested with local business and industry, to ensure it met their
                    needs also.
                    The resource is available as PDF, for introduction modules, and then on-line via a managed Moodle
                    service.
                    If you use this resource please recognise CCEA for its work.
                </li>
                <li><strong><a href="https://www.guru99.com/interactive-javascript-tutorials.html" target="_blank">The
                            JavaScript Tutorial</a></strong> introduces complete beginners to JavaScript, which is an
                    open
                    source and popular scripting language supported by all browsers. The class introduces you to basic
                    concepts
                    such as functions, cookies, DOM, and events in JavaScript as well as advanced topics like Object
                    Oriented
                    JavaScript, Internal & External JavaScript, and JavaScript Examples.
                </li>
                <li>
                    <strong><a href="https://www.apple.com/swift/playgrounds/" target="_blank">Swift Playgrounds</a></strong>:
                    Learn to code in a playful way! Solve puzzles and the same time get acquainted with Swift, a powerful programming language created by Apple and used by the pros to build today’s most popular apps.
                </li>
                <li>
                    <strong><a href="https://www.apple.com/105/media/uk/education/codeweek2018/IncredibleCodeMachine_guide_092418_Final_en-GB.pdf" target="_blank">The Incredible Code Machine with Swift Playgrounds - Facilitator Guide</a></strong>:
                    Celebrate EU Code Week — host your own coding event with Swift Playgrounds on iPad. The Facilitator Guide is available in other languages, check the national pages to see if it is available in yours.
                </li>
                <li><strong><a href="https://open.sap.com/courses/build1" target="_blank">Design Your First App with
                            Build*</a></strong>:
                    Learn to design your first app with a prototyping tool, SAP Build – the course and tool are provided
                    free of
                    charge.
                </li>
                <li><strong><a href="http://scratch.mit.edu/odetocode/" target="_blank">Scratch ode to code</a></strong>:
                    Multilingual Scratch tutorial for Europe Code Week
                </li>
                <li><strong><a href="http://www.codecademy.com" target="_blank">Codecademy</a></strong>: Learn to code
                    interactively, for free, on the web.
                </li>
                <li><strong><a href="https://www.codeschool.com" target="_blank">Code School</a></strong>: Code School
                    teaches
                    web technologies in the comfort of your browser with video lessons, coding challenges, and
                    screencasts.
                </li>
                <li><strong><a href="http://www.codeavengers.com" target="_blank">Code Avengers</a></strong>: Learn to
                    build
                    websites, apps and games with HTML, CSS and JavaScript.
                </li>
                <li><strong><a href="http://code.org/learn" target="_blank">Code.org Tutorials</a></strong>: Simple
                    tutorials
                    for beginners that can be completed in an hour or less.
                </li>
                <li><strong><a href="http://csunplugged.org" target="_blank">Computer Science Unplugged</a></strong>: A
                    collection of free learning activities for the classroom or home that teaches Computer Science
                    through
                    engaging games and puzzles that use cards, string, crayons and lots of running around.
                </li>
                <li><strong><a href="http://www.funlearning.com" target="_blank">Angry Birds Fun Learning</a></strong>:
                    Learn to
                    code the fun way! Discover fun coding apps and courses for various difficulty levels.
                </li>
                <li><strong><a href="https://webmaker.org/" target="_blank">Webmaker Web Literacy Map</a></strong>: A
                    collection
                    of resources for teaching and learning digital skills and web literacy, including a section on
                    creating for
                    the web.
                </li>
                <li><strong><a href="http://www.w3schools.com" target="_blank">W3Schools Online Web
                            Tutorials</a></strong>: A
                    collection of tutorials and references for web-related languages.
                </li>
                <li><strong><a href="http://www.academy-of-code.com/en" target="_blank">Academy of Code</a></strong>: A
                    collection of free interactive tutorials for HTML, CSS, JavaScript, PHP and MySQL.
                </li>
                <li><strong><a href="http://www.codingame.com" target="_blank">CodinGame</a></strong>: Play video games
                    using
                    code, learn programming in more than 20 programming languages.
                </li>
                <li><strong><a href="http://silentteacher.toxicode.fr" target="_blank">Silent Teacher</a></strong>: a
                    step by
                    step and funny way to learn the basics.
                </li>
                <li><strong><a href="https://codecombat.com" target="_blank">CodeCombat</a></strong>: an online game
                    that
                    teaches programming. Students write code in real programming languages (Python, JavaScript, Lua,
                    CofeeScript, Clojure).
                </li>
                <li><strong><a href="http://codespells.org" target="_blank">CodeSpells</a></strong> revolves around the
                    idea of
                    crafting your own magical spells to interact with the world, solve problems, and fight off foe.
                </li>
                <li><strong><a href="http://codeweek.it/codyroby/" target="_blank">CodyRoby</a></strong>: Unplugged
                    do-it-yourself card games and activities.
                </li>
            </ul>

            <h2>Coding for young beginners</h2>

            <ul>
                <li><strong><a href="https://csfirst.withgoogle.com/en/home" target="_blank">CS First</a></strong> is a
                    free
                    online program that introduces kids to programming. It involves block-based coding using Scratch and
                    are
                    themed to attract students with varied interests. It is designed for 9-14 year olds. Available in
                    English,
                    Italian, French and German.
                </li>
                <li><strong><a href="http://scratch.mit.edu/" target="_blank">Scratch</a></strong>: With Scratch, you
                    can
                    program your own interactive stories, games, and animations — and share your creations with others
                    in the
                    online community. Primarily designed for 8 to 16 year olds, available in a variety of languages, can
                    be used
                    <a href="http://scratch.mit.edu/projects/editor/?tip_bar=getStarted" target="_blank">online</a> or
                    offline
                    with the <a href="http://scratch.mit.edu/scratch2download/" target="_blank">Scratch editor</a> on
                    Mac,
                    Windows and Linux computers. Teachers should visit <a href="http://scratch-ed.org/" target="_blank">ScratchED</a>,
                    an online community where Scratch educators share stories, exchange resources, ask questions, and
                    find
                    people.
                </li>
                <li><strong><a href="https://www.gethopscotch.com" target="_blank">Hopscotch</a></strong>: iPad app
                    recommended
                    for kids ages 8 and above with simple, intuitive building blocks that can be used to create games,
                    animations and apps in a colorful, interactive environment. Even younger coders can also try the
                    <strong><a
                                href="http://www.daisythedinosaur.com" target="_blank">Daisy the Dinosaur</a></strong>
                    app.
                </li>
                <li><strong><a href="http://www.scratchjr.org/" target="_blank">ScratchJr</a></strong>: ScratchJr is an
                    introductory programming language that enables young children (ages 5 to 7) to create their own
                    interactive
                    stories and games. ScratchJr was inspired by Scratch, but redesigned the interface and programming
                    language
                    to make them developmentally appropriate for younger children. Currently available as an iPad app,
                    with an
                    Android version scheduled to be released later in 2014, and a web-based version in 2015.
                </li>
                <li><strong><a href="https://coderdojo.com" target="_blank">CoderDojo</a></strong>: The CoderDojo
                    website
                    features a variety of information for parents, kids and volunteers looking to start their own coding
                    club
                    for children. Part of the website is also a list of <a
                            href="http://kata.coderdojo.com/wiki/Main_Page"
                            target="_blank">resources</a> that can be used to
                    teach a variety of programming languages to different age groups.
                </li>
                <li><strong><a href="https://www.robomindacademy.com/" target="_blank">RoboMind Academy</a></strong>: By
                    programming a virtual robot, the student is introduced to logic, automation and technology.
                    Available as an
                    online educator-friendly platform that can be used with students aged 8 years or older. A good start
                    is the
                    <a href="https://www.robomindacademy.com//go/navigator/coursedetails?course=HourOfCode"
                       target="_blank">Hour
                        of Code Tutorial</a>.
                </li>
                <li><strong><a href="https://www.allcancode.com" target="_blank">Run Marco!</a></strong>: an adventure
                    game for
                    kids that teaches the basic of coding. Available as a browser game and an <a
                            href="https://play.google.com/store/apps/details?id=com.allcancode.runmarco"
                            target="_blank">Android
                        app</a>, already translated in 13 European languages (more coming soon).
                </li>
                <li><strong><a href="https://pocketcode.org" target="_blank">Pocket Code</a></strong>: An Android app
                    that
                    allows you to create your own games, animations, interactive music videos, and other kinds of apps,
                    directly
                    on your phone or tablet. An easy way to get started is the <a
                            href="https://pocketcode.org/hourOfCode"
                            target="_blank">Skydiving Steve</a> hour of
                    code tutorial. Or you can follow Horst's <a
                            href="http://spielend-programmieren.at/blog/20161008_scannerapp.html">step-by-step
                        tutorial</a> to
                    transform your smartphone into an scanner for alien lifeforms.
                </li>
                <li><strong><a href="http://www.kodugamelab.com/" target="_blank">Kodu</a></strong>: Kodu lets kids
                    create games
                    via a simple visual programming language. Kodu can be used to teach creativity, problem solving,
                    storytelling, as well as programming. Available for Windows computers.
                </li>
                <li><strong><a href="https://www.playcodemonkey.com" target="_blank">CodeMonkey</a></strong>: CodeMonkey
                    is a
                    fun online game that teaches you how to code. In this free technology and STEM game, students learn
                    about
                    computer coding concepts like functions and loops by programming a monkey to find bananas! Real
                    world
                    programming language. Write code. Catch bananas. Save the world.
                </li>
                <li><strong><a href="http://codeweek.it/codyroby/" target="_blank">CodyRoby</a></strong>: Unplugged
                    games and
                    activities.
                </li>
                <li><strong><a href="http://www.icode.iteach-uk.com" target="_blank">iCode from iTeach</a></strong>:
                    iCode is an
                    initiative created by iTeach to provide schools with a structured programme to run a coding and
                    programming
                    club as an after school, extra curricular activity or as a structured programme within the school
                    day.
                </li>
                <li>
                    <strong><a href="https://education.minecraft.net/">Minecraft Education</a></strong>:
                    Online, educational platform where students can learn in an immersive way and in collaboration how to code, and the same time familiarize themselves with various STEM subjects with the guidelines and the tailored lesson plans.
                </li>
                <li>
                    <strong><a href="https://www.microsoft.com/en-us/makecode">MakeCode</a></strong>:
                    Free, open source platform for creating engaging computer science learning experiences that support a progression path into real-world programming. Learners get immersed in computer science while creating fun projects.
                </li>
                <li>
                    <strong><a href="https://www.bebras.org/?q=about">Bebras</a></strong>:
                    Information on the international initiative aiming to promote Informatics (Computer Science, or Computing) and computational thinking among school students at all ages.
                </li>
                <li>
                    <strong><a href="https://csunplugged.org/en/">CS Unplugged</a></strong>:
                    Collection of free teaching material that teaches Computer Science through engaging games and puzzles.
                </li>
            </ul>

            <h2>Full online courses for advanced learners</h2>
            <ul>
                <li><strong><a href="https://www.edx.org/course-list/allschools/computer-science/allcourses"
                               target="_blank">edX</a></strong>: EdX offers interactive online classes and MOOCs from
                    the
                    world’s best universities. Online courses from MITx, HarvardX, BerkeleyX, UTx and many other
                    universities.
                </li>
                <li><strong><a href="http://ocw.mit.edu/courses/electrical-engineering-and-computer-science/"
                               target="_blank">MIT
                            OpenCourseWare</a></strong>: MIT OpenCourseWare (OCW) is a web-based publication of
                    virtually all
                    MIT course content. OCW is open and available to the world and is a permanent MIT activity.
                </li>
                <li><strong><a href="https://www.coursera.org/courses?orderby=upcoming&cats=cs-programming"
                               target="_blank">Coursera</a></strong>:
                    Coursera is an education platform that partners with top universities and organizations worldwide,
                    to offer
                    courses online for anyone to take, for free.
                </li>
                <li><strong><a href="https://www.udacity.com/courses#!/all" target="_blank">Udacity</a></strong>: Online
                    education that bridges the gap between academic and real world skills. Taught by industry leaders
                    excited to
                    share their expertise from companies such as Google, Facebook, Cloudera, and MongoDB.
                </li>
            </ul>

            <h2>Helping others learn to code</h2>
            <ul>
                <li><strong><a href="https://www.apple.com/uk/everyone-can-code/" target="_blank">Everyone Can Code</a></strong>
                    Technology has a language. It’s called code. At Apple we believe coding is an essential skill.
                    Learning to
                    code teaches you how to solve problems and work together in creative ways. And it helps you build
                    apps that
                    bring your ideas to life. We think everyone should have the opportunity to create something that can
                    change
                    the world. So Apple had designed a programme that lets anyone learn, write and teach code.
                </li>
                <li><strong><a href="https://open.sap.com/courses/acw1-3" target="_blank">Code Week: Teaching
                            Programming to
                            Young Learners</a></strong> (Repeat Q3/2017) Get an introduction to Scratch, a free
                    programming tool
                    by MIT, to make coding fun for children aged 8-12 years old. <a
                            href="https://open.sap.com/courses/acw1-3-fr">Code Week : Enseigner la programmation aux
                        enfants</a>
                    (Réédition Q3/2017)
                </li>
                <li><strong><a href="https://open.sap.com/courses/acw2-2" target="_blank">Code Week: Teens Get
                            Coding!</a></strong> (Repeat Q3/2017) With this course, teenagers can use Scratch to start
                    creating
                    apps and learn what’s behind the software they use, for example in video games. <a
                            href="https://open.sap.com/courses/acw2-2-fr">Code Week : Les ados se mettent au code ! </a>(Réédition
                    Q3/2017)
                </li>

                <li><strong><a href="http://www.europeanschoolnetacademy.eu/web/introducing-computing-in-your-classroom"
                               target="_blank">Introducing computing in the classroom, by EU Schoolnet</a></strong>:
                    Course
                    designed by teachers for teachers which features interviews, presentations, and activities from
                    teachers,
                    professors, students and computing professionals.
                </li>
                <li><strong><a href="http://www.allyouneediscode.eu/en/lesson-plans" target="_blank">Lesson plans for
                            teachers</a></strong>: Lesson plans created to help primary and secondary education teachers
                    introduce coding to students. They will make pupils understand coding concepts in a fun way and
                    offer
                    teachers many ideas and resources.
                </li>
                <li>
                    <strong><a href="http://earsketch.gatech.edu/landing/#/" target="_blank">earsketch</a></strong>:
                    Online platform instructing how to write code, designed to be used within a high school introductory computing course. In addition to computer science, it is also used in music, and music technology.
                </li>
                <li>
                    <strong><a href="https://developers.google.com/blockly/" target="_blank">Blocky</a></strong>:
                    Game repository built by Google, introducing basic coding concepts adding a visual code editor to web and Android apps. In addition, a few games can be found <a href="https://blockly-games.appspot.com/">here Blocky Games.</a>
                </li>
                <li>
                    <strong><a href="http://resources.makeblock.academy/2018/10/08/codeweek-2018/" target="_blank">MakeBlock</a></strong>:
                    Lesson plans and tutorials about Python and Artificial Intelligence activities for students in Primary School.
                </li>
                <li>
                    <strong><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/CodeWeek+2018+Code+Hunting+Games+guide.pdf">Code Hunting Game Guide</a></strong>:
                    Helps organisers to prepare an original treasure hunt game designed for Code Week. People compete in teams and visit different locations to solve a puzzle. This guide explains step by step what needs to be done to set up the game in your school, park or across the whole city.
                </li>
            </ul>

        </div>
    </section>


@endsection
