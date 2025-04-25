<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2025-01-29 14:25:29
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2025-03-14 10:52:43
 */
?>
@component('mail::message')
Dear EU Code Week 4 All challenge participant,

We are delighted to share with you today that you have successfully completed the {{$edition}} EU Code Week 4 All challenge.<br/>

We believe that the alliance you created with other activity organisers is vital to bringing coding to more students in the world – and you have helped up move closer to this goal!<br/>

You can personalise and download your EU Code Week 4 all certificate by clicking on the link in this button:
<br/>


@component('mail::button', ['url' => "https://codeweek.eu/certificates/excellence/2024"])
    Get your Certificate
@endcomponent

Thank you very much for helping us advance digital skills! We hope to work together again in the next edition of EU Code Week, which will take place from 14-27 October.<br/><br/>

Best wishes,<br/>


The EU Code Week Team




@endcomponent
