@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programmazione visuale: introduzione a Scratch</h1><span>di Margo Tinawi</span></div>

                    <hr>

                    <p>La programmazione visuale permette agli uomini di descrivere i processi utilizzando illustrazioni o la grafica. Generalmente si parla di programmazione visuale in contrapposizione alla programmazione testuale. I linguaggi di programmazione visuale (VPL) sono particolarmente adatti per far conoscere il pensiero algoritmico ai bambini (e persino agli adulti). Con i VPL, c&rsquo;&egrave; meno da leggere e nessuna sintassi da mettere in pratica.</p>

                    <p>In questo video, Margo Tinawi, insegnante di sviluppo web presso Le Wagon e co-fondatrice di Techies Lab asbl (Belgio), ti aiuter&agrave; a scoprire Scratch, uno dei VPL pi&ugrave; popolari utilizzati in tutto il mondo. Scratch &egrave; stato sviluppato dal MIT nel 2002 e da allora intorno a questo linguaggio si &egrave; creata una grande comunit&agrave;, dove puoi trovare milioni di progetti da replicare con i tuoi studenti e innumerevoli tutorial in pi&ugrave; lingue.</p>

                    <p>Non &egrave; necessario avere esperienza di programmazione per usare Scratch e puoi usarlo in tutte le materie! Per esempio, utilizzando Scratch come strumento di storytelling digitale, gli studenti possono creare storie, illustrare un problema di matematica o partecipare a un concorso artistico per conoscere il patrimonio culturale, imparando al contempo la programmazione e il pensiero computazionale e, cosa pi&ugrave; importante, divertendosi.</p>

                    <p>Scratch &egrave; uno strumento gratuito, molto intuitivo e motivante per i tuoi studenti. Dai un&rsquo;occhiata al video di Margo per imparare come iniziare.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Scarica lo script video</a></p>

                    <h2>Pronto a condividere ci&ograve; che hai imparato con i tuoi studenti?</h2>

                    <p>Scegli uno dei piani di lezione qui sotto e organizza un&rsquo;attivit&agrave; con i tuoi studenti.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Attivit&agrave; 1 - Scratch: le basi per la scuola primaria</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Attivit&agrave; 2 - Scratch: le basi per la scuola secondaria di primo grado</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Attivit&agrave; 3 - Scratch: le basi per la scuola secondaria di secondo grado</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection