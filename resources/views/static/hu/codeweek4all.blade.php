@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Code Week 4 All (Programoz&aacute;si h&eacute;t mindenkinek) kih&iacute;v&aacute;s</h1><span></span></div>

                    <hr>

                    <p>A Code Week 4 All kih&iacute;v&aacute;s arra b&aacute;tor&iacute;tja &Ouml;nt, hogy kapcsolja &ouml;ssze tev&eacute;kenys&eacute;geit bar&aacute;tok, koll&eacute;g&aacute;k &eacute;s ismerős&ouml;k &aacute;ltal szervezett egy&eacute;b tev&eacute;kenys&eacute;gekkel, &eacute;s egy&uuml;tt nyerj&eacute;k el a programoz&aacute;si h&eacute;t Kiv&aacute;l&oacute;s&aacute;gi tan&uacute;s&iacute;tv&aacute;ny&aacute;t.</p>


                    <simple-question :visible="true">
                        <template slot="title">Mi is ez?</template>
                        <template slot="content">
                            <p>Azon t&uacute;lmenően, hogy felteszi tev&eacute;kenys&eacute;g&eacute;t az eur&oacute;pai programoz&aacute;si h&eacute;t t&eacute;rk&eacute;p&eacute;re, m&aacute;sokat is felk&eacute;rhet saj&aacute;t h&aacute;l&oacute;zat&aacute;ban arra, hogy hasonl&oacute;an cselekedjenek. Azzal, ha &Ouml;n &eacute;s t&aacute;rsai el&eacute;rik az al&aacute;bbi k&uuml;sz&ouml;b&eacute;rt&eacute;kek egyik&eacute;t, m&aacute;r meg is szerezt&eacute;k a programoz&aacute;si h&eacute;t Kiv&aacute;l&oacute;s&aacute;gi tan&uacute;s&iacute;tv&aacute;ny&aacute;t!</p>
                            <p>A Kiv&aacute;l&oacute;s&aacute;gi tan&uacute;s&iacute;tv&aacute;ny elnyer&eacute;s&eacute;nek felt&eacute;telei a k&ouml;vetkezők:</p>
                            <ul>
                                <li><strong>500 di&aacute;k r&eacute;szv&eacute;tele</strong></li>&Eacute;s / Vagy<li><strong>10 &ouml;sszekapcsolt tev&eacute;kenys&eacute;g</strong></li>&Eacute;s / Vagy<li><strong>3 orsz&aacute;g r&eacute;szv&eacute;tele</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Hogyan lehet r&eacute;szt venni?</template>
                        <template slot="content">
                            <ol>
                                <li>L&aacute;togasson el a <a href="/add">Tev&eacute;kenys&eacute;g hozz&aacute;ad&aacute;sa</a> oldalra &eacute;s adja meg a programoz&aacute;si tev&eacute;kenys&eacute;g&eacute;vel kapcsolatos sz&uuml;ks&eacute;ges r&eacute;szleteket.</li>
                            </ol><i>Ha sz&ouml;vets&eacute;g&eacute;ben &Ouml;n az első:</i><ol start="2">
                                <li>Kattintson a K&uuml;ld&eacute;s gombra.</li>
                                <li>Amint tev&eacute;kenys&eacute;g&eacute;t elfogadt&aacute;k, egy visszaigazol&oacute; e-mailt fog kapni saj&aacute;t egyedi Code Week 4 All k&oacute;dj&aacute;val.</li>
                                <li>M&aacute;solja le a k&oacute;dot &eacute;s ossza meg koll&eacute;g&aacute;ival, illetve a h&aacute;l&oacute;zat&aacute;ban tal&aacute;lhat&oacute; m&aacute;s olyan emberekkel is, akik szint&eacute;n programoz&aacute;si tev&eacute;kenys&eacute;get szerveznek. Terjessze a h&iacute;rt, hogy m&aacute;sok is csatlakozzanak!</li>
                                <li>A kamp&aacute;ny befejeződ&eacute;s&eacute;t k&ouml;vetően az &ouml;sszes tev&eacute;kenys&eacute;gszervezőt arra k&eacute;rj&uuml;k majd, hogy sz&aacute;moljon be az &aacute;ltala bevont r&eacute;sztvevők sz&aacute;m&aacute;r&oacute;l. Ha sikeresen el&eacute;rt&eacute;k a k&uuml;sz&ouml;b&eacute;rt&eacute;ket, akkor &Ouml;n &eacute;s a saj&aacute;t h&aacute;l&oacute;zat&aacute;ban l&eacute;vő koll&eacute;g&aacute;i elnyerik a Kiv&aacute;l&oacute;s&aacute;gi tan&uacute;s&iacute;tv&aacute;nyt!</li>
                            </ol><i>Ha egy m&aacute;r megl&eacute;vő sz&ouml;vets&eacute;ghez csatlakozik:</i><ol start="2">
                                <li>Illessze be a sz&ouml;vets&eacute;get l&eacute;trehoz&oacute; kezdem&eacute;nyezőtől kapott k&oacute;dot a CODE WEEK 4 ALL CODE mező cell&aacute;ba.</li>
                                <li>Kattintson a K&uuml;ld&eacute;s gombra</li>
                                <li>Terjessze a h&iacute;rt (&eacute;s a k&oacute;dot), hogy m&eacute;g t&ouml;bb szervező csatlakozzon sz&ouml;vets&eacute;g&eacute;hez.</li>
                                <li>A kamp&aacute;ny befejeződ&eacute;s&eacute;t k&ouml;vetően az &ouml;sszes tev&eacute;kenys&eacute;gszervezőt arra k&eacute;rj&uuml;k majd, hogy sz&aacute;moljon be az &aacute;ltala bevont r&eacute;sztvevők sz&aacute;m&aacute;r&oacute;l. Ha sikeresen el&eacute;rt&eacute;k a k&uuml;sz&ouml;b&eacute;rt&eacute;ket, akkor &Ouml;n &eacute;s a saj&aacute;t h&aacute;l&oacute;zat&aacute;ban l&eacute;vő koll&eacute;g&aacute;i elnyerik a Kiv&aacute;l&oacute;s&aacute;gi tan&uacute;s&iacute;tv&aacute;nyt!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Mi&eacute;rt &eacute;rdemes csatlakozni a kih&iacute;v&aacute;shoz?</template>
                        <template slot="content">
                            <ul>
                                <li>Az&eacute;rt, hogy terjessze az &uuml;zenetet a programoz&aacute;s fontoss&aacute;g&aacute;r&oacute;l.</li>
                                <li>Az&eacute;rt, hogy sok tanul&oacute; bekapcsol&oacute;d&aacute;s&aacute;t l&aacute;thassa.</li>
                                <li>Az&eacute;rt, hogy kapcsolatokat &eacute;p&iacute;tsen ki szervezetekkel &eacute;s/vagy iskol&aacute;kkal saj&aacute;t k&ouml;z&ouml;ss&eacute;g&eacute;ben vagy nemzetk&ouml;zi szinten.</li>
                                <li>Az&eacute;rt, hogy t&aacute;mogat&aacute;sra tal&aacute;ljon m&aacute;s szervezők &eacute;s tan&aacute;rok r&eacute;sz&eacute;ről.</li>
                                <li>Az&eacute;rt, hogy megszerezze a <strong>Kiv&aacute;l&oacute;s&aacute;gi tan&uacute;s&iacute;tv&aacute;nyt.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection