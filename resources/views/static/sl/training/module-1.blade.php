@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programiranje brez računalnika</h1><span>Avtor: Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Programiranje je jezik stvari, ki nam omogoča, da pi&scaron;emo programe in tako dajemo nove funkcije več milijardam predmetom okoli nas, ki jih je mogoče programirati. Programiranje je najhitrej&scaron;a pot do uresničenja na&scaron;ih idej in najučinkovitej&scaron;i način za razvoj sposobnosti računalni&scaron;kega razmi&scaron;ljanja. Kljub temu pa za razvoj računalni&scaron;kega razmi&scaron;ljanja ne potrebujemo tehnologije. Ravno nasprotno, na&scaron;e sposobnosti računalni&scaron;kega razmi&scaron;ljanja so osnova za delovanje tehnologije.</p>

                    <p>V tem videoposnetku Alessandro Bogliolo, profesor računalni&scaron;kih sistemov v Italiji in ambasador evropskega tedna programiranja, predstavlja programerske dejavnosti brez računalnika, ki jih lahko izvajate brez vsakr&scaron;ne elektronske naprave. Glavni namen dejavnosti brez računalnika je olaj&scaron;ati dostopnost ter prinesti programiranje v vsako &scaron;olo ne glede na njena finančna sredstva in opremo.</p>

                    <p>S programerskimi dejavnostmi brez računalnika spoznavamo računalni&scaron;ke vidike fizičnega sveta okoli nas.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Prenos besedila videoposnetka</a></p>

                    <h2>Ste pripravljeni svoje znanje deliti s svojimi učenci?</h2>

                    <p>Izberite enega od spodnjih načrtov učne ure in organizirajte dejavnost s svojimi učenci.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Dejavnost&nbsp;1 &ndash; CodyRoby za osnovne &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Dejavnost&nbsp;2 &ndash; CodyRoby za nižje srednje &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Dejavnost&nbsp;3 &ndash; CodyRoby za vi&scaron;je srednje &scaron;ole</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection