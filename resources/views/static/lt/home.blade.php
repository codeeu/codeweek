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

                <div class="menu-title"><span>ES</span> programavimo savaitė</div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Dalyvaukite</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partneriai</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Susisiekti</div></a></li>
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
                            <h4>Kas?</h4>
                        </div>

                        <p>ES programavimo savaitė yra visuomeninė iniciatyva, kurios tikslas yra visus sudominti programavimu ir skaitmeniniu ra&scaron;tingumu.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kada?</h4>
                        </div>

                        <p>2018&nbsp;m. spalio&nbsp;6&ndash;21&nbsp;d.</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kodėl?</h4>
                        </div>

                        <p>Mokydamiesi programuoti suvokiame sparčiai besikeičiantį pasaulį, geriau suprantame, kaip veikia technologijos, ir tobuliname savo įgūdžius bei gebėjimus, kad galėtume rasti naujų idėjų ir kurti inovacijas.</p>



                    </div>

                </div>

            </section>

            <section id="section-banner-teacher" class="section section-banner">
                <a href="/schools">                     @include('static.banner_teacher')                 </a>
            </section>


            <section id="section-join" class="page-section section">

                <div class="heading-block center">
                    <h2>Dalyvaukite!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organizuokite renginį</h4>
                        </div>

                        <p>Suorganizuokite renginį ir prisidėkite prie programavimo savaitės iniciatyvos. Keiskite pasaulį įkvėpdami ir skatindami kitus.</p>

                        <p>Renginį gali organizuoti visi. Tiesiog pasirinkite temą, tikslinę auditoriją ir <a
                                    href="/add">pažymėkite savo renginį</a> <a
                                    href="/events">žemėlapyje</a>. Jei nežinote, nuo ko pradėti, pasinaudokite mūsų <a
                                    href="/guide">priemonių rinkiniu organizatoriams</a>.</p>

                        <p>Jei reikia pagalbos ar patarimo, susisiekite su <a
                                    href="/ambassadors">ES programavimo savaitės ambasadoriais</a> savo &scaron;alyje.</p><a href="/events" class="button button-border button-rounded button-large">Tapkite organizatoriumi</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Prisijunkite prie iniciatyvos</h4>
                        </div>

                        <p>Programuoti gali visi. I&scaron;bandykite ką nors naujo, dalyvaukite <a
                                    href="/events">arčiausiai jūsų organizuojamame renginyje</a> ir atraskite programavimo džiaugsmą.</p>

                        <p>Renginiai organizuojami visoms amžiaus grupėms ir įvairiomis temomis. Dalyvavimas yra nemokamas ir nėra jokių i&scaron;ankstinių sąlygų.</p>

                        <p>&Scaron;tai <a href="/resources/">i&scaron;teklių sąra&scaron;as</a>, jei norite i&scaron;kart pradėti mokytis programuoti internetu.</p><a href="/events" class="button button-border button-rounded button-large">Veiklos peržiūra</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Skleiskite žinią</h4>
                        </div>

                        <p>Nelikite nuo&scaron;alyje&nbsp;&ndash; <a href="http://blog.codeweek.eu">skleiskite žinią</a>, kad kuo daugiau žmonių sužinotų apie programavimo savaitę. Jei pažįstate žmonių, kurie norėtų suorganizuoti renginį, patarkite jiems pasidomėti programavimo savaite.</p>

                        <p>Turite įkvepiančią istoriją? <a href="http://blog.codeweek.eu/submit">Paskelbkite ją mūsų tinklara&scaron;tyje</a>, o mes ją pavie&scaron;insime.</p>

                        <p>Susisiekite su mumis &bdquo;Twitter&ldquo; <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> ar <a
                                    href="https://www.facebook.com/codeEU">&bdquo;Facebook&ldquo;</a>, o mūsų grotažymė yra <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Sekite, kas vyksta</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partneriai ir rėmėjai</h2><span>Padėkite mums plėsti ir stiprinti programavimo savaitės poveikį</span><p>Programavimo savaitė yra savanorių vykdoma visuomeninė iniciatyva, kuri įtraukia &scaron;imtus tūkstančių žmonių visame pasaulyje. Mes nuolatos ie&scaron;kome partnerių ir rėmėjų, galinčių padėti mūsų veiklai plėstis. Jei norite tapti mūsų bendruomenės nariu ir mūsų veiklos rėmėju, maloniai pra&scaron;ome su mumis susisiekti.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Susisiekite</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Susisiekite su mumis</h2><span>Turite dar klausimų? Para&scaron;ykite <a href="mailto:info@codeweek.eu">mums</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection