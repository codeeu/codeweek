@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programiranje bez upotrebe računara (unplugged)</h1><span>pripremio Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Programiranje je jezik stvari koji nam omogućava pisanje programa kako bi dali nove funkcionalnosti desetinama milijardi objekata u na&scaron;oj okolini koji se mogu programirati. Programiranje je nabrži način ostvarivanja na&scaron;ih ideja i najefikasniji način da se razviju sposobnosti računarskog mi&scaron;ljenja. Međutim, tehnologija nije nužno neophodna za razvoj računarskog mi&scaron;ljenja. Prije su na&scaron;e vje&scaron;tine računarskog mi&scaron;ljenja ključne za funkcionisanje tehnologije.</p>

                    <p>Alessandro Bogliolo, profesor računarskih sistema u Italiji i koordinator Evropske nedjelje programiranja, će u ovom video zapisu predstaviti aktivnosti programiranja koje ne zahtijevaju upotrebu računara(unplugged) i mogu se vježbati bez elektronskih uređaja.  Osnovna svrha unplugged aktivnosti jeste smanjenje prepreka u pristupu kako bi se programiranje dovelo u sve &scaron;kole, bez obzira na raspoloživost finansijskih sredstva i opreme.</p>

                    <p>Aktivnosti programiranja koje ne zahtijevaju upotrebu računara otkrivaju računarske aspekte fizičkog svijeta koji nas okružuju.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Preuzmite video zapis.</a></p>

                    <h2>Da li ste spremni podijeliti sa svojim učenicima ono &scaron;to ste naučili?</h2>

                    <p>Odaberite jedan plan časa i organizujte aktivnost sa va&scaron;im učenicima.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Aktivnost 1 &ndash; CodyRoby za osnovnu &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Aktivnost 2 &ndash; CodyRoby za nižu srednju &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Aktivnost 3 &ndash; CodyRoby za srednju &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection