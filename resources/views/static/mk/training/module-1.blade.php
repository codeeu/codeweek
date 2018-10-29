@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Кодирање без компјутери (без интернет)</h1><span>од Алесандро Бољоло</span></div>

                    <hr>

                    <p>Кодирањето е јазикот на нештата, кој ви овозможува да пишувате програми со кои им овозможуваме нови функционалности на десетици милијарди објекти што може да се програмираат околу нас. Кодирањето е најбрзиот начин за реализирање на идеите и најефективниот начин да се развијат способностите за компјутерско мислење. Сепак, не е исклучиво потребна технологија за да се развие компјутерско мислење. Во поголема мерка, вештините на компјутерско мислење се суштински да се овозможи функционирање на технологијата.</p>

                    <p>Во ова видео, Алесандро Бољоло, професор по Компјутерски системи во Италија и координатор на Европската недела на кодирање, ќе претстави активности на кодирање без интернет што може да се практикуваат без каков било електронски уред. Главната цел на активностите без интернет е да се намалат бариерите на пристапност за да се донесе кодирањето во секое училиште, без оглед на финансирањето и опремата.</p>

                    <p>Активностите на кодирање без интернет ги откриваат компјутерските аспекти на физичкиот свет околу нас.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Преземете ја видеоскриптата</a></p>

                    <h2>Подготвени сте да го споделите она што го научивте со учениците?</h2>

                    <p>Изберете еден од плановите за лекција подолу и организирајте активност со учениците.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Активност 1 - CodyRoby за основно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Активност 2 - CodyRoby за почетни години на средно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Активност 3 - CodyRoby за средно училиште</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection