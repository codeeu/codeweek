@extends('layout.base')

@section('content')
<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>L-ipprogrammar viżiv &ndash;  Introduzzjoni għal Scratch</h1><span>minn Margo Tinawi</span></div>

                    <hr>

                    <p>L-ipprogrammar viżiv jippermetti lill-bnedmin jiddeskrivu proċessi billi jużaw illustrazzjonijiet jew grafiċi. Normalment, nitkellmu dwar ipprogrammar viżiv għall-kuntrarju ta&rsquo; pprogrammar bbażata fuq it-test. Il-lingwi tal-ipprogrammar viżiv (VPLs) huma adattati b&rsquo;mod speċjali tajjeb biex jintroduċu ħsieb algoritmiku lit-tfal (u anki adulti). Bil-VPLs, ikun hemm inqas x&rsquo;taqra u l-ebda sintassi x'tiġi implimentata.</p>

                    <p>F&rsquo;dan il-vidjo, Margo Tinawi, Għalliem tal-Iżvilupp tal-Web f&rsquo;Le Wagon u Kofundatur ta&rsquo; Techies Lab asbl (il-Belġju), ser jgħinek tiskopri Scratch, waħda mill-aktar popolari li tintuża madwar id-dinja kollha. Scratch ġiet żviluppata mill-MIT fl-2002, u sa minn dakinhar, inbniet komunit&agrave; kbira madwarha, fejn tista&rsquo; ssib miljuni ta&rsquo; proġetti biex tirreplikahom mal-istudenti tiegħek u għadd kbira ta&rsquo; lezzjonijiet b&rsquo;diversi lingwi.</p>

                    <p>M&rsquo;hemmx għalfejn ikollok esperjenza fl-ikkowdjar biex tuża Scratch, u tista&rsquo; tużaha fis-suġġetti differenti kollha! Pereżempju, meta tuża Scratch bħala għodda ta&rsquo; rakkontar tal-istejjer diġitali, l-istudenti jistgħu joħolqu stejjer, juru problema tal-matematika jew jieħdu sehem f'konkors tal-arti biex jitgħallmu dwar il-wirt kulturali, filwaqt li jitgħallmu l-ikkowdjar u l-ħsieb komputazzjonali, u l-aktar importanti, jieħdu pjaċir.</p>

                    <p>Scratch hija għodda bla ħlas, intuwittiva ħafna u ta&rsquo; motivazzjoni għall-istudenti tiegħek. Agħti titwila lejn il-vidjo ta&rsquo; Margo biex titgħallem kif tibda.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Niżżel l-iskritt tal-vidjo</a></p>

                    <h2>Lest biex taqsam dak li tgħallimt mal-istudenti tiegħek?</h2>

                    <p>Agħżel wieħed mill-pjanijiet tal-lezzjoni hawn taħt u organizza attivit&agrave; mal-istudenti tiegħek.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Attivit&agrave; 1 &ndash;  Scratch Bażiku għall-Iskola Primarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Attivit&agrave; 2 &ndash; Scratch Bażiku għall-ewwel livelli tal-Iskola Sekondarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Attivit&agrave; 3 &ndash;  Scratch Bażiku għall-Iskola Sekondarja</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>

@endsection