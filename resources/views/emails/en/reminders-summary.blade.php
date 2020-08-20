@component('mail::message')
<h1>Daily stats</h1>
<h3>Creators count: {{$creatorsCount}}</h3>
<h3>Mails Queued: {{$mailsQueued}}</h3>
<h3>Events Count: {{$eventsCount}}</h3>
<h3>Events Updated: {{$updated}}</h3>
@endcomponent