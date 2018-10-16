@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programarea vizuală&nbsp;&ndash; introducere &icirc;n Scratch</h1><span>de Margo Tinawi</span></div>

                    <hr>

                    <p>Programarea vizuală le permite oamenilor să descrie procese cu ajutorul ilustrațiilor sau al graficelor. De obicei, facem distincție &icirc;ntre programarea vizuală și programarea bazată pe text. Limbajele de programare vizuală (LPV) sunt deosebit de bine adaptate pentru introducerea g&acirc;ndirii algoritmice la copii (și chiar la adulți). Cu ajutorul LPV este mai puțin de citit și nu există sintaxă de implementat.</p>

                    <p>&Icirc;n acest videoclip, Margo Tinawi, profesoară de dezvoltare web la Le Wagon și cofondatoare a Techies Lab asbl (Belgia), vă va ajuta să descoperiți Scratch, unul dintre cele mai &icirc;ndrăgite LPV, folosit &icirc;n lumea &icirc;ntreagă. Scratch a fost elaborat de MIT &icirc;n 2002, iar de atunci s-a format o comunitate numeroasă &icirc;n jurul său, &icirc;n care puteți găsi milioane de proiecte pe care le puteți replica &icirc;mpreună cu elevii dumneavoastră, precum și nenumărate tutoriale &icirc;n mai multe limbi.</p>

                    <p>Nu aveți nevoie de experiență de programare pentru a folosi Scratch și &icirc;l puteți folosi pentru orice materie! De exemplu, folosind Scratch ca instrument digital pentru spus povești, elevii pot crea povești, pot ilustra o problemă de matematică sau pot juca un concurs de artă pentru a &icirc;nvăța despre patrimoniul cultural, &icirc;nvăț&acirc;nd &icirc;n același timp programare și g&acirc;ndire computațională și, cel mai important, distr&acirc;ndu-se.</p>

                    <p>Scratch este un instrument gratuit, foarte intuitiv și motivant pentru elevii dumneavoastră. Urmăriți videoclipul lui Margo și &icirc;nvățați cum puteți &icirc;ncepe.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Descărcați textul videoclipului</a></p>

                    <h2>Sunteți gata să &icirc;mpărtășiți ce ați &icirc;nvățat cu elevii dumneavoastră?</h2>

                    <p>Alegeți unul dintre planurile de lecție de mai jos și organizați o activitate cu elevii dumneavoastră.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Activitatea 1&nbsp;&ndash; Bazele Scratch pentru &icirc;nvățăm&acirc;ntul primar</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Activitatea 2&nbsp;&ndash; Bazele Scratch pentru &icirc;nvățăm&acirc;ntul gimnazial</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Activitatea 3 &ndash; Bazele Scratch pentru &icirc;nvățăm&acirc;ntul liceal</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection