@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Izziv tedna programiranja za vse</h1><span></span></div>

                    <hr>

                    <p>Izziv tedna programiranja za vse je povezati svoje dejavnosti z drugimi dejavnostmi, ki jih organizirajo prijatelji, kolegi in znanci, in skupaj pridobiti certifikat odličnosti tedna programiranja.</p>


                    <simple-question :visible="true">
                        <template slot="title">Za kaj gre?</template>
                        <template slot="content">
                            <p>Svojo dejavnost dodajte na zemljevid evropskega tedna programiranja, prav tako pa lahko spodbudite druge v svoji mreži, da storijo enako. Če vi in va&scaron;i zavezniki dosežete enega od naslednjih pragov, boste vsi pridobili certifikat odličnosti tedna programiranja!</p>
                            <p>Merila za pridobitev certifikata odličnosti:</p>
                            <ul>
                                <li><strong>500&nbsp;sodelujočih &scaron;tudentov</strong></li>in/ali<li><strong>10&nbsp;povezanih dejavnosti</strong></li>in/ali<li><strong>vključene 3&nbsp;države</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kako sodelovati?</template>
                        <template slot="content">
                            <ol>
                                <li>Obi&scaron;čite stran <a href="/add">Dodajte dejavnost</a> in vnesite potrebne podatke o svoji programerski dejavnosti.</li>
                            </ol><i>Če ste prvi v svojem zavezni&scaron;tvu:</i><ol start="2">
                                <li>kliknite Po&scaron;lji</li>
                                <li>Ko bo va&scaron;a dejavnost sprejeta, boste prejeli potrditveno elektronsko po&scaron;to z enolično kodo za teden programiranja za vse.</li>
                                <li>Kodo kopirajte in jo po&scaron;ljite svojim kolegom ter drugim v va&scaron;i mreži, ki prav tako organizirajo programersko dejavnost. Obve&scaron;čajte druge in jih spodbudite k sodelovanju!</li>
                                <li>Po koncu kampanje bodo vsi organizatorji dejavnosti sporočili, koliko udeležencev so vključili. Če ste dosegli prag, boste vi in va&scaron;i kolegi, ki so bili del va&scaron;e mreže, prejeli certifikat odličnosti!</li>
                            </ol><i>Če se pridružite obstoječemu zavezni&scaron;tvu:</i><ol start="2">
                                <li>Kodo, ki ste jo prejeli od pobudnika, tj. prvega, ki je ustvaril zavezni&scaron;tvo, prilepite v polje KODA TEDNA PROGRAMIRANJA ZA VSE.</li>
                                <li>Kliknite Po&scaron;lji.</li>
                                <li>Obve&scaron;čajte (in delite kodo!), da pridobite več organizatorjev, ki se bodo pridružili va&scaron;emu zavezni&scaron;tvu</li>
                                <li>Po koncu kampanje bodo vsi organizatorji dejavnosti sporočili, koliko udeležencev so vključili. Če ste dosegli prag, boste vi in va&scaron;i kolegi, ki so bili del va&scaron;e mreže, prejeli certifikat odličnosti!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Zakaj se pridružiti izzivu?</template>
                        <template slot="content">
                            <ul>
                                <li>Da &scaron;irite glas o pomembnosti programiranja.</li>
                                <li>Da vključite veliko &scaron;tevilo &scaron;tudentov.</li>
                                <li>Da se povežete z organizacijami in/ali &scaron;olami v svoji skupnosti ali mednarodno.</li>
                                <li>Da vas podprejo drugi organizatorji in učitelji.</li>
                                <li>Da pridobite <strong>certifikat odličnosti.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection