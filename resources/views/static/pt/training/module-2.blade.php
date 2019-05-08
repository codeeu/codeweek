@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Pensamento computacional e resolu&ccedil;&atilde;o de problemas</h1><span>por Miles Berry</span></div>

                    <hr>

                    <p>O pensamento computacional (CT) descreve uma forma de analisar problemas e sistemas de modo que um computador possa ser utilizado para ajudar-nos a resolv&ecirc;-los ou a compreend&ecirc;-los. O pensamento computacional n&atilde;o &eacute; apenas essencial para o desenvolvimento de programas de computador, como tamb&eacute;m pode ser utilizado para apoiar a resolu&ccedil;&atilde;o de problemas em todas as disciplinas.</p>

                    <p>Pode ensinar CT aos seus alunos levando-os a: decompor problemas complexos em n&iacute;veis de menor complexidade (decomposi&ccedil;&atilde;o), reconhecer padr&otilde;es (reconhecimento de padr&otilde;es), identificar os pormenores relevantes para a resolu&ccedil;&atilde;o de um problema (abstra&ccedil;&atilde;o); ou definindo as regras ou instru&ccedil;&otilde;es a seguir para alcan&ccedil;ar o resultado desejado (obten&ccedil;&atilde;o de algoritmos). O CT pode ser ensinado em diferentes disciplinas, por exemplo, na matem&aacute;tica (compreender as regras de resolu&ccedil;&atilde;o de polin&oacute;mios de 2.º&nbsp;grau), na literatura (dividir a an&aacute;lise de um poema em an&aacute;lise da m&eacute;trica, da rima e da estrutura), nas l&iacute;nguas (encontrar padr&otilde;es na termina&ccedil;&atilde;o de um verbo que afetam a sua ortografia nos diferentes tempos verbais), bem como em muitas outras.</p>

                    <p>Neste v&iacute;deo, Miles Berry, assistente principal da Escola de Educa&ccedil;&atilde;o da Universidade de Roehampton, em Guildford (Reino Unido), apresentar&aacute; o conceito de pensamento computacional e as diferentes formas atrav&eacute;s das quais um professor pode integr&aacute;-lo na sala de aula com jogos simples.</p>

                    @include('static.youtube', ['video_id' => 'Nc-V948dXWI'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-16-PT-TRA-00.DOCX">Descarregue o gui&atilde;o do v&iacute;deo</a></p>

                    <h2>Est&aacute; pronto para partilhar com os seus alunos o que aprendeu?</h2>

                    <p>Selecione um dos planos de aula abaixo e organize uma atividade com seus alunos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-04-PT-TRA-00.DOCX">Atividade 1 &mdash; Desenvolvimento do racioc&iacute;nio matem&aacute;tico para o primeiro ciclo do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-05-PT-TRA-00.DOCX">Atividade 2 &mdash; Conhecimento de algoritmos para o segundo e terceiro ciclos do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-06-PT-TRA-00.DOCX">Atividade 3 &mdash; Algoritmos para o ensino secund&aacute;rio</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection