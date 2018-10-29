@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Tvorba vzdel&aacute;vac&iacute;ch hier v&nbsp;jazyku Scratch</h1><span>Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kritick&eacute; myslenie, vytrvalosť, rie&scaron;enie probl&eacute;mov, v&yacute;počtov&eacute; myslenie a tvorivosť s&uacute; len niektor&eacute; z&nbsp;kľ&uacute;čov&yacute;ch zručnost&iacute;, ktor&eacute; va&scaron;i &scaron;tudenti potrebuj&uacute;, aby uspeli v&nbsp;21.&nbsp;storoč&iacute;. Programovanie m&ocirc;že byť z&aacute;bavn&yacute; a motivačn&yacute; sp&ocirc;sob, ako ich nadobudn&uacute;ť.</p>

                    <p>Algoritmick&eacute; z&aacute;sady na kontrolu toku prostredn&iacute;ctvom sekvencie pokynov a slučiek, reprezent&aacute;cia &uacute;dajov prostredn&iacute;ctvom premenn&yacute;ch a zoznamov či synchroniz&aacute;cia procesov m&ocirc;žu znieť komplikovane, no v&nbsp;tomto videu zist&iacute;te, že sa daj&uacute; naučiť ľah&scaron;ie, ako by ste si mysleli.</p>

                    <p>Učiteľ informatiky a v&yacute;skumn&iacute;k zo &Scaron;panielska Jes&uacute;s Moreno Le&oacute;n v&nbsp;tomto videu vysvetľuje, ako m&ocirc;žete so &scaron;tudentmi rozvin&uacute;ť tieto a ďal&scaron;ie zručnosti a z&aacute;roveň sa pri tom zabaviť. Ako na to? Vytvor&iacute; sa hra s&nbsp;ot&aacute;zkami a odpoveďami v&nbsp;jazyku Scratch, ktor&yacute; je najobľ&uacute;benej&scaron;&iacute;m programovac&iacute;m jazykom na &scaron;kol&aacute;ch na celom svete. Scratch posilňuje v&yacute;počtov&eacute; myslenie, no umožňuje tiež zahrn&uacute;ť prvky hry do vyučovania. &Scaron;tudenti vďaka tomu nestr&aacute;caj&uacute; motiv&aacute;ciu a učia sa z&aacute;bavnou formou.</p>

                    <p>Pozrite si video a zistite, ako na to:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Stiahnuť prepis videa</a></p>

                    <h2>Ste pripraven&iacute; odovzdať nadobudnut&eacute; vedomosti &scaron;tudentom?</h2>

                    <p>Vyberte si z&nbsp;navrhovan&yacute;ch učebn&yacute;ch pl&aacute;nov a usporiadajte aktivitu pre &scaron;tudentov.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Aktivita&nbsp;1 &ndash; Hra s&nbsp;ot&aacute;zkami a odpoveďami v&nbsp;jazyku Scratch pre 1.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Aktivita&nbsp;2 &ndash; Hra s&nbsp;ot&aacute;zkami a odpoveďami v&nbsp;jazyku Scratch pre 2.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Aktivita&nbsp;3 &ndash; Hra s&nbsp;ot&aacute;zkami a odpoveďami v&nbsp;jazyku Scratch pre stredn&eacute; &scaron;koly</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection