<?php

return [

    'title' => 'Küpsiste kasutamise põhimõtted',
    'what' => [
        'title' => 'Mis on küpsised?',
        'text' => '<p>Küpsis on väike tekstifail, mille veebisait salvestab teie arvutisse või mobiilseadmesse, kui te veebisaiti külastate.</p>',
        'first_party' => '<strong>Esimese osapoole küpsised</strong> on küpsised, mille on seadnud see veebisait, mida te külastate. Neid saab lugeda ainult see veebisait. Lisaks võidakse veebisaidil kasutada väliseid teenuseid, mis võivad samuti seada oma küpsiseid, nn <strong>kolmanda osapoole küpsiseid</strong>.',
        'persistent_cookies' => 'Püsiküpsised on teie arvutis salvestatud küpsised, mida ei kustutata automaatselt, kui te brauseri sulgete, erinevalt seansiküpsistest, mis brauseri sulgemisel kustutatakse.',
        'items' => '<p>Esimesel korral, kui te Codeweeki veebisaiti külastate, küsitakse teilt, kas te <strong>nõustute küpsistega või mitte</strong>.</p>

            <p>Selle eesmärk on võimaldada veebisaidil jätta teie eelistused (nt kasutajanimi, keel jne) teatud ajavahemikuks meelde.</p>

            <p>Nii ei pea te neid uuesti sisestama, kui te sama külastuse ajal eri lehekülgi sirvite.</p>

            <p>Küpsiseid võib kasutada ka selleks, et koguda anonüümseks muudetud statistikat meie veebilehtedega seotud sirvimiskogemuse kohta.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Kuidas me küpsiseid kasutame?',
        'text1' => '<p>Codeweek kasutab enamasti „esimese osapoole küpsiseid“. Need küpsised on meie seatud ja meie kontrolli all ega ole seotud ühegi välise organisatsiooniga.</p>',
        'text2' => '<p>Mõne meie lehekülje vaatamiseks peate siiski nõustuma väliste organisatsioonide küpsiste kasutamisega.</p>',
        '3types' => [
            'title' => 'Me kasutame <strong>kolme liiki esimese osapoole küpsiseid</strong>, et:',
            '1' => 'salvestada külastajate eelistused',
            '2' => 'muuta veebisaidid toimivaks',
            '3' => 'koguda analüüsiandmeid (kasutajate käitumise kohta)',
        ],
        'table' => [
            'name' => 'Nimi',
            'service' => 'Teenus',
            'purpose' => 'Otstarve',
            'type_duration' => 'Küpsise liik ja kehtivusaeg',
        ],
        'visitor_preferences' => [
            'title' => 'Külastajate eelistused',
            'text' => '<p>Need küpsised on meie seatud ja ainult meie saame neid lugeda. Need jätavad meelde:</p>',
            'item' => 'kas te nõustusite (või mitte) selle veebisaidi küpsiste kasutamise põhimõtetega',
            'table' => [
                '1' => [
                    'service' => 'Küpsistega nõustumise komplekt',
                    'purpose' => 'Salvestab teie küpsiseid puudutavad eelistused (nii välditakse küsimuse korduvat esitamist)',
                    'type_duration' => 'Esimese osapoole seansiküpsised kustutatakse pärast brauseri sulgemist',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Toimivusküpsised',
            'text' => '<p>Mõned küpsised on lisatud selleks, et teatavad veebilehed toimiksid. Seetõttu ei ole nende kasutamiseks vaja teie nõusolekut. Eelkõige:</p>',
            'item' => 'teatavate IT-süsteemide nõutavad tehnilised küpsised',
        ],
        'technical_cookies' => [
            'title' => 'Tehnilised küpsised',
            'table' => [
                '1' => [
                    'purpose' => 'Säilitab teie külastuse kestel teile turvalise seansi.',
                    'type_duration' => 'Esimese osapoole seansiküpsis, kustutatakse pärast brauseri sulgemist',
                ],
                '2' => [
                    'purpose' => 'Säilitab turvalist seanssi pikemat aega, et seanss brauseri sulgemisel ei katkeks.',
                    'type_duration' => 'Esimese osapoole püsiküpsis, 60 kuud',
                ],
                '3' => [
                    'purpose' => 'Salvestab kasutaja eelistatud keele',
                    'type_duration' => 'Esimese osapoole seansiküpsis, kustutatakse pärast brauseri sulgemist',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analüütilised küpsised',
            'items' => '<p>Neid kasutatakse üksnes komisjonisisestel eesmärkidel, et uurida, kuidas saaks parandada teenust, mida me kõigile oma kasutajatele pakume.</p>

            <p>Küpsised hindavad lihtsalt seda, kuidas te anonüümse kasutajana veebisaidiga suhtlete (kogutud andmed ei võimalda tuvastada kasutaja isikut).</p>

            <p>Neid andmeid ei jagata kolmandate isikutega ega kasutata muudel eesmärkidel. Anonüümseks muudetud statistikat võidakse jagada töövõtjatega, kes tegelevad komisjoniga sõlmitud lepingulise kokkuleppe alusel teavitusprojektidega.</p>

            <p>Teil on võimalik seda liiki küpsistest keelduda – kas küpsisebänneri kaudu, mida näete esimesel lehel, mida te külastate, või sellel <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">temaatilisel veebilehel</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Veebi analüüsimise teenus, mis põhineb Matomo avatud lähtekoodiga tarkvaral',
                    'purpose' => 'Tunneb ära veebilehe külastajad (anonüümselt – kasutajate kohta isikuandmeid ei koguta).',
                    'type_duration' => 'Esimese osapoole püsiküpsis, 20 päeva',
                ],
                '2' => [
                    'service' => 'Veebi analüüsimise teenus, mis põhineb Matomo avatud lähtekoodiga tarkvaral',
                    'purpose' => 'Tuvastab sama kasutaja poolt sama külastuse ajal vaadatud veebilehed (anonüümselt – kasutajate kohta isikuandmeid ei koguta).',
                    'type_duration' => 'Esimese osapoole püsiküpsis, 30 minutit',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Kolmandate osapoolte küpsised',
        'items' => [
            '1' => '<p>Mõned meie veebilehed kuvavad sisu välistelt teenuseosutajatelt, näiteks YouTube, Facebook ja Twitter.</p>

                <p>Selle kolmandate isikute pakutava sisu nägemiseks peate kõigepealt nõustuma nende eritingimustega. See nõusolek hõlmab nende küpsiste kasutamise põhimõtteid, mille üle meil kontroll puudub.</p>

                <p>Kuid kui te seda sisu ei vaata, ei paigaldata teie seadmesse ühtegi kolmanda osapoole küpsist.</p>Kolmandatest isikutest pakkujad Codeweekil',
            '2' => 'Need kolmandate isikute teenused ei kuulu Codeweeki veebisaidi kontrolli alla. Teenuseosutajad võivad igal ajal muuta oma kasutustingimusi, küpsiste otstarvet, kasutamist jne.',
        ],
    ],
    'how-manage' => [
        'title' => 'Kuidas te saate küpsiseid hallata?',
        'items' => '<p>Soovi korral saate küpsiseid <strong>hallata/kustutada</strong> – üksikasjalik teave on aadressil <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Küpsiste kõrvaldamine teie seadmest</strong></p>

            <p>Te saate kustutada kõik juba teie seadmesse salvestatud küpsised, kustutades oma brauseri sirvimisajaloo. See kõrvaldab kõik küpsised kõigist külastatud veebisaitidest.</p>

            <p>Pange tähele, et nii võite kaotada ka osa salvestatud teabest (nt salvestatud sisselogimisandmed, saidi eelistused).</p><strong>Saidipõhiste küpsiste haldamine</strong><p>Et saada täpsem kontroll saidipõhiste küpsiste üle, vaadake üle oma eelistatud brauseri privaatsuse ja küpsiste sätted.</p><strong>Küpsiste blokeerimine</strong><p>Enamiku brausereid saab seadistada nii, et küpsiseid teie seadmesse ei salvestataks, kuid sellisel juhul peate käsitsi kohandama teatavaid eelistusi iga kord, kui veebisaiti/-lehte külastate. Lisaks ei pruugi mõned teenused ja funktsioonid üldse korralikult toimida (nt sisselogimine).</p><strong>Analüütiliste küpsiste haldamine</strong><p>Meie Analyticsis küpsistega seotud eelistusi saate hallata <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">vastaval lehel</a>.</p>',
    ],
];
