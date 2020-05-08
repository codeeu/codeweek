<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Preguntas',
    'material' => [
        "required" => "Material necesario",
        "chequered" => "tablero de cuadros",
        "footprint" => "fichas con huellas de pies"
    ],
    'intro' => [
        'title' => 'Introducción a Coding@Home',
    ],
    'explorer' => [
        'title' => 'El explorador',
        'text' => 'El explorador es la primera actividad de Coding@Home. Se trata de hacer avanzar el explorador por el tablero para llegar a la meta, después de pasar por tantas casillas como sea posible. ',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Con las posiciones de salida y meta que se muestran en el vídeo, ¿es posible que el explorador pase por todas las casillas del tablero?',
                    2 => 'P2. ¿Qué posiciones de salida y llegada impiden al explorador pasar por el mayor número de casillas del tablero?'                ]

        ]

    ],

    'right-and-left' => [
        'title' => 'Derecha e izquierda',
        'text' => 'Derecha e izquierda es un juego competitivo y colaborativo, porque los dos equipos colaboran para crear el camino hacia la meta, pero también compiten para utilizar el mayor número posible de fichas que se les asignan: el equipo amarillo intentará colocar el mayor número posible de fichas con giros hacia a la izquierda y el equipo rojo intenta colocar el mayor número de fichas con giros a la derecha.',
        'questions' => [
            'content' =>
                [
                    1 => 'P1. Con las posiciones de salida y meta mostradas en la primera parte del video, ¿es posible que uno de los dos equipos gane?',
                    2 => 'P2. Con la salida y la meta dispuestas como en el juego ganado por Anna, ¿podría haber un empate?',
                    3 => 'P3. ¿Hay alguna disposición de salida y meta que favorezca a uno de los dos equipos?',
                    4 => 'P4. Dada la disposición de las posiciones de salida y meta, ¿es posible predecir cuál será la diferencia entre el equipo ganador y el perdedor?'
                ]

        ]

    ],

    'texts' => [
        1 => 'Coding@Home es una colección de vídeos cortos, material DIY (hazlo tú mismo), rompecabezas, juegos y desafíos de programación para el uso cotidiano tanto en la familia como en la escuela. No se requieren conocimientos previos ni dispositivos electrónicos para realizar las actividades. Estas actividades están ideadas para estimular el pensamiento computacional y cultivar las competencias de alumnos, padres y maestros en el hogar o en la escuela.',
        2 => 'La serie Coding@Home de la Semana de la Programación de la UE se basa en la iniciativa <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">"Programación en familia"</a> puesta en marcha por la Universidad de Urbino y la Asociación CodeMOOCnet en colaboración con Rai Cultura. Alessandro Bogliolo es profesor de sistemas de tratamiento de la información en la Universidad de Urbino,  <a href="/ambassadors?country_iso=IT" target="_blank">embajador italiano de la Semana de la Programación de la UE</a>  y coordinador de todos los embajadores, así como miembro del Consejo de Administración de la Coalición de Competencias y Empleos Digitales. ',
        3 => 'Si deseas más actividades sin tecnología digital (analógicas) o actividades en diferentes lenguajes de programación, robótica, micro:bit, etc., consulta los <a href="/training">"Minicursos de formación"</a> de la Semana de la Programación de la EU con tutoriales y planes de estudios en vídeos para escuelas de primaria, secundaria de primer ciclo y secundaria de segundo ciclo. También puedes echar un vistazo a la página de recursos de la Semana de la Programación de la UE para <a href="/resources/learn">estudiantes</a> y <a href="/resources/teach">profesores.</a>'
    ]
];