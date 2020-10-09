<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Vprašanja',
    'material' => [
        "required" => "Potreben material",
        "chequered" => "plošča s kvadratki",
        "footprint" => "ploščice s stopinjami"
    ],
    'intro' => [
        'title' => 'Uvod v Coding@Home',
    ],
    'explorer' => [
        'title' => 'Raziskovalec',
        'text' => 'Raziskovalec je prva aktivnost Coding@Home. Raziskovalca po plošči premikajte do cilja tako, da obiščete kar največ kvadratov.',
        'questions' => [
            'content' =>
                [
                    1 => 'V1. Je možno, da raziskovalec obišče vsa polja na plošči, če sta njegova začetni in končni položaj takšna, kot je prikazano na videu?',
                    2 => 'V2. Kateri začetni in končni položaj raziskovalcu preprečuje obisk največjega števila polj na plošči?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Desno in levo',
        'text' => 'Desno in levo je igra tekmovanja in sodelovanja. Dve ekipi sodelujeta, da ustvarita pot proti cilju, hkrati pa med seboj tekmujeta, da uporabita kar največ dodeljenih ploščic: rumena ekipa poskuša vstaviti kar največ zavojev v levo, rdeča pa v desno.',
        'questions' => [
            'content' =>
                [
                    1 => 'V1. Kateri začetek in konec, postavljen kot v prvi tekmi v tem videu, je možen, da zmaga ena od ekip?',
                    2 => 'V2. Bi lahko prišlo do izenačenja, če bi bila začetek in konec postavljena tako kot v igri, v kateri je zmagala Anna?',
                    3 => 'V3. Obstajajo začetne in končne postavitve, pri katerih ima več možnosti ena od obeh ekip?',
                    4 => 'V4. Ali je glede na položaj začetka in konca mogoče predvideti, kakšna bo razlika med ekipo, ki zmaguje, in ekipo, ki izgublja?'
                ]

        ]

    ],


    'keep-off-my-path' => [
        'title' => 'Ne hodi po moji poti',
        'text' => 'Ne hodi po moji poti je tekmovalna igra z dvema ekipama. Ekipi začneta igro na nasprotni strani plošče in gradita poti, ki ovirata druga drugo. Zmaga ekipa, ki drugi preprečiti gradnjo poti.',
        'questions' => [
            'content' =>
                [
                    1 => 'V1. Obstajajo začetni položaji, pri katerih ima več možnosti ena od obeh ekip?',
                    2 => 'V2. Lahko pride do izenačenja?',
                    3 => 'V3. Ima igralec, ki začne prvi, prednost?',
                    4 => 'V4. Obstaja zanesljiva strategija igre, ki jo lahko izkoristi igralec, ki začne, in tako poskrbi za to, da nikoli ne izgubi?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Vlečenje vrvi',
        'text' => 'Vlečenje vrvi je sodelovalna in tekmovalna igra. Začne se na sredini spodnjega dela plošče, ekipi (rumena in rdeča) pa sodelujeta, da skupaj dosežeta vrh. Rumena ekipa poskuša doseči polja na levi, rdeča ekipa pa polja na desni.',
        'questions' => [
            'content' =>
                [
                    1 => 'V1. Obstaja strategija, ki bo vedno prinesla zmago?',
                    2 => 'V2. Ima igralec, ki začne prvi, prednost?',
                    3 => 'V3. Če sta dva igralca enako pozorna, ali se igra vedno konča izenačeno, tj. na sredini?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'Raziskovalec brez stopinj',
        'text' => 'Raziskovalec hodi po plošči od začetne točke do cilja in poskuša obiskati vsa polja. Med hojo raziskovalec pušča raznobarvne stopinje, ki omogočajo robotu, da sledi korakom z interpretiranjem barv. Igra postane še bolj zanimiva, ko raziskovalec umakne stopinje in pusti samo barve.',
        'material' => 'in rdeče, rumene ter sive oznake (ali svinčniki).',
        'questions' => [
            'content' =>
                [
                    1 => 'V1. Kakšna je razlika me ploščo, polno raznobarvnih stopinj in tisto, ki vsebuje barve, ne pa tudi stopinj?',
                    2 => 'V2. Katera plošča omogoča več svobodnega gibanja, če ohranimo enaka pravila za obračanje, kot jih določajo barve?',
                    3 => 'V3. Ali obstajajo poti na plošči z barvami, ki niso možne na plošči z raznobarvnimi stopinjami?',
                    4 => 'V4. Ali obstajajo poti na plošči z raznobarvnimi stopinjami, ki niso možne na plošči z barvami?'
                ]

        ]

    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Hodi čim dlje',
        'text' => 'Cilj te igre je, da čim dlje ostaneš na igralni plošči, tako da namesto stopinj uporabljaš barve. Z več svobode gibanja se težavnost igre stopnjuje.',
        'coloured-cards' => "barvni kartončki ali rdeči, rumeni in sivi flomaster",
        'questions' => [
            'content' =>
                [
                    1 => 'V1: Kdaj se poti križata in druga drugo blokirata?',
                    2 => 'V2: Igra je predstavljena kot igra za dve osebi. Ali je igro mogoče igrati s 3 ali 4 igralci? Ali je treba pravila igre spremeniti?',
                ]

        ]

    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles in Roby',
        'text' => 'Zgodba Ade Lovelace in Charlesa Babbagea je zelo zanimiva. Računalnike sta zasnovala in programirala že sto let, preden so bili izumljeni',
        'material' => 'glina in kratek svinčnik',
        'questions' => [
            'content' =>
                [
                    1 => 'V1: Predstavljaj si, da se robot, ki si ga izdelal iz gline za modeliranje in svinčnika, premika po igralni plošči in da lahko doseže katero koli točko ter, če je treba, označi opravljeno pot. S katerimi ukazi bi ga programiral/-a?'
                ]

        ]

    ],

    'cody-and-roby' => [
        'title' => 'Cody in Roby',
        'text' => 'To je igra vlog, v kateri sodelujeta programer Cody in robot Roby. V videoposnetku so predstavljeni kartončki CodyRoby, ki jih bomo odslej uporabljali za določanje premikov po igralni plošči. Cody z uporabo kartončkov Robyju daje ukaze za premikanje po igralni plošči',
        'material' => 'igralna plošča z oznakami, kartončki z ukazi (levo, desno, naravnost) in žetoni, ki jih postavimo na igralno ploščo',
        'starter-kit' => 'Začetni paket CodyRoby',
        'questions' => [
            'content' =>
                [
                    1 => 'V1: Kam prispe Roby, če se obrnjen proti jugu nahaja na poziciji C2 in izvrši zadnje zaporedje ukazov, prikazano v videoposnetku?',
                    2 => 'V2: Ali bi lahko premike, ki jih Roby izvede na podlagi zadnjega zaporedja ukazov, prikazanega v videoposnetku, opisali z uporabo ukazov CodyFeet in CodyColor na igralni plošči?',
                    3 => 'V3: Barvni kartončki zelene, rdeče in rumene barve sestavljajo nabor treh vrst ukazov, ki si jih spoznal v videoposnetku, s katerimi lahko Robyja pripeljemo do katere koli točke na igralni plošči. Ali lahko oblikuješ nabor ukazov, sestavljen iz manj kot 3 ukazov, s katerim bi dosegel isto?',
                ]

        ]

    ],

    'the-tourist' => [
        'title' => 'Turist',
        'text' => 'Od dveh ekip, ki tekmujeta med seboj, zmaga tista, ki s pomočjo kartončkov CodyRoby v najkrajšem možnem času oblikuje zaporedje ukazov, ki bo turista pripeljalo do želenih znamenitosti na igralni plošči',
        'material' => 'Večji kartončki so primerni za igro na tleh',
        'questions' => [
            'content' =>
                [
                    1 => 'V1: Katero zaporedje ukazov bi turista v prvem primeru, prikazanem v videoposnetku, pripeljalo do Rafaelovega spomenika?',
                    2 => 'V2: Katero zaporedje ukazov bi turista v drugem primeru, prikazanem v videoposnetku, pripeljalo do vogalnih stolpičev Vojvodske palače?',
                    3 => 'V3: Ali se lahko domisliš zabavnega načina telesne vadbe, ki jo morata ekipi opraviti vsakič, ko izbereta dodatni kartonček za program? Pomisli na štafeto, prikazano v videoposnetku, in poišči rešitev',
                ]

        ]

    ],

    'material2' => [
        "chequered-with-labels" => "kvadratno mrežo z označenimi polji",
        "cards" => "24  kart „pojdi naravnost“, 8  kart „obrni se v levo“ in 8  kart „obrni se v desno“",
        "larger-cards" => "Pri talni različici igre se priporoča uporaba večjih kart",
        "video" => "V videu je prikazano tudi, kako igrati brez igralnih kart",
        "pieces-of-paper" => "Potrebujete tudi 24  koščkov papirja, ki jih položite na že obiskana polja",
        "card-alternative" => "Namesto igralnih kart CodyRoby lahko uporabite ikone kart, ki so na voljo tukaj",
        "small-drawings" => "Lahko uporabite sličice kot dodatek pri pripovedovanju zgodbe. Te, ki smo jih uporabili v videu, so na voljo tukaj",
        "rest-of-cards" => "Za ostalo smo uporabili karte CodyRoby, CodyFeet ali CodyColour."
    ],


    'catch-the-robot' => [
        'title' => "Ujemi robota",
        'text' => "Ujemi robota je tekmovalna namizna ali talna igra. Zmaga tisti igralec, ki ujame robota nasprotne ekipe tako, da doseže njegovo polje. Zaradi naključne porazdelitve igralnih kart morata obe ekipi ves čas prilagajati svojo strategijo.",
        'questions' => [
            'content' =>
                [
                    1 => "V1: Če je rožnata figura (Roby) na osrednjem polju  C3 obrnjena proti severu, rožnata ekipa pa ima dve  karti „pojdi naravnost“, dve karti „obrni se v levo“ in eno karto „obrni se v desno“, na katera polja se lahko figura premakne?",
                ]

        ]

    ],

    'the-snake' => [
        'title' => "Kača",
        'text' => "Kača je vrsta igre za enega igralca, ki se igra s kartami CodyRoby. Cilj igre je voditi kačo prek vseh polj na igralni plošči, ne da bi se kača pri tem ugriznila v rep.",
        'questions' => [
            'content' =>
                [
                    1 => "V1: Ali obstaja začetno polje, s katerega bi bilo nemogoče obiskati vsa polja, ne da bi se kača pri tem ugriznila v rep?",
                ]

        ]

    ],

    'storytelling' => [
        'title' => "Pripovedovanje zgodb",
        'text' => "Današnja tema je pripovedovanje zgodb! Uporabite navodila CodyRoby, sledi CodyFeet ali barve CodyColour in vodite figure po igralni plošči, da pripovedujete zgodbo. Naključno razvrstite dele zgodbe po igralni plošči.",
        'questions' => [
            'content' =>
                [
                    1 => "V1: Katero orodje je najpriročnejše za vodenje Robyja pri pripovedovanju zgodbe?",
                    2 => "V2: Ali lahko dele zgodbe razporedite po igralni plošči tako, da ni mogoče vseh pobrati s kartami CodyFeet?",
                ]

        ]

    ],



    'texts' => [
        1 => 'Coding@Home je zbirka kratkih videov, gradiv za »naredi-si-sam«, ugank, iger in izzivov s področja programiranja za vsakdanjo uporabo doma in v šoli. Za izvajanje aktivnosti ne potrebujete predhodnega znanja ali elektronskih naprav. Spodbujale bodo računalniško razmišljanje in razvijale veščine učencev, staršev in učiteljev tako doma kot v šoli.',
        2 => 'Serija Coding@Home evropskega tedna programiranja gradi na pobudi <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> Univerze v Urbinu in Zveze CodeMOOCnet v sodelovanju s programom Rai Cultura. Alessandro Bogliolo je profesor za sisteme za obdelavo podatkov na Univerzi v Urbinu, <a href="/ambassadors?country_iso=IT" target="_blank">ambasador italijanskega evropskega tedna programiranja</a> in koordinator vseh ambasadorjev ter član upravnega odbora Koalicije za digitalne veščine in delovna mesta. ',
        3 => 'Če vas zanimajo še druge aktivnosti brez računalnika ali aktivnosti v različnih programskih jezikih, robotika, micro:bit itn. si oglejte <a href="/training">»Učne drobce« evropskega tedna programiranja</a> z video vadnicami in načrti učnih ur za osnovne in srednje šole. Oglejte si tudi stran evropskega tedna programiranja z viri za <a href="/resources/learn">učence</a> in <a href="/resources/teach">učitelje</a>. '
    ]
];