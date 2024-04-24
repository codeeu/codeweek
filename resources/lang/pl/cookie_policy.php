<?php

return [

    'title' => 'Polityka dotycząca plików cookie',
    'what' => [
        'title' => 'Czym są pliki cookie?',
        'text' => '<p>Plik cookie to mały plik tekstowy, który strona internetowa przechowuje na komputerze lub urządzeniu przenośnym użytkownika odwiedzającego stronę internetową.</p>',
        'first_party' => '<strong>Pliki cookie administratora</strong>  to pliki należące do odwiedzanej strony internetowej. Tylko ta strona internetowa może je odczytać. Strona internetowa może ewentualnie korzystać z serwisów zewnętrznych, które również posiadają własne pliki cookie – <strong>są to pliki cookie osób trzecich</strong>.',
        'persistent_cookies' => 'Trwałe pliki cookie są zapisywane na komputerze użytkownika i nie są automatycznie usuwane po zamknięciu przeglądarki w przeciwieństwie do sesyjnych plików cookie, które są usuwane po zamknięciu przeglądarki.',
        'items' => '<p>Przy pierwszej wizycie na stronie internetowej Tygodnia Kodowania, zostaną Państwo poproszeni o <strong>zaakceptowanie lub odrzucenie plików cookie</strong>.</p>

            <p>Celem jest umożliwienie witrynie zapamiętania Państwa preferencji (takich jak nazwa użytkownika, język itp.) na pewien czas.</p>

            <p>Dzięki temu nie trzeba ponownie wprowadzać tych samych danych podczas jednych odwiedzin na stronie.</p>

            <p>Pliki cookie mogą być również używane do sporządzania anonimowych statystyk o korzystaniu z stron internetowych.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Do czego służą pliki cookie?',
        'text1' => '<p>Tydzień Kodowania używa głównie „plików cookie administratora”. Są to pliki tworzone i kontrolowane przez nas, nie przez organizację zewnętrzną.</p>
',
        'text2' => '<p>Przeglądanie niektórych z naszych stron wymaga jednak wyrażenia zgody na pliki cookie organizacji zewnętrznych.</p>
',
        '3types' => [
            'title' => 'Używamy <strong>3 rodzajów plików cookie</strong> administratora w celu:',
            '1' => 'przechowywania preferencji odwiedzających',
            '2' => 'zapewniania operacyjności naszych stron internetowych',
            '3' => 'gromadzenia danych analitycznych (dotyczących zachowań użytkowników)',
        ],
        'table' => [
            'name' => 'Nazwa',
            'service' => 'Usługa',
            'purpose' => 'Cel',
            'type_duration' => 'Rodzaj i ważność pliku cookie',
        ],
        'visitor_preferences' => [
            'title' => 'Preferencje odwiedzających',
            'text' => '<p>Są one zapisywane przez nas i tylko my możemy je odczytać. Dzięki nim możemy ustalić:</p>',
            'item' => 'Czy zaakceptowali Państwo (lub nie) zasady dotyczące plików cookie',
            'table' => [
                '1' => [
                    'service' => 'Zgoda na pliki cookie',
                    'purpose' => 'Zapamiętuje preferencje dotyczące plików cookie (użytkownik nie będzie pytany ponownie)',
                    'type_duration' => 'Sesyjny plik cookie administratora, usuwany po zamknięciu przeglądarki',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Operacyjne pliki cookie',
            'text' => '<p>Niektóre pliki cookie są niezbędne do poprawnego funkcjonowania niektórych stron. Z tego powodu ich stosowanie nie wymaga Państwa zgody. Są to przede wszystkim:</p>',
            'item' => 'techniczne pliki cookie wymagane w niektórych systemach informatycznych',
        ],
        'technical_cookies' => [
            'title' => 'Techniczne pliki cookie',
            'table' => [
                '1' => [
                    'purpose' => 'Utrzymuje bezpieczeństwo sesji podczas odwiedzin na stronie.',
                    'type_duration' => 'Sesyjny plik cookie administratora, usuwany po zamknięciu przeglądarki',
                ],
                '2' => [
                    'purpose' => 'Utrzymuje bezpieczną sesję przez dłuższy czas, zapobiegając utracie sesji po zamknięciu przeglądarki.',
                    'type_duration' => 'Trwały plik cookie administratora, 60 miesięcy',
                ],
                '3' => [
                    'purpose' => 'Przechowuje informacje o preferowanym języku użytkownika',
                    'type_duration' => 'Sesyjny plik cookie administratora, usuwany po zamknięciu przeglądarki',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analityczne pliki cookie',
            'items' => '<p>Używamy ich wyłącznie do wewnętrznych analiz. Dzięki nim dowiadujemy się, w jaki sposób możemy ulepszyć usługi, które świadczymy dla wszystkich naszych użytkowników.</p>

            <p>Pliki cookie analizują interakcję anonimowego użytkownika ze stroną (gromadzone dane nie odnoszą się do konkretnej osoby).</p>

            <p>Dane te nie są udostępniane osobom trzecim ani wykorzystywane do innych celów. Anonimowe statystyki mogą być udostępniane usługodawcom zajmującym się projektami komunikacyjnymi na podstawie umowy z Komisją.</p>

            <p>Każdy może odrzucić tego rodzaju pliki cookie – albo za pośrednictwem banera plików cookie wyświetlanego na pierwszej odwiedzanej stronie, albo za pośrednictwem <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">specjalnej strony</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Usługa analityki sieciowej oparta na oprogramowaniu open source (Matomo)',
                    'purpose' => 'Rozpoznaje użytkowników odwiedzających stronę internetową (anonimowo – nie gromadzi informacji o użytkowniku).',
                    'type_duration' => 'Trwały plik cookie administratora, 20 dni',
                ],
                '2' => [
                    'service' => 'Usługa analityki sieciowej oparta na oprogramowaniu open source (Matomo)',
                    'purpose' => 'Identyfikuje strony przeglądane przez tego samego użytkownika podczas danej wizyty. (anonimowo – nie gromadzi informacji o użytkowniku).',
                    'type_duration' => 'Trwały plik cookie administratora, 30 minut',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Plik cookie osób trzecich',
        'items' => [
            '1' => '<p>Na niektórych stronach wyświetlają się treści pochodzące od podmiotów zewnętrznych, takich jak YouTube, Facebook i Twitter.</p>

                <p>Aby obejrzeć treści podmiotów zewnętrznych, użytkownik musi najpierw zaakceptować ich szczegółowe warunki. Częścią tych warunków jest polityka dotycząca plików cookie, nad którymi nie mamy kontroli.</p>

                <p>Jeśli jednak nie przeglądają Państwo tych treści, na Państwa urządzeniu nie zostaną zainstalowane żadne  pliki cookie osób trzecich.</p>Podmioty zewnętrzne na stronach Tygodnia Kodowania',
            '2' => 'Te usługi świadczone przez strony trzecie są poza kontrolą strony internetowej Tygodnia Kodowania. Podmioty te mogą w każdej chwili zmienić swoje warunki świadczenia usług, cel oraz wykorzystanie plików cookie itp.',
        ],
    ],
    'how-manage' => [
        'title' => 'Jak zarządzać plikami cookie?',
        'items' => '<p>Plikami cookie <strong>można swobodnie zarządzać i można je usuwać</strong> – szczegółowe informacje można znaleźć na stronie <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Usuwanie plików cookie z urządzenia</strong></p>

            <p>Wszystkie pliki cookie na urządzeniu można usunąć – wystarczy wyczyścić historię przeglądania w przeglądarce. W ten sposób usuwa się wszystkie pliki cookie ze wszystkich odwiedzonych stron.</p>

            <p>Należy jednak pamiętać, że można w ten sposób utracić zapisane informacje (np. zapisane dane logowania, preferencje stron).</p><strong>Zarządzanie plikami cookie pochodzącymi z konkretnych stron</strong><p>Więcej informacji o zarządzaniu plikami cookie pochodzącymi z konkretnych stron można znaleźć w ustawieniach prywatności i plików cookie w wybranej przeglądarce.</p><strong>Blokowanie plików cookie</strong><p>Za pomocą większości współczesnych przeglądarek można zapobiec umieszczaniu plików cookie na urządzeniu, ale wtedy przy każdej wizycie na stronie konieczne może być ustawianie preferencji na nowo. Niektóre usługi i funkcje mogą nie działać poprawnie (np. logowanie do profilu).</p><strong>Zarządzanie analitycznymi plikami cookie</strong><p>Preferencje dotyczące analitycznych plików cookie można zmieniać na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">dedykowanej stronie</a>.</p>',
    ],
];
