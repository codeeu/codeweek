@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>La sfida Code Week 4 All</h1><span></span></div>

                    <hr>

                    <p>La sfida Code Week 4 All ti invita a collegare le tue attivit&agrave; ad altre organizzate da amici, colleghi e conoscenti, per ottenere insieme il Certificato di eccellenza Code Week.</p>


                    <simple-question :visible="true">
                        <template slot="title">Che cos&rsquo;&egrave;?</template>
                        <template slot="content">
                            <p>Oltre a inviare la tua attivit&agrave; sulla mappa della settimana europea della programmazione, puoi invitare altre persone nella tua rete a partecipare. Se tu e la tua alleanza raggiungerete uno degli obiettivi seguenti, riceverete il Certificato di eccellenza della settimana della programmazione!</p>
                            <p>Requisiti per ottenere il Certificato di eccellenza:</p>
                            <ul>
                                <li><strong>500 studenti partecipanti</strong></li>e/o<li><strong>10 attivit&agrave; collegate</strong></li>e/o<li><strong>3 paesi coinvolti</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Come partecipare?</template>
                        <template slot="content">
                            <ol>
                                <li>Visita la pagina <a href="/add">Aggiungi la tua attivit&agrave;</a> e inserisci le informazioni richieste sulla tua attivit&agrave; di programmazione.</li>
                            </ol><i>Se sei il primo della tua alleanza:</i><ol start="2">
                                <li>Clicca su Invio</li>
                                <li>Quando la tua attivit&agrave; &egrave; stata accettata, riceverai un&rsquo;e-mail di conferma con il tuo codice unico Code Week 4 All.</li>
                                <li>Copia il codice e condividilo con i tuoi colleghi e altre persone nella tua rete che organizzano attivit&agrave; di programmazione. Diffondi la voce per incoraggiare altri a partecipare!</li>
                                <li>Alla fine della campagna, tutti gli organizzatori di attivit&agrave; dovranno rendere conto del numero di partecipanti coinvolti. Se riuscirai a raggiungere l&rsquo;obiettivo stabilito, tu e i colleghi parte della tua rete riceverete il Certificato di eccellenza!</li>
                            </ol><i>Se ti stai unendo a un&rsquo;alleanza esistente:</i><ol start="2">
                                <li>Incolla il codice che hai ricevuto dall&rsquo;organizzatore principale, il primo a costituire l&rsquo;alleanza, nel campo CODE WEEK 4 ALL CODE.</li>
                                <li>Clicca su Invio.</li>
                                <li>Diffondi la voce (e il codice!) per invitare pi&ugrave; organizzatori a unirsi alla tua alleanza</li>
                                <li>Alla fine della campagna, tutti gli organizzatori di attivit&agrave; dovranno rendere conto del numero di partecipanti coinvolti. Se riuscirai a raggiungere l&rsquo;obiettivo stabilito, tu e i colleghi parte della tua rete riceverete il Certificato di eccellenza!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Perch&eacute; partecipare alla sfida?</template>
                        <template slot="content">
                            <ul>
                                <li>Per diffondere il messaggio sull&rsquo;importanza della programmazione.</li>
                                <li>Per coinvolgere un grande numero di studenti.</li>
                                <li>Per costruire relazioni con altre organizzazioni e/o scuole nella tua comunit&agrave; o a livello internazionale.</li>
                                <li>Per ricevere sostegno da altri organizzatori e insegnanti.</li>
                                <li>Per ottenere il <strong>Certificato di eccellenza</strong>.</li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection