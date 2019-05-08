@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Datalogisk t&aelig;nkning og probleml&oslash;sning</h1><span>af Miles Berry</span></div>

                    <hr>

                    <p>Datalogisk t&aelig;nkning (computational thinking) beskriver en m&aring;de at anskue problemer og systemer p&aring;, s&aring; en computer kan bruges til at hj&aelig;lpe os med at l&oslash;se eller forst&aring; dem. Datalogisk t&aelig;nkning er ikke kun afg&oslash;rende for at udvikle computerprogrammer, men kan ogs&aring; bruges til at st&oslash;tte probleml&oslash;sning p&aring; tv&aelig;rs af fagomr&aring;der.</p>

                    <p>Du kan l&aelig;re dine elever datalogisk t&aelig;nkning ved at f&aring; dem til at opdele komplekse problemer i mindre dele (dekomponering), at genkende m&oslash;nstre (m&oslash;nstergenkendelse), at identificere de relevante oplysninger for at kunne l&oslash;se et problem (abstraktion) eller at opstille regler eller instruktioner, der skal f&oslash;lges for at kunne opn&aring; et bestemt resultat (algoritmedesign). Datalogisk t&aelig;nkning kan l&aelig;res p&aring; tv&aelig;rs af fag, for eksempel i matematik (udregn reglerne for at opl&oslash;se andengradspolynomier), dansk (opdel analysen af et digt i analyse af metrik, rytme og struktur), sprog (find m&oslash;nstre i endelsesbogstaver i verber, der p&aring;virker stavningen, n&aring;r tempusformen &aelig;ndres) og mange flere.</p>

                    <p>I denne video introducerer Miles Berry, lektor ved Roehampton School of Education i Guildford (Det Forenede Kongerige), konceptet datalogisk t&aelig;nkning og de forskellige m&aring;der, hvorp&aring; en l&aelig;rer kan integrere det i klassev&aelig;relset med enkle spil.</p>

                    @include('static.youtube', ['video_id' => 'Nc-V948dXWI'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/DA/CNECT-2018-00222-00-16-DA-TRA-00.DOCX">Download videoscriptet</a></p>

                    <h2>Er du klar til at dele det, du har l&aelig;rt, med dine elever?</h2>

                    <p>V&aelig;lg en af l&aelig;replanerne nedenfor, og afhold en aktivitet med dine elever.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/DA/CNECT-2018-00222-00-04-DA-TRA-00.DOCX">Aktivitet 1 &ndash; Udvikling af matematisk tankegang for indskolingen/mellemtrinnet</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/DA/CNECT-2018-00222-00-05-DA-TRA-00.DOCX">Aktivitet 2 &ndash; Introduktion til algoritmer for udskolingen</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/DA/CNECT-2018-00222-00-06-DA-TRA-00.DOCX">Aktivitet 3 &ndash; Algoritmer for gymnasiale uddannelser</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection