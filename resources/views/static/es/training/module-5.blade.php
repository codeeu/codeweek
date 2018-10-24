@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Hacer rob&oacute;tica y <i>tinkering</i> en el aula</h1><span>Por Tullia Urschitz</span></div>

                    <hr>

                    <p>La integraci&oacute;n en el curr&iacute;culo escolar de la programaci&oacute;n, el , la rob&oacute;tica y la microelectr&oacute;nica como herramientas de formaci&oacute;n y aprendizaje es fundamental para la ense&ntilde;anza del siglo&nbsp;XXI.</p>

                    <p>El uso del  y la rob&oacute;tica en los centros de ense&ntilde;anza tiene muchas ventajas para los estudiantes porque ayuda a desarrollar competencias fundamentales como la resoluci&oacute;n de problemas, el trabajo en equipo y la colaboraci&oacute;n. Tambi&eacute;n impulsa la creatividad y la confianza de los estudiantes, y puede ayudarles a desarrollar su perseverancia y determinaci&oacute;n a la hora de enfrentarse a retos. La rob&oacute;tica es, adem&aacute;s, un campo que promueve la integraci&oacute;n, ya que es f&aacute;cilmente accesible para un amplio abanico de estudiantes con distintos talentos y habilidades (tanto ni&ntilde;os como ni&ntilde;as), y adem&aacute;s influye de forma positiva sobre los estudiantes que se encuentran dentro del espectro del autismo.</p>

                    <p>&Eacute;chale un vistazo a este v&iacute;deo en el que Tullia Urschitz, embajadora cient&iacute;fica italiana y profesora de ciencia, tecnolog&iacute;a, ingenier&iacute;a y matem&aacute;ticas (CTIM) en Sant&rsquo;Ambrogio Di Valpolicella (Italia), nos ofrece algunos ejemplos pr&aacute;cticos sobre c&oacute;mo los profesores pueden integrar el  y la rob&oacute;tica en las aulas, convirtiendo as&iacute; a los alumnos pasivos en creadores entusiastas.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Descargar el guion del v&iacute;deo</a></p>

                    <h2>¿Est&aacute;s preparado/a para compartir con tus alumnos lo que has aprendido?</h2>

                    <p>Selecciona uno de los planes de aprendizaje que figuran a continuaci&oacute;n y organiza una actividad con tus alumnos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Actividad 1. C&oacute;mo hacer una mano mec&aacute;nica a partir de un tablero duro, para centros de ense&ntilde;anza primaria</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Actividad 2. C&oacute;mo hacer una mano mec&aacute;nica o rob&oacute;tica, para centros de ense&ntilde;anza secundaria (primer ciclo)</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Actividad 3. C&oacute;mo hacer una mano mec&aacute;nica o rob&oacute;tica, para centros de ense&ntilde;anza secundaria (segundo ciclo)</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection