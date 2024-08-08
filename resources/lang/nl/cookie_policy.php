<?php

return [

    'title' => 'Cookiebeleid',
    'what' => [
        'title' => 'Wat zijn cookies?',
        'text' => '<p>Een cookie is een klein tekstbestand dat websites opslaan op je computer of mobiele apparaat wanneer je de site bezoekt.</p>',
        'first_party' => '<strong>Directe cookies</strong> zijn cookies van de website die je bezoekt. Alleen die website kan ze lezen. Daarnaast kan een website ook gebruikmaken van externe diensten, die hun eigen cookies plaatsen, zogeheten <strong>cookies van derden</strong> of indirecte cookies.',
        'persistent_cookies' => 'Permanente cookies worden op je computer opgeslagen en niet automatisch gewist wanneer je je browser verlaat, dit in tegenstelling tot sessiecookies, die dan wel worden gewist.',
        'items' => '<p>De eerste keer dat je de website van Codeweek bezoekt, moet je <strong>cookies accepteren of weigeren</strong>.</p>

            <p>Het doel is de site gedurende een bepaalde periode in staat te stellen je voorkeuren (zoals gebruikersnaam, taal enz.) te onthouden.</p>

            <p>Op die manier hoef je deze niet steeds opnieuw in te voeren als je tijdens je bezoek op de website rondbladert.</p>

            <p>Cookies kunnen ook worden gebruikt om geanonimiseerde statistieken over de gebruikservaring op onze sites te verzamelen.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Hoe gebruiken we cookies?',
        'text1' => '<p>Codeweek gebruikt vooral „directe cookies”. Dit zijn cookies die door ons worden geplaatst en gecontroleerd, niet door een externe organisatie.</p>',
        'text2' => ' <p>Om sommige van onze pagina\'s te bekijken, moet je echter cookies van externe organisaties accepteren.</p>',
        '3types' => [
            'title' => 'De <strong>3 soorten directe cookies</strong> die we gebruiken, dienen om:',
            '1' => 'de voorkeuren van bezoekers op te slaan',
            '2' => 'onze websites operationeel te maken',
            '3' => 'analysegegevens (over surfgedrag) te verzamelen',
        ],
        'table' => [
            'name' => 'Naam',
            'service' => 'Service',
            'purpose' => 'Doel',
            'type_duration' => 'Type cookie en duur',
        ],
        'visitor_preferences' => [
            'title' => 'Bezoekersvoorkeuren',
            'text' => '<p>Deze worden door ons geplaatst en alleen wij kunnen ze lezen. Zij onthouden:</p>',
            'item' => 'of je het cookiebeleid van deze site hebt geaccepteerd (of geweigerd)',
            'table' => [
                '1' => [
                    'service' => 'Cookie consent kit',
                    'purpose' => 'Slaat je cookie-voorkeuren op (we stellen je deze vraag dan niet opnieuw).',
                    'type_duration' => 'Direct sessiecookie, gewist zodra je je browser verlaat',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Operationele cookies',
            'text' => '<p>Er zijn enkele cookies die we moeten plaatsen om bepaalde webpagina’s te laten functioneren. Om die reden hoef je hiervoor geen toestemming te verlenen. Het gaat om:</p>',
            'item' => 'voor bepaalde IT-systemen vereiste technische cookies',
        ],
        'technical_cookies' => [
            'title' => 'Technische cookies',
            'table' => [
                '1' => [
                    'purpose' => 'Beveiligt je sessie.',
                    'type_duration' => 'Direct sessiecookie, wordt gewist zodra je je browser verlaat',
                ],
                '2' => [
                    'purpose' => 'Beveiligt je sessie gedurende een langere periode, zodat de sessie niet wordt beëindigd bij het sluiten van de browser.',
                    'type_duration' => 'Direct permanent cookie, 60 maanden',
                ],
                '3' => [
                    'purpose' => 'Slaat de voorkeurstaal van de gebruiker op.',
                    'type_duration' => 'Direct sessiecookie, wordt gewist zodra je je browser verlaat',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analysecookies',
            'items' => '<p>We gebruiken deze uitsluitend voor intern onderzoek om na te gaan hoe we de dienstverlening aan al onze gebruikers kunnen verbeteren.</p>

            <p>De cookies analyseren alleen hoe je met onze website communiceert, als anonieme gebruiker (op basis van de verzamelde gegevens wordt je dus niet persoonlijk geïdentificeerd).</p>

            <p>Deze gegevens worden evenmin gedeeld met anderen of voor andere doeleinden gebruikt. De geanonimiseerde statistieken kunnen worden gedeeld met contractanten die werken aan communicatieprojecten in het kader van een overeenkomst met de Commissie.</p>

            <p>Het staat je echter vrij om dit soort cookies te weigeren, ofwel via de cookiebanner op de eerste pagina die je bezoekt, ofwel door naar deze <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">speciale pagina</a> te gaan.</p>',
            'table' => [
                '1' => [
                    'service' => 'Dienst voor webanalyse op basis van de opensourcesoftware Matomo',
                    'purpose' => 'Herkent de bezoekers van de website (anoniem – er wordt geen persoonlijke informatie over de gebruiker verzameld).',
                    'type_duration' => 'Direct permanent cookie, 20 dagen<',
                ],
                '2' => [
                    'service' => 'Dienst voor webanalyse op basis van de opensourcesoftware Matomo',
                    'purpose' => 'Identificeert de pagina’s die een gebruiker tijdens hetzelfde bezoek bekijkt. (anoniem – er wordt geen persoonlijke informatie over de gebruiker verzameld).',
                    'type_duration' => 'Direct permanent cookie, 30 dagen',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Cookies van derden',
        'items' => [
            '1' => '<p>Sommige van onze pagina’s tonen inhoud van externe aanbieders, zoals YouTube, Facebook en Twitter.</p>

                <p>Om deze inhoud van derden te bekijken moet je eerst hun specifieke voorwaarden aanvaarden. Dit omvat ook hun cookiebeleid, waarover wij geen controle hebben.</p>

                <p>Als je deze inhoud niet bekijkt, worden er op je apparaat geen cookies van derden geplaatst.</p>Externe aanbieders op Codeweek',
            '2' => 'De website van Codeweek heeft geen controle over deze externe diensten. Aanbieders kunnen hun gebruiksvoorwaarden, het doel en gebruik van cookies enz. te allen tijde wijzigen.',
        ],
    ],
    'how-manage' => [
        'title' => 'Hoe kun je cookies beheren?',
        'items' => '<p>Je kunt cookies naar wens <strong>beheren/wissen</strong>. Meer informatie lees je op <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Cookies verwijderen</strong></p>

            <p>Je kunt alle cookies die al op je apparaat staan, wissen door de browsergeschiedenis van je browser te wissen. Hiermee worden alle cookies van alle bezochte websites verwijderd.</p>

            <p>Houd er wel rekening mee dat je zo ook bepaalde opgeslagen informatie kunt verliezen (bijv. inloggegevens, websitevoorkeuren).</p><strong>Beheer van site-specifieke cookies</strong><p>Bekijk de privacy- en cookie-instellingen van je browser voor meer gedetailleerde controle over site-specifieke cookies.</p><strong>Cookies blokkeren</strong><p>Je kunt de meeste moderne browsers zo instellen dat er op je apparaat geen cookies worden geplaatst, maar je moet dan misschien iedere keer wanneer je een site/pagina bezoekt, je voorkeuren instellen. En sommige diensten en functies werken dan niet of niet goed (bv. inloggen bij profiel).</p><strong>Onze analysecookies beheren</strong><p>Je kunt je voorkeuren voor cookies van onze Analytics-dienst beheren op de <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">speciale pagina.</a></p>',
    ],
];
