@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Code Week 4 All-utmaningen</h1><span></span></div>

                    <hr>

                    <p>Code Week 4 All-utmaningen &auml;r en uppmaning till dig att koppla samman dina aktiviteter med andra aktiviteter som arrangeras av dina v&auml;nner, kollegor och bekanta s&aring; att ni alla kan f&aring; ett Code Week Certificate of Excellence.</p>


                    <simple-question :visible="true">
                        <template slot="title">Vad g&aring;r det ut p&aring;?</template>
                        <template slot="content">
                            <p>N&auml;r du l&auml;gger till din aktivitet p&aring; Code Week-kartan kan du ocks&aring; engagera andra i ditt n&auml;tverk att g&ouml;ra samma sak. Om du och din grupp uppn&aring;r en av f&ouml;ljande tr&ouml;sklar kommer ni alla att f&aring; ett Code Week Certificate of Excellence!</p>
                            <p>Kriterier f&ouml;r att f&aring; ett Certificate of Excellence:</p>
                            <ul>
                                <li><strong>500 deltagande elever</strong></li>och/eller<li><strong>10 sammankopplade aktiviteter</strong></li>och/eller<li><strong>3 inblandade l&auml;nder</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">G&ouml;r s&aring; h&auml;r f&ouml;r att delta:</template>
                        <template slot="content">
                            <ol>
                                <li>Bes&ouml;k sidan <a href="/add">L&auml;gg till aktivitet</a> och fyll i n&ouml;dv&auml;ndig information om din kodningsaktivitet.</li>
                            </ol><i>Om du &auml;r f&ouml;rst i gruppen:</i><ol start="2">
                                <li>Klicka p&aring; Skicka in.</li>
                                <li>N&auml;r aktiviteten har godk&auml;nts kommer du att f&aring; ett bekr&auml;ftelsemejl med din unika Code Week 4 All-kod.</li>
                                <li>Kopiera koden och dela den med dina kollegor och andra i ditt n&auml;tverk som ocks&aring; organiserar en kodningsaktivitet. Ber&auml;tta f&ouml;r andra och uppmana dem att ocks&aring; delta!</li>
                                <li>Efter kampanjens slut kommer alla aktivitetsarrang&ouml;rer att f&aring; rapportera om hur m&aring;nga deltagare de lyckades involvera. Om ni uppn&aring;dde tr&ouml;skeln f&aring;r du och dina kollegor som ingick i ditt n&auml;tverk ett Certificate of Excellence!</li>
                            </ol><i>Om du g&aring;r med i en befintlig grupp:</i><ol start="2">
                                <li>Skriv in l&ouml;senordet du fick fr&aring;n initiativtagaren, allts&aring; den som startade gruppen, i f&auml;ltet CODE WEEK 4 ALL CODE.</li>
                                <li>Klicka p&aring; Skicka in.</li>
                                <li>Ber&auml;tta f&ouml;r andra (och meddela koden!) f&ouml;r att f&aring; fler arrang&ouml;rer att g&aring; med i din grupp.</li>
                                <li>Efter kampanjens slut kommer alla aktivitetsarrang&ouml;rer att f&aring; rapportera om hur m&aring;nga deltagare de lyckades involvera. Om ni uppn&aring;dde tr&ouml;skeln f&aring;r du och dina kollegor som ingick i ditt n&auml;tverk ett Certificate of Excellence!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Varf&ouml;r delta i det h&auml;r?</template>
                        <template slot="content">
                            <ul>
                                <li>F&ouml;r att ber&auml;tta f&ouml;r andra om vikten av kodning.</li>
                                <li>F&ouml;r att f&aring; m&aring;nga elever att engagera sig.</li>
                                <li>F&ouml;r att skapa f&ouml;rbindelser mellan organisationer och/eller skolor i ditt samh&auml;lle eller internationellt.</li>
                                <li>F&ouml;r att f&aring; st&ouml;d fr&aring;n andra arrang&ouml;rer och l&auml;rare.</li>
                                <li>F&ouml;r att f&aring; ett <strong>Certificate of Excellence</strong>.</li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection