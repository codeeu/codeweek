<?php

return [

    'title' => 'Zásady ochrany osobních údajů',
    'what' => [
        'title' => 'Co jsou to soubory cookie?',
        'text' => '<p>Cookie je malý textový soubor, který je při vaší návštěvě webové stránky uložen do vašeho počítače nebo mobilního zařízení.</p>',
        'first_party' => '<strong>Soubory cookie první strany</strong> jsou soubory cookie nastavované webovou stránkou, kterou navštěvujete. Tyto soubory může číst jen právě tato webová stránka. Mimoto může webová stránka využívat externích služeb, které taky mohou nastavovat své vlastní soubory cookie, známé jako <strong>soubory cookie třetích stran</strong>.',
        'persistent_cookies' => 'Trvalé soubory cookie jsou soubory cookie uložené ve vašem počítači, které se na rozdíl od relačních souborů cookie po zavření prohlížeče automaticky nesmažou.',
        'items' => '<p>Při vaší první návštěvě webové stránky Codeweek budete vyzváni k <strong>přijetí nebo odmítnutí souborů cookie</strong>.</p>

            <p>Jejich účelem je, aby si webová stránka po určitou dobu pamatovala vaše preference (například uživatelské jméno, jazyk atd.).</p>

            <p>Při opakovaném procházení stránky během jedné návštěvy tak tyto údaje nebudete muset opakovaně zadávat.</p>

            <p>Soubory cookie rovněž umožňují vytváření anonymizovaných statistik o procházení našich stránek.</p>'
    ],
    'how' => [
        'title' => 'Jak soubory cookie používáme?',
        'text1' => '<p>Codeweek používá zejména „soubory cookie první strany“. To jsou soubory cookie, které jsou nastavovány a ovládány námi, ne externí organizací.</p>',
        'text2' => '<p>Za účelem prohlížení některých z našich stránek je však zapotřebí přijmout také soubory cookie pocházející od externích organizací.</p>',
        '3types' => [
            'title' => '<strong>3 typy souborů cookie první strany</strong> používáme za účelem:',
            '1' => 'uložení preferencí návštěvníka',
            '2' => 'zajištění správného fungování našich webových stránek',
            '3' => 'shromažďování analytických dat (o chování uživatele na webové stránce)'
        ],
        'table' => [
            'name'=>'Jméno',
            'service'=>'Služba',
            'purpose'=>'Účel',
            'type_duration'=>'Typ souboru cookie a jeho životnost',
        ],
        'visitor_preferences' => [
            'title'=> 'Preference návštěvníka',
            'text'=> '<p>Soubory cookie ukládající preference návštěvníka nastavujeme my a pouze my je můžeme číst. Pamatují si:</p>',
            'item'=> 'zda jste vyjádřili souhlas se zásadami používání souborů cookie na této stránce (nebo tyto zásady odmítli)',
            'table' => [
                '1' => [
                    'service' => 'Sada souborů cookie souvisejících s udělením souhlasu',
                    'purpose' => 'Ukládá vaše preference týkající se souborů cookie (takže už na ně nebudete dotazováni znovu)',
                    'type_duration' => 'Relační soubor cookie první strany, který se smaže po zavření prohlížeče',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => 'Provozní soubory cookie',
            'text' => '<p>Existují soubory cookie, které musíme zahrnout, abychom zajistili správné fungování určitých webových stránek. Z tohoto důvodu nevyžadujeme váš souhlas. Zejména se jedná o:</p>',
            'item' => 'technické soubory cookie vyžadované určitými IT systémy'
        ],
        'technical_cookies' => [
            'title' => 'Technické soubory cookie',
            'table' => [
                '1' => [
                    'purpose' => 'Zajištění zabezpečené relace během vaší návštěvy.',
                    'type_duration' => 'Relační soubor cookie první strany, který se smaže po zavření prohlížeče',
                ],
                '2' => [
                    'purpose' => 'Zajištění zabezpečené relace v delším časovém horizontu bránící ztrátě relace při zavření prohlížeče.',
                    'type_duration' => 'Trvalý soubor cookie první strany, 60 měsíců',
                ],
                '3' => [
                    'purpose' => 'Ukládá upřednostňovaný jazyk uživatele',
                    'type_duration' => 'Relační soubor cookie první strany, který se smaže po zavření prohlížeče',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => 'Analytické soubory cookie',
            'items' => '<p>Tyto soubory používáme čistě za účelem interního průzkumu toho, jak můžeme zlepšit službu poskytovanou všem našim uživatelům.</p>

            <p>Tyto soubory cookie jednoduše posuzují, jak se – jako anonymní uživatel (shromažďovaná data neumožňují zjištění vaší totožnosti) – chováte na naší webové stránce.</p>

            <p>Tyto údaje rovněž nesdílíme s žádnými třetími stranami a nepoužíváme je za žádným jiným účelem. Anonymizované statistky můžeme sdílet se smluvními partnery, kteří na základě smluvní dohody s Komisí pracují na komunikačních projektech.</p>

            <p>Tyto typy souborů cookie však můžete odmítnout – buď na liště s oznámením o souborech cookie zobrazené na první stránce při vaší první návštěvě, nebo na této <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">vyhrazené stránce.</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Služba analýzy webu opírající se o open source software Matomo',
                    'purpose' => 'Rozpoznává návštěvníky webové stránky (anonymně – nejsou shromažďovány žádné osobní údaje uživatele).',
                    'type_duration' => 'Trvalý soubor cookie první strany, 20 dnů',
                ],
                '2' => [
                    'service' => 'Služba analýzy webu opírající se o open source software Matomo',
                    'purpose' => 'Identifikace stránek navštívených stejným uživatelem během jedné návštěvy (anonymně – nejsou shromažďovány žádné osobní údaje uživatele).',
                    'type_duration' => 'Trvalý soubor cookie první strany, 30 minut',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => 'Soubory cookie třetích stran',
        'items' => [
            '1' => '<p>Některé naše stránky zobrazují obsah od externích poskytovatelů, např. YouTube, Facebook a Twitter.</p>

                <p>Pokud chcete tento obsah třetích stran zobrazit, musíte nejprve přijmout jejich vlastní podmínky. Mezi ně patří také jejich vlastní zásady používání souborů cookie, nad nimiž nemáme žádnou kontrolu.</p>

                <p>Pokud však tento obsah zobrazit nechcete, žádné soubory cookie třetích stran do vašeho zařízení instalovány nebudou.</p>Třetí strany – poskytovatelé obsahu na stránce Codeweek',
            '2' => 'Tyto služby třetích stran jsou mimo kontrolu webové stránky Codeweek. Poskytovatelé mohou podmínky poskytování služby, účel a používání souborů cookie atd. kdykoli změnit.'
        ]
    ],
    'how-manage' => [
        'title' => 'Jak můžete soubory cookie spravovat?',
        'items' => '<p>Soubory cookie můžete <strong>spravovat/mazat</strong> dle libosti – podrobnosti najdete na stránce <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Odstranění souborů cookie ze zařízení</strong></p>

            <p>Všechny soubory cookie ve svém zařízení můžete vymazat smazáním historie procházení v prohlížeči. Tím odstraníte všechny soubory cookie ze všech webových stránek, které jste navštívili.</p>

            <p>Mějte však na vědomí, že tak můžete přijít i o některé uložené informace (např. uložené přihlašovací údaje, preference stránky).</p><strong>Správa souborů cookie vlastních pro konkrétní stránku</strong><p>Podrobnější nastavení souborů cookie vlastních pro konkrétní stránku můžete provést v nastavení soukromí a souborů cookie ve vámi upřednostňovaném prohlížeči.</p><strong>Blokování souborů cookie</strong><p>Většinu moderních prohlížečů můžete nastavit tak, aby se žádné soubory cookie ve vašem zařízení neukládaly. Při každé nové návštěvě stránky však může být nutné některé preference opakovaně nastavit ručně. Určité služby a funkce rovněž nemusí fungovat správně, nebo dokonce vůbec (např. přihlášení k profilu).</p><strong>Správa našich analytických souborů cookie</strong><p>Vaše preference týkající se našich analytických souborů cookie můžete spravovat na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">vyhrazené stránce.</a></p>'
    ]
];
