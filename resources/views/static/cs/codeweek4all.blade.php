@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Soutěž Code Week 4 All</h1><span></span></div>

                    <hr>

                    <p>Soutěž Code Week 4 All v&aacute;s povzbuzuje k tomu, abyste propojili sv&eacute; aktivity s aktivitami organizovan&yacute;mi př&aacute;teli, kolegy a zn&aacute;m&yacute;mi a společně z&iacute;skali Certifik&aacute;t o &scaron;pičkov&eacute; &uacute;rovni v r&aacute;mci T&yacute;dne programov&aacute;n&iacute;.</p>


                    <simple-question :visible="true">
                        <template slot="title">Oč se jedn&aacute;?</template>
                        <template slot="content">
                            <p>Kromě přid&aacute;n&iacute; va&scaron;&iacute; aktivity na mapu T&yacute;dne programov&aacute;n&iacute; můžete tak&eacute; zapojit ostatn&iacute; ve sv&eacute; s&iacute;ti, aby udělali tot&eacute;ž. Pokud vy a va&scaron;e aliance dos&aacute;hnete na některou z n&aacute;sleduj&iacute;c&iacute;ch prahov&yacute;ch hodnot, z&iacute;sk&aacute;te Certifik&aacute;t o &scaron;pičkov&eacute; &uacute;rovni v r&aacute;mci T&yacute;dne programov&aacute;n&iacute;!</p>
                            <p>Krit&eacute;ria pro z&iacute;sk&aacute;n&iacute; Certifik&aacute;tu o &scaron;pičkov&eacute; &uacute;rovni:</p>
                            <ul>
                                <li><strong>500 zapojen&yacute;ch studentů</strong></li>a / nebo<li><strong>10 propojen&yacute;ch aktivit</strong></li>a / nebo<li><strong>3 z&uacute;častněn&eacute; země</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Jak se zapojit?</template>
                        <template slot="content">
                            <ol>
                                <li>Nav&scaron;tivte str&aacute;nku <a href="/add">Přidat akci</a> a vyplňte nezbytn&eacute; podrobnosti o va&scaron;&iacute; programovac&iacute; aktivitě.</li>
                            </ol><i>Pokud jste v alianci prvn&iacute;:</i><ol start="2">
                                <li>Klikněte na Odeslat.</li>
                                <li>Po přijet&iacute; va&scaron;&iacute; aktivity obdrž&iacute;te e-mail s potvrzen&iacute;m a s jedinečn&yacute;m k&oacute;dem pro soutěž Code Week 4 All.</li>
                                <li>K&oacute;d si zkop&iacute;rujte a předejte jej kolegům a dal&scaron;&iacute;m osob&aacute;m ve va&scaron;&iacute; s&iacute;ti, kteř&iacute; tak&eacute; organizuj&iacute; programovac&iacute; akci. Informace d&aacute;le &scaron;iřte, aby se zapojili i dal&scaron;&iacute;!</li>
                                <li>Na konci kampaně budou v&scaron;ichni organiz&aacute;toři aktivit pož&aacute;d&aacute;ni o zpr&aacute;vu o tom, kolik &uacute;častn&iacute;ků se jim podařilo zapojit. Pokud se v&aacute;m podařilo dos&aacute;hnout prahov&eacute; hodnoty, vy a va&scaron;i kolegov&eacute;, kteř&iacute; byli souč&aacute;st&iacute; va&scaron;&iacute; s&iacute;tě, obdrž&iacute;te Certifik&aacute;t o &scaron;pičkov&eacute; &uacute;rovni!</li>
                            </ol><i>Pokud se chcete přidat ke st&aacute;vaj&iacute;c&iacute; alianci:</i><ol start="2">
                                <li>Vložte heslo obdržen&eacute; od inici&aacute;tora, kter&yacute; alianci vytvořil, do pole K&Oacute;D CODE WEEK 4 ALL.</li>
                                <li>Klikněte na Odeslat.</li>
                                <li>Dejte o akci vědět (a &scaron;iřte k&oacute;d!), aby se do va&scaron;&iacute; aliance přidali dal&scaron;&iacute; organiz&aacute;toři.</li>
                                <li>Na konci kampaně budou v&scaron;ichni organiz&aacute;toři aktivit pož&aacute;d&aacute;ni o zpr&aacute;vu o tom, kolik &uacute;častn&iacute;ků se jim podařilo zapojit. Pokud se v&aacute;m podařilo dos&aacute;hnout prahov&eacute; hodnoty, vy a va&scaron;i kolegov&eacute;, kteř&iacute; byli souč&aacute;st&iacute; va&scaron;&iacute; s&iacute;tě, obdrž&iacute;te Certifik&aacute;t o &scaron;pičkov&eacute; &uacute;rovni!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Proč se do soutěže zapojit?</template>
                        <template slot="content">
                            <ul>
                                <li>Aby se &scaron;&iacute;řilo sdělen&iacute; o v&yacute;znamu programov&aacute;n&iacute;.</li>
                                <li>Aby se zapojil vět&scaron;&iacute; počet studentů.</li>
                                <li>Aby se vybudovaly vazby mezi organiz&aacute;tory a/nebo &scaron;kolami ve va&scaron;&iacute; obci nebo na mezin&aacute;rodn&iacute; &uacute;rovni.</li>
                                <li>Abyste z&iacute;skali podporu dal&scaron;&iacute;ch organiz&aacute;torů a učitelů.</li>
                                <li>Abyste z&iacute;skali <strong>Certifik&aacute;t o &scaron;pičkov&eacute; &uacute;rovni.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection