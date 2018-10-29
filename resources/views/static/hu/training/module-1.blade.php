@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programoz&aacute;s sz&aacute;m&iacute;t&oacute;g&eacute;pek n&eacute;lk&uuml;l (offline)</h1><span>Alessandro Bogliolo</span></div>

                    <hr>

                    <p>A programoz&aacute;s a dolgok nyelve, amelynek seg&iacute;ts&eacute;g&eacute;vel olyan programokat &iacute;rhatunk, amelyek &uacute;j funkci&oacute;kkal ruh&aacute;zz&aacute;k fel a k&ouml;r&uuml;l&ouml;tt&uuml;nk l&eacute;vő milli&aacute;rdnyi programozhat&oacute; t&aacute;rgyat. A programoz&aacute;s az &ouml;tleteink megval&oacute;s&iacute;t&aacute;s&aacute;nak leggyorsabb m&oacute;dja, &eacute;s ez a leghat&eacute;konyabb m&oacute;dszer az algoritmikus gondolkod&aacute;si k&eacute;pess&eacute;gek fejleszt&eacute;s&eacute;re. A sz&aacute;m&iacute;t&aacute;stechnikai gondolkod&aacute;sm&oacute;d fejleszt&eacute;s&eacute;hez azonban nincs felt&eacute;tlen&uuml;l sz&uuml;ks&eacute;g technol&oacute;gi&aacute;ra. A sz&aacute;m&iacute;t&aacute;stechnikai gondolkod&aacute;si k&eacute;szs&eacute;geink azonban l&eacute;tfontoss&aacute;g&uacute;ak a technol&oacute;gia műk&ouml;dtet&eacute;s&eacute;re.</p>

                    <p>Ebben a vide&oacute;ban Alessandro Bogliolo, a sz&aacute;m&iacute;t&oacute;g&eacute;pes rendszereket kutat&oacute; olasz tan&aacute;r &eacute;s az eur&oacute;pai programoz&aacute;si h&eacute;t nagyk&ouml;vete bemutatja azokat az offline programoz&aacute;si tev&eacute;kenys&eacute;geket, amelyek elektronikus eszk&ouml;z n&eacute;lk&uuml;l gyakorolhat&oacute;k. Az ilyen &bdquo;offline&rdquo; tev&eacute;kenys&eacute;gek legfőbb c&eacute;lja, hogy cs&ouml;kkentse a programoz&aacute;shoz val&oacute; hozz&aacute;f&eacute;r&eacute;s korl&aacute;tait az iskol&aacute;kban, &eacute;s finansz&iacute;roz&aacute;st&oacute;l &eacute;s a berendez&eacute;sektől f&uuml;ggetlen&uuml;l tegye lehetőv&eacute; a programoz&aacute;st.</p>

                    <p>Az offline programoz&aacute;si tev&eacute;kenys&eacute;gek a k&ouml;r&uuml;l&ouml;tt&uuml;nk l&eacute;vő fizikai vil&aacute;g sz&aacute;m&iacute;t&aacute;stechnikai szempontjait fedik fel.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Vide&oacute; forgat&oacute;k&ouml;nyv&eacute;nek let&ouml;lt&eacute;se</a></p>

                    <h2>K&eacute;szen &aacute;ll arra, hogy megossza a tanultakat a di&aacute;kjaival?</h2>

                    <p>V&aacute;lasszon ki egyet az al&aacute;bbi &oacute;rav&aacute;zlatok k&ouml;z&uuml;l, &eacute;s szervezzen tev&eacute;kenys&eacute;get a di&aacute;kjaival.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">1. tev&eacute;kenys&eacute;g: CodyRoby az &aacute;ltal&aacute;nos iskol&aacute;ban</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">2. tev&eacute;kenys&eacute;g: CodyRoby a k&ouml;z&eacute;piskola als&oacute; tagozat&aacute;ban</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">3. tev&eacute;kenys&eacute;g: CodyRoby a k&ouml;z&eacute;piskola felső tagozat&aacute;ban</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection