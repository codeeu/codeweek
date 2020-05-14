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