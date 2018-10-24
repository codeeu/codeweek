@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Kodowanie bez komputer&oacute;w (bez prądu)</h1><span>Autor: Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Kod to język maszyn &ndash; umożliwia nam pisanie program&oacute;w, dzięki kt&oacute;rym dodajemy nowe funkcje do dziesiątek miliard&oacute;w programowalnych przedmiot&oacute;w, kt&oacute;re otaczają nas w codziennym życiu. Kodowanie stanowi najszybszy spos&oacute;b realizacji naszych pomysł&oacute;w, a także najskuteczniejszą metodę rozwoju umiejętności myślenia obliczeniowego. Warto jednak pamiętać o tym, że korzystanie z technologii nie jest warunkiem koniecznym do zdobycia tej umiejętności. W praktyce jest wręcz przeciwnie &ndash; to nasza umiejętność myślenia obliczeniowego jest kluczem, dzięki kt&oacute;remu możemy sprawić, że technologia działa tak, jak tego chcemy.</p>

                    <p>W przedstawionym filmie Alessandro Bogliolo, profesor wykładający zagadnienia związane z systemami komputerowymi we Włoszech oraz koordynator Europejskiego Tygodnia Kodowania, przedstawi serię zadań związanych z kodowaniem, kt&oacute;re można wykonać bez elektryczności i bez wykorzystywania jakichkolwiek urządzeń elektronicznych. Gł&oacute;wnym celem zajęć bez elektryczności jest zlikwidowanie barier w dostępie, a także wprowadzenie kodowania do każdej szkoły, niezależnie od posiadanego wyposażenia oraz funduszy.</p>

                    <p>Zajęcia z programowania bez prądu pozwalają wszystkim uczestnikom odkryć r&oacute;żnorodne aspekty obliczeniowe otaczającego świata.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Pobierz scenariusz filmu</a></p>

                    <h2>Czujesz, że jesteś w stanie podzielić się zdobytą wiedzą z uczniami?</h2>

                    <p>Wybierz jeden z poniższych plan&oacute;w zajęć i zorganizuj zajęcia dla swoich uczni&oacute;w.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Zajęcia 1 &ndash; CodyRoby dla szk&oacute;ł podstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Zajęcia 2 &ndash; CodyRoby dla szk&oacute;ł ponadpodstawowych</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Zajęcia 3 &ndash; CodyRoby dla szk&oacute;ł średnich</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection