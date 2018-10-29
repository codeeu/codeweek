@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Tvorba vzděl&aacute;vac&iacute;ch her v jazyce Scratch</h1><span>Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kritick&eacute; my&scaron;len&iacute;, vytrvalost, ře&scaron;en&iacute; probl&eacute;mů, informatick&eacute; my&scaron;len&iacute; a kreativita jsou jen někter&eacute; z kl&iacute;čov&yacute;ch dovednost&iacute;, kter&eacute; va&scaron;i ž&aacute;ci potřebuj&iacute;, aby ve 21. stolet&iacute; byli &uacute;spě&scaron;n&iacute;. Programov&aacute;n&iacute; může pomoci, aby takov&eacute; vlastnosti z&iacute;skali, a to z&aacute;bavn&yacute;m a motivuj&iacute;c&iacute;m způsobem.</p>

                    <p>Algoritmick&eacute; pojmy ř&iacute;zen&iacute; toku za použit&iacute; sekvenc&iacute; pokynů a smyček, datov&aacute; reprezentace použ&iacute;vaj&iacute;c&iacute; proměnn&eacute; a seznamy nebo synchronizace procesů mohou zn&iacute;t jako složit&eacute; koncepty, ale d&iacute;ky tomuto videu zjist&iacute;te, že se je můžete naučit snadněji, než si mysl&iacute;te.</p>

                    <p>Jes&uacute;s Moreno Le&oacute;n, učitel informatiky a v&yacute;zkumn&yacute; pracovn&iacute;k ze &Scaron;panělska, vysvětl&iacute;, jak tyto a dal&scaron;&iacute; dovednosti můžete z&aacute;bavn&yacute;m způsobem rozv&iacute;jet u sv&yacute;ch ž&aacute;ků. Jak na to? Vytvořen&iacute;m hry s ot&aacute;zkami a odpověďmi v jazyce Scratch, nejobl&iacute;beněj&scaron;&iacute;m programovac&iacute;m jazyce použ&iacute;van&eacute;m ve &scaron;kol&aacute;ch po cel&eacute;m světě. Scratch nejen pom&aacute;h&aacute; rozv&iacute;jet informatick&eacute; my&scaron;len&iacute;, ale tak&eacute; umožňuje představen&iacute; hern&iacute;ch prvků ve tř&iacute;dě, takže ž&aacute;ci budou m&iacute;t motivaci se učit a bude je to bavit.</p>

                    <p>Pod&iacute;vejte se na video, ve kter&eacute;m se dozv&iacute;te, jak zač&iacute;t.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">St&aacute;hnout sc&eacute;n&aacute;ř videa</a></p>

                    <h2>Jste připraveni podělit se s ž&aacute;ky o to, co jste se dozvěděli?</h2>

                    <p>Vyberte si jeden z n&iacute;že uveden&yacute;ch v&yacute;ukov&yacute;ch pl&aacute;nů a zorganizujte akci se sv&yacute;mi ž&aacute;ky.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Aktivita 1 - Hra s ot&aacute;zkami a odpověďmi pro z&aacute;kladn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Aktivita 2 - Hra s ot&aacute;zkami a odpověďmi pro niž&scaron;&iacute; středn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Aktivita 3 - Hra s ot&aacute;zkami a odpověďmi pro středn&iacute; &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection