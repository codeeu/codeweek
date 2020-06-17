@component('mail::message')
    <h1>Registration Deferred</h1>

    <h2>Thank you for submitting your activity <a target="_blank" href="{{env('APP_URL')}}{{$event->path()}}">your
            activity</a> for EU Code Week!</h2>

    <p>Unfortunately, the EU Code Week ambassadors in your country were not able to approve your submission. This could
        be because there was some question about the content of your application, or more information is needed.</p>

    <p>If you feel that this decision was made in error, please feel free to visit your application, edit any details
        necessary and resubmit via the following link: https://codeweek.eu/my </p>

    <p>If you have any other questions, do not hesitate to contact the Ambassador in your country.</p>

    <p>In the meantime, are you interested in learning more about coding or looking for some inspiration for preparing a
        #CodeWeek activity?</p>

    <ul>
        <li>
            <p>
                Visit the resources page of the EU Code Week website:
                <a target="_blank" href="{{env('APP_URL')}}/resources/">{{env('APP_URL')}}/resources/</a>
            </p>
        </li>
    </ul>

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
@endcomponent
