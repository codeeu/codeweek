@component('mail::message')
Dear Code Week 4 All challenge participant,

We are delighted to share with you today that you have successfully completed the {{$edition}} Code Week 4 All challenge.<br/>

We believe that the alliance you created with other activity organisers is vital to bringing coding to more students in the world – and you have helped up move closer to this goal!<br/>


You can personalise and download your Code Week 4 all certificate by clicking on the link in this button:
<br/>


@component('mail::button', ['url' => config('codeweek.app_url') . "/certificates/excellence/" . $edition])
    Get your Certificate
@endcomponent

Thank you very much for helping us advance digital literacy! We hope to work together again in the 2023 edition of EU Code Week, which will take place from 14-27 October.<br/><br/>



Best wishes,<br/>



The EU Code Week Team




@endcomponent
