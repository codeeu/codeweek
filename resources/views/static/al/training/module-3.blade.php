@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programimi vizual &ndash; Prezantimi n&euml; Scratch</h1><span>nga Margo Tinawi</span></div>

                    <hr>

                    <p>Programimi vizual lejon njer&euml;zit t&euml; p&euml;rshkruajn&euml; proceset duke p&euml;rdorur ilustrimet ose grafik&euml;t. Zakonisht ne flasim p&euml;r programimin vizual si e kund&euml;rta e programimit me tekst. Programet vizuale t&euml; programimit (VPL) jan&euml; t&euml; p&euml;rshtatura ve&ccedil;an&euml;risht p&euml;r t&euml; prezantuar mendimin algoritmik te f&euml;mij&euml;t (dhe madje t&euml; rriturit). Me VPL-t&euml;, ka m&euml; pak p&euml;r t&euml; lexuar dhe nuk ka sintaks&euml; p&euml;r t&euml; implementuar.</p>

                    <p>N&euml; k&euml;t&euml; video, Margo Tinawi, M&euml;sues i Zhvillimit t&euml; Uebit pran&euml; Le Wagon dhe bashk&euml;themelues i Techies Lab asbl (Belgjik&euml;), do t&rsquo;ju ndihmoj&euml; t&euml; zbuloni Scratch, nj&euml; prej VPL-ve m&euml; t&euml; njohura n&euml; mbar&euml; bot&euml;n. Scratch &euml;sht&euml; zhvilluar nga MIT n&euml; vitin 2002, dhe q&euml; prej asaj kohe rreth tij &euml;sht&euml; krijuar nj&euml; komunitet i madh, ku mund t&euml; gjeni miliona projekte p&euml;r t&rsquo;i kopjuar me nx&euml;n&euml;sit dhe tutoriale t&euml; panum&euml;rta n&euml; shum&euml; gjuh&euml;.</p>

                    <p>Nuk &euml;sht&euml; nevoja t&euml; keni p&euml;rvoj&euml; kodimi p&euml;r t&euml; p&euml;rdorur Scratch, dhe mund ta p&euml;rdorni at&euml; n&euml; t&euml; gjitha l&euml;nd&euml;t e ndryshme! P&euml;r shembull, duke p&euml;rdorur Scratch si mjet dixhital p&euml;r t&euml; treguar histori, nx&euml;n&euml;sit mund t&euml; krijojn&euml; histori, mund t&euml; ilustrojn&euml; nj&euml; problem matematikor ose mund t&euml; luajn&euml; nj&euml; konkurs artistik p&euml;r t&euml; m&euml;suar rreth trash&euml;gimis&euml; kulturore, duke m&euml;suar nj&euml;koh&euml;sisht kodimin dhe mendimin kompjuterik, dhe &ccedil;&rsquo;&euml;sht&euml; m&euml; e r&euml;nd&euml;sishme, duke u arg&euml;tuar.</p>

                    <p>Scratch &euml;sht&euml; nj&euml; mjet falas, shum&euml; intuitiv dhe motivues p&euml;r nx&euml;n&euml;sit tuaj. Hidhini nj&euml; sy videos s&euml; Margos p&euml;r t&euml; m&euml;suar se si t&euml; filloni.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Shkarko tekstin e videos</a></p>

                    <h2>Jeni gati t&euml; ndani at&euml; q&euml; keni m&euml;suar me nx&euml;n&euml;sit tuaj?</h2>

                    <p>Zgjidhni nj&euml; prej planeve m&euml;simore m&euml; posht&euml; dhe organizoni nj&euml; aktivitet me nx&euml;n&euml;sit tuaj.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Aktiviteti 1 &ndash; Scratch Basic p&euml;r ciklin e ul&euml;t fillor</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Aktiviteti 2 &ndash; Scratch Basic p&euml;r ciklin e mes&euml;m t&euml; ul&euml;t</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Aktiviteti 3 &ndash; Scratch Basic p&euml;r shkoll&euml;n e mesme</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection