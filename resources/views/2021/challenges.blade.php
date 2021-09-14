@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        {{--        <section class="codeweek-banner about">--}}
        {{--            <div class="text">--}}
        {{--                <div class="text-5xl text-white">EU CODE WEEK CHALLENGES</div>--}}
        {{--                <h2>9-24 October 2021</h2>--}}
        {{--            </div>--}}
        {{--            <div class="image">--}}
        {{--                <img src="/images/banner_about.svg" class="static-image">--}}

        {{--            </div>--}}

        {{--        </section>--}}

        <section class="flex flex-row justify-between" style="background-color: #908CA5">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full">

                        <div class="text-5xl text-white">EU CODE WEEK CHALLENGES</div>
                        <div class="text-3xl text-yellow-200">9-24 October 2021</div>
                    </div>
                </div>
            </div>

            <div class="md:w-full md:flex hidden">
                <img src="{{asset('img/2021/challenges/main-banner.png')}}">

            </div>


        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                <div class="leading-6">
                    <p class="text-xl text-left text-blue-600">During EU Code Week, 9 - 24 October 2021, we invite
                        you to do one or more of the EU Code Week challenges.</p>
                </div>

                <div class="orange text-3xl">
                    What are the EU Code Week 2021 Challenges?
                </div>

                <div class="leading-6 text-base text-left">
                    <p>
                        EU Code Week Challenges are activities that you can do on your own, in the classroom, with
                        colleagues or friends. You would like to participate in Code Week but do not really have an idea
                        of what to organize? Look no further! We have designed along with Code Week partners a selection
                        of easy to make challenges, that include concrete examples of how to use it in a classroom or
                        group. There are also guidelines on how to complete the challenges, but you can adapt them so
                        that they suit the needs, interests and age of your participants. You can use whatever tools and
                        technologies you like, but we recommend open-source resources.
                    </p>
                    <p>
                        Choose one or several challenges, adapt it to your group or your classroom, and share the
                        results on Instagram to encourage even more colleagues and friends to engage in the Code Week
                        fun!
                    </p>
                    <p>
                        Click on the challenge to find out more about it:
                    </p>


                    <section class="grid grid-cols-1 gap-6 md:grid-cols-3">


                        @include('2021._thumbnail', [
    'route'=>'challenges.chatbot',
    'image'=>'chatbot',
    'title'=>'Make a chatbot',
    'author'=>'EU Code Week Team',
])

                        @include('2021._thumbnail', [
'route'=>'challenges.paper-circuit',
'image'=>'paper-circuit',
'title'=>'Unplug and code: Create a paper circuit',
'author'=>'EU Code Week Team',
])


                        @include('2021._thumbnail', [
'route'=>'challenges.dance',
'image'=>'dance',
'title'=>'Create a dance',
'author'=>'EU Code Week Team',
])

                        @include('2021._thumbnail', [
'route'=>'challenges.song',
'image'=>'compose-song',
'title'=>'Compose a song',
'author'=>'EU Code Week Team',
])

                        @include('2021._thumbnail', [
'route'=>'challenges.sensing-game',
'image'=>'sensing-game',
'title'=>'Make a video sensing animation or game',
'author'=>'EU Code Week Team',
])

                        @include('2021._thumbnail', [
'route'=>'challenges.ai-hour-of-code',
'image'=>'ai-hour-of-code',
'title'=>'AI hour of Code',
'author'=>'Minecraft Education Edition',
])

                        @include('2021._thumbnail', [
'route'=>'challenges.calming-leds',
'image'=>'calming-leds',
'title'=>'Calming LEDs: create a simple device with micro:bit',
'author'=>'Micro:bit Educational Foundation',
])

                        @include('2021._thumbnail', [
'route'=>'challenges.computational-thinking-and-computational-fluency',
'image'=>'computational-thinking-and-computational-fluency',
'title'=>'Computational Thinking and Computational Fluency with ScratchJr.',
'author'=>'Stamatis Papadakis – EU Code Week Ambassador Greece',
])

                        @include('2021._thumbnail', [
'route'=>'challenges.create-a-dance',
'image'=>'create-a-dance',
'title'=>'Create a dance with the Ode to Code!',
'author'=>'Code.org',
])

                        @include('2021._thumbnail', [
'route'=>'challenges.create-a-simulation',
'image'=>'create-a-simulation',
'title'=>'Create a simulation!',
'author'=>'Code.org',
])

                        @include('2021._thumbnail', [
'route'=>'challenges.create-your-own-masterpiece',
'image'=>'create-your-own-masterpiece',
'title'=>'Create your own masterpiece!',
'author'=>'Code.org',
])


                    </section>

                </div>

                <section>
                    <div class="mt-8 orange text-3xl">
                        Who can join?
                    </div>
                    <div class="leading-6 text-base text-left mt-2">
                        Everyone (schools, teachers, libraries, code clubs, businesses, public authorities) is invited
                        to celebrate EU Code Week 2021 by completing a #CodeWeekChallenge.
                    </div>
                </section>

                <section>
                    <div class="mt-6 orange text-3xl">
                        How to participate in the EU Code Week 2021 Challenge?
                    </div>
                    <div class="leading-6 text-base text-left">
                        <ul class="list-decimal ml-6 mt-2">
                            <li>
                                Select a challenge you would like to complete.
                            </li>
                            <li>
                                Team up your participants in pairs or groups. Teamwork and collaboration are key for the
                                successful completion of a challenge whether you organise your activity in-person or
                                online as a national or international collaborative activity.
                            </li>
                        </ul>


                    </div>

                    <div class="mt-6 orange text-3xl">
                        Share your challenge
                    </div>
                    <div class="leading-6 text-base text-left">

                        <div class="leading-6 text-base text-left mt-2">
                            Would you like to win some Code Week goodies? If yes, then let your work go viral!<br>

                            After you have completed the challenge, share it on Instagram.<br/>

                            Winners will be selected every day during Code Week between 9 – 24 October and announced on
                            our Instagram channel, so don't forget to check your notifications regularly.<br/>

                        </div>

                        <div class="leading-6 text-base text-left mt-2">
                            <strong>How to share your challenge(s) on Instagram?</strong>

                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>Tap the Edit profile button</li>
                                <li>Add the link of your work in the Website field and save</li>
                                <li>Create a new post</li>
                                <ul class="leading-7 ml-6 mt-0 sub-checklist">
                                    <ol>
                                        <li>Add a screenshot of your work</li>
                                        <li>Write an engaging description</li>
                                        <li>Make sure to specify ‘Link in Bio’</li>
                                        <li>Add the #CodeWeekChallenge</li>
                                        <li>Mention and tag @CodeWeekEU</li>
                                    </ol>
                                    </li>
                                </ul>
                        </div>

                        <div class="leading-6 text-base text-left mt-2">

                            <strong>You prefer to share your challenge(s) on Facebook?</strong><br/>
                            <div class="mt-2">
                                EU Code Week will pin a new Challenge post on their Facebook page (link to FB page)
                                every day and will select the winner for the prize from the comments under the
                                post.<br/>

                                    How does it work?
                                <ul class="leading-7 ml-2 mt-0 checklist">
                                    <li>
                                        Simply comment on the post with the link to your work.
                                    </li>
                                </ul>


                            </div>
                        </div>


                        <div class="leading-6 text-base text-left mt-2">

                        </div>

                        <div class="leading-6 text-base text-left mt-2">

                        </div>

                        <div class="leading-6 text-base text-left mt-2">

                        </div>

                        <div class="leading-6 text-base text-left mt-2">

                        </div>

                    </div>

                    <div class="mt-6 orange text-3xl">
                        Why take part in an EU Code Week challenge?
                    </div>
                    <div class="leading-6 text-base text-left">
                        <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                            <li>
                                To engage in problem solving and coding activities.
                            </li>
                            <li>
                                To work together with peers.
                            </li>
                            <li>
                                To spread the message on the importance of coding.
                            </li>
                        </ul>


                    </div>
                </section>

            </div>
        </section>


    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '• ';
            color: #ee6a2c;
            font-weight: bold;
        }

        ul.sub-checklist li:before {
            content: '- ';
            color: #9d5025;
            font-weight: bold;
        }
    </style>
@endsection
