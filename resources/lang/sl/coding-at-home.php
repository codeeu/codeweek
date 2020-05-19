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
        'title' => 'Raziskovalec',
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

    'texts' => [
        1 => 'Coding@Home je zbirka kratkih videov, gradiv za »naredi-si-sam«, ugank, iger in izzivov s področja programiranja za vsakdanjo uporabo doma in v šoli. Za izvajanje aktivnosti ne potrebujete predhodnega znanja ali elektronskih naprav. Spodbujale bodo računalniško razmišljanje in razvijale veščine učencev, staršev in učiteljev tako doma kot v šoli.',
        2 => 'Serija Coding@Home evropskega tedna programiranja gradi na pobudi <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> Univerze v Urbinu in Zveze CodeMOOCnet v sodelovanju s programom Rai Cultura. Alessandro Bogliolo je profesor za sisteme za obdelavo podatkov na Univerzi v Urbinu, <a href="/ambassadors?country_iso=IT" target="_blank">ambasador italijanskega evropskega tedna programiranja</a> in koordinator vseh ambasadorjev ter član upravnega odbora Koalicije za digitalne veščine in delovna mesta. ',
        3 => 'Če vas zanimajo še druge aktivnosti brez računalnika ali aktivnosti v različnih programskih jezikih, robotika, micro:bit itn. si oglejte <a href="/training">»Učne drobce« evropskega tedna programiranja</a> z video vadnicami in načrti učnih ur za osnovne in srednje šole. Oglejte si tudi stran evropskega tedna programiranja z viri za <a href="/resources/learn">učence</a> in <a href="/resources/teach">učitelje</a>. '
    ]
];