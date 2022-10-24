@component('mail::message')
Dear EU Code Week enthusiast,<br/>

We noticed that you tried to generate a certificate on the Code Week website.
Due to a technical issue, our servers were not able to generate your certificate.

The bug has vanished and your certificate is now available. You can download it by clicking on the button below.<br/>

@component('mail::button', ['url' => $event->certificate_url])
    Download my Certificate
@endcomponent

The certificates are also available on your <a href="{{route('certificates')}}">Certificates</a> Page.

Thank you for your participation!<br/>

The Code Week Team<br/><br/>

@endcomponent
