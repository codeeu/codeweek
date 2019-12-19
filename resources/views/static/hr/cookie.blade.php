@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Politika o kolačićima</h1>

            <h3><strong>Što su kolačići?</strong></h3>

            <p>
            <div>Kolačić je mala podatkovna datoteka koja se pohranjuje na vaše računalo ili mobilni uređaj kad posjetite neku internetsku stranicu.</div>

            <div>
                <ul>
                    <li><strong>Kolačići prve strane</strong> oni su koje postavljaju internetske stranice koje posjećujete. Samo ih te internetske stranice mogu pročitati. Usto, stranice se mogu koristiti i vanjskim uslugama, koje postavljaju svoje kolačiće, a oni se nazivaju <strong>kolačićima treće strane</strong>.</li>
                    <li>Trajni kolačići pohranjuju se na vaše računalo i ne brišu se automatski kad zatvorite preglednik, za razliku od kolačića sesije, koji se brišu kada zatvorite preglednik.</li>
                </ul>

            </div>

            <p>Kada prvi puta posjetite internetske stranice inicijative Codeweek, od vas će se tražiti da <strong>prihvatite ili odbijete kolačiće</strong>.</p>

            <p>Svrha je omogućiti stranicama da određeno vrijeme pamte vaše osobne preferencije (npr. korisničko ime, jezik itd.).</p>

            <p>Tako ih ne morate ponovno unositi kad pregledavate stranice tijekom istog posjeta.</p>

            <p>Kolačići se mogu upotrebljavati i za izradu anonimiziranih statističkih podataka o pregledavanju naših stranica.</p>
            </p>


            <h3><strong>Kako upotrebljavamo kolačiće?</strong></h3>

            <p>Inicijativa Codeweek uglavnom se koristi „kolačićima prve strane”. To su kolačići koje mi postavljamo i nadziremo, a ne vanjska organizacija.</p>

            <p>Međutim, za otvaranje nekih od naših stranica morat ćete prihvatiti kolačiće vanjskih organizacija.</p>

            <div>Mi upotrebljavamo <strong>tri vrste kolačića prve strane</strong>, i to za:<ul>
                    <li>pohranjivanje osobnih preferencija posjetitelja</li>
                    <li>funkcioniranje naših stranica</li>
                    <li>prikupljanje analitičkih podataka (o ponašanju posjetitelja)</li>
                </ul>
            </div>

            <h4>Osobne preferencije posjetitelja</h4>
            <p>Kolačiće za te postavke postavljamo mi i samo mi ih možemo čitati. Oni pamte:<ul>
                <li>jeste li prihvatili (ili odbili) pravila o postupanju s kolačićima naših internetskih stranica</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Usluga</th>
                    <th>Svrha</th>
                    <th>Vrsta i trajanje kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Set kolačića za pristanak</td>
                    <td>Pohranjuje vaše osobne preferencije za kolačiće (tako da vas ne pita ponovno o kolačićima)</td>
                    <td>Kolačić sesije prve strane, koji se briše nakon zatvaranja preglednika</td>
                </tr>

                </tbody>
            </table><br/><h4>Operativni kolačići</h4>
            <p>
            <div>Neke kolačiće moramo uključiti kako bi određene internetske stranice mogle funkcionirati. Stoga se za njih ne traži vaš pristanak. Konkretno:<ul>
                    <li>tehnički kolačići koji su potrebni za određene informatičke sustave</li>
                </ul>
            </div>
            </p><br/><h4>Tehnički kolačići</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Usluga</th>
                    <th>Svrha</th>
                    <th>Vrsta i trajanje kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>Čuvaju sigurnost vaše sesije.</td>
                    <td>Kolačić sesije prve strane, koji se briše nakon zatvaranja preglednika</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>Čuva sigurnost vaše sesije duže razdoblje čime se sprječava gubitak sesije nakon zatvaranja preglednika.</td>
                    <td>Trajni kolačić prve strane, 60 mjeseci</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Pohranjuje preferirani jezik korisnika</td>
                    <td>Kolačić sesije prve strane, koji se briše nakon zatvaranja preglednika</td>
                </tr>

                </tbody>
            </table><br/><h4>Analitički kolačići</h4>

            <p>Njima se koristimo samo za interno istraživanje o mogućim načinima poboljšanja usluge koju pružamo za sve korisnike.</p>

            <p>Ti kolačići samo promatraju vašu interakciju, kao anonimnog korisnika (prikupljeni podatci ne identificiraju vas osobno), s našim internetskim stranicama.</p>

            <p>Ti se podatci ne dijele s trećim stranama niti se upotrebljavaju u bilo kakvu drugu svrhu. Anonimizirani statistički podatci mogu se dijeliti s izvođačima koji rade na komunikacijskim projektima na temelju ugovornog sporazuma s Komisijom.</p>

            <p>Međutim, vi možete odbiti tu vrstu kolačića – u obavijesti o kolačićima na prvoj stranici koju posjetite ili posjetom ove <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">posebne stranice</a>.</p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Usluga</th>
                    <th>Svrha</th>
                    <th>Vrsta i trajanje kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>Usluga analize korporativnih internetskih stranica, na platformi Matomo, softveru otvorenog koda</td>
                    <td>Prepoznaje posjetitelja internetskih stranica (anonimno – ne prikupljaju se osobni podatci korisnika).</td>
                    <td>Trajni kolačić prve strane, 20 dana</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Usluga analize korporativnih internetskih stranica, na platformi Matomo, softveru otvorenog koda</td>
                    <td>Identificira sve stranice koje neki korisnik pogleda tijekom jednog posjeta. (anonimno – ne prikupljaju se osobni podatci korisnika).</td>
                    <td>Trajni kolačić prve strane, 30 minuta</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Kolačići treće strane</strong></h3>

            <div>
                <p>Na nekima od naših stranica prikazuju se sadržaji vanjskih pružatelja usluga, kao što su YouTube, Facebook i Twitter.</p>

                <p>Kako biste vidjeli te sadržaje trećih strana, prvo morate prihvatiti njihove posebne uvjete. To uključuje njihova pravila o postupanju s kolačićima, koja mi ne kontroliramo.</p>

                <p>Ali ako ne pogledate taj sadržaj, kolačići trećih strana neće biti postavljeni na vaš uređaj.</p>Pružatelji usluga treće strane na internetskim stranicama inicijative Codeweek<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Te usluge trećih strana izvan su kontrole internetske stranice inicijative Codeweek. Pružatelji usluga mogu u bilo kojem trenutku promijeniti svoje uvjete pružanja usluge, svrhu i uporabu kolačića itd.</div><br/><h3><strong>Kako se upravlja kolačićima?</strong></h3>

            <p>Kolačićima možete <strong>upravljati ili ih brisati</strong> kako želite – ako želite znati više, posjetite <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Uklanjanje kolačića iz uređaja</strong></p>

            <p>Ako izbrišete povijest pretraživanja iz svojeg preglednika, izbrisat ćete sve kolačiće koji su već na vašem uređaju. Tako ćete ukloniti sve kolačiće sa svih internetskih stranica koje ste ikada posjetili.</p>

            <p>Imajte na umu da tako možete izgubiti i neke spremljene podatke (npr. spremljene podatke za prijavu, osobne preferencije na stranicama).</p><strong>Upravljanje kolačićima pojedinačnih stranica</strong><p>Za bolju kontrolu nad kolačićima pojedinačnih stranica provjerite postavke privatnosti i kolačića u vašem glavnom pregledniku.</p><strong>Blokiranje kolačića</strong><p>Većinu današnjih preglednika možete postaviti tako da blokiraju postavljanje kolačića na vaš uređaj, ali onda ćete možda morati ručno namještati neke osobne preferencije svaki put kada posjetite neku stranicu. Također, neke usluge i funkcionalnosti možda neće dobro funkcionirati (npr. prijava s profilom).</p><strong>Upravljanje našim analitičkim kolačićima</strong><p>Možete upravljati svojim osobnim preferencijama za kolačiće koje stavlja Analytics na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">posebnoj stranici</a>.</p>


        </section>

    </section>@endsection
