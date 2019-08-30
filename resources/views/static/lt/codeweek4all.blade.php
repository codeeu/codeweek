@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>I&scaron;&scaron;ūkis &bdquo;Code Week 4 All&ldquo;</h1><span></span></div>

                    <hr>

                    <p>I&scaron;&scaron;ūkiu &bdquo;Code Week 4 All&ldquo; skatinama susieti savo renginius su kitais renginiais, kuriuos organizuoja draugai, kolegos ar pažįstami, ir kartu gauti Programavimo savaitės meistri&scaron;kumo pažymėjimą.</p>


                    <simple-question :visible="true">
                        <template slot="title">Kas tai yra?</template>
                        <template slot="content">
                            <p>Jūs galite ne tik pateikti savo renginį ES programavimo savaitei, bet ir paskatinti tai padaryti kitus savo tinklo narius. Jei jūs ir jūsų aljansas pasieks vieną i&scaron; nustatytų tikslų, gausite Programavimo savaitės meistri&scaron;kumo pažymėjimą!</p>
                            <p>Kriterijai meistri&scaron;kumo pažymėjimui gauti:</p>
                            <ul>
                                <li><strong>dalyvavo 500&nbsp;moksleivių</strong></li>ir (arba)<li><strong>susieta 10&nbsp;renginių</strong></li>ir (arba)<li><strong>dalyvavo 3&nbsp;&scaron;alys.</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kaip dalyvauti?</template>
                        <template slot="content">
                            <ol>
                                <li>Apsilankykite puslapyje <a href="/add">&bdquo;Pridėti renginį&ldquo;</a> ir užpildykite reikiamą informaciją apie savo programavimo renginį.</li>
                            </ol><i>Jeigu esate pirmasis savo aljanse:</i><ol start="2">
                                <li>spustelėkite &bdquo;Pateikti&ldquo;;</li>
                                <li>patvirtinus jūsų renginį, gausite patvirtinimo el.&nbsp;lai&scaron;ką su unikaliu &bdquo;Code Week 4 All&ldquo; kodu;</li>
                                <li>nukopijuokite kodą ir pasidalykite juo su savo kolegomis bei kitais savo tinklo nariais, kurie taip pat organizuoja programavimo renginį. Skleiskite žinią, kad paskatintumėte dalyvauti ir kitus!</li>
                                <li>Pasibaigus kampanijai, visų renginių organizatorių bus papra&scaron;yta prane&scaron;ti dalyvių skaičių. Jei jums pavyko pasiekti nustatytą tikslą, jūs ir jūsų tinklui priklausantys kolegos gausite meistri&scaron;kumo pažymėjimą!</li>
                            </ol><i>Jeigu prisijungiate jau prie esamo aljanso:</i><ol start="2">
                                <li>įklijuokite kodą, kurį gavote i&scaron; aljanso iniciatoriaus, laukelyje &bdquo;CODE WEEK 4 ALL CODE&ldquo;;</li>
                                <li>spustelėkite &bdquo;Pateikti&ldquo;;</li>
                                <li>skleiskite žinią (ir dalykitės kodu!), kad prie jūsų aljanso prisijungtų daugiau organizatorių;</li>
                                <li>pasibaigus kampanijai, visų renginių organizatorių bus papra&scaron;yta prane&scaron;ti dalyvių skaičių. Jei jums pavyko pasiekti nustatytą tikslą, jūs ir jūsų tinklui priklausantys kolegos gausite meistri&scaron;kumo pažymėjimą!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kodėl prisijungti prie i&scaron;&scaron;ūkio?</template>
                        <template slot="content">
                            <ul>
                                <li>Kad skleistumėte žinią apie programavimo svarbą.</li>
                                <li>Kad dalyvautų daug moksleivių.</li>
                                <li>Kad užmegztumėte ry&scaron;į su organizacijomis ir (arba) mokyklomis i&scaron; savo bendruomenės ir tarptautiniu mastu.</li>
                                <li>Kad gautumėte kitų organizatorių ir mokytojų pagalbos.</li>
                                <li>Kad gautumėte <strong>meistri&scaron;kumo pažymėjimą</strong>.</li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection