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
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">6 &mdash; 21 октомври 2018 год. <a
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
                        <li><a href="#section-join" data-href="#section-join"><div>Вклучете се</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Партнери</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Контакт</div></a></li>
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
                            <h4>Што?</h4>
                        </div>

                        <p>Европската недела на кодирање е иницијатива на пошироко членство чија цел е да го приближи кодирањето и дигиталната писменост до секого на забавен и интересен начин. </p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Кога?</h4>
                        </div>

                        <p>6-21 октомври 2018 год.</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Зошто?</h4>
                        </div>

                        <p>Учењето да кодираме ни помага да ја согледаме смислата на светот што рапидно се менува околу нас, да го прошириме разбирањето за тоа како функционира технологијата и да развиваме вештини и способности да истражуваме нови идеи и да иновираме.</p>



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
                    <h2>Вклучете се!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Организирајте активност</h4>
                        </div>

                        <p>Станете дел од Неделата на кодирање со организирање активност. Направете разлика со инспирирање и мотивирање други.</p>

                        <p>Секој е добредојден да организира активност. Само изберете тема и целна публика и <a
                                    href="/add">додадете ја вашата активност</a> на <a
                                    href="/events">мапата</a>. Може дури и да ја користите нашата <a
                                    href="/guide">програмска алатка за организатори</a> за да започнете.</p>

                        <p>Ако ви е потребна помош или имате прашање може да се обратите кај <a
                                    href="/ambassadors">Амбасадорите на Европската недела на кодирање</a> во вашата земја.</p><a href="/events" class="button button-border button-rounded button-large">Станете организатор</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Придружете се на активност</h4>
                        </div>

                        <p>Кодирањето е за сите. Пробајте нешто ново и откријте ја забавата на кодирање со придружување <a
                                    href="/events">на активност блиску до вас</a>.</p>

                        <p>Има многу настани за секоја возраст и за различни теми. Учеството е бесплатно и нема предуслови.</p>

                        <p>Исто така постои <a href="/resources/">список на ресурси</a> за да ви помогне  веднаш да започнете со кодирање на интернет.</p><a href="/events" class="button button-border button-rounded button-large">Пребарувајте активност</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Распространете ја веста</h4>
                        </div>

                        <p>Помогнете и на каузата со <a href="http://blog.codeweek.eu">ширење на зборот</a> за повеќе луѓе да може да дознаат за Неделата на кодирање. Ако познавате луѓе што би биле расположени да организираат настан, информирајте ги за Неделата на кодирање.</p>

                        <p>Имате за споделување инспиративна приказна? <a href="http://blog.codeweek.eu/submit">Објавете ја на нашиот блог</a> и ние ќе ја споделиме.</p>

                        <p>Ние сме на Twitter како <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, на <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> и го користиме <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a> хаштагот.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Погледнете што се случува</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Партнери и спонзори</h2><span>Помогнете ни да го прошириме опфатот и влијанието на Неделата на кодирање</span><p>Неделата на кодирање е иницијатива на пошироко членство управувано од волонтери кои достигаат до стотици илјади луѓе низ светот. Постојано бараме партнери и спонзори да ни помогнат да се шириме. Ако сакате да бидете дел од нашата заедница и да ги спонзорирате нашите активности, обратете ни се.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Остварете контакт</a></p>
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
                                        src="img/partners/colabora_PublicLibraries2020.png" alt="Јавни библиотеки 2020"></a></li>
                        <li><a href="http://ec.europa.eu/digital-agenda/en/grand-coalition-digital-jobs-0"><img
                                        src="img/partners/digital-skills.png"
                                        alt="Голема коалиција за дигитални работи"></a></li>
                        <li><a href="http://coderdojo.org"><img src="img/partners/colabora_coderdojo.png"
                                                                alt="CoderDojo"></a></li>
                        <li><a href="http://www.africacodeweek.org/"><img src="img/partners/colabora_africacodeweek.png"
                                                                          alt="Африканска недела на кодирање"></a></li>
                        <li><a href="http://www.allyouneediscode.eu/"><img src="img/partners/colabora_aynic.png"
                                                                           alt="Сѐ што ви е потребно е код"></a></li>
                        <li><a href="http://www.eun.org/"><img src="img/partners/colabora_eun.png"
                                                               alt="European Schoolnet"></a></li>
                        <li><a href="http://scratch.mit.edu/codeweekeu"><img src="img/partners/colabora_scratch.png"
                                                                             alt="Scratch"></a></li>
                        <li><a href="http://www.ictinpractice.com/"><img src="img/partners/colabora_ict-in-practice.png"
                                                                         alt="ИКТ во пракса"></a></li>
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
                    <h2>Остварете контакт со нас</h2><span>Сѐ уште имате прашања? Едноставно <a href="mailto:info@codeweek.eu">пишете ни</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')<script>
        window.$(function ($) {
            var newDate = new Date(2018, 9, 6);
            $('#countdown-ex1').countdown({until: newDate});
        });
    </script>@endpush @section('extra-css')<style>

        .section-intro, .section-banner {

            background: transparent;

        }


    </style>@endsection