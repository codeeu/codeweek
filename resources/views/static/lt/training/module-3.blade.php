@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Vizualinis programavimas. Įvadas į &bdquo;Scratch&ldquo;</h1><span>Margo Tinawi</span></div>

                    <hr>

                    <p>Vizualinis programavimas leidžia apibūdinti procesus pasitelkiant iliustracijas arba grafiką. Paprastai kalbėdami apie vizualinį programavimą jį suprie&scaron;iname su tekstiniu programavimu. Vizualinio programavimo kalbos (VPK) yra ypač gerai pritaikytos vaikų (ir netgi suaugusiųjų) algoritminio mąstymo lavinimui. Jas naudojant yra mažiau teksto ir jokios sintaksės, kurią reikėtų įgyvendinti.</p>

                    <p>&Scaron;iame vaizdo įra&scaron;e Le Wagon žiniatinklio kūrimo mokytoja ir &bdquo;Techies Lab asbl&ldquo; (Belgija) viena i&scaron; įkūrėjų Margo Tinawi padės jums atrasti &bdquo;Scratch&ldquo;&nbsp;&ndash; vieną populiariausių VPK, kuri naudojama visame pasaulyje. Masačusetso technologijos institutas sukūrė &bdquo;Scratch&ldquo; 2002&nbsp;m., ir nuo to laiko aplink &scaron;ią kalbą kuriasi didelė bendruomenė. Čia galima rasti milijonus projektų, kuriuos galima i&scaron;bandyti su savo mokiniais, ir daugybę mokymo priemonių keliomis kalbomis.</p>

                    <p>Naudojant &bdquo;Scratch&ldquo; nereikia jokios programavimo patirties, ir ją galima pritaikyti įvairiose pamokose! Pavyzdžiui, naudodami &bdquo;Scratch&ldquo; kaip skaitmeninę pasakojimo priemonę mokiniai gali kurti istorijas, iliustruoti matematikos uždavinį ar surengti meno konkursą, kad sužinotų apie kultūros paveldą, ir taip mokytis programavimo ir skaitmeninio mąstymo, o svarbiausia&nbsp;&ndash; gerai leisti laiką.</p>

                    <p>&bdquo;Scratch&ldquo; yra nemokama priemonė, kuri veikia labai intuityviai ir motyvuoja mokinius. Pasižiūrėkite Margo vaizdo įra&scaron;ą ir sužinokite, nuo ko pradėti.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Atsisiųsti vaizdo įra&scaron;o scenarijų</a></p>

                    <h2>Ar pasiruo&scaron;ę su savo mokiniais pasidalyti tuo, ką sužinojote?</h2>

                    <p>Pasirinkite vieną i&scaron; toliau pateiktų pamokos planų ir įgyvendinkite jį su savo mokiniais.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">1&nbsp;veikla. &bdquo;Scratch&ldquo; pagrindai pradinės mokyklos mokiniams</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">2&nbsp;veikla. &bdquo;Scratch&ldquo; pagrindai jaunesnių klasių vidurinės mokyklos mokiniams</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">3&nbsp;veikla. &bdquo;Scratch&ldquo; pagrindai vyresnių klasių vidurinės mokyklos mokiniams</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection