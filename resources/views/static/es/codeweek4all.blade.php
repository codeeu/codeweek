@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Reto CodeWeek4All</h1><span></span></div>

                    <hr>

                    <p>El reto CodeWeek4All te anima a vincular tus actividades con otras organizadas por amigos, compa&ntilde;eros y conocidos, y conseguir juntos el Certificado de Excelencia de la Semana de la Programaci&oacute;n.</p>


                    <simple-question :visible="true">
                        <template slot="title">¿Qu&eacute; es?</template>
                        <template slot="content">
                            <p>Adem&aacute;s de a&ntilde;adir tu actividad al mapa de la Semana de la Programaci&oacute;n de la UE, tambi&eacute;n puedes involucrar a otros miembros de tu red para que hagan lo mismo. ¡Si tu alianza y t&uacute; cumpl&iacute;s uno de los siguientes criterios, todos obtendr&eacute;is el Certificado de Excelencia de la Semana de la Programaci&oacute;n!</p>
                            <p>Criterios para obtener el Certificado de Excelencia:</p>
                            <ul>
                                <li><strong>la participaci&oacute;n de 500 alumnos</strong></li>o<li><strong>la vinculaci&oacute;n de diez actividades</strong></li>o<li><strong>la implicaci&oacute;n de tres pa&iacute;ses.</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">¿C&oacute;mo participar?</template>
                        <template slot="content">
                            <ol>
                                <li>Visita la p&aacute;gina <a href="/add">A&ntilde;adir una actividad</a> y completa la informaci&oacute;n requerida de tu actividad de programaci&oacute;n.</li>
                            </ol><i>Si eres la primera persona de la alianza:</i><ol start="2">
                                <li>Pulsa en «A&ntilde;adir un evento»</li>
                                <li>Una vez que tu actividad haya sido aceptada, recibir&aacute;s un correo electr&oacute;nico de confirmaci&oacute;n con un c&oacute;digo &uacute;nico CodeWeek4All.</li>
                                <li>Copia el c&oacute;digo y comp&aacute;rtelo con los miembros de tu red que tambi&eacute;n organicen una actividad de programaci&oacute;n. ¡Corre la voz para animar a otras personas a participar!</li>
                                <li>Tras la finalizaci&oacute;n de la campa&ntilde;a, se pedir&aacute; a todos los organizadores de actividades que informen sobre el n&uacute;mero de participantes. ¡Si hab&eacute;is conseguido cumplir alguno de los criterios, t&uacute; y todos los miembros de tu red recibir&eacute;is el Certificado de Excelencia!</li>
                            </ol><i>Si vas a unirte a una alianza que ya existe:</i><ol start="2">
                                <li>Pega el c&oacute;digo de acceso que hayas recibido del promotor, la persona que haya creado la alianza, en el campo «c&oacute;digo CodeWeek4All».</li>
                                <li>Pulsa Agregar un evento</li>
                                <li>Corre la voz (¡y el c&oacute;digo!) para conseguir que m&aacute;s organizadores se unan a tu alianza</li>
                                <li>Tras la finalizaci&oacute;n de la campa&ntilde;a, se pedir&aacute; a todos los organizadores de actividades que informen sobre el n&uacute;mero de participantes. ¡Si hab&eacute;is conseguido cumplir alguno de los criterios, t&uacute; y todos los miembros de tu red recibir&eacute;is el Certificado de Excelencia!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">¿Por qu&eacute; unirse al reto?</template>
                        <template slot="content">
                            <ul>
                                <li>Para difundir el mensaje sobre la importancia de la programaci&oacute;n.</li>
                                <li>Para ver c&oacute;mo un gran n&uacute;mero de estudiantes se involucran.</li>
                                <li>Para establecer conexiones con organizaciones o escuelas en tu comunidad o a escala internacional.</li>
                                <li>Para conseguir el apoyo de otros organizadores y profesores.</li>
                                <li>Para obtener el <strong>Certificado de Excelencia.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection