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


    'texts' => [
        1 => 'Coding@Home propose une série de courtes vidéos, de matériel de bricolage, de puzzles, de jeux et de défis de codage pour une utilisation quotidienne en famille et à l’école. Pas besoin de connaissances préalables ou d’appareils électroniques pour réaliser ces activités. Les activités stimuleront la réflexion informatique et cultiveront les compétences des élèves, des parents et des enseignants à la maison ou en milieu scolaire.',
        2 => 'La série Coding@Home du Code Week de l’UE s’appuie sur l’initiative <a
                                href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">« Coding in famiglia»</a> de l’Université d’Urbino et de l’Association CodeMOOCnet, en coopération avec Rai Cultura.  Alessandro Bogliolo est professeur de systèmes informatiques à l’Université d’Urbino, <a href="/ambassadors?country_iso=IT"
                                   target="_blank">ambassadeur italien du Code Week de l’UE</a> et coordinateur de tous les ambassadeurs, ainsi que membre du Conseil d’administration de la Digital Skills and Jobs Coalition.',


        3 => 'Si vous êtes intéressé par d’autres activités débranchées, ou couvrant différents langages de programmation, la robotique, micro:bit etc., consultez les <a href="/training">EU Code Weeks « Learning Bits »</a>, avec des didacticiels vidéo et des programmes de cours s’adressant aux écoles primaires, secondaires inférieures et supérieures. Consultez également la page des ressources du Code Week de l’UE pour les <a href="/resources/learn">apprenants</a> et les <a href="/resources/teach">enseignants</a>.'


    ]
];