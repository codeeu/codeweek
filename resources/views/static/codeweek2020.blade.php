@extends('layout.base')

@section('content')

    <section id="codeweek-about-page" class="codeweek-page">

        <section class="codeweek-banner scoreboard">
            <div class="text">
                <h2>EU Code Week</h2>
                <h1>2020 Edition</h1>
            </div>
            <div class="image">
                <img src="images/banner_scoreboard.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <div class="codeweek-about-white-box" style="line-height: 22px;font-size: larger">

                <div>
                    This year we celebrate coding from 10 to 25 of October and due to the health situation our aim is to
                    bring more Code Week activities online. We launch new fun and engaging activities that you can do
                    and join remotely at home or in school.
                </div>

            </div>

            <div class="codeweek-about-blue-box" style="line-height: 22px;">

                <h2>Featured open online activities</h2>
                <div>
                    To make it easier to take part in Code Week activities remotely we are launching a <a href="{{route("online_calendar")}}">calendar</a> of
                    featured online activities.
                </div>
                <h3>
                    What is an online activity?
                </h3>
                <div>
                    An online activity can be any activity you would normally register on the Code Week website, but it
                    takes place online and is open to the public. The idea is to make it easy for people to participate
                    in coding sessions and workshops entirely online without risking their health.
                </div>

                <h3>
                    Featured open activities
                </h3>
                <div>
                    If you want, you can open your online activities to anyone. People from around the world will be
                    able to take part in your activity either in English or in your local language. We will select the
                    most attractive open online activities and feature them in a prominent calendar on the website.
                </div>

                <h3>
                    What this means for participants
                </h3>
                <div>
                    This means that every day of Code Week you can browse through the <a href="{{route("online_calendar")}}">calendar</a> and take part in the
                    activities that interest you. The topics of these featured events vary from workshops on robotics,
                    e-learning courses, webinars, coding tutorials and much more. So, take your pick!
                </div>

            </div>
            <div class="codeweek-about-white-box" style="line-height: 22px;">

                <h2>Code Week Dance</h2>
                <div>
                    Who said programmers couldn't dance? To celebrate the 2020 edition of Code Week, we are launching a
                    new activity - the #CodeWeekDance challenge.
                </div>

                <h3>
                    Who can join?
                </h3>
                <div>
                    Everyone - schools, libraries, code clubs, businesses, public authorities - is invited to celebrate
                    EU Code Week 2020 by organising a #CodeWeekDance activity and adding it to the <a href="{{route("events_map")}}">Code Week map</a>.<br/>Find
                    out more on the organiser’s guide or keep reading.
                </div>

                <h3>
                    How to participate?
                </h3>
                <div>
                    Choose from five types of activities or come up with your own. Regardless of which activity you
                    choose, don't forget to add it to our map.
                </div>

                <h4>1. Programme a friend or a parent - no computer needed </h4>

                <div>
                    Coding lets you give commands to an electronic device. But technically, you don’t need a computer to
                    be able to code. Instead, grab a partner – it can be your classmate, a friend, a parent or even a
                    teacher, and give them instructions how to perform the #CodeWeekDance, which they need to follow
                    precisely.<br/>

                    <h4>Resources you will need:</h4>
                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                        <li><a href="http://www.codeweek.it/ode-to-code/">The Code Week soundtrack</a></li>
                        <li>The #CodeWeekDance moves</li>
                        <li><a href="https://curriculum.code.org/hoc/unplugged/4/#dance-party-unplugged4">A guide by Code.org to organise your unplugged Dance Party</a></li>
                        <li><a href="{{route("training.module-1")}}">A learning bit on how to program your human-robot</a></li>
                        <li>An example of the Code Week Dance</li>
                    </ul>

                    <h4>2. Visual Programmming</h4>

                    <div>Code your Code Week dance in Scratch. Use the Code Week characters or make your own in Scratch
                        and programme them to do the #CodeWeekDance.
                    </div>
                    <h4>Resources you will need:</h4>
                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                        <li><a href="http://www.codeweek.it/ode-to-code/">The Code Week soundtrack</a></li>
                        <li>The #CodeWeekDance moves</li>
                        <li>An example of #CodeWeekDance in Scratch</li>
                        <li>The Code Week characters</li>
                        <li>A guide from Code.org on how to animate a character</li>
                        <li><a href="https://curriculum.code.org/hoc/plugged/8/">A guide by Code.org to organise your Dance Party</a></li>
                    </ul>

                    <h4>3. Text-based programming</h4>
                    <div>
                        Produce the #CodeWeekDance theme with Python or JavaScript, using code-based music creation
                        platforms like EarSketch or Sonic Pi.
                    </div>
                    <h4>Resources you will need:</h4>
                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                        <li><a href="http://www.codeweek.it/ode-to-code/">The Code Week soundtrack</a></li>
                        <li>Any of the free tools available, e.g. <a href="https://sonic-pi.net/">Sonic Pi</a>, <a href="https://earsketch.gatech.edu/landing/#/">Earsketch</a></li>
                        <li>A lesson plan on how to start creating music with Sonic Pi</li>
                    </ul>

                    <h4>4. Robotics</h4>
                    <div>
                        Program your robot to perform the Code Week Dance following your instructions.
                    </div>
                    <h4>Resources you will need:</h4>
                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                        <li><a href="http://www.codeweek.it/ode-to-code/">The Code Week soundtrack</a></li>
                        <li>The #CodeWeekDance moves</li>
                        <li>An example of the Code Week Dance</li>
                        <li>A tutorial on programming robots</li>
                    </ul>

                    <h4>5. Live Dance Challenge</h4>
                    <div>
                        Record a video of yourself, your team or your robot performing the #CodeWeekDance, share it on
                        Instagram and get a shot at going viral and winning some Code week goodies! Interested? Follow
                        these steps:
                    </div>

                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                        <li>Record the video using Instagram Stories</li>
                        <li>Follow <a href="https://www.instagram.com/codeweekeu/">@CodeWeekEU on Instagram</a></li>
                        <li>Mention @CodeWeekEU in your story with the dance and make sure to use the hashtag
                            #CodeWeekDance
                        </li>
                    </ul>

                    <div>Winners will be selected every day and announced on our Instagram channel via Stories, so don't
                        forget to check your notifications regularly, you might just run into good luck today.

                    <br/>
                    <br/>
                        The #CodeWeekDance is based on the <a href="http://www.codeweek.it/ode-to-code/">Ode to Code</a>, composed by Brendan Paolini, and the dance developed by Bianca Maria Berardi in 2015, from an idea of Alessandro Bogliolo, Professor of Computer Systems at the University of Urbino.
                    </div>

                </div>

            </div>

            <div class="codeweek-about-blue-box" style="line-height: 22px;">
                <h2>Code Week Treasure Hunt</h2>
                <p>
                    We are bringing a new experience to the 2020 Code Week with a game on Telegram that is simple enough
                    for beginners, but also challenging to keep experienced participants on their toes.
                    <br/>
                    <br/>
                    <a href="{{route('code-hunting-game')}}">The Code Week Treasure Hunt</a> is a game you play best on your PC with a mobile phone in hand. The game
                    will ask you to solve coding challenges and it will guide you through the history of coding,
                    computer science and technology in Europe.
                </p>

                <h4>To start playing you need to:</h4>
                <ol style="margin-left:10px; margin-top:0px;">
                    <li>Download the Telegram app. It is available for Desktop (Windows, macOS and Linux), iOS and
                        Android.
                    </li>
                    <li>You can play the game either on your PC or laptop, or on your smartphone. We recommend you play
                        it on your computer so that you can get the instructions and solve the coding challenges on the
                        Telegram app on your phone.
                    </li>
                    <li>To play the game, <a href="{{route('code-hunting-game')}}">open the game</a> and scan the QR code that will take you to the Telegram app and
                        give you the first set of instructions.
                    </li>
                    <li>To win, you need to solve 10 coding challenges and find 10 locations on the map of Europe that
                        are linked to the rise of coding and technology.
                    </li>
                    <li>After you complete the game, share your accomplishment, use #CodeWeek and challenge your friends
                        to play and learn about the history of coding too. Let’s see who scores the top results!
                    </li>
                </ol>

                <div>
                    The Code Week Treasure Hunt is the 2020 virtual version of the original EU Code Week Treasure Hunt,
                    developed by Alessandro Bogliolo, Professor of Computer Systems at the University of Urbino. To
                    learn more about the original game, visit our <a href="https://blog.codeweek.eu">blog</a>.
                </div>

            </div>

            <div class="codeweek-about-white-box" style="line-height: 22px;">
                <h2>Kick-off event: 8 October 2020</h2>
                <div style="margin-top:10px">
                    The Code Week 2020 virtual kick-off is set for 8 October. It will be streamed on Facebook Live and
                    YouTube.<br/><br/>

                    It will feature <a href="https://ec.europa.eu/commission/commissioners/2019-2024/breton_en">Thierry Breton</a>, EU Commissioner for the Internal Market; <a href="https://ec.europa.eu/commission/commissioners/2019-2024/gabriel_en">Mariya Gabriеl</a>, EU
                    Commissioner for Innovation, Research, Culture, Education and Youth; <a href="https://www.media.mit.edu/people/mres/overview/">Mitch Resnick</a>, Creator of
                    Scratch and Professor of Learning Research at the MIT Media Lab; <a href="http://lindaliukas.com/">Linda Liukas</a>, author and
                    illustrator of Hello Ruby; and <a href="https://www.wef.org.in/dipty-chander/">Dipty Chander</a>, President of E-MMA French non-profit organisation that
                    promotes gender diversity in tech.<br/><br/>

                    At the kick-off the Code Week team will also showcase new website features. <a href="https://www.linkedin.com/in/alessandro-bogliolo-a8395b29">Alessandro Bogliolo</a>,
                    Professor of Computer Systems at the University of Urbino and coordinator of the Code Week
                    <a href="{{route("ambassadors")}}">ambassadors</a> will tell you more about the Code Week Dance Challenge.<br/><br/>

                    Members of the EU Code Week Community and will introduce new local and global (or as we like to call
                    it - glocal) activities. We will also connect with schools and students from all over Europe to hear
                    their coding stories and interact with the guest speakers<br/><br/>

                    You will be also able to share your thoughts, ideas and ask your questions. All you need to do is
                    tune in for our live stream on <a href="https://www.facebook.com/codeEU/">Facebook</a> or <a href="https://www.youtube.com/channel/UCw30ZaWtCvGb4yudW6tCXAA">YouTube</a> on 8 October 2020 at 17:00-18.30 CET and comment
                    or tweet with the #CodeWeek hashtag.</div>
            </div>

            <div class="codeweek-about-blue-box" style="line-height: 22px;">
            <h2>How to get involved ?</h2>
                <div>
                    Are you excited about this year’s edition yet? If you’d like to join the EU Code Week community but don’t know where to start, take a look at these resources that will help get you started, just in time for our annual celebration in October.
                </div>

                <ul style="list-style-type: circle;margin-left:40px; margin-top:20px;">
                    <li><a href="https://blog.codeweek.eu/getting-started-with-eu-code-week/">Getting started with Code Week</a></li>
                    <li><a href="{{route("guide")}}">How to add a Code Week activity</a></li>
                    <li><a href="{{route("training.index")}}">Learning bits</a></li>
                    <li><a href="https://bit.ly/DEEPDIVE2020">A tutorial on programming robotsDeep Dive massive open online course</a></li>
                    <li><a href="{{route("coding@home")}}">Coding@Home series</a></li>
                </ul>
            </div>
        </section>


    </section>

@endsection
