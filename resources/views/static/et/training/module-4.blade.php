@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Scratchiga hariduslike m&auml;ngude loomine</h1><span>Autor: Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Kriitiline m&otilde;tlemine, j&auml;rjepidevus, probleemide lahendamine, algoritmiline m&otilde;tlemine ja loomingulisus on vaid m&otilde;ned p&otilde;hioskustest, mida teie &otilde;pilased 21.&nbsp;sajandil l&auml;bil&ouml;&ouml;miseks vajavad. Kodeerimine aitab neid arendada l&otilde;busal ja motiveerival moel.</p>

                    <p>Voo reguleerimine juhistest ja silmustest koosnevate jadade abil, andmeesitus muutujate ja loendite abil, protsesside s&uuml;nkroniseerimine &ndash; k&otilde;ik see v&otilde;ib tunduda keeruline, kuid j&auml;rgmises videos n&auml;idatakse, et seda on lihtsam &otilde;ppida, kui arvate.</p>

                    <p>Selles videos selgitab Jes&uacute;s Moreno Le&oacute;n, Hispaaniast p&auml;rit arvuti&otilde;petaja ja teadur, kuidas saate oma &otilde;pilastele &otilde;petada neid ja teisi oskusi ning samal ajal ka l&otilde;butseda. Kuidas seda teha? Kasutage Scratchi, k&otilde;ige populaarsemat programmeerimiskeelt terves maailmas, ning looge k&uuml;simuste ja vastuste m&auml;ng. Scratch ei arenda ainult algoritmilist m&otilde;tlemist, vaid aitab tuua klassiruumi ka m&auml;ngulisi elemente, mis aitavad hoida teie &otilde;pilaste motivatsiooni.</p>

                    <p>Vaadake videot ja alustage &otilde;ppimisega.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Laadi alla video skript</a></p>

                    <h2>Kas olete valmis &otilde;pitut oma &otilde;pilastega jagama?</h2>

                    <p>Valige altpoolt &uuml;ks tunniplaanidest ja alustage &otilde;ppimist.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">1. tegevus &ndash; Scratchi k&uuml;simuste ja vastuste m&auml;ng algkoolile</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">2. tegevus &ndash; Scratchi k&uuml;simuste ja vastuste m&auml;ng p&otilde;hikooli esimesele astmele</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">3. tegevus &ndash; Scratchi k&uuml;simuste ja vastuste m&auml;ng p&otilde;hikooli teisele astmele</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection