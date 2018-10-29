@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Računarsko mi&scaron;ljenje i rje&scaron;avanje problema</h1><span>pripremio Miles Berry</span></div>

                    <hr>

                    <p>Računarsko mi&scaron;ljenje (RM) opisuje način posmatranja problema i sistema, kako bi bilo moguće koristiti računar za rje&scaron;avanje ili razumijevanje istih. Ne samo da je računarsko mi&scaron;ljenje ključno za razvoj računarskih programa, već se može koristiti kao podr&scaron;ka rje&scaron;avanju problema kroz sve discipline.</p>

                    <p>Svoje učenike možete naučiti računarskom mi&scaron;ljenju, tako &scaron;to ćete od njih zahtijevati da složene probleme razlože na manje (dekompozicija), da prepoznaju &scaron;ablone (prepoznavanje &scaron;ablona), uoče detalje bitne za rje&scaron;avanje problema (apstrakcija) ili utvrditi niz pravila ili uputstava koje će oni pratiti kako bi do&scaron;li do željenog ishoda (dizajn algoritama). Računarsko mi&scaron;ljenje je moguće obrađivati i kroz vi&scaron;e različitih disciplina, na primjer u matematici (utvrditi pravila faktorizacije polinoma drugog stepena), književnosti (razložiti analizu pjesme na analizu metrike, rime i strukure), jezicima (pronaći &scaron;ablone na krajevima glagola koji utiču na različito pisanje istog glagola u konjugaciji) i mnogim drugim.</p>

                    <p>U ovom video zapisu, Miles Berry glavni predavač na Fakultetu za obrazovanje Univerziteta Rouhempton u Gilfordu (Ujedinjeno Kraljevstvo)  (org. University of Roehampton School of Education at Guildford (United Kingdom)) predstaviće koncept računarskog mi&scaron;ljenja i različite načine na koje ga nastavnik može uključiti u učionicu uz pomoć jednostavnih igara.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Preuzmite video zapis.</a></p>

                    <h2>Da li ste spremni podijeliti sa svojim učenicima ono &scaron;to ste naučili?</h2>

                    <p>Odaberite jedan plan časa i organizujte aktivnost sa va&scaron;im učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Akivnost 1 &ndash; Razvijanje matematičkog razmi&scaron;ljanja za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Aktivnost 2 &ndash; Upoznavanje sa algoritmima za nižu srednju &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Aktivnost 3 &ndash; Algoritmi za vi&scaron;u srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection