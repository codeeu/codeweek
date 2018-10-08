@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Визуално програмиране &mdash; Въведение в Scratch</h1><span>от Марго Тинауи</span></div>

                    <hr>

                    <p>Визуалното програмиране позволява на хората да описват процеси, като използват илюстрации или графики. Обикновено ние противопоставяме визуалното програмиране на програмирането, базирано на текст. Езиците за визуално програмиране (VPL) са особено добре адаптирани за представяне на алгоритмично мислене сред децата (и дори сред възрастните). С VPL има по-малко неща за четене и не се използва синтаксис.</p>

                    <p>В този видеоматериал, Марго Тинауи, учител по уеб разработване в Le Wagon и съосновател на Techies Lab asbl (Белгия), ще ви помогне да откриете Scratch, един от най-популярните VPL, използвани в целия свят. Scratch беше разработен от MIT през 2002&nbsp;г., и оттогава насам около него се сформира голяма общност, където можете да откриете милиони проекти, които да копирате със своите ученици, и многобройни ръководства за обучение на няколко езика.</p>

                    <p>За да използвате Scratch, не е необходимо да имате опит в програмирането, и можете да го използвате с всички различни теми! Например можете да използвате Scratch като цифров разказвач на приказки, учениците могат да съчиняват приказки, да илюстрирате задача по математика или да проведете творчески конкурс, за да научите повече за културното наследство, докато усвоявате програмиране и изчислително мислене, и най-важното да се забавлявате.</p>

                    <p>Scratch е безплатен инструмент, много интуитивен и мотивиращ за вашите ученици. Гледайте видеото на Марго, за да разберете как да започнете:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Изтеглете видео скрипта</a></p>

                    <h2>Готови ли сте да споделите какво сте научили с учениците си?</h2>

                    <p>Изберете един от плановете на уроци по-долу и организирайте дейност с учениците си.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Дейност 1 &mdash; Основи на Scratch за основен курс на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Дейност 2 &mdash; Основи на Scratch за среден курс (долна степен) на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Дейност 3 &mdash; Основи на Scratch за среден курс на обучение</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection