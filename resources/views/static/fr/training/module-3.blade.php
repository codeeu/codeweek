@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programmation visuelle &ndash; Pr&eacute;sentation de Scratch</h1><span>par Margo Tinawi</span></div>

                    <hr>

                    <p>La programmation visuelle permet de d&eacute;crire les processus &agrave; l&rsquo;aide d&rsquo;illustrations ou de graphiques. On parle habituellement de programmation visuelle par opposition &agrave; la  programmation textuelle. Les langages de programmation visuels (VPL) sont particuli&egrave;rement bien adapt&eacute;s pour initier les enfants (et m&ecirc;me les adultes) &agrave; la pens&eacute;e algorithmique. Avec les VPL, il y a moins &agrave; lire et rien &agrave; &eacute;crire.</p>

                    <p>Dans cette vid&eacute;o, Margo Tinawi, professeur de d&eacute;veloppement web chez Le Wagon et co-fondatrice de Techies Lab asbl (Belgique), vous fera d&eacute;couvrir Scratch, un des VPL les plus utilis&eacute;s dans le monde. D&eacute;velopp&eacute; par le MIT en 2002, Scratch dispose aujourd&rsquo;hui d'une vaste communaut&eacute; o&ugrave; vous trouverez une pl&eacute;thore de projets &agrave; reproduire avec vos &eacute;l&egrave;ves ainsi que d&rsquo;innombrables tutoriels disponibles en plusieurs langues.</p>

                    <p>Aucune exp&eacute;rience pr&eacute;alable en mati&egrave;re de programmation n&rsquo;est requise pour utiliser Scratch, et vous pouvez l&rsquo;utiliser pour toutes les mati&egrave;res! En tant qu&rsquo;outil de narration num&eacute;rique, Scratch permet aux &eacute;l&egrave;ves de cr&eacute;er des histoires, d&rsquo;illustrer un probl&egrave;me math&eacute;matique ou de participer &agrave; un concours d&rsquo;art pour en apprendre davantage sur le patrimoine culturel, tout en s&rsquo;initiant au codage et au raisonnement informatique, et surtout, tout en s&rsquo;amusant.</p>

                    <p>Scratch est un outil gratuit, tr&egrave;s intuitif et motivant pour vos &eacute;l&egrave;ves. Jetez un coup d&rsquo;&oelig;il &agrave; la vid&eacute;o de Margo pour savoir comment d&eacute;marrer.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">T&eacute;l&eacute;charger le script vid&eacute;o</a></p>

                    <h2>Pr&ecirc;t &agrave; partager vos connaissances avec vos &eacute;l&egrave;ves?</h2>

                    <p>Choisissez un des plans de cours ci-dessous et organisez une activit&eacute; avec vos &eacute;l&egrave;ves.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Activit&eacute; 1 &ndash; Scratch Basic pour le primaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Activit&eacute; 2 &ndash; Scratch Basic pour le premier cycle du secondaire</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Activit&eacute; 3 &ndash; Scratch Basic pour le secondaire</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection