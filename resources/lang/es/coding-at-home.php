<?php

return [
    'title' => 'Coding@Home',
    'questions' => 'Preguntas',
    'material' => [
        'required' => 'Material necesario',
        'chequered' => 'tablero de cuadros',
        'footprint' => 'fichas con huellas de pies',
    ],
    'intro' => [
        'title' => 'Introducción a Coding@Home',
    ],
    'explorer' => [
        'title' => 'El explorador',
        'text' => 'El explorador es la primera actividad de Coding@Home. Se trata de hacer avanzar el explorador por el tablero para llegar a la meta, después de pasar por tantas casillas como sea posible. ',
        'questions' => [
            'content' => [
                1 => 'P1. Con las posiciones de salida y meta que se muestran en el vídeo, ¿es posible que el explorador pase por todas las casillas del tablero?',
                2 => 'P2. ¿Qué posiciones de salida y llegada impiden al explorador pasar por el mayor número de casillas del tablero?',
            ],
        ],
    ],

    'right-and-left' => [
        'title' => 'Derecha e izquierda',
        'text' => 'Derecha e izquierda es un juego competitivo y colaborativo, porque los dos equipos colaboran para crear el camino hacia la meta, pero también compiten para utilizar el mayor número posible de fichas que se les asignan: el equipo amarillo intentará colocar el mayor número posible de fichas con giros hacia a la izquierda y el equipo rojo intenta colocar el mayor número de fichas con giros a la derecha.',
        'questions' => [
            'content' => [
                1 => 'P1. Con las posiciones de salida y meta mostradas en la primera parte del video, ¿es posible que uno de los dos equipos gane?',
                2 => 'P2. Con la salida y la meta dispuestas como en el juego ganado por Anna, ¿podría haber un empate?',
                3 => 'P3. ¿Hay alguna disposición de salida y meta que favorezca a uno de los dos equipos?',
                4 => 'P4. Dada la disposición de las posiciones de salida y meta, ¿es posible predecir cuál será la diferencia entre el equipo ganador y el perdedor?',
            ],
        ],
    ],

    'keep-off-my-path' => [
        'title' => 'Fuera de mi camino',
        'text' => 'Fuera de mi camino es un juego competitivo entre dos equipos. Comenzando desde extremos opuestos del tablero, los dos equipos deberán construir caminos que se obstaculicen entre sí. El equipo que evite que el otro amplíe su camino gana.',
        'questions' => [
            'content' => [
                1 => 'P1. ¿Hay algún punto de partida que favorezca a uno de los dos equipos?',
                2 => 'P2.. ¿Podría haber un empate?',
                3 => 'P3. ¿Tiene ventaja el primer jugador que empiece?',
                4 => 'P4. ¿Hay alguna estrategia de juego cerrada que pueda adoptar el jugador que mueve primero para no perder nunca?',
            ],
        ],
    ],

    'tug-of-war' => [
        'title' => 'Tira y afloja',
        'text' => 'Tira y afloja es un juego colaborativo y competitivo. Comenzando por el centro de la parte inferior del tablero, dos equipos (amarillo y rojo) deberán trabajan juntos para llegar a la parte superior. El equipo amarillo intentará llegar a las casillas de la izquierda, mientras que el equipo rojo intentará llegar a las casillas de la derecha.',
        'questions' => [
            'content' => [
                1 => 'P1. ¿Hay alguna estrategia que siempre dé la victoria?',
                2 => 'P2. ¿Tiene ventaja el primer jugador que empiece?',
                3 => 'P3. Si los dos jugadores están igual de atentos, ¿el juego siempre termina en un empate, es decir, en el centro?',
            ],
        ],
    ],

    'explorer-without-footprints' => [
        'title' => 'Explorador sin huellas',
        'text' => 'El explorador debe caminar alrededor del tablero desde el punto de salida hasta la meta tratando de pasar por todas las casillas. A medida que el explorador avanza va dejando huellas de colores que permiten al robot seguir los pasos interpretando dichos colores. El juego se vuelve aún más intrigante cuando el explorador elimina las huellas dejando solo los colores.',
        'material' => 'Así como marcadores (o lapiceros) rojo, amarillo y gris.',
        'questions' => [
            'content' => [
                1 => 'P1. ¿Cuál es la diferencia entre el tablero lleno de huellas de colores y el que tiene colores pero no huellas?',
                2 => 'P2. ¿Qué tablero ofrece más libertad de movimiento, manteniendo las mismas reglas de giro indicadas por el color?',
                3 => 'P3. ¿Hay caminos que son posibles en el tablero solo con colores pero que no lo son en el tablero con huellas de colores?',
                4 => 'P4. ¿Hay caminos que son posibles en el tablero con huellas de colores pero que no lo son en el tablero solo con colores?',
            ],
        ],
    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Camina tanto como puedas',
        'text' => 'En esta actividad, el desafío es permanecer en el tablero durante el mayor tiempo posible, utilizando colores en vez de huellas. La actividad se vuelve más difícil a medida que aumenta la libertad de circulación',
        'coloured-cards' => 'tarjetas de colores o marcadores de color rojo, amarillo y gris',
        'questions' => [
            'content' => [
                1 => 'P1. ¿Cuándo chocan los dos caminos y se bloquean entre sí?',
                2 => 'P2. Este juego es para dos jugadores. ¿Es posible jugarlo con tres o cuatro jugadores? ¿Debemos cambiar las reglas?',
            ],
        ],
    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles y Roby',
        'text' => 'La historia de Ada Lovelace y Charles Babbage es interesante. Concibieron y programaron ordenadores cien años antes de que se inventasen realmente',
        'material' => 'arcilla de modelar y un lápiz corto',
        'questions' => [
            'content' => [
                1 => 'P1. Trata de imaginar que el robot que has construido con la arcilla de modelar y el lápiz puede moverse sobre el tablero para llegar a cualquier posición y, de ser necesario, trazar su camino. ¿Qué instrucciones utilizarías para programarlo?',
            ],
        ],
    ],

    'cody-and-roby' => [
        'title' => 'Cody y Roby',
        'text' => 'Este es un juego de rol con el programador, Cody, y el robot, Roby. El vídeo introduce las tarjetas de CodyRoby, las cuales utilizaremos a partir de ahora para determinar los movimientos sobre el tablero. Cody utilizará estas tarjetas para dar instrucciones a Roby sobre cómo moverse sobre el tablero',
        'material' => 'tablero cuadriculado con marcas, tarjetas de instrucciones (izquierda, derecha, adelante) y cualquier contador que deba colocarse sobre el tablero',
        'starter-kit' => 'kit básico de CodyRoby',
        'questions' => [
            'content' => [
                1 => 'P1. ¿A dónde llega Roby si, comenzando en la posición C2 orientado hacia el sur, ejecuta la última secuencia de instrucciones mostrada en el vídeo?',
                2 => 'P2. ¿Podrían los movimientos que realiza Roby al ejecutar la última secuencia de instrucciones mostrada en el vídeo describirse mediante la aplicación de las instrucciones de CodyFeet o CodyColor en el tablero?',
                3 => 'P3. Los tres tipos de instrucciones introducidas en el vídeo, representadas con las tarjetas de color verde, rojo y amarillo, constituyen un conjunto de instrucciones capaces de dirigir a Roby a cualquier punto del tablero. ¿Puedes elaborar un conjunto de menos de tres instrucciones que haga lo mismo?',
            ],
        ],
    ],

    'the-tourist' => [
        'title' => 'El turista',
        'text' => 'Con las tarjetas de CodyRoby, dos equipos se desafían entre sí para encontrar, en el menor tiempo posible, la secuencia de instrucciones que guiará al turista a los monumentos que desee visitar sobre el tablero',
        'material' => 'Tarjetas más grandes pueden ser útiles para jugar en el suelo',
        'questions' => [
            'content' => [
                1 => 'P1. ¿Qué secuencia de instrucciones guiaría al turista a la estatua de Rafael en el primer ejemplo mostrado en el vídeo?',
                2 => 'P2. ¿Qué secuencia de instrucciones guiaría al turista a los Torricini del Palacio Ducal en el segundo ejemplo mostrado en el vídeo?',
                3 => 'P3. ¿Se te ocurre alguna manera divertida de hacer un ejercicio cada vez que uno de los dos equipos elija una tarjeta para añadir al programa? Inventa una manera replanteando la carrera de relevos mostrada en el vídeo',
            ],
        ],
    ],

    'two-snakes' => [
        'title' => 'Las dos serpientes',
        'text' => ' Con las cartas CodyRoby, dos serpientes se desplazan por el tablero y tratan de obstaculizar los respectivos movimientos. La regla básica es muy sencilla: no se puede volver a una casilla por donde ya haya pasado una serpiente. Gana la serpiente que pueda moverse libremente más tiempo.',
        'material' => 'Cartas CodyRoby, un tablero de 5 × 5 casillas, dos piezas y fichas de papel para marcar las casillas ya visitadas.',
        'questions' => [
            'content' => [
                1 => 'P1. En la configuración inicial que aparece en el vídeo, si los dos jugadores no roban cartas amarillas para girar a la izquierda,¿qué cartas cabe esperar que les salgan?',
            ],
        ],
    ],

    'round-trip' => [
        'title' => ' Ida y vuelta',
        'text' => 'Se turnan los equipos. El primero planea el viaje de ida, y el segundo debe llevar a Roby de vuelta al punto de partida. Parece fácil, pero no lo es, sobre todo si planeas las jugadas mentalmente, sin mover a Roby',
        'material' => 'Cartas CodyRoby, un tablero de 5 × 5 casillas, dos piezas y fichas de papel para marcar las casillas ya visitadas.',
        'questions' => [
            'content' => [
                1 => 'P1. ¿Es posible que el programa que lleva a Roby de vuelta al punto de partida sea más corto (tenga menos instrucciones) que el del viaje de ida?',
            ],
        ],
    ],

    'meeting-point' => [
        'title' => 'Punto de encuentro',
        'text' => 'Esta vez, programamos las jugadas antes de empezar. Los dos equipos ponen las cartas sobre la mesa para crear la secuencia de instrucciones que moverán a sus respectivos robots, pero nadie se mueve hasta que uno de los jugadores dice “¡Empezar!” En ese momento, termina la programación y empieza la acción. Gana el jugador que dijo "¡Empezar!" si los dos robots acaban en la misma casilla ejecutando cada uno las instrucciones de su equipo.',
        'material' => 'Cartas CodyRoby, tablero de 5 × 5 casillas, dos piezas.',
        'questions' => [
            'content' => [
                1 => 'P1. Si crees posible que los dos robots no se encuentren nunca, inventa reglas para todas las situaciones posibles.',
            ],
        ],
    ],

    'follow-the-music' => [
        'title' => 'Sigue la música',
        'text' => ' Cuando se repiten periódicamente secuencias de instrucciones de programación, es como si tuvieran ritmo. Si asociamos un sonido a cada instrucción, podemos guiar a Roby con música. Es justo lo que haremos esta vez. Voy a crear un programa para que sigáis distintos sonidos (que representan distintas instrucciones sónicas), para mover a Roby por el tablero.',
        'material' => 'Además de las cartas CodyRoby, el tablero y las piezas, hay que hacer tres sonidos diferentes. Yo he utilizado tres vasos con distintas cantidades de agua. ¿Qué utilizaréis vosotros?',
        'questions' => [
            'content' => [
                1 => 'P1. Tratad de seguir el vídeo y guiaros por los sonidos que generan los vasos sin mirar las cartas. ¿Podéis reconocer y ejecutar las instrucciones transmitidas mediante los sonidos?',
                2 => 'P2. Elegid los tres sonidos asociados a las tres instrucciones básicas. Inventad una secuencia de sonidos que podáis repetir indefinidamente sin que en ningún momento Roby se salga del tablero...',
            ],
        ],
    ],

    'material2' => [
        'chequered-with-labels' => 'tablero cuadriculado con marcas',
        'cards' => 'veinticuatro tarjetas de «avanzar», ocho de «girar a la izquierda» y ocho de «girar a la derecha»',
        'larger-cards' => 'Para la versión en el suelo se recomienda utilizar tarjetas más grandes',
        'video' => 'El vídeo también explica cómo jugar sin el mazo de cartas',
        'pieces-of-paper' => 'Asimismo, se requieren veinticuatro pedazos de papel para colocarlos en las casillas ya visitadas',
        'card-alternative' => 'Como alternativa al mazo de tarjetas de CodyRoby, se pueden utilizar los iconos disponibles aquí',
        'small-drawings' => 'Un suplemento pueden ser pequeños dibujos para ayudar a contar la historia. Los utilizados en el vídeo pueden encontrarse aquí',
        'rest-of-cards' => 'Para el resto utilizamos las tarjetas de CodyRoby, CodyFeet o CodyColour.',
    ],

    'catch-the-robot' => [
        'title' => 'Captura al robot',
        'text' => 'Captura al robot es un juego competitivo al que se puede jugar sobre la mesa o en el suelo. El jugador que capture al robot del equipo contrario llegando a su casilla en el tablero gana. La aleatoriedad de las tarjetas requiere que ambos equipos adapten continuamente sus estrategias.',
        'questions' => [
            'content' => [
                1 => 'P1. Si el peón rosa (Roby) se encuentra en la casilla central C3 orientado hacia el norte, y el equipo rosa tiene dos tarjetas de «avanzar», dos de «girar a la izquierda» y una de «girar a la derecha», ¿a qué casillas puede ir?',
            ],
        ],
    ],

    'the-snake' => [
        'title' => 'La serpiente',
        'text' => 'La serpiente es un tipo de solitario que se juega con las tarjetas de CodyRoby. El objetivo del juego es guiar a la serpiente por todas las casillas del tablero sin que se muerda la cola.',
        'questions' => [
            'content' => [
                1 => 'P1. ¿Hay algún punto de partida que haga imposible visitar todas las casillas sin que la serpiente se muerda la cola?',
            ],
        ],
    ],

    'storytelling' => [
        'title' => 'Narración de historias',
        'text' => '¡El tema de hoy es la narración! Utiliza las instrucciones de CodyRoby, las huellas de CodyFeet o los colores de CodyColour para guiar a los peones alrededor del tablero para contar una historia. Dispersa diferentes partes de la historia alrededor del tablero.',
        'questions' => [
            'content' => [
                1 => 'P1. ¿Cuál es la herramienta más versátil para guiar a Roby y contar una historia?',
                2 => 'P2. ¿Puedes colocar en el tablero las partes de la historia que deseas contar en posiciones que hagan imposible recuperar todas con CodyFeet?',
            ],
        ],
    ],

    'colour-everything' => [
        'title' => 'Coloréalo todo',
        'text' => '¿Podemos guiar a los robots por el tablero de manera que hagan un dibujo con su rastro? En esta actividad, jugamos con la programación y el arte del píxel para crear imágenes coloreando las casillas de un tablero como si fueran píxeles en una pantalla.',
        'material' => 'Tarjetas CodyRoby, tablero y peón. Para colorear las casillas, colócales trozos de papel encima o márcalas con rotulador.',
        'questions' => [
            'content' => [
                1 => '¿Se pueden dibujar los dos corazones, como al final del vídeo, guiando al robot por todas las casillas necesarias sin pasar dos veces por la misma?',
            ],
        ],
    ],

    'codyplotter-and-codyprinter' => [
        'title' => 'Trazador Cody e Impresora Cody',
        'text' => '¿Cuál es la diferencia entre trazador e impresora? Para saberlo, prueba esta actividad de programación «unplugged».',
        'material' => 'Además del kit CodyRoby, utilicé un rotulador verde y un nuevo robot de plastilina, pero esto es facultativo.',
        'questions' => [
            'content' => [
                1 => '¿Puedes explicar la diferencia entre trazador e impresora?',
                2 => '¿Qué dibujo haría RobyPrinter (el robot impresora) moviéndose por las líneas del tablero si ejecutara la serie de comandos que se dictan al final del vídeo?',
            ],
        ],
    ],

    'boring-pixels' => [
        'title' => '¡Píxels aburridos!/Utilizando números',
        'text' => 'Si a Roby le damos instrucciones para que haga un dibujo casilla a casilla, píxel a píxel, veremos que, cuando muchas casillas seguidas tienen el mismo color, podemos utilizar números para que sea más interesante. Es lo que hacen los ordenadores...',
        'material' => 'cuaderno de cuadrícula o tablero de 5 × 5 en papel, rotulador. Para representar el código del dibujo, puedes utilizar papel y bolígrafo.',
        'questions' => [
            'content' => [
                1 => 'Intenta hacer un dibujo cuadriculado y representarlo con codificación RLE. El tamaño del dibujo es igual al número de casillas, pero ¿qué tamaño tiene su representación RLE?',
            ],
        ],
    ],

    'turning-code-into-pictures' => [
        'title' => 'Convertir código en imágenes',
        'text' => [
            1 => 'Acabamos de ver que es posible crear un código que nos permita hacer un dibujo. Me he inventado un dibujo y he utilizado un código para convertirlo en las letras y números que os he dado. Apunta las letras y números y utiliza el código para reconstruir el dibujo.',
            2 => 'Esta es la imagen que se me había ocurrido. ¡Presentadla en vuestro cuaderno, en los cuadernos de todos los que conocen el código!',
        ],
        'material' => 'papel (mejor de cuadrícula) y bolígrafo.',
        'questions' => [
            'content' => [
                1 => 'Intenta descodificar y dibujar las imágenes que digo al final del vídeo.',
            ],
        ],
    ],

    'texts' => [
        1 => 'Coding@Home es una colección de vídeos cortos, material DIY (hazlo tú mismo), rompecabezas, juegos y desafíos de programación para el uso cotidiano tanto en la familia como en la escuela. No se requieren conocimientos previos ni dispositivos electrónicos para realizar las actividades. Estas actividades están ideadas para estimular el pensamiento computacional y cultivar las competencias de alumnos, padres y maestros en el hogar o en la escuela.',
        2 => 'La serie Coding@Home de la Semana de la Programación de la UE se basa en la iniciativa <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">"Programación en familia"</a> puesta en marcha por la Universidad de Urbino y la Asociación CodeMOOCnet en colaboración con Rai Cultura. Alessandro Bogliolo es profesor de sistemas de tratamiento de la información en la Universidad de Urbino,  <a href="/ambassadors?country_iso=IT" target="_blank">embajador italiano de la Semana de la Programación de la UE</a>  y coordinador de todos los embajadores, así como miembro del Consejo de Administración de la Coalición de Competencias y Empleos Digitales. ',
       3 => 'Si estás interesado en más actividades desconectadas, o actividades en diferentes programaciones, como idiomas, robótica, micro:bit, echa un vistazo a los <a href="/training">"Learning Bits" de la Semana de la Programación de la UE</a> con tutoriales en vídeo y planes de lecciones para escuelas primarias, secundarias inferiores y secundarias superiores. Echa un vistazo también a los recursos de Learn&Teach de la Semana de la Programación de la UE  , donde puedes encontrar recursos gratuitos y de alta calidad de todo el mundo para profesores y estudiantes.',
    ],

    'coding-at-home-text' => 'Una colección de videos cortos, materiales de bricolaje, rompecabezas, juegos y desafíos de codificación para el uso diario en la familia y en la escuela.',
    'coding-at-home-sub-text1' => 'La serie de Coding@Home de la Semana de la Programación de la UE se basa en la <a class="text-dark-blue underline" href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank"> iniciativa "Coding in famiglia"</a> de la Universidad de Urbino y la Asociación CodeMOOCnet en cooperación con Rai Cultura. El autor de Coding@Home vídeo es Alessandro Bogliolo, profesor de Sistemas de Procesamiento de la Información en la Universidad de Urbino, embajador italiano de la Semana de la <a class="text-dark-blue underline" href="https://codeweek.eu/ambassadors?country_iso=IT" target="_blank"> Programación</a> de la UE y coordinador de todos los embajadores, así como miembro del Consejo de Administración de la Coalición de Competencias y Empleos Digitales.',
    'coding-at-home-sub-text2' => 'No necesitas ningún conocimiento previo ni dispositivos electrónicos para realizar las actividades. Las actividades estimularán el pensamiento computacional y cultivarán las habilidades de los alumnos, padres y maestros en casa o en la escuela.',
];
