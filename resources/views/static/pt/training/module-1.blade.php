@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programa&ccedil;&atilde;o sem recurso a computadores (<i>unplugged</i>)</h1><span>por Alessandro Bogliolo</span></div>

                    <hr>

                    <p>A programa&ccedil;&atilde;o &eacute; a linguagem das coisas, permitindo-nos escrever programas para atribuir novas funcionalidades &agrave;s dezenas de milhares de milh&otilde;es de objetos program&aacute;veis que nos rodeiam. A programa&ccedil;&atilde;o &eacute; a forma mais r&aacute;pida de dar vida &agrave;s nossas ideias e a forma mais eficaz de desenvolver compet&ecirc;ncias ao n&iacute;vel do pensamento computacional. No entanto, a tecnologia n&atilde;o &eacute; rigorosamente necess&aacute;ria para o desenvolvimento do pensamento computacional. Pelo contr&aacute;rio, as nossas compet&ecirc;ncias na esfera do pensamento computacional s&atilde;o essenciais para que a tecnologia possa funcionar.</p>

                    <p>Neste v&iacute;deo, Alessandro Bogliolo, professor de sistemas inform&aacute;ticos na It&aacute;lia e coordenador da Semana Europeia da Programa&ccedil;&atilde;o, apresentar&aacute; atividades de programa&ccedil;&atilde;o que podem ser levadas a cabo sem recurso a qualquer dispositivo eletr&oacute;nico. O objetivo principal das atividades sem recurso a computadores &eacute; reduzir os entraves que limitam a inclus&atilde;o da programa&ccedil;&atilde;o em todas as escolas, independentemente do financiamento e do equipamento.</p>

                    <p>As atividades de programa&ccedil;&atilde;o sem recurso a computadores permitem descobrir os aspetos inform&aacute;ticos do mundo f&iacute;sico que nos rodeia.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Descarregue o gui&atilde;o do v&iacute;deo</a></p>

                    <h2>Est&aacute; pronto para partilhar com os seus alunos o que aprendeu?</h2>

                    <p>Selecione um dos planos de aula abaixo e organize uma atividade com seus alunos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Atividade 1 &mdash; CodyRoby para o primeiro ciclo do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Atividade 2 &mdash; CodyRoby para o segundo e terceiro ciclos do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Atividade 3 &mdash; CodyRoby para o ensino secund&aacute;rio</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection