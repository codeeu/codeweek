@extends('layout.base')

@section('content')

<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Bilgisayarsız (bağlantısız) kodlama</h1><span>Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Kodlama, etrafımızdaki on milyarlarca programlanabilir nesneye yeni işlevler kazandıracak programlar yazmamıza izin veren şeylerin dilidir. Kodlama, fikirlerimizi ger&ccedil;eğe d&ouml;n&uuml;şt&uuml;rmenin en hızlı yolu olup, sayısal d&uuml;ş&uuml;nme becerilerini geliştirmenin de en etkili yoludur. Ancak, sayısal d&uuml;ş&uuml;nme becerilerini geliştirmek i&ccedil;in teknoloji illa ki gerekli değildir. Aksine, sayısal d&uuml;ş&uuml;nme becerilerimiz, teknolojinin işe yaraması i&ccedil;in gereklidir.</p>

                    <p>Bu videoda, İtalya'da Bilgisayar Sistemleri Profes&ouml;r&uuml; olarak g&ouml;rev yapan ve Avrupa Kod Haftası Koordinat&ouml;r&uuml; olan Alessandro Bogliolo, herhangi bir elektronik cihaz olmadan uygulanabilecek bağlantısı kodlama faaliyetlerini tanıtacak. Bağlantısız faaliyetlerin temel amacı, finansman ve ekipmandan bağımsız olarak, kodlamayı t&uuml;m okullara taşıyabilmek i&ccedil;in buna erişimin &ouml;n&uuml;ndeki engelleri azaltmaktır.</p>

                    <p>Bağlantısız kodlama faaliyetleri, &ccedil;evremizdeki fiziksel d&uuml;nyanın sayısal y&ouml;nlerini g&ouml;zler &ouml;n&uuml;ne serer.</p>

                    @include('static.youtube', ['video_id' => '18N1CaQJ0GI'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/TR/CNECT-2018-00222-00-17-TR-TRA-00.DOCX">Video metnini indirin</a></p>

                    <h2>&Ouml;ğrendiklerinizi &ouml;ğrencilerinizle paylaşmaya hazır mısınız?</h2>

                    <p>Aşağıdaki ders planlarından birini se&ccedil;in ve &ouml;ğrencilerinizle bir aktivite d&uuml;zenleyin.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/TR/CNECT-2018-00222-00-00-TR-TRA-00.DOCX">Aktivite 1 - İlkokullar i&ccedil;in CodyRoby</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/TR/CNECT-2018-00222-00-02-TR-TRA-00.DOCX">Aktivite 2 - İlk&ouml;ğretim Okulları i&ccedil;in CodyRoby</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/TR/CNECT-2018-00222-00-03-TR-TRA-00.DOCX">Aktivite 3 - Ortaokullar i&ccedil;in CodyRoby</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>

@endsection