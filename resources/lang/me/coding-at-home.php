<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Pitanja',
    'material' => [
        "required" => "Potrebni materijal",
        "chequered" => "tabla sa kvadratićima",
        "footprint" => "sličice sa otiscima stopala"
    ],
    'intro' => [
        'title' => 'Uvod u Coding@Home',
    ],
    'explorer' => [
        'title' => 'The explorer',
        'text' => 'Explorer je prva aktivnost Coding@Home. Na radnoj površini pomjerajte što više kvadratića kako biste došli do cilja.',
        'questions' => [
            'content' =>
                [
                    1 => 'Pitanje1. Uz početnu i krajnju poziciju Explorer-a/Istraživača kakva se vidi na video snimku, da li Explorer može doći do svakog polja na tabli?',
                    2 => 'Pitanje2. Uz koju početnu i krajnju poziciju Explorer ne može da dođe do najvećeg broja polja na tabli?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Desno i lijevo',
        'text' => 'Desno i lijevo je takmičarska igra ali traži i saradnju. Dva tima sarađuju kako bi napravili put do cilja, pri čemu se takmiče da iskoriste što više kartica koje su im dodijeljene: žuti tim pokušava da postavi što više skretanja ulijevo a crveni što više moguće skretanja udesno.',
        'questions' => [
            'content' =>
                [
                    1 => 'Pitanje 1. Sa početnim i završnim rasporedom prikazanim kao u prvom meču ovog video snimka, da li je jedna od dvije ekipe može da pobijedi?',
                    2 => 'Pitanje 2. Sa početnim i završnim rasporedom kao u partiji koju je dobila Ana, može li doći do neriješenog rezultata?',
                    3 => 'Pitanje 3. Postoji li neki početni i završni raspored koji ide više na ruku jednom timu?',
                    4 => 'Pitanje 4. Imajući u vidu razliku kod početnog i završnog rasporeda, da li je moguće predvidjeti razliku između pobjedničkog i gubitničkog tima?'
                ]

        ]

    ],


    'keep-off-my-path' => [
        'title' => 'Skloni mi se s puta',
        'text' => '‘Skloni mi se s puta ‘je takmičarsa igra dvije ekipe. Svaka od ekipa započinje sa suprotnih krajeva table i pravi put pri čemu sprečava onog drugog da napreduje. Onaj tim koji uspije da spriječi drugog da gradi svoj put pobjeđuje.',
        'questions' => [
            'content' =>
                [
                    1 => 'Pitanje 1. Postoji li neki početni i završni raspored koji ide više na ruku jednom timu?',
                    2 => 'Pitanje 2. Da li može biti neriješeno?',
                    3 => 'Pitanje 3. Da li igrač koji započne prvi ima prednost?',
                    4 => 'Pitanje 4. Postoji li neka idealna strategija kojom se igrač koji prvi započne može služiti i sa kojom sigurno dobija?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Potezanje konopca',
        'text' => '‘Potezanje konopca’ je takmičarska igra ali traži i saradnju. Počevši od sredine dna table, dva tima – žuti i crveni, sarađuju kako bi došli do vrha. Žuti tim pokušava da dođe do polja lijevo dok se crveni trudi da dođe do polja nadesno.',
        'questions' => [
            'content' =>
                [
                    1 => 'Pitanje 1. Da li postoji neka strategija koja uvijek vodi do pobjede?',
                    2 => 'Pitanje 2. Da li igrač koji prvi počinje ima prednost?',
                    3 => 'Pitanje 3. Ako su oba igrača podjednako pažljiva, da li je igra uvijek neriješena, tj. da li se završava na centru?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'Eksplorer bez otisaka',
        'text' => 'Explorer/Istraživač se kreće po tabli od početne pozicije do cilja pokušavajući da pređe sva polja. Dok se kreće ostavlja otiske stopala u boji zbog čega robot može da prati stope po boji. Igra postaje još zanimljivija kada explorer ukloni stope a ostanu samo boje.',
        'material' => 'crveni, žuti i sivi marker (ili drvene bojice)',
        'questions' => [
            'content' =>
                [
                    1 => 'Pitanje 1.U čemu je razlika između table sa stopama u boji i one samo sa bojama bez stopa?',
                    2 => 'Pitanje 2. Na kojoj tabli se može više kretati pridržavajući se istih pravila skretanja po bojama?',
                    3 => 'Pitanje 3. Da li na tabli sa bojama postoje staze koje ne postoje na tabli sa stopama u boji?',
                    4 => 'Pitanje 4. Da li na tabli sa stopama u boji postoje staze koje ne postoje na tabli sa bojama?'
                ]

        ]

    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Hodaj koliko god možeš',
        'text' => 'U ovoj aktivnosti, izazov je da ostaneš što duže na tabli koristeći boje umjesto tragova. Aktivnost postaje teža kada se povećava sloboda kretanja',
        'coloured-cards' => "obojene kartice, ili crveni, žuti i sivi znakovi",
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Kada se dva puta sudaraju i blokiraju jedan drugog?',
                    2 => 'P2. Ova igra je predstavljena kao igra za dva igrača? Da li je moguće igrati sa 3 ili 4 igrača? Da li treba da mijenjamo pravila?',
                ]

        ]

    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Čarls i Robi',
        'text' => 'Priča o Adi Lavlejs i Čarlsu Bebidžu je zanimljiva. Oni su smislili i programirali računare sto godina prije nego što su zapravo izmišljeni',
        'material' => 'glina za modeliranje i kratka olovka',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Pokušajte da zamislite da je robot kojeg ste napravili glinom za modeliranje i olovkom u stanju da se kreće po tabli kako bi dostigao bilo koji položaj i, ako treba, pronašao svoj put. Koja uputstva bi koristili za programiranje?'
                ]

        ]

    ],

    'cody-and-roby' => [
        'title' => 'Kodi i Robi',
        'text' => 'Ovo je igra uloga sa programerom Kodijem i robotom Robijem. Video predstavlja kartice KodiRobija koje ćemo od sada koristiti za određivanje pokreta na tabli. Kodi će da koristi ove kartice kako bi dao Robiju instrukcije kako da se kreće po tabli',
        'material' => 'tabla sa naljepnicama, kartice sa instrukcijama (lijevo, desno, pravo) i bilo kakvi brojači da se postave na tablu',
        'starter-kit' => 'KodiRobi početni komplet',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Gdje stiže Robi ako, počevši od položaja C2 prema jugu, izvrši posljednji niz instrukcija prikazanih u videu?',
                    2 => 'P2. Da li se pokreti koje Robi provodi, izvodeći posljednji niz instrukcija prikazanih u videu, mogu da opišu primjenom na tabli instrukcija iz Kodi Stopala ili Kodi Boja?',
                    3 => 'P3. Tri vrste instrukcija koje su prezentovane u videu, predstavljenih zelenim, crvenim i žutim karticama, predstavljaju grupu instrukcija koji mogu da odvedu Robija bilo gdje na tabli. Možete li da smislite grupu instrukcija sa manje od tri instrukcije kako da uradite to isto?',
                ]

        ]

    ],

    'the-tourist' => [
        'title' => 'Turista',
        'text' => 'Sa KodiRobi karticama, dva tima se međusobno izazivaju da pronađu, u najkraćem mogućem roku, niz instrukcija koje će turistu uputiti do spomenika koje želi da posjeti na tabli',
        'material' => 'Veće kartice mogu biti korisne za igranje na podu',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Koji niz instrukcija bi vodio turistu do statue Rafaela u prvom primjeru prikazanom u videu?',
                    2 => 'P2. Koji niz instrukcija bi vodio turistu do Toričinija iz Vojvodske palate u drugom primjeru prikazanom u videu?',
                    3 => 'P3. Možete li smisliti zabavan način vježbanja svaki put kada neki od dva tima izabere karticu koju će da doda programu? Smislite način kroz promišljanje štafetne trke prikazane u videu',
                ]

        ]

    ],

    'material2' => [
        "chequered-with-labels" => "šahovska tabla sa naljepnicama",
        "cards" => '24 karte "Idi naprijed", 8 karata "Skreni lijevo" i 8 karata "Skreni desno"',
        "larger-cards" => "Za podnu verziju se preporučuju veće karte",
        "video" => "Video takođe objašnjava kako da se igra bez špila karata",
        "pieces-of-paper" => "Takođe je potrebno da se postave 24 papira na već posjećene kvadrate",
        "card-alternative" => "Kao alternativu špilu CodyRoby karata možete koristiti ovdje dostupne ikone karata",
        "small-drawings" => "Dodatak bi mogli biti mali crteži koji će vam pomoći da se ispriča priča. Oni koji se koriste u videu su ovdje",
        "rest-of-cards" => "Za ostalo koristimo karte CodyRoby, CodyFeet ili CodyColour."
    ],


    'catch-the-robot' => [
        'title' => "Uhvati robota",
        'text' => "Uhvati robota je takmičarska igra koja se igra na stolu ili na podu. Pobjeđuje onaj igrač koji uhvati robota protivničkog tima tako da dosegne njegov kvadrat na tabli. Slučajan redoslijed karata za igranje zahtijeva da obe ekipe da kontinuirano prilagođavaju svoje strategije.",
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Ako je rozi pijun (Roby) na glavnom kvadratu C3 okrenut prema sjeveru, a rozi tim ima 2 karte "Idi naprijed", 2 karte "Skreni lijevo" i 1 "Skreni desno", na koje kvadrate može ići?',
                ]

        ]

    ],

    'the-snake' => [
        'title' => "Zmija",
        'text' => "Zmija je vrsta pasijansa koji se igra sa CodyRoby kartama. Cilj je da se zmija vodi kroz sve kvadrate na tabli, a da se ne ugrize za rep.",
        'questions' => [
            'content' =>
                [
                    1 => "P1. Postoje li početne tačke zbog kojih je nemoguće posjetiti sve kvadrate, a da se ne ugrize zmijin rep?",
                ]

        ]

    ],

    'storytelling' => [
        'title' => "Pričanje priča",
        'text' => "Današnja tema je pričanje priča! Koristite CodyRoby uputstva, otiske stopala CodyFeet ili CodyColour boje, da vodite pijune oko table da ispričaju priču. Raširite različite dijelove priče po tabli.",
        'questions' => [
            'content' =>
                [
                    1 => "P1. Koji je alat najsvestraniji za vođenje Robyja da ispriča priču?",
                    2 => "P2. Možete li da rasporedite dijelove priče koje želite da ispričate na tabli na položaje koji onemogućavaju da se svi preuzmu pomoću CodyFeet-a?",
                ]

        ]

    ],


    'texts' => [
        1 => 'Coding@Home je zbirka kratkih video zapisa, materijala za samostalan rad, slagalica, igara i izazova za kodiranje namijenjenih svakodnevnoj upotrebi u porodici i u školi. Za obavljanje ovih aktivnosti vam nije potrebno nikakvo prethodno znanje ili elektronski uređaj. Aktivnosti imaju za cilj podsticanje računarskog mišljenja i unapređenje vještina učenika, roditelja i nastavnika, kod kuće ili u školi.',
        2 => 'Serijal Evropske nedjelje programiranja Coding@Home je zasnovan na inicijativi <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> Urbino univeziteta i CodeMOOCnet asocijacije u saradnji sa Rai Cultura. Alesandro Boljolo je profesor računarskih sistema na univerzitetu Urbino, <a href="/ambassadors?country_iso=IT" target="_blank">Italian EU Code Week ambasador</a> i koordinator svih ambasadora kao i član upravnog odbora Koalicije za digitalne vještine i radna mjesta. ',
        3 => 'Ako vas zanimaju unplugged aktivnosti i ostale aktivnosti na različitim programskim jezicima poput robotike, mikro: bit itd., posjetite <a href="/training">‘Materijali za učenje nedjelje programiranja’</a> sa video tutorijalima i nastavnim planom za osnovne i srednje škole. Takođe posjetite stranicu Evropske nedjelje programiranja sa korisnim linkovima za <a href="/resources/learn">učenike</a> i <a href="/resources/teach">nastavnike</a>. '
    ]
];