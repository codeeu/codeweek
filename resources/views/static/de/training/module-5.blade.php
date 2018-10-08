@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Robotik und technische T&uuml;fteleien in das Klassenzimmer integrieren</h1><span>von Tullia Urschitz</span></div>

                    <hr>

                    <p>Die Einbindung von Programmierung, technischen T&uuml;fteleien, Robotik und Mikroelektronik als Instrumente f&uuml;r die Lehre und das Lernen in die Unterrichtspl&auml;ne ist f&uuml;r die Bildung des 21.&nbsp;Jahrhunderts von entscheidender Bedeutung.</p>

                    <p>Die Verwendung von technischen T&uuml;fteleien und Robotik an Schulen hat zahlreiche Vorteile f&uuml;r Sch&uuml;lerinnen und Sch&uuml;ler, da dies die Entwicklung von Kompetenzen wie z.&nbsp;B. Probleml&ouml;sung, Teamarbeit und Zusammenarbeit f&ouml;rdert. Dies steigert zudem die Kreativit&auml;t und das Selbstvertrauen von Sch&uuml;lern und kann diese bei der Entwicklung von Durchhalteverm&ouml;gen und Entschiedenheit unterst&uuml;tzen, wenn sie mit Herausforderungen konfrontiert sind. Die Robotik ist auch ein Gebiet, das Inklusivit&auml;t f&ouml;rdert, da es ohne Weiteres einer Vielzahl von Sch&uuml;lern mit verschiedenen F&auml;higkeiten (sowohl Jungen als auch M&auml;dchen) zug&auml;nglich ist und einen positiven Einfluss auf Sch&uuml;ler des autistischen Spektrums hat.</p>

                    <p>Werfen Sie einen Blick auf dieses Video, in dem Ihnen Tullia Urschitz, italienische Scientix-Botschafterin und MINT-Lehrerin in Sant&rsquo;Ambrogio Di Valpolicella, Italien, verschiedene praktische Beispiel gibt, wie Lehrkr&auml;fte technische T&uuml;fteleien und Robotik in das Klassenzimmer integrieren k&ouml;nnen, um passive Sch&uuml;lerinnen und Sch&uuml;ler in begeisterte Macher zu verwandeln.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Das Video-Script herunterladen</a></p>

                    <h2>M&ouml;chten Sie Ihre Erfahrungen mit Ihren Sch&uuml;lern teilen?</h2>

                    <p>W&auml;hlen Sie einen der Unterrichtspl&auml;ne unten aus und organisieren Sie mit Ihren Sch&uuml;lern eine Aktivit&auml;t.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Aktivit&auml;t 1 &ndash; Wie man eine mechanische Hand aus Pressspan f&uuml;r die Grundschule herstellt</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Aktivit&auml;t 2 &ndash; Wie man eine mechanische oder robotische Hand f&uuml;r die Unterstufe einer weiterf&uuml;hrenden Schule herstellt</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Aktivit&auml;t 3 &ndash; Wie man eine mechanische oder robotische Hand f&uuml;r die Oberstufe einer weiterf&uuml;hrenden Schule herstellt</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection