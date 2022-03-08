@component('mail::message')
Hello !<br/><br/>

New activities have been promoted by ambassadors to appear in the Online Activities Calendar<br/>

@component('mail::button', ['url' => config('codeweek.app_url') . "/online/promoted"])
    Check the activities
@endcomponent

Kind regards,<br/>
Code Week Robot<br/><br/>

@endcomponent