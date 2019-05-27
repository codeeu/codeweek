@extends('layout.base')

@section('content')

    <section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Coding for all subjects</h1>

                    </div>

                    <hr>

                    <p>
                        When you think of coding in the classroom, the first image that comes to mind is of computers, Technology, Mathematics or Science. However, given that students have a number of interests and subjects, why not use this in our favor and implement coding across the entire curriculum?
                    </p>

                    <p>
                        Integrating coding in the classroom has many benefits, as it helps them develop their critical thinking and problem solving skills, become active users and lead their own learning process, which is essential in schools. However, the most important thing is that your students will be learning while having fun!
                    </p>

                    <p>
                        Languages, Music or STEM are only some subjects that teachers can code in for future scientists, musicians, artists, anybody really! All teacher can integrate coding and computational thinking in the classroom. Using a CLIL lesson to explain a daily life algorithm, creating a felt joystick to learn about science or using educational robots to boost motivation in Mathematics are some examples of activities you can do in your classroom.
                    </p>

                    <p>
                        Have a look at the video below to see how Music, Science or Languages teachers can easily integrate coding and computational thinking in the classroom, even though you have no previous experience.
                    </p>


                    @include('static.youtube', ['video_id' => 'juc9fhtlAGU'])

                    <p>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+8_+Coding+for+all+subjects-video+script.docx">Download
                            the video script</a>
                    </p>

                    <h2>Ready to share what you learnt with your students?</h2>

                    <p>
                        Choose one of the lesson plans below and organize an activity with your students.
                    </p>

                    <ul>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/08_EUCodeWeek_Learning+Bit+8_+Coding+for+STEM_Lesson+plan+1_Tinkering+and+coding+with+Makey+Makey+2_Isa.docx">Tinkering and coding with Makey Makey, by M. Isabel Blanco and M. Concepción Fernández.</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/08_EUCodeWeek_Learning+Bit+8_+Coding+for+Music_Lesson+plan_Music+is+coding+for+lower+secondary.docx">Music is coding, by Elisabetta Nanni.</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/08_EUCodeWeek_Learning+Bit+8_+Coding+for+Inclusion_Lesson+plan+1_Robotics+and+inclusion+for+primary+in+STEM.docx"> Robotics and inclusion for primary in STEM, by Debora Carmela Niutta.</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/08_EUCodeWeek_Learning+Bit+8_+Coding+for+Foreign+Languages_A+daily+life+algorithm+in+a+CLIL+lesson_Lesson+plan+1_Primary.doc">A daily life algorithm for a CLIL lesson, by Stefania Altieri.</a>
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