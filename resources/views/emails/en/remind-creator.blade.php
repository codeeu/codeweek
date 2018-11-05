@component('mail::message')
Hello {{$user->firstname}}!<br/><br/>

We’d like to thank you for taking part in Europe Code Week and helping us to reach hundreds of thousands of people around the world!<br/>
As a small token of appreciation for your role in Code Week, as an event organizer, we’re awarding you a certificate of recognition.<br/><br/>
To see your activities that can be reported, please click on the link below

@component('mail::button', ['url' => env('APP_URL') . "/my/reportable"])
    Report Activities
@endcomponent

We hope that you will continue working to bring coding literacy to even more people during the coming year!<br/>

Thank you once more and hope to see you again in the next year's edition of Europe Code Week!<br/>

Kind regards,<br/>
The Code Week Ambassadors<br/><br/>

_You are receiving this message because you’ve registered an event on the events.codeweek.eu website and have entered {{$user->email}} as an email of the event organizer. If you think this in an error, just reply to this message to let us know._<br/>

@endcomponent