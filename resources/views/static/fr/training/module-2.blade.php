@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Raisonnement informatique et r&eacute;solution des probl&egrave;mes</h1><span>par Miles Berry</span></div>

                    <hr>

                    <p>Le raisonnement informatique (CT &ndash; computational thinking) correspond &agrave; une fa&ccedil;on de r&eacute;soudre et de comprendre les probl&egrave;mes et les syst&egrave;mes avec l&rsquo;aide de la technologie informatique. Le raisonnement informatique est non seulement essentiel au d&eacute;veloppement de programmes informatiques, mais il peut &eacute;galement &ecirc;tre utilis&eacute; pour contribuer &agrave; la r&eacute;solution de probl&egrave;mes dans toutes les disciplines.</p>

                    <p>Vous pouvez enseigner le CT &agrave; vos &eacute;l&egrave;ves en leur demandant de d&eacute;composer des probl&egrave;mes complexes en probl&egrave;mes plus petits (d&eacute;composition), de reconna&icirc;tre des mod&egrave;les (ou sch&eacute;mas), d&rsquo;identifier les d&eacute;tails pertinents pour r&eacute;soudre un probl&egrave;me (abstraction) ou de d&eacute;finir les r&egrave;gles ou instructions &agrave; suivre pour atteindre un r&eacute;sultat souhait&eacute; (conception d&rsquo;algorithmes). Le CT peut &ecirc;tre enseign&eacute; dans diff&eacute;rentes disciplines, notamment en math&eacute;matiques (d&eacute;terminer les r&egrave;gles de factorisation des polyn&ocirc;mes du second degr&eacute;), en litt&eacute;rature (d&eacute;composer l&rsquo;analyse d&rsquo;un po&egrave;me en analyse des m&egrave;tres, des rimes et de la structure), en langues (d&eacute;gager des mod&egrave;les d&rsquo;orthographe pour les terminaisons verbales en fonction des temps utilis&eacute;s) et bien d&rsquo;autres encore.</p>

                    <p>Dans cette vid&eacute;o, Miles Berry, ma&icirc;tre de conf&eacute;rences &agrave; l&rsquo;&Eacute;cole normale de l&rsquo;Universit&eacute; de Roehampton &agrave; Guildford (Royaume-Uni), pr&eacute;sente le concept du raisonnement informatique et les diff&eacute;rentes fa&ccedil;ons dont un enseignant peut l&rsquo;int&eacute;grer en classe &agrave; l&rsquo;aide de jeux simples.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">T&eacute;l&eacute;charger le script vid&eacute;o</a></p>

                    <h2>Pr&ecirc;t &agrave; partager vos connaissances avec vos &eacute;l&egrave;ves?</h2>

                    <p>Choisissez un des plans de cours ci-dessous et organisez une activit&eacute; avec vos &eacute;l&egrave;ves.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Activit&eacute; 1 &ndash; D&eacute;velopper le raisonnement math&eacute;matique pour le primaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Activit&eacute; 2 &ndash; Se familiariser avec les algorithmes pour le premier cycle du secondaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Activit&eacute; 3 &ndash; Les algorithmes pour le secondaire sup&eacute;rieur</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection