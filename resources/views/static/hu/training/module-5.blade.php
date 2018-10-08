@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Robotika &eacute;s b&uuml;tyk&ouml;l&eacute;s az iskol&aacute;ban</h1><span>Tullia Urschitz</span></div>

                    <hr>

                    <p>A programoz&aacute;s, a b&uuml;tyk&ouml;l&eacute;s, a robotika &eacute;s a mikroelektronika az iskolai tantervbe tan&iacute;t&aacute;si &eacute;s tanul&aacute;si eszk&ouml;zk&eacute;nt t&ouml;rt&eacute;nő beemel&eacute;se kulcsfontoss&aacute;g&uacute; a 21. sz&aacute;zadi oktat&aacute;sban.</p>

                    <p>A b&uuml;tyk&ouml;l&eacute;s &eacute;s a robotika iskolai haszn&aacute;lata sz&aacute;mos előnnyel j&aacute;r a di&aacute;kok sz&aacute;m&aacute;ra, mivel seg&iacute;t az olyan kulcskompetenci&aacute;k fejleszt&eacute;s&eacute;ben, mint a probl&eacute;mamegold&aacute;s, a csoportmunka &eacute;s az egy&uuml;ttműk&ouml;d&eacute;s. N&ouml;veli a di&aacute;kok kreativit&aacute;s&aacute;t &eacute;s &ouml;nbizalm&aacute;t, &eacute;s seg&iacute;t fejleszteni a di&aacute;kok kitart&aacute;s&aacute;t &eacute;s elt&ouml;k&eacute;lts&eacute;g&eacute;t kih&iacute;v&aacute;sok eset&eacute;n. A robotika is előseg&iacute;ti az inkluzivit&aacute;st, mivel k&ouml;nnyed&eacute;n el&eacute;rhető a k&uuml;l&ouml;nb&ouml;ző k&eacute;pess&eacute;gekkel &eacute;s k&eacute;szs&eacute;gekkel rendelkező l&aacute;nyok &eacute;s fi&uacute;k sz&aacute;m&aacute;ra, &eacute;s pozit&iacute;van befoly&aacute;solja az autizmus spektrumon l&eacute;vő di&aacute;kokat.</p>

                    <p>Tekintse meg az al&aacute;bbi vide&oacute;t, amelyben Tullia Urschitz, az olasz Scientix nagyk&ouml;vete &eacute;s Sant'Ambrogio Di Valpolicella STEM-tan&aacute;ra gyakorlati p&eacute;ld&aacute;kon mutatja be, hogyan műk&ouml;dhet az iskolai integr&aacute;ci&oacute; a b&uuml;tyk&ouml;l&eacute;s &eacute;s a robotika seg&iacute;ts&eacute;g&eacute;vel, amelynek sor&aacute;n a passz&iacute;v di&aacute;kok lelkes alkot&oacute;kk&aacute; v&aacute;lnak.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Vide&oacute; forgat&oacute;k&ouml;nyv&eacute;nek let&ouml;lt&eacute;se</a></p>

                    <h2>K&eacute;szen &aacute;ll arra, hogy megossza a tanultakat a di&aacute;kjaival?</h2>

                    <p>V&aacute;lasszon ki egyet az al&aacute;bbi &oacute;rav&aacute;zlatok k&ouml;z&uuml;l, &eacute;s szervezzen tev&eacute;kenys&eacute;get a di&aacute;kjaival.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">1. tev&eacute;kenys&eacute;g: Hogyan k&eacute;sz&iacute;ts&uuml;nk mechanikus kezet kem&eacute;ny rostlemezből &aacute;ltal&aacute;nos iskol&aacute;ban?</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">2. tev&eacute;kenys&eacute;g: Hogyan k&eacute;sz&iacute;ts&uuml;nk mechanikus vagy robotkezet a k&ouml;z&eacute;piskola als&oacute; tagozat&aacute;n?</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">3. tev&eacute;kenys&eacute;g: Hogyan k&eacute;sz&iacute;ts&uuml;nk mechanikus vagy robotkezet a k&ouml;z&eacute;piskola felső tagozat&aacute;n?</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection