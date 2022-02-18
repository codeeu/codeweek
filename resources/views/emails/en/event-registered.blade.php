@component('mail::message')

# Registration Received

## Thank you for registering [your activity]({{env('APP_URL')}}{{$event->path()}}) for EU Code Week!


<p>The EU Code Week ambassadors in your country are currently reviewing your submission. You will receive an email
confirming the approval of your activity in the next few days.</p>
<p>In the meantime, are you interested in learning more about coding or looking for some inspiration for preparing
your #CodeWeek activity?</p>
<ul>
<li>
<p>
Visit the resources page of the EU Code Week website:
<a target="_blank" rel="noreferer noopener" href="{{env('APP_URL')}}/resources/">{{env('APP_URL')}}/resources/</a>
</p>
</li>
</ul>

<p>Want to take a step further and take on the Code Week 4 All challenge?</p>

<p>If you are interested in linking your activity with those organised by friends, colleagues or other contacts,
please find your unique Code Week 4 All code below:</p>

<p><strong>{{$event->codeweek_for_all_participation_code}}</strong></p>

<ul>
<li>
<p>
<strong><a target="_blank" rel="noreferer noopener" href="{{env('APP_URL')}}/codeweek4all/">Click here</a></strong>
to find out more about how to connect with other activities in your community and internationally. You
can together earn a Code Week Certificate of Excellence!
</p>
</li>
</ul>

<br>

<div class="social-media">
<span>
Don’t miss the latest updates. Follow #CodeWeek on social media!
</span>
<a target="_blank" href="https://www.facebook.com/codeEU" rel="noreferer noopener"><img src="{{asset('img/facebook_circle.png')}}"></a>
<a target="_blank" href="https://twitter.com/search?q=%23codeweek&amp;f=realtime" rel="noreferer noopener"><img
src="{{asset('img/twitter_circle.png')}}"></a>
</div>


<p>Are you a teacher or educator? Join the <a target="_blank" rel="noreferer noopener"
              href="https://www.facebook.com/groups/774720866253044/">EU Code Week
Teachers</a> group on Facebook to exchange ideas, lesson plans, and have any questions answered about
bringing Code Week to your students!</p>



<footer style="text-align: center;">
<a target="_blank" rel="noreferer noopener" href="mailto:info@codeweek.eu">Contact us</a> |
<a target="_blank" rel="noreferer noopener" href="{{env('APP_URL')}}/login">My Account</a> |
<a target="_blank" rel="noreferer noopener" href="{{env('APP_URL')}}/privacy">Privacy Policy</a> |
<a target="_blank" rel="noreferer noopener" href="{{env('APP_URL')}}/about">About EU Code Week</a>
</footer>


@endcomponent
