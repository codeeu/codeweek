@extends('layout.base')

@section('content')


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>

    <div id="slider"
         class="slider-parallax full-screen force-full-screen with-header swiper_wrapper page-section clearfix">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark" style="background-image: url('img/ambassadors.jpg');width: 100%;">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <div id="countdown-ex1" class="countdown countdown-large coming-soon divcenter bottommargin"
                                 style="max-width:700px;"></div>


                            <h2 data-caption-animate="fadeInUp">CODEWEEK.EU</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">@lang('home.when_content') <a
                                        href="https://twitter.com/search?q=%23codeEU&amp;f=realtime">#codeEU</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" data-scrollto="#section-codeweek" class="one-page-arrow dark">
                <i class="icon-angle-down infinite animated fadeInDown"></i>
            </a>
        </div>


    </div>

    <!-- Page Sub Menu -->
    <div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title">CodeWeek <span>EU</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join">
                                <div>@lang('home.get involved')</div>
                            </a></li>
                        <li><a href="#section-partners" data-href="#section-partners">
                                <div>@lang('home.partners')</div>
                            </a></li>
                        <li><a href="#section-contact" data-href="#section-contact">
                                <div>@lang('home.contact')</div>
                            </a></li>
                    </ul>
                </nav>

                <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

            </div>

        </div>

    </div>
    <!-- #page-menu end -->

    <!-- Content -->
    <section id="content">

        <div>


            <section id="section-intro" class="page-section section section-intro">

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>@lang('home.what')?</h4>
                        </div>

                        <p>
                            @lang('home.what_content')
                        </p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>@lang('home.when')?</h4>
                        </div>

                        <p>
                            @lang('home.when_content')


                        </p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>@lang('home.why')?</h4>
                        </div>

                        <p>
                            @lang('home.why_content')
                        </p>



                    </div>

                </div>

            </section>

            <section id="section-banner-teacher" class="section section-banner">
                <div class="container clearfix">
                    <a href="/schools"><img src="img/banner_teacher.png"/></a>
                </div>
            </section>


            <section id="section-join" class="page-section section">

                <div class="heading-block center">
                    <h2>@lang('home.get involved')!</h2>
                    <span></span>
                </div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>@lang('organise')</h4>
                        </div>

                        <p>
                            @lang('home.organise_content_1')
                        </p>

                        <p>
                            @lang('home.organise_content_2')
                             <a
                                    href="/add">@lang('home.organise_content_3')</a> @lang('home.organise_content_4') <a
                                    href="/events">@lang('home.organise_content_5')</a>. @lang('home.organise_content_6') <a
                                    href="/guide">@lang('home.organise_content_7')</a> @lang('home.organise_content_8').
                        </p>

                        <p>@lang('home.organise_content_9')
                            <a
                                    href="/ambassadors">@lang('home.organise_content_10')</a> @lang('home.organise_content_11').
                        </p>

                        <a href="/events" class="button button-border button-rounded button-large">@lang('home.organise_button')</a>

                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>@lang('home.join')</h4>
                        </div>

                        <p>
                            @lang('home.join_content_1') <a
                                    href="/events">@lang('home.join_content_2')</a>.
                        </p>

                        <p>
                            @lang('home.join_content_3')
                        </p>

                        <p>
                            @lang('home.join_content_4') <a href="/resources/">@lang('home.join_content_5')</a> @lang('home.join_content_6').
                        </p>

                        <a href="/events" class="button button-border button-rounded button-large">@lang('home.join_button')</a>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>@lang('home.spread')</h4>
                        </div>

                        <p>
                            @lang('home.spread_content_1') <a href="http://blog.codeweek.eu">@lang('home.spread_content_2')</a> @lang('home.spread_content_3').
                        </p>

                        <p>
                            @lang('home.spread_content_4')? <a href="http://blog.codeweek.eu/submit">@lang('home.spread_content_5')</a> @lang('home.spread_content_6').
                        </p>

                        <p>
                            @lang('home.spread_content_7') <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, @lang('home.spread_content_8') <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> @lang('home.spread_content_9') <a
                                    href="https://twitter.com/search?q=%23codeEU&amp;f=realtime">#codeEU</a> @lang('home.spread_content_10').
                        </p>

                        <a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">@lang('home.spread_button')</a>

                    </div>

                    <div class="clear"></div>

                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>@lang('home.partners_1')</h2>
                        <span>@lang('home.partners_2')</span>

                        <p>
                            @lang('home.partners_3')
                        </p>

                        <a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">@lang('home.partners_button')</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    <ul class="clients-grid grid-4 nobottommargin clearfix">
                        <li><a href="https://www.apple.com/uk/everyone-can-code/"><img src="img/partners/apple.png"
                                                                                       alt="Apple"></a></li>
                        <li><a href="http://www.techsoupeurope.org/"><img src="img/partners/techsoup.png"
                                                                          alt="Tech Soup"></a></li>
                        <li><a href="http://programamos.es"><img src="img/partners/colabora_programamos.png"
                                                                 alt="Programamos"></a></li>
                        <li><a href="http://drscratch.programamos.es"><img src="img/partners/colabora_drscratch.png"
                                                                           alt="Dr.Scratch"></a></li>
                        <li><a href="http://www.publiclibraries2020.eu"><img
                                        src="img/partners/colabora_PublicLibraries2020.png" alt="Public Libraries 2020"></a>
                        </li>
                        <li><a href="http://ec.europa.eu/digital-agenda/en/grand-coalition-digital-jobs-0"><img
                                        src="img/partners/digital-skills.png"
                                        alt="Grand Coalition for Digital Jobs"></a></li>
                        <li><a href="http://coderdojo.org"><img src="img/partners/colabora_coderdojo.png"
                                                                alt="CoderDojo"></a></li>
                        <li><a href="http://www.africacodeweek.org/"><img src="img/partners/colabora_africacodeweek.png"
                                                                          alt="Africa Code Week"></a></li>
                        <li><a href="http://www.allyouneediscode.eu/"><img src="img/partners/colabora_aynic.png"
                                                                           alt="All you need is code"></a></li>
                        <li><a href="http://www.eun.org/"><img src="img/partners/colabora_eun.png"
                                                               alt="European Schoolnet"></a></li>
                        <li><a href="http://scratch.mit.edu/codeweekeu"><img src="img/partners/colabora_scratch.png"
                                                                             alt="Scratch"></a></li>
                        <li><a href="http://www.ictinpractice.com/"><img src="img/partners/colabora_ict-in-practice.png"
                                                                         alt="ICT In Practice"></a></li>
                        <li><a href="http://www.neunet.it/"><img src="img/partners/colabora_neunet.png"
                                                                 alt="NeuNet"></a></li>
                        <li><a href="https://edu.google.com/resources/computerscience"><img
                                        src="img/partners/google.png" alt="Google"></a></li>
                        <li><a href="https://education.lego.com/en-gb/secondary/explore/c/eu-code-week"><img
                                        src="img/partners/lego.png" alt="LEGOeducation"></a></li>
                        <li><a href="http://www.sap.com/"><img src="img/partners/sap-logo.png" alt="SAP"></a></li>
                        <li><a href="http://www.stifter-helfen.de/"><img src="img/partners/stifter-helfen.png"
                                                                         alt="Stifter Helfen"></a></li>
                        <li><a href="http://eutechalliance.eu/"><img src="img/partners/eu-tech-alliance.png"
                                                                     alt="EU Tech Alliance"></a></li>


                    </ul>

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>@lang('home.touch_1')</h2>
                    <span>@lang('home.touch_2')? @lang('home.touch_3') <a href="mailto:info@codeweek.eu">@lang('home.touch_4')</a>.</span>
                </div>

            </section>

            {{--<a href="/events" class="button button-blue button-full center tright footer-stick">
                <div class="container clearfix">
                    Bring your ideas to life with <strong>#coding</strong> <i class="icon-caret-right"
                                                                              style="top:4px;"></i>
                </div>
            </a>--}}
        </div>

    </section>
    <!-- #content end -->


@endsection

@push('scripts')
    <script>
        window.$(function ($) {
            var newDate = new Date(2018, 9, 6);
            $('#countdown-ex1').countdown({until: newDate});
        });
    </script>
@endpush


@section("extra-css")
    <style>

        .section-intro, .section-banner {

            background: transparent;

        }


    </style>

@endsection

