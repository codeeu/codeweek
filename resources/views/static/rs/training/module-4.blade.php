@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Kreiranje edukativnih igrica u <i>Scratch</i>-u</h1><span>autor: Hesus Moreno Leon</span></div>

                    <hr>

                    <p>Kritičko razmi&scaron;ljanje, upornost, re&scaron;avanje problema, računarsko razmi&scaron;ljanje i kreativnost su samo neke od ključnih ve&scaron;tina koje va&scaron;i učenici treba da savladaju u 21. veku. Programiranje može da vam pomogne da uspete u tome na zabavan način koji motivi&scaron;e va&scaron;e učenike.</p>

                    <p>Algoritamski pojmovi o kontroli protoka koristeći sekvence instrukcija i petlje, predstavljanje podataka pomoću varijabli i lista ili sinhronizacija procesa mogu da zvuče kao komplikovani koncepti, ali u ovom video snimku otkrićete da ih je mnogo lak&scaron;e naučiti nego &scaron;to mislite.</p>

                    <p>U ovom video snimku, Hesus Moreno Leon, profesor računarskih nauka i istraživač iz &Scaron;panije, objasniće vam kako možete da razvijete ove i druge ve&scaron;tine kod va&scaron;ih učenika dok se zabavljaju. Kako je to moguće? Pravljenjem igrice pitanja i odgovora u -u, najpopularnijem programskom jeziku koji se koristi u &scaron;kolama &scaron;irom sveta.  ne samo da podstiče računarsko razmi&scaron;ljanje već i omogućava uvođenje elemenata gemifikacije u učionicu kako bi održao motivaciju va&scaron;im učenicima dok uče i zabavljaju se.</p>

                    <p>Pogledajte video i naučite kako da počnete.</p>

                    @include('static.youtube', ['video_id' => 'M1zJOfmriGU'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-19-SR-TRA-00.DOCX">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Izaberite jedan od nastavnih planova u nastavku i organizujte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-10-SR-TRA-00.DOCX">Aktivnost 1 - Igrica pitanja i odgovora u -u za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-11-SR-TRA-00.DOCX">Aktivnost 2 - Igrica pitanja i odgovora u -u za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-12-SR-TRA-00.DOCX">Aktivnost 3 - Igrica pitanja i odgovora u -u za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection