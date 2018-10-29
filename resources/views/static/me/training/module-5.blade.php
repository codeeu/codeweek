@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Stvaranje, robotika i promi&scaron;ljanje u učionici</h1><span>pripremila Tullia Urschitz</span></div>

                    <hr>

                    <p>Uvođenje programiranja, promi&scaron;ljanja, robotike i mikroelektronike kao nastavnih alata i alata za učenje u &scaron;kolski program ključno je za obrazovanje u 21. vijeku.</p>

                    <p>Primjena promi&scaron;ljanja i robotike u &scaron;kolama donosi mnogo prednosti učenicima budući da podstiče razvoj ključnih kompetencija poput rje&scaron;avanja problema, timskog rada i saradnje. Takođe pospje&scaron;uje kreativnost i samopouzdanje učenika i pomaže im da razviju upornost i odlučnost u susretu sa izazovima. Robotika je takođe polje koje promovi&scaron;e inkluziju, jer je lako dostupna &scaron;irokom spektru učenika sa različitim talentima i vje&scaron;tinama (kako dječacima tako i djevojčicama) i pozitivno utiče na učenike sa poremećajima iz autističnog spektra.</p>

                    <p>Pogledajte video zapis u kom će Tullia Urschitz, italijanski ambasador za Scientix i predavač STEM-a u mjestu Sant&rsquo;Ambrođo di Valpoličela (org. Sant&rsquo;Ambrogio Di Valpolicella) (Italija), dati neke praktične primjere o načinu na koji nastavnici mogu uvesti promi&scaron;ljanje i robotiku u učionice i tako pretvoriti pasivne učenike u stvaraoce pune entuzijazma.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Preuzmite video zapis.</a></p>

                    <h2>Da li ste spremni podijeliti sa svojim učenicima ono &scaron;to ste naučili?</h2>

                    <p>Odaberite jedan plan časa i organizujte aktivnost sa va&scaron;im učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Aktivnost 1 - Kako napraviti mehaničku ruku od iverice za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Aktivnost 2 - Kako napraviti mehaničku ili robotsku ruku za nižu srednju &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Aktivnost 3 - Kako napraviti mehaničku ili robotsku ruku za vi&scaron;u srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection