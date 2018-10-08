@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Visuell programmering &ndash; Introduktion till Scratch</h1><span>med Margo Tinawi</span></div>

                    <hr>

                    <p>Med visuell programmering kan m&auml;nniskor beskriva processer med illustrationer eller grafik. Vi talar vanligtvis om visuell programmering i motsats till textbaserad programmering. Visuella programmeringsspr&aring;k (VPL) &auml;r s&auml;rskilt l&auml;mpliga f&ouml;r att introducera algoritmiskt t&auml;nkande f&ouml;r barn (och vuxna). Med VPL blir det mindre att l&auml;sa och det finns ingen syntax som ska implementeras.</p>

                    <p>Margo Tinawi, som &auml;r webbutvecklingsl&auml;rare p&aring; Le Wagon och medgrundare av Techies Lab asbl (Belgien), ber&auml;ttar i den h&auml;r filmen om Scratch, ett av de mest popul&auml;ra VPL-spr&aring;ken som anv&auml;nds &ouml;ver hela v&auml;rlden. Scratch utvecklades av MIT 2002 och sedan dess har en stor gemenskap skapats runt det, vilket inneb&auml;r att du kan hitta miljontals projekt att g&ouml;ra med dina elever och m&auml;ngder med handledningar p&aring; olika spr&aring;k.</p>

                    <p>Du beh&ouml;ver inte ha n&aring;gon programmeringserfarenhet f&ouml;r att anv&auml;nda Scratch och det kan anv&auml;ndas inom olika &auml;mnen! Du kan till exempel anv&auml;nda Scratch som ett digitalt verktyg f&ouml;r att ber&auml;tta en historia, illustrera ett matematikproblem eller ordna en konstt&auml;vling om kulturarv samtidigt som eleverna l&auml;r sig kodning, datalogiskt t&auml;nkande och, viktigast av allt, har roligt.</p>

                    <p>Scratch &auml;r ett kostnadsfritt verktyg som &auml;r mycket intuitivt och motiverande f&ouml;r eleverna. Titta p&aring; Margos film om du vill veta hur det g&aring;r till.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">H&auml;mta videoskript</a></p>

                    <h2>Vill du dela med dig av det du har l&auml;rt dig till dina elever?</h2>

                    <p>V&auml;lj en lektionsplan nedan och organisera en aktivitet med dina elever.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Aktivitet 1 &ndash; Scratch Basic f&ouml;r grundskolan</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Aktivitet 2 &ndash; Scratch Basic f&ouml;r h&ouml;gstadiet och gymnasiet</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Aktivitet 3 &ndash; Scratch Basic f&ouml;r gymnasiet</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection