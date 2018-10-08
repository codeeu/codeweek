@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Изчислително мислене и решаване на проблеми</h1><span>от Майлс Бери</span></div>

                    <hr>

                    <p>Изчислителното мислене (ИМ) описва начин за разглеждане на проблеми и системи, при който може да се използва компютър, за да ги решим или разберем. Изчислителното мислене не само е особено важно за разработването на компютърни програми, но може също така да се използва за подпомагане на решаването на проблеми във всички дисциплини.</p>

                    <p>Можете да преподавате ИМ на своите ученици, като ги насърчавате да разчленяват комплексни проблеми на по-малки, (разлагане), да разпознават модели (разпознаване на модели), да идентифицират съответните детайли за решаване на проблеми (абстракция); или да определяте правила или инструкции, които да се следват за постигането на желан резултат (дизайн на алгоритъм). ИМ може да се преподава по различни дисциплини, например по математика (определете правилата за факторинг на полиноми от 2-ра степен), литература (да разделят анализа на дадено стихотворение на анализ на метриката, римата и структурата), езици (намиране на модели в крайните букви на даден глагол, които засягат неговото изписване при промяна на граматическото време) и много други.</p>

                    <p>В този видеоматериал, Майлс Бери, главен лектор във Факултета по педагогика към Университета Роухемптън в Гилдфорд (Обединено кралство), ще представи концепцията за изчислително мислене и различните начини, по които един учител може да го интегрира в клас с лесни игри.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Изтеглете видео скрипта</a></p>

                    <h2>Готови ли сте да споделите какво сте научили с учениците си?</h2>

                    <p>Изберете един от плановете на уроци по-долу и организирайте дейност с учениците си.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Дейност 1 &mdash; Развиване на математическо аргументиране за основен курс на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Дейност 2 &mdash; Запознаване с алгоритми за среден курс (долна степен) на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Дейност 3 &mdash; Алгоритми за среден курс (горна степен) на обучение</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection