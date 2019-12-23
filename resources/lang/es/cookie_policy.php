<?php

return [

    'title' => 'Política de <i>cookies</i>',
    'what' => [
        'title' => '¿Qué son las <i>cookies</i>?</strong>',
        'text' => '<p>Una <i>cookie</i> es un archivo de texto pequeño que un sitio web almacena en su ordenador o dispositivo móvil cuando lo visita.</p>',
        'first_party' => 'Las <strong><i>cookies</i> propias</strong> son las <i>cookies</i> creadas por el sitio web que visita. Solo ese sitio web puede leerlas. Además, un sitio web podría utilizar servicios externos, que también crean sus propias <i>cookies</i>, llamadas <strong><i>cookies</i> de terceros</strong>.',
        'persistent_cookies' => 'Las <i>cookies</i> persistentes son las que se guardan en su ordenador y no se eliminan automáticamente al cerrar el navegador, a diferencia de una <i>cookie</i> de sesión, que se elimina al cerrar el navegador.',
        'items' => '<p>La primera vez que visite el sitio web de codeweek.eu, verá un mensaje en que se le solicitará que <strong>acepte o rechace las <i>cookies</i></strong>.</p>

            <p>Su objetivo es permitir que el sitio recuerde sus preferencias (como su nombre de usuario, su idioma, etc.) durante un período determinado.</p>

            <p>De esta forma, no tendrá que volver a introducir esta información cuando navegue por el sitio durante la misma visita.</p>

            <p>Asimismo, las <i>cookies</i> se pueden utilizar para establecer estadísticas anonimizadas relativas a la experiencia de navegación en nuestros sitios.</p>
            </p>'
    ],
    'how' => [
        'title' => '¿Cómo se utilizan las <i>cookies</i>?',
        'text1' => '<p>Codeweek.eu utiliza principalmente «<i>cookies</i> propias». Nosotros creamos y controlamos estas <i>cookies</i>, no una organización externa.</p>',
        'text2' => '<p>No obstante, para ver algunas de nuestras páginas, tendrá que aceptar <i>cookies</i> de organizaciones externas.</p>',
        '3types' => [
            'title' => 'Utilizamos <strong>tres tipos de <i>cookies</i> propias</strong> para:',
            '1' => 'almacenar las preferencias del visitante,',
            '2' => 'hacer que funcionen los sitios web,',
            '3' => 'recopilar datos analíticos (sobre el comportamiento del usuario).'
        ],
        'table' => [
            'name'=>'Nombre',
            'service'=>'Servicio',
            'purpose'=>'Fin',
            'type_duration'=>'Tipo de <i>cookie</i> y duración',
        ],
        'visitor_preferences' => [
            'title'=> 'Preferencias del visitante',
            'text'=> '<p>Nosotros las definimos y solo nosotros podemos leerlas. Recuerdan:</p>',
            'item'=> 'si ha aceptado (o rechazado) la política de <i>cookies</i> de este sitio.',
            'table' => [
                '1' => [
                    'service' => 'Kit de consentimiento de <i>cookies</i>',
                    'purpose' => 'Almacenar sus preferencias de <i>cookies</i> (para que el sitio web no se lo vuelva a preguntar)',
                    'type_duration' => '<i>Cookie</i> de sesión propia eliminada al cerrar el navegador',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => '<i>Cookies</i> operativas',
            'text' => '<div>Para que determinadas páginas web funcionen, tenemos que incluir algunas <i>cookies</i>. Por esta razón, no es necesario que dé su consentimiento. En concreto:</div>',
            'item' => '<i>cookies</i> técnicas requeridas por determinados sistemas informáticos.'
        ],
        'technical_cookies' => [
            'title' => '<i>Cookies</i> técnicas',
            'table' => [
                '1' => [
                    'purpose' => 'Mantener una sesión segura durante su visita',
                    'type_duration' => '<i>Cookie</i> de sesión propia eliminada al cerrar el navegador',
                ],
                '2' => [
                    'purpose' => 'Mantener una sesión segura durante más tiempo para evitar perder la sesión al cerrar el navegador',
                    'type_duration' => '<i>Cookie</i> persistente propia, sesenta meses',
                ],
                '3' => [
                    'purpose' => 'Almacenar el idioma preferido del usuario',
                    'type_duration' => '<i>Cookie</i> de sesión propia eliminada al cerrar el navegador',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => '<i>Cookies</i> analíticas',
            'items' => '<p>Estas <i>cookies</i> solo se utilizan para realizar investigaciones internas relativas a la mejora del servicio que prestamos a todos los usuarios.</p>

            <p>Simplemente evalúan la forma en que interactúa con nuestro sitio web como usuario anónimo (los datos recopilados no le identifican personalmente).</p>

            <p>Además, estos datos no se comparten con terceros ni se utilizan con ningún otro fin. Las estadísticas anonimizadas podrían compartirse con contratistas que trabajen en proyectos de comunicación en virtud del acuerdo contractual con la Comisión.</p>

            <p>No obstante, usted es libre de rechazar este tipo de <i>cookies</i>, ya sea a través del <i>banner</i> que verá en la primera página que viste o en esta <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">página dedicada</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Servicio de análisis web, basado en el <i>software</i> de código abierto Matomo',
                    'purpose' => 'Reconocer a los visitantes del sitio web (de forma anónima, no se recopilan datos personales sobre el usuario)',
                    'type_duration' => '<i>Cookie</i> persistente propia, veinte días',
                ],
                '2' => [
                    'service' => 'Servicio de análisis web, basado en el <i>software</i> de código abierto Matomo',
                    'purpose' => 'Identificar las páginas vistas por el mismo usuario durante la misma visita (de forma anónima, no se recopilan datos personales sobre el usuario)',
                    'type_duration' => '<i>Cookie</i> persistente propia, treinta minutos',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => '<i>Cookies</i> de terceros',
        'items' => [
            '1' => '<p>En algunas de nuestras páginas se muestra contenido de proveedores externos, como YouTube, Facebook y Twitter.</p>

                <p>Para ver el contenido de terceros, antes debe aceptar sus términos y condiciones. Esto incluye sus políticas de <i>cookies</i>, sobre las que no tenemos control.</p>

                <p>Si no ve este contenido, no se almacena ninguna <i>cookie</i> de terceros en su dispositivo.</p>Proveedores externos en codeweek.eu',
            '2' => 'Estos servicios externos están fuera del control del sitio web codeweek.eu. Los proveedores pueden cambiar sus condiciones de servicio, su finalidad y su uso de <i>cookies</i>, entre otros, en cualquier momento.'
        ]
    ],
    'how-manage' => [
        'title' => '¿Cómo puede gestionar las <i>cookies</i>?',
        'items' => '<p>Puede <strong>gestionar/eliminar</strong> <i>cookies</i> como desee. Para obtener información detallada, consulte <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Eliminar <i>cookies</i> del dispositivo</strong></p>

            <p>Puede eliminar todas las <i>cookies</i> que ya estén almacenadas en su dispositivo borrando el historial de navegación del navegador. De esta forma, se suprimirán todas las <i>cookies</i> de los sitios web que haya visitado.</p>

            <p>Tenga en cuenta que, al hacerlo, puede perder alguna información guardada (como detalles de inicios de sesión guardados o preferencias del sitio).</p><strong>Gestionar <i>cookies</i> específicas del sitio</strong><p>Para tener un mayor control de las <i>cookies</i> específicas del sitio, compruebe la configuración de confidencialidad y de <i>cookies</i> en su navegador preferido.</p><strong>Bloquear <i>cookies</i></strong><p>Los navegadores más modernos se pueden configurar para evitar que se almacenen <i>cookies</i> en el dispositivo, pero entonces puede que tenga que ajustar algunas preferencias manualmente cada vez que visite un sitio o una página. Además, puede que algunos servicios y funcionalidades no funcionen como deberían (por ejemplo, el inicio de sesión en el perfil).</p><strong>Gestionar nuestras <i>cookies</i> analíticas</strong><p>Puede gestionar sus preferencias relativas a las <i>cookies</i> de nuestros análisis en la <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">página dedicada</a>.</p>'
    ]
];
