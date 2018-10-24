@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>OM CODE WEEK</h1><span></span></div>

                    <hr>


                    <p>EU Code Week 2018 anordnas mellan den <strong>6 och 21 oktober</strong>.</p>

                    <p>EU Code Week &auml;r ett gr&auml;srotsinitiativ som hyllar kreativitet, probleml&ouml;sning och samarbete via programmering och andra tekniska aktiviteter. Tanken &auml;r att g&ouml;ra programmering mer synligt, att visa unga, vuxna och &auml;ldre hur man kan f&ouml;rverkliga id&eacute;er med kod, att avmystifiera dessa f&auml;rdigheter och f&aring; motiverade m&auml;nniskor att l&auml;ra sig tillsammans.</p>

                    <h2>Leds av volont&auml;rer</h2>

                    <p>EU Code Week organiseras av frivilliga. En eller flera <a href="/ambassadors">ambassad&ouml;rer f&ouml;r Code Week</a> samordnar initiativet i de olika l&auml;nderna, men vem som helst kan organisera en aktivitet och l&auml;gga till den p&aring; kartan p&aring; <a href="/">codeweek.eu</a>.</p>

                    <h2>St&ouml;ds av Europeiska kommissionen</h2>

                    <p>EU Code Week lanserades 2013 av Young Advisors for the Digital Agenda Europe. Europeiska kommissionen st&ouml;der EU Code Week som en del av strategin f&ouml;r en <a href="http://ec.europa.eu/priorities/digital-single-market/">digital inre marknad</a> och uppmuntrar i synnerhet skolor att delta i initiativet i den <a href="https://ec.europa.eu/education/initiatives/european-education-area/digital-education-action-plan_en">digitala utbildningsplanen</a>. M&aring;let &auml;r att n&aring; 50 procent av alla skolor i Europa 2020.</p>

                    <h2>Skolor</h2>

                    <p>Skolor p&aring; alla niv&aring;er och l&auml;rare i alla &auml;mnen &auml;r s&auml;rskilt inbjudna att delta i EU Code Week s&aring; att eleverna f&aring;r en m&ouml;jlighet att utforska digital kreativitet och kodning. L&auml;s mer om initiativet och om hur du kan organisera en aktivitet p&aring; webbsidan f&ouml;r l&auml;rare: <a href="/schools">CodeWeek.eu/Schools</a></p>

                    <h2>Varf&ouml;r kodning?</h2>

                    <p>Det handlar om Pia, som k&auml;nde att hon var tvungen att studera juridik, trots att hon alltid gillat matte och datorer. Det handlar om Mark, som har en id&eacute; om ett b&auml;ttre socialt n&auml;tverk, men som inte kan bygga det sj&auml;lv. Det handlar om Alice, som dr&ouml;mmer om att tillverka robotar eftersom hon inte f&aring;r ha en katt f&ouml;r sina f&ouml;r&auml;ldrar.</p>

                    <p>Det handlar om dem av er som redan hj&auml;lper till att f&ouml;rverkliga dessa dr&ouml;mmar.</p>

                    <p>Det handlar faktiskt om oss alla. V&aring;r framtid. Tekniken formar v&aring;ra liv, men vi l&aring;ter en minoritet best&auml;mma hur och till vad vi anv&auml;nder tekniken. Vi kan g&ouml;ra mer &auml;n att bara dela och gilla saker. Vi kan f&ouml;rverkliga galna id&eacute;er och bygga upp saker som &auml;r till gl&auml;dje f&ouml;r andra.</p>

                    <p>Det har aldrig varit enklare att bygga en app, en robot eller kanske till och med att uppfinna flygande bilar! Det &auml;r inte l&auml;tt, men det inneb&auml;r massor av kreativa utmaningar, det finns en hj&auml;lpsam gemenskap och det &auml;r v&auml;ldigt roligt. &Auml;r du redo att anta utmaningen och bli en skapare?</p>

                    <p>Kodning hj&auml;lper ocks&aring; till att utveckla f&auml;rdigheter som datalogiskt t&auml;nkande, probleml&ouml;sning, kreativitet och samarbete &ndash; f&auml;rdigheter som &auml;r bra inom alla omr&aring;den.</p>

                    <p>Alessandro Bogliolo, samordnare av EU Code Weeks frivilliga ambassad&ouml;rer s&auml;ger:<blockquote>
                            <p>&rdquo;Sedan tidernas begynnelse har vi skapat saker med sten, j&auml;rn, papper och penna som har f&ouml;r&auml;ndrat v&aring;ra liv. Nu lever vi i en annan tids&aring;lder d&auml;r v&aring;r v&auml;rld formas av kod. Olika arbeten och kompetenser kr&auml;vs under olika tidsperioder. Under Code Week vill vi att alla europ&eacute;er ska f&aring; chansen att uppt&auml;cka kodning och se hur roligt det &auml;r. Med kod kan vi forma v&aring;r framtid.&rdquo;</p>
                        </blockquote>
                    </p>

                    <h2>Code Week i siffror</h2>

                    <p>&Aring;r 2017 deltog 1,2 miljoner personer i &ouml;ver 50 l&auml;nder v&auml;rlden runt i EU Code Week. Ytterligare 1,3 miljoner ungdomar var involverade i <a href="http://africacodeweek.org/">Africa Code Week</a>, ett systerinitiativ som drivs av SAP och icke-vinstdrivande organisationer.</p>

                    <p>Om ditt land inte deltar &auml;nnu kan du organisera en aktivitet och l&auml;gga upp den p&aring; <a href="/events">kartan</a> eller bli <a href="mailto:info@codeweek.eu">frivillig</a> ambassad&ouml;r f&ouml;r Code Week.</p>

                    <div class="container clearfix">
                        <div class="col_half" id="PeopleChart" style="opacity: 0;width: 100%;text-align: center">
                            <h3 class="center">Deltagare</h3>
                            <canvas id="PeopleChartCanvas" style="width: 70%;height:400px;"></canvas>
                        </div>
                    </div>


                    <h2>Delta i EU Code Week</h2>

                    <p>Delta i EU Code Week genom att <a href="/guide">organisera en kodningsaktivitet</a> p&aring; din ort, delta i <a href="/codeweek4all">Code Week 4 All Challenge</a> och andra aktiviteter som f&ouml;renar n&auml;rsamh&auml;llen och g&aring;r &ouml;ver gr&auml;nserna. Eller hj&auml;lp oss att sprida information om Code Week som <a href="/ambassadors">ambassad&ouml;r f&ouml;r EU Code Week</a> i ditt land!</p>


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