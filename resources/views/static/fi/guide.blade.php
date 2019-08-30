@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>J&auml;rjest&auml; oma #CodeWeek-tapahtuma</h1><span></span><div><a href="/add" target="_blank" class="btn btn-xl mt-8">Rekister&ouml;i tapahtumasi t&auml;&auml;ll&auml;</a></div>
                    </div>


                </div>


                <h2>Mik&auml; on EU:n koodausviikko?</h2>
                <p>EU:n koodausviikko on vapaaehtoisten py&ouml;ritt&auml;m&auml;, Euroopan komission tukema ruohonjuuritason liike. Kuka tahansa &ndash; koulu, opettaja, kirjasto, koodauskerho, yritys, julkisviranomainen &ndash; voi j&auml;rjest&auml;&auml; #CodeWeek-tapahtuman ja merkit&auml; sen <a href="/events">codeweek.eu</a>-sivuston karttaan.</p>


                <h2>Mit&auml; tapahtuman j&auml;rjest&auml;miseen tarvitaan?</h2>
                <ul>
                    <li><strong>Ryhm&auml;n ihmisi&auml;, jotka haluavat oppia.</strong> He voivat olla esimerkiksi yst&auml;vi&auml;si, lapsia, nuoria, aikuisia kollegoita, sukulaisia tai isovanhempia. Muista, ett&auml; jo kaksi ihmist&auml; muodostaa ryhm&auml;n!</li>
                    <li><strong>Opettajia tai kouluttajia</strong>, jotka tuntevat koodaustapahtuman aiheen ja osaavat opettaa ja inspiroida muita. Lukum&auml;&auml;r&auml; riippuu tapahtuman tyypist&auml; ja koosta.</li>
                    <li><strong>Tapahtumapaikan.</strong> Luokkahuoneet, kirjastot, kokoustilat ja monenlaiset julkiset tilat soveltuvat erinomaisesti tapahtumapaikaksi.</li>
                    <li><strong>Tietokoneita ja internetyhteyden.</strong> Kohderyhm&auml;st&auml;si riippuen voit pyyt&auml;&auml; osanottajia ottamaan omat kannettavat mukaan.</li>

                    <li><strong>Koodaus ilman tietokoneita.</strong> Laskennallisen ajattelun kehitt&auml;minen ei v&auml;ltt&auml;m&auml;tt&auml; edellyt&auml; tietokoneita ja internetyhteytt&auml;. Aloita tutustumalla <a href="/training/coding-without-computers">Koodausta ilman tietokoneita</a> -osioomme.</li>


                    <li><strong>Opetusmateriaalit.</strong> N&auml;yt&auml; osallistujille, miten hauskaa on luoda jotain omaa. Tutustu <a
                                href="/resources">aineistoihimme</a> ja <a href="/training">opetusmateriaaleihin</a>, joihin sis&auml;ltyy ohjevideoita ja opetussuunnitelmia, ja muokkaa niit&auml; ryhm&auml;si tarpeiden mukaan.</li>


                    <li><strong>Osallistujien ilmoittautuminen.</strong> Jos tilaa on rajallisesti, voit j&auml;rjest&auml;&auml; osallistujien ilmoittautumisen verkkoty&ouml;kalujen, kuten <a href="https://docs.google.com/forms/">Google-lomakkeiden</a> ja <a
                                href="https://www.eventbrite.com/">Eventbriten</a> avulla.</li>
                    <li>Muista <a href="/add">merkit&auml; tapahtumasi</a> <a href="/events">koodausviikon karttaan</a>!</li>
                </ul>


                <h2>Miten tapahtuma j&auml;rjestet&auml;&auml;n?</h2>
                <ul>
                    <li>P&auml;&auml;t&auml;t itse koodaustapahtuman muodon, mutta suosittelemme, ett&auml; siihen sis&auml;ltyy <strong>k&auml;yt&auml;nn&ouml;nl&auml;heinen osuus</strong>, jossa osallistujat voivat luoda jotain omaa ja/tai puuhailla koneiden parissa.</li>
                    <li>J&auml;rjest&auml; kohderyhm&auml;lle sopivat <strong>ty&ouml;kalut ja tekniikat</strong>. Suosittelemme k&auml;ytt&auml;m&auml;&auml;n <a href="http://codeweek.eu/resources/">vapaasti saatavilla olevaa avoimen l&auml;hdekoodin materiaalia</a>.</li>

                    <li>Kehota osallistujia <strong>esittelem&auml;&auml;n</strong> omat luomuksensa muille tapahtuman p&auml;&auml;tteeksi.</li>

                    <li><strong>Levit&auml; tietoa!</strong> Promotoi ja jaa tapahtumasi tuloksia sosiaalisessa mediassa #CodeWeek-aihetunnisteella. Voit my&ouml;s julkaista tietoja <a
                                href="https://www.facebook.com/groups/774720866253044/">EU:n koodausviikon opettajien ryhm&auml;ss&auml;</a> ja Twitteriss&auml; (<a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>). Kerro tapahtumasta yst&auml;villesi, muille kouluttajille ja paikallisille lehdist&ouml;lle ja laadi lehdist&ouml;tiedote.</li>

                    <li>Muista <a href="/add">merkit&auml; tapahtumasi</a> <a href="/events">koodausviikkokarttaan</a>!</li>


                </ul>


                <h2>Mainosmateriaali</h2>
                <p>Lue <a href="http://blog.codeweek.eu/">blogistamme</a> uusimmat uutiset ja muokkaa uusin lehdist&ouml;tiedote tarpeidesi mukaan tai luo t&auml;ysin oma:</p>
                <ul>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/gearing-celebrate-eu-code-week-2019">Valmistautuminen EU:n koodausviikon 2019 juhlintaan</a> (saatavana 29 kielell&auml;)</li>

                </ul>


                <h2>Lataa seuraavat ty&ouml;kalupakit, jotta p&auml;&auml;set alkuun:</h2>
                <ul>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BCommunications%2BToolkit.zip">Viestint&auml;ty&ouml;kalut</a></li>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BTeachers%2BToolkit.zip">Opettajien ty&ouml;kalut</a></li>
                </ul>

                <h2>Onko sinulla kysytt&auml;v&auml;&auml;?</h2>Jos sinulla on kysytt&auml;v&auml;&auml; #CodeWeek-tapahtuman j&auml;rjest&auml;misest&auml; tai markkinoinnista, ota yhteytt&auml; oman maasi <a href="/ambassadors">EU:n koodausviikkol&auml;hettil&auml;&auml;seen</a>.</div>
        </div>
    </section>@endsection