@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>V&yacute;počtov&eacute; myslenie a rie&scaron;enie probl&eacute;mov</h1><span>Miles Berry</span></div>

                    <hr>

                    <p>V&yacute;počtov&eacute; myslenie je sp&ocirc;sob pristupovania k&nbsp;probl&eacute;mom a syst&eacute;mom, v&nbsp;r&aacute;mci ktor&eacute;ho možno využiť poč&iacute;tač na ich vyrie&scaron;enie alebo pochopenie. V&yacute;počtov&eacute; myslenie nie je d&ocirc;ležit&eacute; len pri v&yacute;voji poč&iacute;tačov&yacute;ch programov, ale možno ho tiež využiť pri rie&scaron;en&iacute; probl&eacute;mov vo v&scaron;etk&yacute;ch discipl&iacute;nach.</p>

                    <p>Svojich &scaron;tudentov m&ocirc;žete naučiť v&yacute;počtov&eacute;mu mysleniu rozkladan&iacute;m zložit&yacute;ch probl&eacute;mov na drobnej&scaron;ie (rozklad), rozozn&aacute;van&iacute;m vzorcov (rozozn&aacute;vanie vzorcov), identifikovan&iacute;m relevantn&yacute;ch &uacute;dajov pri rie&scaron;en&iacute; probl&eacute;mu (abstrakcia) alebo tak, že im stanov&iacute;te pravidl&aacute; či pokyny, podľa ktor&yacute;ch dosiahnu želan&yacute; v&yacute;sledok (tvorba algoritmov). V&yacute;počtov&eacute; myslenie možno vyučovať v&nbsp;r&ocirc;znych discipl&iacute;nach, napr&iacute;klad v&nbsp;matematike (zistiť pravidl&aacute; rozkladu mnohočlenov druh&eacute;ho stupňa na s&uacute;čin), literat&uacute;re (rozdeliť rozklad b&aacute;sne na rozklad tempa, r&yacute;mu a stavby), jazykoch (n&aacute;jsť vzorce v&nbsp;koncovk&aacute;ch slovesa, ktor&eacute; ovplyvňuj&uacute; to, ako sa p&iacute;&scaron;e pri zmene času) a mnoh&yacute;ch ďal&scaron;&iacute;ch.</p>

                    <p>Hlavn&yacute; lektor na Pedagogickej fakulte Univerzity v&nbsp;Roehamptone (Spojen&eacute; kr&aacute;ľovstvo), Miles Berry, predstavuje koncepciu v&yacute;počtov&eacute;ho myslenia a r&ocirc;zne sp&ocirc;soby, ktor&yacute;mi ho učitelia m&ocirc;žu začleniť do vyučovania prostredn&iacute;ctvom jednoduch&yacute;ch hier.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Stiahnuť prepis videa</a></p>

                    <h2>Ste pripraven&iacute; odovzdať nadobudnut&eacute; vedomosti &scaron;tudentom?</h2>

                    <p>Vyberte si z&nbsp;navrhovan&yacute;ch učebn&yacute;ch pl&aacute;nov a usporiadajte aktivitu pre &scaron;tudentov.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Aktivita&nbsp;1 &ndash; Rozvoj matematick&eacute;ho uvažovania pre 1.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Aktivita&nbsp;2 &ndash; &Uacute;vod do algoritmov pre 2.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Aktivita&nbsp;3 &ndash; Algoritmy pre stredn&eacute; &scaron;koly</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection