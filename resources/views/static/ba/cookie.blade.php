@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Politika kolačića</h1>

            <h3><strong>Šta su kolačići?</strong></h3>

            <p>
            <div>Kolačić je mala tekstualna datoteka koju internet stranica pohrani na vašem računaru ili mobilnom uređaju kad posjetite tu stranicu.</div>

            <div>
                <ul>
                    <li><strong>Kolačići prvog lica</strong> su kolačići koje postavlja internet stranica koju posjećujete. Samo ta internet stranica može da ih čita. Pored toga, internet stranica može potencijalno koristiti i eksterne usluge, koje također postavljaju svoje vlastite kolačiće, poznate kao <strong>kolačići trećih lica</strong>.</li>
                    <li>Ustrajni kolačići su kolačići spašeni na vašem računaru koji se ne brišu automatski kada napustite svoj preglednik, za razliku od kolačića po sesiji, koji se briše kad napustite svoj preglednik.</li>
                </ul>

            </div>

            <p>Prvi put kad posjetite internet stranicu Sedmice kodiranja, bićete pozvani da <strong>prihvatite ili odbacite kolačiće</strong>.</p>

            <p>Svrha je da se omogući stranici da zapamti vaše preference (poput korisničkog imena, jezika, itd) u određenom vremenskom periodu.</p>

            <p>Na taj način ne morate ih ponovo unositi kad pretražujete po internet stranici tokom iste posjete.</p>

            <p>Kolačići se mogu koristiti i za uspostavljane anonimizirane statistike o iskustvu pretraživanja na našim stranicama.</p>
            </p>


            <h3><strong>Kako koristimo kolačiće?</strong></h3>

            <p>Sedmica kodiranja uglavnom koristi "kolačiće prvog lica". To su kolačići koje mi postavljamo i kontroliramo, a ne neka eksterna organizacija.</p>

            <p>Međutim, da biste pogledali neke od naših stranica, morat ćete prihvatiti kolačiće eksternih organizacija.</p>

            <div>Ova <strong>3 tipa kolačića prvog lica</strong> koja koristimo imaju sljedeće svrhe:<ul>
                    <li>pohranjivanje preferenci posjetilaca</li>
                    <li>operativnost naših internet stranica</li>
                    <li>prikupljanje analitičkih podataka (o ponašanju korisnika)</li>
                </ul>
            </div>

            <h4>Preference posjetilaca</h4>
            <p>Njih postavljamo mi i samo mi ih možemo čitati. One pamte:<ul>
                <li>da li ste se složili sa politikom kolačića ove stranice (ili ste je odbili)</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Usluga</th>
                    <th>Svrha</th>
                    <th>Tip i trajnost kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Paket za saglasnost sa kolačićima</td>
                    <td>Pohranjuje vaše preference u vezi sa kolačićima (tako da vam se to pitanje ne postavlja ponovo)</td>
                    <td>Kolačići prvog lica za sesiju brišu se nakon što napustite preglednik</td>
                </tr>

                </tbody>
            </table><br/><h4>Operativni kolačići</h4>
            <p>
            <div>Postoje neki kolačići koje moramo uključiti kako bi određene internet stranice mogle funkcionirati. Iz tog razloga oni ne zahtijevaju vašu saglasnost. Posebno:<ul>
                    <li>tehnički kolačići koji su potrebni za određene IT sisteme</li>
                </ul>
            </div>
            </p><br/><h4>Tehnički kolačići</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Usluga</th>
                    <th>Svrha</th>
                    <th>Tip i trajnost kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>Održava sigurnost sesije tokom vaše posjete.</td>
                    <td>Kolačić prvog lica za sesiju, briše se nakon što napustite preglednik</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>Održava sigurnost sesije duže vrijeme i sprječava gubljenje sesije pri zatvaranju preglednika.</td>
                    <td>Ustrajni kolačić prvog lica, 60 mjeseci</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Pohranjuje preferirani jezik korisnika</td>
                    <td>Kolačić prvog lica za sesiju, briše se nakon što napustite preglednik</td>
                </tr>

                </tbody>
            </table><br/><h4>Analitički kolačići</h4>

            <p>Koristimo ih isključivo za interna istraživanja o tome kako možemo unaprijediti uslugu koju pružamo svim svojim korisnicima.</p>

            <p>Kolačićima se jednostavno ocjenjuje način interakcije sa našom internet stranicom - kao anonimni korisnik (prikupljenim podacima se ne identificirate vi osobno).</p>

            <p>Isto tako, ti podaci se ne dijele ni sa kojim trećim licem niti se koriste ni za kakvu drugu svrhu. Anonimizirana statistika se može podijeliti s ugovornim izvođačima koji rade na projektima komunikacije u okviru ugovornih aranžmana sa Komisijom.</p>

            <p>Međutim, vi imate mogućnost da odbijete ovaj tip kolačića - bilo putem zastavice za kolačiće koju ćete vidjeti na prvoj stranici koju posjetite, ili ako posjetite ovu <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">posvećenu stranicu.</a>.</p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Usluga</th>
                    <th>Svrha</th>
                    <th>Tip i trajnost kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>Usluga mrežne analitike zasnovana na open source softveru Matomo</td>
                    <td>Prepoznaje posjetioce internet stranice (anonimno - o korisniku se ne prikupljaju nikakve osobne informacije).</td>
                    <td>Ustrajni kolačić prvog lica, 20 mjeseci</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Usluga mrežne analitike zasnovana na open source softveru Matomo</td>
                    <td>Identificira stranice koje je posjetio isti korisnik tokom iste posjete. (anonimno - o korisniku se ne prikupljaju nikakve osobne informacije).</td>
                    <td>Ustrajni kolačić prvog lica, 30 mjeseci</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Kolačići trećih lica</strong></h3>

            <div>
                <p>Neke od naših stranica prikazuju sadržaj eksternih pružaoca usluga, npr. YouTube, Facebook ili Twitter.</p>

                <p>Da biste pogledali taj sadržaj trećih lica, prvo morate prihvatiti njihove posebne uvjete i odredbe. To uključuje i njihove politike kolačića, nad kojima mi nemamo kontrolu.</p>

                <p>Ali ako ne budete vidjeli taj sadržaj, na vašem uređaju nema instaliranih kolačića trećih lica.</p>Treća lica kao pružaoci usluga na Sedmici kodiranja<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Ove usluge trećih lica van su kontrole internet stranice Sedmice kodiranja. Pružaoci usluga mogu u svako vrijeme mijenjati svoje uvjete za pružanje usluge, svrhu i upotrebu kolačića, itd.</div><br/><h3><strong>Kako možete upravljati kolačićima?</strong></h3>

            <p>Možete <strong>upravljati/brisati</strong> kolačiće kako vi želite - za detaljnije informacije pogledajte <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Uklanjanje kolačiće sa vašeg uređaja</strong></p>

            <p>Možete izbrisati sve kolačiće koji su već na vašem uređaju čišćenjem historijata pretrage u svom pregledniku. Time će se ukloniti svi kolačići sa svih internet stranica koje ste posjetili.</p>

            <p>Ipak, imajte u vidu da možete iugubiti neke spašene informacije (npr. spašene podatke za prijavu, preference za stranicu).</p><strong>Upravljanje kolačićima koji su specifični za određenu stranicu</strong><p>Za više detalja o tome kako vršiti kontrolu nad kolačićima koji su specifični za određenu stranicu, pogledajte postavke za privatnost i kolačiće u svom preferiranom pregledniku</p><strong>Blokiranje kolačića</strong><p>Možete postaviti najmodernije preglednike kako biste spriječili postavljanje ikakvih kolačića na svoj uređaj, ali onda ćete možda morati ručno podešavati neke preference svaki put kad budete posjećivali sajt/stranicu. A neke usluge i funkcije možda uopšte neće pravilno raditi (npr. prijavljivanje na profile).</p><strong>Upravljanje našim analitičkim kolačićima</strong><p>Možete upravljati svojim preferencama po pitanju kolačića sa naše Analitike na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">posvećenoj stranici.</a></p>


        </section>

    </section>@endsection
