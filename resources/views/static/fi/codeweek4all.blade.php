@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Kaikkien koodausviikko -haaste</h1><span></span></div>

                    <hr>

                    <p>Kaikkien koodausviikko -haaste kehottaa yhdist&auml;m&auml;&auml;n tapahtumasi yst&auml;vien, kollegoiden ja tuttujen j&auml;rjest&auml;mien tapahtumien kanssa, jotta voitte yhdess&auml; saada koodausviikon osaamissertifikaatin.</p>


                    <simple-question :visible="true">
                        <template slot="title">Mik&auml; se on?</template>
                        <template slot="content">
                            <p>Sen lis&auml;ksi, ett&auml; l&auml;het&auml;t itse tapahtumasi EU:n koodausviikon karttaan, voit my&ouml;s kutsua muut verkostosi j&auml;senet tekem&auml;&auml;n samoin. Jos sin&auml; ja verkostosi saavutatte jonkin seuraavista rajoista, saatte kaikki koodausviikon osaamissertifikaatin!</p>
                            <p>Osaamissertifikaatin ansaitsemiskriteerit:</p>
                            <ul>
                                <li><strong>500 osallistuvaa opiskelijaa</strong></li>ja/tai<li><strong>10 yhdistetty&auml; tapahtumaa</strong></li>ja/tai<li><strong>3 osallistuvaa maata</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Miten osallistutaan?</template>
                        <template slot="content">
                            <ol>
                                <li>K&auml;y <a href="/add">Lis&auml;&auml; tapahtuma</a> -sivulla ja t&auml;yt&auml; tarvittavat tiedot koodaustapahtumastasi.</li>
                            </ol><i>Jos olet verkostosi ensimm&auml;inen:</i><ol start="2">
                                <li>Napsauta L&auml;het&auml;</li>
                                <li>Kun toimintosi on hyv&auml;ksytty, saat vahvistuss&auml;hk&ouml;postin, jossa on yksil&ouml;llinen Kaikkien koodausviikon koodi.</li>
                                <li>Kopioi koodi ja jaa se kollegoillesi ja muille verkostosi j&auml;senille, jotka my&ouml;s j&auml;rjest&auml;v&auml;t koodaustapahtuman. Levit&auml; sanaa ja kehota muitakin osallistumaan!</li>
                                <li>Kampanjan p&auml;&auml;tytty&auml; kaikkia tapahtumien j&auml;rjest&auml;ji&auml; pyydet&auml;&auml;n raportoimaan osanottajien lukum&auml;&auml;r&auml;. Jos onnistuitte saavuttamaan rajan, sin&auml; ja verkostoosi kuuluneet kollegasi saatte osaamissertifikaatin!</li>
                            </ol><i>Jos liityt jo olemassa olevaan verkostoon:</i><ol start="2">
                                <li>Liit&auml; verkoston perustajalta saamasi koodi KAIKKIEN KOODAUSVIIKON KOODILLE tarkoitettuun kentt&auml;&auml;n.</li>
                                <li>Napsauta L&auml;het&auml;.</li>
                                <li>Levit&auml; sanaa (ja koodia!), jotta useampi j&auml;rjest&auml;j&auml; liittyy verkostoosi</li>
                                <li>Kampanjan p&auml;&auml;tytty&auml; kaikkia tapahtumien j&auml;rjest&auml;ji&auml; pyydet&auml;&auml;n raportoimaan osanottajien lukum&auml;&auml;r&auml;. Jos onnistuitte saavuttamaan rajan, sin&auml; ja verkostoosi kuuluneet kollegasi saatte osaamissertifikaatin!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Miksi haasteeseen kannattaa liitty&auml;?</template>
                        <template slot="content">
                            <ul>
                                <li>P&auml;&auml;set levitt&auml;m&auml;&auml;n viesti&auml; koodauksen t&auml;rkeydest&auml;.</li>
                                <li>P&auml;&auml;set tuomaan mukaan suuren m&auml;&auml;r&auml;n opiskelijoita.</li>
                                <li>P&auml;&auml;set luomaan yhteyksi&auml; organisaatioiden ja/tai oppilaitosten kanssa joko omalla alueellasi tai ymp&auml;ri maailman.</li>
                                <li>P&auml;&auml;set hy&ouml;dynt&auml;m&auml;&auml;n muiden j&auml;rjest&auml;jien ja opettajien tukea.</li>
                                <li>P&auml;&auml;set tavoittelemaan <strong>osaamissertifikaattia.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection