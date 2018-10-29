@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Računarsko razmi&scaron;ljanje i re&scaron;avanje problema</h1><span>autor: Majls Beri</span></div>

                    <hr>

                    <p>Računarsko razmi&scaron;ljanje (RR) predstavlja način gledanja na probleme i sisteme tako da kompjuter može da pomogne u njihovom re&scaron;avanju ili razumevanju. Računarsko razmi&scaron;ljanje nije neophodno samo za razvijanje kompjuterskih programa, već se može koristiti i kao podr&scaron;ka re&scaron;avanju problema u svim disciplinama.</p>

                    <p>Možete da predajete RR svojim učenicima tako &scaron;to ćete ih učiti da razbijaju kompleksne probleme na manje (dekompozicija), da prepoznaju obrasce (prepoznavanje obrazaca), da identifikuju detalje relevantne za re&scaron;avanje problema (apstrakcija) ili da postave pravila i uputstva za praćenje radi postizanja željenog ishoda (dizajn algoritama). RR može da se predaje kroz sve discipline, na primer, u matematici (shvatiti pravila za faktorisanje polinoma 2. reda), književnosti (razložiti analizu pesme u analizu metra, rime i strukture), jezicima (pronaći obrasce u glagolskim zavr&scaron;ecima koji utiču na njihovo menjanje u različitim vremenima) i mnoge druge.</p>

                    <p>U ovom video snimku, Majls Beri, predavač na Fakultetu za obrazovanje predmetnih nastavnika na Univerzitetu Ruhempton u Gildfordu (Velika Britanija), predstaviće koncept računarskog razmi&scaron;ljanja i različite načine na koje nastavnik može da ga integri&scaron;e u svoju nastavu pomoću jednostavnih igrica.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Izaberite jedan od nastavnih planova u nastavku i organizujte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Aktivnost 1 &ndash; Razvijanje matematičkog rezonovanja za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Aktivnost 2 &ndash; Upoznavanje sa algoritmima za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Aktivnost 3 &ndash; Algoritmi za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection