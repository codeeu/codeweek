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
                        <li><a href="#section-join" data-href="#section-join"><div>Weź udział</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partnerzy</div></a></li>
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
                            <h4>Co?</h4>
                        </div>

                        <p>EU Code Week, czyli Europejski Tydzień Kodowania, to oddolna inicjatywa promująca programowanie i umiejętności cyfrowe wśr&oacute;d uczestnik&oacute;w w ciekawy i interesujący spos&oacute;b.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kiedy?</h4>
                        </div>

                        <p>6&ndash;21 października 2018 roku</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Dlaczego?</h4>
                        </div>

                        <p>Nauka programowania pomaga wszystkim zrozumieć otaczający nas świat, kt&oacute;ry ulega ciągłym zmianom, rozwijać wiedzę na temat działania technologii, a także zdobywać umiejętności w celu zgłębiania nowych pomysł&oacute;w i opracowywania nowych innowacji.</p>



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
                    <h2>Weź udział!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Zorganizuj wydarzenie</h4>
                        </div>

                        <p>Weź udział w Tygodniu Kodowania organizując wydarzenie. Zmień otaczający cię świat inspirując i motywując innych do działania.</p>

                        <p>Zapraszamy wszystkie osoby zainteresowane organizacją wydarzenia. Wystarczy wybrać temat i grupę odbiorc&oacute;w, a następnie <a
                                    href="/add">dodać wydarzenie</a> do <a
                                    href="/events">mapy wydarzeń</a>. W organizacji wydarzenia pomocny może okazać się nasz <a
                                    href="/guide">zestaw informacji dla organizator&oacute;w</a>.</p>

                        <p>Jeśli potrzebujesz pomocy lub masz jakiekolwiek pytania, możesz skontaktować się z <a
                                    href="/ambassadors">Ambasadorami Europejskiego Tygodnia Kodowania</a> w swoim kraju.</p><a href="/events" class="button button-border button-rounded button-large">Zostań organizatorem</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Weź udział w wydarzeniu</h4>
                        </div>

                        <p>Programowanie jest dla wszystkich. Spr&oacute;buj czegoś nowego i odkryj, jaką radość może dawać programowanie biorąc udział w <a
                                    href="/events">wydarzeniu odbywającym się w twojej okolicy</a>.</p>

                        <p>Program obejmuje dziesiątki wydarzeń poświęconych r&oacute;żnym zagadnieniom dla uczestnik&oacute;w we wszystkich grupach wiekowych. Udział w wydarzeniach jest całkowicie darmowy i nie wiąże się z koniecznością spełniania żadnych wymagań.</p>

                        <p>Możesz także skorzystać z <a href="/resources/">listy materiał&oacute;w</a>, dzięki kt&oacute;rym możesz zacząć zabawę z programowaniem już teraz.</p><a href="/events" class="button button-border button-rounded button-large">Przeglądaj wydarzenia</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Promuj inicjatywę</h4>
                        </div>

                        <p>Pom&oacute;ż nam poprzez <a href="http://blog.codeweek.eu">propagowanie naszej inicjatywy</a>, dzięki czemu więcej ludzi dowie się o Europejskim Tygodniu Kodowania. Jeśli znasz osoby, kt&oacute;re mogą zorganizować wydarzenie, powiedz im o Tygodniu Kodowania.</p>

                        <p>Chcesz podzielić się inspirującą historią? <a href="http://blog.codeweek.eu/submit">Prześlij ją na nasz blog</a>, a my chętnie udostępnimy ją wszystkim.</p>

                        <p>Możesz nas znaleźć na Twitterze <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> oraz na <a
                                    href="https://www.facebook.com/codeEU">Facebooku</a> &ndash; używamy także hasztaga <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Przeczytaj najnowsze informacje</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partnerzy i sponsorzy</h2><span>Pom&oacute;ż nam sprawić, by Tydzień Kodowania dotarł do jak największej liczby ludzi</span><p>Europejski Tydzień Kodowania to oddolna inicjatywa realizowana przez ochotnik&oacute;w, docierająca do setek tysięcy ludzi na całym świecie. Stale poszukujemy nowych partner&oacute;w i sponsor&oacute;w, kt&oacute;rzy będą pomagać nam w dalszym rozwoju. Jeśli chcesz zostać częścią naszej społeczności i wspierać nasze działania, skontaktuj się z nami.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Skontaktuj się z nami</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Skontaktuj się z nami</h2><span>Pytania? Wątpliwości? <a href="mailto:info@codeweek.eu">Napisz do nas</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection