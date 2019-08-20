@extends('layout.base') @section('content')
    <section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>V&yacute;zva Code Week 4 All (T&yacute;ždeň programovania pre v&scaron;etk&yacute;ch)</h1>
                        <span></span></div>

                    <hr>

                    <p>V&yacute;zva Code Week 4 All v&aacute;s chce motivovať na to, aby ste svoje aktivity prepojili s&nbsp;aktivitami,
                        ktor&eacute; organizuj&uacute; va&scaron;i kamar&aacute;ti, kolegovia či zn&aacute;mi, a&nbsp;takto
                        spoločne z&iacute;skali certifik&aacute;t excelentnosti.</p>


                    <simple-question :visible="true">
                        <template slot="title">O&nbsp;čo ide?</template>
                        <template slot="content">
                            <p>Okrem toho, že prid&aacute;te svoju aktivitu na mapu Eur&oacute;pskeho t&yacute;ždňa
                                programovania, m&ocirc;žete povzbudiť ľud&iacute;, ktor&iacute; s&uacute; s&uacute;časťou
                                va&scaron;ej siete, aby pridali svoju aktivitu. Pokiaľ so svojou skupinou dosiahnete
                                jedno z&nbsp;uveden&yacute;ch krit&eacute;ri&iacute;, v&scaron;etci z&iacute;skate od t&yacute;ždňa
                                programovania certifik&aacute;t excelentnosti.</p>
                            <p>Krit&eacute;ri&aacute; na z&iacute;skanie certifik&aacute;tu excelentnosti:</p>
                            <ul>
                                <li><strong>500 zapojen&yacute;ch &scaron;tudentov</strong></li>
                                a/alebo
                                <li><strong>10 prepojen&yacute;ch aktiv&iacute;t</strong></li>
                                a/alebo
                                <li><strong>3 zapojen&eacute; krajiny</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Ako sa zapojiť?</template>
                        <template slot="content">
                            <ol>
                                <li>Otvorte si str&aacute;nku <a href="/add">Pridať podujatie</a> a&nbsp;vyplňte potrebn&eacute;
                                    &uacute;daje o&nbsp;svojej programovacej aktivite.
                                </li>
                            </ol>
                            <i>Ak ste prv&yacute; spomedzi členov skupiny:</i>
                            <ol start="2">
                                <li>Kliknite na Odoslať</li>
                                <li>Po prijat&iacute; danej aktivity v&aacute;m po&scaron;leme potvrdzuj&uacute;ci
                                    e-mail s&nbsp;jedinečn&yacute;m k&oacute;dom Code Week 4 All.
                                </li>
                                <li>Skop&iacute;rujte tento k&oacute;d a&nbsp;po&scaron;lite ho kolegom a&nbsp;ďal&scaron;&iacute;m,
                                    ktor&iacute; s&uacute; s&uacute;časťou siete, ak aj oni organizuj&uacute; aktivitu t&yacute;kaj&uacute;cu
                                    sa programovania. Hovorte o&nbsp;tom, aby ste motivovali na &uacute;časť aj ďal&scaron;&iacute;ch!
                                </li>
                                <li>Po skončen&iacute; kampane vyzveme v&scaron;etk&yacute;ch organiz&aacute;torov aktiv&iacute;t,
                                    aby n&aacute;m nahl&aacute;sili počet zaangažovan&yacute;ch &uacute;častn&iacute;kov.
                                    Ak ste splnili stanoven&eacute; krit&eacute;ri&aacute;, spolu so svojimi kolegami,
                                    ktor&iacute; boli s&uacute;časťou siete, z&iacute;skate certifik&aacute;t
                                    excelentnosti.
                                </li>
                            </ol>
                            <i>Ak sa zap&aacute;jate do existuj&uacute;cej skupiny:</i>
                            <ol start="2">
                                <li>Vložte heslo z&iacute;skan&eacute; od inici&aacute;tora &ndash; človeka, ktor&yacute;
                                    začal vytv&aacute;rať skupinu &ndash;, do poľa k&oacute;du CODE WEEK 4 ALL CODE.
                                </li>
                                <li>Kliknite na Odoslať</li>
                                <li>Hovorte o&nbsp;tom (a&nbsp;&scaron;&iacute;rte k&oacute;d), aby sa do va&scaron;ej
                                    skupiny zapojili ďal&scaron;&iacute; organiz&aacute;tori
                                </li>
                                <li>Po skončen&iacute; kampane vyzveme v&scaron;etk&yacute;ch organiz&aacute;torov aktiv&iacute;t,
                                    aby n&aacute;m nahl&aacute;sili počet zaangažovan&yacute;ch &uacute;častn&iacute;kov.
                                    Ak ste splnili stanoven&eacute; krit&eacute;ri&aacute;, spolu so svojimi kolegami,
                                    ktor&iacute; boli s&uacute;časťou siete, z&iacute;skate certifik&aacute;t
                                    excelentnosti.
                                </li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">A&nbsp;prečo sa zapojiť do v&yacute;zvy?</template>
                        <template slot="content">
                            <ul>
                                <li>&Scaron;&iacute;renie inform&aacute;ci&iacute; o&nbsp;v&yacute;zname
                                    programovania.
                                </li>
                                <li>Dosiahnutie zv&yacute;&scaron;enia počtu zapojen&yacute;ch &scaron;tudentov.</li>
                                <li>Nadv&auml;zovanie vzťahov s&nbsp;organiz&aacute;ciami a/alebo so &scaron;kolami v&nbsp;r&aacute;mci
                                    komunity alebo na medzin&aacute;rodnej &uacute;rovni.
                                </li>
                                <li>Z&iacute;skanie podpory od in&yacute;ch organiz&aacute;torov a&nbsp;učiteľov.</li>
                                <li>Z&iacute;skanie <strong>certifik&aacute;tu excelentnosti.</strong></li>
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