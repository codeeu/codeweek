@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Ustvarjanje izobraževalnih iger s programskim jezikom Scratch</h1><span>Avtor: Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kritično razmi&scaron;ljanje, vztrajnost, re&scaron;evanje težav, računalni&scaron;ko razmi&scaron;ljanje in ustvarjalnost so samo nekatere od ključnih spretnosti, ki jih va&scaron;i učenci potrebujejo v 21.&nbsp;stoletju. Programiranje vam jih pomaga razviti na zabaven in spodbuden način.</p>

                    <p>Pojmi, kot so algoritmični vidiki nadzora pretoka z uporabo nizov navodil in zank, predstavitev podatkov s spremenljivkami in seznami ter sinhronizacija procesov, se morda sli&scaron;ijo zapleteno, a v tem videoposnetku boste spoznali, da se jih je mogoče naučiti lažje, kot si mislite.</p>

                    <p>V tem videoposnetku Jes&uacute;s Moreno Le&oacute;n, učitelj in raziskovalec računalni&scaron;tva iz &Scaron;panije, pojasnjuje, kako lahko svojim učencem pomagate, da razvijejo te in druge spretnosti ter se pri tem &scaron;e zabavajo. Kako je to mogoče? Z ustvarjanjem iger z vpra&scaron;anji in odgovori v programskem jeziku Scratch, ki je najbolj priljubljen programski jezik v &scaron;olah po vsem svetu. Scratch ne spodbuja le računalni&scaron;kega razmi&scaron;ljanja, temveč omogoča tudi uvedbo elementov igrifikacije v razred, ti pa poskrbijo, da so učenci motivirani, medtem ko se učijo in zabavajo.</p>

                    <p>Za lažji začetek si oglejte videoposnetek.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Prenos besedila videoposnetka</a></p>

                    <h2>Ste pripravljeni, da svoje znanje delite s svojimi učenci?</h2>

                    <p>Izberite enega od spodnjih načrtov učne ure in organizirajte dejavnost s svojimi učenci.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Dejavnost&nbsp;1 &ndash; Igra z vpra&scaron;anji in odgovori v programskem jeziku Scratch za osnovne &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Dejavnost&nbsp;2 &ndash; Igra z vpra&scaron;anji in odgovori v programskem jeziku Scratch za nižje srednje &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Dejavnost&nbsp;3 &ndash; Igra z vpra&scaron;anji in odgovori v programskem jeziku Scratch za vi&scaron;je srednje &scaron;ole</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection