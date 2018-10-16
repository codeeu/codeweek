@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Kodning uden computere (»unplugged«)</h1><span>af Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Kodning er tingenes sprog og giver os mulighed for at skrive programmer, der giver nye funktioner til de milliarder af programmerbare genstande, der omgiver os. Kodning er den hurtigste m&aring;de at g&oslash;re sine id&eacute;er til virkelighed og den mest effektive m&aring;de at l&aelig;re datalogisk t&aelig;nkning. Det er dog ikke strengt n&oslash;dvendigt med teknologi, hvis man vil l&aelig;re datalogisk t&aelig;nkning. Man kan n&aelig;rmere sige, at datalogisk t&aelig;nkning er grundlaget for at f&aring; teknologien til at virke.</p>

                    <p>I denne video introducerer Alessandro Bogliolo, professor i computersystemer i Italien og koordinator for den europ&aelig;iske kodeuge, kodningsaktiviteter, som kan udf&oslash;res uden elektroniske enheder. Hovedform&aring;let med aktiviteter uden brug af computer er at g&oslash;re kodning mere tilg&aelig;ngeligt p&aring; alle skoler, uanset &oslash;konomi og udstyr.</p>

                    <p>Kodningsaktiviteter uden brug af computer afsl&oslash;rer de computerlignende aspekter i den verden, der omgiver os.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Download videoscriptet</a></p>

                    <h2>Er du klar til at dele det, du har l&aelig;rt, med dine elever?</h2>

                    <p>V&aelig;lg en af l&aelig;replanerne nedenfor, og afhold en aktivitet med dine elever.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Aktivitet 1 &ndash; CodyRoby for indskolingen/mellemtrinnet</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Aktivitet 2 &ndash; CodyRoby for udskolingen</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Aktivitet 3 &ndash; CodyRoby for gymnasiale uddannelser</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection