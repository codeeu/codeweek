@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Vizuālā programmē&scaron;ana&nbsp;&mdash; iepazīstinā&scaron;ana ar Scratch</h1><span>Margo Tinavi (Margo Tinawi)</span></div>

                    <hr>

                    <p>Vizuālā programmē&scaron;ana ļauj cilvēkiem aprakstīt procesus, izmantojot ilustrācijas jeb grafiku. Mēs parasti runājam par vizuālo programmē&scaron;anu pretstatā tekstuālajai programmē&scaron;anai. Vizuālās programmē&scaron;anas valodas (VPV) ir īpa&scaron;i labi piemērotas, lai bērnus (un arī pieaugu&scaron;os) iepazīstinātu ar algoritmisko domā&scaron;anu. VPV ir mazāk lasāmā teksta un nav jāievēro sintakse.</p>

                    <p>&Scaron;ajā video Margo Tinavi, kura ir tīmekļa izstrādes skolotāja Le Wagon programmē&scaron;anas nometnē un Techies Lab asbl (Beļģija) līdzdibinātāja, palīdzēs jums atklāt Scratch, kas ir viena no populārākajām VPV, ko izmanto visā pasaulē. Scratch 2002.&nbsp;gadā izstrādāja Masačūsetsas Tehnoloģijas institūts, un kop&scaron; tā laika ap programmu ir izveidota liela kopiena, kurā varat atrast miljoniem projektu, ko atkārtot kopā ar saviem skolēniem, kā arī neskaitāmas rokasgrāmatas vairākās valodās.</p>

                    <p>Jums nav nepiecie&scaron;ama nekāda programmē&scaron;anas pieredze, lai izmantotu Scratch, un jūs to varat izmantot visdažādākajos projektos. Piemēram, izmantojot Scratch kā digitālu stāstu stāstī&scaron;anas rīku, skolēni var radīt stāstus, ilustrēt matemātisku problēmu vai spēlēt mākslas viktorīnas, lai uzzinātu vairāk par kultūras mantojumu, vienlaikus apgūstot programmē&scaron;anu un skaitļo&scaron;anas tipa domā&scaron;anu un darot to interesanti (kas ir pats galvenais).</p>

                    <p>Scratch ir bezmaksas rīks, kas ir ļoti intuitīvs un motivējo&scaron;s skolēniem. Noskatieties Margo sagatavoto video, lai uzzinātu, ar ko sākt:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Lejupielādēt video skriptu</a></p>

                    <h2>Vai esat gatavs dalīties ar iegūtajām zinā&scaron;anām ar saviem skolēniem?</h2>

                    <p>Izvēlieties vienu no tālāk sniegtajiem mācību stundu plāniem un noorganizējiet nodarbību saviem skolēniem.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">1.&nbsp;nodarbība&nbsp;&mdash; Scratch pamati sākumskolai</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">2.&nbsp;nodarbība&nbsp;&mdash; Scratch pamati pamatskolai</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">3.&nbsp;nodarbība&nbsp;&mdash; Scratch pamati vidusskolai</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection