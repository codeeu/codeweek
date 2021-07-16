@component('mail::message')
Hello!<br/>

A new action has been created by {{$action->user->fullName}}.<br>
Title: {{$action->title}}<br/>
Type: {{$action->type}}<br/>

Please visit your dashboard to review it.<br/>

@component('mail::button', ['url' => route('LT.dashboard')])
Go to my Dashboard
@endcomponent

Thank you for your help!<br/>

Codeweek.eu Team<br/>


@endcomponent
