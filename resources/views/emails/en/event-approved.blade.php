@component('mail::message')
    <h1>Registration Approved</h1>

    <h2>Congratulations!</h2>
    <h3><a target="_blank" href="{{env('APP_URL')}}{{$event->path()}}">Your EU Code Week activity</a> has been approved.
    </h3>

    <p>Looking for how to prepare your activity, and how to promote it? Take a look at the following resources to help
        you get started:</p>

    <ul>
        <li><a target="_blank" href="{{env('APP_URL')}}/guide">EU Code Week Activity Toolkit</a></li>
        <li><a target="_blank" href="{{env('APP_URL')}}/resources">EU Code Week Resources Page</a></li>
        <li><a target="_blank" href="{{env('APP_URL')}}/ambassadors">Ambassador’s Page</a></li>
    </ul>

    <p>If you are interested in linking your activity with those organised by friends, colleagues or other contacts,
        please find your unique Code Week 4 All code below:</p>


    <p>
        <strong>{{$event->codeweek_for_all_participation_code}}</strong>
    </p>

    <p>
        Participating in the Code Week 4 All challenge will allow you to expand your network in your community and
        across borders. Visit the <a target="_blank" href="{{env('APP_URL')}}/codeweek4all">Code Week 4 All</a>
        challenge page to learn more about how you can start sharing your code and receive a Certificate of Excellence
        for your work.
    </p>

    <p>
        Share your participation and encourage others to join the movement by downloading the #CodeWeek Participant
        Badge:
    </p>

    <div class="badge-wrapper">
        <div class="badge">
            <img src="{{asset('/img/badges/codeweek_badge_2019.png')}}">
            <span><a target="_blank" href="{{asset('/img/badges/codeweek_badge_2019.png')}}">Click here to download</a></span>
        </div>
        <p>
            Use this badge to post on your organisation or school’s website, and share it on social media to let others
            know about your involvement in EU Code Week!
        </p>
    </div>


    <br>

    <div class="social-media">
<span>
Don’t miss the latest updates. Follow #CodeWeek on social media!
</span>
        <a target="_blank" href="https://www.facebook.com/codeEU"><img src="{{asset('img/facebook_circle.png')}}"></a>
        <a target="_blank" href="https://twitter.com/search?q=%23codeweek&amp;f=realtime"><img
                    src="{{asset('img/twitter_circle.png')}}"></a>
    </div>


    <p>Are you a teacher or educator? Join the <a target="_blank"
                                                  href="https://www.facebook.com/groups/774720866253044/">EU Code Week
            Teachers</a> group on Facebook to exchange ideas, lesson plans, and have any questions answered about
        bringing Code Week to your students!</p>

    </div>

    <footer style="text-align: center;">
        <a target="_blank" href="mailto:info@codeweek.eu">Contact us</a> |
        <a target="_blank" href="{{env('APP_URL')}}/login">My Account</a> |
        <a target="_blank" href="{{env('APP_URL')}}/privacy">Privacy Policy</a> |
        <a target="_blank" href="{{env('APP_URL')}}/about">About EU Code Week</a>
    </footer>

    </div>
@endcomponent