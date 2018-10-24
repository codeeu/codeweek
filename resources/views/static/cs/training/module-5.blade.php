@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>V&yacute;roba, robotika a vylep&scaron;ov&aacute;n&iacute; ve tř&iacute;dě</h1><span>Tullia Urschitz</span></div>

                    <hr>

                    <p>Integrace programov&aacute;n&iacute;, vylep&scaron;ov&aacute;n&iacute;, robotiky a mikroelektroniky jako v&yacute;ukov&yacute;ch n&aacute;strojů do &scaron;koln&iacute;ch osnov je z&aacute;sadn&iacute;m prvkem vzděl&aacute;v&aacute;n&iacute; ve 21. stolet&iacute;.</p>

                    <p>Vylep&scaron;ov&aacute;n&iacute; a robotika ve &scaron;kol&aacute;ch přin&aacute;&scaron;&iacute; ž&aacute;kům velk&yacute; užitek, protože to pom&aacute;h&aacute; rozv&iacute;jet kl&iacute;čov&eacute; dovednosti, jako je ře&scaron;en&iacute; probl&eacute;mů a t&yacute;mov&aacute; spolupr&aacute;ce. Podněcuje to tak&eacute; kreativitu a sebedůvěru ž&aacute;ků a může jim to pom&aacute;hat, aby rozv&iacute;jeli vytrvalost a odhodl&aacute;n&iacute;, když se setk&aacute;vaj&iacute; s n&aacute;ročn&yacute;mi situacemi. Robotika je tak&eacute; oblast, kter&aacute; podporuje inkluzi, protože je snadno dostupn&aacute; &scaron;irok&eacute;mu spektru ž&aacute;ků s různ&yacute;m nad&aacute;n&iacute;m a dovednostmi (chlapcům i d&iacute;vk&aacute;m) a m&aacute; pozitivn&iacute; vliv na ž&aacute;ky s poruchami autistick&eacute;ho spektra.</p>

                    <p>Tullia Urschitz, ambasadorka Italian Scientix a učitelka STEM v Sant&rsquo;Ambrogio Di Valpolicella v It&aacute;lii, v&aacute;m v n&aacute;sleduj&iacute;c&iacute;m videu uk&aacute;že praktick&eacute; př&iacute;klady toho, jak učitel&eacute; mohou do vyučov&aacute;n&iacute; začlenit vylep&scaron;ov&aacute;n&iacute; a robotiku, a d&iacute;ky tomu udělat z pasivn&iacute;ch ž&aacute;ků nad&scaron;en&eacute; konstrukt&eacute;ry.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">St&aacute;hnout sc&eacute;n&aacute;ř videa</a></p>

                    <h2>Jste připraveni podělit se s ž&aacute;ky o to, co jste se dozvěděli?</h2>

                    <p>Vyberte si jeden z n&iacute;že uveden&yacute;ch v&yacute;ukov&yacute;ch pl&aacute;nů a zorganizujte akci se sv&yacute;mi ž&aacute;ky.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Aktivita 1 - Jak z dřevovl&aacute;knit&eacute; desky vyrobit mechanickou ruku pro z&aacute;kladn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Aktivita 2 - Jak vyrobit mechanickou nebo robotickou ruku pro niž&scaron;&iacute; středn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Aktivita 3 - Jak vyrobit mechanickou nebo robotickou ruku pro vy&scaron;&scaron;&iacute; středn&iacute; &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection