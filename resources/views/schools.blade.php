@extends('layout.base')

@section('content')


    <section>


        <div class="container">




            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Schools: bring Code Week to your students</h1>
                        <span></span>
                    </div>


                </div>

                @foreach($questions as $question)
                    <question :question="{{json_encode($question)}}"></question>
                @endforeach

                <h2><span>Why should you bring coding to your classroom?</span> How can coding benefit your students?
                    What is in it for you as a teacher ?</h2>

                <p>We believe anybody’s <b>basic literacy in a digital age</b> must include an understanding of <b>coding</b>
                    and the development of crucial competences related to <b>computational thinking</b>, such as problem
                    solving, collaboration and analytical skills.</p>
                <p>Learning how to code can empower your students to be at the forefront of a digitally competent
                    society, develop a better understanding of the world that surrounds them and get better chances to
                    succeed in their personal and professional lives.</p>
                <p>Code Week offers all students the possibility to make their first steps as digital creators, by
                    providing schools and teachers free professional development opportunities, teaching materials,
                    international challenges and opportunities to exchange.</p>


                <div class="flex align-center justify-center">
                    <div class="btn btn-primary btn-directional btn-lg submit-button-wrapper">
                        <input type="submit" value="Want to get started right away ? Sign up here!">
                    </div>
                </div>


                <h2><span>Ready to get involved ?</span> Organise a lesson, a training session, or an event, and pin it
                    on the map.</h2>

                <p>Whether you have any coding or programming knowledge or not, you can easily organise a lesson in your
                    classroom, an open day, or an event at your school. Just find a date and register your activity in
                    the map below. If you feel like you need support with preparing a lesson with coding, skip to the
                    next section.</p>
                <p>Have a look at some examples of activities that are being organised browsing the map below and add
                    your own to join thousands of fellow educators across Europe and beyond:</p>

                <h1>MAP </h1>

                <div class="flex align-center justify-center">
                    <div class="btn btn-primary btn-directional btn-lg submit-button-wrapper">
                        <input type="submit" value="Ready to give it a go? Add an activity!">
                    </div>
                </div>

                <h2><span>New to Coding? No worries</span> Our tools help introduce you to coding before bringing it to
                    your students</h2>

                <p>If you are interested in bringing coding to your classroom but you don´t know where to start, do not
                    worry! An international team of teachers and experts have been developing a set of short online
                    training modules to help get you started. </p>
                <p>No previous experience of coding is needed to follow our learning bits!</p>

                <div class="flex align-center justify-center">
                    <div class="btn btn-primary btn-directional btn-lg submit-button-wrapper">
                        <input type="submit" value="Access the training modules">
                    </div>
                </div>


                <h2><span>Looking for an extra challenge ?</span> Build a network of activities, engage as many students
                    as possible, and earn the Certificate of Excellence</h2>
                <p>Code Week 4 All challenges you to join forces with other teachers or schools and participate in an
                    international community of like-minded people giving to student the opportunity to make their first
                    steps in coding. Build an alliance that engages more than a 1 000 students and you will gain the
                    Certificate of Excellence.</p>

                <div class="flex align-center justify-center">
                    <div class="btn btn-primary btn-directional btn-lg submit-button-wrapper">
                        <input type="submit" value="Learn more about the Code Week 4 All challenge">
                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection

@section("extra-css")
    <style>

        .submit-button-wrapper.btn-lg input {

            padding: 15px 15px 15px 30px;
            background: transparent;
            border: none;
            text-transform: none;
            letter-spacing: 2px;
        }

        .btn-primary, .btn-primary:hover {
            background: #f58732ed;
        }
    </style>

@endsection