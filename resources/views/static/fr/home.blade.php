@extends('layout.base') @section('content')<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>

    <div id="slider"
         class="slider-parallax full-screen force-full-screen with-header swiper_wrapper page-section clearfix">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark" style="background-image: url('img/codeweek-2018.jpg');width: 100%;">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <div id="countdown-ex1" class="countdown countdown-large coming-soon divcenter bottommargin"
                                 style="max-width:700px;"></div>


                            <h2 data-caption-animate="fadeInUp">CODEWEEK.EU</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">du 6&nbsp;au 21&nbsp;octobre&nbsp;2018 <a
                                        href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a></p>
                        </div>
                    </div>
                </div>
            </div><a href="#" data-scrollto="#section-codeweek" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a></div>


    </div><!-- Page Sub Menu --><div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title">Codeweek <span>Europe</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Participer</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partenaires</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Contact</div></a></li>
                    </ul>
                </nav>

                <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

            </div>

        </div>

    </div><!-- #page-menu end --> <!-- Content --><section id="content">

        <div>


            <section id="section-intro" class="page-section section section-intro">

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>De quoi s&rsquo;agit-il?</h4>
                        </div>

                        <p>La Codeweek Europe est une initiative citoyenne qui vise &agrave; mettre la programmation et l'alphab&eacute;tisation num&eacute;rique &agrave; la port&eacute;e de tous, de mani&egrave;re amusante et stimulante.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Quand cela a-t-il lieu?</h4>
                        </div>

                        <p>Du 6&nbsp;au 21&nbsp;octobre&nbsp;2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Quel est l'objectif?</h4>
                        </div>

                        <p>Apprendre &agrave; programmer nous permet non seulement de mieux comprendre le monde en mutation rapide qui nous entoure et d'approfondir notre connaissance technologique, mais contribue &eacute;galement &agrave; d&eacute;velopper les comp&eacute;tences et les aptitudes n&eacute;cessaires pour innover et explorer de nouvelles id&eacute;es.</p>



                    </div>

                </div>

            </section>

            <section id="section-banner-teacher" class="section section-banner">
                <a href="/schools">
                    @include('static.banner_teacher')
                </a>
            </section>


            <section id="section-join" class="page-section section">

                <div class="heading-block center">
                    <h2>Participez!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organiser une activit&eacute;</h4>
                        </div>

                        <p>Contribuer &agrave; la Codeweek en organisant une activit&eacute;. Faites la diff&eacute;rence en inspirant et en motivant les autres.</p>

                        <p>Chacun est invit&eacute; &agrave; organiser sa propre activit&eacute;. Choisissez simplement un th&egrave;me et un public cible et <a
                                    href="/add">ajoutez votre activit&eacute;</a> sur <a
                                    href="/events">la carte</a>. Pour commencer, vous pouvez m&ecirc;me utiliser notre <a
                                    href="/guide">bo&icirc;te &agrave; outils pour les organisateurs</a>.</p>

                        <p>Si vous avez besoin d&rsquo;aide ou que vous avez une question, vous pouvez &eacute;galement contacter les <a
                                    href="/ambassadors">ambassadeurs Codeweek Europe</a> de votre pays.</p><a href="/events" class="button button-border button-rounded button-large">Devenir organisateur</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Rejoindre une activit&eacute;</h4>
                        </div>

                        <p>La programmation est &agrave; la port&eacute;e de tous. Tentez une nouvelle exp&eacute;rience et d&eacute;couvrez l&rsquo;aspect amusant de la programmation en prenant part &agrave; <a
                                    href="/events">une activit&eacute; ayant lieu pr&egrave;s de chez vous</a>.</p>

                        <p>D&eacute;couvrez les nombreux &eacute;v&eacute;nements pr&eacute;vus pour tous les &acirc;ges et la grande vari&eacute;t&eacute; des th&egrave;mes pr&eacute;sent&eacute;s. La participation est gratuite et aucune condition n&rsquo;est requise.</p>

                        <p>Il existe &eacute;galement une <a href="/resources/">liste de ressources</a> pour vous aider &agrave; d&eacute;buter la programmation en ligne maintenant.</p><a href="/events" class="button button-border button-rounded button-large">Rechercher une activit&eacute;</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Passer le mot</h4>
                        </div>

                        <p>Aidez-nous et <a href="http://blog.codeweek.eu">passez le mot</a> afin que davantage de personnes aient connaissance et participent &agrave; la Codeweek. Si vous connaissez des personnes qui pourraient souhaiter organiser un &eacute;v&eacute;nement, informez-les sur la Codeweek.</p>

                        <p>Vous avez une histoire inspirante &agrave; partager? <a href="http://blog.codeweek.eu/submit">Publiez-la sur notre blog</a> et nous la partagerons.</p>

                        <p>Retrouvez-nous sur Twitter, <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, sur <a
                                    href="https://www.facebook.com/codeEU">Facebook</a>, et sous le hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Savoir ce qu&rsquo;il se passe</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partenaires et sponsors</h2><span>Aidez-nous &agrave; &eacute;tendre la port&eacute;e et l&rsquo;impact de la Codeweek</span><p>La Codeweek est une initiative citoyenne organis&eacute;e par des b&eacute;n&eacute;voles qui concerne des centaines de milliers de personnes dans le monde. Nous sommes constamment &agrave; la recherche de partenaires et de sponsors pour nous aider &agrave; nous d&eacute;velopper. Si vous souhaitez faire partie de notre communaut&eacute; et parrainer nos activit&eacute;s, veuillez nous contacter.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Contact</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    <ul class="clients-grid grid-4 nobottommargin clearfix">
                        <li><a href="https://www.apple.com/uk/everyone-can-code/"><img src="img/partners/apple.png"
                                                                                       alt="Apple"></a></li>
                        <li><a href="http://www.techsoupeurope.org/"><img src="img/partners/techsoup.png"
                                                                          alt="Tech Soup"></a></li>
                        <li><a href="http://programamos.es"><img src="img/partners/colabora_programamos.png"
                                                                 alt="Programamos"></a></li>
                        <li><a href="http://drscratch.programamos.es"><img src="img/partners/colabora_drscratch.png"
                                                                           alt="Dr. Scratch"></a></li>
                        <li><a href="http://www.publiclibraries2020.eu"><img
                                        src="img/partners/colabora_PublicLibraries2020.png" alt="Public Libraries 2020"></a></li>
                        <li><a href="http://ec.europa.eu/digital-agenda/en/grand-coalition-digital-jobs-0"><img
                                        src="img/partners/digital-skills.png"
                                        alt="Grand Coalition for Digital Jobs"></a></li>
                        <li><a href="http://coderdojo.org"><img src="img/partners/colabora_coderdojo.png"
                                                                alt="CoderDojo"></a></li>
                        <li><a href="http://www.africacodeweek.org/"><img src="img/partners/colabora_africacodeweek.png"
                                                                          alt="Africa Code Week"></a></li>
                        <li><a href="http://www.allyouneediscode.eu/"><img src="img/partners/colabora_aynic.png"
                                                                           alt="All you need is code"></a></li>
                        <li><a href="http://www.eun.org/"><img src="img/partners/colabora_eun.png"
                                                               alt="European Schoolnet"></a></li>
                        <li><a href="http://scratch.mit.edu/codeweekeu"><img src="img/partners/colabora_scratch.png"
                                                                             alt="Scratch"></a></li>
                        <li><a href="http://www.ictinpractice.com/"><img src="img/partners/colabora_ict-in-practice.png"
                                                                         alt="ICT In Practice"></a></li>
                        <li><a href="http://www.neunet.it/"><img src="img/partners/colabora_neunet.png"
                                                                 alt="NeuNet"></a></li>
                        <li><a href="https://edu.google.com/resources/computerscience"><img
                                        src="img/partners/google.png" alt="Google"></a></li>
                        <li><a href="https://education.lego.com/en-gb/secondary/explore/c/eu-code-week"><img
                                        src="img/partners/lego.png" alt="LEGOeducation"></a></li>
                        <li><a href="http://www.sap.com/"><img src="img/partners/sap-logo.png" alt="SAP"></a></li>
                        <li><a href="http://www.stifter-helfen.de/"><img src="img/partners/stifter-helfen.png"
                                                                         alt="Stifter Helfen"></a></li>
                        <li><a href="http://eutechalliance.eu/"><img src="img/partners/eu-tech-alliance.png"
                                                                     alt="EU Tech Alliance"></a></li>


                    </ul>

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Contactez-nous</h2><span>Vous avez d&rsquo;autres questions? <a href="mailto:info@codeweek.eu">&Eacute;crivez-nous</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')<script>
        window.$(function ($) {
            var newDate = new Date(2018, 9, 6);
            $('#countdown-ex1').countdown({until: newDate});
        });
    </script>@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection