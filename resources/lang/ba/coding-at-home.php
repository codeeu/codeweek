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
        'title' => 'Istraživač',
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

    'texts' => [
        1 => '"Coding@Home" su kratki video snimci sa uradi sam materijalima, slagalicama, zanimljivim igrama i izazovima kodiranja za svakodnevnu upotrebu u kući kao i u školi. Nije vam potrebno nikakvo predznanje u kodiranju niti su vam potrebni blo kakvi elektronski uređaji da bi uradili aktivnosti. Aktivnosti će podstaknuti računarsko razmišljanje i njegovati vještine učenika, roditelja i učitelja u kući ili u školi.',
        2 => 'Serija Coding@Home EU Sedmice Kodiranja se zasniva na <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> inicijativi Urbino Univerziteta i CodeMOCCnet Udruženja u saradnji sa RAI Cultura. Aktivnosti predstavlja Alessandro Bogliolo profesor Informacionih Procesnih Sistema na Urbino Univerzitetu, <a href="/ambassadors?country_iso=IT" target="_blank">Italijanski ambasador EU Sedmice Kodiranja</a> i koordinator svim ambasadorima kao i članovima Upravnog odbora Digital Skills and Jobs Koalicije.',
        3 => 'Ako vas interesuje više o unplugged aktivnostima, ili aktivnostima u različitim programskim jezicima, robotici, micro:bit, itd., pogledajte <a href="/training">EU Sedmica Kodiranja “Learning Bits”</a> sa video vježbama i planovim lekcija za osnovne i srednje škole. Takođe pogledajte stranicu sa resursima EU Sedmice Kodiranja za <a href="/resources/learn">učenike</a> i <a href="/resources/teach">učitelje</a>. '
    ]
];