@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Provocarea &bdquo;Săptăm&acirc;na programării pentru toți&rdquo;</h1><span></span></div>

                    <hr>

                    <p>Provocarea &bdquo;Săptăm&acirc;na programării pentru toți&rdquo; vă &icirc;ncurajează să vă conectați activitățile cu altele organizate de prieteni, colegi și cunoștințe, c&acirc;știg&acirc;nd &icirc;mpreună certificatul de excelență al Săptăm&acirc;nii programării.</p>


                    <simple-question :visible="true">
                        <template slot="title">Ce este aceasta?</template>
                        <template slot="content">
                            <p>Suplimentar față de &icirc;nregistrarea activității dumneavoastră pe harta Săptăm&acirc;nii programării UE, puteți implica și alte persoane din rețeaua dumneavoastră să facă același lucru. Dacă dumneavoastră și alianța dumneavoastră atingeți unul dintre pragurile următoare, veți c&acirc;știga certificatul de excelență al Săptăm&acirc;nii programării!</p>
                            <p>Criterii pentru c&acirc;știgarea certificatului de excelență:</p>
                            <ul>
                                <li><strong>500 de studenți participanți</strong></li>și/sau<li><strong>10 activități conectate</strong></li>și/sau<li><strong>3 țări implicate</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Cum participați?</template>
                        <template slot="content">
                            <ol>
                                <li>Vizitați pagina <a href="/add">Adăugare activitate</a> și completați detaliile necesare ale activității dumneavoastră de programare.</li>
                            </ol><i>Dacă sunteți prima persoană din alianța dumneavoastră:</i><ol start="2">
                                <li>Faceți clic pe Trimite.</li>
                                <li>Odată ce activitatea dumneavoastră a fost acceptată, veți primi un e-mail de confirmare cu codul dumneavoastră unic pentru Săptăm&acirc;na programării pentru toți.</li>
                                <li>Copiați codul și partajați-l cu colegii dumneavoastră și cu alte persoane din rețeaua dumneavoastră care organizează o activitate de programare. Răsp&acirc;ndiți mesajul pentru a-i &icirc;ncuraja și pe alții să participe!</li>
                                <li>După &icirc;ncheierea campaniei, tuturor organizatorilor de activități li se va solicita să raporteze numărul de participanți implicați &icirc;n activitatea lor. Dacă ați reușit să atingeți pragul, dumneavoastră și colegii dumneavoastră care au făcut parte din rețeaua dumneavoastră veți primi certificatul de excelență!</li>
                            </ol><i>Dacă vă alăturați unei alianțe existente:</i><ol start="2">
                                <li>Lipiți codul pe care l-ați primit de la inițiator, pentru a crea mai &icirc;nt&acirc;i alianța, &icirc;n celula CODUL SĂPTĂM&Acirc;NII PROGRAMĂRII PENTRU TOȚI.</li>
                                <li>Faceți clic pe Trimite.</li>
                                <li>Răsp&acirc;ndiți mesajul (și codul!) pentru a determina mai mulți organizatori să se alăture alianței dumneavoastră.</li>
                                <li>După &icirc;ncheierea campaniei, tuturor organizatorilor de activități li se va solicita să raporteze numărul de participanți implicați &icirc;n activitatea lor. Dacă ați reușit să atingeți pragul, dumneavoastră și colegii dumneavoastră care au făcut parte din rețeaua dumneavoastră veți primi certificatul de excelență!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">De ce să vă alăturați provocării?</template>
                        <template slot="content">
                            <ul>
                                <li>Pentru a răsp&acirc;ndi mesajul cu privire la importanța programării.</li>
                                <li>Pentru a determina un număr mare de studenți să se implice.</li>
                                <li>Pentru a crea legături cu organizatori și/sau școli din comunitatea dumneavoastră sau la nivel internațional.</li>
                                <li>Pentru a găsi sprijin din partea altor organizatori și profesori.</li>
                                <li>Pentru a c&acirc;știga un <strong>certificat de excelență.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection