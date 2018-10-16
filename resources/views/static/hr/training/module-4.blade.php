@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Izrada edukativnih igara uz Scratch</h1><span>Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kritičko razmi&scaron;ljanje, upornost, rje&scaron;avanje problema, računalno razmi&scaron;ljanje i kreativnost samo su neke od ključnih vje&scaron;tina koje su potrebne va&scaron;im učenicima kako bi uspjeli u 21. stoljeću. Programiranje vam može pomoći da ih steknete na zabavan i motivirajući način.</p>

                    <p>Algoritamski pojmovi kontrole toka primjenom sljedova uputa i petlji, prikaz podataka s pomoću varijabli i popisa ili sinkronizacija procesa mogu zvučati poput kompliciranih koncepata, no u ovom ćete videozapisu otkriti da ih je zapravo lak&scaron;e naučiti nego &scaron;to mislite.</p>

                    <p>U ovom će videozapisu Jes&uacute;s Moreno Le&oacute;n, nastavnik informatike i istraživač iz &Scaron;panjolske, objasniti kako kod svojih učenika možete razviti ove i druge vje&scaron;tine i pritom se zabavljati. Kako je to izvedivo? Zahvaljujući igri pitanja i odgovora osmi&scaron;ljenoj u Scratchu, najpopularnijem programskom jeziku koji se upotrebljava u &scaron;kolama diljem svijeta. Scratch pobolj&scaron;ava računalno razmi&scaron;ljanje, ali omogućuje i uvođenje elemenata igrifikacije u učionicu kako bi va&scaron;i učenici ostali motivirani dok uče i zabavljaju se.</p>

                    <p>Pogledajte videozapis i naučite kako početi:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Preuzmite videoskriptu</a></p>

                    <h2>Jeste li spremni podijeliti naučeno sa svojim učenicima?</h2>

                    <p>Odaberite jedan od nastavnih planova u nastavku i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">1. aktivnost &ndash; Igra pitanja i odgovora uz jezik Scratch za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">2. aktivnost &ndash; Igra pitanja i odgovora uz jezik Scratch za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">3. aktivnost &ndash; Igra pitanja i odgovora uz jezik Scratch za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection