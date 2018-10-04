@component('mail::message')
Hello {{$user->firstname}}!<br/><br/>

There are pending activities that still need your attention.<br/>

Can you please review this activities in order to approve or reject<br/>

@component('mail::button', ['url' => env('APP_URL') . "/pending/"])
    Review activities
@endcomponent

Thank you for your help!<br/>

Codeweek.eu Team<br/>

@endcomponent
