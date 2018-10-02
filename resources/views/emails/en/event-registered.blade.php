<html>

    <header>

        <style>
            body{
                background-color: #f5f8fa;
                display: flex;
                justify-content: center;
                margin:0;
                font-family: Avenir, Helvetica, sans-serif;
                color: #74787E;
            }

            .container-wrapper{
                width: 620px;
                background-color: #FFFFFF;
                margin-top: 10px;
            }

            h1{
                color: #2F3133;
                font-size: 20px;
                font-weight: bold;
                margin-top: 0;
            }

            h2{
                color: #2F3133;
                font-size: 18px;
                font-weight: bold;
                margin-top: 0;
            }

            h3{
                color: #2F3133;
                font-size: 16px;
                font-weight: bold;
                margin-top: 0;
            }

            p{
                font-size: 16px;
                line-height: 1.5em;
                margin-top: 0;
            }

            ul{
                box-sizing: border-box;
                line-height: 1.4;
            }

            a{
                color: #3869D4;
            }

            .logo{
                height:60px;
                border-bottom: 1px solid lightgrey;
                text-align: center;
            }

            .logo img{
                height: 60px;
            }

            .mail-content{
                padding: 35px;
            }

            .social-media{
                display: flex;
                margin-bottom: 16px;
                align-items: center;
            }

            .social-media span{
                margin-right:5px;
            }

            footer{
                height: 30px;
                padding: 10px;
                border-top: 1px solid lightgrey;
            }

            footer a{
                font-size:14px;
            }

            .badge-wrapper{
                display: flex;
                align-items: center;
            }

            .badge{
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-right: 15px;
            }

            .badge img{
                width: 128px;
            }

            .badge span {
                font-size: 12px;
            }
        </style>


    </header>

    <body>

        <div class="container-wrapper">

            <div class="logo">
                <a target="_blank" href="{{env('APP_URL')}}" class="standard-logo"><img src="{{asset('img/codeweekeu.png')}}" alt="CodeWeek"></a>
            </div>

            <div class="mail-content">

                <h1>Registration Received</h1>

                <h2>Thank you for registering <a target="_blank" href="{{env('APP_URL')}}{{$event->path()}}">your activity</a> for EU Code Week!</h2>

                <p>The EU Code Week ambassadors in your country are currently reviewing your submission. You will receive an email confirming the approval of your activity in the next few days.</p>
                <p>In the meantime, are you interested in learning more about coding or looking for some inspiration for preparing your #CodeWeek activity?</p>
                <ul>
                    <li>
                        <p>
                            Visit the resources page of the EU Code Week website:
                            <a target="_blank" href="{{env('APP_URL')}}/resources/">{{env('APP_URL')}}/resources/</a>
                        </p>
                    </li>
                </ul>

                <p>Want to take a step further and take on the Code Week 4 All challenge?</p>

                <p>If you are interested in linking your activity with those organised by friends, colleagues or other contacts, please find your unique Code Week 4 All code below:</p>

                <p>
                    <strong>{{$event->codeweek_for_all_participation_code}}</strong>
                </p>




                <ul>
                    <li>
                        <p>
                            <strong><a target="_blank" href="{{env('APP_URL')}}/codeweek4all/">Click here</a></strong>
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
                    <a target="_blank" href="https://twitter.com/search?q=%23codeweek&amp;f=realtime"><img src="{{asset('img/twitter_circle.png')}}"></a>
                </div>


                <p>Are you a teacher or educator? Join the <a target="_blank" href="https://www.facebook.com/groups/774720866253044/">EU Code Week Teachers</a> group on Facebook to exchange ideas, lesson plans, and have any questions answered about bringing Code Week to your students!</p>

            </div>

            <footer style="text-align: center;">
                <a target="_blank" href="mailto:info@codeweek.eu">Contact us</a> |
                <a target="_blank" href="{{env('APP_URL')}}/login">My Account</a> |
                <a target="_blank" href="{{env('APP_URL')}}/privacy">Privacy Policy</a> |
                <a target="_blank" href="{{env('APP_URL')}}/about">About EU Code Week</a>
            </footer>

        </div>

    </body>

</html>