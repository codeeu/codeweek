@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programiranje bez kompjutera (bez struje)</h1><span>autor: Alesandro Boljolo</span></div>

                    <hr>

                    <p>Programiranje je jezik stvari koji nam omogućava da pi&scaron;emo programe kako bismo dobili nove funkcionalnosti za desetine milijardi programabilnih objekata. Programiranje je najbrži način da se na&scaron;e ideje ostvare i najefikasniji način da se razviju sposobnosti računarskog razmi&scaron;ljanja. Međutim, tehnologija nije nužno potrebna za razvijanje računarskog razmi&scaron;ljanja. Na&scaron;e sposobnosti računarskog razmi&scaron;ljanja su te koje su ključne i neophodne da bi tehnologija funkcionisala.</p>

                    <p>U ovom video snimku, Alesandro Boljolo, profesor računarskih sistema u Italiji i koordinator Evropske nedelje programiranja, predstaviće aktivnosti programiranja bez kompjutera koje mogu da se praktikuju bez bilo kakvih električnih uređaja. Glavni cilj aktivnosti bez kompjutera je da smanji prepreke pri uvođenju programiranja u sve &scaron;kole bez obzira na finansiranje i opremu.</p>

                    <p>Aktivnosti programiranja bez kompjutera otkrivaju računarske aspekte fizičkog sveta oko nas.</p>

                    @include('static.youtube', ['video_id' => '18N1CaQJ0GI'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-17-SR-TRA-00.DOCX">Preuzmite video skriptu</a></p>

                    <h2>Spremni ste da podelite ono &scaron;to ste naučili sa svojim učenicima?</h2>

                    <p>Izaberite jedan od nastavnih planova u nastavku i organizujte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-00-SR-TRA-00.DOCX">Aktivnost 1 &ndash; CodyRoby za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-02-SR-TRA-00.DOCX">Aktivnost 2 &ndash; CodyRoby za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SR/CNECT-2018-00222-00-03-SR-TRA-00.DOCX">Aktivnost 3 &ndash; CodyRoby za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection