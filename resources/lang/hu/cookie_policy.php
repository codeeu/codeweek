<?php

return [

    'title' => 'Cookie szabályzat',
    'what' => [
        'title' => 'Mik azok a cookie-k?',
        'text' => '<p>A cookie-k olyan kisméretű szövegfájlok, amelyeket a webhely tárol el az oldalaira látogató felhasználó számítógépén, illetve mobilkészülékén.</p>',
        'first_party' => 'A <strong>belső cookie-k</strong> (first-party cookies) azok, amelyeket az Ön által felkeresett honlap használ. Kizárólag az adott webhely tudja feldolgozni és hasznosítani ezeket. Valamely webhely emellett esetleg külső szolgáltatásokat is igénybe vehet, amelyek saját cookie-kat használnak, ezek az úgynevezett <strong>harmadik féltől származó cookie-k</strong> (third-party cookies).',
        'persistent_cookies' => 'Az állandó (persistent) cookie-k azok, amelyek – a munkameneti (session) cookie-kkal ellentétben – tartósan el vannak mentve számítógépén, tehát nem törlődnek automatikusan, amikor bezárja a böngészőprogramot.',
        'items' => '<p>A Codeweek weboldal első megtekintésekor Ön felkérést fog kapni a <strong>cookie-k elfogadására vagy elutasítására</strong>.</p>

            <p>Ez lehetővé teszi, hogy az oldal egy bizonyos ideig emlékezzen beállításaira (például felhasználónevére, a beállított nyelvre stb.).</p>

            <p>Ennek segítségével az oldalon történő böngészéskor egy adott látogatás során nem kell minden alkalommal újra megadnia adatait.</p>

            <p>A cookie-k a webhelyeinken történő böngészési szokásokkal kapcsolatos anonimizált statisztikai adatok gyűjtésére is szolgálnak.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Hogyan használjuk a cookie-kat?',
        'text1' => '<p>A Codeweek többnyire belső cookie-kat használ. Ezeket a cookie-kat mi állítjuk be és tartjuk karban, nem valamely külső szervezet.</p>',
        'text2' => '<p>Bizonyos oldalaink megtekintéséhez azonban el kell fogadnia külső szervezetek által használt cookie-kat is.</p>',
        '3types' => [
            'title' => '<strong>Három különböző típusú belső cookie-t</strong> használunk, amelyek a következő célokat szolgálják:',
            '1' => 'a látogatók preferenciáinak tárolása',
            '2' => 'oldalaink működőképessé tétele',
            '3' => 'elemzési adatok gyűjtése (a felhasználói szokásokról)',
        ],
        'table' => [
            'name' => 'Név',
            'service' => 'Szolgáltatás',
            'purpose' => 'Cél',
            'type_duration' => 'A cookie-k típusa és használatuk időtartama',
        ],
        'visitor_preferences' => [
            'title' => 'Látogatói preferenciák',
            'text' => '<p>Ezeket kizárólag mi működtetjük és használjuk fel. Ezek a cookie-k a következőket tárolják:</p>',
            'item' => 'azt, hogy Ön beleegyezett-e a cookie-k használatába a honlapon, vagy sem',
            'table' => [
                '1' => [
                    'service' => 'A cookie-k jóváhagyása',
                    'purpose' => 'Tárolja a cookie-kkal kapcsolatos beállításait (hogy ne kelljen újra és újra megadnia azokat).',
                    'type_duration' => 'Belső munkameneti cookie, amely a böngészőprogram bezárásakor törlődik.',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Műveleti cookie-k',
            'text' => '<p>Vannak olyan cookie-k, amelyek nélkülözhetetlenek bizonyos weboldalak működtetéséhez. Ezért ezek esetében nincs szükség felhasználói beleegyezésre. Konkrétan a következőkről van szó:</p>',
            'item' => 'bizonyos informatikai rendszerek által megkövetelt technikai cookie-k,',
        ],
        'technical_cookies' => [
            'title' => 'Technikai cookie-k',
            'table' => [
                '1' => [
                    'purpose' => 'Biztonságos munkamenetet biztosít Önnek a honlapon.',
                    'type_duration' => 'Belső munkameneti cookie, amely a böngészőprogram bezárásakor törlődik.',
                ],
                '2' => [
                    'purpose' => 'Hosszabb ideig biztosít biztonságos munkamenetet Önnek a honlapon a munkamenet böngészőprogram bezárásakor történő elvesztésének megakadályozásával.',
                    'type_duration' => 'Belső tartós cookie, 60 hónap',
                ],
                '3' => [
                    'purpose' => 'A felhasználó által választott nyelvet tárolja',
                    'type_duration' => 'Belső munkameneti cookie, amely a böngészőprogram bezárásakor törlődik.',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Elemzési célú cookie-k',
            'items' => '<p>Ezek a cookie-k csakis belső használatra szolgálnak, segítenek nekünk feltárni, hogyan javíthatjuk szolgáltatásainkat.</p>

            <p>Nyilvántartják, hogy az oldalainkra látogatók – anonim felhasználóként – hogyan, mire használják a honlapot (a gyűjtött adatok nem teszik lehetővé az Ön azonosítását).</p>

            <p>Továbbá ezeket az adatokat nem osztjuk meg harmadik felekkel, és semmilyen más célra nem használjuk fel őket. Az anonimizált statisztikákat megoszthatjuk külső vállalkozókkal, akik a Bizottsággal kötött szerződés alapján kommunikációs projekteken dolgoznak.</p>

            <p>Önnek azonban lehetősége van arra, hogy elutasítsa ezeknek a cookie-knak a használatát – akár a cookie banner megfelelő opciójának kiválasztásával a honlapra történő első látogatáskor, akár az erre <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">vonatkozó oldalon</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'A Matomo nyílt forráskódú szoftveren alapuló szervezeti webanalitikai szolgáltatás',
                    'purpose' => 'Nyilvántartja a honlap látogatóit (kizárólag anonimizált adatokat gyűjt róluk).',
                    'type_duration' => 'Belső tartós cookie, 20 nap',
                ],
                '2' => [
                    'service' => 'A Matomo nyílt forráskódú szoftveren alapuló szervezeti webanalitikai szolgáltatás',
                    'purpose' => 'Azonosítja azokat az oldalakat, amelyekre az adott felhasználó ellátogatott ugyanabban a munkamenetben (kizárólag anonimizált adatokat gyűjt a felhasználókról).',
                    'type_duration' => 'Belső tartós cookie, 30 perc',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Harmadik féltől származó cookie-k',
        'items' => [
            '1' => '<p>Egyes oldalainkon feltüntetjük külső szolgáltatók, például a YouTube, a Facebook és a Twitter tartalmait.</p>

                <p>Ahhoz, hogy meg tudja jeleníteni ezeket a harmadik fél által szolgáltatott tartalmakat, Önnek el kell fogadnia a kérdéses szolgáltató szolgáltatásnyújtási feltételeit. Ez magában foglalja a cookie-k használatára vonatkozó feltételeket is, amelyek felett nekünk nincs befolyásunk.</p>

                <p>Ha Ön azonban nem kívánja megtekinteni ezeket a tartalmakat, nem kerülnek elhelyezésre harmadik féltől származó cookie-k az Ön eszközén.</p>Külső szolgáltatók a Codeweek weboldalán',
            '2' => 'Ezek felett a külső szolgáltatások felett a Codeweek weboldalnak semmiféle befolyása nincs. A szolgáltatók bármikor módosíthatják szolgáltatási feltételeiket, a cookie-k célját és használatát stb.',
        ],
    ],
    'how-manage' => [
        'title' => 'Hogyan állíthatja be a cookie-kat?',
        'items' => '<p>Önnek lehetősége van arra, hogy <strong>kezelje és/vagy tetszés szerint törölje</strong> a cookie-kat – az ezzel kapcsolatos részletes tájékoztatásért látogasson el az <a
                        href="https://aboutcookies.org">aboutcookies.org</a> honlapra.<p><strong>Cookie-k eltávolítása az eszközéről</strong></p>

            <p>Ön a böngészési előzmények törlése révén el tudja távolítani az összes cookie-t eszközéről. Ezzel minden felkeresett weboldalhoz tartozó cookie-t el tud távolítani.</p>

            <p>Ne feledje azonban, hogy az előzmények törlésével elveszít bizonyos elmentett információkat is (pl. bejelentkezési adatok, keresési beállítások).</p><strong>Webhelyspecifikus cookie-k kezelése</strong><p>Ha részletesebben meg szeretné határozni a webhelyspecifikus cookie-k használatával kapcsolatos opciókat, ellenőrizze és módosítsa tetszés szerint az Ön által használt böngésző adatvédelmi és cookie-kra vonatkozó beállításait.</p><strong>Cookie-k letiltása</strong><p>A jelenleg használt korszerű böngészőprogramok többsége lehetővé teszi a felhasználóknak, hogy minden cookie-t letiltsanak az eszközükről, ez esetben azonban esetlegesen minden honlapon külön-külön kell a szükséges beállításokat elvégezni. Előfordulhat, hogy egyes szolgáltatások és funkciók egyáltalán nem működnek megfelelően (pl.: felhasználói profil létrehozása, bejelentkezés).</p><strong>Az analitikai cookie-kkal kapcsolatos beállítások</strong><p>Az Analytics cookie-jaival kapcsolatos beállításokat az erre <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">vonatkozó oldalon</a> tudja elvégezni.</p>',
    ],
];
