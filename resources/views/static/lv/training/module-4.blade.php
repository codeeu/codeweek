@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Izglītojo&scaron;u spēļu veido&scaron;ana ar Scratch</h1><span>Hesuss Moreno Leons (Jes&uacute;s Moreno Le&oacute;n)</span></div>

                    <hr>

                    <p>Kritiskā domā&scaron;ana, neatlaidība, problēmu risinā&scaron;ana, skaitļo&scaron;anas tipa domā&scaron;ana un rado&scaron;ums ir tikai dažas no būtiskajām prasmēm, kuras jūsu skolēniem ir nepiecie&scaron;amas, lai gūtu panākumus 21.&nbsp;gadsimtā, un programmē&scaron;ana var palīdzēt &scaron;īs prasmes iegūt aizraujo&scaron;ā un motivējo&scaron;ā veidā.</p>

                    <p>Tādi algoritmiski jēdzieni kā plūsmas kontrole, izmantojot instrukciju un cilpu virknes, datu attēlo&scaron;ana ar mainīgajiem un sarakstiem vai procesu sinhronizācija var izklausīties sarežģīti, bet &scaron;ajā video jūs redzēsiet, ka tos apgūt ir vieglāk, nekā domājat.</p>

                    <p>&Scaron;ajā video Spānijas datorzinību skolotājs un pētnieks Hesuss Moreno Leons paskaidros, kā jūs varat attīstīt &scaron;īs un citas savu skolēnu prasmes, vienlaikus padarot mācī&scaron;anās procesu interesantu. Kā to var izdarīt? Veidojot jautājumu un atbilžu spēli ar Scratch&nbsp;&mdash; pasaulē populārāko skolās izmantoto programmē&scaron;anas valodu. Scratch ne tikai sekmē skaitļo&scaron;anas tipa domā&scaron;anu, bet arī ļauj mācībās integrēt spēļu elementus, tādējādi motivējot skolēnus mācīties ar prieku.</p>

                    <p>Noskatieties video, lai uzzinātu, ar ko sākt:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Lejupielādēt video skriptu</a></p>

                    <h2>Vai esat gatavs dalīties ar iegūtajām zinā&scaron;anām ar saviem skolēniem?</h2>

                    <p>Izvēlieties vienu no tālāk sniegtajiem mācību stundu plāniem un noorganizējiet nodarbību saviem skolēniem.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">1.&nbsp;nodarbība&nbsp;&mdash; jautājumu un atbilžu spēle ar Scratch sākumskolai</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">2.&nbsp;nodarbība&nbsp;&mdash; jautājumu un atbilžu spēle ar Scratch pamatskolai</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">3.&nbsp;nodarbība&nbsp;&mdash; jautājumu un atbilžu spēle ar Scratch vidusskolai</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection