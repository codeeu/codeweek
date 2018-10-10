@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Визуелно програмирање - вовед во Scratch</h1><span>од Марго Тинави</span></div>

                    <hr>

                    <p>Визуелното програмирање им овозможува на луѓето да ги опишат процесите со користење на илустрации или графика. Вообичаено зборуваме за визуелното програмирање како спротивност на програмирањето базирано на текст. Јазиците за визуелно програмирање (VPL) се исклучително добро приспособени да воведат алгоритамско размислување за деца (па дури и за возрасни). Со VPL има помалку за читање и нема синтакса за спроведување.</p>

                    <p>Во ова видео, Марго Тинави, наставник за развој на веб во Ле Вагон и коосновач на Techies Lab asbl (Белгија), ќе ви помогне да го откриете Scratch, еден од најпопуларните VPL што се користат насекаде низ светот. Scratch е развиен од MIT во 2002 година и оттогаш околу него се создаде голема заедница, каде што може да најдете милиони проекти што може да ги реплицирате со учениците и безбројни упатства на неколку јазици.</p>

                    <p>Не е потребно да имате искуство со кодирање за да го користите Scratch, а може да го употребувате во секакви различни предмети! На пример, со користење на Scratch како дигитална алатка за раскажување приказни, учениците може да создаваат приказни, да илустрираат математички проблем или да учествуваат во уметнички натпревар за да научат за културното наследство додека учат кодирање и компјутерско размислување, а што е најважно додека се забавуваат.</p>

                    <p>Scratch е бесплатна алатка, многу интуитивна и мотивирачка за учениците. Погледнете го видеото на Марго да научите како да започнете.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Преземете ја видеоскриптата</a></p>

                    <h2>Подготвени сте да го споделите она што го научивте со учениците?</h2>

                    <p>Изберете еден од плановите за лекција подолу и организирајте активност со учениците.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Активност 1 - Основи на Scratch за основно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Активност 2 - Основи на Scratch за почетни години во средно училиште</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Активност 3 - Основи на Scratch за завршни години во средно училиште</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection