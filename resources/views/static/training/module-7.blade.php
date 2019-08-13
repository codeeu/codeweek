@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>Tinkering and Making</h1>
                <span>by Diogo da Silva</span>

                <p>
                    Jobs and workplaces are changing and education is following in their footsteps. When preparing
                    students for 21st century careers, new skills such as tinkering, making and hacking become
                    essential, as they narrow the gap between school and reality. By transforming the classroom into
                    a collaborative environment that focuses on problem-solving, students are able to engage and
                    thrive. These activities promote discussion, thus allowing the classroom to become a
                    communication hub, where every contribution is important.
                </p>

                <p>
                    Have a look at the video below, where Portuguese STEAM teacher Diogo da Silva, a member of
                    Escola Global, takes you step by step through developing a lesson that has your students tinker,
                    make and hack their way to a solution.

                </p>

            </section>

            @include('static.youtube', ['video_id' => 'BbbLe2g-SLQ'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+7_Tinkering_and_Making_Video+script.docx">Download
                        the video script</a>
                </p>

                <h2>Ready to share what you learnt with your students?</h2>

                <p>
                    Choose one of the lesson plans below and organize an activity with your students.
                </p>

                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+7_Tinkering_and_Making_Lesson+plan+1_primary.docx">Activity 1 – Time gates: measuring speed with micro:bit</a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+7_Tinkering_and_Making_Lesson+plan+2_Lower+secondary.docx">Activity 2 – Building a conductivity-based game using
                            BBC micro:bit
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+7_Tinkering_and_Making_Lesson+plan+3_Upper+secondary.docx">Activity 3 – Building a smart luminaire
                            using micro:bit
                        </a>
                    </li>
                </ul>

                @include('static.training.footer')

            </section>

        </section>

    </section>

@endsection