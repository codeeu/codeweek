@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Компјутерско размислување и решавање проблеми</h1><span>од Мајлс Бери</span></div>

                    <hr>

                    <p>Компјутерското размислување (КР) опишува начин на гледање на проблемите и системите при кој може да се употреби компјутер да ни помогне да ги решиме и разбереме.  Компјутерското размислување не е основно само за развојот на компјутерски програми, туку исто така може да се користи да поддржи решавање проблеми низ сите дисциплини.</p>

                    <p>Може да им предавате КР на учениците така што ќе им укажете да разложат комплексни проблеми во помали (разложување), да препознаваат шаблони (препознавање шаблони), да идентификуваат релевантни детали за решавање проблем (апстракција); или поставување правила или упатства за редоследно следење за да се постигне посакуваниот резултат (дизајн на алгоритам). КР може да се подучува низ различни дисциплини, на пример во математика (да се сфатат правилата за факторирање полиноми од втор ред), литература (разложување на анализата на поемата во анализа на метрика, рима и структура), јазици (наоѓање шаблони во завршните букви на глагол што влијаат на нивното спелување како и промени по времиња) и многу други.</p>

                    <p>Во ова видео, Мајлс Бери, главен предавач на Педагошкиот факултет при Универзитетот Рохамптон во Гилтфорд (Обединето Кралство), ќе го претстави концептот на компјутерско размислување и различните начини кои наставник може да ги интегрира во училница со едноставни игри.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Преземете ја видеоскриптата</a></p>

                    <h2>Подготвени сте да го споделите она што го научивте со учениците?</h2>

                    <p>Изберете еден од плановите за лекција подолу и организирајте активност со учениците.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Активност - Развивање математичко размислување за основно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Активност 2 - Запознавање со алгоритми за почетни години во средно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Активност 3 - Алгоритми за завршни години во средно училиште</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection