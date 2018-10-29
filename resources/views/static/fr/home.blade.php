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
                            <p data-caption-animate="fadeInUp" data-caption-delay="200"><a
                                        href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a></p>
                        </div>
                    </div>
                </div>
            </div><a href="#" data-scrollto="#section-codeweek" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a></div>


    </div><!-- Page Sub Menu --><div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title">CodeWeek <span>EU</span></div>

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

                        <p>La Semaine europ&eacute;enne du code est une initiative citoyenne qui vise &agrave; apprendre la programmation et l&rsquo;alphab&eacute;tisation num&eacute;rique &agrave; tous de mani&egrave;re amusante et attrayante.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Quand?</h4>
                        </div>

                        <p>6-21&nbsp;octobre&nbsp;2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Pourquoi?</h4>
                        </div>

                        <p>Apprendre la programmation nous aide &agrave; comprendre le monde en mutation rapide qui nous entoure ainsi que le fonctionnement de la technologie, et &agrave; d&eacute;velopper des comp&eacute;tences et des aptitudes afin d&rsquo;&eacute;tudier de nouvelles id&eacute;es et d&rsquo;innover.</p>



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

                        <p>Faites partie de la Semaine du code en organisant une activit&eacute;. Faites la diff&eacute;rence en inspirant et en motivant les autres.</p>

                        <p>Tout le monde est invit&eacute; &agrave; organiser une activit&eacute;. Choisissez simplement un th&egrave;me et un public cible et <a
                                    href="/add">ajoutez votre activit&eacute;</a> &agrave; <a
                                    href="/events">la carte</a>. Vous pouvez m&ecirc;me utiliser notre <a
                                    href="/guide">bo&icirc;te &agrave; outils pour organisateurs</a> pour d&eacute;buter.</p>

                        <p>Si vous avez besoin d&rsquo;aide ou que vous avez une question, vous pouvez contacter des <a
                                    href="/ambassadors">ambassadeurs Code Week de l&rsquo;UE</a> dans votre pays.</p><a href="/events" class="button button-border button-rounded button-large">Devenir organisateur</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Rejoindre une activit&eacute;</h4>
                        </div>

                        <p>La programmation est &agrave; la port&eacute;e de tout le monde. Essayez quelque chose de nouveau et d&eacute;couvrez l&rsquo;aspect amusant de la programmation en rejoignant <a
                                    href="/events">une activit&eacute; pr&egrave;s de chez vous</a>.</p>

                        <p>Il existe de nombreux &eacute;v&eacute;nements pour tous les &acirc;ges ainsi qu&rsquo;une vari&eacute;t&eacute; de th&egrave;mes. La participation est gratuite et aucune condition n&rsquo;est requise.</p>

                        <p>Il existe &eacute;galement une <a href="/resources/">liste de ressources</a> pour vous aider &agrave; d&eacute;buter la programmation en ligne maintenant.</p><a href="/events" class="button button-border button-rounded button-large">Chercher une activit&eacute;</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Passer le mot</h4>
                        </div>

                        <p>Servez la cause en <a href="http://blog.codeweek.eu">passant le mot</a> afin que davantage de personnes puissent avoir connaissance de la Semaine du code. Si vous connaissez des personnes d&eacute;sireuses d&rsquo;organiser un &eacute;v&eacute;nement, informez-les de la Semaine du code.</p>

                        <p>Vous avez une histoire inspirante &agrave; partager? <a href="http://blog.codeweek.eu/submit">Publiez-la sur notre blog</a> et nous la partagerons.</p>

                        <p>Nous sommes sur Twitter sous le nom <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> et sur <a
                                    href="https://www.facebook.com/codeEU">Facebook</a>, et nous utilisons le hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Voir ce qu&rsquo;il se passe</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partenaires et sponsors</h2><span>Aidez-nous &agrave; &eacute;tendre la port&eacute;e et l&rsquo;impact de la Semaine du code</span><p>La Semaine du code est une initiative citoyenne men&eacute;e par des b&eacute;n&eacute;voles qui touche des centaines de milliers de personnes dans le monde. Nous cherchons constamment des partenaires et des sponsors pour nous aider &agrave; nous d&eacute;velopper. Si vous souhaitez faire partie de notre communaut&eacute; et parrainer nos activit&eacute;s, veuillez nous contacter.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Contact</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Contactez-nous</h2><span>Vous avez d&rsquo;autres questions? <a href="mailto:info@codeweek.eu">&Eacute;crivez-nous</a> simplement.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection