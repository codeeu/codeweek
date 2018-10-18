@extends('layout.base')

@section('content')

<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>G&ouml;rsel programlama - Scratch&rsquo;e giriş</h1><span>Margo Tinawi</span></div>

                    <hr>

                    <p>G&ouml;rsel programlama, insanların işlemleri ill&uuml;strasyon ya da grafik kullanarak tanımlamasını sağlar. Metin tabanlı programlamanın aksine genellikle g&ouml;rsel bir programlama mevcuttur. G&ouml;rsel programlama dilleri (GPDler), &ccedil;ocuklara (ve hatta yetişkinlere) algoritmik d&uuml;ş&uuml;nmeyi tanıtacak şekilde uyarlanmıştır. GPDlerde okunacak daha az şey olup, uygulanacak s&ouml;zdizimleri yoktur.</p>

                    <p>Bu videoda, Le Wagon'da Web Geliştirme &Ouml;ğretmeni olarak g&ouml;rev yapan ve Techies Lab asbl'ın (Bel&ccedil;ika) Kurucu Ortağı olan Margo Tinawi, t&uuml;m d&uuml;nyada kullanılan en pop&uuml;ler GPD'lerden biri olan Scratch'i keşfetmenize yardımcı olacak. Scratch MIT tarafından 2002 yılında geliştirilmiş olup, o zamandan beri, &ouml;ğrencilerinizle ger&ccedil;ekleştirebileceğiniz milyonlarca projeye ve &ccedil;eşitli dillerde sayısız derse ulaşabileceğiniz b&uuml;y&uuml;k bir topluluğa sahiptir.</p>

                    <p>Scratch'i kullanmak i&ccedil;in herhangi bir kodlama deneyimine sahip olmanıza gerek yoktur ve bunu her t&uuml;rl&uuml; farklı konuda kullanabilirsiniz! &Ouml;rneğin, &ouml;ğrenciler, Scratch'i dijital bir hikaye anlatımı aracı olarak kullanarak, bir yandan kodlamayı ve sayısal d&uuml;ş&uuml;nmeyi &ouml;ğrenirken ve en &ouml;nemlisi de eğlenirken, bir yandan da hik&acirc;yeler oluşturabilir, bir matematik problemini resmedebilir ya da k&uuml;lt&uuml;rel miras hakkında bilgi edinmek &uuml;zere bir resim yarışmasına katılabilirler.</p>

                    <p>Scratch, son derece sezgisel ve &ouml;ğrencileriniz a&ccedil;ısından motive edici olan &uuml;cretsiz bir ara&ccedil;tır. Nasıl başlayacağınızı &ouml;ğrenmek i&ccedil;in Margo nun videosunu inceleyin.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Video metnini indirin</a></p>

                    <h2>&Ouml;ğrendiklerinizi &ouml;ğrencilerinizle paylaşmaya hazır mısınız?</h2>

                    <p>Aşağıdaki ders planlarından birini se&ccedil;in ve &ouml;ğrencilerinizle bir aktivite d&uuml;zenleyin.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Aktivite 1 - İlkokullar i&ccedil;in Temel Scratch</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Aktivite 2 - İlk&ouml;ğretim Okulları i&ccedil;in Temel Scratch</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Aktivite 3 - Ortaokullar i&ccedil;in Temel Scratch</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>

@endsection