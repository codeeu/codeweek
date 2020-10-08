<?php

return [

    'title' => 'Coding@Home – video tutorials',
    'questions' => 'Questions',
    'material' => [
        "required" => "Required material",
        "chequered" => "chequered board",
        "footprint" => "tiles with footprint pictures"
    ],
    'intro' => [
        'title' => 'Introduction to Coding@Home',
    ],
    'explorer' => [
        'title' => 'The explorer',
        'text' => 'The explorer is the first Coding@Home activity. Move the explorer around the board to reach the target after visiting as many squares as possible.',
        'questions' => [
            'title' => 'Questions',
            'content' =>
                [
                    1 => 'Q1. With the starting and finishing positions shown in the video, is it possible for the explorer to visit all the boxes on the board?',
                    2 => 'Q2. Which starting and finishing positions prevent the explorer from visiting the greatest number of boxes on the board?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Right and left',
        'text' => 'Right and left is a competitive and collaborative game. The two teams collaborate to create a path towards the target, while they compete to use as many as possible of the tiles assigned to them: the yellow team tries to insert as many turns to the left as possible and the red team tries to insert as many turns to the right as possible.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. With start and finish arranged as in the first match in this video, is it possible for one of the two teams to win?',
                    2 => 'Q2. With start and finish arranged as in the game won by Anna, could there be a draw?',
                    3 => 'Q3. Are there any starting and finishing arrangements that favour one of the two teams?',
                    4 => 'Q4. Given the disposition between starting and finishing positions, is it possible to predict what the gap will be between the winning and the losing team?'
                ]

        ]

    ],

    'keep-off-my-path' => [
        'title' => 'Keep of my path',
        'text' => 'Keep of my path is a competitive game with two teams. Starting from opposite ends of the board, the two teams build paths that hinder each other. The team that prevents the other from extending their path wins.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Are there any starting points that favour one of the two teams?',
                    2 => 'Q2. Could there be a draw?',
                    3 => 'Q3. Does the player that goes first have an advantage?',
                    4 => 'Q4. Is there an watertight game strategy that the player who moves first can adopt to make sure he never loses?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Tug of war',
        'text' => 'Tug of war is a collaborative and competitive game. Starting from the centre of the bottom of the board, two teams (yellow and red) work together to reach the top. The yellow team is trying to reach the boxes on the left while the red team is trying to reach the boxes on the right.',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Is there a strategy that will always result in victory?',
                    2 => 'Q2. Does the player that goes first have an advantage?',
                    3 => 'Q3. If the two players are equally attentive does the game always end in a draw, i.e. in the centre?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'The explorer without footprints',
        'text' => 'The explorer walks around the board from the starting point to the target, trying to visit all the boxes. As the explorer  walks s/he leaves coloured footprints, which allow the robot to follow the steps by interpreting the colours. The game becomes even more intriguing when the explorer clears away the footprints leaving only the colours.',
        'material' => 'red, yellow, and grey markers (or pencils)',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. What is the difference between the board full of coloured footprints and the one with colours but no footprints?',
                    2 => 'Q2. Which board offers more freedom of movement, keeping the same rules for turning as indicated by colour?',
                    3 => 'Q3. Are there possible paths on the board with colours, which are not possible on the board with coloured footprints?',
                    4 => 'Q4. Are there possible paths on the board with coloured footprints, which are not possible on the board with just colours?'
                ]

        ]

    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Walk as long as you can',
        'text' => 'In this activity the challenge is to stay as long as possible on the board using colours instead of footprints. The activity becomes harder when the freedom of movement increases',
        'coloured-cards' => "coloured cards, or red, yellow and grey markers",
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. When do the two paths collide and block each other?',
                    2 => 'Q2. This game is presented as a two-player game? Is it possible to play it in 3 or 4 players? Do we need to change the rules?',
                ]

        ]

    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles and Roby',
        'text' => 'The story of Ada Lovelace and Charles Babbage is an interesting one. They conceived and programmed computers a hundred years before they were actually invented',
        'material' => 'modelling clay and a short pencil',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Try to imagine that the robot you built with modelling clay and a pencil is able to move on the board to reach any position and, if needed, to trace its path. What instructions would you use to program it?'
                ]

        ]

    ],

    'cody-and-roby' => [
        'title' => 'Cody and Roby',
        'text' => 'This is a role-playing game with the programmer, Cody, and the robot, Roby. The video introduces the cards of CodyRoby, that we will use from now on to determine movements on the board. Cody will use these cards to give Roby instructions for how to move on the board',
        'material' => 'chequered board with labels, instruction cards (left, right, forward), and any counters to be placed on the board',
        'starter-kit' => 'CodyRoby starter kit',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. Where does Roby arrive if, starting from position C2 facing South, he executes the last sequence of instructions shown in the video?',
                    2 => 'Q2. Could the movements Roby carries out by executing the last sequence of instructions shown in the video be described by applying the instructions of CodyFeet or CodyColor to the board?',
                    3 => 'Q3. The three types of instructions introduced in the video, represented by the green, red and yellow cards, constitute an instruction set capable of driving Roby anywhere on the board. Can you come up with an instruction set with fewer than 3 instructions to do the same?',
                ]

        ]

    ],

    'the-tourist' => [
        'title' => 'The tourist',
        'text' => 'With the CodyRoby cards, two teams challenge each other to find, in the shortest time possible, the sequence of instructions that will guide the tourist to the monuments that she wants to visit on the board',
        'material' => 'Larger cards can be useful to play on the floor',
        'questions' => [
            'content' =>
                [
                    1 => 'Q1. What sequence of instructions would guide the tourist to the Statue of Raphael in the first example shown in the video?',
                    2 => 'Q2. What sequence of instructions would guide the tourist to the Torricini of the Ducal Palace in the second example shown in the video?',
                    3 => 'Q3. Can you think of a fun way to do some exercise every time one of the two teams chooses a card to add to the program? Invent a way by rethinking the relay race shown in the video',
                ]

        ]

    ],

    'material2' => [
        "chequered-with-labels" => "chequered board with labels",
        "cards" => "24 ‘Go Forward’ cards, 8 ‘Turn Left’ cards, and 8 ‘Turn Right’ direction cards",
        "larger-cards" => "Larger cards are recommended for the floor version",
        "video" => "The video also explains how to play without the deck of cards",
        "pieces-of-paper" => "24 pieces of paper are also needed to be placed on the squares already visited",
        "card-alternative" => "As an alternative to the deck of CodyRoby cards, you can use the card icons available here",
        "small-drawings" => "An addition could be small drawings to help tell the story. Those used in the video are here",
        "rest-of-cards" => "For the rest we use the cards of CodyRoby, CodyFeet, or CodyColour"
    ],

    'catch-the-robot' => [
        'title' => "Catch the robot",
        'text' => "Catch the robot is a competitive table top or floor game. The player who captures the opposing team's robot by reaching its square on the board wins. The randomness of the playing cards requires both teams to continuously adjust their strategies.",
        'questions' => [
            'content' =>
                [
                    1 => "Q1. If the pink pawn (Roby) is on the central square C3 facing North, and the pink team has 2 ‘Go Forward’ cards, 2 ‘Turn Left’ cards, and 1 ‘Turn Right’ card, to which squares can he go?",
                ]

        ]

    ],

    'the-snake' => [
        'title' => "The snake",
        'text' => "The snake is a type of solitaire played with CodyRoby cards. The aim of the game is to guide the snake through all of the squares on the board without biting its tail.",
        'questions' => [
            'content' =>
                [
                    1 => "Q1. Are there any starting points that make it impossible to visit all the squares without biting the snake's tail?",
                ]

        ]

    ],

    'storytelling' => [
        'title' => "Storytelling",
        'text' => "Today's topic is storytelling! Use the instructions of CodyRoby, the footprints of CodyFeet, or the colours of CodyColour, to guide the pawns around the board to tell a story. Scatter different parts of the story around the board.",
        'questions' => [
            'content' =>
                [
                    1 => "Q1. Which tool is the most versatile for guiding Roby to tell a story?",
                    2 => "Q2. Can you arrange the parts of the story that you want to tell on the board in positions that make it impossible to retrieve them all with CodyFeet?",
                ]

        ]

    ],


    'texts' => [
        1 => 'Coding@Home is a collection of short videos, do-it-yourself materials, puzzles, games, and
                        coding challenges for everyday use in the family as well as at school. You do not need any
                        previous knowledge or electronic devices to do the activities. The activities will stimulate
                        computational thinking and cultivate the skills of pupils, parents and teachers at home or in
                        school.',
        2 => 'EU Code Week’s Coding@Home series builds on the <a
                                href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in
                            famiglia”</a> initiative of the University of Urbino and the CodeMOOCnet
                        Association in cooperation with Rai Cultura.
                        Alessandro Bogliolo is the Professor of Information Processing Systems at the University of
                        Urbino, <a href="/ambassadors?country_iso=IT"
                                   target="_blank">Italian EU Code Week ambassador</a> and coordinator of all
                        ambassadors as well as member of
                        the Governing Board of the Digital Skills and Jobs Coalition.',
        3 => 'If you are interested in more unplugged activities, or activities in different programming
                        languages, robotics, micro:bit etc., check out the <a href="/training">EU Code
                            Weeks “Learning Bits”</a> with video
                        tutorials and lesson plans for primary, lower secondary and upper secondary schools. Also have a
                        look at the EU Code Week resources page for <a href="/resources/learn">learners</a>
                        and <a href="/resources/teach">teachers</a>.'
    ]
];