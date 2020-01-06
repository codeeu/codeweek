<?php

return [

    'title' => 'Política de <i>cookies</i>',
    'what' => [
        'title' => 'O que são <i>cookies</i>?',
        'text' => '<p>Um <i>cookie</i> é um pequeno ficheiro de texto que um sítio Web instala no seu computador ou dispositivo móvel quando o visita.</p>',
        'first_party' => 'Os <strong><i>cookies</i> de origem</strong> são <i>cookies</i> instalados pelo sítio que está a visitar. Só esse sítio os pode ler. Além disso, os sítios Web podem usar serviços externos que também definem os seus próprios <i>cookies</i>: são os chamados <strong><i>cookies</i> de terceiros</strong>.',
        'persistent_cookies' => 'Ao contrário dos <i>cookies</i> de sessão, que são apagados quando fecha o seu navegador, os <i>cookies</i> persistentes são guardados no seu computador e não são automaticamente apagados quando fecha o navegador.',
        'items' => '<p>Na primeira vez que visita o sítio Web da Semana Europeia da Programação, é-lhe pedido que <strong>aceite ou recuse os <i>cookies</i></strong>.</p>

            <p>O objetivo é permitir que o sítio se lembre das suas preferências (nome de utilizador, língua, etc.) durante um determinado período de tempo.</p>

            <p>Desta forma, não tem de as voltar a indicar enquanto percorre o sítio durante a mesma visita.</p>

            <p>Os <i>cookies</i> também podem ser usados para recolher dados estatísticos anónimos sobre a experiência de navegação nos nossos sítios.</p>
            </p>'
    ],
    'how' => [
        'title' => 'Como usamos os <i>cookies</i>?',
        'text1' => '<p>O sítio Web da Semana Europeia da Programação usa sobretudo «<i>cookies</i> de origem». Estes <i>cookies</i> são exclusivamente instalados e controlados por nós, sem a interferência de organizações externas.</p>',
        'text2' => '<p>No entanto, para ver algumas das nossas páginas, tem de aceitar <i>cookies</i> de organizações externas.</p>',
        '3types' => [
            'title' => 'Os <strong>três tipos de <i>cookies</i> de origem</strong> que usamos servem para:',
            '1' => 'guardar as preferências dos visitantes',
            '2' => 'garantir o bom funcionamento dos nossos sítios Web',
            '3' => 'recolher dados analíticos (acerca do comportamento do utilizador)'
        ],
        'table' => [
            'name'=>'Nome',
            'service'=>'Serviço',
            'purpose'=>'Finalidade',
            'type_duration'=>'Tipo e duração do <i>cookie</i><',
        ],
        'visitor_preferences' => [
            'title'=> 'Preferências dos visitantes',
            'text'=> '<p>Estes <i>cookies</i> são instalados por nós e só nós os podemos ler. Estes <i>cookies</i> registam:</p>',
            'item'=> 'se aceitou (ou recusou) a política de <i>cookies</i> do sítio',
            'table' => [
                '1' => [
                    'service' => '<i>Kit</i> de autorização de <i>cookies</i>',
                    'purpose' => 'Guardar as suas preferências em matéria de <i>cookies</i> (para não voltarmos a fazer a mesma pergunta)',
                    'type_duration' => '<i>Cookie</i> de sessão de origem que é apagado quando fecha o navegador',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => '<i>Cookies</i> funcionais',
            'text' => '<p>Há <i>cookies</i> sem os quais determinadas páginas não funcionam, pelo que a sua instalação não está dependente do seu consentimento. Trata-se, nomeadamente, de:</p>',
            'item' => '<i>cookies</i> técnicos obrigatórios para determinados sistemas informáticos'
        ],
        'technical_cookies' => [
            'title' => '<i>Cookies </i>técnicos',
            'table' => [
                '1' => [
                    'purpose' => 'Garantir a segurança da sessão durante a sua visita.',
                    'type_duration' => '<i>Cookie</i> de sessão de origem que é apagado quando fecha o navegador',
                ],
                '2' => [
                    'purpose' => 'Manter uma sessão segura para si, por um período de tempo maior, evitando a perda da sessão ao fechar o navegador.',
                    'type_duration' => '<i>Cookie</i> persistente de origem, 60 meses',
                ],
                '3' => [
                    'purpose' => 'Guardar a preferência de língua do utilizador',
                    'type_duration' => '<i>Cookie</i> de sessão de origem que é apagado quando fecha o navegador',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => '<i>Cookies</i> analíticos',
            'items' => '<p>Estes <i>cookies</i> são usados exclusivamente a nível interno para nos ajudar a perceber como podemos melhorar os serviços que prestamos aos nossos utilizadores.</p>

            <p>Estes <i>cookies</i> limitam-se a avaliar a forma como interage com o nosso sítio Web enquanto utilizador anónimo (os dados recolhidos não identificam os utilizadores).</p>

            <p>Além disso, estes dados não são partilhados com terceiros nem utilizados para outros fins. As estatísticas anonimizadas podem ser partilhadas com as pessoas ou empresas contratadas pela Comissão para trabalhar em projetos de comunicação.</p>

            <p>No entanto, pode recusar este tipo de <i>cookies</i>, quer na faixa dos <i>cookies</i> que aparece na primeira página que visita, quer através desta <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">página dedicada</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Serviço de análise da Web, com base no <i>software</i> de fonte aberta Matomo',
                    'purpose' => 'Reconhecer os visitantes do sítio (de forma anónima, uma vez que não são recolhidas informações pessoais sobre o utilizador).',
                    'type_duration' => '<i>Cookie</i> persistente de origem, 20 dias',
                ],
                '2' => [
                    'service' => 'Serviço de análise da Web, com base no <i>software</i> de fonte aberta Matomo',
                    'purpose' => 'Identificar as páginas vistas pelo mesmo utilizador durante a mesma visita (de forma anónima, uma vez que não são recolhidas informações pessoais sobre o utilizador).',
                    'type_duration' => '<i>Cookie</i> persistente de origem, 30 minutos',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => '<i>Cookies</i> de terceiros',
        'items' => [
            '1' => '<p>Algumas das nossas páginas incluem conteúdos de sítios externos como o YouTube, o Facebook ou o Twitter.</p>

                <p>Para aceder a estes conteúdos de terceiros, deve começar por aceitar as suas condições específicas, nomeadamente as políticas em matéria de <i>cookies</i>, em relação às quais não temos qualquer controlo.</p>

                <p>Contudo, caso não visualize este tipo de conteúdos, não serão instalados nenhuns <i>cookies</i> de terceiros no seu dispositivo.</p>Prestadores de serviços no sítio Web da Semana Europeia da Programação',
            '2' => 'Os serviços prestados por terceiros escapam ao controlo do sítio Web da Semana Europeia da Programação. Os prestadores podem, em qualquer momento, alterar as condições do serviço, a utilização e a finalidade dos <i>cookies</i>, etc.'
        ]
    ],
    'how-manage' => [
        'title' => 'Como gerir os <i>cookies</i>?',
        'items' => '<p>Pode <strong>gerir e/ou apagar</strong> os <i>cookies</i> que quiser. Para mais informações, consulte <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Apagar <i>cookies</i> do seu dispositivo</strong></p>

            <p>Para apagar todos os <i>cookies</i> já instalados no seu dispositivo, limpe o histórico de navegação do seu navegador. Esta ação apaga todos os <i>cookies</i> de todos os sítios Web que visitou.</p>

            <p>Tenha em conta que também pode perder algumas informações guardadas (dados de início de sessão, preferências, etc.).</p><strong>Gerir <i>cookies</i> específicos do sítio</strong><p>Para informações mais pormenorizadas sobre como controlar os <i>cookies</i> específicos de um determinado sítio, consulte os parâmetros em matéria de privacidade e de <i>cookies</i> do seu navegador.</p><strong>Bloquear <i>cookies</i></strong><p>A maioria dos navegadores modernos permite-lhe impedir a instalação de <i>cookies</i> no seu dispositivo. Se optar por o fazer, poderá ter de ajustar manualmente algumas preferências sempre que visitar um sítio ou página e alguns serviços e funcionalidades poderão não funcionar corretamente (por exemplo, início de sessão com o seu perfil).</p><strong>Gerir <i>cookies </i>analíticos</strong><p>Para gerir as suas preferências em matéria de <i>cookies</i> analíticos, consulte a <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">página dedicada</a>.</p>'
    ]
];
