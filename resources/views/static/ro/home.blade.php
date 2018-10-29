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

                <div class="menu-title">Săptăm&acirc;na <span>UE</span> a programării</div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Implică-te</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Parteneri</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Contact</div></a></li>
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
                            <h4>Ce?</h4>
                        </div>

                        <p>Săptăm&acirc;na UE a programării este o inițiativă de bază care &icirc;și propune să aducă programarea și competențele digitale la &icirc;ndem&acirc;na tuturor &icirc;ntr-un mod distractiv și antrenant.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>C&acirc;nd?</h4>
                        </div>

                        <p>6-21 octombrie 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>De ce?</h4>
                        </div>

                        <p>&Icirc;nvățarea programării ne ajută să &icirc;nțelegem lumea care se schimbă rapid &icirc;n jurul nostru, să ne extindem &icirc;nțelegerea cu privire la modul &icirc;n care funcționează tehnologia și să dezvoltăm competențe și abilități pentru a explora noi idei și pentru a inova.</p>



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
                    <h2>Implică-te!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organizează o activitate</h4>
                        </div>

                        <p>Contribuie la Săptăm&acirc;nii programării, organiz&acirc;nd o activitate. Adu-ți contribuția inspir&acirc;ndu-i și motiv&acirc;ndu-i pe alții.</p>

                        <p>Oricine este binevenit să organizeze o activitate. Alege un subiect și o audiență țintă și <a
                                    href="/add">adaugă-ți activitatea</a> pe <a
                                    href="/events">hartă</a>. Poți folosi chiar și <a
                                    href="/guide">setul nostru de instrumente pentru organizatori</a> pentru a &icirc;ncepe.</p>

                        <p>Dacă ai nevoie de ajutor sau ai o &icirc;ntrebare, poți lua legătura cu <a
                                    href="/ambassadors">ambasadorii Săptăm&acirc;nii UE a programării</a> din țara ta.</p><a href="/events" class="button button-border button-rounded button-large">Devino organizator</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Alătură-te unei activități</h4>
                        </div>

                        <p>Programarea este pentru toată lumea. &Icirc;ncearcă ceva nou și descoperă plăcerea programării particip&acirc;nd la o <a
                                    href="/events">activitate din apropierea ta</a>.</p>

                        <p>Sunt multe evenimente pentru orice v&acirc;rstă și o varietate de subiecte. Participarea este gratuită și nu există condiții de participare.</p>

                        <p>Avem, de asemenea, o <a href="/resources/">listă de resurse</a> care te ajută să &icirc;ncepi chiar acum programarea online.</p><a href="/events" class="button button-border button-rounded button-large">Caută activități</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Răsp&acirc;ndește mesajul</h4>
                        </div>

                        <p>Ajută cauza prin <a href="http://blog.codeweek.eu">răsp&acirc;ndirea  mesajului</a> astfel &icirc;nc&acirc;t mai multe persoane să afle despre Săptăm&acirc;na programării. Dacă cunoști persoane care ar fi dispuse să organizeze un eveniment, spune-le despre Săptăm&acirc;na programării.</p>

                        <p>Ai o poveste motivațională de &icirc;mpărtășit? <a href="http://blog.codeweek.eu/submit">Public-o pe blogul nostru</a> și noi o vom distribui.</p>

                        <p>Suntem pe Twitter ca <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, pe <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> și folosim hashtag-ul <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Vezi ce se &icirc;nt&acirc;mplă</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Parteneri și sponsori</h2><span>Ajută-ne să ne extindem raza de acțiune și impactul Săptăm&acirc;nii programării</span><p>Săptăm&acirc;na programării este o inițiativă de bază condusă de voluntari, care are o deschidere către sute de mii de oameni din &icirc;ntreaga lume. Căutăm permanent parteneri și sponsori pentru a ne ajuta să ne extindem. Dacă vrei să faci parte din comunitatea noastră și să ne sponsorizezi activitățile, te rugăm să ne contactezi.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Contactează-ne</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Ia legătura cu noi</h2><span>Mai ai &icirc;ntrebări? <a href="mailto:info@codeweek.eu">Scrie-ne un r&acirc;nd</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection