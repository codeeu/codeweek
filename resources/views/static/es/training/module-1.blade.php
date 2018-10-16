@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programaci&oacute;n sin ordenadores (anal&oacute;gica)</h1><span>Por Alessandro Bogliolo</span></div>

                    <hr>

                    <p>La programaci&oacute;n es el lenguaje de las cosas y nos permite escribir programas para darle nuevas funcionalidades a los innumerables objetos programables que nos rodean. La programaci&oacute;n es la forma m&aacute;s r&aacute;pida de hacer realidad nuestras ideas y la manera m&aacute;s eficaz de desarrollar capacidades de pensamiento computacional. Sin embargo, la propia tecnolog&iacute;a no es un requisito indispensable para desarrollar el pensamiento computacional. En su lugar, las capacidades de pensamiento computacional son esenciales para hacer funcionar la tecnolog&iacute;a.</p>

                    <p>En este v&iacute;deo, Alessandro Bogliolo, profesor de sistemas inform&aacute;ticos en Italia y coordinador de la Semana de la Programaci&oacute;n de la UE, presenta actividades de programaci&oacute;n anal&oacute;gica que se pueden practicar sin necesidad de ning&uacute;n dispositivo electr&oacute;nico. El principal objetivo de estas actividades «anal&oacute;gicas» es reducir las barreras al acceso y llevar la programaci&oacute;n a todos los centros escolares, con independencia de la financiaci&oacute;n y los equipos disponibles.</p>

                    <p>Las actividades de programaci&oacute;n anal&oacute;gica revelan los aspectos computacionales del mundo f&iacute;sico que nos rodea.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Descargar el guion del v&iacute;deo</a></p>

                    <h2>¿Est&aacute;s preparado/a para compartir con tus alumnos lo que has aprendido?</h2>

                    <p>Selecciona uno de los planes de aprendizaje que figuran a continuaci&oacute;n y organiza una actividad con tus alumnos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Actividad 1. CodyRoby para centros de ense&ntilde;anza primaria</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Actividad 2. CodyRoby para centros de ense&ntilde;anza secundaria (primer ciclo)</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Actividad 3. CodyRoby para centros de ense&ntilde;anza secundaria</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection