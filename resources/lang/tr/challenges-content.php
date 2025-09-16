<?php

return [
'create-your-own-website-with-html-and-css' => [
    'title' => 'HTML ve CSS ile Kendi Web Sitenizi Oluşturun',
    'author' => 'Marko Šolić',

    'purposes_title' => 'Zorluğun amacı',
    'purposes' => [
        'Bu zorluğun amacı, yeni başlayanları web geliştirme dünyasıyla tanıştırmaktır.',
        'Bu projeyi tamamladığınızda, web sayfaları oluşturmak ve stillendirmek için temel olan HTML ve CSS’in temellerini öğreneceksiniz.',
        'Zorluk, uygulamalı öğrenmeyi vurgular ve sıfırdan kendi web sitenizi kurmanıza yardımcı olur.',
        'Web tasarımında temel beceriler kazanacak ve çevrimiçi varlığınızı oluştururken daha güvenli hissedeceksiniz.'
    ],

    'description_title' => 'Zorluğun açıklaması',
    'description' => [
        'Web siteleri, çevrimiçi varlığın temelidir. Bu derste, içeriği yapılandırmak için HTML’yi ve ilk web sitenizi oluşturup stillendirmek için CSS’i kullanmayı öğreneceksiniz.',
        'Eğlenceli adımlarla, metin, görseller, renkler ve bağlantılar içerebilen bir sayfa oluşturacaksınız.'
    ],

    'target_audience_title' => 'Hedef kitle',
    'target_audience' => [
        'Bu zorluk, web sitesi oluşturmayı öğrenmek isteyen yeni başlayanlara yöneliktir.',
        'Web geliştirmede yeni olanlar, öğrenciler veya web sitelerinin nasıl kurulduğunu merak eden herkes için uygundur.',
        'Önceden kodlama deneyimi gerekmez.'
    ],

    'experience_title' => 'Deneyim',
    'experience' => [
        'Bu, başlangıç seviyesinde bir zorluktur. Bir metin düzenleyiciyi kullanmak gibi temel bilgisayar bilgisi yardımcı olabilir, ancak zorunlu değildir.',
        'Zorluk, HTML ve CSS’e giriş olarak tasarlanmıştır.'
    ],

    'duration_title' => 'Süre',
    'duration' => 'Bu zorluğun yaklaşık 1–2 saat sürmesi beklenir; deneyim düzeyinize ve temel konuların ötesinde ne kadar keşfettiğinize bağlıdır.',

    'materials_title' => 'Önerilen araçlar:',
    'materials' => [
        'PC / Dizüstü bilgisayar',
        'Not Defteri (Windows) veya TextEdit (Mac) gibi sıradan bir metin düzenleyici'
    ],

    'instructions_title' => 'Talimatlar',
    'instructions' => [
        'Başlamadan önce eğitmenler için ipuçları:',
        'Web geliştirmeye yeniyseniz endişelenmeyin! İşte öğrencileri sürece yönlendirmenize yardımcı olacak bazı ipuçları:',
        'Temellerle başlayın: HTML’nin (bir web sayfasının yapısı) ve CSS’in (öğelerin stilleri) temel kavramlarını açıklamaya odaklanın.',
        'Sabırlı olun ve her etiketi (tag) ve özelliğin amacını kavramaları için öğrencilere zaman tanıyın.',
        'Yapıyı açıklayın: HTML etiketlerini tanıtırken belgenin nasıl yapılandığını görsel olarak gösterin.',
        'Açılış/kapanış etiketleri, öznitelikler ve iç içe geçme (nesting) arasındaki ilişkiyi gösterin.',
        'Yaygın hatalardan kaçının: yeni başlayanlar sık sık etiketleri düzgün kapatmayı unutur veya CSS’te süslü parantezleri {} yanlış yere koyar.',
        'Öğrencilere düzenli olarak sözdizimi hatalarını kontrol etmelerini hatırlatın.',
        'Etkileşimli öğrenme: metin ve stilleri değiştirerek deneme yapmalarını teşvik edin.',
        'HTML veya CSS’teki küçük değişikliklerin tarayıcıyı yeniledikten sonra sayfada hemen nasıl göründüğünü gösterin.',
        'Yaratıcılığa açık olun: bir web sitesini tasarlamanın tek bir “doğru” yolu yoktur.',
        'Öğrencileri farklı yazı tiplerini, renkleri ve düzenleri keşfetmeye teşvik edin.',
        'Dikkat edilmesi gereken yaygın hatalar:',
        'CSS dosyasını HTML dosyasına bağlamayı unutmak.',
        'HTML’de hatalı etiket iç içelikleri.',
        'CSS özelliklerinde yazım hataları (ör. bazı durumlarda colour yerine color kullanmak).',
        'Sayfa yapısını gereksiz yere karmaşıklaştırmak — basit siteler de birkaç satır kodla oldukça profesyonel görünebilir!',

        'Adım 1: Ortamın hazırlanması',
        'Bir web sitesi oluşturmak için Not Defteri (Windows) veya TextEdit (Mac) gibi sıradan bir metin düzenleyici dışında özel araçlar kurmanız gerekmez.',
        'Tüm bir site basit bir metin düzenleyicide yapılabilir; internette tamamen bu şekilde yapılmış siteler bile vardır.',
        'Böyle bir siteye örnek görmek isterseniz, Hırvatistan Bilişim Derneği’nin web sitesine bakın: hsin.hr',

        'Adım 2: Temel HTML belge yapısı',
        'Düzenleyicinizde yeni bir belge açın ve index.html olarak kaydedin',
        'Kullandığınız Windows veya macOS sürümüne bağlı olarak önce dosya uzantılarını değiştirmenizi sağlayan seçeneği açmanız gerekebilir; çünkü index.txt’nin index.html olması gerekir',
        'Not Defteri gibi bir düzenleyicide HTML belgesinin temel yapısını girin:',
        '<!DOCTYPE html>',
        '<html lang="en">',
        '<head>',
        '<target charset="UTF-8">',
        '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
        '<title>My first website</title>',
        '</head>',
        '<body>',
        '<h1>Welcome to my website!</h1>',
        '<p>This is my first website I created using HTML and CSS.</p>',
        '</body>',
        '</html>',
        'CSS olmadan web siteniz şöyle görünmelidir (Hırvatça; sizin örneğiniz elbette Türkçe):',

        'Adım 3: CSS ile stiller ekleyin',
        'CSS, sayfadaki öğeleri stillendirmek için kullanılır. Başlangıç olarak arka plan rengi, metin rengi ve yazı tipi boyutu gibi temel stilleri ekleyeceğiz.',
        'Aynı klasörde yeni bir metin dosyası oluşturun ve adını style.css yapın.',
        'style.css dosyasına şunları yazın:',
        'body {',
        'background-colour: #f0f8ff; /* Light blue background */',
        'colour: #333; /* Dark Gray Text */',
        'font-family: Arial, sans-serif; /* Font for text */',
        'text-align: centre; /* Align text to centre */',
        '}',
        'h1 {',
        'colour: #4CAF50; /* Green title */',
        '}',
        'p {',
        'font-size: 18px; /* Paragraph font size */',
        'colour: #555; /* Gray-blue text for paragraph */',
        '}',

        'Adım 4: HTML’yi CSS’e bağlayın',
        'CSS dosyasını oluşturduktan sonra, onu HTML dosyasına bağlamanız gerekir.',
        'Bunu HTML belgesinin <head> bölümünde aşağıdaki kod satırını ekleyerek yapın:',
        '<link rel="stylesheet" href="style.css">',
        'Böylece HTML belgesi, stilleri CSS dosyasından kullanması gerektiğini “bilir”.',

        'Adım 5: Sayfanızı başlatın',
        'Her iki dosyayı kaydedin: index.html ve style.css.',
        'index.html dosyasına çift tıklayın ve internet tarayıcısında açın.',
        'Artık, ortalanmış metin ve eklediğiniz temel stillerle sitenizi göreceksiniz',
        'Web siteniz şimdi şöyle görünmelidir:',

        'STEM’de çeşitliliği teşvik etmek:',
        'Web geliştirme herkes içindir! Genç bir öğrenci, yeni kariyer arayan bir yetişkin ya da az temsil edilen bir gruptan biri olun — bu zorluk, web sitesi oluşturmanın heyecan verici dünyasını keşfetmeye davet ediyor.',
        'STEM alanlarında (Bilim, Teknoloji, Mühendislik, Matematik) tarihsel olarak çeşitlilik eksikliği vardır; cinsiyet, ırk veya geçmişten bağımsız olarak herkesin kodlama ve teknolojiyi keşfetmesi teşvik edilmelidir.',
        'Herkesin, web geliştirme dünyasını daha yaratıcı ve kapsayıcı kılabilecek benzersiz bakış açıları ve deneyimleri vardır.',
        'Siteniz üzerinde çalışırken, dijital dünyayı herkesin temsil edildiğini ve hoş karşılandığını hissedeceği bir yer haline nasıl getirebileceğinizi düşünün.',
        'Başlamak için teknoloji uzmanı olmanız gerekmez — öğrenmeye başlayın ve üzerine inşa edin!',

        'Web sitenizi erişilebilir yapın:',
        'Bir web sitesi oluştururken, engelli bireyler de dahil mümkün olduğunca çok kişinin kolayca erişebilmesini sağlamak önemlidir.',
        'Daha erişilebilir siteler için ipuçları:',
        'Kontrast: arka plan ile metin rengi arasında iyi bir kontrast sağlayın; bu, görme güçlüğü çekenler için okumayı kolaylaştırır.',
        'Örneğin, açık arka plan ve koyu metin en iyi sonucu verir.',
        'Görseller için alternatif metin: ileriki adımlarda görsel eklerseniz, görselin ne olduğunu açıklayan alt metin ekleyin.',
        'Bu, ekran okuyucu kullanan kişiler için özellikle faydalıdır.',
        'Anlamlı (semantik) HTML: daha iyi yapı ve erişilebilirlik için doğru HTML etiketlerini kullanın.',
        'Örneğin, ana başlık için <h1> ve paragraflar için <p> kullanın — bu, ekran okuyucuların içeriği daha iyi anlamasına yardımcı olur.',
        'Okunabilirliğe odaklanın: Arial gibi basit, serifsiz bir yazı tipi kullanın.',
        'Okunabilirliği artırmak için yazı tipi boyutunu da büyütebilirsiniz.',
    ],

    'mini_simulation_title' => 'Mini simülasyon:',
    'mini_simulation' => [
        'Bilginizi test edin',
        '1. HTML nedir?',
        'Görsel oluşturmaya yönelik programlama dili',
        'Bir web sitesinde içeriği yapılandırma dili',
        'Görsel düzenleme programı',
        '2. CSS nedir?',
        'Çevrimiçi veritabanları oluşturma dili',
        'Web sitelerini stillendirme ve yerleşimlendirme dili',
        'Bilgisayar dosyalarını yönetme programı',
        '3. CSS’i HTML’e nasıl bağlarız?',
        'HTML belgesinde <link> etiketini kullanarak',
        '<style> etiketlerini HTML içinde kullanarak',
        'Bağlanamaz',
        'Doğru cevaplar: 1.b, 2.b, 3.a',
        'Sayfanızı düzenleyin:',
        'Arka plan rengini değiştirmeyi deneyin.',
        'Ana başlığın altına başka bir başlık (h2) ekleyin.',
        'Başka bir siteye bağlantı ekleyin (ör. Google).',
        'Her değişiklikten sonra sayfayı yenileyin!',
    ],

    'additional_resources_title' => 'Ek kaynaklar:',
    'additional_resources' => [
        'https://developer.mozilla.org/en-US/docs/Web/HTML',
        'https://developer.mozilla.org/en-US/docs/Web/CSS',
    ]
],


    'train-it-like-fei-fei-li' => [
    'title' => 'Fei-Fei Li gibi eğit – Bilgisayarlara görmeyi öğret!',
    'author' => 'Chouliara Theodora',
    'purposes_title' => 'Mücadelenin amacı',
    'purposes' => [
        'Makine öğrenmesi ve görsel tanımanın temellerini öğrenmek.',
        'Bilgisayarı farklı görselleri ayırt etmesi için eğitmek (ör. köpek/kedi, oyuncak bebek/ayıcık).',
        'Yapay zekanın ve makine öğrenmesinin gerçek hayattaki kullanım alanlarını keşfetmek.',
        'Yapay zeka ve görsel tanıma alanındaki öncü bilim insanı Fei-Fei Li’den ilham almak.',
        'Kız öğrencileri kodlama ve STEM alanlarında cesaretlendirmek.'
    ],
    'description_title' => 'Meydan okumanın açıklaması',
    'description' => [
        'Tıpkı Fei-Fei Li gibi bir yapay zekâ modeli eğitin! Teachable Machine kullanarak bilgisayarı görselleri tanıyacak şekilde eğitin ve makine öğrenmesinin gücünü keşfedin. Aynı zamanda teknoloji dünyasında toplumsal cinsiyet kalıplarına meydan okuyun.'
    ],
    'target_audience_title' => 'Hedef kitle',
    'target-audience' => [
        'İlkokul öğrencileri (6–12 yaş)'
    ],
    'experience_title' => 'Deneyim',
    'experience' => 'Başlangıç seviyesi – Önceden programlama bilgisi gerekmez; tamamen yeni başlayanlara uygundur.',
    'duration_title' => 'Süre',
    'duration' => '60 dakika',
    'materials_title' => 'Gerekli materyaller',
    'materials' => [
        'Teachable Machine (web tarayıcısı üzerinden erişilebilir)',
        'Kameralı bilgisayar veya tablet',
        'İnternet bağlantısı (modeli eğitmek için)',
        'Oyuncaklar ve sınıf nesneleri (ör. bebekler, ayıcıklar) eğitim verisi için',
        'Projeksiyon cihazı veya ekran (opsiyonel, sınıf sunumları için)'
    ],
    'instructions_title' => 'Yönergeler',
    'instructions' => [
        'Adım 1: Makine öğrenmesini ve Fei-Fei Li’yi tanıtın – bilgisayarların görselleri nasıl tanıyabileceğini açıklayın; Fei-Fei Li ve ImageNet’i tanıtın.',
        'Adım 2: Teachable Machine’i açın – https://teachablemachine.withgoogle.com/train adresine gidin, “Image Project” ve ardından “Standard Image Model” seçin.',
        'Adım 3: Kategorileri seçin – ör. Bebekler ve Ayıcıklar.',
        'Adım 4: Eğitim görsellerini toplayın – gerçek nesneler kullanın veya internetten görseller yükleyin.',
        'Adım 5: Modeli eğitin – “Train Model”e tıklayın ve tamamlanmasını bekleyin.',
        'Adım 6: Modeli test edin – daha önce kullanılmamış nesneler veya görsellerle deneyin.',
        'Adım 7: Değerlendirin – doğruluğu, hataları ve nasıl iyileştirilebileceğini tartışın.',
        'Adım 8: Kaydedin ve paylaşın – “Export Model” veya “Share” seçeneklerini kullanın.'
    ],
    'real-life-applications_title' => 'Gerçek yaşam uygulamaları',
    'real-life-applications' => [
        'Mağaza ve perakende sektöründe yapay zekâ: Kameralar ürünleri tanıyabilir, stok takibi yapabilir; kasasız ödeme sistemleri barkod olmadan ürünleri algılayabilir.',
        'Erişilebilirlikte yapay zekâ: Görme engelli kişilere yardımcı olmak için yapay zekâ, çevreyi tanıyıp gerçek zamanlı betimlemeler yapabilir.'
    ],
],
    'simulate-dice-in-python' => [
    'title' => 'Python ile Zar Atmayı Simüle Et',
    'author' => 'Marko Šolić',
    'purposes_title' => 'Mücadelenin amacı',
    'purposes' => [
        'Öğrencilere Python’da rastgele sayı üretimi ve döngüleri tanıtmak.',
        'Zar atma simülasyonu sayesinde bilgisayarların rastgele sonuçlar üretebilmesini ve döngüler kullanarak işlemleri tekrarlamayı öğretmek.',
        'Basit oyunlar ve simülasyonlar geliştirmek için temel oluşturmak.'
    ],
    'description_title' => 'Meydan okumanın açıklaması',
    'description' => [
        'Zar atma simülasyonu, Python’da rastgele sayılarla çalışmayı öğrenmek için harika bir yoldur.',
        'Bu derste random modülünü kullanarak rastgele sayılar üretmeyi ve bu sayıları zar atmayı simüle etmek için kullanmayı öğreneceğiz.',
        'Bu görev sayesinde Python’un belirli bir aralıkta nasıl sayı üretebildiğini anlayacaksınız.'
    ],
    'target_audience_title' => 'Hedef kitle',
    'target_audience' => 'İlkokul ve ortaokul öğrencileri, Python’a yeni başlayanlar, rastgele sayılar, oyunlar veya temel programlama mantığını öğrenmek isteyen herkes.',
    'experience_title' => 'Deneyim',
    'experience' => 'Önceden programlama deneyimi gerekli değildir. Temel bilgisayar kullanımı yeterlidir.',
    'duration_title' => 'Süre',
    'duration' => 'Basit sürüm için 30–45 dakika. Gelişmiş seçenekler (iki zar, en sık gelen atış vb.) için 60 dakikaya kadar.',
    'materials_title' => 'Önerilen araç',
    'materials' => [
        'Bilgisayarınıza Python kurulu olmalıdır. Henüz kurulu değilse https://www.python.org adresinden indirin.',
        'Python IDLE veya herhangi bir metin editörü (ör. Visual Studio Code, PyCharm).'
    ],
    'instructions_title' => 'Yönergeler',
    'instructions' => [
        'Adım 1: Ortamı hazırlayın – Python’u bilgisayarınıza kurun ve IDLE veya bir editör açın.',
        'Adım 2: Programı yazın – dice.py adında yeni bir dosya oluşturun ve aşağıdaki kodu yazın:',
        'import random',
        'print("Zar simülasyonuna hoş geldiniz!")',
        'throw_num = int(input("Kaç kez zar atmak istersiniz? "))',
        'for i in range(throw_num):',
        '    result = random.randint(1, 6)',
        '    print(f"{i + 1}. Atış: {result}")',
        'print("Oynadığınız için teşekkürler!")',
        'İndentasyonlara dikkat edin!',
        'Adım 3: Kodu açıklayın – random.randint(a, b) fonksiyonu a ile b arasında rastgele bir tam sayı üretir. Program kullanıcıdan atış sayısını ister ve bir döngüyle işlemi tekrarlar.',
        'Adım 4: Programı çalıştırın – dice.py olarak kaydedin, IDLE’da çalıştırın, kaç kez zar atmak istediğinizi girin ve sonuçları görün.'
    ],
    'quiz_title' => 'Bilgi testi:',
    'quiz' => [
        'Python’da rastgele sayı üretmek için hangi modül kullanılır?',
        'a) random', 'b) Math', 'c) Time',
        'random.randint(1, 6) fonksiyonu ne yapar?',
        'a) 1 ile 6 arasında rastgele bir sayı üretir',
        'b) Ekrana rastgele bir sayı yazar',
        'c) 1 ile 6 arasında bir sayı yazar',
        'Kullanıcı girişini tam sayıya dönüştürmek için hangi fonksiyon kullanılır?',
        'a) float(s)', 'b) int()', 'c) p()',
        'Doğru cevaplar: 1.a, 2.a, 3.b'
    ],
    'mini_simulation_title' => 'Mini simülasyon:',
    'mini_simulation' => [
        'Programı değiştirin:',
        'İki zar atışı yapıp sonuçlarını toplayan bir seçenek ekleyin.',
        'Programın en çok çıkan zar değerini yazdırmasını sağlayın.'
    ],
    'additional_resources_title' => 'Ek kaynaklar:',
    'additional_resources' => [
        'Python resmi belgeleri – random modülü',
        'Learn Python'
    ],
],

    'gender-gap-gender-graph' => [
    'title' => 'Toplumsal Cinsiyet Açığı, Toplumsal Cinsiyet Grafiği',
    'author' => 'Theodora S. Tziampazi',
    'purposes_title' => 'Mücadelenin amacı',
    'purposes' => [
        'Veri görselleştirmesinin algılarımızı nasıl etkileyebileceğini anlamak.',
        'Dijital araçlarda önyargıları etkileşim yoluyla tanımlamak.',
        'Yanlılıkları keşfetmek için veri girişleriyle denemeler yapmak.',
        'Doğru veri temsili için kodu düzenlemek.',
        'Adil ve yanlı veri görselleştirmelerini karşılaştırmak.',
        'Veri manipülasyonunun etik sonuçlarını tartışmak.',
        'Yanlış temsil edilen istatistiklerin gerçek hayattaki etkilerini tartışmak.',
        'Yapay zeka ve algoritmik önyargılar hakkında eleştirel düşünme geliştirmek.'
    ],
    'description_title' => 'Meydan okumanın açıklaması',
    'description' => [
        'Değerler girerek, hataları analiz ederek, kodu ayarlayarak ve dijital araçların teknoloji alanındaki toplumsal cinsiyet temsiline dair algımızı nasıl etkilediğini tartışarak veri görselleştirmedeki yanlılığı keşfedin.'
    ],
    'target_audience_title' => 'Hedef kitle',
    'target-audience' => [
        'İlkokul öğrencileri (6–12 yaş)',
        'Ortaokul öğrencileri (12–16 yaş)',
        'Lise öğrencileri (16–18 yaş)',
        'Öğretmenler ve eğitimciler'
    ],
    'experience_title' => 'Deneyim',
    'experience' => [
        'Orta seviye – temel programlama bilgisi önerilir.',
        'İleri seviye – güçlü kodlama becerilerine ve deneyime sahip olanlar için.'
    ],
    'duration_title' => 'Süre',
    'duration' => '2 saat',
    'materials_title' => 'Gerekli materyaller',
    'materials' => [
        'Scratch 3',
        'Çalışma sayfası: https://docs.google.com/document/d/1wKwrc825if8-W6QDeNJ3hv2PcPcXIbAw/edit?usp=sharing'
    ],
    'instructions_title' => 'Yönergeler',
    'instructions' => [
        'Bu dijital aracı kullanın (çubuk grafik oluştur): https://scratch.mit.edu/projects/1147892829. Henüz koda bakmayın. Yeşil bayrağa tıklayın ve teknoloji alanındaki kadınların sayısını temsil eden değerler (1–10) girin. Farklı değerler deneyin.',
        'Ne fark ettiniz?',
        'Bu bir hata mı yoksa bilinçli bir tercih mi?',
        'Nasıl çözülebilir?',
        'Kullanıcı düzeyi: aracı ve taşınabilir tüm spriteları inceleyin. Sorunu düzeltebileceğiniz bir nokta var mı? Yoksa beklenmeyen bir sonuç mu çıkıyor?',
        'Tartışma: Kadınların teknoloji alanındaki sayısı az gösterilirse ya da çok gösterilirse ne olurdu? Rakamlar doğru olsa bile dengesizlik devam ederse ne olurdu?',
        'Farkındalık: Aracı nasıl kullandığımız (ör. bileşenleri yerleştirme şeklimiz) sonucu etkiler.',
        'Kodlama düzeyi: Projeyi açın. Temel görev – girilen verilerle eşleşen doğru verilerin görüntülenmesini sağlamak için kodu düzenleyin.',
        'İleri görev – çubuk sprite’ını kopyalayın, maviye (erkek) boyayın, y-konumunu değiştirin, yeni bir sprite olarak erkek sembolü ekleyin. Hem adil hem de yanlı versiyonları oluşturun ve kodlamanın farkı nasıl artırabileceğini ya da azaltabileceğini keşfedin.',
        'Çözüm (aynı kod): https://scratch.mit.edu/projects/1151892036'
    ],
    'discussion_title' => 'Tartışma',
    'discussion' => [
        'Bir dijital araç hem tarafsız hem de önyargılı olabilir mi?',
        'Önyargı nerede “saklı” – bileşenlerin nasıl sürüklendiğinde mi yoksa kodun içinde mi?',
        'Yanlış bir temsil bazen faydalı olabilir mi?',
        'Amaç, yanlış veriyi haklı çıkarabilir mi yoksa gerçek her zaman doğru şekilde mi temsil edilmeli?',
        'Yapay zeka bu görevde gördüğünüz kalıpları nasıl tekrarlayabilir?',
        'Ek sorular: Veriyi nasıl topluyoruz? Nasıl işliyoruz? Algoritmalardaki gizli istatistikler davranışımızı nasıl yönlendiriyor?',
        'Farkındalık: Bir aracı nasıl tasarladığımız, sonucu ve dünyayı nasıl algıladığımızı etkiler.'
    ],
    'real-life-applications_title' => 'Gerçek yaşam uygulamaları',
    'real-life-applications' => [
        'İş yerlerinde çeşitlilik raporları – toplumsal cinsiyet dağılımını doğru temsil etmek.',
        'Medya grafiklerinde – toplumsal cinsiyet eşitliğiyle ilgili haberlerde yanıltıcı görsellerden kaçınmak.',
        'Yapay zeka ve algoritmik önyargı – makine öğrenmesi modellerindeki yanlılığı belirlemek ve azaltmak.',
        'İşe alım ve İK analiz araçları – karar verme süreçlerinde adil temsil sağlamak.',
        'STEM eğitimi – tarafsız verilerle teknoloji alanında kadınların katılımını artırmak.',
        'Kamu politikaları – doğru veriye dayalı adil politikalar üretmek.',
        'Sosyal medya ve kampanyalar – değişimi desteklemek için adil görselleştirmeler kullanmak.'
    ],
],

    'dance-with-ally' => [
    'title' => 'Ally ile Dans Et',
    'author' => 'Kristina Krtalić',
    'purposes_title' => 'Mücadelenin amacı',
    'purposes' => [
        'micro:bit\'i Bluetooth üzerinden Scratch\'e bağlamayı öğrenmek.',
        'Scratch micro:bit uzantısını nasıl kullanacağını anlamak.',
        'micro:bit düğmelerini Scratch projeleriyle etkileşim için kullanmak.',
        'micro:bit ile etkileşimli oyunlar geliştirmek.',
        'Problem çözme ve mantıksal düşünme becerilerini geliştirmek.',
        'Kodlama yoluyla yaratıcılığı artırmak.'
    ],
    'description_title' => 'Meydan okumanın açıklaması',
    'description' => [
        'micro:bit kullanarak Scratch karakterinin (sprite) dans etmesini sağlayan bir program oluştur.'
    ],
    'educational_goals_title' => 'Eğitim hedefleri',
    'educational_goals' => [
        'Programlama mantığı: Öğrenciler micro:bit girişlerine tepki veren olay tabanlı programlar için Scratch bloklarını kullanır; döngüler, koşullar ve değişkenleri anlar; dijital ve fiziksel giriş/çıkışlarla etkileşimi öğrenir.',
        'Hesaplamalı düşünme: Problemleri küçük parçalara ayırır, micro:bit sensör verilerini (düğmeler, sallama) kullanır ve algoritmalar geliştirir.',
        'Hata ayıklama ve iyileştirme: Scratch kodunu ve micro:bit etkileşimini test etme, hata bulma, düzeltme ve geliştirme.',
        'Yaratıcılık ve tasarım düşüncesi: micro:bit girişlerine dayalı animasyonlar, oyunlar veya hikâyeler tasarlama.',
        'İş birliği ve iletişim: Ekiplerle etkileşimli projeler tasarlama ve kodlama, çözümleri paylaşma ve kod mantığını açıklama.'
    ],
    'target_audience_title' => 'Hedef kitle',
    'target-audience' => [
        'İlkokul öğrencileri (6–12 yaş)',
        'Ortaokul öğrencileri (12–16 yaş)'
    ],
    'experience_title' => 'Deneyim',
    'experience' => 'Orta seviye – temel programlama bilgisi önerilir.',
    'duration_title' => 'Süre',
    'duration' => '60 dakika',
    'materials_title' => 'Gerekli materyaller',
    'materials' => [
        'Bilgisayar',
        'Scratch (https://scratch.mit.edu/)',
        'Scratch Link (https://scratch.mit.edu/download/scratch-link)',
        'Scratch micro:bit uzantısı (https://scratch.mit.edu/microbit)',
        'micro:bit',
        'Ally karakteri (sprite) (https://codeweek-s3.s3-eu-west-1.amazonaws.com/chatbot/ally.png)'
    ],
    'instructions_title' => 'Yönergeler',
    'instructions' => [
        'Scratch\'i aç.',
        'Scratch hesabı oluştur (henüz yoksa).',
        'Yeni bir proje başlat, sprite ve arka plan ekle, başlangıç konumunu ayarla.',
        'Uzantılar bölümünden micro:bit bloklarını ekle.',
        'micro:bit\'i bilgisayara bağla ve Bluetooth\'u etkinleştir.',
        'Scratch Link uygulamasını yükle ve çalıştır, micro:bit HEX dosyasını indir ve cihaza yükle.',
        'Scratch micro:bit uzantısını aç, turuncu düğmeye tıkla ve cihazı eşleştir.',
        'micro:bit sallandığında karakterin dans etmesini sağlayan bir program yaz. Projeni kaydet.',
        'Projeni genişlet: A/B düğmeleriyle kontrol, yeni hareketler veya görünümler ekle.'
    ],
    'real-life-applications_title' => 'Gerçek yaşam uygulamaları',
    'real-life-applications' => [
        'Etkileşimli dans ve fitness uygulamaları: micro:bit\'in ivmeölçerini kullanarak hareketleri takip etme ve oyunlar geliştirme.',
        'Hareket tabanlı animasyonlar ve oyunlar: el hareketleri veya cihazı eğme ile karakterleri kontrol etme.'
    ],
],

    'coding-for-the-ocean' => [
    'title' => 'Okyanus İçin Kodlama - Denizleri Kurtarmak İçin Yapay Zeka Botunuzu Oluşturun',
    'author' => 'Teresa Silvestri',
    'purposes_title' => 'Mücadelenin amacı',
    'purposes' => [
        'Çevre sorunlarını çözmek için yapay zekayı kullanma becerisi.',
        'Bir yapay zeka botu oluşturma ve programlama becerisi.',
        'İklim değişikliği ve deniz ortamını korumanın önemi hakkında bilgi.',
        'Bilim ve teknoloji bağlamında problem çözme becerileri.',
        'Gerçek dünyadaki zorluklara uygulanabilen mantıksal düşünme becerisinin geliştirilmesi.',
        'Çevresel tehditlere yanıt verebilecek bir bot tasarlamada yaratıcılık.',
        'Code.org gibi kodlama platformlarını kullanma konusunda pratik deneyim.',
        'Botları paylaşırken ve sınıf arkadaşlarıyla rekabet ederken takım çalışması ve iş birliği.'
    ],
    'description_title' => 'Meydan okumanın açıklaması',
    'description' => [
        'Denizleri korumak için bir yapay zeka botu oluşturun ve eğitin!',
        'Kod yazmayı, çevre sorunlarını çözmeyi ve deniz ortamını korumak için mantıksal düşünmeyi öğrenin.'
    ],
    'educational_goals_title' => 'Eğitim hedefleri',
    'educational_goals' => [
        'Programlama ve yapay zeka konusunda temel becerileri geliştirmek',
        'Çevre bilincini ve çevreyi korumanın önemini teşvik etmek',
        'Hikaye anlatımı yoluyla yaratıcılığı ve hayal gücünü teşvik etmek',
        'Problem çözme ve eleştirel düşünme becerilerini geliştirmek'
    ],
    'target_audience_title' => 'Hedef kitle',
    'target_audience' => [
        'İlkokul Öğrencileri (6-12 yaş)'
    ],
    'experience_title' => 'Deneyim',
    'experience' => 'Başlangıç Seviyesi - Önceden kodlama deneyimi gerekmez; tamamen yeni başlayanlar için uygundur.',
    'duration_title' => 'Süre',
    'duration' => '45 dakika – 1 saat',
    'materials_title' => 'Önerilen araç',
    'materials' => [
        'Yazılım: Code.org\'a Erişim',
        'Donanım: İnternet bağlantısı olan bilgisayar veya tablet.',
        'Çevrimiçi Araçlar: Code.org veya benzeri platformlarda gezinmek için web tarayıcısı.',
        'Destek Materyalleri: Platform tarafından sağlanan eğitim materyalleri ve kaynaklar.',
        'Diğer Araçlar: Eğitimi takip etmek için isteğe bağlı ses veya görüntü cihazları.'
    ],
    'instructions_title' => 'Yönergeler',
    'instructions' => [
        'Code.org\'a erişin',
        'Web tarayıcınızı açın ve Code.org adresine gidin. Hesabınız yoksa hesap oluşturabilir veya mevcut bir hesapla giriş yapabilirsiniz.',
        'Yeni bir proje başlatın',
        'Ana ekranda okyanus korumayla ilgili kursu veya eğitimi seçin. Projenize başlamak için "Başlat"a tıklayın.',
        'Adım adım eğitimi izleyin',
        'Code.org sizi etkileşimli bir eğitim boyunca yönlendirecektir. Talimatları dikkatle okuyun ve her adımı tamamlayın.',
        'Botunuzu programlayın',
        'Görsel kodlama bloklarını kullanarak botunuza plastik toplama veya engellerden kaçınma gibi çevresel durumlara tepki vermeyi öğretin.',
        'Botunuzu test edin',
        'Botunuzu yazdıktan sonra çalışmasını test edin. Beklenildiği gibi değilse kodu değiştirip yeniden deneyin.',
        'Botunuzu sınıfla paylaşın',
        'Botunuz hazır olduğunda proje bağlantısını kopyalayın ve sınıf arkadaşlarınızla paylaşın. Yarışmaya katılın.',
        'Gözden geçirin ve geliştirin',
        'Kodunuzu gözden geçirin ve yeni çevresel zorluklarla başa çıkmak için geliştirin.'
    ],
    'real-life-applications_title' => 'Gerçek uygulamalar',
    'real-life-applications' => [
        'Okyanus Korumada Yapay Zeka: The Ocean Cleanup gibi şirketler, okyanuslardan plastik toplamak için yapay zeka destekli sistemler kullanıyor.',
        'Çevresel İzlemede Yapay Zeka: Yapay zeka botları, okyanus koşullarını izlemek, deniz canlılarını takip etmek ve kirliliği tespit etmek için kullanılıyor.'
    ],
    'variations_title' => 'Proje varyasyonları',
    'variations' => [
        'Projeyi diğer ortamlara genişletmek: Ormanlar, nehirler veya kentsel alanları koruyan botlar tasarlanabilir.',
        'Botların ormansızlaşma veya hava kirliliği gibi sorunları çözmesi sağlanabilir.'
    ]
],

    'code-it-like-margaret-hamilton' => [
    'title' => 'Margaret Hamilton gibi kodla!',
    'author' => 'Chouliara Theodora',
    'purposes' => [
        'Öğrenciler, NASA\'nın Apollo uzay aracının Ay\'a ulaşması için gerekli kodu programlayan Margaret Hamilton gibi, bir uzay aracını fırlatmak için Scratch Jr. kullanarak temel blok tabanlı kodlama kavramlarını öğrenecekler.',
        'Bu etkinlik ayrıca, bir kadın programcının uzay araştırmalarına katkısını vurgulayarak ve kız çocuklarını programlama ve STEM alanlarında kariyer yapmaya teşvik ederek toplumsal cinsiyet kalıplarını yıkmaya yardımcı olacaktır.'
    ],
    'description' => 'Margaret Hamilton\'dan esinlenerek Scratch Jr\'da bir uzay fırlatması programlayın! Geri sayım kodlayın, bir uzay aracı fırlatın ve kızları Kodlamaya teşvik ederek toplumsal cinsiyet kalıplarını yıkın!',
    'instructions' => [
        'Giriş: Öğretmen uzay görevlerini ve insanları Ay\'a göndermeyi anlatır ve Margaret Hamilton\'ı ve Apollo planlamasına katkılarını tanıtır. Ardından, programlamanın ne olduğu ve bir bilgisayara nasıl talimat verebileceğimiz hakkında bir tartışma yapılır.',
        'Programlama etkinliği: Margaret Hamilton kodlar ve geri sayım yapar ve uzay aracı Ay\'a doğru yola çıkar.',
        'Scratch Jr. uygulamasını açın ve yeni bir proje oluşturun.',
        'Karakteri silin.',
        'Arkaplanı boşluk ile seçin (Adım 1 png).',
        'Bir kadın, bir uzay gemisi ve Dünya (Adım 2 png) karakterlerinden seçin.',
        'Karakterlerin boyutunu "Küçült" veya "Büyüme" (Adım 3 png) bloğuna gerektiği kadar tıklayarak ayarlayın.',
        'Karakterleri doğru konuma taşıyın (Adım 4 png).',
        'Kadının geri saymasını ve kelimelerini bitirdiğinde uzay gemisinin yukarı çıkmasını sağlayacak programlar yazın. Bunu başarmak için, yeşil bayrağa basıldığında kadın seçtiğiniz kelimeleri söylemeli ve ardından bir mesaj göndermelidir. Uzay gemisi aynı renkteki mesajı almalı ve doğru hareket bloklarıyla uzay gemisi yukarı çıkmalıdır. Ayrıca, uzay gemisinin uzaklaştıkça küçülmesini de sağlayabilirsiniz. Uzay gemisini programlamak için basit bloklar veya tekrar döngüsü kullanabilirsiniz. (Adım 5 png).',
        'Yeşil bayrağa basarak komut dosyasını çalıştırın.'
    ],
    'materials' => [
        'Scratch Jr. yüklü bir tablet veya PC (mümkünse öncelikle tablet kullanmanızı öneririz) (tabletler için https://www.scratchjr.org/ ve Windows veya Mac için https://jfo8000.github.io/ScratchJr-Desktop/).',
        'Margaret Hamilton ve Apollo 11 görevinin basılı görüntüleri (isteğe bağlı).',
        'Scratch Jr. komutlarını içeren yazdırılabilir kartlar (isteğe bağlı).',
        'Projektör (isteğe bağlı).'
    ],
    'real-life-applications' => [
        'Gerçek hayattaki uygulamalar:',
        'Bu etkinlik yalnızca programlamaya giriş niteliğinde değil, aynı zamanda gerçek hayattaki olaylar ve bilim ve teknolojideki uygulamalarla da bağlantılıdır: Margaret Hamilton, Apollo 11\'in 1969\'da güvenli bir şekilde inişini sağlayan Apollo Rehberlik Bilgisayarı yazılımını geliştirdi. Bu etkinlik, çocukların bilgisayarların bir görevi yerine getirmek için net ve doğru komutlara ihtiyaç duyduğunu anlamalarına yardımcı olur; tıpkı NASA\'nın Ay\'a ulaşmak için kod kullanması gibi. Blok programlama, uzay görevlerinde, robotikte ve yapay zekada şu anda kullanılan daha karmaşık programlama dillerini anlamanın ilk adımıdır. Aynı ilkeler, Mars keşif robotları (Curiosity, Perseverance) gibi otonom sistemlerin geliştirilmesinde de kullanılır.'
    ],
    'variations' => [
        'Varyasyonlar/Öneriler:',
        'Öğrenciler uygulamaya yeni başlıyorsa, önce basılı bloklarla projeleri oluşturabilirsiniz.',
        'Gezegenler, yıldızlar veya kuyruklu yıldızlar gibi daha fazla karakter ekleyin.',
        'Çocukların yaşına ve ScratchJr uygulamasıyla ilgili deneyimlerine bağlı olarak, uzay gemisini engellerden kaçınmak için programlamak gibi ek zorluklar eklenebilir.',
        'Öğrenciler ayrıca uzay gemisinin aya inişini gösteren başka bir sayfa da ekleyebilirler.',
        '"Söyle" bloğunu kullanmak yerine, "Kaydedilmiş Sesi Çal" bloğu kullanılabilir ve öğrencilerin sesleri duyulabilir.',
        'Yüzlerini düzenleyebileceğiniz ve öğrencilerin fotoğraflarını ekleyebileceğiniz astronot karakterleri ekleyin.'
    ],
    'duration' => '60 dakika',
    'experience' => 'Orta Seviye - Bazı temel kodlama bilgileri önerilir; katılımcıların temel programlama kavramlarına aşina olması gerekir.',
    'target-audience' => [
        'Küçük Çocuklar (5-7 Yaş)'
    ]
],
    'chatbot' => [
        'title' => 'Sohbet robotu yapın',
        'author' => 'AB Kod Haftası Ekibi',
        'purposes' => [
            'İnteraktif bilmeceler kodlamak',
            'Kod kullanarak bir sohbet robotu ile bir kullanıcı arasında diyaloglar oluşturmak',
        ],
        'description' => 'Sohbet robotu ile bilmeceyi çözmeye çalışan kullanıcı arasında bir konuşma kodlayın. İnsan gibi konuşabilen bir sohbet robotu yapmaya çalışın. Bilmece yerine, sohbet robotu ile kullanıcı arasında bir diyalog da oluşturabilirsiniz.',
        'instructions' => [
            'Bir bilmece düşünün',
            'Oturum açın',
            'veya yeni bir hesap oluşturun. (Yeni bir hesap oluştururken, gizlilik nedenlerinden dolayı Pencil Code içerisinde gerçek isimlere izin verilmediğini unutmayın.)',
            'Imagine (Hayal Et) ve Make your own (Yap) düğmelerine tıklayın',
            'Bilmecenizi yazmak için blokları veya metin tabanlı modu kullanın',
            'Alternatif olarak',
            'bu kodu kullanabilirsiniz',
            've bunu bilmecenize uyarlayabilir veya menüden Answering a riddle (Bilmeceyi cevapla) öğesini seçip düzenleyebilirsiniz.',
        ],
        'example' => 'Şu bilmece örneğini inceleyin.',
        'more' => [
            'Bu kod Pencil Code aktivitesinden uyarlanmıştır',
            'Answering the Riddle',
        ],
    ],

    'paper-circuit' => [
        'title' => 'Fişi çekin ve kodlamaya başlayın: Bir kâğıt devre oluşturun',
        'author' => 'AB Kod Haftası Ekibi',
        'purposes' => [
            'Yaratıcılığı artırmak',
            'Problem çözme becerilerini geliştirmek',
        ],
        'description' => [
            'İstediğiniz bir nesneyi çizin. Bu, yıldızlı bir gökyüzü, uğur böceği, robot, yılbaşı ağacı veya aklınıza gelen herhangi bir şey olabilir. Projenizi AB Kod Haftası görselleriyle dilediğiniz gibi kişiselleştirebilirsiniz: ',
            'AB Kod Haftası öğretmenler araç kitini keşfedebilir',
            've istediğiniz bir logoyu veya görseli indirebilirsiniz. AB Kod Haftası için bir kâğıt devre davetiyesi bile oluşturabilirsiniz. Devrenize motive edici bir mesaj ekleyerek, diğer öğretmenleri Kod Haftasına katılmaya ve/veya okullara özel web sitesini incelemeye teşvik edin.',
        ],
        'instructions' => [
            'Bir nesne çizin ve hangi parçaların aydınlatılacağına karar verin (ör. yıldızlar).',
            'Bir kalem yardımıyla kâğıtta bir delik açın ve aydınlatılacak her bir parçaya bir LED çıkartma yerleştirin.',
            'Yuvarlak pili yerleştireceğiniz daireyi çizin.',
            'Kâğıdın diğer tarafına + ve-işaretlerini çizin. LED devre çıkartmasının uzun tarafının pilin “+” kısmına, kısa tarafının ise pilin “-” kısmına bağlandığından emin olun.',
            'Bakır bandı işaretlerin üzerine yerleştirin.',
            'Kâğıt, pilin üzerine geldiğinde LED yanacak şekilde bir kat oluşturun. Bakır bant ile iyi temas etmesi için ataş kullanabilirsiniz.',
            'Kâğıt devrenizin fotoğrafını çekin ve bu girişimde yer almanın önemini açıklayarak Instagram\'da paylaşın.',
        ],
        'example' => 'Bazı kâğıt devre örneklerini inceleyin',
        'materials' => [
            'kâğıt veya karton',
            'pastel boya veya keçeli kalem',
            'yuvarlak pil',
            'bakır bant',
            'LED devre çıkartmaları',
            'ataş',
        ],
    ],

    'dance' => [
        'title' => 'Bir dans yaratın',
        'author' => 'AB Kod Haftası Ekibi',
        'purposes' => [
            'Temel kodlama kavramlarını öğrenmek',
            'Karakterleri canlandırmayı öğrenmek',
        ],
        'description' => 'Bu görevde birlikte dans edecek bir dizi karakter oluşturacaksınız. Karakterleri ve müzik kliplerini seçmek için yerleşik bir ortam kitaplığından faydalanabilir veya kendinizinkini oluşturabilirsiniz. Karakterleri dans edecek ve birbirleriyle konuşacak şekilde canlandıracaksınız.',
        'instructions' => [
            'Oturum açın',
            've öğretmen olarak giriş yapın. Öğrenci hesapları oluşturun ve bunları öğrencilerinizle paylaşın. Alternatif olarak, bir sınıf kodu paylaşabilir ve öğrencilerinizin okul e-posta adresleri ile kaydolmalarını sağlayabilirsiniz. Öğrenciyseniz öğrenci olarak katılabilirsiniz ancak hesabınızı doğrulayabilmeleri için ebeveyninizin e-posta adresini girmeniz istenecektir.',
            'Tıklayın',
            've bir başlık belirleyin',
            'Şuraya gidip',
            'dişli simgesine tıklayarak bir arka plan ekleyin. Ortam Kitaplığından (Media Library) bir arka plan seçebilir, kendi görselinizi ekleyebilir veya bir fotoğraf çekip yükleyebilirsiniz. Bir ses klibi seçip sahneye ekleyin:',
            'Düğmeye tıklayıp',
            'canlandıracağınız karakterleri veya nesneleri ekleyin, böylece bunlar hareket edecek, konuşacak ve birbirleriyle etkileşimde bulunabilecektir. Seçiminize göre iki veya üç karakter ekleyin. Kendi oyuncularınızı çizebilir veya mevcut olanlar üzerinde değişiklik yapabilirsiniz. Kalem simgesine tıklayarak karakterinize farklı kostümler giydirin.',
            'Her bir oyuncuya tıklayın ve aşağıdaki blokları ekleyerek canlandırın',
            'Bir',
            'say block (konuşma bloğu)',
            'ekleyin, böylece oyuncular birbirleriyle konuşacaktır. Konuşma balonlarının şeklini, metnin yazı tipini ve boyutunu değiştirin',
        ],
        'example' => [
            'Dans eden robotlar',
            'örneğini',
            'inceleyin. Bunu dilediğiniz gibi kullanabilir ve yeniden düzenleyebilirsiniz.',
        ],
    ],

    'compose-song' => [
        'title' => 'Bir beste yapın',
        'author' => 'AB Kod Haftası Ekibi',
        'purposes' => [
            'Müzik ile kodlama öğrenmek',
            'Müzik tarzlarını ve enstrümanları birbirinden ayırmak',
            'Ses kliplerini karıştırarak bir şarkı bestelemek',
        ],
        'description' => 'Bu görevde bir programlama dili kullanarak beste yapacaksınız. Beste yapmak için yerleşik ses kliplerini kullanabilir veya kendinizinkini kaydedip miks yapabilirsiniz. Kodunuzu Digital Audio Workstation (Dijital Ses İş İstasyonu) içerisinde çalıştırın ve kodladığınız müziği dinleyin. Farklı sesler ve efektler kullanarak müzik eserinizi değiştirebilirsiniz.',
        'instructions' => [
            'Oturum açın',
            'Bir komut dizisi oluşturmak için buraya tıklayın',
            'Komut dizinizi adlandırın ve',
            'programlama dili olarak şunu seçin',
            'Kodlarınızı',
            've',
            'satırları arasına yazmaya başlayın',
            'Müzik kliplerine',
            'Sound Library (Ses Kitaplığı)',
            'içerisinde göz atın ve sevdiğiniz müzik tarzlarını, sanatçıları ve enstrümanları seçin.',
            'Şarkınıza bir ses klibi eklemek için, şunu yazın',
            'Parantezler arasında virgüllerle ayrılmış şu 4 parametre yer almalıdır',
            'Sound clip (Ses klibi)',
            'İmlecinizi parantezlerin arasına yerleştirin, Sound Library (Ses Kitaplığı) bölümüne gidin, bir klip seçin ve mavi yapıştırma simgesine tıklayarak yapıştırın',
            'Track number (Kanal sayısı)',
            'Kanallar seslerinizi enstrüman türüne göre (vokal, bas, davul, klavye vb.) organize etmenize yardımcı olur. İstediğiniz kadar kanal (enstrüman) ekleyebilirsiniz. Kanallar, Digital Audio Workstation (Dijital Ses İş İstasyonu) içerisinde çalışan satırlar olarak gösterilir',
            'Start measure (Başlangıç ölçüsü)',
            'Sesinizin ne zaman çalmaya başlayacağını gösterir. Ölçüler müzikal zaman birimleridir. Bir ölçü 4 vuruştur',
            'End measure (Bitiş ölçüsü)',
            'Sesinizin ne zaman çalmayı sonlandıracağını gösterir',
            'Bu tür bir kod satırı şu şekilde görünecektir',
            'Bestenizin sesini artırmak için ses düzeyi gibi farklı efektler ekleyebilirsiniz. Ses düzeyi, 0,0 orijinal ses düzeyi olmak üzere -60,0 desibel ile 12,0 desibel arasında değişir.',
            'Şunu yazın',
            'Parantez içerisine kanal sayısını, VOLUME, GAIN, ses seviyesini, ölçünün ne zaman başlayacağını, seviyesini ve ne zaman sonlanacağını yazın.',
            'Bu bir fade-in (güçlenerek başlama) efekti',
            've fade-out (zayıflayarak bitme) efekti örneğidir',
        ],
        'example' => [
            'Earsketch',
            'ile kodlanan bir şarkı örneğini dinleyin',
            'Kodu içe aktarıp düzenleyebilirsiniz.',
        ],
    ],
    'sensing-game' => [
        'title' => 'Bir video algılama oyunu yapın',
        'author' => 'AB Kod Haftası Ekibi',
        'purposes' => [
            'Canlandırılmış nesneler kodlamak',
            'Dijital animasyonun fiziksel hareket ile nasıl kontrol edileceğini anlamak',
            'Ses kliplerini karıştırarak bir şarkı bestelemek',
        ],
        'description' => 'Bu görevde, hareketi algılamak üzere bir video kameranın sensör olarak kullanıldığı basit bir oyun hazırlayacaksınız. Yani, animasyonunuzu fiziksel hareket ile kontrol edebileceksiniz. Bu oyunda göreviniz, 30 saniyede toplayabildiğiniz kadar AB Kod Haftası baloncuğu toplamaktır. Baloncukları toplamak yerine, bir karakteri kovaladığınız veya ellerinizle balonları patlattığınız bir oyun oluşturabilirsiniz.',
        'instructions' => [
            'Oturum açın',
            'Eklenti Ekle',
            'düğmesine tıklayın',
            've',
            'Video Algılama seçeneğini seçin',
            'Bu, bir nesnenin ne kadar hızlı hareket ettiğini algılar. Rakam düşükse, harekete daha duyarlı olacaktır.',
            'Bir hareketli grafik (Kukla) ekleyin. Bir ses seçin ve bunu hareketli grafik içerisine ekleyin. İsterseniz',
            'Klon oluştur (\'in ikizni yarat)',
            'öğesini ekleyerek hareketli grafiği çoğaltabilirsiniz.',
            'İki değişken oluşturun: bir tanesi',
            'Score (Puan) için',
            'bir tanesi de',
            'Zamanlayıcı (Timer) için kullanılacaktır',
            'ardından bunları hareketli grafiğe ekleyin. Zamanlayıcıyı 30 olarak ayarlayın ve',
            '”Zamanlayıcıyı i -1 kadar değiştir” öğesini ekleyin',
            'Yeni bir hareketli grafik olarak',
            'Game Over (Oyun Bitti)',
            'öğesini ekleyerek oyunu bitirin. Ayrıca, oyun başlığınızla da bir hareketli grafik oluşturabilirsiniz, ör. Tüm AB Kod Haftası Baloncuklarını Topla.',
        ],
        'example' => [
            'Tüm AB Kod Haftası Baloncuklarını Topla video algılama oyununu oynayın. Bu projeyi dilediğiniz gibi',
            'yeniden düzenleyebilirsiniz',
        ],
    ],

    'calming-leds' => [
        'title' => 'Sakinleştirici LED\'ler: micro:bit ile basit bir aygıt yapın',
        'author' => 'Micro:bit Educational Foundation (Micro:bit Eğitim Vakfı)',
        'duration' => '20 dakika',
        'materials' => [
            'bir micro:bit aygıtı ve pil takımı (varsa)',
            'Microsoft MakeCode ve Youtube\'u ziyaret edebileceğiniz bir dizüstü bilgisayar veya tablet',
            'aktivite kaynakları için microbit.org',
        ],
        'description' => 'Öğrenciler, LED\'leri kullanarak nefes alışlarını düzenlemelerine ve daha sakin hissetmelerine yardımcı olabilecek bir dijital aygıt yapacaktır. Kendilerinden bazı basit kodlar yazmaları, animasyonları ve sekansları keşfetmeleri istenecektir.',
        'instructions' => [
            'Amaç, nefes alışınızı düzenlemek için kullanabileceğiniz, çalışan bir Sakinleştirici LED aygıt yapmaktır. Bu aygıt, fiziksel bir micro:bit kart üzerinde veya MakeCode editörde bulunan simülatör üzerinde yapılabilir.',
            'Görev, videoda/ekran görüntüsünde gösterildiği üzere MakeCode editör kullanılarak ve basit bir kod dizisi yazılarak tamamlanabilir.',
            'Öğrenciler, görevi geliştirmek amacıyla farklı animasyonları keşfedebilir ve sakin veya mutlu hissetmelerine yardımcı olmak üzere görmek istedikleri animasyonlarla yaratıcılıklarının sınırlarını zorlayabilirler.',
            'Detaylı bilgiye ve video talimatlarına',
            'bu bağlantıdan ulaşabilirsiniz',
        ],
        'example' => 'Talimatlar ve tamamlanan göreve ait videoların yanı sıra nasıl kodlama yapılacağı konusunda bilgi almak için bu sayfayı ziyaret edin',
        'purposes' => [
            'Yardımcı olma amacıyla basit bir dijital eser tasarlamak',
            'Sekanslar ve animasyonlarla birlikte bunların nasıl çalıştığını keşfetmek',
            'Basit kodları test etmek ve hata ayıklaması yapmak',
            'Animasyonları hızlandırıp yavaşlatarak bir tasarımı yinelemek',
        ],
    ],
    'computational-thinking-and-computational-fluency' => [
        'title' => 'ScratchJr ile Sayısal Düşünme ve Sayısal Akıcılık',
        'author' => 'Stamatis Papadakis – AB Kod Haftası Elçisi Yunanistan',
        'purposes' => [
            'Yeni komutları ve arayüzleri kullanmaya alışmak.',
            'Basit sebep-sonuç komutlarıyla basit programlar oluşturmak.',
            'Deneme yanılma yoluyla basit bir hata ayıklaması yapmak.',
        ],
        'description' => 'Bu görevde çocuklar, hikâyelerini daha ilgi çekici, heyecanlı ve duygusal hale getirmek için ScratchJr uygulamasını kullanarak CT (Sayısal Düşünme) konseptlerini projelerine entegre ediyor.',
        'instructions' => [
            'ScratchJr için çocukların okur yazar olmaları gerekli değildir. Tüm talimatlar ve menü seçenekleri simgeler ve renkler yoluyla anlaşılabilir. Görev, sınıfta, laboratuvarda ve hatta internet gerekmediği için açık alanda bile tamamlanabilir.',
            'Çocuklar şehri arka plan olarak kullanır, aracı şehirde sürmek için ise kodlama bloklarından faydalanır.',
        ],
        'example' => [
            'Çocuklar ses ve hareket bloklarını kullanabilir ve karakterleri dans ettirmek için blokları yeniden başlatabilir.',
            'Çocuklar bir arka plan ve karakter seçip, aracı şehirde sürmek için bir hareket bloğu kullanır. Çocuklar bir karakteri hızlandırıp yavaşlatmak için hız bloğunu kullanabilir.',
        ],
        'materials' => [
            'Bu ücretsiz uygulama',
            'çeşitli işletim sistemlerinde ve akıllı cihaz türlerinde çalışmaktadır',
            'Ayrıca',
            'web sitesinde çok sayıda ücretsiz eğitim materyali de bulunmaktadır.',
        ],
        'duration' => '90 dakika',
    ],
    'ai-hour-of-code' => [
        'title' => 'Yapay Zekâ (AI) Kod Saati',
        'author' => ' Minecraft Education Edition (Minecraft Eğitim Sürümü)',
        'purposes' => [
            'Dizgeleri, olayları, döngüleri ve şart kiplerini içeren kodlama çözümleri oluşturmak',
            'Bir problemi çözmek için gereken adımları, net talimatlar dizisine dönüştürmek.',
            'Kodlama kavramlarını keşfetmek.',
        ],
        'description' => 'Bir köy yangın tehdidi altında ve senin bir çözüm kodlaman gerekiyor! Kodlama yardımcın Minecraft Agent (Ajanı) ile buluş ve ardından Ajanı ormanı gezip veri toplaması için programla. Bu veriler Ajanın yangınların nerede olduğunu tahmin etmesine yardımcı olacak. Daha sonra Ajanı kodlayarak yangının yayılmasını önlemesini, köyü kurtarmasını ve ormana yeniden hayat vermesini sağla. Kodlamanın temellerini öğrenin ve yapay zekânın (AI) gerçek dünyadaki bir örneğini keşfedin.',
        'instructions' => 'Ders planını buradan indirin',
        'materials' => [
            'Minecraft: Education Edition kurun',
            'Minecraft Eğitim Sürümünü kurduktan sonra göreve',
            'bu web sitesinden ulaşabilirsiniz',
        ],
    ],
    'create-a-dance' => [
        'title' => 'Ode to Code ile bir dans yaratın!',
        'purposes' => 'Kodlamayı eğlenceli bir hale getirerek kendinizi AB Kod Haftası topluluğunun bir parçası olarak hissetmek.',
        'description' => [
            'Ode to Code ile bir dans yaratın! Ode to Code',
            'için bir dans kodlamak',
            'üzere Dans Partisi eğitiminden faydalanın. Resmi AB Kod Haftası marşı, Dans Partisindeki parçalardan biri olarak seçildi.',
        ],
        'instructions' => [
            'Talimatlar video olarak eğitim içerisinde',
            'yer almakta',
            've her seviyenin en üst kısmında gösterilmektedir.',
        ],
        'example' => 'Öğrencilerin yaptığı öne çıkan çalışmalara şu sayfadan ulaşabilirsiniz:',
        'materials' => 'Code.org eğitimi',
    ],
    'create-a-simulation' => [
        'title' => 'Bir simülasyon oluşturun!',
        'purposes' => [
            'Kitle oluşturma, iyileşme oranları, maske takma ve aşılar gibi değişkenleri tanıtırken simülasyonlar hakkında da bilgi sahibi olmak.',
            'Hayali bir senaryoya uygulamak üzere, gerçek dünyadaki virüs salgınları hakkında ön bilgi edinmek.',
        ],
        'description' => 'Canavar Şehri\'nde(Monster Town) kendi virüs salgını simülasyonunuzu oluşturup çalıştırmak üzere kod yazın. Kodlamayı öğrenin ve Canavar Şehri\'nin komşularına ne olacağı hakkında tahminlerde bulunun.',
        'instructions' => [
            'Talimatlar video olarak eğitim içerisinde',
            'yer almakta',
            've her seviyenin en üst kısmında gösterilmektedir.',
        ],
        'example' => 'Çalışmayı bitirdiğinizde, simülasyonunuzu başkalarıyla paylaşabilirsiniz. Şehre bir virüs geldiğinde başkalarının sağlığını korumak için ne yapabileceğimiz hakkındaki düşüncelerinizi paylaşın.',
        'materials' => 'Code.org eğitimi',
    ],
    'create-your-own-masterpiece' => [
        'title' => 'Kendi şaheserinizi yaratın!',
        'audience' => 'Her yaşa uygundur',
        'purpose' => 'Bilgisayar bilimi kavramlarını görsel yollarla tanıtmak ve yaratıcılığı körüklemek',
        'description' => 'Sanatçı ile birlikte kendi şaheserinizi yaratın! Sanatçınızın benzersiz bir sanat eseri yaratması için kod bloklarını kullanın.',
        'instructions' => 'Talimatlar her seviyenin en üst kısmında gösterilmektedir',
        'example' => 'Sanatçıya ait örneklere bu sayfadaki çizimin altından ulaşabilirsiniz',
        'materials' => ['Eğitimin ilk seviyesi için', 'BURAYA TIKLAYIN'],
    ],
    'cs-first-unplugged-activities' => [
        'title' => 'CS First Unplugged aktiviteler',
        'purposes' => [
            'Evden öğrenim gören öğrencileri desteklemek',
            'Herkesi ekranlardan bir süre uzak tutmak',
        ],
        'description' => 'CS First Unplugged, bilgisayar olmadan öğrencilere CS (Bilgisayar Bilimi) kavramlarını tanıtan bir dizi aktivitedir. Bu dersi, Bilgisayar Biliminin yalnızca kodlardan ibaret olmadığını göstermek için tasarladık.',
        'instructions' => [
            'Tüm aktivitelerin yer aldığı İngilizce kitapçık için bu',
            'bağlantıya tıklayın',
            'İngilizce Ders Planı için ise bu bağlantıya tıklayın',
            'Bu dersteki etkinlikler ayrı ayrı olarak ve istenilen sırayla tamamlanabilir.',
            'Öğretmen, öğrenim sürecini fotoğraflayıp #EUCodeWeekChallengeGoogle #GrowWithGoogle etiketiyle Instagram\'da paylaşabilir.',
        ],
        'materials' => [
            'Aktivite kitapçığına ek olarak, bazı aktivitelerde ek materyal kullanımı gerekebilir veya faydalı olabilir. ',
            'Network a Neighborhood(Mahalle ağı oluşturma) haritasında kullanmak üzere küçük sayaçlar(kuru fasulye gibi).',
            'Send a Secret Message(Gizli mesaj gönderme) şifreleme tekerini kesmek için makas. ',
            'Send a Secret Message(Gizli mesaj gönderme) şifreleme tekerini güçlendirmek için karton ve yapıştırıcı. ',
            'Send a Secret Message(Gizli mesaj gönderme) şifreleme tekerini bağlamak için raptiye, kürdan veya düz hale getirilmiş ataş. ',
        ],
    ],
    'family-care' => [
        'title' => 'Aileyle İlgilenmek',
        'experience' => 'Herkese açık',
        'duration' => '5-10 saat',
        'author' => '',
        'purposes' => [
            'Günlük olarak karşılaştığımız ‘aileyle ilgilenme’ konusu hakkında araştırma yapmak;',
            'Sorunları fırsat olarak görmek ve yaratıcı çözümler üretmek;',
            'Çözümleri yenilikçi bir şekilde hayata geçirmek için kodlardan faydalanmak;',
            'Afişler tasarlamak ve bulduğunuz çözümleri başkalarına sunmak;',
            'Projelerinizin etki yaratması için sosyal medyayı kullanmak. ',
        ],
        'description' => [
            'Evimizden bahsederken aklınıza ne geliyor ? Güzel bir daire ? Anne babanızın hazırladığı büyük bir akşam yemeği ? Sadece sizin bildiğiniz gizli bir alan ? Sıcak bir ev, bedenimizi ve ruhumuzu bir benzin istasyonu gibi yeniden yakıtla doldurur. Modern hayatın koşuşturmacası içerisinde, ebeveynler çalıştıkları için her zaman meşgul durumda. Arkadaşlarınızla vakit geçirirken, kedilerinizi arkanızda bırakamazsınız. Peki siz uzaktayken arkadaşınızla nasıl ilgileneceksiniz ? Bu görevin teması',
            'Aileyle İlgilenmek',
            'Bu temaya göre, öğrenciler kodlama ve donanım yoluyla sevgi ve ilgi gösterebilecekleri bir fikir geliştirmeye teşvik ediliyor. Size üzerinde düşünmeniz için birkaç soru:',
            'Evinizde kaç kişi yaşıyor ? Bunlar kim ? Onlarla yaşarken herhangi bir sorunla karşılaştınız mı ? Ne tür bir ilgiye muhtaçlar ? ',
            'Çevrenizde başkalarına kıyasla daha fazla aile ilgisinden yoksun kişiler var mı ? Bu kişilere nasıl yardımcı olabilirsiniz ? ',
        ],
        'instructions' => [
            'Aileyle ilgilenme teması üzerinde beyin fırtınası ve araştırma yapın',
            'Sorunları listeleyin',
            'Olası çözümler üretin',
            'Bir çözüm seçin',
            'Yapıyı programlayıp oluşturun',
            'Projenizi göstereceğiniz bir afiş tasarlayın',
            'Bunu öğretmenlerinize ve aile üyelerinize sunun',
        ],
        'example' => ['Lütfen bazı örnekler için buraya:', 've'],
        'materials' => [
            'Kodlama aracına tıklayın:',
            'veya bilgisayar sürümünü',
            'indirin',
            'mBlock, Scratch tabanlı bir programlama dilidir',
            'Bu görev, yaşları 6 ila 13 arasında değişen genç kişiler için proje bazlı yaratıcı tasarım programı olan MakeX global Spark Competition\'dan uyarlanmıştır. ',
            'Katılımcı ekibin özel bir tema üzerine odaklanması, yazılım programlama ve donanım oluşturma yoluyla bir çözüm bulması gerekecektir. ',
            'Öğrenciler bu görevi Codeweek üzerinde tamamlamaya ve diğer öğrencilerle iletişime geçip ödüller kazanmak üzere bunu uluslararası seviyeye taşımaya teşvik edilir. ',
            'Daha fazla bilgi için burayı inceleyebilir:',
            'veya bizimle iletişime geçebilirsiniz',
        ],
    ],
    'virtual-flower-field' => [
        'title' => 'Sanal çiçek bahçenizi oluşturun',
        'author' => 'Jadga Huegle-Meet and Code koçu ve SAP Snap!ekibinin bir parçası',
        'duration' => '30-60 dakika',
        'purposes' => [
            'Basit ama etkili bir proje ile programlamayı tanımak. ',
            'Kodlamanın sanatsal bir yönünün olduğunu ve güzel sonuçlar doğurabileceğini öğrenmek. ',
            'Renkli çiçekler ve AB Kod Haftası ile sonbaharı daha ışıltılı bir hale getirmek. ',
            'Dünya üzerinde bulunan çiçeklerin çeşitliliğini göstermek. ',
            'İklim değişikliği eğitimi konusu hakkında farkındalık yaratıp bu eğitim sürecini iyileştiren kodlama etkinlikleri oluşturarak, Sürdürülebilir Kalkınma Hedeflerine(SKH\'ler) ve özellikle SKA13-İklim Değişikliğine katkıda bulunmak.',
        ],
        'description' => 'Snap!içerisinde farklı türde çiçekler ve farklı sayıda çiçek yaprakları ile sanal bir çiçek bahçesi oluşturabileceğiniz bir program geliştirin. ',
        'instructions' => [
            'Göreve başlamak için ilhama ihtiyacınız varsa, bu videoyu',
            'izleyin',
            'veya bu',
            'belgeyi kullanarak',
            'süreci adım adım takip edin. ',
            'Görev, Snap!(veya Scratch) içerisinde sanal bir çiçek bahçesi programlayarak ve ekran görüntüsünü veya çalışma sonucunun fotoğrafını çevrimiçi olarak göndererek tamamlanabilir. ',
            'Çiçek bahçesinde farklı türde çiçekler ve farklı sayıda çiçek yaprakları bulunmalıdır. Tercihen çiçekler programlanır, yani çiçek yaprakları tekrar tekrar yerleştirilip döndürülerek(veya çizilip döndürülerek) oluşturulur. ',
            'Sanal çiçek bahçenizin resmini #MeetandCode etiketiyle paylaşın.',
        ],
        'materials' => [
            'Şunu kullanmanızı öneririz',
            'ancak, proje burada da çalışmaktadır:',
        ],
    ],
    'haunted-house' => [
        'title' => 'Hedy\'deki Perili Ev',
        'author' => 'Felienne Hermans, Leiden Üniversitesi-Ramon Moorlag, I & I-Kod Haftası Hollanda',
        'audience' => 'Öğretmenler ve eğitmenler',
        'duration' => 'Ön bilgiye bağlı olarak 1 veya 2 saat',
        'purposes' => [
            'İnteraktif bir Perili Ev hikâyesi oluşturmak. ',
            'Hedy ile programlamayı öğrenmek. ',
        ],
        'description' => 'Hedy ile interaktif öğeler kullanarak bir Perili Ev hikâyesi oluşturacaksınız. Kod her çalıştığında yeni bir hikâye oluşturulacak. Hikâye aynı zamanda bilgisayar tarafından sesli olarak okunabilir ve çevrimiçi olarak paylaşılabilir. ',
        'instructions' => [
            'Bir tarayıcıyı açıp hedycode. com adresine giderek göreve başlayabilirsiniz. ',
            'Seviye 1-4 için talimatları izleyin. ‘Level’(Seviye) ve ‘Haunted house(Perili ev) sekmelerini kullanın. ’',
            'Bu seviyelerin yardımıyla, interaktif bir perili ev hikâyesi yazacağız. ',
            'Öğretmenler, Hedy ders planı için',
            'buraya tıklayın',
            'Felienne Hermans\'ın Hedy sunumuna',
            'bu bağlantıdan ulaşabilirsiniz',
        ],
        'example' => 'Perili ev örneği seviye',
        'materials' => ['Hedy internet adresi', 'seviye 1-4'],
    ],
    'inclusive-app-design' => [
        'title' => 'Kapsamlı Uygulama Tasarımı',
        'author' => 'Apple Eğitim',
        'duration' => '60 dakika + isteğe bağlı ilave aktiviteler',
        'purposes' => [
            'Herkesin erişim sağlayıp anlayabileceği bir uygulama fikri üzerinde beyin fırtınası yapmak, bu fikri planlamak, prototipini belirlemek ve paylaşmak. ',
        ],
        'description' => 'Harika uygulamalar harika fikirlerle başlar. Bu aktivitede, öğrenciler ilgilendikleri bir konu hakkında uygulama fikirleri sunacaklar, ardından ise kapsam ve erişilebilirliği göz önünde bulundurarak uygulamaların nasıl tasarlandığını keşfedecekler. ',
        'instructions' => [
            'Tüm talimatlara bu bağlantıdan ulaşabilirsiniz:',
            'Bu bir saatlik ders planıyla, eğitmenler aşağıdaki konular hakkında öğrencilere yol gösterebilir',
            'Kapsamlı uygulama tasarımını öğrenmek',
            'Bir uygulama fikri bulmak için, ilgilenilen konularda beyin fırtınası yapmak',
            'Uygulama fikirlerini belirlemek ve kullanıcı aktivitelerini planlamak',
            'Uygulamaların bir parçasının prototipini Keynote içerisinde oluşturmak',
            'Prototipleri tanıtmak ve kullanıcıları çeşitli arka plan ve becerilerle nasıl desteklediklerini açıklamak',
        ],
        'materials' => [
            'Inclusive App Design Activity\'yi (Kapsamlı Uygulama Tasarımı Aktivitesi) Apple Teacher Learning Center\'da(Apple Öğretmen Öğrenim Merkezi) keşfedin',
            'iPad veya Mac\'te Keynote kullanılması önerilir ancak gerekli değildir.',
        ],
    ],
    'silly-eyes' => [
        'title' => 'Komik gözler',
        'author' => 'Raspberry Pi Vakfı',
        'duration' => '25 dakika',
        'purposes' => [
            'Kullanıcı etkileşimli bir proje yapmak.',
            'Bir projeyi renk ve grafik efektleriyle kişiselleştirmek.',
            'Dijital üretimde tasarım hakkında bilgi sahibi olmak.',
        ],
        'description' => 'Bu projede, komik gözlü bir karakter tasarlayıp oluşturacaksınız. Karakterin büyük ve komik gözleri, fare imlecini takip ederek karakterinize hayat verecek.',
        'instructions' => 'Proje açıklamasının tamamına buradan ulaşabilirsiniz',
        'example' => 'Gobo, Under the sea (Denizler altında) ve Don\'t eat donut (Donut yemeyin) örneklerini inceleyin',
    ],
    'train-ai-bot' => [
        'title' => 'Bir Yapay Zekâ (AI) botunu eğitin!',
        'purposes' => 'Etik meseleleri ve dünya problemlerini ele almada yapay zekânın (AI) nasıl kullanılabildiğini keşfederken, yapay zekâ, makine öğrenimi, eğitim verileri ve yanlılık hakkında bilgi sahibi olmak.',
        'description' => 'Okyanuslar için bir yapay zekâ botunu yapay zekâ ile eğitin. Bu aktivitede, yapay zekâyı (AI) balığı ve çöpü birbirinden ayıracak şekilde programlayacak veya eğiteceksiniz. Haydi okyanusu temizleyelim!',
        'instructions' => [
            'Talimatlar video olarak eğitim içerisinde yer almakta',
            've her seviyenin en üst kısmında gösterilmektedir.',
        ],
        'materials' => [
            'Eğitime buradan ulaşabilirsiniz:',
            'Bu eğitim 25\'i aşkın dilde mevcuttur',
        ],
        'more' => [''],
    ],
    'build-calliope' => [
        'title' => 'Kendi Calliope mini fitness eğitmeninizi oluşturun',
        'author' => 'Amazon Future Engineer |  Calliope gGmbH ile tanışın ve kodlamaya başlayın',
        'purposes' => [
            'Dizi, animasyon, tekrar ve değişkenleri eğlenceli şekilde öğrenmek için.',
            'Bir yapı şeması tasarlamak için.',
            'Kodu test etmek ve hataları bulmak için.',
            'Kullanılabilirliği kontrol edip düzenleyerek, deneme-yanılma yolu ile bir program optimize etmek için.',
        ],
        'duration' => '20-30 dakika',
        'description' => 'Katılımcılar, önceden tasarlanan 10 üniteli bir fitness egzersizini yeniden oluşturmak üzere dijital olarak kontrol edilen ve renkli LED ışığı kullanılan bir prototip geliştirecekler.',
        'materials' => [
            'Calliope mini StarterBox (mevcut ise)',
            'Aktivite kaynaklarına erişmek için diz üstü bilgisayar ya da tabletinizden Youtube hesabını ve <a href="https://makecode.calliope.cc">https://makecode.calliope.cc</a> veya <a href="https://calliope.cc">https://calliope.cc</a> sayfalarını ziyaret edebilirsiniz.',
        ],
        'instructions' => [
            "Başlamak için bir plan oluşturun ve egzersiz ünitelerinin sırasını belirleyin. Bu planı kullanarak, Calliope mini'nin RGB LED'ini önceden tanımlanmış düzende 5 renkten birini gösterecek şekilde programlayın. Daha sonra bu düzen için bir değişken oluşturun ve döngüleri kullanarak tekrarları programlayın.",
            'Unutmayın: Programı istediğiniz gibi uygulamayı başardıysanız, info@calliope.cc adresine e-posta göndererek bizimle paylaşabilirsiniz. Neler üreteceğinizi çok merak ediyoruz! Bu arada, başvurular arasından seçilecek 30 kişiye Calliope mini veriyoruz!',
            'Projenizin kare kodunu Instagram’da paylaşın, #EUCodeWeekChallenge hashtag’ini ekleyin ve @CodeWeekEU hesabını etiketlemeyi unutmayın.',
        ],
        'example' => [
            'Bilgisayarınızın başında otururken de sportif olabilirsiniz.',
            'Calliope mini ile simülatörde de test edilebilecek bir fitness prototipi oluşturun. Bu görev, MakeCode düzenleme yazılımı üzerinde basit bir kod dizisi programlayarak yapılır (bkz. ekran görüntüsü).',
            '5 farklı renk seçin ve her renge bir fitness egzersizi atayın, ör. squat ya da jumping jacks. Daha sonra renkler istenilen sırada dizilerek egzersiz yapılabilir.',
        ],

    ],    'common' => [
        'share' => 'Projenizin bağlantısını veya kare kodunu Instagram\’da ya da Facebook\’ta paylaşın, #EUCodeWeekChallenge hashtag\’ini ekleyin ve @CodeWeekEU hesabını etiketlemeyi unutmayın.',
        'audience' => [
            'Öğretmenler ve eğitmenler',
            'İlkokul öğrencileri (6-12 yaş)',
            'Ortaokul öğrencileri (12-16 yaş)',
            'Lise öğrencileri (16-18 yaş)',
        ],
    ],
    'code-a-dice' => [
        'title' => 'Zar atma oyunu kodlama',
        'author' => 'Fabrizia Agnello',
        'purposes' => [
            'İnteraktif bilmeceler kodlama',
            'Gerçek nesne mevcut olmadığında kullanılacak olan rastgele hareket eden bir nesne simülasyonu kodlamak',
        ],
        'description' => 'Bu mücadelede, komut verdiğinizde rastgele atılacak olan bir zar kodlayacaksınız. Tıpkı rol yapma oyunlarında kullanılanlar gibi dilediğiniz sayıda yüze sahip herhangi türde bir zar seçebilir ve ses ekleyebilirsiniz. ',
        'instructions' => [
            'Scratch üzerinde oturum açın',
            'Bir arka fon seçin',
            'Zar kuklanızı oluşturun veya web üzerinden bulduğunuz kuklayı programa yükleyin',
            'Bu kukla için her biri farklı bir sayıyı gösterecek şekilde, seçilen zarın yüzlerinin sayısı kadar kostüm oluşturun',
            'Zarın ne şekilde atılmasını (klavyede bir tuşa basarak, kuklaya tıklayarak vb.) istediğinizi belirleyin ve kodu yazın',
            'Zar atıldıktan sonra kostüm rastgele değişecek şekilde kuklayı kodlayın',
            'Ses efektleri ekleyin',
        ],
        'example' => '20 yüzlü zar atma',
    ],
    'personal-trainer' => [
        'title' => 'micro:bit ile kişisel antrenör',
        'author' => '',
        'purposes' => [
            'micro:bit kodlayarak sesli uyarıcı ve ışıklı panel kullanmak',
            'Fiziksel aktiviteleri kontrol etmek üzere kişisel bir cihaz oluşturmak',
            'Spor yaparak sağlıklı olmak amacıyla micro:bit kodlamak',
        ],
        'description' => 'Bu mücadelede, dinlenme süresiyle birlikte fiziksel egzersiz tekrar sayılarını kontrol etmek üzere micro:bit kodlayacaksınız. Bu sayede okulda, evde veya parkta fiziksel aktivitelerinizi takip edebilirsiniz.',
        'instructions' => [
            'A+B olduğunda, her saniyede bir ses çıkaracak ve ardından ekranda BAŞLA! yazısı gösterilecek şekilde 3 saniyelik geri sayım sayacı oluşturun',
            'İlk egzersizde, 20 saniye boyunca yanıp sönen 2x2 boyutlarında bir kare gösterin. Ardından ses çalsın ve kare yanıp sönmeyi durdursun. Kalan zamanda 10 saniye boyunca yanıp sönen başka bir görüntü gösterin. Süre dolduğunda ses çalsın.',
            'Ardından aynı işlemi tekrarlayın, fakat bu kez egzersiz süresi boyunca 3x3 boyutlarında bir panel gösterin. 5x5 panel gösterilene dek bu işlemleri tekrarlayın.',
        ],
        'duration' => '30-40 dakika',
    ],
    'create-a-spiral' => [
        'title' => 'Sarmal oluşturma',
        'author' => 'Lydie El-Halougi',
        'purposes' => [
            'Döngü ve değişkenleri öğrenip uygulamak.',
            'Kodlamada yaratıcılığı artırmak.'],
        'description' => 'Bu mücadelede, kalem blokları ile döngüleri ve değişkenleri kullanarak bir sarmal oluşturmak üzere Scratch üzerinde proje yazacaksınız.',

        'instructions' => [
            'Kalem blokları',
            'Sarmal adında yeni bir proje oluşturun.',
            'Pencerenin sol alt tarafındaki mor renkli “Eklenti ekle” simgesine tıklayın',
            'Ardından “kalem” ögesini seçin: projenizde kalem bloklarını kullanmaya başlayın!',
            'Projenize başlamak için “yeşil bayrağa tıklandığında” blokunu sürükleyip bırakın:',
            'Boş bir sayfa ile başlamanız gerekmektedir: bunun için kalem bloklarının içerisine “tümünü sil” blokunu ekleyin:',
            'Çizim işlemine sahnenin orta kısmından başlamak için kuklanız sahnenin ortasında (0,0) olmalıdır:',
            'Kuklanızı çizim yapmadan hareket ettirebilir veya hareket ettirip çizim yapabilirsiniz:',
            'çizim yapmak istediğinizde kalemi bastır blokunu kullanabilirsiniz',
            'çizim yapmak istemediğinizde kalemi kaldır blokunu kullanabilirsiniz',
            'Çizim yapmaya başlayın! “Kalemi bastır” blokunu ekleyin:',
            'Altıgen',
            'Alttaki blokları projenize ekleyin:',
            'Altıgeninizin birinci parçası hazır. Şimdi bu işlemi 6 defa tekrarlamanız gerekmektedir:',
            'Sarmal',
            'Sarmal oluşturmak için her bir yan kenarın uzunluğuna 2 eklemeniz gerekmektedir.',
            'Bunun için bir <strong>değişken</strong> kullanın.',
            'Değişken bloklarında, Değişken Oluştur ögesine tıklayın',
            'Bu değişkeni Uzunluk olarak adlandırıp Tamam ögesine tıklayın:',
            'Sarmal giderek büyüyeceği için küçükten başlamanız gerekmektedir: ilk uzunluğu 10 olarak ayarlayın ve bu bloku döngünün önüne ekleyin.',
            'Ardından “uzunluk” değişkenini, “… adım git” blokuna ekleyin',
            'Sarmalın büyümesi için her döngüde uzunluk da artmalıdır: alttaki bloku döngünün sonuna ekleyin:',
            'Mevcut projeniz hazır:',
            'Güzel bir sarmal ',
            'Bir sarmal çizdiniz! Sürekli devam etmesi için “6 defa tekrarla” döngüsünü “sürekli” döngüsüyle değiştirin:',
            'Renkli bir sarmal çizmek için alttaki bloku döngüye ekleyin:',
            'Baştan başladığınızda, kukla istenmeyen bir çizgi çizecektir. Bunu önlemek için projenin başına “kalemi kaldır” blokunu ekleyin.',
            'Projenizin son hâlini oluşturdunuz:',
            'Tebrikler! Çok güzel bir sarmal yaptınız!',
        ],

    ],
    'play-against-ai' => [
        'title' => 'Taş, Kağıt, Makas Oyunu oluşturma ve yapay zekaya karşı oynama',
        'author' => 'Kristina Slišurić',
        'purposes' => [
            'makine öğrenme döngüsünün nasıl işlediğini anlamak.',
            'Öğretilebilir Makine işlevini kullanarak makine öğrenimi modeli oluşturmak',
            'Pictoblox aracını kullanmayı öğrenmek ve oluşturulan modeli projeye aktarmak',
            'Pictoblox içerisinde sahneyi ve karakterleri ayarlamak ve değişkenler oluşturup başlatmak',
            'oyunu başlatmak, oyuncu hareketlerini tanımlamak, rastgele yapay zeka hareketlerini programlamak',
            'Taş, Kağıt, Makas oyununda rakibin yapay zeka olduğu bir oyun oluşturup test etmek.',

        ],
        'description' => 'Görüntüler doğrultusunda Öğretilebilir Makine işlevini uygulayarak bir model oluşturmak için şu üç sınıfı kullanacağız: Taş, Kağıt, Makas. Bu modeli Pictoblox üzerine yükleyeceğiz ve bunu yapay zekaya karşı oynayacağımız bir oyun oluşturmada kullanacağız.',
        'duration' => '90 dakika',
        'instructions' => [
            'Öğretilebilir makine üzerinde Taş, Kağıt ve Makas adlı 3 sınıfın bulunduğu yeni bir görüntü projesi oluşturun. Her bir sınıf için en az 400 fotoğraf çekin. Arka zeminin boş olmasına dikkat edin. Modeli eğitin ve dışa aktarın. Modeli yükleyin ve bağlantıyı kopyalayın.',
            'Pictoblox sitesinde ücretsiz bir hesap açın. Makine Öğrenimi Eklentisini ekleyin ve bir model yükleyin. Sahneyi, değişkenleri ve kuklaları ayarlayın. Oyunu başlatın, oyuncu hamlelerini ve yapay zeka hamlelerini tanımlayın ve o raundu kimin kazanacağını belirleyin.',
            'Verileri oyun için eğitin.',
            'Modeli test etme.',
            'Modeli dışa aktarın.',
            'Makine öğrenimi eklentisini ekleyin ve modeli yükleyin.',
            'Sahneyi, değişkenleri ve Kuklayı ayarlayın.',
            'Oyunu başlatın.',
            'Oyuncu Hamlelerini tanımlayın.',
            'Rastgele Yapay Zeka Hamlelerini ayarlayın.',
            'Rastgele Yapay Zeka hamlelerini yayınlayın.',
            'Üç blok yapın. Raundu kim kazanacak? ',
            'Raundu oyuncu kazanacaksa işaretleyin.',
            'Raundu yapay zeka kazanacaksa işaretleyin.',
            'Raunt berabere bitecekse işaretleyin.',
            'Blokları programlayın.',
            'Taş Kağıt Makas Kuklası',
        ],
    ],
    'air-drawing-with-AI' => [
        'title' => 'Yapay zeka ile havaya çizim yapma',
        'author' => 'Kristina Slišurić',
        'purposes' => [
            'kamera önündeki parmak hareketlerini tespit eden vücut algılama eklentisini kullanarak bir program yazmak.',
            'birkaç kod satırı ve basit bloklarla kodlama yapmak.',
            'yapay zeka kullanımı örneğini incelemek',
        ],
        'description' => 'Kullanıcının kamera önünde eliyle (işaret parmağıyla) havaya çizim yapmasını ve yaptığı çizimin otomatik olarak Pictoblox sahnesinde gösterilmesini sağlayan bir program oluşturma.',
        'instructions' => [
            'Pictoblox üzerinde hesap açın',
            'görsel komutları takip edin:',
            'Vücut Algılama ve Kalem eklentilerini ekleyin;',
            'sahneyi ayarlayıp şu ögeler için kuklayı (Kalem) ve ilave kuklaları ekleyin: Kalemi Bastır, Kalemi Kaldır, Tümünü Sil;  ',
            'Kalem kuklasının parmağı takip etmesi için bir kod yazın',
            'şu düğmeler için bir kod yazın: Kalemi Kaldır, Kalemi Bastır, Tümünü Sil ve Kalem',
            'Artık farklı renk ve boyutlardaki kalemlerle dilediğiniz gibi kendi çizimlerinizi yapabilirsiniz.',
        ],
        'materials' => [
            'Kameralı bir dizüstü veya masaüstü bilgisayar',
            'PictoBlox’un en güncel sürümünü indirebilir (önerilir) veya Pictoblox’u çevrim içi olarak (ücretsiz) kullanabilirsiniz',
            'Pictoblox hesabı (ücretsiz)',
            'İyi bir internet bağlantısı',
        ],
    ],
    'emobot-kliki' => [
        'title' => 'Emobot Kliki',
        'author' => 'Margareta Zajkova',
        'purposes' => [
            'Makine öğrenimi ve metin tanıma süreçlerine ilişkin temel kavramları öğrenmek.',
            'İletişimde duyguların rolünü anlamak.',
            'Kod kullanarak sohbet robotu ile kullanıcı arasında diyaloglar oluşturmak.',
            'Bilgisayarların metin analizi yoluyla duygusal farklılıkları nasıl algılayıp buna göre yanıt verdiğini anlamak.',
        ],
        'description' => [
            'Scratch üzerinde olumlu mesajlar için (güzel şeyler söylediğinizde) mutlu ifadeli, olumsuz mesajlar için (kötü ve kaba şeyler söylediğinizde) kızgın ifadeli, anlaşılamayan mesajlar için ise kafası karışmış ifadeli bir Duygu Robotu oluşturun.',
            'İltifatları ve hakaretleri algılayabilen Emobot Kliki sayesinde, bilgisayarların duygusal farklılıkları algılamak üzere nasıl eğitilebileceğini göreceğiz.',
        ],
        'instructions' => [
            'Başlamak için güzel/kibar ve kötü/kaba ifadelere ilişkin bir kural listesi programlayın.',
            'https://machinelearningforkids.co.uk/ adresinde oturum açın veya yeni bir hesap oluşturun.',
            '3 yeni etiket ekleyerek yeni bir makine öğrenimi modeli hazırlayın; bunlardan birincisini “güzel”, ikincisini ise “kötü” olarak adlandırın, modelin isminizi de bilmesini istiyorsanız “isim” adlı üçüncü bir etiket oluşturun.',
            'Yeni makine öğrenimi modelini eğitip test edin ve bunu Scratch üzerinde Emobot oluşturmada kullanın.',
            'Scratch 3 editörünü çalıştırın, kedi kuklasını silin, Microsoft Bing Görüntü Oluşturucu tarafından oluşturulmuş 3 yeni kuklayı (mutlu, kızgın ve kafası karışmış bilgisayar simgesi) ekleyin veya Resim simgesine tıklayıp mutlu, kızgın ve kafası karışmış ifadeler için üç farklı kostüm çizerek yeni bir kukla oluşturun.',
            '“Kod” sekmesine tıklayın ve alttaki komut dizisini girin.'],
        'example' => [
            'Oluşturduğunuz Emobot Kliki\’yi arkadaşlarınızla paylaşın ve yapay zeka ile duygular hakkında daha fazla bilgi edinin!',
            'Bilgisayar simgesi yerine hayvan gibi başka bir simge de kullanabilirsiniz. Karakteri, kibar ve kaba ifadeler yerine farklı türde mesajları algılayacak şekilde eğitebilirsiniz.',
        ],

    ],
    'craft-magic' => [
        'title' => 'Yapay Zeka El Hareketleri ile Sihirbazlık Yapma',
        'author' => 'Georgia Lascaris',
        'purposes' => [
            'Öğrenciler arasında kodlama becerilerini geliştirerek temel komutları kullanmalarını sağlamak.',
            'Karmaşık görevleri yönetilebilir adımlara bölerek algoritmik düşünme becerilerini geliştirmek.',
            'Çizim ve yazıda özel el hareketi uygulamalarını bulma konusunda yaratıcı problem çözmeyi teşvik etmek.',
            'Yapay zeka kavramlarının (özellikle de yapay zekanın, el hareketlerinin bilgisayarlar tarafından algılanıp yorumlanmasını nasıl mümkün kıldığının) anlaşılmasını sağlamak.',
            'Engelli bireyler için teknolojinin önemine ilişkin farkındalık yaratmak.',
            'Öğrenciler arasında iş birliğine dayalı problem çözmeyi ve ekip çalışmasını teşvik ederek, el hareketi programlarını geliştirmek üzere birlikte çalışmalarını sağlamak.',
            'Kodlama ve sayısal düşünme becerilerini gerçek hayattaki uygulamalarla bağlantılı hâle getirerek teknolojinin insan hayatı üzerindeki anlamlı etkisini vurgulamak ve Sürdürülebilir Kalkınma Hedefleri (SDG’ler) ile uyumlu hâle gelmek.',
        ],
        'duration' => [
            '10-12 yaş arası öğrenciler için 90 dakika',
            '12-15 yaş arası öğrenciler için 45 dakika',
        ],
        'description' => 'Fare veya dokunmatik ekran kullanmaya gerek kalmadan ekran üzerinde çizim yapabilmek amacıyla, yapay zeka “Vücut” eklentisini yaratıcı ve ilgi çekici bir biçimde kullanan blok tabanlı bir Scratch programı oluşturun.',
        'instructions' => [
            'https://ai.thestempedia.com sitesine bağlanarak öğretmen ve öğrenci hesapları açın.',
            'Ardından ‘Vücut Algılama’,’ Kalem’,’ Yazıyı Sese Çevirme’ eklentilerini içe aktarın.',
            'Kitaplıktan ‘Kalem’ Kuklasını ekleyip 7 farklı kukla oluşturun (‘yaz’, ‘temizle’, ‘siyah’, ‘kırmızı’, ‘mavi’, ‘yeşil’, ‘pembe’).',
            'Ardından ‘kalem’ kuklası diğer kuklalardan herhangi birine dokunduğunda ne olacağını belirlemek için komut yazın.',
            'Kameranın El Hareketini algılaması ve kalemi işaret parmağınızın x ve y koordinatlarına götürmesi için komut yazın.',
            'Uygulamanın sonunda kostümü değiştirin.',
            'Ses efektleri ekleyin.',
        ],
        'materials' => [
            'Programlama platformu https://ai.thestempedia.com (ücretsiz)',
            'öğretmen hesabı (ücretsiz)',
            'öğrenci hesabı (ücretsiz)',
            'Kameralı bilgisayar',
            'İnternet bağlantısı',
        ],
    ],
    'circle-of-dots' => [
        'title' => 'Noktalı daire',
        'author' => 'Marin Popov',
        'purposes' => [
            'Noktalardan oluşan bir hat çizecek şekilde kod yazmak.',
            'Çizgilerden oluşan bir hat çizecek şekilde kod yazmak.',
            'Daire çizecek şekilde kod yazmak.',
            'Noktalı (çizgili) daire çizecek şekilde kod yazın.',
        ],
        'description' => 'Noktalardan veya çizgilerden oluşan bir daire çizin.',
        'duration' => '40 dakika',
        'instructions' => [
            'Nokta bloku oluşturma.',
            'Çizgi bloku oluşturma.',
            'Noktalardan oluşan bir daire yapma.',
            'Çizgilerden oluşan bir daire yapma.',
        ],
    ],
    'coding-escape-room' => [
        'title' => 'Kodlama kaçış odası oluşturma',
        'author' => 'Stefania Altieri ve Elisa Baraghini',
        'purposes' => [
            'Kodlama kavramlarını öğretmek/öğrenmek ve bu kavramlar üzerinde düşünmek.',
            'Basit kodlama araçlarını kullanmak.',
            'Sayısal düşünme ve problem çözme becerilerini geliştirmek.',
        ], 'description' => [
            'Şunun gibi bir kodlama kaçış deneyimi oluşturun:',
            'Kodlama üzerine bir hikâye yaratmak için Google formlar, Genially veya Google slaytlar gibi herhangi bir aracı kullanabilirsiniz ;).',

        ],
        'duration' => '90 dakika',
        'instructions' => 'Öğrencilerinizi küçük gruplara ayırıp oyun oynamalarını ve ardından bu şablonu kullanarak başka bir mücadele hazırlamalarını sağlayabilirsiniz: ',

        'materials' => [
            'Herhangi bir araç (belge, sunum ve sayfa oluşturup paylaşmak üzere Google ve Microsoft platformları) kullanılabilir. BİT ve kodlamayla bağlantılı her türlü kodlama yapısı, aracı veya karakteri kullanılabilir.',
        ],
        'example' => [
            'BİT geçmişinde önemli rolü olan bazı karakterler ile temel kodlama ve programlama kavramları, oyun yoluyla tanıtılır. Öğrenmenin ve aktif bir biçimde katılım göstermenin en iyi yolu budur. Bu oyun, tıpkı bir mücadele veya yarışma gibi ekipler hâlinde ya da tek başına oynanabilir. Ardından öğrenciler buna benzer bir şey hazırlayarak yaratıcılık ve kodlama becerisi gibi yetkinliklerini geliştirebilirler.',
            'Bu, yeniden kullanılabilecek ve kolayca yeniden oluşturulabilecek çok kullanışlı bir kaynaktır. Google formlar, kullanılabilecek araçlardan bir tanesidir. Örtüşen hikâyeler ve kendinize ait maceralar yaratmak üzere Google slaytlar, Genial.ly, Emaze veya başka herhangi bir araç kullanabilirsiniz.',
            'Kaçış mücadelesi bölümlere ayrılmıştır. Çözümü bulduğunuz takdirde ilerleyebilirsiniz. Öğrencilerin kodlama bilmeceleri hazırlamaları gerekmektedir.',
        ],
    ],
    'let-the-snake-run' => [
        'title' => 'Yılan kaçırma oyunu',
        'author' => 'Ágota Klacsákné Tóth',
        'purposes' => [
            'micro:bit üzerinde yılan hareketlerini kodlamak.',
            'Ortak hareket etmek üzere doğru yerleşim ve zamanlamayı ayarlamak.',
        ],
        'description' => 'Öğrenciler yılanı micro:bit üzerinden birbirlerine doğru yönlendirecek şekilde kod yazmalıdır. Yılan bir micro:bit’ten diğerine kaçıyor gibi görünmelidir.',
        'duration' => '30 dakika',
        'instructions' => [
            'Yan yana çok sayıdaki micro:bit üzerinden geçen bir yol tasarlayın (ör. 2x2 boyutlarında bir kare oluşturarak).',
            'Yılanın yol boyunca ilerlemesi için kod yazın.',
            'Herkes kendi bilgisayarında çalışıp daha sonra bunları bir araya getirerek kodu çalıştırmalıdır.',
            'Zamanlamayı ve yerleşimi göz önünde bulundurun: Yılan bir micro:bit’ten çıkıp yanındaki diğer micro:bit’e gitmelidir.',
            'Daha fazla mücadele: micro:bit v2 ile yılan kendi bilgisayarınızdan çıkana dek müzik çalmasını sağlayın.',
            'Işıkların parlaklığını değiştirerek yılanı tasarlayın.',
            'Yılanın uzunluğunu veya yılan sayısını artırın.',
        ],
        'example' => [
            'Bu örnekte, 2x2 boyutlarında bir kare kullanılarak 4 micro:bit ile oluşturulmuş 6 piksel uzunluğunda bir yılan bulunmaktadır: ',
            'Başlangıç micro:bit’ini kodlama (bunu öğretmen yapabilir)',
            'Tüm kodlar, A düğmesine basıldığında diğer micro:bit’lere radyo dalgası gönderen bu micro:bit ile başlatılır.',
            'Yılan hareketlerini kodlama',
            'Her bir micro:bit, başlangıç micro:bit’i ile aynı radyo grubunda olmalıdır.',
            'Tüm hareketler radyo sinyali alındığında başlar.',
            'İlk micro:bit hemen hareket eder, diğerleri ise yılan kendilerine ulaşana dek bekler.',
            'İki evre arasındaki zaman, yılanın hızını belirler.',
        ], 'materials' => [
            'micro:bit’ler (mümkünse her öğrenci için)',
            'makecode.microbit.org editörü için dizüstü veya masaüstü bilgisayar',
        ],
    ],
    'illustrate-a-joke' => [
        'title' => 'Bitsy ile şaka hazırlama',
        'author' => 'Margot Schubert',
        'purposes' => 'Kullanıcının komik bir sorunun cevabını bulduğu ufak bir oyun tasarlamak.',
        'description' => 'Öğrenciler, karakterin oyun alanındaki bir nesneye çarpmasıyla kullanıcının komik bir sorunun cevabını bulduğu bir oyun tasarlarlar.\', Öğrenciler bitsy’nin temel özelliklerini kullanarak bu mücadeleyi tamamlarlar.',
        'instructions' => [
            'Komik bir soru düşünün. Bitsy’e gidip yeni bir proje başlatın. Gerekenler:',
            'etrafta hareket ettirebileceğiniz bir avatar/kukla',
            'Mor arka zemin üzerinde beyaz bir kedi',
            'Otomatik oluşturulmuş açıklama',
            'avatarınızın gitmesi gereken nesne',
            'bir oda, yani programınızın arka zemini',
            'iki mesaj: bir soru ve bir cevap',
            'Bitmiş oyun, html dosyası olarak indirilebilir.',
        ],
        'example' => 'Bu web sitesinde, bir şaka örneği ve dijital yazı tahtası bağlantısı bulunmaktadır:',
        'materials' => 'bitsy, tarayıcı üzerinde çalışır',
    ],
    'app-that-counts-in-several-languages' => [
        'title' => 'Farklı dillerde sayı sayma uygulaması',
        'author' => 'Samuel Branco',
        'purposes' => [
            'Basit bir uygulama oluşturmayı öğrenmek.',
            'Bloklar aracılığıyla programlama yapmayı öğrenmek.',
            'Etiket, düğme, görüntü, algılayıcı ve ortam dosyası eklemeyi öğrenmek.',
            'Uygulama ekranında ögeleri düzenlemeyi öğrenmek.',
        ],
        'description' => 'Uygulama, tek bir düğmeye basarak birden fazla dilde sayı saymayı sağlar. Kullanıcı akıllı telefonunu her salladığında sayaç sıfırlanır. Buradaki mücadele, başka bir dil eklemektir.',
        'instructions' => [
            'Mücadeleyi tamamlamak için uygulamanın saymasını istediğiniz diğer dili tanımlamanız gerekmektedir.',
            'Ardından o ülkenin bayrağını internetten indirip (ör. Pixabay veya Unsplash üzerinden), Resim özelliği içerisinde yer alan bayrak adlı öge aracılığıyla MIT APP Inventor platformuna yüklemeniz gerekmektedir.',
            'Daha sonra ülkenin adının İngilizcede nasıl okunduğunu ve ‘bırak’ ve ‘buraya bas’ ifadelerinin o ülkenin dilinde nasıl söylendiğini bulmanız gerekmektedir.',
            'Son olarak, uygulamanın yeni dilde çalışması için gereken blokları eklemeniz gerekmektedir.',
        ],
        'materials' => [
            'Bir uygulama geliştirmek için internet erişimi olan bir masaüstü veya dizüstü bilgisayarınız olmalıdır.',
            '<a href=\'https://ai2.appinventor.mit.edu\'>https://ai2.appinventor.mit.edu</a> üzerinden erişilebilen MIT APP Inventor platformunda bir hesap açın',
            'Geliştirdiğiniz uygulamayı test etmek için akıllı telefonunuza MIT AI2 Companion uygulamasını kurmanız gerekmektedir.',
        ],
    ],
    'coding-with-art-through-storytelling' => [
        'title' => 'Hikâye anlatarak kodlama sanatı',
        'author' => 'Maria Tsapara ve Anthi Arkouli',
        'purposes' => [
            'Sanatla ilgilenerek gözlem, yorumlama ve sorgulama becerilerini geliştirmek.',
            'Yaratıcı olmak ve başkalarıyla ortak bir hedef için iş birliği yapmak',
            'Hikâyeyi yeniden anlatabilmek için bir algoritma oluşturmak.',
        ],
        'description' => 'Bu mücadelede, öğrenciler sanat eserlerinden ilham alıp bir hikâye oluşturacak ve bu hikâyeyi tasvir edeceklerdir. Ardından, programlanabilir bir robotik kit kullanarak veya bilgisayarsız bir aktivite olarak hikâyeyi yeniden anlatmaya çalışacaklardır.',
        'materials' => [
            'Bu aktivite, bilgisayarsız bir aktivite olarak veya beebot/bluebot/robot fare gibi eğitici ve programlanabilir bir robot kullanılarak gerçekleştirilebilir.',
            'beebot ok kartları veya bilgisayarsız aktivite için ok kartları',
            'Yunanca',
            'Project Zero\'s Thinking Routine Toolbox hakkında daha fazla bilgi için şu adresi ziyaret edebilirsiniz:',

        ],
        'example' => [
            'Öğretmen, hikâyedeki ilk olaya ulaşmak amacıyla Bee-Bot veya başka bir robot için komutlar içeren kartları kullanarak algoritma tasarlamayı modellemek üzere öğrencilerle birlikte mat üzerinde çalışır. Öğrenciler, 3-4 kişilik ekipler hâlinde çalışarak, robotun bir sonraki dizgeye ilerlemesi için bir algoritma tasarlarlar. Öğrenciler, sınıf matı üzerinde algoritmalarını test ederler ve gerekiyorsa hata ayıklama yaparlar.',
            'Diledikleri kadar hikâye olayı ilave ederek devam ederler',
            'Bu aktivite, bilgisayarsız bir aktivite olarak da gerçekleştirilebilir.',
            'Çocuklardan biri robot, diğeri de bilgisayar programcısı olur. Bilgisayar programcısı, robotun bir görüntüden diğerine geçerek hikâyeyi yeniden anlatmasına yardımcı olmak için ok kartlarını kullanarak algoritmik bir yol oluşturur. Robot bir görüntüye ulaştığında, her seferinde kendisinden hikâyenin bir kısmını anlatması istenir.',
        ],
        'instructions' => [
            'Öğretmen, öğrencilerden bir tabloyu/fotoğrafı gözlemlemelerini ister.',
            'Hikâye oluşturmak için "Giriş, Gelişme, Sonuç" (Project Zero - Harvard School) düşünme rutinini kullanırlar.',
            'Öğretmen, öğrencilere "Bu sanat eseri, bir hikâyenin girişi/gelişmesi/sonucu ise bunun ardından/hikâye bitmeden önce/en sonda ne olabilir?" sorusunu sorar.',
            'Öğrenciler hikâyedeki olayları tasvir ederler.',
            'Öğrenciler hikâyeyi bir araya getirip olayları çalışma ekranına yerleştirirler. Beebot’un hikâyeyi yeniden anlatmasına yardımcı olmak için ok kartlarını kullanarak bir algoritma oluştururlar.',
        ],
    ],
    'coding-with-legoboost' => [
        'title' => 'Scratch eklentisi olan LegoBoost ile kodlama ve programlama',
        'author' => 'Lidia Ristea',
        'purposes' => [
            'LegoBoost kullanarak modeller oluşturmak.',
            'Scratch üzerinde programlama becerilerini geliştirmek.',
            'basit veya karmaşık komutlar kullanarak robotları programlamak.',
        ],
        'description' => 'Bu mücadelede öğrenciler, robotların ileri geri gitmesi, engellerden kaçması ve sesli komut alması için Scratch-LegoBoost eklentisini kullanarak uygulamaya kod gireceklerdir.',
        'duration' => '120 dakika',
        'instructions' => [
            'Scratch.mit.edu uygulamasında oturum açın.',
            'Scratch Bağlantısını çalıştırın ve Dizüstü Bilgisayarınızda Bluetooth’u etkinleştirin.',
            'Scratch üzerinde Eklenti Ekle ögesine tıklayın ve LegoBoost’u seçin.',
            'AB Kod Haftası ile ilgili bir resim ekleyin.',
            'İki AB motorunu AÇIK konuma getirin, kırmızı renkli bir engelle karşılaştıklarında ise KAPALI konuma getirin.',
            'Yeşil renkte A motorunu, siyah renkte ise B motorunu AÇIK konuma getirin.',
            'Yeşil, kırmızı ve siyah engeller bir güzergâh üzerine yerleştirilecektir.',
            'Bir engelle karşılaşıldığında yazıyı sese çevirme, oklardan dönüş yapma ve hareket etme komutları ekleyin.',
            'Test edin!',
        ],
    ],

];
