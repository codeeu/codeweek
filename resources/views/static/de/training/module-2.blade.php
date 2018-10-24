@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Rechnergest&uuml;tztes Denken und Probleml&ouml;sung</h1><span>von Miles Berry</span></div>

                    <hr>

                    <p>Rechnergest&uuml;tztes Denken bezeichnet eine Methode zur Betrachtung von Problemen und Systemen, f&uuml;r deren L&ouml;sung oder Verst&auml;ndnis ein Computer verwendet werden kann. Rechnergest&uuml;tztes Denken ist nicht nur f&uuml;r die Entwicklung von Computerprogrammen essenziell, sondern kann auch disziplinen&uuml;bergreifend zur Unterst&uuml;tzung der Probleml&ouml;sung genutzt werden.</p>

                    <p>Sie k&ouml;nnen Ihren Sch&uuml;lerinnen und Sch&uuml;lern rechnergest&uuml;tztes Denken beibringen, indem Sie sie komplexe Probleme in kleinere Probleme zerlegen lassen (Dekomposition), um Muster zu erkennen (Mustererkennung), um die relevanten Details f&uuml;r die Probleml&ouml;sung zu identifizieren (Abstraktion); oder indem Sie Regeln oder Befehle vorgeben, die zum Erreichen eines bestimmten Wunschergebnisses (Algorithmusdesign) befolgt werden sollen. Rechnergest&uuml;tztes Denken kann in verschiedenen Disziplinen gelehrt werden, z.&nbsp;B. in der Mathematik (zur Erkennung der Regeln f&uuml;r die Faktorisierung von Polynomen zweiter Ordnung), in der Literatur (zur Aufschl&uuml;sselung von Gedichten f&uuml;r die Analyse von Metrik, Reim und Struktur), in der Linguistik (zur Erkennung von Mustern in den Endungen eines Verbs, die sich auf dessen Buchstabierung aufgrund einer &Auml;nderung der Zeitform auswirken) und in vielen anderen Bereichen.</p>

                    <p>In diesem Video stellt Miles Berry, Studienleiter an der University of Roehampton School of Education in Guildford (Vereinigtes K&ouml;nigreich) das Konzept des rechnergest&uuml;tzten Denkens und die unterschiedlichen M&ouml;glichkeiten f&uuml;r Lehrkr&auml;fte zur Einbindung des Konzepts in das Klassenzimmer &uuml;ber einfache Spiele vor.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Das Video-Script herunterladen</a></p>

                    <h2>M&ouml;chten Sie Ihre Erfahrungen mit Ihren Sch&uuml;lerinnen und Sch&uuml;lern teilen?</h2>

                    <p>W&auml;hlen Sie einen der Unterrichtspl&auml;ne unten aus und organisieren Sie mit Ihren Sch&uuml;lerinnen und Sch&uuml;lern eine Aktivit&auml;t.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Aktivit&auml;t 1 &ndash; Die Entwicklung mathematischer Schlussfolgerungen f&uuml;r die Grundschule</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Aktivit&auml;t 2 &ndash; Einf&uuml;hrung in Algorithmen f&uuml;r die Unterstufe einer weiterf&uuml;hrenden Schule</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Aktivit&auml;t 3 &ndash; Algorithmen f&uuml;r die Oberstufe einer weiterf&uuml;hrenden Schule</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection