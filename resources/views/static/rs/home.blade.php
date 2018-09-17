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
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">6. &ndash; 21. oktobar 2018. <a
                                        href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a></p>
                        </div>
                    </div>
                </div>
            </div><a href="#" data-scrollto="#section-codeweek" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a></div>


    </div><!-- Page Sub Menu --><div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title">Nedelja programiranja <span>EU</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Pridružite se</div></a></li>
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
                            <h4>&Scaron;ta?</h4>
                        </div>

                        <p>EU nedelja programiranja je samonikla inicijativa koja ima za cilj da približi programiranje i digitalnu pismenost svima na zabavan i zanimljiv način.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kada?</h4>
                        </div>

                        <p>6-21. oktobra 2018.</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Za&scaron;to?</h4>
                        </div>

                        <p>Učenje programiranja nam pomaže da bolje shvatimo svet oko nas koji se brzo menja, da bolje razumemo kako tehnologija funkcioni&scaron;e i razvijemo ve&scaron;tine i sposobnosti koje nam pomažu da istražujemo nove ideje i da inoviramo.</p>



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
                    <h2>Pridružite se!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organizujte neku aktivnost</h4>
                        </div>

                        <p>Postanite deo Nedelje programiranja organizujući neku aktivnost. Napravite razliku tako &scaron;to ćete inspirisati i motivisati druge.</p>

                        <p>Svako je dobrodo&scaron;ao da organizuje aktivnost. Samo odaberite temu i ciljnu grupu i <a
                                    href="/add">dodajte aktivnost</a> na <a
                                    href="/events">mapu</a>. Možete čak i da koristite na&scaron;u <a
                                    href="/guide">priručnik za organizatore</a> kako biste počeli.</p>

                        <p>Ukoliko vam je potrebna pomoć ili imate pitanja, možete da stupite u kontakt sa <a
                                    href="/ambassadors">ambasadorima EU nedelje programiranja</a> u svojoj zemlji.</p><a href="/events" class="button button-border button-rounded button-large">Postanite organizator</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Pridružite se nekoj aktivnosti</h4>
                        </div>

                        <p>Programiranje je za svakoga. Probajte ne&scaron;to novo i otkrijte zabavu prilikom programiranja tako &scaron;to ćete se pridružiti <a
                                    href="/events">nekoj aktivnosti u blizini</a>.</p>

                        <p>Organizuje se mno&scaron;tvo događaja namenjenih svim uzrastima i na različite teme. Uče&scaron;će je besplatno i nema preduslova.</p>

                        <p>Takođe postoji i <a href="/resources/">lista resursa</a> koji vam mogu pomoći da počnete da programirate sami već sada.</p><a href="/events" class="button button-border button-rounded button-large">Pregledajte aktivnosti</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Prenesite vest</h4>
                        </div>

                        <p>Pomozite da se na&scaron;a vizija ostvari <a href="http://blog.codeweek.eu">prenoseći vest</a> tako da &scaron;to vi&scaron;e ljudi čuje za Nedelju programiranja. Ukoliko poznajete nekoga ko bi bio voljan da organizuje događaj, obavestite ga o Nedelji programiranja.</p>

                        <p>Da li imate neku inspirativnu priču da podelite? <a href="http://blog.codeweek.eu/submit">Objavite je na na&scaron;em blogu</a> i mi ćemo je podeliti.</p>

                        <p>Možete nas naći na Twitter-u kao <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, na <a
                                    href="https://www.facebook.com/codeEU">Facebook-u</a> i koristimo <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a> he&scaron;teg.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Pogledajte &scaron;ta ima novo</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partneri i sponzori</h2><span>Pomozite nam da pro&scaron;irimo domet i uticaj Nedelje programiranja.</span><p>Nedelja programiranja je samonikli pokret koji vode volonteri i koji dopire do stotine hiljada ljudi &scaron;irom sveta. U stalnoj smo potrazi za partnerima i sponzorima kako bismo se pro&scaron;irili. Ukoliko želite da budete deo na&scaron;e zajednice i da sponzori&scaron;ete na&scaron;e aktivnosti, molimo vas da nas kontaktirate.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Stupite u kontakt</a></p>
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
                                        alt="Grand Coalition for Digital Jobs"></a></li>
                        <li><a href="http://coderdojo.org"><img src="img/partners/colabora_coderdojo.png"
                                                                alt="CoderDojo"></a></li>
                        <li><a href="http://www.africacodeweek.org/"><img src="img/partners/colabora_africacodeweek.png"
                                                                          alt="Africa Code Week"></a></li>
                        <li><a href="http://www.allyouneediscode.eu/"><img src="img/partners/colabora_aynic.png"
                                                                           alt="All you need is code"></a></li>
                        <li><a href="http://www.eun.org/"><img src="img/partners/colabora_eun.png"
                                                               alt="European Schoolnet"></a></li>
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
                    <h2>Stupite u kontakt sa nama</h2><span>Imate jo&scaron; pitanja?  <a href="mailto:info@codeweek.eu">Pi&scaron;ite nam</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')<script>
        window.$(function ($) {
            var newDate = new Date(2018, 9, 6);
            $('#countdown-ex1').countdown({until: newDate});
        });
    </script>@endpush @section('extra-css')<style>

        .section-intro, .section-banner {

            background: transparent;

        }


    </style>@endsection