@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Criar jogos did&aacute;ticos com o Scratch</h1><span>por Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>O pensamento cr&iacute;tico, a persist&ecirc;ncia, a resolu&ccedil;&atilde;o de problemas, o pensamento computacional e a criatividade s&atilde;o apenas algumas das compet&ecirc;ncias essenciais de que os seus alunos necessitam para ter sucesso no s&eacute;culo XXI, e a programa&ccedil;&atilde;o pode ajud&aacute;-lo no desenvolvimento destas compet&ecirc;ncias de uma forma divertida e motivante.</p>

                    <p>As no&ccedil;&otilde;es algor&iacute;tmicas de controlo de fluxo com recurso a sequ&ecirc;ncias de instru&ccedil;&otilde;es e <i>loops</i>, a representa&ccedil;&atilde;o de dados atrav&eacute;s de vari&aacute;veis e listas ou a sincroniza&ccedil;&atilde;o de processos podem parecer conceitos complicados, mas neste v&iacute;deo descobrir&aacute; que s&atilde;o mais f&aacute;ceis de aprender do que imagina.</p>

                    <p>Neste v&iacute;deo, Jes&uacute;s Moreno Le&oacute;n, professor de inform&aacute;tica e investigador, de Espanha, explicar&aacute; de que modo poder&aacute; promover estas e outras compet&ecirc;ncias nos seus alunos de forma divertida. Como faz&ecirc;-lo? Criando um jogo de perguntas e respostas no Scratch, a linguagem de programa&ccedil;&atilde;o mais popular utilizada em escolas de todo o mundo. O Scratch desenvolve n&atilde;o s&oacute; o pensamento computacional, como tamb&eacute;m permite a introdu&ccedil;&atilde;o de elementos de ludifica&ccedil;&atilde;o na sala de aula para manter os seus alunos motivados enquanto aprendem, divertindo-se.</p>

                    <p>Veja o v&iacute;deo para ficar a saber como come&ccedil;ar:</p>

                    @include('static.youtube', ['video_id' => 'M1zJOfmriGU'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-19-PT-TRA-00.DOCX">Descarregue o gui&atilde;o do v&iacute;deo</a></p>

                    <h2>Est&aacute; pronto para partilhar com os seus alunos o que aprendeu?</h2>

                    <p>Selecione um dos planos de aula abaixo e organize uma atividade com seus alunos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-10-PT-TRA-00.DOCX">Atividade 1 &mdash; Jogo de perguntas e respostas com o Scratch para o primeiro ciclo do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-11-PT-TRA-00.DOCX">Atividade 2 &mdash; Jogo de perguntas e respostas com o Scratch para o segundo e terceiro ciclos do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-12-PT-TRA-00.DOCX">Atividade 3 &mdash; Jogo de perguntas e respostas com o Scratch para o ensino secund&aacute;rio</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection