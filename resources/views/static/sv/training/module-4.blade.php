@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Skapa l&auml;rande lekar med Scratch</h1><span>med Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kritiskt t&auml;nkande, uth&aring;llighet, probleml&ouml;sning, datalogiskt t&auml;nkande och kreativitet &auml;r bara n&aring;gra av de f&auml;rdigheter som eleverna beh&ouml;ver f&ouml;r att lyckas i det tjugof&ouml;rsta &aring;rhundradet, och kodning kan hj&auml;lpa dig att l&auml;ra ut dessa p&aring; ett roligt och inspirerande s&auml;tt.</p>

                    <p>Algoritmiska begrepp om fl&ouml;deskontroll som anv&auml;nder sekvenser med instruktioner och loopar, datarepresentationer som anv&auml;nder variabler och listor eller synkronisering av processer kanske l&aring;ter som komplicerade begrepp, men i den h&auml;r videon kommer du att uppt&auml;cka att de &auml;r enklare att l&auml;ra sig &auml;n du tror.</p>

                    <p>I den h&auml;r videon f&ouml;rklarar Jes&uacute;s Moreno Le&oacute;n, l&auml;rare och forskare i datavetenskap fr&aring;n Spanien, hur du kan utveckla dessa och andra f&auml;rdigheter hos dina studenter samtidigt som ni har roligt. Hur fungerar det? Ni skapar ett fr&aring;gespel i Scratch, det popul&auml;raste programmeringsspr&aring;ket f&ouml;r skolor i hela v&auml;rlden. Scratch f&ouml;rb&auml;ttrar datalogiskt t&auml;nkande samtidigt som det inf&ouml;r inslag av spelifiering i klassrummet som g&ouml;r att eleverna &auml;r motiverade samtidigt som de l&auml;r sig och har kul.</p>

                    <p>I den h&auml;r filmen kan du se hur det g&aring;r till:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">H&auml;mta videoskript</a></p>

                    <h2>Vill du dela med dig av det du har l&auml;rt dig till dina elever?</h2>

                    <p>V&auml;lj en lektionsplan nedan och organisera en aktivitet med dina elever.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Aktivitet 1 &ndash; Fr&aring;gespel med Scratch f&ouml;r grundskolan</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Aktivitet 2 &ndash; Fr&aring;gespel med Scratch f&ouml;r h&ouml;gstadiet och gymnasiet</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Aktivitet 3 &ndash; Fr&aring;gespel med Scratch f&ouml;r gymnasiet</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection