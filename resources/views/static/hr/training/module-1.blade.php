@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programiranje bez računala (bez struje)</h1><span>Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Programiranje je jezik stvari koji nam omogućuje pisanje programa kako bismo dodijelili nove funkcionalnosti desetcima milijardi predmeta oko nas koji se mogu programirati. Programiranje je najbolji način ostvarivanja na&scaron;ih ideja te najučinkovitiji način razvijanja sposobnosti računalnog razmi&scaron;ljanja. No tehnologija nije nužno potrebna za razvoj računalnog razmi&scaron;ljanja. Zapravo su vje&scaron;tine računalnog razmi&scaron;ljanja ključne za funkcioniranje tehnologije.</p>

                    <p>U ovom videozapisu Alessandro Bogliolo, profesor računalnih sustava u Italiji i koordinator Europskog tjedna programiranja, predstavit će aktivnosti programiranja za koje nije potrebna struja i koje se mogu provoditi bez ikakva elektroničkog uređaja. Glavna svrha aktivnosti bez struje jest smanjiti prepreke pristupa kako bi se programiranje uvelo u sve &scaron;kole, neovisno o financijskim sredstvima i opremi.</p>

                    <p>Aktivnosti programiranja bez struje otkrivaju računalne aspekte fizičkog svijeta koji nas okružuje.</p>

                    @include('static.youtube', ['video_id' => '18N1CaQJ0GI'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/HR/CNECT-2018-00222-00-17-HR-TRA-00.DOCX">Preuzmite videoskriptu</a></p>

                    <h2>Jeste li spremni podijeliti naučeno sa svojim učenicima?</h2>

                    <p>Odaberite jedan od nastavnih planova u nastavku i organizirajte aktivnost sa svojim učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/HR/CNECT-2018-00222-00-00-HR-TRA-00.DOCX">1. aktivnost &ndash; CodyRoby za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/HR/CNECT-2018-00222-00-02-HR-TRA-00.DOCX">2. aktivnost &ndash; CodyRoby za niže razrede srednje &scaron;kole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/HR/CNECT-2018-00222-00-03-HR-TRA-00.DOCX">3. aktivnost &ndash; CodyRoby za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection