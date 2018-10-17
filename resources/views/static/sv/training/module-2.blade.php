@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Datalogiskt t&auml;nkande och probleml&ouml;sning</h1><span>med Miles Berry</span></div>

                    <hr>

                    <p>Datalogiskt t&auml;nkande beskriver ett s&auml;tt att se p&aring; problem och system s&aring; att en dator kan hj&auml;lpa oss att l&ouml;sa eller f&ouml;rst&aring; dem. Datalogiskt t&auml;nkande &auml;r inte bara viktigt f&ouml;r utveckling av datorprogram, det kan ocks&aring; anv&auml;ndas vid probleml&ouml;sning inom alla discipliner.</p>

                    <p>Du kan l&auml;ra ut datalogiskt t&auml;nkande till dina elever genom att f&aring; dem att bryta ned komplexa problem i mindre delar (dekomposition), k&auml;nna igen m&ouml;nster (m&ouml;nsterigenk&auml;nning), identifiera relevanta uppgifter f&ouml;r att l&ouml;sa ett problem (abstraktion) och skapa regler eller instruktioner som ska f&ouml;ljas f&ouml;r att uppn&aring; ett visst resultat (algoritmer). Datalogiskt t&auml;nkande kan l&auml;ras ut inom olika discipliner, till exempel matematik (t&auml;nka ut reglerna f&ouml;r faktorisering av andragradspolynom), litteratur (bryta ned analysen av en dikt i meter, rim och struktur), spr&aring;k (hitta m&ouml;nster i de sista bokst&auml;verna i verb som p&aring;verkar stavningen n&auml;r tempus &auml;ndras).</p>

                    <p>I den h&auml;r filmen introducerar Miles Berry, f&ouml;rste lektor vid universitetet i Roehampton i Storbritannien, begreppet datalogiskt t&auml;nkande och hur l&auml;rare kan integrera det i klassrummet med hj&auml;lp av enkla lekar.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">H&auml;mta videoskript</a></p>

                    <h2>Vill du dela med dig av det du har l&auml;rt dig till dina elever?</h2>

                    <p>V&auml;lj en lektionsplan nedan och organisera en aktivitet med dina elever.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Aktivitet 1 &ndash; Utveckla matematiskt t&auml;nkande f&ouml;r grundskolan</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Aktivitet 2 &ndash; Introduktion till algoritmer f&ouml;r h&ouml;gstadiet och gymnasiet</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Aktivitet 3 &ndash; Algoritmer f&ouml;r gymnasiet</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection