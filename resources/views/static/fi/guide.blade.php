@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Osallistu EU:n koodausviikkoon ja j&auml;rjest&auml; #codeEU-tapahtumia</h1><span></span><div><a href="/add" target="_blank" class="btn btn-xl mt-8">Rekister&ouml;i tapahtumasi t&auml;&auml;ll&auml;</a></div>
                    </div>


                </div>


                <h4><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/codeeu_toolkit.pdf"
                       alt="#codeEU Toolkit"><i class="fa fa-download"></i> Lataa #codeEU-ty&ouml;kalupakki PDF:n&auml;</a></h4>
                <h2>#codeEU-ty&ouml;kalupakki</h2>
                <h2>Mik&auml; on EU:n koodausviikko?</h2>
                <p>EU:n koodausviikko on ruohonjuuritason hanke, jossa vapaaehtoiset tekev&auml;t ohjelmointia tunnetuksi oman maansa <a
                            href="/ambassadors">koodausviikkol&auml;hettil&auml;in&auml;</a>. Kuka tahansa &ndash; koulu, opettaja, kirjasto, koodauskerho, yritys, julkisviranomainen &ndash; voi j&auml;rjest&auml;&auml; #CodeEU-tapahtuman ja merkit&auml; sen <a href="/">codeweek.eu</a>-karttaan.</p>
                <h2>Kuka voi j&auml;rjest&auml;&auml; tapahtuman koodausviikolla?</h2>
                <p>Kuka tahansa voi j&auml;rjest&auml;&auml; tapahtuman koodausviikolla.</p>
                <ul>
                    <li><strong>Lapset/nuoret/aikuiset</strong> voivat j&auml;rjest&auml;&auml; koodaustapahtumia ja opettaa muille, miten luodaan koodaamalla.</li>
                    <li><strong>Koulut/iltap&auml;iv&auml;kerhot/aikuisten iltakurssit</strong> voivat j&auml;rjest&auml;&auml; tapahtumia omille oppilailleen ja opiskelijoilleen. Koodaus verkossa tai ilman tietokonetta on hauskaa ja kehitt&auml;&auml; laskennallista ajattelua!</li>
                    <li>Koodaavat <strong>opettajat ja kirjastonhoitajat</strong> voivat pit&auml;&auml; koodaustunteja, jakaa tuntisuunnitelmansa ja j&auml;rjest&auml;&auml; ty&ouml;pajoja kollegoilleen.</li>
                    <li><strong>Opettajat ja kirjastonhoitajat</strong>, jotka eiv&auml;t osaa koodata, voivat kutsua sukulaisiaan tai opiskelijoitaan opettamaan osallistujille koodausta.</li>
                    <li><strong>Koodarit</strong> voivat j&auml;rjest&auml;&auml; ty&ouml;pajoja paikallisissa kouluissa, hacklab-tiloissa tai kulttuurikeskuksissa ja kutsua ihmisi&auml; luomaan koodin avulla.</li>
                    <li><strong>Koodauskerhot</strong> voivat j&auml;rjest&auml;&auml; uusille osallistujille ty&ouml;pajoja ja opettaa, miten pelej&auml; tai sovelluksia kehitet&auml;&auml;n koodaamalla.</li>
                    <li><strong>Yritykset ja kansalaisj&auml;rjest&ouml;t</strong> voivat is&auml;nn&ouml;id&auml; koodausty&ouml;pajoja, lainata ty&ouml;ntekij&ouml;it&auml;&auml;n opettamaan eri tapahtumissa, j&auml;rjest&auml;&auml; hauskoja koodaushaasteita ja sponsoroida koodaustapahtumia.</li>
                </ul>

                <h2>Mit&auml; tarvitsen?</h2>
                <ul>
                    <li><strong>Ryhm&auml;n ihmisi&auml;, jotka haluavat oppia.</strong> He voivat olla esimerkiksi yst&auml;vi&auml;si, lapsia, nuoria, aikuisia kollegoita, sukulaisia tai isovanhempia. Muista, ett&auml; jo kaksi ihmist&auml; muodostaa ryhm&auml;n!</li>
                    <li><strong>Valmentajia tai kouluttajia</strong>, jotka osaavat koodata ja jotka voivat opettaa ja inspiroida muita. Lukum&auml;&auml;r&auml; riippuu tapahtuman tyypist&auml; ja koosta. K&auml;yt&auml;nn&ouml;n ty&ouml;pajoissa saattaa riitt&auml;&auml; yksi valmentaja 5&ndash;8 osallistujaa kohti. My&ouml;s osallistujat voivat auttaa toinen toisiaan! Suuremmissa tapahtumissa kannattaa olla is&auml;nt&auml;, joka varmistaa, ett&auml; kaikilla on kaikki tarpeellinen ja ett&auml; tapahtuma sujuu hyvin.</li>
                    <li><strong>Tapahtumapaikan.</strong> Luokkahuoneet, kirjastot, kokoustilat ja monenlaiset julkiset tilat soveltuvat eriomaisesti tapahtumapaikaksi.</li>
                    <li><strong>Tietokoneita.</strong> Kohderyhm&auml;st&auml; riippuen voit pyyt&auml;&auml; osallistujia tuomaan oman kannettavan tietokoneensa. Muista tarkistaa, ett&auml; s&auml;hk&ouml;pistokkeita on riitt&auml;v&auml;sti.</li>
                    <li><strong>Internetyhteyden</strong> &ndash; Langaton tai kiinte&auml; internetyhteys. Varmista, ett&auml; internetyhteys kest&auml;&auml; koko ryhm&auml;n dataliikenteen.</li>
                    <li><strong>Koodaus ilman tietokoneita.</strong> Laskennallisen ajattelun kehitt&auml;minen ei v&auml;ltt&auml;m&auml;tt&auml; edellyt&auml; tietokoneita ja internetyhteytt&auml;. Kokeile offline-koodausta <a
                                href="http://codeweek.it/codyroby/">Cody-Roby</a>-pakettimme avulla.</li>
                    <li><strong>Jotain ty&ouml;stett&auml;v&auml;&auml; ja opittavaa.</strong> N&auml;yt&auml; osallistujille, miten hauskaa on luoda jotain omaa. Tutustu <a href="http://codeweek.eu/resources/">aineistoluetteloomme</a> ja hae verkosta olemassa olevia tuntisuunnitelmia ja ty&ouml;pajaohjelmia ja sopeuta ne oman ryhm&auml;si tarpeisiin. Jos tapahtumapaikalla on jo tietokoneet, varmista, ett&auml; niihin on asennettu tarvittava ohjelmisto. Anna osallistujille ohjeet ohjelmiston asentamiseksi omille laitteilleen.</li>
                    <li><strong>Osallistujien ilmoittautuminen.</strong> Jos tapahtumaan on rajoitettu m&auml;&auml;r&auml; paikkoja, voit ker&auml;t&auml; ilmoittautumisia k&auml;ytt&auml;m&auml;ll&auml; verkkolomakkeita, kuten Wufoo, Google-lomakkeita tai Facebookin tai Eventbriten tapahtumasivua. Suosimme ilmaisia tapahtumia, mutta voit kuitenkin peri&auml; pienen maksun tapahtuman kustannusten kattamiseksi. Vaihtoehtoisesti voit k&auml;&auml;nty&auml; paikallisten IT-yritysten tai startup-yritysten puoleen ja pyyt&auml;&auml; sponsorointitukea.</li>
                    <li><a href="/add">Merkitse tapahtumasi</a> <a href="/">koodausviikkokarttaan</a>!</li>
                </ul>


                <h2>Miten j&auml;rjest&auml;n tapahtuman?</h2>
                <ul>
                    <li>P&auml;&auml;t&auml;t itse koodaustapahtuman muodon, mutta suosittelemme, ett&auml; siihen sis&auml;ltyy <strong>k&auml;yt&auml;nn&ouml;nl&auml;heinen osuus</strong>, jossa osallistujat voivat luoda jotain omaa tai rassata koneita.</li>
                    <li>Voit k&auml;ytt&auml;&auml; haluamiasi <strong>ty&ouml;kaluja ja tekniikoita</strong>, mutta me suosimme <a
                                href="http://codeweek.eu/resources/">ilmaisia avoimen l&auml;hdekoodin aineistoja</a>.</li>
                    <li><strong>Hymyile!</strong> Yst&auml;v&auml;llinen ilmapiiri rikkoo j&auml;&auml;n ja motivoi oppimaan.</li>
                    <li><strong>V&auml;lipalat ja juomat</strong>. Jos tapahtuma kest&auml;&auml; pari tuntia, osallistujat tarvitsevat tauon. Jos et pysty tarjoamaan sy&ouml;t&auml;v&auml;&auml; ja juotavaa, pyyd&auml; osallistujia tuomaan sy&ouml;t&auml;v&auml;&auml; ja juotavaa nyyttikestiperiaatteella.</li>
                    <li>Pyyd&auml; osallistujia <strong>esittelem&auml;&auml;n</strong> omat luomuksensa muille tapahtuman p&auml;&auml;tteeksi. Kaikki ovat ylpeit&auml;!</li>
                    <li><strong>Kerro tapahtumasta!</strong> Kerro tapahtumastasi sosiaalisessa mediassa. K&auml;yt&auml; tunnisteita #CodeEU ja @CodeWeekEU. Kerro tapahtumasta yst&auml;villesi ja paikallisille lehdist&ouml;lle ja laadi lehdist&ouml;tiedote!</li>
                    <li>Muista <a href="/add">merkit&auml; tapahtuma</a> <a href="/">koodausviikkokarttaan</a>!</li>
                </ul>


                <h2>Mainosmateriaali</h2>
                <p>Voit k&auml;ytt&auml;&auml; tapahtumasi markkinoinnissa vapaasti seuraavaa lehdist&ouml;tiedotetta:</p>
                <ul>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/eu-code-week-celebrating-its-5th-birthday-7-22-october-get-ready-join-and-learn-how-create-code">EU:n koodausviikko viett&auml;&auml; 5-vuotisjuhlaa 7.&ndash;22. lokakuuta &ndash; valmistaudu, osallistu ja opi luomaan koodaamalla!</a></li>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/million-coded-in-record-2016-EU-code-week">EU:n koodausviikon uusi enn&auml;tys: Vuoden 2016 koodausviikolle osallistui miljoonaa koodaajaa</a></li>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/save-date-eu-code-week-10-18-october-2015-bringing-ideas-life-codeeu">EU:n koodausviikko: Her&auml;t&auml; ideasi eloon #codeEU-koodausviikolla</a></li>
                </ul>
                <p>Voit my&ouml;s k&auml;ytt&auml;&auml; <a href="https://github.com/codeeu/codeeu-resources/tree/master/Logo - generic">Euroopan koodausviikkologoa</a>, kunhan tapahtumasi on suuntaviivojemme mukainen.</p>


                <h2>Onko sinulla kysytt&auml;v&auml;&auml;?</h2>
                <p>Jos sinulla on kysytt&auml;v&auml;&auml; #codeEU-tapahtuman j&auml;rjest&auml;misest&auml; tai markkinoinnista, ota yhteytt&auml; oman maasi <a href="/ambassadors">EU:n koodausviikkol&auml;hettil&auml;&auml;seen</a>.</p>


            </div>
        </div>
    </section>@endsection