@component('mail::message')
    Hello {{$user->firstname}}!<br/><br/>

    There are pending events that still need your attention.<br/>

    Can you please access in the follow url to approve or reject the events:<br/>

    <a href="https://codeweek.eu/pending/">https://codeweek.eu/pending/</a><br/>

    Thank you for your help!<br/>

    Codeweek.eu Team<br/>

@endcomponent
