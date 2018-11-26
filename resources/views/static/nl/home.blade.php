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
                        <li><a href="#section-join" data-href="#section-join"><div>Doe mee</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partners</div></a></li>
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
                            <h4>Wat?</h4>
                        </div>

                        <p>De EU-programmeerweek is een burgerinitiatief dat erop is gericht om programmeren en digitale vaardigheden op een leuke, aantrekkelijke manier voor iedereen bereikbaar te maken.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Wanneer?</h4>
                        </div>

                        <p>6 - 21 oktober 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Waarom?</h4>
                        </div>

                        <p>Leren programmeren helpt ons de snel veranderende wereld om ons heen te begrijpen, ons begrip van de werking van technologie te vergroten en vaardigheden en mogelijkheden te ontwikkelen om nieuwe idee&euml;n te ontdekken en te innoveren.</p>



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
                    <h2>Doe mee!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organiseer een activiteit</h4>
                        </div>

                        <p>Word onderdeel van de programmeerweek door een activiteit te organiseren. Maak het verschil door anderen te inspireren en motiveren.</p>

                        <p>Iedereen mag een activiteit organiseren. Kies gewoon een onderwerp en doelgroep en <a
                                    href="/add">zet je activiteit</a> op <a
                                    href="/events">de kaart</a>. Je kunt ook onze <a
                                    href="/guide">toolkit voor organisatoren</a> gebruiken om aan de slag te gaan.</p>

                        <p>Als je hulp nodig hebt of iets wilt vragen, kun je contact opnemen met de <a
                                    href="/ambassadors">ambassadeurs van de EU-programmeerweek</a> in jouw land.</p><a href="/events" class="button button-border button-rounded button-large">Word een organisator</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Doe mee met een activiteit</h4>
                        </div>

                        <p>Iedereen kan programmeren. Probeer eens iets nieuws en ontdek hoe leuk programmeren is tijdens <a
                                    href="/events">een activiteit</a> bij jou in de buurt.</p>

                        <p>Er zijn allerlei evenementen voor alle leeftijden en over verschillende onderwerpen. Meedoen is gratis en voorkennis is niet nodig.</p>

                        <p>Er is ook een <a href="/resources/">lijst met bronnen</a> waarmee je meteen online aan de slag kunt gaan met programmeren.</p><a href="/events" class="button button-border button-rounded button-large">Door activiteiten bladeren</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Zegt het voort</h4>
                        </div>

                        <p>Help de goede zaak door <a href="http://blog.codeweek.eu">de boodschap te verspreiden</a>, zodat meer mensen op de hoogte raken van de programmeerweek. Als je mensen kent die wel een evenement willen organiseren, vertel ze dan over de programmeerweek.</p>

                        <p>Heb je een inspirerend verhaal te vertellen? <a href="http://blog.codeweek.eu/submit">Plaats het op onze blog</a> en we delen het.</p>

                        <p>We zijn op Twitter te vinden onder <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, we zitten op <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> en we gebruiken de hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Bekijk wat er gaande is</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partners en sponsoren</h2><span>Ons helpen het bereik en de impact van de programmeerweek te vergroten</span><p>De programmeerweek is een burgerinitiatief van vrijwilligers dat honderdduizenden mensen over de hele wereld bereikt. We zijn voortdurend op zoek naar partners en sponsoren om ons te helpen uit te breiden. Wil jij deel uitmaken van onze community en onze activiteiten sponsoren? Neem dan contact met ons op.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Contact opnemen</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')




                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Neem contact met ons op</h2><span>Heb je nog vragen? Stuur ons dan even <a href="mailto:info@codeweek.eu">een berichtje</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection