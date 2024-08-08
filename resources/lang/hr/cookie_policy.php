<?php

return [

    'title' => 'Politika o kolačićima',
    'what' => [
        'title' => 'Što su kolačići?',
        'text' => '<p>Kolačić je mala podatkovna datoteka koja se pohranjuje na vaše računalo ili mobilni uređaj kad posjetite neku internetsku stranicu.</p>',
        'first_party' => '<strong>Kolačići prve strane</strong> oni su koje postavljaju internetske stranice koje posjećujete. Samo ih te internetske stranice mogu pročitati. Usto, stranice se mogu koristiti i vanjskim uslugama, koje postavljaju svoje kolačiće, a oni se nazivaju <strong>kolačićima treće strane</strong>.',
        'persistent_cookies' => 'Trajni kolačići pohranjuju se na vaše računalo i ne brišu se automatski kad zatvorite preglednik, za razliku od kolačića sesije, koji se brišu kada zatvorite preglednik.',
        'items' => '<p>Kada prvi puta posjetite internetske stranice inicijative Codeweek, od vas će se tražiti da <strong>prihvatite ili odbijete kolačiće</strong>.</p>

            <p>Svrha je omogućiti stranicama da određeno vrijeme pamte vaše osobne preferencije (npr. korisničko ime, jezik itd.).</p>

            <p>Tako ih ne morate ponovno unositi kad pregledavate stranice tijekom istog posjeta.</p>

            <p>Kolačići se mogu upotrebljavati i za izradu anonimiziranih statističkih podataka o pregledavanju naših stranica.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Kako upotrebljavamo kolačiće?',
        'text1' => '<p>Inicijativa Codeweek uglavnom se koristi „kolačićima prve strane”. To su kolačići koje mi postavljamo i nadziremo, a ne vanjska organizacija.</p>',
        'text2' => '<p>Međutim, za otvaranje nekih od naših stranica morat ćete prihvatiti kolačiće vanjskih organizacija.</p>',
        '3types' => [
            'title' => 'Mi upotrebljavamo <strong>tri vrste kolačića prve strane</strong>, i to za:',
            '1' => 'pohranjivanje osobnih preferencija posjetitelja',
            '2' => 'funkcioniranje naših stranica',
            '3' => 'prikupljanje analitičkih podataka (o ponašanju posjetitelja)',
        ],
        'table' => [
            'name' => 'Ime',
            'service' => 'Usluga',
            'purpose' => 'Svrha',
            'type_duration' => 'Vrsta i trajanje kolačića',
        ],
        'visitor_preferences' => [
            'title' => 'Osobne preferencije posjetitelja',
            'text' => '<p>Kolačiće za te postavke postavljamo mi i samo mi ih možemo čitati. Oni pamte:</p>',
            'item' => 'jeste li prihvatili (ili odbili) pravila o postupanju s kolačićima naših internetskih stranica',
            'table' => [
                '1' => [
                    'service' => 'Set kolačića za pristanak',
                    'purpose' => 'Pohranjuje vaše osobne preferencije za kolačiće (tako da vas ne pita ponovno o kolačićima)',
                    'type_duration' => 'Kolačić sesije prve strane, koji se briše nakon zatvaranja preglednika',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Operativni kolačići',
            'text' => '<p>Neke kolačiće moramo uključiti kako bi određene internetske stranice mogle funkcionirati. Stoga se za njih ne traži vaš pristanak. Konkretno:</p>',
            'item' => 'tehnički kolačići koji su potrebni za određene informatičke sustave',
        ],
        'technical_cookies' => [
            'title' => 'Tehnički kolačići',
            'table' => [
                '1' => [
                    'purpose' => 'Čuvaju sigurnost vaše sesije.',
                    'type_duration' => 'Kolačić sesije prve strane, koji se briše nakon zatvaranja preglednika',
                ],
                '2' => [
                    'purpose' => 'Čuva sigurnost vaše sesije duže razdoblje čime se sprječava gubitak sesije nakon zatvaranja preglednika.',
                    'type_duration' => 'Trajni kolačić prve strane, 60 mjeseci',
                ],
                '3' => [
                    'purpose' => 'Pohranjuje preferirani jezik korisnika',
                    'type_duration' => 'Kolačić sesije prve strane, koji se briše nakon zatvaranja preglednika',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analitički kolačići',
            'items' => '<p>Njima se koristimo samo za interno istraživanje o mogućim načinima poboljšanja usluge koju pružamo za sve korisnike.</p>

            <p>Ti kolačići samo promatraju vašu interakciju, kao anonimnog korisnika (prikupljeni podatci ne identificiraju vas osobno), s našim internetskim stranicama.</p>

            <p>Ti se podatci ne dijele s trećim stranama niti se upotrebljavaju u bilo kakvu drugu svrhu. Anonimizirani statistički podatci mogu se dijeliti s izvođačima koji rade na komunikacijskim projektima na temelju ugovornog sporazuma s Komisijom.</p>

            <p>Međutim, vi možete odbiti tu vrstu kolačića – u obavijesti o kolačićima na prvoj stranici koju posjetite ili posjetom ove <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">posebne stranice</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Usluga analize korporativnih internetskih stranica, na platformi Matomo, softveru otvorenog koda',
                    'purpose' => 'Prepoznaje posjetitelja internetskih stranica (anonimno – ne prikupljaju se osobni podatci korisnika).',
                    'type_duration' => 'Trajni kolačić prve strane, 20 dana',
                ],
                '2' => [
                    'service' => 'Usluga analize korporativnih internetskih stranica, na platformi Matomo, softveru otvorenog koda',
                    'purpose' => 'Identificira sve stranice koje neki korisnik pogleda tijekom jednog posjeta. (anonimno – ne prikupljaju se osobni podatci korisnika).',
                    'type_duration' => 'Trajni kolačić prve strane, 30 minuta',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Kolačići treće strane',
        'items' => [
            '1' => '<p>Na nekima od naših stranica prikazuju se sadržaji vanjskih pružatelja usluga, kao što su YouTube, Facebook i Twitter.</p>

                <p>Kako biste vidjeli te sadržaje trećih strana, prvo morate prihvatiti njihove posebne uvjete. To uključuje njihova pravila o postupanju s kolačićima, koja mi ne kontroliramo.</p>

                <p>Ali ako ne pogledate taj sadržaj, kolačići trećih strana neće biti postavljeni na vaš uređaj.</p>Pružatelji usluga treće strane na internetskim stranicama inicijative Codeweek',
            '2' => 'Te usluge trećih strana izvan su kontrole internetske stranice inicijative Codeweek. Pružatelji usluga mogu u bilo kojem trenutku promijeniti svoje uvjete pružanja usluge, svrhu i uporabu kolačića itd.',
        ],
    ],
    'how-manage' => [
        'title' => 'Kako se upravlja kolačićima?',
        'items' => '<p>Kolačićima možete <strong>upravljati ili ih brisati</strong> kako želite – ako želite znati više, posjetite <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Uklanjanje kolačića iz uređaja</strong></p>

            <p>Ako izbrišete povijest pretraživanja iz svojeg preglednika, izbrisat ćete sve kolačiće koji su već na vašem uređaju. Tako ćete ukloniti sve kolačiće sa svih internetskih stranica koje ste ikada posjetili.</p>

            <p>Imajte na umu da tako možete izgubiti i neke spremljene podatke (npr. spremljene podatke za prijavu, osobne preferencije na stranicama).</p><strong>Upravljanje kolačićima pojedinačnih stranica</strong><p>Za bolju kontrolu nad kolačićima pojedinačnih stranica provjerite postavke privatnosti i kolačića u vašem glavnom pregledniku.</p><strong>Blokiranje kolačića</strong><p>Većinu današnjih preglednika možete postaviti tako da blokiraju postavljanje kolačića na vaš uređaj, ali onda ćete možda morati ručno namještati neke osobne preferencije svaki put kada posjetite neku stranicu. Također, neke usluge i funkcionalnosti možda neće dobro funkcionirati (npr. prijava s profilom).</p><strong>Upravljanje našim analitičkim kolačićima</strong><p>Možete upravljati svojim osobnim preferencijama za kolačiće koje stavlja Analytics na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">posebnoj stranici</a>.</p>',
    ],
];
