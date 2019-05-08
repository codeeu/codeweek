@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Ustvarjanje, robotika in drobno izbolj&scaron;evanje v razredu</h1><span>Avtorica: Tullia Urschitz</span></div>

                    <hr>

                    <p>Vključevanje programiranja, drobnega izbolj&scaron;evanja (angl. <i>tinkering</i>), robotike in mikroelektronike kot orodij za poučevanje in učenje v &scaron;olske programe je ključnega pomena v izobraževanju 21.&nbsp;stoletja.</p>

                    <p>Uporaba drobnega izbolj&scaron;evanja in robotike v &scaron;olah ima veliko koristi za učence, saj jim pomaga razvijati ključne kompetence, kot so re&scaron;evanje težav, skupinsko delo in sodelovanje. Prav tako spodbuja ustvarjalnost in samozavest učencev ter jim pomaga razvijati vztrajnost in odločnost, kadar so soočeni z izzivi. Robotika je tudi področje, ki spodbuja vključevanje, saj je preprosto dostopna &scaron;irokemu spektru učencev (tako fantov kot deklet) z različnimi talenti in spretnostmi ter pozitivno vpliva na učence z motnjami avtističnega spektra.</p>

                    <p>Oglejte si videoposnetek, v katerem Tullia Urschitz, italijanska ambasadorka združenja Scientix in učiteljica predmetov STEM v kraju Sant&rsquo;Ambrogio di Valpolicella v Italiji, predstavlja nekaj praktičnih primerov, kako lahko učitelji vključijo drobno izbolj&scaron;evanje in robotiko v pouk ter s tem pasivne učence spremenijo v navdu&scaron;ene snovalce.</p>

                    @include('static.youtube', ['video_id' => '5V9G-vWWSik'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SL/CNECT-2018-00222-00-20-SL-TRA-00.DOCX">Prenos besedila videoposnetka</a></p>

                    <h2>Ste pripravljeni, da svoje znanje delite s svojimi učenci?</h2>

                    <p>Izberite enega od spodnjih načrtov učne ure in organizirajte dejavnost s svojimi učenci.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SL/CNECT-2018-00222-00-13-SL-TRA-00.DOCX">Dejavnost&nbsp;1 &ndash; Kako izdelati mehansko roko iz kartona za osnovne &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SL/CNECT-2018-00222-00-14-SL-TRA-00.DOCX">Dejavnost&nbsp;2 &ndash; Kako izdelati mehansko ali robotsko roko za nižje srednje &scaron;ole</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SL/CNECT-2018-00222-00-15-SL-TRA-00.DOCX">Dejavnost&nbsp;3 &ndash; Kako izdelati mehansko ali robotsko roko za vi&scaron;je srednje &scaron;ole</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection