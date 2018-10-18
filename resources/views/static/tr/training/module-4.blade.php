@extends('layout.base')

@section('content')

<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Scratch ile eğitici oyunlar hazırlama</h1><span>Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Eleştirel d&uuml;ş&uuml;nme, sebat etme, problem &ccedil;&ouml;zme, sayısal d&uuml;ş&uuml;nme ve yaratıcılık, &ouml;ğrencilerinizin 21. y&uuml;zyılda başarılı olabilmeleri i&ccedil;in gereken temel becerilerden bazıları olup, kodlama, bunları eğlenceli ve motive edici bir şekilde ger&ccedil;ekleştirmenize yardımcı olabilir.</p>

                    <p>Talimat ve d&ouml;ng&uuml; dizilerini kullanan akış kontrol&uuml; algoritmik kavramları ile değişkenlerden ve listelerden ya da s&uuml;re&ccedil; senkronizasyonundan faydalanan veri g&ouml;sterimleri, kulağa karmaşık kavramlar gibi gelebilir, ancak bu videoda bunların d&uuml;ş&uuml;nd&uuml;ğ&uuml;n&uuml;zden &ccedil;ok daha kolay bir şekilde &ouml;ğrenilebileceğini g&ouml;receksiniz.</p>

                    <p>Bu videoda, İspanya&rsquo;da Bilgisayar Bilimi &ouml;ğretmeni ve araştırmacı olarak g&ouml;rev yapan Jes&uacute;s Moreno Le&oacute;n, &ouml;ğrencilerinizin bu ve diğer becerilerini nasıl eğlenceli bir bi&ccedil;imde geliştirebileceğinizi a&ccedil;ıklayacak. Peki, bu nasıl yapılabilir? D&uuml;nya &ccedil;apındaki okullarda kullanılan en pop&uuml;ler programlama dili olan Scratch &uuml;zerinde bir soru ve cevap oyunu hazırlayarak. Scratch sadece sayısal d&uuml;ş&uuml;nmeyi geliştirmekle kalmaz, aynı zamanda &ouml;ğrencilerinizin &ouml;ğrenirken ve eğlenirken motive olmasını sağlamak i&ccedil;in sınıfta oyun &ouml;gelerinin kullanılmasına da olanak tanır.</p>

                    <p>Nasıl başlayacağınızı &ouml;ğrenmek i&ccedil;in videoyu inceleyin:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Video metnini indirin</a></p>

                    <h2>&Ouml;ğrendiklerinizi &ouml;ğrencilerinizle paylaşmaya hazır mısınız?</h2>

                    <p>Aşağıdaki ders planlarından birini se&ccedil;in ve &ouml;ğrencilerinizle bir aktivite d&uuml;zenleyin.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Aktivite 1 - İlkokullar i&ccedil;in Scratch ile soru cevap oyunu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Aktivite 2 - İlk&ouml;ğretim Okulları i&ccedil;in Scratch ile soru cevap oyunu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Aktivite 3 - Ortaokullar i&ccedil;in Scratch ile soru cevap oyunu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>

@endsection