@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Računalni&scaron;ko razmi&scaron;ljanje in re&scaron;evanje težav</h1><span>Avtor: Miles Berry</span></div>

                    <hr>

                    <p>Računalni&scaron;ko razmi&scaron;ljanje (RR) pomeni opazovanje težav in sistemov na način, da lahko uporabimo računalnik, ki nam jih pomaga re&scaron;iti ali jih razumeti. Računalni&scaron;ko razmi&scaron;ljanje ni bistveno le za razvoj računalni&scaron;kih programov, temveč ga je mogoče uporabiti pri re&scaron;evanju težav na vseh področjih.</p>

                    <p>Učence lahko naučite RR z nalogami, kot so razstavljanje kompleksnih težav na manj&scaron;e (dekompozicija), prepoznavanje vzorcev, prepoznavanje podrobnosti, ki so pomembne za re&scaron;itev težave (abstrakcija), ali določanje pravil ali navodil, ki jim je treba slediti, če želimo doseči želeni izid (razvoj algoritmov). RR je mogoče učiti na različnih področjih, na primer pri matematiki (ugotovavljanje pravil za faktorizacijo polinomov druge stopnje), književnosti (razčlemba analize pesmi na analizo mere, rime in zgradbe), jezikih (iskanje vzorcev v končnicah glagolov, ki vplivajo na spremembe pri pregibanju) in &scaron;tevilnih drugih.</p>

                    <p>V tem videoposnetku Miles Berry, docent na pedago&scaron;ki fakulteti Univerze v Roehamptonu v Združenem kraljestvu, predstavlja pojem računalni&scaron;kega razmi&scaron;ljanja in tri različne načine, kako ga lahko učitelji s preprostimi igrami vključijo v pouk.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Prenos besedila videoposnetka</a></p>

                    <h2>Ste pripravljeni, da svoje znanje delite s svojimi učenci?</h2>

                    <p>Izberite enega od spodnjih načrtov učne ure in organizirajte dejavnost s svojimi učenci.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Dejavnost&nbsp;1 &ndash; Razvijanje matematičnega razmi&scaron;ljanja za osnovne &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Dejavnost&nbsp;2 &ndash; Spoznavanje algoritmov za nižje srednje &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Dejavnost&nbsp;3 &ndash; Algoritmi za vi&scaron;je srednje &scaron;ole</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection