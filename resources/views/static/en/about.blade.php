@extends('layout.base')

@section('content')

    <section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>ABOUT CODEWEEK</h1>
                        <span></span>
                    </div>

                    <hr>


                    <p>
                        In 2018 EU Code Week will take place between <strong>6 and 21 October</strong>.
                    </p>

                    <p>
                        EU Code Week is a grass-roots movement that celebrates creativity, problem solving and collaboration through programming and other tech activities. The idea is to make programming more visible, to show young, adults and elderly how you bring ideas to life with code, to demystify these skills and bring motivated people together to learn.
                    </p>

                    <h2>Run by volunteers</h2>

                    <p>
                        EU Code Week is run by volunteers. One, or several, <a href="/ambassadors">Code Week Ambassadors</a> coordinate the initiative in their countries, but everyone can organise their own activity and add it to the <a href="/">codeweek.eu</a> map.
                    </p>

                    <h2>Supported by the European Commission</h2>

                    <p>
                        EU Code Week was launched in 2013 by the Young Advisors for the Digital Agenda Europe. The European Commission supports EU Code Week as part of its strategy for a <a href="http://ec.europa.eu/priorities/digital-single-market/">Digital Single Market</a>. In the <a href="https://ec.europa.eu/education/initiatives/european-education-area/digital-education-action-plan_en">Digital Education Action Plan</a> the Commission especially encourages schools to join the initiative. The goal is to reach 50% of all schools in Europe by 2020.
                    </p>

                    <h2>Schools</h2>

                    <p>
                        Schools at any levels and teachers of all subjects are especially invited to participate in EU Code Week, to give the opportunity to their students to explore digital creativity and coding. Learn more about the initiative and how to organise your activity via the webpage dedicated to teachers: <a href="/schools">CodeWeek.eu/Schools</a>
                    </p>

                    <h2>Why coding?</h2>

                    <p>
                        It's about Pia, who felt like she had to study law, even though she always enjoyed maths and playing with computers. It's about Mark, who has the idea for a better social network, but can't build it on his own. It's about Alice, who dreams about making robots because her parents don't allow her to have a cat.
                    </p>

                    <p>
                        It's about those of you who are already helping these dreams come true.
                    </p>

                    <p>
                        Actually, it's about all of us. Our future. Technology is shaping our lives, but we're letting a minority decide what and how we use it for. We can do better than just sharing and liking stuff. We can bring our crazy ideas to life, build things that will bring joy to others.
                    </p>

                    <p>
                        It's never been easier to make your own app, build your own robot, or invent flying cars, why not! It's not an easy journey, but it's a journey full of creative challenges, a supportive community, and tons of fun. Are you ready to accept the challenge and become a maker?
                    </p>

                    <p>
                        Coding also helps develop competences such as computational thinking, problem solving, creativity and team work – really good skills for all walks of life.
                    </p>

                    <p>
                        Alessandro Bogliolo, coordinator of the EU Code Week team of ambassador volunteers said:
                        <blockquote>
                            <p>
                                "From the beginning of time we did many things using stone, iron, paper and pencil that have transformed our lives. Now we live in a different era where our world is moulded in code. Different eras have different jobs and skills demand. During Code Week we want to give every European the opportunity to discover coding and have fun with it. Let’s learn coding to shape our future".
                            </p>
                        </blockquote>
                    </p>

                    <h2>
                        Code Week in numbers
                    </h2>

                    <p>
                        In 2017, 1.2 million people in more than 50 countries around the world took part in EU Code Week. An additional 1.3 million young people were engaged in <a href="http://africacodeweek.org/">Africa Code Week</a>, which is a spin-off initiative run by SAP and non-for profit organisations.
                    </p>

                    <p>
                        If your country is not involved yet, you can organise activities and put them on the <a href="/events">map</a> or <a href="mailto:info@codeweek.eu">volunteer</a> as a Code Week ambassador.
                    </p>

                    <div class="container clearfix">
                        <div class="col_half" id="PeopleChart" style="opacity: 0;width: 100%;text-align: center">
                            <h3 class="center">Participants</h3>
                            <canvas id="PeopleChartCanvas" style="width: 70%;height:400px;"></canvas>
                        </div>
                    </div>


                    <h2>Join EU Code Week</h2>

                    <p>
                        Join EU Code Week by <a href="/guide">organising a coding activity</a> in your town, joining the <a href="/codeweek4all">Code Week 4 All Challenge</a> and connecting activities across communities and borders, or helping us spread the vision of Code Week as an <a href="/ambassadors">EU Code Week Ambassador</a> for your country!
                    </p>


                </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts')
    <script type="text/javascript">
        $(function($){

            var peopleChartData = {
                labels: ["2013", "2014", "2015", "2016", "2017"],
                datasets: [
                    {
                        fillColor: "rgba(60, 161, 206, 0.61)",
                        strokeColor: "rgba(220,220,220,1)",
                        data: [10000, 150000, 570000, 970000, 1200000]
                    }
                ]

            };

            var globalGraphSettings = {animation: Modernizr.canvas};


            function showBarChart() {
                var ctx = document.getElementById("PeopleChartCanvas").getContext("2d");
                new Chart(ctx).Bar(peopleChartData, globalGraphSettings);
            }


            $('#PeopleChart').appear(function () {
                $(this).css({opacity: 1});
                setTimeout(showBarChart, 300);
            }, {accX: 0, accY: -155}, 'easeInCubic');



        });

    </script>
@endpush