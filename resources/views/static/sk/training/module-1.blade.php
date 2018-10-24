@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programovanie bez poč&iacute;tačov</h1><span>Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Programovanie je jazyk vec&iacute;, ktor&yacute; n&aacute;m umožňuje vytv&aacute;rať programy a prideľovať nov&eacute; funkcie desiatkam mili&aacute;rd programovateľn&yacute;ch objektov okolo n&aacute;s. Programovanie je najr&yacute;chlej&scaron;&iacute; sp&ocirc;sob na realiz&aacute;ciu na&scaron;ich n&aacute;padov a naj&uacute;činnej&scaron;&iacute; sp&ocirc;sob na rozv&iacute;janie schopnost&iacute; s&uacute;visiacich s&nbsp;v&yacute;počtov&yacute;m myslen&iacute;m. Pri rozv&iacute;jan&iacute; v&yacute;počtov&eacute;ho zm&yacute;&scaron;ľania v&scaron;ak nie je &uacute;plne nevyhnutn&eacute; použ&iacute;vať technol&oacute;giu. Pr&aacute;ve naopak, na ovl&aacute;danie technol&oacute;gie potrebujeme zručnosti s&uacute;visiace s&nbsp;v&yacute;počtov&yacute;m myslen&iacute;m.</p>

                    <p>Profesor v&yacute;počtov&yacute;ch syst&eacute;mov z&nbsp;Talianska a koordin&aacute;tor Eur&oacute;pskeho t&yacute;ždňa programovania Alessandro Bogliolo v&nbsp;tomto videu predstavuje program&aacute;torsk&eacute; aktivity bez poč&iacute;tača, ktor&eacute; možno vykon&aacute;vať bez ak&eacute;hokoľvek elektronick&eacute;ho zariadenia. Hlavn&yacute;m cieľom aktiv&iacute;t bez poč&iacute;tača je zn&iacute;žiť pr&iacute;stupov&eacute; prek&aacute;žky a zaviesť programovanie do v&scaron;etk&yacute;ch &scaron;k&ocirc;l, bez ohľadu na ich finančn&eacute; prostriedky a vybavenie.</p>

                    <p>Pomocou program&aacute;torsk&yacute;ch aktiv&iacute;t bez poč&iacute;tača m&ocirc;žeme spoznať v&yacute;počtov&eacute; str&aacute;nky fyzick&eacute;ho sveta okolo n&aacute;s.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Stiahnuť prepis videa</a></p>

                    <h2>Ste pripraven&iacute; odovzdať nadobudnut&eacute; vedomosti &scaron;tudentom?</h2>

                    <p>Vyberte si z&nbsp;navrhovan&yacute;ch učebn&yacute;ch pl&aacute;nov a usporiadajte aktivitu pre &scaron;tudentov.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Aktivita&nbsp;1 &ndash; CodyRoby pre 1.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Aktivita&nbsp;2 &ndash; CodyRoby pre 2.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Aktivita&nbsp;3 &ndash; CodyRoby pre stredn&eacute; &scaron;koly</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection