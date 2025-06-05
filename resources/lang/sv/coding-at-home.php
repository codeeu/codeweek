<?php

return [
    'title' => 'Coding@Home',
    'questions' => 'Frågor',
    'material' => [
        'required' => 'Utrustning som krävs',
        'chequered' => 'rutigt bräde',
        'footprint' => 'brickor med fotavtryck på',
    ],
    'intro' => [
        'title' => 'Introduktion till Coding@Home',
    ],
    'explorer' => [
        'title' => 'Utforskaren',
        'text' => 'Utforskaren är den första aktiviteten för Coding@Home. Flytta runt utforskaren på brädet så att den når mål efter att ha nuddat så många rutor som möjligt. ',
        'questions' => [
            'content' => [
                1 => 'F1. Är det möjligt för utforskaren att beröra alla rutor på brädet med de start- och slutpositioner som visas i videon?',
                2 => 'F2. Vilka start- och slutpositioner hindrar utforskaren från att beröra störst antal rutor på brädet?',
            ],
        ],
    ],

    'right-and-left' => [
        'title' => 'Höger och vänster',
        'text' => 'Höger och vänster är ett spel för både tävling och samarbete. Två lag samarbetar för att skapa en väg till målet, samtidigt som de tävlar om att använda så många som möjligt av de brickor de fått. Det gula laget försöker få in så många vänstersvängar som möjligt och det röda laget försöker att få in så många högersvängar som möjligt.',
        'questions' => [
            'content' => [
                1 => 'F1. När start och mål är arrangerade som i videons första match, är det möjligt för något av lagen att vinna?',
                2 => 'F2. När start och mål är arrangerade som i matchen som Anna vann, var det möjligt att få oavgjort?',
                3 => 'F3. Finns det någon variant av start och mål som är en fördel för något av lagen?',
                4 => 'G2. Utifrån placeringen av start och mål, är det möjligt att uttala sig som den slutliga skillnaden mellan det vinnande laget och det förlorande?',
            ],
        ],
    ],

    'keep-off-my-path' => [
        'title' => 'Ur vägen',
        'text' => 'Ur vägen är ett tävlingsinriktat spel mellan två lag. Man börjar från varsin ände av spelplanen och försöker lägga vägar som hindrar det andra laget. Det lag som lyckas hindra det andra från att lägga sin väg vinner.',
        'questions' => [
            'content' => [
                1 => 'F1. Finns det någon startpunkt som är till fördel för något av lagen?',
                2 => 'F2. Kan det bli oavgjort?',
                3 => 'F3. Har den spelare som börjar en fördel?',
                4 => 'G2. Finns det en vattentät strategi som den spelare som gör det första draget kan använda för att aldrig förlora?',
            ],
        ],
    ],

    'tug-of-war' => [
        'title' => 'Dragkamp',
        'text' => 'Dragkamp är ett spel för både samarbete och tävling. Man börjar längst ned i mitten av spelplanen. Två lag (gult och rött) arbetar ihop för att nå till toppen. Det gula laget försöker nå rutorna på vänster sida medan det röda laget försöker nå rutorna på höger sida.',
        'questions' => [
            'content' => [
                1 => 'F1. Finns det någon strategi som alltid resulterar i seger?',
                2 => 'F2. Har den spelare som börjar någon fördel?',
                3 => 'F3. Om båda spelare är lika duktiga, slutar spelet alltid oavgjort då?',
            ],
        ],
    ],

    'explorer-without-footprints' => [
        'title' => 'Utforskare utan fotavtryck',
        'text' => 'Utforskaren går runt spelplanen från startpunkten till mål och försöker att ha gått på alla rutor. När utforskaren rör sig lämnar den fotavtryck, vilket gör att roboten kan följa stegen genom att se på färgerna. Spelet blir ännu mer utmanande om utforskaren röjer undan fotspåren och bara lämnar kvar färgerna.',
        'material' => 'samt röda, gula och gråa färgpennor',
        'questions' => [
            'content' => [
                1 => 'F1. Vad är skillnaden mellan en spelplan full av färgade fotavtryck och en med färger men inga fotavtryck?',
                2 => 'F2. Vilken spelplan ger mest rörelsefrihet, med samma regler för att svänga som anges med färg?',
                3 => 'F3. Finns det möjliga vägar på spelplanen med bara färger som inte är möjliga på en spelplan med färgade fotavtryck?',
                4 => 'G2. Finns det möjliga vägar på spelplanen med färgade fotavtryck som inte är möjliga på en spelplan med bara färger?',
            ],
        ],
    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Gå så långt du kan',
        'text' => 'Det här spelet går ut på att stanna kvar på spelplanen så länge som möjligt genom att använda färger i stället för fotavtryck. Det blir svårare och svårare, i takt med att din rörelsefrihet minskar',
        'coloured-cards' => 'färgade kort eller röda, gula och grå markörer',

        'questions' => [
            'content' => [
                1 => 'F1. När krockar de två banorna och blockerar varandra?',
                2 => 'F2. Spelet presenteras som ett spel för två spelare. Går det att spela det med tre eller fyra spelare? Behöver vi ändra reglerna?',
            ],
        ],
    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles och Roby',
        'text' => 'Historien om Ada Lovelace och Charles Babbage är intressant. De byggde och programmerade datorer 100 år innan de uppfanns på riktigt',
        'material' => 'modellera och kort blyertspenna',

        'questions' => [
            'content' => [
                1 => 'F1. Föreställ dig att den robot som du byggde av modellera och en penna kan flytta sig vart som helst på spelplanen och, vid behov, rita ut sin väg. Vilka instruktioner skulle du använda för att programmera den?',
            ],
        ],
    ],

    'cody-and-roby' => [
        'title' => 'Cody och Roby',
        'text' => 'Det här är ett rollspel med programmeraren Cody och roboten Roby. I videoklippet visas korten Cody–Roby, som vi från och med nu kommer att använda för att bestämma pjäsernas drag på spelplanen. Cody kommer att använda korten för att ge Roby instruktioner om vart han ska gå på planen',
        'material' => 'rutbräde med bokstäver och siffror, instruktionskort (vänster, höger, rakt fram)',
        'starter-kit' => 'Cody–Roby grundkit',

        'questions' => [
            'content' => [
                1 => 'F1. Var hamnar Roby om han utgår från position C2 och står vänd mot söder och sedan utför den sista instruktionssekvensen i videon?',
                2 => 'F2. Skulle de drag som Roby gör när han utför den sista instruktionssekvensen i videon också kunna beskrivas med hjälp av markörer med fotavtryck eller med färger?',
                3 => 'F3. De tre sorters instruktioner som visas i videon – de gröna, röda och gula korten – utgör en instruktionsuppsättning som kan flytta Roby vart som helst på spelplanen. Kan du hitta på en instruktionsuppsättning som innehåller färre än tre instruktioner för att göra samma sak?',
            ],
        ],
    ],

    'the-tourist' => [
        'title' => 'Turisten',
        'text' => 'Två lag utmanar varandra med hjälp av Cody–Roby-korten. Målet är att vara först med att hitta den instruktionssekvens som visar turisten vägen till de monument som hon vill besöka på spelplanen.',
        'material' => 'Större kort kan användas om du vill spela på golvet',

        'questions' => [
            'content' => [
                1 => 'F1. Vilken instruktionssekvens skulle leda turisten fram till statyn av Rafael i det första exemplet i videon?',
                2 => 'F2. Vilken instruktionssekvens skulle leda turisten fram till Torricini i hertigens palats i det andra exemplet i videon?',
                3 => 'F3. Kan du komma på ett roligt sätt att inkludera något slags fysisk aktivitet varje gång ett av de två lagen drar ett kort att lägga till i programmet? Kom på ett sätt genom att ändra på den stafett som visas i videon',
            ],
        ],
    ],

    'material2' => [
        'chequered-with-labels' => 'Rutbräde med etiketter Instruktionskort',
        'cards' => '24 st. ”gå framåt”, 8 st. ”sväng vänster” och 8 st. ”sväng höger”',
        'larger-cards' => 'Ni kan använda större kort om ni spelar på golvet',
        'video' => 'Videon förklarar även hur ni spelar utan en kortlek',
        'pieces-of-paper' => 'Ni behöver även 24 pappersbitar som placeras på de rutor som ni har besökt',
        'card-alternative' => 'I stället för CodyRoby-korten kan man också använda de kortsymboler som finns här',
        'small-drawings' => 'Små teckningar kan användas för att hjälpa till att berätta historien. De som används i videon finns här',
        'rest-of-cards' => 'I övrigt använde vi korten från CodyRoby, CodyFeet och CodyColor.',
    ],

    'catch-the-robot' => [
        'title' => 'Fånga roboten',
        'text' => 'Fånga roboten är ett brädspel eller golvspel där ni tävlar mot varandra. Den spelare vinner som fångar motståndarlagets robot genom att ta sig fram till rutan den står på. Spelkorten ger en slumpeffekt som gör att båda lagen hela tiden måste justera sina strategier.',
        'questions' => [
            'content' => [
                1 => 'F1. Vilka rutor kan den rosa spelpjäsen (Roby) gå till om han står på mittrutan C3 och pekar mot norr och det rosa laget har 2 ”gå framåt”-kort, 2 ”sväng vänster”-kort och 1 ”sväng höger”-kort?',
            ],
        ],
    ],

    'the-snake' => [
        'title' => 'Ormen',
        'text' => 'Ormen är en sorts patiens som spelas med CodyRoby-kort. Spelet går ut på att flytta ormen över alla rutor på brädet utan att den biter sig i svansen.',
        'questions' => [
            'content' => [
                1 => 'F1. Finns det någon utgångspunkt som gör det omöjligt att besöka alla rutor utan att ormen biter sig i svansen?',
            ],
        ],
    ],

    'storytelling' => [
        'title' => 'Berättande',
        'text' => 'Dagens ämne är berättande! Använd instruktionerna från CodyRoby, fotspåren från CodyFeet eller färgerna från CodyColor för att flytta spelpjäserna på brädet och berätta en historia. Sprid ut olika delar av berättelsen över spelplanen.',
        'questions' => [
            'content' => [
                1 => 'F1. Vilket verktyg är mest mångsidigt när du hjälper Roby att berätta en historia?',
                2 => 'F2. Kan du arrangera delarna till din berättelse på brädet så att det inte går att ta tillbaka alla med CodyFeet?',
            ],
        ],
    ],

    'two-snakes' => [
        'title' => 'De två ormarna',
        'text' => 'Två ormar rör sig på spelbrädet med hjälp av CodyRoby-korten. Målet är att blockera den andra spelaren. Grundregeln är väldigt enkel: du får inte gå in i en ruta där en orm redan har varit. Den orm som kan röra sig fritt längst vinner.',
        'material' => 'CodyRoby-kort, ett spelbräde med 5 × 5 rutor, två spelpjäser, pappersbitar för att markera de rutor som redan har besökts.',
        'questions' => [
            'content' => [
                1 => 'F1. I den situation som visas i videon, om de två spelarna inte drar gula kort för att svänga till vänster, vilka kort är det då bäst för dem att dra?',
            ],
        ],
    ],

    'round-trip' => [
        'title' => 'Tur och retur',
        'text' => 'Lagen turas om. Det första laget programmerar utresan, medan det andra ska föra Roby tillbaka till utgångspunkten. Det verkar enkelt, men det är det inte. Särskilt om du bara planerar dragen i huvudet utan att faktiskt flytta Roby...',
        'material' => 'CodyRoby-kort, ett spelbräde med 5 × 5 rutor, två spelpjäser, pappersbitar för att markera de rutor som redan har besökts.',
        'questions' => [
            'content' => [
                1 => 'F1. Kan det program som tar Roby tillbaka till utgångspunkten någonsin vara kortare (dvs. bestå av färre instruktioner) än programmet för utresan?',
            ],
        ],
    ],

    'meeting-point' => [
        'title' => 'Mötesplatsen',
        'text' => 'Den här gången planerar vi våra drag innan spelet börjar. De två lagen lägger ut kort på bordet för att skapa en serie av instruktioner som de sedan ska använda för att flytta sin robot, men ingen börjar att flytta sin pjäs förrän en av spelarna säger ”Börja!”. Då slutar alla att programmera och spelet tar sin början. Den spelare som sa ”Börja!” vinner bara om de två robotarna, med hjälp av instruktionerna från sina lag, hamnar på samma ruta.',
        'material' => 'CodyRoby-kort, ett spelbräde med 5 × 5 rutor, två spelpjäser.',
        'questions' => [
            'content' => [
                1 => 'F1. Om du tror att det är möjligt för de två robotarna att aldrig mötas, hitta på spelregler som täcker in alla tänkbara situationer.',
            ],
        ],
    ],

    'follow-the-music' => [
        'title' => 'Följ musiken',
        'text' => 'När en serie av programmeringsinstruktioner upprepas regelbundet kan man börja urskilja en rytm. Om vi parar samman varje instruktion med ett ljud kan vi vägleda Roby med hjälp av musik. Det är precis det vi ska göra den här gången. Jag ska skriva ett program för dig med hjälp av olika ljud som representerar olika instruktioner. Sedan ska du flytta Roby runt på spelbrädet genom att följa ljudinstruktionerna.',
        'material' => 'Utöver CodyRoby-korten behövs spelbrädet och en spelpjäs och något som kan göra tre olika ljud. Jag använde tre glas fyllda med olika mycket vatten. Vad kommer du själv att använda?',
        'questions' => [
            'content' => [
                1 => 'F1. Försök att följa instruktionerna i videon genom att låta dig vägledas av ljuden från glasen, utan att titta på korten. Kan du känna igen och följa de instruktioner som ljuden representerar?',
                2 => 'F2. Välj tre ljud som ska representera de tre grundläggande instruktionerna. Hitta på en ljudsekvens som du skulle kunna upprepa hur länge som helst utan att Roby någonsin hamnar utanför brädet.',
            ],
        ],
    ],

    'colour-everything' => [
        'title' => 'Färglägg allt',
        'text' => 'Kan vi guida robotarna runt brädet så att de gör en teckning med sina spår? I den här aktiviteten leker vi med kodning och pixelkonst, där man gör bilder genom att färglägga rutorna på ett spelbräde, precis som pixlar på en skärm.',
        'material' => 'CodyRoby-kort, ett spelbräde och en spelpjäs. För att färglägga rutorna använder du pappersbitar som du lägger på fälten eller så färgar du fälten med färgpennor.',
        'questions' => [
            'content' => [
                1 => 'Går det att rita två hjärtan som i slutet av filmen genom att guida roboten till alla fält som krävs utan att passera samma fält två gånger?',
            ],
        ],
    ],

    'codyplotter-and-codyprinter' => [
        'title' => 'CodyPlotter och CodyPrinter',
        'text' => 'Vad är skillnaden mellan en plotter och en skrivare? Det kan du ta reda på genom att göra den här kodningsövningen som inte kräver någon uppkoppling.',
        'material' => 'Förutom CodyRoby-kitet har jag använt en grön penna och en ny robot i modellera, men det behöver du inte göra.',
        'questions' => [
            'content' => [
                1 => 'Kan du förklara skillnaden mellan en plotter och en skrivare?',
                2 => 'Vilken design skulle RobyPrinter ge genom att röra sig längs brädans linjer om den utför den sekvens med kommandon som beskrivs i slutet av filmen?',
            ],
        ],
    ],

    'boring-pixels' => [
        'title' => 'Tråkiga pixel!/Använd siffror',
        'text' => 'Genom att ge Roby instruktioner om att forma en bild ruta för ruta, pixel för pixel, upptäcker vi att när många fält i följd har samma färg kan vi använda siffror för att göra det intressantare. Datorer gör samma sak...',
        'material' => 'Rutblock, eller ett rutfält med 5 × 5 rutor ritat på ett papper och en tuschpenna. För att beskriva teckningens kod kan du använda papper och penna.',
        'questions' => [
            'content' => [
                1 => 'Försök att göra en rutig design och beskriv den med skurlängdskodning (RLE). Storleken på designen är samma som antalet rutor, med vad är storleken på RLE-representationen?',
            ],
        ],
    ],

    'turning-code-into-pictures' => [
        'title' => 'Omvandla kod till bilder',
        'text' => [
            1 => 'Vi har nu sett att vi kan skapa kod som gör att vi kan rita en bild. Jag har tänkt ut en teckning och använt kod för att omvandla den till bokstäver och siffror, som jag har gett till dig. Skriv upp bokstäverna och siffrorna och använd koden för att återskapa teckningen.',
            2 => 'Här är bilden jag tänkte på – se till att den dyker upp på ditt ritblock och i ritblocket hos alla som känner till koden!',
        ],
        'material' => 'Papper (helst rutigt) och en penna.',
        'questions' => [
            'content' => [
                1 => 'Försök att avkoda och rita bilden som jag beskrev i slutet av filmen.',
            ],
        ],
    ],

    'texts' => [
        1 => 'Coding@Home är en samling korta videor, gör det själv-material, kluriga övningar, spel och kodningsutmaningar för vardagsbruk både hemma och i skolan. Man behöver inga tidigare kunskaper eller elektronisk utrustning för att göra aktiviteterna. Uppgifterna uppmuntrar till datorförståelse och övar kompetensen hos elever, föräldrar och lärare hemma eller i skolan.',
        2 => 'EU:s serie Code Week Coding@Home bygger på initiativet <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> från universitetet i Urbino och CodeMOOCnet Association i samarbete med Rai Cultura. Alessandro Bogliolo är professor i informationssystem på universitetet i Urbino, tillika <a href="/ambassadors?country_iso=IT" target="_blank">Italiens ambassadör för EU Code Week</a> och han koordinerar alla ambassadörer och är styrelsemedlem i Governing Board of the Digital Skills and Jobs Coalition. ',
       3 => 'Om du är intresserad av mer urkopplade aktiviteter eller aktiviteter inom olika programmeringsområden, t.ex. språk, robotik och micro:bit, kan du ta en titt på <a href="/training">"Learning Bits" under EU:s kodvecka</a> med videohandledningar och lektionsplaneringar för grundskolan, högstadiet och gymnasiet. Ta också en titt på EU:s kodveckas resurser för att lära och lära , där du hittar kostnadsfria resurser av hög kvalitet från hela världen för lärare och elever.',
    ],

    
    'coding-at-home-text' => 'En samling korta videos, gör-det-själv-material, pussel, spel och programmeringsutmaningar för daglig användning i familjen såväl som i skolan.',
    'coding-at-home-sub-text1' => 'EU:s kodveckas Coding@Home-serie bygger på  initiativet  <a class="text-dark-blue underline" href="https://www.raicultura.it/speciali/codinginfamiglia/"target="_blank">"Coding in famiglia"</a> som tagits  fram av universitetet i Urbino och CodeMOOCnet Association i samarbete med Rai Cultura. Författaren till Coding@Home videon är Alessandro Bogliolo, professor i informationsbehandlingssystem vid universitetet i Urbino, ambassadör för <a class="text-dark-blue underline" href="https://codeweek.eu/ambassadors?country_iso=IT" target="_blank">den italienska EU:s kodvecka</a>och samordnare för alla ambassadörer samt ledamot i styrelsen för koalitionen för digital kompetens och digitala arbetstillfällen.',
    'coding-at-home-sub-text2' => 'Du behöver inga förkunskaper eller elektroniska enheter för att utföra aktiviteterna. Verksamheten kommer att stimulera datalogiskt tänkande och odla färdigheterna hos elever, föräldrar och lärare hemma eller i skolan.',
];
