<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Otázky',
    'material' => [
        "required" => "Potřebné materiály",
        "chequered" => "herní plán s mřížkou",
        "footprint" => "kartička s otiskem chodidla"
    ],
    'intro' => [
        'title' => 'Úvod ke Coding@Home',
    ],
    'explorer' => [
        'title' => 'Průzkumník',
        'text' => 'Průzkumník je první aktivitou série Coding@Home. Veďte průzkumníka po herním plánu tak, abyste po cestě k cíli navštívili co nejvíce polí. ',
        'questions' => [
            'content' =>
                [
                    1 => 'O1. Je-li výchozí a konečná pozice dána, může průzkumník navštívit všechna pole na herním plánu?',
                    2 => 'O2. Které výchozí a konečné pozice znemožňují průzkumníkovi navštívit maximální počet polí na herním plánu?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Doprava a doleva',
        'text' => 'Doprava a doleva je hra, ve které hráči soutěží a zároveň spolupracují. Dva týmy spolupracují na vytvoření cesty k cíli a každý z nich se snaží, aby bylo využito co nejvíce kartiček barvy, která mu byla přidělena: žlutý tým se snaží o položení co nejvíce odboček doleva a červený tým o položení co nejvíce odboček doprava.',
        'questions' => [
            'content' =>
                [
                    1 => 'O1. Jsou-li začátek a konec stanoveny jako v první hře na videu, je možné, aby jeden z týmů vyhrál?',
                    2 => 'O2. Jsou-li začátek a konec stanoveny jako ve hře, kterou vyhrála Anna, může být výsledkem remíza?',
                    3 => 'O3. Existují uspořádání startovního bodu a cíle, která zvýhodňují jeden ze dvou týmů?',
                    4 => 'O4. Je s ohledem na vzájemnou polohu startovního bodu a cíle možné předpovědět, jaký bude bodový rozdíl mezi vítězným a poraženým týmem?'
                ]

        ]

    ],


    'keep-off-my-path' => [
        'title' => 'Jdi mi z cesty',
        'text' => 'Jdi mi z cesty je hra, v níž soutěží dva týmy. Začínají na opačných koncích herního plánu a vytvářejí trasy, kterými se vzájemně blokují. Vyhrává tým, který druhému týmu znemožní prodloužení trasy.',
        'questions' => [
            'content' =>
                [
                    1 => 'O1. Existují startovní body, které zvýhodňují jeden ze dvou týmů?',
                    2 => 'O2. Může hra skončit remízou?',
                    3 => 'O3. Má hráč, který začíná, výhodu?',
                    4 => 'O4. Existuje neprůstřelná strategie, která začínajícímu hráči zajistí, že nikdy nemůže prohrát?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Přetahovaná',
        'text' => 'Přetahovaná je hra, která obnáší spolupráci i soutěžení. Začíná se ze středu spodního okraje herního plánu a týmy (žlutý a červený) se společně snaží propracovat k hornímu okraji. Žlutý tým chce dosáhnout polí vlevo nahoře, zatímco červený tým se snaží, aby trasa skončila vpravo nahoře.',
        'questions' => [
            'content' =>
                [
                    1 => 'O1. Existuje strategie, která vždy vede k vítězství?',
                    2 => 'O2. Má hráč, který začíná, výhodu?',
                    3 => 'O3. Pokud oba týmy hrají soustředěně, skončí hra vždy remízou, tj. uprostřed?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'Průzkumník beze stop',
        'text' => 'Průzkumník chodí po herním plánu z výchozího bodu do cíle a snaží se vstoupit na všechna pole. Při chůzi nechává barevné otisky svých chodidel, takže robot může jít v jeho stopách na základě interpretace barev. Hra nabývá na zajímavosti, když průzkumník smaže stopy a ponechá pouze barvy.',
        'material' => 'a červené, žluté a šedé fixy (nebo tužky)',
        'questions' => [
            'content' =>
                [
                    1 => 'O1. Jaký je rozdíl mezi herním plánem plným barevných stop a herním plánem s barvami, ale bez stop?',
                    2 => 'O2. Který herní plán poskytuje větší svobodu pohybu, pokud nadále platí pravidla pro odbočování na základě barev?',
                    3 => 'O3. Existují na herním plánu, na němž jsou pouze barvy, trasy, které na plánu s barevnými otisky chodidel nejsou možné?',
                    4 => 'O4. Existují na herním plánu s barevnými otisky chodidel trasy, které na plánu s barvami nejsou možné?'
                ]

        ]

    ],

    'texts' => [
        1 => 'Série Coding@Home představuje sbírku krátkých videí, návodů, hádanek, her a programovacích úkolů pro každodenní využití doma i ve škole. Veškeré aktivity můžete provádět bez předchozích znalostí či elektronických přístrojů. Aktivity stimulují výpočetní myšlení a rozvíjejí dovednosti žáků, rodičů i učitelů doma i ve škole.',
        2 => 'Série Coding@Home projektu Evropský týden programování je založena na iniciativě <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a>, kterou připravily univerzita v Urbinu a asociace CodeMOOCnet ve spolupráci s italskou televizní stanicí Rai Cultura. Alessandro Bogliolo působí na univerzitě v Urbinu jako profesor systémů pro zpracování informací a je <a href="/ambassadors?country_iso=IT" target="_blank">italským ambasadorem Evropského týdne programování</a> a koordinátorem všech ambasadorů i členů správní rady Koalice pro digitální dovednosti a pracovní místa. ',
        3 => 'Máte-li zájem o další aktivity bez počítače či aktivity v různých programovacích jazycích, robotiku, micro:bit apod., podívejte se na stránku <a href="/training">Školicí materiály pro Evropský týden programování</a>, kde najdete videonávody a programy lekcí pro první a druhý stupeň základních škol a střední školy. Seznamte se také se stránkou Evropského programovacího týdne pro <a href="/resources/learn">studenty</a> a <a href="/resources/teach">učitele</a>. '
    ]
];