<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Küsimused',
    'material' => [
        "required" => "Vajalik materjal",
        "chequered" => "ruuduline mängualus",
        "footprint" => "kaardid jalajälje piltidega"
    ],
    'intro' => [
        'title' => 'Sissejuhatus Coding@Home’i',
    ],
    'explorer' => [
        'title' => 'Maadeuurija',
        'text' => '„Maadeuurija“ on sarja Coding@Home esimene tegevus. Liigutage Maadeuurijat laual ringi, et jõuda eesmärgini pärast võimalikult paljude ruutude külastamist.',
        'questions' => [
            'content' =>
                [
                    1 => 'K1. Kas videol näidatud lähte- ja lõpppositsioonide korral saab Maadeuurija külastada kõiki mänguvälja kaste?',
                    2 => 'K2. Millised lähte- ja lõpppositsioonid takistavad Maadeuurijat külastamast suurimat arvu mänguvälja kaste?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Paremale ja vasakule',
        'text' => '„Paremale ja vasakule“ on võistlus- ja koostöömäng. Kaks võistkonda teevad koostööd, tekitades teed eesmärgi poole, samal ajal kui nad võistlevad selle nimel, et kasutada võimalikult palju neile määratud kaarte. Kollane võistkond üritab algatada võimalikult palju pöördeid vasakule ja punane võistkond proovib algatada võimalikult palju pöördeid paremale.',
        'questions' => [
            'content' =>
                [
                    1 => 'K1. Kas ühel kahest võistkonnast on võimalik võita, kui algus ja lõpp on paigutatud nii, nagu selle video esimesel võistlusel?',
                    2 => 'K2. Kas saab tulla viik, kui algus ja lõpp on paigutatud nii, nagu Anna võidetud mängus?',
                    3 => 'K3. Kas on lähte- ja lõpppositsioone, mis annavad eelise ühele kahest võistkonnast?',
                    4 => 'K4. Kas on võimalik ennustada, milline tuleb vahe võitnud ja kaotanud võistkonna vahel, arvestades lähte- ja lõpppositsioonide vahelist asetust?'
                ]
        ]
    ],


    'keep-off-my-path' => [
        'title' => 'Hoidu mu teelt',
        'text' => '"Hoidu mu teelt“ on võistlusmäng kahe võistkonnaga. Alustades mängualuse vastaskülgedest, tekitavad kaks võistkonda teid, mis üksteist takistavad. Võidab meeskond, kes takistab teisel oma teed pikendamast.',
        'questions' => [
            'content' =>
                [
                    1 => 'K1. Kas on lähtepositsioone, mis annavad eelise ühele kahest võistkonnast?',
                    2 => 'K2. Kas saaks tulla viik?',
                    3 => 'K3. Kas esimesena käival mängijal on eelis?',
                    4 => 'K4. Kas on olemas vettpidav mängustrateegia, mida esimesena käiv mängija saab kasutada, et olla kindel, et ta kunagi ei kaota?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Köievedu',
        'text' => '„Köievedu“ on koostöö- ja võistlusmäng. Alustades mängualuse allääre keskelt, tegutsevad kaks võistkonda (kollane ja punane) koos, et jõuda ülaäärele. Kollane võistkond üritab jõuda vasakul olevatesse kastidesse, samal ajal kui punane võistkond üritab jõuda paremal olevatesse kastidesse.',
        'questions' => [
            'content' =>
                [
                    1 => 'K1. Kas on olemas strateegia, mis annab alati tulemuseks võidu?',
                    2 => 'K2. Kas esimesena käival mängijal on eelis?',
                    3 => 'K3. Kas siis, kui kaks mängijat on võrdselt tähelepanelikud, lõpeb mäng alati viigiga, st keskel?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'Maadeuurija ilma jalajälgedeta',
        'text' => 'Maadeuurija kõnnib mängualust mööda lähtepunktist sihtpunkti, püüdes külastada kõiki kaste. Kui maadeuurija  kõnnib, jätab ta värvilisi jälgi, mis võimaldavad robotil värve tõlgendades tema samme järgida. Mäng muutub veelgi intrigeerivamaks, kui maadeavastaja puhastab jalajäljed ära, jättes alles ainult värvid.',
        'material' => 'samuti punased, kollased ja hallid markerid (või pliiatsid)',
        'questions' => [
            'content' =>
                [
                    1 => 'K1. Mis vahe on värvilisi jälgi täis mängualusel ja mängualusel värvidega, kuid ilma jälgedeta?',
                    2 => 'K2. Milline mängualus pakub rohkem liikumisvabadust, säilitades samad pööramisreeglid, mida tähistab värv?',
                    3 => 'K3. Kas värvidega mängualusel on võimalikud teed, mis pole võimalikud värviliste jalajälgedega mängualusel?',
                    4 => 'K4. Kas värviliste jalajälgedega mängualusel on võimalikud teed, mis pole võimalikud ainult värvidega mängualusel?'
                ]

        ]

    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Kõnni võimalikult kaugele',
        'text' => 'Selle mängu puhul tuleb mängulaual püsida võimalikult kaua, kasutades jalajälgede asemel värve. Mäng muutub liikumisvabaduse suurenedes üha raskemaks',
        'coloured-cards' => "värvilised kaardid, st punane, kollane ja hall kaart",
        'questions' => [
            'content' =>
                [
                    1 => 'K1. Millal kaks teed kokku saavad ja teineteist blokeerivad?',
                    2 => 'K2. See mäng on mõeldud kahele mängijale. Kas seda saab mängida ka kolmekesi või neljakesi? Kas me peame selleks reegleid muutma?',
                ]

        ]

    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles ja Roby',
        'text' => 'Ada Lovelace’i ja Charles Babbage’i lugu on huvitav. Nad mõtlesid välja ja programmeerisid arvuti sada aastat enne selle tegelikku leiutamist',
        'material' => 'voolimissavi ja lühike pliiats',
        'questions' => [
            'content' =>
                [
                    1 => 'K1. Püüdke kujutleda, et voolimissavist ja pliiatsist ehitatud robot liigub mööda mängulauda mis tahes kohta ja võib vajadusel sama teed mööda tagasi minna. Milliseid käske te kasutaksite liikumise programmeerimiseks?'
                ]

        ]

    ],

    'cody-and-roby' => [
        'title' => 'Cody ja Roby',
        'text' => 'See on rollimäng, mille tegelased on programmeerija Cody ja robot Roby. Videos tutvustatakse CodyRoby kaarte, mida kasutatakse mängulaual liikumiseks. Cody annab kaartide abil Robyle käske mängulaual liikumiseks',
        'material' => 'ruutudega mängulaud, mis on varustatud siltidega, käsukaartidega (vasakule, paremale, edasi) ja mängunuppudega',
        'starter-kit' => 'CodyRoby stardikomplekt',
        'questions' => [
            'content' =>
                [
                    1 => 'K1. Kuhu jõuab Roby, kui ta väljalt C2 lõuna poole liikudes järgib videos näidatud viimaseid käske?',
                    2 => 'K2. Kas videos näidatud viimaste käskude järgi liikuva Roby liikumisteed saab kirjeldada CodyFeet või CodyColor käskude abil?',
                    3 => 'K3. Videos näidatud kolme liiki käsud, mida väljendavad roheline, punane ja kollane kaart, moodustavad käsustiku, mida järgides saab Roby liikuda mängulaual igale poole. Kas saate sama tegemiseks koostada vähem kui kolmest käsust koosneva käsustiku?',
                ]

        ]

    ],

    'the-tourist' => [
        'title' => 'Turist',
        'text' => 'CodyRoby kaarte kasutades peavad kaks meeskonda leidma võimalikult lühikese aja jooksul käsud, mis juhatavad turisti mängulaual teda huvitavate vaatamisväärsuste juurde',
        'material' => 'Põrandal on parem mängida suuremate kaartidega',
        'questions' => [
            'content' =>
                [
                    1 => 'K1. Millised käsud juhatavad videos näidatud esimese näite puhul turisti Raffaeli kuju juurde?',
                    2 => 'K2. Millised käsud juhatavad videos näidatud teise näite puhul turisti Urbino hertsogilossi juurde?',
                    3 => 'K3. Kas sulle tuleb pähe mõni lõbus harjutus, mida tuleks teha iga kord, kui üks meeskondadest valib kaardi? Selle leidmiseks mõtestage videos näidatud teatevõistlus ümber',
                ]

        ]

    ],

    'material2' => [
        "chequered-with-labels" => "siltidega varustatud ruuduline mängulaud",
        "cards" => "24 „mine otse“ kaarti, 8 „pööra vasakule“ kaarti ja 8 „pööra paremale“ kaarti",
        "larger-cards" => "põrandal mängides on parem kasutada suuremaid kaarte",
        "video" => "Videos selgitatakse ka seda, kuidas mängida ilma kaardipakita",
        "pieces-of-paper" => "Samuti on vaja 24 väikest paberit, mis asetatakse ruutudesse, kus „uss“ on juba olnud",
        "card-alternative" => "CodyRoby kaartide asemel võid kasutada suunakaarte, mille leiad siit",
        "small-drawings" => "Oma loo rääkimisel võid lisaks kasutada väikesi joonistusi. Videos kasutatud joonistusi näed siin",
        "rest-of-cards" => "Muidu aga kasutame CodyRoby, CodyFeet või CodyColour kaarte."
    ],


    'catch-the-robot' => [
        'title' => "Püüa robot kinni!",
        'text' => "„Püüa robot kinni!“ on võistluslik lauamäng, mida saab mängida ka põrandal. Võidab mängija, kes „püüab kinni“ vastasmeeskonna roboti, jõudes ruutu, kus robot asub. Kuna mängukaardid võetakse pakist juhuslikult, peavad mõlemad meeskonnad pidevalt oma strateegiat kohandama.",
        'questions' => [
            'content' =>
                [
                    1 => "K1. Kui roosa mängunupp (Roby) on keskmises ruudus C3 näoga põhja poole ja roosal meeskonnal on 2 „mine otse“ kaarti, 2 „pööra vasakule“ kaarti ja 1 „pööra paremaleׅ“ kaart, siis millisesse ruutu saab ta liikuda?",
                ]

        ]

    ],

    'the-snake' => [
        'title' => "Uss",
        'text' => "„Uss“ on pasjansi-tüüpi mäng, mida mängitakse CodyRoby kaartidega. Mängu eesmärk on juhtida „uss“ läbi mängulaua kõikide ruutude nii, et ta ei hammustaks oma saba.",
        'questions' => [
            'content' =>
                [
                    1 => "K1. Kas on mõni lähtepunkt, kust alustades ei ole võimalik kõiki ruute läbida, ilma et „uss“ hammustaks oma saba?",
                ]

        ]

    ],

    'storytelling' => [
        'title' => "Jutuvestmine",
        'text' => "Tänane teema on jutuvestmine! Kasuta mängulaual nuppude juhtimiseks ja oma loo rääkimiseks CodyRoby mängujuhendit, CodyFeet jalajäljekaarte või CodyColour värvikaarte. Paiguta oma loo erinevad osad mängulauale laiali.",
        'questions' => [
            'content' =>
                [
                    1 => "K1. Milline vahend on Roby juhtimiseks kõige parem, et rääkida oma lugu?",
                    2 => "K2. Kas saad paigutada oma loo osad mängulauale nii, et CodyFeet kaartidega ei oleks võimalik kõikideni jõuda?",
                ]

        ]

    ],


    'texts' => [
        1 => 'Coding@Home on lühikeste videote, isevalmistatavate materjalide, nuputusülesannete, mängude ja põnevate programmeerimisülesannete kogumik igapäevaseks kasutamiseks nii perekonnas kui ka koolis. Nendeks tegevusteks ei vaja te eelnevaid teadmisi ega elektroonilisi seadmeid. Tegevused stimuleerivad arvutuslikku mõtlemist ning arendavad õpilaste, vanemate ja õpetajate oskusi kodus ja koolis.',
        2 => 'ELi programmeerimisnädala Code Week sari Coding@Home põhineb Urbino ülikooli ja ühenduse CodeMOOCnet Association algatusel <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> koostöös Itaalia televisiooni kultuuriosakonnaga. Alessandro Bogliolo on Urbino ülikooli infotöötlussüsteemide professor, <a href="/ambassadors?country_iso=IT" target="_blank">ELi programmeerimisnädala Code Week Itaalia saadik</a> ja kõigi saadikute koordinaator ning digitaalsete oskuste ja töökohtade koalitsiooni juhatuse liige.',
        3 => 'Kui olete huvitatud teistestki elektroonikavabadest tegevustest või tegevustest erinevates programmeerimiskeeltes, robootikast, mikro: bit miniarvuti kiipidest jne, vaadake <a href="/training">ELi programmeerimisnädala Code Week õpivahendeid</a> õppevideote ja tunnikavadega alg-, põhi- ja keskkoolidele. Vaadake ka ELi programmeerimisnädala materjalide lehte <a href="/resources/learn">õppijatele</a> ja <a href="/resources/teach">õpetajatele</a>.'
    ]
];