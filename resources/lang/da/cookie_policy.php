<?php

return [

    'title' => 'Cookiepolitik',
    'what' => [
        'title' => 'Hvad er cookies?',
        'text' => '<p>En cookie er en lille tekstfil, som et websted gemmer på din computer eller mobilenhed, når du besøger webstedet.</p>',
        'first_party' => '<strong>Førstepartscookies</strong> er cookies, som gemmes af det websted, du besøger. Kun dette websted kan læse dem. Desuden bruger nogle websteder eksterne tjenester, som også gemmer deres egne cookies. Disse kaldes <strong>tredjepartscookies</strong>.',
        'persistent_cookies' => 'Permanente cookies er cookies, der gemmes på din computer, og som ikke slettes automatisk, når du lukker browseren, modsat sessionscookies, der slettes, når du lukker browseren.',
        'items' => '<p>Første gang du besøger CodeWeek-webstedet, vil du blive bedt om at <strong>acceptere eller afvise cookies</strong>.</p>

            <p>Formålet er, at webstedet kan huske dine præferencer (for eksempel brugernavn, sprog osv.) i en bestemt periode.</p>

            <p>På denne måde skal du ikke indtaste oplysningerne igen, når du browser rundt på webstedet i løbet af et besøg.</p>

            <p>Cookies kan også bruges til at oprette anonymiserede statistikker om browsingoplevelsen på vores websteder.</p>
            </p>',
    ],
    'how' => [
        'title' => 'Hvordan bruger vi cookies?',
        'text1' => '<p>CodeWeek-webstedet bruger mest "førstepartscookies". Det er cookies, som gemmes og kontrolleres af os, ikke af en ekstern organisation.</p>',
        'text2' => '<p>For at se nogle af vores sider er du dog nødt til at acceptere cookies fra eksterne organisationer.</p>',
        '3types' => [
            'title' => 'De <strong>3 typer af førstepartscookies</strong>, vi bruger, gør følgende:',
            '1' => 'gemmer den besøgendes præferencer',
            '2' => 'får vores websteder til at fungere',
            '3' => 'indsamler analysedata (om brugeradfærd)',
        ],
        'table' => [
            'name' => 'Navn',
            'service' => 'Tjeneste',
            'purpose' => 'Formål',
            'type_duration' => 'Cookietype og -varighed',
        ],
        'visitor_preferences' => [
            'title' => 'Den besøgendes præferencer',
            'text' => '<p>Disse gemmes af os, og det er kun os, der kan læse dem. De gemmer oplysninger om:</p>',
            'item' => 'hvorvidt du har accepteret eller afvist dette websteds cookiepolitik',
            'table' => [
                '1' => [
                    'service' => 'Cookiesamtykke',
                    'purpose' => 'Gemmer dine cookiepræferencer (så vi ikke skal spørge dig igen)',
                    'type_duration' => 'Førstepartssessionscookie, som slettes, når du lukker browseren',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Driftsmæssige cookies',
            'text' => '<p>Vi er nødt til at have visse cookies, hvis bestemte websider skal fungere. Derfor kræver de ikke dit samtykke. Det er især:</p>',
            'item' => 'tekniske cookies, som visse it-systemer kræver',
        ],
        'technical_cookies' => [
            'title' => 'Tekniske cookies',
            'table' => [
                '1' => [
                    'purpose' => 'Opretholder en sikker session for dig under dit besøg.',
                    'type_duration' => 'Førstepartssessionscookie, som slettes, når du lukker browseren',
                ],
                '2' => [
                    'purpose' => 'Opretholder en sikker session for dig i længere tid, så sessionen ikke slettes, når du lukker browseren.',
                    'type_duration' => 'Fast førstepartscookie, 60 måneder',
                ],
                '3' => [
                    'purpose' => 'Gemmer brugerens foretrukne sprog',
                    'type_duration' => 'Førstepartssessionscookie, som slettes, når du lukker browseren',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analysecookies',
            'items' => '<p>Disse bruger vi udelukkende til interne undersøgelser af, hvordan vi kan forbedre den tjeneste, vi tilbyder alle vores brugere.</p>

            <p>Disse cookies vurderer blot, hvordan du interagerer med vores websted – som en anonym bruger (de indsamlede data identificerer dig ikke personligt).</p>

            <p>Disse data deles desuden ikke med tredjepart, og de bruges ikke til noget andet formål. De anonymiserede statistikker deles muligvis med underleverandører, som har en kontrakt med Kommissionen om kommunikationsprojekter.</p>

            <p>Du kan dog frit afvise disse typer af cookies – enten via cookiebanneret på den første side, du besøger, eller ved at gå ind på denne <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">side til formålet</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'Webanalysetjeneste, baseret på Matomo open source-software',
                    'purpose' => 'Genkender besøgende på webstedet (anonymt – der indsamles ingen personoplysninger om brugeren).',
                    'type_duration' => 'Fast førstepartscookie, 20 dage',
                ],
                '2' => [
                    'service' => 'Webanalysetjeneste, baseret på Matomo open source-software',
                    'purpose' => 'Identificerer de sider, som den samme bruger har set i løbet af det samme besøg. (Anonymt – der indsamles ingen personoplysninger om brugeren).',
                    'type_duration' => 'Fast førstepartscookie, 30 minutter',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Tredjepartscookies',
        'items' => [
            '1' => '<p>Nogle af vores sider viser indhold fra eksterne udbydere, som for eksempel YouTube, Facebook og Twitter.</p>

                <p>For at se dette tredjepartsindhold skal du først acceptere deres specifikke vilkår og betingelser. Dette omfatter deres cookiepolitik, som vi ikke har kontrol over.</p>

                <p>Hvis du ikke ser dette indhold, gemmes der ingen tredjepartscookies på din enhed.</p>Tredjepartsudbydere på CodeWeek-webstedet',
            '2' => 'CodeWeek-webstedet har ingen kontrol over disse tredjepartstjenester. Udbyderne kan når som helst ændre deres vilkår vedrørende tjenester, formål, brug af cookies osv.',
        ],
    ],
    'how-manage' => [
        'title' => 'Hvordan kan man administrere cookies?',
        'items' => '<p>Du kan <strong>administrere/slette</strong> cookies, som du vil. Se <a
                        href="https://aboutcookies.org">aboutcookies.org</a> for at få nærmere oplysninger.<p><strong>Sådan fjerner du cookies fra din enhed</strong></p>

            <p>Du kan slette alle cookies, der allerede er gemt på din enhed, ved at rydde din browsers historik. Dette fjerner alle cookies fra alle websteder, du har besøgt.</p>

            <p>Du skal være opmærksom på, at du kan miste andre gemte oplysninger (for eksempel gemte loginoplysninger og præferencer for andre websteder).</p><strong>Administration af webstedspecifikke cookies</strong><p>Du kan styre webstedspecifikke cookies via indstillingerne for privatliv og cookies i den browser, du bruger.</p><strong>Blokering af cookies</strong><p>De fleste moderne browsere kan indstilles til at forhindre, at der gemmes cookies på din enhed, men det kan betyde, at du så skal indstille visse præferencer manuelt, hver gang du besøger et websted eller en side. Det kan også være, at visse tjenester og funktioner ikke fungerer korrekt (for eksempel at logge på med en profil).</p><strong>Administration af vores analysecookies</strong><p>Du kan administrere dine præferencer for vores analysecookies på denne <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">side til formålet</a>.</p>',
    ],
];
