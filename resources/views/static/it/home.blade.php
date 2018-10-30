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
                        <li><a href="#section-join" data-href="#section-join"><div>Mettiti in gioco</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partner</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Contatti</div></a></li>
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
                            <h4>Cos&rsquo;&egrave;?</h4>
                        </div>

                        <p>La settimana europea della programmazione &egrave; un&rsquo;iniziativa che nasce dal basso e mira a portare la programmazione e l&rsquo;alfabetizzazione digitale a tutti in modo divertente e coinvolgente.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Quando?</h4>
                        </div>

                        <p>Dal 6 al 21 ottobre 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Perch&eacute;?</h4>
                        </div>

                        <p>Imparare a programmare ci aiuta a dare un senso al mondo che cambia rapidamente intorno a noi, ad ampliare la nostra comprensione di come funziona la tecnologia e a sviluppare abilit&agrave; e capacit&agrave; al fine di esplorare nuove idee e innovare.</p>



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
                    <h2>Mettiti in gioco!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organizza un&rsquo;attivit&agrave;</h4>
                        </div>

                        <p>Entra a far parte della settimana europea della programmazione organizzando un&rsquo;attivit&agrave;. Fai la differenza ispirando e motivando gli altri.</p>

                        <p>Tutti sono invitati a organizzare un&rsquo;attivit&agrave;. Scegli un argomento e un pubblico di destinazione e <a
                                    href="/add">aggiungi la tua attivit&agrave;</a> alla <a
                                    href="/events">mappa</a>. Puoi anche usare il nostro <a
                                    href="/guide">toolkit per gli organizzatori</a> per iniziare.</p>

                        <p>Se hai bisogno di aiuto o hai domande puoi metterti in contatto con gli <a
                                    href="/ambassadors">ambasciatori della settimana europea della programmazione</a> nel tuo paese.</p><a href="/events" class="button button-border button-rounded button-large">Diventa un organizzatore</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Partecipa a un&rsquo;attivit&agrave;</h4>
                        </div>

                        <p>La programmazione &egrave; per tutti. Prova qualcosa di nuovo e scopri il divertimento di programmare partecipando a <a
                                    href="/events">un&rsquo;attivit&agrave; vicina a te</a>.</p>

                        <p>Ci sono molti eventi per ogni et&agrave; e una variet&agrave; di argomenti. La partecipazione &egrave; gratuita e non ci sono prerequisiti.</p>

                        <p>Esiste anche un <a href="/resources/">elenco di risorse</a> per aiutarti a iniziare la programmazione online fin da subito.</p><a href="/events" class="button button-border button-rounded button-large">Cerca un&rsquo;attivit&agrave;</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Diffondi la voce</h4>
                        </div>

                        <p>Aiuta la causa <a href="http://blog.codeweek.eu">diffondendo la voce</a> in modo che pi&ugrave; persone possano conoscere la settimana europea della programmazione. Se conosci persone che sarebbero disposte a organizzare un evento, informale sulla settimana europea della programmazione.</p>

                        <p>Hai una storia motivante da condividere? <a href="http://blog.codeweek.eu/submit">Pubblicala sul nostro blog</a> e la condivideremo.</p>

                        <p>Siamo su Twitter come <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, su <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> e usiamo l&rsquo;hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Guarda cosa sta succedendo</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partner e sponsor</h2><span>Aiutaci a espandere il raggio d&rsquo;azione e l&rsquo;impatto della settimana europea della programmazione</span><p>La settimana europea della programmazione &egrave; un&rsquo;iniziativa che nasce dal basso, &egrave; gestita da volontari e ha un raggio d&rsquo;azione di centinaia di migliaia di persone in tutto il mondo. Siamo alla continua ricerca di partner e sponsor che possano aiutarci a espanderci. Se vuoi far parte della nostra comunit&agrave; e sponsorizzare le nostre attivit&agrave;, contattaci.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Entriamo in contatto</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Entra in contatto con noi</h2><span>Hai ancora domande? <a href="mailto:info@codeweek.eu">Contattaci</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection