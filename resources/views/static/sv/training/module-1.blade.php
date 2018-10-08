@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Kodning utan datorer (fr&aring;nkopplad)</h1><span>med Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Kod &auml;r tingens spr&aring;k och med kodning kan vi skriva program som f&ouml;rser miljarder av programmerbara f&ouml;rem&aring;l runt omkring oss med nya funktioner. Kodning &auml;r det snabbaste s&auml;ttet att f&ouml;rverkliga v&aring;ra id&eacute;er och det mest effektiva s&auml;ttet att utveckla datalogiskt t&auml;nkande. Men tekniken &auml;r inte n&ouml;dv&auml;ndig f&ouml;r att utveckla datalogiskt t&auml;nkande. Det &auml;r snarare s&aring; att v&aring;r f&ouml;rm&aring;ga till datalogiskt t&auml;nkande &auml;r avg&ouml;rande f&ouml;r att tekniken ska fungera.</p>

                    <p>I den h&auml;r filmen presenterar Alessandro Bogliolo, professor i datorsystem i Italien och samordnare f&ouml;r Europe Code Week, kodningsaktiviteter som kan utf&ouml;ras utan elektroniska enheter. Huvudsyftet med de fr&aring;nkopplade aktiviteterna &auml;r att g&ouml;ra det enklare f&ouml;r alla skolor att introducera kodning, oavsett finansiering och utrustning.</p>

                    <p>Fr&aring;nkopplad kodning avsl&ouml;jar de datalogiska aspekterna av den fysiska v&auml;rlden runt omkring oss.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">H&auml;mta videoskript</a></p>

                    <h2>Vill du dela med dig av det du har l&auml;rt dig till dina elever?</h2>

                    <p>V&auml;lj en lektionsplan nedan och organisera en aktivitet med dina elever.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Aktivitet 1 &ndash; CodyRoby f&ouml;r grundskolan</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Aktivitet 2 &ndash; CodyRoby f&ouml;r h&ouml;gstadiet och gymnasiet</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Aktivitet 3 &ndash; CodyRoby f&ouml;r gymnasiet</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection