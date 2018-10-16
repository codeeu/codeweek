@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Rado&scaron;as nodarbības, robotika un eksperimenti klasē</h1><span>Tulija Ur&scaron;ica (Tullia Urschitz)</span></div>

                    <hr>

                    <p>21.&nbsp;gadsimta izglītībā ļoti svarīgi ir skolas mācību programmās iekļaut programmē&scaron;anu, eksperimentus, robotiku un mikroelektroniku kā apmācības un mācību līdzekļus.</p>

                    <p>Eksperimentu un robotikas izmanto&scaron;ana skolās sniedz daudzus ieguvumus skolēniem, jo palīdz attīstīt tādas svarīgas kompetences kā problēmu risinā&scaron;ana, darbs grupā un sadarbība. Tā arī veicina skolēnu rado&scaron;umu un pa&scaron;pārliecinātību un palīdz viņiem nostiprināt neatlaidību un apņēmību, saskaroties ar grūtībām. Robotika ir arī joma, kas veicina iekļau&scaron;anu, jo tā ir viegli pieejama ļoti dažādiem skolēniem (gan zēniem, gan meitenēm) ar dažādiem talantiem un prasmēm, un tā pozitīvi ietekmē skolēnus ar autiskā spektra traucējumiem.</p>

                    <p>Noskatieties &scaron;o video, kurā Tulija Ur&scaron;ica (Tullia Urschitz), kura ir Italian Scientix vēstniece un STEM skolotāja Itālijas pilsētā Santambrodžo di Valpoličellā, sniedz praktiskus piemērus tam, kā skolotāji var integrēt eksperimentus un robotiku klases nodarbībās, padarot citādi pasīvus skolēnus par aizrautīgiem radītājiem.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Lejupielādēt video skriptu</a></p>

                    <h2>Vai esat gatavs dalīties ar iegūtajām zinā&scaron;anām ar saviem skolēniem?</h2>

                    <p>Izvēlieties vienu no tālāk sniegtajiem mācību stundu plāniem un noorganizējiet nodarbību saviem skolēniem.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">1.&nbsp;nodarbība&nbsp;&mdash; kā pagatavot mehānisku kartona roku (sākumskolai)</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">2.&nbsp;nodarbība&nbsp;&mdash; kā pagatavot mehānisku vai robotisku roku (pamatskolai)</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">3.&nbsp;nodarbība&nbsp;&mdash; kā pagatavot mehānisku vai robotisku roku (vidusskolai)</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection