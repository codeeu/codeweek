@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Opetuksellisten pelien kehitt&auml;minen Scratchill&auml;</h1><span>Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kriittinen ajattelu, sinnikkyys, ongelmanratkaisu, laskennallinen ajattelu ja luovuus ovat vain muutamia esimerkkej&auml; taidoista, joita oppilaasi tarvitsevat menesty&auml;kseen 2000-luvulla. Koodaus voi auttaa kehitt&auml;m&auml;&auml;n n&auml;it&auml; taitoja hauskalla ja motivoivalla tavalla.</p>

                    <p>Algoritmiset k&auml;sitteet, kuten datavuon ohjaus ohje- ja silmukkajonoja k&auml;ytt&auml;m&auml;ll&auml;, tiedonesitys muuttujia ja luetteloita k&auml;ytt&auml;m&auml;ll&auml; tai prosessien synkronointi, saattavat kuulostaa monimutkaisilta, mutta t&auml;ll&auml; videolla n&auml;et, ett&auml; niiden oppiminen on oletettua helpompaa.</p>

                    <p>Espanjalainen tietojenk&auml;sittelyopin opettaja ja tutkija Jes&uacute;s Moreno Le&oacute;n kertoo videolla, miten voit kehitt&auml;&auml; oppilaiden taitoja t&auml;ss&auml; ja muissakin aiheissa hauskalla tavalla. Miten se onnistuu? Kehitt&auml;m&auml;ll&auml; kysymyksi&auml; ja vastauksia -pelej&auml; Scratchill&auml;, joka on suosituin kouluissa k&auml;ytetty ohjelmointikieli maailmalla. Scratch kehitt&auml;&auml; laskennallista ajattelua sek&auml; auttaa sis&auml;llytt&auml;m&auml;&auml;n pelillist&auml;misen opetukseen, mik&auml; pit&auml;&auml; oppilaiden oppimismotivaatiota yll&auml; hauskalla tavalla.</p>

                    <p>Katso video, niin p&auml;&auml;set alkuun.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Lataa videon k&auml;sikirjoitus</a></p>

                    <h2>Oletko valmis jakamaan oppimasi oppilaittesi kanssa?</h2>

                    <p>Valitse yksi alla olevista tuntisuunnitelmista ja ryhdy toimeen.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Toiminta 1 - Kysymyksi&auml; ja vastauksia -peli Scratchill&auml; alakouluissa</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Toiminta 2 - Kysymyksi&auml; ja vastauksia -peli Scratchill&auml; yl&auml;kouluissa</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Toiminta 3 - Kysymyksi&auml; ja vastauksia -peli Scratchill&auml; toisen asteen oppilaitoksissa</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection