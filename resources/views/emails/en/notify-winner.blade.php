@component('mail::message')
Dear Code Week 4 All challenge participant,

We are delighted to share with you today that you have successfully completed the Code Week 4 All challenge.<br/>

We would like to extend our warmest congratulations and thank you for playing a major part in making last year’s Code Week, <a href="https://ec.europa.eu/digital-single-market/en/news/new-record-eu-code-week-42-million-participants-and-more-72-000-activities-2019">the most successful edition yet.</a><br/>

It is our belief that the creation of alliances between teachers and educators all over Europe is vital to bringing coding to more students across Europe – and you have helped up move closer to this goal!<br/>


You can personalise and download your Code Week 4 all certificate by clicking on the link in this button:
<br/>


@component('mail::button', ['url' => env('APP_URL') . "/certificates/excellence/" . $edition])
    Get your Certificate
@endcomponent


Thank you very much for helping us advance digital literacy all over Europe! We hope to work together again in the 2020 edition of EU Code Week, which will take place from 10-25 October.<br/><br/>



Best wishes,<br/>



The EU Code Week Team




@endcomponent