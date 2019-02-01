@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Robotiikka ja nikkarointi kouluissa</h1><span>Tullia Urschitz</span></div>

                    <hr>

                    <p>Koodauksen, nikkaroinnin, robotiikan ja mikroelektroniikan k&auml;ytt&ouml; opetus- ja oppimisty&ouml;kaluina on ensisijaisen t&auml;rke&auml;&auml; 2000-luvun kouluissa.</p>

                    <p>Nikkaroinnista ja robotiikasta on paljon hy&ouml;ty&auml; oppilaille, sill&auml; ne auttavat kehitt&auml;m&auml;&auml;n t&auml;rkeit&auml; ongelmanratkaisu-, tiimity&ouml;skentely- ja yhteisty&ouml;taitoja. Lis&auml;ksi ne auttavat kehitt&auml;m&auml;&auml;n oppilaiden luovuutta ja itseluottamusta sek&auml; sinnikkyytt&auml; ja p&auml;&auml;tt&auml;v&auml;isyytt&auml; haasteiden edess&auml;. Robotiikka my&ouml;s edist&auml;&auml; osallisuutta, sill&auml; sen pariin p&auml;&auml;sev&auml;t helposti eritasoiset oppilaat (niin pojat kuin tyt&ouml;t), ja sill&auml; on my&ouml;nteinen vaikutus autistisiin oppilaisiin.</p>

                    <p>Katso video, jolla Italian Scientix-l&auml;hettil&auml;s ja Sant&rsquo;Ambrogio Di Valpolicellassa ty&ouml;skentelev&auml; STEM-aineiden opettaja Tullia Urschitz antaa k&auml;yt&auml;nn&ouml;n esimerkkej&auml; siit&auml;, miten opettajat voivat sis&auml;llytt&auml;&auml; nikkaroinnin ja robotiikan opetukseen ja tehd&auml; passiivisista oppilaista innokkaita tekij&ouml;it&auml;.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/FI/CNECT-2018-00222-00-20-FI-TRA-00.DOCX">Lataa videon k&auml;sikirjoitus</a></p>

                    <h2>Oletko valmis jakamaan oppimasi oppilaittesi kanssa?</h2>

                    <p>Valitse yksi alla olevista tuntisuunnitelmista ja ryhdy toimeen.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/FI/CNECT-2018-00222-00-13-FI-TRA-00.DOCX">Toiminta 1 - Mekaanisen pahvik&auml;den valmistaminen alakouluissa</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/FI/CNECT-2018-00222-00-14-FI-TRA-00.DOCX">Toiminta 2 - Mekaanisen k&auml;den tai robottik&auml;den valmistaminen yl&auml;kouluissa</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/FI/CNECT-2018-00222-00-15-FI-TRA-00.DOCX">Toiminta 3 - Mekaanisen k&auml;den tai robottik&auml;den valmistaminen toisen asteen oppilaitoksissa</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection