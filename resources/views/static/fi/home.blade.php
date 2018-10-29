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

                <div class="menu-title">Koodausviikko <span>EU</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Osallistu</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Kumppanit</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Ota yhteytt&auml;</div></a></li>
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
                            <h4>Mik&auml;?</h4>
                        </div>

                        <p>EU:n koodausviikko on ruohonjuuritason aloite, jonka tavoitteena on edist&auml;&auml; koodausta ja digitaalista lukutaitoa hauskalla ja osallistavalla tavalla.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Milloin?</h4>
                        </div>

                        <p>6.&ndash;21.10.2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Miksi?</h4>
                        </div>

                        <p>Oppimalla koodaamaan opimme j&auml;sent&auml;m&auml;&auml;n ymp&auml;rill&auml;mme nopeasti muuttuvaa maailmaa, ymm&auml;rt&auml;m&auml;&auml;n teknologiaa sek&auml; kehitt&auml;m&auml;&auml;n taitoja ja valmiuksia, joiden avulla voimme keksi&auml; uusia ideoita ja innovaatioita.</p>



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
                    <h2>Osallistu!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>J&auml;rjest&auml; tapahtuma</h4>
                        </div>

                        <p>Osallistu koodausviikkoon j&auml;rjest&auml;m&auml;ll&auml; tapahtuma. Vaikuta inspiroimalla ja motivoimalla muita.</p>

                        <p>Kuka tahansa voi j&auml;rjest&auml;&auml; tapahtuman. Valitse aihe ja kohdeyleis&ouml; ja <a
                                    href="/add">merkitse tapahtumasi</a> <a
                                    href="/events">karttaan</a>. <a
                                    href="/guide">J&auml;rjest&auml;jien ty&ouml;kalupakki</a> auttaa sinut alkuun.</p>

                        <p>Jos tarvitset apua tai sinulla on kysytt&auml;v&auml;&auml;, ota yhteytt&auml; oman maasi <a
                                    href="/ambassadors">EU:n koodausviikkol&auml;hettil&auml;&auml;seen</a>.</p><a href="/events" class="button button-border button-rounded button-large">J&auml;rjest&auml; tapahtuma</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Osallistu tapahtumaan</h4>
                        </div>

                        <p>Koodaus sopii kaikille. Kokeile jotain uutta ja osallistu <a
                                    href="/events">tapahtumaan l&auml;hialueellasi</a>. Huomaat, miten hauskaa koodaus on.</p>

                        <p>Tarjolla on lukuisia tapahtumia kaikenik&auml;isille ja monenlaisista aiheista. Tapahtumat ovat ilmaisia, eiv&auml;tk&auml; ne edellyt&auml; aikaisempaa osaamista.</p>

                        <p>Voit tutustua koodaukseen jo nyt verkosta l&ouml;ytyvien <a href="/resources/">aineistojen</a> avulla.</p><a href="/events" class="button button-border button-rounded button-large">Selaa tapahtumia</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Levit&auml; sanaa</h4>
                        </div>

                        <p><a href="http://blog.codeweek.eu">Levit&auml; sanaa</a> koodausviikosta, jotta mahdollisimman moni saisi tiet&auml;&auml; siit&auml;. Jos tunnet ihmisi&auml;, jotka voisivat olla kiinnostuneita j&auml;rjest&auml;m&auml;&auml;n tapahtuman, kerro heille koodausviikosta.</p>

                        <p>Onko sinulla inspiroiva tarina jaettavanasi? <a href="http://blog.codeweek.eu/submit">Julkaise se blogissamme</a>, niin me jaamme sen.</p>

                        <p>L&ouml;yd&auml;t meid&auml;t Twitterist&auml; <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> ja <a
                                    href="https://www.facebook.com/codeEU">Facebookista</a>. Tunnisteemme on <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Katso tapahtumat</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Kumppanit ja sponsorit</h2><span>Auta meit&auml; tekem&auml;&auml;n koodausviikkoa tunnetuksi ja laajentamaan sen vaikutusta</span><p>Koodausviikko on vapaaehtoisten vet&auml;m&auml; ruohonjuuritason aloite, joka tavoittaa satojatuhansia ihmisi&auml; ymp&auml;ri maailmaa. Etsimme jatkuvasti kumppaneita ja sponsoreita, jotka auttavat meit&auml; laajentumaan. Jos haluat olla osa yhteis&ouml;&auml;mme ja sponsoroida tapahtumiamme, ota yhteytt&auml;.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Ota yhteytt&auml;</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Ota yhteytt&auml;</h2><span>Onko sinulla kysytt&auml;v&auml;&auml;? <a href="mailto:info@codeweek.eu">Kirjoita meille</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection