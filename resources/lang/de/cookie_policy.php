<?php

return [

    'title' => 'Cookie-Richtlinie',
    'what' => [
        'title' => 'Was sind Cookies?',
        'text' => '<p>Ein Cookie ist eine kleine Textdatei, die eine Website auf Ihrem Computer oder mobilen Gerät speichert, wenn Sie diese besuchen.</p>',
        'first_party' => '<strong>Erstanbieter-Cookies</strong> sind Cookies, die von der Website, die Sie besuchen, eingerichtet werden. Nur diese Website kann sie lesen. Zusätzlich ist es möglich, dass eine Website externe Dienstleistungen in Anspruch nimmt, deren Anbieter ebenfalls eigene Cookies einrichten, die als <strong>Drittanbieter-Cookies</strong> bezeichnet werden.',
        'persistent_cookies' => 'Bei persistenten Cookies handelt es sich um Cookies, die auf Ihrem Computer gespeichert und nicht automatisch gelöscht werden, wenn Sie Ihr Browserfenster schließen. Sitzungscookies dagegen werden beim Schließen des Browsers gelöscht.',
        'items' => '<p>Beim ersten Besuch der Codeweek-Website werden Sie aufgefordert, <strong>Cookies zu akzeptieren oder abzulehnen</strong>.</p>

            <p>Dies dient dazu, die Website zu ermächtigen, Ihre benutzerdefinierten Einstellungen (wie Name, Sprache usw.) eine gewisse Zeit lang zu speichern.</p>

            <p>Somit müssen Sie diese Daten beim Navigieren auf der Website im Laufe des gleichen Besuchs nicht erneut angeben.</p>

            <p>Cookies können außerdem zur Erstellung anonymisierter Statistiken über das Surfverhalten auf unserer Website eingesetzt werden.</p>
            </p>'
    ],
    'how' => [
        'title' => 'Wie verwenden wir Cookies?',
        'text1' => '<p>Codeweek verwendet hauptsächlich „Erstanbieter-Cookies“. Dabei handelt es sich um Cookies, die von uns und nicht von einer externen Organisation eingerichtet und verwaltet werden.</p>',
        'text2' => '<p>Allerdings ist es für den Aufruf einiger unserer Seiten nötig, Cookies externer Organisationen zu akzeptieren.</p>',
        '3types' => [
            'title' => 'Die <strong>drei Typen von Erstanbieter-Cookies</strong>, die wir nutzen, dienen:',
            '1' => 'der Speicherung benutzerdefinierter Einstellungen',
            '2' => 'dem Betrieb unserer Website',
            '3' => 'der Erhebung analytischer Informationen (über das Benutzerverhalten)'
        ],
        'table' => [
            'name'=>'Name',
            'service'=>'Dienstleistung',
            'purpose'=>'Zweck',
            'type_duration'=>'Cookie-Typ und Speicherdauer',
        ],
        'visitor_preferences' => [
            'title'=> 'Benutzerdefinierte Einstellungen',
            'text'=> '<p>Diese werden von uns verwaltet und nur wir können sie lesen. Diese merken sich:</p>',
            'item'=> 'ob Sie den Cookie-Richtlinien dieser Website zugestimmt haben (oder nicht)',
            'table' => [
                '1' => [
                    'service' => 'Übersicht über Einwilligungen zu Cookies',
                    'purpose' => 'Speichert Ihre Einstellungen für Cookies (so werden Sie nicht noch einmal danach gefragt)',
                    'type_duration' => 'Erstanbieter-Sitzungscookie, der nach dem Schließen des Browsers gelöscht wird',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => 'Funktionale Cookies',
            'text' => '<p>Einige Cookies müssen wir einbinden, damit bestimmte Webseiten funktionieren. Daher ist in diesem Fall Ihre Zustimmung nicht erforderlich. Insbesondere:</p>',
            'item' => 'technische Cookies, die von bestimmten IT-Systemen benötigt werden'
        ],
        'technical_cookies' => [
            'title' => 'Technische Cookies',
            'table' => [
                '1' => [
                    'purpose' => 'Sichert Ihre Sitzung für die Dauer Ihres Besuchs ab.',
                    'type_duration' => 'Erstanbieter-Sitzungscookie, der nach dem Schließen des Browsers gelöscht wird',
                ],
                '2' => [
                    'purpose' => 'Sichert Ihre Sitzung für eine längere Zeitspanne ab und verhindert damit, dass die Sitzung beim Schließen des Browsers verworfen wird.',
                    'type_duration' => 'Persistenter Erstanbieter-Cookie, 60 Monate',
                ],
                '3' => [
                    'purpose' => 'Speichert die Sprache, die der Benutzer bevorzugt',
                    'type_duration' => 'Erstanbieter-Sitzungscookie, der nach dem Schließen des Browsers gelöscht wird',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => 'Analysecookies',
            'items' => '<p>Diese nutzen wir ausschließlich für die interne Forschung, im Rahmen derer wir ermitteln, wie wir die Dienste, die wir anbieten, zugunsten aller unserer Nutzer verbessern können.</p>

            <p>Die Cookies stellen lediglich fest, auf welche Weise Sie – als anonymer Nutzer (die erhobenen Daten lassen keine Identifikation Ihrer Person zu) – mit unserer Website interagieren.</p>

            <p>Ferner werden diese Informationen nicht an Dritte weitergegeben oder für andere Zwecke verwendet. Möglicherweise wird die anonymisierte Statistik für Auftragnehmer freigegeben, die im Rahmen einer vertraglichen Vereinbarung mit der Kommission an Kommunikationsprojekten arbeiten.</p>

            <p>Es steht Ihnen jedoch frei, diese Arten von Cookies abzulehnen – dies kann entweder über das Cookie-Banner, das auf der ersten besuchten Seite erscheint, oder mittels Aufruf der <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">hierfür eingerichteten Seite</a> geschehen.</p>',
            'table' => [
                '1' => [
                    'service' => 'Webanalysedienst, basiert auf quelloffener Software Matomo',
                    'purpose' => 'Erkennt Besucher der Website (anonym – es werden keinerlei personenbezogene Daten über den Benutzer gesammelt).',
                    'type_duration' => 'Persistenter Erstanbieter-Cookie, 20 Tage',
                ],
                '2' => [
                    'service' => 'Webanalysedienst, basiert auf quelloffener Software Matomo',
                    'purpose' => 'Erkennt, welche Seiten vom gleichen Nutzer während des gleichen Besuchs aufgerufen wurden. (anonym – es werden keinerlei personenbezogene Daten über den Benutzer gesammelt).',
                    'type_duration' => 'Persistenter Erstanbieter-Cookie, 30 Minuten',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => 'Drittanbieter-Cookies',
        'items' => [
            '1' => '<p>Einige unserer Seiten zeigen Inhalte externer Anbieter an, z. B. YouTube, Facebook und Twitter.</p>

                <p>Um diese Inhalte von Drittanbietern sehen zu können, müssen Sie zunächst deren spezifische allgemeine Geschäftsbedingungen akzeptieren. Das schließt auch die entsprechenden Cookie-Richtlinien ein, auf die wir keinerlei Einfluss haben.</p>

                <p>Werden Ihnen jedoch diese Inhalte nicht angezeigt, sind keinerlei Drittanbieter-Cookies auf Ihrem Gerät installiert.</p>Drittanbieter-Cookies auf Codeweek',
            '2' => 'Diese Dienste von Drittanbietern liegen außerhalb des Einflussbereichs der Codeweek-Website. Die Anbieter haben das Recht, jederzeit Änderungen bezüglich ihrer Nutzungsbedingungen, dem Zweck und der Verwendung von Cookies usw. vorzunehmen.'
        ]
    ],
    'how-manage' => [
        'title' => 'Wie werden Cookies verwaltet?',
        'items' => '<p>Sie können Cookies nach Belieben <strong>verwalten/löschen</strong> – weitere Informationen hierzu finden Sie unter <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Cookies von Ihrem Gerät entfernen</strong></p>

            <p>Sie können sämtliche Cookies, die sich bereits auf Ihrem Gerät befinden, löschen, indem Sie den Verlauf Ihres Browsers leeren. Dadurch werden sämtliche Cookies von allen Websites, die Sie besucht haben, entfernt.</p>

            <p>Denken Sie daran, dass so auch einige gespeicherte Informationen verlorengehen können (beispielsweise gespeicherte Login-Daten, benutzerdefinierte Einstellungen für bestimmte Websites).</p><strong>Website-spezifische Cookies verwalten</strong><p>Um mehr Einzelheiten zu Website-spezifischen Cookies festzulegen, rufen Sie bitte die Einstellungen für Datenschutz und Cookies im Browser Ihrer Wahl auf.</p><strong>Cookies blockieren</strong><p>Die meisten aktuellen Browser verfügen über eine Option, die eine Ablage von Cookies auf Ihrem Gerät generell verhindert. Unter Umständen müssen Sie dann allerdings bei jedem Besuch einer Website oder Seite einige Einstellungen manuell vornehmen. Außerdem ist es möglich, dass einige Dienste und Funktionalitäten nicht verfügbar sind (z. B. Anmeldung bei einem Konto).</p><strong>Unsere Analysecookies verwalten</strong><p>Sie können Ihre Einstellungen für unsere Analysecookies auf der <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">hierfür eingerichteten Seite</a> verwalten.</p>'
    ]
];
