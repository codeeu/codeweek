@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Vizuelno programiranje &ndash; Uvod u Skrač (Scratch)</h1><span>pripremila Margo Tinawi</span></div>

                    <hr>

                    <p>Vizuelno programiranje omogućava ljudima da opi&scaron;u procese pomoću ilustracija ili grafika. Obično o vizuelnom programiranju govorimo kao o suprotnosti tekstualnom programiranju. Vizuelni programski jezici (VPJ) naročito su prilagođeni za približavanje algoritamskog načina razmi&scaron;ljanja djeci (čak i odraslima). Kada se koriste vizuelni programski jezici, manje se čita i nema primjene sintakse.</p>

                    <p>U ovom video zapisu, Margo Tinawi, nastavnik izrade internet stranica u kampu za programiranje Le Wagon i suosnivač inicijative Tehies Lab asbl (Belgija) pomoći će vam da otkrijete Skrač, jedan od najpopularnijih vizuelnih programskih jezika koji se koristi &scaron;irom svijeta. Skrač je 2002. godine razvijen na MIT Univerzitetu i od tada je oko njega stvorena velika zajednica, gdje možete pronaći milione projekata koje možete isprobati sa va&scaron;im učenicima i niz tutorijala na vi&scaron;e jezika. </p>

                    <p>Za kori&scaron;ćenje Skrača nije vam neophodno prethodno iskustvo u programiranju i možete ga koristiti u različitim predmetima! Na primjer, koristeći Skrač kao digitalnu alatku za pričanje priča, učenici mogu kreirati priče, predstaviti matematički problem ili realizovati takmičenja u umjetnosti kako bi učili o kulturnom nasljeđu, dok savladavaju programiranje i računarsko mi&scaron;ljenje i, najvažnije, zabavljaju se. </p>

                    <p>Skrač je besplatna alatka, veoma intuitivna i motivi&scaron;e va&scaron;e učenike. Pogledajte Margoin video zapis kako biste saznali odakle da krenete.</p>

                    @include('static.youtube', ['video_id' => 'pmfCwauN1c0'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/ME/CNECT-2018-00222-00-18-ME-TRA-00.DOC">Preuzmite video zapis.</a></p>

                    <h2>Da li ste spremni podijeliti sa svojim učenicima ono &scaron;to ste naučili?</h2>

                    <p>Odaberite jedan plan časa i organizujte aktivnost sa va&scaron;im učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/ME/CNECT-2018-00222-00-07-ME-TRA-00.DOC">Aktivnost 1 - Osnove Skrača za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/ME/CNECT-2018-00222-00-08-ME-TRA-00.DOC">Akivnost  2 - Osnove Skrača za nižu srednju &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/ME/CNECT-2018-00222-00-09-ME-TRA-00.DOC">Aktivnost 3 - Osnove Skrača za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection