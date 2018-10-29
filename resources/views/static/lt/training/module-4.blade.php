@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Edukacinių žaidimų kūrimas su &bdquo;Scratch&ldquo;</h1><span>Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kritinis mąstymas, atkaklumas, problemų sprendimas, skaitmeninis mąstymas ir kūrybi&scaron;kumas yra tik keli įgūdžiai, kurių reikia, kad jūsų mokiniai sulauktų sėkmės XXI&nbsp;a. O programavimas gali smagiai ir motyvuojančiai padėti ugdyti &scaron;iuo įgūdžius.</p>

                    <p>Algoritminės sąvokos, kaip antai srauto valdymas naudojant instrukcijų ir kilpų sekas, duomenų pateikimas naudojant kintamuosius ir sąra&scaron;us arba procesų sinchronizavimas, gali skambėti sudėtingai, tačiau i&scaron; &scaron;io vaizdo įra&scaron;o sužinosite, kad jas i&scaron;mokti yra lengviau nei manote.</p>

                    <p>&Scaron;iame vaizdo įra&scaron;e informatikos mokytojas ir tyrėjas i&scaron; Ispanijos Jes&uacute;s Moreno Le&oacute;n paai&scaron;kins, kaip smagiai ugdyti &scaron;iuos ir kitus mokinių įgūdžius. Kaip tai padaryti? Sukurkite klausimų ir atsakymų žaidimą &bdquo;Scratch&ldquo;&nbsp;&ndash; populiariausia programavimo kalba, naudojama viso pasaulio mokyklose. &bdquo;Scratch&ldquo; ne tik stiprina skaitmeninį mąstymą, bet ir leidžia klasėje pristatyti žaidimizacijos elementus, kad mokydamiesi ir linksmai leisdami laiką mokiniai neprarastų motyvacijos.</p>

                    <p>Pasižiūrėkite vaizdo įra&scaron;ą ir sužinokite, nuo ko pradėti:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Atsisiųsti vaizdo įra&scaron;o scenarijų</a></p>

                    <h2>Ar pasiruo&scaron;ę su savo mokiniais pasidalyti tuo, ką sužinojote?</h2>

                    <p>Pasirinkite vieną i&scaron; toliau pateiktų pamokos planų ir įgyvendinkite jį su savo mokiniais.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">1&nbsp;veikla. Klausimai ir atsakymai apie žaidimą su &bdquo;Scratch&ldquo;&nbsp;&ndash; pradinės mokyklos mokiniams</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">2&nbsp;veikla. Klausimai ir atsakymai apie žaidimą su &bdquo;Scratch&ldquo;&nbsp;&ndash; jaunesnių klasių vidurinės mokyklos mokiniams</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">3&nbsp;veikla. Klausimai ir atsakymai apie žaidimą su &bdquo;Scratch&ldquo;&nbsp;&ndash; vyresnių klasių vidurinės mokyklos mokiniams</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection