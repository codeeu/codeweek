<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Questions',
    'intro' => [
        'title' => 'Présentation de Coding@Home',
    ],
    'material' => [
        "required" => "Matériel nécessaire",
        "chequered" => "tableau à damiers",
        "footprint" => "tuiles avec des images d’empreintes"
    ],
    'explorer' => [
        'title' => 'L’explorateur',
        'text' => 'L’explorateur désigne la première activité de Coding@Home. Déplacez l’explorateur sur le tableau pour atteindre la cible après avoir visité autant de cases que possible. ',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Avec les points de départ et d’arrivée montrés dans la vidéo, est-il possible pour l’explorateur de visiter toutes les cases du tableau ?',
                    2 => 'Q2. Quels sont les points de départ et d’arrivée qui empêchent l’explorateur de visiter le plus grand nombre de cases du tableau ?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Droite et gauche',
        'text' => 'Right and Left est un jeu de compétition et de collaboration. Les deux équipes collaborent pour créer un chemin vers la cible, tandis qu’elles s’affrontent pour utiliser le plus grand nombre possible de tuiles qui leur sont attribuées : l’équipe jaune tente d’insérer le plus grand nombre possible de tours à gauche et l’équipe rouge tente d’insérer le plus grand nombre possible de tours à droite.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Avec un départ et une arrivée organisés comme dans le premier match de cette vidéo, est-il possible pour l’une des deux équipes de gagner ?',
                    2 => 'Q2. Avec un départ et une arrivée organisés comme dans le jeu gagné par Anna, pourrait-il y avoir un match nul ?',
                    3 => 'Q3. Y a-t-il des dispositions de départ et d’arrivée qui favorisent l’une des deux équipes ?',
                    4 => 'Q4. Compte tenu de la disposition des points de départ et d’arrivée, est-il possible de prévoir l’écart entre l’équipe gagnante et l’équipe perdante ?'
                ]

        ]

    ],


    'keep-off-my-path' => [
        'title' => 'Keep of my path',
        'text' => 'Keep of my path est un jeu compétitif opposant deux équipes. En partant des extrémités opposées du plateau, les deux équipes tracent des chemins qui se gênent mutuellement. L’équipe qui empêche l’autre de prolonger son chemin gagne.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Y a-t-il des points de départ qui favorisent l’une des deux équipes ?',
                    2 => 'Q2. Pourrait-il y avoir un match nul ?',
                    3 => 'Q3. Le joueur qui part le premier a-t-il un avantage ?',
                    4 => 'Q4. Existe-t-il une stratégie de jeu imparable que le joueur commençant le premier pourrait adopter pour s’assurer de ne jamais perdre ?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Tug of war',
        'text' => 'Tug of war est un jeu de collaboration et de compétition. En partant du centre du bas du plateau, deux équipes (jaune et rouge) s’allient pour atteindre le sommet. L’équipe jaune essaie d’atteindre les cases de gauche tandis que l’équipe rouge essaie d’atteindre les cases de droite.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Existe-t-il une stratégie qui aboutira systématiquement à une victoire ?',
                    2 => 'Q2. Le joueur qui part le premier a-t-il un avantage ?',
                    3 => 'Q3. Si les deux joueurs sont aussi attentifs l’un que l’autre, la partie se termine-t-elle toujours par un match nul, c’est-à-dire au centre ?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'L’explorateur sans traces de pas',
        'text' => 'L’explorateur fait le tour du tableau, du point de départ à la cible, en essayant de passer par toutes les cases. Ce faisant, l’explorateur laisse des traces de pas colorées, qui permettent au robot de suivre les étapes en interprétant les couleurs. Le jeu devient encore plus intrigant lorsque l’explorateur efface les traces de pas en ne laissant que les couleurs.',
        'material' => 'marqueurs (ou des crayons) rouges, jaunes et gris',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Quelle est la différence entre le tableau rempli de traces de couleur et celui avec des couleurs, mais sans traces ?',
                    2 => 'Q2. Quel tableau offre une plus grande liberté de mouvement, en conservant les mêmes règles de rotation que celles indiquées par la couleur ?',
                    3 => 'Q3. Y a-t-il des chemins possibles sur le tableau avec des couleurs, qui ne sont pas possibles sur le tableau avec des traces de pas de couleur ?',
                    4 => 'Q4. Existe-t-il sur le tableau des pistes possibles avec des traces de couleur, ce qui n’est pas possible sur le tableau avec des couleurs uniquement ?'
                ]

        ]

    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Marchez aussi longtemps que vous le pouvez',
        'text' => 'Dans le cadre de cette activité, le défi consiste à rester le plus longtemps possible sur le plateau de jeu en utilisant des couleurs à la place des empreintes. L’activité devient plus difficile à mesure que les possibilités de déplacement augmentent',
        'coloured-cards' => "des cartes de couleur, ou des balises rouges, jaunes et grises",
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Quand les deux parcours se rencontrent-ils et se bloquent-ils l’un l’autre?',
                    2 => 'Q2. Ce jeu est-il présenté comme un jeu à deux joueurs? Est-il possible d’y jouer à trois ou quatre joueurs? Faut-il modifier les règles?',
                ]

        ]

    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles et Roby',
        'text' => 'L’histoire d’Ada Lovelace et de Charles Babbage est intéressante. Ils ont conçu et programmé des ordinateurs cent ans avant qu’ils ne soient réellement inventés',
        'material' => 'de la pâte à modeler et un petit crayon',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Essayez d’imaginer que le robot que vous avez fabriqué avec de la pâte à modeler et un crayon est capable de se déplacer sur le plateau de jeu pour atteindre n’importe quel emplacement et, si nécessaire, de tracer son parcours. Quelles instructions utiliseriez-vous pour le programmer?'
                ]

        ]

    ],

    'cody-and-roby' => [
        'title' => 'Cody et Roby',
        'text' => 'Il s’agit d’un jeu de rôle avec le programmeur, Cody, et le robot, Roby. La vidéo présente les cartes de CodyRoby, que nous utiliserons désormais pour décider des déplacements sur le plateau de jeu. Cody utilisera ces cartes pour donner à Roby des instructions sur la façon de se déplacer sur le plateau de jeu',
        'material' => 'un damier avec des étiquettes, des cartes d’instructions (gauche, droite, en avant) et tous les jetons à placer sur le plateau de jeu',
        'starter-kit' => 'kit de démarrage CodyRoby',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Où arrive Roby si, à partir de la position C2, face au sud, il exécute la dernière séquence d’instructions de la vidéo?',
                    2 => 'Q2. Les déplacements que Roby effectue en exécutant la dernière séquence d’instructions de la vidéo pourraient-ils être décrits en appliquant les instructions de CodyFeet ou de CodyColor au plateau de jeu?',
                    3 => 'Q3. Les trois types d’instructions présentés dans la vidéo, représentés par les cartes vertes, rouges et jaunes, constituent un jeu d’instructions capable de conduire Roby n’importe où sur le plateau. Pouvez-vous trouver un jeu d’instructions comportant moins de trois instructions pour faire la même chose?',
                ]

        ]

    ],

    'the-tourist' => [
        'title' => 'Le touriste',
        'text' => 'Avec les cartes CodyRoby, deux équipes s’affrontent pour trouver, le plus rapidement possible, la séquence d’instructions qui guidera le touriste vers les monuments qu’il veut visiter sur le plateau de jeu',
        'material' => 'De plus grandes cartes peuvent être utiles pour jouer sur le sol',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Quelle séquence d’instructions guiderait le touriste vers la statue de Raphaël dans le premier exemple de la vidéo?',
                    2 => 'Q2. Quelle séquence d’instructions guiderait le touriste vers les tourelles du palais ducal dans le second exemple de la vidéo?',
                    3 => 'Q3. Pouvez-vous imaginer une façon amusante de faire de l’exercice à chaque fois que l’une des deux équipes choisit une carte à ajouter au programme? Inventez-en une en repensant la course de relais montrée dans la vidéo',
                ]

        ]

    ],

    'material2' => [
        "chequered-with-labels" => "un damier avec des étiquettes",
        "cards" => "24 cartes «Avancer», 8 cartes «Tourner à gauche» et 8 cartes «Tourner à droite»",
        "larger-cards" => "il est recommandé d’utiliser de plus grandes cartes pour la version au sol",
        "video" => "La vidéo explique également comment jouer sans le jeu de cartes",
        "pieces-of-paper" => "Il faut également 24 morceaux de papier à placer sur les cases déjà empruntées",
        "card-alternative" => "À la place du jeu de cartes CodyRoby, vous pouvez utiliser les icônes des cartes disponibles ici",
        "small-drawings" => "Il est possible d’ajouter de petits dessins afin d’aider à raconter l’histoire. Les dessins utilisés dans la vidéo sont disponibles ici",
        "rest-of-cards" => "Pour le reste, nous utilisons les cartes de CodyRoby, CodyFeet ou CodyColour."
    ],


    'catch-the-robot' => [
        'title' => "Attrape le robot",
        'text' => "«Attrape le robot» est un jeu de compétition qui peut être joué sur une table ou au sol. Le joueur qui capture le robot de l’équipe adverse en atteignant sa case sur le plateau remporte la partie. Le caractère aléatoire des cartes à jouer oblige les deux équipes à adapter continuellement leurs stratégies.",
        'questions' => [
            'content' =>
                [
                    1 => "Q1. Sur quelles cases peut aller le pion rose (Roby) s’il se trouve sur la case centrale C3 face au nord, et que l’équipe rose a 2 cartes «Avancer», 2 cartes «Tourner à gauche» et 1 carte «Tourner à droite»?",
                ]

        ]

    ],

    'the-snake' => [
        'title' => "Le serpent",
        'text' => "«Le serpent» est une sorte de solitaire qui se joue avec les cartes CodyRoby. Le but du jeu est de guider le serpent pour qu’il traverse toutes les cases du plateau sans se mordre la queue.",
        'questions' => [
            'content' =>
                [
                    1 => "Q1. Certains points de départ rendent-ils impossible de passer par toutes les cases sans que le serpent se morde la queue?",
                ]

        ]

    ],

    'storytelling' => [
        'title' => "Narration",
        'text' => "Aujourd’hui, nous allons parler de narration! Utilisez les instructions de CodyRoby, les empreintes de pieds de CodyFeet, ou les couleurs de CodyColour, pour déplacer les pions sur le plateau afin de raconter une histoire. Dispersez les différents éléments de l’histoire sur le plateau.",
        'questions' => [
            'content' =>
                [
                    1 => "Q1. Quel est l’outil le plus polyvalent permettant à Roby de raconter une histoire?",
                    2 => "Q2. Pouvez-vous organiser les parties de l’histoire que vous voulez raconter dans certaines positions sur le plateau afin qu’il soit impossible de toutes les récupérer en jouant avec CodyFeet?",
                ]

        ]

    ],


    'texts' => [
        1 => 'Coding@Home propose une série de courtes vidéos, de matériel de bricolage, de puzzles, de jeux et de défis de codage pour une utilisation quotidienne en famille et à l’école. Pas besoin de connaissances préalables ou d’appareils électroniques pour réaliser ces activités. Les activités stimuleront la réflexion informatique et cultiveront les compétences des élèves, des parents et des enseignants à la maison ou en milieu scolaire.',
        2 => 'La série Coding@Home du Code Week de l’UE s’appuie sur l’initiative <a
                                href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">« Coding in famiglia»</a> de l’Université d’Urbino et de l’Association CodeMOOCnet, en coopération avec Rai Cultura.  Alessandro Bogliolo est professeur de systèmes informatiques à l’Université d’Urbino, <a href="/ambassadors?country_iso=IT"
                                   target="_blank">ambassadeur italien du Code Week de l’UE</a> et coordinateur de tous les ambassadeurs, ainsi que membre du Conseil d’administration de la Digital Skills and Jobs Coalition.',


        3 => 'Si vous êtes intéressé par d’autres activités débranchées, ou couvrant différents langages de programmation, la robotique, micro:bit etc., consultez les <a href="/training">EU Code Weeks « Learning Bits »</a>, avec des didacticiels vidéo et des programmes de cours s’adressant aux écoles primaires, secondaires inférieures et supérieures. Consultez également la page des ressources du Code Week de l’UE pour les <a href="/resources/learn">apprenants</a> et les <a href="/resources/teach">enseignants</a>.'


    ]
];