@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programaci&oacute;n visual. Introducci&oacute;n a Scratch</h1><span>Por Margo Tinawi</span></div>

                    <hr>

                    <p>La programaci&oacute;n visual permite a las personas describir procesos por medio de ilustraciones o gr&aacute;ficos. Habitualmente hablamos de la programaci&oacute;n visual en oposici&oacute;n a la programaci&oacute;n basada en texto. Los lenguajes de programaci&oacute;n visual (LPV) est&aacute;n especialmente bien adaptados como introducci&oacute;n al pensamiento algor&iacute;tmico para ni&ntilde;os (e incluso para adultos). Con los LPV, hay menos que leer y ninguna sintaxis que aplicar.</p>

                    <p>En este v&iacute;deo, Margo Tinawi, profesora de desarrollo web en Le Wagon y cofundadora de Techies Lab asbl (B&eacute;lgica) nos ayudar&aacute; a descubrir Scratch, uno de los LPV m&aacute;s populares y usado en todo el mundo. Scratch fue desarrollado por el Instituto Tecnol&oacute;gico de Massachusetts (MIT) en 2002 y desde entonces se ha creado una gran comunidad en torno a &eacute;l, donde puedes encontrar millones de proyectos que replicar con tus alumnos as&iacute; como innumerables tutoriales en diversos idiomas.</p>

                    <p>No necesitas ninguna experiencia en programaci&oacute;n para usar Scratch y puedes usarlo en cualquiera de las asignaturas. Por ejemplo, al usar Scratch como herramienta digital para narrar historias, los alumnos pueden crear historias, ilustrar un problema matem&aacute;tico u organizar un concurso art&iacute;stico para aprender sobre el patrimonio cultural a la vez que aprenden programaci&oacute;n y pensamiento computacional y, lo m&aacute;s importante de todo, divirti&eacute;ndose mientras lo hacen.</p>

                    <p>Scratch es una herramienta gratuita, muy intuitiva y motivadora para tus alumnos. &Eacute;chale un vistazo al v&iacute;deo de Margo para ver c&oacute;mo empezar.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Descargar el guion del v&iacute;deo</a></p>

                    <h2>¿Est&aacute;s preparado/a para compartir con tus alumnos lo que has aprendido?</h2>

                    <p>Selecciona uno de los planes de aprendizaje que figuran a continuaci&oacute;n y organiza una actividad con tus alumnos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Actividad 1. Scratch b&aacute;sico para centros de ense&ntilde;anza primaria</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Actividad 2. Scratch b&aacute;sico para centros de ense&ntilde;anza secundaria (primer ciclo)</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Actividad 3. Scratch b&aacute;sico para centros de ense&ntilde;anza secundaria</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection