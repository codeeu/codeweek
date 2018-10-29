@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programarea fără calculatoare (fără dispozitive electronice)</h1><span>de Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Programarea este limbajul lucrurilor, care ne permite să scriem programe care să confere noi funcționalități zecilor de miliarde de obiecte programabile din jurul nostru. Programarea este cea mai rapidă cale de a ne materializa ideile și cea mai eficientă cale de a dezvolta capacități de g&acirc;ndire computațională. Cu toate acestea, nu avem neapărat nevoie de tehnologie pentru a ne dezvolta g&acirc;ndirea computațională. Mai degrabă competențele noastre de g&acirc;ndire computațională sunt esențiale pentru a face ca tehnologia să funcționeze.</p>

                    <p>&Icirc;n acest videoclip, Alessandro Bogliolo, profesor de sisteme computerizate &icirc;n Italia și coordonator al Săptăm&acirc;nii europene a programării, va prezenta activități de programare fără calculator care pot fi desfășurate fără niciun dispozitiv electronic. Scopul principal al activităților fără calculator este de a cobor&icirc; barierele de acces pentru a aduce programarea &icirc;n orice școală, indiferent de finanțare sau echipamente.</p>

                    <p>Activitățile de programare fără calculator dezvăluie aspectele computaționale ale lumii fizice din jurul nostru.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Descărcați textul videoclipului</a></p>

                    <h2>Sunteți gata să &icirc;mpărtășiți ce ați &icirc;nvățat cu elevii dumneavoastră?</h2>

                    <p>Alegeți unul dintre planurile de lecție de mai jos și organizați o activitate cu elevii dumneavoastră.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Activitatea 1&nbsp;&ndash; CodyRoby pentru &icirc;nvățăm&acirc;ntul primar</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Activitatea 2&nbsp;&ndash; CodyRoby pentru &icirc;nvățăm&acirc;ntul gimnazial</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Activitatea 3 &ndash; CodyRoby pentru &icirc;nvățăm&acirc;ntul liceal</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection