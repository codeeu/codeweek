@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programov&aacute;n&iacute; bez poč&iacute;tačů (unplugged)</h1><span>Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Programov&aacute;n&iacute; je jazyk věc&iacute;, d&iacute;ky kter&eacute;mu můžeme ps&aacute;t programy, abychom přiřadili nov&eacute; funkce des&iacute;tk&aacute;m miliard programovateln&yacute;ch objektů kolem n&aacute;s. Programov&aacute;n&iacute; je nejrychlej&scaron;&iacute; způsob, jak realizovat sv&eacute; n&aacute;pady a t&iacute;m nej&uacute;činněj&scaron;&iacute;m způsobem rozv&iacute;jet schopnost informatick&eacute;ho my&scaron;len&iacute;. K rozvoji informatick&eacute;ho my&scaron;len&iacute; v&scaron;ak nen&iacute; nezbytně nutn&aacute; technologie. Je to sp&iacute;&scaron;e tak, že aby technologie fungovala, je nezbytn&eacute; m&iacute;t schopnost informatick&eacute;ho my&scaron;len&iacute;.</p>

                    <p>Alessandro Bogliolo z It&aacute;lie, profesor poč&iacute;tačov&yacute;ch syst&eacute;mů a koordin&aacute;tor Evropsk&eacute;ho t&yacute;dne programov&aacute;n&iacute;, v n&aacute;sleduj&iacute;c&iacute;m videu představ&iacute; unplugged programovac&iacute; aktivity, kter&eacute; je možn&eacute; prov&aacute;dět bez jak&eacute;hokoli elektronick&eacute;ho zař&iacute;zen&iacute;. Hlavn&iacute;m &uacute;čelem unplugged aktivit je sn&iacute;žit př&iacute;stupov&eacute; bari&eacute;ry, aby se programov&aacute;n&iacute; mohlo dostat do každ&eacute; &scaron;koly, bez ohledu na jej&iacute; finančn&iacute; možnosti a vybaven&iacute;.</p>

                    <p>Unplugged programovac&iacute; aktivity odhaluj&iacute; informatick&eacute; aspekty fyzik&aacute;ln&iacute;ho světa kolem n&aacute;s.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">St&aacute;hnout sc&eacute;n&aacute;ř videa</a></p>

                    <h2>Jste připraveni podělit se s ž&aacute;ky o to, co jste se dozvěděli?</h2>

                    <p>Vyberte si jeden z n&iacute;že uveden&yacute;ch v&yacute;ukov&yacute;ch pl&aacute;nů a zorganizujte akci se sv&yacute;mi ž&aacute;ky.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Aktivita 1 &ndash; CodyRoby pro z&aacute;kladn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Aktivita 2 &ndash; CodyRoby pro niž&scaron;&iacute; středn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Aktivita 3 &ndash; CodyRoby pro středn&iacute; &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection