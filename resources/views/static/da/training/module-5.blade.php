@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Robotteknologi og n&oslash;rkleri i klassev&aelig;relset</h1><span>af Tullia Urschitz</span></div>

                    <hr>

                    <p>Integrationen af kodning, n&oslash;rkleri, robotteknologi og mikroelektronik som undervisningsredskaber i pensum er en vigtig del af uddannelsen i det 21.&nbsp;&aring;rhundrede.</p>

                    <p>Brug af n&oslash;rkleri og robotteknologi i skolen har mange fordele for eleverne, da det hj&aelig;lper med at udvikle vigtige f&aelig;rdigheder som for eksempel probleml&oslash;sning, teamwork og samarbejde. Det styrker ogs&aring; elevernes kreativitet og selvtillid, og det kan v&aelig;re med til at l&aelig;re eleverne vedholdenhed og beslutsomhed, n&aring;r de m&oslash;der udfordringer. Robotteknologi er ogs&aring; et omr&aring;de, der fremmer inklusion, da det er lettilg&aelig;ngeligt for mange forskellige elever med forskellige evner og f&aelig;rdigheder (s&aring;vel drenge som piger), og det har en positiv indvirkning p&aring; elever p&aring; autismespektret.</p>

                    <p>Se denne video, hvor Tullia Urschitz, en italiensk Scientix-ambassad&oslash;r og STEM-l&aelig;rer i Sant&rsquo;Ambrogio Di Valpolicella, Italien, giver nogle praktiske eksempler p&aring;, hvordan l&aelig;rere kan integrere n&oslash;rkleri og robotteknologi i klassev&aelig;relset og dermed forvandle passive elever til engagerede skabere.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Download videoscriptet</a></p>

                    <h2>Er du klar til at dele det, du har l&aelig;rt, med dine elever?</h2>

                    <p>V&aelig;lg en af l&aelig;replanerne nedenfor, og afhold en aktivitet med dine elever.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Aktivitet 1 &ndash; S&aring;dan laver man en mekanisk h&aring;nd i masonit for indskolingen/mellemtrinnet</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Aktivitet 2 &ndash; S&aring;dan laver man en mekanisk h&aring;nd eller en roboth&aring;nd for udskolingen</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Aktivitet 3 &ndash; S&aring;dan laver man en mekanisk h&aring;nd eller en roboth&aring;nd for gymnasiale uddannelser</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection