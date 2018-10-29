@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programmieren ohne Computer</h1><span>von Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Das Programmieren ist die Sprache der Dinge, die es uns erm&ouml;glicht, Programme zu schreiben, um f&uuml;r die vielen Milliarden programmierbarer Objekte in unserer Umgebung neue Funktionen hinzuzuf&uuml;gen. Das Programmieren ist die schnellste Methode zur Verwirklichung unserer Ideen und die effektivste Methode zur Entwicklung von Fertigkeiten im rechnergest&uuml;tzten Denken. Doch die Technologie ist nicht zwingend auf die Entwicklung des rechnergest&uuml;tzten Denkens angewiesen. Unsere F&auml;higkeiten im rechnergest&uuml;tzten Denken sind von grundlegender Bedeutung, damit die Technologie funktioniert.</p>

                    <p>In diesem Video stellt Ihnen Alessandro Bogliolo, Professor f&uuml;r Computersysteme in Italien und Koordinator der Europe Code Week, Programmiert&auml;tigkeiten vor, die ohne irgend ein elektronisches Ger&auml;t ge&uuml;bt werden k&ouml;nnen. Das oberste Ziel von Aktivit&auml;ten ohne Computer ist die Senkung von Zugangshindernissen, um an jeder Schule &ndash; unabh&auml;ngig von Finanzmitteln und Ausr&uuml;stung &ndash; das Programmieren einzuf&uuml;hren.</p>

                    <p>Programmiert&auml;tigkeiten ohne Computer enth&uuml;llen die rechnerischen Aspekte unserer Umwelt.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Das Video-Script herunterladen</a></p>

                    <h2>M&ouml;chten Sie Ihre Erfahrungen mit Ihren Sch&uuml;lerinnen und Sch&uuml;lern teilen?</h2>

                    <p>W&auml;hlen Sie einen der Unterrichtspl&auml;ne unten aus und organisieren Sie mit Ihren Sch&uuml;lerinnen und Sch&uuml;lern eine Aktivit&auml;t.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Aktivit&auml;t 1 &ndash; CodyRoby f&uuml;r die Grundschule</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Aktivit&auml;t 2 &ndash; CodyRoby f&uuml;r die Unterstufe einer weiterf&uuml;hrenden Schule</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Aktivit&auml;t 3 &ndash; CodyRoby f&uuml;r eine weiterf&uuml;hrende Schule</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection