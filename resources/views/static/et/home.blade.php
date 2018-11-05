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

                <div class="menu-title">Code Week <span>EL</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Liituge</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partnerid</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Kontaktandmed</div></a></li>
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
                            <h4>Mis?</h4>
                        </div>

                        <p>ELi programmeerimisn&auml;dal Code Week on rohujuuretasandi algatus, mille eesm&auml;rk on &otilde;petada inimestele l&otilde;busal ja kaasahaaraval viisil programmeerimist ja digitaalset kirjaoskust.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Millal?</h4>
                        </div>

                        <p>6.&ndash;21.&nbsp;oktoobril 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Miks?</h4>
                        </div>

                        <p>Programmeerimise &otilde;ppimine aitab meil m&otilde;ista kiiresti muutuvat maailma, t&auml;iendada oma teadmisi tehnoloogiast, arendada uusi oskusi ja avastada innovaatilisi ideid.</p>



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
                    <h2>Liituge!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Korraldage &uuml;ritus</h4>
                        </div>

                        <p>Osalege programmeerimisn&auml;dalal &uuml;rituse korraldajana. Inspireerige ja motiveerige teisi.</p>

                        <p>K&otilde;ik on oodatud &uuml;ritusi korraldama. Lihtsalt valige teema ja sihtr&uuml;hm ning <a
                                    href="/add">lisage oma &uuml;ritus</a> <a
                                    href="/events">kaardile</a>. Alustuseks v&otilde;ite kasutada <a
                                    href="/guide">korraldajatele m&otilde;eldud abivahendite komplekti</a>.</p>

                        <p>Kui vajate abi, v&otilde;tke &uuml;hendust oma riigi <a
                                    href="/ambassadors">ELi programmeerimisn&auml;dala Code Week saadikutega</a>.</p><a href="/events" class="button button-border button-rounded button-large">Hakake korraldajaks</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Tulge &uuml;ritusele</h4>
                        </div>

                        <p>Programmeerimine on k&otilde;igile. Proovige midagi uut ja avastage, kui l&otilde;bus programmeerimine tegelikult on, <a
                                    href="/events">liitudes m&otilde;ne &uuml;ritusega</a>.</p>

                        <p>&Uuml;ritusi on nii erinevas vanuses kui ka erinevatest teemadest huvitatud inimestele. Osav&otilde;tt on tasuta ja osalemiseks ei ole mingeid eeldusi.</p>

                        <p>Lisaks on olemas erinevate <a href="/resources/">vahendite nimikiri</a>, mille abil saate programmeerimisega alustada juba t&auml;na.</p><a href="/events" class="button button-border button-rounded button-large">Sirvige &uuml;ritusi</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Jagage teistega</h4>
                        </div>

                        <p>Aidake meid, <a href="http://blog.codeweek.eu">jagades teavet ka teistele</a> &ndash; nii kuulevad k&otilde;ik programmeerimisn&auml;dalast Code Week. Kui teate inimesi, kes tahaksid &uuml;ritust korraldada, siis r&auml;&auml;kige neile programmeerimisn&auml;dalast Code Week.</p>

                        <p>Kas teil on inspireeriv lugu, mida sooviksite teistega jagada? <a href="http://blog.codeweek.eu/submit">Postitage see meie blogisse</a> ja meie jagame seda teistega.</p>

                        <p>Leidke meid Twitterist <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, <a
                                    href="https://www.facebook.com/codeEU">Facebookist</a> ja kasutage teemaviidet <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Vaadake, mis toimub</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partnerid ja sponsorid</h2><span>Aidake meil programmeerimisn&auml;dalat Code Week teisteni viia</span><p>Programmeerimisn&auml;dal Code Week on rohujuuretasandi algatus, mida veavad vabatahtlikud ja mis ulatub sadade tuhandete inimesteni &uuml;le maailma. Oleme pidevalt uute partnerite ja sponsorite otsingul, kes aitaksid meil veelgi laieneda. Kui soovite meie kogukonnaga liituda ja meie tegevust toetada, siis v&otilde;tke meiega &uuml;hendust.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">V&otilde;tke &uuml;hendust</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>V&otilde;tke meiega &uuml;hendust</h2><span>Kas teil on k&uuml;simusi? <a href="mailto:info@codeweek.eu">Kirjutage meile</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style>

        .section-intro, .section-banner {

            background: transparent;

        }


    </style>@endsection