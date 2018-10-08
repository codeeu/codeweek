@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Crearea de jocuri educaționale cu Scratch</h1><span>de Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>G&acirc;ndirea critică, persistența, rezolvarea de probleme, g&acirc;ndirea computațională și creativitatea sunt doar c&acirc;teva dintre competențele-cheie de care au nevoie elevii dumneavoastră pentru a avea succes &icirc;n secolul 21, iar programarea vă poate ajuta să realizați aceste lucruri &icirc;ntr-un mod distractiv și motivant.</p>

                    <p>Noțiunile algoritmice de controlul fluxului folosind secvențe de instrucțiuni și bucle, reprezentarea datelor folosind variabile și liste sau sincronizarea proceselor pot părea concepte complicate, dar &icirc;n acest videoclip veți afla că sunt mai ușor de &icirc;nvățat dec&acirc;t ați crede.</p>

                    <p>&Icirc;n acest videoclip, Jes&uacute;s Moreno Le&oacute;n, un profesor de informatică și cercetător din Spania, vă va explica cum puteți dezvolta aceste și alte competențe la elevii dumneavoastră, &icirc;n mod distractiv. Cum se poate face acest lucru? Cre&acirc;nd un joc cu &icirc;ntrebări și răspunsuri &icirc;n Scratch, cel mai &icirc;ndrăgit limbaj de programare folosit &icirc;n școli din lumea &icirc;ntreagă. Scratch nu doar intensifică g&acirc;ndirea computațională, ci permite de asemenea introducerea de elemente de &bdquo;gamification&rdquo; &icirc;n clasă pentru a menține motivația elevilor &icirc;n timp de &icirc;nvață și se distrează.</p>

                    <p>Urmăriți videoclipul și &icirc;nvățați cum puteți &icirc;ncepe:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Descărcați textul videoclipului</a></p>

                    <h2>Sunteți gata să &icirc;mpărtășiți ce ați &icirc;nvățat cu elevii dumneavoastră?</h2>

                    <p>Alegeți unul dintre planurile de lecție de mai jos și organizați o activitate cu elevii dumneavoastră.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Activitatea 1&nbsp;&ndash; Joc cu &icirc;ntrebări și răspunsuri cu Scratch pentru &icirc;nvățăm&acirc;ntul primar</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Activitatea 2&nbsp;&ndash; Joc cu &icirc;ntrebări și răspunsuri cu Scratch pentru &icirc;nvățăm&acirc;ntul gimnazial</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Activitatea 3&nbsp;&ndash; Joc cu &icirc;ntrebări și răspunsuri cu Scratch pentru &icirc;nvățăm&acirc;ntul liceal</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection