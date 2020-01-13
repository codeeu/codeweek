<?php

return [

    'title' => 'Tanımlama Bilgisi İlkesi',
    'what' => [
        'title' => 'Tanımlama bilgileri nelerdir?',
        'text' => '<p>Tanımlama bilgisi, siteyi ziyaret ettiğinizde web sitesinin bilgisayarınızda veya mobil cihazınızda depoladığı küçük bir metin dosyasıdır.</p>',
        'first_party' => '<strong>Birinci taraf tanımlama bilgileri</strong>, ziyaret ettiğiniz web sitesi tarafından belirlenen tanımlama bilgileridir. Bu bilgileri yalnızca o web sitesi okuyabilir. Ayrıca, bir web sitesi <strong>birinci taraf tanımlama bilgileri</strong> olarak bilinen kendi tanımlama bilgilerini belirleyen haricî hizmetleri de potansiyel olarak kullanabilir.',
        'persistent_cookies' => 'Kalıcı tanımlama bilgileri, bilgisayarınızda depolanan ve tarayıcınızdan çıktığınızda silinen oturum tanımlama bilgilerinin aksine tarayıcıdan çıktığınızda otomatik olarak silinmeyen tanımlama bilgileridir.',
        'items' => '<p>Codeweek web sitesini ilk ziyaretinizde, <strong>tanımlama bilgilerini kabul etmeniz veya reddetmeniz</strong> istenir.</p>

            <p>Burada amaç, sitenin belirli bir süre tercihlerinizi (kullanıcı adı, dil vb.) hatırlamasıdır.</p>

            <p>Bu şekilde, aynı ziyaret esnasında sitede gezinirken bu bilgileri yeniden girmek zorunda kalmazsınız.</p>

            <p>Tanımlama bilgileri ayrıca sitelerimizde gezinme deneyimi hakkında anonim istatistikleri tesis etmek için de kullanılabilir.</p>
            </p>'
    ],
    'how' => [
        'title' => 'Tanımlama bilgilerini nasıl kullanıyoruz?',
        'text1' => '<p>Codeweek çoğunlukla “birinci taraf tanımlama bilgilerini” kullanır. Bunlar herhangi bir haricî kuruluş tarafından değil, bizim tarafımızdan belirlenen ve denetlenen tanımlama bilgileridir.</p>',
        'text2' => '<p>Ancak, sayfalarımızın bazılarını görüntülemek için haricî kuruluşların tanımlama bilgilerini kabul etmeniz gerekir.</p>',
        '3types' => [
            'title' => 'Kullandığımız <strong>3 tür birinci taraf tanımlama bilgisini</strong> şu amaçlarla kullanırız:',
            '1' => 'ziyaretçi tercihlerini depolamak',
            '2' => 'web sitelerimizi operasyonel hâle getirmek',
            '3' => 'analiz verilerini toplamak (kullanıcı davranışı hakkında)'
        ],
        'table' => [
            'name'=>'Ad',
            'service'=>'Hizmet',
            'purpose'=>'Amaç',
            'type_duration'=>'Tanımlama bilgisi ve süresi',
        ],
        'visitor_preferences' => [
            'title'=> 'Ziyaretçi tercihleri',
            'text'=> '<p>Bu tercihler tarafımızdan belirlenir ve bunları yalnızca biz okuyabiliriz. Bunlar şu unsurları hatırlar:</p>',
            'item'=> 'sitenin tanımlama bilgisi ilkesini kabul edip (veya reddedip) etmediğinizi',
            'table' => [
                '1' => [
                    'service' => 'Tanımlama bilgisi onay paketi',
                    'purpose' => 'Tanımlama bilgisi tercihlerinizi depolar (böylece sizden tekrar istenmez)',
                    'type_duration' => 'Tarayıcınızdan çıktıktan sonra silinen birinci taraf tanımlama bilgisi',
                ]
            ]
        ],
        'operational_cookies' => [
            'title' => 'Operasyonel tanımlama bilgileri',
            'text' => '<p>Belli web sayfalarının çalışması için dâhil etmemiz gereken bazı tanımlama bilgileri bulunmaktadır. Bu sebeple bu bilgiler onayınızı gerektirmez. Özellikle:</p>',
            'item' => 'belli BT sistemlerinin gerektirdiği teknik tanımlama bilgileri'
        ],
        'technical_cookies' => [
            'title' => 'Teknik tanımlama bilgileri',
            'table' => [
                '1' => [
                    'purpose' => 'Ziyaretiniz esnasında sizin için güvenli bir oturum sağlar.',
                    'type_duration' => 'Tarayıcınızdan çıktıktan sonra silinen birinci taraf tanımlama bilgisi',
                ],
                '2' => [
                    'purpose' => 'Sizin için daha uzun süre güvenli bir oturum sağlayarak tarayıcı kapandığında oturumu kaybetmenizi önler.',
                    'type_duration' => 'Birinci taraf kalıcı tanımlama bilgisi, 60 ay',
                ],
                '3' => [
                    'purpose' => 'Kullanıcının tercih ettiği dili depolar',
                    'type_duration' => 'Tarayıcınızdan çıktıktan sonra silinen birinci taraf tanımlama bilgisi',
                ]
            ]
        ],
        'analytics_cookies' => [
            'title' => 'Analiz tanımlama bilgileri',
            'items' => '<p>Bu bilgileri tamamen tüm kullanıcılarımız için sağladığımız hizmeti nasıl geliştirebileceğimiz hususunda kurum içi araştırma yapmak üzere kullanıyoruz.</p>

            <p>Tanımlama bilgileri basit bir şekilde anonim bir kullanıcı olarak web sitemizle nasıl etkileşime geçtiğinizi değerlendirir (toplanan veriler kişisel olarak kimliğinizi belirlemez).</p>

            <p>Ayrıca, bu veriler üçüncü taraflarla paylaşılmaz ve başka bir amaçla kullanılmaz. Anonimleştirilen istatistikler, Komisyonla sözleşmeye dayalı anlaşma altında iletişim projelerinde çalışan yüklenicilerle paylaşılabilir.</p>

            <p>Ancak, bu tanımlama bilgisi türlerini ziyaret ettiğiniz ilk sayfada göreceğiniz tanımlama bilgisi başlığından veya bu <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">özel sayfayı</a> ziyaret ederek reddedebilirsiniz.</p>',
            'table' => [
                '1' => [
                    'service' => 'Matomo açık kaynak yazılımına dayalı web çözümleme hizmeti',
                    'purpose' => 'Web sitesi ziyaretçilerini tanır (anonim olarak - kullanıcı ile ilgili kişisel bilgi toplanmaz).',
                    'type_duration' => 'Birinci taraf kalıcı tanımlama bilgisi, 20 gün',
                ],
                '2' => [
                    'service' => 'Matomo açık kaynak yazılımına dayalı web çözümleme hizmeti',
                    'purpose' => 'Aynı ziyaret esnasında aynı kullanıcı tarafından görüntülenen sayfaları belirler. (anonim olarak - kullanıcı ile ilgili kişisel bilgi toplanmaz).',
                    'type_duration' => 'Birinci taraf kalıcı tanımlama bilgisi, 30 dakika',
                ]
            ]
        ]

    ],
    'third-party' => [
        'title' => 'Birinci taraf tanımlama bilgileri',
        'items' => [
            '1' => '<p>Sayfalarımızın bazıları haricî sağlayıcıların içeriğini görüntüler, ör. YouTube, Facebook ve Twitter.</p>

                <p>Üçüncü taraf içeriği görüntülemek için, öncelikle bu sağlayıcılara ait özel hükümleri ve koşulları kabul etmeniz gerekir. Bu, sağlayıcıların, bizim denetimimizde olmayan, tanımlama bilgisi ilkelerini içerir.</p>

                <p>Ancak bu içeriği görüntülemek istemezseniz, cihazınıza hiçbir üçüncü taraf tanımlama bilgisi yüklenmez.</p>Codeweek\'teki üçüncü taraf sağlayıcılar',
            '2' => 'Bu üçüncü taraf hizmetler Codeweek web sitesinin denetimi dışındadır. Sağlayıcılar herhangi bir zamanda hizmet, amaç, tanımlama bilgisi vb. unsurların hükümlerini değiştirebilir.'
        ]
    ],
    'how-manage' => [
        'title' => 'Tanımlama bilgilerini nasıl yönetebilirsiniz?',
        'items' => '<p>İstediğiniz zaman tanımlama bilgilerini <strong>yönetebilirsiniz/silebilirsiniz</strong> - ayrıntılar için bkz. <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Tanımlama bilgilerinin cihazınızdan kaldırılması</strong></p>

            <p>Tarayıcınızın göz atma geçmişini temizleyerek, hâlihazırda cihazınızda bulunan tüm tanımlama bilgilerini silebilirsiniz. Bu işlem, tanımlama bilgilerinin tümünü ziyaret ettiğiniz web sitelerinin hepsinden kaldırır.</p>

            <p>Bazı kayıtlı bilgilerinizi de kaybedebileceğinizi göz önünde bulundurun (ör. kayıtlı oturum açma ayrıntıları, site tercihleri).</p><strong>Siteye özel tanımlama bilgilerinin yönetimi</strong><p>Siteye özel tanımlama bilgileri hakkında daha fazla ayrıntı için, tercih ettiğiniz tarayıcıda gizlilik ve tanımlama bilgisi ayarlarını kontrol edin</p><strong>Tanımlama bilgilerinin engellenmesi</strong><p>Çoğu modern tarayıcıyı, tanımlama bilgilerinin cihazınıza yerleştirilmesini önlemek üzere ayarlayabilirsiniz ancak bir siteyi/sayfayı her ziyaret edişinizde bazı tercihleri manuel olarak ayarlamak zorunda kalabilirsiniz. Ve bazı hizmetler ve işlevler düzgün şekilde çalışmayabilir (ör. profil oturum açma).</p><strong>Analiz tanımlama bilgilerimizin yönetimi</strong><p>Tanımlama bilgileri ile ilgili tercihlerinizi <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">özel sayfadaki</a> Analytics uygulamasından yönetebilirsiniz.</p>'
    ]
];
