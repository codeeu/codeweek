@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programmeren zonder computers (unplugged)</h1><span>door Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Programmeertaal is de taal van het internet of things: we kunnen er programma&rsquo;s mee schrijven om de tientallen miljarden programmeerbare objecten om ons heen nieuwe functionaliteit te geven. Programmeren is de snelste manier om onze idee&euml;n om te zetten in werkelijkheid en de meest doeltreffende manier om vaardigheden op het gebied van computationeel denken te ontwikkelen. Maar er is niet per se technologie nodig om te leren denken als een computer. Sterker nog, onze vaardigheden in computationeel denken zijn juist van essentieel belang om technologie te laten werken.</p>

                    <p>In deze video vertelt Alessandro Bogliolo, hoogleraar Computersystemen in Itali&euml; en co&ouml;rdinator van de EU-programmeerweek, over unplugged programmeren, waarbij je geen elektronische apparaten nodig hebt. Het belangrijkste doel van unplugged activiteiten  is om blokkades weg te nemen en programmeren in elke school mogelijk te maken, ongeacht de financi&euml;le middelen en apparatuur.</p>

                    <p>Bij unplugged programmeren worden de computationele aspecten van de fysieke wereld om ons heen duidelijk.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Het videoscript downloaden</a></p>

                    <h2>Ben je er klaar voor om wat je hebt geleerd te delen met je leerlingen?</h2>

                    <p>Kies een van de onderstaande lesplannen en organiseer een activiteit met je leerlingen.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Activiteit 1 &ndash; CodyRoby voor het basisonderwijs</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Activiteit 2 &ndash; CodyRoby voor de onderbouw van het middelbaar onderwijs</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Activiteit 3 &ndash; CodyRoby voor het middelbaar onderwijs</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection