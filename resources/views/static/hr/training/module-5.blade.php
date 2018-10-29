@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Izrada, robotika i popravljanje u učionici</h1><span>Tullia Urschitz</span></div>

                    <hr>

                    <p>Za obrazovanje u 21. stoljeću ključno je u &scaron;kolske programe rada integrirati programiranje, popravljanje, robotiku i mikroelektroniku kao alate za učenje i poučavanje.</p>

                    <p>Primjena popravljanja i robotike u &scaron;kolama ima brojne prednosti za učenike jer im pomaže u razvoju ključnih kompetencija kao &scaron;to su rje&scaron;avanje problema, timski rad i suradnja. Također potiče kreativnost i samopouzdanje učenika te im može pomoći da postanu uporniji i odlučniji kada se suoče s izazovima. Robotika je i područje koje promiče uključivost jer je lako dostupno &scaron;irokom rasponu učenika različitih talenata i vje&scaron;tina (i djevojčicama i dječacima) te pozitivno utječe na učenike s poremećajima iz autističnog spektra.</p>

                    <p>Pogledajte ovaj videozapis u kojemu će Tullia Urschitz, talijanska ambasadorica zajednice Scientix i nastavnica STEM-a u općini Sant&rsquo;Ambrogio Di Valpolicella u Italiji, navesti neke praktične primjere o tome kako nastavnici mogu uključiti popravljanje i robotiku u svoju nastavu, preobražavajući tako pasivne učenike u entuzijastične stvaratelje.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Preuzmite videoskriptu</a></p>

                    <h2>Jeste li spremni podijeliti naučeno sa svojim učenicima?</h2>

                    <p>Odaberite jedan od nastavnih planova u nastavku i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">1. aktivnost &ndash; Kako izraditi mehaničku ruku od lesonita za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">2. aktivnost &ndash; Kako izraditi mehaničku ili robotsku ruku za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">3. aktivnost &ndash; Kako izraditi mehaničku ili robotsku ruku za vi&scaron;e razrede srednje &scaron;kole</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection