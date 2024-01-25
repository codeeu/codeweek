@component('mail::message')

# Registration Deleted

Unfortunately, the EU Code Week ambassadors in your country were not able to approve your submission.

The activity was not Code Week related, it was contrary to the Code Week objectives and goals.

If you feel that this decision was made in error, please feel free to make a new application and provide more details about what you will do and how your activity relates to coding and computational thinking.

If you have any other questions, do not hesitate to contact the Ambassador in your country.

<p>In the meantime, are you interested in learning more about coding or looking for some inspiration for preparing
your #EUCodeWeek activity?</p>
<ul>
<li>
<p>
Visit the resources page of the EU Code Week website:
<a target="_blank" rel="noreferer noopener" href="{{config('codeweek.app_url')}}/resources/">{{config('codeweek.app_url')}}/resources/</a>
</p>
</li>
</ul>

<div class="social-media">
<span>
Don’t miss the latest updates. Follow #EUCodeWeek on social media!
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
<a target="_blank" rel="noreferer noopener" href="{{config('codeweek.app_url')}}/login">My Account</a> |
<a target="_blank" rel="noreferer noopener" href="{{config('codeweek.app_url')}}/privacy">Privacy Policy</a> |
<a target="_blank" rel="noreferer noopener" href="{{config('codeweek.app_url')}}/about">About EU Code Week</a>
</footer>


@endcomponent