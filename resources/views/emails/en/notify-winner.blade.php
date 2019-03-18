@component('mail::message')
Dear Code Week 4 All challenge participant,



We are delighted to share with you today that you have successfully completed the Code Week 4 All challenge.<br/>



We would like to extend our warmest congratulations and thank you for playing a major part in making last year’s Code Week, <a href="https://ec.europa.eu/digital-single-market/en/news/eu-code-week-2018-breaks-all-time-record-27-million-participants-and-nearly-44000-events">the most successful edition yet.</a><br/>

It is our belief that the creation of networks between teachers and educators all over Europe is vital to bringing coding to more students across Europe – and you have helped up move closer to this goal!<br/>



You can personalize and download your Code Week 4 all certificate by following this link:<br/>


@component('mail::button', ['url' => env('APP_URL') . "/certificates/excellence/" . $edition])
    Get your Certificate
@endcomponent



Thank you very much for helping us bring coding into more schools than ever before, and advance digital literacy all over Europe! We hope to work together again in the 2019 edition of EU Code Week, which will take place from October 5-20.<br/><br/>



Best wishes,<br/>



The EU Code Week Team




@endcomponent