@extends('layout.base')

@section('content')


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
            </div><a href="#" data-scrollto="#section-codeweek" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a></div>


    </div><!-- Page Sub Menu --><div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title">CodeWeek <span>EU</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Involvi ruħek</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Sħab</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Kuntatt</div></a></li>
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
                            <h4>Xiex?</h4>
                        </div>

                        <p>Il-Ġimgħa tal-UE tal-Ikkowdjar hija inizjattiva bażika li timmira li twassal l-ikkowdjar u l-litteriżmu diġitali lil kulħadd b&rsquo;mod pjaċevoli u interessanti.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Meta?</h4>
                        </div>

                        <p>6-21&nbsp;ta&rsquo;&nbsp;Ottubru&nbsp;2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Għaliex?</h4>
                        </div>

                        <p>It-tagħlim kif nikkowdjaw jgħinna nifhmu d-dinja ta&rsquo; madwarna li qiegħda tinbidel malajr, nespandu l-fehim tagħna ta&rsquo; kif taħdem it-teknoloġija, u niżviluppaw ħiliet u kapaċitajiet sabiex nesploraw ideat ġodda u ninnovaw.</p>



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
                    <h2>Involvi ruħek!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organizza attivit&agrave;</h4>
                        </div>

                        <p>Sir parti mill-Ġimgħa tal-Ikkowdjar billi torganizza attivit&agrave;. Agħmel differenza billi tispira u timmotiva lil ħaddieħor.</p>

                        <p>Kulħadd huwa mistieden biex jorganzza attivit&agrave;. Kemm tagħżel suġġett u udjenza fil-mira u <a
                                    href="/add">żżid l-attivit&agrave; tiegħek</a> mal-<a
                                    href="/events">mappa</a>. Tista&rsquo; wkoll tuża s-<a
                                    href="/guide">sett ta&rsquo; għodod tagħna għall-organizzaturi</a> biex tibda.</p>

                        <p>Jekk għandek bżonn għajnuna jew għandek mistoqsija, ikkuntattja lill-<a
                                    href="/ambassadors">Ambaxxaturi tal-Ġimgħa tal-UE tal-Ikkowdjar</a> f&rsquo;pajjiżek.</p><a href="/events" class="button button-border button-rounded button-large">Sir organizzatur</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Ingħaqad f'attivit&agrave;</h4>
                        </div>

                        <p>L-ikkowdjar huwa għal kulħadd. Ipprova xi ħaġa ġdida u skopri l-pjaċir tal-ikkowdjar billi tingħaqad f&rsquo;<a
                                    href="/events">attivit&agrave; viċin tiegħek</a>.</p>

                        <p>Hemm bosta avvenimenti għal kull et&agrave; u varjet&agrave; ta&rsquo; suġġetti. Il-parteċipazzjoni hija bla ħlas u m&rsquo;hemm l-ebda prerekwiżit.</p>

                        <p>Hemm ukoll <a href="/resources/">lista ta&rsquo; riżorsi</a> biex tgħinek tibda bl-ikkowdjar online issa stess.</p><a href="/events" class="button button-border button-rounded button-large">Fittex attivit&agrave;</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Xerred il-kelma</h4>
                        </div>

                        <p>Għin il-kawża billi <a href="http://blog.codeweek.eu">xxerred il-kelma</a> sabiex aktar nies ikunu jistgħu jitgħallmu dwar il-Ġimgħa tal-Ikkowdjar. Jekk taf nies li lesti jorganizzaw avveniment, għidilhom dwar il-Ġimgħa tal-Ikkowdjar.</p>

                        <p>Għandek storja ta&rsquo; ispirazzjoni li tixtieq taqsam? <a href="http://blog.codeweek.eu/submit">Ippostjaha fuq il-blogg tagħna</a> u aħna nxerrduha.</p>

                        <p>Aħna ninsabu fuq Twitter bħala <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, fuq <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> u nużaw il-hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Ara x&rsquo;inhu għaddej</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Sħab u Sponsors</h2><span>Għinna nespandu l-ilħuq u l-impatt tal-Ġimgħa tal-Ikkowdjar</span><p>Il-Ġimgħa tal-Ikkowdjar hija inizjattiva bażika mmexxija minn voluntiera li għandha lħuq ta&rsquo; mijiet ta&rsquo; eluf ta&rsquo; nies minn madwar id-dinja. Kontinwament infittxu sħab u sponsors biex jgħinuna nespandu. Jekk tixtieq tkun parti mill-komunit&agrave; tagħna u tisponsorja l-attivitajiet tagħna, jekk jogħġbok ikkuntattjana.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Ikkuntattjana</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Ikkuntattjana</h2><span>Għad għandek mistoqsijiet? Kemm <a href="mailto:info@codeweek.eu">tibgħatilna messaġġ</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end -->

@endsection
@push('scripts')
    @include('static.countdown')
@endpush
	
@section('extra-css')
    <style>
        .section-intro, .section-banner {

            background: transparent;

        }


    </style>
@endsection
