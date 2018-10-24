@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Creaci&oacute;n de juegos educativos con Scratch</h1><span>Por Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>El pensamiento cr&iacute;tico, la persistencia, la resoluci&oacute;n de problemas, el pensamiento computacional y la creatividad no son m&aacute;s que algunas de las competencias fundamentales que tus alumnos necesitan para tener &eacute;xito en el siglo&nbsp;XXI, y la programaci&oacute;n puede ayudarte a lograr esto de una forma divertida y motivadora.</p>

                    <p>Las nociones algor&iacute;tmicas de control de flujo por medio de secuencias de instrucciones y bucles, la representaci&oacute;n de datos por medio de variables y listas o la sincronizaci&oacute;n de procesos pueden sonar como conceptos complicados, pero en este v&iacute;deo ver&aacute;s que son m&aacute;s f&aacute;ciles de aprender de lo que te imaginas.</p>

                    <p>En este v&iacute;deo, Jes&uacute;s Moreno Le&oacute;n, un profesor de inform&aacute;tica e investigador de Espa&ntilde;a, te explicar&aacute; c&oacute;mo puedes desarrollar estas y otras competencias en tus alumnos mientras todos pas&aacute;is un buen momento. ¿C&oacute;mo puede hacerse esto? Creando un juego de preguntas y respuestas en Scratch, el lenguaje de programaci&oacute;n m&aacute;s famoso de los utilizados en los centros escolares de todo el mundo. Scratch no solo potencia el pensamiento computacional, sino que tambi&eacute;n permite introducir elementos de gamificaci&oacute;n en el aula para mantener a los alumnos motivados mientras aprenden y se divierten.</p>

                    <p>&Eacute;chale un vistazo al v&iacute;deo para ver c&oacute;mo empezar:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Descargar el guion del v&iacute;deo</a></p>

                    <h2>¿Est&aacute;s preparado/a para compartir con tus alumnos lo que has aprendido?</h2>

                    <p>Selecciona uno de los planes de aprendizaje que figuran a continuaci&oacute;n y organiza una actividad con tus alumnos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Actividad 1. Juego de preguntas y respuestas con Scratch para centros de ense&ntilde;anza primaria</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Actividad 2. Juego de preguntas y respuestas con Scratch para centros de ense&ntilde;anza secundaria (primer ciclo)</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Actividad 3. Juego de preguntas y respuestas con Scratch para centros de ense&ntilde;anza secundaria</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection