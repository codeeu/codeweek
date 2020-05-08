<?php

return [

    'title' => 'Coding@Home – video tutorials',
    'intro' => [
        'title' => '0. Introduction to Coding@Home',
        'text' => 'The "Coding@Home" are short videos with do-it-yourself materials, puzzles, engaging games and coding
                    challenges for everyday use in the family as well as at school. You do not need any previous
                    knowledge of coding and you do not need any electronic devices to do the activities. The activities
                    will stimulate computational thinking and cultivate the skills of pupils, parents and teachers at
                    home or in school.'
    ],
    'explorer' => [
        'title' => '1. The explorer',
        'text' => 'The explorer is the first Coding@Home activity. Move the explorer around the board to reach the target after visiting as many squares as possible.',
        'material' => 'Required material: <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">chequered board</a>, <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/CodyFeet-sheet.pdf">tiles with footprint pictures</a>.',
        'questions' => [
            'title' => 'Questions',
            'content' =>
                [
                    1 => 'With the starting and finishing positions shown in the video, is it possible for the explorer to visit all the boxes on the board?',
                    2 => 'Which starting and finishing positions prevent the explorer from visiting the greatest number of boxes on the board?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => '2. Right and left',
        'text' => 'Right and left is a competitive and collaborative game. The two teams collaborate to create a path towards the target, while they compete to use as many as possible of the tiles assigned to them: the yellow team tries to insert as many turns to the left as possible and the red team tries to insert as many turns to the right as possible.',
        'material' => 'Required material: chequered board, tiles with footprint pictures.',
        'questions' => [
            'title' => 'Questions',
            'content' =>
                [
                    1 => 'With start and finish arranged as in the first match in this video, is it possible for one of the two teams to win?',
                    2 => 'With start and finish arranged as in the game won by Anna, could there be a draw?',
                    3 => 'Are there any starting and finishing arrangements that favour one of the two teams?',
                    4 => 'Given the disposition between starting and finishing positions, is it possible to predict what the gap will be between the winning and the losing team?'
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