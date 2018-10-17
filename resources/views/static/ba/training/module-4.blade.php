@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Kreiranje edukativnih igara sa Scratchom</h1><span>Autor Jesus Moreno Leon</span></div>

                    <hr>

                    <p>Kritičko razmi&scaron;ljanje, upornost, rje&scaron;avanje problema, računarsko razmi&scaron;ljanje i kreativnost samo su neke od vje&scaron;tina koje su potrebne va&scaron;im učenicima za uspjeh u 21. stoljeću, a kodiranje vam može pomoći da to postignete na zabavan i motivirajući način.</p>

                    <p>Algoritamski pojmovi kontrole toka uz pomoć nizova instrukcija i petlji, predstavljanje podataka uz pomoć varijabli i popisa, ili sinhronizacija procesa mogu zvučati kao komplicirani koncepti, ali u ovom videu ćete utvrditi da je njih naučiti lak&scaron;e nego &scaron;to mislite.</p>

                    <p>U ovom videu, Jesus Moreno Leon, nastavnik računarskih nauka i istraživač u tom polju iz &Scaron;panije, pojasnit će kako možete razviti ove i druge vje&scaron;tine kod svojih učenika, a da vam pritom bude i zabavno. Kako se to može uraditi? Kreiranjem igre pitanja i odgovora u Scratchu, najpopularnijem programskom jeziku koji se koristi u &scaron;kolama &scaron;irom svijeta. Scratch ne samo da jača računarsko razmi&scaron;ljanje, nego i omogućava uvođenje elemenata igre u učionicu, tako da va&scaron;i učenici budu motivirani dok uče i zabavljaju se.</p>

                    <p>Pogledajte video i saznajte kako da otpočnete.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podijelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Odaberite jedan od planova lekcija u donjem tekstu i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Aktivnost 1 - Igra pitanja i odgovora sa Scratchom za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Aktivnost 2 - Igra pitanja i odgovora sa Scratchom za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Aktivnost 3 - Igra pitanja i odgovora sa Scratchom za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection