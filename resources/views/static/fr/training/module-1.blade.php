@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Coder sans ordinateur (hors ligne)</h1><span>par Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Le code, c&rsquo;est le langage des objets qui nous permet d&rsquo;&eacute;crire des programmes pour donner de nouvelles fonctionnalit&eacute;s aux dizaines de milliards d&rsquo;objets programmables qui nous entourent. Le code, c&rsquo;est la fa&ccedil;on la plus rapide de donner vie &agrave; ses id&eacute;es et le moyen le plus efficace de perfectionner ses comp&eacute;tences en raisonnement informatique. Cela dit, la technologie n&rsquo;est pas vraiment n&eacute;cessaire pour d&eacute;velopper un raisonnement informatique. C&rsquo;est m&ecirc;me plut&ocirc;t l&rsquo;inverse: ce sont les comp&eacute;tences en raisonnement informatique qui sont essentielles pour faire fonctionner la technologie.</p>

                    <p>Dans cette vid&eacute;o, Alessandro Bogliolo, professeur en syst&egrave;mes informatiques en Italie et coordinateur de la Semaine europ&eacute;enne du code, pr&eacute;sente des activit&eacute;s de programmation hors ligne r&eacute;alisables sans disposer d&rsquo;appareil &eacute;lectronique. L&rsquo;objectif principal de ces activit&eacute;s hors ligne est de lever les barri&egrave;res &agrave; l'acc&egrave;s au codage afin de l'amener dans toutes les &eacute;coles, ind&eacute;pendamment du financement et de l&rsquo;&eacute;quipement dont elles disposent.</p>

                    <p>Les activit&eacute;s de codage hors ligne l&egrave;vent le voile sur les aspects informatiques du monde physique qui nous entoure.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">T&eacute;l&eacute;charger le script vid&eacute;o</a></p>

                    <h2>Pr&ecirc;t &agrave; partager vos connaissances avec vos &eacute;l&egrave;ves?</h2>

                    <p>Choisissez un des plans de cours ci-dessous et organisez une activit&eacute; avec vos &eacute;l&egrave;ves.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Activit&eacute; 1 &ndash; CodyRoby pour le primaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Activit&eacute; 2 &ndash; CodyRoby pour le premier cycle du secondaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Activit&eacute; 3 &ndash; CodyRoby pour le secondaire</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection