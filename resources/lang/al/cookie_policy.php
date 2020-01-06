<?php

return [

    'title' => 'Politika e kukive',
    'what' => [
        'title' => 'Çfarë janë kukit?',
        'text' => '<p>Një kuki është një skedar i vogël me tekst që një faqe interneti ruan në kompjuterin ose pajisjen celulare tuaj kur vizitoni faqen.</p>',
        'first_party' => '<strong>Kuki e palës së parë</strong> janë kuki të vendosura nga faqja e internetit që po vizitoni. Vetëm ajo faqe interneti mund t\'i lexojë ato. Për më tepër, një faqe interneti mund të përdorë shërbime të jashtme, të cilat gjithashtu vendosin kukit e tyre, të njohura si <strong>kuki të palëve të treta</strong>.',
        'persistent_cookies' => 'Kuki këmbëngulëse janë kuki të ruajtura në kompjuterin tuaj dhe që nuk fshihen automatikisht kur mbyllni shfletuesin tuaj, ndryshe nga një kuki seance, e cila fshihet kur mbyllni shfletuesin.',
        'items' => '<p>Herën e parë që vizitoni faqen e internetit të Codeweek, do t\'ju kërkohet <strong>të pranoni ose refuzoni kukit</strong>.</p>

            <p>Qëllimi është të lejohet faqja të mbajë mend preferencat tuaja (siç janë emri i përdoruesit, gjuha, etj.) për një periudhë kohore të caktuar.</p>

            <p>Në atë mënyrë, nuk do t’ju duhet ti rishkruani kur të kërkoni nëpër faqe gjatë të njëjtës vizitë.</p>

            <p>Kukit gjithashtu mund të përdoren për të vendosur statistika anonimizuese në lidhje me përvojën e shfletimit në faqet tona.</p>'
    ],
    'how' => [
        'title' => 'Si i përdorim kukit?',
        'text1' => '<p>Codeweek përdor kryesisht “kuki të palës së parë”. Këto janë kuki të vendosura e kontrollohen nga ne dhe jo nga ndonjë organizatë e jashtme.</p>',
        'text2' => '<p>Sidoqoftë, për të parë disa nga faqet tona, do t\'ju duhet të pranoni kuki nga organizata të jashtme.</p>',
        '3types' => [
            'title' => '<strong>3 llojet e kukive të palës së parë</strong> që ne përdorim janë për:',
            '1' => 'të ruajtur preferencat e vizitorëve të dyqaneve',
            '2' => 't’i bërë funksionale faqet e internetit',
            '3' => 'të mbledhur të dhëna analitike (në lidhje me sjelljen e përdoruesit)'
        ],
        'table' => [
            'name'=>'Emri',
            'service'=>'Shërbimi',
            'purpose'=>'Qëllimi',
            'type_duration'=>'Lloji dhe kohëzgjatja e kukive',
        ],
        'visitor_preferences' => [
            'title'=> 'Preferencat e vizitorëve',
            'text'=> 'Këto vendosen nga ne dhe vetëm ne mund t\'i lexojmë ato. Ato kujtojnë:',
            'item'=> 'nëse keni pranuar (ose refuzuar) politikën e kukive të kësaj faqeje',
            'table' => [
                '1' => [
                    'service' => 'Paketa e pëlqimit të kukive',
                    'purpose' => 'Ruan preferencat tuaja të kukive (kështu që nuk pyeteni përsëri)',
                    'type_duration' => 'Kukit e seancës së palës së parë fshihen pasi mbyllni shfletuesin',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => 'Kuki operative',
            'text' => '<p>Ka disa kuki që duhet t\'i përfshijmë në mënyrë që disa faqe interneti të funksionojnë. Për këtë arsye, ato nuk kërkojnë pëlqimin tuaj. Veçanërisht:</p>',
            'item' => 'Kuki teknike të kërkuara nga disa sisteme TI'
        ],
        'technical_cookies' => [
            'title' => 'Kuki teknike',
            'table' => [
                '1' => [
                    'purpose' => 'E ruan seancën të sigurt për ju, gjatë vizitës suaj.',
                    'type_duration' => 'Kukit e seancës së palës së parë fshihen pasi mbyllni shfletuesin',
                ],
                '2' => [
                    'purpose' => 'E ruan seancën të sigurt për ju për kohë më të gjatë duke mos lejuar të humbni seancën me mbylljen e shfletuesit.',
                    'type_duration' => 'Kuki këmbëngulëse të palës së parë, 60 muaj',
                ],
                '3' => [
                    'purpose' => 'Ruan gjuhën e preferuar të përdoruesit',
                    'type_duration' => 'Kukit e seancës së palës së parë fshihen pasi mbyllni shfletuesin',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => 'Kuki analitike',
            'items' => '<p>Ne i përdorim këto vetëm për kërkime të brendshme se si mund të përmirësojmë shërbimin që u ofrojmë të gjithë përdoruesve tanë.</p>
            <p>Kukit vetëm vlerësojnë se si bashkëveproni me faqen tonë të internetit - si përdorues anonim (të dhënat e mbledhura nga to nuk ju identifikojnë personalisht).</p>
            <p>Gjithashtu, këto të dhëna nuk ndahen me asnjë palë të tretë ose nuk përdoren për ndonjë qëllim tjetër. Statistika të anonimizuara mund të shpërndahen me kontraktorët që punojnë në projekte të komunikimit në bazë të marrëveshjes kontraktuale me Komisionin.</p>
            <p>Sidoqoftë, ju jeni të lirë t’i refuzoni këto lloje të kukive - qoftë përmes banderolës së kukive që shihni në faqen e parë që vizitoni ose duke vizituar këtë <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">faqe të dedikuar</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Shërbim analitik interneti, bazuar në softuerin me burim të hapur Matomo',
                    'purpose' => 'Njeh vizitorët e faqes së internetit (në mënyrë anonime - nuk mblidhet informacion personal nga përdoruesi).',
                    'type_duration' => 'Kuki këmbëngulëse e palës së parë, 20 ditë',
                ],
                '2' => [
                    'service' => 'Shërbim analitik interneti, bazuar në softuerin me burim të hapur Matomo',
                    'purpose' => 'Identifikon faqet e shikuara nga i njëjti përdorues gjatë së njëjtës vizitë. (në mënyrë anonime - nuk mblidhet informacion personal nga përdoruesi).',
                    'type_duration' => 'Kuki këmbëngulëse e palës së parë, 30 minuta',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => 'Kuki e palëve të treta',
        'items' => [
            '1' => '<p>Disa nga faqet tona shfaqin përmbajtje nga ofrues të jashtëm, p.sh. YouTube, Facebook dhe Twitter.</p>

                <p>Për të parë këtë përmbajtje të palëve të treta, së pari duhet të pranoni termat dhe kushtet e tyre specifike. Kjo përfshin politikat e tyre të kukive, të cilat nuk i kontrollojmë ne.</p>

                <p>Por nëse nuk e shihni këtë përmbajtje, asnjë kuki e palëve të treta nuk është instaluar në pajisjen tuaj.</p>Ofruesit e palëve të treta në Codeweek<ul>',
            '2' => 'Këto shërbime të palëve të treta janë jashtë kontrollit të faqes së internetit Codeweek. Ofruesit munden, në çdo kohë, të ndryshojnë kushtet e tyre të shërbimit, qëllimin dhe përdorimin e kukive etj.'
        ]
    ],
    'how-manage' => [
        'title' => 'Si mund të menaxhoni kukit?',
        'items' => '<p>Ju mundeni të <strong>menaxhoni/fshini</strong> kukit sipas dëshirës - për detaje, shikoni <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Heqja e kukive nga pajisja juaj</strong></p>

            <p>Ju mund të fshini të gjitha kukit që ndodhen tashmë në pajisjen tuaj duke pastruar historinë e shfletimit të shfletuesit tuaj. Kjo gjë heq të gjitha kukit nga të gjitha faqet e internetit që keni vizituar.</p>

            <p>Duhet të jini të vetëdijshëm se mund të humbni disa informacione të ruajtura (p.sh. detajet e ruajtura të identifikimit, preferencat e faqes).</p><strong>Menaxhimi i kukive specifike të faqes</strong><p>Për një kontroll më të detajuar të kukive specifike të faqes, kontrolloni cilësimet dhe privatësinë e kukive në shfletuesin tuaj të preferuar</p><strong>Kuki bllokuese</strong><p>Ju mund të caktoni shfletuesit më modernë që të parandalojnë vendosjen e kukive në pajisjen tuaj, por atëherë do t\'ju duhet të rregulloni manualisht disa preferenca çdo herë që vizitoni një sajt/faqe. Dhe disa shërbime e funksionalitete mund të mos funksionojnë siç duhet (p.sh. identifikimi në profil).</p><strong>Menaxhimi i kukive tona analitike</strong><p>Ju mund të menaxhoni preferencat tuaja në lidhje me kukit nga Analitika jonë në <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">faqen e dedikuar.</a></p>'
    ]
];
