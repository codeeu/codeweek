@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="codeweek-banner about">
            <div class="text">
                <div class="text-5xl text-white">EU CODE WEEK CHALLENGES</div>
                <h2>9-24 October 2021</h2>
            </div>
            <div class="image">
                <img src="/images/banner_about.svg" class="static-image">

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
                        <div class="shadow-xl">
                            <a href="{{route('challenges.dance')}}">
                                <img src="/img/learning/coding-for-inclusion.png">
                                <div class="orange p-2 bg-gray-100 text-xl">Create a dance</div>
                            </a>
                        </div>
                        <div class="shadow-xl">
                            <a href="{{route('challenges.song')}}">
                                <img src="/img/learning/creating-educational-games-with-scratch.png">
                                <div class="orange p-2 bg-gray-100 text-xl">Compose a song</div>
                            </a>
                        </div>
                        <div class="shadow-xl">
                            <a href="{{route('challenges.game')}}">
                                <img src="/img/learning/mining-media-literacy.png">
                                <div class="orange p-2 bg-gray-100 text-xl">Make a video sensing animation or game</div>
                            </a>
                        </div>
                        <div class="shadow-xl">
                            <a href="{{route('challenges.chatbot')}}">
                                <img src="/img/learning/tinkering-and-making.png">
                                <div class="orange p-2 bg-gray-100 text-xl">Make a chatbot</div>
                            </a>
                        </div>
                        <div class="shadow-xl">
                            <a href="{{route('challenges.paper-circuit')}}">
                                <img src="/img/learning/coding-without-computers.png">
                                <div class="orange p-2 bg-gray-100 text-xl">Unplug and code: Create a paper circuit
                                </div>
                            </a>
                        </div>

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
                                Team up your participants in pairs or groups. Teamwork and collaboration are key for the successful completion of a challenge whether you organise your activity in-person or online as a national or international collaborative activity.
                            </li>
                        </ul>


                    </div>

                    <div class="mt-6 orange text-3xl">
                        Share your challenge
                    </div>
                    <div class="leading-6 text-base text-left">

                        <div class="leading-6 text-base text-left mt-2">
                            Would you like to win some Code Week goodies? If yes, then let your work go viral. After you
                            have completed the challenge, share it on Instagram. Follow @CodeWeekEU on Instagram and
                            mention @CodeWeekEU. Make sure to use the hashtag #CodeWeekChallenge.
                        </div>

                        <div class="leading-6 text-base text-left mt-2">
                            Winners will be selected every day during Code Week between 9 – 24 October, and announced on
                            our Instagram channel, so don't forget to check your notifications regularly.
                        </div>

                    </div>

                    <div class="mt-6 orange text-3xl">
                        Why take part in an EU Code Week challenge?
                    </div>
                    <div class="leading-6 text-base text-left">
                        <ul class="list-disc ml-6 mt-2">
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
