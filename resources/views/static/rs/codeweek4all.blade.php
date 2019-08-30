@extends('layout.base') @section('content')
    <section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Izazov Code Week 4 All</h1><span></span></div>

                    <hr>

                    <p>Code Week 4 All je izazov koji vas podstiče da povežete svoje aktivnosti sa drugim aktivnostima
                        koje organizuju va&scaron;i prijatelji, kolege i poznanici i da zajedno osvojite Sertifikat
                        izvrsnosti u okviru Nedelje programiranja.</p>


                    <simple-question :visible="true">
                        <template slot="title">&Scaron;ta je to?</template>
                        <template slot="content">
                            <p>Pored toga &scaron;to ćete prijaviti svoj događaj na mapu događaja EU Nedelje
                                programiranja, možete takođe da podstaknete i druge iz svoje mreže da učine isto. Ako vi
                                i va&scaron; tim ispunite jedan od sledećih uslova, svi ćete osvojiti Sertifikat
                                izvrsnosti Nedelje programiranja!</p>
                            <p>Kriterijumi za osvajanje Sertifikata izvrsnosti:</p>
                            <ul>
                                <li><strong>500 učesnika</strong></li>
                                I / Ili
                                <li><strong>10 povezanih aktivnosti</strong></li>
                                I / Ili
                                <li><strong>3 zemlje učesnice</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kako učestvovati?</template>
                        <template slot="content">
                            <ol>
                                <li>Posetite stranicu <a href="/add">Dodavanje događaja</a> i popunite potrebne detalje
                                    o va&scaron;oj aktivnosti o programiranju.
                                </li>
                            </ol>
                            <i>Ako ste prvi koji se prijavljuje u va&scaron;em timu:</i>
                            <ol start="2">
                                <li>Kliknite na Po&scaron;alji.</li>
                                <li>Kada va&scaron;a aktivnost bude prihvaćena, dobićete imejl potvrde sa jedinstvenom
                                    &scaron;ifrom za učestvovanje u izazovu Code Week 4 All.
                                </li>
                                <li>Kopirajte &scaron;ifru i podelite je sa kolegama i ostalima u va&scaron;em timu koji
                                    takođe organizuju aktivnost u vezi sa programiranjem. Prenesite vesti i podstaknite
                                    druge da učestvuju!
                                </li>
                                <li>Nakon zavr&scaron;etka kampanje, od svih organizatora aktivnosti će biti zatraženo
                                    da podnesu izve&scaron;taj o tome koliko je bilo učesnika. Ako ste uspe&scaron;no
                                    ispunili uslove, vi i va&scaron;e kolege koji su bili deo va&scaron;eg tima dobićete
                                    Sertifikat izvrsnosti!
                                </li>
                            </ol>
                            <i>Ako se pridružujete već postojećem timu:</i>
                            <ol start="2">
                                <li>Unesite &scaron;ifru koju ste dobili od inicijatora, prvog koji je napravio tim, u
                                    polje za &scaron;ifru CODE WEEK 4 ALL.
                                </li>
                                <li>Kliknite na Po&scaron;alji.</li>
                                <li>Prenesite vesti (i &scaron;ifru!) kako bi se &scaron;to vi&scaron;e organizatora
                                    pridružilo va&scaron;em timu.
                                </li>
                                <li>Nakon zavr&scaron;etka kampanje, od svih organizatora aktivnosti će biti zatraženo
                                    da podnesu izve&scaron;taj o tome koliko je bilo učesnika. Ako ste uspe&scaron;no
                                    ispunili uslove, vi i va&scaron;e kolege koji su bili deo va&scaron;eg tima dobićete
                                    Sertifikat izvrsnosti!
                                </li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Koji su razlozi da se pridružite izazovu?</template>
                        <template slot="content">
                            <ul>
                                <li>&Scaron;irenje poruke o tome koliko je važno programiranje.</li>
                                <li>Aktiviranje velikoj broja učenika koji učestvuju.</li>
                                <li>Građenje veza sa organizacijama i / ili &scaron;kolama u va&scaron;oj zajednici ili
                                    međunarodno.
                                </li>
                                <li>Pronalaženje podr&scaron;ke drugih organizatora i nastavnika.</li>
                                <li>Osvajanje <strong>Sertifikata izvrsnosti.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>
@endsection

@section("extra-css")
    <style> .tab {
            position: relative;
            margin-bottom: 1px;
            width: 100%;
            color: #232323;
            overflow: hidden;
        }

        .answer {
            padding: 20px;
            background-color: #f1f1f1;
        }

        .question {
            position: relative;
            display: block;
            width: 100%;
            padding: 0 0 0 1em;
            background: #2980b9;
            font-weight: bold;
            line-height: 3;
            cursor: pointer;
            color: #fff;
            text-align: center;
            font-size: 2rem;
        }

        .chevron {
            display: block;
            margin-top: -23px;
            padding: 10px;
        }

        ul, ol {
            margin-left: 1em;
        } </style>
@endsection