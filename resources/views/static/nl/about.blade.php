@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>OVER DE PROGRAMMEERWEEK</h1><span></span></div>

                    <hr>


                    <p>De EU-programmeerweek van 2018 vindt plaats van <strong>6&nbsp;t/m&nbsp;21&nbsp;oktober</strong>.</p>

                    <p>De EU-programmeerweek is een burgerinitiatief waarin creativiteit, probleemoplossing en samenwerking worden gestimuleerd door middel van programmeren en andere technische activiteiten. Het idee erachter is om programmeren zichtbaarder te maken, om jongeren, volwassenen en ouderen te laten zien hoe je idee&euml;n met programmeercode tot leven kunt brengen, om deze vaardigheden te ontsluieren en om gemotiveerde mensen bij elkaar te brengen om te leren.</p>

                    <h2>Georganiseerd door vrijwilligers</h2>

                    <p>De EU-programmeerweek wordt georganiseerd door vrijwilligers. Een of meer <a href="/ambassadors">ambassadeurs van de programmeerweek</a> co&ouml;rdineren het initiatief in hun land, maar daarnaast kan iedereen zelf een activiteit organiseren en dat op de kaart zetten op <a href="/">codeweek.eu</a>.</p>

                    <h2>Ondersteund door de Europese commissie</h2>

                    <p>De EU-programmeerweek werd in 2013 door de Young Advisors gelanceerd voor de digitale agenda van Europa. De Europese Commissie ondersteunt de EU-programmeerweek als onderdeel van de strategie voor een <a href="http://ec.europa.eu/priorities/digital-single-market/">digitale eengemaakte markt</a>. In het <a href="https://ec.europa.eu/education/initiatives/european-education-area/digital-education-action-plan_en">actieplan voor digitaal onderwijs</a> moedigt de Commissie vooral scholen aan om mee te doen met het initiatief. Het doel is om v&oacute;&oacute;r 2020 50% van alle scholen in Europa te bereiken.</p>

                    <h2>Scholen</h2>

                    <p>Scholen op elk niveau en leraren van alle vakken worden in het bijzonder uitgenodigd om mee te doen met de EU-programmeerweek, om hun leerlingen de kans te geven digitale creativiteit en programmeren te ontdekken. Kom meer te weten over het initiatief en over hoe je je activiteit organiseert op de speciale website voor leraren: <a href="/schools">CodeWeek.eu/Schools</a></p>

                    <h2>Waarom programmeren?</h2>

                    <p>Het gaat over Pia, die dacht dat ze rechten moest gaan studeren, ook al hield ze altijd al van wiskunde  en van spelen op de computer. Het gaat over Mark, die idee&euml;n heeft voor een beter sociaal netwerk, maar dat zelf niet kan bouwen. Het gaat over Alice, die ervan droomt om robots te maken, omdat ze van haar ouders geen kat mag hebben.</p>

                    <p>Het gaat over die mensen die deze dromen al helpen waar te maken.</p>

                    <p>Eigenlijk gaat het over ons allemaal. Over onze toekomst. Technologie geeft ons leven vorm, maar we laten een kleine minderheid beslissen waarvoor en hoe we technologie gebruiken. We kunnen veel meer dan alleen dingen delen en op vind-ik-leukknoppen klikken. We kunnen onze gekke idee&euml;n tot leven brengen, dingen bouwen die anderen plezier bezorgen.</p>

                    <p>Het was nog nooit zo eenvoudig om een eigen app te maken, je eigen robot te bouwen of, waarom ook niet, vliegende auto&rsquo;s uit te vinden! Het is geen makkelijke weg, maar wel een weg vol creatieve uitdagingen, een ondersteunende community en hartstikke veel plezier. Ben jij er klaar voor om de uitdaging aan te gaan en een maker te worden?</p>

                    <p>Programmeren helpt je ook vaardigheden te ontwikkelen als computationeel denken, problemen oplossen, creatief zijn en samenwerken &ndash; vaardigheden waar je echt iets aan hebt in het leven.</p>

                    <p>Alessandro Bogliolo, co&ouml;rdinator van het team van vrijwilligers van de EU-programmeerweek, vertelt:<blockquote>
                            <p>&bdquo;De mens heeft altijd al van alles met steen, ijzer, papier en potlood gedaan, wat ons leven heeft veranderd. Tegenwoordig leven we in een ander tijdperk, in een wereld die is opgebouwd uit programmeercode. Verschillende tijdperken vragen om verschillende banen en vaardigheden. Tijdens de programmeerweek willen we elke Europeaan de mogelijkheid geven om programmeren te ontdekken en er plezier mee te beleven. Laten we leren programmeren om onze toekomst vorm te geven.&rdquo;</p>
                        </blockquote>
                    </p>

                    <h2>De programmeerweek in cijfers</h2>

                    <p>In 2017 deden 1,2&nbsp;miljoen mensen in meer dan 50&nbsp;landen over de hele wereld mee aan de EU-programmeerweek. Nog eens 1,3 miljoen jongeren waren betrokken bij de <a href="http://africacodeweek.org/">Africa Code Week</a>, een door SAP en non-profitorganisaties georganiseerde spin-off.</p>

                    <p>Als jouw land nog niet meedoet, kun je zelf activiteiten organiseren en die op de <a href="/events">kaart</a> zetten of als <a href="mailto:info@codeweek.eu">vrijwilliger</a> ambassadeur van de programmeerweek worden.</p>

                    <div class="container clearfix">
                        <div class="col_half" id="PeopleChart" style="opacity: 0;width: 100%;text-align: center">
                            <h3 class="center">Deelnemers</h3>
                            <canvas id="PeopleChartCanvas" style="width: 70%;height:400px;"></canvas>
                        </div>
                    </div>


                    <h2>Meedoen met de EU-programmeerweek</h2>

                    <p>Doe mee met de EU-programmeerweek: <a href="/guide">organiseer een programmeeractiviteit</a> in jouw woonplaats, doe mee met de <a href="/codeweek4all">Code Week 4 All-uitdaging</a> en verbindende activiteiten in andere community&rsquo;s en landen of help ons de visie van de programmeerweek te verspreiden als <a href="/ambassadors">ambassadeur van de EU-programmeerweek</a> in jouw land!</p>


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