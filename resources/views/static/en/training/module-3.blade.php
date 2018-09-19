@extends('layout.base')

@section('content')

    <section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Visual programming – Introduction to Scratch</h1>
                        <span>by Margo Tinawi</span>
                    </div>

                    <hr>

                    <p>
                        Visual programming lets humans describe processes using illustrations or graphics. We usually speak of visual programming as opposed to text-based programming. Visual programming languages (VPLs) are especially well adapted to introduce algorithmic thinking to children (and even adults). With VPLs, there is less to read and no syntax to implement.
                    </p>

                    <p>
                        In this video, Margo Tinawi, Web Development Teacher at Le Wagon and Co-Founder of Techies Lab asbl (Belgium), will help you discover Scratch, one of the most popular VPL used all over the world. Scratch was developed by the MIT in 2002, and since then a big community has been created around it, where you can find millions of projects to replicate with your students and countless tutorials in several languages.
                    </p>

                    <p>
                        You do not need to have any coding experience to use Scratch, and you can use it in all the different subjects! For instance, using Scratch as a digital storytelling tool, students can create stories, illustrate a math problem or play an art contest to learn about cultural heritage, while learning coding and computational thinking, and most important, having fun.
                    </p>

                    <p>
                        Scratch is a free tool, very intuitive and motivating for your students. Have a look at Margo’s video to learn how to get started.
                    </p>

                    <div class="flex youtube-container">
                        <iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0">
                        </iframe>
                    </div>

                    <p>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Download the video script</a>
                    </p>

                    <h2>Ready to share what you learnt with your students?</h2>

                    <p>
                        Choose one of the lesson plans below and organize an activity with your students.
                    </p>

                    <ul>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Activity 1 – Scratch Basic for Primary School</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Activity 2 – Scratch Basic for Lower Secondary School</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Activity 3 – Scratch Basic for Secondary School</a>
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