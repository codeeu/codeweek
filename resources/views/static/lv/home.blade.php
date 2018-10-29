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
                        <li><a href="#section-join" data-href="#section-join"><div>Iesaisties</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partneri</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Kontaktinformācija</div></a></li>
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

                        <p>ES programmē&scaron;anas nedēļa ir iedzīvotāju iniciatīva, kuras mērķis ir iepazīstināt ikvienu ar programmē&scaron;anu un digitālo pratību interesantā un saisto&scaron;ā veidā.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kad?</h4>
                        </div>

                        <p>2018.&nbsp;gada 6.&ndash;21.&nbsp;oktobrī</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Kāpēc?</h4>
                        </div>

                        <p>Iemācoties programmēt, mēs spējam labāk izprast strauji mainīgo pasauli ap mums, uzlabot savu izpratni par to, kā darbojas tehnoloģijas, un attīstīt prasmes un spējas, lai izpētītu jaunas idejas un radītu inovācijas.</p>



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
                    <h2>Iesaisties!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organizē pasākumu</h4>
                        </div>

                        <p>Kļūsti par daļu no programmē&scaron;anas nedēļas, organizējot pasākumu. Radi pārmaiņas, iedvesmojot un motivējot citus.</p>

                        <p>Ikviens ir aicināts organizēt pasākumus. Vienkār&scaron;i izvēlies tēmu un mērķauditoriju un <a
                                    href="/add">pievieno savu pasākumu</a> <a
                                    href="/events">kartē</a>. Tu arī vari iesākumam izmantot mūsu <a
                                    href="/guide">rīkkopu organizatoriem</a>.</p>

                        <p>Ja tev vajadzīga palīdzība vai ir jautājumi, tu vari sazināties ar <a
                                    href="/ambassadors">ES programmē&scaron;anas nedēļas vēstniekiem</a> savā valstī.</p><a href="/events" class="button button-border button-rounded button-large">Kļūsti par organizatoru</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Pievienojies pasākumam</h4>
                        </div>

                        <p>Programmē&scaron;ana ir domāta ikvienam. Izmēģini kaut ko jaunu un atklāj, cik jautri ir programmēt, pievienojoties <a
                                    href="/events">pasākumam savas dzīvesvietas tuvumā</a>.</p>

                        <p>Ir daudz dažādu pasākumu jebkura gadagājuma cilvēkiem un par dažādām tēmām. Dalība ir bezmaksas, un nav nekādu obligātu tās priek&scaron;nosacījumu.</p>

                        <p>Ir pieejams arī <a href="/resources/">resursu saraksts</a>, lai palīdzētu nekavējoties sākt apgūt programmē&scaron;anu tie&scaron;saistē.</p><a href="/events" class="button button-border button-rounded button-large">Meklēt pasākumu</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Izplati informāciju</h4>
                        </div>

                        <p>Palīdzi mums <a href="http://blog.codeweek.eu">izplatīt informāciju</a>, lai vairāk cilvēku uzzinātu par programmē&scaron;anas nedēļu. Ja pazīsti cilvēkus, kuri labprāt organizētu pasākumu, pastāsti viņiem par programmē&scaron;anas nedēļu.</p>

                        <p>Varbūt tev ir iedvesmojo&scaron;s stāsts, ar kuru vēlies dalīties? <a href="http://blog.codeweek.eu/submit">Atsūti to uz mūsu blogu</a>, un mēs ar to dalīsimies.</p>

                        <p>Mūs var atrast Twitter ar tagu <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> un arī <a
                                    href="https://www.facebook.com/codeEU">Facebook</a>, un mēs izmantojam atsauces tagu <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Apskaties, kas notiek</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partneri un sponsori</h2><span>Palīdzi mums papla&scaron;ināt programmē&scaron;anas nedēļas tvērumu un ietekmi.</span><p>Programmē&scaron;anas nedēļa ir iedzīvotāju iniciatīva, ko vada brīvprātīgie un kura sasniedz simtiem tūksto&scaron;us cilvēku visā pasaulē. Mēs pastāvīgi meklējam partnerus un sponsorus, kas var palīdzēt mums papla&scaron;ināt darbību. Ja vēlies kļūt par daļu no mūsu kopienas un sponsorēt mūsu pasākumus, lūdzu, sazinies ar mums.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Sazinies ar mums</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Sazinies ar mums</h2><span>Jautājumi? Gluži vienkār&scaron;i <a href="mailto:info@codeweek.eu">uzraksti mums</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection