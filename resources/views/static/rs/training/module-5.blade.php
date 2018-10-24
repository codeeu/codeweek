@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Izrada, robotika i majstorisanje u učionici</h1><span>autor: Tulia Ur&scaron;ic</span></div>

                    <hr>

                    <p>Integracija programiranja, majstorisanja, robotike i mikroelektronike kao alata za nastavu i učenje u &scaron;kolske programe je ključna za obrazovanje u 21. veku.</p>

                    <p>Primena majstorisanja i robotike u &scaron;kolama ima mnogo prednosti za učenike jer pomaže u razvijanju ključnih sposobnosti kao &scaron;to su re&scaron;avanje problema, timski rad i saradnja. Takođe povećava kreativnost i samopouzdanje kod učenika i može da pomogne učenicima da razviju istrajnost i odlučnost pri suočavanju sa izazovima. Robotika je takođe polje koje promovi&scaron;e inkluzivnost, jer je lako dostupno &scaron;irokom spektru učenika sa različitim talentima i ve&scaron;tinama (kako dečacima, tako i devojčicama) i pozitivno utiče na učenike sa autizmom.</p>

                    <p>Pogledajte ovaj video u kom Tulia Ur&scaron;ic, italijanski ambasador <i>Scientix</i>-a i STEM nastavnik u Sant&rsquo;Ambrođo Di Valpoličeli u Italiji, daje neke od praktičnih primera kako nastavnici mogu da integri&scaron;u majstorisanje i robotiku u nastavu, čime pasivne učenike pretvaraju u entuzijastične stvaraoce.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Izaberite jedan od nastavnih planova u nastavku i organizujte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Aktivnost 1 - Kako napraviti mehaničku ruku od lesonita za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Aktivnost 2 - Kako napraviti mehaničku ili robotičku ruku za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Aktivnost 3 - Kako napraviti mehaničku ili robotičku ruku za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection