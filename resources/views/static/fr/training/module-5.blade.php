@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>La robotique et le bricolage en classe</h1><span>par Tullia Urschitz</span></div>

                    <hr>

                    <p>L&rsquo;int&eacute;gration dans les programmes scolaires du codage, du bricolage, de la robotique et de la micro&eacute;lectronique comme outils d&rsquo;enseignement et d&rsquo;apprentissage est essentielle &agrave; l&rsquo;enseignement du XXIe&nbsp;si&egrave;cle.</p>

                    <p>Le recours au bricolage et &agrave; la robotique dans les &eacute;coles pr&eacute;sente de nombreux avantages pour les &eacute;l&egrave;ves, car ces activit&eacute;s leur permettent de d&eacute;velopper des comp&eacute;tences cl&eacute;s telles que la r&eacute;solution de probl&egrave;mes, le travail en &eacute;quipe et la collaboration. Ces activit&eacute;s stimulent &eacute;galement la cr&eacute;ativit&eacute; et la confiance en soi des &eacute;tudiants et peuvent aider les &eacute;l&egrave;ves &agrave; faire preuve de pers&eacute;v&eacute;rance et de d&eacute;termination face aux d&eacute;fis. La robotique est &eacute;galement un domaine qui favorise l&rsquo;inclusion, car elle est facilement accessible &agrave; un large &eacute;ventail d&rsquo;&eacute;l&egrave;ves (filles et gar&ccedil;ons) aux talents et aux comp&eacute;tences vari&eacute;s, et s&rsquo;av&egrave;re b&eacute;n&eacute;fique pour les &eacute;l&egrave;ves atteints de troubles du spectre autistique.</p>

                    <p>La vid&eacute;o de Tullia Urschitz, ambassadrice italienne de Scientix et enseignante STEM &agrave; Sant&rsquo;Ambrogio Di Valpolicella, en Italie, donne des exemples pratiques sur la fa&ccedil;on d&rsquo;int&eacute;grer le bricolage et la robotique en classe, transformant ainsi des &eacute;l&egrave;ves passifs en cr&eacute;ateurs enthousiastes.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">T&eacute;l&eacute;charger le script vid&eacute;o</a></p>

                    <h2>Pr&ecirc;t &agrave; partager vos connaissances avec vos &eacute;l&egrave;ves?</h2>

                    <p>Choisissez un des plans de cours ci-dessous et organisez une activit&eacute; avec vos &eacute;l&egrave;ves.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Activit&eacute; 1 - Comment fabriquer une main m&eacute;canique en panneaux durs pour le primaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Activit&eacute; 2 - Comment fabriquer une main m&eacute;canique ou robotis&eacute;e pour le premier cycle du secondaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Activit&eacute; 3 - Comment fabriquer une main m&eacute;canique ou robotis&eacute;e pour le secondaire</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection