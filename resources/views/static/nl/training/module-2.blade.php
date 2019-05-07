@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Computationeel denken en problemen oplossen</h1><span>door Miles Berry</span></div>

                    <hr>

                    <p>Computationeel denken is een manier om problemen en systemen zo te benaderen dat we ze met hulp van een computer kunnen oplossen of begrijpen. Het is niet alleen van essentieel belang voor de ontwikkeling van computerprogramma&rsquo;s, maar kan ook worden gebruikt om te helpen bij het oplossen van problemen in alle vakken.</p>

                    <p>Je kunt je leerlingen leren computationeel te denken door ze complexe problemen te laten opbreken in kleinere problemen (decompositie), patronen te laten herkennen (patroonherkenning), te laten vaststellen welke details relevant zijn voor het oplossen van het probleem (abstractie) of door regels of instructies op te stellen die ze moeten opvolgen om een gewenst resultaat te bereiken (algoritmeontwerp). Computationeel denken kan bij verschillende vakken worden onderwezen, bijvoorbeeld bij wiskunde (zoek uit wat de regels zijn voor het in factoren ontbinden van een tweedegraads polynoom), Nederlands (de analyse van een gedicht opbreken in metrum-, rijm- en structuuranalyse), een vreemde taal (patronen zoeken in de laatste letters van een werkwoord waarvan de spelling verandert wanneer de tijd verandert) en nog veel meer.</p>

                    <p>In deze video vertelt Miles Berry, hoofddocent aan de School of Education van de University of Roehampton in Guildford (Verenigd Koninkrijk), over het concept van computationeel denken en de manieren waarop een leraar dit met eenvoudige games in lessen kan verwerken.</p>

                    @include('static.youtube', ['video_id' => 'Nc-V948dXWI'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/NL/CNECT-2018-00222-00-16-NL-TRA-00.DOCX">Het videoscript downloaden</a></p>

                    <h2>Ben je er klaar voor om wat je hebt geleerd te delen met je leerlingen?</h2>

                    <p>Kies een van de onderstaande lesplannen en organiseer een activiteit met je leerlingen.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/NL/CNECT-2018-00222-00-04-NL-TRA-00.DOCX">Activiteit 1 &ndash; Leren wiskundig redeneren voor het basisonderwijs</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/NL/CNECT-2018-00222-00-05-NL-TRA-00.DOCX">Activiteit 2 &ndash; Kennismaken met algoritmen voor de onderbouw van het middelbaar onderwijs</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/NL/CNECT-2018-00222-00-06-NL-TRA-00.DOCX">Activiteit 3 &ndash; Algoritmen voor de bovenbouw van het middelbaar onderwijs</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection