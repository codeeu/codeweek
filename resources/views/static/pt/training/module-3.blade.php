@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programa&ccedil;&atilde;o visual &mdash; Introdu&ccedil;&atilde;o ao Scratch</h1><span>por Margo Tinawi</span></div>

                    <hr>

                    <p>A programa&ccedil;&atilde;o visual permite que as pessoas descrevam processos utilizando ilustra&ccedil;&otilde;es ou gr&aacute;ficos. Habitualmente, referimo-nos &agrave; programa&ccedil;&atilde;o visual por oposi&ccedil;&atilde;o &agrave; programa&ccedil;&atilde;o baseada em texto. As linguagens de programa&ccedil;&atilde;o visual (VPL) est&atilde;o especialmente bem adaptadas para iniciar as crian&ccedil;as (e at&eacute; os adultos) no pensamento algor&iacute;tmico. Com as VPL, h&aacute; menos para ler e n&atilde;o &eacute; necess&aacute;rio aplicar uma sintaxe.</p>

                    <p>Neste v&iacute;deo, Margo Tinawi, professora de desenvolvimento de conte&uacute;dos Web na Le Wagon e cofundadora do Techies Lab asbl (B&eacute;lgica), ir&aacute; ajud&aacute;-lo a descobrir o Scratch, uma das mais populares VPL utilizadas em todo o mundo. O Scratch foi desenvolvido pelo MIT em 2002, e desde ent&atilde;o estabeleceu-se uma grande comunidade em seu redor, onde poder&aacute; encontrar milh&otilde;es de projetos para replicar com os seus alunos e in&uacute;meros tutoriais em v&aacute;rios idiomas.</p>

                    <p>N&atilde;o &eacute; necess&aacute;rio ter experi&ecirc;ncia em programa&ccedil;&atilde;o para utilizar o Scratch, e poder&aacute; utiliz&aacute;-lo nas diferentes disciplinas! Por exemplo, utilizando o Scratch como uma ferramenta digital para contar hist&oacute;rias, os alunos podem criar hist&oacute;rias, ilustrar um problema de matem&aacute;tica ou participar num concurso de arte para conhecerem o patrim&oacute;nio cultural, aprendendo simultaneamente programa&ccedil;&atilde;o e pensamento computacional e, mais importante, divertindo-se.</p>

                    <p>O Scratch &eacute; uma ferramenta gratuita, muito intuitiva e motivante para os seus alunos. Veja o v&iacute;deo da professora Margo para ficar a saber como come&ccedil;ar.</p>

                    @include('static.youtube', ['video_id' => 'pmfCwauN1c0'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-18-PT-TRA-00.DOCX">Descarregue o gui&atilde;o do v&iacute;deo</a></p>

                    <h2>Est&aacute; pronto para partilhar com os seus alunos o que aprendeu?</h2>

                    <p>Selecione um dos planos de aula abaixo e organize uma atividade com seus alunos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-07-PT-TRA-00.DOCX">Atividade 1 &mdash; Scratch de n&iacute;vel b&aacute;sico para o primeiro ciclo do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-08-PT-TRA-00.DOCX">Atividade 2 &mdash; Scratch de n&iacute;vel b&aacute;sico para o segundo e terceiro ciclos do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/PT/CNECT-2018-00222-00-09-PT-TRA-00.DOCX">Atividade 3 &mdash; Scratch de n&iacute;vel b&aacute;sico para o ensino secund&aacute;rio</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection