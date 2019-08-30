@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Sfida Code Week 4 All</h1><span></span></div>

                    <hr>

                    <p>Sfida Code Week 4 All ju inkurajon t&euml; lidhni aktivitetet tuaja me aktivitetet e tjera t&euml; organizuara nga miqt&euml;, koleg&euml;t dhe t&euml; njohurit, dhe s&euml; bashku t&euml; fitoni Certifikat&euml;n e P&euml;rsosm&euml;ris&euml; t&euml; Code Week.</p>


                    <simple-question :visible="true">
                        <template slot="title">&Ccedil;far&euml; &euml;sht&euml; kjo?</template>
                        <template slot="content">
                            <p>P&euml;rve&ccedil; paraqitjes s&euml; aktivitetit tuaj n&euml; hart&euml;n e EU Code Week, ju mund t&euml; angazhoni edhe t&euml; tjer&euml; n&euml; rrjetin tuaj q&euml; t&euml; b&euml;jn&euml; t&euml; nj&euml;jt&euml;n gj&euml;. N&euml;se ju dhe partner&euml;t tuaj arrini nj&euml; prej kufijve t&euml; m&euml;posht&euml;m, ju t&euml; gjith&euml; do t&euml; fitoni Certifikat&euml;n e P&euml;rsosm&euml;ris&euml; s&euml; Code Week!</p>
                            <p>Kriteret p&euml;r t&euml; fituar Certifikat&euml;n e P&euml;rsosm&euml;ris&euml;:</p>
                            <ul>
                                <li><strong>500 student&euml; pjes&euml;marr&euml;s</strong></li>Dhe / ose<li><strong>10 aktivitete t&euml; lidhura</strong></li>Dhe / ose<li><strong>3 shtete t&euml; p&euml;rfshira</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Si t&euml; merrni pjes&euml;?</template>
                        <template slot="content">
                            <ol>
                                <li>Vizitoni faqen <a href="/add">Shto aktivitet</a> dhe plot&euml;soni t&euml; dh&euml;nat e nevojshme t&euml; aktivitetit tuaj t&euml; kodimit.</li>
                            </ol><i>N&euml;se jeni i pari nd&euml;r partner&euml;t tuaj:</i><ol start="2">
                                <li>Klikoni te &ldquo;D&euml;rgo&rdquo;.</li>
                                <li>Pasi aktiviteti juaj t&euml; jet&euml; pranuar, do t&euml; merrni nj&euml; email konfirmimi me kodin tuaj unik Code Week 4 All.</li>
                                <li>Kopjojeni kodin dhe ndajeni me koleg&euml;t tuaj dhe t&euml; tjer&euml;t n&euml; rrjetin tuaj q&euml; po organizojn&euml; gjithashtu nj&euml; aktivitet kodimi. P&euml;rhapni fjal&euml;n p&euml;r t&euml; inkurajuar t&euml; tjer&euml;t t&euml; marrin pjes&euml;!</li>
                                <li>Pas p&euml;rfundimit t&euml; fushat&euml;s, t&euml; gjith&euml; organizator&euml;ve t&euml; aktivitetit do t&rsquo;u k&euml;rkohet t&euml; raportojn&euml; se sa pjes&euml;marr&euml;s kan&euml; p&euml;rfshir&euml;. N&euml;se arrini kufirin me sukses, ju dhe koleg&euml;t tuaj q&euml; jan&euml; pjes&euml; e rrjetit tuaj do t&euml; merrni Certifikat&euml;n e P&euml;rsosm&euml;ris&euml;!</li>
                            </ol><i>N&euml;se po bashkoheni me nj&euml; partneritet ekzistues:</i><ol start="2">
                                <li>Ngjisni kodin q&euml; keni marr&euml; nga nism&euml;tari, personi i par&euml; q&euml; nd&euml;rtoi partneritetin, n&euml; qeliz&euml;n e fush&euml;s KODI I CODE WEEK 4 ALL.</li>
                                <li>Klikoni te &ldquo;D&euml;rgo&rdquo;.</li>
                                <li>P&euml;rhapni fjal&euml;n (dhe kodin!) q&euml; m&euml; shum&euml; organizator&euml; t&euml; bashkohen me aleanc&euml;n tuaj.</li>
                                <li>Pas p&euml;rfundimit t&euml; fushat&euml;s, t&euml; gjith&euml; organizator&euml;ve t&euml; aktivitetit do t&rsquo;u k&euml;rkohet t&euml; raportojn&euml; se sa pjes&euml;marr&euml;s kan&euml; p&euml;rfshir&euml;. N&euml;se arrini kufirin me sukses, ju dhe koleg&euml;t tuaj q&euml; jan&euml; pjes&euml; e rrjetit tuaj do t&euml; merrni Certifikat&euml;n e P&euml;rsosm&euml;ris&euml;!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Pse t&euml; bashkoheni me sfid&euml;n?</template>
                        <template slot="content">
                            <ul>
                                <li>P&euml;r t&euml; p&euml;rhapur mesazhin rreth r&euml;nd&euml;sis&euml; s&euml; kodimit.</li>
                                <li>P&euml;r t&euml; par&euml; nj&euml; num&euml;r t&euml; madh student&euml;sh t&euml; p&euml;rfshir&euml;.</li>
                                <li>P&euml;r t&euml; krijuar lidhje me organizatat dhe/ose shkollat n&euml; komunitetin tuaj ose n&euml; nivel nd&euml;rkomb&euml;tar.</li>
                                <li>P&euml;r t&euml; gjetur mb&euml;shtetje nga organizator&euml; dhe m&euml;sues t&euml; tjer&euml;.</li>
                                <li>P&euml;r t&euml; fituar nj&euml; <strong>Certifikat&euml; P&euml;rsosm&euml;rie.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection