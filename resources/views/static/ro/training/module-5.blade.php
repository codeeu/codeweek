@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Creație, robotică și meșterit &icirc;n clasă</h1><span>de Tullia Urschitz</span></div>

                    <hr>

                    <p>Integrarea programării, a meșteritului, a roboticii și a microelectronicii ca instrumente de predare și &icirc;nvățare &icirc;n programele școlare reprezintă cheia educației &icirc;n secolul 21.</p>

                    <p>Folosirea meșteritului și a roboticii &icirc;n școli are multe beneficii pentru elevi, deoarece &icirc;i ajută să dezvolte competențe-cheie precum rezolvarea de probleme, munca &icirc;n echipă și colaborarea. De asemenea, stimulează creativitatea și &icirc;ncrederea elevilor și &icirc;i poate ajuta pe aceștia să dezvolte perseverență și hotăr&acirc;re atunci c&acirc;nd se confruntă cu provocări. Robotica este, de asemenea, un domeniu care promovează incluziunea, deoarece este ușor accesibilă unei largi categorii de elevi cu diverse talente și competențe (at&acirc;t băieți, c&acirc;t și fete) și influențează &icirc;n mod pozitiv elevii cu tulburări de spectru autist.</p>

                    <p>Urmăriți acest videoclip &icirc;n care Tullia Urschitz, ambasador italian al Scientix și profesoară STEM la Sant&rsquo;Ambrogio Di Valpolicella, Italia, oferă c&acirc;teva exemple practice cu privire la modul &icirc;n care profesorii pot integra meșteritul și robotica &icirc;n clasă, transform&acirc;nd astfel elevii pasivi &icirc;n creatori entuziaști.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Descărcați textul videoclipului</a></p>

                    <h2>Sunteți gata să &icirc;mpărtășiți ce ați &icirc;nvățat cu elevii dumneavoastră?</h2>

                    <p>Alegeți unul dintre planurile de lecție de mai jos și organizați o activitate cu elevii dumneavoastră.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Activitatea 1&nbsp;&ndash; Cum să faci o m&acirc;nă mecanică din placaj, pentru &icirc;nvățăm&acirc;ntul primar</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Activitatea 2&nbsp;&ndash; Cum să faci o m&acirc;nă mecanică sau robotizată, pentru &icirc;nvățăm&acirc;ntul gimnazial</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Activitatea 3&nbsp;&ndash; Cum să faci o m&acirc;nă mecanică sau robotizată, pentru &icirc;nvățăm&acirc;ntul liceal</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection