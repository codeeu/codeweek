@component('mail::message')
Hello !<br/><br/>

New activities have been promoted by ambassadors to appear in the Online Activities Calendar<br/>

@component('mail::button', ['url' => env('APP_URL') . "/online/promoted"])
    Check the activities
@endcomponent

Kind regards,<br/>
Code Week Robot<br/><br/>

@endcomponent