@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Trabalhos de rob&oacute;tica e com hardware na sala de aula</h1><span>por Tullia Urschitz</span></div>

                    <hr>

                    <p>A integra&ccedil;&atilde;o da programa&ccedil;&atilde;o, dos trabalhos com hardware, da rob&oacute;tica e da microeletr&oacute;nica como ferramentas de ensino e aprendizagem nos programas escolares &eacute; fundamental na educa&ccedil;&atilde;o do s&eacute;culo&nbsp;XXI.</p>

                    <p>Os trabalhos com hardware e rob&oacute;tica nas escolas trazem in&uacute;meros benef&iacute;cios para os alunos, pois ajudam a desenvolver compet&ecirc;ncias essenciais como a resolu&ccedil;&atilde;o de problemas, o trabalho em equipa e a colabora&ccedil;&atilde;o. Al&eacute;m disso, aumentam a criatividade e a confian&ccedil;a dos alunos e podem ajudar os alunos a desenvolverem a perseveran&ccedil;a e a determina&ccedil;&atilde;o quando s&atilde;o confrontados com desafios. A rob&oacute;tica &eacute; uma &aacute;rea que promove tamb&eacute;m a inclus&atilde;o, pois &eacute; de f&aacute;cil acesso a um amplo leque de estudantes com diferentes talentos e compet&ecirc;ncias (rapazes e raparigas) e exerce uma influ&ecirc;ncia positiva junto dos alunos com perturba&ccedil;&otilde;es do espetro do autismo.</p>

                    <p>Veja este v&iacute;deo em que Tullia Urschitz, embaixadora da Scientix italiana e professora de CTEM em Sant'Ambrogio Di Valpolicella, It&aacute;lia, apresentar&aacute; alguns exemplos pr&aacute;ticos sobre como os professores podem integrar os trabalhos de com hardware e a rob&oacute;tica na sala de aula, transformando estudantes passivos em criadores entusiastas.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Descarregue o gui&atilde;o do v&iacute;deo</a></p>

                    <h2>Est&aacute; pronto para partilhar com os seus alunos o que aprendeu?</h2>

                    <p>Selecione um dos planos de aula abaixo e organize uma atividade com seus alunos.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Atividade 1 &mdash; Como construir uma m&atilde;o mec&acirc;nica num painel duro para o primeiro ciclo do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Atividade 2 &mdash; Como construir uma m&atilde;o mec&acirc;nica ou rob&oacute;tica para o segundo e terceiro ciclos do ensino b&aacute;sico</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Atividade 3 &mdash; Como construir uma m&atilde;o mec&acirc;nica ou rob&oacute;tica para o ensino secund&aacute;rio</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection