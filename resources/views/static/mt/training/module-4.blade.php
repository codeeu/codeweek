@extends('layout.base')

@section('content')

<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Il-ħolqien ta&rsquo; logħob edukattiv bi Scratch</h1><span>minn Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Il-ħsieb kritiku, il-persistenza, is-solvien tal-problemi, il-ħsieb komputazzjonali u l-kreattivit&agrave; huma biss xi wħud mill-ħiliet ewlenin li l-istudenti tiegħek jeħtieġu biex jirnexxu fis-seklu 21, u l-ikkowdjar jista&rsquo; jgħinek tikseb dawn b&rsquo;mod pjaċevoli u mimli motivazzjoni.</p>

                    <p>Il-kunċetti algoritmiċi tal-kontroll tal-fluss permezz ta&rsquo; sekwenzi ta&rsquo; istruzzjonijiet u loops, rappreżentazzjoni tad-data permezz ta&rsquo; varjabbli u listi, jew is-sinkronizzazzjoni ta&rsquo; proċessi jistgħu jidhru bħala kunċetti kkumplikati iżda f&rsquo;dan il-vidjo se ssib li huma eħfef biex titgħallimhom milli taħseb.</p>

                    <p>F&rsquo;dan il-vidjo, Jes&uacute;s Moreno Le&oacute;n, għalliem tax-Xjenza tal-Kompjuter u riċerkatur minn Spanja, ser jispjega kif tista&rsquo; tiżviluppa dawn u ħiliet oħra fl-istudenti tiegħek waqt li jieħdu pjaċir. Kif jista&rsquo; jsir dan? Billi toħloq logħba ta&rsquo; mistoqsijiet u tweġibiet fi Scratch, il-lingwa tal-ipprogrammar l-aktar popolari li tintuża fl-iskejjel madwar id-dinja. Scratch mhux biss itejjeb il-ħsieb komputazzjoni, iżda wkoll tippermetti l-introduzzjoni ta&rsquo; elementi ta&rsquo; gamifikazzjoni fl-iklassi biex iżżomm l-istudenti tiegħek motivati filwaqt li jitgħallmu u jieħdu pjaċir.</p>

                    <p>Agħti titwila lejn il-vidjo biex tara kif tibda:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Niżżel l-iskritt tal-vidjo</a></p>

                    <h2>Lest biex taqsam dak li tgħallimt mal-istudenti tiegħek?</h2>

                    <p>Agħżel wieħed mill-pjanijiet tal-lezzjoni hawn taħt u organizza attivit&agrave; mal-istudenti tiegħek.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Attivit&agrave; 1 - Logħba ta&rsquo; mistoqsijiet u tweġibiet bi Scratch għall-Iskola Primarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Attivit&agrave; 2 - Logħba ta&rsquo; mistoqsijiet u tweġibiet bi Scratch għall-ewwel livelli tal-Iskola Sekondarja</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Attivit&agrave; 3 - Logħba ta&rsquo; mistoqsijiet u tweġibiet bi Scratch għall-Iskola Sekondarja</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer')
						
					@endif
					
					</div>

            </div>

        </div>

    </section>
	
	@endsection