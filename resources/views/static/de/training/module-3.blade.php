@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Visuelle Programmierung &ndash; Einf&uuml;hrung in Scratch</h1><span>von Margo Tinawi</span></div>

                    <hr>

                    <p>Durch die visuelle Programmierung k&ouml;nnen Prozesse mithilfe von Illustrationen oder Grafiken beschrieben werden. Die visuelle Programmierung ist &uuml;blicherweise als Gegenst&uuml;ck zur textbasierten Programmierung zu betrachten. Visuelle Programmiersprachen sind besonders gut daf&uuml;r geeignet, Kinder (und auch Erwachsene) in das algorithmische Denken einzuf&uuml;hren. Mit visuellen Programmiersprachen muss weniger gelesen und weniger Syntax implementiert werden.</p>

                    <p>In diesem Video hilft Ihnen Margo Tinawi, Web Development Teacher bei Le Wagon und Mitbegr&uuml;nderin von Techies Lab asbl (Belgien) bei der Entdeckung von Scratch, eine der beliebtesten Programmiersprachen, die auf der ganzen Welt Verwendung findet. Scratch wurde im Jahr 2002 vom MIT entwickelt und seitdem ist eine gro&szlig;e Community um die Programmiersprache entstanden, die zahlreiche Tutorials in mehreren Sprachen und Millionen von Projekten bietet, die Sie mit Ihren Sch&uuml;lerinnen und Sch&uuml;lern nachbilden k&ouml;nnen.</p>

                    <p>Zur Verwendung von Scratch ist keine Programmiererfahrung erforderlich und Sie k&ouml;nnen die Programmiersprache f&uuml;r viele verschiedene F&auml;cher verwenden. Durch die Verwendung von Scratch als digitales Storytelling-Tool k&ouml;nnen Sch&uuml;lerinnen und Sch&uuml;ler Geschichten entwerfen, ein Matheproblem veranschaulichen oder an einem Kunstwettbewerb teilnehmen, um etwas &uuml;ber das kulturelle Erbe zu erfahren und w&auml;hrenddessen Programmieren und rechnergest&uuml;tztes Denken zu erlernen, und &ndash; was am wichtigsten ist &ndash; dabei auch noch Spa&szlig; zu haben.</p>

                    <p>Scratch ist ein kostenloses Tool, sehr intuitiv und motivierend f&uuml;r Ihre Sch&uuml;ler. Schauen Sie sich das Video von Margo an, um zu erfahren, wie Sie loslegen k&ouml;nnen:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Das Video-Script herunterladen</a></p>

                    <h2>M&ouml;chten Sie Ihre Erfahrungen mit Ihren Sch&uuml;lerinnen und Sch&uuml;lern teilen?</h2>

                    <p>W&auml;hlen Sie einen der Unterrichtspl&auml;ne unten aus und organisieren Sie mit Ihren Sch&uuml;lerinnen und Sch&uuml;lern eine Aktivit&auml;t.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Aktivit&auml;t 1 &ndash; Scratch Grundlagen f&uuml;r die Grundschule</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Aktivit&auml;t 2 &ndash; Scratch Grundlagen f&uuml;r die Unterstufe einer weiterf&uuml;hrenden Schule</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Aktivit&auml;t 3 &ndash; Scratch Grundlagen f&uuml;r eine weiterf&uuml;hrende Schule</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection