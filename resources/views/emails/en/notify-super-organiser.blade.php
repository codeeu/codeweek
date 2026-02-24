@component('mail::message')
Dear EU Code Week activity organiser,

We are delighted to let you know that you successfully completed the {{$edition}} EU Code Week Super Organiser Challenge. <br/>

That is organising 10 or more EU Code Week activities in {{$edition}}. Congratulations and thank you for playing a major part in last year’s EU Code Week.<br/>

We believe it is vital to bring coding, computing and computational thinking to as many people as possible – and you have helped up us reach this goal!<br/>


You can personalise and download your Super Organiser certificate by clicking on the link in this button:
<br/>


@component('mail::button', ['url' => $certificateUrl ?? config('codeweek.app_url') . '/certificates/super-organiser/' . $edition])
    Get your Certificate
@endcomponent

Thank you very much for helping us advance digital skills! We hope to work together again in the next edition of EU Code Week, which will take place from 10-25 October.<br/><br/>

<strong>Join the EU Code Week Community</strong><br/><br/>

EU Code Week is more than a campaign. It is a grassroots movement powered by educators, volunteers, and community builders across Europe. If you are not yet part of our community and would like to join, collaborate with peers, support digital education locally, and take a more active role as a Leading Teacher or Ambassador, we warmly invite you to explore the opportunities available in your country.<br/><br/>

Apply to join EU Code Week Community: [EU Code Week - International Call for Community Members 2026](https://forms.office.com/pages/responsepage.aspx?id=18F13DIal06vkB3AGRHqbK1miPh5RLlPh6ebcWW_-7RURFVLWEtGNFlaN1RDVFhVU05ITTZCRzE4RyQlQCN0PWcu&route=shorturl)<br/><br/>

Best wishes,<br/>



The EU Code Week Team




@endcomponent
