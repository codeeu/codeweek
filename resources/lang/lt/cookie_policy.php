<?php

return [

    'title' => 'Slapukų politika',
    'what' => [
        'title' => 'Kas yra slapukai?',
        'text' => '<p>Slapukas – tai nedidelis tekstinis failas, kurį jūsų kompiuteryje arba mobiliajame prietaise saugo svetainė, kai joje lankotės.</p>',
        'first_party' => '<strong>Lankomos svetainės slapukai</strong> – tai slapukai, kuriuos nustato jūsų lankoma svetainė. Juos gali perskaityti tik ši svetainė. Svetainė taip pat gali naudotis išorės paslaugomis, kurios taip pat nusistato slapukus, vadinamuosius <strong>svetimus slapukus</strong>.',
        'persistent_cookies' => 'Ilgalaikiai slapukai – tai jūsų kompiuteryje įrašyti slapukai, kurie nėra pašalinami automatiškai, kai išeinate iš naršyklės. Jie skiriasi nuo seanso slapukų, kurie, jums išėjus iš naršyklės, yra pašalinami.',
        'items' => '<p>Pirmąkart apsilankę svetainėje „Codeweek“, būsite paraginti <strong>priimti arba atsisakyti priimti slapukus</strong>.</p>

            <p>To reikia, kad svetainė tam tikrą laikotarpį galėtų prisiminti jūsų nuostatas (pvz., naudotojo vardą, kalbą ir kt.).</p>

            <p>Todėl naršant svetainę to paties seanso metu jums nereikės jų įvesti iš naujo.</p>

            <p>Slapukai taip pat gali būti naudojami nuasmenintai statistinei informacijai apie mūsų svetainių naršymą nustatyti.</p>
            </p>'
    ],
    'how' => [
        'title' => 'Kaip naudojame slapukus?',
        'text1' => '<p>„Codeweek“ daugiausia naudoja vadinamuosius lankomos svetainės slapukus. Šiuos slapukus nustato ir valdo ne kokia nors išorės organizacija, bet mes.</p>',
        'text2' => '<p>Vis dėlto, norėdami peržiūrėti kai kuriuos iš mūsų puslapių, turėsite sutikti su išorės organizacijų slapukais.</p>',
        '3types' => [
            'title' => 'Mūsų naudojami <strong>3 tipų lankomos svetainės slapukai</strong> skirti:',
            '1' => 'lankytojų nuostatoms išsaugoti;',
            '2' => 'mūsų svetainių veikimui užtikrinti;',
            '3' => 'analizės duomenims (apie naudojimąsi svetaine) rinkti.'
        ],
        'table' => [
            'name'=>'Pavadinimas',
            'service'=>'Paslauga',
            'purpose'=>'Paskirtis',
            'type_duration'=>'Slapuko tipas ir galiojimo trukmė',
        ],
        'visitor_preferences' => [
            'title'=> 'Lankytojo nuostatos',
            'text'=> '<p>Jas nustatome ir galime perskaityti tik mes. Jos prisimena:</p>',
            'item'=> 'ar priėmėte (arba atsisakėte priimti) šios svetainės slapukų politiką.',
            'table' => [
                '1' => [
                    'service' => 'Sutikimo su slapukais rinkinys',
                    'purpose' => 'Saugo jūsų slapukų nuostatas (todėl nebebūsite klausiami iš naujo).',
                    'type_duration' => 'Lankomos svetainės seanso slapukas, pašalinamas išėjus iš naršyklės.',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => 'Veikimo slapukai',
            'text' => '<p>Kai kuriuos slapukus turime įtraukti, kad tam tikri svetainės puslapiai galėtų veikti. Todėl šiems slapukams jūsų sutikimo nereikia. Tai pirmiausia:</p>',
            'item' => 'techniniai slapukai, kurių reikia tam tikroms IT sistemoms.'
        ],
        'technical_cookies' => [
            'title' => 'Techniniai slapukai',
            'table' => [
                '1' => [
                    'purpose' => 'Išlaiko saugų jūsų seansą, kol lankotės svetainėje.',
                    'type_duration' => 'Lankomos svetainės seanso slapukas, pašalinamas išėjus iš naršyklės.',
                ],
                '2' => [
                    'purpose' => 'Ilgiau išlaiko saugų jūsų seansą, kad jis nesibaigtų užvėrus naršyklę.',
                    'type_duration' => 'Lankomos svetainės ilgalaikis slapukas, 60 mėnesių.',
                ],
                '3' => [
                    'purpose' => 'Išsaugo pageidautiną naudotojo kalbą.',
                    'type_duration' => 'Lankomos svetainės seanso slapukas, pašalinamas išėjus iš naršyklės.',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => 'Analitikos slapukai',
            'items' => '<p>Juos naudojame vien vidaus tyrimams norėdami sužinoti, kaip galėtume pagerinti savo paslaugą visiems savo naudotojams.</p>

            <p>Šie slapukai tik įvertina, kaip jūs – kaip anoniminis naudotojas – naudojatės mūsų svetaine (pagal jų surinktus duomenis jūsų tapatybė nenustatoma).</p>

            <p>Be to, šiais duomenimis nesidalijama su jokiomis trečiosiomis šalimis ir jie nėra naudojami jokiais kitais tikslais. Šia nuasmeninta statistine informacija gali būti dalijamasi su rangovais, kurie pagal sutartinį susitarimą su Komisija dirba su komunikacijos projektais.</p>

            <p>Vis dėlto atsisakyti priimti šio tipo slapukus galite slapukų juostoje, kurią pamatysite pirmajame jūsų aplankytame puslapyje, arba apsilankę šiame <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">specialiame puslapyje</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Saityno analitikos paslauga, grindžiama atvirojo šaltinio programine įranga „Matomo“.',
                    'purpose' => 'Atpažįsta svetainės lankytojus (anonimiškai – naudotojo asmens duomenys nerenkami).',
                    'type_duration' => 'Lankomos svetainės ilgalaikis slapukas, 20 dienų.',
                ],
                '2' => [
                    'service' => 'Saityno analitikos paslauga, grindžiama atvirojo šaltinio programine įranga „Matomo“.',
                    'purpose' => 'Nustato to paties apsilankymo metu to paties naudotojo peržiūrėtus puslapius (anonimiškai – naudotojo asmens duomenys nerenkami).',
                    'type_duration' => 'Lankomos svetainės ilgalaikis slapukas, 30 minučių.',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => 'Svetimi slapukai',
        'items' => [
            '1' => '<p>Kai kuriuose mūsų puslapiuose rodomas turinys, kurį teikia išorės paslaugų teikėjai, pvz., „YouTube“, „Facebook“ ir „Twitter“.</p>

                <p>Norėdami peržiūrėti šį trečiųjų šalių turinį, pirmiausia turite sutikti su konkrečiomis jų sąlygomis. Jos apima mūsų nekontroliuojamą šių trečiųjų šalių slapukų politiką.</p>

                <p>Tačiau jei šio turinio neperžiūrite, svetimi slapukai jūsų prietaise neįdiegiami.</p>Paslaugas svetainėje „Codeweek“ teikia šios trečiosios šalys:',
            '2' => 'Svetainė „Codeweek“ šių trečiųjų šalių paslaugų nekontroliuoja. Paslaugų teikėjai gali bet kada pakeisti savo paslaugų teikimo sąlygas, tikslą, slapukų naudojimą ir pan.'
        ]
    ],
    'how-manage' => [
        'title' => 'Kaip galite tvarkyti slapukus?',
        'items' => '<p>Slapukus galite <strong>tvarkyti ir (arba) pašalinti</strong> taip, kaip pageidaujate, – dėl išsamesnės informacijos žr. <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Slapukų pašalinimas iš prietaiso</strong></p>

            <p>Visus jūsų prietaise jau esančius slapukus galite pašalinti išvalydami savo naršyklės naršymo istoriją. Ją išvalę, pašalinsite visus slapukus iš visų jūsų lankytų svetainių.</p>

            <p>Vis dėlto atkreipkite dėmesį į tai, kad taip pat galite prarasti kai kurią įrašytą informaciją (pvz., įrašytus prisijungimo duomenis, svetainių nuostatas).</p><strong>Konkrečios svetainės slapukų tvarkymas</strong><p>Daugiau informacijos apie konkrečios svetainės slapukų valdymą sužinosite peržiūrėję pasirinktos naršyklės privatumo ir slapukų nuostatas.</p><strong>Slapukų blokavimas</strong><p>Daugumą šiuolaikinių naršyklių galite nustatyti taip, kad slapukai jūsų prietaise nebūtų išsaugomi, bet tada kai kurias nuostatas jums gali reikėti pritaikyti kaskart apsilankius svetainėje ir (arba) puslapyje. O kai kurios paslaugos ir funkcijos apskritai gali neveikti tinkamai (pvz., prisijungimas naudojant profilį).</p><strong>Mūsų analitikos slapukų tvarkymas</strong><p>Su mūsų analitikos slapukais susijusias nuostatas galite tvarkyti <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">specialiame puslapyje</a>.</p>'
    ]
];
