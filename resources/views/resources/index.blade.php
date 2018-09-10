@extends('layout.base')

@section('content')
    <section>

        <div class="container resources-container">

            <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                <h1>@lang('resources.title')</h1>
                <span>EU Code Week 2018</span>
            </div>

            <hr>

            <p>
                @lang('resources.initial_content.1')
                <a href="/ambassadors">@lang('resources.initial_content.2')</a>.
                @lang('resources.initial_content.3')
                <a href="http://codeweek.eu/">codeweek.eu</a>
                @lang('resources.initial_content.4')
            </p>

            <p>
                <a href="/guide">@lang('resources.initial_content.how_to_organise_event')</a>
            </p>

            <div class="flex align-center justify-center">
                <div class="btn btn-primary btn-directional btn-lg submit-button-wrapper">
                    <button onclick="window.location.href='/add/'" style="padding: 15px;">@lang('resources.initial_content.button')</button>
                </div>
            </div>

            <br/>

            <h2>@lang('resources.presentations_toolkits.title')</h2>
            <ul>
            <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU+Code+Week+2018+Communications+Toolkit.zip">EU Code Week 2018 Communications Toolkit</a></li>
                <li>
                    
                    @lang('resources.presentations_toolkits.points.1')

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

                <li>
                    @lang('resources.presentations_toolkits.points.2')
                    (<a href="{{asset('docs/EUCodeWeek2018.pdf')}}">PDF</a>,<a href="{{asset('docs/EUCodeWeek2018.pptx')}}">PPTX</a>)
                </li>
                <li>
                    @lang('resources.presentations_toolkits.points.3')
                    (<a href="http://events.codeweek.eu/guide/">WEB</a>, <a href="{{asset('docs/codeeu_toolkit.pdf')}}">PDF</a>)
                </li>
                <li>
                    @lang('resources.presentations_toolkits.points.4.content')
                    (<a href="{{asset('docs/DGD-Scratch-Teacher-Guide-Abrdgd.pdf')}}" target="_blank">
                        @lang('resources.presentations_toolkits.points.4.link1')
                    </a>,
                    <a href="https://www.youtube.com/playlist?list=PLOJbImijbLrTlg1ywLCOwesrZC14E5fuM" target="_blank">
                        @lang('resources.presentations_toolkits.points.4.link2')
                    </a>)
                </li>
                <li>
                    <a href="http://www.slideshare.net/alessandrobogliolo/europe-code-week-in-the-classroom-teacher-guide"
                       target="_blank">@lang('resources.presentations_toolkits.points.5')</a></li>
                <li>
                    <a href="https://www.slideshare.net/alessandrobogliolo/codeweek4all-challenge-2016-guidelines-for-schools-80177324"
                       target="_blank">@lang('resources.presentations_toolkits.points.6')</a></li>

                <li><a href="http://www.slideshare.net/alessandrobogliolo/europe-code-week-worldwide-guide"
                       target="_blank">@lang('resources.presentations_toolkits.points.7')</a></li>

                <li><a href="https://www.slideshare.net/alessandrobogliolo/codeweekeu-2017-guidelines-for-librarians"
                       target="_blank">@lang('resources.presentations_toolkits.points.8')</a></li>
            </ul>

            <h2>@lang('resources.local_resources.title')</h2>

            <div id="country-list">
                @foreach($countries as $country)

                    <strong>

                        <a href="{{ route('resources_by_country',['country'=>$country]) }}"
                           title="@lang('resources.local_resources.tooltip') {{ ucwords(str_replace('_', ' ', $country)) }}">{{ ucwords(str_replace('_', ' ', $country)) }}</a>

                        @if(!$loop->last)
                            -
                        @endif

                    </strong>

                @endforeach
            </div>

            <hr>

            <h2>@lang('resources.coding_lessons_for_beginners.title')</h2>
            <ul>


                <li>
                    <strong><a href="https://websitesetup.org/javascript-cheat-sheet">Javascript Cheat Sheet</a></strong>
                    @lang('resources.coding_lessons_for_beginners.points.1')
                </li>
                <li>
                    <strong><a href="http://ccea.org.uk/training/python" target="_blank">This free Python coding / education resource</a></strong>
                    @lang('resources.coding_lessons_for_beginners.points.2')
                </li>
                <li>
                    <strong><a href="https://www.guru99.com/interactive-javascript-tutorials.html" target="_blank">The JavaScript Tutorial</a></strong>
                    @lang('resources.coding_lessons_for_beginners.points.3')
                </li>
                <li>
                    <strong><a href="https://itunes.apple.com/WebObjects/MZStore.woa/wa/viewSoftware?id=908519492&mt=8&ls=1" target="_blank">Swift Playgrounds</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.4')
                </li>
                <li>
                    <strong><a href="https://open.sap.com/courses/build1" target="_blank">Design Your First App with Build*</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.5')
                </li>
                <li>
                    <strong><a href="http://scratch.mit.edu/odetocode/" target="_blank">Scratch ode to code</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.6')
                </li>
                <li>
                    <strong><a href="http://www.codecademy.com" target="_blank">Codecademy</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.7')
                </li>
                <li>
                    <strong><a href="https://www.codeschool.com" target="_blank">Code School</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.8')
                </li>
                <li>
                    <strong><a href="http://www.codeavengers.com" target="_blank">Code Avengers</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.9')
                </li>
                <li>
                    <strong><a href="http://code.org/learn" target="_blank">Code.org Tutorials</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.10')
                </li>
                <li>
                    <strong><a href="http://csunplugged.org" target="_blank">Computer Science Unplugged</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.11')
                </li>
                <li>
                    <strong><a href="http://www.funlearning.com" target="_blank">Angry Birds Fun Learning</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.12')
                </li>
                <li>
                    <strong><a href="https://webmaker.org/" target="_blank">Webmaker Web Literacy Map</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.13')
                </li>
                <li>
                    <strong><a href="http://www.w3schools.com" target="_blank">W3Schools Online Web Tutorials</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.14')
                </li>
                <li>
                    <strong><a href="http://www.academy-of-code.com/en" target="_blank">Academy of Code</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.15')
                </li>
                <li>
                    <strong><a href="http://www.codingame.com" target="_blank">CodinGame</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.16')
                </li>
                <li>
                    <strong><a href="http://silentteacher.toxicode.fr" target="_blank">Silent Teacher</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.17')
                </li>
                <li>
                    <strong><a href="https://codecombat.com" target="_blank">CodeCombat</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.18')
                </li>
                <li>
                    <strong><a href="http://codespells.org" target="_blank">CodeSpells</a></strong>
                    @lang('resources.coding_lessons_for_beginners.points.19')
                </li>
                <li>
                    <strong><a href="http://codeweek.it/codyroby/" target="_blank">CodyRoby</a></strong>:
                    @lang('resources.coding_lessons_for_beginners.points.20')
                </li>
            </ul>

            <h2>@lang('resources.coding_for_young_beginners.title')</h2>

            <ul>
                <li>
                    <strong><a href="https://csfirst.withgoogle.com/en/home" target="_blank">CS First</a></strong>
                    @lang('resources.coding_for_young_beginners.points.1')
                </li>
                <li>
                    <strong><a href="http://scratch.mit.edu/" target="_blank">Scratch</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.2-1')
                    <a href="http://scratch.mit.edu/projects/editor/?tip_bar=getStarted" target="_blank">online</a>
                    @lang('resources.coding_for_young_beginners.points.2-2')
                    <a href="http://scratch.mit.edu/scratch2download/" target="_blank">Scratch editor</a>
                    @lang('resources.coding_for_young_beginners.points.2-3')
                    <a href="http://scratch-ed.org/" target="_blank">ScratchED</a>,
                    @lang('resources.coding_for_young_beginners.points.2-4')
                </li>
                <li>
                    <strong><a href="https://www.gethopscotch.com" target="_blank">Hopscotch</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.3')
                    <strong><a href="http://www.daisythedinosaur.com" target="_blank">Daisy the Dinosaur app</a></strong>.
                </li>
                <li>
                    <strong><a href="http://www.scratchjr.org/" target="_blank">ScratchJr</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.4')
                </li>
                <li>
                    <strong><a href="https://coderdojo.com" target="_blank">CoderDojo</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.5-1')
                    <a href="http://kata.coderdojo.com/wiki/Main_Page" target="_blank">@lang('resources.coding_for_young_beginners.points.5-2')</a>
                    @lang('resources.coding_for_young_beginners.points.5-3')
                </li>
                <li>
                    <strong><a href="https://www.robomindacademy.com/" target="_blank">RoboMind Academy</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.6')
                    <a href="https://www.robomindacademy.com//go/navigator/coursedetails?course=HourOfCode" target="_blank">Hour of Code Tutorial</a>.
                </li>
                <li>
                    <strong><a href="https://www.allcancode.com" target="_blank">Run Marco!</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.7-1')
                    <a href="https://play.google.com/store/apps/details?id=com.allcancode.runmarco" target="_blank">@lang('resources.coding_for_young_beginners.points.7-2')</a>,
                    @lang('resources.coding_for_young_beginners.points.7-3')
                </li>
                <li>
                    <strong><a href="https://pocketcode.org" target="_blank">Pocket Code</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.8-1')
                    <a href="https://pocketcode.org/hourOfCode" target="_blank">Skydiving Steve</a>
                    @lang('resources.coding_for_young_beginners.points.8-2')
                    <a href="http://spielend-programmieren.at/blog/20161008_scannerapp.html">@lang('resources.coding_for_young_beginners.points.8-3')</a>
                    @lang('resources.coding_for_young_beginners.points.8-4')
                </li>
                <li>
                    <strong><a href="http://www.kodugamelab.com/" target="_blank">Kodu</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.9')
                </li>
                <li>
                    <strong><a href="https://www.playcodemonkey.com" target="_blank">CodeMonkey</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.10')
                </li>
                <li>
                    <strong><a href="http://codeweek.it/codyroby/" target="_blank">CodyRoby</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.11')
                </li>
                <li>
                    <strong><a href="http://www.icode.iteach-uk.com" target="_blank">iCode from iTeach</a></strong>:
                    @lang('resources.coding_for_young_beginners.points.12')
                </li>
            </ul>

            <h2>@lang('resources.full_online_courses.title')</h2>
            <ul>
                <li>
                    <strong><a href="https://www.edx.org/course-list/allschools/computer-science/allcourses" target="_blank">edX</a></strong>:
                    @lang('resources.full_online_courses.points.1')
                </li>
                <li>
                    <strong><a href="http://ocw.mit.edu/courses/electrical-engineering-and-computer-science/" target="_blank">MIT OpenCourseWare</a></strong>:
                    @lang('resources.full_online_courses.points.2')
                </li>
                <li>
                    <strong><a href="https://www.coursera.org/courses?orderby=upcoming&cats=cs-programming" target="_blank">Coursera</a></strong>:
                    @lang('resources.full_online_courses.points.3')
                </li>
                <li>
                    <strong><a href="https://www.udacity.com/courses#!/all" target="_blank">Udacity</a></strong>:
                    @lang('resources.full_online_courses.points.4')
                </li>
            </ul>

            <h2>@lang('resources.helping_others_learn_to_code.title')</h2>
            <ul>
                <li>
                    <strong><a href="https://www.apple.com/uk/everyone-can-code/" target="_blank">Everyone Can Code</a></strong>
                    @lang('resources.helping_others_learn_to_code.points.1')
                </li>
                <li>
                    <strong><a href="https://open.sap.com/courses/acw1-3" target="_blank">Code Week: Teaching Programming to Young Learners</a></strong>
                    @lang('resources.helping_others_learn_to_code.points.2')
                    <a href="https://open.sap.com/courses/acw1-3-fr">Code Week : Enseigner la programmation aux enfants</a> (Réédition Q3/2017)
                </li>
                <li>
                    <strong><a href="https://open.sap.com/courses/acw2-2" target="_blank">Code Week: Teens Get Coding!</a></strong>
                    @lang('resources.helping_others_learn_to_code.points.3')
                    <a href="https://open.sap.com/courses/acw2-2-fr">Code Week : Les ados se mettent au code ! </a>(Réédition Q3/2017)
                </li>
                <li>
                    <strong><a href="http://partner.devry.edu/bootcamp/web-development/resources.html" target="_blank">DeVry Bootcamp Coding Resource Center</a></strong> -
                    @lang('resources.helping_others_learn_to_code.points.4')
                </li>
                <li>
                    <strong><a href="http://www.europeanschoolnetacademy.eu/web/introducing-computing-in-your-classroom" target="_blank">Introducing computing in the classroom, by EU Schoolnet</a></strong>:
                    @lang('resources.helping_others_learn_to_code.points.5')
                </li>
                <li>
                    <strong><a href="http://www.allyouneediscode.eu/en/lesson-plans" target="_blank">Lesson plans for teachers</a></strong>:
                    @lang('resources.helping_others_learn_to_code.points.6')
                </li>
            </ul>

        </div>
    </section>


@endsection
