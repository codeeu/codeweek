@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Tworzenie gier edukacyjnych w&nbsp;języku Scratch</h1><span>Autor: Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Krytyczne myślenie, wytrwałość, rozwiązywanie problem&oacute;w, myślenie obliczeniowe i kreatywność to wyłącznie niekt&oacute;re spośr&oacute;d kluczowych umiejętności, kt&oacute;rych potrzebują twoi uczniowie, by m&oacute;c odnieść sukces w gospodarce XXI&nbsp;wieku, a programowanie może im pom&oacute;c w zdobyciu tych umiejętności w ciekawy i motywujący spos&oacute;b.</p>

                    <p>Koncepcje takie jak kontrola przepływu w algorytmach przy pomocy sekwencji instrukcji i pętli, przedstawianie danych przy pomocy zmiennych i list oraz synchronizacja proces&oacute;w mogą się na pierwszy rzut oka wydawać skomplikowane, jednak w tym filmie zobaczysz, że tak naprawdę są prostsze, niż myślisz.</p>

                    <p>W filmie Jes&uacute;s Moreno Le&oacute;n, nauczyciel informatyki i naukowiec z Hiszpanii, wyjaśnia w jaki spos&oacute;b możesz pom&oacute;c swoim uczniom w rozwijaniu tych i podobnych umiejętności, a jednocześnie zadbać o to, aby się świetnie przy tym bawili. W jaki spos&oacute;b? Przez stworzenie prostej gry w pytania i odpowiedzi w języku Scratch &ndash; najpopularniejszym języku programowania wykorzystywanym w szkołach na całym świecie. Scratch nie tylko pomaga w rozwijaniu umiejętności myślenia obliczeniowego, ale także pozwala na wprowadzenie do zajęć element&oacute;w grywalizacji w celu motywowania uczni&oacute;w i sprawienia, że nauka będzie dla nich doskonałą zabawą.</p>

                    <p>Obejrzyj film, z kt&oacute;rego dowiesz się, od czego zacząć:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Pobierz scenariusz filmu</a></p>

                    <h2>Czujesz, że jesteś w stanie podzielić się zdobytą wiedzą z uczniami?</h2>

                    <p>Wybierz jeden z poniższych plan&oacute;w zajęć i zorganizuj zajęcia dla swoich uczni&oacute;w.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Zajęcia 1 - Gra w pytania i odpowiedzi w języku Scratch dla szk&oacute;ł podstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Zajęcia 2 - Gra w pytania i odpowiedzi w języku Scratch dla szk&oacute;ł ponadpodstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Zajęcia 3 - Gra w pytania i odpowiedzi w języku Scratch dla szk&oacute;ł średnich</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection