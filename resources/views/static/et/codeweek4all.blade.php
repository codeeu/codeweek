@extends('layout.base') @section('content')
    <section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>V&auml;ljakutse Code Week 4 Allf</h1><span></span></div>

                    <hr>

                    <p>V&auml;ljakutse Code Week 4 All julgustab siduma enda ja s&otilde;prade, t&ouml;&ouml;kaaslaste
                        ja tuttavate tegevused, et saada koos tunnistus eeskujuliku t&ouml;&ouml; eest programmeerimisn&auml;dalal
                        Code Week.</p>


                    <simple-question :visible="true">
                        <template slot="title">Mis see on?</template>
                        <template slot="content">
                            <p>Peale oma tegevuse lisamise ELi programmeerimisn&auml;dala Code Week kaardile saate sama
                                soovitada teistele oma v&otilde;rgustikus. Kui j&otilde;uate oma kogukonnaga &uuml;heni
                                j&auml;rgmistest l&auml;venditest, saate k&otilde;ik tunnistuse eeskujuliku t&ouml;&ouml;
                                eest programmeerimisn&auml;dalal Code Week!</p>
                            <p>N&otilde;uded tunnistuse saamiseks</p>
                            <ul>
                                <li><strong>Osales 500 &otilde;pilast</strong></li>
                                ja/v&otilde;i
                                <li><strong>seotud on 10 tegevust</strong></li>
                                ja/v&otilde;i
                                <li><strong>h&otilde;lmatud kolm riiki</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kuidas osaleda?</template>
                        <template slot="content">
                            <ol>
                                <li>K&uuml;lastage lehek&uuml;lge <a href="/add">Lisa tegevus</a> ja sisestage vajalikud
                                    andmed oma programmeerimistegevuse kohta.
                                </li>
                            </ol>
                            <i>Kui olete esimene oma kogukonnast:</i>
                            <ol start="2">
                                <li>kl&otilde;psake Esita.</li>
                                <li>P&auml;rast teie tegevuse vastuv&otilde;tmist saate kinnitusmeili oma kordumatu Code
                                    Week 4 All koodiga.
                                </li>
                                <li>Kopeerige see kood ning jagage t&ouml;&ouml;kaaslaste ja teiste oma v&otilde;rgustiku
                                    liikmetega, kes korraldavad samuti programmeerimistegevusi. Jagage teistega, et
                                    julgustada neid osalema!
                                </li>
                                <li>Kampaania l&otilde;pus palutakse k&otilde;igil tegevuste korraldajatel teatada, kui
                                    palju oli neil osalejaid. Kui suutsite l&auml;vendi edukalt &uuml;letada, saate teie
                                    ja teie v&otilde;rgustikku kuulunud t&ouml;&ouml;kaaslased tunnistuse eeskujuliku t&ouml;&ouml;
                                    eest!
                                </li>
                            </ol>
                            <i>Kui liitute olemasoleva kogukonnaga:</i>
                            <ol start="2">
                                <li>kopeerige kogukonna algselt loojalt saadud kood v&auml;ljale &bdquo;CODE WEEK 4 ALL
                                    KOOD&ldquo;.
                                </li>
                                <li>Kl&otilde;psake Esita.</li>
                                <li>Teatage teistele ja jagage neile koodi, et kutsuda veel korraldajaid oma kogukonnaga
                                    liituma.
                                </li>
                                <li>Kampaania l&otilde;pus palutakse k&otilde;igil tegevuste korraldajatel teatada, kui
                                    palju oli neil osalejaid. Kui suutsite l&auml;vendi edukalt &uuml;letada, saate teie
                                    ja teie v&otilde;rgustikku kuulunud t&ouml;&ouml;kaaslased tunnistuse eeskujuliku t&ouml;&ouml;
                                    eest!
                                </li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Miks v&auml;ljakutsega liituda?</template>
                        <template slot="content">
                            <ul>
                                <li>Et levitada s&otilde;numit programmeerimise t&auml;htsusest.</li>
                                <li>Et kaasata palju &otilde;pilasi.</li>
                                <li>Et luua kontakte organisatsioonide ja/v&otilde;i koolidega oma kogukonnas v&otilde;i
                                    rahvusvaheliselt.
                                </li>
                                <li>Et saada teistelt korraldajatelt ja &otilde;petajatelt tuge.</li>
                                <li>Et saada <strong>tunnistus eeskujuliku t&ouml;&ouml; eest.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>

@endsection

@section("extra-css")
    <style> .tab {
            position: relative;
            margin-bottom: 1px;
            width: 100%;
            color: #232323;
            overflow: hidden;
        }

        .answer {
            padding: 20px;
            background-color: #f1f1f1;
        }

        .question {
            position: relative;
            display: block;
            width: 100%;
            padding: 0 0 0 1em;
            background: #2980b9;
            font-weight: bold;
            line-height: 3;
            cursor: pointer;
            color: #fff;
            text-align: center;
            font-size: 2rem;
        }

        .chevron {
            display: block;
            margin-top: -23px;
            padding: 10px;
        }

        ul, ol {
            margin-left: 1em;
        } </style>

@endsection