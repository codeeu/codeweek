<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Pitanja',
    'material' => [
        "required" => "Potrebni materijal",
        "chequered" => "šahovska ploča",
        "footprint" => "pločice sa slikama otiska stopala"
    ],
    'intro' => [
        'title' => 'Uvod u Coding@Home',
    ],
    'explorer' => [
        'title' => 'Istraživač',
        'text' => 'Istraživač je prva aktivnost u Coding@Home. Pomjerajte istraživača preko ploče da dosegnete metu nakon što posjetite što je moguće više kvadratića. ',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Sa polaznim i završnim pozicijama prikazanim u video snimku, da li je moguće da istraživač posjeti sva polja na ploči?',
                    2 => 'P2. Koje polazne i završne pozicije spriječavaju istraživača da posjeti najveći broj polja na ploči?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Desno i lijevo',
        'text' => 'Desno i lijevo je takmičarska igra saradnje. Dva tima sarađuju da kreiraju putanju prema meti, dok se takmiče da upotrijebe što je moguće više polja koja sui ma dodijeljena: žuti tim pokušava da ubaci što je moguće više skretanja ulijevo a crveni tim pokušava da ubaci što je moguće više skretanja udesno.',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Sa početkom i ciljem postavljenim kao u prvom meču u ovom video snimku, da li je moguće da jedan od ova dva tima pobjedi?',
                    2 => 'P2. Sa početkom i ciljem postavljenim kao u igri u kojoj je pobijedila Ana, može li biti neriješen rezultat?',
                    3 => 'P3. Postoje li početne i završne postavke koje više odgovaraju jednom od timova?',
                    4 => 'P4. Uzimajući u obzir raspored između početnih i završnih pozicija, da li je moguće predvidjeti koliki će biti razmak između tima koji pobjeđuje i tima koji gubi?'
                ]

        ]

    ],


    'keep-off-my-path' => [
        'title' => 'Drži se dalje od mog puta',
        'text' => 'Drži se dalje od mog puta je takmičarska igra s dvije ekipe. Polazeći od suprotnih krajeva table, dvije ekipe grade staze koje se ometaju. Pobjeđuje ekipa koji spriječi protivničku ekipu da produži svoj put.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Postoje li polazišta koja favoriziraju jednu od dvije ekipe?',
                    2 => 'Q2. Može li rezultat biti neriješen?',
                    3 => 'Q3. Da li igrač koji prvi igra ima prednost?',
                    4 => 'Q4. Postoji li nepobjediva strategija igre koju igrač koji krene prvi može usvojiti kako bi bio siguran da nikad neće izgubiti?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Potezanje konopca',
        'text' => 'Potezanje konopca je kolaborativna i takmičarska igra. Počevši od srednjeg donjeg dijela table, dvije ekipe (žuta i crvena) rade zajedno kako bi došli do vrha. Žuta ekipa pokušava doći do polja s lijeve strane dok crvena ekipa pokušava doći do polja s desne strane.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Postoji li strategija koja će uvijek rezultirati pobjedom?',
                    2 => 'Q2. Da li igrač koji prvi igra ima prednost?',
                    3 => 'Q3. Ako su oba igrača jednako pažljiva, da li igra uvijek završava neriješeno, tj. u sredini?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'Istraživač bez tragova',
        'text' => 'Istraživač se kreće po tabli od početne tačke do cilja, pokušavajući posjetiti sva polja. Dok se istraživač kreće, on ostavlja obojene tragove koji omogućuju robotu da slijedi korake interpretirajući boje. Igra postaje još intrigantnija kada istraživač ukloni otiske stopala ostavljajući samo boje.',
        'material' => 'kao i crveni, žuti i sivi marker (ili olovka)',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Koja je razlika između table pune obojenih tragova i one s bojama, ali bez tragova?',
                    2 => 'P2. Koja tabla nudi više slobode kretanja, pridržavajući se istih pravila za skretanje kako je naznačeno bojom?',
                    3 => 'P3. Postoje li staze na tabli s bojama, koje nisu moguće na tabli s obojenim tragovima?',
                    4 => 'P4. Postoje li staze na tabli s obojenim tragovima, koje nisu moguće na tabli samo s bojama?'
                ]

        ]

    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Hodaj dok god možeš',
        'text' => 'U ovoj aktivnosti izazov je ostati što duže na ploči koristeći boje umjesto tragova. Aktivnost postaje teža kada se povećava sloboda kretanja',
        'coloured-cards' => "obojene kartice, ili crvene, žute i sive oznake",
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Kada se dva puta sudaraju i blokiraju jedan drugog?',
                    2 => 'P2. Ova igra je predstavljena kao igra za dva igrača? Da li je moguće igrati sa 3 ili 4 igrača? Da li trebamo mijenjati pravila?',
                ]

        ]

    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles i Roby',
        'text' => 'Priča o Adi Lovelace i Charlesu Babbageu je zanimljiva. Oni su osmislili i programirali kompjutere stotinu godina prije nego što su zapravo izumljeni',
        'material' => 'glina za modeliranje i kratka olovka',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Pokušajte zamisliti da je robot kojeg ste napravili glinom za modeliranje i olovkom u stanju da se kreće po ploči kako bi dostigao bilo koji položaj i, ako treba, pronašao svoj put. Koja uputstva biste koristili za programiranje?'
                ]

        ]

    ],

    'cody-and-roby' => [
        'title' => 'Cody i Roby',
        'text' => 'Ovo je igra uloga s programerom Codyjem i robotom Robyjem. Video predstavlja kartice CodyRobyja koje ćemo od sada koristiti za određivanje pokreta na ploči. Cody će koristiti ove kartice kako bi dao Robyju uputstva kako se kretati po ploči',
        'material' => 'ploča sa naljepnicama, kartice sa uputstvima (lijevo, desno, pravo) i bilo kakvi brojači da se postave na ploču',
        'starter-kit' => 'CodyRoby početni komplet',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Gdje stiže Roby ako, počevši od položaja C2 prema jugu, izvrši posljednji niz uputstava prikazanih u videu?',
                    2 => 'P2. Mogu li se pokreti koje Roby provodi izvodeći posljednji niz uputstava prikazanih u videu opisati primjenom na ploči uputstava iz Cody Stopala ili Cody Boja?',
                    3 => 'P3. Tri vrste uputstava prezentiranih u videu, predstavljenih zelenim, crvenim i žutim karticama, predstavljaju skup uputstava koji mogu odvesti Robyja bilo gdje na ploči. Možete li smisliti skup uputstava sa manje od tri uputstva kako učiniti to isto?',
                ]

        ]

    ],

    'the-tourist' => [
        'title' => 'Turista',
        'text' => 'Sa CodyRoby karticama, dva tima se međusobno izazivaju da pronađu, u najkraćem mogućem roku, niz uputstava koje će turistu uputiti do spomenika koji želi posjetiti na ploči.',
        'material' => 'Veće kartice mogu biti korisne za igranje na podu',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Koji niz uputstava bi vodio turistu do statue Rafaela u prvom primjeru prikazanom u videu?',
                    2 => 'P2. Koji niz uputstava bi vodio turistu do Torricinija iz Vojvodske palače u drugom primjeru prikazanom u videu?',
                    3 => 'P3. Možete li smisliti zabavan način vježbanja svaki put kada neki od dva tima odabere karticu koju će dodati programu? Smislite način ponovnim promišljanjem štafetne utrke prikazane u videu',
                ]

        ]

    ],

    'material2' => [
        "chequered-with-labels" => "ploča sa oznakama",
        "cards" => '24 karte "Idi naprijed", 8 karata "Okreni se lijevo" i 8 karata "Okreni se desno"',
"larger-cards" => "Veće karte se preporučuju za verziju igre na podu",
"video" => "Ovaj video također objašnjava kako se može igrati bez špila karata",
"pieces-of-paper" => "Također su potrebna 24 komada papira za postavljanje na polja koja su već pređena",
"card-alternative" => "Kao alternativu CodyRoby kartama, možete koristiti ikonice karata koje su dostupne ovdje",
"small-drawings" => "Dodatak mogu biti mali crteži koji će pomoći u pričanju priče. Oni koji su korišteni u videu se nalaze ovdje",
"rest-of-cards" => "Za ostatak koristimo karte od CodyRoby, CodyFeet ili CodyColour."
],


'catch-the-robot' => [
    'title' => "Uhvati robota",
    'text' => "Uhvati robota je takmičarska igra koja se igra na stolu ili na podu. Pobjeđuje onaj igrač koji uhvati robota iz protivničkog tima tako što stigne do njegovog polja na ploči. Nasumičnost karata za igranje zahtijeva od oba tima konstantno prilagođavanje njihovih strategija.",
    'questions' => [
        'content' =>
            [
                1 => 'P1 Ako se ružičasti pješak (Roby) nalazi na centralnom polju C3 usmjeren prema Sjeveru, a ružičasti tim ima 2 karte "Idi naprijed", 2 karte "Okreni se lijevo" i 1 kartu "Okreni se desno", na koja polja se može pomjeriti?',
]

]

],

'the-snake' => [
    'title' => "Zmija",
    'text' => "Zmija je vrsta pasijans igre koja se igra s CodyRoby kartama. Cilj igre je provesti zmiju kroz sva polja na ploči, a da pri tome ne ugrize svoj rep.",
    'questions' => [
        'content' =>
            [
                1 => "P1 Postoje li neke polazne tačke s kojih je nemoguće posjetiti sva polja, a pri tome ne ugristi rep zmije?",
            ]

    ]

],

'storytelling' => [
    'title' => "Pričanje priča",
    'text' => "Današnja tema je pričanje priča! Koristi uputstva od CodyRoby, otiske stopala od CodyFeet ili boje od CodyColour za vođenje pješaka preko ploče i pričanje priče. Razbacaj različite dijelove priče po cijeloj ploči.",
    'questions' => [
        'content' =>
            [
                1 => "P1 Koje sredstvo je najsvestranije za vođenje Robyja u pričanju priče?",
                2 => "P2 Možete li postaviti dijelove priče koju želite ispričati na ploči na pozicijama s kojih je nemoguće pokupiti sve dijelove s CodyFeet?",
            ]

    ]

],



    'texts' => [
        1 => '"Coding@Home" su kratki video snimci sa uradi sam materijalima, slagalicama, zanimljivim igrama i izazovima kodiranja za svakodnevnu upotrebu u kući kao i u školi. Nije vam potrebno nikakvo predznanje u kodiranju niti su vam potrebni blo kakvi elektronski uređaji da bi uradili aktivnosti. Aktivnosti će podstaknuti računarsko razmišljanje i njegovati vještine učenika, roditelja i učitelja u kući ili u školi.',
        2 => 'Serija Coding@Home EU Sedmice Kodiranja se zasniva na <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> inicijativi Urbino Univerziteta i CodeMOCCnet Udruženja u saradnji sa RAI Cultura. Aktivnosti predstavlja Alessandro Bogliolo profesor Informacionih Procesnih Sistema na Urbino Univerzitetu, <a href="/ambassadors?country_iso=IT" target="_blank">Italijanski ambasador EU Sedmice Kodiranja</a> i koordinator svim ambasadorima kao i članovima Upravnog odbora Digital Skills and Jobs Koalicije.',
        3 => 'Ako vas interesuje više o unplugged aktivnostima, ili aktivnostima u različitim programskim jezicima, robotici, micro:bit, itd., pogledajte <a href="/training">EU Sedmica Kodiranja “Learning Bits”</a> sa video vježbama i planovim lekcija za osnovne i srednje škole. Takođe pogledajte stranicu sa resursima EU Sedmice Kodiranja za <a href="/resources/learn">učenike</a> i <a href="/resources/teach">učitelje</a>. '
    ]
];