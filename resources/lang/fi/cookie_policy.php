<?php

return [

    'title' => 'Evästekäytännöt',
    'what' => [
        'title' => 'Mitä evästeet ovat?',
        'text' => '<p>Eväste on pieni tekstitiedosto, jonka verkkosivusto tallentaa tietokoneellesi tai mobiililaitteellesi, kun vierailet sivustolla.</p>',
        'first_party' => '<strong>Ensimmäisen osapuolen evästeet</strong> ovat sen verkkosivuston asettamia evästeitä, jolla vierailet. Vain tämä verkkosivusto voi lukea niitä. Lisäksi verkkosivusto saattaa käyttää ulkoisia palveluja, jotka myös asettavat omia evästeitään. Niitä kutsutaan <strong>kolmansien osapuolten evästeiksi</strong>.',
        'persistent_cookies' => 'Pysyvät evästeet ovat tietokoneellesi tallennettavia evästeitä, joita ei poisteta automaattisesti, kun suljet selaimesi. Istuntokohtaiset evästeet sen sijaan poistetaan, kun suljet selaimesi.',
        'items' => '<p>Kun vierailet koodausviikon verkkosivustolla ensimmäistä kertaa, sinua pyydetään <strong>hyväksymään tai hylkäämään evästeet</strong>.</p>

            <p>Tarkoituksena on, että sivusto muistaa valintasi (kuten käyttäjänimen ja kielen) tietyn ajan.</p>

            <p>Näin sinun ei tarvitse antaa samoja tietoja uudelleen, kun siirryt sivustolla sivulta toiselle saman istunnon aikana.</p>

            <p>Evästeitä voidaan käyttää myös anonymisoitujen tilastojen laatimiseen kävijöiden selaustoiminnasta verkkosivuillamme.</p>
            </p>'
    ],
    'how' => [
        'title' => 'Miten evästeitä käytetään?',
        'text1' => '<p>Koodausviikko käyttää lähinnä ”ensimmäisen osapuolen evästeitä”. Ne ovat komission asettamia ja valvomia evästeitä, joita ei voi käyttää mikään ulkopuolinen organisaatio.</p>',
        'text2' => '<p>Joidenkin koodausviikon sivujen tarkastelu edellyttää kuitenkin ulkopuolisten organisaatioiden evästeiden hyväksymistä.</p>',
        '3types' => [
            'title' => 'Koodausviikko käyttää <strong>kolmentyyppisiä ensimmäisen osapuolen evästeitä</strong>. Niiden tarkoitus on',
            '1' => 'tallentaa kävijän valinnat',
            '2' => 'mahdollistaa verkkosivustojen toiminta',
            '3' => 'kerätä analytiikkadataa (käyttäjien toimintamalleista).'
        ],
        'table' => [
            'name'=>'Nimi',
            'service'=>'Käyttö',
            'purpose'=>'Tarkoitus',
            'type_duration'=>'Evästeen tyyppi ja säilytysaika',
        ],
        'visitor_preferences' => [
            'title'=> 'Kävijän valinnat',
            'text'=> '<p>Nämä evästeet asettaa komission palvelin, ja ne ovat ainoastaan sen luettavissa. Evästeisiin tallentuu,</p>',
            'item'=> 'oletko hyväksynyt (vai hylännyt) tämän sivuston evästekäytännöt.',
            'table' => [
                '1' => [
                    'service' => 'Suostumus evästeiden käyttöön',
                    'purpose' => 'Tallentaa evästeasetuksesi (jotta asiasta ei kysytä uudestaan)',
                    'type_duration' => 'Ensimmäisen osapuolen istuntokohtainen eväste, joka poistetaan, kun suljet selaimen',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => 'Toiminnalliset evästeet',
            'text' => '<p>Jotkin evästeet ovat välttämättömiä, jotta tietyt verkkosivut toimisivat. Tästä syystä ne eivät edellytä suostumustasi. Näitä ovat</p>',
            'item' => 'tiettyjen IT-järjestelmien edellyttämät tekniset evästeet.'
        ],
        'technical_cookies' => [
            'title' => 'Tekniset evästeet',
            'table' => [
                '1' => [
                    'purpose' => 'Takaa sinulle turvallisen istunnon sivustolla vieraillessasi.',
                    'type_duration' => 'Ensimmäisen osapuolen istuntokohtainen eväste, joka poistetaan, kun suljet selaimen',
                ],
                '2' => [
                    'purpose' => 'Takaa sinulle turvallisen istunnon pidempään ja tallentaa istunnon, kun suljet selaimen.',
                    'type_duration' => 'Ensimmäisen osapuolen pysyvä eväste, 60 kuukautta',
                ],
                '3' => [
                    'purpose' => 'Tallentaa käyttäjän valitseman kielen',
                    'type_duration' => 'Ensimmäisen osapuolen istuntokohtainen eväste, joka poistetaan, kun suljet selaimen',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => 'Analytiikkaevästeet',
            'items' => '<p>Näitä evästeitä käytetään yksinomaan sivuston kaikille käyttäjille tarkoitettujen palvelujen kehittämiseen.</p>

            <p>Evästeet arvioivat käyttäjän vuorovaikutusta verkkosivuston kanssa. Tiedot anonymisoidaan, eli kerätyistä tiedoista ei voi tunnistaa käyttäjää henkilökohtaisesti.</p>

            <p>Näitä tietoja ei myöskään jaeta minkään kolmannen osapuolen kanssa eikä käytetä mihinkään muuhun tarkoitukseen. Anonymisoidut tilastot saatetaan jakaa sellaisten toimeksisaajien kanssa, jotka työskentelevät viestintähankkeissa komission kanssa tehdyn sopimuksen nojalla.</p>

            <p>Voit kuitenkin kieltää tämäntyyppisten evästeiden käytön joko ensimmäisen avaamasi sivun evästepalkista tai käymällä tällä <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">sivulla.</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Verkkoanalytiikkapalvelu, perustuu avoimen lähdekoodin Matomo-ohjelmistoon',
                    'purpose' => 'Tunnistaa verkkosivustolla kävijät (anonyymisti – käyttäjästä ei kerätä henkilötietoja).',
                    'type_duration' => 'Ensimmäisen osapuolen pysyvä eväste, 20 päivää',
                ],
                '2' => [
                    'service' => 'Verkkoanalytiikkapalvelu, perustuu avoimen lähdekoodin Matomo-ohjelmistoon',
                    'purpose' => 'Tunnistaa sivut, joilla sama käyttäjä käy saman istunnon aikana (anonyymisti – käyttäjästä ei kerätä henkilötietoja).',
                    'type_duration' => 'Ensimmäisen osapuolen pysyvä eväste, 30 minuuttia',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => 'Kolmansien osapuolten evästeet',
        'items' => [
            '1' => '<p>Joidenkin sivujemme sisältö on peräisin ulkopuolisilta palveluntarjoajilta (esim. YouTube, Facebook ja Twitter).</p>

                <p>Voidaksesi nähdä tämän kolmansien osapuolten sisällön sinun on ensin hyväksyttävä niiden omat käyttöehdot. Tämä koskee myös niiden evästekäytäntöjä, joita komissio ei voi kontrolloida.</p>

                <p>Jos et kuitenkaan käytä tätä sisältöä, kolmansien osapuolten evästeitä ei tallennu laitteellesi.</p>Koodausviikon ulkopuoliset palveluntarjoajat',
            '2' => 'Nämä ulkopuoliset palveluntarjoajat eivät ole koodausviikon verkkosivuston valvonnassa. Palveluntarjoajat voivat milloin tahansa muuttaa muun muassa palvelunsa käyttöehtoja tai evästeiden tarkoitusta ja käyttöä.'
        ]
    ],
    'how-manage' => [
        'title' => 'Evästeiden hallinta',
        'items' => '<p>Voit <strong>hallita ja/tai poistaa</strong> evästeitä vapaasti. Ohjeita on osoitteessa <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Evästeiden poistaminen laitteeltasi</strong></p>

            <p>Voit poistaa kaikki jo laitteellasi olevat evästeet tyhjentämällä selaimesi selaushistorian. Näin poistat kaikki evästeet kaikilta verkkosivuilta, joilla olet vieraillut.</p>

            <p>Huomaa kuitenkin, että saatat menettää myös jotain tallentamiasi tietoja (esim. tallennetut sisäänkirjautumistiedot tai sivustojen asetukset).</p><strong>Sivustokohtaisten evästeiden hallinta</strong><p>Sivustokohtaisia evästeitä voit hallita yksityiskohtaisemmin oletusselaimesi yksityisyys- ja evästeasetuksissa.</p><strong>Evästeiden estäminen</strong><p>Useimmissa nykyaikaisissa selaimissa voi estää kaikkien evästeiden asettamisen laitteelle, mutta silloin joudut mahdollisesti mukauttamaan joitakin asetuksia manuaalisesti joka kerta, kun käyt tietyllä sivustolla/sivulla. Tietyt palvelut ja toiminnot eivät välttämättä toimi kunnolla (esim. profiiliin sisäänkirjautuminen).</p><strong>Analytiikkaevästeiden hallinta</strong><p>Voit hallita analytiikkaevästeidemme asetuksia <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">tällä sivulla.</a></p>'
    ]
];
