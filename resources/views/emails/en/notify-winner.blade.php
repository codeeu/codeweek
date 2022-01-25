@component('mail::message')
Dear Code Week 4 All challenge participant,

We are delighted to share with you today that you have successfully completed the {{$edition}} Code Week 4 All challenge.<br/>

We would like to extend our warmest congratulations and thank you for playing a major part in making last year’s Code Week, <a href="https://digital-strategy.ec.europa.eu/en/news/eu-code-week-breaks-record-number-activities-2021-78000-events">the most successful edition yet.</a><br/>

We believe that the alliance you created with other activity organisers is vital to bringing coding to more students in the world – and you have helped up move closer to this goal!<br/>


You can personalise and download your Code Week 4 all certificate by clicking on the link in this button:
<br/>


@component('mail::button', ['url' => env('APP_URL') . "/certificates/excellence/" . $edition])
    Get your Certificate
@endcomponent

Thank you very much for helping us advance digital literacy! We hope to work together again in the 2022 edition of EU Code Week, which will take place from 8-23 October.<br/><br/>



Best wishes,<br/>



The EU Code Week Team




@endcomponent
