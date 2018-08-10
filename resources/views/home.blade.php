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
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">6th &mdash; 21st October 2018 <a
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
                        <li><a href="#section-why" data-href="#section-why">
                                <div>Why coding?</div>
                            </a></li>
                        <li><a href="#section-join" data-href="#section-join">
                                <div>Get involved</div>
                            </a></li>
                        <li><a href="#section-past" data-href="#section-past">
                                <div>Code Week 2017</div>
                            </a></li>
                        <li><a href="#section-partners" data-href="#section-partners">
                                <div>Partners</div>
                            </a></li>
                        <li><a href="#section-contact" data-href="#section-contact">
                                <div>Contact</div>
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
                            <h4>What?</h4>
                        </div>

                        <p>
                            EU Code Week is a grassroots initiative which aims to bring coding and digital literacy to everybody in a fun and engaging way.
                        </p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>When?</h4>
                        </div>

                        <p>
                            6-21 October 2018
                        </p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Why?</h4>
                        </div>

                        <p>
                            Learning to code helps us to make sense of the rapidly changing world around us, expand our understanding of how technology works, and develop skills and capabilities in order to explore new ideas and innovate.
                        </p>



                    </div>

                    <div class="clear"></div>

                </div>

            </section>



            <section id="section-join" class="page-section section">

                <div class="heading-block center">
                    <h2>Get involved!</h2>
                    <span></span>
                </div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organize an event</h4>
                        </div>

                        <p>
                            Become a part of Code Week by organizing an event. Make a difference by inspiring and
                            motivating others.
                        </p>

                        <p>
                            Anyone is welcome to organize an event. Just pick a topic and a target audience and <a
                                    href="http://events.codeweek.eu/add/">add your event</a> to <a
                                    href="http://events.codeweek.eu/">the map</a>. You can even use our <a
                                    href="http://events.codeweek.eu/guide/">toolkit for organizers</a> to get started.
                        </p>

                        <p>
                            If you need help or have a question you can get in touch with <a
                                    href="http://events.codeweek.eu/ambassadors/">EU Code Week Ambassadors</a> in your
                            country.
                        </p>

                        <a href="http://events.codeweek.eu" class="button button-border button-rounded button-large">Become
                            an organizer</a>

                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Join an event</h4>
                        </div>

                        <p>
                            Coding is for everyone. Try something new and discover the fun of coding by joining <a
                                    href="http://events.codeweek.eu/">an event near you</a>.
                        </p>

                        <p>
                            There are plenty of events for any age and a variety of topics. Participation is free of
                            charge and there are no prerequisites.
                        </p>

                        <p>
                            There's also a <a href="/resources/">list of resources</a> to help you get started with
                            coding online right now.
                        </p>

                        <a href="http://events.codeweek.eu" class="button button-border button-rounded button-large">Browse
                            events</a>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Spread the word</h4>
                        </div>

                        <p>
                            Help the cause by <a href="http://blog.codeweek.eu">spreading the word</a> so that more
                            people can learn about Code Week. If you know people who would be willing to organize an
                            event, let them know about Code Week.
                        </p>

                        <p>
                            Have an inspirational story to share? <a href="http://blog.codeweek.eu/submit">Post it to
                                our blog</a> and we will share it.
                        </p>

                        <p>
                            We're on Twitter as <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, on <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> and we use the <a
                                    href="https://twitter.com/search?q=%23codeEU&amp;f=realtime">#codeEU</a> hashtag.
                        </p>

                        <a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">See
                            what's going on</a>

                    </div>

                    <div class="clear"></div>
                    <!--
                            <div class="fancy-title title-dotted-border title-center">
                              <h2><span>Join</span> our campaigns</h2>
                            </div>

                            <div class="col_one_third">
                              <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                                  <div class="fbox-icon">
                                    <a href="/odetocode/"><i class="icon-play i-alt"></i></a>
                                  </div>
                                  <h3>Ode to code video contest</h3>
                                  <p>Take part in the contest by making a short video to report the incredible effects of the "Ode to code" tune on people, robots, and objects.</p>
                              </div>

                            </div>

                            <div class="col_one_third">
                              <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                                  <div class="fbox-icon">
                                    <a href="/codeweek4all/"><i class="icon-study i-alt"></i></a>
                                  </div>
                                  <h3>CodeWeek4all challenge</h3>
                                  <p>Challenge your school to engage all the students in coding during Europe Code Week 2015 and get a Certificate of Excellence in Coding Literacy from the European Commission.</p>
                              </div>
                            </div>

                            <div class="col_one_third col_last">
                              <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                                  <div class="fbox-icon">
                                    <a href="https://www.thunderclap.it/projects/31230-codeweekeu"><i class="icon-bullhorn i-alt"></i></a>
                                  </div>
                                  <h3>Thunderclap campaign</h3>
                                  <p>Join our thunderclap campaign to announce the beginning of Europe Code Week 2015 on October 10.</p>
                              </div>
                            </div>
                                    -->
                </div>

            </section>

            <section id="section-past" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>In the last edition</h2>
                        <span>
            Europe Code Week 2017 was a huge success.
            <br>Let's make this year an even bigger one.
          </span>
                    </div>

                    <div class="container clearfix">
                        <div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
                            <i class="i-plain i-xlarge divcenter nobottommargin icon-line-flag"></i>
                            <div class="counter counter-lined"><span data-from="1" data-to="52"
                                                                     data-refresh-interval="5" data-speed="2000"></span>
                            </div>
                            <h5>Countries</h5>
                        </div>

                        <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
                            <i class="i-plain i-xlarge divcenter nobottommargin icon-location"></i>
                            <div class="counter counter-lined"><span data-from="692" data-to="788"
                                                                     data-refresh-interval="10"
                                                                     data-speed="2500"></span></div>
                            <h5>CodeWeek4All awardees</h5>
                        </div>

                        <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
                            <i class="i-plain i-xlarge divcenter nobottommargin icon-calendar2"></i>
                            <div class="counter counter-lined"><span data-from="23043" data-to="25089"
                                                                     data-refresh-interval="100"
                                                                     data-speed="2500"></span></div>
                            <h5>Events</h5>
                        </div>

                        <div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn"
                             data-delay="600">
                            <i class="i-plain i-xlarge divcenter nobottommargin icon-group"></i>
                            <div class="counter counter-lined"><span data-from="968537" data-to="1099394"
                                                                     data-refresh-interval="100"
                                                                     data-speed="3000"></span>+
                            </div>
                            <h5>Participants</h5>
                        </div>
                    </div>

                </div>
            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partners And Sponsors</h2>
                        <span>Help us expand the outreach and the impact of Code Week</span>

                        <p>
                            Code Week is a grassroots initiative led by volunteers which has an outreach to hundreds of
                            thousands of people around the world. We constantly seek partners and sponsors to help us
                            expand. If you would like to be part of our community and sponsor our activities, please
                            contact us.
                        </p>

                        <a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Get
                            in touch</a></p>
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
                    <h2>Get in Touch with us</h2>
                    <span>Still have questions? Just <a href="mailto:info@codeweek.eu">drop us a line</a>.</span>
                </div>

            </section>

            <a href="http://events.codeweek.eu" class="button button-blue button-full center tright footer-stick">
                <div class="container clearfix">
                    Bring your ideas to life with <strong>#coding</strong> <i class="icon-caret-right"
                                                                              style="top:4px;"></i>
                </div>
            </a>
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

        .section-intro {

            background: transparent;

        }


    </style>

@endsection

