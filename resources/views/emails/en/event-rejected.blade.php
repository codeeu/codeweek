@component('mail::message')
# Registration Deferred

## Thank you for submitting [your activity]({{config('codeweek.app_url')}}{{$event->path()}}) for EU Code Week!

Unfortunately, the EU Code Week ambassadors in your country were not able to approve your submission.

@if($reason)
Here is the feedback provided by the ambassador:\
{{$reason}}
@else
This could be because there was some question about the content of your application, or more information is needed.
@endif


If you feel that this decision was made in error, please feel free to visit your application, edit any details necessary and resubmit via the following link: [Your activities]({{route('my_events')}})

If you have any other questions, do not hesitate to contact the [Ambassador]({{route('ambassadors')}}) in your country.

In the meantime, are you interested in learning more about coding or looking for some inspiration for preparing a #EUCodeWeek activity?


@component('mail::button', ['url' => route('resources_all')])
    Visit the resources page of the EU Code Week website
@endcomponent


Don’t miss the latest updates. Follow #EUCodeWeek on social media!

<a target="_blank" href="https://www.facebook.com/codeEU"><img src="{{asset('img/facebook_circle.png')}}"></a>
<a target="_blank" href="https://twitter.com/search?q=%23codeweek&amp;f=realtime"><img src="{{asset('img/twitter_circle.png')}}"></a>



Are you a teacher or educator? Join the <a target="_blank" href="https://www.facebook.com/groups/774720866253044/">EU Code Week
Teachers</a> group on Facebook to exchange ideas, lesson plans, and have any questions answered about
bringing Code Week to your students!



<footer style="text-align: center;">
<a target="_blank" href="mailto:info@codeweek.eu">Contact Us</a> |
<a target="_blank" href="{{config('codeweek.app_url')}}/profile">My Account</a> |
<a target="_blank" href="{{config('codeweek.app_url')}}/privacy">Privacy Policy</a> |
<a target="_blank" href="{{config('codeweek.app_url')}}/about">About EU Code Week</a>
</footer>
@endcomponent
