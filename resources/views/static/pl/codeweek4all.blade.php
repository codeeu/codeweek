@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Wyzwanie &bdquo;Code Week 4 All&rdquo;</h1><span></span></div>

                    <hr>

                    <p>Wyzwanie w ramach Tygodnia Kodowania dla wszystkich &bdquo;Code Week 4 All&rdquo; zachęca do połączenia swoich wydarzeń z innymi organizowanymi przez twoich przyjaci&oacute;ł, koleg&oacute;w i znajomych w celu zdobycia Certyfikatu Doskonałości Tygodnia Kodowania.</p>


                    <simple-question :visible="true">
                        <template slot="title">Czym jest wyzwanie &bdquo;Code Week 4 All&rdquo;?</template>
                        <template slot="content">
                            <p>Możesz nie tylko dodać swoje wydarzenie na mapę Europejskiego Tygodnia Kodowania, ale także zachęcić do tego innych z sieci twoich kontakt&oacute;w. Jeśli twojemu sojuszowi uda się osiągnąć kt&oacute;ryś z poniższych prog&oacute;w, zdobędziecie Certyfikat Doskonałości Tygodnia Kodowania!</p>
                            <p>Kryteria, kt&oacute;re należy spełnić, by zdobyć Certyfikat Doskonałości:</p>
                            <ul>
                                <li><strong>500 uczestnik&oacute;w</strong></li>i/lub<li><strong>10 połączonych aktywności</strong></li>i/lub<li><strong>3 zaangażowane państwa</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Jak wziąć udział w wyzwaniu?</template>
                        <template slot="content">
                            <ol>
                                <li>Wejdź na <a href="/add">Dodaj wydarzenie</a> i wypełnij wymagane dane dotyczące twojego wydarzenia.</li>
                            </ol><i>Jeśli rejestrujesz się jako pierwszy w swoim sojuszu:</i><ol start="2">
                                <li>Kliknij Dodaj wydarzenie.</li>
                                <li>Gdy twoje wydarzenie zostanie zaakceptowane, otrzymasz potwierdzenie e-mailem wraz z unikatowym kodem wyzwania &bdquo;Code Week 4 All&rdquo;.</li>
                                <li>Skopiuj kod i podziel się nim z kolegami oraz pozostałymi kontaktami w sieci, kt&oacute;rzy także organizują wydarzenie związanie z kodowaniem. Promuj inicjatywę, aby zachęcić innych do wzięcia udziału w wyzwaniu!</li>
                                <li>Po zakończeniu kampanii organizatorzy każdego wydarzenia zostaną poproszeni o przedstawienie raportu dotyczącego liczby uczestnik&oacute;w, kt&oacute;rych udało im się zaangażować. Jeśli uda wam się osiągnąć kt&oacute;ryś z prog&oacute;w, ty i twoi koledzy, kt&oacute;rzy należeli do twojej sieci, otrzymacie Certyfikat Doskonałości!</li>
                            </ol><i>Jeśli chcesz dołączyć do istniejącego sojuszu:</i><ol start="2">
                                <li>W pole KOD UCZESTNICTWA W TYGODNIU KODOWANIA DLA WSZYSTKICH wklej kod uczestnictwa otrzymany od organizatora, kt&oacute;ry stworzył wasz sojusz.</li>
                                <li>Kliknij Dodaj wydarzenie</li>
                                <li>Promuj inicjatywę (i podziel się kodem!), aby pozyskać większą liczbę organizator&oacute;w dla swojego sojuszu.</li>
                                <li>Po zakończeniu kampanii organizatorzy każdego wydarzenia zostaną poproszeni o przedstawienie raportu dotyczącego liczby uczestnik&oacute;w, kt&oacute;rych udało im się zaangażować. Jeśli uda wam się osiągnąć kt&oacute;ryś z prog&oacute;w, ty i twoi koledzy, kt&oacute;rzy należeli do twojej sieci, otrzymacie Certyfikat Doskonałości!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Dlaczego warto dołączyć do wyzwania?</template>
                        <template slot="content">
                            <ul>
                                <li>By promować znaczenie kodowania.</li>
                                <li>By zaangażować dużą liczbę uczni&oacute;w.</li>
                                <li>By nawiązać znajomości z organizatorami i/lub szkołami z twojej społeczności lub z innych państw.</li>
                                <li>By wesprzeć innych organizator&oacute;w i nauczycieli.</li>
                                <li>By zdobyć <strong>Certyfikat Doskonałości.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection