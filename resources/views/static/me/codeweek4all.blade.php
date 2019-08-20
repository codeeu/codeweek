@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Izazov Nedjelja programiranja za sve (Code Week 4 All)</h1><span></span></div>

                    <hr>

                    <p>Izazov Nedjelja programiranja za sve (Code Week 4 All) vas podstiče da svoje događaje povežete sa događajima koje su organizovali prijatelji, kolege i poznanici, te da zajedno dobijete Sertifikat izuzetnosti Nedjelje programiranja.</p>


                    <simple-question :visible="true">
                        <template slot="title">O čemu je riječ?</template>
                        <template slot="content">
                            <p>Pored dodavanja va&scaron;eg događaja na mapu Evropske Nedjelje programiranja, takođe možete zainteresovati i druge unutar va&scaron;e mreže da učine isto. Ukoliko vi i va&scaron;i saveznici ispunite jedan od sljedećih uslova, svi ćete dobiti Sertifikat izuzetnosti Nedjelje programiranja!</p>
                            <p>Kriterijumi za dobijanje Sertifikata izuzetnosti:</p>
                            <ul>
                                <li><strong>Uče&scaron;će 500 učenika</strong></li>I / ili <li><strong>10 povezanih događaja</strong></li>I /ili<li><strong>Uče&scaron;će 3 države</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kako učestvovati?</template>
                        <template slot="content">
                            <ol>
                                <li>Posjetite stranicu <a href="/add">Dodaj događaj</a> i unesite potrebne informacije o va&scaron;em događaju programiranja.</li>
                            </ol><i>Ukoliko ste prvi u okviru va&scaron;eg saveza:</i><ol start="2">
                                <li>Kliknite na &bdquo;unesi&ldquo;</li>
                                <li>Nakon &scaron;to va&scaron; događaj bude prihvaćen, dobićete imejl sa potvrdom i va&scaron;im jedinstvenim Code Week 4 All (Nedjelja programiranja za sve) kodom.</li>
                                <li>Iskopirajte kod i podijelite ga sa kolegama i drugima u va&scaron;oj mreži koji takođe organizuju događaj programiranja. &Scaron;irite vijest kako bi druge podstakli na uče&scaron;će!</li>
                                <li>Po zavr&scaron;etku kampanje, od svih organizatora događaja zatražiće se povratna informacija o broju učesnika koji su okupili. Ukoliko ste sa uspjehom ispunili kriterijum, vi i va&scaron;e kolege koje su bile dio va&scaron;e mreže dobićete Sertifikat izuzetnosti!</li>
                            </ol><i>Ukoliko se priključujete postojećem savezu:</i><ol start="2">
                                <li>Zalijepite kod koji ste dobili od inicijatora, prvog učesnika koji formira savez, na polje CODE WEEK 4 ALL CODE.</li>
                                <li>Kliknite na &bdquo;unesi&ldquo;.</li>
                                <li>&Scaron;irite vijest (i kod!) kako bi se vi&scaron;e organizatora pridružilo va&scaron;em savezu.</li>
                                <li>Po zavr&scaron;etku kampanje, od svih organizatora događaja zatražiće se informacija o broju učesnika koji su okupili. Ukoliko ste sa uspjehom ispunili kriterijum, vi i va&scaron;e kolege koje su bile dio va&scaron;e mreže dobićete Sertifikat izuzetnosti!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Za&scaron;to se pridružiti izazovu?</template>
                        <template slot="content">
                            <ul>
                                <li>Da bi slali poruku o važnosti programiranja.</li>
                                <li>Da bi se uključio veliki broj učenika.</li>
                                <li>Da bi se uspostavile veze sa organizacijama i/ili &scaron;kolama u va&scaron;oj zajednici ili na međunarodnom nivou.</li>
                                <li>Da bi dobili podr&scaron;ku od drugih organizatora i predavača.</li>
                                <li>Da bi dobili <strong>Sertifikat izuzetnosti.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection