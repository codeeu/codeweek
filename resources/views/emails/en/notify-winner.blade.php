@component('mail::message')
Hello {{$user->firstname}}!<br/><br/>

You are a winner !!!

@component('mail::button', ['url' => env('APP_URL') . "/certificates/excellence/" . $edition])
    Get your Certificate
@endcomponent


@endcomponent