@component('mail::message')
Hello Codeweek participant !<br/>

We have noticed that your Code Week account was not properly set up to your email: <strong>{{$user->email}}</strong>.<br/>


A new account has been created for you ({{$user->email}}) on the Codeweek website. <br/>


To access it, you need to <a href="https://codeweek.eu/password/reset">reset your password</a> for {{$user->email}}.

@component('mail::button', ['url' => "https://codeweek.eu/password/reset"])
    Reset Password
@endcomponent

Thank you for your understanding!<br/>

Codeweek.eu Team<br/>
@endcomponent
