@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Algoritmiline m&otilde;tlemine ja probleemide lahendamine</h1><span>Autor: Miles Berry</span></div>

                    <hr>

                    <p>Algoritmiline m&otilde;tlemine t&auml;hendab probleemide ja s&uuml;steemide vaatamist viisil, mis aitaks arvutil neid lahendada v&otilde;i m&otilde;ista. Algoritmiline m&otilde;tlemine ei ole vajalik ainult arvutiprogrammide arendamisel, vaid on kasulik ka erinevate probleemide lahendamisel.</p>

                    <p>Algoritmilist m&otilde;tlemist saate &otilde;petada, kui lasete &otilde;pilastel jagada &uuml;he keerulise probleemi v&auml;iksemateks osadeks (dekompositsioon), leida mustreid (mustrituvastus) ja selgitada v&auml;lja probleemi lahendamiseks vajalikke detaile (abstraktsioon); v&otilde;i kui loote reeglid v&otilde;i juhised, mida tuleb j&auml;rgida soovitud tulemuse saavutamiseks (algoritmi loomine). Algoritmilist m&otilde;tlemist saab &otilde;petada erinevate &otilde;ppeainete raames, nagu matemaatika (reeglite loomine teise astme hulkliikme teguriteks lahutamise jaoks), kirjandus (luuletuse anal&uuml;&uuml;si jagamine r&uuml;tmi-, riimi- ja struktuurianal&uuml;&uuml;siks), keeled (grammatiliste reeglite ja nende mustrite avastamine) ja nii edasi.</p>

                    <p>Selles videos tutvustab Miles Berry, Gulidfordis (&Uuml;hendkuningriigis) asuva Roehamptoni &uuml;likooli &otilde;ppej&otilde;ud, algoritmilise m&otilde;tlemise kontseptsiooni ja erinevaid viise, kuidas &otilde;petaja seda erinevate m&auml;ngude abil klassiruumi tuua saab.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Laadi alla video skript</a></p>

                    <h2>Kas olete valmis &otilde;pitut oma &otilde;pilastega jagama?</h2>

                    <p>Valige altpoolt m&otilde;ni tunnikava ja alustage &otilde;ppimist.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">1. tegevus &ndash; matemaatilise anal&uuml;&uuml;si &otilde;petamine algkoolile</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">2. tegevus &ndash; algoritmide tutvustamine p&otilde;hikooli esimesele astmele</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">3. tegevus &ndash; algoritmid p&otilde;hikooli teisele astmele</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection
