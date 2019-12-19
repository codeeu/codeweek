@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Politika kolačića</h1>

            <h3><strong>Šta su kolačići?</strong></h3>

            <p>
            <div>Kolačić je mala tekstualna datoteka koju internet stranica čuva na vašem računaru ili mobilnom uređaju kada posjetite stranicu.</div>

            <div>
                <ul>
                    <li><strong>Kolačići prve strane</strong> su kolačići koje postavlja internet stranica koju posjećujete. Samo ta internet stranica može ih čitati. Pored toga, internet stranica može koristiti vanjske usluge koje takođe postavljaju svoje kolačiće poznate pod nazivom <strong>kolačići treće strane</strong>.</li>
                    <li>Trajni kolačići su kolačići koji su sačuvani na vašem računaru i koji se ne brišu automatski kada zatvorite pretraživač, za razliku od sesijskih kolačića koji se brišu kada zatvorite pretraživač.</li>
                </ul>

            </div>

            <p>Kada prvi put posjetite internet stranicu Nedjelje programiranja od vas će se tražiti da <strong>prihvatite ili odbijete kolačiće</strong>.</p>

            <p>Svrha ovoga je da omogućite sajtu da zapamti vaš odabir (poput korisničkog imena, jezika itd.) za određeni vremenski period.</p>

            <p>Tako ih nećete morati ponovo unijeti kada tokom iste posjete pretražujete internet stranicu.</p>

            <p>Kolačići se takođe mogu koristiti za uspostavljanje anonimnih statističkih podataka o pretraživanjima na našoj stranici.</p>
            </p>


            <h3><strong>Kako koristimo kolačiće?</strong></h3>

            <p>Nedjelja programiranja uglavnom koristi "kolačiće prve strane". Ove kolačiće definišemo i kontrolišemo mi, a ne neka vanjska organizacija.</p>

            <p>Međutim, bićete prinuđeni da prihvatite neke kolačiće sa vanjskih organizacija, kako biste pristupili nekim našim stranicama.</p>

            <div>Mi koristimo sljedeća <strong>3 tipa kolačića prve strane</strong>:<ul>
                    <li>Čuvanje odabira posjetioca</li>
                    <li>Obezbjeđenje funkcionisanja naše internet stranice</li>
                    <li>Prikupljanje analitičkih podataka (o ponašanju korisnika)</li>
                </ul>
            </div>

            <h4>Odabiri posjetioca</h4>
            <p>Ove kolačiće definišemo mi i samo mi ih možemo čitati. Oni pamte sljedeće:<ul>
                <li>da li ste prihvatili (ili odbacili) politiku o kolačićima ove internet stranice</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>naziv</th>
                    <th>uslugu</th>
                    <th>svrhu</th>
                    <th>vrstu i trajanje kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Alatka za saglasnost za kolačiće</td>
                    <td>Bilježi vaše odabire kolačića (kako ne biste bili ponovo pitani)</td>
                    <td>Sesijski kolačić prve strane briše se nakon što zatvorite vaš pretraživač.</td>
                </tr>

                </tbody>
            </table><br/><h4>Operativni kolačići</h4>
            <p>
            <div>Postoje neki kolačići koje moramo uključiti, kako bi određene internet stranice funkcionisale. Zbog toga, tim stranicama nije potrebna vaša saglasnost. Ovo se naročito odnosi na:<ul>
                    <li>tehničke kolačiće koje zahtijevaju određeni IT sistemi</li>
                </ul>
            </div>
            </p><br/><h4>tehničke kolačiće</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>naziv</th>
                    <th>uslugu</th>
                    <th>svrhu</th>
                    <th>vrstu i trajanje kolačića</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>Obezbjeđuju vam sigurnu sesiju tokom vaše posjete.</td>
                    <td>Sesijski kolačići prve strane brišu se nakon što zatvorite vaš pretraživač.</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>Održavaju sigurnu sesiju duži vremenski period sprečavajući gubitak sesije po zatvaranju pretraživača.</td>
                    <td>Trajni kolačić prve strane, 60 mjeseci.</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Čuva odabir jezika korisnika.</td>
                    <td>Sesijski kolačići prve strane brišu se nakon što zatvorite vaš pretraživač.</td>
                </tr>

                </tbody>
            </table><br/><h4>Analitički kolačići</h4>

            <p>Ove kolačiće koristimo isključivo za potrebe internih istraživanja o tome kako možemo unaprijediti usluge koje pružamo svim našim korisnicima.</p>

            <p>Kolačići jednostavno ocjenjuju način na koji komunicirate s našom internet stranicom – kao anonimni korisnik (prikupljeni podaci ne identifikuju vas lično).</p>

            <p>Takođe, ovi podaci ne dijele se s bilo kojom trećom stranom niti se koriste u bilo koje druge svrhe. Anonimne statistike mogu se koristiti s ugovaračima angažovanim na komunikacionim projektima po osnovu Ugovora o angažovanju s Komisijom.</p>

            <p>Međutim, slobodni ste odbiti ovu vrstu kolačića – bilo preko banera za kolačiće koje vidite na prvoj stranici koju posjetite ili posjetom <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">za to predviđenoj stranici.</a>.</p>

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
                    <td>Usluga internet analitike na osnovu otvorenog softvera Matomo</td>
                    <td>Prepoznaje posjetioce internet stranice (anonimno – ne prikupljaju se nikakvi lični podaci korisnika).</td>
                    <td>Trajni kolačić prve strane, 20 dana</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Usluga internet analitike na osnovu otvorenog softvera Matomo</td>
                    <td>Identifikuje stranice koje je tokom iste posjete pregledao isti posjetilac. (anonimno – ne prikupljaju se nikakvi lični podaci korisnika).</td>
                    <td>Trajni kolačić prve strane, 30 minuta</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Kolačići treće strane</strong></h3>

            <div>
                <p>Neke naše stranice objavljuju sadržaj vanjskih provajdera, na primjer YouTube, Facebook i Twitter.</p>

                <p>Kako biste vidjeli predmetni sadržaj treće strane, obavezni ste prvo prihvatiti njihove posebne uslove i odredbe. Ovo podrazumijeva njihovu politiku kolačića nad kojom mi nemamo kontrolu.</p>

                <p>Međutim, ukoliko ne pregledate ovakav sadržaj, na vašem uređaju neće biti instalirani nikakvi kolačići treće strane.</p>Provajderi treće strane na Nedjelji programiranja<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Ove usluge trećih strana su van kontrole internet stranice Nedjelje programiranja. Provajderi mogu u bilo kom trenutku izmijeniti njihove uslove pružanja usluga, svrhu i upotrebu kolačića itd.</div><br/><h3><strong>Kako možete upravljati kolačićima?</strong></h3>

            <p>Možete <strong>upravljati/brisati</strong> kolačićima/kolačiće po svojoj želji, za detaljne informacije, posjetite <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Uklanjanje kolačića sa vašeg uređaja</strong></p>

            <p>Možete obrisati sve kolačiće koji već postoje na vašem uređaju, tako što ćete obrisati istoriju pretraživanja na vašem pretraživaču. Ovim ćete ukloniti sve kolačiće sa svih internet stranica koje ste posjetili.</p>

            <p>Ipak, budite svjesni činjenice da takođe možete izgubiti i neke sačuvane informacije (na primjer detalje o pristupu, odabire na stranici).</p><strong>Upravljanje kolačićima određene internet stranice</strong><p>Za detaljniju kontrolu kolačića određene internet stranice, informišite se o podešavanjima privatnosti i kolačića na vašem odabranom pretraživaču.</p><strong>Blokiranje kolačića</strong><p>Najnovije pretraživače možete podesiti tako da spriječe postavljanje bilo kakvih kolačića na vaš uređaj, ali postoji mogućnost da tada morate ručno prilagođavati odabire svaki put kada pristupite određenom sajtu/stranici. Takođe postoji mogućnost i da određene usluge i funkcije uopšte ne funkcionišu pravilno (na primjer pristup profilu).</p><strong>Upravljanje našim analitičkim kolačićima</strong><p>Možete upravljati svojim odabirima u vezi sa kolačićima putem naše Analitike koja se nalazi na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">za to predviđenoj stranici.</a></p>


        </section>

    </section>@endsection
