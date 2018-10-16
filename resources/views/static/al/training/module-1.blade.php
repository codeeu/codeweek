@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Kodimi pa kompjuter&euml; (jasht&euml; linje)</h1><span>nga Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Kodimi &euml;sht&euml; gjuha e gj&euml;rave, q&euml; na lejon t&euml; shkruajm&euml; programe p&euml;r t&rsquo;u dh&euml;n&euml; funksione dhjet&euml;ra miliard&euml; objekteve t&euml; programueshme rrotull nesh. Kodimi &euml;sht&euml; m&euml;nyra m&euml; e shpejt&euml; p&euml;r t&rsquo;i b&euml;r&euml; realitet idet&euml; tona dhe m&euml;nyra m&euml; efikase p&euml;r t&euml; zhvilluar aft&euml;si t&euml; mendimit kompjuterik. Por, teknologjia nuk &euml;sht&euml; e domosdoshme p&euml;r t&euml; zhvilluar mendimin kompjuterik. N&euml; fakt, jan&euml; aft&euml;sit&euml; tona t&euml; mendimit kompjuterik q&euml; jan&euml; t&euml; domosdoshme p&euml;r ta b&euml;r&euml; teknologjin&euml; q&euml; t&euml; funksionoj&euml;.</p>

                    <p>N&euml; k&euml;t&euml; video, Alessandro Bogliolo, profesor i sistemeve kompjuterike n&euml; Itali dhe koordinator i Europe Code Week, do t&euml; prezantoj&euml; aktivitete t&euml; kodimit jasht&euml; linje q&euml; mund t&euml; praktikohen pa pajisje elektronike. Q&euml;llimi kryesor i aktiviteteve jasht&euml; linje &euml;sht&euml; ulja e barrierave t&euml; aksesit p&euml;r t&euml; sjell&euml; kodimin n&euml; &ccedil;do shkoll&euml;, pavar&euml;sisht nga financimet dhe pajisjet.</p>

                    <p>Aktivitetet e kodimit jasht&euml; linje shpalosin aspektet kompjuterike t&euml; bot&euml;s fizike rreth nesh.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Shkarko tekstin e videos</a></p>

                    <h2>Jeni gati t&euml; ndani at&euml; q&euml; keni m&euml;suar me nx&euml;n&euml;sit tuaj?</h2>

                    <p>Zgjidhni nj&euml; prej planeve m&euml;simore m&euml; posht&euml; dhe organizoni nj&euml; aktivitet me nx&euml;n&euml;sit tuaj.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Aktiviteti 1 &ndash; CodyRoby p&euml;r ciklin e ul&euml;t fillor</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Aktiviteti 2 &ndash; CodyRoby p&euml;r ciklin e mes&euml;m t&euml; ul&euml;t</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Aktiviteti 3 &ndash; CodyRoby p&euml;r shkoll&euml;n e mesme</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection