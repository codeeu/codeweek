@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Lernspiele mit Scratch erstellen</h1><span>von Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kritisches Denken, Durchhalteverm&ouml;gen, rechnergest&uuml;tztes Denken und Kreativit&auml;t sind nur ein paar der wichtigen F&auml;higkeiten, die Ihre Sch&uuml;lerinnen und Sch&uuml;ler brauchen, um im 21.&nbsp;Jahrhundert erfolgreich zu sein. Die Programmierung kann Ihnen dabei helfen, dies auf spielerische und motivierende Weise zu erreichen.</p>

                    <p>Algorithmische Vorstellungen einer Durchflusssteuerung unter Verwendung von Befehlen und Schleifen, Datendarstellungen unter Verwendung von Variablen und Listen oder die Synchronisierung von Prozessen m&ouml;gen sich wie komplizierte Konzepte anh&ouml;ren, doch in diesem Video erfahren Sie, dass diese leichter erlernt werden k&ouml;nnen, als Sie denken.</p>

                    <p>In diesem Video erkl&auml;rt Ihnen der spanische Informatiklehrer und Forscher Jes&uacute;s Moreno Le&oacute;n wie Sie Ihren Sch&uuml;lerinnen und Sch&uuml;lern diese und weitere Kompetenzen auf unterhaltsame Weise beibringen k&ouml;nnen. Wie geht das? Durch die Erstellung eines Frage- und Antwortspiels in Scratch, der beliebtesten Programmiersprache, die an Schulen weltweit verwendet wird. Scratch verbessert nicht nur das rechnergest&uuml;tzte Denken, sondern erm&ouml;glicht auch die Einf&uuml;hrung spielerischer Elemente (Gamification) in das Klassenzimmer, damit Ihre Sch&uuml;ler motiviert bleiben, w&auml;hrend sie etwas auf unterhaltsame Weise lernen.</p>

                    <p>Schauen Sie sich das Video an, um zu erfahren, wie Sie loslegen k&ouml;nnen:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Das Video-Script herunterladen</a></p>

                    <h2>M&ouml;chten Sie Ihre Erfahrungen mit Ihren Sch&uuml;lerinnen und Sch&uuml;lern teilen?</h2>

                    <p>W&auml;hlen Sie einen der Unterrichtspl&auml;ne unten aus und organisieren Sie mit Ihren Sch&uuml;lerinnen und Sch&uuml;lern eine Aktivit&auml;t.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Aktivit&auml;t 1 &ndash; Frage- und Antwortspiel mit Scratch f&uuml;r die Grundschule</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Aktivit&auml;t 2 &ndash; Frage- und Antwortspiel mit Scratch f&uuml;r die Unterstufe einer weiterf&uuml;hrenden Schule</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Aktivit&auml;t 3 &ndash; Frage- und Antwortspiel mit Scratch f&uuml;r weiterf&uuml;hrende Schulen</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection