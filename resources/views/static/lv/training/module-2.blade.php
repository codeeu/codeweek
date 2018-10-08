@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Skaitļo&scaron;anas tipa domā&scaron;ana un problēmu risinā&scaron;ana</h1><span>Mailzs Berijs (Miles Berry)</span></div>

                    <hr>

                    <p>Skaitļo&scaron;anas tipa domā&scaron;ana ir veids, kādā tiek aplūkotas problēmas un sistēmas, kas ļauj izmantot datoru to izpra&scaron;anai un atrisinā&scaron;anai. Skaitļo&scaron;anas tipa domā&scaron;ana ir ne vien būtiska datorprogrammu izstrādē, bet to var arī izmantot, lai palīdzētu risināt problēmas visdažādākajās disciplīnās.</p>

                    <p>Jūs varat mācīt skaitļo&scaron;anas tipa domā&scaron;anu saviem skolēniem, uzdodot viņiem sadalīt kompleksas problēmas mazākās sastāvdaļās (dekompozīcija), lai atpazītu sistēmas (sistēmu atpazī&scaron;ana), identificētu problēmas atrisinā&scaron;anai būtiskos elementus (abstrakcija) vai arī noteiktu noteikumus vai instrukcijas, kas jāievēro, lai sasniegtu vēlamo rezultātu (algoritmu izstrāde). Skaitļo&scaron;anas tipa domā&scaron;anu var mācīt dažādās disciplīnās, piemēram, matemātikā (izdomāt noteikumus otrās pakāpes polinomu reizinā&scaron;anai), literatūrā (sadalīt dzejoļa analīzi sīkāk, analizējot pantmēru, ritmu un struktūru), valodā (atrast sistēmu darbības vārda pēdējos burtos, kas ietekmē tā rakstību, mainoties gramatiskajam laikam), un daudzos citos priek&scaron;metos.</p>

                    <p>&Scaron;ajā video Mailzs Berijs, kur&scaron; ir galvenais lektors Rohemptonas Universitātes Gildfordas Izglītības skolā Apvienotajā Karalistē, iepazīstinās ar jēdzienu &ldquo;skaitļo&scaron;anas tipa domā&scaron;ana&rdquo; un dažādajiem veidiem, kā skolotājs var to integrēt klases nodarbībās ar vienkār&scaron;u spēļu palīdzību.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Lejupielādēt video skriptu</a></p>

                    <h2>Vai esat gatavs dalīties ar iegūtajām zinā&scaron;anām ar saviem skolēniem?</h2>

                    <p>Izvēlieties vienu no tālāk sniegtajiem mācību stundu plāniem un noorganizējiet nodarbību saviem skolēniem.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">1.&nbsp;nodarbība&nbsp;&mdash; matemātiskās spriestspējas attīstī&scaron;ana sākumskolai</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">2.&nbsp;nodarbība&nbsp;&mdash; iepazīstinā&scaron;ana ar algoritmiem pamatskolai</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">3.&nbsp;nodarbība&nbsp;&mdash; algoritmi vidusskolai</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection