@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Koodausta ilman tietokoneita (unplugged)</h1><span>Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Koodaus on asioiden kieli, jonka avulla voimme kirjoittaa ohjelmia ja kehitt&auml;&auml; uusia toimintoja ymp&auml;rill&auml;mme oleviin kymmeniin miljardeihin ohjelmoitaviin kohteisiin. Koodaus on nopein tapa her&auml;tt&auml;&auml; ideamme henkiin ja tehokkain tapa kehitt&auml;&auml; laskennallista ajattelua. Laskennallisen ajattelun kehitt&auml;minen ei kuitenkaan v&auml;ltt&auml;m&auml;tt&auml; edellyt&auml; teknologiaa. Sen sijaan laskennallinen ajattelutaito on v&auml;ltt&auml;m&auml;t&ouml;nt&auml;, jotta teknologia saadaan toimimaan.</p>

                    <p>Italialainen tietokonej&auml;rjestelmien opettaja ja Euroopan koodausviikon koordinaattori Alessandro Bogliolo esittelee videolla unplugged-koodausharjoituksia, joita voidaan tehd&auml; ilman elektronisia laitteita. Tarkoituksena on madaltaa kynnyst&auml; edist&auml;&auml; koodausta kaikissa kouluissa koulun rahatilanteesta ja varustelusta riippumatta.</p>

                    <p>Unplugged-koodaustoiminta paljastaa meit&auml; ymp&auml;r&ouml;iv&auml;n fyysisen maailman laskennalliset ominaisuudet.</p>

                    @include('static.youtube', ['video_id' => '18N1CaQJ0GI'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/FI/CNECT-2018-00222-00-17-FI-TRA-00.DOCX">Lataa videon k&auml;sikirjoitus</a></p>

                    <h2>Oletko valmis jakamaan oppimasi oppilaittesi kanssa?</h2>

                    <p>Valitse yksi alla olevista tuntisuunnitelmista ja ryhdy toimeen.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/FI/CNECT-2018-00222-00-00-FI-TRA-00.DOCX">Toiminta 1 &ndash; CodyRoby alakouluihin</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/FI/CNECT-2018-00222-00-02-FI-TRA-00.DOCX">Toiminta 2 &ndash; CodyRoby yl&auml;kouluihin</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/FI/CNECT-2018-00222-00-03-FI-TRA-00.DOCX">Toiminta 3 &ndash; CodyRoby toiseen asteen oppilaitoksiin</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection