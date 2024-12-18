<?php

return [

    'title' => 'Политика за използване на бисквитки',
    'what' => [
        'title' => 'Какво представляват бисквитките?',
        'text' => '<p>Бисквитката е малък текстов файл, който даден уебсайт съхранява на вашия компютър или мобилно устройство, когато посетите сайта.</p>',
        'first_party' => '<strong>Бисквитки на първа страна</strong> са бисквитки, зададени от уебсайта, който посещавате. Само този уебсайт може да ги прочете. Освен това даден уебсайт би могъл да използва външни услуги, които също задават свои собствени бисквитки, известни като <strong>бисквитки на трети страни</strong>.',
        'persistent_cookies' => 'Постоянните бисквитки са бисквитки, запазени на вашия компютър, които не се изтриват автоматично, когато затворите браузъра си, за разлика от сесийната бисквитка, която се изтрива, когато затворите браузъра си.',
        'items' => '<p>Първият път, когато посетите уебсайта на Седмицата на програмирането, ще бъдете подканени да <strong>приемете или откажете бисквитките</strong>.</p>

            <p>Целта е да се даде възможност на сайта да запомни вашите предпочитания (като потребителско име, език и т.н.) за определен период от време.</p>

            <p>По този начин няма да е необходимо да ги въвеждате отново, когато разглеждате уебсайта по време на същото посещение.</p>

            <p>Бисквитките могат да се използват и за създаване на анонимизирани статистически данни за разглеждането на нашите уебсайтове.</p>
            </p>',
    ],
    'how' => [
        'title' => 'По какъв начин използваме бисквитки?',
        'text1' => '<p>Седмицата на програмирането използва предимно „бисквитки на първа страна“. Това са бисквитки, които са зададени и контролирани от нас, а не от външна организация.</p>',
        'text2' => '<p>За да видите някои от нашите страници обаче, ще трябва да приемете бисквитки от външни организации.</p>',
        '3types' => [
            'title' => 'Трите <strong>вида „бисквитки“ на първа страна,</strong> които използваме, са за:',
            '1' => 'съхраняване предпочитанията на посетителите',
            '2' => 'да бъдат нашите уебсайтове оперативни',
            '3' => 'събиране на аналитични данни (за поведението на потребителя).',
        ],
        'table' => [
            'name' => 'Име',
            'service' => 'Услуга',
            'purpose' => 'Цел',
            'type_duration' => 'Вид на бисквитката и продължителност',
        ],
        'visitor_preferences' => [
            'title' => 'Предпочитания на потребителя',
            'text' => '<p>Те са зададени от нас и само ние можем да ги прочетем. Те запаметяват:</p>',
            'item' => 'дали сте се съгласили (или сте отказали) с политиката за бисквитки на този сайт',
            'table' => [
                '1' => [
                    'service' => 'Инструмент за бисквитки за съгласие',
                    'purpose' => 'Съхранява вашите предпочитания за бисквитки (така че да не бъдете питани отново)',
                    'type_duration' => 'Бисквитка на първа страна, изтрива се, след като затворите браузъра си',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Оперативни бисквитки',
            'text' => '<p>Има някои видове бисквитки, които трябва да включим, за да функционират определени уеб страници. Поради тази причина те не изискват вашето съгласие. По-конкретно:</p>',
            'item' => 'технически бисквитки, изисквани от определени ИТ системи',
        ],
        'technical_cookies' => [
            'title' => 'Технически бисквитки',
            'table' => [
                '1' => [
                    'purpose' => 'Поддържане на сигурна сесия за вас по време на посещението ви.',
                    'type_duration' => 'Бисквитка на първа страна, изтрива се, след като затворите браузъра си',
                ],
                '2' => [
                    'purpose' => 'Поддържане на сигурна сесия за вас по-дълго време, предотвратявайки загубата на сесията при затваряне на браузъра.',
                    'type_duration' => 'Постоянна бисквитка на първа страна, 60 месеца',
                ],
                '3' => [
                    'purpose' => 'Съхранява предпочитания език на потребителя',
                    'type_duration' => 'Бисквитка на първа страна, изтрива се, след като затворите браузъра си',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Бисквитки за анализ',
            'items' => '<p>Използваме тези бисквитки само за вътрешно проучване с цел подобряване на услугата, която предоставяме за всички наши потребители.</p>

            <p>Бисквитките просто оценяват как си взаимодействате с нашия уебсайт – като анонимен потребител (събраните данни не ви идентифицират лично).</p>

            <p>Също така тези данни не се споделят с трети страни и не се използват за други цели. Анонимизираните статистически данни могат да бъдат споделени с изпълнители, работещи по комуникационни проекти съгласно договорно споразумение с Комисията.</p>

            <p>Можете обаче да откажете тези видове бисквитки – или чрез банера на бисквитките, който ще видите на първата посетена от вас страница, или като посетите тази <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">специална страница.</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Услуга за уеб анализ, базирана на софтуера с отворен код Matomo',
                    'purpose' => 'Разпознава посетителите на уебсайтове (анонимно – не се събира лична информация за потребителя).',
                    'type_duration' => 'Постоянна бисквитка на първа страна, 20 дни',
                ],
                '2' => [
                    'service' => 'Услуга за уеб анализ, базирана на софтуера с отворен код Matomo',
                    'purpose' => 'Идентифицира страниците, разгледани от същия потребител по време на едно и също посещение. (анонимно – не се събира лична информация за потребителя).',
                    'type_duration' => 'Постоянна бисквитка на първа страна, 30 минути',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Бисквитки на трета страна',
        'items' => [
            '1' => '<p>Някои от нашите страници показват съдържание от външни доставчици, напр. YouTube, Facebook и Twitter.</p>

                <p>За да видите това съдържание на трети страни, първо трябва да приемете техните конкретни условия. Това включва техните политики за използване на бисквитки, над които нямаме контрол.</p>

                <p>Но ако не разглеждате това съдържание, на вашето устройство няма да се инсталират бисквитки на трети страни.</p>Доставчици – трети страни на Седмицата на програмирането',
            '2' => 'Тези услуги на трети страни са извън контрола на уебсайта на Седмицата на програмирането. Доставчиците могат по всяко време да променят условията си на ползване, целта и употребата на бисквитки и т.н.',
        ],
    ],
    'how-manage' => [
        'title' => 'Как можете да управлявате бисквитките?',
        'items' => '<p>Можете да <strong>управлявате/изтривате</strong> бисквитки по ваше желание – за подробности, разгледайте <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Премахване на бисквитки от вашето устройство</strong></p>

            <p>Можете да изтриете всички бисквитки, които вече се намират на вашето устройство, като изчистите историята на сърфиране на вашия браузър. Това ще премахне всички бисквитки от всички посетени от вас уебсайтове.</p>

            <p>Имайте предвид обаче, че може да загубите и запазена информация (напр. запазени данни за вход, предпочитания за уебсайт).</p><strong>Управление на специфични за уебсайта бисквитки</strong><p>За по-обстоен контрол върху специфичните за уебсайта бисквитки, проверете настройките за поверителност и за бисквитки в предпочитания от вас браузър</p><strong>Блокиране на бисквитки</strong><p>Можете да настроите повечето съвременни браузъри по начин, който предотвратява поставянето на бисквитки на вашето устройство, но след това може да се наложи ръчно да променяте някои предпочитания всеки път, когато посещавате даден уебсайт/страница. Възможно е също така някои услуги и функционалности да не работят правилно (напр. влизане в профил).</p><strong>Управление на нашите бисквитки за анализи</strong><p>Можете да управлявате вашите предпочитания относно бисквитките от нашия анализ в <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">специалната страница.</a></p>',
    ],
];
