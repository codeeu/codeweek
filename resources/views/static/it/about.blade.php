@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>INFORMAZIONI SULLA SETTIMANA EUROPEA DELLA PROGRAMMAZIONE</h1><span></span></div>

                    <hr>


                    <p>Nel 2018 la Settimana europea della programmazione si terr&agrave; dal <strong>6 al 21 ottobre</strong>.</p>

                    <p>La Settimana europea della programmazione &egrave; un evento che nasce dal basso e celebra la creativit&agrave;, la risoluzione dei problemi e la collaborazione attraverso la programmazione e altre attivit&agrave; tecnologiche. L&rsquo;idea &egrave; di rendere la programmazione pi&ugrave; visibile, mostrare ai giovani, agli adulti e agli anziani come dare vita alle proprie idee con la programmazione, spiegare queste capacit&agrave; e mettere insieme persone motivate per imparare.</p>

                    <h2>Gestita da volontari</h2>

                    <p>La Settimana europea della programmazione &egrave; gestita da volontari. Uno o pi&ugrave; <a href="/ambassadors">ambasciatori della Settimana europea della programmazione</a> coordinano l&rsquo;iniziativa nei loro paesi, ma ognuno pu&ograve; organizzare la propria attivit&agrave; e aggiungerla alla mappa di <a href="/">codeweek.eu</a>.</p>

                    <h2>Sostenuta dalla Commissione europea</h2>

                    <p>La Settimana europea della programmazione &egrave; stata lanciata nel 2013 dai Young Advisors per l&rsquo;agenda digitale europea. La Commissione europea sostiene la Settimana europea della programmazione nell&rsquo;ambito della sua strategia per il <a href="http://ec.europa.eu/priorities/digital-single-market/">mercato unico digitale</a>. Nel <a href="https://ec.europa.eu/education/initiatives/european-education-area/digital-education-action-plan_en">piano d&rsquo;azione per l&rsquo;istruzione digitale</a> la Commissione incoraggia soprattutto le scuole ad aderire all&rsquo;iniziativa. L&rsquo;obiettivo &egrave; di raggiungere il 50 % di tutte le scuole europee entro il 2020.</p>

                    <h2>Scuole</h2>

                    <p>Le scuole di ogni livello e gli insegnanti di tutte le materie sono particolarmente invitati a partecipare alla Settimana europea della programmazione, per dare l&rsquo;opportunit&agrave; ai loro studenti di esplorare la creativit&agrave; digitale e la programmazione. Per saperne di pi&ugrave; sull&rsquo;iniziativa e su come organizzare la tua attivit&agrave;, consulta la pagina web dedicata agli insegnanti: <a href="/schools">CodeWeek.eu/Schools</a></p>

                    <h2>Perch&eacute; programmare?</h2>

                    <p>Riguarda Pia, che si sentiva in dovere di studiare legge pur avendo sempre apprezzato la matematica e i giochi con i computer. Riguarda Mark, che ha ideato un social network migliore, ma non pu&ograve; costruirlo da solo. Riguarda Alice, che sogna di costruire robot perch&eacute; i suoi genitori non le permettono di avere un gatto.</p>

                    <p>Riguarda quelli di voi che stanno gi&agrave; contribuendo a realizzare questi sogni.</p>

                    <p>In realt&agrave;, riguarda tutti noi. Il nostro futuro. La tecnologia sta dando forma alle nostre vite, ma lasciamo che una minoranza decida cosa utilizzare e come farlo. Possiamo fare di meglio che condividere e apprezzare semplicemente le cose. Possiamo dare vita alle nostre idee folli, costruire cose che possano portare gioia agli altri.</p>

                    <p>Non &egrave; mai stato cos&igrave; facile creare la tua app, costruire il tuo robot o inventare macchine volanti, e allora perch&eacute; no? Non &egrave; un viaggio facile, ma &egrave; pieno di sfide creative, una comunit&agrave; solidale e un sacco di divertimento. Sei pronto ad accettare la sfida e a diventare un creatore?</p>

                    <p>La programmazione aiuta inoltre a sviluppare competenze quali il pensiero computazionale, la risoluzione di problemi, la creativit&agrave; e il lavoro di squadra, competenze davvero buone per tutti i sentieri della vita.</p>

                    <p>Alessandro Bogliolo, coordinatore del gruppo di ambasciatori volontari della Settimana europea della programmazione, ha dichiarato:<blockquote>
                            <p>«Dall&rsquo;alba dei tempi, usando pietra, ferro, carta e matita abbiamo fatto molte cose che hanno trasformato le nostre vite. Ora viviamo in un&rsquo;era diversa in cui il nostro mondo &egrave; plasmato dal codice. Epoche diverse prevedono lavori e richieste di competenze diversi. Durante la Settimana della programmazione vogliamo dare a tutti gli europei l&rsquo;opportunit&agrave; di scoprire la programmazione e divertirsi grazie a essa. Impariamo a programmare per modellare il nostro futuro».</p>
                        </blockquote>
                    </p>

                    <h2>Settimana della programmazione in numeri</h2>

                    <p>Nel 2017, 1,2 milioni di persone provenienti da pi&ugrave; di 50 paesi in tutto il mondo hanno partecipato alla Settimana europea della programmazione. In aggiunta, 1,3 milioni di giovani sono stati impegnati nella <a href="http://africacodeweek.org/">Settimana di programmazione africana</a>, un&rsquo;iniziativa spin-off gestita da SAP e organizzazioni no profit.</p>

                    <p>Se il tuo paese non &egrave; ancora coinvolto, puoi organizzare delle attivit&agrave; e inserirle sulla <a href="/events">mappa</a> o <a href="mailto:info@codeweek.eu">fare volontariato</a> come ambasciatore della Settimana europea della programmazione.</p>

                    <div class="container clearfix">
                        <div class="col_half" id="PeopleChart" style="opacity: 0;width: 100%;text-align: center">
                            <h3 class="center">Partecipanti</h3>
                            <canvas id="PeopleChartCanvas" style="width: 70%;height:400px;"></canvas>
                        </div>
                    </div>


                    <h2>Unisciti alla Settimana europea della programmazione:</h2>

                    <p>Unisciti alla Settimana europea della programmazione <a href="/guide">organizzando un&rsquo;attivit&agrave; di programmazione</a> nella tua citt&agrave;, partecipando alla <a href="/codeweek4all">sfida Code Week 4 All</a> e collegando attivit&agrave; tra comunit&agrave; e confini, oppure aiutandoci a diffondere la visione della Settimana della programmazione in qualit&agrave; di <a href="/ambassadors">ambasciatore della Settimana europea della programmazione</a> del tuo paese!</p>


                </div>
            </div>
        </div>
    </section>@endsection @push('scripts')<script type="text/javascript">
        $(function($){

            var peopleChartData = {
                labels: ["2013", "2014", "2015", "2016", "2017"],
                datasets: [
                    {
                        fillColor: "rgba(60, 161, 206, 0.61)",
                        strokeColor: "rgba(220,220,220,1)",
                        data: [10000, 150000, 570000, 970000, 1200000]
                    }
                ]

            };

            var globalGraphSettings = {animation: Modernizr.canvas};


            function showBarChart() {
                var ctx = document.getElementById("PeopleChartCanvas").getContext("2d");
                new Chart(ctx).Bar(peopleChartData, globalGraphSettings);
            }


            $('#PeopleChart').appear(function () {
                $(this).css({opacity: 1});
                setTimeout(showBarChart, 300);
            }, {accX: 0, accY: -155}, 'easeInCubic');



        });

    </script>@endpush