<?php

return [

    'title' => 'Politique en matière de cookies',
    'what' => [
        'title' => 'Les cookies, qu’est-ce que c’est?',
        'text' => '<p>Un cookie est un petit fichier texte qu’un site web stocke sur votre ordinateur ou appareil mobile lorsque vous visitez le site.</p>',
        'first_party' => '<strong>Les cookies de premier niveau</strong> sont des cookies définis par le site web que vous visitez. Seul ce site web peut les lire. En outre, un site web peut potentiellement utiliser des services externes, qui mettent également en place leurs propres cookies, connus sous le nom de <strong>cookies tiers</strong>.',
        'persistent_cookies' => 'Les cookies persistants sont des cookies enregistrés sur votre ordinateur et qui ne sont pas supprimés automatiquement lorsque vous quittez votre navigateur, contrairement aux cookies de session, qui sont supprimés lorsque vous quittez votre navigateur.',
        'items' => '<p>Lors de votre première visite sur le site web de Codeweek, vous serez invité(e) à <strong>accepter ou à refuser les cookies</strong>.</p>

            <p>Leur intérêt consiste à permettre au site de mémoriser vos préférences (nom d’utilisateur, langue, etc.) pendant un certain temps.</p>

            <p>De cette façon, vous n’avez pas besoin de les saisir à nouveau lorsque vous naviguez sur le site au cours de la même visite.</p>

            <p>Les cookies peuvent également être utilisés pour établir des statistiques anonymes sur l’expérience de navigation sur nos sites.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Comment utilisons-nous les cookies?',
        'text1' => '<p>Codeweek utilise principalement des «cookies de premier niveau». Il s’agit de cookies mis en place et contrôlés par nous-mêmes, et non par une organisation externe.</p>',
        'text2' => '<p>Toutefois, pour consulter certaines de nos pages, vous devrez accepter les cookies provenant d’organisations externes.</p>',
        '3types' => [
            'title' => 'Les <strong>trois types de cookies de premier niveau</strong> que nous utilisons servent à:',
            '1' => 'stocker les préférences des visiteurs;',
            '2' => 'rendre nos sites web opérationnels;',
            '3' => 'recueillir des données analytiques (sur le comportement des utilisateurs).',
        ],
        'table' => [
            'name' => 'Nom',
            'service' => 'Service',
            'purpose' => 'But',
            'type_duration' => 'Type de cookie et durée',
        ],
        'visitor_preferences' => [
            'title' => 'Préférences des visiteurs',
            'text' => '<p>Celles-ci sont établies par nous et nous seuls pouvons les lire. Ils se souviennent des éléments suivants:</p>',
            'item' => 'si vous avez accepté (ou refusé) la politique de cookies de ce site',
            'table' => [
                '1' => [
                    'service' => 'Kit d’autorisation des cookies',
                    'purpose' => 'Enregistre vos préférences en matière de cookies (afin que vous ne soyez plus invité(e) à le faire)',
                    'type_duration' => 'Cookie de premier niveau supprimé après que vous ayez quitté votre navigateur',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Cookies opérationnels',
            'text' => '<p>Nous devons inclure certains cookies pour que certaines pages web fonctionnent. Pour cette raison, ils ne nécessitent pas votre autorisation. En particulier:</p>',
            'item' => 'les cookies techniques requis par certains systèmes informatiques',
        ],
        'technical_cookies' => [
            'title' => 'Cookies techniques',
            'table' => [
                '1' => [
                    'purpose' => 'Maintient une session sécurisée pour vous, pendant votre visite.',
                    'type_duration' => 'Cookie de premier niveau supprimé après que vous ayez quitté votre navigateur',
                ],
                '2' => [
                    'purpose' => 'Maintient une session sécurisée pour vous pendant une plus longue période afin d’éviter de perdre la session à la fermeture du navigateur.',
                    'type_duration' => 'Cookie persistant de premier niveau, 60 mois',
                ],
                '3' => [
                    'purpose' => 'Enregistre la langue préférée de l’utilisateur',
                    'type_duration' => 'Cookie de premier niveau supprimé après que vous ayez quitté votre navigateur',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Cookies d’analyse',
            'items' => '<p>Nous les utilisons uniquement à des fins de recherche interne concernant la façon dont nous pouvons améliorer le service que nous fournissons à tous nos utilisateurs.</p>

            <p>Les cookies évaluent simplement la façon dont vous interagissez avec notre site web, en tant qu’utilisateur anonyme (les données recueillies ne permettent pas de vous identifier personnellement).</p>

            <p>De plus, ces données ne sont pas partagées avec des tiers ni utilisées à d’autres fins. Les statistiques rendues anonymes pourraient être partagées avec les contractants travaillant sur des projets de communication dans le cadre d’un accord contractuel avec la Commission.</p>

            <p>Cependant, vous êtes libre de refuser ces types de cookies, soit via la bannière de cookies que vous verrez sur la première page que vous visitez, soit en visitant cette <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">page dédiée</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Service d’analyse web, basé sur le logiciel open source Matomo',
                    'purpose' => 'Reconnaît les visiteurs du site web (de manière anonyme, aucune information personnelle n’est collectée sur l’utilisateur).',
                    'type_duration' => 'Cookie persistant de premier niveau, 20 jours',
                ],
                '2' => [
                    'service' => 'Service d’analyse web, basé sur le logiciel open source Matomo',
                    'purpose' => 'Identifie les pages vues par le même utilisateur au cours de la même visite (de manière anonyme, aucune information personnelle n’est collectée sur l’utilisateur).',
                    'type_duration' => 'Cookie persistant de premier niveau, 30 minutes',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Cookies tiers',
        'items' => [
            '1' => '<p>Certaines de nos pages affichent du contenu provenant de fournisseurs externes, par exemple YouTube, Facebook et Twitter.</p>

                <p>Pour consulter le contenu de ces sites tiers, vous devez d’abord accepter leurs conditions d’utilisation spécifiques. Ceci inclut leurs politiques en matière de cookies, sur lesquelles nous n’avons aucun contrôle.</p>

                <p>Mais si vous ne consultez pas ce contenu, aucun cookie tiers n’est installé sur votre appareil.</p>Fournisseurs tiers sur Codeweek',
            '2' => 'Ces services de tiers sont hors du contrôle du site web de Codeweek. Les fournisseurs peuvent, à tout moment, modifier leurs conditions de service, le but et l’utilisation des cookies, etc.',
        ],
    ],
    'how-manage' => [
        'title' => 'Comment gérer les cookies?',
        'items' => '<p>Vous pouvez <strong>gérer/supprimer</strong> les cookies comme vous le souhaitez. Pour en savoir plus, rendez-vous sur <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Supprimer les cookies de votre appareil</strong></p>

            <p>Vous pouvez supprimer tous les cookies qui se trouvent déjà sur votre appareil en effaçant l’historique de navigation de votre navigateur. Ceci supprimera tous les cookies de tous les sites web que vous avez visités.</p>

            <p>Sachez toutefois que vous pouvez également perdre certaines informations enregistrées (par exemple, les informations de connexion enregistrées, les préférences du site).</p><strong>Gestion des cookies spécifiques au site</strong><p>Pour un contrôle plus détaillé des cookies spécifiques à votre site, vérifiez les paramètres de confidentialité et de cookies dans votre navigateur préféré.</p><strong>Blocage des cookies</strong><p>Vous pouvez configurer la plupart des navigateurs modernes pour empêcher l’installation de cookies sur votre appareil, mais vous devrez peut-être ajuster manuellement certaines préférences à chaque fois que vous visitez un site/une page. Et certains services et fonctionnalités peuvent ne pas fonctionner correctement du tout (par exemple, la connexion au profil).</p><strong>Gérer nos cookies d’analyse</strong><p>Vous pouvez gérer vos préférences concernant les cookies à partir de notre outil d’analyse sur la <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">page dédiée</a>.</p>',
    ],
];
