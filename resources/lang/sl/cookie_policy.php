<?php

return [

    'title' => 'Politika glede piškotkov',
    'what' => [
        'title' => 'Kaj so piškotki?',
        'text' => '<p>Piškotek je majhna besedilna datoteka, ki jo spletno mesto ob vašem obisku shrani na vašem računalniku ali mobilni napravi.</p>',
        'first_party' => '<strong>Lastni piškotki</strong> so piškotki, ki jih določi spletno mesto, na katerem se nahajate. Bere jih lahko samo navedeno spletno mesto. Poleg tega lahko spletno mesto uporablja zunanje storitve, ki prav tako določijo svoje piškotke; ti se imenujejo <strong>piškotki tretjih strank</strong>.',
        'persistent_cookies' => 'Trajni piškotki so piškotki, shranjeni na vašem računalniku, ki se ne izbrišejo samodejno, ko zaprete brskalnik, kot se to zgodi pri začasnih piškotkih.',
        'items' => '<p>Ob vašem prvem obisku spletnega mesta tedna programiranja boste prejeli poziv, da <strong>sprejmete ali zavrnete piškotke</strong>.</p>

            <p>Namen tega je spletnemu mestu omogočiti, da si za določeno časovno obdobje zapomni vaše nastavitve (kot so uporabniško ime, jezik itd.).</p>

            <p>Tako vam jih ne bo treba ponovno vnašati za brskanje po spletnem mestu v okviru istega obiska.</p>

            <p>Piškotki se lahko uporabijo tudi za zbiranje anonimiziranih statističnih podatkov glede izkušnje brskanja na naših spletnih mestih.</p>
            </p>'
    ],
    'how' => [
        'title' => 'Kako uporabljamo piškotke?',
        'text1' => '<p>Teden programiranja večinoma uporablja „lastne piškotke“. Te piškotke določimo in nadzorujemo sami in ne zunanja organizacija.</p>',
        'text2' => '<p>Vendar za ogled nekaterih naših strani morate sprejeti piškotke zunanjih organizacij.</p>',
        '3types' => [
            'title' => 'Uporabljamo tri vrste lastnih piškotkov</strong>, in sicer za:',
            '1' => 'shranjevanje nastavitev obiskovalcev',
            '2' => 'delovanje naših spletnih mest',
            '3' => 'zbiranje analitičnih podatkov (o vedenju uporabnikov)'
        ],
        'table' => [
            'name'=>'Ime',
            'service'=>'Storitev',
            'purpose'=>'Namen',
            'type_duration'=>'Vrsta in trajanje piškotka',
        ],
        'visitor_preferences' => [
            'title'=> 'Nastavitve obiskovalcev',
            'text'=> 'Te piškotke določimo sami in smo edini, ki jih lahko beremo. Zapomnijo si:',
            'item'=> 'če soglašate (ali ne) s politiko glede piškotkov na tem spletnem mestu',
            'table' => [
                '1' => [
                    'service' => 'sklop piškotkov za soglašanje z uporabo',
                    'purpose' => 'shrani vaše nastavitve piškotkov (da se vprašanje ne bo znova pojavilo)',
                    'type_duration' => 'začasni lastni piškotek, ki se izbriše, ko zapustite brskalnik',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => 'Operativni piškotki',
            'text' => '<p>Obstaja nekaj piškotkov, ki jih moramo vključiti, da določene spletne strani lahko delujejo. Zato ti ne potrebujejo vašega soglasja. Sem spadajo zlasti:</p>',
            'item' => 'tehnični piškotki, ki jih zahtevajo nekateri sistemi IT'
        ],
        'technical_cookies' => [
            'title' => 'Tehnični piškotki',
            'table' => [
                '1' => [
                    'purpose' => 'Omogoča varnost seje med vašim obiskom.',
                    'type_duration' => 'začasni lastni piškotek, ki se izbriše, ko zapustite brskalnik',
                ],
                '2' => [
                    'purpose' => 'Omogoča varnost seje med vašim obiskom za dlje časa, s čimer preprečuje, da bi izgubili sejo, ko zaprete brskalnik.',
                    'type_duration' => 'trajni lastni piškotek, 60 mesecev',
                ],
                '3' => [
                    'purpose' => 'shrani uporabnikov izbrani jezik',
                    'type_duration' => 'začasni lastni piškotek, ki se izbriše, ko zapustite brskalnik',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => 'Analitični piškotki',
            'items' => '<p>Te piškotke uporabljamo izključno za notranjo raziskavo o tem, kako bi lahko izboljšali storitev, ki jo zagotavljamo svojim uporabnikom.</p>

            <p>Piškotki zgolj ocenijo, kako uporabljate naše spletno mesto kot anonimni uporabnik (zbrani podatki vas ne identificirajo osebno).</p>

            <p>Poleg tega se ti podatki ne delijo s tretjimi osebami in se ne uporabljajo za druge namene. Anonimizirani statistični podatki se lahko delijo z izvajalci, ki delajo na komunikacijskih projektih v okviru pogodbenih dogovorov s Komisijo.</p>

            <p>Vendar lahko tovrstne piškotke zavrnete, in sicer s pomočjo pasice z obvestilom o piškotkih, ki se pojavi na prvi strani, ki jo obiščete, ali z obiskom te <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">namenske strani</a>.</p>',
            'table' => [
                '1' => [
                    'service' => 'storitev spletne analitike na podlagi odprtokodne programske opreme Matomo',
                    'purpose' => 'Prepoznava obiskovalce spletnega mesta (anonimno – ne zbirajo se osebni podatki o uporabniku).',
                    'type_duration' => 'trajni lastni piškotek, 20 dni',
                ],
                '2' => [
                    'service' => 'storitev spletne analitike na podlagi odprtokodne programske opreme Matomo',
                    'purpose' => 'Prepoznava strani, ki si jih je isti uporabnik ogledal v sklopu istega obiska. (anonimno – ne zbirajo se osebni podatki o uporabniku).',
                    'type_duration' => 'trajni lastni piškotek, 30 minut',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => 'Piškotki tretjih strank',
        'items' => [
            '1' => '<p>Nekatere naše strani prikazujejo vsebine zunanjih ponudnikov, kot so YouTube, Facebook in Twitter.</p>

                <p>Za ogled vsebine tretjih strank morate najprej sprejeti njihove posebne pogoje. To vključuje njihove politike glede piškotkov, nad katerimi nimamo nadzora.</p>

                <p>Če si teh vsebin ne boste ogledali, se vam piškotki tretjih strank ne bodo namestili na napravo.</p>Tretji ponudniki na spletnem mestu tedna programiranja',
            '2' => 'Teh storitev tretjih strank spletno mesto tedna programiranja ne nadzoruje. Ponudniki lahko kadar koli spremenijo pogoje uporabe, namen in uporabo piškotkov ipd.'
        ]
    ],
    'how-manage' => [
        'title' => 'Kako lahko upravljate piškotke?',
        'items' => '<p>Piškotke lahko <strong>upravljate/izbrišete</strong> po lastnih željah – za podrobnejše informacije glej <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Brisanje piškotkov z vaše naprave</strong></p>

            <p>Vse piškotke, ki so že nameščeni na vaši napravi, lahko izbrišete tako, da počistite zgodovino brskanja v vašem brskalniku. S tem boste odstranili vse piškotke z vseh spletnih mest, ki ste jih obiskali.</p>

            <p>Zavedati pa se morate, da lahko izgubite tudi nekatere shranjene podatke (npr. shranjene podatke za prijavo ali svoje nastavitve spletnega mesta).</p><strong>Upravljanje piškotkov na določenem spletnem mestu</strong><p>Za podrobnejši nadzor nad piškotki na določenem spletnem mestu preverite nastavitve zasebnosti in piškotkov v svojem izbranem brskalniku.</p><strong>Blokiranje piškotkov</strong><p>Večino sodobnih brskalnikov lahko nastavite tako, da bodo preprečevali namestitev piškotkov na vašo napravo, vendar boste morali tako morda nekatere nastavitve ročno urediti vsakič, ko boste obiskali spletno mesto/stran. Nekatere storitve in funkcije pa morda sploh ne bodo ustrezno delovale (npr. prijava s profilom).</p><strong>Upravljanje naših analitičnih piškotkov</strong><p>Svoje nastavitve glede uporabe piškotkov lahko nastavljate na <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">temu namenjeni strani</a>.</p>'
    ]
];
