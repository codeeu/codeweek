@extends('layout.base')

@section('content')


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
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
                            <p data-caption-animate="fadeInUp" data-caption-delay="200"> <a
                                        href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a></p>
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
                                <div>Get involved</div>
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

                </div>

            </section>

            <section id="section-banner-teacher" class="section section-banner">

                <a href="/schools">
                    @include('static.banner_teacher')
                </a>

            </section>


            <section id="section-join" class="page-section section">

                <div class="heading-block center">
                    <h2>Get involved!</h2>
                    <span></span>
                </div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organize an activity</h4>
                        </div>

                        <p>
                            Become a part of Code Week by organizing an activity. Make a difference by inspiring and
                            motivating others.
                        </p>

                        <p>
                            Anyone is welcome to organize an activity. Just pick a topic and a target audience and <a
                                    href="/add">add your activity</a> to <a
                                    href="/events">the map</a>. You can even use our <a
                                    href="/guide">toolkit for organizers</a> to get started.
                        </p>

                        <p>
                            If you need help or have a question you can get in touch with <a
                                    href="/ambassadors">EU Code Week Ambassadors</a> in your
                            country.
                        </p>

                        <a href="/events" class="button button-border button-rounded button-large">Become
                            an organizer</a>

                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Join an activity</h4>
                        </div>

                        <p>
                            Coding is for everyone. Try something new and discover the fun of coding by joining <a
                                    href="/events">an activity near you</a>.
                        </p>

                        <p>
                            There are plenty of events for any age and a variety of topics. Participation is free of
                            charge and there are no prerequisites.
                        </p>

                        <p>
                            There's also a <a href="/resources/">list of resources</a> to help you get started with
                            coding online right now.
                        </p>

                        <a href="/events" class="button button-border button-rounded button-large">Browse
                            activity</a>

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
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a> hashtag.
                        </p>

                        <a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">See
                            what's going on</a>

                    </div>

                    <div class="clear"></div>
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

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Get in Touch with us</h2>
                    <span>Still have questions? Just <a href="mailto:info@codeweek.eu">drop us a line</a>.</span>
                </div>

            </section>

        </div>

    </section>
    <!-- #content end -->


@endsection

@push('scripts')
    @include('static.countdown')
@endpush


@section("extra-css")
    <style>

        .section-intro, .section-banner {

            background: transparent;

        }


    </style>

@endsection

