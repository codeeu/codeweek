@component('mail::message')
Dear EU Code Week activity organiser,

We are delighted to let you know that you successfully completed the 2023 EU Code Week Super Organiser Challenge. <br/>

That is organising 10 or more EU Code Week activities in 2023. Congratulations and thank you for playing a major part in <a href="https://blog.codeweek.eu/2023-a-remarkable-year-for-eu-code-week/">last year’s EU Code Week</a>.<br/>

We believe it is vital to bring coding, computing and computational thinking to as many people as possible – and you have helped up us reach this goal!<br/>


You can personalise and download your Super Organiser certificate by clicking on the link in this button:
<br/>


@component('mail::button', ['url' => config('codeweek.app_url') . "/certificates/super-organiser/" . $edition])
    Get your Certificate
@endcomponent

Thank you very much for helping us advance digital skills! We hope to work together again in the 2024 edition of EU Code Week, which will take place from 14-27 October.<br/><br/>



Best wishes,<br/>



The EU Code Week Team




@endcomponent
