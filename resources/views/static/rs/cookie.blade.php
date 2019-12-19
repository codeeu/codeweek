@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Politika korišćenja kolačića</h1>

            <h3><strong>Šta su kolačići?</strong></h3>

            <p>
            <div>Kolačić je mala tekstualna datoteka koju veb-sajt skladišti na vašem računaru ili mobilnom uređaju kada posetite taj sajt.</div>

            <div>
                <ul>
                    <li><strong>Direktni kolačići</strong> su kolačići koje postavlja veb-sajt koji posećujete. Samo taj-veb sajt može da ih čita. Pored toga, veb-sajt potencijalno može da koristi spoljne usluge, koje takođe postavljaju svoje kolačiće, poznate kao <strong>nezavisni kolačići</strong>.</li>
                    <li>Stalni kolačići su kolačići koji su sačuvani na računaru i koji se ne brišu automatski kada napustite pretraživač, za razliku od kolačića sesije, koji se tada brišu.</li>
                </ul>

            </div>

            <p>Prvi put kada posetite veb-sajt Nedelje programiranja, od vas će biti zatraženo da <strong>prihvatite ili odbijete kolačiće</strong>.</p>

            <p>Svrha je omogućiti sajtu da zapamti vaša željena podešavanja (kao što su korisničko ime, jezik itd.) tokom određenog vremenskog perioda.</p>

            <p>Na taj način ne morate ponovo da ih unosite kada pregledate sajt tokom iste posete.</p>

            <p>Kolačići mogu da se koriste i za dobijanje anonimnih statističkih podataka o iskustvu pregledanja na našim sajtovima.</p>
            </p>


            <h3><strong>Kako koristimo kolačiće?</strong></h3>

            <p>Nedelja programiranja uglavnom koristi „direktne kolačiće“. To su kolačići koje postavljamo i kontrolišemo mi, a ne neka spoljna organizacija.</p>

            <p>Međutim, da biste pregledali neke od naših stranica, moraćete da prihvatite kolačiće spoljnih organizacija.</p>

            <div> <strong>3 tipa direktnih kolačića</strong> koje mi koristimo služe da:<ul>
                    <li>skladištimo željena podešavanja posetioca</li>
                    <li>naši veb-sajtovi butu operativni</li>
                    <li>prikupljamo analitičke podatke (o ponašanju korisnika)</li>
                </ul>
            </div>

            <h4>Željena podešavanja posetilaca</h4>
            <p>Mi ih postavljamo i samo mi možemo da ih čitamo. Oni pamte:<ul>
                <li>da li ste pristali (ili odbili) politiku korišćenja kolačića ovog sajta</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Usluga</th>
                    <th>Svrha</th>
                    <th>Tip i trajanje kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Paket saglasnosti za kolačiće</td>
                    <td>Skladišti željena podešavanja za kolačiće (da vas ne bismo ponovo pitali)</td>
                    <td>Direktni kolačić sesije obrisan nakon što izađete iz pretraživača</td>
                </tr>

                </tbody>
            </table><br/><h4>Operativni kolačići</h4>
            <p>
            <div>Postoje određeni kolačići koje moramo da obuhvatimo kako bi određeni veb-sajtovi funkcionisali. Stoga za njih nije potrebna vaša saglasnost. Posebno:<ul>
                    <li>tehnički kolačići koje zahtevaju određeni IT sistemi</li>
                </ul>
            </div>
            </p><br/><h4>Tehnički kolačići</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Usluga</th>
                    <th>Svrha</th>
                    <th>Tip i trajanje kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>Održavaju vašu sesiju bezbednom tokom vaše posete.</td>
                    <td>Direktni kolačić sesije, obrisan nakon što izađete iz pretraživača</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>Održava vašu sesiju bezbednom duže vremena sprečavajući gubitak sesije pri zatvaranju pretraživača.</td>
                    <td>Direktni trajni kolačić, 60 meseci</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Skladišti željeni jezik korisnika</td>
                    <td>Direktni kolačić sesije, obrisan nakon što izađete iz pretraživača</td>
                </tr>

                </tbody>
            </table><br/><h4>Analitički kolačići</h4>

            <p>Koristimo ih čisto za interno istraživanje o tome kako možemo poboljšati uslugu koju pružamo svim našim korisnicima.</p>

            <p>Kolačići jednostavno procenjuju kako ostvarujete interakciju sa našim veb-sajtom – kao anonimni korisnik (prikupljeni podaci ne identifikuju vas lično).</p>

            <p>Takođe, ovi podaci se ne dele ni sa jednom trećom stranom niti se koriste u neke druge svrhe. Anonimizovani statistički podaci mogu biti deljeni sa ugovaračima koji rade na projektima komunikacije u okviru ugovornog sporazuma sa Komisijom.</p>

            <p>Međutim, možete slobodno da odbijete ovaj tip kolačića – ili putem banera za kolačiće koji ćete videti na prvoj stranici koju posetite ili tako što ćete posetiti ovu <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">namensku stranicu.</a>.</p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Usluga</th>
                    <th>Svrha</th>
                    <th>Tip i trajanje kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>Usluga veb-analitike, zasnovana na Matomo softveru sa otvorenim kodom</td>
                    <td>Prepoznaje posetioce veb-sajta (anonimno – ne prikupljaju se nikakve lične informacije o korisniku).</td>
                    <td>Direktni trajni kolačić, 20 dana</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Usluga veb-analitike, zasnovana na Matomo softveru sa otvorenim kodom</td>
                    <td>Identifikuje prikaze stranice koje je obavio isti korisnik tokom iste posete. (anonimno – ne prikupljaju se nikakve lične informacije o korisniku).</td>
                    <td>Direktni trajni kolačić, 30 minuta</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Kolačići trećih strana</strong></h3>

            <div>
                <p>Neke naše stranice prikazuju sadržaj spoljnih dobavljača, npr. YouTube, Facebook i Twitter.</p>

                <p>Da biste videli ovaj sadržaj trećih strana, prvo morate da prihvatite njihove određene uslove i odredbe. To obuhvata i njihovu politiku korišćenja kolačića, nad kojom nemamo kontrolu.</p>

                <p>Ali ako ne pogledate taj sadržaj, nikakvi nezavisni kolačići neće biti instalirani na vaš uređaj.</p>Nezavisni pružaoci usluga na Nedelji programiranja<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Ove usluge trećih strana su van kontrole veb-sajta Nedelje programiranja. Pružaoci usluga mogu, u bilo kom trenutku, da promene svoje uslove korišćenja usluge, svrhu i korišćenje kolačića itd.</div><br/><h3><strong>Kako vi možete da upravljate kolačićima?</strong></h3>

            <p>Vi možete da <strong>upravljate/brišete</strong> kolačiće po svom nahođenju – za detalje, pogledajte <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Uklanjanje kolačića sa uređaja</strong></p>

            <p>Možete obrisati sve kolačiće koje već imate na svom uređaju tako što ćete obrisati istoriju pregledanja u pretraživaču. Na taj način ćete ukloniti sve kolačiće sa svih veb-sajtova koje ste posetili.</p>

            <p>Budite svesni da možete izgubiti i neke sačuvane informacije (npr. sačuvani detalji o prijavljivanju, željena podešavanja sajta).</p><strong>Upravljanje kolačićima specifičnim za sajt</strong><p>Za detaljniju kontrolu nad kolačićima specifičnim za sajt, pogledajte podešavanja privatnosti i kolačića u željenom pretraživaču</p><strong>Blokiranje kolačića</strong><p>Većinu modernih pretraživača možete da podesite tako da sprečite postavljanje kolačića na vaš uređaj, ali ćete onda morati ručno da podesite neka željena podešavanja svaki put kada posetite sajt/stranicu. A neke usluge ili funkcionalnosti možda uopšte neće pravilno funkcionisati (npr. prijavljivanje na profil).</p><strong>Upravljanje našim analitičkim kolačićima</strong><p>Svojim željenim podešavanjima u vezi sa kolačićima možete upravljati iz naše Analitike na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">namenskoj stranici.</a></p>


        </section>

    </section>@endsection
