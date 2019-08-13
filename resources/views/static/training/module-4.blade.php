@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>Creating educational games with Scratch</h1>
                <span>by Jesús Moreno León</span>

                <p>
                    Critical thinking, persistence, problem solving, computational thinking and creativity are only some of the key skills that your students need to succeed in the 21st century, and coding can help you achieve these in a fun and motivating way.
                </p>

                <p>
                    Algorithmic notions of flow control using sequences of instructions and loops, data representation using variables and lists, or synchronization of processes might sound like complicated concepts, but in this video you will find that they are easier to learn than you think.
                </p>

                <p>
                    In this video, Jesús Moreno León, a Computer Science teacher and researcher from Spain, will explain how you can develop these and other skills in your students while having fun. How can this be done? By creating a questions and answers game in Scratch, the most popular programming language used at schools worldwide. Scratch not only enhances computational thinking, but it also allows the introduction of gamification elements in the classroom to keep your students motivated while learning and having fun.
                </p>

                <p>
                    Have a look at the video to learn how to get started:
                </p>

            </section>

            @include('static.youtube', ['video_id' => 'M1zJOfmriGU'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Download the video script</a>
                </p>

                <h2>Ready to share what you learnt with your students?</h2>

                <p>
                    Choose one of the lesson plans below and organize an activity with your students.
                </p>

                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Activity 1 - Questions and answers game with Scratch for Primary School</a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Activity 2 - Questions and answers game with Scratch for Lower Secondary School</a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Activity 3 - Questions and answers game with Scratch for Secondary School</a>
                    </li>
                </ul>

                @include('static.training.footer')

            </section>

        </section>

    </section>

@endsection