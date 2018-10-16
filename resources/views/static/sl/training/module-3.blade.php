@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Vizualno programiranje &ndash; uvod v programski jezik Scratch</h1><span>Avtorica: Margo Tinawi</span></div>

                    <hr>

                    <p>Vizualno programiranje ljudem omogoča, da procese opi&scaron;ejo s slikovnimi ali grafičnimi elementi. Vizualno programiranje navadno razumemo kot nasprotje tekstovnega programiranja. Jeziki za vizualno programiranje (VPL) so &scaron;e posebej primerni za navajanje otrok (in celo odraslih) na algoritmično razmi&scaron;ljanje. Z jeziki za vizualno programiranje ni treba veliko brati in uporabljati skladnje.</p>

                    <p>V tem videoposnetku vam Margo Tinawi, učiteljica spletnega razvoja v okviru programa Le Wagon in soustanoviteljica pobude Techies Lab ASBL v Belgiji, pomaga spoznati Scratch, enega od najbolj priljubljenih jezikov za vizualno programiranje, ki se uporablja po vsem svetu. Scratch so leta&nbsp;2002 razvili na in&scaron;titutu MIT, od takrat pa se je okrog njega izoblikovala velika skupnost, v kateri boste na&scaron;li milijone projektov, ki jih lahko uporabite za svoje učence, in ogromno vadnic v &scaron;tevilnih jezikih.</p>

                    <p>Za uporabo programskega jezika Scratch ne potrebujete izku&scaron;enj s programiranjem, uporabite pa ga lahko pri vseh predmetih! Scratch je lahko na primer orodje za digitalno pripovedovanje zgodb, s katerim učenci ustvarjajo zgodbe, ilustrirajo matematične probleme ali sodelujejo v umetni&scaron;kem tekmovanju o kulturni dedi&scaron;čini, obenem pa se učijo programiranja in računalni&scaron;kega razmi&scaron;ljanja ter se predvsem zabavajo.</p>

                    <p>Scratch je brezplačno orodje, ki ga učenci z lahkoto in veseljem uporabljajo. Za lažji začetek si oglejte videoposnetek z Margo.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Prenos besedila videoposnetka</a></p>

                    <h2>Ste pripravljeni, da svoje znanje delite s svojimi učenci?</h2>

                    <p>Izberite enega od spodnjih načrtov učne ure in organizirajte dejavnost s svojimi učenci.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Dejavnost&nbsp;1 &ndash; Osnove programskega jezika Scratch za osnovne &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Dejavnost&nbsp;2 &ndash; Osnove programskega jezika Scratch za nižje srednje &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Dejavnost&nbsp;3 &ndash; Osnove programskega jezika Scratch za vi&scaron;je srednje &scaron;ole</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection