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
                        <li><a href="#section-join" data-href="#section-join"><div>Beteiligen Sie sich</div></a></li>
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
                            <h4>Worum geht es?</h4>
                        </div>

                        <p>Die EU Code Week ist eine Breiteninitiative, die der Bev&ouml;lkerung das Programmieren und digitale Kompetenzen auf spa&szlig;ige und ansprechende Weise n&auml;herbringen soll.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Wann?</h4>
                        </div>

                        <p>6.-21.&nbsp;Oktober 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Warum?</h4>
                        </div>

                        <p>Programmieren zu lernen, hilft uns, den Sinn der sich schnell ver&auml;ndernden Welt um uns herum zu verstehen, unser Verst&auml;ndnis f&uuml;r die Technologie zu erweitern und Kompetenzen und F&auml;higkeiten zu entwickeln, um neue Ideen und Innovationen umzusetzen.</p>



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
                    <h2>Beteiligen Sie sich!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Eine Aktivit&auml;t organisieren</h4>
                        </div>

                        <p>Werden Sie Teil der Code Week, indem Sie eine Aktivit&auml;t organisieren. Bewirken Sie einen Unterschied, indem Sie andere Menschen motivieren.</p>

                        <p>Alle sind willkommen, eine Aktivit&auml;t zu organisieren. W&auml;hlen Sie einfach ein Thema und ein Zielpublikum und <a
                                    href="/add">f&uuml;gen Sie Ihre Aktivit&auml;t</a> auf der <a
                                    href="/events">Karte</a> hinzu. Sie k&ouml;nnen f&uuml;r den Anfang unser <a
                                    href="/guide">Toolkit f&uuml;r Veranstalter</a> verwenden.</p>

                        <p>Wenn Sie Hilfe ben&ouml;tigen oder eine Frage haben, kontaktieren Sie die <a
                                    href="/ambassadors">EU Code-Week-Botschafter*innen</a> in Ihrem Land.</p><a href="/events" class="button button-border button-rounded button-large">Veranstalter werden</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>An einer Aktivit&auml;t teilnehmen</h4>
                        </div>

                        <p>Programmieren ist f&uuml;r alle da. Probieren Sie etwas Neues aus und entdecken Sie, wie viel Spa&szlig; das Programmieren macht, indem Sie an <a
                                    href="/events">einer Aktivit&auml;t in der N&auml;he teilnehmen</a>.</p>

                        <p>Es gibt zahlreiche Veranstaltungen f&uuml;r verschiedene Altersgruppen und zu unterschiedlichen Themenbereichen. Die Teilnahme ist kostenfrei und es gibt keinerlei Grundvoraussetzungen.</p>

                        <p>Es steht auch eine <a href="/resources/">Liste an Materialien</a> zur Verf&uuml;gung, damit Sie schon heute online anfangen k&ouml;nnen, zu programmieren.</p><a href="/events" class="button button-border button-rounded button-large">Nach Aktivit&auml;ten suchen</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Die Nachricht verbreiten</h4>
                        </div>

                        <p>Dienen Sie der guten Sache, indem Sie <a href="http://blog.codeweek.eu">die Nachricht verbreiten</a> und somit mehr Menschen von der Code Week erfahren. Wenn Sie Menschen kennen, die sicher gerne eine Veranstaltung ausrichten w&uuml;rden, erz&auml;hlen Sie Ihnen von der Code Week.</p>

                        <p>Haben Sie eine inspirierende Geschichte zu erz&auml;hlen? <a href="http://blog.codeweek.eu/submit">Posten Sie auf unserem Blog</a> und wir verbreiten sie weiter.</p>

                        <p>Wir sind bei Twitter unter <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, bei <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> und wir nutzen den Hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Ansehen, was gerade los ist</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partner und Sponsoren</h2><span>Helfen Sie uns, die Reichweite und den Effekt der Code Week zu vergr&ouml;&szlig;ern</span><p>Die Code Week ist eine Breiteninitiative, gest&uuml;tzt durch Freiwillige, die weltweit Hunderttausende Menschen erreicht. Wir sind immer auf der Suche nach Partnern und Sponsoren, um weiter zu wachsen. Wenn Sie gerne ein Teil unserer Gemeinschaft und Sponsor unserer Aktivit&auml;ten w&auml;ren, melden Sie sich bei uns.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Kontakt</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Kontaktieren Sie uns</h2><span>Weitere Fragen? Einfach <a href="mailto:info@codeweek.eu">schreiben</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection