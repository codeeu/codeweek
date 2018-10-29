@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Vizu&aacute;ln&iacute; programov&aacute;n&iacute; &ndash; &uacute;vod k jazyku Scratch</h1><span>Margo Tinawi</span></div>

                    <hr>

                    <p>Vizu&aacute;ln&iacute; programov&aacute;n&iacute; lidem umožňuje popsat procesy pomoc&iacute; ilustrac&iacute; nebo grafiky. O vizu&aacute;ln&iacute;m programov&aacute;n&iacute; obvykle mluv&iacute;me jako o opaku textov&eacute;ho programov&aacute;n&iacute;. Vizu&aacute;ln&iacute; programovac&iacute; jazyky (VPL) jsou zvl&aacute;&scaron;ť dobře přizpůsoben&eacute; k tomu, aby sezn&aacute;mily děti (ale i dospěl&eacute;) s algoritmick&yacute;m my&scaron;len&iacute;m. U VPL je toho m&aacute;lo ke čten&iacute; a neře&scaron;&iacute; se syntaxe.</p>

                    <p>Margo Tinawi, učitelka v&yacute;voje webu v Le Wagon a spoluzakladatelka Techies Lab asbl (Belgie), v&aacute;m pomůže objevit Scratch, jeden z nejobl&iacute;beněj&scaron;&iacute;ch VPL, kter&yacute; se použ&iacute;v&aacute; po cel&eacute;m světě. Scratch vyvinula MIT v roce 2002 a od t&eacute; doby kolem něj vznikla velk&aacute; komunita. Objev&iacute;te v n&iacute; miliony projektů, kter&eacute; můžete vyzkou&scaron;et se sv&yacute;mi ž&aacute;ky, a najdete tak&eacute; bezpočet v&yacute;ukov&yacute;ch programů v několika jazyc&iacute;ch.</p>

                    <p>K použ&iacute;v&aacute;n&iacute; jazyka Scratch nemus&iacute;te m&iacute;t ž&aacute;dn&eacute; zku&scaron;enosti s programov&aacute;n&iacute;m a můžete ho využ&iacute;t v mnoha různ&yacute;ch kontextech. Scratch můžete např&iacute;klad využ&iacute;t jako digit&aacute;ln&iacute; n&aacute;stroj k vytv&aacute;řen&iacute; př&iacute;běhů, ke zn&aacute;zorněn&iacute; matematick&eacute;ho probl&eacute;mu nebo k uměleck&eacute; soutěži zaměřen&eacute; na kulturn&iacute; dědictv&iacute; &ndash; při tom v&scaron;em se budete učit programovat, rozv&iacute;jet informatick&eacute; my&scaron;len&iacute; a předev&scaron;&iacute;m si užijete hodně z&aacute;bavy.</p>

                    <p>Scratch je bezplatn&yacute; intuitivn&iacute; n&aacute;stroj, kter&yacute; bude pro va&scaron;e ž&aacute;ky velmi podnětn&yacute;. Pod&iacute;vejte se na video, ve kter&eacute;m v&aacute;m Margo vysvětl&iacute;, jak zač&iacute;t.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">St&aacute;hnout sc&eacute;n&aacute;ř videa</a></p>

                    <h2>Jste připraveni podělit se s ž&aacute;ky o to, co jste se dozvěděli?</h2>

                    <p>Vyberte si jeden z n&iacute;že uveden&yacute;ch v&yacute;ukov&yacute;ch pl&aacute;nů a zorganizujte akci se sv&yacute;mi ž&aacute;ky.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Aktivita 1 &ndash; Z&aacute;klady jazyka Scratch pro z&aacute;kladn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Aktivita 2 &ndash; Z&aacute;klady jazyka Scratch pro niž&scaron;&iacute; středn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Aktivita 3 &ndash; Z&aacute;klady jazyka Scratch pro středn&iacute; &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection