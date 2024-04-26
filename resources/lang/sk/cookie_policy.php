<?php

return [

    'title' => 'Politika používania súborov cookie',
    'what' => [
        'title' => 'Čo sú to súbory cookie?',
        'text' => '<p>Cookie je malý textový súbor, ktorý webová lokalita uloží do vášho počítača alebo mobilného zariadenia, keď navštívite danú lokalitu.</p>',
        'first_party' => '<strong>Súbory cookie prvej strany</strong> sú súbory cookie nastavené webovou stránkou, ktorú navštevujete. Môže ich prečítať len daná webová stránka. Okrem toho môže webová stránka využívať externé služby, ktoré si tiež nastavujú vlastné súbory cookie, nazývajú sa <strong>cookie tretích strán</strong>.',
        'persistent_cookies' => 'Pretrvávajúce súbory cookie sú súbory cookie uložené vo vašom počítači, ktoré sa automaticky nevymažú po zatvorení prehliadača, na rozdiel od relačného súboru cookie, ktorý sa vymaže, keď zavriete prehliadač.',
        'items' => '<p>Pri prvej návšteve webovej lokality Týždňa programovania sa zobrazí výzva, aby ste <strong>prijali alebo odmietli súbory cookie</strong>.</p>

            <p>Slúžia na to, aby si lokalita na určitý čas zapamätala vaše preferencie (napr. používateľské meno, jazyk atď.).</p>

            <p>Vďaka tomu ich nemusíte znova zadávať v rámci jednej návštevy danej lokality.</p>

            <p>Súbory cookie sa tiež môžu použiť na zostavenie anonymizovanej štatistiky o skúsenosti s prezeraním našich stránok.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Ako používame súbory cookie?',
        'text1' => '<p>Týždeň programovania používa prevažne „súbory cookie prvej strany“. Tieto súbory cookie nastavujeme a ovládame my, a žiadna iná externá organizácia.</p>',
        'text2' => '<p>Pri zobrazení niektorých našich stránok však musíte súhlasiť so súbormi cookie od externých organizácií.</p>',
        '3types' => [
            'title' => 'Používame <strong>tri typy súborov cookie prvej strany</strong>, ktoré slúžia na:',
            '1' => 'uloženie preferencií návštevníka,',
            '2' => 'zabezpečenie fungovania našej webovej lokality,',
            '3' => 'zozbieranie analytických údajov (o správaní používateľa).',
        ],
        'table' => [
            'name' => 'Názov',
            'service' => 'Služba',
            'purpose' => 'Účel',
            'type_duration' => 'Typ a trvanie platnosti súboru cookie',
        ],
        'visitor_preferences' => [
            'title' => 'Preferencie návštevníka',
            'text' => '<p>Tieto súbory nastavujeme my a len my ich môžeme prečítať. Pamätajú si:</p>',
            'item' => 'či ste súhlasili s politikou používania súborov cookie tejto lokality (alebo ju zamietli).',
            'table' => [
                '1' => [
                    'service' => 'Balík súborov cookie týkajúcich sa súhlasu',
                    'purpose' => 'Ukladajú sa doň vaše preferencie týkajúce sa súborov cookie (takže sa vás na to nebudeme opakovane pýtať)',
                    'type_duration' => 'Súbor cookie prvej strany sa vymaže po tom, ako zatvoríte prehliadač.',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Prevádzkové súbory cookie',
            'text' => '<p>Niektoré súbory cookie musíme zahrnúť, aby fungovali niektoré webové stránky. Preto si nevyžadujú váš súhlas. Ide najmä o:</p>',
            'item' => 'technické súbory cookie, ktoré vyžadujú niektoré systémy IT.',
        ],
        'technical_cookies' => [
            'title' => 'Technické súbory cookie',
            'table' => [
                '1' => [
                    'purpose' => 'Počas vašej návštevy pre vás zachováva zabezpečenú reláciu.',
                    'type_duration' => 'Súbor cookie prvej strany sa vymaže po tom, ako zatvoríte prehliadač.',
                ],
                '2' => [
                    'purpose' => 'Zachováva pre vás zabezpečenú reláciu dlhšie, aby sa predišlo strate relácie po zatvorení prehliadača.',
                    'type_duration' => 'Pretrvávajúci súbor cookie prvej strany, 60 mesiacov',
                ],
                '3' => [
                    'purpose' => 'Ukladá uprednostňovaný jazyk používateľa',
                    'type_duration' => 'Súbor cookie prvej strany sa vymaže po tom, ako zatvoríte prehliadač.',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analytické súbory cookie',
            'items' => '<p>Používame ich iba na interný výskum možností zlepšenia služby, ktorú poskytujeme všetkým našim používateľom.</p>

            <p>Súbory cookie jednoducho hodnotia, ako komunikujete s našou webovou lokalitou – ako anonymný používateľ (údaje, ktoré zbierajú, vás osobne neidentifikujú).</p>

            <p>Tieto údaje sa takisto neposkytujú žiadnym tretím stranám ani sa nepoužívajú na žiadny iný účel. Anonymizovaná štatistika sa môže poskytnúť zmluvným dodávateľom, ktorí pracujú na komunikačných projektoch na základe zmluvnej dohody s Komisiou.</p>

            <p>Máte však možnosť odmietnuť tieto typy súborov cookie – a to na paneli s oznámením o súboroch cookie, ktorý sa vám zobrazí na prvej stránke, ktorú navštívite, alebo môžete navštíviť túto <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">vyhradenú stránku</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Webová analytická služba založená na softvéri s otvoreným zdrojovým kódom Matomo',
                    'purpose' => 'Rozpoznáva návštevníkov webovej lokality (anonymne – nezbierajú sa žiadne osobné údaje o používateľovi).',
                    'type_duration' => 'Pretrvávajúci súbor cookie prvej strany, 20 dní',
                ],
                '2' => [
                    'service' => 'Webová analytická služba založená na softvéri s otvoreným zdrojovým kódom Matomo',
                    'purpose' => 'Identifikuje stránky prezerané tým istým používateľom počas tej istej návštevy (anonymne – nezbierajú sa žiadne osobné údaje o používateľovi).',
                    'type_duration' => 'Pretrvávajúci súbor cookie prvej strany, 30 minút',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Súbory cookie tretích strán',
        'items' => [
            '1' => '<p>Na niektorých našich stránkach sa zobrazuje obsah od externých poskytovateľov, napr. YouTube, Facebook a Twitter.</p>

                <p>Ak chcete zobraziť tento obsah tretích strán, musíte najskôr prijať ich osobitné podmienky. Zahŕňa to ich politiku používania súborov cookie, nad ktorou nemáme kontrolu.</p>

                <p>Ak si však nezobrazíte tento obsah, do vášho zariadenia sa nenainštalujú žiadne súbory cookie tretích strán.</p>Poskytovatelia, ktorí sú tretími stranami na lokalite Týždňa programovania',
            '2' => 'Tieto služby tretích strán sú mimo kontroly webovej lokality Týždňa programovania. Poskytovatelia môžu kedykoľvek zmeniť svoje podmienky, účel a používanie súborov cookie atď.',
        ],
    ],
    'how-manage' => [
        'title' => 'Ako môžete spravovať súbory cookie?',
        'items' => '<p>Súbory cookie môžete <strong>spravovať/vymazať</strong> podľa svojho želania – podrobnosti nájdete na lokalite <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Odstránenie súborov cookie z vášho zariadenia</strong></p>

            <p>Všetky súbory cookie, ktoré sa už nachádzajú vo vašom zariadení, môžete vymazať tak, že odstránite históriu prehliadania zo svojho prehliadača. Takto odstránite všetky súbory cookie zo všetkých webových lokalít, ktoré ste navštívili.</p>

            <p>Upozorňujeme však, že zároveň môžete prísť o niektoré uložené údaje (napr. uložené prihlasovacie údaje, preferencie na lokalite).</p><strong>Správa súborov cookie konkrétnych lokalít</strong><p>Ak chcete zistiť, ako podrobnejšie kontrolovať súbory cookie konkrétnych lokalít, skontrolujte nastavenia ochrany súkromia a používania súborov cookie vo svojom uprednostňovanom prehliadači</p><strong>Zablokovanie súborov cookie</strong><p>V najmodernejších prehliadačoch môžete zapnúť nastavenia, ktorými sa zabráni akémukoľvek ukladaniu súborov cookie do vášho zariadenia. V takom prípade však možno budete musieť ručne upravovať niektoré preferencie zakaždým, keď navštívite lokalitu alebo stránku. Niektoré služby a funkcie nemusia správne fungovať (napr. prihlasovanie do profilu).</p><strong>Správa našich analytických súborov cookie</strong><p>Svoje preferencie týkajúce sa súborov cookie z nášho analytického nástroja môžete spravovať na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">vyhradenej stránke</a>.</p>',
    ],
];
