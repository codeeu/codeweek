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
                        <li><a href="#section-join" data-href="#section-join"><div>Вземете участие</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Партньори</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>За връзка</div></a></li>
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
                            <h4>Какво?</h4>
                        </div>

                        <p>Европейската седмица на програмирането е инициатива, насочена към гражданите, която има за цел да представи програмирането и цифровата грамотност на всички по забавен и развлекателен начин.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Кога?</h4>
                        </div>

                        <p>6&mdash;21&nbsp;октомври&nbsp;2018&nbsp;г.</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Защо?</h4>
                        </div>

                        <p>Усвояването на програмирането ни помага да разбираме бързо променящия се заобикалящ ни свят, да научим повече за начина на работа на технологиите и да развиваме умения и възможности, за да проучваме нови идеи и да създаваме иновации.</p>



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
                    <h2>Вземете участие!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Организирайте събитие</h4>
                        </div>

                        <p>Станете част от Седмицата на програмирането, като организирате събитие. Дайте своя принос, като вдъхновите и мотивирате други хора.</p>

                        <p>Всеки е добре дошъл да организира събитие. Просто изберете тема и целева аудитория и <a
                                    href="/add">добавете своето събитие</a> в <a
                                    href="/events">картата</a>. Дори можете да използвате нашия <a
                                    href="/guide">набор от инструменти за организатори</a>, за да започнете.</p>

                        <p>Ако се нуждаете от помощ или имате бърз въпрос, можете да се свържете с <a
                                    href="/ambassadors">посланиците на Европейската седмица на програмирането</a> във вашата държава.</p><a href="/events" class="button button-border button-rounded button-large">Станете организатор</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Присъединете се към събитие</h4>
                        </div>

                        <p>Програмирането е за всеки. Опитайте нещо ново и опознайте забавната страна на програмирането, като се включите в <a
                                    href="/events">събитие близо до вас</a>.</p>

                        <p>Има множество събития за всяка възраст и на различни теми. Участието е безплатно и няма предварителни условия.</p>

                        <p>Има също и <a href="/resources/">списък с ресурси</a>, който да ви помогне да започнете да се занимавате с програмиране онлайн още сега.</p><a href="/events" class="button button-border button-rounded button-large">Потърсете събитие</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Разпространете информацията</h4>
                        </div>

                        <p>Помогнете на каузата, като <a href="http://blog.codeweek.eu">разпространите информация</a>, за да могат повече хора да научат за Седмицата на програмирането. Ако познавате хора, които биха желали да организират събитие, дайте им информация за Седмицата на програмирането.</p>

                        <p>Можете да споделите вдъхновяваща история? <a href="http://blog.codeweek.eu/submit">Публикувайте я в нашия блог</a> и ние ще я споделим.</p>

                        <p>Ние сме в Twitter като <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, във <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> и използваме хаштага <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Вижте какво се случва</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Партньори и спонсори</h2><span>Помогнете ни да повишим информираността за Седмицата на програмирането и да разширим нейното въздействие.</span><p>Седмицата на програмирането е инициатива, насочена към гражданите, ръководена от доброволци, която популяризира програмирането сред стотици хиляди хора по целия свят. Ние постоянно търсим партньори и спонсори, които да ни помагат да разширяваме дейността си. Ако желаете да бъдете част от нашата общност и да спонсорирате нашите събития, свържете се с нас.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Свържете се</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Свържете се с нас</h2><span>Имате още въпроси? Просто <a href="mailto:info@codeweek.eu">ни драснете няколко реда</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection