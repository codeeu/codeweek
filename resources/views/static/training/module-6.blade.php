@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>App Inventor and App Development</h1>
                <span>by Rosanna Kurrer</span>

                <p>
                    Have a look at this video where Rosanna Kurrer, (Founder of <a href="https://www.cyberwayfinder.com">CyberWayFinder</a>) explains what App Inventor is, goes through the advantages of using App development in the classroom and gives some practical examples on how teachers can integrate App Inventor in the classroom, transforming passive students into enthusiastic game makers.
                </p>

                <p>
                    We all use applications as they are a convenient and fast way to coordinate our activities. They are also more and more used in education as they allow personalised learning and enable users to acquire information, so why not empower your students to build an educational app for others?
                </p>

            </section>

            @include('static.youtube', ['video_id' => 'L9xJMhKAJok'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+6_Developing+creative+thinking+through+mobile+app+development_videoscript.docx">Download the video script</a>
                </p>

                <h2>Ready to share what you learnt with your students?</h2>

                <p>
                    Choose one of the lesson plans below and organize an activity with your students.
                </p>

                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+6_+Developing+creative+thinking+through+mobile+app+development_+Lesson+plan1_primary.docx">Activity 1 – My First HelloWorld! Mobile App</a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+6_+Developing+creative+thinking+through+mobile+app+development_+Lesson+plan2_Lower+secondary.docx">Activity 2 – Drawing with Shapes App - Using Geometrical shapes and
                            Math equations to draw
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+6_+Developing+creative+thinking+through+mobile+app+developmentr_+Lesson+plan3_Upper+secondary.docx">Activity 3 – TranslateMe App - Using Voice Computing blocks and the Yandex Translation Service</a>
                    </li>
                </ul>

                @include('static.training.footer')

            </section>

        </section>

    </section>

@endsection