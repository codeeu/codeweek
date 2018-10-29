@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Stvaranje, robotika i praktični rad u učionici</h1><span>Autor Tullia Urschitz</span></div>

                    <hr>

                    <p>Integracija kodiranja, praktičnog rada, robotike i mikroelektronike kao nastavnih i alata za učenje u nastavnom planu i programu je ključ u obrazovanju 21. stoljeća.</p>

                    <p>Upotreba praktičnog rada i robotike u &scaron;kolama ima mnogo prednosti za učenike, jer doprinosi razvijanju ključnih sposobnosti poput rje&scaron;avanja problema, timskog rada i međusobne saradnje. Ona također podstiče kreativnost i samouvjerenost učenika i može učenicima pomoći u razvijanju ustrajnosti i odlučnosti pri suočavanju s izazovima. Robotika je također oblast gdje se promovira inkluzivnost, jer je ona lako pristupačna &scaron;irokoj lepezi učenika sa različitim talentima i vje&scaron;tinama (i dječacima i djevojčicama) i pozitivno utiče na učenike u spektru autizma.</p>

                    <p>Pogledajte ovaj video gdje Tullia Urschitz, Italijanska ambasadorka Scientixa i nastavnica STEM-a u Sant Ambrogio di Valoplicella, Italija, daje neke praktične primjere toga kako nastavnici mogu integrirati praktični rad i robotiku u učionici, čime će transformirati pasivne učenike u entuzijastične kreatore.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podijelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Odaberite jedan od planova lekcija u donjem tekstu i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Aktivnost 1 - Kako načiniti mehaničku ruku od tvrdog kartona u osnovnoj &scaron;koli</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Aktivnost 2 - Kako načiniti mehaničku ili robotičku ruku u nižim razredima osnovne &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Aktivnost 3 - Kako načiniti mehaničku ili robotičku ruku u vi&scaron;im razredima srednje &scaron;kole</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection