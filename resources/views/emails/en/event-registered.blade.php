<html>

    <header>

        <link rel="stylesheet" href="{{asset('css/mail.css')}}" type="text/css" />

    </header>

    <body>

        <div class="container-wrapper">

            <div class="logo">
                <a target="_blank" href="http://codeweek.eu" class="standard-logo"><img src="/img/codeweekeu.png" alt="CodeWeek"></a>
            </div>

            <div class="mail-content">

                <h1>Registration Received</h1>

                <h2>Thank you for registering <a target="_blank" href="http://codeweek.eu{{$event->path()}}">your activity</a> for EU Code Week!</h2>

                <p>The EU Code Week ambassadors in your country are currently reviewing your submission. You will receive an email confirming the approval of your activity in the next few days.</p>
                <p>In the meantime, are you interested in learning more about coding or looking for some inspiration for preparing your #CodeWeek activity?</p>
                <ul>
                    <li>
                        <p>
                            Visit the resources page of the EU Code Week website:
                            <a target="_blank" href="http://codeweek.eu/resources/">http://codeweek.eu/resources/</a>
                        </p>
                    </li>
                </ul>

                <p>Want to take a step further and take on the Code Week 4 All challenge?</p>

                <ul>
                    <li>
                        <p>
                            <strong><a target="_blank" href="http://codeweek.eu/codewee4all/">Click here</a></strong>
                            to find out more about how to connect with other activities in your community and internationally. You can together earn a Code Week Certificate of Excellence!
                        </p>
                    </li>
                </ul>

                <br>

                <div class="social-media">
                    <span>
                        Don’t miss the latest updates. Follow #CodeWeek on social media!
                    </span>
                    <a target="_blank" href="https://www.facebook.com/codeEU"><img src="{{asset('img/facebook_circle.png')}}"></a>
                    <a target="_blank" href="https://twitter.com/search?q=%23codeEU&amp;f=realtime"><img src="{{asset('img/twitter_circle.png')}}"></a>
                </div>


                <p>Are you a teacher or educator? Join the <a target="_blank" href="">EU Code Week Teachers</a> group on Facebook to exchange ideas, lesson plans, and have any questions answered about bringing Code Week to your students!</p>

            </div>

            <footer style="text-align: center;">
                <a target="_blank" href="mailto:info@codeweek.eu">Contact us</a> |
                <a target="_blank" href="http://codeweek.eu/login">My Account</a> |
                <a target="_blank" href="http://codeweek.eu/privacy">Privacy Policy</a> |
                <a target="_blank" href="http://codeweek.eu/about">About EU Code Week</a>
            </footer>

        </div>

    </body>

</html>