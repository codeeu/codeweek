@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Creare giochi educativi con Scratch</h1><span>di Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Pensiero critico, perseveranza, risoluzione dei problemi, pensiero computazionale e creativit&agrave; sono solo alcune delle competenze fondamentali di cui i tuoi studenti hanno bisogno per avere successo nel 21° secolo e la programmazione pu&ograve; aiutarti a ottenerle in modo divertente e motivante.</p>

                    <p>Le nozioni algoritmiche di controllo del flusso che utilizzano sequenze e cicli di istruzioni, la rappresentazione di dati mediante variabili e liste o la sincronizzazione di processi potrebbero sembrare concetti complicati, ma in questo video scoprirai che sono pi&ugrave; facili da imparare di quanto pensi.</p>

                    <p>In questo video, Jes&uacute;s Moreno Le&oacute;n, insegnante e ricercatore di informatica spagnolo, spiegher&agrave; in che modo puoi sviluppare queste e altre competenze nei tuoi studenti mentre si divertono. Come si pu&ograve; fare? Creando un gioco di domande e risposte su Scratch, il linguaggio di programmazione pi&ugrave; popolare utilizzato nelle scuole di tutto il mondo. Scratch non solo migliora il pensiero computazionale, ma consente anche di introdurre elementi di ludicizzazione in classe per mantenere gli studenti motivati mentre imparano e si divertono.</p>

                    <p>Dai un&rsquo;occhiata al video per imparare come iniziare:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Scarica lo script video</a></p>

                    <h2>Pronto a condividere ci&ograve; che hai imparato con i tuoi studenti?</h2>

                    <p>Scegli uno dei piani di lezione qui sotto e organizza un&rsquo;attivit&agrave; con i tuoi studenti.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Attivit&agrave; 1 - Gioco di domande e risposte con Scratch per la scuola primaria</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Attivit&agrave; 2 - Gioco di domande e risposte con Scratch per la scuola secondaria di primo grado</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Attivit&agrave; 3 - Gioco di domande e risposte con Scratch per la scuola secondaria di secondo grado</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection