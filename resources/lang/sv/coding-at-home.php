<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Frågor',
    'material' => [
        "required" => "Utrustning som krävs",
        "chequered" => "rutigt bräde",
        "footprint" => "brickor med fotavtryck på"
    ],
    'intro' => [
        'title' => 'Introduktion till Coding@Home',
    ],
    'explorer' => [
        'title' => 'Utforskaren',
        'text' => 'Utforskaren är den första aktiviteten för Coding@Home. Flytta runt utforskaren på brädet så att den når mål efter att ha nuddat så många rutor som möjligt. ',
        'questions' => [
            'content' =>
                [
                    1 => 'F1. Är det möjligt för utforskaren att beröra alla rutor på brädet med de start- och slutpositioner som visas i videon?',
                    2 => 'F2. Vilka start- och slutpositioner hindrar utforskaren från att beröra störst antal rutor på brädet?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Höger och vänster',
        'text' => 'Höger och vänster är ett spel för både tävling och samarbete. Två lag samarbetar för att skapa en väg till målet, samtidigt som de tävlar om att använda så många som möjligt av de brickor de fått. Det gula laget försöker få in så många vänstersvängar som möjligt och det röda laget försöker att få in så många högersvängar som möjligt.',
        'questions' => [
            'content' =>
                [
                    1 => 'F1. När start och mål är arrangerade som i videons första match, är det möjligt för något av lagen att vinna?',
                    2 => 'F2. När start och mål är arrangerade som i matchen som Anna vann, var det möjligt att få oavgjort?',
                    3 => 'F3. Finns det någon variant av start och mål som är en fördel för något av lagen?',
                    4 => 'F4. Utifrån placeringen av start och mål, är det möjligt att uttala sig som den slutliga skillnaden mellan det vinnande laget och det förlorande?'
                ]

        ]

    ],


    'keep-off-my-path' => [
        'title' => 'Ur vägen',
        'text' => 'Ur vägen är ett tävlingsinriktat spel mellan två lag. Man börjar från varsin ände av spelplanen och försöker lägga vägar som hindrar det andra laget. Det lag som lyckas hindra det andra från att lägga sin väg vinner.',
        'questions' => [
            'content' =>
                [
                    1 => 'F1. Finns det någon startpunkt som är till fördel för något av lagen?',
                    2 => 'F2. Kan det bli oavgjort?',
                    3 => 'F3. Har den spelare som börjar en fördel?',
                    4 => 'F4. Finns det en vattentät strategi som den spelare som gör det första draget kan använda för att aldrig förlora?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Dragkamp',
        'text' => 'Dragkamp är ett spel för både samarbete och tävling. Man börjar längst ned i mitten av spelplanen. Två lag (gult och rött) arbetar ihop för att nå till toppen. Det gula laget försöker nå rutorna på vänster sida medan det röda laget försöker nå rutorna på höger sida.',
        'questions' => [
            'content' =>
                [
                    1 => 'F1. Finns det någon strategi som alltid resulterar i seger?',
                    2 => 'F2. Har den spelare som börjar någon fördel?',
                    3 => 'F3. Om båda spelare är lika duktiga, slutar spelet alltid oavgjort då?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'Utforskaren ',
        'text' => 'Utforskaren går runt spelplanen från startpunkten till mål och försöker att ha gått på alla rutor. När utforskaren rör sig lämnar den fotavtryck, vilket gör att roboten kan följa stegen genom att se på färgerna. Spelet blir ännu mer utmanande om utforskaren röjer undan fotspåren och bara lämnar kvar färgerna.',
        'material' => 'samt röda, gula och gråa färgpennor',
        'questions' => [
            'content' =>
                [
                    1 => 'F1. Vad är skillnaden mellan en spelplan full av färgade fotavtryck och en med färger men inga fotavtryck?',
                    2 => 'F2. Vilken spelplan ger mest rörelsefrihet, med samma regler för att svänga som anges med färg?',
                    3 => 'F3. Finns det möjliga vägar på spelplanen med bara färger som inte är möjliga på en spelplan med färgade fotavtryck?',
                    4 => 'F4. Finns det möjliga vägar på spelplanen med färgade fotavtryck som inte är möjliga på en spelplan med bara färger?'
                ]

        ]

    ],

    'texts' => [
        1 => 'Coding@Home är en samling korta videor, gör det själv-material, kluriga övningar, spel och kodningsutmaningar för vardagsbruk både hemma och i skolan. Man behöver inga tidigare kunskaper eller elektronisk utrustning för att göra aktiviteterna. Uppgifterna uppmuntrar till datorförståelse och övar kompetensen hos elever, föräldrar och lärare hemma eller i skolan.',
        2 => 'EU:s serie Code Week Coding@Home bygger på initiativet <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> från universitetet i Urbino och CodeMOOCnet Association i samarbete med Rai Cultura. Alessandro Bogliolo är professor i informationssystem på universitetet i Urbino, tillika <a href="/ambassadors?country_iso=IT" target="_blank">Italiens ambassadör för EU Code Week</a> och han koordinerar alla ambassadörer och är styrelsemedlem i Governing Board of the Digital Skills and Jobs Coalition. ',
        3 => 'Om ni är intresserade av andra analoga aktiviteter, eller aktiviteter för olika programmeringsspråk, robotteknik, micro:bit etc., kan ni besöka <a href="/training">EU Code Weeks "Learning Bits"</a> med instruktionsvideor och lektioner för låg- och mellanstadiet. Besök även resurssidorna till EU Code Week för <a href="/resources/learn">elever</a> och <a href="/resources/teach">lärare</a>. '
    ]
];