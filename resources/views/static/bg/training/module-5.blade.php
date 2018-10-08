@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Занимания по роботика и ремонтни дейности в клас</h1><span>от Тулиа Уршиц</span></div>

                    <hr>

                    <p>Интегрирането в учебните програми на програмирането, ремонтните дейности, роботиката и микроелектрониката като инструменти за преподаване и учене е ключово за образованието през 21-ви век.</p>

                    <p>Заниманията по ремонтни дейности и роботика в училище носят много ползи за учениците, тъй като помагат за развиването на ключови компетенции, като решаване на проблеми, работа в екип и сътрудничество. Освен това те насърчават творческото мислене и увереността на учениците, и могат да помогнат на учениците да станат по-настоятелни и решителни, когато са изправени пред предизвикателства. Роботиката също така е област, която насърчава приобщаването, тъй като е лесно достъпна за широк набор от ученици с различни таланти и умения (както момчета, така и момичета) и повлиява положително на учениците от аутистичния спектър.</p>

                    <p>Изгледайте този видеоматериал, в който Тулиа Уршиц, посланик на Scientix Италия и учител, който използва методите на науката, технологиите, инженерството и математиката (STEM) в Сант'Амбро̀джо ди Валполичѐла, Италия, ще даде практически примери за това как учителите могат да интегрират ремонтните дейности и роботиката при работа в клас и по този начин да превърнат пасивните ученици в ентусиазирани създатели.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Изтеглете видео скрипта</a></p>

                    <h2>Готови ли сте да споделите какво сте научили с учениците си?</h2>

                    <p>Изберете един от плановете на уроци по-долу и организирайте дейност с учениците си.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Дейност 1 &mdash; Как да изработим механична ръка от талашит за основен курс на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Дейност 2 &mdash; Как да изработим механична или роботизирана ръка за среден курс (долна степен) на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Дейност 3 &mdash; Как да изработим механична или роботизирана ръка за среден курс (горна степен) на обучение</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection