<?php

return [
    'title' => 'Coding@Home',
    'questions' => 'Pitanja',
    'material' => [
        'required' => 'Potrebni materijal',
        'chequered' => 'kockasta ploča',
        'footprint' => 'kartice s otiscima stopala',
    ],
    'intro' => [
        'title' => 'Uvod u Coding@Home',
    ],
    'explorer' => [
        'title' => 'Istraživač',
        'text' => 'Istraživač je prva aktivnost u zbirci Coding@Home. Istraživača pomičite pločom do cilja tako da posjeti što više polja. ',
        'questions' => [
            'content' => [
                1 => 'P1. Može li istraživač posjetiti sva polja na ploči uz polazište i odredište prikazano u video zapisu?',
                2 => 'P2. Koje polazište i odredište istraživaču ne dopuštaju da posjeti najveći broj polja na ploči?',
            ],
        ],
    ],

    'right-and-left' => [
        'title' => 'Udesno i ulijevo',
        'text' => 'Udesno i ulijevo je natjecateljska i suradnička igra. Dvije ekipe surađuju kako bi izgradile put do odredišta i istovremeno se natječu pokušavajući iskoristiti što više kartica koje su im dodijeljene: žuta ekipa pokušava staviti što više skretanja ulijevo, a crvena ekipa pokušava staviti što više skretanja udesno.',
        'questions' => [
            'content' => [
                1 => 'P1. Može li jedna od dviju ekipa pobijediti ako su polazište i odredište postavljeni kao u prvoj igri u ovom video zapisu?',
                2 => 'P2. Može li igra završiti neriješeno ako su polazište i odredište postavljeni kao u igri u kojoj je pobijedila Anna?',
                3 => 'P3. Postoje li položaji polazišta i odredišta koji idu u prilog jednoj od dviju ekipa?',
                4 => 'P4. Može li se ovisno o rasporedu polazišta i odredišta predvidjeti kolika će biti razlika između pobjedničke i gubitničke ekipe?',
            ],
        ],
    ],

    'keep-off-my-path' => [
        'title' => 'Miči mi se s puta',
        'text' => 'Miči mi se s puta natjecateljska je igra za dvije ekipe. Počevši na suprotnim krajevima ploče dvije ekipe grade putove kojima ometaju jedni druge. Pobjeđuje ekipa koja spriječi drugu u širenju puta.',
        'questions' => [
            'content' => [
                1 => 'P1. Postoje li polazišta koja idu u prilog jednoj od dviju ekipa?',
                2 => 'P2. Je li moguć neriješen rezultat?',
                3 => 'P3. Je li u prednosti igrač koji igra prvi?',
                4 => 'P4. Postoji li sigurna strategija kojom se može poslužiti igrač koji igra prvi kako bi bio siguran da nikad neće izgubiti?',
            ],
        ],
    ],

    'tug-of-war' => [
        'title' => 'Potezanje užeta',
        'text' => 'Potezanje užeta suradnička je i natjecateljska igra. Počevši od središta na dnu ploče dvije ekipe (žuta i crvena) surađuju kako bi došle do vrha. Žuta ekipa pokušava dosegnuti polja na lijevoj strani, dok crvena ekipa pokušava dosegnuti polja na desnoj strani.',
        'questions' => [
            'content' => [
                1 => 'P1. Postoji li strategija koja će uvijek dovesti do pobjede?',
                2 => 'P2. Je li u prednosti igrač koji igra prvi?',
                3 => 'P3. Ako su oba igrača jednako pažljiva, hoće li igra uvijek završiti neriješeno, tj. u središtu?',
            ],
        ],
    ],

    'explorer-without-footprints' => [
        'title' => 'Istraživač bez tragova',
        'text' => 'Istraživač hoda pločom od polazišta do cilja i pokušava posjetiti sva polja. Istraživač hodajući iza sebe ostavlja obojene otiske stopala po kojima ih robot slijedi tumačeći boje. Igra postaje još intrigantnija kad istraživač obriše otiske stopala i ostavi samo boje.',
        'material' => 'žuti i sivi flomasteri (ili bojice).',
        'questions' => [
            'content' => [
                1 => 'P1. Koja je razlika između ploče ispunjene obojenim otiscima stopala i ploče s bojama bez otisaka stopala?',
                2 => 'P2. Koja ploča omogućava veću slobodu kretanja uz poštivanje istih pravila za skretanje u skladu s bojama?',
                3 => 'P3. Postoje li mogući putovi na ploči s bojama koji nisu mogući na ploči s obojenim otiscima stopala?',
                4 => 'P4. Postoje li mogući putovi na ploči s obojenim otiscima stopala koji nisu mogući na ploči na kojoj su samo boje?',
            ],
        ],
    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Hodajte što je dulje moguće',
        'text' => 'U ovoj aktivnosti izazov je ostati što duže na ploči upotrebom boja umjesto otisaka stopala. Aktivnost postaje teža kad se povećava sloboda kretanja',
        'coloured-cards' => 'karte u boji ili crvene, žute i sive oznake',
        'questions' => [
            'content' => [
                1 => '1. pitanje Kada se dvije staze križaju i blokiraju jedna drugu?',
                2 => '2. pitanje Je li ova igra za dva igrača? Je li moguće igrati s 3 ili 4 igrača? Trebamo li promijeniti pravila?',
            ],
        ],
    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles i Roby',
        'text' => 'Priča Ade Lovelace i Charlesa Babbagea uistinu je zanimljiva. Osmislili su i programirali računala stotinu godina prije nego što su zapravo izumljena',
        'material' => 'glina za modeliranje i kratka olovka',
        'questions' => [
            'content' => [
                1 => '1. pitanje Pokušajte zamisliti da se robot koji ste napravili od gline za modeliranje i olovke može kretati po ploči kako bi došao na bilo koji položaj i kako bi se prema potrebi pratio njegov put. Kojim biste ga uputama programirali?',
            ],
        ],
    ],

    'cody-and-roby' => [
        'title' => 'Cody i Roby',
        'text' => 'Ovo je igra uloga s programerom Codyjem i robotom Robyjem. U videozapisu se predstavljaju karte CodyRoby, kojima ćemo se koristiti za određivanje kretanja na ploči. Cody će tim kartama dati Robyju upute kako se kretati po ploči',
        'material' => 'šahovnica s oznakama, karte s uputama (lijevo, desno, naprijed) i bilo koje blokade koje se stavljaju na ploču',
        'starter-kit' => 'Početni komplet CodyRoby',
        'questions' => [
            'content' => [
                1 => '1. pitanje Kamo će doći Roby ako, počevši od položaja C2 prema jugu, izvede posljednji slijed uputa prikazanih u videozapisu?',
                2 => '2. pitanje Mogu li se pokreti koje Roby napravi izvođenjem posljednjeg slijeda uputa prikazanih u videozapisu opisati primjenom uputa CodyFeet (stopala) ili CodyColor (boja) na ploču?',
                3 => '3. pitanje Tri su vrste uputa navedene u videozapisu, predstavljene zelenim, crvenim i žutim karticama, i one su skup uputa kojima se Robyja može pomaknuti bilo gdje na ploči. Možete li smisliti skup uputa s manje od tri koraka kojima bi se postiglo isto?',
            ],
        ],
    ],

    'the-tourist' => [
        'title' => 'Turist',
        'text' => 'S kartama CodyRoby dva tima izazivaju jedan drugoga kako bi u što kraćem roku pronašli slijed uputa kojima će se turist uputiti do spomenika koje želi posjetiti na ploči.',
        'material' => 'Veće karte mogu se koristiti za igru na podu',
        'questions' => [
            'content' => [
                1 => '1. pitanje Kojim bi se slijedom uputa dovelo turista do kipa Rafaela u prvom primjeru prikazanom u videozapisu?',
                2 => '2. pitanje Kojim bi se slijedom uputa dovelo turista do pročelja Torricini Duždeve palače u drugom primjeru prikazanom u videozapisu?',
                3 => '3. pitanje Možete li smisliti zabavan način za vježbanje svaki put kada jedan od dva tima odabere kartu koju će dodati u program? Smislite rješenje promišljanjem štafete prikazane u videozapisu',
            ],
        ],
    ],

    'material2' => [
        'chequered-with-labels' => 'šahovska ploča s oznakama',
        'cards' => '24 karte "idi naprijed", 8 karata "skreni ulijevo" i 8 karata "skreni udesno"',
        'larger-cards' => 'Za verziju na podu preporučuju se veće karte',
        'video' => 'U videozapisu je objašnjeno i kako igrati bez snopa karata',
        'pieces-of-paper' => 'Potrebna su i 24 papirića za pokrivanje već posjećenih polja',
        'card-alternative' => 'Umjesto snopa karata CodyRoby možete se i poslužiti sličicama karata koje su dostupne ovdje',
        'small-drawings' => 'Možete dodati i male crteže koji će vam pomoći ispričati priču. Crteže koji su korišteni u videozapisu možete pronaći ovdje',
        'rest-of-cards' => 'Za ostalo koristit ćemo karte CodyRoby, CodyFeet ili CodyColour.',
    ],

    'catch-the-robot' => [
        'title' => 'Uhvati robota',
        'text' => 'Uhvati robota natjecateljska je igra za igranje na stolu ili podu. Pobjeđuje onaj igrač koji osvoji robota protivničkog tima tako da dođe do njegova polja na ploči. Oba tima zbog nasumičnosti igraćih karata neprestano trebaju prilagođavati svoje strategije.',
        'questions' => [
            'content' => [
                1 => 'Pitanje 1. Ako je ružičasti pijun (Roby) na središnjem polju C3 okrenut prema sjeveru, a ružičasti tim ima dvije karte "idi naprijed", dvije karte "skreni ulijevo" i jednu kartu "skreni udesno", do kojih polja može doći?',
            ],
        ],
    ],

    'the-snake' => [
        'title' => 'Zmija',
        'text' => 'Zmija je vrsta pasijansa koja se igra s kartama CodyRoby. Cilj je igre prevesti zmiju preko svih polja na ploči, a da ne ugrize vlastiti rep.',
        'questions' => [
            'content' => [
                1 => 'Pitanje 1. Postoje li polazišta s kojih je nemoguće prijeći preko svih polja, a da se zmija ne ugrize za rep?',
            ],
        ],
    ],

    'storytelling' => [
        'title' => 'Pričanje priče',
        'text' => 'Današnja je tema pričanje priče! Upotrijebite upute za CodyRoby, otiske stopala CodyFeet ili boje CodyColour kako biste preveli pijune preko ploče i ispričali priču. Razbacajte različite dijelove priče po ploči.',
        'questions' => [
            'content' => [
                1 => 'Pitanje 1. Koji alat pruža najviše mogućnosti za navođenje Robyja da ispriča priču?',
                2 => 'Pitanje 2. Možete li rasporediti dijelove priče koju želite ispričati po ploči tako da ih je nemoguće sve dohvatiti uz CodyFeet?',
            ],
        ],
    ],

    'two-snakes' => [
        'title' => 'Dvije zmije',
        'text' => 'S pomoću karata CodyRoby dvije zmije kreću se po ploči pokušavajući si međusobno ograničiti kretanje. Osnovno pravilo vrlo je jednostavno: ne možete se vratiti na polje koje je zmija već posjetila. Pobjednik je zmija koja se najduže može slobodno kretati.',
        'material' => 'Karte CodyRoby, šahovska ploča 5 × 5, dvije figurice i komadići papira za označivanje već posjećenih polja.',
        'questions' => [
            'content' => [
                1 => '1. pitanje Na početku videozapisa, ako dva igrača ne izvuku žute karte za skretanje ulijevo, koje bi im karte najviše odgovarale?',
            ],
        ],
    ],

    'round-trip' => [
        'title' => 'Povratno putovanje',
        'text' => 'Timovi se izmjenjuju. Prvi planira polazno putovanje, a drugi mora dovesti Robyja natrag na početnu točku. Čini se jednostavnim, ali nije, osobito ako poteze planirate samo u glavi, bez pomicanja Robyja...',
        'material' => 'Karte CodyRoby, šahovska ploča 5 × 5, dvije figurice i komadići papira za označivanje već posjećenih polja. ',
        'questions' => [
            'content' => [
                1 => '1. pitanje Može li program vratiti Robyja natrag na početnu točku kraćom putanjom(tj. putanjom koja se sastoji od manje naredbi) od polazne ? ',
            ],
        ],
    ],

    'meeting-point' => [
        'title' => 'Sastajalište',
        'text' => 'Ovaj put planiramo poteze prije početka. Dva tima stavljaju karte na stol da bi izradili niz naredbi prema kojima će se njihovi roboti kretati, ali nitko se ne kreće dok jedan od igrača ne kaže: "Start!" U tom trenutku programiranje završava i počinje akcija. Igrač koji kaže: "Start!" pobjeđuje samo ako dva robota, od kojih svaki izvršava naredbe svog tima, završe na istom polju. ',
        'material' => 'Karte CodyRoby, šahovska ploča 5 × 5, dvije figurice.',
        'questions' => [
            'content' => [
                1 => '1. pitanje Ako mislite da je moguće da se dva robota nikada ne susretnu, izmislite pravila igre koja pokrivaju sve moguće situacije. ',
            ],
        ],
    ],

    'follow-the-music' => [
        'title' => 'Slijedi glazbu',
        'text' => 'Kada se nizovi programskih naredbi periodički ponavljaju, to je kao da imaju ritam. Ako svakoj naredbi dodijelimo zvuk, možemo voditi Robyja s pomoću glazbe. Upravo to ćemo i raditi ovaj put. Izradit ću program za vas s pomoću različitih zvukova koji predstavljaju različite naredbe, a vi ćete pomicati Robyja po ploči slijedeći te naredbe na temelju zvuka. ',
        'material' => 'Osim karata CodyRoby, šahovske ploče i figurica, trebamo proizvesti i tri različita zvuka. Upotrijebio sam tri čaše napunjene različitim količinama vode. Što ćete vi upotrijebiti ? ',
        'questions' => [
            'content' => [
                1 => '1. pitanje Pokušajte slijediti videozapis i vodite se zvukovima koje čaše proizvode, ali nemojte gledati u karte. Možete li prepoznati i izvršiti naredbe koje ti zvukovi predstavljaju ? ',
                2 => '2. pitanje Odaberite tri zvuka koja ćete povezati s tri osnovne naredbe. Izmislite niz zvukova koje biste mogli beskonačno ponavljati, a da nikada ne izvedete Robyja izvan ploče...',
            ],
        ],
    ],

    'colour-everything' => [
        'title' => 'Oboji sve',
        'text' => 'Možemo li voditi robote po ploči tako da njihove putanje postanu crteži? Ovdje kroz igru programiramo i crtamo pikselima te oblikujemo slike bojanjem polja šahovske ploče, koja su nalik pikselima na zaslonu.',
        'material' => 'Karte CodyRoby, šahovska ploča i figurica. Polja obojite polaganjem papirića ili markerima.',
        'questions' => [
            'content' => [
                1 => 'Je li moguće nacrtati dva srca kao u zadnjem dijelu videozapisa vodeći robota po svim odgovarajućim poljima, ali nijednom dvaput preko istog polja?',
            ],
        ],
    ],

    'codyplotter-and-codyprinter' => [
        'title' => 'Ploter Cody i pisač Cody',
        'text' => 'Koja je razlika između plotera i pisača? Saznajte kroz igru u kojoj programirate bez računala.',
        'material' => 'osim pribora CodyRoby, koristio sam zeleni marker i novog robota od gline, ali to nije nužno.',
        'questions' => [
            'content' => [
                1 => 'Možete li objasniti razliku između plotera i pisača?',
                2 => 'Što bi pisač Roby nacrtao kada bi se kretao po linijama na ploči prema naredbama s kraja videozapisa?',
            ],
        ],
    ],

    'boring-pixels' => [
        'title' => 'Dosadni pikseli!/Korištenje brojki',
        'text' => 'Kada Robyju damo upute da nacrta sliku krećući se po poljima odnosno pikselima, vidimo da to može postati još zanimljivije ako se poslužimo brojkama kada imamo mnogo uzastopnih polja iste boje. To rade i računala...',
        'material' => 'bilježnica na kvadratiće ili šahovska ploča 5 × 5 nacrtana na listu papira, flomaster. Kȏd crteža možete prikazati koristeći se olovkom i papirom.',
        'questions' => [
            'content' => [
                1 => 'Pokušajte izraditi šahovnicu i prikazati je s pomoću kodiranja duljine niza. Veličina šahovnice jednaka je broju kvadrata, ali koliko je velik njegov prikaz u obliku kodirane duljine niza?',
            ],
        ],
    ],

    'turning-code-into-pictures' => [
        'title' => 'Pretvaranje kȏda u slike',
        'text' => [
            1 => 'Sada smo vidjeli da možemo napisati kȏd za crtanje slike. Osmislio sam crtež i s pomoću kȏda ga pretvorio u slova i brojke, koje sam podijelio s vama. Zapišite slova i brojke te na temelju kȏda rekreirajte sliku.',
            2 => 'Ovo je slika koju sam osmislio i uspio prikazati u vašim bilježnicama i bilježnicama svih onih koji znaju za kȏd!',
        ],
        'material' => 'papir (po mogućnosti na kvadratiće) i olovka.',
        'questions' => [
            'content' => [
                1 => 'Pokušajte dekodirati i nacrtati slike s kraja ovog videozapisa.',
            ],
        ],
    ],

    'texts' => [
        1 => 'Coding@Home je zbirka kratkih video zapisa, materijala za samoučenje, zadataka, igara i izazova za programiranje za svakodnevnu upotrebu u obitelji i školi. Za te aktivnosti ne trebate nikakvo prethodno znanje niti elektroničke uređaje. Aktivnosti će poticati računalno razmišljanje i njegovat će vještine učenika, roditelja i učitelja kod kuće i u školi.',
        2 => 'Ciklus Coding@Home Europskog tjedna programiranja temelji se na inicijativi <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia"</a> Sveučilišta u Urbinu i Udruženja CodeMOOCnet u suradnji s portalom Rai Cultura. Alessandro Bogliolo profesor je koji na Sveučilištu u Urbinu poučava sustave za obradu informacija, <a href="/ambassadors?country_iso=IT" target="_blank">ambasador je Europskog tjedna programiranja u Italiji</a>, koordinator je svih ambasadora i član je Upravnog odbora Koalicije za digitalne vještine i radna mjesta. ',
        3 => 'Ako ste zainteresirani za više unplugged aktivnosti ili aktivnosti u različitom programiranju, kao što su jezici, robotika, micro:bit, pogledajte <a href="/training">"Learning Bits" Europskog tjedna programiranja </a> s video tutorijalima i nastavnim planovima za osnovne i srednje škole. Pogledajte  i resurse Učenje i Poučavanje na stranici Europskog tjedna programiranja, gdje možete pronaći besplatne, visokokvalitetne resurse iz cijelog svijeta za učitelje i nastavnike te učenike.',
    ],

    'coding-at-home-text' => 'Zbirka kratkih videozapisa, "uradi sam" materijala, zagonetki, igara i izazova u kodiranju za svakodnevnu upotrebu u obitelji, kao i u školi.',
    'coding-at-home-sub-text1' => 'Serija videa Coding@Home Europskog tjedna programiranja temelji se na inicijativi <a class="text-dark-blue underline" href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">"Kodiranje u obitelji"</a> Sveučilišta u Urbinu i udruge CodeMOOCnet u suradnji s Rai Cultura. Autor Coding@Home videa je Alessandro Bogliolo, profesor kolegija “Sustavi za obradu informacija” na Sveučilištu u Urbinu, talijanski  <a class="text-dark-blue underline" href="https://codeweek.eu/ambassadors?country_iso=IT" target="_blank">ambasador Europskog tjedna programiranja</a> i koordinator svih ambasadora te član Upravnog odbora Koalicije za digitalne vještine i radna mjesta.',
    'coding-at-home-sub-text2' => 'Za obavljanje aktivnosti nije vam potrebno nikakvo prethodno znanje ili elektronički uređaji. Aktivnosti će potaknuti računalno razmišljanje i njegovati vještine učenika, roditelja i učitelja kod kuće ili u školi.',
];
