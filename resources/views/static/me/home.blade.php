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

                <div class="menu-title">Nedjelja programiranja <span>EU</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Uključi se</div></a></li>
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
                            <h4>O čemu je riječ?</h4>
                        </div>

                        <p>Evropska Nedjelja programiranja je grass roots inicijativa koja ima za cilj da svakom približi programiranje i digitalnu pismenost na zabavan i zanimljiv način. </p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kada?</h4>
                        </div>

                        <p>6.-21. oktobar 2018.</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Za&scaron;to?</h4>
                        </div>

                        <p>Učenje programiranja pomaže nam da shvatimo svijet oko nas koji se ubrzano mijenja, pro&scaron;irimo svoja poimanja načina funkcionisanja tehnologije i razvijemo vje&scaron;tine i sposobnosti za istraživanje novih ideja i inovatorstvo.</p>



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
                    <h2>Uključite se!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organizujte aktivnost</h4>
                        </div>

                        <p>Postanite dio Nedjelje programiranja putem organizovanja aktivnosti. Učinite stvari drugačijim, tako &scaron;to će&scaron; inspirisati i motivisati druge.</p>

                        <p>Svako može da organizuje aktivnost. Samo odaberite temu i ciljnu grupu i <a
                                    href="/add">dodajte svoju aktivnost</a> na <a
                                    href="/events">mapu</a>. Možete čak koristiti na&scaron;u <a
                                    href="/guide">alatku </a> za početak.</p>

                        <p>Ako vam je potrebna pomoć ili imate neko pitanje, možete stupiti u kontakt sa <a
                                    href="/ambassadors">ambasadorima Evropske Nedjelje programiranja</a> u va&scaron;oj zemlji.</p><a href="/events" class="button button-border button-rounded button-large">Postanite organizator</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Pridružite se aktivnosti</h4>
                        </div>

                        <p>Programiranje je za svakog. Isprobajte ne&scaron;to novo i otkrijte čari programiranja uče&scaron;ćem u <a
                                    href="/events">aktivnosti u va&scaron;oj blizini</a>.</p>

                        <p>Postoji mnogo događaja na razne teme i za sve starosne dobi. Uče&scaron;će je besplatno i ne postoje preduslovi.</p>

                        <p>Takođe, postoji i <a href="/resources/">spisak literature</a> kako bi vam se pomoglo da sa online programiranjem počnete odmah. </p><a href="/events" class="button button-border button-rounded button-large">Pretražujte aktivnosti</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>&Scaron;irite vijest dalje</h4>
                        </div>

                        <p>Podržite aktivnost <a href="http://blog.codeweek.eu">&scaron;irenjem informacija</a> kako bi vi&scaron;e ljudi saznalo za Nedjelju programiranja. Ukoliko poznajete ljude koji bi bili spremni organizovati događaj, obavijestite ih o Nedjelji programiranja.</p>

                        <p>Imate inspirativnu priču koju biste podijelili? <a href="http://blog.codeweek.eu/submit">Postavite je na na&scaron; blog</a> i mi ćemo je podijeliti.</p>

                        <p>Imamo nalog na Twitter-u <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, i <a
                                    href="https://www.facebook.com/codeEU">Facebook-u</a> i koristimo hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Pogledajte o čemu je riječ</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partneri i sponzori</h2><span>Pomozite nam da pro&scaron;irimo domet i uticaj Nedjelje programiranja </span><p>Evropska Nedjelja programiranja je grassroots inicijativa u organizaciji volontera koja okuplja stotine hiljada ljudi &scaron;irom svijeta. Mi smo u stalnoj potrazi za partnerima i sponzorima koji bi nam pomogli da se pro&scaron;irimo. Ukoliko želite da budete dio na&scaron;e zajednice i da budete sponzor na&scaron;ih aktivnosti, molimo da nas kontaktirate</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Stupite u kontakt</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Stupite u kontakt sa nama</h2><span>Jo&scaron; uvijek imate pitanja? Samo <a href="mailto:info@codeweek.eu">pi&scaron;ite</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection