@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Robotika a majstrovanie v&nbsp;triede</h1><span>Tullia Urschitz</span></div>

                    <hr>

                    <p>Zahrnutie programovania, majstrovania, robotiky a mikroelektroniky ako vyučovac&iacute;ch a učebn&yacute;ch n&aacute;strojov do &scaron;kolsk&yacute;ch osnov m&aacute; vo vzdel&aacute;van&iacute; 21.&nbsp;storočia z&aacute;sadn&yacute; v&yacute;znam.</p>

                    <p>Majstrovanie a robotika na &scaron;kol&aacute;ch maj&uacute; pre &scaron;tudentov množstvo pr&iacute;nosov, pretože im pom&aacute;haj&uacute; rozv&iacute;jať kľ&uacute;čov&eacute; kompetencie, ako s&uacute; rie&scaron;enie probl&eacute;mov, t&iacute;mov&aacute; pr&aacute;ca a spolupr&aacute;ca. U&nbsp;&scaron;tudentov tiež posilňuj&uacute; tvorivosť a sebad&ocirc;veru a m&ocirc;žu im pom&ocirc;cť v&nbsp;rozvoji vytrvalosti a odhodlania, keď s&uacute; postaven&iacute; pred v&yacute;zvy. Robotika je z&aacute;roveň oblasť, ktor&aacute; podporuje začleňovanie, pretože je ľahko dostupn&aacute; &scaron;irok&eacute;mu z&aacute;beru &scaron;tudentov s&nbsp;r&ocirc;znym nadan&iacute;m a zručnosťami (chlapcom aj dievčat&aacute;m) a pozit&iacute;vne ovplyvňuje &scaron;tudentov s&nbsp;autistick&yacute;mi sklonmi.</p>

                    <p>Pozrite si video, v&nbsp;ktorom Tullia Urschitz, veľvyslankyňa z&nbsp;talianskej komunity Scientix a učiteľka predmetov STEM (veda, technol&oacute;gia, inžinierstvo a matematika) zo Sant&rsquo;Ambrogio Di Valpolicella v&nbsp;Taliansku, pon&uacute;ka niekoľko praktick&yacute;ch pr&iacute;kladov, ako m&ocirc;žu učitelia zahrn&uacute;ť majstrovanie a robotiku do vyučovania a premeniť tak pas&iacute;vnych &scaron;tudentov na nad&scaron;en&yacute;ch tvorcov.</p>

                    @include('static.youtube', ['video_id' => '5V9G-vWWSik'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SK/CNECT-2018-00222-00-20-SK-TRA-00.DOCX">Stiahnuť prepis videa</a></p>

                    <h2>Ste pripraven&iacute; odovzdať nadobudnut&eacute; vedomosti &scaron;tudentom?</h2>

                    <p>Vyberte si z&nbsp;navrhovan&yacute;ch učebn&yacute;ch pl&aacute;nov a usporiadajte aktivitu pre &scaron;tudentov.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SK/CNECT-2018-00222-00-13-SK-TRA-00.DOCX">Aktivita&nbsp;1 &ndash; Ako vyrobiť mechanick&uacute; ruku z&nbsp;HDF dosky pre 1.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SK/CNECT-2018-00222-00-14-SK-TRA-00.DOCX">Aktivita&nbsp;2 &ndash; Ako vyrobiť mechanick&uacute; alebo robotick&uacute; ruku pre 2.&nbsp;stupeň z&aacute;kladn&yacute;ch &scaron;k&ocirc;l</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SK/CNECT-2018-00222-00-15-SK-TRA-00.DOCX">Aktivita&nbsp;3 &ndash; Ako vyrobiť mechanick&uacute; alebo robotick&uacute; ruku pre stredn&eacute; &scaron;koly</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection