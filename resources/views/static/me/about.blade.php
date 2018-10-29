@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>O NEDJELJI PROGRAMIRANJA</h1><span></span></div>

                    <hr>


                    <p>Evropska nedjelja programiranja održaće se od <strong>6. do 21. oktobra 2018. godine</strong>.</p>

                    <p>Evropska nedjelja programiranja je grass-roots (lokalni dru&scaron;tveni projekat) projekat koji promovi&scaron;e kreativnost, rje&scaron;avanje problema i saradnju kroz programiranje i druge tehnolo&scaron;ke aktivnosti. Ideja je da se programiranje učini vidljivijim, da se mladima, odraslima i starijima pokaže kako svoje ideje mogu pretočiti u stvarnost, da im se same vje&scaron;tine približe, te da se motivisani pojedinci okupe kako bi učili.</p>

                    <h2>Događaj vode volonteri</h2>

                    <p>Evropsku nedjelju programiranja vode volonteri. Jedan ili vi&scaron;e <a href="/ambassadors">ambasadora Nedjelje programiranja </a> koordini&scaron;u inicijativom u svojim zemljama, ali svako može organizovati svoju aktivnost i dodati je na <a href="/">codeweek.eu</a> mapu.</p>

                    <h2>Podržano od strane Evropske komisije</h2>

                    <p>Evropsku nedjelju programiranja su 2013. godine pokrenuli Mladi savjetnici za Digitalni program Evrope (org. Young Advisors for the Digital Agenda Europe). Evropska komisija pruža podr&scaron;ku Evropskoj nedjelji programiranja kao dio strategije za <a href="http://ec.europa.eu/priorities/digital-single-market/">Jedinstveno digitalno trži&scaron;te </a>. U okviru <a href="https://ec.europa.eu/education/initiatives/european-education-area/digital-education-action-plan_en">Akcionog plana za digitalno obrazovanje (org. Digital Education Action Plan) </a>, Komisija naročito podstiče &scaron;kole da se pridruže inicijativi. Cilj je da se do 2020. godine obuhvati 50% svih &scaron;kola u Evropi.</p>

                    <h2>&Scaron;kole</h2>

                    <p>&Scaron;kole svih stepena obrazovanja i nastavnici svih predmeta posebno se pozivaju da uzmu uče&scaron;će u Evropskoj nedjelji programiranja, te svojim učenicima pruže priliku da istražuju digitalnu kreativnost i programiranje. Saznajte vi&scaron;e o inicijativi i kako da organizujete aktivnosti putem internet stranice posvećene nastavnicima: <a href="/schools">CodeWeek.eu/Schools</a></p>

                    <h2>Za&scaron;to programiranje?</h2>

                    <p>Zbog Pije, koja je stekla utisak da mora studirati pravo, iako je oduvijek voljela matematiku i igru sa kompjuterima. Zbog Marka, koji ima ideju za bolju dru&scaron;tvenu mrežu, ali je ne može izgraditi sam. Zbog Alis koja sanja o pravljenju robota, jer joj roditelji ne dozvoljavaju da ima mačku.</p>

                    <p>Riječ je o onima među vama koji već pomažu ostvarenje ovih snova.</p>

                    <p>Zapravo, radi se o svima nama. Na&scaron;oj budućnosti. Tehnologija nam oblikuje živote, ali mi dozvoljavamo manjini da odlučuje kako i za &scaron;ta je koristimo. Možemo mnogo vi&scaron;e od pukog dijeljenja i lajkovanja. Možemo oživjeti na&scaron;e lude ideje, izgraditi stvari koje će radovati druge.</p>

                    <p>Nikada nije bilo lak&scaron;e napraviti svoju aplikaciju, sastaviti robota ili izmisliti leteće automobile, za&scaron;to da ne! Ovo nije jednostavno putovanje, već putovanje puno kreativnih izazova, zajednice pune podr&scaron;ke i mnogo zabave. Da li ste spremni da prihvatite izazov i postanete stvaralac?</p>

                    <p>Programiranje takođe pomaže razvoj kompetencija poput računarskog mi&scaron;ljenja, rje&scaron;avanja problema, kreativnosti i timskog rada &ndash; zaista dobre vje&scaron;tine za sve životne staze.</p>

                    <p>Alessandro Bogliolo, koordinator tima ambasadora  - volontera Evropske nedjelje programiranja kaže:<blockquote>
                            <p>'Od kada je svijeta, mnogo toga je urađeno uz pomoć kamena, gvožđa, papira i olovke čime su na&scaron;i životi doživjeli transformaciju. Sada živimo u drugoj eri kada se na&scaron; svijet oblikuje programima. Različite ere zahtijevaju različite poslove i vje&scaron;tine. Tokom Nedjelje programiranja želimo da svakom Evropljaninu damo priliku da otkrije programiranje i zabavi se. Hajde da naučimo programiranje kako bi oblikovali svoju budućnost'.</p>
                        </blockquote>
                    </p>

                    <h2>Nedjelja programiranja u brojkama</h2>

                    <p>Tokom 2017. godine, 1 200 000 ljudi u vi&scaron;e od 50 zemalja &scaron;irom svijeta učestvovalo je u Evropskoj nedjelji programiranja. Jo&scaron; 1 300 000 mladih učestvovalo je u <a href="http://africacodeweek.org/">Afričkoj nedjelji programiranja </a>, &scaron;to je spin-off inicijativa koju vode SAP i neprofitne organizacije.</p>

                    <p>Ukoliko va&scaron;a zemlja jo&scaron; uvijek nije uključena, možete organizovati akivnosti i staviti ih na <a href="/events">mapu</a>  ili <a href="mailto:info@codeweek.eu">volontirati</a> kao ambasador Nedjelje programiranja.</p>

                    <div class="container clearfix">
                        <div class="col_half" id="PeopleChart" style="opacity: 0;width: 100%;text-align: center">
                            <h3 class="center">Učesnici</h3>
                            <canvas id="PeopleChartCanvas" style="width: 70%;height:400px;"></canvas>
                        </div>
                    </div>


                    <h2>Pridružite se Evropskoj nedjelji programiranja</h2>

                    <p>Pridružite se Evropskoj nedjelji programiranja, tako to ćete <a href="/guide">organizovati aktivnost programiranja</a> u va&scaron;em gradu, pridružiti se <a href="/codeweek4all">izazovu Nedjelja programiranja za sve (org. Code Week 4 All)</a> i povezati aktivnosti u zajednicama i inostranstvu ili pomoći nama u &scaron;irenju vizije Nedjelje programiranja u svojstvu <a href="/ambassadors">ambasadora Evropske nedjelje programiranja</a> za va&scaron;u zemlju!</p>


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