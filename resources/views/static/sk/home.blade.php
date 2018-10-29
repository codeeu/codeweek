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

                <div class="menu-title"><span>Eur&oacute;psky</span> t&yacute;ždeň programovania</div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Zapojte sa</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partneri</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Kontakt</div></a></li>
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
                            <h4>O&nbsp;čo ide?</h4>
                        </div>

                        <p>Eur&oacute;psky t&yacute;ždeň programovania je nez&aacute;visl&aacute; iniciat&iacute;va, ktorej cieľom je pribl&iacute;žiť každ&eacute;mu programovanie a digit&aacute;lnu gramotnosť z&aacute;bavnou a p&uacute;tavou formou.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kedy?</h4>
                        </div>

                        <p>6.&nbsp;&ndash; 21.&nbsp;okt&oacute;bra 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Prečo?</h4>
                        </div>

                        <p>Keď sa nauč&iacute;me programovať, pom&ocirc;že n&aacute;m to pochopiť svet okolo n&aacute;s, ktor&yacute; sa r&yacute;chlo men&iacute;, roz&scaron;&iacute;riť si vedomosti o&nbsp;fungovan&iacute; technol&oacute;gi&iacute; a rozvin&uacute;ť si zručnosti a schopnosti, vďaka ktor&yacute;m objav&iacute;me nov&eacute; n&aacute;pady a inov&aacute;cie.</p>



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
                    <h2>Zapojte sa!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Usporiadajte aktivitu</h4>
                        </div>

                        <p>Usporiadajte aktivitu a staňte sa s&uacute;časťou T&yacute;ždňa programovania. Prispejte k&nbsp;zmene in&scaron;pirovan&iacute;m a motivovan&iacute;m ostatn&yacute;ch.</p>

                        <p>Usporiadať aktivitu m&ocirc;že ktokoľvek. Stač&iacute; si vybrať t&eacute;mu a cieľov&uacute; skupinu a <a
                                    href="/add">pridať svoju aktivitu</a> na <a
                                    href="/events">mapu</a>. M&ocirc;žete využiť aj n&aacute;&scaron; <a
                                    href="/guide">n&aacute;vod pre organiz&aacute;torov</a>, ktor&yacute; v&aacute;m pom&ocirc;že začať.</p>

                        <p>Ak potrebujete pomoc alebo m&aacute;te ot&aacute;zku, m&ocirc;žete sa obr&aacute;tiť na <a
                                    href="/ambassadors">veľvyslancov Eur&oacute;pskeho t&yacute;ždňa programovania</a> vo va&scaron;ej krajine.</p><a href="/events" class="button button-border button-rounded button-large">Staňte sa organiz&aacute;torom</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Zapojte sa do aktivity</h4>
                        </div>

                        <p>Programovanie je pre v&scaron;etk&yacute;ch. Vysk&uacute;&scaron;ajte niečo nov&eacute; a presvedčte sa, že programovanie je z&aacute;bava. Stač&iacute; sa zapojiť do <a
                                    href="/events">aktivity vo va&scaron;om okol&iacute;</a>.</p>

                        <p>V&nbsp;ponuke je množstvo podujat&iacute; pre každ&yacute; vek a na rozmanit&eacute; t&eacute;my. &Uacute;časť je bezplatn&aacute; a netreba splniť žiadne podmienky.</p>

                        <p>Zostavili sme aj <a href="/resources/">zoznam zdrojov</a>, ktor&yacute; v&aacute;m pom&ocirc;že pustiť sa do programovania online už teraz.</p><a href="/events" class="button button-border button-rounded button-large">Pozrite si aktivity</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Hovorte o&nbsp;tom</h4>
                        </div>

                        <p>Pom&ocirc;žte iniciat&iacute;ve tak, <a href="http://blog.codeweek.eu">že budete o&nbsp;nej hovoriť</a>, aby sa o&nbsp;T&yacute;ždni programovania dozvedeli ďal&scaron;&iacute; ľudia. Ak pozn&aacute;te ľud&iacute;, ktor&iacute; by boli ochotn&iacute; usporiadať podujatie, dajte im vedieť o&nbsp;T&yacute;ždni programovania.</p>

                        <p>Chcete sa podeliť o&nbsp;in&scaron;pirat&iacute;vny pr&iacute;beh? <a href="http://blog.codeweek.eu/submit">Uverejnite ho na na&scaron;om blogu</a> a my ho budeme zdieľať.</p>

                        <p>N&aacute;jdete n&aacute;s na Twitteri pod n&aacute;zvom <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, na <a
                                    href="https://www.facebook.com/codeEU">Facebooku</a> a použ&iacute;vame hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Pozrite sa, čo je nov&eacute;</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partneri a sponzori</h2><span>Pom&ocirc;žte n&aacute;m roz&scaron;&iacute;riť z&aacute;ber a vplyv T&yacute;ždňa programovania</span><p>T&yacute;ždeň programovania je nez&aacute;visl&aacute; iniciat&iacute;va dobrovoľn&iacute;kov, ktor&aacute; oslovuje stovky tis&iacute;cov ľud&iacute; na celom svete. Neust&aacute;le hľad&aacute;me partnerov a sponzorov, ktor&iacute; n&aacute;m pom&aacute;haj&uacute; r&aacute;sť. Ak chcete byť s&uacute;časťou na&scaron;ej komunity a sponzorovať na&scaron;e aktivity, kontaktujte n&aacute;s.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Ozvite sa n&aacute;m</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Ozvite sa n&aacute;m</h2><span>Ďal&scaron;ie ot&aacute;zky? <a href="mailto:info@codeweek.eu">Nap&iacute;&scaron;te n&aacute;m</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection