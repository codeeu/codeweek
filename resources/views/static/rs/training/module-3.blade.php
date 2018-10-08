@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Vizuelno programiranje &ndash; Uvod u <i>Scratch</i></h1><span>autor: Margo Tinavi</span></div>

                    <hr>

                    <p>Vizuelno programiranje omogućava ljudima da predstave procese koristeći ilustracije ili grafiku. Obično se govori o vizuelnom programiranju kao suprotnom od tekstualnog programiranja. Vizuelni programski jezici (VPJ) su naročito prilagođeni da uvedu algoritamsko razmi&scaron;ljanje kod dece (pa čak i odraslih). Sa VPJ-ima ima manje materijala za čitanje i nema implementacije sintakse.</p>

                    <p>U ovom video snimku, Margo Tinavi, profesor programiranja u -u i suosnivač inicijative  (Belgija), pomoći će vam da otkrijete Scratch, jedan od najpopularnijih VPJ-a koji se koristi &scaron;irom sveta.  je razvijen od strane kompanije MIT 2002. godine, i od tada je stvorena velika zajednica oko njega, gde možete naći milione projekata koje možete da sprovodite sa svojim učenicima i bezbroj uputstava na raznim jezicima.</p>

                    <p>Nije potrebno prethodno iskustvo u programiranju da biste koristili  i možete ga koristiti za različite predmete! Na primer, pomoću -a, digitalnog alata za pričanje priča, učenici mogu da naprave priče, ilustruju matematički problem ili učestvuju u umetničkom takmičenju kako bi saznali vi&scaron;e o kulturnom nasleđu dok istovremeno uče programiranje i računarsko razmi&scaron;ljanje, i &scaron;to je najvažnije, zabavljaju se.</p>

                    <p>Scratch je besplatan alat, veoma intuitivan, odličan za motivisanje va&scaron;ih učenika. Pogledajte video u kom vam Margo pokazuje kako da počnete.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Izaberite jedan od nastavnih planova u nastavku i organizujte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Aktivnost 1 &ndash; Osnove -a za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Aktivnost 2 &ndash; Osnove -a za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Aktivnost 3 &ndash; Osnove -a za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection