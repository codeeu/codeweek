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
                        <li><a href="#section-join" data-href="#section-join"><div>Zapojte se</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partneři</div></a></li>
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
                            <h4>Co?</h4>
                        </div>

                        <p>Evropsk&yacute; t&yacute;den programov&aacute;n&iacute; je iniciativa, jej&iacute;mž c&iacute;lem je z&aacute;bavn&yacute;m a aktivn&iacute;m způsobem přibl&iacute;žit programov&aacute;n&iacute; a digit&aacute;ln&iacute; gramotnost každ&eacute;mu člověku.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kdy?</h4>
                        </div>

                        <p>6.&ndash;21. ř&iacute;jna 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Proč?</h4>
                        </div>

                        <p>Naučit se programovat n&aacute;m pom&aacute;h&aacute; ch&aacute;pat rychle se měn&iacute;c&iacute; svět kolem n&aacute;s, l&eacute;pe rozumět tomu, jak funguj&iacute; technologie, rozv&iacute;jet dovednosti a schopnosti potřebn&eacute; ke zkoum&aacute;n&iacute; nov&yacute;ch my&scaron;lenek a inovovat.</p>



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
                    <h2>Zapojte se!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Zorganizujte akci</h4>
                        </div>

                        <p>Zorganizujte akci a tak se zapojte do T&yacute;dne programov&aacute;n&iacute;. Udělejte něco pro druh&eacute; t&iacute;m, že je budete inspirovat a motivovat.</p>

                        <p>Zveme každ&eacute;ho, aby zorganizoval akci. Stač&iacute; si vybrat n&aacute;mět a c&iacute;lovou skupinu a <a
                                    href="/add">přidat svou akci</a> na <a
                                    href="/events">mapu</a>. Můžete dokonce využ&iacute;t n&aacute;&scaron; <a
                                    href="/guide">n&aacute;stroj pro organiz&aacute;tory</a>, abyste věděl/a, jak zač&iacute;t.</p>

                        <p>Pokud budete potřebovat pomoc nebo m&aacute;te nějakou ot&aacute;zku, můžete se obr&aacute;tit na <a
                                    href="/ambassadors">ambasadora Evropsk&eacute;ho t&yacute;dne programov&aacute;n&iacute;</a> ve sv&eacute; zemi.</p><a href="/events" class="button button-border button-rounded button-large">Staňte se organiz&aacute;torem</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Připojte se k akci</h4>
                        </div>

                        <p>Programov&aacute;n&iacute; je pro každ&eacute;ho. Vyzkou&scaron;ejte něco nov&eacute;ho a zjistěte, jak z&aacute;bavn&eacute; je programov&aacute;n&iacute; &ndash; připojte se k <a
                                    href="/events">akci ve sv&eacute;m okol&iacute;</a>.</p>

                        <p>Připravuje se mnoho akc&iacute; pro v&scaron;echny věkov&eacute; skupiny a s různ&yacute;mi n&aacute;měty. &Uacute;čast je zdarma a nen&iacute; potřeba splňovat ž&aacute;dn&eacute; požadavky.</p>

                        <p>Je tak&eacute; k dispozici <a href="/resources/">seznam zdrojů</a>, d&iacute;ky kter&yacute;m můžete zač&iacute;t programovat online hned teď.</p><a href="/events" class="button button-border button-rounded button-large">Najděte akci</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Dejte o n&iacute; vědět</h4>
                        </div>

                        <p>Podpořte ji t&iacute;m, že o n&iacute; <a href="http://blog.codeweek.eu">d&aacute;te vědět</a>, aby se je&scaron;tě v&iacute;ce lid&iacute; doslechlo o T&yacute;dnu programov&aacute;n&iacute;. Pokud v&iacute;te o někom, kdo by byl ochotn&yacute; akci zorganizovat, informujte ho o T&yacute;dnu programov&aacute;n&iacute;.</p>

                        <p>Chcete se podělit o inspirativn&iacute; př&iacute;běh? <a href="http://blog.codeweek.eu/submit">Dejte ho na svůj blog</a> a my ho budeme sd&iacute;let.</p>

                        <p>Jsme na Twitteru jako <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, na <a
                                    href="https://www.facebook.com/codeEU">Facebooku</a> a použ&iacute;v&aacute;me hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Pod&iacute;vejte se, co se děje</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partneři a sponzoři</h2><span>Pomozte n&aacute;m roz&scaron;&iacute;řit dosah a dopad T&yacute;dne programov&aacute;n&iacute;</span><p>T&yacute;den programov&aacute;n&iacute; je iniciativa organizovan&aacute; dobrovoln&iacute;ky, kter&aacute; pom&aacute;h&aacute; statis&iacute;cům lid&iacute; po cel&eacute;m světě. St&aacute;le hled&aacute;me partnery a sponzory, kteř&iacute; by n&aacute;m pomohli n&aacute;&scaron; dosah roz&scaron;&iacute;řit. Pokud byste se chtěli st&aacute;t souč&aacute;st&iacute; na&scaron;&iacute; komunity a sponzorovat na&scaron;i činnost, můžete n&aacute;s kontaktovat.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Kontaktujte n&aacute;s</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Spojte se s n&aacute;mi</h2><span>Nějak&eacute; dal&scaron;&iacute; ot&aacute;zky? Klidně <a href="mailto:info@codeweek.eu">n&aacute;m napi&scaron;te</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection