@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Küpsiste kasutamise põhimõtted</h1>

            <h3><strong>Mis on küpsised?</strong></h3>

            <p>
            <div>Küpsis on väike tekstifail, mille veebisait salvestab teie arvutisse või mobiilseadmesse, kui te veebisaiti külastate.</div>

            <div>
                <ul>
                    <li><strong>Esimese osapoole küpsised</strong> on küpsised, mille on seadnud see veebisait, mida te külastate. Neid saab lugeda ainult see veebisait. Lisaks võidakse veebisaidil kasutada väliseid teenuseid, mis võivad samuti seada oma küpsiseid, nn <strong>kolmanda osapoole küpsiseid</strong>.</li>
                    <li>Püsiküpsised on teie arvutis salvestatud küpsised, mida ei kustutata automaatselt, kui te brauseri sulgete, erinevalt seansiküpsistest, mis brauseri sulgemisel kustutatakse.</li>
                </ul>

            </div>

            <p>Esimesel korral, kui te Codeweeki veebisaiti külastate, küsitakse teilt, kas te <strong>nõustute küpsistega või mitte</strong>.</p>

            <p>Selle eesmärk on võimaldada veebisaidil jätta teie eelistused (nt kasutajanimi, keel jne) teatud ajavahemikuks meelde.</p>

            <p>Nii ei pea te neid uuesti sisestama, kui te sama külastuse ajal eri lehekülgi sirvite.</p>

            <p>Küpsiseid võib kasutada ka selleks, et koguda anonüümseks muudetud statistikat meie veebilehtedega seotud sirvimiskogemuse kohta.</p>
            </p>


            <h3><strong>Kuidas me küpsiseid kasutame?</strong></h3>

            <p>Codeweek kasutab enamasti „esimese osapoole küpsiseid“. Need küpsised on meie seatud ja meie kontrolli all ega ole seotud ühegi välise organisatsiooniga.</p>

            <p>Mõne meie lehekülje vaatamiseks peate siiski nõustuma väliste organisatsioonide küpsiste kasutamisega.</p>

            <div>Me kasutame <strong>kolme liiki esimese osapoole küpsiseid</strong>, et:<ul>
                    <li>salvestada külastajate eelistused</li>
                    <li>muuta veebisaidid toimivaks</li>
                    <li>koguda analüüsiandmeid (kasutajate käitumise kohta)</li>
                </ul>
            </div>

            <h4>Külastajate eelistused</h4>
            <p>Need küpsised on meie seatud ja ainult meie saame neid lugeda. Need jätavad meelde:<ul>
                <li>kas te nõustusite (või mitte) selle veebisaidi küpsiste kasutamise põhimõtetega</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Teenus</th>
                    <th>Otstarve</th>
                    <th>Küpsise liik ja kehtivusaeg</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Küpsistega nõustumise komplekt</td>
                    <td>Salvestab teie küpsiseid puudutavad eelistused (nii välditakse küsimuse korduvat esitamist)</td>
                    <td>Esimese osapoole seansiküpsised kustutatakse pärast brauseri sulgemist</td>
                </tr>

                </tbody>
            </table><br/><h4>Toimivusküpsised</h4>
            <p>
            <div>Mõned küpsised on lisatud selleks, et teatavad veebilehed toimiksid. Seetõttu ei ole nende kasutamiseks vaja teie nõusolekut. Eelkõige:<ul>
                    <li>teatavate IT-süsteemide nõutavad tehnilised küpsised</li>
                </ul>
            </div>
            </p><br/><h4>Tehnilised küpsised</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Teenus</th>
                    <th>Otstarve</th>
                    <th>Küpsise liik ja kehtivusaeg</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>Säilitab teie külastuse kestel teile turvalise seansi.</td>
                    <td>Esimese osapoole seansiküpsis, kustutatakse pärast brauseri sulgemist</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>Säilitab turvalist seanssi pikemat aega, et seanss brauseri sulgemisel ei katkeks.</td>
                    <td>Esimese osapoole püsiküpsis, 60 kuud</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Salvestab kasutaja eelistatud keele</td>
                    <td>Esimese osapoole seansiküpsis, kustutatakse pärast brauseri sulgemist</td>
                </tr>

                </tbody>
            </table><br/><h4>Analüütilised küpsised</h4>

            <p>Neid kasutatakse üksnes komisjonisisestel eesmärkidel, et uurida, kuidas saaks parandada teenust, mida me kõigile oma kasutajatele pakume.</p>

            <p>Küpsised hindavad lihtsalt seda, kuidas te anonüümse kasutajana veebisaidiga suhtlete (kogutud andmed ei võimalda tuvastada kasutaja isikut).</p>

            <p>Neid andmeid ei jagata kolmandate isikutega ega kasutata muudel eesmärkidel. Anonüümseks muudetud statistikat võidakse jagada töövõtjatega, kes tegelevad komisjoniga sõlmitud lepingulise kokkuleppe alusel teavitusprojektidega.</p>

            <p>Teil on võimalik seda liiki küpsistest keelduda – kas küpsisebänneri kaudu, mida näete esimesel lehel, mida te külastate, või sellel <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">temaatilisel veebilehel</a>.</p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Nimi</th>
                    <th>Teenus</th>
                    <th>Otstarve</th>
                    <th>Küpsise liik ja kehtivusaeg</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>Veebi analüüsimise teenus, mis põhineb Matomo avatud lähtekoodiga tarkvaral</td>
                    <td>Tunneb ära veebilehe külastajad (anonüümselt – kasutajate kohta isikuandmeid ei koguta).</td>
                    <td>Esimese osapoole püsiküpsis, 20 päeva</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Veebi analüüsimise teenus, mis põhineb Matomo avatud lähtekoodiga tarkvaral</td>
                    <td>Tuvastab sama kasutaja poolt sama külastuse ajal vaadatud veebilehed (anonüümselt – kasutajate kohta isikuandmeid ei koguta).</td>
                    <td>Esimese osapoole püsiküpsis, 30 minutit</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Kolmandate osapoolte küpsised</strong></h3>

            <div>
                <p>Mõned meie veebilehed kuvavad sisu välistelt teenuseosutajatelt, näiteks YouTube, Facebook ja Twitter.</p>

                <p>Selle kolmandate isikute pakutava sisu nägemiseks peate kõigepealt nõustuma nende eritingimustega. See nõusolek hõlmab nende küpsiste kasutamise põhimõtteid, mille üle meil kontroll puudub.</p>

                <p>Kuid kui te seda sisu ei vaata, ei paigaldata teie seadmesse ühtegi kolmanda osapoole küpsist.</p>Kolmandatest isikutest pakkujad Codeweekil<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Need kolmandate isikute teenused ei kuulu Codeweeki veebisaidi kontrolli alla. Teenuseosutajad võivad igal ajal muuta oma kasutustingimusi, küpsiste otstarvet, kasutamist jne.</div><br/><h3><strong>Kuidas te saate küpsiseid hallata?</strong></h3>

            <p>Soovi korral saate küpsiseid <strong>hallata/kustutada</strong> – üksikasjalik teave on aadressil <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Küpsiste kõrvaldamine teie seadmest</strong></p>

            <p>Te saate kustutada kõik juba teie seadmesse salvestatud küpsised, kustutades oma brauseri sirvimisajaloo. See kõrvaldab kõik küpsised kõigist külastatud veebisaitidest.</p>

            <p>Pange tähele, et nii võite kaotada ka osa salvestatud teabest (nt salvestatud sisselogimisandmed, saidi eelistused).</p><strong>Saidipõhiste küpsiste haldamine</strong><p>Et saada täpsem kontroll saidipõhiste küpsiste üle, vaadake üle oma eelistatud brauseri privaatsuse ja küpsiste sätted.</p><strong>Küpsiste blokeerimine</strong><p>Enamiku brausereid saab seadistada nii, et küpsiseid teie seadmesse ei salvestataks, kuid sellisel juhul peate käsitsi kohandama teatavaid eelistusi iga kord, kui veebisaiti/-lehte külastate. Lisaks ei pruugi mõned teenused ja funktsioonid üldse korralikult toimida (nt sisselogimine).</p><strong>Analüütiliste küpsiste haldamine</strong><p>Meie Analyticsis küpsistega seotud eelistusi saate hallata <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">vastaval lehel</a>.</p>


        </section>

    </section>@endsection
