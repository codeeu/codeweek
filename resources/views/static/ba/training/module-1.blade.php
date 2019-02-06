@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Kodiranje bez kompjutera (oflajn)</h1><span>Autor Aleksandro Bogliolo</span></div>

                    <hr>

                    <p>Kodiranje je jezik stvari, koji vam omogućava da pi&scaron;ete programe i dajete nove funkcionalnosti desetinama milijardi predmeta oko nas koji se mogu programirati. Kodiranje je najbrži način da se na&scaron;e ideje pretvore u stvarnost i najdjelotvorniji put za razvijanje sposobnosti računarskog razmi&scaron;ljanja. Međutim, tehnologija nije strogo obavezna razvijati računarsko razmi&scaron;ljanje. Prije će biti da su na&scaron;e vje&scaron;tine računarskog razmi&scaron;ljanja od presudne važnosti kako bi funkcionirala sama tehnologija.</p>

                    <p>U ovom videu, Aleksandro Bogliolo, profesor kompjuterskih sistema u Italiji i koordinator Evropske sedmice kodiranja, uvest će aktivnosti kodiranja oflajn koje se mogu praktikovati bez ikakvih elektronskih uređaja. Glavna svrha aktivnosti oflajn je da se smanje barijere pristupačnosti i da se kodiranje uvede u svaku &scaron;kolu, bez obzira na raspoloživa sredstva i opremu.</p>

                    <p>Aktivnosti kodiranja oflajn otkrivaju računarske aspekte fizičkog svijeta oko nas.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-17-SR-TRA-00.DOCX">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podijelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Odaberite jedan od planova lekcija u donjem tekstu i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-00-SR-TRA-00.DOCX">Aktivnost 1 - CodyRoby za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-02-SR-TRA-00.DOCX">Aktivnost 2 - CodyRoby za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-03-SR-TRA-00.DOCX">Aktivnost 3 - CodyRoby za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection