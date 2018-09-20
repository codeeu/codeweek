@extends('layout.base')

@section('content')

    <section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Making robotics and tinkering in the classroom</h1>
                        <span>by Tullia Urschitz</span>
                    </div>

                    <hr>

                    <p>
                        The integration of coding, tinkering, robotics, and microelectronics as teaching and learning tools in the school curricula is key in 21st century education.
                    </p>

                    <p>
                        Using tinkering and robotics in schools has many benefits for students, as it helps develop key competences such as problem solving, teamwork and collaboration. It also boosts students´ creativity and confidence and can help students develop perseverance and determination when faced with challenges. Robotics is also a field that promotes inclusivity, as it is easily accessible to a wide range of students with varying talents and skills (both boys and girls) and it positively influences students on the autism spectrum.
                    </p>

                    <p>
                        Have a look at this video where Tullia Urschitz, Italian Scientix ambassador and STEM teacher in Sant’Ambrogio Di Valpolicella, Italy, will give some practical examples on how teachers can integrate tinkering and robotics in the classroom, thus transforming passive students into enthusiastic makers.
                    </p>

                    <div class="flex youtube-container">
                        <iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik">
                        </iframe>
                    </div>

                    <p>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Download the video script</a>
                    </p>

                    <h2>Ready to share what you learnt with your students?</h2>

                    <p>
                        Choose one of the lesson plans below and organize an activity with your students.
                    </p>

                    <ul>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Activity 1 - How to make a mechanical, hardboard hand for Primary School</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Activity 2 - How to make a mechanical or robotic hand for Lower Secondary School</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Activity 3 - How to make a mechanical or robotic hand for Upper Secondary School</a>
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