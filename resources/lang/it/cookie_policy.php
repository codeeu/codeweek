<?php

return [

    'title' => 'Politica sull’utilizzo dei cookie',
    'what' => [
        'title' => 'Che cosa sono i cookie?',
        'text' => '<p>I cookie sono piccoli file di testo che i siti web memorizzano sul tuo computer o dispositivo mobile quando li visiti.</p>',
        'first_party' => 'I <strong>cookie di prime parti</strong> sono trasmessi dal sito web che stai visitando. Solo quel sito web può leggerli. Può inoltre accadere che un sito web utilizzi servizi esterni, i quali a loro volta trasmetteranno altri cookie, noti come <strong>cookie di terze parti</strong>.',
        'persistent_cookies' => 'I cookie permanenti vengono salvati sul computer e, a differenza di quanto accade con i cookie di sessione, non vengono eliminati automaticamente alla chiusura del browser.',
        'items' => '<p>In occasione della tua prima visita al sito web di Codeweek, ti verrà chiesto se desideri <strong>accettare o rifiutare i cookie</strong>.</p>

            <p>Tale richiesta ha lo scopo di consentire al sito di ricordare le tue preferenze (come ad esempio il nome utente, la lingua ecc.) per un determinato periodo di tempo.</p>

            <p>In questo modo, non dovrai reinserirle mentre navighi all’interno del sito durante la  stessa visita.</p>

            <p>I cookie possono essere usati anche per elaborare statistiche anonimizzate sull’esperienza di esplorazione dei nostri siti.</p>
            </p>'
    ],
    'how' => [
        'title' => 'Come usiamo i cookie?',
        'text1' => '<p>Codeweek utilizza prevalentemente i cosiddetti «cookie di prime parti». Si tratta di cookie trasmessi e controllati da noi e da nessun’altra organizzazione esterna.</p>',
        'text2' => '<p>Tuttavia, per visualizzare alcune nostre pagine, dovrai accettare i cookie di organizzazioni esterne.</p>',
        '3types' => [
            'title' => 'I <strong>3 tipi di cookie di terze parti</strong> che impieghiamo servono per:',
            '1' => 'memorizzare le preferenze del visitatore;',
            '2' => 'rendere operativi i nostri siti web;',
            '3' => 'raccogliere dati analitici (sul comportamento dell’utente).'
        ],
        'table' => [
            'name'=>'Nome',
            'service'=>'Servizio',
            'purpose'=>'Scopo',
            'type_duration'=>'Tipo e durata dei cookie',
        ],
        'visitor_preferences' => [
            'title'=> 'Preferenze del visitatore',
            'text'=> '<p>Li trasmettiamo noi e siamo i soli a poterli leggere. Si ricordano:</p>',
            'item'=> 'se hai accettato (o rifiutato) la politica sui cookie di questo sito',
            'table' => [
                '1' => [
                    'service' => 'Kit di consenso all’uso dei cookie',
                    'purpose' => 'Memorizzano le tue preferenze relative ai cookie (per evitare di chiedertele di nuovo)',
                    'type_duration' => 'Si tratta di cookie di sessione di prime parti che vengono eliminati alla chiusura del browser',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => 'Cookie operativi',
            'text' => '<p>Alcuni cookie devono essere inseriti per consentire il funzionamento di determinate pagine web. Per questo motivo, non richiedono il tuo consenso. In particolare:</p>',
            'item' => 'cookie tecnici necessari per alcuni sistemi IT'
        ],
        'technical_cookies' => [
            'title' => 'Cookie tecnici',
            'table' => [
                '1' => [
                    'purpose' => 'Garantiscono la protezione della sessione durante la tua visita.',
                    'type_duration' => 'Si tratta di cookie di sessione di prime parti che vengono eliminati alla chiusura del browser',
                ],
                '2' => [
                    'purpose' => 'Mantengono la protezione della sessione per un periodo di tempo più esteso, evitando che quest’ultima venga persa alla chiusura del browser.',
                    'type_duration' => 'Cookie permanenti di prime parti della durata di 60 mesi',
                ],
                '3' => [
                    'purpose' => 'Memorizzano la lingua preferita dall’utente',
                    'type_duration' => 'Si tratta di cookie di sessione di prime parti che vengono eliminati alla chiusura del browser',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => 'Cookie analitici',
            'items' => '<p>Li utilizziamo esclusivamente per svolgere ricerche interne su come possiamo migliorare il servizio che offriamo ai nostri utenti</p>

            <p>Questi cookie si limitano a valutare il modo in cui interagisci con il nostro sito web, come utente anonimo (i dati raccolti non consentono la tua identificazione personale).</p>

            <p>Inoltre, questi dati non vengono divulgati a soggetti terzi, né impiegati per altri scopi. Le statistiche anonimizzate possono essere condivise con appaltatori che lavorano a progetti di comunicazione nell’ambito di accordi contrattuali stipulati con la Commissione.</p>

            <p>Ciononostante, sei libero di rifiutare questo tipo di cookie, sia attraverso l’apposito banner che comparirà nella prima pagina che visiterai, che visitando questa <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">pagina dedicata all’argomento.</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Servizio di analisi web basato sul software open source Matomo',
                    'purpose' => 'Riconosce i visitatori dei siti web (in maniera anonima e senza raccogliere informazioni personali sull’utente).',
                    'type_duration' => 'Cookie permanenti di prime parti della durata di 20 giorni',
                ],
                '2' => [
                    'service' => 'Servizio di analisi web basato sul software open source Matomo',
                    'purpose' => 'Identificano le pagine visualizzate dallo stesso utente durante la medesima visita (in maniera anonima e senza raccogliere informazioni personali sull’utente).',
                    'type_duration' => 'Cookie permanenti di prime parti della durata di 30 minuti',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => 'Cookie di terze parti',
        'items' => [
            '1' => '<p>Alcune nostre pagine presentano contenuti di fornitori esterni, come ad esempio YouTube, Facebook e Twitter.</p>

                <p>Per visualizzare tali contenuti di soggetti terzi, devi prima accettare i loro termini e le loro condizioni. Tra questi figurano le politiche sull’utilizzo dei cookie, sulle quali non abbiamo alcun controllo.</p>

                <p>Tuttavia, se non visualizzerai questi contenuti, sul tuo dispositivo non verranno installati cookie di terze parti.</p>Fornitori terzi su Codeweek',
            '2' => 'Questi servizi offerti da fornitori terzi esulano dal controllo del sito web di Codeweek. Tali fornitori possono, in qualsiasi momento, modificare i termini di servizio, lo scopo e l’utilizzo dei cookie e così via.'
        ]
    ],
    'how-manage' => [
        'title' => 'Come puoi gestire i cookie?',
        'items' => '<p>Puoi <strong>gestire/eliminare</strong> i cookie che desideri. Per maggiori dettagli, consulta il sito <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Rimuovere i cookie dal dispositivo</strong></p>

            <p>Puoi eliminare tutti i cookie già presenti sul tuo dispositivo cancellando la cronologia di navigazione del browser. In questo modo rimuoverai tutti i cookie trasmessi dai siti web che hai visitato.</p>

            <p>Tieni presente che potresti perdere anche alcune informazioni salvate (ad es. credenziali di accesso salvate, preferenze relative ai siti ecc.).</p><strong>Gestire i cookie specifici di ciascun sito</strong><p>Per un controllo più dettagliato dei cookie specifici di un sito preciso, controlla le impostazioni relative alla privacy e ai cookie del tuo browser predefinito.</p><strong>Bloccare i cookie</strong><p>Puoi impostare la maggior parte dei browser moderni in maniera tale da evitare l’installazione di qualunque cookie sul tuo dispositivo, ma in questo caso dovrai cambiare manualmente alcune preferenze ogni volta che visiti un sito/una pagina. Inoltre, alcuni servizi e funzionalità potrebbero non funzionare correttamente (ad es. l’accesso a un profilo).</p><strong>Gestire i cookie analitici</strong><p>Puoi gestire le tue preferenze riguardanti i cookie analitici sulla <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">pagina dedicata.</a></p>'
    ]
];
