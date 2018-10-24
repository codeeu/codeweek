@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Myślenie obliczeniowe i&nbsp;rozwiązywanie problem&oacute;w</h1><span>Autor: Miles Berry</span></div>

                    <hr>

                    <p>Pojęcie &bdquo;myślenie obliczeniowe&rdquo; opisuje spos&oacute;b postrzegania problem&oacute;w i system&oacute;w w spos&oacute;b umożliwiający wykorzystanie komputera w celu ich rozwiązania lub lepszego zrozumienia. Tego rodzaju myślenie jest potrzebne nie tylko w celu tworzenia program&oacute;w komputerowych &ndash; można je także wykorzystać w celu wspomagania procesu rozwiązywania problem&oacute;w we wszystkich dziedzinach.</p>

                    <p>Możesz pom&oacute;c swoim uczniom w nauce i zrozumieniu myślenia obliczeniowego poprzez naukę rozkładania złożonych problem&oacute;w na czynniki pierwsze, dostrzegania wzorc&oacute;w, dostrzegania ważnych element&oacute;w pozwalających na rozwiązanie postawionych problem&oacute;w (abstrakcja) oraz opracowywanie zasad i reguł działania, kt&oacute;rych przestrzeganie może doprowadzić do osiągnięcia założonego celu (opracowywanie algorytm&oacute;w). Nauka myślenia obliczeniowego może stanowić część wielu r&oacute;żnych przedmiot&oacute;w, między innymi matematyki (określanie zasad rozkładu na czynniki wielomian&oacute;w drugiego rzędu), literatury (rozkład analizy wiersza na analizę metrum, rym&oacute;w oraz struktury), język&oacute;w obcych (poszukiwanie wzorc&oacute;w końc&oacute;wek wyrazowych wpływających na wymowę przy zmianie czasu gramatycznego) oraz wielu innych.</p>

                    <p>W przedstawionym filmie Miles Berry, wykładowca School of Education na Roehampton University (Zjednoczone Kr&oacute;lestwo), przedstawi koncepcję myślenia obliczeniowego oraz r&oacute;żnych sposob&oacute;w, przy użyciu kt&oacute;rych nauczyciel może włączyć tego rodzaju myślenie do zajęć dzięki prostym grom i zabawom.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Pobierz scenariusz filmu</a></p>

                    <h2>Czujesz, że jesteś w stanie podzielić się zdobytą wiedzą z uczniami?</h2>

                    <p>Wybierz jeden z poniższych plan&oacute;w zajęć i zorganizuj zajęcia dla swoich uczni&oacute;w.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Zajęcia 1 &ndash; Rozwijanie myślenia matematycznego dla szk&oacute;ł podstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Zajęcia 2 &ndash; Pierwsze spotkanie z algorytmami dla szk&oacute;ł ponadpodstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Zajęcia 3 &ndash; Algorytmy dla szk&oacute;ł średnich</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection