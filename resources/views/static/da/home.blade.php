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

                <div class="menu-title">Kodeuge i <span>EU</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>V&aelig;r med</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partnere</div></a></li>
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
                            <h4>Hvad?</h4>
                        </div>

                        <p>EU&rsquo;s kodeuge er et gr&aelig;srodsinitiativ, som har til form&aring;l at g&oslash;re kodning og digitale f&aelig;rdigheder tilg&aelig;ngelige for alle p&aring; en sjov og medrivende m&aring;de.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Hvorn&aring;r?</h4>
                        </div>

                        <p>6.-21. oktober 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Hvorfor?</h4>
                        </div>

                        <p>At l&aelig;re at kode hj&aelig;lper os med at finde mening i den hastigt skiftende verden omkring os, udvide vores forst&aring;else af hvordan teknologi virker og udvikle evner og f&aelig;rdigheder, s&aring; vi kan udforske nye id&eacute;er og skabe nyt.</p>



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
                    <h2>V&aelig;r med!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Afhold en aktivitet</h4>
                        </div>

                        <p>Bliv en del af kodeugen ved at afholde en aktivitet. G&oslash;r en forskel ved at inspirere og motivere andre.</p>

                        <p>Alle er velkomne til at afholde en aktivitet. Du skal blot v&aelig;lge et emne og en m&aring;lgruppe og <a
                                    href="/add">tilf&oslash;je din aktivitet</a> p&aring; <a
                                    href="/events">kortet</a>. Du kan ogs&aring; bruge vores <a
                                    href="/guide">pakke til arrang&oslash;rer</a> for at komme i gang.</p>

                        <p>Hvis du skal bruge hj&aelig;lp eller har sp&oslash;rgsm&aring;l, kan du kontakte en <a
                                    href="/ambassadors">ambassad&oslash;r for EU&rsquo;s kodeuge</a> i dit land.</p><a href="/events" class="button button-border button-rounded button-large">Bliv arrang&oslash;r</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Deltag i en aktivitet</h4>
                        </div>

                        <p>Kodning er for alle. Pr&oslash;v noget nyt, og opdag, hvor sjovt det er at kode ved at deltage i <a
                                    href="/events">en aktivitet i dit lokalomr&aring;de</a>.</p>

                        <p>Der er masser af arrangementer for alle aldre og mange forskellige emner. Det er gratis at deltage, og det kr&aelig;ver ingen foruds&aelig;tninger.</p>

                        <p>Der er ogs&aring; en <a href="/resources/">liste over ressourcer</a>, som kan hj&aelig;lpe dig med at komme i gang med at kode p&aring; internettet med det samme.</p><a href="/events" class="button button-border button-rounded button-large">Se aktiviteterne</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Spred budskabet</h4>
                        </div>

                        <p>V&aelig;r med til at <a href="http://blog.codeweek.eu">sprede budskabet</a> i den gode sags tjeneste, s&aring; flere kan l&aelig;re om kodeugen. Hvis du kender nogen, som gerne vil afholde et arrangement, s&aring; fort&aelig;l dem om kodeugen.</p>

                        <p>Har du en historie, der kan inspirere andre? <a href="http://blog.codeweek.eu/submit">Send den til vores blog</a>, s&aring; vi kan dele den.</p>

                        <p>Vi er p&aring; Twitter som <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> og p&aring; <a
                                    href="https://www.facebook.com/codeEU">Facebook</a>, og vi bruger hashtagget <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Se, hvad der sker</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partnere og sponsorer</h2><span>Hj&aelig;lp os med at n&aring; ud til flere steder og flere mennesker med kodeugen</span><p>Kodeugen er et gr&aelig;srodsinitiativ ledet af frivillige, som n&aring;r ud til flere hundrede tusinder af mennesker over hele verden. Vi er konstant p&aring; udkig efter partnere og sponsorer, der kan hj&aelig;lpe os med at ekspandere. Kontakt os, hvis du gerne vil v&aelig;re en del af vores f&aelig;llesskab og sponsere vores aktiviteter.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Tag kontakt</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Tag kontakt til os</h2><span>Har du flere sp&oslash;rgsm&aring;l? <a href="mailto:info@codeweek.eu">Send os et par ord</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection