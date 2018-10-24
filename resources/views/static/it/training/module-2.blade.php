@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Pensiero computazionale e risoluzione dei problemi</h1><span>di Miles Berry</span></div>

                    <hr>

                    <p>Il pensiero computazionale descrive un modo di considerare i problemi e i sistemi in maniera che si possa utilizzare un computer per favorirne la risoluzione o la comprensione. Il pensiero computazionale non &egrave; solo essenziale per lo sviluppo di programmi per computer, ma pu&ograve; anche essere usato per supportare la risoluzione di problemi in tutte le discipline.</p>

                    <p>Puoi insegnare il pensiero computazionale ai tuoi studenti facendo scomporre loro problemi complessi in problemi pi&ugrave; piccoli (decomposizione), riconoscere i modelli (riconoscimento dei modelli), identificare i dettagli rilevanti per risolvere un problema (astrazione), oppure stabilire le regole o le istruzioni da seguire per ottenere un risultato desiderato (progettazione dell&rsquo;algoritmo). Il pensiero computazionale pu&ograve; essere insegnato attraverso diverse discipline, per esempio in matematica (capire le regole per fattorizzare polinomi di secondo grado), letteratura (scomporre l&rsquo;analisi di una poesia in analisi di metro, rima e struttura), lingue (trovare modelli nelle lettere finali di un verbo che ne influenzano l'ortografia quando il tempo verbale cambia) e molte altre.</p>

                    <p>In questo video, Miles Berry, primo lettore presso la School of Education dell&rsquo;Universit&agrave; di Roehampton a Guildford (Regno Unito), presenter&agrave; il concetto di pensiero computazionale e i diversi modi in cui un insegnante pu&ograve; integrarlo in classe con giochi semplici.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Scarica lo script video</a></p>

                    <h2>Pronto a condividere ci&ograve; che hai imparato con i tuoi studenti?</h2>

                    <p>Scegli uno dei piani di lezione qui sotto e organizza un&rsquo;attivit&agrave; con i tuoi studenti.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Attivit&agrave; 1 - Sviluppare il ragionamento matematico per la scuola primaria</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Attivit&agrave; 2 - Conoscenza degli algoritmi per la scuola secondaria di primo grado</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Attivit&agrave; 3 - Algoritmi per la scuola secondaria di secondo grado</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection