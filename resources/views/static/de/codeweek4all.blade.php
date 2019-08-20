@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Code Week 4 All Challenge</h1><span></span></div>

                    <hr>

                    <p>Ziel der Code Week 4 All Challenge ist es, dass Sie Ihre Aktivit&auml;ten mit anderen Aktivit&auml;ten vernetzen, die innerhalb ihres Freundes-, Kollegen- und Bekanntenkreises organisiert werden. Zusammen k&ouml;nnen Sie sich das Code Week-Exzellenzzertifikat verdienen.</p>


                    <simple-question :visible="true">
                        <template slot="title">Worum geht es?</template>
                        <template slot="content">
                            <p>Nachdem Sie Ihre Aktivit&auml;t zur EU Code Week-Karte hinzugef&uuml;gt haben, k&ouml;nnen Sie andere Personen in Ihrem Netzwerk dazu auffordern, das gleiche zu tun. Wenn Sie und Ihre Allianz eine der folgenden Meilensteine erreichen, verdienen Sie sich damit das Code Week-Exzellenzzertifikat!</p>
                            <p>Kriterien f&uuml;r die Verleihung eines Exzellenzzertifikats:</p>
                            <ul>
                                <li><strong>500 Sch&uuml;ler haben teilgenommen</strong></li>und / oder<li><strong>10 Aktivit&auml;ten wurden vernetzt</strong></li>und / oder<li><strong>3 L&auml;nder waren beteiligt</strong></li>
                            </ul>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Wie nimmt man teil?</template>
                        <template slot="content">
                            <ol>
                                <li>Besuchen Sie die Seite <a href="/add">Aktivit&auml;t hinzuf&uuml;gen</a> und machen Sie die erforderlichen Angaben f&uuml;r Ihre Programmieraktivit&auml;t.</li>
                            </ol><i>Wenn Sie eine Allianz neu gr&uuml;nden:</i><ol start="2">
                                <li>Klicken Sie auf &bdquo;Absenden&ldquo;.</li>
                                <li>Sobald Ihre Aktivit&auml;t angenommen wurde, erhalten Sie eine Best&auml;tigungsmail mit Ihrem eindeutigen Code Week 4 All-Code.</li>
                                <li>Kopieren Sie den Code und senden Sie ihn an Ihren Kollegenkreis sowie andere Organisator*innen einer Programmieraktivit&auml;t in Ihrem Netzwerk. R&uuml;hren Sie die Werbetrommel, um andere f&uuml;r die Teilnahme zu gewinnen!</li>
                                <li>Nach dem Ende der Kampagne wird jede Person, die eine Aktivit&auml;t organisiert hat, darum gebeten werden, zu berichten, wie viele Teilnehmer bei ihr mitgemacht haben. Wenn es Ihnen gelungen ist, den Meilenstein zu erreichen, wird Ihnen und Ihrem Kollegenkreis, die Teil Ihres Netzwerkes waren, das Exzellenzzertifikat verliehen!</li>
                            </ol><i>Wenn Sie einer bestehenden Allianz beitreten:</i><ol start="2">
                                <li>F&uuml;gen Sie den Zugangscode, den Sie vom / von der Initiator*in erhalten haben, also der Person, die die Allianz gegr&uuml;ndet hat, in das Feld f&uuml;r den Code Week 4 All-Code ein.</li>
                                <li>Klicken Sie auf &bdquo;Absenden&ldquo;.</li>
                                <li>Sagen Sie es weiter (auch den Code!), um mehr Organisator*innen zu gewinnen, die sich Ihrer Allianz anschlie&szlig;en.</li>
                                <li>Nach dem Ende der Kampagne wird jede Person, die eine Aktivit&auml;t organisiert hat, darum gebeten werden, zu berichten, wie viele Teilnehmer bei ihr mitgemacht haben. Wenn es Ihnen gelungen ist, den Meilenstein zu erreichen, wird Ihnen und Ihrem Kollegenkreis, die Teil Ihres Netzwerkes waren, das Exzellenzzertifikat verliehen!</li>

                            </ol>
                        </template>
                    </simple-question>

                    <simple-question :visible="true">
                        <template slot="title">Warum bei der Challenge mitmachen?</template>
                        <template slot="content">
                            <ul>
                                <li>Um die Nachricht zu verbreiten, welch gro&szlig;e Bedeutung das Programmieren hat.</li>
                                <li>Um mehr Sch&uuml;ler zur Teilnahme zu bewegen.</li>
                                <li>Um Kontakte zu Organisationen und / oder Schulen in Ihrer Gemeinde oder in internationalem Rahmen zu kn&uuml;pfen.</li>
                                <li>Um Unterst&uuml;tzung durch andere Organisator*innen und Lehrkr&auml;fte zu finden.</li>
                                <li>Um sich ein <strong>Exzellenzzertifikat</strong> zu verdienen.</li>
                            </ul>
                        </template>
                    </simple-question>


                </div>
            </div>
        </div>

    </section>@endsection @section("extra-css")<style> .tab{ position: relative; margin-bottom: 1px; width: 100%; color: #232323; overflow: hidden; } .answer { padding: 20px; background-color: #f1f1f1; } .question{ position: relative; display: block; width: 100%; padding: 0 0 0 1em; background: #2980b9; font-weight: bold; line-height: 3; cursor: pointer; color: #fff; text-align: center; font-size: 2rem; } .chevron{ display: block; margin-top: -23px; padding: 10px; } ul, ol{ margin-left: 1em; } </style>@endsection