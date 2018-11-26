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
                        <li><a href="#section-join" data-href="#section-join"><div>Engagera dig</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partners</div></a></li>
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
                            <h4>Vad?</h4>
                        </div>

                        <p>EU Code Week &auml;r ett gr&auml;srotsinitiativ som verkar f&ouml;r att alla ska f&aring; tillg&aring;ng till kodning och digitala kunskaper p&aring; ett roligt och engagerande s&auml;tt.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>N&auml;r?</h4>
                        </div>

                        <p>6&ndash;21 oktober 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Varf&ouml;r?</h4>
                        </div>

                        <p>Genom att l&auml;ra oss koda kan vi f&aring; ut mer av den snabbt f&ouml;r&auml;nderliga v&auml;rlden runt omkring oss, ut&ouml;ka v&aring;ra kunskaper om hur tekniken fungerar samt utveckla v&aring;r kompetens och v&aring;ra f&auml;rdigheter s&aring; att vi kan utforska nya id&eacute;er och f&ouml;rnya.</p>



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
                    <h2>Engagera dig!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organisera en aktivitet</h4>
                        </div>

                        <p>Delta i Code Week genom att organisera en aktivitet. G&ouml;r skillnad genom att inspirera och motivera andra.</p>

                        <p>Vem som helst &auml;r v&auml;lkommen att organisera en aktivitet. V&auml;lj ett &auml;mne och en m&aring;lgrupp och <a
                                    href="/add">l&auml;gg till din aktivitet</a> p&aring; <a
                                    href="/events">kartan</a>. Du kan &auml;ven anv&auml;nda v&aring;r <a
                                    href="/guide">verktygsl&aring;da f&ouml;r arrang&ouml;rer</a> f&ouml;r att komma ig&aring;ng.</p>

                        <p>Om du beh&ouml;ver hj&auml;lp eller har fr&aring;gor kan du kontakta <a
                                    href="/ambassadors">EU Code Week-ambassad&ouml;rerna</a> i ditt land.</p><a href="/events" class="button button-border button-rounded button-large">Bli arrang&ouml;r</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Delta i en aktivitet</h4>
                        </div>

                        <p>Kodning &auml;r till f&ouml;r alla. Pr&ouml;va n&aring;got nytt och uppt&auml;ck n&ouml;jet med kodning genom att delta i <a
                                    href="/events">en aktivitet n&auml;ra dig</a>.</p>

                        <p>Det finns massor av evenemang f&ouml;r alla &aring;ldrar och ett stort antal &auml;mnen. Det &auml;r kostnadsfritt att delta och det finns inga f&ouml;rkunskapskrav.</p>

                        <p>Det finns ocks&aring; en <a href="/resources/">lista &ouml;ver resurser</a> som hj&auml;lper dig att komma ig&aring;ng med kodning online direkt.</p><a href="/events" class="button button-border button-rounded button-large">Bl&auml;ddra bland aktiviteter</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Ber&auml;tta f&ouml;r andra</h4>
                        </div>

                        <p>Hj&auml;lp oss genom att <a href="http://blog.codeweek.eu">ber&auml;tta f&ouml;r andra</a> s&aring; att fler f&aring;r h&ouml;ra talas om Code Week. Om du k&auml;nner folk som kanske vill organisera ett evenemang kan du ber&auml;tta f&ouml;r dem om Code Week.</p>

                        <p>Har du en inspirerande historia som du vill dela? <a href="http://blog.codeweek.eu/submit">L&auml;gg upp den p&aring; v&aring;r blogg</a> s&aring; delar vi den.</p>

                        <p>Vi finns p&aring; Twitter som <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> och p&aring; <a
                                    href="https://www.facebook.com/codeEU">Facebook</a>, och vi anv&auml;nder hashtaggen <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Se vad som h&auml;nder</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partners och sponsorer</h2><span>Hj&auml;lp oss att &ouml;ka medvetenheten om Code Week </span><p>Code Week &auml;r ett gr&auml;srotsinitiativ som leds av frivilliga och n&aring;r ut till hundratusentals m&auml;nniskor v&auml;rlden &ouml;ver. Vi s&ouml;ker hela tiden efter partners och sponsorer som kan hj&auml;lpa oss expandera. Kontakta oss om du vill vara en del av EU Code Week och sponsra v&aring;r verksamhet.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Kontakta oss</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Ta kontakt med oss</h2><span>Har du fr&aring;gor? <a href="mailto:info@codeweek.eu">Skriv en rad</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection