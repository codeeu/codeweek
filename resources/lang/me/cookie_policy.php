<?php

return [

    'title' => 'Politika kolačića',
    'what' => [
        'title' => 'Šta su kolačići?',
        'text' => '<p>Kolačić je mala tekstualna datoteka koju internet stranica čuva na vašem računaru ili mobilnom uređaju kada posjetite stranicu.</p>',
        'first_party' => '<strong>Kolačići prve strane</strong> su kolačići koje postavlja internet stranica koju posjećujete. Samo ta internet stranica može ih čitati. Pored toga, internet stranica može koristiti vanjske usluge koje takođe postavljaju svoje kolačiće poznate pod nazivom <strong>kolačići treće strane</strong>.',
        'persistent_cookies' => 'Trajni kolačići su kolačići koji su sačuvani na vašem računaru i koji se ne brišu automatski kada zatvorite pretraživač, za razliku od sesijskih kolačića koji se brišu kada zatvorite pretraživač.',
        'items' => '<p>Kada prvi put posjetite internet stranicu Nedjelje programiranja od vas će se tražiti da <strong>prihvatite ili odbijete kolačiće</strong>.</p>

            <p>Svrha ovoga je da omogućite sajtu da zapamti vaš odabir (poput korisničkog imena, jezika itd.) za određeni vremenski period.</p>

            <p>Tako ih nećete morati ponovo unijeti kada tokom iste posjete pretražujete internet stranicu.</p>

            <p>Kolačići se takođe mogu koristiti za uspostavljanje anonimnih statističkih podataka o pretraživanjima na našoj stranici.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Kako koristimo kolačiće?',
        'text1' => '<p>Nedjelja programiranja uglavnom koristi "kolačiće prve strane". Ove kolačiće definišemo i kontrolišemo mi, a ne neka vanjska organizacija.</p>',
        'text2' => '<p>Međutim, bićete prinuđeni da prihvatite neke kolačiće sa vanjskih organizacija, kako biste pristupili nekim našim stranicama.</p>',
        '3types' => [
            'title' => 'Mi koristimo sljedeća <strong>3 tipa kolačića prve strane</strong>:',
            '1' => 'Čuvanje odabira posjetioca',
            '2' => 'Obezbjeđenje funkcionisanja naše internet stranice',
            '3' => 'Prikupljanje analitičkih podataka (o ponašanju korisnika)',
        ],
        'table' => [
            'name' => 'naziv',
            'service' => 'uslugu',
            'purpose' => 'svrhu',
            'type_duration' => 'vrstu i trajanje kolačića',
        ],
        'visitor_preferences' => [
            'title' => 'Odabiri posjetioca',
            'text' => '<p>Ove kolačiće definišemo mi i samo mi ih možemo čitati. Oni pamte sljedeće:</p>',
            'item' => 'da li ste prihvatili (ili odbacili) politiku o kolačićima ove internet stranice',
            'table' => [
                '1' => [
                    'service' => 'Alatka za saglasnost za kolačiće',
                    'purpose' => 'Bilježi vaše odabire kolačića (kako ne biste bili ponovo pitani)',
                    'type_duration' => 'Sesijski kolačić prve strane briše se nakon što zatvorite vaš pretraživač.',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Operativni kolačići',
            'text' => '<p>Postoje neki kolačići koje moramo uključiti, kako bi određene internet stranice funkcionisale. Zbog toga, tim stranicama nije potrebna vaša saglasnost. Ovo se naročito odnosi na:</p>',
            'item' => 'tehničke kolačiće koje zahtijevaju određeni IT sistemi',
        ],
        'technical_cookies' => [
            'title' => 'tehničke kolačiće',
            'table' => [
                '1' => [
                    'purpose' => 'Obezbjeđuju vam sigurnu sesiju tokom vaše posjete.',
                    'type_duration' => 'Sesijski kolačići prve strane brišu se nakon što zatvorite vaš pretraživač.',
                ],
                '2' => [
                    'purpose' => 'Održavaju sigurnu sesiju duži vremenski period sprečavajući gubitak sesije po zatvaranju pretraživača.',
                    'type_duration' => 'Trajni kolačić prve strane, 60 mjeseci.',
                ],
                '3' => [
                    'purpose' => 'Čuva odabir jezika korisnika.',
                    'type_duration' => 'Sesijski kolačići prve strane brišu se nakon što zatvorite vaš pretraživač.',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analitički kolačići',
            'items' => '<p>Ove kolačiće koristimo isključivo za potrebe internih istraživanja o tome kako možemo unaprijediti usluge koje pružamo svim našim korisnicima.</p>

            <p>Kolačići jednostavno ocjenjuju način na koji komunicirate s našom internet stranicom – kao anonimni korisnik (prikupljeni podaci ne identifikuju vas lično).</p>

            <p>Takođe, ovi podaci ne dijele se s bilo kojom trećom stranom niti se koriste u bilo koje druge svrhe. Anonimne statistike mogu se koristiti s ugovaračima angažovanim na komunikacionim projektima po osnovu Ugovora o angažovanju s Komisijom.</p>

            <p>Međutim, slobodni ste odbiti ovu vrstu kolačića – bilo preko banera za kolačiće koje vidite na prvoj stranici koju posjetite ili posjetom <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">za to predviđenoj stranici.</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Usluga internet analitike na osnovu otvorenog softvera Matomo',
                    'purpose' => 'Prepoznaje posjetioce internet stranice (anonimno – ne prikupljaju se nikakvi lični podaci korisnika).',
                    'type_duration' => 'Trajni kolačić prve strane, 20 dana',
                ],
                '2' => [
                    'service' => 'Usluga internet analitike na osnovu otvorenog softvera Matomo',
                    'purpose' => 'Identifikuje stranice koje je tokom iste posjete pregledao isti posjetilac. (anonimno – ne prikupljaju se nikakvi lični podaci korisnika).',
                    'type_duration' => 'Trajni kolačić prve strane, 30 minuta',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Kolačići treće strane',
        'items' => [
            '1' => '<p>Neke naše stranice objavljuju sadržaj vanjskih provajdera, na primjer YouTube, Facebook i Twitter.</p>

                <p>Kako biste vidjeli predmetni sadržaj treće strane, obavezni ste prvo prihvatiti njihove posebne uslove i odredbe. Ovo podrazumijeva njihovu politiku kolačića nad kojom mi nemamo kontrolu.</p>

                <p>Međutim, ukoliko ne pregledate ovakav sadržaj, na vašem uređaju neće biti instalirani nikakvi kolačići treće strane.</p>Provajderi treće strane na Nedjelji programiranja',
            '2' => 'Ove usluge trećih strana su van kontrole internet stranice Nedjelje programiranja. Provajderi mogu u bilo kom trenutku izmijeniti njihove uslove pružanja usluga, svrhu i upotrebu kolačića itd.',
        ],
    ],
    'how-manage' => [
        'title' => 'Kako možete upravljati kolačićima?',
        'items' => '<p>Možete <strong>upravljati/brisati</strong> kolačićima/kolačiće po svojoj želji, za detaljne informacije, posjetite <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Uklanjanje kolačića sa vašeg uređaja</strong></p>

            <p>Možete obrisati sve kolačiće koji već postoje na vašem uređaju, tako što ćete obrisati istoriju pretraživanja na vašem pretraživaču. Ovim ćete ukloniti sve kolačiće sa svih internet stranica koje ste posjetili.</p>

            <p>Ipak, budite svjesni činjenice da takođe možete izgubiti i neke sačuvane informacije (na primjer detalje o pristupu, odabire na stranici).</p><strong>Upravljanje kolačićima određene internet stranice</strong><p>Za detaljniju kontrolu kolačića određene internet stranice, informišite se o podešavanjima privatnosti i kolačića na vašem odabranom pretraživaču.</p><strong>Blokiranje kolačića</strong><p>Najnovije pretraživače možete podesiti tako da spriječe postavljanje bilo kakvih kolačića na vaš uređaj, ali postoji mogućnost da tada morate ručno prilagođavati odabire svaki put kada pristupite određenom sajtu/stranici. Takođe postoji mogućnost i da određene usluge i funkcije uopšte ne funkcionišu pravilno (na primjer pristup profilu).</p><strong>Upravljanje našim analitičkim kolačićima</strong><p>Možete upravljati svojim odabirima u vezi sa kolačićima putem naše Analitike koja se nalazi na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">za to predviđenoj stranici.</a></p>',
    ],
];
