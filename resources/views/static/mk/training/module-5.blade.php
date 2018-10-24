@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Креирање роботика и поправање во училницата</h1><span>од Тулиа Уршитц</span></div>

                    <hr>

                    <p>Интеграцијата на кодирање, поправање, роботика и микроелектроника како алатки за подучување и учење во наставните програми на училиштата е клучно за образованието од XXI век.</p>

                    <p>Користењето на поправање и роботика во училиштата има многу придобивки за учениците, бидејќи помага да се развијат клучните компетенции како што е решавање проблеми, тимска работа и соработка. Исто така ја зголемува креативноста и сигурноста на учениците и може да им помогне на учениците да изградат истрајност и одлучност кога се соочени со предизвици. Роботиката е исто така поле што промовира инклузивност, бидејќи е лесно достапна за широк спектар на ученици со различни таленти и вештини (и момчиња и девојчиња) и позитивно влијае на учениците со спектар на аутизам.</p>

                    <p>Погледнете го ова видео каде што Тулиа Урштиц, Италијански амбасадор за Scientix и наставник на STEM во Сант'Aмброџо Ди Валполичела, Италија ќе даде некои практични примери за тоа како наставниците може да го интегрираат поправањето и роботиката во училницата, со тоа трансформирајќи ги пасивните ученици во ентузијастички творци.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Преземете ја видеоскриптата</a></p>

                    <h2>Подготвени сте да го споделите она што го научивте со учениците?</h2>

                    <p>Изберете еден од плановите за лекција подолу и организирајте активност со учениците.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Активност 1 - Како да се направи механичка рака од панел-плоча за основно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Активност 2 - Како да се направи механичка или роботска рака за почетни години во средно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Активност 3 - Како да се направи механичка или роботска рака за завршни години во средно училиште</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection