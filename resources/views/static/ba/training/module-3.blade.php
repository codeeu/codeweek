@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Vizuelno programiranje - uvod u Scratch</h1><span>Autor Margo Tinawi</span></div>

                    <hr>

                    <p>Vizuelno programiranje omogućuje ljudima da opisuju procese uz pomoć ilustracija ili grafika. Obično govorimo o vizuelnom programiranju za razliku od tekstualno zasnovanog programiranja. Jezici za vizuelno programiranje (JVP) su posebno dobro prilagođeni u cilju uvođenja algoritamskog razmi&scaron;ljanja za djecu (pa čak i odrasle). Sa JVP, ima manje za čitati i nema nikakve sintakse koju treba realizirati.</p>

                    <p>U ovom videu, Margo Tinawi, nastavnik za mrežni razvoj u Le Wagon i suosnivač Technies Lab asbl (Belgija), pomoći će vam da otkrijete Scratch, jedan od najpopularnijih JVP koji se koristi &scaron;irom svijeta. Scratch je izradio MIT 2002. godine i od tada je oko njega stvorena velika zajednica, gdje možete pronaći milione projekata za repliciranje sa svojim učenicima i bezbrojna uputstva na nekoliko jezika.</p>

                    <p>Ne trebate imati nikakvo iskustvo u kodiranju za upotrebu Scratcha, a možete ga koristiti u svim različitim predmetima! Na primjer, Scratch se može koristiti kao digitalni alat za pripovijedanje, učenici mogu kreirati priče, ilustrirati matematički zadatak ili učestvovati u umjetničkom natjecanju gdje se uči o kulturnom naslijeđu, a istovremeno učiti kodiranje i računarsko razmi&scaron;ljanje, a &scaron;to je najvažnije, da im bude i zabavno.</p>

                    <p>Scratch je besplatan alat, vrlo intuitivan i motivirajući za va&scaron;e učenike. Pogledajte video koji je napravila Margo i saznajte kako da otpočnete.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podijelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Odaberite jedan od planova lekcija u donjem tekstu i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Aktivnost 1 - Scratch Basic za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Aktivnost 2 - Scratch Basic za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Aktivnost 3 - Scratch Basic za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection