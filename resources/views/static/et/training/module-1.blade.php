@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Arvutita programmeerimine</h1><span>Autor: Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Programmeerimine on keel, mis v&otilde;imaldab kirjutada programme, mille abil saab lisada uusi funktsioone k&uuml;mnetele miljarditele programmeeritavatele objektidele. Programmeerimine on kiireim viis oma m&otilde;tteid teoks teha ja k&otilde;ige t&otilde;husam viis oma algoritmilise m&otilde;tlemise arendamiseks. Samas ei ole algoritmilise m&otilde;tlemise arendamiseks alati arvutit vaja. Algoritmiline m&otilde;tlemine on eelk&otilde;ige vajalik selleks, et tehnoloogia t&ouml;&ouml;le saada.</p>

                    <p>Selles videos tutvustab Alessandro Bogliolo, arvutis&uuml;steemide &otilde;ppej&otilde;ud Itaalias ja Euroopa programmeerimisn&auml;dala Code Week koordinaator, erinevaid programmeerimistegevusi, mida saab harjutada ilma elektrooniliste seadmeteta. Selliste tegevuste peamine eesm&auml;rk on viia programmeerimine igasse kooli, hoolimata rahastusest ja varustusest.</p>

                    <p>Elektroonikavabad programmeerimistegevused aitavad paljastada f&uuml;&uuml;silise maailma algoritmilisi aspekte.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Laadi alla video skript</a></p>

                    <h2>Kas olete valmis &otilde;pitut oma &otilde;pilastega jagama?</h2>

                    <p>Valige altpoolt m&otilde;ni tunnikava ja alustage &otilde;ppimist.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">1. tegevus &ndash; CodyRoby algkoolile</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">2. tegevus &ndash; CodyRoby p&otilde;hikooli esimesele astmele</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">3. tegevus &ndash; CodyRoby p&otilde;hikooli teisele astmele</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection
