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

    'texts' => [
        1 => 'Coding@Home je zbirka kratkih video zapisa, materijala za samostalan rad, slagalica, igara i izazova za kodiranje namijenjenih svakodnevnoj upotrebi u porodici i u školi. Za obavljanje ovih aktivnosti vam nije potrebno nikakvo prethodno znanje ili elektronski uređaj. Aktivnosti imaju za cilj podsticanje računarskog mišljenja i unapređenje vještina učenika, roditelja i nastavnika, kod kuće ili u školi.',
        2 => 'Serijal Evropske nedjelje programiranja Coding@Home je zasnovan na inicijativi <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> Urbino univeziteta i CodeMOOCnet asocijacije u saradnji sa Rai Cultura. Alesandro Boljolo je profesor računarskih sistema na univerzitetu Urbino, <a href="/ambassadors?country_iso=IT" target="_blank">Italian EU Code Week ambasador</a> i koordinator svih ambasadora kao i član upravnog odbora Koalicije za digitalne vještine i radna mjesta. ',
        3 => 'Ako vas zanimaju unplugged aktivnosti i ostale aktivnosti na različitim programskim jezicima poput robotike, mikro: bit itd., posjetite <a href="/training">‘Materijali za učenje nedjelje programiranja’</a> sa video tutorijalima i nastavnim planom za osnovne i srednje škole. Takođe posjetite stranicu Evropske nedjelje programiranja sa korisnim linkovima za <a href="/resources/learn">učenike</a> i <a href="/resources/teach">nastavnike</a>. '
    ]
];