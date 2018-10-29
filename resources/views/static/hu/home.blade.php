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
                        <li><a href="#section-join" data-href="#section-join"><div>Vegyen r&eacute;szt!</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partnerek</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Kapcsolat</div></a></li>
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
                            <h4>Mit?</h4>
                        </div>

                        <p>Az eur&oacute;pai programoz&aacute;si h&eacute;t egy alulr&oacute;l szerveződő kezdem&eacute;nyez&eacute;s, amelynek c&eacute;lja a programoz&aacute;s &eacute;s a digit&aacute;lis j&aacute;rtass&aacute;g sz&oacute;rakoztat&oacute; &eacute;s &eacute;rdekes m&oacute;don t&ouml;rt&eacute;nő bemutat&aacute;sa.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Mikor?</h4>
                        </div>

                        <p>2018. okt&oacute;ber 6-21.</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Hogy mi&eacute;rt?</h4>
                        </div>

                        <p>A programoz&aacute;s megtanul&aacute;s&aacute;val jobban t&aacute;j&eacute;koz&oacute;dunk a gyorsan v&aacute;ltoz&oacute; vil&aacute;gban, seg&iacute;t meg&eacute;rteni a k&uuml;l&ouml;nb&ouml;ző technol&oacute;gi&aacute;k műk&ouml;d&eacute;s&eacute;t, k&eacute;szs&eacute;g- &eacute;s k&eacute;pess&eacute;gfejlesztő hat&aacute;s&aacute;nak k&ouml;sz&ouml;nhetően pedig &uacute;j &ouml;tleteket &eacute;s innov&aacute;ci&oacute;kat dolgozhatunk ki.</p>



                    </div>

                </div>

            </section>

            <section id="section-banner-teacher" class="section section-banner">
                <a href="/schools">                     @include('static.banner_teacher')                 </a>
            </section>


            <section id="section-join" class="page-section section">

                <div class="heading-block center">
                    <h2>Vegyen r&eacute;szt!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Szervezzen tev&eacute;kenys&eacute;get</h4>
                        </div>

                        <p>Legyen &ouml;n is a programoz&aacute;si h&eacute;t r&eacute;szese: szervezzen tev&eacute;kenys&eacute;get! Tegyen a v&aacute;ltoz&aacute;s&eacute;rt m&aacute;sok inspir&aacute;l&aacute;s&aacute;val &eacute;s motiv&aacute;l&aacute;s&aacute;val.</p>

                        <p>B&aacute;rki szervezhet tev&eacute;kenys&eacute;get. V&aacute;lasszon ki egy t&eacute;m&aacute;t &eacute;s egy c&eacute;lk&ouml;z&ouml;ns&eacute;get, majd <a
                                    href="/add">tegye fel a t&eacute;rk&eacute;pre a tev&eacute;kenys&eacute;g&eacute;t</a>. A kezdeti l&eacute;p&eacute;sekhez haszn&aacute;lhatja a <a
                                    href="/guide">szervezőknek kidolgozott eszk&ouml;zt&aacute;runkat</a> is.</p>

                        <p>Ha seg&iacute;ts&eacute;gre van sz&uuml;ks&eacute;ge vagy k&eacute;rd&eacute;se mer&uuml;l fel, kapcsolatba l&eacute;phet orsz&aacute;g&aacute;ban a <a
                                    href="/ambassadors">programoz&aacute;si h&eacute;t</a> illet&eacute;kes <a
                                    href="/ambassadors">nagyk&ouml;vet&eacute;vel</a>.</p><a href="/events" class="button button-border button-rounded button-large">Vegyen r&eacute;szt a szervez&eacute;sben</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Vegyen r&eacute;szt egy tev&eacute;kenys&eacute;gben</h4>
                        </div>

                        <p>A programoz&aacute;sba mindenki bekapcsol&oacute;dhat. Pr&oacute;b&aacute;ljon ki valami &uacute;jat, &eacute;s fedezze fel a programoz&aacute;s ny&uacute;jtotta &ouml;r&ouml;m&ouml;t: <a
                                    href="/events">vegyen r&eacute;szt egy tev&eacute;kenys&eacute;gben</a>, amelyet a k&ouml;rny&eacute;ken szerveznek.</p>

                        <p>Rengeteg rendezv&eacute;ny van sokf&eacute;le t&eacute;m&aacute;ban, ahol minden korcsoport megtal&aacute;lja a sz&aacute;m&iacute;t&aacute;s&aacute;t. A r&eacute;szv&eacute;tel ingyenes, &eacute;s nincsenek előfelt&eacute;telek.</p>

                        <p>Ez a <a href="/resources/">lista</a> olyan hivatkoz&aacute;sokat tartalmaz, amelyek seg&iacute;ts&eacute;g&eacute;vel r&ouml;gt&ouml;n elkezdheti az online programoz&aacute;st.</p><a href="/events" class="button button-border button-rounded button-large">B&ouml;ng&eacute;sz&eacute;s a tev&eacute;kenys&eacute;gek k&ouml;z&ouml;tt</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Mondja el m&aacute;soknak is!</h4>
                        </div>

                        <p>Seg&iacute;tsen: <a href="http://blog.codeweek.eu">mondja el m&aacute;soknak is</a>, hogy min&eacute;l t&ouml;bben &eacute;rtes&uuml;ljenek a programoz&aacute;si h&eacute;tről. Ha ismer olyanokat, akiket &eacute;rdekelne egy esem&eacute;ny megszervez&eacute;se, besz&eacute;ljen nekik a programoz&aacute;si h&eacute;tről.</p>

                        <p>Megosztana egy inspirat&iacute;v t&ouml;rt&eacute;netet? <a href="http://blog.codeweek.eu/submit">&Iacute;rjon egy blogbejegyz&eacute;st</a>, &eacute;s mi megosztjuk a blogunkon.</p>

                        <p>A k&ouml;vetkező k&ouml;z&ouml;ss&eacute;gim&eacute;dia-platformokon tal&aacute;lhat meg: Twitter: <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, <a
                                    href="https://www.facebook.com/codeEU">Facebook</a>, &eacute;s a <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a> hashtaget haszn&aacute;ljuk.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">&Eacute;rtes&uuml;lj&ouml;n a leg&uacute;jabb fejlem&eacute;nyekről</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partnerek &eacute;s szponzorok</h2><span>Seg&iacute;tsen nek&uuml;nk a programoz&aacute;si h&eacute;t ismerts&eacute;g&eacute;nek &eacute;s hat&aacute;s&aacute;nak n&ouml;vel&eacute;s&eacute;ben</span><p>A programoz&aacute;si h&eacute;t egy &ouml;nk&eacute;ntesek &aacute;ltal műk&ouml;dtetett, alulr&oacute;l szerveződő kezdem&eacute;nyez&eacute;s, amely vil&aacute;gszerte t&ouml;bb sz&aacute;zezer embert k&eacute;pes megsz&oacute;l&iacute;tani. Folyamatosan keres&uuml;nk &uacute;j partnereket &eacute;s szponzorokat, akik seg&iacute;tenek az ismerts&eacute;g&uuml;nk n&ouml;vel&eacute;s&eacute;ben. Ha szeretne k&ouml;z&ouml;ss&eacute;g&uuml;nk tagja lenni, &eacute;s szponzork&eacute;nt seg&iacute;teni a tev&eacute;kenys&eacute;geinket, l&eacute;pjen vel&uuml;nk kapcsolatba.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Kapcsolatfelv&eacute;tel</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>L&eacute;pjen vel&uuml;nk kapcsolatba</h2><span>Megv&aacute;laszolatlan k&eacute;rd&eacute;se maradt? <a href="mailto:info@codeweek.eu">&Iacute;rjon nek&uuml;nk</a>!</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection