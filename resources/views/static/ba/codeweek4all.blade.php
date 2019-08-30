@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Izazov Sedmice kodiranja za sve (Code Week 4 All Challenge)</h1><span></span></div>

                    <hr>

                    <p>Izazov Sedmice kodiranja za sve podstiče vas da povezujete svoje aktivnosti s drugima koje organiziraju va&scaron;i prijatelji, kolege i poznanici, te da zajednički osvojite Certifikat odličnosti Sedmice kodiranja.</p>


                    <simple-question :visible="true">
                        <template slot="title">&Scaron;ta je to?</template>
                        <template slot="content">
                            <p>Pored toga &scaron;to ćete podnijeti svoju aktivnost za mapu Sedmice kodiranja EU, možete angažirati i druge u svojoj mreži da učine to isto. Ako vi i va&scaron; savez dostignete jedan od sljedećih pragova, svi ćete osvojiti Certifikat odličnosti Sedmice kodiranja!</p>
                            <p>Kriteriji za osvajanje Certifikata odličnosti:</p>
                            <ul>
                                <li><strong>Učestvovalo 500 polaznika</strong></li>I / ili <li><strong>Povezano linkom 10 aktivnosti</strong></li>I / ili<li><strong>3 angažirane zemlje</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kako učestvovati?</template>
                        <template slot="content">
                            <ol>
                                <li>Posjetite stranicu <a href="/add">Dodajte aktivnost</a> i popunite neophodne detalje o svojoj aktivnosti kodiranja.</li>
                            </ol><i>Ako ste vi prvi u svom savezu:</i><ol start="2">
                                <li>Kliknite na Podnesi.</li>
                                <li>Kada se va&scaron;a aktivnost prihvati, vi ćete dobiti e-po&scaron;tu s potvrdom sa svojim jedinstvenim kodom Sedmice kodiranja za sve (Code Week 4 All).</li>
                                <li>Kopirajte taj kod i podijelite ga sa svojim kolegama i drugima u svojoj mreži koji također organiziraju aktivnost kodiranja. Pro&scaron;irite riječ kako biste podstakli i druge na uče&scaron;će!</li>
                                <li>Nakon kraja kampanje, svi organizatori aktivnosti će biti zamoljeni da po&scaron;alju natrag izvje&scaron;taj o tome koliko su učesnika angažirali. Ako ste bili uspje&scaron;ni u dosezanju praga, vi i va&scaron;e kolege koji ste bili dio va&scaron;e mreže dobiti ćete Certifikat odličnosti!</li>
                            </ol><i>Ako se pridružujete postojećem savezu:</i><ol start="2">
                                <li>Zalijepite kod propusnice koji ste dobili od pokretača, prvog koji je izgradio savez, u ćeliju polja za KOD SEDMICE KODIRANJA ZA SVE (CODE WEEK 4 ALL).</li>
                                <li>Kliknite na Podnesi.</li>
                                <li>Pro&scaron;irite riječ (i kod!) kako biste u svoj savez privukli &scaron;to vi&scaron;e organizatora.</li>
                                <li>Nakon kraja kampanje, svi organizatori aktivnosti će biti zamoljeni da po&scaron;alju izvje&scaron;taj o tome koliko su učesnika angažirali. Ako ste bili uspje&scaron;ni u dosezanju praga, vi i va&scaron;e kolege koji ste bili dio va&scaron;e mreže dobiti ćete Certifikat odličnosti!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Za&scaron;to se pridružiti ovom izazovu?</template>
                        <template slot="content">
                            <ul>
                                <li>Da bi se pro&scaron;irila poruka o važnosti kodiranja.</li>
                                <li>Da bi se vidjelo kako učestvuje velik broj polaznika.</li>
                                <li>Da bi se gradile veze s organizacijama i/ili &scaron;kolama u va&scaron;oj zajednici ili na međunarodnom nivou.</li>
                                <li>Da bi se prona&scaron;la podr&scaron;ka od drugih organizatora i nastavnika.</li>
                                <li>Da bi se osvojio <strong>Certifikat odličnosti.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection