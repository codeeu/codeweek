@extends('layout.base')

@section('content')

    <section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Computational Thinking and problem solving</h1>
                        <span>by Miles Berry</span>
                    </div>

                    <hr>

                    <p>
                        Computational thinking (CT) describes a way of looking at problems and systems so that a computer can be used to help us solve or understand them. Computational thinking is not only essential to the development of computer programs, but can also be used to support problem solving across all disciplines.
                    </p>

                    <p>
                        You can teach CT to your students by getting them to break down complex problems into smaller ones, (decomposition), to recognize patterns (pattern recognition), to identify the relevant details for solving a problem (abstraction); or setting out the rules or instructions to follow in order to achieve a desired outcome (algorithm design). CT can be taught across different disciplines, for instance in Mathematics (figure out the rules for factoring 2nd-order polynomials), Literature (to break down the analysis of a poem into analysis of meter, rhyme, and structure), Languages (find patterns in the ending letters of a verb that affect its spelling as tense changes) and many others.
                    </p>

                    <p>
                        In this video, Miles Berry, Principal Lecturer at University of Roehampton School of Education at Guildford (United Kingdom), will introduce the concept of computational thinking and the different ways a teacher can integrate it in the classroom with simple games.
                    </p>

                    <div class="flex youtube-container">
                        <iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI">
                        </iframe>
                    </div>

                    <p>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Download the video script</a>
                    </p>

                    <h2>Ready to share what you learnt with your students?</h2>

                    <p>
                        Choose one of the lesson plans below and organize an activity with your students.
                    </p>

                    <ul>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Activity 1 – Developing Mathematical Reasoning for Primary School</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Activity 2 – Acquaintance with Algorithms for Lower Secondary School</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Activity 3 – Algorithms for Upper Secondary School</a>
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