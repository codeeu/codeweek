@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programmē&scaron;ana bez datoriem</h1><span>Alesandro Bodžliolo (Alessandro Bogliolo)</span></div>

                    <hr>

                    <p>Programmē&scaron;ana ir lietu valoda, kas ļauj mums rakstīt programmas, lai pie&scaron;ķirtu jaunas funkcijas desmitiem miljardu programmējamu priek&scaron;metu, kas ir ap mums. Programmē&scaron;ana ir ātrākais veids, kā īstenot mūsu idejas, un efektīvākais veids, kas ļauj attīstīt skaitļo&scaron;anas tipa domā&scaron;anas spējas. Tomēr skaitļo&scaron;anas tipa domā&scaron;anas attīstī&scaron;anai ne vienmēr ir nepiecie&scaron;ama tehnoloģija. Turpretī mūsu skaitļo&scaron;anas tipa domā&scaron;anas prasmes ir būtiskas, lai nodro&scaron;inātu tehnoloģijas darbību.</p>

                    <p>&Scaron;ajā video Alesandro Bodžliolo, kur&scaron; ir profesors datorsistēmu jomā Itālijā un Eiropas programmē&scaron;anas nedēļas koordinators, iepazīstinās ar programmē&scaron;anu bez datora, ko var apgūt, neizmantojot nekādas elektroniskas ierīces. Galvenais &scaron;ādas programmē&scaron;anas mērķis ir nodro&scaron;ināt to, lai neatkarīgi no pieejamā finansējuma un aprīkojuma programmē&scaron;anu var mācīt ikvienā skolā.</p>

                    <p>Programmē&scaron;anas nodarbības bez datora atklāj dalībniekiem apkārtējās pasaules skaitļo&scaron;anas aspektus.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Lejupielādēt video skriptu</a></p>

                    <h2>Vai esat gatavs dalīties ar iegūtajām zinā&scaron;anām ar saviem skolēniem?</h2>

                    <p>Izvēlieties vienu no tālāk sniegtajiem mācību stundu plāniem un noorganizējiet nodarbību saviem skolēniem.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">1.&nbsp;nodarbība&nbsp;&mdash; CodyRoby sākumskolai</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">2.&nbsp;nodarbība&nbsp;&mdash; CodyRoby pamatskolai</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">3.&nbsp;nodarbība&nbsp;&mdash; CodyRoby vidusskolai</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection