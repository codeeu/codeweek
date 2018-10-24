@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>O TEDNU PROGRAMIRANJA</h1><span></span></div>

                    <hr>


                    <p>Leto&scaron;nji evropski teden programiranja bo potekal od <strong>6. do 21.&nbsp;oktobra</strong>&nbsp;2018.</p>

                    <p>Evropski teden programiranja je množično gibanje, ki slavi ustvarjalnost, re&scaron;evanje težav in sodelovanje prek programiranja in drugih tehnolo&scaron;kih dejavnosti. Njegov namen je povečati prepoznavnost programiranja ter mladim, odraslim in starej&scaron;im pokazati, kako uresničiti zamisli s programiranjem, pojasniti ta znanja in spretnosti ter združiti motivirane ljudi v učenju.</p>

                    <h2>Vodijo ga prostovoljci</h2>

                    <p>Evropski teden programiranja vodijo prostovoljci. Eden ali več <a href="/ambassadors">ambasadorjev tedna programiranja</a> usklajuje pobude v svoji državi, vsakdo pa lahko organizira svojo dejavnost in jo doda na zemljevid na spletnem mestu <a href="/">codeweek.eu</a>.</p>

                    <h2>Podpira ga Evropska komisija</h2>

                    <p>Evropski teden programiranja so leta&nbsp;2013 uvedli mladi svetovalci za Evropsko digitalno agendo. Evropska komisija podpira evropski teden programiranja v okviru strategije za <a href="http://ec.europa.eu/priorities/digital-single-market/">enotni digitalni trg</a>, v okviru <a href="https://ec.europa.eu/education/initiatives/european-education-area/digital-education-action-plan_en">akcijskega načrta za digitalno izobraževanje</a> pa posebej spodbuja &scaron;ole, naj se pridružijo pobudi. Cilj je doseči 50&nbsp;% vseh &scaron;ol v Evropi do leta&nbsp;2020.</p>

                    <h2>&Scaron;ole</h2>

                    <p>&Scaron;ole na vseh ravneh in učitelji vseh predmetov so posebej vabljeni, da sodelujejo v evropskem tednu programiranja in tako dajo svojim učencem priložnost za raziskovanje digitalne ustvarjalnosti in programiranja. Več informacij o pobudi in tem, kako organizirati dejavnosti, najdete na spletni strani, namenjeni učiteljem: <a href="/schools">CodeWeek.eu/Schools</a></p>

                    <h2>Zakaj programiranje?</h2>

                    <p>Zaradi Pie, ki je mislila, da mora &scaron;tudirati pravo, čeprav je vedno uživala v matematiki in se igrala z računalniki. Zaradi Marka, ki ima zamisel za bolj&scaron;e družbeno omrežje, vendar ga sam ne more zgraditi. Zaradi Alice, ki sanja o izdelovanju robotov, ker ji star&scaron;i ne dovolijo imeti mačke.</p>

                    <p>Gre za vse tiste med vami, ki si že prizadevate, da bi se te sanje uresničile.</p>

                    <p>Pravzaprav gre za vse nas. Za na&scaron;o prihodnost. Tehnologija oblikuje na&scaron;e življenje, vendar dovoljujemo manj&scaron;ini, da odloča o tem, za kaj in kako jo bomo uporabljali. Naredimo lahko več, kot da zgolj delimo in v&scaron;ečkamo stvari. Uresničimo lahko svoje nore zamisli in zgradimo stvari, ki bodo drugim prinesle veselje.</p>

                    <p>&Scaron;e nikoli ni bilo lažje izdelati lastne aplikacije, zgraditi lastnega robota ali izumiti letečih avtomobilov: zakaj pa ne! Pot ni lahka, vendar je polna ustvarjalnih izzivov, poteka v razumevajoči skupnost in prina&scaron;a obilo zabave. Ste pripravljeni sprejeti izziv in postati snovalec?</p>

                    <p>Programiranje pomaga tudi pri razvijanju kompetenc, kot so računalni&scaron;ko razmi&scaron;ljanje, re&scaron;evanje težav, ustvarjalnost in skupinsko delo.</p>

                    <p>Alessandro Bogliolo, koordinator skupine ambasadorjev prostovoljcev v evropskem tednu programiranja, je dejal:<blockquote>
                            <p>&bdquo;Ljudje s kamnom, železom, papirjem in svinčnikom že od pradavnine počnemo &scaron;tevilne stvari, ki spreminjajo na&scaron;e življenje. Danes živimo v drugačnih časih, v katerih se na&scaron; svet oblikuje s programiranjem. V različnih časih pa se pojavljajo različne potrebe po delovnih mestih ter znanjih in spretnostih. V tednu programiranja želimo dati vsakemu Evropejcu priložnost, da odkrije programiranje in se ob njem zabava. Naučimo se torej programirati, da bi oblikovali svojo prihodnost.&ldquo;</p>
                        </blockquote>
                    </p>

                    <h2>Teden programiranja v &scaron;tevilkah</h2>

                    <p>Evropski teden programiranja je leta&nbsp;2017 privabil k sodelovanju 1,2&nbsp;milijona ljudi iz več kot 50&nbsp;držav po vsem svetu. Dodatnega 1,3&nbsp;milijona mladih je sodelovalo v <a href="http://africacodeweek.org/">afri&scaron;kem tednu programiranja</a>, izpeljani pobudi, ki jo vodijo družba SAP in neprofitne organizacije.</p>

                    <p>Če va&scaron;a država &scaron;e ne sodeluje, lahko organizirate dejavnosti in jih dodate na <a href="/events">zemljevid</a> ali se <a href="mailto:info@codeweek.eu">prostovoljno</a> prijavite kot ambasador tedna programiranja.</p>

                    <div class="container clearfix">
                        <div class="col_half" id="PeopleChart" style="opacity: 0;width: 100%;text-align: center">
                            <h3 class="center">Udeleženci</h3>
                            <canvas id="PeopleChartCanvas" style="width: 70%;height:400px;"></canvas>
                        </div>
                    </div>


                    <h2>Pridružite se evropskemu tednu programiranja</h2>

                    <p>Pridružite se evropskemu tednu programiranja in <a href="/guide">organizirajte programersko dejavnost</a> v svojem kraju. Pridružite se <a href="/codeweek4all">izzivu Code Week 4 All</a> in dejavnostim, ki povezujejo skupnosti in presegajo meje, ali pa nam pomagajte &scaron;iriti vizijo tedna programiranja kot <a href="/ambassadors">ambasador evropskega tedna programiranja</a> za svojo državo!</p>


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