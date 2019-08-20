@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Code Week 4 All (Herkes i&ccedil;in Kod Haftası) m&uuml;cadelesi</h1><span></span></div>

                    <hr>

                    <p>Code Week 4 All m&uuml;cadelesi, sizi, kendi aktivitelerinizi, dostlarınızın, iş arkadaşlarınızın ve tanıdıklarınızın d&uuml;zenlediği aktivitelere dahil etmeye ve b&ouml;ylece, birlikte Code Week (Kod Haftası) M&uuml;kemmeliyet Sertifikasını elde etmeye teşvik eder.</p>


                    <simple-question :visible="true">
                        <template slot="title">Nedir?</template>
                        <template slot="content">
                            <p>Aktivitenizi EU Code Week haritasına g&ouml;ndermenin yanı sıra, ağınızdaki diğer kişilerin de aynısını yapmalarını sağlayabilirsiniz. Ekibinizle birlikte aşağıdaki koşullardan birini sağladığınızda, hepiniz Code Week M&uuml;kemmeliyet Sertifikasını kazanacaksınız!</p>
                            <p>M&uuml;kemmeliyet Sertifikası kazanma kriterleri:</p>
                            <ul>
                                <li><strong>500 &ouml;ğrencinin katılımını sağlama</strong></li>Ve/Veya<li><strong>10 aktivite ekleme</strong></li>Ve/Veya<li><strong>3 &uuml;lke dahil etme</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Nasıl katılabilirim?</template>
                        <template slot="content">
                            <ol>
                                <li><a href="/add">Aktivite Ekle</a> sayfasını ziyaret edin ve kodlama aktivitenize ilişkin gerekli bilgileri doldurun.</li>
                            </ol><i>Yeni bir ekip kuruyorsanız:</i><ol start="2">
                                <li>G&ouml;nder&rsquo;e Tıklayın</li>
                                <li>Aktiviteniz kabul edildiğinde, size &ouml;zel Code Week 4 All kodunuzun yer aldığı bir onay e-postası alacaksınız.</li>
                                <li>Kodu kopyalayın ve ağınızdaki kodlama aktivitesi d&uuml;zenleyen iş arkadaşlarınızla ve diğerleriyle paylaşın. Başkalarını da bilgilendirerek katılmaya teşvik edin!</li>
                                <li>Kampanya sona erdikten sonra, t&uuml;m aktivite organizat&ouml;rlerinden ka&ccedil; katılımcıyı dahil ettiklerine dair bilgi vermeleri istenecektir. Koşullardan herhangi birini yerine getirebildiğiniz takdirde, ağınızın bir par&ccedil;ası olan iş arkadaşlarınızla birlikte M&uuml;kemmeliyet Sertifikasını kazanacaksınız!</li>
                            </ol><i>Mevcut bir ekibe katılıyorsanız:</i><ol start="2">
                                <li>Ekibi kurmuş olan ekip liderinden aldığınız kodu CODE WEEK 4 ALL KODU alanına yapıştırın.</li>
                                <li>G&ouml;nder&rsquo;e Tıklayın.</li>
                                <li>Daha fazla organizat&ouml;r&uuml;n ekibinize katılmasını sağlamak i&ccedil;in herkesi bilgilendirin ve kodu paylaşın!</li>
                                <li>Kampanya sona erdikten sonra, t&uuml;m aktivite organizat&ouml;rlerinden ka&ccedil; katılımcıyı dahil ettiklerine dair bilgi vermeleri istenecektir. Koşullardan herhangi birini yerine getirebildiğiniz takdirde, ağınızın bir par&ccedil;ası olan iş arkadaşlarınızla birlikte M&uuml;kemmeliyet Sertifikasını kazanacaksınız!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">M&uuml;cadeleye neden katılmalıyım?</template>
                        <template slot="content">
                            <ul>
                                <li>Kodlamanın &ouml;nemine ilişkin mesajı yaymak i&ccedil;in.</li>
                                <li>&Ccedil;ok sayıda &ouml;ğrencinin katılımını sağlamak i&ccedil;in.</li>
                                <li>Ulusal veya uluslararası organizasyonlarla ve/veya okullarla bağlantılar kurmak i&ccedil;in.</li>
                                <li>Diğer organizat&ouml;rlerin ve &ouml;ğretmenlerin desteğini almak i&ccedil;in.</li>
                                <li><strong>M&uuml;kemmeliyet Sertifikası</strong> almak i&ccedil;in.</li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection