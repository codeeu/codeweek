@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Izazov Code Week 4 All challenge</h1><span></span></div>

                    <hr>

                    <p>Izazov Code Week 4 All challenge potiče vas da svoje aktivnosti povezujete s drugim aktivnostima koje organiziraju va&scaron;i prijatelji, kolege i poznanici te da zajedno osvojite Potvrdu o izvrsnosti Tjedna programiranja.</p>


                    <simple-question :visible="true">
                        <template slot="title">O čemu je riječ?</template>
                        <template slot="content">
                            <p>Usto &scaron;to predajete svoju aktivnost za kartu Europskog tjedna programiranja, također možete potaknuti druge u svojoj mreži da učine to isto. Ako vi i va&scaron; saveznik dosegnete jedan od sljedećih pragova, zaradit ćete Potvrdu o izvrsnosti Tjedna programiranja!</p>
                            <p>Kriteriji za dobivanje Potvrde o izvrsnosti:</p>
                            <ul>
                                <li><strong>sudjelovalo je 500 učenika</strong></li>i/ili<li><strong>povezano je 10 aktivnosti</strong></li>i/ili<li><strong>uključene su tri zemlje</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kako sudjelovati?</template>
                        <template slot="content">
                            <ol>
                                <li>Posjetite stranicu <a href="/add">Dodaj događanje</a> i unesite potrebne pojedinosti o va&scaron;oj aktivnosti programiranja.</li>
                            </ol><i>Ako ste prvi u svojem savezu:</i><ol start="2">
                                <li>Kliknite na Predaj</li>
                                <li>Nakon &scaron;to aktivnost bude prihvaćena, dobit ćete poruku e-po&scaron;te s potvrdom u kojoj će biti naveden va&scaron; jedinstven k&ocirc;d Code Week 4 all.</li>
                                <li>Kopirajte k&ocirc;d i podijelite ga sa svojim kolegama i ostalima u svojoj mreži koji također organiziraju događanje programiranja. Pro&scaron;irite glas i potaknite druge da sudjeluju!</li>
                                <li>Nakon &scaron;to kampanja zavr&scaron;i, svi organizatori događanja morat će izvijestiti o broju uključenih sudionika. Ako ste uspje&scaron;no dostigli prag, vi i va&scaron;e kolege koji su bili dijelom va&scaron;e mreže primit ćete Potvrdu o izvrsnosti!</li>
                            </ol><i>Ako se pridružujete postojećem savezu:</i><ol start="2">
                                <li>Zalijepite zaporku koju ste dobili od pokretača, prve osobe koja je izgradila savez, u ćeliju polja CODE WEEK 4 ALL CODE.</li>
                                <li>Kliknite na Predaj.</li>
                                <li>Pro&scaron;irite glas (i k&ocirc;d) da bi se vi&scaron;e organizatora pridružilo va&scaron;em savezu</li>
                                <li>Nakon &scaron;to kampanja zavr&scaron;i, svi organizatori događanja morat će izvijestiti o broju uključenih sudionika. Ako ste uspje&scaron;no dostigli prag, vi i va&scaron;e kolege koji su bili dijelom va&scaron;e mreže primit ćete Potvrdu o izvrsnosti!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Za&scaron;to se pridružiti izazovu?</template>
                        <template slot="content">
                            <ul>
                                <li>Da biste pro&scaron;irili poruku o važnosti programiranja.</li>
                                <li>Da biste uključili velik broj učenika.</li>
                                <li>Da biste izgradili veze s organizacijama i/ili &scaron;kolama u svojoj zajednici ili međunarodno.</li>
                                <li>Da biste prona&scaron;li podr&scaron;ku drugih organizatora i nastavnika.</li>
                                <li>Da biste dobili <strong>Potvrdu o izvrsnosti.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection