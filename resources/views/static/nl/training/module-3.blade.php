@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Visueel programmeren &ndash; kennismaking met Scratch</h1><span>door Margo Tinawi</span></div>

                    <hr>

                    <p>Met visueel programmeren kun je processen beschrijven aan de hand van illustraties of grafische afbeeldingen. Meestal wordt visueel programmeren gezien als tegenhanger van tekstgebaseerd programmeren. Visuele programmeertalen zijn met name geschikt om kinderen (maar ook volwassenen) kennis te laten maken met algoritmisch denken. Met visuele programmeertalen hoef je minder te lezen en niet op de zinsbouw te letten.</p>

                    <p>In deze video helpt Margo Tinawi, lerares Webontwikkeling bij Le Wagon en medeoprichter van Techies Lab asbl (Belgi&euml;), je Scratch te ontdekken, een van de populairste visuele programmeertalen die over de hele wereld wordt gebruikt. Scratch is in 2002 ontwikkeld door MIT. Sindsdien is er een grote community omheen gecre&euml;erd, met miljoenen projecten die je met je leerlingen kunt nadoen en talloze tutorials in verschillende talen.</p>

                    <p>Je hoeft voor het gebruik van Scratch geen programmeerervaring te hebben en je kunt het gebruiken voor alle vakken! Als je Scratch bijvoorbeeld gebruikt als hulpmiddel voor digital storytelling, kunnen studenten verhalen maken, een wiskundeprobleem in beeld brengen of een kunstwedstrijd houden om meer te leren over cultureel erfgoed, terwijl ze leren programmeren en computationeel denken en, vooral, plezier hebben.</p>

                    <p>Scratch is gratis, werkt zeer intu&iuml;tief en zal je leerlingen zeker motiveren. Bekijk de video van Margo en zie hoe je aan de slag kunt gaan.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Het videoscript downloaden</a></p>

                    <h2>Ben je er klaar voor om wat je hebt geleerd te delen met je leerlingen?</h2>

                    <p>Kies een van de onderstaande lesplannen en organiseer een activiteit met je leerlingen.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Activiteit 1 &ndash; De basis van Scratch voor het basisonderwijs</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Activiteit 2 &ndash; De basis van Scratch voor de onderbouw van het middelbaar onderwijs</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Activiteit 3 &ndash; De basis van Scratch voor het middelbaar onderwijs</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection