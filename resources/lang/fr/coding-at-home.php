<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Questions',
    'intro' => [
        'title' => 'Présentation de Coding@Home',
    ],
    'material' => [
        'required' => 'Matériel nécessaire',
        'chequered' => 'tableau à damiers',
        'footprint' => 'tuiles avec des images d’empreintes',
    ],
    'explorer' => [
        'title' => 'L’explorateur',
        'text' => 'L’explorateur désigne la première activité de Coding@Home. Déplacez l’explorateur sur le tableau pour atteindre la cible après avoir visité autant de cases que possible. ',
        'questions' => [
            'content' => [
                1 => 'Q1. Avec les points de départ et d’arrivée montrés dans la vidéo, est-il possible pour l’explorateur de visiter toutes les cases du tableau ?',
                2 => 'Q2. Quels sont les points de départ et d’arrivée qui empêchent l’explorateur de visiter le plus grand nombre de cases du tableau ?',
            ],

        ],

    ],

    'right-and-left' => [
        'title' => 'Droite et gauche',
        'text' => 'Right and Left est un jeu de compétition et de collaboration. Les deux équipes collaborent pour créer un chemin vers la cible, tandis qu’elles s’affrontent pour utiliser le plus grand nombre possible de tuiles qui leur sont attribuées : l’équipe jaune tente d’insérer le plus grand nombre possible de tours à gauche et l’équipe rouge tente d’insérer le plus grand nombre possible de tours à droite.',
        'questions' => [
            'content' => [
                1 => 'Q1. Avec un départ et une arrivée organisés comme dans le premier match de cette vidéo, est-il possible pour l’une des deux équipes de gagner ?',
                2 => 'Q2. Avec un départ et une arrivée organisés comme dans le jeu gagné par Anna, pourrait-il y avoir un match nul ?',
                3 => 'Q3. Y a-t-il des dispositions de départ et d’arrivée qui favorisent l’une des deux équipes ?',
                4 => 'Q4. Compte tenu de la disposition des points de départ et d’arrivée, est-il possible de prévoir l’écart entre l’équipe gagnante et l’équipe perdante ?',
            ],

        ],

    ],

    'keep-off-my-path' => [
        'title' => 'Keep of my path',
        'text' => 'Keep of my path est un jeu compétitif opposant deux équipes. En partant des extrémités opposées du plateau, les deux équipes tracent des chemins qui se gênent mutuellement. L’équipe qui empêche l’autre de prolonger son chemin gagne.',
        'questions' => [
            'content' => [
                1 => 'Q1. Y a-t-il des points de départ qui favorisent l’une des deux équipes ?',
                2 => 'Q2. Pourrait-il y avoir un match nul ?',
                3 => 'Q3. Le joueur qui part le premier a-t-il un avantage ?',
                4 => 'Q4. Existe-t-il une stratégie de jeu imparable que le joueur commençant le premier pourrait adopter pour s’assurer de ne jamais perdre ?',
            ],

        ],

    ],

    'tug-of-war' => [
        'title' => 'Tug of war',
        'text' => 'Tug of war est un jeu de collaboration et de compétition. En partant du centre du bas du plateau, deux équipes (jaune et rouge) s’allient pour atteindre le sommet. L’équipe jaune essaie d’atteindre les cases de gauche tandis que l’équipe rouge essaie d’atteindre les cases de droite.',
        'questions' => [
            'content' => [
                1 => 'Q1. Existe-t-il une stratégie qui aboutira systématiquement à une victoire ?',
                2 => 'Q2. Le joueur qui part le premier a-t-il un avantage ?',
                3 => 'Q3. Si les deux joueurs sont aussi attentifs l’un que l’autre, la partie se termine-t-elle toujours par un match nul, c’est-à-dire au centre ?',
            ],

        ],

    ],

    'explorer-without-footprints' => [
        'title' => 'L’explorateur sans traces de pas',
        'text' => 'L’explorateur fait le tour du tableau, du point de départ à la cible, en essayant de passer par toutes les cases. Ce faisant, l’explorateur laisse des traces de pas colorées, qui permettent au robot de suivre les étapes en interprétant les couleurs. Le jeu devient encore plus intrigant lorsque l’explorateur efface les traces de pas en ne laissant que les couleurs.',
        'material' => 'marqueurs (ou des crayons) rouges, jaunes et gris',
        'questions' => [
            'content' => [
                1 => 'Q1. Quelle est la différence entre le tableau rempli de traces de couleur et celui avec des couleurs, mais sans traces ?',
                2 => 'Q2. Quel tableau offre une plus grande liberté de mouvement, en conservant les mêmes règles de rotation que celles indiquées par la couleur ?',
                3 => 'Q3. Y a-t-il des chemins possibles sur le tableau avec des couleurs, qui ne sont pas possibles sur le tableau avec des traces de pas de couleur ?',
                4 => 'Q4. Existe-t-il sur le tableau des pistes possibles avec des traces de couleur, ce qui n’est pas possible sur le tableau avec des couleurs uniquement ?',
            ],

        ],

    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Marchez aussi longtemps que vous le pouvez',
        'text' => 'Dans le cadre de cette activité, le défi consiste à rester le plus longtemps possible sur le plateau de jeu en utilisant des couleurs à la place des empreintes. L’activité devient plus difficile à mesure que les possibilités de déplacement augmentent',
        'coloured-cards' => 'des cartes de couleur, ou des balises rouges, jaunes et grises',
        'questions' => [
            'content' => [
                1 => 'Q1. Quand les deux parcours se rencontrent-ils et se bloquent-ils l’un l’autre?',
                2 => 'Q2. Ce jeu est-il présenté comme un jeu à deux joueurs? Est-il possible d’y jouer à trois ou quatre joueurs? Faut-il modifier les règles?',
            ],

        ],

    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles et Roby',
        'text' => 'L’histoire d’Ada Lovelace et de Charles Babbage est intéressante. Ils ont conçu et programmé des ordinateurs cent ans avant qu’ils ne soient réellement inventés',
        'material' => 'de la pâte à modeler et un petit crayon',
        'questions' => [
            'content' => [
                1 => 'Q1. Essayez d’imaginer que le robot que vous avez fabriqué avec de la pâte à modeler et un crayon est capable de se déplacer sur le plateau de jeu pour atteindre n’importe quel emplacement et, si nécessaire, de tracer son parcours. Quelles instructions utiliseriez-vous pour le programmer?',
            ],

        ],

    ],

    'cody-and-roby' => [
        'title' => 'Cody et Roby',
        'text' => 'Il s’agit d’un jeu de rôle avec le programmeur, Cody, et le robot, Roby. La vidéo présente les cartes de CodyRoby, que nous utiliserons désormais pour décider des déplacements sur le plateau de jeu. Cody utilisera ces cartes pour donner à Roby des instructions sur la façon de se déplacer sur le plateau de jeu',
        'material' => 'un damier avec des étiquettes, des cartes d’instructions (gauche, droite, en avant) et tous les jetons à placer sur le plateau de jeu',
        'starter-kit' => 'kit de démarrage CodyRoby',
        'questions' => [
            'content' => [
                1 => 'Q1. Où arrive Roby si, à partir de la position C2, face au sud, il exécute la dernière séquence d’instructions de la vidéo?',
                2 => 'Q2. Les déplacements que Roby effectue en exécutant la dernière séquence d’instructions de la vidéo pourraient-ils être décrits en appliquant les instructions de CodyFeet ou de CodyColor au plateau de jeu?',
                3 => 'Q3. Les trois types d’instructions présentés dans la vidéo, représentés par les cartes vertes, rouges et jaunes, constituent un jeu d’instructions capable de conduire Roby n’importe où sur le plateau. Pouvez-vous trouver un jeu d’instructions comportant moins de trois instructions pour faire la même chose?',
            ],

        ],

    ],

    'the-tourist' => [
        'title' => 'Le touriste',
        'text' => 'Avec les cartes CodyRoby, deux équipes s’affrontent pour trouver, le plus rapidement possible, la séquence d’instructions qui guidera le touriste vers les monuments qu’il veut visiter sur le plateau de jeu',
        'material' => 'De plus grandes cartes peuvent être utiles pour jouer sur le sol',
        'questions' => [
            'content' => [
                1 => 'Q1. Quelle séquence d’instructions guiderait le touriste vers la statue de Raphaël dans le premier exemple de la vidéo?',
                2 => 'Q2. Quelle séquence d’instructions guiderait le touriste vers les tourelles du palais ducal dans le second exemple de la vidéo?',
                3 => 'Q3. Pouvez-vous imaginer une façon amusante de faire de l’exercice à chaque fois que l’une des deux équipes choisit une carte à ajouter au programme? Inventez-en une en repensant la course de relais montrée dans la vidéo',
            ],

        ],

    ],

    'material2' => [
        'chequered-with-labels' => 'un damier avec des étiquettes',
        'cards' => '24 cartes «Avancer», 8 cartes «Tourner à gauche» et 8 cartes «Tourner à droite»',
        'larger-cards' => 'il est recommandé d’utiliser de plus grandes cartes pour la version au sol',
        'video' => 'La vidéo explique également comment jouer sans le jeu de cartes',
        'pieces-of-paper' => 'Il faut également 24 morceaux de papier à placer sur les cases déjà empruntées',
        'card-alternative' => 'À la place du jeu de cartes CodyRoby, vous pouvez utiliser les icônes des cartes disponibles ici',
        'small-drawings' => 'Il est possible d’ajouter de petits dessins afin d’aider à raconter l’histoire. Les dessins utilisés dans la vidéo sont disponibles ici',
        'rest-of-cards' => 'Pour le reste, nous utilisons les cartes de CodyRoby, CodyFeet ou CodyColour.',
    ],

    'catch-the-robot' => [
        'title' => 'Attrape le robot',
        'text' => '«Attrape le robot» est un jeu de compétition qui peut être joué sur une table ou au sol. Le joueur qui capture le robot de l’équipe adverse en atteignant sa case sur le plateau remporte la partie. Le caractère aléatoire des cartes à jouer oblige les deux équipes à adapter continuellement leurs stratégies.',
        'questions' => [
            'content' => [
                1 => 'Q1. Sur quelles cases peut aller le pion rose (Roby) s’il se trouve sur la case centrale C3 face au nord, et que l’équipe rose a 2 cartes «Avancer», 2 cartes «Tourner à gauche» et 1 carte «Tourner à droite»?',
            ],

        ],

    ],

    'the-snake' => [
        'title' => 'Le serpent',
        'text' => '«Le serpent» est une sorte de solitaire qui se joue avec les cartes CodyRoby. Le but du jeu est de guider le serpent pour qu’il traverse toutes les cases du plateau sans se mordre la queue.',
        'questions' => [
            'content' => [
                1 => 'Q1. Certains points de départ rendent-ils impossible de passer par toutes les cases sans que le serpent se morde la queue?',
            ],

        ],

    ],

    'storytelling' => [
        'title' => 'Narration',
        'text' => 'Aujourd’hui, nous allons parler de narration! Utilisez les instructions de CodyRoby, les empreintes de pieds de CodyFeet, ou les couleurs de CodyColour, pour déplacer les pions sur le plateau afin de raconter une histoire. Dispersez les différents éléments de l’histoire sur le plateau.',
        'questions' => [
            'content' => [
                1 => 'Q1. Quel est l’outil le plus polyvalent permettant à Roby de raconter une histoire?',
                2 => 'Q2. Pouvez-vous organiser les parties de l’histoire que vous voulez raconter dans certaines positions sur le plateau afin qu’il soit impossible de toutes les récupérer en jouant avec CodyFeet?',
            ],

        ],

    ],

    'two-snakes' => [
        'title' => 'Les deux serpents',
        'text' => 'À l’aide des cartes CodyRoby, deux serpents se déplacent sur le damier en tentant de se bloquer mutuellement. La règle de base est très simple: vous ne pouvez pas retourner sur une case où un serpent est déjà passé. Celui qui parvient à se déplacer librement le plus longtemps remporte la partie.',
        'material' => 'les cartes CodyRoby, un damier de 5 × 5, deux pions, et des morceaux de papier pour indiquer les cases où les serpents sont déjà passés.',
        'questions' => [
            'content' => [
                1 => 'Q1. Dans la configuration initiale utilisée dans la vidéo, si les deux joueurs ne tirent pas de cartes jaunes pour tourner à gauche, quelles cartes devraient-ils espérer tirer?',
            ],

        ],

    ],

    'round-trip' => [
        'title' => 'Aller-retour',
        'text' => 'Les équipes jouent à tour de rôle. La première trace le trajet aller, tandis que la seconde doit ramener Roby au point de départ. Le jeu semble simple, mais il ne l’est pas, surtout si vous planifiez les déplacements simplement en les visualisant, sans réellement déplacer Roby...',
        'material' => 'les cartes CodyRoby, un damier de 5 × 5, deux pions, et des morceaux de papier pour indiquer les cases où les serpents sont déjà passés.',
        'questions' => [
            'content' => [
                1 => 'Q1. Est-il possible que le programme conçu pour ramener Roby au point de départ soit plus court (c’est-à-dire, composé de moins d’instructions), que le programmer aller?',
            ],

        ],

    ],

    'meeting-point' => [
        'title' => 'Point de rencontre',
        'text' => 'Cette fois-ci, nous planifions nos déplacements avant de commencer. Les deux équipes posent les cartes sur la table pour créer la séquence d’instructions qui leur permettra de déplacer leurs robots respectifs, mais aucun robot ne bouge tant que l’un des joueurs n’a pas dit «Partez!». Au moment où ce mot est prononcé, la programmation prend fin et les joueurs passent à l’action. Le joueur qui a dit «Partez!» ne gagnera que si les deux robots finissent, en suivant les instructions de leur équipe, sur la même case.',
        'material' => 'les cartes CodyRoby, un damier de 5 × 5 et deux pions.',
        'questions' => [
            'content' => [
                1 => 'Q1. Si, d’après vous, il est possible que les deux robots ne se rencontrent jamais, inventez des règles du jeu qui s’appliquent à toutes les situations possibles.',
            ],

        ],

    ],

    'follow-the-music' => [
        'title' => 'Suivez la musique',
        'text' => 'Lorsque les séquences d’instructions de programmation se répètent, elles donnent l’impression de suivre un rythme. Si nous associons un son à chaque instruction, nous pouvons guider Roby en musique. C’est précisément ce que nous allons faire ici. Je vais créer un programme pour vous à partir de différents sons représentant diverses instructions, et vous déplacerez Roby sur le damier en suivant ces instructions sonores.',
        'material' => 'outre les cartes CodyRoby, le damier et le pion, nous aurons besoin de produire trois sons différents. J’ai utilisé pour ce faire trois verres d’eau remplis à différents niveaux. Et vous, qu’allez-vous utiliser?',
        'questions' => [
            'content' => [
                1 => 'Q1. Essayez de suivre la vidéo et de vous laisser guider par les sons produits par le verre, sans regarder les cartes. Parvenez-vous à reconnaître et à suivre les instructions sonores?',
                2 => 'Q2. Choisissez trois sons que vous associerez aux trois instructions de base. Trouvez une séquence de sons que vous pourriez répéter à l’infini sans jamais faire sortir Roby du damier...',
            ],

        ],

    ],

    'colour-everything' => [
        'title' => 'Tout colorier',
        'text' => 'Peut-on guider les robots sur le plateau de façon à ce que leurs traces constituent un dessin? Dans le cadre de cette activité, nous jouons avec le codage et le pixel art, qui consiste à former des images en coloriant les cases d’un damier, comme des pixels sur un écran.',
        'material' => 'Les cartes CodyRoby, un damier et un pion. Pour colorier les cases, utilise des morceaux de papier à placer sur les cases, ou colorie les cases avec des marqueurs.',
        'questions' => [
            'content' => [
                1 => 'Est-il possible de dessiner les deux cœurs comme dans la dernière partie de la vidéo, en guidant le robot sur toutes les cases nécessaires sans jamais passer deux fois sur la même case?',
            ],

        ],

    ],

    'codyplotter-and-codyprinter' => [
        'title' => 'Cody Traceur et Cody Imprimante?',
        'text' => 'Quelle est la différence entre un traceur et une imprimante? Découvre-le grâce à cette activité de codage hors ligne.',
        'material' => 'en plus du kit CodyRoby, j’ai utilisé un marqueur vert et un nouveau robot en pâte à modeler, mais ce n’est pas obligatoire.',
        'questions' => [
            'content' => [
                1 => 'Peux-tu expliquer la différence entre un traceur et une imprimante?',
                2 => 'Quel dessin produirait Roby Imprimante en se déplaçant sur les lignes du plateau s’il exécutait la séquence d’instructions figurant à la fin de la vidéo?',
            ],

        ],

    ],

    'boring-pixels' => [
        'title' => 'Boring Pixels!/Utilisation de chiffres',
        'text' => 'En donnant à Roby des instructions pour former une image case par case, pixel par pixel, nous découvrons que lorsque de nombreuses cases d’une même ligne sont de la même couleur, nous pouvons utiliser des chiffres pour que ce soit plus intéressant. Les ordinateurs font la même chose...',
        'material' => 'cahier quadrillé, ou damier de 5×5 cases dessiné sur une feuille de papier, et stylo-feutre. Pour représenter le code du dessin, tu peux utiliser un stylo et une feuille de papier.',
        'questions' => [
            'content' => [
                1 => 'Essaie de faire un dessin à damier et représente-le au moyen du codage RLE. La taille du dessin est égale au nombre de cases, mais quelle est la taille de sa représentation RLE?',
            ],

        ],

    ],

    'turning-code-into-pictures' => [
        'title' => 'Transformer du code en images',
        'text' => [
            1 => 'Nous avons vu que nous pouvions créer un code nous permettant de dessiner une image. J’ai imaginé un dessin et j’ai utilisé du code pour le transformer en lettres et en chiffres, que je t’ai donnés. Prends note des lettres et des chiffres et utilise le code pour reconstruire le dessin.',
            2 => 'Voici l’image que j’avais imaginée. Fais-la apparaître sur ton cahier et sur les cahiers de tous ceux qui connaissent le code!',
        ],
        'material' => 'une feuille de papier (de préférence quadrillée) et un stylo.',
        'questions' => [
            'content' => [
                1 => 'Essaie de décoder et de dessiner les images dont je parle à la fin de la vidéo.',
            ],

        ],

    ],

    'texts' => [
        1 => 'Coding@Home propose une série de courtes vidéos, de matériel de bricolage, de puzzles, de jeux et de défis de codage pour une utilisation quotidienne en famille et à l’école. Pas besoin de connaissances préalables ou d’appareils électroniques pour réaliser ces activités. Les activités stimuleront la réflexion informatique et cultiveront les compétences des élèves, des parents et des enseignants à la maison ou en milieu scolaire.',
        2 => 'La série Coding@Home du Code Week de l’UE s’appuie sur l’initiative <a
                                href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">« Coding in famiglia»</a> de l’Université d’Urbino et de l’Association CodeMOOCnet, en coopération avec Rai Cultura.  Alessandro Bogliolo est professeur de systèmes informatiques à l’Université d’Urbino, <a href="/ambassadors?country_iso=IT"
                                   target="_blank">ambassadeur italien du Code Week de l’UE</a> et coordinateur de tous les ambassadeurs, ainsi que membre du Conseil d’administration de la Digital Skills and Jobs Coalition.',

       3 => 'Si vous êtes intéressé par d\'autres activités débranchées, ou des activités dans différents programmes, tels que les langues, la robotique, le micro :bit, consultez <a href="/training">l\'émission « Learning Bits » de l\'EU Code Week</a> avec des tutoriels vidéo et des plans de cours pour les écoles primaires, le premier cycle du secondaire et le deuxième cycle du secondaire. Jetez également un coup d\'œil aux ressources Learn&Teach de l\'EU Code Week , où vous pouvez trouver des ressources gratuites et de haute qualité du monde entier pour les enseignants et les étudiants.',


    ],
    'coding-at-home-text' => 'Une collection de courtes vidéos, de matériel de bricolage, de puzzles, de jeux et de défis de codage pour une utilisation quotidienne en famille comme à l\'école.',
    'coding-at-home-sub-text1' => 'La série de Coding@Home de l\'EU Code Week s\'appuie sur l\' <a class="text-dark-blue underline" href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">initiative « Coding in famiglia »</a>de l\'Université d\'Urbino et de l\'association CodeMOOCnet en coopération avec Rai Cultura. L\'auteur de Coding@Home vidéo est Alessandro Bogliolo, professeur de systèmes de traitement de l\'information à l\'Université d\'Urbino, <a class="text-dark-blue underline" href="https://codeweek.eu/ambassadors?country_iso=IT" target="_blank">ambassadeur italien de la Semaine du code de l\'UE</a> et coordinateur de tous les ambassadeurs, ainsi que membre du conseil d\'administration de la Coalition pour les compétences et les emplois numériques. ',
    'coding-at-home-sub-text2' => 'Vous n\'avez besoin d\'aucune connaissance préalable ni d\'appareils électroniques pour effectuer les activités. Les activités stimuleront la pensée informatique et cultiveront les compétences des élèves, des parents et des enseignants à la maison ou à l\'école. ',
];
