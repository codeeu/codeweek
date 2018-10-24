@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Fare robotica e tinkering in classe</h1><span>di Tullia Urschitz</span></div>

                    <hr>

                    <p>Integrare programmazione, tinkering, robotica e microelettronica quali strumenti di insegnamento e apprendimento nel programma scolastico &egrave; fondamentale per l&rsquo;istruzione del 21° secolo.</p>

                    <p>Usare il tinkering e la robotica nelle scuole presenta molti vantaggi per gli studenti, poich&eacute; li aiuta a sviluppare competenze fondamentali quali risoluzione dei problemi, lavoro di squadra e collaborazione. Aumenta anche la creativit&agrave; e la fiducia degli studenti in se stessi e pu&ograve; aiutarli a sviluppare perseveranza e determinazione di fronte alle sfide. Inoltre, la robotica &egrave; un campo che promuove l&rsquo;inclusivit&agrave;, in quanto &egrave; facilmente accessibile a una vasta gamma di studenti (sia maschi che femmine) con diversi talenti e abilit&agrave; e ha influenze positive sugli studenti con disturbi dello spettro autistico.</p>

                    <p>Dai un&rsquo;occhiata a questo video in cui Tullia Urschitz, ambasciatrice italiana Scientix e insegnante di materie STEM a Sant&rsquo;Ambrogio di Valpolicella (Verona), fornir&agrave; alcuni esempi pratici sul modo in cui gli insegnanti possono integrare tinkering e robotica in classe, trasformando cos&igrave; gli studenti passivi in creatori entusiasti.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Scarica lo script video</a></p>

                    <h2>Pronto a condividere ci&ograve; che hai imparato con i tuoi studenti?</h2>

                    <p>Scegli uno dei piani di lezione qui sotto e organizza un&rsquo;attivit&agrave; con i tuoi studenti.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Attivit&agrave; 1 - Come realizzare una mano meccanica, su pannello duro, per la scuola primaria</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Attivit&agrave; 2 - Come realizzare una mano meccanica o robotica per la scuola secondaria di primo grado</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Attivit&agrave; 3 - Come realizzare una mano meccanica o robotica per la scuola secondaria di secondo grado</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection