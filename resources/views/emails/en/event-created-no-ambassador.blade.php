@component('mail::message')
Hello Admin!<br/><br/>

There is no ambassador for {{ $event->country->name }}, then your attention is required.

A new event {{ $event->title }} has been added to the codeweek.eu site and it needs your revision. Would you be kind enough to check if everything is ok and approve it, or otherwise request an update<br/>


@component('mail::button', ['url' => env('APP_URL') . $event->path()])
Review the event
@endcomponent

Thank you for your help!<br/>

Codeweek.eu Team<br/>


@endcomponent
