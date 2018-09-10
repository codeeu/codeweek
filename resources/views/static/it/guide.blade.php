@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Iscriviti alla settimana europea della programmazione e organizza eventi #codeEU</h1><span></span><div><a href="/add" target="_blank" class="btn btn-xl mt-8">Registra il tuo evento qui</a></div>
                    </div>


                </div>


                <h4><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/codeeu_toolkit.pdf"
                       alt="#codeEU Toolkit"><i class="fa fa-download"></i> Scarica il toolkit #codeEU completo in PDF</a></h4>
                <h2>toolkit #codeEU</h2>
                <h2>Cos&rsquo;&egrave; la settimana europea della programmazione?</h2>
                <p>La settimana europea della programmazione &egrave; un movimento che nasce dal basso ed &egrave; gestito da volontari che promuovono la programmazione nei loro paesi in qualit&agrave; di <a
                            href="/ambassadors">ambasciatori della settimana europea della programmazione</a>. Chiunque (scuole, insegnanti, biblioteche, club di programmazione, imprese, autorit&agrave; pubbliche) pu&ograve; organizzare un evento #CodeEU e aggiungerlo alla mappa su <a href="/">codeweek.eu</a>.</p>
                <h2>Chi pu&ograve; organizzare un evento per la settimana europea della programmazione?</h2>
                <p>Chiunque pu&ograve; organizzare un evento per la settimana europea della programmazione.</p>
                <ul>
                    <li><strong>Bambini/adolescenti/adulti</strong> possono organizzare eventi di programmazione per mostrare agli altri come si crea con la programmazione.</li>
                    <li><strong>Scuole/club doposcuola/corsi serali per adulti</strong> possono organizzare eventi per i loro studenti. La programmazione online o &ldquo;unplugged&rdquo; &egrave; divertente e insegna il pensiero computazionale!</li>
                    <li><strong>Insegnanti e bibliotecari</strong> che programmano possono tenere lezioni di programmazione, condividere i programmi delle lezioni, organizzare laboratori per i colleghi.</li>
                    <li><strong>Insegnanti e bibliotecari</strong> che non programmano possono invitare genitori o studenti a insegnare ai partecipanti la programmazione.</li>
                    <li>I <strong>programmatori</strong> possono organizzare laboratori presso scuole locali, spazi di coworking o centri di comunit&agrave; e invitare persone a creare con la programmazione.</li>
                    <li>I <strong>club di programmazione</strong> possono organizzare laboratori per i nuovi partecipanti e mostrare come creare un gioco o un&rsquo;app con la programmazione.</li>
                    <li>Le <strong>imprese e le organizzazioni non profit</strong> possono ospitare laboratori di programmazione, mettere a disposizione il proprio personale per attivit&agrave; di formazione in occasione di diversi eventi, organizzare divertenti gare di programmazione, sponsorizzare eventi a tema.</li>
                </ul>

                <h2>Di che cosa hai bisogno?</h2>
                <ul>
                    <li><strong>Un gruppo di persone disposte a imparare.</strong> Per esempio, i tuoi amici, bambini, adolescenti, colleghi adulti, genitori o nonni. Ricorda, due persone formano gi&agrave; un gruppo!</li>
                    <li><strong>Allenatori o formatori</strong> che sanno come programmare, insegnare e ispirare gli altri. Il numero dipende dal tipo e dalla dimensione dell&rsquo;evento. Per i laboratori pratici, potrebbe essere necessario un solo formatore per 5-8 partecipanti, ma tutto dipende. I partecipanti possono anche aiutarsi l&rsquo;un l&rsquo;altro! Per eventi pi&ugrave; grandi, potrebbe essere una buona idea disporre di un ospite che si assicuri che tutti abbiano ci&ograve; di cui hanno bisogno e che tutto funzioni senza intoppi.</li>
                    <li><strong>Un posto in cui stare.</strong> Aule, biblioteche, sale conferenze e vari spazi pubblici sono tutti luoghi ideali per organizzare eventi.</li>
                    <li><strong>Computer.</strong> A seconda del gruppo di riferimento, puoi chiedere ai partecipanti di portare il proprio computer portatile, nel qual caso non dimenticare di fornire prese di corrente sufficienti.</li>
                    <li><strong>Connessione Internet</strong> &ndash; WiFi o connessioni fisse. Assicurati che le connessioni siano in grado di gestire il traffico proveniente dal tuo gruppo.</li>
                    <li><strong>Programmazione unplugged.</strong> In realt&agrave; non hai bisogno di computer e connessione internet per imparare il pensiero computazionale. Prova alcuni codici off-line con il nostro kit <a
                                href="http://codeweek.it/codyroby/">Cody-Roby</a>.</li>
                    <li><strong>Qualcosa con cui lavorare e imparare.</strong> Mostra ai partecipanti quanto pu&ograve; essere divertente creare qualcosa per conto proprio. Consulta il nostro <a href="http://codeweek.eu/resources/">elenco di risorse</a> e cerca sul web i programmi delle lezioni e dei laboratori esistenti e adattali alle esigenze del tuo gruppo. Se disponi di apparecchiature informatiche esistenti presso la sede dell&rsquo;evento, assicurati che abbiano gi&agrave; il software necessario installato e fornisci ai partecipanti le istruzioni su come eseguire l&rsquo;installazione sui propri dispositivi.</li>
                    <li><strong>Registrare i partecipanti.</strong> Se disponi di spazi limitati, puoi utilizzare strumenti come i moduli online di Wufoo, Google Form o pagine di eventi su Facebook o Eventbrite per raccogliere le registrazioni. Sebbene preferiamo che la partecipazione agli eventi sia gratuita, puoi richiedere una piccola commissione per coprire i costi dell&rsquo;evento. In alternativa, puoi rivolgerti a societ&agrave; o startup informatiche locali per la sponsorizzazione.</li>
                    <li><a href="/add">Appunta il tuo evento</a> sulla <a href="/">mappa della settimana europea della programmazione</a>!</li>
                </ul>


                <h2>Come organizzare il tuo evento?</h2>
                <ul>
                    <li>Il formato del tuo evento di programmazione spetta a te, ma ti consigliamo di includere un po&rsquo; di tempo <strong>per la pratica</strong>, in cui i partecipanti possano creare da soli o armeggiare con l&rsquo;hardware.</li>
                    <li>Puoi usare qualsiasi <strong>strumento e tecnologia</strong> ti piaccia, ma noi preferiamo materiali <a
                                href="http://codeweek.eu/resources/">open source disponibili gratuitamente</a>.</li>
                    <li><strong>Sorridi!</strong> Un&rsquo;atmosfera amichevole rompe il ghiaccio e motiva l&rsquo;apprendimento.</li>
                    <li><strong>Spuntini e bevande</strong>. Se il tuo evento dura un paio d&rsquo;ore i tuoi partecipanti avranno bisogno di una pausa. Se non puoi fornire spuntini e bevande, chiedi ai partecipanti di portarne e condividerli fra loro.</li>
                    <li>Chiedi ai partecipanti di <strong>mostrare e presentare</strong> ci&ograve; che hanno creato l&rsquo;uno all&rsquo;altro alla fine del tuo evento. Rendi tutti orgogliosi!</li>
                    <li><strong>Parla del tuo evento!</strong> Parla del tuo evento sui social media. Usa #CodeEU e @CodeWeekEU. Parla con i tuoi amici, la stampa locale, fai un comunicato stampa!</li>
                    <li>Non dimenticare di <a href="/add">aggiungere il tuo evento</a> sulla <a href="/">mappa della settimana europea della programmazione</a>!</li>
                </ul>


                <h2>Materiale promozionale</h2>
                <p>Sentiti libero di utilizzare qualsiasi parte del seguente comunicato stampa per il tuo marketing:</p>
                <ul>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/eu-code-week-celebrating-its-5th-birthday-7-22-october-get-ready-join-and-learn-how-create-code">La settimana europea della programmazione celebra il suo quinto compleanno dal 7 al 22 ottobre: preparati, partecipa e impara a creare con la programmazione!</a></li>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/million-coded-in-record-2016-EU-code-week">Nuovo record per la settimana europea della programmazione: un milione di dati programmati durante l&rsquo;edizione 2016</a></li>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/save-date-eu-code-week-10-18-october-2015-bringing-ideas-life-codeeu">Settimana europea della programmazione: dare vita alle idee con #codeEU</a></li>
                </ul>
                <p>Puoi anche utilizzare il logo della <a href="https://github.com/codeeu/codeeu-resources/tree/master/Logo - generic">settimana europea della programmazione</a>, a condizione che l&rsquo;evento che stai pianificando rispetti le nostre linee guida.</p>


                <h2>Domande?</h2>
                <p>Se hai domande su come organizzare e promuovere il tuo evento #codeEU, contatta uno degli ambasciatori della <a href="/ambassadors">settimana europea della programmazione</a> del tuo paese.</p>


            </div>
        </div>
    </section>@endsection