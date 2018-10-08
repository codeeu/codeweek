@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Visuaalne programmeerimine &ndash; Sissejuhatus Scratchi kasutamisse</h1><span>Autor: Margo Tinawi</span></div>

                    <hr>

                    <p>Visuaalne programmeerimine v&otilde;imaldab inimestel kirjeldada illustratsioonide ja graafika abil erinevaid protsesse. Tavaliselt tuuakse visuaalse programmeerimise vastandina v&auml;lja tekstip&otilde;hine programmeerimine. Visuaalse programmeerimise keeli on kohandatud, et algoritmilist m&otilde;tlemist saaks tutvustada ka lastele (v&otilde;i siis t&auml;iskasvanutele). See t&auml;hendab v&auml;hem lugemist ja keerulise s&uuml;ntaksi puudumist.</p>

                    <p>Selles videos aitab Margo Tinawi, Le Wagoni veebiarenduse &otilde;petaja ja Belgia ettev&otilde;tte Techies Lab asbl kaasasutaja, tutvuda Scratchiga, mis on &uuml;ks populaarseimatest visuaalse programmeerimise keeltest terves maailmas. Scratch loodi MIT &uuml;likoolis 2002.&nbsp;aastal ja n&uuml;&uuml;dseks on selle &uuml;mber tekkinud suur kogukond. Scratchist v&otilde;ite leida miljoneid projekte, mida oma &otilde;pilastega taasluua, ja lugematul hulgal erinevates keeltes &otilde;ppematerjale.</p>

                    <p>Scratchi kasutamiseks ei pea olema eelnevaid kodeerimisoskusi ja seda saab kasutada k&otilde;ikide &otilde;ppeainete juures! N&auml;iteks v&otilde;ite kasutada Scratchi digitaalse jutuvestmisvahendina v&otilde;i lasta &otilde;pilastel lugusid luua, matemaatilisi probleeme illustreerida v&otilde;i kunstiv&otilde;istlusi korraldada, aidates neil samal ajal oma kultuurip&auml;randit &otilde;ppima tunda. L&auml;bi erinevate tegevuste &otilde;pivad lapsed muidugi ka kodeerimist ja algoritmilist m&otilde;tlemist &ndash; ja mis k&otilde;ige t&auml;htsam, neil on l&otilde;bus.</p>

                    <p>Scratch on tasuta k&auml;ttesaadav, v&auml;ga intuitiivne ja motiveeriv. Vaadake Margo videot ja &otilde;ppige Scratchi kasutamist.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Laadi alla video skript</a></p>

                    <h2>Kas olete valmis &otilde;pitut oma &otilde;pilastega jagama?</h2>

                    <p>Valige altpoolt &uuml;ks tunniplaanidest ja alustage &otilde;ppimist.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">1. tegevus &ndash; Scratchi p&otilde;hit&otilde;ed algkoolile</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">2. tegevus &ndash; Scratchi p&otilde;hit&otilde;ed p&otilde;hikooli esimesele astmele</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">3. tegevus &ndash; Scratchi p&otilde;hit&otilde;ed p&otilde;hikooli teisele astmele</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection