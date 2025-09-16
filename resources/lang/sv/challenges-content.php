<?php

return [
'create-your-own-website-with-html-and-css' => [
    'title' => 'Skapa din egen webbplats med HTML och CSS',
    'author' => 'Marko Šolić',

    'purposes_title' => 'Syftet med utmaningen',
    'purposes' => [
        'Syftet med denna utmaning är att introducera nybörjare till webbutveckling.',
        'Genom att slutföra projektet lär sig deltagarna grunderna i HTML och CSS, som är grundläggande för att skapa och styla webbsidor.',
        'Utmaningen betonar praktiskt lärande och hjälper dig att bygga en egen webbplats från grunden.',
        'Du får viktiga färdigheter i webbdesign och blir tryggare i att bygga din online-närvaro.'
    ],

    'description_title' => 'Beskrivning av utmaningen',
    'description' => [
        'Webbplatser är grunden för närvaro på internet. I denna lektion lär du dig använda HTML för att strukturera innehåll och CSS för att styla och skapa din första webbplats.',
        'Genom roliga steg skapar du en sida som kan innehålla text, bilder, färger och länkar.'
    ],

    'target_audience_title' => 'Målgrupp',
    'target_audience' => [
        'Utmaningen riktar sig till nybörjare som vill lära sig skapa webbplatser.',
        'Perfekt för personer som är nya inom webbutveckling, studenter eller den som är nyfiken på hur webbplatser byggs.',
        'Ingen tidigare programmerings-erfarenhet krävs.'
    ],

    'experience_title' => 'Erfarenhet',
    'experience' => [
        'Detta är en utmaning för nybörjare. Grundläggande datorvana (t.ex. arbete i en textredigerare) kan hjälpa, men är inte nödvändigt.',
        'Utmaningen är utformad som en introduktion till HTML och CSS.'
    ],

    'duration_title' => 'Tidsåtgång',
    'duration' => 'Utmaningen beräknas ta cirka 1–2 timmar beroende på din erfarenhet och hur mycket du utforskar utöver grunderna.',

    'materials_title' => 'Rekommenderade verktyg:',
    'materials' => [
        'Dator / laptop',
        'Vanlig textredigerare, t.ex. Anteckningar (Windows) eller TextEdit (Mac)'
    ],

    'instructions_title' => 'Instruktioner',
    'instructions' => [
        'Tips till lärare innan ni börjar:',
        'Om du är ny inom webbutveckling – ingen fara! Här är några tips för att guida eleverna genom processen:',
        'Börja med grunderna: förklara kärnkoncepten i HTML (webbsidans struktur) och CSS (elementens stil).',
        'Var tålmodig och ge eleverna tid att förstå syftet med varje tagg och egenskap.',
        'Förklara strukturen: när du introducerar HTML-taggar, visualisera hur dokumentet är uppbyggt.',
        'Visa relationen mellan öppnings- och stängningstagg, attribut och nästning.',
        'Undvik vanliga misstag: nybörjare glömmer ofta att stänga taggar korrekt eller placerar måsvingar {} fel i CSS.',
        'Påminn om att regelbundet kontrollera syntaxfel.',
        'Interaktivt lärande: uppmuntra eleverna att experimentera med att ändra text och stilar.',
        'Visa hur små ändringar i HTML eller CSS syns direkt efter att webbläsaren uppdaterats.',
        'Var öppen för kreativitet: det finns inget enda ”rätt” sätt att designa en webbplats.',
        'Uppmuntra att utforska olika typsnitt, färger och layouter.',
        'Vanliga misstag att se upp för:',
        'Att glömma att länka CSS-filen till HTML-filen.',
        'Felaktig nästning av taggar i HTML.',
        'Stavfel i CSS-egenskaper (t.ex. ”colour” i stället för ”color”).',
        'Att göra strukturen alltför komplex — enkla sidor kan se mycket professionella ut med bara några rader kod!',

        'Steg 1: Förbered miljön',
        'För att skapa en webbplats behöver du inga specialverktyg – en vanlig textredigerare som Anteckningar (Windows) eller TextEdit (Mac) räcker.',
        'En hel webbplats kan göras i en enkel textredigerare; det finns till och med webbplatser på internet som är byggda helt på detta sätt.',
        'Vill du se ett exempel? Titta på Kroatiska Informatikföreningens webbplats: hsin.hr',

        'Steg 2: Grundläggande HTML-dokumentsstruktur',
        'Öppna ett nytt dokument i redigeraren och spara det som index.html',
        'Beroende på din version av Windows eller macOS måste du kanske först aktivera möjligheten att ändra filtillägg, eftersom index.txt ska bli index.html',
        'Skriv i en redigerare som Anteckningar den grundläggande HTML-strukturen:',
        '<!DOCTYPE html>',
        '<html lang="en">',
        '<head>',
        '<target charset="UTF-8">',
        '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
        '<title>My first website</title>',
        '</head>',
        '<body>',
        '<h1>Welcome to my website!</h1>',
        '<p>This is my first website I created using HTML and CSS.</p>',
        '</body>',
        '</html>',
        'Så här ska din webbplats se ut utan CSS (på kroatiska; ditt exempel är förstås på svenska):',

        'Steg 3: Lägg till stilar med CSS',
        'CSS används för att styla element på sidan. Vi börjar med grundläggande stilar som bakgrundsfärg, textfärg och teckenstorlek.',
        'Skapa i samma mapp ett nytt textdokument och kalla det style.css.',
        'Skriv följande i style.css:',
        'body {',
        'background-colour: #f0f8ff; /* Light blue background */',
        'colour: #333; /* Dark Gray Text */',
        'font-family: Arial, sans-serif; /* Font for text */',
        'text-align: centre; /* Align text to centre */',
        '}',
        'h1 {',
        'colour: #4CAF50; /* Green title */',
        '}',
        'p {',
        'font-size: 18px; /* Paragraph font size */',
        'colour: #555; /* Gray-blue text for paragraph */',
        '}',

        'Steg 4: Koppla HTML till CSS',
        'När du har skapat CSS-filen måste du länka den till HTML-filen.',
        'Gör detta i HTML-dokumentets <head>-sektion genom att lägga till följande kodrad:',
        '<link rel="stylesheet" href="style.css">',
        'Då ”vet” HTML-dokumentet att det ska använda stilarna från CSS-filen.',

        'Steg 5: Starta din sida',
        'Spara båda filerna: index.html och style.css.',
        'Dubbelklicka på index.html och öppna filen i webbläsaren.',
        'Nu ser du din webbplats med centrerad text och de grundstilar du har lagt till',
        'Så här ska din webbplats se ut nu:',

        'Främja mångfald inom STEM:',
        'Webbutveckling är för alla! Oavsett om du är elev, vuxen som söker ny karriär eller någon från en underrepresenterad grupp — denna utmaning bjuder in dig att utforska den spännande världen av att skapa webbplatser.',
        'STEM-områdena (vetenskap, teknik, ingenjörsvetenskap och matematik) har historiskt haft brist på mångfald; det är viktigt att uppmuntra alla — oavsett kön, bakgrund eller ursprung — att utforska programmering och teknik.',
        'Alla har unika perspektiv och erfarenheter som kan göra webbutveckling mer kreativ och inkluderande.',
        'När du arbetar med din webbplats, fundera på hur du kan göra den digitala världen till en plats där alla känner sig representerade och välkomna.',
        'Du behöver inte vara teknikexpert för att börja — börja lära dig och bygg vidare därifrån!',

        'Gör din webbplats tillgänglig:',
        'När du bygger en webbplats är det viktigt att så många som möjligt kan använda den, inklusive personer med funktionsnedsättning.',
        'Här är några tips för mer tillgängliga webbplatser:',
        'Kontrast: säkerställ god kontrast mellan bakgrund och textfärg så att texten blir lättare att läsa.',
        'Till exempel fungerar ljus bakgrund med mörk text bäst.',
        'Alt-text för bilder: om du lägger till bilder (i senare steg), lägg till alt-text som beskriver bilden.',
        'Det är särskilt hjälpsamt för användare av skärmläsare.',
        'Semantisk HTML: använd korrekta HTML-taggar för bättre struktur och tillgänglighet.',
        'Använd till exempel <h1> för huvudtitel och <p> för stycken — det hjälper skärmläsare att tolka innehållet.',
        'Fokusera på läsbarhet: använd ett enkelt sans-serif-typsnitt som Arial.',
        'Du kan också öka teckenstorleken för bättre läsbarhet.',
    ],

    'mini_simulation_title' => 'Mini-simulering:',
    'mini_simulation' => [
        'Testa dina kunskaper',
        '1. Vad är HTML?',
        'Programspråk för att skapa bilder',
        'Språk för att strukturera innehåll på webbplatsen',
        'Bildredigerare',
        '2. Vad är CSS?',
        'Språk för att skapa online-databaser',
        'Språk för att styla och layouta webbplatser',
        'Program för att hantera datorfiler',
        '3. Hur kopplar vi CSS till HTML?',
        'Genom att använda <link>-taggen i HTML-dokumentet',
        'Genom att använda <style>-taggar i HTML',
        'Går inte att koppla',
        'Rätta svar: 1.b, 2.b, 3.a',
        'Ändra din sida:',
        'Prova att byta bakgrundsfärg.',
        'Lägg till ytterligare en rubrik (h2) under huvudrubriken.',
        'Lägg till en länk till en annan webbplats, t.ex. Google.',
        'Uppdatera sidan efter varje ändring!',
    ],

    'additional_resources_title' => 'Ytterligare resurser:',
    'additional_resources' => [
        'https://developer.mozilla.org/en-US/docs/Web/HTML',
        'https://developer.mozilla.org/en-US/docs/Web/CSS',
    ]
],


    'train-it-like-fei-fei-li' => [
    'title' => 'Träna som Fei‑Fei Li – ge datorer syn!',
    'author' => 'Chouliara Theodora',
    'purposes_title' => 'Syftet med utmaningen',
    'purposes' => [
        'Lära sig grunderna i maskininlärning och bildigenkänning.',
        'Träna datorn att skilja mellan olika bilder (t.ex. hund vs. katt, dockor vs. nallebjörnar).',
        'Utforska hur AI och maskininlärning används i verkliga livet.',
        'Inspireras av Fei‑Fei Lis insatser inom artificiell intelligens och bildigenkänning.',
        'Uppmuntra flickor att engagera sig i programmering och STEM‑karriärer.'
    ],
    'description_title' => 'Beskrivning av utmaningen',
    'description' => [
        'Träna en AI‑modell – precis som Fei‑Fei Li! Med Teachable Machine lär du datorn att känna igen bilder och upptäcker kraften i maskininlärning samtidigt som du utmanar könsstereotyper i tech.'
    ],
    'target_audience_title' => 'Målgrupp',
    'target-audience' => [
        'Elever i låg- och mellanstadiet (6–12 år)'
    ],
    'experience_title' => 'Erfarenhet',
    'experience' => 'Nybörjare – inga förkunskaper i programmering krävs; passar helt nybörjare.',
    'duration_title' => 'Varaktighet',
    'duration' => '60 minuter',
    'materials_title' => 'Rekommenderade verktyg',
    'materials' => [
        'Teachable Machine (åtkomligt i webbläsare)',
        'Dator eller surfplatta med kamera',
        'Internetanslutning (för att träna modellen)',
        'Leksaker och klassrumsföremål (t.ex. dockor, nallebjörnar) för att samla träningsdata',
        'Projektor eller skärm (valfritt, för demonstrationer i klassrummet)'
    ],
    'instructions_title' => 'Instruktioner',
    'instructions' => [
        'Steg 1: Introducera maskininlärning och Fei‑Fei Li – förklara hur datorer kan känna igen bilder; presentera Fei‑Fei Li och ImageNet.',
        'Steg 2: Öppna Teachable Machine – gå till https://teachablemachine.withgoogle.com/train, välj ”Image Project” och ”Standard Image Model”.',
        'Steg 3: Välj kategorier – t.ex. Dockor och Nallebjörnar.',
        'Steg 4: Samla träningsbilder – använd verkliga objekt eller bilder från nätet och ladda upp dem.',
        'Steg 5: Träna modellen – klicka på ”Train Model” och vänta tills träningen är klar.',
        'Steg 6: Testa modellen – prova med nya objekt/bilder som inte ingick i träningen.',
        'Steg 7: Utvärdera – diskutera noggrannhet, fel och hur modellen kan förbättras.',
        'Steg 8: Spara och dela – använd ”Export Model” eller ”Share” för att spara/dela.'
    ],
    'real-life-applications_title' => 'Tillämpningar i verkliga livet',
    'real-life-applications' => [
        'AI i butik och handel: kameror med AI kan känna igen produkter och hålla koll på lager; självutcheckning kan identifiera varor utan streckkod.',
        'AI och tillgänglighet: AI kan hjälpa personer med synnedsättning att navigera; smarta kameror kan i realtid beskriva vad de ”ser”.'
    ],
],

    'simulate-dice-in-python' => [
    'title' => 'Simulera tärningskast i Python',
    'author' => 'Marko Šolić',
    'purposes_title' => 'Syftet med utmaningen',
    'purposes' => [
        'Introducera elever till slumpgenerering och loopar i Python.',
        'Genom att simulera ett tärningskast får eleverna lära sig hur datorer kan generera slumpmässiga utfall och hur man kan upprepa åtgärder flera gånger med en loop.',
        'Övningen lägger också grunden för att bygga enkla spel och simuleringar.'
    ],
    'description_title' => 'Beskrivning av utmaningen',
    'description' => [
        'Att simulera ett tärningskast är ett utmärkt sätt att lära sig grunderna i slumpmässiga tal i Python.',
        'I denna lektion lär vi oss använda modulen random för att generera slumpmässiga tal och hur man använder dessa tal för att simulera ett tärningskast.',
        'Genom denna uppgift förstår du hur Python kan generera tal inom ett visst intervall.'
    ],
    'target_audience_title' => 'Målgrupp',
    'target_audience' => 'Grund- och gymnasieelever, nybörjare i Python, samt alla som vill lära sig om slumpmässiga tal, spel eller grundläggande programmeringslogik.',
    'experience_title' => 'Erfarenhet',
    'experience' => 'Ingen tidigare programmeringskunskap krävs. Grundläggande datorkunskap räcker.',
    'duration_title' => 'Varaktighet',
    'duration' => '30–45 minuter för en enkel version. Upp till 60 minuter om du utforskar avancerade alternativ (två tärningar, vanligaste kastet, etc.).',
    'materials_title' => 'Rekommenderat verktyg',
    'materials' => [
        'Python installerat på din dator. Om du inte redan har det, ladda ner från den officiella webbplatsen: https://www.python.org',
        'Python IDLE eller en texteditor (t.ex. Visual Studio Code, PyCharm) för att skriva din kod.'
    ],
    'instructions_title' => 'Instruktioner',
    'instructions' => [
        'Steg 1: Förbered miljön – installera Python och öppna IDLE eller en editor.',
        'Steg 2: Skriv programmet – skapa en ny fil dice.py och skriv in följande kod:',
        'import random',
        'print("Välkommen till tärningssimuleringen!")',
        'throw_num = int(input("Hur många gånger vill du kasta tärningen? "))',
        'for i in range(throw_num):',
        '    result = random.randint(1, 6)',
        '    print(f"Kast {i + 1}: {result}")',
        'print("Tack för att du spelade!")',
        'Kontrollera indragningen – den måste stämma exakt!',
        'Steg 3: Förklara koden – random.randint(a, b) returnerar ett heltal mellan a och b (inklusive båda gränserna). Programmet frågar användaren hur många kast som ska göras och använder en loop för att upprepa kastet.',
        'Steg 4: Kör programmet – spara som dice.py, kör i IDLE, ange antal kast (t.ex. 5), och se resultaten.'
    ],
    'quiz_title' => 'Frågesport:',
    'quiz' => [
        'Vilken modul i Python används för att generera slumpmässiga tal?',
        'a) random', 'b) Math', 'c) Time',
        'Vad gör funktionen random.randint(1, 6)?',
        'a) Genererar ett slumpmässigt tal mellan 1 och 6',
        'b) Skriver ut ett slumpmässigt tal på skärmen',
        'c) Skriver ut ett tal mellan 1 och 6',
        'Hur konverterar du användarens inmatning till ett heltal i Python?',
        'a) float(s)', 'b) int()', 'c) p()',
        'Rätt svar: 1.a, 2.a, 3.b'
    ],
    'mini_simulation_title' => 'Mini-simulering:',
    'mini_simulation' => [
        'Ändra programmet:',
        'Lägg till en funktion för att simulera två tärningskast och summera resultaten.',
        'Lägg till en funktion som skriver ut det kastade värde som förekom oftast.'
    ],
    'additional_resources_title' => 'Ytterligare resurser:',
    'additional_resources' => [
        'Python officiella dokumentation – random-modulen',
        'Learn Python'
    ],
],

    'gender-gap-gender-graph' => [
    'title' => 'Könsgap, könsdiagram',
    'author' => 'Theodora S. Tziampazi',
    'purposes_title' => 'Syftet med utmaningen',
    'purposes' => [
        'Förstå hur datavisualisering kan påverka våra uppfattningar.',
        'Identifiera partiskheter i digitala verktyg genom interaktion.',
        'Experimentera med indata för att upptäcka snedvridningar.',
        'Redigera koden för att säkerställa korrekt datarepresentation.',
        'Jämföra rättvisa och partiska datavisualiseringar.',
        'Reflektera över de etiska konsekvenserna av att manipulera data.',
        'Diskutera de verkliga konsekvenserna av snedvridna statistik.',
        'Utveckla kritiskt tänkande om AI och algoritmiska partiskheter.'
    ],
    'description_title' => 'Beskrivning av utmaningen',
    'description' => [
        'Utforska snedvridning i datavisualisering genom att mata in värden, analysera felaktigheter, justera koden och reflektera över hur digitala verktyg påverkar vår uppfattning om könsrepresentation i teknik.'
    ],
    'target_audience_title' => 'Målgrupp',
    'target-audience' => [
        'Grundskoleelever (6–12 år)',
        'Gymnasieelever (12–16 år)',
        'Äldre gymnasieelever (16–18 år)',
        'Lärare och utbildare'
    ],
    'experience_title' => 'Erfarenhet',
    'experience' => [
        'Medelnivå – rekommenderas att ha grundläggande programmeringskunskaper.',
        'Avancerad – för deltagare med starka kodningsfärdigheter och tidigare erfarenhet.'
    ],
    'duration_title' => 'Varaktighet',
    'duration' => '2 timmar',
    'materials_title' => 'Material',
    'materials' => [
        'Scratch 3',
        'Arbetsblad: https://docs.google.com/document/d/1wKwrc825if8-W6QDeNJ3hv2PcPcXIbAw/edit?usp=sharing'
    ],
    'instructions_title' => 'Instruktioner',
    'instructions' => [
        'Använd detta digitala verktyg (skapa stapel): https://scratch.mit.edu/projects/1147892829. Titta inte på koden än. Klicka på den gröna flaggan och ange värden (1–10) som hypotetiskt representerar antalet kvinnor i teknik. Testa flera värden.',
        'Vad märker du?',
        'Är det en bugg eller ett medvetet val?',
        'Hur kan det lösas?',
        'Manuellt (användarnivå): undersök verktyget och alla sprites som kan dras. Finns det någon plats där problemet åtgärdas? Eller där ett oväntat resultat uppstår?',
        'Diskussion: tänk om antalet kvinnor inom teknik underskattas eller överskattas? Vad händer om siffrorna är korrekta men obalansen kvarstår?',
        'Insikt: det sätt vi använder verktyget på (t.ex. placering av komponenter) påverkar resultatet.',
        'Genom kodning (skaparnivå): öppna projektet. Grundutmaning – redigera koden så att den data som visas stämmer med det du skrev in.',
        'Avancerad utmaning – duplicera stapel-spriten, färga den blå (män), ändra dess y-position och skapa en manlig symbol som ny sprite. Ändra koderna för både rättvis och partisk version och undersök hur kodning kan minska eller förstärka gapet.',
        'Lösning (samma kod): https://scratch.mit.edu/projects/1151892036'
    ],
    'discussion_title' => 'Diskussion',
    'discussion' => [
        'Hur kan ett digitalt verktyg vara både opartiskt och partiskt?',
        'Var är partiskheten ”gömd” – i hur vi drar komponenter eller i själva koden?',
        'Kan en snedvriden representation ibland vara användbar?',
        'Kan målet rättfärdiga snedvriden data, eller bör sanningen alltid representeras korrekt?',
        'Hur kan AI reproducera liknande mönster som du såg i denna utmaning?',
        'Extra frågor: Hur samlar vi in data? Hur bearbetar vi den? Hur styr dold statistik i algoritmer vårt beteende?',
        'Insikt: det sätt vi bygger verktyget påverkar resultatet och hur vi ser världen.'
    ],
    'real-life-applications_title' => 'Exempel från verkligheten',
    'real-life-applications' => [
        'Rapporter om mångfald på arbetsplatser – korrekt representation av könsfördelning i statistik.',
        'Mediegrafik – undvika vilseledande visualiseringar när man rapporterar om jämställdhet.',
        'AI och algoritmisk partiskhet – identifiera och minska bias i maskininlärningsmodeller.',
        'Rekrytering och HR-analysverktyg – rättvis representation i beslutsfattande.',
        'STEM-utbildning – använda opartisk data för att öka kvinnors deltagande i teknik.',
        'Offentligt beslutsfattande – rättvis politik baserad på korrekt data.',
        'Sociala medier och kampanjer – rättvisa visualiseringar för att stödja förändring.'
    ],
],

    'dance-with-ally' => [
    'title' => 'Dansa med Ally',
    'author' => 'Kristina Krtalić',
    'purposes_title' => 'Syftet med utmaningen',
    'purposes' => [
        'Lära sig att ansluta micro:bit till Scratch via Bluetooth.',
        'Förstå hur man använder Scratchs micro:bit-tillägg.',
        'Använda micro:bits knappar för interaktion med Scratch-projekt.',
        'Skapa interaktiva spel med hjälp av micro:bit.',
        'Utveckla problemlösningsförmåga och logiskt tänkande.',
        'Öka kreativiteten genom kodning.'
    ],
    'description_title' => 'Beskrivning av utmaningen',
    'description' => [
        'Skapa ett program som gör att en Scratch-figur (sprite) dansar med hjälp av micro:bit.'
    ],
    'educational_goals_title' => 'Lärandemål',
    'educational_goals' => [
        'Programmeringslogik: eleverna använder Scratch-block för händelsebaserade program som reagerar på micro:bits inmatningar; de förstår loopar, villkor och variabler samt lär sig hantera digitala och fysiska in/utdata.',
        'Beräknande tänkande: dela upp problem i mindre delar, använda sensordata från micro:bit (knappar, skakningar) och utveckla algoritmer för att lösa utmaningar.',
        'Felsökning och förbättring: testa, identifiera fel och förbättra Scratch-koden samt interaktionen med micro:bit; rätta fel i realtid och dokumentera ändringar.',
        'Kreativitet och design thinking: skapa egna animationer, spel eller berättelser som bygger på micro:bits indata; uttryck dig själv och följ designprocessen (empati–definiera–prototypa–testa).',
        'Samarbete och kommunikation: arbeta i par eller små grupper för att designa och koda interaktiva projekt; presentera lösningar och förklara val samt kodlogik.'
    ],
    'target_audience_title' => 'Målgrupp',
    'target-audience' => [
        'Grundskoleelever (6–12 år)',
        'Elever i lägre gymnasiet (12–16 år)'
    ],
    'experience_title' => 'Erfarenhet',
    'experience' => 'Medelnivå – grundläggande kunskaper i programmering rekommenderas; deltagarna bör känna till de viktigaste koncepten.',
    'duration_title' => 'Varaktighet',
    'duration' => '60 minuter',
    'materials_title' => 'Material',
    'materials' => [
        'Dator',
        'Scratch (https://scratch.mit.edu/)',
        'Scratch Link (https://scratch.mit.edu/download/scratch-link)',
        'Scratch micro:bit-tillägg (https://scratch.mit.edu/microbit)',
        'micro:bit',
        'Ally-sprite (https://codeweek-s3.s3-eu-west-1.amazonaws.com/chatbot/ally.png)'
    ],
    'instructions_title' => 'Instruktioner',
    'instructions' => [
        'Starta Scratch.',
        'Skapa ett Scratch-konto (om du inte redan har ett).',
        'Starta ett nytt projekt, lägg till en sprite och en bakgrund, och ange spritens startposition när programmet körs.',
        'Lägg till micro:bit-blocken från Scratch-tilläggen.',
        'Koppla micro:bit till datorn och aktivera Bluetooth.',
        'Installera och starta Scratch Link, ladda ner micro:bits HEX-fil och överför den till enheten.',
        'Öppna Scratch micro:bit-tillägget, klicka på den orange knappen och sök efter enheter i närheten.',
        'Välj den hittade enheten.',
        'Skapa ett program där spriten dansar till vald musik när micro:bit skakas (rörelse på X-axeln vänster och höger). Spara projektet.',
        'Utöka projektet: lägg till egna block, styr spriten med micro:bits A/B-knappar, ändra spritens utseende eller rörelser.'
    ],
    'real-life-applications_title' => 'Exempel från verkligheten',
    'real-life-applications' => [
        'Interaktiva dans- och träningsappar: använd micro:bits accelerometer för att spåra rörelser och skapa träningsspel eller verktyg för att lära sig dans.',
        'Gestbaserade animationer och spel: styra karaktärer med handrörelser eller lutning; enkla spel som styrs med rörelser.'
    ],
],

'coding-for-the-ocean' => [
    'title' => 'Kodning för havet – Bygg din AI-bot för att rädda havet',
    'author' => 'Teresa Silvestri',
    'purposes_title' => 'Syftet med utmaningen',
    'purposes' => [
        'Förmågan att använda artificiell intelligens för att lösa miljöproblem.',
        'Kodningsfärdigheter för att skapa och programmera en AI-bot.',
        'Kunskap om klimatförändringar och vikten av att skydda den marina miljön.',
        'Förmåga att lösa problem inom vetenskap och teknik.',
        'Utveckling av logiskt tänkande som tillämpas på verkliga utmaningar.',
        'Kreativitet i att utforma en bot som kan svara på miljöhot.',
        'Praktisk erfarenhet av att använda kodningsplattformar som Code.org.',
        'Lagarbete och samarbete samtidigt som man delar botar och tävlar med klasskamrater.'
    ],
    'description_title' => 'Beskrivning av utmaningen',
    'description' => [
        'Skapa och träna en AI-bot för att skydda havet!',
        'Lär dig koda, lös miljöproblem och utveckla logiskt tänkande för att skydda den marina miljön.'
    ],
    'instructions_title' => 'Instruktioner',
    'instructions' => [
        'Gå till Code.org',
        'Öppna din webbläsare och gå till Code.org. Om du inte har något konto kan du skapa ett eller logga in med ett befintligt.',
        'Starta ett nytt projekt',
        'På huvudskärmen väljer du den kurs eller handledning som rör havsskydd. Klicka på ”Start” för att påbörja ditt projekt.',
        'Följ steg-för-steg-guiden',
        'Code.org guidar dig genom en interaktiv handledning. Läs varje instruktion noggrant och slutför varje steg. Se till att följa instruktionerna för att lära dig programmera din AI-bot.',
        'Programmera din bot',
        'Använd de visuella kodblocken för att lära din bot hur den ska reagera på miljösituationer, som att samla in plast eller undvika hinder. Ändra blocken för att passa olika situationer och testa botens beteende.',
        'Testa din bot',
        'När du har skrivit koden testar du din bot för att se hur den hanterar utmaningarna. Om boten inte fungerar som förväntat, gå tillbaka och ändra den och testa den igen tills den fungerar bra.',
        'Dela din bot med klassen',
        'När din bot är klar, kopiera projektlänken och dela den med dina klasskamrater. Delta i tävlingen för att se vilken bot som är mest effektiv för att skydda havet.',
        'Se över och förbättra',
        'Efter att du har slutfört utmaningen, granska koden och leta efter sätt att förbättra den. Du kan lägga till fler funktioner i boten för att hantera nya miljöutmaningar.',
        'Dela länken till ditt arbete i din Instagram-bio: tryck på knappen Redigera profil på ditt Instagramkonto och lägg till länken i fältet Webbplats. Skapa därefter ett nytt inlägg, lägg till en skärmdump av ditt arbete, skriv “Länk i bio”, lägg till hashtaggen #EUCodeWeekChallenge och nämn @CodeWeekEU.'
    ],
    'materials_title' => 'Material',
    'materials' => [
        'Programvara: Tillgång till Code.org',
        'Maskinvara: Dator eller surfplatta med internetanslutning.',
        'Onlineverktyg: Webbläsare för att navigera på Code.org eller liknande plattformar.',
        'Stödmaterial: Handledningar och utbildningsresurser från plattformen.',
        'Andra verktyg: Eventuella ljud- eller videoutrustningar för att följa handledningen.'
    ],
    'real-life-applications_title' => 'Verkliga tillämpningar',
    'real-life-applications' => [
        'Artificiell intelligens i havsskydd: Företag och organisationer som The Ocean Cleanup använder AI-drivna system för att samla plast från haven och bekämpa marin förorening.',
        'AI i miljöövervakning: AI-robotar används för att övervaka havsförhållanden, spåra marina djur och upptäcka föroreningar, vilket ökar effektiviteten i miljöskyddsarbetet.'
    ],
    'variations_title' => 'Varianter av utmaningen',
    'variations' => [
        'Utöka utmaningen till andra miljöer: Du kan ändra utmaningen så att AI-robotar skyddar andra ekosystem som skogar, floder eller till och med stadsområden.',
        'Robotarna skulle behöva hantera utmaningar som avskogning eller luftföroreningar.'
    ],
    'duration' => '45 minuter – 1 timme',
    'experience' => 'Nybörjare – Ingen tidigare kodningserfarenhet krävs; lämplig för helt nybörjare.',
    'target-audience' => [
        'Grundskoleelever (6 till 12 år)'
    ],
    'educational_goals' => [
        'Att utveckla grundläggande färdigheter i programmering och artificiell intelligens',
        'Att främja miljömedvetenhet och vikten av att skydda miljön',
        'Att uppmuntra kreativitet och fantasi genom berättande',
        'Att utveckla problemlösning och kritiskt tänkande'
    ],
],

'code-it-like-margaret-hamilton' => [
    'title' => 'Koda det som Margaret Hamilton!',
    'author' => 'Chouliara Theodora',
    'purposes' => [
        'Studenterna kommer att lära sig grundläggande blockbaserade kodningskoncept med Scratch Jr för att skjuta upp en rymdfarkost, precis som Margaret Hamilton, kvinnan som programmerade koden för Nasas Apollo för att nå månen.',
        'Verksamheten kommer också att bidra till att bryta ned könsstereotyper genom att lyfta fram en kvinnlig programmerares bidrag till utforskning av rymden och uppmuntra flickor att börja programmera och göra STEM-karriärer.'
    ],
    'description' => 'Programmera en rymduppskjutning i Scratch Jr inspirerad av Margaret Hamilton! Koda en nedräkning, starta en rymdfarkost och bryta könsstereotyper genom att uppmuntra flickor i Coding!',
    'instructions' => [
        'Inledning: Läraren presenterar rymduppdrag och skickar människor till månen och presenterar Margaret Hamilton och hennes bidrag till Apollo planering. Detta följs av en diskussion om vad programmering är och hur vi kan ge instruktioner till en dator.',
        'Programmeringsaktivitet: Margaret Hamilton kodar och räknar ner och rymdfarkosten går mot månen.',
        'Öppna appen Scratch Jr. och skapa ett nytt projekt.',
        'Ta bort tecknet.',
        'Välj bakgrund med mellanslag (Steg1 png).',
        'Välj bland karaktärerna en kvinna, ett rymdskepp och jorden (steg 2 png).',
        'Ändra storlek på tecknen genom att klicka så många gånger som behövs på Blocket ”Krympa” eller ”Växa” (steg 3 png).',
        'Flytta tecknen till rätt position (steg 4 png).',
        'Skriva programmen så att kvinnan räknar ner och när hon är klar med sina ord, rymdskeppet går upp. För att uppnå detta, när den gröna flaggan trycks kvinnan ska säga de ord du väljer och sedan skicka ett meddelande. Rymdskeppet bör ta emot meddelandet med samma färg och med rätt rörelse blockerar rymdskeppet borde gå upp. Du kan också göra rymdskeppet mindre när det rör sig för att programmera rymdskeppet kan du använda enkla block eller upprepningsslingan. (Steg 5 png).',
        'Kör skriptet genom att trycka på den gröna flaggan.'
    ],
    'materials' => [
        'Tablet eller PC (om möjligt rekommenderar vi i första hand att du använder en surfplatta) med Scratch Jr. installerat (https://www.scratchjr.org/ för surfplattor och https://jfo8000.github.io/ScratchJr-Desktop/ för Windows eller Mac).',
        'Tryckta bilder av Margaret Hamilton och Apollo 11-uppdraget (valfritt).',
        'Utskrivbara kort med Scratch Jr.-kommandon (https://www.scratchjr.org/teach/resources) - (tillval).',
        'Projektor (tillval).'
    ],
    'real-life-applications' => [
        'Verkliga tillämpningar:',
        'Denna aktivitet är inte bara en introduktion till programmering, utan är kopplad till verkliga händelser och tillämpningar inom vetenskap och teknik: Margaret Hamilton utvecklade mjukvaran för Apollo Guidance Computer, som tillät Apollo 11 att landa säkert 1969. Aktiviteten hjälper barn att förstå hur datorer behöver tydliga och korrekta kommandon för att utföra ett uppdrag - precis som NASA använd kod för att nå månen. Blockprogrammering, som i Scratch Jr, är det första steget för att förstå mer komplex programmeringsspråk som för närvarande används i rymduppdrag, robotteknik och artificiella Samma principer används vid utvecklingen av autonoma system, system för såsom Mars utforskningsrobotar (nyfikenhet, uthållighet).',
    ],
    'variations' => [
        'Variationer/förslag:',
        'Om studenterna är nya i appen kan du skapa projekten först med de tryckta block.',
        'Lägg till fler karaktärer som planeter, stjärnor eller kometer.',
        'Beroende på ålder och barnens upplevelse med ScratchJr-appen kan ytterligare utmaningar kan läggas till, såsom programmering av rymdskeppet för att undvika hinder.',
        'Eleverna kan också lägga till en annan sida som visar rymdskeppet som landar på månen.',
        'I stället för att använda ”Say”-blocket kan blocket ”Play Recorded Sound” användas och elevernas röster hörs.',
        'Lägg till astronauttecken där du redigerar ansikten och lägger till elevernas foton.'
    ],
    'duration' => '60 minuter',
    'experience' => 'Intermediate - Viss grundläggande kodning kunskap rekommenderas; deltagarna bör vara bekanta med grundläggande programmering koncept.',
    'target-audience' => [
        'Små barn (5–7 år)'
    ]
],
    'chatbot' => [
        'title' => 'Skapa en chattbot',
        'author' => 'EU Code Week Team',
        'purposes' => [
            'Att koda interaktiva gåtor',
            'Att använda kod för att skapa dialoger mellan en chattbot och en användare',
        ],
        'description' => 'Koda en konversation mellan en chattbot och en användare som försöker lösa en gåta. Försök göra en chattbot som kan chatta som en människa. Istället för en gåta kan du skapa en dialog mellan en chattbot och en användare.',
        'instructions' => [
            'Tänk ut en gåta',
            'Logga in på',
            'eller skapa ett nytt konto. (Tänk på när du skapar ett nytt konto att man inte får använda riktiga namn på Pencil Code-sidan av integritetsskäl.)',
            'Klicka på Imagine [fantisera] och Make Your Own [gör din egen]',
            'Använd block- eller textläget för att skriva din gåta',
            'Du kan också använda',
            'den här koden',
            'och anpassa den till din gåta eller så kan du välja ”Answering a Riddle” [svara på en gåta] i menyn och redigera den',
        ],
        'example' => 'Titta på det här exemplet på en gåta.',
        'more' => [
            'Den här koden har anpassats från Pencil Code-aktiviteten',
            'Answering the Riddle',
        ],
    ],

    'paper-circuit' => [
        'title' => 'Dra ur sladden och koda: skapa en papperskrets',
        'author' => 'EU Code Week Team',
        'purposes' => [
            'Att öka kreativiteten',
            'Att utveckla problemlösningsförmågan',
        ],
        'description' => [
            'Rita något motiv som du väljer själv. Det kan vara en natthimmel, en nyckelpiga, en robot, en julgran eller vad som helst som du kan komma på. Du får gärna göra ditt projekt mer personligt med bilderna från EU Code Week: du kan utforska',
            'EU Code Weeks verktygslåda för lärare',
            'och ladda ner vilken logotyp eller bild du vill. Du kan till och med skapa en papperskretsinbjudan till EU Code Week. Lägg till ett motiverande budskap till din krets för att uppmana andra lärare att delta i Code Week och/eller att titta på den särskilda webbplatsen för skolor.',
        ],
        'instructions' => [
            'Rita ett föremål och bestäm vilka punkter som ska lysas upp (t.ex. stjärnor)',
            'Gör ett hål i papperet med en penna och stoppa in ett LED-klistermärke i varje upplyst del.   ',
            'Rita en cirkel där du ska sätta knappcellsbatteriet.',
            'Rita ett spår med + och ett med-på andra sidan papperet. Se till att den längre änden på LED-kretsklistermärket är kopplad till ”+”-sidan på batteriet och att den kortare änden är kopplad till ”-”-sidan på batteriet',
            'Lägg koppartejpen på spåren.',
            'Gör en vikning så att när papperet täcker batteriet så tänds LED-ljuset. Du kan använda ett gem för att vara säker på en bra kontakt med koppartejpen',
            'Ta en bild på din papperskrets, dela den på Instagram och förklara varför du tycker att det är värt att delta i det här initiativet.  ',
        ],
        'example' => 'Se några exempel på papperskretsar',
        'materials' => [
            'papper eller kartong',
            'kritor eller tuschpennor',
            'knappcellsbatteri',
            'koppartejp',
            'LED-kretsklistermärken',
            'gem',
        ],
    ],

    'dance' => [
        'title' => 'Skapa en dans',
        'author' => 'EU Code Week Team',
        'purposes' => [
            'Att lära sig grundläggande kodningskoncept',
            'Att lära sig animera karaktärer',
        ],
        'description' => 'I den här utmaningen ska du skapa en uppsättning karaktärer som ska dansa tillsammans. Du kommer att använda ett inbyggt mediebibliotek (Media Library) för att välja ut karaktärer och musikklipp, eller så kan du skapa dina egna. Du kommer att animera karaktärerna så att de dansar och pratar med varandra',
        'instructions' => [
            'Logga in på',
            'som lärare. Skapa elevkonton och dela dem med dina elever. Eller så delar du en klasskod och låter eleverna registrera sig med sin skolmejladress. Om du är elev så kan du registrera dig som elev, men du blir ombedd att ange din förälders e-postadress så att de kan godkänna ditt konto. ',
            'Klicka på',
            'och ge det en rubrik',
            'Gå till',
            'för att lägga till en bakgrund genom att klicka på utrustningsikonen. Välj en bakgrund från mediebiblioteket, ladda upp din egen bild eller du kan till och med ta en bild och ladda upp den. Välj ett ljudklipp och lägg till det till scenen(stage):',
            'Klicka på',
            'för att lägga till karaktärer eller föremål som du kommer att animera så att de kan röra sig, prata och interagera med varandra. Lägg till två eller tre karaktärer som du väljer själv. Du kan rita dina egna karaktärer eller modifiera de befintliga. Lägg till andra kläder till din karaktär genom att klicka på pennikonen. ',
            'Klicka på var och en av karaktärerna och animera dem genom att lägga till följande block',
            'Lägg till ett',
            'say-block',
            'och få dina skådespelare att prata med varandra. Ändra formen på pratbubblorna och typsnittet och storleken på din text',
        ],
        'example' => [
            'Titta på',
            'det här exemplet',
            'på dansade robotar. Du får gärna använda dem och göra en remix. ',
        ],
    ],

    'compose-song' => [
        'title' => 'Skapa en musikalisk komposition',
        'author' => 'EU Code Week Team',
        'purposes' => [
            'Att lära sig kodning med hjälp av musik',
            'Att urskilja musikgenrer och instrument',
            'Att komponera en låt genom att mixa ljudklipp',
        ],
        'description' => 'I den här utmaningen ska du skapa en musikkomposition med hjälp av programmeringsspråk. Du kan använda inbyggda ljudklipp eller spela in dina egna och mixa dem för att skapa en musikkomposition. Kör din kod i Digital Audio Workstation och lyssna på den musik du har kodat. Lek med olika ljud och effekter för att göra ändringar i ditt musikstycke. ',
        'instructions' => [
            'Logga in på',
            'Klicka här för att göra ett skript',
            'Ge ditt skript ett namn och välj',
            'som programmeringsspråk',
            'Börja skriv din kod mellan raderna',
            'och',
            '',
            'Bläddra bland musikklippen i',
            'Sound Library [ljudbibliotek]',
            'och välj de musikgenrer, artister och instrument du gillar',
            'För att lägga till ett ljudklipp till din låt, skriver du',
            'Mellan parentestecknen ska följande fyra parametrar finnas med, åtskilda av kommatecken',
            'Ljudklipp',
            'Placera markören mellan parentestecknen, gå till Sound Library, välj ett klipp och klistra in det genom att klicka på den blå klistra-in-ikonen',
            'Spårnummer',
            'med hjälp av spår kan du organisera dina ljud utifrån instrumenttyp(sång, bas, trummor, keyboard, osv.). Lägg till så många spår(instrument) som du vill. Spåren visas som rader som går tvärs över din Digital Audio Workstation',
            'Start measure [starta takt]',
            'visar när ditt ljud kommer att börja spela. Takter är musikaliska tidsenheter. En takt är fyra slag',
            'End measure [Slut på takt]',
            'visar när ditt ljud kommer att sluta spela',
            'En sådan kodrad kommer se ut så här',
            'Du kan lägga till olika effekter, t. ex. volym för att höja ljudet på din komposition. Volymen går från-60,0 decibel till 12,0 decibel där 0,0 är grundvolymen. ',
            'Skriv',
            'I parentesen skriver du spårnumret, VOLUME, GAIN, volymnivån, takten när den startar, nivån och takten när den slutar',
            'Det här är ett exempel på en intoningseffekt',
            'och en uttoningseffekt',
        ],
        'example' => [
            'Lyssna på',
            'ett exempel på en låt kodad med Earsketch',
            'Du kan importera koden och redigera den',
        ],
    ],
    'sensing-game' => [
        'title' => 'Skapa ett videosensorspel',
        'author' => 'EU Code Week Team',
        'purposes' => [
            'Att koda animerade objekt',
            'Att utveckla förståelse för hur man kontrollerar digital animation med fysisk rörelse',
            'Att komponera en låt genom att mixa musikklipp',
        ],
        'description' => 'I den här utmaningen kommer du att skapa ett enkelt spel där en videokamera används som en sensor för att upptäcka rörelse, vilket betyder att du kommer att kunna kontrollera dina animation med fysiska rörelser. I det här spelet är uppgiften att samla så många EU Code Week-bubblor som möjligt på 30 sekunder. Istället för att samla bubblor kan du skapa ett spel där du jagar en karaktär eller smäller ballonger med händerna. ',
        'instructions' => [
            'Logga in på',
            'Klicka på',
            'Lägg till ett tillägg',
            'och välj',
            'Video – Känna av',
            'Den kommer att registrera hur fort ett föremål rör sig. Om siffran är lägre, kommer den att vara känsligare för rörelse.',
            'Lägg till en sprajt. Välj ett sound [ljud] och lägg till det till din sprajt. Om du vill kan du lägga till',
            'Skapa klon av',
            'för att dubblera din sprite. ',
            'Skapa två variabler: en för',
            'Poäng',
            'och den andra för',
            'Timer',
            'och lägg till dem till din sprite. Ställ in timern på 30 och lägg till',
            'Ändra Timer med-1',
            'Skapa en ny sprajt',
            'Spelet slut',
            'för att avsluta spelet. Du kan också skapa en sprite med titeln på ditt spel, t. ex. Samla in alla EU Code Week-bubblor. ',
        ],
        'example' => [
            'Spela ett videosensorspel Samla in alla EU Code Week-bubblor. Gör gärna en remix av',
            'det här projektet',
        ],
    ],

    'calming-leds' => [
        'title' => 'Lugnande LED-ljus: skapa en enkel enhet med micro:bit',
        'author' => 'Micro:bit Educational Foundation',
        'duration' => '20 minuter',
        'materials' => [
            'en micro:bit-enhet och ett batteripaket(om det finns tillgängligt)',
            'en laptop eller surfplatta där du kan besöka Microsoft MakeCode och Youtube',
            'microbit. org för aktivitetsresurserna',
        ],
        'description' => 'Eleverna skapar en digital enhet med hjälp av LED-ljus som kan hjälpa dem att styra sin andning och känna sig lugnare. De blir ombedda att skriva lite enkel kod, utforska animeringar och sekvenser. ',
        'instructions' => [
            'Målet är att skapa en fungerande LED-enhet som man kan använda för att styra sin andning. Enheten kan skapas på en fysisk micro:bit-bräda eller i simulatorn i MakeCode-redigeraren. ',
            'Utmaningen kan genomföras med hjälp av MakeCode-redigeraren och genom att man skriver en enkel kodsekvens så som visas i videon / skärmdumpen. ',
            'För att utveckla utmaningen kan eleverna utforska olika animationer och vara kreativa med vilken animation de skulle vilja se för att kunna känna sig lugna eller glada',
            'Mer information och videoinstruktioner via',
            'den här länken',
        ],
        'example' => 'Besök den här sidan för instruktioner och videor av den genomförda utmaningen plus om hur man kodar',
        'purposes' => [
            'Att utforma en enkel digital artefakt som kan vara till hjälp',
            'Att utforska sekvenser och animeringar och hur de fungerar',
            'Att testa och felsöka enkel kod',
            'Att upprepa en design genom att göra animeringarna snabbare eller långsammare',
        ],
    ],
    'computational-thinking -and-computational-fluency' => [
        'title' => 'Datalogiskt tänkande och datalogiskt flyt med ScratchJr',
        'author' => 'Stamatis Papadakis – Ambassadör för EU Code Week Grekland',
        'purposes' => [
            'Att bekanta sig med nya kommandon och gränssnitt. ',
            'Att skapa enkla program med enkla orsak-verkan-kommandon. ',
            'Att utföra enkel felsökning genom att testa sig fram. ',
        ],
        'description' => 'I den här utmaningen kommer barn att införliva koncept från datalogiskt tänkande i sina projekt genom att använda appen ScratchJr för att göra sina berättelser mer engagerande, spännande och känslosamma. ',
        'instructions' => [
            'ScratchJr kräver inte att barnen kan läsa och skriva. Alla instruktioner och menyval kan identifieras med hjälp av symboler och färger. Utmaningen kan genomföras i klassrummet, i labbet eller till och med utomhus eftersom den inte kräver internet. ',
            'Barnen använder staden som bakgrund och kodningsblock för att få en bil att köra genom staden. ',
        ],
        'example' => [
            'Barnen kan använda ljud-och rörelseblock och starta om-block för att få karaktärerna att dansa. ',
            'Barnen väljer en bakgrund och en karaktär och använder rörelseblock för att få bilen att köra genom staden Barnen kan använda hastighetsblocket för att få karaktären att röra sig snabbare eller långsammare. ',
        ],
        'materials' => [
            'Gratisappen',
            'fungerar i olika operativsystem och på olika typer av smarta enheter',
            'Webbplatsen',
            'innehåller också mycket gratis utbildningsmaterial',
        ],
        'duration' => '90 minuter',
    ],
    'ai-hour-of-code' => [
        'title' => 'AI-timme med kod',
        'author' => 'Minecraft Education Edition',
        'purposes' => [
            'Att skapa kodningslösningar som omfattar sekvenser, event, loopar och if-satser',
            'Att dela upp de steg som behövs för att lösa ett problem i en exakt sekvens av instruktioner',
            'Att utforska kodningskoncept',
        ],
        'description' => 'En by hotas av en brand och behöver din hjälp med att koda en lösning!Möt din kodningsassistent, Minecraft-agenten, och programmera sedan agenten till att ta sig runt i skogen och samla in data. Dessa data kommer att hjälpa agenten att förutsäga var det kommer att uppstå bränder. Koda sedan agenten till att hjälpa till att förhindra att branden sprider sig, rädda byn och få livet att återvända till skogen. Lär dig grunderna i kodning och utforska ett exempel på artificiell intelligens från verkligheten. ',
        'instructions' => 'Ladda ner lektionsplaneringen här',
        'materials' => [
            'Installera Minecraft: Education Edition',
            'Efter att du installerat Minecraft Education Edition, finns utmaningen på',
            'den här webbplatsen',
        ],
    ],
    'create-a-dance' => [
        'title' => 'Skapa en dans med Ode to Code!',
        'purposes' => 'Att öva på kodning på ett kul sätt och känna gemenskap med dem som deltar i EU Code Week. ',
        'description' => [
            'Skapa en dans med Ode to Code!Använd',
            'Handledningen för Dansparty',
            'för att koda en dans till Ode to Code. EU Code Weeks officiella låt finns med bland de låtar man kan välja i Dansparty. ',
        ],
        'instructions' => [
            'Instruktionerna visas som videor i',
            'handledningen',
            'och de står också högst upp på varje nivå',
        ],
        'example' => 'Särskilt uppmärksammade verk av elever finns också på följande sida',
        'materials' => 'Handledningen för The Code. org',
    ],
    'create-a-simulation' => [
        'title' => 'Skapa en simulering!',
        'purposes' => [
            'Att lära sig om simuleringar och samtidigt introducera följande variabler: skapa en folksamling, återhämtningsnivåer, bära munskydd och vacciner. ',
            'Att aktivera förkunskap om virusutbrott i verkliga världen som kan tillämpas på ett fiktivt scenario. ',
        ],
        'description' => 'Skriv kod för att skapa och köra dina egna simuleringar av virusutbrottet i Monster Town. Lär dig att koda och skapa prognoser för vad som kommer att hända med invånarna i Monster Town. ',
        'instructions' => [
            'Instruktionerna visas som videor i',
            'handledningen',
            'och de står också högst upp på varje nivå',
        ],
        'example' => 'När du är färdig kan du dela din simulering med andra. Dela ditt budskap om vad du tror vi kan göra för att hjälpa andra att hålla sig friska när ett virus kommer till stan. ',
        'materials' => 'Handledningen för The Code. org',
    ],
    'create-your-own-masterpiece' => [
        'title' => 'Skapa ditt eget mästerverk!',
        'audience' => 'Lämpligt för alla åldrar',
        'purpose' => 'Att introducera datavetenskapliga koncept på ett visuellt sätt och inspirera till kreativitet',
        'description' => 'Skapa ditt eget mästerverk med konstnären!Använd kodblock för att få din konstnär att skapa ett unikt konstverk. ',
        'instructions' => 'Instruktionerna står högst upp på varje nivå',
        'example' => 'Exempel på konstnärer finns på den här sidan under Drawing [rita]',
        'materials' => ['Den första nivån av handledningen finns', 'HÄR'],
    ],
    'cs-first-unplugged-activities' => [
        'title' => 'CS First Unplugged-aktiviteter',
        'purposes' => [
            'Att stödja elever som läser på distans',
            'Att ge alla en paus från skärmarna',
        ],
        'description' => 'CS First Unplugged är en serie aktiviteter som introducerar datavetenskapliga koncept för eleverna utan att man använder en dator. Vi har utformat den här lektionen för att visa att datavetenskap är mycket mer än bara kod. ',
        'instructions' => [
            'Du kan hitta en broschyr om alla aktiviteterna på engelska via den här',
            'länken',
            'samt en lektionsplanering på engelska på den här',
            'Aktiviteterna i den här lektionen kan genomföras individuellt och i vilken ordning som helst',
            'Läraren kan ta en bild av inlärningsprocessen och dela den på Instagram med hashtaggen #EUCodeWeekChallengeGoogle #GrowWithGoogle',
        ],
        'materials' => [
            'Förutom aktivitetsbroschyren så kan vissa av aktiviteterna kräva, eller bli bättre med, ytterligare material.',
            'Små räkneobjekt (som torkade bönor) att använda på kartan för Network a Neighborhood [koppla ihop ett kvarter].',
            'En sax för att klippa ut chifferhjulet till Send a Secret Message [skicka ett hemligt meddelande].',
            'Kartong och lim för att göra chifferhjulet till Send a Secret Message stabilare.',
            'Ett häftstift, en tandpetare eller ett uträtat gem för att sätta ihop chifferhjulet till Send a Secret Message.',
        ],
    ],
    'family-care' => [
        'title' => 'Ta hand om familjen',
        'experience' => 'Öppet för alla',
        'duration' => '5 till 10 timmar',
        'author' => '',
        'purposes' => [
            'Att undersöka frågan om att ta hand om familjen som vi står inför varje dag;',
            'Att se problem som möjligheter och skapa kreativa lösningar;',
            'Att använda kod för att på ett innovativt sätt förverkliga dina lösningar;',
            'Att designa affischer och presentera dina lösningar för andra;',
            'Att använda sociala medier för att dina projekt ska ha effekt.',
        ],
        'description' => [
            'Vad tänker du på när vi pratar om hemmet? Ett trevligt hus? En stor middag lagad av dina föräldrar? Ett hemligt utrymme bara för dig? Ett varmt hem tankar våra kroppar och själar med ny energi som en mack. I det moderna livets stress och jäkt är föräldrar alltid upptagna av jobbet. När du hänger med dina kompisar kan du inte lämna dina kattungar ensamma. Men hur tar du hand om dina närmaste när ni inte är tillsammans? Temat för utmaningen är',
            'Ta hand om familjen',
            'Utifrån det temat uppmanas eleverna att ta fram en idé om hur man kan sprida kärlek och omsorg via kodning och hårdvara. Här är några frågor du kan fundera på',
            'Hur många familjemedlemmar finns det hemma hos dig? Vilka är de? Har du haft några problem med att bo med dem? Vilken typ av omsorg behöver de?',
            'Vet du någon som saknar familjeomsorg mer än andra i ditt samhälle? Hur kan du hjälpa dem?',
        ],
        'instructions' => [
            'Bolla idéer och läs på om ämnet omsorg om familjen',
            'Skriv en lista på eventuella problem',
            'Ta fram möjliga lösningar',
            'Välj en lösning',
            'Programmera och bygg upp strukturen',
            'Designa en affisch för att beskriva ditt projekt',
            'Presentera det för dina lärare och familjemedlemmar',
        ],
        'example' => ['Du kan se några exempel här', 'och här'],
        'materials' => [
            'Kodningsverktyg:',
            'eller ladda ner',
            'Pc-versionen',
            'mBlock är ett programmeringsspråk som bygger på Scratch',
            'Den här utmaningen har också anpassats utifrån MakeX Global Spark Competition, ett projektbaserat program för kreativ design för unga i åldern 6 till 13 år.',
            'Det deltagande laget kommer att behöva fokusera på det specifika temat och tänka ut en lösning med hjälp av mjukvaruprogrammering och hårdvarukonstruktion.',
            'Eleverna uppmanas att genomföra utmaningen under Code Week och ta den vidare till internationell nivå för att kommunicera med andra elever och vinna priser.',
            'Mer information finns här:',
            'eller kontakta oss på',
        ],
    ],
    'virtual-flower-field' => [
        'title' => 'Odla din virtuella blomsteräng',
        'author' => 'Jadga Huegle-Meet and Code-coach och en del av SAP Snap!-teamet',
        'duration' => '30–60 minuter',
        'purposes' => [
            'Att bekanta sig med programmering med hjälp av ett enkelt men ändå uttrycksfullt projekt. ',
            'Att lära sig att kodning kan vara konstnärligt och leda till vackra resultat. ',
            'Att lysa upp hösten med färgglada blommor och EU Code Week. ',
            'Att visa upp mångfalden av blommor på jorden. ',
            'Att bidra till de globala målen för hållbar utveckling, särskilt nummer 13 – bekämpa klimatförändringarna, genom att skapa kodningsevent som förbättrar utbildningen om klimatförändringarna genom att öka medvetenheten om ämnet. ',
        ],
        'description' => 'Utveckla ett program i Snap!där du odlar en virtuell blomsteräng med olika typer av blommor och olika antal blomblad. ',
        'instructions' => [
            'Om du behöver inspiration för hur du ska komma igång med den här utmaningen, kan du titta på',
            'den här videon',
            'eller använda',
            'det här dokumentet',
            'för att följa med',
            'Den här utmaningen kan genomföras genom att man programmerar en virtuell blomsteräng i Snap!(eller Scratch) och lägger upp en skärmdump eller ett foto av resultatet på nätet. ',
            'Blomsterängen ska innehålla olika typer av blommor med olika antal blomblad. Helst ska blommorna vara programmerade, vilket betyder att de skapas genom att man stämplar och vänder(eller ritar och vänder) blombladen om och om igen. ',
            'Lägg upp en bild på din virtuella blomsterträdgård med hashtaggen #MeetandCode.',
        ],
        'materials' => [
            'Vi rekommenderar att man använder',
            'men projektet fungerar också i',
        ],
    ],
    'haunted-house' => [
        'title' => 'Hemsökta huset i Hedy',
        'author' => 'Felienne Hermans, Leidens universitet-Ramon Moorlag, I&I-CodeWeek NL',
        'audience' => 'Lärare och utbildare',
        'duration' => 'En eller två timmar beroende på förkunskap',
        'purposes' => [
            'Att skapa en interaktiv berättelse om ett hemsökt hus.',
            'Att lära sig att programmera med Hedy.',
        ],
        'description' => 'Med Hedy kommer du att skapa en berättelse om ett hemsökt hus med interaktiva element. Varje gång koden körs kommer en ny berättelse att skapas. Berättelsen kan också läsas upp av din dator och delas på nätet.',
        'instructions' => [
            'Börja med att öppna en webbläsare och gå till hedycode.com.',
            'Följ instruktionerna för nivå 1-4. Använd flikarna ‘Level [nivå]’ och ‘Haunted house [hemsökta huset].’',
            'Med hjälp av de här nivåerna, kommer vi att skriva en interaktiv berättelse om ett hemsökt hus.',
            'För lärare finns en lektionsplan för Hedy',
            'här',
            'Du kan se en inspelning av när Felienne Hermans presenterar Hedy via',
            'den här länken',
        ],
        'example' => 'Exempel på hemsökt hus på nivå',
        'materials' => ['Hedy på', 'nivå 1 till 4'],
    ],
    'inclusive-app-design' => [
        'title' => 'Inkluderande App-design',
        'author' => 'Apple Education',
        'duration' => '60 minuter + frivilliga extraaktiviteter',
        'purposes' => [
            'Att bolla idéer, planera, skapa en prototyp, och dela en appidé som alla kan få tillgång till och förstå. ',
        ],
        'description' => 'Fantastiska appar startar med fantastiska idéer. I den här aktiviteten ska eleverna komma på en appidé för en fråga som de tycker är viktig och sedan utforska hur man utformar appar med inkludering och tillgänglighet i åtanke. ',
        'instructions' => [
            'Du hittar alla instruktioner via den här länken',
            'Med den här en timme långa lektionsplanen kan lärare vägleda eleverna i att',
            'lära sig om inkluderande App-design',
            'bolla idéer om frågor de tycker är viktiga för att komma på en appidé',
            'skissa upp sina appidéer och planera användaraktiviteter',
            'göra en prototyp av en del av sin app i Keynote',
            'dela demor av sina prototyper och beskriva hur de stöder användare med olika bakgrunder och förmågor',
        ],
        'materials' => [
            'Utforska aktiviteten om inkluderande App-design(Inclusive App Design Activity) i Apple Teacher Learning Center',
            'Keynote på iPad eller Mac rekommenderas men krävs inte. ',
        ],
    ],
    'silly-eyes' => [
        'title' => 'Tokiga ögon',
        'author' => 'Raspberry Pi Foundation',
        'duration' => '25 minuter',
        'purposes' => [
            'Att skapa en projekt med användardeltagande. ',
            'Att göra ett projekt personligt med färg och grafiska effekter. ',
            'Att lära sig om design inom digitalt skapande. ',
        ],
        'description' => 'I det här projektet kommer du att skapa en karaktär med tokiga ögon. Karaktärens stora tokiga ögon kommer att följa muspekaren så att din karaktär får liv. ',
        'instructions' => 'Läs den fullständiga projektbeskrivningen här',
        'example' => 'Titta på Gobo, Under the sea och Don\'t eat donut',
    ],
    'train-ai-bot' => [
        'title' => 'Träna en AI-bot!',
        'purposes' => 'Att lära sig om artificiell intelligens (AI), maskininlärning, dataset, och partiskhet, samtidigt som du utforskar etiska utmaningar och hur AI kan användas för att hantera globala problem.',
        'description' => 'Träna en AI-bot med AI för haven. I den här aktiviteten kommer du att programmera eller träna AI (artificiell intelligens) i att identifiera fisk eller skräp. Låtoss städa havet!',
        'instructions' => [
            'Instruktionerna visas som videor i handledningen',
            'och de står också högst upp på varje nivå',
        ],
        'materials' => [
            'Handledningen finns här',
            'Handledningen finns tillgänglig på över 25 språk',
        ],
    ],
    'build-calliope' => [
        'title' => 'Bygg din egen fitnesstränare med Calliope mini',
        'author' => 'Amazon Future Engineer | Meet and Code feat. Calliope gGmbH',
        'purposes' => [
            'Att på ett lekfullt sätt lära känna sekvenser, animationer, repetitioner och variabler.',
            'Att designa ett strukturdiagram.',
            'Att testa och felsöka kod.',
            'Att optimera ett program genom trial and error, kontrollera och justera användbarheten.',
        ],
        'duration' => '20–30 minuter',
        'description' => 'Deltagarna får utveckla en digitalt kontrollerad prototyp där en färgglad lysande diod används för att återge en förhandsbestämd 10 enheters fitnessövning.',
        'materials' => [
            'Calliope mini StarterBox (i mån av tillgång)',
            'Laptop eller surfplatta där du kan besöka <a href="https://makecode.calliope.cc">https://makecode.calliope.cc</a> eller <a href="https://calliope.cc">https://calliope.cc</a> samt YouTube för att få tillgång till resurser för aktiviteten.',
        ],
        'instructions' => [
            'Kom igång genom att skapa en plan och bestämma ordningen på övningsenheterna.  Använd schemat och programmera RGB-dioderna på Calliope mini så att de visar de 5 färgerna i det fördefinierade tempot. Skapa sedan en variabel för tempot och programmera repetitioner med hjälp av loopar.',
            'Kom ihåg att om du genomfört programmet på ett sätt som du gillar, kan du också dela det med oss på info@calliope.cc – vi vill väldigt gärna se vad du åstadkommer med det! Förresten skänker vi bort Calliope mini-exemplar till 30 av dem som lämnat bidrag!',
            'Dela QR-koden för ditt projekt på Instagram, lägg till hashtaggen #EUCodeWeekChallenge och nämn @CodeWeekEU.',
        ],
        'example' => [
            'Även om du sitter vid datorn kan du bli sportig också.',
            'Skapa en fitnessprototyp med Calliope mini, som också kan testas i simulatorn. Utmaningen görs i MakeCode-redigeraren genom att du programmerar en enkel kodsekvens (se skärmdump).',
            'Välj 5 olika färger och tilldela en fitnessövning till var och en av dem, t.ex. knäböj eller stjärnhopp. Sedan kan färgerna radas upp i valfri ordning och tränas.',
        ],

    ],

    'common' => [
        'share' => 'Dela länken eller QR-koden till ditt projekt på Instagram eller Facebook, lägg till hashtaggen #EUCodeWeekChallange och nämn @CodeWeekEU.',
        'audience' => [
            'Lärare och utbildare',
            'Låg- och mellanstadieelever (6 till 12 år)',
            'Högstadieelever (12 till 16 år)',
            'Gymnasieelever (16 till 18 år)',
        ],
    ],
    'code-a-dice' => [
        'title' => 'Koda en tärning för att slå den',
        'author' => 'Fabrizia Agnello',
        'purposes' => [
            'Koda interaktiva gåtor',
            'Att koda en simulering av ett föremål som rör sig slumpmässigt som kan användas om det riktiga föremålet inte finns tillgängligt',
        ],
        'description' => 'I den här utmaningen kommer du att koda en tärning så att den slås slumpmässigt när du begär det. Du kan välja vilken sorts tärning som helst med det antal sidor du vill, som de som används i rollspel, och du kan också lägga till ljud.',
        'instructions' => [
            'Logga in på Scratch',
            'Välj en bakgrund',
            'Skapa din tärnings-sprite eller sök efter en på nätet och ladda upp den till ditt program',
            'Skapa så många dräkter till din sprite som sidor på den valda tärningen, där var och en av dem visar en egen siffra',
            'Välj hur du vill få tärningen att slås (genom att trycka på en tangent på tangentbordet, klicka på spriten osv.) och skriv koden',
            'Koda spriten att slumpmässigt byta klädsel efter att den har slagits',
            'Lägg till ljudeffekter',
        ],
        'example' => 'Slå en D20-tärning',
    ],
    'personal-trainer' => [
        'title' => 'Personlig tränare med micro:bit',
        'author' => '',
        'purposes' => [
            'Att koda micro:bit för att kunna använda summern och LED-panelen',
            'Att skapa en personlig enhet som kontrollerar din fysiska aktivitet',
            'Att koda miro:bit för att förbättra din hälsa med hjälp av idrott',
        ],
        'description' => 'Genom den här utmaningen kan du koda micro:bit för att kontrollera repetitionstiden för fysisk träning i kombination med vilotid. Du kan mäta din fysiska aktivitet i skolan, hemma eller i parken.',
        'instructions' => [
            'När A+B, skapa en 3-sekunders nedräkningstimer med en musikton varje sekund och visa ordet GÅ!',
            'Under den första övningen, visa en blinkande 2x2-ruta i 20 sekunder. Spela sedan ett ljud och låt rutan lysa med ett fast ljus. Under resten av tiden måste en annan blinkande bild visas i 10 sekunder. När det är färdigt, spela ett ljud.',
            'Upprepa sedan samma handling men visa en 3x3-panel under övningstiden. Upprepa dessa handlingar tills dess att 5x5-panelen visas.',
        ],
        'duration' => '30–40 minuter',
    ],
    'create-a-spiral' => [
        'title' => 'Skapa en spiral',
        'author' => 'Lydie El-Halougi',
        'purposes' => [
            'Att lära sig och öva på loopar och variabler',
            'Att öka kreativiteten i kodningen.'],
        'description' => 'I den här utmaningen kommer du att skriva ett projekt i Scratch för att skapa en spiral, med hjälp av ”penna”-blocken, en loop och en variabel.',

        'instructions' => [
            '”Penna”-blocken',
            'Skapa ett nytt projekt och döp det till Spiral.',
            'Klicka på den lila ikonen ”Lägg till tillägg” längst ner till vänster på skärmen',
            'Välj ”Penna”: ”penna”-blocken är nu tillgängliga för ditt projekt',
            'Dra och släpp blocket ”när grön flagga klickas på” för att påbörja ditt projekt:',
            'Du måste starta med en tom sida: inom ”penna”-blocken, lägg till ”radera allt”-blocket:',
            'Du vill börja rita i mitten av scenen, vilket betyder att din sprite måste gå till mitten av scenen (0,0):',
            'Din sprite kan röra sig utan att rita, eller röra sig och rita:',
            'när du vill att den ska rita kan du använda blocket ”penna ner”',
            'när du inte vill att den ska rita kan du använda blocket ”penna upp”',
            'Nu, vill du rita! Lägg till blocket ”penna ner”:',
            'Hexagonen',
            'Lägg till nedanstående block till ditt projekt:',
            'Du har nu en sjättedel av din hexagon. Du måste upprepa den här sekvensen 6 gånger:',
            'Spiralen',
            'För att skapa spiralen måste du lägga till 2 till längden på varje nästa sida.',
            'För att göra det kommer du att använda en <strong>variabel</strong>.',
            'I ”Variabel”-blocken, klicka på ”Skapa en variabel”',
            'Döp den till längd och klicka sedan på OK:',
            'Spiralen kommer att växa, du måste börja litet: sätt den första längden till 10 och sätt in detta block före loopen.',
            'Lägg in variabeln ”längd” i blocket ”flytta...steg”',
            'För att få spiralen att växa måste du också få längden att växa för varje loop: lägg till blocket nedan i slutet av loopen:',
            'Här är ditt nuvarande projekt:',
            'En vacker spiral',
            'Du ritade en spiral! För att få den att fortsätta och fortsätta kan du byta ut ”upprepa 6”-loopen mot ”för alltid”-loopen:',
            'För att rita en färgglad spiral, lägg till följande block i loopen:',
            'När du börjar om ritar spriten ett oönskat streck. För att förhindra det, lägg till ”penna upp”-blocket i början av projektet.',
            'Här är ditt färdiga projekt:',
            'Grattis! Du skapade en fantastisk sprial!',
        ],

    ],
    'play-against-ai' => [
        'title' => 'Skapa och spela mot AI - Lek sten, sax, påse',
        'author' => 'Kristina Slišurić',
        'purposes' => [
            'för att förstå hur maskininlärningscykeln fungerar.',
            'för att bygga en maskininlärningsmodell med hjälp av Teachable Machine',
            'för att bekanta dig med verktyget Pictoblox och importera den skapade modellen till projektet',
            'för att skapa scenen och karaktärerna, skapa och inleda variabler i Pictoblox',
            'för att inleda spelet, identifiera spelarrörelser, programmera slumpmässiga AI-rörelser',
            'för att skapa och testa ett spel som omfattar artificiell intelligens som motståndare i leken sten, sax, påse.',

        ],
        'description' => 'Vi kommer att skapa en modell med hjälp av Teachable Machine med bilder av tre typer: sten, sax och påse. Modellen kommer att laddas upp i Pictoblox och användas för att skapa ett spel där vi kan spela mot AI.',
        'duration' => '90 minuter',
        'instructions' => [
            'Skapa ett nytt bildprojekt i Teachable Machine med tre typer som du kallar sten, sax och påse. För varje typ ska du med hjälp av en kamera ta minst 400 bilder. Se till att bakgrunden är tom. Träna och exportera modellen. Ladda upp modellen och kopiera länken.',
            'Skapa ett gratiskonto på webbplatsen för Pictoblox. Lägg till ett maskininlärningstillägg och ladda upp modellen. Bestäm scenen, variablerna och spritarna. Inled spelet, identifiera spelarrörelserna, AI:ns rörelser och vem som vinner omgången.',
            'Träna data för spelet.',
            'Testa modellen.',
            'Exportera modellen.',
            'Lägg till maskininlärningstillägg och ladda modellen.',
            'Bestäm scenen, variablerna och spriten.',
            'Inled spelet.',
            'Identifiera spelarens rörelser.',
            'Ställ in slumpmässiga AI-rörelser.',
            'Spela upp slumpmässiga AI-rörelser.',
            'Skapa tre block. Vem vinner omgången?',
            'Om spelaren vinner omgången.',
            'Om AI vinner omgången.',
            'Om omgången blir oavgjord.',
            'Programmera block.',
            'Sten Sax Påse Sprite',
        ],
    ],
    'air-drawing-with-AI' => [
        'title' => 'Rita i luften med AI',
        'author' => 'Kristina Slišurić',
        'purposes' => [
            'för att skriva ett program med hjälp av tillägget ”human body detection”, för att känna igen fingerrörelser framför kameran.',
            'för att koda med enkla block i några få rader kod.',
            'för att se ett exempel på användning av AI',
        ],
        'description' => 'Skapande av ett program som gör det möjligt för användaren att rita i luften med sin hand (pekfingret) framför kameran och allt de ritar visas automatiskt på scenen i Pictoblox.',
        'instructions' => [
            'Skapa ett konto på Pictoblox',
            'följa de visuella instruktionerna för att',
            'lägga till tilläggen ”Human Body Detection” och ”Penna”;',
            'bestämma scenen och lägga till sprite (Penna) och ytterligare sprites för Penna ner, Penna upp, Radera allt; ',
            'skriva en kod för att spriten Penna ska följa fingret',
            'skriva en kod för knapparna\', Penna upp, Penna ner och Radera allt samt för Penna',
            'Nu har du det du behöver för att göra dina egna teckningar och leka med olika färger och pennstorlekar.',
        ],
        'materials' => [
            'En laptop eller en dator med en kamera',
            'Den senaste versionen av PictoBlox nerladdad (rekommenderas) eller PictoBlox online (gratis)',
            'Pictoblox-konto (gratis)',
            'Bra internetuppkoppling',
        ],
    ],
    'emobot-kliki' => [
        'title' => 'Emobot Kliki',
        'author' => 'Margareta Zajkova',
        'purposes' => [
            'Att lära sig grundläggande koncept om maskininlärning och textigenkänning.',
            'Att förstå känslors roll i kommunikation.',
            'Att använda kod för att skapa dialoger mellan en chattbot och en användare.',
            'Att förstå hur datorer kan känna igen känslouttryck genom textanalys och svara utifrån det.',
        ],
        'description' => [
            'Skapa en känslobot i Scratch som kan visa ett glatt ansikte vid positiva budskap (om du säger snälla saker till den), ett argt ansikte för negativa budskap (om du säger elaka saker till den) och ett förvirrat ansikte om budskapet inte är tydligt.',
            'Vår Emobot Kliki kommer att känna igen komplimanger och förolämpningar så att vi kan se hur datorer kan tränas i att känna igen känslouttryck.',
        ],
        'instructions' => [
            'För att börja måste du programmera en lista över regler för vad som är trevligt eller snällt och för vad som är dumt eller elakt.',
            'Logga in på https://machinelearningforkids.co.uk/eller skapa ett nytt konto.',
            'Skapa en ny maskininlärningsmodell genom att lägga till 3 nya etiketter, kalla den första ”snäll”, den andra kallas ”elak” och om du vill att den ska känna igen ditt namn kan du skapa en tredje etikett som heter ”namn”.',
            'Träna den nya maskininlärningsmodellen, testa den och använd den för att skapa en Emobot i Scratch.',
            'Starta Scratch 3-redigeraren, radera kattspriten, lägg in 3 nya sprites skapade med Microsoft Bing Image Creator (glad, arg och inte säker) eller skapa en ny sprite genom att klicka på penselikonen och rita tre kopior av klädseln för ansiktena glad, arg och inte säker.',
            'Klicka på ”kod”-fliken och ange följande script.'],
        'example' => [
            'Dela din Emobot Kliki med dina vänner och lär dig mer om AI och känslor!',
            'I stället för en datorteckning kan du testa något annat, som ett djur. I stället för snäll och elak kan du träna figuren att känna igen andra typer av budskap.',
        ],

    ],
    'craft-magic' => [
        'title' => 'Pysselmagi med AI-handrörelser',
        'author' => 'Georgia Lascaris',
        'purposes' => [
            'Att främja kodningsfärdigheter hos eleverna och låta dem använda grundläggande kommandon.',
            'Att utveckla algoritmbaserade tankeförmågor genom att bryta ner komplexa uppgifter i hanterbara steg.',
            'Att uppmuntra till kreativ problemlösning genom att hitta unika tillämpningar för handrörelser när man ritar och skriver.',
            'Att främja en förståelse för AI-konceptet, särskilt för hur AI gör det möjligt för datorer att känna igen och tolka handrörelser.',
            'Att öka medvetenheten om teknikens betydelse för personer med funktionsnedsättningar.',
            'Att främja problemlösning grundad på samarbete och arbete i grupp hos eleverna när de arbetar tillsammans för att förbättra sina handrörelseprogram.',
            'Att koppla ihop kodning och färdigheter i datalogiskt tänkande med verkliga tillämpningar, framhålla teknikens meningsfulla inverkan på människors liv och hur den är kopplad till FN:s mål för hållbar utveckling.',
        ],
        'duration' => [
            '90 min för elever 10-12',
            '45 min för elever 12-15',
        ],
        'description' => 'Skapa ett Scratch blockbaserat program med hjälp av AI-tillägget ”Human Body” på ett kreativt och engagerande sätt, så att man kan rita på skärmen utan att behöva använda en traditionell mus eller pekskärm.',
        'instructions' => [
            'Gå till https://ai.thestempedia.com och skapa lärar- och elevkonton.',
            'Importera tilläggen ”Human Body Detection”, ”Pen”, ”Text to Speech”.',
            'Lägg till ”Penna”-spriten från biblioteket och skapa 7 sprites (”skriv”, ”sudda”, ”svart”, ”röd”, ”blå”, ”grön”, ”rosa”).',
            'Skriv kommandon för att se vad som händer när ”Penna”-spriten rör någon av de andra spritarna.',
            'Skriv kommandon för att göra det möjligt för kameran att känna igen handpositionen och röra pennan till x- och y-koordinaterna på ditt pekfinger.',
            'Byt klädsel i slutet av rörelsen.',
            'Lägg till ljudeffekter',
        ],
        'materials' => [
            'Programmeringsplattform https://ai.thestempedia.com (gratis)',
            'lärarkonto (gratis)',
            'elevkonto (gratis)',
            'Datorer med kamera',
            'Internetuppkoppling',
        ],
    ],
    'circle-of-dots' => [
        'title' => 'En cirkel av punkter',
        'author' => 'Marin Popov',
        'purposes' => [
            'Att skriva kod för att rita en linje av punkter.',
            'Att skriva kod för att rita en linje av streck.',
            'Att skriva kod för att rita en cirkel.',
            'Skriva kod för att rita en cirkel av punkter (streck).',
        ],
        'description' => 'Rita en cirkel av punkter eller streck.',
        'duration' => '40 minuter',
        'instructions' => [
            'Bygga ett punktblock.',
            'Bygga ett streckblock.',
            'Bygga en cirkel av punkt.',
            'Bygga en cirkel av streck.',
        ],
    ],
    'coding-escape-room' => [
        'title' => 'Skapa ett kodnings-escape room',
        'author' => 'Stefania Altieri och Elisa Baraghini',
        'purposes' => [
            'Att lära ut/lära sig om och reflektera över kodningskoncept.',
            'Att använda enkla kodningsverktyg.',
            'Att utveckla datalogiskt tänkande och problemlösning.',
        ], 'description' => [
            'Skapa en escape-kodningsupplevelse så här:',
            'Du kan använda google form, genial.ly, google presentation, vilket verktyg som helst för att skapa historieberättande baserat på kodning ;).',

        ],
        'duration' => '90 minuter',
        'instructions' => 'Du kan dela in dina elever i små grupper, de kan leka och skapa en annan utmaning med mallen:',

        'materials' => [
            'Vilket verktyg som helst kan användas (Google- och Microsoft-plattformarna för att skapa och dela dokument, presentationer och arbetsblad). Vilken kodningsram, vilket verktyg eller vilken karaktär som helst kopplad till IKT och kodning.',
        ],
        'example' => [
            'Vissa personer som har spelat en väldigt viktig roll inom IKT-historia och grundläggande kodnings- och programmeringskoncept introduceras när man spelar. Det här är det bästa sättet att lära sig och delta aktivt. Spelet kan spelas i lag eller enskilt, som en utmaning eller tävling. Eleverna kan skapa något liknande och utveckla färdigheter som kreativitet och kodningskompetens.',
            'Det här är en väldigt praktisk resurs som kan återanvändas och enkelt kan återskapas. Google forms är ett av de möjliga verktygen. Du kan också använda Google slides, Genial.ly eller Emaze eller något annat verktyg för att skapa berättelser där man måste välja väg och egna äventyr.',
            'Escape-utmaningen är uppdelad i sessioner. Om du kan gissa svaret får du fortsätta. Eleverna måste skapa kodningsuppgifterna.',
        ],
    ],
    'let-the-snake-run' => [
        'title' => 'Låt ormen springa',
        'author' => 'Ágota Klacsákné Tóth',
        'purposes' => [
            'Att koda ormens rörelse på sitt eget micro:bit.',
            ' Att ställa in rätt placering och timing för den gemensamma animeringen.',
        ],
        'description' => 'Eleverna måste skriva kod för att styra ormen genom micro:bits bredvid varandra. Det måste göras på ett sätt som får det att se ut som att ormen springer från ett micro:bit till ett annat.',
        'duration' => '30 minuter',
        'instructions' => [
            'Designa ett spår som går genom flera micro:bits bredvid varandra (t.ex. som bildar en kvadrat på 2x2).',
            'Skriv kod så att en orm rör sig längs ett spår.',
            'Arbeta på din egen enhet och sätt sedan ihop dem och kör koden.',
            'Tänk på timingen och placeringen: Om ormen lämnar ett micro:bit kommer den att dyka upp på nästa micro:bit.',
            'Extra utmaningar: Med micro:bit v2, spela musik tills dess att ormen lämnar din enhet.',
            'Designa ormen genom att ändra ljusstyrkan på LED-lamporna.',
            'Testa längre eller fler ormar.',
        ],
        'example' => [
            'Detta är ett exempel på en 6 pixlar lång orm med 4 micro:bits som bildar en kvadrat på 2x2',
            'Koda start-micro:bitet (läraren kan göra det)',
            'Alla koder inleds av det här micro:bitet, som skickar en radiosignal till andra micro:bits när A-knappen trycks ner.',
            'Koda ormens rörelser',
            'Varje micro:bit måste vara i samma radiogrupp som det inledande micro:bitet.',
            'Alla animeringar startar när radiosignalen tas emot.',
            'Animeringen på det första micro:bitet syns omedelbart, de andra startar när ormen kommer dit.',
            'Tiden mellan de två faserna bestämmer ormens hastighet.',
        ], 'materials' => [
            'micro:bits (för alla elever om det är möjligt)',
            'laptop eller dator för makecode.microbit.org editor',
        ],
    ],
    'illustrate-a-joke' => [
        'title' => 'Illustrera ett skämt med bitsy',
        'author' => 'Margot Schubert',
        'purposes' => 'Att designa ett litet spel där användaren hittar svaret på en skämtfråga.',
        'description' => 'Eleverna designar ett spel där användaren hittar svaret på en skämtfråga när figuren slår till ett föremål på spelplanen. Eleverna använder grundläggande funktioner i bitsy för att genomföra utmaningen.',
        'instructions' => [
            'Tänk ut en skämtfråga. Gå till bitsy och påbörja ett nytt projekt. Det här behöver du:',
            'en avatar - sprite som du kan flytta runt',
            'En vit katt mot en lila bakgrund',
            'Automatiskt genererad beskrivning',
            'ett föremål som din avatar måste gå till',
            'ett rum - bakgrunden i programmet',
            'två budskap: en fråga och ett svar',
            'Det färdiga spelet kan laddas ner som en html-fil.',
        ],
        'example' => 'På den här webbplatsen kan du se ett exempel på ett skämt och det finns en länk till en digital whiteboard:',
        'materials' => 'bitsy körs i en webbläsare',
    ],
    'app-that-counts-in-several-languages' => [
        'title' => 'App som räknar på flera språk',
        'author' => 'Samuel Branco',
        'purposes' => [
            'Att lära sig att skapa en enkel app.',
            'Att lära sig att programmera med hjälp av block.',
            'Att lära sig hur man lägger till etiketter, knappar, bilder, sensorer och media.',
            'Att lära sig hur man organiserar element på en appskärm.',
        ],
        'description' => 'Appen låter dig räkna på flera språk när du trycker på en knapp. När användaren skakar sin smartphone nollställs räkningen. Utmaningen är att lägga till ytterligare ett språk',
        'instructions' => [
            'För att genomföra utmaningen måste du definiera det andra språket som du vill att appen ska räkna på.',
            'Sedan måste du ladda ner flaggan för det landet från internet (t.ex. från Pixabay eller Unsplash) och ladda upp den till plattformen MIT APP Inventor via det element som heter ”flag”, i ”Picture”.',
            'Sedan ska du ta reda på hur landet stavas på svenska och hur man säger lämna och tryck här på det landets språk.',
            'Slutligen måste du lägga till de block som behövs för att appen ska fungera på det nya språket.',
        ],
        'materials' => [
            'För att utveckla en app behöver du en dator eller laptop med internetanslutning.',
            'Skapa ett konto på plattformen MIT APP Inventor, som du kommer åt via <a href=\'https://ai2.appinventor.mit.edu\'>https://ai2.appinventor.mit.edu</a>',
            'Du behöver också installera appen MIT AI2 Companion på den smartphone som du använder för att testa den utvecklade appen.',
        ],
    ],
    'coding-with-art-through-storytelling' => [
        'title' => 'Kodning med konst med hjälp av historieberättande',
        'author' => 'Maria Tsapara och Anthi Arkouli',
        'purposes' => [
            'Att främja förmågor som observation, tolkning och ifrågasättande med hjälp av konst.',
            'Att vara kreativ och samarbeta med andra mot ett gemensamt mål.',
            'Att skapa en algoritm för att återberätta historien.',
        ],
        'description' => 'I den här utmaningen kommer eleverna att inspireras av ett konstverk, skapa en berättelse och illustrera den. De kommer sedan att försöka återberätta berättelsen med hjälp av ett programmerbart robotikkit eller som en frånkopplad aktivitet.',
        'materials' => [
            'Denna aktivitet kan genomföras som en frånkopplad aktivitet eller genom att använda en programmerbar utbildningsrobot som beebot/bluebot/mouse robot.',
            'beebot pilkort eller pilkort för den frånkopplade aktiviteten',
            'på grekiska',
            'För att få veta mer om Project Zeros Thinking Routine Toolbox kan du besöka',

        ],
        'example' => [
            'Läraren arbetar med eleverna för att visa hur man designar en algoritm med korten som kommer att ge Beeboten eller annan robot instruktioner om hur den ska komma till den första händelsen i berättelsen på mattan. Eleverna arbetar i grupper om 3 eller 4 för att designa en algoritm för att få roboten att röra sig till nästa sekvens. Eleverna testar sina algoritmer på klassmattan och tar bort buggar, om det behövs.',
            'De fortsätter att röra sig genom så många berättelser som möjligt',
            'Denna aktivitet kan också genomföras som en frånkopplad aktivitet.',
            'Ett barn är roboten och ett annat barn är programmeraren. Programmeraren skapar en algoritmväg med hjälp av pilkorten för att hjälpa roboten att röra sig från en bild till en annan och återberätta berättelsen. Varje gång som roboten står på en bild ombeds den att berätta en del av berättelsen.',
        ],
        'instructions' => [
            'Läraren ber eleverna att titta på en målning/ett foto.',
            'De använder tankerutinen ”Början, Mitten, Slutet” (Project Zero från Harvard School) för att skapa en berättelse.',
            'Läraren frågar dem ”Om det här konstverket är början/mitten/slutet på en berättelse, vad kan tänkas hända sedan/innan/i slutet?',
            'Eleverna illustrerar händelserna i berättelsen.',
            'Eleverna minns berättelsen och lägger ut händelserna i nätet. Med hjälp av pilkorten skapar de en algoritm som hjälper beeboten att återberätta berättelsen.',
        ],
    ],
    'coding-with-legoboost' => [
        'title' => 'Kodning och programmering med Scratch-tillägget LegoBoost.',
        'author' => 'Lidia Ristea',
        'purposes' => [
            'att bygga modeller med hjälp av LegoBoost.',
            'att utveckla programmeringsfärdigheter i Scratch.',
            'att programmera robotar med hjälp av kommandon som går från enkla till avancerade.',
        ],
        'description' => 'I den här utmaningen kommer eleverna att använda Scratch LegoBoost-tillägget för att skriva in koder i applikationen för att få robotarna att röra sig framåt, bakåt, undvika hinder och lyssna på röstkommandon.',
        'duration' => '120 minuter',
        'instructions' => [
            'Logga in till applikationen Scratch.mit.edu.',
            'Starta Scratch Link och aktivera Bluetooth på laptopen.',
            'Klicka på Lägg till tillägg från Scratch och välj LegoBoost.',
            'Lägg till en bild om EU Code Week.',
            'Ställ in de två AB-motorerna på ON och när de möter ett rött hinder på OFF.',
            'I den gröna färgen är motor A inställd på ON och i den svarta färgen är motor B inställd på ON.',
            'Gröna, röda och svarta hinder kommer att sättas ut på en färdväg.',
            'Lägg till kommandon för rörelse och svängar från pilar och text-till-tal när du stöter på ett hinder.',
            'Testa det!',
        ],
    ],

];
