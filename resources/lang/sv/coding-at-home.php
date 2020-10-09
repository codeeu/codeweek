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
        'title' => 'Utforskare utan fotavtryck',
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

    'walk-as-long-as-you-can' => [
        'title' => 'Gå så långt du kan',
        'text' => 'Det här spelet går ut på att stanna kvar på spelplanen så länge som möjligt genom att använda färger i stället för fotavtryck. Det blir svårare och svårare, i takt med att din rörelsefrihet minskar',
        'coloured-cards' => "färgade kort eller röda, gula och grå markörer",

        'questions' => [
            'content' =>
                [
                    1 => 'F1. När krockar de två banorna och blockerar varandra?',
                    2 => 'F2. Spelet presenteras som ett spel för två spelare. Går det att spela det med tre eller fyra spelare? Behöver vi ändra reglerna?',

                ]

        ]

    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles och Roby',
        'text' => 'Historien om Ada Lovelace och Charles Babbage är intressant. De byggde och programmerade datorer 100 år innan de uppfanns på riktigt',
        'material' => 'modellera och kort blyertspenna',

        'questions' => [
            'content' =>
                [
                    1 => 'F1. Föreställ dig att den robot som du byggde av modellera och en penna kan flytta sig vart som helst på spelplanen och, vid behov, rita ut sin väg. Vilka instruktioner skulle du använda för att programmera den?'
                ]

        ]

    ],

    'cody-and-roby' => [
        'title' => 'Cody och Roby',
        'text' => 'Det här är ett rollspel med programmeraren Cody och roboten Roby. I videoklippet visas korten Cody–Roby, som vi från och med nu kommer att använda för att bestämma pjäsernas drag på spelplanen. Cody kommer att använda korten för att ge Roby instruktioner om vart han ska gå på planen',
        'material' => 'rutbräde med bokstäver och siffror, instruktionskort (vänster, höger, rakt fram)',
        'starter-kit' => 'Cody–Roby grundkit',

        'questions' => [
            'content' =>
                [
                    1 => 'F1. Var hamnar Roby om han utgår från position C2 och står vänd mot söder och sedan utför den sista instruktionssekvensen i videon?',
                    2 => 'F2. Skulle de drag som Roby gör när han utför den sista instruktionssekvensen i videon också kunna beskrivas med hjälp av markörer med fotavtryck eller med färger?',
                    3 => 'F3. De tre sorters instruktioner som visas i videon – de gröna, röda och gula korten – utgör en instruktionsuppsättning som kan flytta Roby vart som helst på spelplanen. Kan du hitta på en instruktionsuppsättning som innehåller färre än tre instruktioner för att göra samma sak?',

                ]

        ]

    ],

    'the-tourist' => [
        'title' => 'Turisten',
        'text' => 'Två lag utmanar varandra med hjälp av Cody–Roby-korten. Målet är att vara först med att hitta den instruktionssekvens som visar turisten vägen till de monument som hon vill besöka på spelplanen.',
        'material' => 'Större kort kan användas om du vill spela på golvet',

        'questions' => [
            'content' =>
                [
                    1 => 'F1. Vilken instruktionssekvens skulle leda turisten fram till statyn av Rafael i det första exemplet i videon?',
                    2 => 'F2. Vilken instruktionssekvens skulle leda turisten fram till Torricini i hertigens palats i det andra exemplet i videon?',
                    3 => 'F3. Kan du komma på ett roligt sätt att inkludera något slags fysisk aktivitet varje gång ett av de två lagen drar ett kort att lägga till i programmet? Kom på ett sätt genom att ändra på den stafett som visas i videon',
                ]

        ]

    ],

    'material2' => [
        "chequered-with-labels" => "Rutbräde med etiketter Instruktionskort",
        "cards" => "24 st. ”gå framåt”, 8 st. ”sväng vänster” och 8 st. ”sväng höger”",
        "larger-cards" => "Ni kan använda större kort om ni spelar på golvet",
        "video" => "Videon förklarar även hur ni spelar utan en kortlek",
        "pieces-of-paper" => 'Ni behöver även 24 pappersbitar som placeras på de rutor som ni har besökt',
        "card-alternative" => "I stället för CodyRoby-korten kan man också använda de kortsymboler som finns här",
        "small-drawings" => "Små teckningar kan användas för att hjälpa till att berätta historien. De som används i videon finns här",
        "rest-of-cards" => "I övrigt använde vi korten från CodyRoby, CodyFeet och CodyColor."
    ],


    'catch-the-robot' => [
        'title' => "Fånga roboten",
        'text' => "Fånga roboten är ett brädspel eller golvspel där ni tävlar mot varandra. Den spelare vinner som fångar motståndarlagets robot genom att ta sig fram till rutan den står på. Spelkorten ger en slumpeffekt som gör att båda lagen hela tiden måste justera sina strategier.",
        'questions' => [
            'content' =>
                [
                    1 => "F1. Vilka rutor kan den rosa spelpjäsen (Roby) gå till om han står på mittrutan C3 och pekar mot norr och det rosa laget har 2 ”gå framåt”-kort, 2 ”sväng vänster”-kort och 1 ”sväng höger”-kort?",
                ]

        ]

    ],

    'the-snake' => [
        'title' => "Ormen",
        'text' => "Ormen är en sorts patiens som spelas med CodyRoby-kort. Spelet går ut på att flytta ormen över alla rutor på brädet utan att den biter sig i svansen.",
        'questions' => [
            'content' =>
                [
                    1 => "F1. Finns det någon utgångspunkt som gör det omöjligt att besöka alla rutor utan att ormen biter sig i svansen?",
                ]

        ]

    ],

    'storytelling' => [
        'title' => "Berättande",
        'text' => "Dagens ämne är berättande! Använd instruktionerna från CodyRoby, fotspåren från CodyFeet eller färgerna från CodyColor för att flytta spelpjäserna på brädet och berätta en historia. Sprid ut olika delar av berättelsen över spelplanen.",
        'questions' => [
            'content' =>
                [
                    1 => "F1. Vilket verktyg är mest mångsidigt när du hjälper Roby att berätta en historia?",
                    2 => "F2. Kan du arrangera delarna till din berättelse på brädet så att det inte går att ta tillbaka alla med CodyFeet?",
                ]

        ]

    ],


    'texts' => [
        1 => 'Coding@Home är en samling korta videor, gör det själv-material, kluriga övningar, spel och kodningsutmaningar för vardagsbruk både hemma och i skolan. Man behöver inga tidigare kunskaper eller elektronisk utrustning för att göra aktiviteterna. Uppgifterna uppmuntrar till datorförståelse och övar kompetensen hos elever, föräldrar och lärare hemma eller i skolan.',
        2 => 'EU:s serie Code Week Coding@Home bygger på initiativet <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> från universitetet i Urbino och CodeMOOCnet Association i samarbete med Rai Cultura. Alessandro Bogliolo är professor i informationssystem på universitetet i Urbino, tillika <a href="/ambassadors?country_iso=IT" target="_blank">Italiens ambassadör för EU Code Week</a> och han koordinerar alla ambassadörer och är styrelsemedlem i Governing Board of the Digital Skills and Jobs Coalition. ',
        3 => 'Om ni är intresserade av andra analoga aktiviteter, eller aktiviteter för olika programmeringsspråk, robotteknik, micro:bit etc., kan ni besöka <a href="/training">EU Code Weeks "Learning Bits"</a> med instruktionsvideor och lektioner för låg- och mellanstadiet. Besök även resurssidorna till EU Code Week för <a href="/resources/learn">elever</a> och <a href="/resources/teach">lärare</a>. '
    ]
];