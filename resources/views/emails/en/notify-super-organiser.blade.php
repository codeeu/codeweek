@component('mail::message')
Dear Code Week activity organiser,

We are delighted to let you know that you successfully completed the 2022 Code Week Super Organiser Challenge. <br/>

That is organising 10 or more Code Week activities in 2022. Congratulations and thank you for playing a major part in <a href="https://blog.codeweek.eu/code-week-2022-wrap-up-in-numbers/">last year’s Code Week</a>.<br/>

We believe it is vital to bring coding, computing and computational thinking to as many people as possible – and you have helped up us reach this goal!<br/>


You can personalise and download your Super Organiser certificate by clicking on the link in this button:
<br/>


@component('mail::button', ['url' => config('codeweek.app_url') . "/certificates/super-organiser/" . $edition])
    Get your Certificate
@endcomponent

Thank you very much for helping us advance digital literacy! We hope to work together again in the 2023 edition of EU Code Week, which will take place from 7-22 October.<br/><br/>



Best wishes,<br/>



The EU Code Week Team




@endcomponent
