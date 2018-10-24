@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programowanie wizualne &ndash; wprowadzenie do języka Scratch</h1><span>Autorka: Margo Tinawi</span></div>

                    <hr>

                    <p>Programowanie wizualne pozwala ludziom opisywać złożone procesy przy pomocy ilustracji lub obraz&oacute;w. Zwykle programowanie wizualne jest stawiane jako przeciwieństwo programowania tekstowego. Wizualne języki programowania są doskonałym narzędziem pozwalającym na przedstawienie zagadnień związanych z algorytmami i myśleniem algorytmicznym dzieciom, a nawet osobom dorosłym. Tego rodzaju języki pozwalają na rozpoczęcie nauki bez konieczności czytania kodu i zapoznawania się ze składnią danego języka.</p>

                    <p>W przedstawionym filmie Margo Tinawi, nauczycielka tworzenia stron internetowych z organizacji Le Wagon oraz wsp&oacute;łzałożycielka firmy Techies Lab asbl (Belgia), pomoże ci odkryć Scratch &ndash; jeden z najbardziej popularnych wizualnych język&oacute;w programowania, wykorzystywany na całym świecie. Język Scratch został opracowany przez pracownik&oacute;w MIT w 2002&nbsp;roku i od tamtej pory skupił wok&oacute;ł siebie ogromną społeczność, dzięki kt&oacute;rej możesz odkryć miliony projekt&oacute;w do wsp&oacute;lnej zabawy ze swoimi uczniami, a także skorzystać z niezliczonych poradnik&oacute;w w wielu językach.</p>

                    <p>Aby korzystać z języka Scratch, nie potrzebujesz żadnego doświadczenia programistycznego, a co ważniejsze, możesz wpleść ten język programowania do zajęć z niemal każdego przedmiotu! Możesz na przykład wykorzystać Scratch jako narzędzie służące do tworzenia cyfrowych opowieści, dzięki czemu uczniowie będą mogli zaprezentować własne historie, zilustrować zagadnienia matematyczne lub wziąć udział w konkursie plastycznym, w ramach kt&oacute;rego dowiedzą się czegoś nowego na temat dziedzictwa kulturowego, jednocześnie ucząc się kodowania, myślenia obliczeniowego i &ndash; przede wszystkim &ndash; doskonale się bawiąc.</p>

                    <p>Scratch to intuicyjne narzędzie, kt&oacute;re motywuje uczni&oacute;w do nauki, a co najważniejsze, jest dostępne całkowicie za darmo. Obejrzyj film przygotowany przez Margo, z kt&oacute;rego dowiesz się, jak zacząć.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Pobierz scenariusz filmu</a></p>

                    <h2>Czujesz, że jesteś w stanie podzielić się zdobytą wiedzą z uczniami?</h2>

                    <p>Wybierz jeden z poniższych plan&oacute;w zajęć i zorganizuj zajęcia dla swoich uczni&oacute;w.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Zajęcia 1 &ndash; Podstawy języka Scratch dla szk&oacute;ł podstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Zajęcia 2 &ndash; Podstawy języka Scratch dla szk&oacute;ł ponadpodstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Zajęcia 3 &ndash; Podstawy języka Scratch dla szk&oacute;ł średnich</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection