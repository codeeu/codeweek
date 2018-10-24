@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Visuel programmering &ndash; Introduktion til Scratch</h1><span>af Margo Tinawi</span></div>

                    <hr>

                    <p>Visuel programmering lader mennesker beskrive processer med illustrationer eller grafik. Vi taler normalt om visuel programmering som en mods&aelig;tning til tekstbaseret programmering. Visuelle programmeringssprog er s&aelig;rligt velegnede til at introducere algoritmer til b&oslash;rn (og endda voksne). Med visuelle programmeringssprog er der mindre at l&aelig;se og ingen syntaks at implementere.</p>

                    <p>I denne video hj&aelig;lper Margo Tinawi, l&aelig;rer i webudvikling p&aring; Le Wagon og medstifter af Techies Lab asbl (Belgien), dig med at l&aelig;re Scratch at kende. Det er et af de mest popul&aelig;re visuelle programmeringssprog, og det bruges over hele verden. Scratch blev udviklet af MIT i&nbsp;2002, og sidenhen er der opst&aring;et et stort f&aelig;llesskab omkring det, hvor du kan finde millioner af projekter, du kan replikere med dine elever, og utallige vejledninger p&aring; flere sprog.</p>

                    <p>Du beh&oslash;ver ikke at have erfaring med kodning for at kunne bruge Scratch, og du kan bruge det i alle fag! Du kan for eksempel bruge Scratch som digitalt historiefort&aelig;llingsredskab, illustrere et matematisk problem eller afholde en kunstkonkurrence for at l&aelig;re om kulturarv, samtidig med at der undervises i kodning og datalogisk t&aelig;nkning, og ikke mindst samtidig med at det er sjovt.</p>

                    <p>Scratch er gratis, meget intuitivt og motiverende for dine elever. Tag et kig p&aring; Margos video for at l&aelig;re, hvordan du kommer i gang.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Download videoscriptet</a></p>

                    <h2>Er du klar til at dele det, du har l&aelig;rt, med dine elever?</h2>

                    <p>V&aelig;lg en af l&aelig;replanerne nedenfor, og afhold en aktivitet med dine elever.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Aktivitet 1 &ndash; Grundl&aelig;ggende Scratch for indskolingen/mellemtrinnet</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Aktivitet 2 &ndash; Grundl&aelig;ggende Scratch for udskolingen</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Aktivitet 3 &ndash; Grundl&aelig;ggende Scratch for gymnasiale uddannelser</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection