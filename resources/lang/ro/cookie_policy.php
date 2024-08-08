<?php

return [

    'title' => 'Politica privind modulele cookie',
    'what' => [
        'title' => 'Ce sunt modulele cookie?',
        'text' => '<p>Un modul cookie este un mic fișier text pe care un site îl stochează pe calculatorul dvs. sau pe dispozitivul dvs. mobil atunci când vizitați site-ul.</p>',
        'first_party' => '<strong>Modulele cookie originale</strong> sunt module cookie setate de site-ul pe care îl vizitați. Doar acel site le poate citi. În plus, poate folosi, în mod potențial, servicii externe, care setează și propriile lor module cookie, cunoscute ca <strong>module cookie de la terți</strong>.',
        'persistent_cookies' => 'Modulele cookie persistente sunt module cookie salvate pe calculatorul dvs. care nu sunt șterse automat atunci când închideți browser-ul, spre deosebire de un modul cookie pentru sesiune, care este șters la închiderea browser-ului.',
        'items' => '<p>Prima dată când vizitați site-ul Codeweek, vi se va cere să <strong>acceptați sau refuzați module cookie</strong>.</p>

            <p>Scopul este să permiteți site-ului să rețină preferințele dvs. (precum nume de utilizator, limbă etc.) pe o anumită perioadă de timp.</p>

            <p>Astfel, nu trebuie să le reintroduceți atunci când navigați prin site în timpul aceleași vizite.</p>

            <p>Modulele cookie pot fi folosite, de asemenea, pentru elaborarea de statistici anonimizate cu privire la experiența de navigare pe site-ul nostru.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Cum folosim modulele cookie?',
        'text1' => '<p>Codeweek folosește predominant „module cookie originale”. Acestea sunt module cookie setate și controlate de noi, nu printr-o organizație externă.</p>',
        'text2' => '<p>Cu toate acestea, pentru a vizualiza unele dintre paginile noastre, va trebui să acceptați module cookie de la organizații externe.</p>',
        '3types' => [
            'title' => 'Cele <strong>trei tipuri de module cookie originale</strong> pe care le folosim au rolul de a:',
            '1' => 'stoca preferințele vizitatorilor',
            '2' => 'face ca site-urile noastre să fie operaționale',
            '3' => 'colecta date analitice (cu privire la comportamentul utilizatorilor)',
        ],
        'table' => [
            'name' => 'Nume',
            'service' => 'Serviciu',
            'purpose' => 'Scop',
            'type_duration' => 'Tip de modul cookie și durata',
        ],
        'visitor_preferences' => [
            'title' => 'Preferințele vizitatorilor',
            'text' => '<p>Acestea sunt setate de noi și doar noi le putem citi. Ele rețin:</p>',
            'item' => 'dacă ați fost de acord cu (sau ați refuzat) politica privind modulele cookie a acestui site',
            'table' => [
                '1' => [
                    'service' => 'Kitul de consimțire la module cookie',
                    'purpose' => 'Stochează preferințele dvs. (astfel încât nu veți fi întrebat din nou)',
                    'type_duration' => 'Modulele cookie originale pentru sesiune șterse după ce închideți browser-ul',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Module cookie operaționale',
            'text' => '<p>Există unele module cookie pe care trebuie să le includem pentru ca anumite pagini să funcționeze. Din acest motiv ele nu necesită consimțământul dvs. În particular:</p>',
            'item' => 'module cookie tehnice necesare pentru anumite sisteme IT',
        ],
        'technical_cookies' => [
            'title' => 'Module cookie tehnice',
            'table' => [
                '1' => [
                    'purpose' => 'Întrețin o sesiune sigură pentru dvs., pe durata vizitei dvs.',
                    'type_duration' => 'Modulele cookie originale pentru sesiune șterse după ce închideți browser-ul',
                ],
                '2' => [
                    'purpose' => 'Întrețin o sesiune sigură pentru dvs. pe o perioadă mai îndelungată, prevenind pierderea sesiunii la închiderea browser-ului.',
                    'type_duration' => 'Module cookie originale persistente, 60 de luni',
                ],
                '3' => [
                    'purpose' => 'Stochează limba preferată a utilizatorului',
                    'type_duration' => 'Modulele cookie originale pentru sesiune șterse după ce închideți browser-ul',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Module cookie analitice',
            'items' => '<p>Folosim aceste module cookie doar pentru cercetare internă cu privire la modul în care ne putem îmbunătăți serviciul pe care îl furnizăm pentru toți utilizatorii noștri.</p>

            <p>Modulele cookie evaluează doar modul în care interacționați cu site-ul nostru – ca utilizator anonim (datele colectate nu vă identifică personal).</p>

            <p>De asemenea, aceste date nu sunt partajate cu nicio terță parte și nu sunt utilizate în niciun alt scop. Statisticile anonimizate pot fi partajate cu contractanți care lucrează la proiecte de comunicare în conformitate cu un acord contractual încheiat cu Comisia.</p>

            <p>Cu toate acestea, aveți libertatea de a refuza aceste tipuri de module cookie – fie prin banner-ul cookie pe care îl veți vedea pe prima pagină pe care o vizitați, fie vizitând <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">pagina dedicată</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Serviciul Web Analytics pe baza programului software cu sursă deschisă Matomo',
                    'purpose' => 'Recunoaște vizitatorii site-ului (anonim – nu sunt colectate informații cu caracter personal referitoare la utilizator)',
                    'type_duration' => 'Module cookie originale persistente, 20 de zile',
                ],
                '2' => [
                    'service' => 'Serviciul Web Analytics pe baza programului software cu sursă deschisă Matomo',
                    'purpose' => 'Identifică paginile vizualizate de același utilizator în timpul aceleași vizite (anonim – nu sunt colectate informații cu caracter personal referitoare la utilizator)',
                    'type_duration' => 'Module cookie originale persistente, 30 de minute',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Module cookie de la terți',
        'items' => [
            '1' => '<p>Unele dintre paginile noastre afișează conținut de la furnizori externi, de ex. YouTube, Facebook și Twitter.</p>

                <p>Pentru a vizualiza acest conținut al terței părți, trebuie să acceptați mai întâi clauzele și condițiile lor specifice. Acestea includ politicile lor privind modulele cookie, asupra cărora nu avem niciun control.</p>

                <p>Dar dacă nu doriți să vizualizați acest conținut, nu vor fi instalate pe dispozitivul dvs. niciun fel de module cookie de la terți.</p>Furnizori terți pe Codeweek',
            '2' => 'Aceste servicii de la terțe părți sunt în afara controlului site-ului Codeweek. Furnizorii își pot modifica oricând clauzele referitoare la serviciu, scop și utilizarea de module cookie etc.',
        ],
    ],
    'how-manage' => [
        'title' => 'Cum puteți gestiona modulele cookie?',
        'items' => '<p>Puteți <strong>gestiona/șterge</strong> module cookie după cum doriți – pentru detalii consultați <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Îndepărtarea modulelor cookie de pe dispozitivul dvs.</strong></p>

            <p>Puteți șterge toate modulele cookie care sunt deja pe dispozitivul dvs. prin ștergerea istoricului de navigare al browser-ului dvs. Acest lucru va îndepărta toate modulele cookie de la toate site-urile pe care le-ați vizitat.</p>

            <p>Rețineți însă că puteți pierde și unele informații salvate (de ex. detalii de conectare salvate, preferințe de site-uri).</p><strong>Gestionarea modulelor cookie specifice site-urilor</strong><p>Pentru un control mai detaliat asupra modulelor cookie specifice site-urilor, verificați setările de confidențialitate și cele privind modulele cookie din browser-ul dvs. preferat</p><strong>Blocarea modulelor cookie</strong><p>Puteți seta aproape toate browser-ele moderne să prevină ca orice modul cookie să fie plasat pe dispozitivul dvs., dar în acest caz este posibil să trebuiască să ajustați manual unele preferințe de fiecare dată când vizitați un site/o pagină. Iar unele servicii și funcționalități este posibil să nu funcționeze deloc bine (de ex. înregistrarea de profiluri).</p><strong>Gestionarea modulelor noastre cookie analitice</strong><p>Puteți gestiona preferințele dvs. privind modulele cookie din secțiunea noastră Analytics de pe <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">pagina dedicată</a>.</p>',
    ],
];
