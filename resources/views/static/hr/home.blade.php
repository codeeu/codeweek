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

                <div class="menu-title"><span>Europski</span> tjedan programiranja</div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Uključite se</div></a></li>
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
                            <h4>&Scaron;to?</h4>
                        </div>

                        <p>Europski tjedan programiranja dru&scaron;tvena je inicijativa čiji je cilj na zabavan i angažirajući način svima približiti programiranje i digitalnu pismenost.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kada?</h4>
                        </div>

                        <p>6.&nbsp;&ndash;&nbsp;21.&nbsp;listopada&nbsp;2018.</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Za&scaron;to?</h4>
                        </div>

                        <p>Učenje programiranja pomaže nam da shvatimo svijet oko sebe koji se brzo mijenja, pro&scaron;irimo svoje razumijevanje o tome kako funkcionira tehnologija te da razvijemo vje&scaron;tine i sposobnosti kako bismo istraživali nove ideje i bili inovativni.</p>



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
                            <h4>Organizirajte aktivnost</h4>
                        </div>

                        <p>Postanite dio Tjedna programiranja organiziranjem aktivnosti. Učinite ne&scaron;to važno te inspirirajte i motivirajte druge.</p>

                        <p>Svi su dobrodo&scaron;li organizirati aktivnost. Odaberite temu i ciljanu publiku te <a
                                    href="/add">dodajte svoju aktivnost</a> na <a
                                    href="/events">kartu</a>. Možete upotrijebiti i na&scaron; <a
                                    href="/guide">komplet alata za organizatore</a> kako biste lak&scaron;e počeli.</p>

                        <p>Ako vam je potrebna pomoć ili imate pitanja, obratite se <a
                                    href="/ambassadors">ambasadorima Europskog tjedna programiranja</a> u svojoj zemlji.</p><a href="/events" class="button button-border button-rounded button-large">Postanite organizator</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Priključite se aktivnosti</h4>
                        </div>

                        <p>Programiranje je za sve. Pridružite se <a
                                    href="/events">aktivnosti u svojoj blizini</a>, isprobajte ne&scaron;to novo i otkrijte kako je zabavno programirati.</p>

                        <p>Mnogo je događanja za svaku dob i nude se raznolike teme. Sudjelovanje je besplatno i nema preduvjeta.</p>

                        <p>Postoji i <a href="/resources/">popis resursa</a> koji će vam pomoći da odmah počnete programirati na mreži.</p><a href="/events" class="button button-border button-rounded button-large">Pretražite aktivnosti</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Pro&scaron;irite glas</h4>
                        </div>

                        <p>Pomognite nam <a href="http://blog.codeweek.eu">&scaron;ireći glas</a> kako bi vi&scaron;e ljudi znalo za Tjedan programiranja. Ako poznajete osobe koje bi bile voljne organizirati događanje, javite im za Tjedan programiranja.</p>

                        <p>Želite li podijeliti inspirativnu priču? <a href="http://blog.codeweek.eu/submit">Objavite je na na&scaron;em blogu</a> i mi ćemo je podijeliti.</p>

                        <p>Na Twitteru nas možete pronaći kao <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, a na <a
                                    href="https://www.facebook.com/codeEU">Facebooku</a> upotrebljavamo oznaku <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Pogledajte &scaron;to se događa</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partneri i sponzori</h2><span>Pomozite nam da pro&scaron;irimo domet i utjecaj Tjedna programiranja</span><p>Tjedan programiranja dru&scaron;tvena je inicijativa koju vode volonteri i koja doseže do stotina tisuća ljudi diljem svijeta. U stalnoj smo potrazi za partnerima i sponzorima koji će nam pomoći da se pro&scaron;irimo. Ako biste željeli biti dijelom na&scaron;e zajednice i sponzorirati na&scaron;e aktivnosti, javite nam se.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Stupite u kontakt</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Stupite u kontakt s nama</h2><span>Imate jo&scaron; pitanja? <a href="mailto:info@codeweek.eu">Pi&scaron;ite nam</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection