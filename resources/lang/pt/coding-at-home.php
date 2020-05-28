<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Perguntas',
    'material' => [
        "required" => "Material necessário",
        "chequered" => "tabuleiro quadriculado",
        "footprint" => "peças com imagens de pegadas"
    ],
    'intro' => [
        'title' => 'Introdução à Coding@Home',
    ],
    'explorer' => [
        'title' => 'O Explorador',
        'text' => '«O Explorador» é a primeira atividade da Coding@Home. Desloque o explorador pelo tabuleiro para chegar ao destino, após passar pelo maior número de casas possível. ',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Com as posições de partida e de chegada indicadas no vídeo, é possível o explorador passar por todas as casas do tabuleiro?',
                    2 => 'P2. Quais são as posições de partida e de chegada que impedem o explorador de visitar o maior número de casas no tabuleiro?'
                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Direita e esquerda',
        'text' => '«Direita e esquerda» é um jogo competitivo e colaborativo. As duas equipas colaboram para criar um caminho em direção ao destino, enquanto competem para utilizar o maior número possível de peças que lhes são atribuídas: a equipa amarela tenta inserir o maior número possível de voltas para a esquerda e a equipa vermelha tenta inserir o maior número possível de voltas para a direita.',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Com a partida e a chegada organizadas como no primeiro jogo do vídeo, é possível que uma das duas equipas ganhe?',
                    2 => 'P2. Com a partida e a chegada organizadas como no jogo em que a Anna ganhou, poderia haver um empate?',
                    3 => 'P3. É possível organizar a partida e a chegada de forma a favorecer uma das duas equipas?',
                    4 => 'P4. Tendo em conta a disposição entre as posições de partida e de chegada, é possível prever qual será a distância entre a equipa vencedora e a perdedora?'
                ]

        ]

    ],


    'keep-off-my-path' => [
        'title' => 'Sai do meu caminho',
        'text' => '«Sai do meu caminho» é um jogo competitivo entre duas equipas. Partindo de extremos opostos do tabuleiro, as duas equipas constroem caminhos que criam entraves uma à outra. Ganha a equipa que conseguir impedir que a outra expanda o seu caminho.',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Existe algum ponto de partida que possa favorecer uma das duas equipas?',
                    2 => 'P2. Pode haver um empate?',
                    3 => 'P3. O jogador que avança primeiro está em vantagem?',
                    4 => 'P4. Existe uma estratégia de jogo inatacável que o primeiro jogador pode adotar para garantir que nunca perde?'
                ]

        ]

    ],

    'tug-of-war' => [
        'title' => 'Braço-de-ferro',
        'text' => '«Braço-de-ferro» é um jogo colaborativo e competitivo. A partir do centro inferior do tabuleiro, duas equipas (amarela e vermelha) trabalham em conjunto para chegar ao topo. A equipa amarela tenta chegar às caixas da esquerda, enquanto a equipa vermelha tenta chegar às caixas da direita.',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Existe uma estratégia que resulte sempre em vitória?',
                    2 => 'P2. O jogador que avança primeiro está em vantagem?',
                    3 => 'P3. Se os dois jogadores estiverem igualmente atentos, pode o jogo terminar sempre num empate, ou seja, no centro?',
                ]

        ]

    ],

    'explorer-without-footprints' => [
        'title' => 'Explorador sem pegadas',
        'text' => 'O explorador percorre o tabuleiro desde o ponto de partida até ao ponto de chegada, tentando passar por todas as casas. À medida que o explorador avança, vai deixando pegadas coloridas, que permitem ao robô seguir os seus passos ao interpretar as cores. O jogo torna-se ainda mais desafiante quando o explorador limpa as pegadas deixando apenas as cores.',
        'material' => 'bem como marcadores (ou lápis) em vermelho, amarelo e cinzento',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Qual é a diferença entre um tabuleiro repleto de pegadas coloridas e um com cores mas sem pegadas?',
                    2 => 'P2. Qual dos tabuleiros oferece mais liberdade de movimento, mantendo as mesmas regras de mudança de direção indicadas pela cor?',
                    3 => 'P3. Existem caminhos possíveis no tabuleiro com cores que não são possíveis no tabuleiro com pegadas coloridas?',
                    4 => 'P4. Existem caminhos possíveis no tabuleiro com pegadas coloridas que não são possíveis no tabuleiro que apenas tenha cores?'
                ]

        ]

    ],

    'texts' => [
        1 => 'A Coding@Home é uma coleção de vídeos curtos, materiais do tipo «faça-você-mesmo», quebra-cabeças, jogos e desafios de programação para o dia a dia em família bem como na escola. Não necessita de conhecimentos prévios nem de dispositivos eletrónicos para realizar as atividades. As atividades irão estimular o pensamento computacional e cultivar as competências dos alunos, dos pais e dos professores em casa ou na escola.',
        2 => 'A série Coding@Home da Semana Europeia da Programação tem por base a iniciativa <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> da Universidade de Urbino e a CodeMOOCnet Association em cooperação com a Rai Cultura. Alessandro Bogliolo é professor de Sistemas de Processamento de Informação na Universidade de Urbino, <a href="/ambassadors?country_iso=IT" target="_blank">embaixador italiano da Semana Europeia da Programação</a>, coordenador de todos os embaixadores e membro do conselho de administração da Digital Skills and Jobs Coalition. ',
        3 => 'Se estiver interessado em mais atividades sem recurso a computadores ou em atividades em diferentes linguagens de programação, robótica, micro:bit, etc., consulte os <a href="/training">«Bits de Aprendizagem»</a> da Semana Europeia da Programação com vídeos didáticos e planos de aula para escolas do 1.º, 2.º e 3.º ciclo do ensino básico e do ensino secundário. Visite também a página de recursos da Semana Europeia da Programação para <a href="/resources/learn">alunos</a> e <a href="/resources/teach">professores.</a> '
    ]
];