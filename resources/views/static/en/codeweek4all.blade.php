@extends('layout.base')

@section('content')

    <section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Codeweek 4 All challenge</h1>
                        <span></span>
                    </div>

                    <hr>

                    <p>
                        The Code Week 4 All challenge encourages you to link your activities with others organised by friends, colleagues and acquaintances, and together gain the Code Week Certificate of Excellence.
                    </p>


                    <simple-question>
                        <template slot="title">What is it?</template>
                        <template slot="content">
                            <p>
                                In addition to submitting your activity to the EU Code Week map, you can also engage others in your network to do the same. If you and your alliance reach one of the following thresholds, you will all earn the Code Week Certificate of Excellence!
                            </p>
                            <p>
                                Criteria for earning the Certificate of Excellence:
                            </p>
                            <ul>
                                <li><strong>500 students participated</strong></li> And / Or
                                <li><strong>10 activities linked</strong></li> And / Or
                                <li><strong>3 countries involved</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question>
                        <template slot="title">How to participate?</template>
                        <template slot="content">
                            <ol>
                                <li>Visit the <a href="/add">Add Activity</a> page and fill in the necessary details of your coding activity.</li>
                            </ol>

                            <i>If you are the first one in your alliance:</i>
                            <ol start="2">
                                <li>Click on Submit</li>
                                <li>Once your activity has been accepted, you will receive a confirmation email with your unique Code Week 4 All code.</li>
                                <li>Copy the code and share it with your colleagues and others in your network who are also organising a coding activity. Spread the word to encourage others to participate!</li>
                                <li>After the end of the campaign, all activity organisers will be asked to report back on how many participants they have involved. If you were successful in achieving the threshold, you and your colleagues who were part of your network will receive the Certificate of Excellence!</li>
                            </ol>

                            <i>If you are joining an existing alliance:</i>
                            <ol start="2">
                                <li>Paste the passcode you received from the initiator, the first to build the alliance, into the CODE WEEK 4 ALL CODE field cell.</li>
                                <li>Click on Submit.</li>
                                <li>Spread the word (and the code!)  to get more organisers to join your alliance</li>
                                <li>After the end of the campaign, all activity organisers will be asked to report on how many participants they have involved. If you were successful in achieving the threshold, you and your colleagues who were part of your network will receive the Certificate of Excellence!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question>
                        <template slot="title">Why join the challenge?</template>
                        <template slot="content">
                            <ul>
                                <li>To spread the message on the importance of coding.</li>
                                <li>To see a large number of students get involved.</li>
                                <li>To build connections with organisations and/or schools in your community or internationally.</li>
                                <li>To find support from other organisers and teachers.</li>
                                <li>To gain a <strong>Certificate of Excellence.</strong></li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>


@endsection

@section("extra-css")
    <style>

        .tab{
            position: relative;
            margin-bottom: 1px;
            width: 100%;
            color: #232323;
            overflow: hidden;
        }

        .answer {
            padding: 20px;
            background-color: #f1f1f1;
        }

        .question{
            position: relative;
            display: block;
            width: 100%;
            padding: 0 0 0 1em;
            background: #2980b9;
            font-weight: bold;
            line-height: 3;
            cursor: pointer;
            color: #fff;
            text-align: center;
            font-size: 2rem;
        }

        .chevron{
            display: block;
            margin-top: -23px;

            padding: 10px;
        }

        ul, ol{
            margin-left: 1em;
        }



    </style>

@endsection