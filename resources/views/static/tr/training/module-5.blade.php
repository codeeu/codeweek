@extends('layout.base')

@section('content')

<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Sınıflarda robot teknolojisi ve deneme uygulamaları</h1><span>Tullia Urschitz</span></div>

                    <hr>

                    <p>Kodlama, deneme uygulamaları, robot teknolojisi ve mikroelektroniğin &ouml;ğretim ve &ouml;ğrenim ara&ccedil;ları olarak okul m&uuml;fredatına entegre edilmesi, 21. y&uuml;zyıl eğitiminin temelidir.</p>

                    <p>Okullarda robot teknolojisi ve deneme uygulamalarının, problem &ccedil;&ouml;zme, ekip &ccedil;alışması ve iş birliği gibi temel yetkinliklerin geliştirilmesine yardımcı olması a&ccedil;ısından &ouml;ğrenciler i&ccedil;in pek &ccedil;ok faydası vardır. Ayrıca &ouml;ğrencilerin yaratıcılıklarını ve &ouml;z g&uuml;venlerini artırıp, zorluklarla karşılaştıklarında azim ve kararlılık g&ouml;stermelerine de yardımcı olabilir. Robot teknolojisi aynı zamanda, &ccedil;eşitli yetenek ve becerilere sahip (hem erkek hem de kız &ccedil;ocuklar) &ouml;ğrencilere kolayca erişilebildiği ve otizmli &ouml;ğrencileri olumlu y&ouml;nde etkilediği i&ccedil;in kapsayıcılığı destekleyen bir alandır.</p>

                    <p>İtalya'nın Sant&acirc;&rsquo;Ambrogio Di Valpolicella kentindeki İtalyan Scientix b&uuml;y&uuml;kel&ccedil;isi ve STEM &ouml;ğretmeni olan Tullia Urschitz'in, &ouml;ğretmenlere deneme uygulaması ve robot teknolojisinin sınıfa nasıl entegre edilebileceğine dair uygulamalı &ouml;rnekler verdiği ve bu sayede pasif &ouml;ğrencileri hevesli &uuml;reticilere d&ouml;n&uuml;şt&uuml;rd&uuml;ğ&uuml; bu videoya bir g&ouml;z atın.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Video metnini indirin</a></p>

                    <h2>&Ouml;ğrendiklerinizi &ouml;ğrencilerinizle paylaşmaya hazır mısınız?</h2>

                    <p>Aşağıdaki ders planlarından birini se&ccedil;in ve &ouml;ğrencilerinizle bir aktivite d&uuml;zenleyin.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Aktivite 1 - İlkokullar i&ccedil;in mekanik duralit el yapımı</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Aktivite 2 - Ortaokullar i&ccedil;in mekanik ya da robotik el yapımı</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Aktivite 3 - Liseler i&ccedil;in mekanik ya da robotik el yapımı</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>
@endsection