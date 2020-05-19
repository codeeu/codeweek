<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Pitanja',
    'material' => [
        "required" => "Potrebni materijal",
        "chequered" => "kockasta ploča",
        "footprint" => "kartice s otiscima stopala"
    ],
    'intro' => [
        'title' => 'Uvod u Coding@Home',
    ],
    'explorer' => [
        'title' => 'Istraživač',
        'text' => 'Istraživač je prva aktivnost u zbirci Coding@Home. Istraživača pomičite pločom do cilja tako da posjeti što više polja. ',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Može li istraživač posjetiti sva polja na ploči uz polazište i odredište prikazano u video zapisu?',
                    2 => 'P2. Koje polazište i odredište istraživaču ne dopuštaju da posjeti najveći broj polja na ploči?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Udesno i ulijevo',
        'text' => 'Udesno i ulijevo je natjecateljska i suradnička igra. Dvije ekipe surađuju kako bi izgradile put do odredišta i istovremeno se natječu pokušavajući iskoristiti što više kartica koje su im dodijeljene: žuta ekipa pokušava staviti što više skretanja ulijevo, a crvena ekipa pokušava staviti što više skretanja udesno.',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Može li jedna od dviju ekipa pobijediti ako su polazište i odredište postavljeni kao u prvoj igri u ovom video zapisu?',
                    2 => 'P2. Može li igra završiti neriješeno ako su polazište i odredište postavljeni kao u igri u kojoj je pobijedila Anna?',
                    3 => 'P3. Postoje li položaji polazišta i odredišta koji idu u prilog jednoj od dviju ekipa?',
                    4 => 'P4. Može li se ovisno o rasporedu polazišta i odredišta predvidjeti kolika će biti razlika između pobjedničke i gubitničke ekipe?'
                ]

        ]

    ],


    'keep-off-my-path' => [
        'title' => 'Miči mi se s puta',
        'text' => 'Miči mi se s puta natjecateljska je igra za dvije ekipe. Počevši na suprotnim krajevima ploče dvije ekipe grade putove kojima ometaju jedni druge. Pobjeđuje ekipa koja spriječi drugu u širenju puta.',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Postoje li polazišta koja idu u prilog jednoj od dviju ekipa?',
                    2 => 'P2. Je li moguć neriješen rezultat?',
                    3 => 'P3. Je li u prednosti igrač koji igra prvi?',
                    4 => 'P4. Postoji li sigurna strategija kojom se može poslužiti igrač koji igra prvi kako bi bio siguran da nikad neće izgubiti?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Potezanje užeta',
        'text' => 'Potezanje užeta suradnička je i natjecateljska igra. Počevši od središta na dnu ploče dvije ekipe (žuta i crvena) surađuju kako bi došle do vrha. Žuta ekipa pokušava dosegnuti polja na lijevoj strani, dok crvena ekipa pokušava dosegnuti polja na desnoj strani.',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Postoji li strategija koja će uvijek dovesti do pobjede?',
                    2 => 'P2. Je li u prednosti igrač koji igra prvi?',
                    3 => 'P3. Ako su oba igrača jednako pažljiva, hoće li igra uvijek završiti neriješeno, tj. u središtu?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'Istraživač ',
        'text' => 'Istraživač hoda pločom od polazišta do cilja i pokušava posjetiti sva polja. Istraživač hodajući iza sebe ostavlja obojene otiske stopala po kojima ih robot slijedi tumačeći boje. Igra postaje još intrigantnija kad istraživač obriše otiske stopala i ostavi samo boje.',
        'material' => 'žuti i sivi flomasteri (ili bojice).',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Koja je razlika između ploče ispunjene obojenim otiscima stopala i ploče s bojama bez otisaka stopala?',
                    2 => 'P2. Koja ploča omogućava veću slobodu kretanja uz poštivanje istih pravila za skretanje u skladu s bojama?',
                    3 => 'P3. Postoje li mogući putovi na ploči s bojama koji nisu mogući na ploči s obojenim otiscima stopala?',
                    4 => 'P4. Postoje li mogući putovi na ploči s obojenim otiscima stopala koji nisu mogući na ploči na kojoj su samo boje?'
                ]

        ]

    ],

    'texts' => [
        1 => 'Coding@Home je zbirka kratkih video zapisa, materijala za samoučenje, zadataka, igara i izazova za programiranje za svakodnevnu upotrebu u obitelji i školi. Za te aktivnosti ne trebate nikakvo prethodno znanje niti elektroničke uređaje. Aktivnosti će poticati računalno razmišljanje i njegovat će vještine učenika, roditelja i učitelja kod kuće i u školi.',
        2 => 'Ciklus Coding@Home Europskog tjedna programiranja temelji se na inicijativi <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> Sveučilišta u Urbinu i Udruženja CodeMOOCnet u suradnji s portalom Rai Cultura. Alessandro Bogliolo profesor je koji na Sveučilištu u Urbinu poučava sustave za obradu informacija, <a href="/ambassadors?country_iso=IT" target="_blank">ambasador je Europskog tjedna programiranja u Italiji</a>, koordinator je svih ambasadora i član je Upravnog odbora Koalicije za digitalne vještine i radna mjesta. ',
        3 => 'Ako želite više aktivnosti bez struje ili aktivnosti u različitim programskim jezicima, robotici, micro:bit itd., pogledajte <a href="/training">“Materijale za učenje” u Europskom tjednu programiranja</a> s video tečajevima i nastavnim planovima za osnovne i srednje škole. Bacite pogled i na stranicu s materijalima za Europski tjedan programiranja za <a href="/resources/learn">učenike</a> i <a href="/resources/teach">učitelje</a>. '
    ]
];