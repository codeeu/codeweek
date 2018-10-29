@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Visuaalinen ohjelmointi &ndash; johdanto Scratch-ohjelmointikieleen</h1><span>Margo Tinawi</span></div>

                    <hr>

                    <p>Visuaalinen ohjelmointi auttaa ihmisi&auml; kuvailemaan prosesseja kuvien tai grafiikan avulla. Visuaalisesta ohjelmoinnista puhutaan yleens&auml; tekstipohjaisen ohjelmoinnin vastakohtana. Visuaaliset ohjelmointikielet soveltuvat erityisen hyvin algoritmisen ajattelun esittelemiseen lapsille (ja jopa aikuisille). Visuaalisessa ohjelmointikieless&auml; on v&auml;hemm&auml;n luettavaa eik&auml; syntaksia.</p>

                    <p>Le Wagon -koodauskeskuksen verkko-ohjelmoinnin opettaja ja yksi Techies Lab asbl:n (Belgia) perustajista Margo Tinawi antaa videolla perehdytyksen Scratch-ohjelmointikieleen, joka on maailman k&auml;ytetyimpi&auml; visuaalisia ohjelmointikieli&auml;. MIT kehitti Scratchin vuonna 2002, mink&auml; j&auml;lkeen kielen ymp&auml;rille on syntynyt suuri yhteis&ouml;. Tarjolla on miljoonia projekteja, joita voit toistaa oppilaittesi kanssa, sek&auml; lukematon m&auml;&auml;r&auml; ohjemateriaalia eri kielill&auml;.</p>

                    <p>Scratchin k&auml;ytt&ouml; ei edellyt&auml; aikaisempaa koodauskokemusta, ja sit&auml; voi k&auml;ytt&auml;&auml; kaikissa aineissa! Scratchi&auml; voidaan esimerkiksi k&auml;ytt&auml;&auml; digitaalisena tarinankerrontaty&ouml;kaluna, jolla oppilaat voivat luoda tarinoita, kuvata matemaattisen ongelman tai pelata taidepeli&auml;, jossa tutustutaan kulttuuriperint&ouml;&ouml;n. Samalla he oppivat koodausta ja laskennallista ajattelua ja, mik&auml; t&auml;rkeint&auml;, heill&auml; on hauskaa.</p>

                    <p>Scratch on maksuton ty&ouml;kalu, joka on eritt&auml;in intuitiivinen ja oppilaita motivoiva. Katso Margon video, niin p&auml;&auml;set alkuun.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Lataa videon k&auml;sikirjoitus</a></p>

                    <h2>Oletko valmis jakamaan oppimasi oppilaittesi kanssa?</h2>

                    <p>Valitse yksi alla olevista tuntisuunnitelmista ja ryhdy toimeen.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Toiminta 1 &ndash; Scratch Basic alakouluihin</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Toiminta 2 &ndash; Scratch Basic yl&auml;kouluihin</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Toiminta 3 &ndash; Scratch Basic toiseen asteen oppilaitoksiin</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection