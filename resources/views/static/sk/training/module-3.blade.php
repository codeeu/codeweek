@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Vizu&aacute;lne programovanie &ndash; &uacute;vod do jazyka Scratch</h1><span>Margo Tinawi</span></div>

                    <hr>

                    <p>Vizu&aacute;lne programovanie umožňuje človeku opisovať procesy pomocou ilustr&aacute;ci&iacute; alebo grafiky. Vizu&aacute;lne programovanie sa zvykne označovať za opak textov&eacute;ho programovania. Vizu&aacute;lne programovacie jazyky s&uacute; mimoriadne vhodn&eacute; na predstavenie algoritmick&eacute;ho myslenia deťom (alebo aj dospel&yacute;m). Pri vizu&aacute;lnych programovac&iacute;ch jazykoch je potrebn&eacute; menej č&iacute;tať a netreba použ&iacute;vať syntax.</p>

                    <p>Učiteľka tvorby webu v&nbsp;r&aacute;mci iniciat&iacute;vy Le Wagon a spoluzakladateľka Techies Lab asbl (Belgicko) Margo Tinawi v&aacute;m pom&ocirc;že zozn&aacute;miť sa s&nbsp;jazykom Scratch, jedn&yacute;m z&nbsp;najobľ&uacute;benej&scaron;&iacute;ch virtu&aacute;lnych programovac&iacute;ch jazykov na celom svete. Jazyk Scratch vznikol na MIT v&nbsp;roku 2002 a medzičasom sa okolo neho vytvorila veľk&aacute; komunita. N&aacute;jdete v&nbsp;nej mili&oacute;ny projektov, ktor&eacute; m&ocirc;žete zadať svojim &scaron;tudentom, a nespočetne veľa n&aacute;vodov vo viacer&yacute;ch jazykoch.</p>

                    <p>Na použ&iacute;vanie jazyka Scratch nepotrebujete žiadne sk&uacute;senosti s&nbsp;programovan&iacute;m a m&ocirc;žete ho využiť na v&scaron;etk&yacute;ch možn&yacute;ch predmetoch! Scratch napr&iacute;klad m&ocirc;žete využiť ako n&aacute;stroj na vyrozpr&aacute;vanie pr&iacute;behu, pomocou ktor&eacute;ho m&ocirc;žu &scaron;tudenti vytv&aacute;rať pr&iacute;behy, ilustrovať matematick&yacute; probl&eacute;m alebo zahrať sa umeleck&uacute; s&uacute;ťaž s&nbsp;cieľom naučiť sa o&nbsp;kult&uacute;rnom dedičstve, pričom sa z&aacute;roveň naučia programovaniu a v&yacute;počtov&eacute;mu mysleniu, ale predov&scaron;etk&yacute;m sa zabavia.</p>

                    <p>Scratch je bezplatn&yacute; n&aacute;stroj, ktor&yacute; je pre &scaron;tudentov veľmi intuit&iacute;vny a motivačn&yacute;. Pozrite si Margine video a zistite, ako na to.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Stiahnuť prepis videa</a></p>

                    <h2>Ste pripraven&iacute; odovzdať nadobudnut&eacute; vedomosti &scaron;tudentom?</h2>

                    <p>Vyberte si z&nbsp;navrhovan&yacute;ch učebn&yacute;ch pl&aacute;nov a usporiadajte aktivitu pre &scaron;tudentov.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Aktivita&nbsp;1 &ndash; Z&aacute;klady jazyka Scratch pre 1.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Aktivita&nbsp;2 &ndash; Z&aacute;klady jazyka Scratch pre 2.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Aktivita&nbsp;3 &ndash; Z&aacute;klady jazyka Scratch pre stredn&eacute; &scaron;koly</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection