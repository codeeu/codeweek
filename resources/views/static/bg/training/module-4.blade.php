@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Създаване на образователни игри със Scratch</h1><span>от Хесус Морено Леон</span></div>

                    <hr>

                    <p>Критично мислене, упоритост, решаване на проблеми, изчислително мислене и креативност са само някои от ключовите умения, от които учениците ви се нуждаят, за да успеят в 21-ви век, а програмирането може да ви помогне да ги развиете по забавен и мотивиращ начин.</p>

                    <p>Алгоритмичните понятия за управление на потока на подаване на данни чрез използване на последователности от инструкции и цикли, или синхронизирането на процеси могат да звучат като сложни концепции, но в това видео ще видите, че се научават по-лесно, отколкото сте очаквали.</p>

                    <p>В този видеоматериал, Хесус Морено Леон, учител по компютърни науки и изследовател от Испания, ще обясни как можете да развиете тези и други умения в учениците си по забавен начин. Как може да стане това? Като създадете игра с въпроси и отговори в Scratch, най-популярния език за програмиране, използван в училищата в целия свят. Scratch не само подпомага изчислителното мислене, но също така позволява въвеждането на игрови елементи в клас, за да поддържа мотивацията на учениците ви, докато учат и се забавляват.</p>

                    <p>Гледайте видеото, за да разберете как да започнете:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Изтеглете видео скрипта</a></p>

                    <h2>Готови ли сте да споделите какво сте научили с учениците си?</h2>

                    <p>Изберете един от плановете на уроци по-долу и организирайте дейност с учениците си.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Дейност 1 &mdash; Игра с въпроси и отговори със Scratch за основен курс на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Дейност 2 &mdash; Игра с въпроси и отговори със Scratch за среден курс (долна степен) на обучение</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Дейност 3 &mdash; Игра с въпроси и отговори със Scratch за среден курс на обучение</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection