@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>L-isfida tal-Ġimgħa tal-Ikkowdjar għal Kulħadd</h1><span></span></div>

                    <hr>

                    <p>L-isfida tal-Ġimgħa tal-Ikkowdjar għal Kulħadd tħeġġek biex torbot l-attivitajiet tiegħek ma&rsquo; oħrajn organizzati minn ħbieb, kollegi u konoxxenti, u flimkien tingħataw iċ-Ċertifikat ta&rsquo; Eċċellenza tal-Ġimgħa tal-Ikkowdjar.</p>


                    <simple-question :visible="true">
                        <template slot="title">Xi jkun dan?</template>
                        <template slot="content">
                            <p>Minbarra li tissottometti l-attivit&agrave; tiegħek fuq il-mappa tal-Ġimgħa tal-UE tal-Ikkowdjar, tista&rsquo; wkoll tinvolvi lil oħrajn fin-netwerk tiegħek biex jagħmlu l-istess. Jekk inti u l-alleanza tiegħek tilħqu wieħed mil-limiti li ġejjin, se tingħataw ilkoll iċ-Ċertifikat ta&rsquo; Eċċellenza tal-Ġimgħa tal-Ikkowdjar!</p>
                            <p>Kriterji biex tingħata ċ-Ċertifikat ta&rsquo; Eċċellenza:</p>
                            <ul>
                                <li><strong>parteċipazzjoni ta&rsquo; 500 student</strong></li>U / Jew<li><strong>10 attivitajiet marbuta</strong></li>U / Jew<li><strong>3 pajjiżi involuti</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Kif tista&rsquo; tipparteċipa?</template>
                        <template slot="content">
                            <ol>
                                <li>Żur il-paġna <a href="/add">Żid Attivit&agrave;</a> u imla d-dettalji meħtieġa tal-attivit&agrave; tal-ikkowdjar tiegħek.</li>
                            </ol><i>Jekk inti l-ewwel wieħed fl-alleanza tiegħek:</i><ol start="2">
                                <li>Ikklikkja fuq Issottometti</li>
                                <li>Ladarba l-attivit&agrave; tiegħek tkun ġiet aċċettata, se tirċievi email ta&rsquo; konferma bil-kodiċi uniku tiegħek għall-Ġimgħa tal-Ikkowdjar għal Kulħadd.</li>
                                <li>Ikkopja l-kodiċi u aqsmu mal-kollegi tiegħek u ma&rsquo; oħrajn fin-netwerk tiegħek li qegħdin jorganizzaw ukoll attivit&agrave; tal-ikkowdjar. Xerred il-kelma biex tħeġġeġ lil oħrajn jipparteċipaw!</li>
                                <li>Wara t-tmiem tal-kampanja, l-organizzaturi tal-attivit&agrave; kollha se jintalbu jirrapportaw lura n-numru ta&rsquo; parteċipanti li involvew. Jekk kellkom suċċess u lħaqtu l-limitu, inti u l-kollegi tiegħek li kienu parti min-netwerk tiegħek se tirċievu ċ-Ċertifikat ta&rsquo; Eċċellenza!</li>
                            </ol><i>Jekk qed tingħaqad ma&rsquo; alleanza eżistenti:</i><ol start="2">
                                <li>Ippestja l-passcode li rċevejt mill-inizjatur, l-ewwel wieħed li beda jibni l-alleanza, fil-ċellola tal-qasam KODIĊI TAL-ĠIMGĦA TAL-IKKOWDJAR GĦAL KULĦADD.</li>
                                <li>Ikklikkja fuq Issottometti.</li>
                                <li>Xerred il-kelma (u l-kodiċi!) biex tikkonvinċi lil aktar organizzaturi jingħaqdu mal-alleanza tiegħek</li>
                                <li>Wara t-tmiem tal-kampanja, l-organizzaturi tal-attivit&agrave; kollha se jintalbu jirrapportaw in-numru ta&rsquo; parteċipanti li involvew. Jekk kellkom suċċess u lħaqtu l-limitu, inti u l-kollegi tiegħek li kienu parti min-netwerk tiegħek se tirċievu ċ-Ċertifikat ta&rsquo; Eċċellenza!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Għaliex għandek tingħaqad mal-isfida?</template>
                        <template slot="content">
                            <ul>
                                <li>Biex ixxerred il-messaġġ dwar l-importanza tal-ikkowdjar.</li>
                                <li>Biex tara l-involviment ta&rsquo; numru kbir ta&rsquo; studenti.</li>
                                <li>Biex tibni konnessjonijiet ma&rsquo; organizzazzjonijiet u/jew skejjel fil-komunit&agrave; tiegħek jew fuq livell internazzjonali.</li>
                                <li>Biex issib appoġġ minn organizzaturi u għalliema oħrajn.</li>
                                <li>Biex tingħata <strong>Ċertifikat ta&rsquo; Eċċellenza.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection