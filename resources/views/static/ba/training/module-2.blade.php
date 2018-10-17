@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Računarsko razmi&scaron;ljanje i rje&scaron;avanje problema</h1><span>Autor Miles Berry</span></div>

                    <hr>

                    <p>Računarsko razmi&scaron;ljanje (RR) opisuje način gledanja na probleme i sisteme tako da se može koristiti računar kako bi nam pomogao da ih rije&scaron;imo ili shvatimo. Računarsko razmi&scaron;ljanje nije od osnovne važnosti samo za razvijanje kompjuterskih programa, nego se može koristiti i kao podr&scaron;ka u rje&scaron;avanju problema u svim disciplinama.</p>

                    <p>Vi možete svoje učenike podučavati iz oblasti RR tako &scaron;to ćete ih navesti da razlože kompleksne probleme na manje (rastavljanje), da prepoznaju obrasce (prepoznavanje obrazaca), da identificiraju relevantne detalje za rje&scaron;avanje datog problema (apstrakcija), ili da uspostavljaju pravila ili instrukcije koje treba slijediti kako bi se postigao željeni ishod (dizajniranje algoritama). RR se može podučavati po različitim disciplinama, na primjer u matematici (shvaćanje pravila za množenje polinoma drugog reda), književnosti (razlaganje analize pjesme u analizu metra, rime i strukture), jezicima (pronalaženje obrazaca sa krajnjim slovima glagola koja utiču na pisanje u promjeni glagolskih vremena), i u mnogim drugim oblastima.</p>

                    <p>U ovom videu. Miles Berry, glavni predavač na Univerzitetu Roehampton - &Scaron;kola za edukaciju u Guilfordu (Ujedinjeno Kraljevstvo), uvodi koncept računarskog razmi&scaron;ljanja i različite načine na koje ga nastavnik može integrirati u učionici sa jednostavnim igrama.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podijelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Odaberite jedan od planova lekcija u donjem tekstu i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Aktivnost 1 - Razvijanje matematičkog načina razmi&scaron;ljanja za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Aktivnost 2 - Upoznavanje s algoritmima za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Aktivnost 3 - Algoritmi za vi&scaron;e razrede srednje &scaron;kole</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection