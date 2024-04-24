<?php

return [

    'title' => 'Politika kolačića',
    'what' => [
        'title' => 'Šta su kolačići?',
        'text' => '<p>Kolačić je mala tekstualna datoteka koju internet stranica pohrani na vašem računaru ili mobilnom uređaju kad posjetite tu stranicu.</p>',
        'first_party' => '<strong>Kolačići prvog lica</strong> su kolačići koje postavlja internet stranica koju posjećujete. Samo ta internet stranica može da ih čita. Pored toga, internet stranica može potencijalno koristiti i eksterne usluge, koje također postavljaju svoje vlastite kolačiće, poznate kao <strong>kolačići trećih lica</strong>.',
        'persistent_cookies' => 'Ustrajni kolačići su kolačići spašeni na vašem računaru koji se ne brišu automatski kada napustite svoj preglednik, za razliku od kolačića po sesiji, koji se briše kad napustite svoj preglednik.',
        'items' => '<p>Prvi put kad posjetite internet stranicu Sedmice kodiranja, bićete pozvani da <strong>prihvatite ili odbacite kolačiće</strong>.</p>

            <p>Svrha je da se omogući stranici da zapamti vaše preference (poput korisničkog imena, jezika, itd) u određenom vremenskom periodu.</p>

            <p>Na taj način ne morate ih ponovo unositi kad pretražujete po internet stranici tokom iste posjete.</p>

            <p>Kolačići se mogu koristiti i za uspostavljane anonimizirane statistike o iskustvu pretraživanja na našim stranicama.</p>',
    ],
    'how' => [
        'title' => 'Kako koristimo kolačiće?',
        'text1' => '<p>Sedmica kodiranja uglavnom koristi "kolačiće prvog lica". To su kolačići koje mi postavljamo i kontroliramo, a ne neka eksterna organizacija.</p>',
        'text2' => '<p>Međutim, da biste pogledali neke od naših stranica, morat ćete prihvatiti kolačiće eksternih organizacija.</p>',
        '3types' => [
            'title' => 'Ova <strong>3 tipa kolačića prvog lica</strong> koja koristimo imaju sljedeće svrhe:',
            '1' => 'pohranjivanje preferenci posjetilaca',
            '2' => 'operativnost naših internet stranica',
            '3' => 'prikupljanje analitičkih podataka (o ponašanju korisnika)',
        ],
        'table' => [
            'name' => 'Naziv',
            'service' => 'Usluga',
            'purpose' => 'Svrha',
            'type_duration' => 'Tip i trajnost kolačića',
        ],
        'visitor_preferences' => [
            'title' => 'Preference posjetilaca',
            'text' => '<p>Njih postavljamo mi i samo mi ih možemo čitati. One pamte:</p>',
            'item' => 'da li ste se složili sa politikom kolačića ove stranice (ili ste je odbili)',
            'table' => [
                '1' => [
                    'service' => 'Paket za saglasnost sa kolačićima',
                    'purpose' => 'Pohranjuje vaše preference u vezi sa kolačićima (tako da vam se to pitanje ne postavlja ponovo)',
                    'type_duration' => 'Kolačići prvog lica za sesiju brišu se nakon što napustite preglednik',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Operativni kolačići',
            'text' => '<p>Postoje neki kolačići koje moramo uključiti kako bi određene internet stranice mogle funkcionirati. Iz tog razloga oni ne zahtijevaju vašu saglasnost. Posebno:</p>',
            'item' => 'tehnički kolačići koji su potrebni za određene IT sisteme',
        ],
        'technical_cookies' => [
            'title' => 'Tehnički kolačići',
            'table' => [
                '1' => [
                    'purpose' => 'Održava sigurnost sesije tokom vaše posjete.',
                    'type_duration' => 'Kolačić prvog lica za sesiju, briše se nakon što napustite preglednik',
                ],
                '2' => [
                    'purpose' => 'Održava sigurnost sesije duže vrijeme i sprječava gubljenje sesije pri zatvaranju preglednika.',
                    'type_duration' => 'Ustrajni kolačić prvog lica, 60 mjeseci',
                ],
                '3' => [
                    'purpose' => 'Pohranjuje preferirani jezik korisnika',
                    'type_duration' => 'Kolačić prvog lica za sesiju, briše se nakon što napustite preglednik',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analitički kolačići',
            'items' => '<p>Koristimo ih isključivo za interna istraživanja o tome kako možemo unaprijediti uslugu koju pružamo svim svojim korisnicima.</p>

            <p>Kolačićima se jednostavno ocjenjuje način interakcije sa našom internet stranicom - kao anonimni korisnik (prikupljenim podacima se ne identificirate vi osobno).</p>

            <p>Isto tako, ti podaci se ne dijele ni sa kojim trećim licem niti se koriste ni za kakvu drugu svrhu. Anonimizirana statistika se može podijeliti s ugovornim izvođačima koji rade na projektima komunikacije u okviru ugovornih aranžmana sa Komisijom.</p>

            <p>Međutim, vi imate mogućnost da odbijete ovaj tip kolačića - bilo putem zastavice za kolačiće koju ćete vidjeti na prvoj stranici koju posjetite, ili ako posjetite ovu <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">posvećenu stranicu.</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Usluga mrežne analitike zasnovana na open source softveru Matomo',
                    'purpose' => 'Prepoznaje posjetioce internet stranice (anonimno - o korisniku se ne prikupljaju nikakve osobne informacije).',
                    'type_duration' => 'Ustrajni kolačić prvog lica, 20 mjeseci',
                ],
                '2' => [
                    'service' => 'Usluga mrežne analitike zasnovana na open source softveru Matomo',
                    'purpose' => 'Identificira stranice koje je posjetio isti korisnik tokom iste posjete. (anonimno - o korisniku se ne prikupljaju nikakve osobne informacije).',
                    'type_duration' => 'Ustrajni kolačić prvog lica, 30 mjeseci',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Kolačići trećih lica',
        'items' => [
            '1' => '<p>Neke od naših stranica prikazuju sadržaj eksternih pružaoca usluga, npr. YouTube, Facebook ili Twitter.</p>

                <p>Da biste pogledali taj sadržaj trećih lica, prvo morate prihvatiti njihove posebne uvjete i odredbe. To uključuje i njihove politike kolačića, nad kojima mi nemamo kontrolu.</p>

                <p>Ali ako ne budete vidjeli taj sadržaj, na vašem uređaju nema instaliranih kolačića trećih lica.</p>Treća lica kao pružaoci usluga na Sedmici kodiranja',
            '2' => 'Ove usluge trećih lica van su kontrole internet stranice Sedmice kodiranja. Pružaoci usluga mogu u svako vrijeme mijenjati svoje uvjete za pružanje usluge, svrhu i upotrebu kolačića, itd.',
        ],
    ],
    'how-manage' => [
        'title' => 'Kako možete upravljati kolačićima?',
        'items' => '<p>Možete <strong>upravljati/brisati</strong> kolačiće kako vi želite - za detaljnije informacije pogledajte <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Uklanjanje kolačiće sa vašeg uređaja</strong></p>

            <p>Možete izbrisati sve kolačiće koji su već na vašem uređaju čišćenjem historijata pretrage u svom pregledniku. Time će se ukloniti svi kolačići sa svih internet stranica koje ste posjetili.</p>

            <p>Ipak, imajte u vidu da možete iugubiti neke spašene informacije (npr. spašene podatke za prijavu, preference za stranicu).</p><strong>Upravljanje kolačićima koji su specifični za određenu stranicu</strong><p>Za više detalja o tome kako vršiti kontrolu nad kolačićima koji su specifični za određenu stranicu, pogledajte postavke za privatnost i kolačiće u svom preferiranom pregledniku</p><strong>Blokiranje kolačića</strong><p>Možete postaviti najmodernije preglednike kako biste spriječili postavljanje ikakvih kolačića na svoj uređaj, ali onda ćete možda morati ručno podešavati neke preference svaki put kad budete posjećivali sajt/stranicu. A neke usluge i funkcije možda uopšte neće pravilno raditi (npr. prijavljivanje na profile).</p><strong>Upravljanje našim analitičkim kolačićima</strong><p>Možete upravljati svojim preferencama po pitanju kolačića sa naše Analitike na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">posvećenoj stranici.</a></p>',
    ],
];
