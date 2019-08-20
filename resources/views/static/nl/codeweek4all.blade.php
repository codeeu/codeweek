@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Code Week 4 All-uitdaging</h1><span></span></div>

                    <hr>

                    <p>De Code Week 4 All-uitdaging moedigt je aan je activiteiten te koppelen met die van je vrienden, collega's en bekenden om samen het Certificaat van uitmuntendheid van de Programmeerweek te behalen.</p>


                    <simple-question :visible="true">
                        <template slot="title">Wat is dat?</template>
                        <template slot="content">
                            <p>Je kunt je eigen activiteit op de kaart van de EU-programmeerweek zetten, maar je kunt ook anderen in je netwerk overhalen dit te doen. Als jij met je groep een van de volgende drempels bereikt, krijgen jullie allemaal een Programmeerweek-certificaat van uitmuntendheid.</p>
                            <p>Criteria om het Certificaat van uitmuntendheid te behalen:</p>
                            <ul>
                                <li><strong>deelname van 500&nbsp;studenten</strong></li>en/of<li><strong>10 gelinkte activiteiten</strong></li>en/of<li><strong>betrokkenheid van 3&nbsp;landen</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Hoe kun je deelnemen?</template>
                        <template slot="content">
                            <ol>
                                <li>Ga naar de pagina <a href="/add">Activiteit toevoegen</a> en vul de benodigde gegevens van je programmeeractiviteit in.</li>
                            </ol><i>Als je de initiatiefnemer van je groep bent:</i><ol start="2">
                                <li>Klik op Verzenden</li>
                                <li>Zodra je activiteit is geaccepteerd, krijg je een bevestigingsmail met je unieke Code Week 4 All-code.</li>
                                <li>Kopieer de code en deel deze met je collega's en andere mensen in je netwerk die ook een programmeeractiviteit opzetten. Zegt het voort en overtuig anderen om mee te doen!</li>
                                <li>Na afloop van de campagne vragen we alle organisatoren hoeveel deelnemers zij bij hun activiteit hebben betrokken. Als je de drempel hebt weten te bereiken, krijgen jij en al je collega's uit je netwerk het Certificaat van uitmuntendheid!</li>
                            </ol><i>Als je je aansluit bij een bestaande groep:</i><ol start="2">
                                <li>Plak het wachtwoord dat je van de initiator, dus diegene die de groep heeft opgezet, hebt gekregen in het veldvak CODE WEEK 4 ALL CODE.</li>
                                <li>Klik op Verzenden.</li>
                                <li>Zegt het voort (ook de code!) zodat er meer organisatoren zich bij jullie groep aansluiten</li>
                                <li>Na afloop van de campagne vragen we alle organisatoren hoeveel deelnemers zij bij hun activiteit hebben betrokken. Als je de drempel hebt weten te bereiken, krijgen jij en al je collega's uit je netwerk het Certificaat van uitmuntendheid!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Waarom meedoen aan de uitdaging?</template>
                        <template slot="content">
                            <ul>
                                <li>Om de boodschap over het belang van programmeren te verspreiden.</li>
                                <li>Om een groot aantal studenten betrokken te zien raken.</li>
                                <li>Om contacten te leggen met organisaties en/of scholen in je gemeenschap of het buitenland.</li>
                                <li>Om ondersteuning te vinden bij andere organisatoren en docenten.</li>
                                <li>Om het <strong>Certificaat van uitmuntendheid</strong> te behalen.</li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection