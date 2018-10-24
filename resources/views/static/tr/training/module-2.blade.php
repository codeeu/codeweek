@extends('layout.base')

@section('content')

<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Sayısal d&uuml;ş&uuml;nme ve problem &ccedil;&ouml;zme</h1><span>Miles Berry</span></div>

                    <hr>

                    <p>Sayısal d&uuml;ş&uuml;nme (SD), problemleri ve sistemleri bilgisayar yoluyla &ccedil;&ouml;z&uuml;p anlayabilmek i&ccedil;in bunlara nasıl bakacağımızı tanımlar. Sayısal d&uuml;ş&uuml;nme, yalnızca bilgisayar programlarının geliştirilmesi a&ccedil;ısından &ouml;nem teşkil etmekle kalmaz, aynı zamanda t&uuml;m disiplinlerde problem &ccedil;&ouml;zmeyi desteklemede de kullanılabilir.</p>

                    <p>Karmaşık problemleri daha k&uuml;&ccedil;&uuml;k par&ccedil;alara ayırmalarını (ayrıştırma), kalıpları tanımalarını (&ouml;r&uuml;nt&uuml; tanıma), problem &ccedil;&ouml;zme ile ilgili ayrıntıları tanımlamalarını (soyutlama) sağlayarak ya da istenen bir sonuca ulaşmak i&ccedil;in takip edilecek kural ya da talimatları belirleyerek (algoritma tasarımı) &ouml;ğrencilerinize sayısal d&uuml;ş&uuml;nmeyi &ouml;ğretebilirsiniz. SD, Matematik (2. derece polinomları &ccedil;arpanlara ayırmanın kurallarını anlama), Edebiyat (bir şiir &ccedil;&ouml;z&uuml;mlemesini, &ouml;l&ccedil;&uuml;, kafiye ve yapı &ccedil;&ouml;z&uuml;mlemesine indirgeme), Dil (zaman değiştik&ccedil;e bir fiilin yazılışını etkileyen son harflerindeki &ouml;r&uuml;nt&uuml;y&uuml; bulma) gibi farklı disiplinlerde &ouml;ğretilebilir.</p>

                    <p>Bu videoda, Guildford'daki (Birleşik Krallık) Roehampton &Uuml;niversitesi Eğitim Fak&uuml;ltesi'nde &Ouml;ğretim G&ouml;revlisi olarak g&ouml;rev yapan Miles Berry, sayısal d&uuml;ş&uuml;nme kavramını ve &ouml;ğretmenin bunu basit oyunlarla sınıfa entegre etmesini sağlayacak farklı yolları tanıtacak.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Video metnini indirin</a></p>

                    <h2>&Ouml;ğrendiklerinizi &ouml;ğrencilerinizle paylaşmaya hazır mısınız?</h2>

                    <p>Aşağıdaki ders planlarından birini se&ccedil;in ve &ouml;ğrencilerinizle bir aktivite d&uuml;zenleyin.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Aktivite 1 - İlkokullar i&ccedil;in Matematiksel Akıl Y&uuml;r&uuml;tme</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Aktivite 2 - Ortaokullar i&ccedil;in Algoritmaya Giriş</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Aktivite 3 - Liseler i&ccedil;in Algoritma</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>

@endsection