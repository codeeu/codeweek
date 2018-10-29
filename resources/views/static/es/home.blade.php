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
                                        href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#Codeweek</a></p>
                        </div>
                    </div>
                </div>
            </div><a href="#" data-scrollto="#section-codeweek" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a></div>


    </div><!-- Page Sub Menu --><div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title">Semana de la Programaci&oacute;n de la <span>UE</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Participa</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Socios</div></a></li>
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
                            <h4>¿Qu&eacute; es?</h4>
                        </div>

                        <p>La Semana de la Programaci&oacute;n de la UE es una iniciativa de base que tiene como objetivo acercar la programaci&oacute;n y el alfabetismo digital de una forma divertida e interesante.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>¿Cu&aacute;ndo?</h4>
                        </div>

                        <p>Del 6 al 21 de octubre de 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>¿Por qu&eacute;?</h4>
                        </div>

                        <p>Aprender a programar nos ayuda a darle sentido al mundo en constante cambio que nos rodea, a conocer mejor c&oacute;mo funciona la tecnolog&iacute;a y a desarrollar capacidades y competencias que nos permitan explorar ideas nuevas e innovar.</p>



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
                    <h2>¡Participa!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Organiza una actividad</h4>
                        </div>

                        <p>Impl&iacute;cate en la Semana de la Programaci&oacute;n organizando una actividad. Marca la diferencia inspirando y motivando a los dem&aacute;s.</p>

                        <p>Todo aquel que lo desee puede organizar una actividad. Simplemente elige un tema, un p&uacute;blico destinatario y <a
                                    href="/add">a&ntilde;ade tu actividad</a> <a
                                    href="/events">al mapa</a>. Incluso puedes usar nuestro <a
                                    href="/guide">paquete de herramientas para organizadores</a> y empezar desde ah&iacute;.</p>

                        <p>Si necesitas ayuda o tienes alguna pregunta, puedes ponerte en contacto con los <a
                                    href="/ambassadors">embajadores de la Semana de la Programaci&oacute;n de la UE</a> de tu pa&iacute;s.</p><a href="/events" class="button button-border button-rounded button-large">Convertirte en organizador</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Inscribirte en una actividad</h4>
                        </div>

                        <p>Cualquiera puede programar. Prueba a hacer algo nuevo y descubre lo divertido que es programar inscribi&eacute;ndote en <a
                                    href="/events">una actividad que se celebre en tu zona</a>.</p>

                        <p>Hay muchos eventos para participantes de cualquier edad y sobre una amplia variedad de temas. La participaci&oacute;n es gratuita y no existe ning&uacute;n requisito previo.</p>

                        <p>Tambi&eacute;n ofrecemos una <a href="/resources/">lista de recursos</a> en l&iacute;nea para ayudarte a empezar a programar ya mismo.</p><a href="/events" class="button button-border button-rounded button-large">Consulta las actividades</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Difunde la informaci&oacute;n</h4>
                        </div>

                        <p>Ayuda a la causa <a href="http://blog.codeweek.eu">difundiendo la informaci&oacute;n</a> para que otras personas puedan conocer la Semana de la Programaci&oacute;n. Si conoces a alguien que pueda estar interesado/a en organizar un evento, inf&oacute;rmale sobre la Semana de la Programaci&oacute;n.</p>

                        <p>¿Tienes una historia inspiradora que compartir? <a href="http://blog.codeweek.eu/submit">Publ&iacute;cala en nuestro blog</a> y la compartiremos.</p>

                        <p>Estamos en Twitter con el usuario <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, en <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> y usamos la etiqueta <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#Codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Consulta lo que est&aacute; sucediendo</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Socios y patrocinadores</h2><span>Ay&uacute;danos a ampliar el alcance y el impacto de la Semana de la Programaci&oacute;n</span><p>La Semana de la Programaci&oacute;n es una iniciativa de base dirigida por voluntarios que tiene un alcance de cientos de miles de personas en todo el mundo. Estamos buscando constantemente socios y patrocinadores que nos ayuden a ampliar estas actividades. Si deseas formar parte de nuestra comunidad y patrocinar nuestras actividades, no dudes en ponerte en contacto con nosotros.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">Contacta con nosotros</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Ponte en contacto con nosotros</h2><span>¿Tienes alguna duda? Tan solo tienes que <a href="mailto:info@codeweek.eu">escribirnos</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection