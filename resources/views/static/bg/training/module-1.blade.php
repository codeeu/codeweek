@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Програмиране без компютри (на живо)</h1><span>от Алесандро Болиоло</span></div>

                    <hr>

                    <p>Програмирането е езикът на нещата, който ни позволява да пишем програми, с които да създаваме нови функции на десетките милиарди програмируеми предмети около нас. Програмирането е най-бързия начин да превърнем идеите си в реалност и най-ефективния начин да развием способности за изчислително мислене. Технологията обаче не е строго необходима за развиването на изчислително мислене. По-скоро нашите умения за изчислително мислене са особено важни, за да може технологиите да заработят.</p>

                    <p>В този видеоматериал, Алесандро Болиоло, преподавател по компютърни системи в Италия и координатор на Европейската седмица на програмирането, ще представи дейности за програмиране на живо, които могат да се практикуват без електронно устройство. Основната цел на дейностите на живо е да намалят пречките за достъп до програмирането във всяко едно училище, независимо от финансирането и оборудването.</p>

                    <p>Дейностите по програмиране на живо разкриват изчислителните аспекти на физическия свят около нас.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Изтеглете видео скрипта</a></p>

                    <h2>Готови ли сте да споделите какво сте научили с учениците си?</h2>

                    <p>Изберете един от плановете на уроци по-долу и организирайте дейност с учениците си.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Дейност 1 &mdash; CodyRoby за основен курс на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Дейност 2 &mdash; CodyRoby за среден курс (долна степен) на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Дейност 3 &mdash; CodyRoby за среден курс на обучение</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection