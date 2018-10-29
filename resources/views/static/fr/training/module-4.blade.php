@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Cr&eacute;er des jeux &eacute;ducatifs avec Scratch</h1><span>par Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>La pens&eacute;e critique, la pers&eacute;v&eacute;rance, la r&eacute;solution de probl&egrave;mes, le raisonnement informatique et la cr&eacute;ativit&eacute; ne sont que quelques-unes des comp&eacute;tences cl&eacute;s dont vos &eacute;l&egrave;ves ont besoin pour r&eacute;ussir au XXIe&nbsp;si&egrave;cle, et le codage peut les aider &agrave; les acqu&eacute;rir de mani&egrave;re ludique et motivante.</p>

                    <p>Si les notions algorithmiques du contr&ocirc;le de flux &agrave; l&rsquo;aide de s&eacute;quences d&rsquo;instructions et de boucles, de la repr&eacute;sentation de donn&eacute;es &agrave; l&rsquo;aide de variables et de listes ou de la synchronisation de processus vous semblent compliqu&eacute;es, vous vous rendrez compte, gr&acirc;ce &agrave; cette vid&eacute;o, que ces concepts sont plus faciles &agrave; ma&icirc;triser que vous ne le pensiez.</p>

                    <p>Professeur d&rsquo;informatique et chercheur espagnol, Jes&uacute;s Moreno Le&oacute;n vous explique dans cette vid&eacute;o comment d&eacute;velopper de mani&egrave;re ludique ces comp&eacute;tences, et bien d&rsquo;autres encore, chez vos &eacute;l&egrave;ves. Comment faire? En cr&eacute;ant un jeu de questions-r&eacute;ponses dans Scratch, le langage de programmation le plus utilis&eacute; dans les &eacute;coles &agrave; travers le monde. Scratch ne se contente pas seulement de stimuler le raisonnement informatique, il permet &eacute;galement d&rsquo;introduire une dimension ludique en classe afin de motiver vos &eacute;l&egrave;ves &agrave; apprendre tout en s&rsquo;amusant.</p>

                    <p>Jetez un coup d&rsquo;&oelig;il &agrave; la vid&eacute;o pour savoir comment d&eacute;marrer:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">T&eacute;l&eacute;charger le script vid&eacute;o</a></p>

                    <h2>Pr&ecirc;t &agrave; partager vos connaissances avec vos &eacute;l&egrave;ves?</h2>

                    <p>Choisissez un des plans de cours ci-dessous et organisez une activit&eacute; avec vos &eacute;l&egrave;ves.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Activit&eacute; 1 - Jeu de questions-r&eacute;ponses avec Scratch pour le primaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Activit&eacute; 2 - Jeu de questions-r&eacute;ponses avec Scratch pour le premier cycle du secondaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Activit&eacute; 3 - Jeu de questions-r&eacute;ponses avec Scratch pour le secondaire</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection