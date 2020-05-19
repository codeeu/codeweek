<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Domande',
    'material' => [
        "required" => "Materiale occorrente",
        "chequered" => "scacchiera",
        "footprint" => "tessere con immagini di impronte"
    ],
    'intro' => [
        'title' => 'Introduzione a Coding in famiglia',
    ],
    'explorer' => [
        'title' => 'L\'esploratore',
        'text' => 'L\'esploratore è la prima attività di Coding in famiglia. Sposta l\'esploratore sulla scacchiera, in modo che raggiunga la destinazione dopo aver visitato il maggior numero possibile di caselle. ',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Con le posizioni di partenza e arrivo mostrate nel video, è possibile portare l’esploratore a visitare tutte le caselle della scacchiera?',
                    2 => 'Q2. Quali sono le posizioni di partenza e di arrivo che impediscono all’esploratore di visitare il maggior numero di caselle della scacchiera?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => '2. Destra e sinistra',
        'text' => 'Destra e sinistra è un gioco competitivo e collaborativo. Le due squadre collaborano per creare un percorso verso la destinazione, ma competono nell\'utilizzare il maggior numero di tessere a loro assegnate: la squadra gialla cerca di inserire nel percorso il maggior numero possibile di svolte a sinistra, la squadra rossa il maggior numero possibile di svolte a destra.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Con partenza e arrivo disposti come nello schema iniziale di questo video, è possibile che una delle due squadre vinca?',
                    2 => 'Q2. Con partenza e arrivo disposti come nella partita vinta da Anna, è possibile il pareggio?',
                    3 => 'Q3. Ci sono disposizioni di partenza e arrivo che favoriscono una delle due squadre?',
                    4 => 'Q4. Data la disposizione di partenza e arrivo, è possibile prevedere con quale scarto tra la squadra vincente e la squadra perdente finirà la partita?'
                ]

        ]

    ],


    'keep-off-my-path' => [
        'title' => 'Passo a due',
        'text' => 'Passo a due è un gioco competitivo a due squadre. Partendo da due punti opposti della scacchiera, le due squadre costruiscono percorsi che si ostacolano a vicenda. Vince la squadra che impedisce all\'altra di estendere il proprio percorso.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Esistono disposizioni di partenza che favoriscono una delle due squadre?',
                    2 => 'Q2. Esiste la possibilità di un pareggio?',
                    3 => 'Q3. Chi fa la prima mossa è avvantaggiato?',
                    4 => 'Q4. Esiste una strategia di gioco infallibile che il giocatore che fa la prima mossa può adottare per essere certo di non perdere mai?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Tiro alla fune',
        'text' => 'Il Tiro alla fune è un gioco collaborativo e competitivo. Partendo dal centro del lato inferiore della scacchiera, due squadre (quella gialla e quella rossa) collaborano per raggiungere il lato superiore. La squadra gialla cerca di raggiungere le caselle di sinistra, mentre quella rossa cerca di raggiungere le caselle di destra.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Esiste una strategia che garantisce sempre la vittoria?',
                    2 => 'Q2. Chi fa la prima mossa è avvantaggiato?',
                    3 => 'Q3. Se i due giocatori sono ugualmente attenti, la partita finisce sempre pari, cioè al centro?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'L\'esploratore ',
        'text' => 'L\'esploratore cammina sulla scacchiera dal punto di partenza al punto di arrivo, cercando di visitare tutte le caselle. Nel camminare, l\'esploratore o esploratrice lascia impronte colorate, che consentono al robot di seguire i suoi passi interpretando i colori. Il gioco diventa ancora più intrigante quando l\'esploratore cancella le impronte e lascia solo i colori.',
        'material' => 'e pennarelli (o matite) di colore rosso, giallo e grigio.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Che differenza c\'è tra la scacchiera piena di impronte colorate e quella con i soli colori?',
                    2 => 'Q2. Quale delle due scacchiere offre più libertà di movimento, pur rispettando le stesse regole per associare le rotazioni ai colori?',
                    3 => 'Q3. Ci sono percorsi possibili nella scacchiera con i colori, che non sarebbero ammessi nella scacchiera con le impronte colorate?',
                    4 => 'Q4. Ci sono percorsi possibili nella scacchiera con le impronte colorate, che non sarebbero ammessi nella scacchiera con i soli colori?'
                ]

        ]

    ],

    'texts' => [
        1 => 'Coding in famiglia è una raccolta di brevi video, materiali fai da te, enigmi, giochi e sfide di coding, da usare quotidianamente in famiglia e a scuola. Per svolgere le attività, non occorre avere già conoscenze specifiche né dispositivi elettronici. Le attività intendono stimolare il pensiero computazionale e coltivare le abilità di allievi, genitori e insegnanti, a casa o a scuola.',
        2 => 'La serie Coding in famiglia della Settimana europea della programmazione si basa sull\'iniziativa <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> dell\'Università di Urbino e dell’Associazione CodeMOOCnet, in collaborazione con Rai Cultura. Alessandro Bogliolo è professore di Sistemi per l’elaborazione dell’informazione all’Università di Urbino, <a href="/ambassadors?country_iso=IT" target="_blank">Ambasciatore italiano della Settimana europea della programmazione</a> e coordinatore di tutti gli ambasciatori, nonché membro del Governing Board of the Digital Skills and Jobs Coalition. ',
        3 => 'Se sei interessato a più attività unplugged, o ad attività in linguaggi di programmazione diversi, alla robotica, al micro:bit ecc., consulta le <a href="/training">"Pillole di apprendimento della settimana europea di programmazione"</a> comprendenti video tutorial e programmazioni didattiche per la scuola primaria e per la scuola secondaria di primo e di secondo grado. Dai un\'occhiata anche alla pagina delle risorse della Settimana europea della programmazione per <a href="/resources/learn">apprendere</a> e <a href="/resources/teach">insegnare</a>. '
    ]
];