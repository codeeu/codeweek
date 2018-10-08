@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Laskennallinen ajattelu ja ongelmanratkaisu</h1><span>Miles Berry</span></div>

                    <hr>

                    <p>Laskennallinen ajattelu on tapa tarkastella ongelmia ja j&auml;rjestelmi&auml; niin, ett&auml; tietokonetta voidaan k&auml;ytt&auml;&auml; apuna niiden ratkaisemiseksi ja ymm&auml;rt&auml;miseksi. Laskennallinen ajattelu on v&auml;ltt&auml;m&auml;t&ouml;nt&auml; tietokoneohjelmien kehitt&auml;miseksi. Lis&auml;ksi sit&auml; voidaan k&auml;ytt&auml;&auml; ongelmanratkaisun tukena monilla aloilla.</p>

                    <p>Voit opettaa oppilaillesi laskennallista ajattelua laittamalla heid&auml;t pilkkomaan monimutkaisia ongelmia pienemmiksi (hajottaminen osiin), tunnistamaan malleja (mallien tunnistaminen) sek&auml; tunnistamaan olennaisia yksityiskohtia ongelman ratkaisemiseksi (k&auml;sitteellist&auml;minen) tai m&auml;&auml;rittelem&auml;ll&auml; s&auml;&auml;nn&ouml;t tai ohjeet, joita on noudatettava haluttuun tulokseen p&auml;&auml;semiseksi (algoritmisuunnittelu). Laskennallista ajattelua voidaan opettaa eri aineissa, kuten esimerkiksi matematiikassa (toisen asteen polynomien tekij&ouml;ihin jakamisen s&auml;&auml;nt&ouml;jen m&auml;&auml;ritteleminen), &auml;idinkieless&auml; ja kirjallisuudessa (runon analysointi analysoimalla runomittaa, riimi&auml; ja rakennetta) ja vieraissa kieliss&auml; (verbin loppukirjaimia koskevan kaavan m&auml;&auml;ritteleminen, kun kirjoitusasu muuttuu aikamuodon vaihtuessa).</p>

                    <p>Roehampton School of Education at Guildford&nbsp;-yliopiston (Yhdistynyt kuningaskunta) lehtori Miles Berry esittelee videolla laskennallisen ajattelun k&auml;sitteen ja erilaisia tapoja, joilla opettaja voi sis&auml;llytt&auml;&auml; laskennallista ajattelua opetukseen yksinkertaisilla peleill&auml;.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Lataa videon k&auml;sikirjoitus</a></p>

                    <h2>Oletko valmis jakamaan oppimasi oppilaittesi kanssa?</h2>

                    <p>Valitse yksi alla olevista tuntisuunnitelmista ja ryhdy toimeen.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Toiminta 1 &ndash; Matemaattisen p&auml;&auml;ttelykyvyn kehitt&auml;minen alakouluissa</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Toiminta 2 &ndash; Algoritmeihin tutustuminen yl&auml;kouluissa</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Toiminta 3 &ndash; Algoritmit toisen asteen oppilaitoksissa</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection