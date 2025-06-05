<?php

return [
    'title' => 'Coding@Home',
    'questions' => 'Vprašanja',
    'material' => [
        'required' => 'Potreben material',
        'chequered' => 'plošča s kvadratki',
        'footprint' => 'ploščice s stopinjami',
    ],
    'intro' => [
        'title' => 'Uvod v Coding@Home',
    ],
    'explorer' => [
        'title' => 'Raziskovalec',
        'text' => 'Raziskovalec je prva aktivnost Coding@Home. Raziskovalca po plošči premikajte do cilja tako, da obiščete kar največ kvadratov.',
        'questions' => [
            'content' => [
                1 => 'V1. Je možno, da raziskovalec obišče vsa polja na plošči, če sta njegova začetni in končni položaj takšna, kot je prikazano na videu?',
                2 => 'V2. Kateri začetni in končni položaj raziskovalcu preprečuje obisk največjega števila polj na plošči?',
            ],
        ],
    ],

    'right-and-left' => [
        'title' => 'Desno in levo',
        'text' => 'Desno in levo je igra tekmovanja in sodelovanja. Dve ekipi sodelujeta, da ustvarita pot proti cilju, hkrati pa med seboj tekmujeta, da uporabita kar največ dodeljenih ploščic: rumena ekipa poskuša vstaviti kar največ zavojev v levo, rdeča pa v desno.',
        'questions' => [
            'content' => [
                1 => 'V1. Kateri začetek in konec, postavljen kot v prvi tekmi v tem videu, je možen, da zmaga ena od ekip?',
                2 => 'V2. Bi lahko prišlo do izenačenja, če bi bila začetek in konec postavljena tako kot v igri, v kateri je zmagala Anna?',
                3 => 'V3. Obstajajo začetne in končne postavitve, pri katerih ima več možnosti ena od obeh ekip?',
                4 => 'V4. Ali je glede na položaj začetka in konca mogoče predvideti, kakšna bo razlika med ekipo, ki zmaguje, in ekipo, ki izgublja?',
            ],
        ],
    ],

    'keep-off-my-path' => [
        'title' => 'Ne hodi po moji poti',
        'text' => 'Ne hodi po moji poti je tekmovalna igra z dvema ekipama. Ekipi začneta igro na nasprotni strani plošče in gradita poti, ki ovirata druga drugo. Zmaga ekipa, ki drugi preprečiti gradnjo poti.',
        'questions' => [
            'content' => [
                1 => 'V1. Obstajajo začetni položaji, pri katerih ima več možnosti ena od obeh ekip?',
                2 => 'V2. Lahko pride do izenačenja?',
                3 => 'V3. Ima igralec, ki začne prvi, prednost?',
                4 => 'V4. Obstaja zanesljiva strategija igre, ki jo lahko izkoristi igralec, ki začne, in tako poskrbi za to, da nikoli ne izgubi?',
            ],
        ],
    ],

    'tug-of-war' => [
        'title' => 'Vlečenje vrvi',
        'text' => 'Vlečenje vrvi je sodelovalna in tekmovalna igra. Začne se na sredini spodnjega dela plošče, ekipi (rumena in rdeča) pa sodelujeta, da skupaj dosežeta vrh. Rumena ekipa poskuša doseči polja na levi, rdeča ekipa pa polja na desni.',
        'questions' => [
            'content' => [
                1 => 'V1. Obstaja strategija, ki bo vedno prinesla zmago?',
                2 => 'V2. Ima igralec, ki začne prvi, prednost?',
                3 => 'V3. Če sta dva igralca enako pozorna, ali se igra vedno konča izenačeno, tj. na sredini?',
            ],
        ],
    ],

    'explorer-without-footprints' => [
        'title' => 'Raziskovalec brez stopinj',
        'text' => 'Raziskovalec hodi po plošči od začetne točke do cilja in poskuša obiskati vsa polja. Med hojo raziskovalec pušča raznobarvne stopinje, ki omogočajo robotu, da sledi korakom z interpretiranjem barv. Igra postane še bolj zanimiva, ko raziskovalec umakne stopinje in pusti samo barve.',
        'material' => 'in rdeče, rumene ter sive oznake (ali svinčniki).',
        'questions' => [
            'content' => [
                1 => 'V1. Kakšna je razlika me ploščo, polno raznobarvnih stopinj in tisto, ki vsebuje barve, ne pa tudi stopinj?',
                2 => 'V2. Katera plošča omogoča več svobodnega gibanja, če ohranimo enaka pravila za obračanje, kot jih določajo barve?',
                3 => 'V3. Ali obstajajo poti na plošči z barvami, ki niso možne na plošči z raznobarvnimi stopinjami?',
                4 => 'V4. Ali obstajajo poti na plošči z raznobarvnimi stopinjami, ki niso možne na plošči z barvami?',
            ],
        ],
    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Hodi čim dlje',
        'text' => 'Cilj te igre je, da čim dlje ostaneš na igralni plošči, tako da namesto stopinj uporabljaš barve. Z več svobode gibanja se težavnost igre stopnjuje.',
        'coloured-cards' => 'barvni kartončki ali rdeči, rumeni in sivi flomaster',
        'questions' => [
            'content' => [
                1 => 'V1: Kdaj se poti križata in druga drugo blokirata?',
                2 => 'V2: Igra je predstavljena kot igra za dve osebi. Ali je igro mogoče igrati s 3 ali 4 igralci? Ali je treba pravila igre spremeniti?',
            ],
        ],
    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles in Roby',
        'text' => 'Zgodba Ade Lovelace in Charlesa Babbagea je zelo zanimiva. Računalnike sta zasnovala in programirala že sto let, preden so bili izumljeni',
        'material' => 'glina in kratek svinčnik',
        'questions' => [
            'content' => [
                1 => 'V1: Predstavljaj si, da se robot, ki si ga izdelal iz gline za modeliranje in svinčnika, premika po igralni plošči in da lahko doseže katero koli točko ter, če je treba, označi opravljeno pot. S katerimi ukazi bi ga programiral/-a?',
            ],
        ],
    ],

    'cody-and-roby' => [
        'title' => 'Cody in Roby',
        'text' => 'To je igra vlog, v kateri sodelujeta programer Cody in robot Roby. V videoposnetku so predstavljeni kartončki CodyRoby, ki jih bomo odslej uporabljali za določanje premikov po igralni plošči. Cody z uporabo kartončkov Robyju daje ukaze za premikanje po igralni plošči',
        'material' => 'igralna plošča z oznakami, kartončki z ukazi (levo, desno, naravnost) in žetoni, ki jih postavimo na igralno ploščo',
        'starter-kit' => 'Začetni paket CodyRoby',
        'questions' => [
            'content' => [
                1 => 'V1: Kam prispe Roby, če se obrnjen proti jugu nahaja na poziciji C2 in izvrši zadnje zaporedje ukazov, prikazano v videoposnetku?',
                2 => 'V2: Ali bi lahko premike, ki jih Roby izvede na podlagi zadnjega zaporedja ukazov, prikazanega v videoposnetku, opisali z uporabo ukazov CodyFeet in CodyColor na igralni plošči?',
                3 => 'V3: Barvni kartončki zelene, rdeče in rumene barve sestavljajo nabor treh vrst ukazov, ki si jih spoznal v videoposnetku, s katerimi lahko Robyja pripeljemo do katere koli točke na igralni plošči. Ali lahko oblikuješ nabor ukazov, sestavljen iz manj kot 3 ukazov, s katerim bi dosegel isto?',
            ],
        ],
    ],

    'the-tourist' => [
        'title' => 'Turist',
        'text' => 'Od dveh ekip, ki tekmujeta med seboj, zmaga tista, ki s pomočjo kartončkov CodyRoby v najkrajšem možnem času oblikuje zaporedje ukazov, ki bo turista pripeljalo do želenih znamenitosti na igralni plošči',
        'material' => 'Večji kartončki so primerni za igro na tleh',
        'questions' => [
            'content' => [
                1 => 'V1: Katero zaporedje ukazov bi turista v prvem primeru, prikazanem v videoposnetku, pripeljalo do Rafaelovega spomenika?',
                2 => 'V2: Katero zaporedje ukazov bi turista v drugem primeru, prikazanem v videoposnetku, pripeljalo do vogalnih stolpičev Vojvodske palače?',
                3 => 'V3: Ali se lahko domisliš zabavnega načina telesne vadbe, ki jo morata ekipi opraviti vsakič, ko izbereta dodatni kartonček za program? Pomisli na štafeto, prikazano v videoposnetku, in poišči rešitev',
            ],
        ],
    ],

    'material2' => [
        'chequered-with-labels' => 'kvadratno mrežo z označenimi polji',
        'cards' => '24  kart „pojdi naravnost“, 8  kart „obrni se v levo“ in 8  kart „obrni se v desno“',
        'larger-cards' => 'Pri talni različici igre se priporoča uporaba večjih kart',
        'video' => 'V videu je prikazano tudi, kako igrati brez igralnih kart',
        'pieces-of-paper' => 'Potrebujete tudi 24  koščkov papirja, ki jih položite na že obiskana polja',
        'card-alternative' => 'Namesto igralnih kart CodyRoby lahko uporabite ikone kart, ki so na voljo tukaj',
        'small-drawings' => 'Lahko uporabite sličice kot dodatek pri pripovedovanju zgodbe. Te, ki smo jih uporabili v videu, so na voljo tukaj',
        'rest-of-cards' => 'Za ostalo smo uporabili karte CodyRoby, CodyFeet ali CodyColour.',
    ],

    'catch-the-robot' => [
        'title' => 'Ujemi robota',
        'text' => 'Ujemi robota je tekmovalna namizna ali talna igra. Zmaga tisti igralec, ki ujame robota nasprotne ekipe tako, da doseže njegovo polje. Zaradi naključne porazdelitve igralnih kart morata obe ekipi ves čas prilagajati svojo strategijo.',
        'questions' => [
            'content' => [
                1 => 'V1: Če je rožnata figura (Roby) na osrednjem polju  C3 obrnjena proti severu, rožnata ekipa pa ima dve  karti „pojdi naravnost“, dve karti „obrni se v levo“ in eno karto „obrni se v desno“, na katera polja se lahko figura premakne?',
            ],
        ],
    ],

    'the-snake' => [
        'title' => 'Kača',
        'text' => 'Kača je vrsta igre za enega igralca, ki se igra s kartami CodyRoby. Cilj igre je voditi kačo prek vseh polj na igralni plošči, ne da bi se kača pri tem ugriznila v rep.',
        'questions' => [
            'content' => [
                1 => 'V1: Ali obstaja začetno polje, s katerega bi bilo nemogoče obiskati vsa polja, ne da bi se kača pri tem ugriznila v rep?',
            ],
        ],
    ],

    'storytelling' => [
        'title' => 'Pripovedovanje zgodb',
        'text' => 'Današnja tema je pripovedovanje zgodb! Uporabite navodila CodyRoby, sledi CodyFeet ali barve CodyColour in vodite figure po igralni plošči, da pripovedujete zgodbo. Naključno razvrstite dele zgodbe po igralni plošči.',
        'questions' => [
            'content' => [
                1 => 'V1: Katero orodje je najpriročnejše za vodenje Robyja pri pripovedovanju zgodbe?',
                2 => 'V2: Ali lahko dele zgodbe razporedite po igralni plošči tako, da ni mogoče vseh pobrati s kartami CodyFeet?',
            ],
        ],
    ],

    'two-snakes' => [
        'title' => 'Kači',
        'text' => 'Z uporabo kart CodyRoby se kači premikata po igralni plošči in, pri tem poskušata ovirati druga drugo. Osnovno pravilo je zelo preprosto: ne morete se vrniti na polje, ki ga je kača že obiskala. Zmaga kača, ki se lahko najdlje prosto premika naokrog.',
        'material' => 'Karte CodyRoby, igralna plošča 5 × 5, figurici in koščki papirja za označevanje že obiskanih polj.',
        'questions' => [
            'content' => [
                1 => 'V1. Če pri začetni postavitvi, prikazani v videoposnetku, igralca ne izvlečeta rumenih kart za obrat na levo, kateri karti bi morala izvleči?',
            ],
        ],
    ],

    'round-trip' => [
        'title' => 'Tja in nazaj',
        'text' => 'Ekipi se izmenjujeta. Prva začrta odhodno potovanje, druga pa mora Robyja pripeljati nazaj na začetni položaj. Zdi se preprosto, vendar ni, zlasti če poteze načrtujete samo v glavi, ne da bi dejansko premikali Robyja...',
        'material' => 'Karte CodyRoby, igralna plošča 5 × 5, figurici in koščki papirja za označevanje že obiskanih polj.',
        'questions' => [
            'content' => [
                1 => 'V1. Ali je lahko program, ki pripelje Robyja nazaj na začetni položaj, krajši (tj. sestavljen iz manj ukazov) kot program za odhodno potovanje?',
            ],
        ],
    ],

    'meeting-point' => [
        'title' => 'Točka srečanja',
        'text' => 'Tokrat svoje poteze načrtujemo, še preden začnemo. Ekipi razporedita karte po mizi, da ustvarita niz ukazov, s katerimi bosta premikali svojega robota, vendar ga začneta premikati šele, ko eden od igralcev reče „Start!“ V tem trenutku se programiranje konča in začne se akcija. Igralec, ki je rekel „Start!“, zmaga samo, če robota, ki izvajata ukaze svojih ekip, končata na istem polju.',
        'material' => 'Karte CodyRoby, igralna plošča 5 × 5, figurici.',
        'questions' => [
            'content' => [
                1 => 'V1. Če je po vašem mnenju mogoče, da se robota nikoli ne srečata, si izmislite pravila igre, ki bodo zajela vse mogoče položaje.',
            ],
        ],
    ],

    'follow-the-music' => [
        'title' => 'Sledi glasbi',
        'text' => 'Kadar se zaporedja programskih ukazov od časa do časa ponovijo, se zdi, kot da imajo ritem. Če zvok povežemo s posameznim ukazom, lahko Robyja usmerjamo z glasbo. Točno to bomo storili tokrat. Za vas bom ustvaril program, pri čemer bom uporabil različne zvoke, ki bodo predstavljali različne ukaze, vi pa boste Robyja premikali po igralni plošči z upoštevanjem teh zvočnih ukazov.',
        'material' => 'Poleg tega, da potrebujemo karte CodyRoby, igralno ploščo in figurico, moramo ustvariti tri različne zvoke. Jaz sem uporabil tri kozarce, v katerih je različna količina vode. Kaj pa boste uporabili vi?',
        'questions' => [
            'content' => [
                1 => 'V1. Poskusite slediti videoposnetku, pri tem pa naj vas vodijo zvoki kozarcev, ne da bi gledali karte. Ali lahko prepoznate in izvedete ukaze, ki jih ustvarjajo zvoki?',
                2 => 'V2. Izberite tri zvoke in jih povežite s tremi osnovnimi ukazi. Izmislite si zaporedje zvokov, ki bi jih lahko stalno ponavljali, ne da bi Roby zašel z igralne plošče...',
            ],
        ],
    ],

    'colour-everything' => [
        'title' => 'Pobarvaj vse',
        'text' => 'Lahko robote vodimo po plošči tako, da bodo s svojimi sledmi ustvarili risbo? Pri tej dejavnosti se igramo s programiranjem in umetnostjo slikovnih pik, pri čemer se ustvarjajo slike z obarvanjem polj na kvadratni mreži, kot so slikovne pike na zaslonu.',
        'material' => 'Karte CodyRoby, kvadratna mreža in figura. Za barvanje polj uporabite koščke papirja, ki jih boste položili na polja, ali pobarvajte polja z markerji',
        'questions' => [
            'content' => [
                1 => 'Ali je mogoče narisati dve srci kot v zadnjem delu videa z vodenjem robota po vseh potrebnih poljih, ne da bi isto polje prečkal dvakrat?',
            ],
        ],
    ],

    'codyplotter-and-codyprinter' => [
        'title' => 'Risalnik Cody and tiskalnik Cody',
        'text' => 'Kakšna je razlika med risalnikom in tiskalnikom? To boste izvedeli pri tej dejavnosti programiranja brez računalnika.',
        'material' => 'poleg kompleta CodyRoby sem uporabil zeleni marker in novega robota iz modelirne mase, ampak to ni nujno.',
        'questions' => [
            'content' => [
                1 => 'Lahko pojasnite razliko med risalnikom in tiskalnikom?',
                2 => 'Kakšno sliko bi tiskalnik Roby ustvaril s premikanjem po črtah na plošči, če bi izvedel zaporedje ukazov, narekovano ob koncu videa?',
            ],
        ],
    ],

    'boring-pixels' => [
        'title' => 'Dolgočasne slikovne pike!/Uporaba številk',
        'text' => 'Ko dajemo Robyju navodila za oblikovanje slike kvadrat za kvadratom, slikovno piko za slikovno piko, opazimo, da lahko, kadar je več kvadratov v vrsti iste barve, uporabimo številke, da je bolj zanimivo. Računalniki počnejo isto...',
        'material' => 'karirast zvezek ali kvadratna mreža 5 X 5, narisana na papirju, flomaster. Za prikaz kode risbe lahko uporabite pisalo in papir.',
        'questions' => [
            'content' => [
                1 => 'Poskusite ustvariti karirasto sliko in jo prikazati s kodiranjem s pomočjo zaporedij (RLE). Velikost slike je enakovredna številu kvadratov, kako velik pa je njen prikaz RLE?',
            ],
        ],
    ],

    'turning-code-into-pictures' => [
        'title' => 'Spreminjanje kode v slike',
        'text' => [
            1 => 'Videli smo, da lahko ustvarimo kodo, s katero bomo lahko narisali sliko. Pomislil sem na risbo in uporabil kodo, da bi jo pretvoril v črke in številke, ki sem vam jih dal. Oglejte si črke in številke ter uporabite kodo za rekonstrukcijo risbe.',
            2 => 'To je slika, ki sem jo imel v mislih, naj se prikaže v vašem zvezku in zvezkih vseh, ki poznajo kodo!',
        ],
        'material' => 'papir (po možnosti karirast) in pisalo.',
        'questions' => [
            'content' => [
                1 => 'Poskusite dekodirati in narisati slike, ki sem jih omenil na začetku videa.',
            ],
        ],
    ],

    'texts' => [
        1 => 'Coding@Home je zbirka kratkih videov, gradiv za »naredi-si-sam«, ugank, iger in izzivov s področja programiranja za vsakdanjo uporabo doma in v šoli. Za izvajanje aktivnosti ne potrebujete predhodnega znanja ali elektronskih naprav. Spodbujale bodo računalniško razmišljanje in razvijale veščine učencev, staršev in učiteljev tako doma kot v šoli.',
        2 => 'Serija Coding@Home evropskega tedna programiranja gradi na pobudi <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> Univerze v Urbinu in Zveze CodeMOOCnet v sodelovanju s programom Rai Cultura. Alessandro Bogliolo je profesor za sisteme za obdelavo podatkov na Univerzi v Urbinu, <a href="/ambassadors?country_iso=IT" target="_blank">ambasador italijanskega evropskega tedna programiranja</a> in koordinator vseh ambasadorjev ter član upravnega odbora Koalicije za digitalne veščine in delovna mesta. ',
        3 => 'Če vas zanimajo še druge „unplugged“ dejavnosti (brez tehnologije) ali dejavnosti v različnih programskih jezikih, robotiki, z uporabo micro:bita, si oglejte serijo  <a href="/training">EU Code Week Learning Bits</a> ki vključuje video vodiče in učne načrte za osnovne in srednje šole. Prav tako obiščite stran EU Code Week Learn&Teach, kjer boste našli brezplačne, kakovostne vire z vsega sveta za učitelje in učence.',
    ],

    'coding-at-home-text' => 'Zbirka kratkih videov, materialov za samostojno delo, ugank, iger in programerskih izzivov za vsakdanjo uporabo v družini in v šoli.',
    'coding-at-home-sub-text1' => 'Serija Coding@Home v okviru evropskega tedna programiranja (EU Code Week) temelji na pobudi „<a class="text-dark-blue underline" href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">Coding in famiglia“</a> Univerze v Urbinu in združenja CodeMOOCnet v sodelovanju z Rai Cultura. Avtor videov Coding@Home je Alessandro Bogliolo, profesor sistemov za obdelavo informacij na Univerzi v Urbinu, <a class="text-dark-blue underline" href="https://codeweek.eu/ambassadors?country_iso=IT" target="_blank">italijanski ambasador EU Code Week </a> in koordinator vseh ambasadorjev, pa tudi član upravnega odbora koalicije Digital Skills and Jobs.',
    'coding-at-home-sub-text2' => 'Za izvajanje dejavnosti ne potrebujete predhodnega znanja ali elektronskih naprav. Dejavnosti spodbujajo računalniško mišljenje in razvijajo veščine učencev, staršev in učiteljev – tako doma kot v šoli.',
];
