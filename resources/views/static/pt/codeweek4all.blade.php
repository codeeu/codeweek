@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Desafio Code Week 4 All</h1><span></span></div>

                    <hr>

                    <p>O desafio Code Week 4 All incentiva os participantes a ligarem as suas atividades a atividades organizadas por amigos, colegas e conhecidos para, juntos, conquistarem o Certificado de Excel&ecirc;ncia da Semana da Programa&ccedil;&atilde;o.</p>


                    <simple-question :visible="true">
                        <template slot="title">O que &eacute;?</template>
                        <template slot="content">
                            <p>Para al&eacute;m de inscreverem as suas atividades no mapa da Semana Europeia da Programa&ccedil;&atilde;o, os participantes tamb&eacute;m podem incentivar outros elementos das respetivas redes a fazerem o mesmo. Se o participante e a respetiva alian&ccedil;a alcan&ccedil;arem uma das seguintes metas, conquistar&atilde;o todos o Certificado de Excel&ecirc;ncia da Semana da Programa&ccedil;&atilde;o!</p>
                            <p>Crit&eacute;rios para conquistar o Certificado de Excel&ecirc;ncia:</p>
                            <ul>
                                <li><strong>Participa&ccedil;&atilde;o de 500 alunos</strong></li>e/ou<li><strong>Liga&ccedil;&atilde;o de 10 atividades</strong></li>e/ou<li><strong>Envolvimento de 3 pa&iacute;ses</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Como posso participar?</template>
                        <template slot="content">
                            <ol>
                                <li>Visite a p&aacute;gina <a href="/add">Adicionar Evento</a> e preencha os dados necess&aacute;rios relativos &agrave; sua atividade de programa&ccedil;&atilde;o.</li>
                            </ol><i>Se for o primeiro da sua alian&ccedil;a:</i><ol start="2">
                                <li>Clique em Enviar.</li>
                                <li>Assim que a sua atividade for aceite, receber&aacute; uma mensagem de correio eletr&oacute;nico de confirma&ccedil;&atilde;o com o seu c&oacute;digo "Code Week 4 All" &uacute;nico.</li>
                                <li>Copie o c&oacute;digo e partilhe-o com os seus colegas e outras pessoas conhecidas que tamb&eacute;m estejam a organizar uma atividade de programa&ccedil;&atilde;o. Espalhe a palavra para incentivar outros a participar!</li>
                                <li>Terminada a campanha, todos os organizadores de atividades ser&atilde;o convidados a declarar o n&uacute;mero de participantes que angariaram. Caso tenha conseguido alcan&ccedil;ar a meta, receber&aacute; o Certificado de Excel&ecirc;ncia, juntamente com os seus colegas que tenham participado na sua rede!</li>
                            </ol><i>Se pretender juntar-se a uma alian&ccedil;a existente:</i><ol start="2">
                                <li>Cole o c&oacute;digo que recebeu do iniciador da atividade, o primeiro a criar a alian&ccedil;a, na c&eacute;lula C&Oacute;DIGO CODE WEEK 4 ALL.</li>
                                <li>Clique em Enviar.</li>
                                <li>Passe a palavra (e o c&oacute;digo!) para que mais organizadores se juntem &agrave; sua alian&ccedil;a.</li>
                                <li>Terminada a campanha, todos os organizadores de atividades ser&atilde;o convidados a declarar o n&uacute;mero de participantes que angariaram. Caso tenha conseguido alcan&ccedil;ar a meta, receber&aacute; o Certificado de Excel&ecirc;ncia, juntamente com os seus colegas que tenham participado na sua rede!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Porqu&ecirc; aceitar o desafio?</template>
                        <template slot="content">
                            <ul>
                                <li>Para divulgar a import&acirc;ncia da programa&ccedil;&atilde;o.</li>
                                <li>Para envolver um grande n&uacute;mero de alunos.</li>
                                <li>Para estabelecer liga&ccedil;&otilde;es com organiza&ccedil;&otilde;es e/ou escolas, quer na sua comunidade, quer a n&iacute;vel internacional.</li>
                                <li>Para obter apoio de outros organizadores e professores.</li>
                                <li>Para ganhar um <strong>Certificado de Excel&ecirc;ncia</strong>.</li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection