@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Креирање едукативни игри со Scratch</h1><span>од Хесус Морено Леон</span></div>

                    <hr>

                    <p>Критичко размислување, истрајност, решавање проблеми, компјутерско размислување и креативност се само некои од клучните вештини што им се потребни на учениците да успеат во XXI век, а кодирањето може да ви помогне да ги постигнете на забавен и мотивирачки начин.</p>

                    <p>Алгоритамските поими за контрола на тек со користење на секвенци на упатства и петелки, прикажување податоци со користење на варијабли и листи или синхронизација на процеси може да звучат како комплицирани концепти, но во ова видео ќе откриете дека тие се полесни да се научат отколку што мислите.</p>

                    <p>Во ова видео, Хесус Морено Леон, наставник по компјутерски науки и истражувач од Шпанија ќе објасни како може да ги развиете овие и други вештини кај учениците додека се забавувате. Како може да се направи ова? Со креирање игра со прашања и одговори во Scratch, најпопуларниот програмски јазик што се користи низ училиштата низ целиот свет. Scratch не само што го збогатува компјутерското размислување, туку исто така дозволува внесување на елементи на дизајнирање игри во училницата за да ја одржи мотивацијата на учениците додека учат и се забавуваат.</p>

                    <p>Погледнете го видеото да научите како да започнете.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Преземете ја видеоскриптата</a></p>

                    <h2>Подготвени сте да го споделите она што го научивте со учениците?</h2>

                    <p>Изберете еден од плановите за лекција подолу и организирајте активност со учениците.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Активност 1 - Игра со прашања и одговори со Scratch за основно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Активност 2 - Игра со прашања и одговори со Scratch за почетни години на средно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Активност 3 - Игра со прашања и одговори со Scratch за средно училиште</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection