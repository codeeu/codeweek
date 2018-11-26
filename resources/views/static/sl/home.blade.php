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

                <div class="menu-title"><span>Evropski</span> teden programiranja </div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Vključite se</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partnerji</div></a></li>
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
                            <h4>Kaj?</h4>
                        </div>

                        <p>Evropski teden programiranja je družbena pobuda, katere cilj je približati programersko in digitalno pismenost vsem na zabaven in vključujoč način.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kdaj?</h4>
                        </div>

                        <p>6.&ndash;21.&nbsp;oktobra&nbsp;2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Zakaj?</h4>
                        </div>

                        <p>Učenje programiranja nam pomaga dojemati hitro spreminjajoči se svet okrog nas, bolje razumeti delovanje tehnologije ter razviti znanja in spretnosti za raziskovanje novih zamisli in inovacije.</p>



                    </div>

                </div>

            </section>

            <section id="section-banner-teacher" class="section section-banner">
                <a href="/schools">                     @include('static.banner_teacher')                 </a>
            </section>


            <section id="section-join" class="page-section section">

                <div class="heading-block center">
                    <h2>Vključite se!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organizirajte dejavnost</h4>
                        </div>

                        <p>Sodelujte v tednu programiranja in organizirajte dejavnost. Ustvarjajte spremembe z navdihovanjem in spodbujanjem drugih.</p>

                        <p>Vsak lahko organizira dejavnost. Samo izberite temo in ciljno občinstvo ter <a
                                    href="/add">dodajte svojo dejavnost</a> na <a
                                    href="/events">zemljevid</a>. Na začetku si lahko pomagate z na&scaron;im <a
                                    href="/guide">sklopom orodij za organizatorje</a>.</p>

                        <p>Če potrebujete pomoč ali imate vpra&scaron;anje, se lahko obrnete na <a
                                    href="/ambassadors">ambasadorje evropskega tedna programiranja</a> v svoji državi.</p><a href="/events" class="button button-border button-rounded button-large">Postanite organizator</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Pridružite se dejavnosti</h4>
                        </div>

                        <p>Programiranje je za vse. Poskusite nekaj novega in odkrijte zabavno plat programiranja: pridružite se <a
                                    href="/events">dejavnosti v va&scaron;i bližini</a>.</p>

                        <p>Na voljo so &scaron;tevilne dejavnosti za vse starosti in z različnimi temami. Udeležba je brezplačna in ni treba izpolnjevati nobenih predpogojev.</p>

                        <p>Na voljo je tudi <a href="/resources/">seznam virov</a>, ki vam bodo pomagali, da boste takoj začeli s spletnim programiranjem.</p><a href="/events" class="button button-border button-rounded button-large">Brskajte po dejavnostih</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Raz&scaron;irite glas</h4>
                        </div>

                        <p>Pomagajte nam tako, da <a href="http://blog.codeweek.eu">raz&scaron;irite glas</a> o teh dogodkih, da bi čim več ljudi izvedelo za teden programiranja. Če poznate ljudi, ki bi bili pripravljeni organizirati dogodek, jim povejte o tednu programiranja.</p>

                        <p>Bi želeli deliti navdihujočo zgodbo z drugimi? <a href="http://blog.codeweek.eu/submit">Objavite jo na na&scaron;em blogu</a> in delili jo bomo naprej.</p>

                        <p>Najdete nas na Twitterju kot <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> in na <a
                                    href="https://www.facebook.com/codeEU">Facebooku</a> pod ključnikom <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Oglejte si, kaj se dogaja</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partnerji in sponzorji</h2><span>Pomagajte nam, da povečamo domet in vpliv tedna programiranja</span><p>Teden programiranja je družbena pobuda, ki jo vodijo prostovoljci in ki sega do več sto tisoč ljudi iz vsega sveta. Ves čas i&scaron;čemo partnerje in sponzorje, ki bi nam pomagali, da se raz&scaron;irimo. Če želite biti del na&scaron;e skupnosti in sponzorirati na&scaron;e dejavnosti, stopite v stik z nami.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Obrnite se na nas</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Obrnite se na nas</h2><span>Imate &scaron;e vpra&scaron;anja? <a href="mailto:info@codeweek.eu">Pi&scaron;ite nam</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection