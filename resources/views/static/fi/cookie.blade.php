@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Evästekäytännöt</h1>

            <h3><strong>Mitä evästeet ovat?</strong></h3>

            <p>
            <div>Eväste on pieni tekstitiedosto, jonka verkkosivusto tallentaa tietokoneellesi tai mobiililaitteellesi, kun vierailet sivustolla.</div>

            <div>
                <ul>
                    <li><strong>Ensimmäisen osapuolen evästeet</strong> ovat sen verkkosivuston asettamia evästeitä, jolla vierailet. Vain tämä verkkosivusto voi lukea niitä. Lisäksi verkkosivusto saattaa käyttää ulkoisia palveluja, jotka myös asettavat omia evästeitään. Niitä kutsutaan <strong>kolmansien osapuolten evästeiksi</strong>.</li>
                    <li>Pysyvät evästeet ovat tietokoneellesi tallennettavia evästeitä, joita ei poisteta automaattisesti, kun suljet selaimesi. Istuntokohtaiset evästeet sen sijaan poistetaan, kun suljet selaimesi.</li>
                </ul>

            </div>

            <p>Kun vierailet koodausviikon verkkosivustolla ensimmäistä kertaa, sinua pyydetään <strong>hyväksymään tai hylkäämään evästeet</strong>.</p>

            <p>Tarkoituksena on, että sivusto muistaa valintasi (kuten käyttäjänimen ja kielen) tietyn ajan.</p>

            <p>Näin sinun ei tarvitse antaa samoja tietoja uudelleen, kun siirryt sivustolla sivulta toiselle saman istunnon aikana.</p>

            <p>Evästeitä voidaan käyttää myös anonymisoitujen tilastojen laatimiseen kävijöiden selaustoiminnasta verkkosivuillamme.</p>
            </p>


            <h3><strong>Miten evästeitä käytetään?</strong></h3>

            <p>Koodausviikko käyttää lähinnä ”ensimmäisen osapuolen evästeitä”. Ne ovat komission asettamia ja valvomia evästeitä, joita ei voi käyttää mikään ulkopuolinen organisaatio.</p>

            <p>Joidenkin koodausviikon sivujen tarkastelu edellyttää kuitenkin ulkopuolisten organisaatioiden evästeiden hyväksymistä.</p>

            <div>Koodausviikko käyttää <strong>kolmentyyppisiä ensimmäisen osapuolen evästeitä</strong>. Niiden tarkoitus on<ul>
                    <li>tallentaa kävijän valinnat</li>
                    <li>mahdollistaa verkkosivustojen toiminta</li>
                    <li>kerätä analytiikkadataa (käyttäjien toimintamalleista).</li>
                </ul>
            </div>

            <h4>Kävijän valinnat</h4>
            <p>Nämä evästeet asettaa komission palvelin, ja ne ovat ainoastaan sen luettavissa. Evästeisiin tallentuu,<ul>
                <li>oletko hyväksynyt (vai hylännyt) tämän sivuston evästekäytännöt.</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Käyttö</th>
                    <th>Tarkoitus</th>
                    <th>Evästeen tyyppi ja säilytysaika</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Suostumus evästeiden käyttöön</td>
                    <td>Tallentaa evästeasetuksesi (jotta asiasta ei kysytä uudestaan)</td>
                    <td>Ensimmäisen osapuolen istuntokohtainen eväste, joka poistetaan, kun suljet selaimen</td>
                </tr>

                </tbody>
            </table><br/><h4>Toiminnalliset evästeet</h4>
            <p>
            <div>Jotkin evästeet ovat välttämättömiä, jotta tietyt verkkosivut toimisivat. Tästä syystä ne eivät edellytä suostumustasi. Näitä ovat<ul>
                    <li>tiettyjen IT-järjestelmien edellyttämät tekniset evästeet.</li>
                </ul>
            </div>
            </p><br/><h4>Tekniset evästeet</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Käyttö</th>
                    <th>Tarkoitus</th>
                    <th>Evästeen tyyppi ja säilytysaika</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>Takaa sinulle turvallisen istunnon sivustolla vieraillessasi.</td>
                    <td>Ensimmäisen osapuolen istuntokohtainen eväste, joka poistetaan, kun suljet selaimen</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>Takaa sinulle turvallisen istunnon pidempään ja tallentaa istunnon, kun suljet selaimen.</td>
                    <td>Ensimmäisen osapuolen pysyvä eväste, 60 kuukautta</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Tallentaa käyttäjän valitseman kielen</td>
                    <td>Ensimmäisen osapuolen istuntokohtainen eväste, joka poistetaan, kun suljet selaimen</td>
                </tr>

                </tbody>
            </table><br/><h4>Analytiikkaevästeet</h4>

            <p>Näitä evästeitä käytetään yksinomaan sivuston kaikille käyttäjille tarkoitettujen palvelujen kehittämiseen.</p>

            <p>Evästeet arvioivat käyttäjän vuorovaikutusta verkkosivuston kanssa. Tiedot anonymisoidaan, eli kerätyistä tiedoista ei voi tunnistaa käyttäjää henkilökohtaisesti.</p>

            <p>Näitä tietoja ei myöskään jaeta minkään kolmannen osapuolen kanssa eikä käytetä mihinkään muuhun tarkoitukseen. Anonymisoidut tilastot saatetaan jakaa sellaisten toimeksisaajien kanssa, jotka työskentelevät viestintähankkeissa komission kanssa tehdyn sopimuksen nojalla.</p>

            <p>Voit kuitenkin kieltää tämäntyyppisten evästeiden käytön joko ensimmäisen avaamasi sivun evästepalkista tai käymällä tällä <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">sivulla.</a>.</p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Käyttö</th>
                    <th>Tarkoitus</th>
                    <th>Evästeen tyyppi ja säilytysaika</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>Verkkoanalytiikkapalvelu, perustuu avoimen lähdekoodin Matomo-ohjelmistoon</td>
                    <td>Tunnistaa verkkosivustolla kävijät (anonyymisti – käyttäjästä ei kerätä henkilötietoja).</td>
                    <td>Ensimmäisen osapuolen pysyvä eväste, 20 päivää</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Verkkoanalytiikkapalvelu, perustuu avoimen lähdekoodin Matomo-ohjelmistoon</td>
                    <td>Tunnistaa sivut, joilla sama käyttäjä käy saman istunnon aikana (anonyymisti – käyttäjästä ei kerätä henkilötietoja).</td>
                    <td>Ensimmäisen osapuolen pysyvä eväste, 30 minuuttia</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Kolmansien osapuolten evästeet</strong></h3>

            <div>
                <p>Joidenkin sivujemme sisältö on peräisin ulkopuolisilta palveluntarjoajilta (esim. YouTube, Facebook ja Twitter).</p>

                <p>Voidaksesi nähdä tämän kolmansien osapuolten sisällön sinun on ensin hyväksyttävä niiden omat käyttöehdot. Tämä koskee myös niiden evästekäytäntöjä, joita komissio ei voi kontrolloida.</p>

                <p>Jos et kuitenkaan käytä tätä sisältöä, kolmansien osapuolten evästeitä ei tallennu laitteellesi.</p>Koodausviikon ulkopuoliset palveluntarjoajat<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Nämä ulkopuoliset palveluntarjoajat eivät ole koodausviikon verkkosivuston valvonnassa. Palveluntarjoajat voivat milloin tahansa muuttaa muun muassa palvelunsa käyttöehtoja tai evästeiden tarkoitusta ja käyttöä.</div><br/><h3><strong>Evästeiden hallinta</strong></h3>

            <p>Voit <strong>hallita ja/tai poistaa</strong> evästeitä vapaasti. Ohjeita on osoitteessa <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Evästeiden poistaminen laitteeltasi</strong></p>

            <p>Voit poistaa kaikki jo laitteellasi olevat evästeet tyhjentämällä selaimesi selaushistorian. Näin poistat kaikki evästeet kaikilta verkkosivuilta, joilla olet vieraillut.</p>

            <p>Huomaa kuitenkin, että saatat menettää myös jotain tallentamiasi tietoja (esim. tallennetut sisäänkirjautumistiedot tai sivustojen asetukset).</p><strong>Sivustokohtaisten evästeiden hallinta</strong><p>Sivustokohtaisia evästeitä voit hallita yksityiskohtaisemmin oletusselaimesi yksityisyys- ja evästeasetuksissa.</p><strong>Evästeiden estäminen</strong><p>Useimmissa nykyaikaisissa selaimissa voi estää kaikkien evästeiden asettamisen laitteelle, mutta silloin joudut mahdollisesti mukauttamaan joitakin asetuksia manuaalisesti joka kerta, kun käyt tietyllä sivustolla/sivulla. Tietyt palvelut ja toiminnot eivät välttämättä toimi kunnolla (esim. profiiliin sisäänkirjautuminen).</p><strong>Analytiikkaevästeiden hallinta</strong><p>Voit hallita analytiikkaevästeidemme asetuksia <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">tällä sivulla.</a></p>


        </section>

    </section>@endsection
