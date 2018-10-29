@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Mendimi kompjuterik dhe zgjidhja e problemeve</h1><span>nga Miles Berry</span></div>

                    <hr>

                    <p>Mendimi kompjuterik (CT) p&euml;rshkruan nj&euml; shikim t&euml; problemeve dhe sistemeve n&euml; m&euml;nyr&euml; t&euml; till&euml; q&euml; t&euml; p&euml;rdorim nj&euml; kompjuter q&euml; t&euml; na ndihmoj&euml; t&rsquo;i zgjidhim ose t&rsquo;i kuptojm&euml; ato. Mendimi kompjuterik &euml;sht&euml; jo vet&euml;m thelb&euml;sor p&euml;r zhvillimin e programeve kompjuterike, por mund t&euml; p&euml;rdoret edhe p&euml;r t&euml; mb&euml;shtetur zgjidhjen e problemeve n&euml;p&euml;r t&euml; gjitha disiplinat.</p>

                    <p>Ju mund t&rsquo;u m&euml;soni CT nx&euml;n&euml;sve tuaj duke u k&euml;rkuar t&euml; zb&euml;rthejn&euml; probleme komplekse n&euml; probleme m&euml; t&euml; vogla, (zb&euml;rthim), t&euml; dallojn&euml; motive (dallim i motiveve), t&euml; identifikojn&euml; detaje t&euml; r&euml;nd&euml;sishme p&euml;r zgjidhjen e nj&euml; problemi (abstragim); ose duke p&euml;rcaktuar rregullat ose udh&euml;zimet q&euml; do t&euml; ndiqen p&euml;r t&euml; arritur nj&euml; rezultat t&euml; d&euml;shiruar (hartimi i algoritmeve). CT mund t&euml; m&euml;sohet n&euml; disiplina t&euml; ndryshme, p&euml;r shembull n&euml; matematik&euml; (gjeni rregullat p&euml;r faktorizimin e polinomial&euml;ve t&euml; nivelit t&euml; dyt&euml;), literatur&euml; (zb&euml;rthimi i analiz&euml;s s&euml; nj&euml; poeme n&euml; analiz&euml;n e metrik&euml;s, rim&euml;s dhe struktur&euml;s), gjuh&euml;si (gjeni motivet n&euml; shkronjat fundore t&euml; nj&euml; foljeje q&euml; ndikojn&euml; te shqiptimi i saj me ndryshimin e koh&euml;s s&euml; saj) dhe shum&euml; t&euml; tjera.</p>

                    <p>N&euml; k&euml;t&euml; video, Miles Berry, Kryelektor n&euml; Universitetin e Roehampton School of Education n&euml; Guildford (Mbret&euml;ria e Bashkuar), do t&euml; prezantoj&euml; konceptin e mendimit kompjuterik dhe m&euml;nyrat e ndryshme se si nj&euml; m&euml;sues mund ta integroj&euml; at&euml; n&euml; klas&euml; me loj&euml;ra t&euml; thjeshta.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Shkarko tekstin e videos</a></p>

                    <h2>Jeni gati t&euml; ndani at&euml; q&euml; keni m&euml;suar me nx&euml;n&euml;sit tuaj?</h2>

                    <p>Zgjidhni nj&euml; prej planeve m&euml;simore m&euml; posht&euml; dhe organizoni nj&euml; aktivitet me nx&euml;n&euml;sit tuaj.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Aktiviteti 1 &ndash; Zhvillimi i arsyetimit matematik p&euml;r ciklin e ul&euml;t fillor</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Aktiviteti 2 &ndash; Njohja me algoritmet p&euml;r ciklin e mes&euml;m t&euml; ul&euml;t</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Aktiviteti 3 &ndash; Algoritmet p&euml;r shkoll&euml;n e mesme</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection