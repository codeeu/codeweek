@extends('layout.base')

@section('content')

    <section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Coding without computers (unplugged)</h1>
                        <span>by Alessandro Bogliolo</span>
                    </div>

                    <hr>

                    <p>
                        Coding is the language of things, which allows us to write programs to grant new functionalities to the tens of billions of programmable objects around us. Coding is the fastest way to make our ideas come true and the most effective way to develop computational thinking capabilities. However, technology is not strictly required to develop computational thinking. Rather, our computational thinking skills are essential to make technology work.
                    </p>

                    <p>
                        In this video, Alessandro Bogliolo, Professor of Computer Systems in Italy and Europe Code Week Coordinator, will introduce unplugged coding activities that can be practiced without any electronic device. The main purpose of unplugged activities is to lower the access barriers to bring coding in every school, regardless of funding and equipment.
                    </p>

                    <p>
                        Unplugged coding activities unveil the computational aspects of the physical world around us.
                    </p>

                    <div class="flex youtube-container">
                        <iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI ">
                        </iframe>
                    </div>

                    <p>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Download the video script</a>
                    </p>

                    <h2>Ready to share what you learnt with your students?</h2>

                    <p>
                        Choose one of the lesson plans below and organize an activity with your students.
                    </p>

                    <ul>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Activity 1 – CodyRoby for Primary School</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Activity 2 – CodyRoby for Lower Secondary School</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Activity 3 – CodyRoby for Secondary School</a>
                        </li>
                    </ul>

                    @if(view()->exists('static.'.App::getLocale().'.training.footer'))
                        @include('static.'.App::getLocale().'.training.footer')
                    @else
                        @include('static.en.training.footer')
                    @endif


                </div>

            </div>

        </div>

    </section>

@endsection