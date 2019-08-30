@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>&ldquo;Programmē&scaron;anas nedēļa visiem&rdquo; spēku pārbaude</h1><span></span></div>

                    <hr>

                    <p>&ldquo;Programmē&scaron;anas nedēļa visiem&rdquo; spēku pārbaude aicina veidot sadarbību starp jūsu rīkotajiem pasākumiem un draugu, kolēģu un paziņu organizētajiem, lai kopā iegūtu Programmē&scaron;anas nedēļas izcilības apliecinājuma sertifikātu.</p>


                    <simple-question :visible="true">
                        <template slot="title">Kas tas ir?</template>
                        <template slot="content">
                            <p>Jūs varat ne vien pievienot savu pasākumu ES programmē&scaron;anas nedēļas kartē, bet arī aicināt citus sava tīkla dalībniekus darīt to pa&scaron;u. Ja jūs ar savu sadarbības savienību sasniegsiet kādu no turpmāk minētajiem mērķiem, jūs nopelnīsiet Programmē&scaron;anas nedēļas izcilības apliecinājuma sertifikātu.</p>
                            <p>Kritēriji izcilības apliecinājuma sertifikāta iegū&scaron;anai:</p>
                            <ul>
                                <li><strong>pasākumos piedalīju&scaron;ies 500 skolēni</strong></li>un/vai<li><strong>sasaistīti 10 pasākumi</strong></li>un/vai<li><strong>iesaistītas 3 valstis</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kā piedalīties?</template>
                        <template slot="content">
                            <ol>
                                <li>Apmeklējiet lapu <a href="/add">Pievienot notikumu</a> un norādiet nepiecie&scaron;amo informāciju par jūsu programmē&scaron;anas pasākumu.</li>
                            </ol><i>Ja esat pirmais jūsu savienībā:</i><ol start="2">
                                <li>Klik&scaron;ķiniet uz &ldquo;Iesniegt&rdquo;.</li>
                                <li>Pēc jūsu pasākuma apstiprinā&scaron;anas jūs saņemsiet apstiprinājuma e-pastu ar unikālu &ldquo;Programmē&scaron;anas nedēļa visiem&rdquo; kodu.</li>
                                <li>Nokopējiet kodu un nosūtiet to saviem kolēģiem un citiem jūsu tīkla dalībniekiem, kas arī organizē programmē&scaron;anas pasākumu. Izplatiet informāciju, lai pamudinātu arī citus piedalīties!</li>
                                <li>Pēc kampaņas beigām visi pasākumu organizatori tiks aicināti paziņot iesaistīto dalībnieku skaitu. Ja jums izdevās sasniegt mērķi, jūs un jūsu kolēģi, kas piedalījās jūsu tīklā, saņems izcilības apliecinājuma sertifikātu!</li>
                            </ol><i>Ja jūs pievienojaties jau eso&scaron;ai savienībai:</i><ol start="2">
                                <li>Iekopējiet no savienības veidotāja saņemto kodu &ldquo;PROGRAMMĒ&Scaron;ANAS NEDĒĻA VISIEM&rdquo; KODA lauciņā.</li>
                                <li>Klik&scaron;ķiniet uz &ldquo;Iesniegt&rdquo;.</li>
                                <li>Izplatiet informāciju (un kodu!), lai pēc iespējas vairāk organizatoru pievienotos jūsu savienībai.</li>
                                <li>Pēc kampaņas beigām visi pasākumu organizatori tiks aicināti paziņot iesaistīto dalībnieku skaitu. Ja jums izdevās sasniegt mērķi, jūs un jūsu kolēģi, kas piedalījās jūsu tīklā, saņems izcilības apliecinājuma sertifikātu!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kāpēc pievienoties spēku pārbaudei?</template>
                        <template slot="content">
                            <ul>
                                <li>Lai izplatītu informāciju par programmē&scaron;anas nozīmīgumu.</li>
                                <li>Lai iesaistītu pēc iespējas vairāk skolēnu.</li>
                                <li>Lai veidotu sakarus ar organizācijām un/vai skolām jūsu kopienā vai starptautiskā mērogā.</li>
                                <li>Lai saņemtu citu organizatoru un skolotāju atbalstu.</li>
                                <li>Lai iegūtu <strong>izcilības apliecinājuma sertifikātu.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection