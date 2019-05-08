@extends('layout.base')

@section('content')

<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Ikkowdjar mingħajr kompjuters (mhux ipplaggjat)</h1><span>minn Alessandro Bogliolo</span></div>

                    <hr>

                    <p>L-ikkowdjar huwa l-lingwa tal-oġġetti, li jippermettilna niktbu programmi biex nagħtu funzjonalitajiet ġodda lil għexieren ta&rsquo; biljuni ta&rsquo; oġġetti programmabbli madwarna. L-ikkowdjar huwa l-aktar mod mgħaġġel ta&rsquo; kif l-ideat tagħna jsiru realt&agrave; u l-aktar mod effettiv ta&rsquo; kif niżviluppaw kapaċitajiet ta&rsquo; ħsieb komputazzjonali. Madankollu, it-teknoloġija mhijiex meħtieġa strettament biex jiġi żviluppat ħsieb komputazzjonali. Anzi, il-ħiliet tal-ħsieb komputazzjonali tagħna huma essenzjali biex it-teknoloġija taħdem.</p>

                    <p>F&rsquo;dan il-vidjo, Alessandro Bogliolo, Professur tas-Sistemi tal-Kompjuter fl-Italja u Koordinatur tal-Ġimgħa Ewropea tal-Ikkowdjar, ser jintroduċi attivitajiet ta&rsquo; kkowdjar mhux ipplaggjar li jistgħu jiġu pprattikati mingħajr ebda apparat elettroniku. L-iskop ewlieni ta&rsquo; attivitajiet mhux ipplaggjati huwa li jonqsu l-ostakoli ta&rsquo; aċċess biex l-ikkowdjar jasal f&rsquo;kull skola, irrispettivament mill-finanzjament u t-tagħmir.</p>

                    <p>Attivitajiet ta&rsquo; kkowdjar mhux ipplaggjat jiżvelaw l-aspetti komputazzjonali tad-dinja fiżika madwarna.</p>

                    @include('static.youtube', ['video_id' => '18N1CaQJ0GI'])

                    <h2>Lest biex taqsam dak li tgħallimt mal-istudenti tiegħek?</h2>

                    <p>Agħżel wieħed mill-pjanijiet tal-lezzjoni hawn taħt u organizza attivit&agrave; mal-istudenti tiegħek.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/MT/CNECT-2018-00222-00-00-MT-TRA-00.DOCX">Attivit&agrave; 1 &ndash;  CodyRoby għall-Iskola Primarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/MT/CNECT-2018-00222-00-02-MT-TRA-00.DOCX">Attivit&agrave; 2 &ndash;  CodyRoby għall-ewwel livelli tal-Iskola Sekondarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/MT/CNECT-2018-00222-00-03-MT-TRA-00.DOCX">Attivit&agrave; 3 &ndash;  CodyRoby għall-Iskola Sekondarja</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer')
						@endif
					
					
					</div>


            </div>

        </div>

    </section>

@endsection