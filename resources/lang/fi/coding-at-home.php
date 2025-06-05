<?php

return [

    'title' => 'Coding@Home',
    'questions' => 'Kysymykset',
    'material' => [
        'required' => 'Tarvittava materiaali',
        'chequered' => 'ruutulauta ja laatat',
        'footprint' => 'joissa on jalanjäljen kuvat',
    ],
    'intro' => [
        'title' => 'Johdanto Coding@Home',
    ],
    'explorer' => [
        'title' => 'Tutkimusmatkailija',
        'text' => 'Tutkimusmatkailija on ensimmäinen Coding@Home-harjoitus. Liikuta tutkimusmatkailijaa ympäri lautaa päästäksesi maaliin sen jälkeen, kun olet vieraillut niin monella neliöllä kuin mahdollista.',
        'questions' => [
            'content' => [
                1 => 'Q1. Onko tutkimusmatkailijan mahdollista käydä kaikissa laudan ruuduissa videolla annettujen aloitus- ja maalipaikan mukaan.',
                2 => 'Q2. Mitkä aloitus- ja maalipaikat estävät tutkijaa käymästä suurimmassa mahdollisessa ruutumäärässä?',
            ],

        ],

    ],

    'right-and-left' => [
        'title' => 'Oikea ja vasen',
        'text' => 'Oikea ja vasen on kilpailu- ja yhteistyöpeli. Molemmat joukkueet tekevät yhteistyötä luodakseen polun kohti tavoitetta, kun taas samalla he kilpailevat käyttääkseen mahdollisimman monta niille osoitettua laattaa: keltainen joukkue yrittää lisätä mahdollisimman monta käännöstä vasemmalle ja punainen joukkue yrittää lisätä mahdollisimman monta käännöstä oikealle.',
        'questions' => [
            'content' => [
                1 => 'Q1. Jos aloitus ja maali on järjestetty kuten tämän videon ensimmäisessä ottelussa, onko jommankumman joukkueen mahdollista voittaa?',
                2 => 'Q2. Kun aloitus ja maali järjestetään, kuten Annan voittamassa pelissä, onko tasapeli mahdollinen?',
                3 => 'Q3. Onko olemassa aloitus- ja maalijärjestelyjä, jotka suosivat jompaa kumpaa joukkuetta?',
                4 => 'Q4. Ottaen huomioon aloitus- ja maalipaikkojen välimatkan, onko mahdollista ennustaa, mikä on ero voittavan ja häviävän joukkueen välillä?',
            ],

        ],

    ],

    'keep-off-my-path' => [
        'title' => 'Pysy poissa polultani',
        'text' => 'Pysy poissa polultani on kilpailullinen peli, jossa on kaksi joukkuetta. Alkaen pelilaudan vastakkaisista päistä, kaksi joukkuetta rakentavat polkuja, joilla pyritään estämään toista joukkuetta. Se joka onnistuu estämään toista pidentämästä polkuaan, voittaa.',
        'questions' => [
            'content' => [
                1 => '1. Onko olemassa aloituspaikkoja, jotka suosivat jompaa kumpaa joukkuetta?',
                2 => '2. Onko tasapeli mahdollinen?',
                3 => '3. Onko pelaajalla, joka aloittaa, etulyöntiasema?',
                4 => '4. Onko olemassa vedenpitävää pelistrategiaa, jonka ensimmäisen siirron tehnyt pelaaja voi ottaa käyttöönsä varmistaakseen, ettei koskaan häviä.',
            ],

        ],

    ],

    'tug-of-war' => [
        'title' => 'Köydenveto',
        'text' => 'Köydenveto on yhteistyöhön perustuva ja kilpailullinen peli. Kaksi joukkuetta (keltainen ja punainen) työskentelevät yhdessä päästäkseen pelilaudan ylimpiin ruutuihin aloittaen reitin rakentamisen alimmaisten ruutujen keskimmäisestä ruudusta. Keltainen joukkue yrittää päästä vasemmalla puolella oleviin ruutuihin, kun taas punainen joukkue yrittää päästä oikealla puolella oleviin ruutuihin.',
        'questions' => [
            'content' => [
                1 => '1. Onko olemassa strategiaa, joka johtaa aina voittoon?',
                2 => '2. Onko aloittavalla pelaajalla etulyöntiasema?',
                3 => '3. Jos molemmat pelaajat (tai joukkueet) ovat yhtä tarkkaavaisia, loppuuko peli aina tasapeliin, toisin sanoen keskelle?',
            ],

        ],

    ],

    'explorer-without-footprints' => [
        'title' => 'Tutkimusmatkailija ilman jalanjälkiä',
        'text' => 'Tutkimusmatkailija kulkee ympäri pelilautaa aloituspisteestä maaliin yrittäen käydä kaikissa ruuduissa. Tutkimusmatkailijan kulkiessa pelialustalla hän jättää erivärisiä jalanjälkiä, joita seuraamalla ja askelten värejä tulkitsemalla robotti voi kulkea maaliin. Pelistä tulee entistä kiehtovampi, kun tutkimusmatkailija poistaa jalanjäljet ja jättää ruutuihin vain värit.',
        'material' => 'ja punaisia, keltaisia ja harmaita tusseja (tai lyijykyniä)',
        'questions' => [
            'content' => [
                1 => '1. Mitä eroa on pelilaudalla, jolla on värillisiä jalanjälkiä, ja pelilaudalla, jolla on pelkästään värejä ilman jalanjälkiä?',
                2 => '2. Kumpi pelilauta tarjoaa enemmän liikkumisvapautta, jos voimassa ovat samat kääntymissäännöt, jotka perustuvat väreihin?',
                3 => '3. Onko pelilaudalla mahdollisia reittejä, kun käytetään pelkkiä värejä, jotka eivät ole mahdollisia, kun käytetään värillisiä jalanjälkiä?',
                4 => '4. Onko pelilaudalla mahdollisia reittejä, kun käytetään värillisiä jalanjälkiä, jotka eivät ole mahdollisia, kun käytetään pelkkiä värejä?',
            ],

        ],

    ],

    'walk-as-long-as-you-can' => [
        'title' => 'Kulje niin pitkälle kuin pystyt',
        'text' => 'Tässä pelissä tavoitteena on pysyä laudalla mahdollisimman pitkään käyttämällä värejä jalanjälkien sijaan. Peli vaikeutuu, kun liikkumisen vapaus kasvaa',
        'coloured-cards' => 'värikortit tai punaiset, keltaiset ja harmaat merkinnät',
        'questions' => [
            'content' => [
                1 => 'K1. Milloin kaksi reittiä törmää ja estää toistensa etenemisen?',
                2 => 'K2. Tämä peli esitetään kahden pelaajan pelinä. Voiko sitä pelata 3 tai 4 pelaajalla? Pitääkö sääntöjä muuttaa?',
            ],

        ],

    ],

    'ada-charles-roby' => [
        'title' => 'Ada, Charles ja Roby',
        'text' => 'Ada Lovelacen ja Charles Babbagen tarina on mielenkiintoinen. He suunnittelivat ja ohjelmoivat tietokoneita sata vuotta ennen kuin ne todella keksittiin.',
        'material' => 'muovailuvahaa ja lyijykynän pätkä',
        'questions' => [
            'content' => [
                1 => 'K1. Kuvittele, että muovailuvahasta ja lyijykynän pätkästä tekemäsi robotti pystyy liikkumaan laudalla, pääsemään mihin tahansa kohtaan ja tarvittaessa seuraamaan reittiään. Millä ohjeilla ohjelmoisit sen?',
            ],

        ],

    ],

    'cody-and-roby' => [
        'title' => 'Cody ja Roby',
        'text' => 'Tämä on roolipeli, jossa on ohjelmoija Cody ja robotti Roby. Videolla näytetään CodyRoby-kortit, joita tästä lähin käytetään esittämään laudalla tehtävät siirrot. Cody antaa näillä korteilla Robylle ohjeita laudalla liikkumiseen',
        'material' => 'ruudukko, jossa on merkinnät, ohjekortit (vasemmalle, oikealle, suoraan) ja kaikki laudalle asetettavat nappulat',
        'starter-kit' => 'CodyRoby-aloituspaketti',
        'questions' => [
            'content' => [
                1 => 'K1. Minne Roby päätyy, jos se suorittaa videolla nähtyjen ohjeiden viimeisen sarjan alkaen kohdasta C2 etelän suuntaan?',
                2 => 'K2. Voidaanko siirtoja, jotka Roby tekee suorittamalla videolla nähtyjen ohjeiden viimeisen sarjan, kuvata käyttämällä laudalla CodyFeet- tai CodyColor-ohjeita?',
                3 => 'K3. Videolla nähdyt kolmentyyppiset ohjeet, jotka esitetään vihreillä, punaisilla ja keltaisilla korteilla, muodostavat ohjekokonaisuuden, jolla Robya voidaan ohjata minne tahansa laudalla. Pystytkö keksimään ohjekokonaisuuden, jolla sama tehdään vähemmällä kuin kolmella ohjeella?',
            ],

        ],

    ],

    'the-tourist' => [
        'title' => 'Matkailija',
        'text' => 'CodyRoby-korteilla kaksi ryhmää haastaa toisensa löytämään mahdollisimman nopeasti ohjesarjan, joka ohjaa matkailijan monumenteille, joilla tämä haluaa laudalla käydä',
        'material' => 'Lattialla pelatessa suuremmat kortit voivat olla käteviä',
        'questions' => [
            'content' => [
                1 => 'K1. Millä ohjesarjalla matkailija ohjattaisiin videon ensimmäisessä esimerkissä esitettävän Rafaelin patsaan luo?',
                2 => 'K2. Millä ohjesarjalla matkailija ohjattaisiin videon toisessa esimerkissä esitettävän herttuanpalatsin luo?',
                3 => 'K3. Keksisitkö hauskan tavan liikkua aina, kun jompikumpi tiimi valitsee kortin lisättäväksi ohjelmaan? Keksi tapa pohtimalla videolla esitettyä viestikilpailua',
            ],

        ],

    ],

    'material2' => [
        'chequered-with-labels' => 'ruudullinen pelilauta, jonka rivit on merkitty',
        'cards' => '24 ”Mene eteenpäin” korttia, 8 ”Käänny vasemmalle” korttia ja 8 ”Käänny oikealle” korttia',
        'larger-cards' => 'Lattialla pelattavaan versioon suositellaan suurempia kortteja',
        'video' => 'Videolla näytetään, miten peliä voi pelata ilman korttipakkaa',
        'pieces-of-paper' => 'Tarvitaan myös 24 paperipalaa, jotka asetetaan ruuduille, joissa on jo käyty',
        'card-alternative' => 'CodyRoby-korttipakan sijaan voit käyttää korttisymboleja, jotka voi ladata täältä',
        'small-drawings' => 'Lisänä voisi käyttää pieniä piirroksia, jotka auttavat kertomaan tarinaa. Videolla käytetyt kuvat voi ladata täältä',
        'rest-of-cards' => 'Muuten käytämme CodyRobyn, CodyFeetin tai CodyColourin kortteja.',
    ],

    'catch-the-robot' => [
        'title' => 'Nappaa robotti',
        'text' => '”Nappaa robotti” on kilpailullinen pöytä- tai lattiapeli. Voittaja on se pelaaja, joka ottaa vastajoukkueen robotin kiinni menemällä sen ruutuun pelilaudalla. Pelikortteja nostetaan pakasta sokkona, joten molempien joukkueiden on jatkuvasti tarkistettava strategiaansa.',
        'questions' => [
            'content' => [
                1 => 'Q1. Jos vaaleanpunainen pelinappula eli Roby on keskimmäisessä ruudussa C3 kääntyneenä kohti pohjoista, ja vaaleanpunaisella joukkueella on kaksi ”Mene eteenpäin” korttia, kaksi ”Käänny vasemmalle” korttia ja yksi ”Käänny oikealle” kortti, mihin ruutuun Roby voi mennä?',
            ],

        ],

    ],

    'the-snake' => [
        'title' => 'Käärme',
        'text' => '”Käärme” on eräänlainen lautapasianssi, jota pelataan CodyRoby-korteilla. Pelin tavoitteena on ohjata käärme pelilaudan kaikkien ruutujen läpi ilman, että se puree häntäänsä.',
        'questions' => [
            'content' => [
                1 => 'Q1. Onko pelilaudalla lähtöruutuja, joista lähtiessä on mahdotonta käydä kaikissa ruuduissa ilman käärmeen hännän puremista?',
            ],

        ],

    ],

    'storytelling' => [
        'title' => 'Tarinankerrontaa',
        'text' => 'Tänään aiheena on tarinankerronta! Käytä CodyRobyn ohjeita, CodyFeetin jalanjälkiä tai CodyColourin värejä, joilla ohjaat pelinappuloita laudalla kertoaksesi tarinan. Ripottele tarinan osat eri puolille pelilautaa.',
        'questions' => [
            'content' => [
                1 => 'Q1. Mikä välineistä on kaikista monikäyttöisin, kun Robya ohjataan kertomaan tarina?',
                2 => 'Q2. Osaatko järjestää kertomasi tarinan osat pelilaudalla sellaisiin paikkoihin, ettei niitä kaikkia ole mahdollista kerätä, jos käyttää CodyFeetiä?',
            ],

        ],

    ],

    'two-snakes' => [
        'title' => 'Kaksi käärmettä',
        'text' => 'Kahta käärmettä liikutetaan pelilaudalla CodyRoby-korttien avulla, ja tarkoitus on estää vastustajan eteneminen. Periaate on yksinkertainen: ruutuun, jossa jompikumpi käärme on käynyt, ei voi enää mennä. Se käärme voittaa, joka pystyy liikkumaan pisimpään.',
        'material' => 'CodyRoby-kortit, 5 x 5 ¬ruudukollinen pelilauta, kaksi pelinappulaa ja paperinpaloja, joilla merkitään ne ruudut, joissa on jo käyty.',
        'questions' => [
            'content' => [
                1 => 'Kysymys 1: Jos peli alkaa videolla näkyvästä lähtöasetelmasta eivätkä pelaajat voi saada keltaisia kortteja (käännös vasemmalle), mitä kortteja heidän kannattaisi toivoa nostavansa?',
            ],

        ],

    ],

    'round-trip' => [
        'title' => 'Meno-paluumatka',
        'text' => 'Joukkueet vuorottelevat keskenään. Aloittava joukkue suunnittelee menomatkan, ja toisen joukkueen tehtävä on tuoda Robyn takaisin lähtöpisteeseen. Tehtävä on yllättävän vaikea, varsinkin, jos siirrot suunnittelee omassa päässään liikuttamatta Robya.',
        'material' => 'CodyRoby-kortit, 5 x 5 ¬ruudukollinen pelilauta, kaksi pelinappulaa ja paperinpaloja, joilla merkitään ne ruudut, joissa on jo käyty.',
        'questions' => [
            'content' => [
                1 => 'Kysymys 1: Voiko ohjelma, jolla Roby tuodaan takaisin lähtöpisteeseen, olla lyhyempi (eli sisältää vähemmän ohjeita) kuin menomatkan ohjelma?',
            ],

        ],

    ],

    'meeting-point' => [
        'title' => 'Kohtaamispaikka',
        'text' => 'Tällä kertaa siirrot suunnitellaan ennen robotin liikuttamista. Kortteja käyttäen joukkueet asettavat pöydälle ohjeet, joiden mukaisesti robotin on tarkoitus liikkua, mutta robotteja ei liikuteta ennen kuin joku pelaajista sanoo ”hep”. Silloin lopetetaan ohjelmointi ja aletaan liikuttaa robotteja. Pelaaja, joka sanoi ”hep”, voittaa, jos robotit päätyvät samaan ruutuun liikkumalla niille ohjelmoitujen ohjeiden mukaisesti.',
        'material' => 'CodyRoby-kortit, 5 × 5  ruudukollinen pelilauta ja kaksi pelinappulaa.',
        'questions' => [
            'content' => [
                1 => 'Kysymys 1: Jos sinusta on mahdollista, etteivät robotit koskaan kohtaa, keksi pelisäännöt, joissa otetaan huomioon kaikki mahdolliset tilanteet.',
            ],

        ],

    ],

    'follow-the-music' => [
        'title' => 'Seuraa säveltä',
        'text' => 'Kun ohjelman sisältämät ohjeet toistuvat samanlaisina tietyissä jaksoissa, niillä on eräänlainen rytmi. Jos yhdistämme ohjeisiin eri äänet, voimme ohjata Robya sävelin. Siitä tässä pelissä on kyse. Kirjoitan ohjelman käyttäen ääniä, jotka edustavat eri ohjeita, ja sinä liikutat Robya pelilaudalla näitä ohjeita kuunnellen.',
        'material' => 'CodyRoby-korttien, pelilaudan ja pelinappulan lisäksi tarvitaan jokin keino tuottaa kolme erilaista ääntä. Minä käytin kolmea lasia, joissa on eri määrä vettä, mutta sinä voit keksiä jonkin muun äänenlähteen.',
        'questions' => [
            'content' => [
                1 => 'Kysymys 1: Yritä seurata videolla kuulemiasi ohjeita, jotka annetaan vesilasien helähdyksinä, ilman, että katsot kortteja. Tunnistatko äänten avulla annetut ohjeet ja pystytkö seuraamaan niitä?',
                2 => 'Kysymys 2: Valitse kolme eri ääntä, jotka yhdistät perusohjeisiin. Keksi sellainen ohjeyhdistelmä, jota voisit äänten avulla toistaa loputtomiin ilman, että Roby joutuisi ulos pelilaudalta.',
            ],

        ],

    ],

    'colour-everything' => [
        'title' => 'Väritä koko kuvio',
        'text' => 'Voiko robotin ohjelmoida liikkumaan alustalla niin, että sen jäljet tekevät piirroksen? Tässä tehtävässä tehdään taidetta koodaamalla "pikseleitä". Tavoitteena on värittää alustan ruutuja niin, että ne muodostavat kuvan kuten pikselit näyttöruudulla.',
        'material' => 'CodyRoby-kortit, ruudullinen alusta ja pelinappula. Merkitse värilliset ruudut joko paperinpaloilla tai tussivärillä.',
        'questions' => [
            'content' => [
                1 => 'Onko mahdollista ohjelmoida robotti liikkumaan alustalla ruudusta toiseen niin, että se piirtää videon loppuosassa näkyvät kaksi sydäntä käymättä yhdessäkään ruudussa kahta kertaa?',
            ],

        ],

    ],

    'codyplotter-and-codyprinter' => [
        'title' => 'CodyPlotter ja CodyPrinter',
        'text' => 'Mikä ero on plotterilla ja printterillä? Saat vastauksen, kun teet tämän koodausharjoituksen (tietokonetta ei tarvita).',
        'material' => 'CodyRoby-tarvikkeiden lisäksi käytin vihreää tussia ja muovailuvaharobottia, mutta ne eivät ole välttämättömiä.',
        'questions' => [
            'content' => [
                1 => 'Osaatko selittää, mikä ero on plotterilla ja printterillä?',
                2 => 'Minkä kuvion RobyPrinter piirtäisi alustalle, jos se suorittaisi videon lopussa luetun komentosarjan?',
            ],

        ],

    ],

    'boring-pixels' => [
        'title' => '"Tylsät pikselisarjat" – Numeroiden käyttö koodauksessa',
        'text' => 'Kun robotti ohjelmoidaan piirtämään kuva niin, että se värittää ruutuja ("pikseleitä"), ja kun peräkkäin on useita samanvärisiä ruutuja, voidaan käyttää numeroita. Niin tietokoneetkin tekevät.',
        'material' => 'ruutupaperilehtiö tai paperille piirretty ruudukko (5 × 5), huopakynä. Kirjoita piirrosta kuvaava koodi kynällä paperille.',
        'questions' => [
            'content' => [
                1 => 'Yritä tuottaa ruutukuvio ja koodaa se käyttämällä jakson pituuden koodausta (RLE). Ruutujen määrä ilmaisee kuvan koon, mutta kuinka pitkä koodijonosta tulee, kun käytetään jakson pituuden koodausta?',
            ],

        ],

    ],

    'turning-code-into-pictures' => [
        'title' => 'Koodista kuvaksi',
        'text' => [
            1 => 'Olemme nyt nähneet, miten kirjoitetaan koodi kuvan piirtämistä varten. Ajattelin tiettyä kuviota ja esitin sen kirjain- ja numerokoodina, jonka kerroin teille. Kirjoita kirjaimet ja numerot muistiin, ja piirrä kuvio koodin mukaisesti.',
            2 => 'Mielessäni oli tämä kuvio. Piirrä se koodin mukaisesti lehtiöösi.',
        ],
        'material' => 'paperia (mielellään ruutupaperia) ja kynä.',
        'questions' => [
            'content' => [
                1 => 'Yritä piirtää kuvat purkamalla koodi, jonka luen videon lopussa.',
            ],

        ],

    ],

    'texts' => [
        1 => '"Coding@Home" sisältää lyhyitä videoita, joissa on tee-se-itse-materiaalia, pulmapelejä, arvoituksia, kiinnostavia pelejä ja koodaushaasteita jokapäiväiseen käyttöön perheen parissa tai koulussa. Et tarvitse aikaisempaa tietoa ohjelmoinnista etkä elektronisia laitteita harjoitusten tekemiseen. Harjoitukset stimuloivat laskennallista ajattelua ja kasvattavat oppilaiden, vanhempien ja opettajien taitoja kotona tai koulussa.',
        2 => 'Euroopan Unionin koodausviikon Coding@Home-sarja perustuu Urbinon yliopiston ja CodeMOOCnet-yhdistyksen <a href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> -aloitteeseen yhteistyössä Rai Culturan kanssa. Tehtäviä vetää Alessandro Bogliolo, joka on tietokonejärjestelmien opettaja Urbinon yliopistossa, <a href="/ambassadors?country_iso=IT" target="_blank">Italian EU-koodiviikon lähettiläs</a> ja kaikkien lähettiläiden koordinaattori sekä Digital Skills and Jobs -koalition hallintoneuvoston jäsen. ',
       3 => 'Jos olet kiinnostunut enemmän irrallisista aktiviteeteista tai erilaisista ohjelmoinnista, kuten kielistä, robotiikasta tai micro:bitistä, tutustu <a href="/training"> EU:n koodausviikon "Learning Bits"</a> -ohjelmaan,  jossa on video-opetusohjelmia ja tuntisuunnitelmia peruskouluille, yläkouluille ja lukioille. Tutustu myös EU:n koodausviikon Learn&Teach -resursseihin, joista löydät ilmaisia ja laadukkaita resursseja eri puolilta maailmaa opettajille ja opiskelijoille.',
    ],

    'coding-at-home-text' => 'Kokoelma lyhyitä videoita, tee-se-itse-materiaaleja, palapelejä, pelejä ja koodaushaasteita jokapäiväiseen käyttöön niin perheessä kuin koulussakin.',
    'coding-at-home-sub-text1' => 'EU:n koodausviikon Coding@Home-sarja perustuu  Urbinon yliopiston ja CodeMOOCnet-yhdistyksen <a class="text-dark-blue underline" href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">"Coding in famiglia"</a> -aloitteeseen yhteistyössä Rai Culturan kanssa. Coding@Home videon kirjoittaja on Alessandro Bogliolo, Urbinon yliopiston tietojenkäsittelyjärjestelmien professori, <a class="text-dark-blue underline" href="https://codeweek.eu/ambassadors?country_iso=IT" target="_blank">italialainen EU:n koodausviikon lähettiläs</a>ja kaikkien lähettiläiden koordinaattori sekä Digital Skills and Jobs Coalitionin hallintoneuvoston jäsen.',
    'coding-at-home-sub-text2' => 'Et tarvitse aiempaa tietoa tai elektronisia laitteita tehtävien suorittamiseen. Toiminta stimuloi laskennallista ajattelua ja kehittää oppilaiden, vanhempien ja opettajien taitoja kotona tai koulussa.',
];
