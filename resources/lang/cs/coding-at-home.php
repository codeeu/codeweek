<?php

return [
    'title' => 'Coding@Home',
    'questions' => 'Otázky',
    'material' => [
        'required' => 'Potřebné materiály',
        'chequered' => 'herní plán s mřížkou',
        'footprint' => 'kartička s otiskem chodidla',
    ],
    'intro' => [
        'title' => 'Úvod ke Coding@Home',
    ],
    'explorer' => [
        'title' => 'Průzkumník',
        'text' => 'Průzkumník je první aktivitou série Coding@Home. Veďte průzkumníka po herním plánu tak, abyste po cestě k cíli navštívili co nejvíce polí. ',
        'questions' => [
            'content' => [
                1 => 'O1. Je-li výchozí a konečná pozice dána, může průzkumník navštívit všechna pole na herním plánu?',
                2 => 'O2. Které výchozí a konečné pozice znemožňují průzkumníkovi navštívit maximální počet polí na herním plánu?',
            ],
        ],
    ],

    'right-and-left' => [
        'title' => 'Doprava a doleva',
        'text' => 'Doprava a doleva je hra, ve které hráči soutěží a zároveň spolupracují. Dva týmy spolupracují na vytvoření cesty k cíli a každý z nich se snaží, aby bylo využito co nejvíce kartiček barvy, která mu byla přidělena: žlutý tým se snaží o položení co nejvíce odboček doleva a červený tým o položení co nejvíce odboček doprava.',
        'questions' => [
            'content' => [
                1 => 'O1. Jsou-li začátek a konec stanoveny jako v první hře na videu, je možné, aby jeden z týmů vyhrál?',
                2 => 'O2. Jsou-li začátek a konec stanoveny jako ve hře, kterou vyhrála Anna, může být výsledkem remíza?',
                3 => 'O3. Existují uspořádání startovního bodu a cíle, která zvýhodňují jeden ze dvou týmů?',
                4 => 'O4. Je s ohledem na vzájemnou polohu startovního bodu a cíle možné předpovědět, jaký bude bodový rozdíl mezi vítězným a poraženým týmem?',
            ],
        ],
    ],

    'keep-off-my-path' => [
        'title' => 'Jdi mi z cesty',
        'text' => 'Jdi mi z cesty je hra, v níž soutěží dva týmy. Začínají na opačných koncích herního plánu a vytvářejí trasy, kterými se vzájemně blokují. Vyhrává tým, který druhému týmu znemožní prodloužení trasy.',
        'questions' => [
            'content' => [
                1 => 'O1. Existují startovní body, které zvýhodňují jeden ze dvou týmů?',
                2 => 'O2. Může hra skončit remízou?',
                3 => 'O3. Má hráč, který začíná, výhodu?',
                4 => 'O4. Existuje neprůstřelná strategie, která začínajícímu hráči zajistí, že nikdy nemůže prohrát?',
            ],
        ],
    ],

    'tug-of-war' => [
        'title' => 'Přetahovaná',
        'text' => 'Přetahovaná je hra, která obnáší spolupráci i soutěžení. Začíná se ze středu spodního okraje herního plánu a týmy (žlutý a červený) se společně snaží propracovat k hornímu okraji. Žlutý tým chce dosáhnout polí vlevo nahoře, zatímco červený tým se snaží, aby trasa skončila vpravo nahoře.',
        'questions' => [
            'content' => [
                1 => 'O1. Existuje strategie, která vždy vede k vítězství?',
                2 => 'O2. Má hráč, který začíná, výhodu?',
                3 => 'O3. Pokud oba týmy hrají soustředěně, skončí hra vždy remízou, tj. uprostřed?',
            ],
        ],
    ],

    'explorer-without-footprints' => [
        'title' => 'Průzkumník beze stop',
        'text' => 'Průzkumník chodí po herním plánu z výchozího bodu do cíle a snaží se vstoupit na všechna pole. Při chůzi nechává barevné otisky svých chodidel, takže robot může jít v jeho stopách na základě interpretace barev. Hra nabývá na zajímavosti, když průzkumník smaže stopy a ponechá pouze barvy.',
        'material' => 'a červené, žluté a šedé fixy (nebo tužky)',
        'questions' => [
            'content' => [
                1 => 'O1. Jaký je rozdíl mezi herním plánem plným barevných stop a herním plánem s barvami, ale bez stop?',
                2 => 'O2. Který herní plán poskytuje větší svobodu pohybu, pokud nadále platí pravidla pro odbočování na základě barev?',
                3 => 'O3. Existují na herním plánu, na němž jsou pouze barvy, trasy, které na plánu s barevnými otisky chodidel nejsou možné?',
                4 => 'O4. Existují na herním plánu s barevnými otisky chodidel trasy, které na plánu s barvami nejsou možné?',
            ],
        ],
    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Jdi tak daleko, jak to jen jde',
        'text' => 'Během této aktivity je důležité zůstat na desce tak dlouho, jak to jen jde. Místo stop se budou používat barvy. Aktivita se stane složitější, jakmile se rozšíří svoboda pohybu.',
        'coloured-cards' => 'barevné kartičky nebo červené, žluté a zelené zvýrazňovače',
        'questions' => [
            'content' => [
                1 => '1. otázka: Kdy se obě cesty zkříží a navzájem se zablokují?',
                2 => '2. otázka: Hra je prezentována jako hra pro dva hráče. Je možné ji hrát se třemi nebo čtyřmi hráči? Musíme změnit pravidla?',
            ],
        ],
    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles a Roby',
        'text' => 'Příběh Ady Lovelaceové a Charlese Babbageho je zajímavý. Vymysleli a programovali počítače sto let předtím, než byly ve skutečnosti vynalezeny.',
        'material' => 'plastelína a krátká tužka',
        'questions' => [
            'content' => [
                1 => '1. otázka: Představte si, že robot, kterého jste vytvořili pomocí plastelíny a tužky, se může pohybovat po desce tak, aby se dostal na jakoukoliv pozici a v případě potřeby mohl sledovat svou trasu. Jaké instrukce byste k naprogramování použili?',
            ],
        ],
    ],

    'cody-and-roby' => [
        'title' => 'Cody a Roby',
        'text' => 'Tohle je hra s rolemi programátora Codyho a robota Robyho. Ve videu vám představíme karty CodyRoby, které odteď budeme používat k určení pohybů po desce. Cody karty použije, aby Robymu dal instrukce ohledně toho, jak se má na desce pohybovat.',
        'material' => 'šachovnice se štítky, karty s instrukcemi (vlevo, vpravo, rovně) a dílky, které se umístí na desku',
        'starter-kit' => 'startovací sada CodyRoby',
        'questions' => [
            'content' => [
                1 => '1. otázka: Kam se Roby dostane, pokud začne na pozici C2 čelem na jih a provede poslední sadu instrukcí z videa?',
                2 => '2. otázka: Mohly by pohyby, které Roby provede podle poslední sady instrukcí z videa, být popsány prostřednictvím instrukcí v podobě stop CodyFeet nebo CodyColor na desce?',
                3 => '3. otázka: Tři typy instrukcí z videa, které jsou reprezentovány prostřednictvím zelených, červených a žlutých kartiček, představují sadu instrukcí, pomocí nichž se Roby může dostat na jakékoliv místo na desce. Dokážete vymyslet sadu, která obsahuje méně než tři instrukce a zvládne to samé?',
            ],
        ],
    ],

    'the-tourist' => [
        'title' => 'Turista',
        'text' => 'Dva týmy s kartami CodyRoby soupeří o to, aby v co nejkratším čase našly sadu instrukcí, která turistu dovede k památce, již chce na desce navštívit.',
        'material' => 'S většími kartami se dá hrát na podlaze.',
        'questions' => [
            'content' => [
                1 => '1. otázka: Jaká sada instrukcí by turistu v prvním příkladu z videa dovedla k soše Rafaela?',
                2 => '2. otázka: Která sada instrukcí by turistu ve druhém příkladu z videa dovedla k věžím vévodského paláce?',
                3 => '3. otázka: Napadne vás nějaký zábavný způsob, jak udělat nějaké cvičení pokaždé, když jeden z týmů zvolí kartu pro přidání do programu? Vymyslete způsob, jak upravit štafetový závod z videa.',
            ],
        ],
    ],

    'material2' => [
        'chequered-with-labels' => 'čtverečkovaná hrací deska s popisky',
        'cards' => '24  karet pro pohyb vpřed, 8  karet pro otočení vlevo a 8  karet pro otočení vpravo',
        'larger-cards' => 'Pro verzi hry na podlaze se doporučují větší karty',
        'video' => 'Video také ukazuje, jak hrát bez karet',
        'pieces-of-paper' => 'Také je potřeba 24  kousků papíru, které se umístí na již navštívená pole',
        'card-alternative' => 'Jako alternativu k balíčku karet CodyRoby můžete použít ikony karet, které jsou dostupné zde',
        'small-drawings' => 'Jako doplněk můžete použít malé kresby, které pomohou s vyprávěním příběhu. Ty, které jsme použili ve videu, najdete zde',
        'rest-of-cards' => 'Pro zbytek používáme karty CodyRoby, CodyFeet nebo CodyColour.',
    ],

    'catch-the-robot' => [
        'title' => 'Chyťte robota',
        'text' => 'Chyťte robota je soutěžní hra, kterou lze hrát na stole nebo podlaze. Vyhrává hráč, který zajme robota druhého týmu tak, že vstoupí na jeho pole na hrací desce. Náhodné pořadí herních karet vyžaduje, aby oba týmy neustále přizpůsobovaly svou strategii.',
        'questions' => [
            'content' => [
                1 => 'O1. Pokud se růžová figurka (Roby) nachází na středním poli C3 čelem na sever a růžový tým má dvě karty pro pohyb vpřed, dvě karty pro otočení vlevo a jednu kartu pro otočení vpravo, na která pole může jít?',
            ],
        ],
    ],

    'the-snake' => [
        'title' => 'Had',
        'text' => 'Had je typ solitéru, který lze hrát s kartami CodyRoby. Cílem je provést hada přes všechna pole na hrací desce tak, aby se přitom nekousl do ocasu.',
        'questions' => [
            'content' => [
                1 => 'O1. Existují nějaká startovní místa, ze kterých není možné navštívit všechna pole tak, aby se had nekousl do ocasu?',
            ],
        ],
    ],

    'storytelling' => [
        'title' => 'Vyprávění příběhu',
        'text' => 'Dnešním tématem je vyprávění příběhu. S využitím povelů CodyRoby, stop CodyFeet nebo barev CodyColour veďte figurky po hrací desce tak, aby vyprávěly příběh. Na hrací desce rozmístěte různé části příběhu.',
        'questions' => [
            'content' => [
                1 => 'O1. Který nástroj je při vedení Robyho tak, aby vyprávěl příběh, nejvšestrannější?',
                2 => 'O2. Dají se části příběhu, který chcete vyprávět, na hrací desce rozmístit tak, aby je nebylo možné všechny posbírat pomocí CodyFeet?',
            ],
        ],
    ],

    'two-snakes' => [
        'title' => 'Dva hadi',
        'text' => 'Pomocí karet CodyRoby se po herní desce pohybují dva hadi a snaží se bránit si navzájem v pohybu. Základní pravidlo je úplně jednoduché: nemůžeš se vrátit na políčko, na kterém už had byl. Vyhrává had, který se dokáže nejdéle libovolně pohybovat.',
        'material' => 'Karty CodyRoby, hrací deska s 5 × 5 políčky, dvě figurky, a kousky papíru, kterými označíme již navštívená políčka.',
        'questions' => [
            'content' => [
                1 => 'Otázka 1. Vraťme se k počátečnímu nastavení z videa. Pokud si hráči nevytáhnou žluté karty, se kterými můžou zahnout doleva, jaké jiné karty by bylo nejlepší si vytáhnout?',
            ],
        ],
    ],

    'round-trip' => [
        'title' => 'Cesta tam a zpátky',
        'text' => 'Týmy se střídají. První plánuje cestu tam, zatímco druhý musí přivést Robyho zpět do výchozího bodu. Zdá se, že je to snadné, ale není, zvláště pokud plánujete tahy v duchu, aniž byste Robym skutečně pohybovali...',
        'material' => 'Karty CodyRoby, hrací deska s 5 × 5 políčky, dvě figurky a kousky papíru, kterými označíme již navštívená políčka.',
        'questions' => [
            'content' => [
                1 => 'Otázka 1. Je možné, aby program, který přivede Robyho zpět do výchozího bodu, byl kratší (tj. obsahoval méně pokynů) než ten pro cestu z výchozího bodu?',
            ],
        ],
    ],

    'meeting-point' => [
        'title' => 'Setkání',
        'text' => 'Tentokrát si naplánujeme tahy dříve, než začneme. Oba týmy postupně pokládají karty na stůl a vytváří sekvenci pokynů, podle kterých budou přesouvat své roboty. Žádný robot se ale nepohne, dokud jeden z hráčů neřekne "start!". V tomto okamžiku přestávají programovat a začínají přesouvat roboty. Hráč, který řekl "start!" vyhraje, pouze pokud se oba roboti, každý provádějící pokyny svého týmu, sejdou na stejném políčku.',
        'material' => 'Karty CodyRoby, hrací deska s 5 × 5 políčky, dvě figurky.',
        'questions' => [
            'content' => [
                1 => 'Otázka 1. Pokud si myslíš, že je možné, aby se dva roboti nikdy nesetkali, vymysli pravidla hry, která zahrnou všechny možné situace.',
            ],
        ],
    ],

    'follow-the-music' => [
        'title' => 'Jdi podle hudby',
        'text' => 'Když se sekvence několika programovacích pokynů pravidelně opakuje, je to jako by měla svůj rytmus. Když ke každému pokynu přiřadíme určitý tón, můžeme Robyho vést pomocí hudby. A přesně to teď uděláme. Vytvořím pro tebe program složený z různých tónů, které představují jednotlivé pokyny, a ty budeš podle nich Robyho přesouvat po hrací desce.',
        'material' => 'Kromě karet CodyRoby, hrací desky a figurky potřebujeme ještě vytvořit tři různé tóny. Já jsem použil tři sklenice naplněné do různé výšky vodou. Co použiješ ty?',
        'questions' => [
            'content' => [
                1 => 'Otázka 1. Snaž se sledovat video a nechat se vést tóny skleniček, a nedívej se přitom na karty. Rozeznáš tóny a dokážeš provést pokyny, které představují?',
                2 => 'Otázka 2. Vyber si tři tóny, které přiřadíš ke třem základním pokynům. Seřaď za sebou několik tónů, které můžeš ve stejném pořadí znovu a znovu opakovat, aniž by se Roby dostal mimo hrací desku...',
            ],
        ],
    ],

    'colour-everything' => [
        'title' => 'Všechno vybarvit',
        'text' => 'Co roboty nasměrovat po desce tak, aby cestou vytvořili obrazec? V rámci tohoto úkolu si budeme hrát s programováním a pixely. Budeme vytvářet obrazce vybarvováním políček, jako by to byly pixely na obrazovce.',
        'material' => 'Karty CodyRoby, čtverečkovaná hrací deska a figurka. K vybarvování políček budeme používat čtverečky papíru, které budeme na políčka pokládat. Nebo je můžete vybarvovat fixem.',
        'questions' => [
            'content' => [
                1 => 'Dovedete nakreslit dvě srdce, jako v závěrečné části videa, nasměrováním robota na příslušná políčka, aniž by kterékoli vybarvil dvakrát?',
            ],
        ],
    ],

    'codyplotter-and-codyprinter' => [
        'title' => 'CodyPlotter a CodyPrinter',
        'text' => 'Jaký je rozdíl mezi plotterem a tiskárnou? Odpověď najdete při této aktivitě bez počítače.',
        'material' => 'Kromě setu CodyRoby budeme používat zelený fix a nového robota z modelíny, ale nemusí být.',
        'questions' => [
            'content' => [
                1 => 'Dokážete vysvětlit rozdíl mezi plotterem a tiskárnou?',
                2 => 'Co by RobyPrinter nakreslil, kdyby se po desce pohyboval podle posloupnosti příkazů na konci videa?',
            ],
        ],
    ],

    'boring-pixels' => [
        'title' => 'Samé pixely!/Čísla',
        'text' => 'Dáváme Robymu příkazy, aby postupně políčko po políčku, tedy pixel po pixelu, kreslil obrazec. V případech, kdy je třeba vybarvit řadu políček za sebou, si můžeme situaci usnadnit čísly. Počítače dělají totéž...',
        'material' => 'čtverečkovaný blok nebo hrací deska 5×5 políček nakreslená na listu papíru, fix. Ke znázornění můžete použít fix a papír.',
        'questions' => [
            'content' => [
                1 => 'Zkuste vytvořit šachovnici kódováním RLE. Velikost obrazce se bude rovnat počtu políček, ale jak velká bude jeho podoba v RLE?',
            ],
        ],
    ],

    'turning-code-into-pictures' => [
        'title' => 'Programujeme obrázky',
        'text' => [
            1 => 'Ukázali jsme si, jak nakreslit respektive naprogramovat obrázek. Teď si představuju další obrázek. Programem jsem ho zakódoval do písmen a čísel, které máte k dispozici. Čísla a písmena si zaznamenejte a pomocí programu zjistěte, jaký obrazec jsem měl na mysli.',
            2 => 'Tady je obrázek, který jsem po vás chtěl. Podařilo se vám ho pomocí kódu nakreslit?',
        ],
        'material' => 'papír (pokud možno čtverečkovaný) a fix.',
        'questions' => [
            'content' => [
                1 => 'Zkuste si dekódovat a nakreslit další obrazce, které uvádím na konci videa.',
            ],
        ],
    ],

    'texts' => [
        1 => 'Série Coding@Home představuje sbírku krátkých videí, návodů, hádanek, her a programovacích úkolů pro každodenní využití doma i ve škole. Veškeré aktivity můžete provádět bez předchozích znalostí či elektronických přístrojů. Aktivity stimulují výpočetní myšlení a rozvíjejí dovednosti žáků, rodičů i učitelů doma i ve škole. ',
        2 => 'Série Coding@Home projektu Evropský týden programování je založena na iniciativě <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank" > “Coding in famiglia” </a>, kterou připravily univerzita v Urbinu a asociace CodeMOOCnet ve spolupráci s italskou televizní stanicí Rai Cultura. Alessandro Bogliolo působí na univerzitě v Urbinu jako profesor systémů pro zpracování informací a je < a href = "/ambassadors?country_iso=IT" target = "_blank" > italským ambasadorem Evropského týdne programování </a > a koordinátorem všech ambasadorů i členů správní rady Koalice pro digitální dovednosti a pracovní místa. ',
        3 => 'Pokud vás zajímají další aktivity bez připojení nebo aktivity v různých programech, jako jsou jazyky, robotika, micro:bit, podívejte se na  <a href="/training">"Learning Bits" Evropského týdne programování</a> s výukovými videi a plány lekcí pro základní, nižší střední a vyšší střední školy. Podívejte se také na zdroje Evropskýho týdna programování Learn&Learn , kde najdete bezplatné a vysoce kvalitní zdroje z celého světa pro učitele a studenty.',
    ],

    'coding-at-home-text' => 'Sbírka krátkých videí, kutilských materiálů, hádanek, her a programovacích výzev pro každodenní použití v rodině i ve škole.',
    'coding-at-home-sub-text1' => 'Série Coding@Home Týdne programování EU navazuje na iniciativu <a class="text-dark-blue underline" href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">"Programování v rodině"</a> Univerzity v Urbinu a asociace CodeMOOCnet ve spolupráci s Rai Cultura. Autorem Coding@Home videa je Alessandro Bogliolo, profesor systémů zpracování informací na univerzitě v Urbinu, <a class="text-dark-blue underline" href="https://codeweek.eu/ambassadors?country_iso=IT" target="_blank">italský ambasador Evropského týdne programování </a> a koordinátor všech ambasadorů a také člen správní rady Digital Skills and Jobs Coalition.',
    'coding-at-home-sub-text2' => 'K provádění činností nepotřebujete žádné předchozí znalosti ani elektronická zařízení. Aktivity budou stimulovat počítačové myšlení a kultivovat dovednosti žáků, rodičů a učitelů doma i ve škole.',
];
