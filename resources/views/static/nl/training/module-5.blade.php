@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Creatief met robotica en sleutelen in de klas</h1><span>door Tullia Urschitz</span></div>

                    <hr>

                    <p>In het onderwijs van de 21e eeuw zijn programmeren, sleutelen, robotica en micro-elektronica in het schoolcurriculum ge&iuml;ntegreerd als leer- en lestools.</p>

                    <p>Het gebruik van sleutelen en robotica in scholen heeft veel voordelen voor leerlingen, omdat ze er belangrijke vaardigheden mee ontwikkelen, zoals probleemoplossing, teamwork en samenwerking. Ook stimuleert het de creativiteit en het zelfvertrouwen van de leerlingen en kan het ze leren om met meer volharding en vastberadenheid om te gaan met uitdagingen. Robotica is ook een vakgebied dat inclusiviteit stimuleert, doordat het zeer toegankelijk is voor allerlei leerlingen (jongens en meisjes) met verschillende talenten en vaardigheden. Daarnaast heeft het een positieve invloed op leerlingen met een stoornis in het autismespectrum.</p>

                    <p>Bekijk deze video, waarin Tullia Urschitz, Scientix-ambassadeur in Itali&euml; en STEM-lerares in Sant&rsquo;Ambrogio Di Valpolicella (ook Itali&euml;), een aantal praktische voorbeelden geeft van hoe leraren sleutelen en robotica kunnen verwerken in hun lessen en zo passieve leerlingen kunnen laten veranderen in enthousiaste creatievelingen.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Het videoscript downloaden</a></p>

                    <h2>Ben je er klaar voor om wat je hebt geleerd te delen met je leerlingen?</h2>

                    <p>Kies een van de onderstaande lesplannen en organiseer een activiteit met je leerlingen.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Activiteit 1 &ndash; Een mechanische hand van hardboard maken voor het basisonderwijs</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Activiteit 2 &ndash; Een mechanische hand of robothand maken voor de onderbouw van het middelbaar onderwijs</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Activiteit 3 &ndash; Een mechanische hand of robothand maken voor de bovenbouw van het middelbaar onderwijs</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection