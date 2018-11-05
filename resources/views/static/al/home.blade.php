@extends('layout.base') @section('content')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
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
            </div>
            <a href="#" data-scrollto="#section-codeweek" class="one-page-arrow dark"><i
                        class="icon-angle-down infinite animated fadeInDown"></i></a></div>


    </div><!-- Page Sub Menu -->
    <div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title">CodeWeek <span>EU</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join">
                                <div>Angazhohu</div>
                            </a></li>
                        <li><a href="#section-partners" data-href="#section-partners">
                                <div>Partner&euml;t</div>
                            </a></li>
                        <li><a href="#section-contact" data-href="#section-contact">
                                <div>Kontakti</div>
                            </a></li>
                    </ul>
                </nav>

                <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

            </div>

        </div>

    </div><!-- #page-menu end --> <!-- Content -->
    <section id="content">

        <div>


            <section id="section-intro" class="page-section section section-intro">

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>&Ccedil;far&euml;?</h4>
                        </div>

                        <p>EU Code Week &euml;sht&euml; nj&euml; nism&euml; n&euml; terren q&euml; synon t&euml; sjell&euml;
                            kodimin dhe &ldquo;alfabetizmin&rdquo; dixhital te t&euml; gjith&euml; n&euml; nj&euml; m&euml;nyr&euml;
                            arg&euml;tuese dhe angazhuese.</p>


                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kur?</h4>
                        </div>

                        <p>6-21 tetor 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Pse?</h4>
                        </div>

                        <p>M&euml;simi i kodimit na ndihmon t&euml; kuptojm&euml; logjikisht bot&euml;n rrotull nesh q&euml;
                            ndryshon shpejt, t&euml; zgjerojm&euml; t&euml; kuptuarin ton&euml; rreth m&euml;nyr&euml;s
                            se si funksionon teknologjia, si dhe t&euml; zhvillojm&euml; aft&euml;si dhe kapacitete p&euml;r
                            t&euml; eksploruar ide t&euml; reja dhe p&euml;r t&euml; sjell&euml; inovacion.</p>


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
                    <h2>P&euml;rfshihu!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organizo nj&euml; aktivitet</h4>
                        </div>

                        <p>B&euml;huni pjes&euml; e Code Week duke organizuar nj&euml; aktivitet. Sillni ndryshimin duke
                            frym&euml;zuar dhe duke motivuar t&euml; tjer&euml;t.</p>

                        <p>T&euml; gjith&euml; jan&euml; t&euml; mir&euml;pritur t&euml; organizojn&euml; nj&euml;
                            aktivitet. Thjesht zgjidhni nj&euml; tem&euml; dhe audienc&euml;n e synuar dhe <a
                                    href="/add">shtoni aktivitetin tuaj</a> n&euml; <a
                                    href="/events">hart&euml;</a>. Madje ju mund t&euml; p&euml;rdorni edhe <a
                                    href="/guide">setin ton&euml; t&euml; mjeteve p&euml;r organizator&euml;</a> p&euml;r
                            t&euml; filluar.</p>

                        <p>N&euml;se keni nevoj&euml; p&euml;r ndihm&euml; ose keni nj&euml; pyetje, ju mund t&euml;
                            kontaktoni me <a
                                    href="/ambassadors">ambasador&euml;t e EU Code Week</a> n&euml; vendin tuaj.</p><a
                                href="/events" class="button button-border button-rounded button-large">B&euml;hu
                            organizator</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Bashkohu me nj&euml; aktivitet</h4>
                        </div>

                        <p>Kodimi &euml;sht&euml; p&euml;r t&euml; gjith&euml;. Provoni di&ccedil;ka t&euml; re dhe
                            zbuloni arg&euml;timin e kodimit duke u bashkuar me <a
                                    href="/events">nj&euml; aktivitet pran&euml; jush</a>.</p>

                        <p>Ka evenimente t&euml; shumta p&euml;r &ccedil;do mosh&euml; dhe nj&euml; shum&euml;llojshm&euml;ri
                            temash. Pjes&euml;marrja &euml;sht&euml; falas dhe nuk ka k&euml;rkesa paraprake.</p>

                        <p>Ka gjithashtu edhe nj&euml; <a href="/resources/">list&euml; burimesh</a> p&euml;r t&rsquo;ju
                            ndihmuar q&euml; t&euml; filloni me kodimin n&euml; linj&euml; q&euml; tani.</p><a
                                href="/events" class="button button-border button-rounded button-large">Shfleto
                            aktivitetin</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>P&euml;rhapni fjal&euml;n</h4>
                        </div>

                        <p>Ndihmoni kauz&euml;n duke <a href="http://blog.codeweek.eu">p&euml;rhapur fjal&euml;n</a> q&euml;
                            m&euml; shum&euml; individ&euml; t&euml; mund t&euml; m&euml;sojn&euml; rreth Code Week. N&euml;se
                            njihni t&euml; tjer&euml; q&euml; jan&euml; t&euml; gatsh&euml;m t&euml; organizojn&euml; nj&euml;
                            eveniment, tregojuni rreth Code Week.</p>

                        <p>A keni nj&euml; histori frym&euml;zuese p&euml;r t&euml; ndar&euml;? <a
                                    href="http://blog.codeweek.eu/submit">Postojeni n&euml; blogun ton&euml;</a> dhe ne
                            do ta ndajm&euml;.</p>

                        <p>Jemi n&euml; Twitter si <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, n&euml; <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> dhe p&euml;rdorim hashtagun <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a
                                href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Shikoni
                            se &ccedil;far&euml; po ndodh</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partner&euml;t dhe sponsor&euml;t</h2><span>Na ndihmoni t&euml; zgjerojm&euml; sfer&euml;n e kontakteve dhe ndikimin e Code Week</span>
                        <p>Code Week &euml;sht&euml; nj&euml; nism&euml; n&euml; terren e drejtuar nga vullnetar&euml;,
                            e cila ka p&euml;rfshir&euml; qindra e mij&euml;ra persona n&euml; mbar&euml; bot&euml;n. Ne
                            jemi vazhdimisht n&euml; k&euml;rkim t&euml; partner&euml;ve dhe sponsor&euml;ve p&euml;r t&euml;
                            na ndihmuar t&euml; zgjerohemi. N&euml;se doni t&euml; b&euml;heni pjes&euml; e komunitetit
                            ton&euml; dhe t&euml; sponsorizoni aktivitetet tona, ju lutemi t&euml; na kontaktoni.</p><a
                                href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Kontakto</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Kontakto me ne</h2><span>Keni ende pyetje? Thjesht <a
                                href="mailto:info@codeweek.eu">na shkruani</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')
    <style>

        .section-intro, .section-banner {

            background: transparent;

        }


    </style>@endsection