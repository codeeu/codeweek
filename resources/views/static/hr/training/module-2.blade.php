@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Računalno razmi&scaron;ljanje i rje&scaron;avanje problema</h1><span>Miles Berry</span></div>

                    <hr>

                    <p>Računalno razmi&scaron;ljanje opisuje način pristupa problemima i sustavima koji omogućuje upotrebu računala koje nam pomaže u njihovu rje&scaron;avanju ili razumijevanju. Računalno razmi&scaron;ljanje nije samo ključno za razvoj računalnih programa, već se ono može upotrebljavati i kao podr&scaron;ka pri rje&scaron;avanju problema u svim disciplinama.</p>

                    <p>Svoje učenike možete naučiti računalnom razmi&scaron;ljanju tako &scaron;to ćete ih navesti da složene probleme ra&scaron;člane na manje (dekompozicija), da prepoznaju uzorke (prepoznavanje uzoraka), da utvrde sve relevantne podatke za rje&scaron;avanje problema (apstrakcija); ili možete utvrditi pravila ili upute koje mogu slijediti kako bi postigli željeni ishod (dizajn algoritma). Računalno razmi&scaron;ljanje može se poučavati u različitim disciplinama, primjerice u matematici (otkrivanje pravila za faktoriranje polinoma drugog stupnja), književnosti (ra&scaron;članjivanje analize pjesme u analizu stihova, ritma i strukture), jezicima (pronalaženje uzoraka u zavr&scaron;nim slovima glagola koji utječu na njegovo pisanje pri promjeni glagolskog vremena) i u brojnim drugim disciplinama.</p>

                    <p>U ovom videozapisu Miles Berry, glavni predavač na sveučili&scaron;tu University of Roehampton School of Education u Guildfordu (Ujedinjena Kraljevina), upoznaje nas s pojmom računalnog razmi&scaron;ljanja i s različitim načinima na koje ga nastavnik može integrirati u učionicu s pomoću jednostavnih igara.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Preuzmite videoskriptu</a></p>

                    <h2>Jeste li spremni podijeliti naučeno sa svojim učenicima?</h2>

                    <p>Odaberite jedan od nastavnih planova u nastavku i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">1. aktivnost &ndash; Razvoj matematičkog razmi&scaron;ljanja za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">2. aktivnost &ndash; Upoznavanje s algoritmima za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">3. aktivnost &ndash; Algoritmi za vi&scaron;e razrede srednje &scaron;kole</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection