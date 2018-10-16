@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Majsterkowanie, grzebanie i&nbsp;robotyka w&nbsp;klasie</h1><span>Autorka: Tullia Urschitz</span></div>

                    <hr>

                    <p>Włączenie programowania, majsterkowania, robotyki i elektroniki do program&oacute;w szkolnych jako narzędzi w procesie nauczania stanowi klucz do kształcenia na miarę XXI&nbsp;wieku.</p>

                    <p>Wykorzystanie majsterkowania i robotyki w szkołach niesie za sobą wiele korzyści dla uczni&oacute;w, ponieważ pomaga im rozwijać kluczowe umiejętności, takie jak pracę w grupie, rozwiązywanie problem&oacute;w i wsp&oacute;łpracę. Dodatkowo takie zajęcia sprzyjają rozwojowi kreatywności i pewności siebie, jednocześnie pomagając uczniom w nauce wytrwałości i determinacji w pokonywaniu pojawiających się wyzwań. Robotyka to także dziedzina, kt&oacute;ra sprzyja integracji, ponieważ jest przystępna dla uczni&oacute;w charakteryzujących się r&oacute;żnorodnymi umiejętnościami, niezależnie od ich płci. Doskonale sprawdza się także jako narzędzie do aktywizowania uczni&oacute;w ze stwierdzonymi zaburzeniami ze spektrum autyzmu.</p>

                    <p>Zapraszamy do obejrzenia filmu, w kt&oacute;rym Tullia Urshchitz, ambasadorka organizacji Scientix z Włoch oraz nauczycielka przedmiot&oacute;w ścisłych we włoskim mieście Sant&rsquo;Ambrogio Di Valpolicella, przedstawi kilka praktycznych przykład&oacute;w, dzięki kt&oacute;rym nauczyciele będą mogli skutecznie włączyć majsterkowanie i robotykę do programu nauczania w klasie, motywując pasywnych uczni&oacute;w do zostania majsterkowiczami.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Pobierz scenariusz filmu</a></p>

                    <h2>Czujesz, że jesteś w stanie podzielić się zdobytą wiedzą z uczniami?</h2>

                    <p>Wybierz jeden z poniższych plan&oacute;w zajęć i zorganizuj zajęcia dla swoich uczni&oacute;w.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Zajęcia 1 &ndash; Jak wykonać mechaniczne ramię ze sklejki dla szk&oacute;ł podstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Zajęcia 2 &ndash; Jak wykonać mechaniczne ramię ze sklejki dla szk&oacute;ł ponadpodstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Zajęcia 3 &ndash; Jak wykonać mechaniczne ramię ze sklejki dla szk&oacute;ł średnich</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection