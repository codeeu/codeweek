@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Skaitmeninis mąstymas ir problemų sprendimas</h1><span>Miles Berry</span></div>

                    <hr>

                    <p>Skaitmeninis mąstymas apibūdina požiūrį į problemas ir sistemas, kai joms i&scaron;spręsti ar suprasti naudojamas kompiuteris. Skaitmeninis mąstymas ne tik yra esminė kompiuterio programų kūrimo dalis&nbsp;&ndash; jį taip pat galima naudoti sprendžiant problemas visose kitose srityse.</p>

                    <p>Skaitmeninio mąstymo mokiniai gali mokytis skaidydami sudėtingas problemas į mažesnes (skaidymas), atpažindami modelius (modelių atpažinimas), nustatydami problemos sprendimui svarbias smulkmenas (i&scaron;skyrimas) arba pasiekdami norimą rezultatą vadovaudamiesi nustatytomis taisyklėmis ar instrukcijomis (algoritmų kūrimas). Skaitmeninio mąstymo galima mokyti įvairiose pamokose, pavyzdžiui, matematikos (ai&scaron;kinant faktoringo 2-ojo laipsnio polinomų taisykles), literatūros (poemos analizę padalijant į metro, rimo ir struktūros analizę), kalbų (ie&scaron;kant, kaip veiksmažodžio galūnės veikia jo ra&scaron;ybą keičiantis laikui) ir t.&nbsp;t.</p>

                    <p>&Scaron;iame vaizdo įra&scaron;e Gildfordo Roehamptono universiteto &Scaron;vietimo mokyklos (Jungtinė Karalystė) vyr.&nbsp;dėstytojas Miles Berry pristato skaitmeninio mąstymo sąvoką ir įvairius būdus, kaip mokytojas gali įtraukti jį į savo pamokas per paprastus žaidimus.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Atsisiųsti vaizdo įra&scaron;o scenarijų</a></p>

                    <h2>Ar pasiruo&scaron;ę su savo mokiniais pasidalyti tuo, ką sužinojote?</h2>

                    <p>Pasirinkite vieną i&scaron; toliau pateiktų pamokos planų ir įgyvendinkite jį su savo mokiniais.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">1&nbsp;veikla. Matematinio mąstymo ugdymas&nbsp;&ndash; pradinės mokyklos mokiniams</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">2&nbsp;veikla. Pažintis su algoritmais&nbsp;&ndash; jaunesnių klasių vidurinės mokyklos mokiniams</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">3&nbsp;veikla. Algoritmai&nbsp;&ndash; vyresnių klasių vidurinės mokyklos mokiniams</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection