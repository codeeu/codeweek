@extends('layout.base') @section('content')<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>

    <div id="slider"
         class="slider-parallax full-screen force-full-screen with-header swiper_wrapper page-section clearfix">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark" style="background-image: url('img/ambassadors.jpg');width: 100%;">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <div id="countdown-ex1" class="countdown countdown-large coming-soon divcenter bottommargin"
                                 style="max-width:700px;"></div>


                            <h2 data-caption-animate="fadeInUp">CODEWEEK.EU</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">6&ndash;21 oktober 2018 <a
                                        href="https://twitter.com/search?q=%23codeEU&amp;f=realtime">#codeEU</a></p>
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
                        <li><a href="#section-join" data-href="#section-join"><div>Bli engagerad</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partner</div></a></li>
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

                        <p>EU Code Week &auml;r ett gr&auml;srotsinitiativ som har som syfte att l&aring;ta alla f&aring; del av kodning och digitala kunskaper p&aring; ett roligt och engagerande s&auml;tt.</p>



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

                        <p>Genom att l&auml;ra oss koda kan vi f&aring; ut mer av den snabbt f&ouml;r&auml;nderliga v&auml;rlden runt omkring oss, ut&ouml;ka v&aring;r uppfattning om hur tekniken fungerar, och utveckla v&aring;r kompetens och kapacitet s&aring; att vi kan utforska nya id&eacute;er och f&ouml;rnya.</p>



                    </div>

                </div>

            </section>

            <section id="section-banner-teacher" class="section section-banner">
                <a href="/schools">                     @include('static.banner_teacher')                 </a>
            </section>


            <section id="section-join" class="page-section section">

                <div class="heading-block center">
                    <h2>Bli engagerad!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Ordna en aktivitet</h4>
                        </div>

                        <p>Bli en del av Code Week genom att ordna en aktivitet. G&ouml;r skillnad genom att inspirera och motivera andra.</p>

                        <p>Vem som helst &auml;r v&auml;lkommen att ordna en aktivitet. Bara v&auml;lj ett &auml;mne och en m&aring;lpublik och <a
                                    href="/add">l&auml;gg till din aktivitet</a> p&aring; <a
                                    href="/events">kartan</a>. Du kan &auml;ven anv&auml;nda v&aring;r <a
                                    href="/guide">verktygssats f&ouml;r arrang&ouml;rer</a> f&ouml;r att komma ig&aring;ng.</p>

                        <p>Om du beh&ouml;ver hj&auml;lp eller har en fr&aring;ga kan du ta kontakt med <a
                                    href="/ambassadors">ambassad&ouml;rerna f&ouml;r EU Code Week</a> i ditt land.</p><a href="/events" class="button button-border button-rounded button-large">Bli arrang&ouml;r</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>G&aring; med i en aktivitet</h4>
                        </div>

                        <p>Kodning &auml;r till f&ouml;r alla. Pr&ouml;va n&aring;got nytt och uppt&auml;ck n&ouml;jet med kodning genom att g&aring; med i <a
                                    href="/events">en aktivitet n&auml;ra dig</a>.</p>

                        <p>Det finns massor av evenemang f&ouml;r alla &aring;ldrar och ett stort antal &auml;mnen. Det &auml;r kostnadsfritt att delta och det finns inga f&ouml;rkunskapskrav.</p>

                        <p>Det finns ocks&aring; en <a href="/resources/">lista &ouml;ver resurser</a> som hj&auml;lper dig komma ig&aring;ng med kodning online direkt.</p><a href="/events" class="button button-border button-rounded button-large">Bl&auml;ddra bland aktiviteter</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Sprid ryktet</h4>
                        </div>

                        <p>Bidra till &auml;ndam&aring;let genom att <a href="http://blog.codeweek.eu">sprida ryktet</a> s&aring; att fler f&aring;r h&ouml;ra talas om Code Week. Om du k&auml;nner folk som skulle vilja ordna ett evenemang, ber&auml;tta d&aring; f&ouml;r dem om Code Week.</p>

                        <p>Har du en inspirerande historia att dela med dig av? <a href="http://blog.codeweek.eu/submit">L&auml;gg in den p&aring; v&aring;r blogg</a> s&aring; delar vi den.</p>

                        <p>Vi finns p&aring; Twitter som <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> och p&aring; <a
                                    href="https://www.facebook.com/codeEU">Facebook</a>, och vi anv&auml;nder hashtagen <a
                                    href="https://twitter.com/search?q=%23codeEU&amp;f=realtime">#codeEU</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Se vad som h&auml;nder</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partner och sponsorer</h2><span>Hj&auml;lp oss se till att Code Week n&aring;r ut l&auml;ngre och p&aring;verkar mer</span><p>Code Week &auml;r ett gr&auml;srotsinitiativ som leds av frivilliga och n&aring;r ut till hundratusentals m&auml;nniskor v&auml;rlden &ouml;ver. Vi s&ouml;ker hela tiden efter partner och sponsorer som kan hj&auml;lpa oss expandera. Om du vill ing&aring; i v&aring;r gemenskap och sponsra v&aring;r verksamhet kan du kontakta oss.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Ta kontakt</a></p>
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
                                                                           alt="Dr.Scratch"></a></li>
                        <li><a href="http://www.publiclibraries2020.eu"><img
                                        src="img/partners/colabora_PublicLibraries2020.png" alt="Public Libraries 2020"></a></li>
                        <li><a href="http://ec.europa.eu/digital-agenda/en/grand-coalition-digital-jobs-0"><img
                                        src="img/partners/digital-skills.png"
                                        alt="Breda koalitionen f&ouml;r digitala arbetstillf&auml;llen"></a></li>
                        <li><a href="http://coderdojo.org"><img src="img/partners/colabora_coderdojo.png"
                                                                alt="CoderDojo"></a></li>
                        <li><a href="http://www.africacodeweek.org/"><img src="img/partners/colabora_africacodeweek.png"
                                                                          alt="Africa Code Week"></a></li>
                        <li><a href="http://www.allyouneediscode.eu/"><img src="img/partners/colabora_aynic.png"
                                                                           alt="All you need is code"></a></li>
                        <li><a href="http://www.eun.org/"><img src="img/partners/colabora_eun.png"
                                                               alt="Europeiska skoldatan&auml;tet"></a></li>
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
                    <h2>Ta kontakt med oss</h2><span>Har du fortfarande fr&aring;gor? Bara <a href="mailto:info@codeweek.eu">skriv en rad</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')<script>
        window.$(function ($) {
            var newDate = new Date(2018, 9, 6);
            $('#countdown-ex1').countdown({until: newDate});
        });
    </script>@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection