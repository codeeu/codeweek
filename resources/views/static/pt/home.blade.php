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

                <div class="menu-title">Semana <span>Europeia</span> da Programa&ccedil;&atilde;o</div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Participe</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Parceiros</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Contacto</div></a></li>
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
                            <h4>O qu&ecirc;?</h4>
                        </div>

                        <p>A Semana Europeia da Programa&ccedil;&atilde;o &eacute; uma iniciativa popular que visa levar a programa&ccedil;&atilde;o e a literacia digital a todos de uma forma divertida e atrativa.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Quando?</h4>
                        </div>

                        <p>6-21 de outubro de 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Porqu&ecirc;?</h4>
                        </div>

                        <p>Aprender a programar ajuda-nos a entender o mundo em r&aacute;pida evolu&ccedil;&atilde;o &agrave; nossa volta, a expandir o nosso conhecimento sobre o funcionamento da tecnologia e a desenvolver compet&ecirc;ncias e capacidades para explorar novas ideias e inovar.</p>



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
                    <h2>Participe!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organize uma atividade</h4>
                        </div>

                        <p>Fa&ccedil;a parte da Semana Europeia da Programa&ccedil;&atilde;o organizando uma atividade. Fa&ccedil;a a diferen&ccedil;a inspirando e motivando outras pessoas.</p>

                        <p>Qualquer pessoa pode organizar uma atividade. Basta escolher um tema e um p&uacute;blico-alvo e <a
                                    href="/add">adicionar a sua atividade</a> ao <a
                                    href="/events">mapa</a>. Pode at&eacute; utilizar o nosso <a
                                    href="/guide">conjunto de ferramentas para organizadores</a> para come&ccedil;ar.</p>

                        <p>Caso necessite de ajuda ou tenha alguma d&uacute;vida, pode contactar os <a
                                    href="/ambassadors">embaixadores da Semana Europeia da Programa&ccedil;&atilde;o</a> no seu pa&iacute;s.</p><a href="/events" class="button button-border button-rounded button-large">Torne-se um organizador</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Participe numa atividade</h4>
                        </div>

                        <p>A programa&ccedil;&atilde;o &eacute; para todos. Experimente algo novo e descubra como &eacute; divertido programar participando numa <a
                                    href="/events">atividade perto de si</a>.</p>

                        <p>H&aacute; muitos eventos para qualquer idade, bem como uma s&eacute;rie de temas. A participa&ccedil;&atilde;o &eacute; gratuita e n&atilde;o est&aacute; sujeita a condi&ccedil;&otilde;es pr&eacute;vias</p>

                        <p>H&aacute; tamb&eacute;m uma <a href="/resources/">lista de recursos</a> para ajud&aacute;-lo a iniciar-se na programa&ccedil;&atilde;o em linha agora mesmo.</p><a href="/events" class="button button-border button-rounded button-large">A&ccedil;&otilde;es na Web</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Divulgar</h4>
                        </div>

                        <p>Ajude a causa <a href="http://blog.codeweek.eu">espalhando a palavra</a> para que mais pessoas possam ficar a conhecer a Semana da Programa&ccedil;&atilde;o. Se conhece pessoas que poderiam ter interesse em organizar um evento, informe-as sobre a Semana da Programa&ccedil;&atilde;o.</p>

                        <p>Tem uma hist&oacute;ria inspiradora para partilhar? <a href="http://blog.codeweek.eu/submit">Publique-a no nosso blogue</a> e n&oacute;s iremos partilh&aacute;-la.</p>

                        <p>Estamos no Twitter com o nome <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, no <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> e utilizamos a hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Fique a par dos acontecimentos</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Parceiros e Patrocinadores</h2><span>Ajude-nos a alargar o alcance e o impacto da Semana da Programa&ccedil;&atilde;o</span><p>A Semana da Programa&ccedil;&atilde;o &eacute; uma iniciativa de base levada a cabo por volunt&aacute;rios que chega a centenas de milhares de pessoas em todo o mundo. Procuramos constantemente parceiros e patrocinadores para nos ajudar a expandir. Se desejar fazer parte da nossa comunidade e patrocinar as nossas atividades, contacte-nos.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Contacte</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Contacte-nos</h2><span>Ainda tem d&uacute;vidas? <a href="mailto:info@codeweek.eu">Envie-nos</a> as suas quest&otilde;es.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection