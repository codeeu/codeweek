@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>OM KODEUGEN</h1><span></span></div>

                    <hr>


                    <p>EU&rsquo;s kodeuge 2018 finder sted mellem den <strong>6. og 21.&nbsp;oktober</strong>.</p>

                    <p>EU&rsquo;s kodeuge er en gr&aelig;srodsbev&aelig;gelse, der fejrer kreativitet, probleml&oslash;sning og samarbejde gennem programmering og andre tekniske aktiviteter. Id&eacute;en er at g&oslash;re programmering mere synligt for at vise unge, voksne og &aelig;ldre, hvordan man f&oslash;rer sine id&eacute;er ud i livet med kode, at afmystificere disse f&aelig;rdigheder og at samle motiverede mennesker i et l&aelig;ringsmilj&oslash;.</p>

                    <h2>Drevet af frivillige</h2>

                    <p>EU&rsquo;s kodeuge drives af frivillige. En eller flere <a href="/ambassadors">ambassad&oslash;rer for kodeugen</a> koordinerer initiativet i deres land, men alle kan afholde deres egne aktiviteter og s&aelig;tte dem p&aring; kortet p&aring; <a href="/">codeweek.eu</a>.</p>

                    <h2>St&oslash;ttet af Europa-Kommissionen</h2>

                    <p>EU&rsquo;s kodeuge blev startet i 2013 af Young Advisors for den digitale dagsorden for Europa. Europa-Kommissionen st&oslash;tter EU&rsquo;s kodeuge som en del af strategien for et <a href="http://ec.europa.eu/priorities/digital-single-market/">digitalt indre marked</a>. I <a href="https://ec.europa.eu/education/initiatives/european-education-area/digital-education-action-plan_en">handlingsplanen for digital uddannelse</a> opfordrer Kommissionen is&aelig;r skoler til at deltage i initiativet. M&aring;let er at n&aring; 50&nbsp;% af alle skoler i Europa i 2020.</p>

                    <h2>Skoler</h2>

                    <p>Skoler p&aring; alle niveauer og l&aelig;rere uanset fag er s&aelig;rligt velkomne til at deltage i EU&rsquo;s kodeuge, s&aring; de kan give deres elever mulighed for at udforske digital kreativitet og kodning. L&aelig;r mere om initiativet og om, hvordan du afholder en aktivitet, p&aring; websiden for l&aelig;rere: <a href="/schools">CodeWeek.eu/Schools</a></p>

                    <h2>Hvorfor skal man kode?</h2>

                    <p>Det handler om Pia, som f&oslash;lte, at hun skulle l&aelig;se jura, ogs&aring; selvom hun altid havde v&aelig;ret interesseret i matematik og at lege med computere. Det handler om Mark, som har en id&eacute; til et bedre socialt netv&aelig;rk, men ikke selv kan bygge det. Det handler om Alice, som dr&oslash;mmer om at bygge robotter, fordi hun ikke m&aring; f&aring; en kat for sine for&aelig;ldre.</p>

                    <p>Det handler om dem af jer, der allerede er med til at g&oslash;re disse dr&oslash;mme til virkelighed.</p>

                    <p>Faktisk handler det om os alle sammen. Vores fremtid. Teknologi former vores liv, men vi lader et mindretal bestemme, hvad vi bruger det til og hvordan. Vi kan g&oslash;re mere end bare at dele og give likes. Vi kan f&oslash;re vores sk&oslash;re id&eacute;er ud i livet og bygge ting, som vil g&oslash;re andre glade.</p>

                    <p>Det har aldrig v&aelig;ret lettere at lave sin egen app, bygge sin egen robot eller opfinde flyvende biler &ndash; hvorfor ikke! Det er ikke en let rejse, men det er en rejse fuld af kreative udfordringer, et st&oslash;ttende f&aelig;llesskab og masser af sjov. Er du klar til at tage udfordringen op og blive en skaber?</p>

                    <p>Kodning er ogs&aring; med til at udvikle kompetencer som for eksempel datalogisk t&aelig;nkning, probleml&oslash;sning, kreativitet og teamwork &ndash; virkelig nyttige f&aelig;rdigheder uanset hvilken vej i livet man v&aelig;lger.</p>

                    <p>Alessandro Bogliolo, koordinator for EU&rsquo;s kodeuges team af frivillige ambassad&oslash;rer, sagde:<blockquote>
                            <p>»Fra tidernes morgen har vi gjort mange ting med sten, jern, papir og blyant, som har forandret vores liv. Nu lever vi i en anden tidsalder, hvor vores verden formes i kode. Forskellige tidsaldre har forskellige job og krav til f&aelig;rdigheder. I kodeugen vil vi give europ&aelig;erne mulighed for at opdage kodning og lege med det. Vi skal l&aelig;re at kode, s&aring; vi kan forme vores fremtid«.</p>
                        </blockquote>
                    </p>

                    <h2>Kodeugen i tal</h2>

                    <p>I 2017 deltog 1,2&nbsp;millioner mennesker i over 50&nbsp;lande i hele verden i EU&rsquo;s kodeuge. Desuden deltog 1,3&nbsp;millioner unge i <a href="http://africacodeweek.org/">Afrikas kodeuge</a>, som er et spin-off-initiativ, der drives af SAP og nonprofitorganisationer.</p>

                    <p>Hvis dit land endnu ikke er involveret, kan du afholde aktiviteter og s&aelig;tte dem p&aring; <a href="/events">kortet</a> eller deltage som <a href="mailto:info@codeweek.eu">frivillig</a> ambassad&oslash;r for kodeugen.</p>

                    <div class="container clearfix">
                        <div class="col_half" id="PeopleChart" style="opacity: 0;width: 100%;text-align: center">
                            <h3 class="center">Deltagere</h3>
                            <canvas id="PeopleChartCanvas" style="width: 70%;height:400px;"></canvas>
                        </div>
                    </div>


                    <h2>V&aelig;r med i EU&rsquo;s kodeuge</h2>

                    <p>V&aelig;r med i EU&rsquo;s kodeuge ved at <a href="/guide">afholde en kodeaktivitet</a> i din by og deltage i <a href="/codeweek4all">Code Week 4 All-udfordringen</a> og andre aktiviteter p&aring; tv&aelig;rs af lokalsamfund og gr&aelig;nser, eller hj&aelig;lp os med at udbrede budskabet om kodeugen som <a href="/ambassadors">ambassad&oslash;r for EU&rsquo;s kodeuge</a> i dit land!</p>


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