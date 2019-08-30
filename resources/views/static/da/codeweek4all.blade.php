@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Code Week 4 All-udfordringen</h1><span></span></div>

                    <hr>

                    <p>Code Week 4 All-udfordringen opfordrer dig til at linke alle dine aktiviteter til dem, som dine venner, kolleger og bekendte arrangerer, s&aring; I sammen kan f&aring; kodeugens kvalitetscertifikat.</p>


                    <simple-question :visible="true">
                        <template slot="title">Hvad er det?</template>
                        <template slot="content">
                            <p>Udover at vise din egen aktivitet p&aring; EU&rsquo;s kodeuges kort kan du ogs&aring; v&aelig;re med til at sikre, at andre i dit netv&aelig;rk g&oslash;r det samme. Hvis du og din alliance n&aring;r en af f&oslash;lgende milep&aelig;le, f&aring;r I alle kodeugens kvalitetscertifikat!</p>
                            <p>Kriterier for at f&aring; kvalitetscertifikatet:</p>
                            <ul>
                                <li><strong>500&nbsp;deltagende elever</strong></li>og/eller<li><strong>10&nbsp;linkede aktiviteter</strong></li>og/eller<li><strong>3&nbsp;involverede lande</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Hvordan deltager jeg?</template>
                        <template slot="content">
                            <ol>
                                <li>G&aring; ind p&aring; siden <a href="/add">Tilf&oslash;j en aktivitet</a>, og udfyld oplysningerne om din kodeaktivitet.</li>
                            </ol><i>Hvis du er den f&oslash;rste i din alliance:</i><ol start="2">
                                <li>Indsend din aktivitet.</li>
                                <li>N&aring;r din aktivitet er blevet accepteret, f&aring;r du en bekr&aelig;ftelses-e-mail med din unikke Code Week 4 All-kode.</li>
                                <li>Kopier koden, og del den med dine kolleger og andre i dit netv&aelig;rk, som ogs&aring; arrangerer kodeaktiviteter. Spred budskabet, og f&aring; andre til at deltage!</li>
                                <li>N&aring;r kampagnen er slut, vil alle, der har arrangeret aktiviteter, blive bedt om at indberette, hvor mange deltagere de har involveret. Hvis I n&aring;r en milep&aelig;l, f&aring;r du og dine kolleger i netv&aelig;rket kvalitetscertifikatet!</li>
                            </ol><i>Hvis du tilslutter dig en eksisterende alliance:</i><ol start="2">
                                <li>Inds&aelig;t den kode, du har f&aring;et af den f&oslash;rste person i alliancen, i feltet CODE WEEK 4 ALL-KODE.</li>
                                <li>Indsend aktiviteten.</li>
                                <li>Spred budskabet (og koden!) for at f&aring; flere arrang&oslash;rer til at deltage i jeres alliance.</li>
                                <li>N&aring;r kampagnen er slut, vil alle, der har arrangeret aktiviteter, blive bedt om at indberette, hvor mange deltagere de har involveret. Hvis I n&aring;r en milep&aelig;l, f&aring;r du og dine kolleger i netv&aelig;rket kvalitetscertifikatet!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Hvorfor skal jeg v&aelig;re med i udfordringen?</template>
                        <template slot="content">
                            <ul>
                                <li>For at sprede budskabet om vigtigheden ved at kode.</li>
                                <li>For at f&aring; flere elever involveret.</li>
                                <li>For at opbygge forbindelser til organisationer og/eller skoler i lokalsamfundet eller internationalt.</li>
                                <li>For at f&aring; st&oslash;tte fra andre arrang&oslash;rer og undervisere.</li>
                                <li>For at f&aring; et <strong>kvalitetscertifikat.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection