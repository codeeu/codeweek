@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Kreiranje edukativnih igara Skračom (Scratch)</h1><span>pripremio Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kritičko mi&scaron;ljenje, upornost, rje&scaron;avanje problema, računarsko mi&scaron;ljenje i kreativnost samo su neke od ključnih vje&scaron;tina koje su va&scaron;im učenicima potrebne za uspjeh u 21. vijeku, a programiranje vam može pomoći da ih dosegnete na zabavan i motivirajući način.</p>

                    <p>Algoritamska poimanja kontrole tokova kroz upotrebu sekvenci instrukcija i petlji, predstavljanje podataka kori&scaron;ćenjem varijabli i spiskova, ili sinhronizacija procesa mogu zazvučati kao komplikovani koncepti, ali u ovom videu zapisu ćete okriti da ih je lak&scaron;e savladati nego &scaron;to se misli. </p>

                    <p>U ovom videu zapisu, Jes&uacute;s Moreno Le&oacute;n, nastavnik informatike i istraživač iz &Scaron;panije objasniće vam kako možete razviti ove i druge vje&scaron;tine kod va&scaron;ih učenika dok se zabavljate. Kako je moguće ovo postići? Kreiranjem igrice sa pitanjima i odgovorima u Skraču, najpopularnijem programskom jeziku koji se koristi u &scaron;kolama &scaron;irom svijeta. Skrač ne samo da pospje&scaron;uje računarsko mi&scaron;ljenje, već i omogućava uno&scaron;enje elemenata igre u učionicu kako bi va&scaron;i učenici ostali motivisani dok uče i zabavljaju se.</p>

                    <p>Pogledajte video zapis kako biste saznali odakle da krenete:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Preuzmite video zapis.</a></p>

                    <h2>Da li ste spremni podijeliti sa svojim učenicima ono &scaron;to ste naučili?</h2>

                    <p>Odaberite jedan plan časa i organizujte aktivnost sa va&scaron;im učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Aktivnost 1 &ndash; Igra pitanja i odgovora u Skraču za osnovnu &scaron;kolu </a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Aktivnost 1 &ndash; Igra pitanja i odgovora u Skraču za nižu srednju &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Aktivnost 3 &ndash; Igra pitanja i odgovora u Skraču za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection