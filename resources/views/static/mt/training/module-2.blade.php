@extends('layout.base')

@section('content')

<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Il-ħsieb komputazzjonali u s-solvien tal-problemi</h1><span>minn Miles Berry</span></div>

                    <hr>

                    <p>Il-ħsieb komputazzjonali (CT, computational thinking) jiddeskrivi mod ta&rsquo; kif tħares lejn il-problemi u s-sistemi sabiex ikun jista&rsquo; jintuża kompjuter biex jgħinna nsolvuhom jew nifhmuhom. Il-ħsieb komputazzjonali mhuwiex biss essenzjali għall-iżvilupp ta&rsquo; programmi tal-kompjuter, iżda jista&rsquo; jintuża wkoll biex jappoġġja soluzzjoni tal-problemi fid-dixxiplini kollha.</p>

                    <p>Tista&rsquo; tgħallem CT lill-istudenti tiegħek billi tgħidilhom jaqsmu problemi kumplessi f&rsquo;oħrajn iżgħar (dekompożizzjoni), jagħrfu xejriet (rikonoxximent ta&rsquo; xejra), jidentifikaw id-dettalji rilevanti għas-soluzzjoni ta&rsquo; problema (astrazzjoni); jew jistabbilixxu r-regoli jew l-istruzzjonijiet li għandhom jiġu segwiti sabiex jinkiseb ir-riżultat mixtieq (disinn ta&rsquo; algoritmu). CT jista&rsquo; jiġi mgħallem f&rsquo;dixxiplini differenti, pereżempju fil-Matematika (issib ir-regoli għall-fatturament ta&rsquo; polinomjali tat-tieni ordni), Letteratura (biex taqsam l-analiżi ta&rsquo; poeżija f&rsquo;analiżi ta&rsquo; metru, rima u struttura), Lingwi (ssib xejriet fl-ittri tal-aħħar ta&rsquo; verb li jaffettwaw l-ortografija tiegħu meta jinbidel it-temp) u bosta oħrajn.</p>

                    <p>F&rsquo;dan il-vidjow, Miles Berry, Lettur Prinċipali fl-Universit&agrave; ta&rsquo; Roehampton School of Education at Guildford (ir-Renju Unit), ser jintroduċi l-kunċett tal-ħsieb komputazzjoni u l-modi differenti ta&rsquo; kif għalliem jista&rsquo; jintegrah fil-klassi b&rsquo;logħob sempliċi.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Niżżel l-iskritt tal-vidjo</a></p>

                    <h2>Lest biex taqsam dak li tgħallimt mal-istudenti tiegħek?</h2>

                    <p>Agħżel wieħed mill-pjanijiet tal-lezzjoni hawn taħt u organizza attivit&agrave; mal-istudenti tiegħek.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Attivit&agrave; 1 &ndash;  L-Iżvilupp ta&rsquo; Raġunament Matematiku għall-Iskola Primarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Attivit&agrave; 2 &ndash;  Familjarit&agrave; mal-Algoritmi għall-ewwel livelli tal-Iskola Sekondarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Attivit&agrave; 3 &ndash;  Algoritmi għall-ogħla livelli tal-Iskola Sekondarja</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>

@endsection