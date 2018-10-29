@extends('layout.base')

 @section('content')
 
 <section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>L-introduzzjoni tar-robotika u t-tiswija fil-klassi</h1><span>minn Tullia Urschitz</span></div>

                    <hr>

                    <p>L-integrazzjoni tal-ikkowdjar, it-tiswija, ir-robotika u l-mikroelettronika bħala għodod ta&rsquo; tagħlim fil-kurrikuli tal-iskola hija ċentrali fl-edukazzjoni tas-seklu 21.</p>

                    <p>L-użu tat-tiswija u tar-robotika fl-iskejjel għandu ħafna benefiċċji għall-istudenti, peress li dan jgħin jivżiluppa kompetenzi ewlenin bħal soluzzjoni tal-problemi, xogħol f&rsquo;tim u kollaborazzjoni. Dan itejjeb ukoll il-kreattivit&agrave; u l-fiduċja tal-istudenti u jista&rsquo; jgħin lill-istudenti jiżviluppaw perseveranza u determinazzjoni meta jaffaċċjaw l-isfidi. Ir-robotika hija qasam li jippromwovi l-inklussivit&agrave;, peress li hija faċilment aċċessibbli għal firxa wiesgħa ta&rsquo; studenti b&rsquo;talenti u b'ħiliet differenti (kemm subien kif ukoll bniet) u tinfluwenza b&rsquo;mod pożittiv lill-istudenti fuq l-ispettru tal-awtiżmu.</p>

                    <p>Agħti titwila lejn dan il-vidjo fejn Tullia Urschitz, ambaxxatriċi Taljana ta&rsquo; Scientix u għalliema ta&rsquo; STEM f&rsquo;Sant&rsquo;Ambrogio Di Valpolicella, l-Italja, ser tagħti xi eżempji prattiċi ta&rsquo; kif l-għalliema jistgħu jintegraw it-tiswija u r-robotika fil-klassi, b&rsquo;hekk jibdlu l-istudenti passivi f&rsquo;oħrajn entużjastiċi li joħolqu xi ħaġa.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Niżżel l-iskritt tal-vidjo</a></p>

                    <h2>Lest biex taqsam dak li tgħallimt mal-istudenti tiegħek?</h2>

                    <p>Agħżel wieħed mill-pjanijiet tal-lezzjoni hawn taħt u organizza attivit&agrave; mal-istudenti tiegħek.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Attivit&agrave; 1 - Kif tagħmel id mekkanika tal-ħardbord għall-Iskola Primarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Attivit&agrave; 2 - Kif tagħmel id mekkanika jew robotika għall-ewwel livelli tal-Iskola Sekondarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Attivit&agrave; 3 - Kif tagħmel id mekkanika jew robotika għall-ogħla livelli tal-Iskola Sekondarja</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer')
						@endif
					
					</div>

            </div>

        </div>

    </section>
	
	@endsection