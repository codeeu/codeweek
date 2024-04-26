<?php

return [

    'title' => 'Politika korišćenja kolačića',
    'what' => [
        'title' => 'Šta su kolačići?',
        'text' => '<p>Kolačić je mala tekstualna datoteka koju veb-sajt skladišti na vašem računaru ili mobilnom uređaju kada posetite taj sajt.</p>',
        'first_party' => '<strong>Direktni kolačići</strong> su kolačići koje postavlja veb-sajt koji posećujete. Samo taj-veb sajt može da ih čita. Pored toga, veb-sajt potencijalno može da koristi spoljne usluge, koje takođe postavljaju svoje kolačiće, poznate kao <strong>nezavisni kolačići</strong>.',
        'persistent_cookies' => 'Stalni kolačići su kolačići koji su sačuvani na računaru i koji se ne brišu automatski kada napustite pretraživač, za razliku od kolačića sesije, koji se tada brišu.',
        'items' => '<p>Prvi put kada posetite veb-sajt Nedelje programiranja, od vas će biti zatraženo da <strong>prihvatite ili odbijete kolačiće</strong>.</p>

            <p>Svrha je omogućiti sajtu da zapamti vaša željena podešavanja (kao što su korisničko ime, jezik itd.) tokom određenog vremenskog perioda.</p>

            <p>Na taj način ne morate ponovo da ih unosite kada pregledate sajt tokom iste posete.</p>

            <p>Kolačići mogu da se koriste i za dobijanje anonimnih statističkih podataka o iskustvu pregledanja na našim sajtovima.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Kako koristimo kolačiće?',
        'text1' => '<p>Nedelja programiranja uglavnom koristi „direktne kolačiće“. To su kolačići koje postavljamo i kontrolišemo mi, a ne neka spoljna organizacija.</p>',
        'text2' => '<p>Međutim, da biste pregledali neke od naših stranica, moraćete da prihvatite kolačiće spoljnih organizacija.</p>',
        '3types' => [
            'title' => '<strong>3 tipa direktnih kolačića</strong> koje mi koristimo služe da:',
            '1' => 'skladištimo željena podešavanja posetioca',
            '2' => 'naši veb-sajtovi butu operativni',
            '3' => 'prikupljamo analitičke podatke (o ponašanju korisnika)',
        ],
        'table' => [
            'name' => 'Ime',
            'service' => 'Usluga',
            'purpose' => 'Svrha',
            'type_duration' => 'Tip i trajanje kolačića',
        ],
        'visitor_preferences' => [
            'title' => 'Željena podešavanja posetilaca',
            'text' => '<p>Mi ih postavljamo i samo mi možemo da ih čitamo. Oni pamte:</p>',
            'item' => 'da li ste pristali (ili odbili) politiku korišćenja kolačića ovog sajta',
            'table' => [
                '1' => [
                    'service' => 'Paket saglasnosti za kolačiće',
                    'purpose' => 'Skladišti željena podešavanja za kolačiće (da vas ne bismo ponovo pitali)',
                    'type_duration' => 'Direktni kolačić sesije obrisan nakon što izađete iz pretraživača',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Operativni kolačići',
            'text' => '<div>Postoje određeni kolačići koje moramo da obuhvatimo kako bi određeni veb-sajtovi funkcionisali. Stoga za njih nije potrebna vaša saglasnost. Posebno:</div>',
            'item' => 'tehnički kolačići koje zahtevaju određeni IT sistemi',
        ],
        'technical_cookies' => [
            'title' => 'Tehnički kolačići',
            'table' => [
                '1' => [
                    'purpose' => 'Održavaju vašu sesiju bezbednom tokom vaše posete.',
                    'type_duration' => 'Direktni kolačić sesije, obrisan nakon što izađete iz pretraživača',
                ],
                '2' => [
                    'purpose' => 'Održava vašu sesiju bezbednom duže vremena sprečavajući gubitak sesije pri zatvaranju pretraživača.',
                    'type_duration' => 'Direktni trajni kolačić, 60 meseci',
                ],
                '3' => [
                    'purpose' => 'Skladišti željeni jezik korisnika',
                    'type_duration' => 'Direktni kolačić sesije, obrisan nakon što izađete iz pretraživača',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analitički kolačići',
            'items' => '<p>Koristimo ih čisto za interno istraživanje o tome kako možemo poboljšati uslugu koju pružamo svim našim korisnicima.</p>

            <p>Kolačići jednostavno procenjuju kako ostvarujete interakciju sa našim veb-sajtom – kao anonimni korisnik (prikupljeni podaci ne identifikuju vas lično).</p>

            <p>Takođe, ovi podaci se ne dele ni sa jednom trećom stranom niti se koriste u neke druge svrhe. Anonimizovani statistički podaci mogu biti deljeni sa ugovaračima koji rade na projektima komunikacije u okviru ugovornog sporazuma sa Komisijom.</p>

            <p>Međutim, možete slobodno da odbijete ovaj tip kolačića – ili putem banera za kolačiće koji ćete videti na prvoj stranici koju posetite ili tako što ćete posetiti ovu <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">namensku stranicu.</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Usluga veb-analitike, zasnovana na Matomo softveru sa otvorenim kodom',
                    'purpose' => 'Prepoznaje posetioce veb-sajta (anonimno – ne prikupljaju se nikakve lične informacije o korisniku).',
                    'type_duration' => 'Direktni trajni kolačić, 20 dana',
                ],
                '2' => [
                    'service' => 'Usluga veb-analitike, zasnovana na Matomo softveru sa otvorenim kodom',
                    'purpose' => 'Identifikuje prikaze stranice koje je obavio isti korisnik tokom iste posete. (anonimno – ne prikupljaju se nikakve lične informacije o korisniku).',
                    'type_duration' => 'Direktni trajni kolačić, 30 minuta',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Kolačići trećih strana',
        'items' => [
            '1' => '<p>Neke naše stranice prikazuju sadržaj spoljnih dobavljača, npr. YouTube, Facebook i Twitter.</p>

                <p>Da biste videli ovaj sadržaj trećih strana, prvo morate da prihvatite njihove određene uslove i odredbe. To obuhvata i njihovu politiku korišćenja kolačića, nad kojom nemamo kontrolu.</p>

                <p>Ali ako ne pogledate taj sadržaj, nikakvi nezavisni kolačići neće biti instalirani na vaš uređaj.</p>Nezavisni pružaoci usluga na Nedelji programiranja',
            '2' => 'Ove usluge trećih strana su van kontrole veb-sajta Nedelje programiranja. Pružaoci usluga mogu, u bilo kom trenutku, da promene svoje uslove korišćenja usluge, svrhu i korišćenje kolačića itd.',
        ],
    ],
    'how-manage' => [
        'title' => 'Kako vi možete da upravljate kolačićima?',
        'items' => '<p>Vi možete da <strong>upravljate/brišete</strong> kolačiće po svom nahođenju – za detalje, pogledajte <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Uklanjanje kolačića sa uređaja</strong></p>

            <p>Možete obrisati sve kolačiće koje već imate na svom uređaju tako što ćete obrisati istoriju pregledanja u pretraživaču. Na taj način ćete ukloniti sve kolačiće sa svih veb-sajtova koje ste posetili.</p>

            <p>Budite svesni da možete izgubiti i neke sačuvane informacije (npr. sačuvani detalji o prijavljivanju, željena podešavanja sajta).</p><strong>Upravljanje kolačićima specifičnim za sajt</strong><p>Za detaljniju kontrolu nad kolačićima specifičnim za sajt, pogledajte podešavanja privatnosti i kolačića u željenom pretraživaču</p><strong>Blokiranje kolačića</strong><p>Većinu modernih pretraživača možete da podesite tako da sprečite postavljanje kolačića na vaš uređaj, ali ćete onda morati ručno da podesite neka željena podešavanja svaki put kada posetite sajt/stranicu. A neke usluge ili funkcionalnosti možda uopšte neće pravilno funkcionisati (npr. prijavljivanje na profil).</p><strong>Upravljanje našim analitičkim kolačićima</strong><p>Svojim željenim podešavanjima u vezi sa kolačićima možete upravljati iz naše Analitike na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">namenskoj stranici.</a></p>',
    ],
];
