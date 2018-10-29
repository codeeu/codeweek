@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Pensamiento computacional y resoluci&oacute;n de problemas</h1><span>Por Miles Berry</span></div>

                    <hr>

                    <p>El t&eacute;rmino «pensamiento computacional» hace referencia a una forma de abordar los problemas y los sistemas de forma que pueda utilizarse un ordenador para ayudarnos a solucionarlos o a comprenderlos. Este pensamiento no solo es fundamental para desarrollar programas de ordenador, sino que tambi&eacute;n puede utilizarse como ayuda para la resoluci&oacute;n de problemas en cualquier otra disciplina.</p>

                    <p>Puedes ense&ntilde;ar pensamiento computacional a tus alumnos ayud&aacute;ndoles a dividir problemas complejos en otros m&aacute;s peque&ntilde;os (descomposici&oacute;n), a reconocer patrones (identificaci&oacute;n de patrones), a identificar los aspectos relevantes para resolver un problema (abstracci&oacute;n) o a establecer las normas o instrucciones que deben seguirse para alcanzar el efecto deseado (dise&ntilde;o de un algoritmo). El pensamiento computacional puede ense&ntilde;arse en distintas disciplinas, por ejemplo en Matem&aacute;ticas (descubrir las reglas para factorizar polinomios de segundo grado), en Literatura (descomponer el an&aacute;lisis de un poema en un an&aacute;lisis de la m&eacute;trica, la rima y la estructura), en Idiomas (buscar patrones en las letras finales de un verbo que afecten a su escritura a medida que cambia el tiempo verbal), y muchos otras.</p>

                    <p>En este v&iacute;deo, Miles Berry, profesor titular de la Escuela de Educaci&oacute;n de la Universidad de Roehampton en Guildford (el Reino Unido) presenta el concepto de pensamiento computacional y las distintas formas en que un profesor puede integrarlo en el aula a trav&eacute;s de sencillos juegos.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Descargar el guion del v&iacute;deo</a></p>

                    <h2>¿Est&aacute;s preparado/a para compartir con tus alumnos lo que has aprendido?</h2>

                    <p>Selecciona uno de los planes de aprendizaje que figuran a continuaci&oacute;n y organiza una actividad con tus alumnos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Actividad 1. Desarrollo del razonamiento matem&aacute;tico para centros de ense&ntilde;anza primaria</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Actividad 2. Introducci&oacute;n a los algoritmos para centros de ense&ntilde;anza secundaria (primer ciclo)</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Actividad 3. Algoritmos para centros de ense&ntilde;anza secundaria (segundo ciclo)</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection