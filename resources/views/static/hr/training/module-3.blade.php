@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Vizualno programiranje &ndash; Uvod u Scratch</h1><span>Margo Tinawi</span></div>

                    <hr>

                    <p>Vizualno programiranje omogućuje ljudima da opisuju procese s pomoću ilustracija ili grafika. Vizualno se programiranje obično suprotstavlja programiranju koje se temelji na tekstu. Jezici vizualnog programiranja (VPL-ovi) posebice su dobro prilagođeni za upoznavanje djece (pa čak i odraslih) s algoritamskim razmi&scaron;ljanjem. Uz jezike vizualnog programiranja manje je toga za čitanje i ne primjenjuje se sintaksa.</p>

                    <p>U ovom videozapisu Margo Tinawi, nastavnica web-razvoja u Le Wagonu i suosnivačica dru&scaron;tva Techies Lab asbl (Belgija), pomoći će vam da otkrijete Scratch, jedan od najpoznatijih jezika vizualnog programiranja koji se upotrebljava diljem svijeta. Scratch je razvijen na MIT-u 2002. i otad je oko sebe okupio veliku zajednicu u kojoj možete pronaći milijune projekata koje možete replicirati sa svojim učenicima te bezbroj tutorijala na nekoliko jezika.</p>

                    <p>Da biste se koristili jezikom Scratch, ne trebate imati iskustva s programiranjem, a možete ga primjenjivati u raznim predmetima! Primjerice, koristite li se jezikom Scratch kao alatom za digitalno pričanje priča, učenici mogu stvarati priče, ilustrirati matematički problem ili sudjelovati u umjetničkom natjecanju kako bi naučili o kulturnoj ba&scaron;tini, pritom učeći programiranje i računalno razmi&scaron;ljanje i, najvažnije, zabavljajući se.</p>

                    <p>Scratch je besplatan alat, vrlo je intuitivan i motivirajući za va&scaron;e učenike. Pogledajte videozapis koji je snimila Margo i naučite kako početi.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Preuzmite videoskriptu</a></p>

                    <h2>Jeste li spremni podijeliti naučeno sa svojim učenicima?</h2>

                    <p>Odaberite jedan od nastavnih planova u nastavku i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">1. aktivnost &ndash; Osnove programa Scratch za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">2. aktivnost &ndash; Osnove programa Scratch za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">3. aktivnost &ndash; Osnove programa Scratch za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection