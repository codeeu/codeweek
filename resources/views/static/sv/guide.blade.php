@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Var med p&aring; EU Code Week och ordna evenemang f&ouml;r #codeEU</h1><span></span><div><a href="/add" target="_blank" class="btn btn-xl mt-8">Registrera ditt evenemang h&auml;r</a></div>
                    </div>


                </div>


                <h4><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/codeeu_toolkit.pdf"
                       alt="#codeEU Toolkit"><i class="fa fa-download"></i> Ladda ner hela verkygssatsen #codeEU som PDF</a></h4>
                <h2>verktygssatsen #codeEU</h2>
                <h2>Vad &auml;r EU Code Week?</h2>
                <p>EU Code Week &auml;r en gr&auml;srotsr&ouml;relse som drivs av frivilliga <a
                            href="/ambassadors">ambassad&ouml;rer f&ouml;r Code Week</a> som fr&auml;mjar kodning i sina l&auml;nder. Alla &ndash; skolor, l&auml;rare, bibliotek, kodklubbar, f&ouml;retag, offentliga myndigheter &ndash; kan ordna ett evenemang f&ouml;r #CodeEU och l&auml;gga till det p&aring; <a href="/">codeweek.eu</a>-kartan.</p>
                <h2>Vem kan ordna ett Code Week-evenemang?</h2>
                <p>Vem som helst kan ordna ett Code Week-evenemang.</p>
                <ul>
                    <li><strong>Barn/ton&aring;ringar/vuxna</strong> kan ordna kodningsevenemang f&ouml;r att visa andra hur man skapar med kod.</li>
                    <li><strong>Skolor/fritidsf&ouml;reningar/kv&auml;llskurser f&ouml;r vuxna</strong> kan ordna evenemang f&ouml;r sina elever. Kodning online eller utan uppkoppling &auml;r kul och ett tillf&auml;lle att l&auml;ra sig datoriserat t&auml;nkande!</li>
                    <li><strong>L&auml;rare och bibliotekarier</strong> som kodar kan h&aring;lla kodningskurser, dela sina lektionsplaner och ordna workshoppar f&ouml;r kollegor.</li>
                    <li><strong>L&auml;rare och bibliotekarier som inte kodar</strong> kan bjuda in f&ouml;r&auml;ldrar eller elever att l&auml;ra deltagarna kodning.</li>
                    <li><strong>Kodare</strong> kan ordna workshoppar p&aring; lokala skolor, hackerspace eller kulturhus och bjuda in folk att skapa med kod.</li>
                    <li><strong>Kodklubbar</strong> kan ordna workshoppar f&ouml;r nya deltagare och visa dem hur man g&ouml;r ett spel eller en app med kod.</li>
                    <li><strong>F&ouml;retag och ideella organisationer</strong> kan st&aring; v&auml;rd f&ouml;r kodningsworkshoppar, l&aring;na ut sin personal att coacha p&aring; olika evenemang, ordna roliga utmaningar f&ouml;r kodare och erbjuda sponsring av kodningsevenemang.</li>
                </ul>

                <h2>Vad beh&ouml;ver du?</h2>
                <ul>
                    <li><strong>En grupp personer som &auml;r villiga att l&auml;ra sig n&aring;got.</strong> Exempelvis dina v&auml;nner, barn, ton&aring;ringar, vuxna kollegor, f&ouml;r&auml;ldrar eller far- och morf&ouml;r&auml;ldrar. Kom ih&aring;g att tv&aring; stycken &auml;r en grupp bara det!</li>
                    <li><strong>Coacher eller instrukt&ouml;rer</strong> som kan kodning och kan l&auml;ra ut och inspirera andra. Antalet beror p&aring; evenemangets typ och storlek. F&ouml;r konkreta workshoppar kan du beh&ouml;va en coach per 5:e&ndash;8:e deltagare, men det beror p&aring;. Deltagarna kan ocks&aring; hj&auml;lpa varandra! F&ouml;r st&ouml;rre evenemang kan det vara en god id&eacute; att ha en v&auml;rd som ser till att alla har vad de beh&ouml;ver och att allt g&aring;r smidigt.</li>
                    <li><strong>En plats att vistas p&aring;.</strong> Klassrum, bibliotek, konferensrum och diverse offentliga utrymmen &auml;r alla utm&auml;rkta platser f&ouml;r ett evenemang.</li>
                    <li><strong>Datorer.</strong> Beroende p&aring; din m&aring;lgrupp kan du be deltagarna att ta med sig sina egna b&auml;rbara datorer. Gl&ouml;m i s&aring; fall inte att se till att det finns tillr&auml;ckligt med uttag.</li>
                    <li><strong>Internetanslutning</strong> &ndash; WiFi eller fasta anslutningar. F&ouml;rs&auml;kra dig om att anslutningarna klarar trafiken som din grupp ger upphov till.</li>
                    <li><strong>Kodning utan uppkoppling.</strong> Man beh&ouml;ver egentligen inte datorer och internetanslutning f&ouml;r att l&auml;ra sig datoriserat t&auml;nkande. Pr&ouml;va lite offline-kodning med v&aring;r <a
                                href="http://codeweek.it/codyroby/">Cody-Roby</a>-sats.</li>
                    <li><strong>N&aring;got att jobba med och l&auml;ra sig.</strong>Visa deltagarna hur kul det kan vara att skapa n&aring;got sj&auml;lv. Kolla upp v&aring;r <a href="http://codeweek.eu/resources/">lista &ouml;ver resurser</a> och s&ouml;k p&aring; webben efter befintliga lektionsplaner och workshopprogram och anpassa dem efter din grupps behov. Om du har befintlig datorutrustning p&aring; platsen, se d&aring; till att den n&ouml;dv&auml;ndiga programvaran redan finns installerad och ge deltagarna instruktioner om hur de kan g&ouml;ra installationen p&aring; sina egna enheter.</li>
                    <li><strong>Registrera deltagarna.</strong> Om du har begr&auml;nsat med utrymme kan du anv&auml;nda verktyg som onlineformul&auml;r i stil med Wufoo, Google Forms eller evenemangssidor p&aring; Facebook eller Eventbrite. &Auml;ven om vi gynnar kostnadsfria evenemang, kan du ta ut en liten avgift f&ouml;r att t&auml;cka evenemangskostnaderna. Alternativt kan du v&auml;nda dig till lokala IT-f&ouml;retag eller nystartade f&ouml;retag f&ouml;r sponsring.</li>
                    <li><a href="/add">S&auml;tt upp ditt evenemang</a> p&aring; <a href="/">Code Week-kartan</a>!</li>
                </ul>


                <h2>Hur ska ditt evenemang anordnas?</h2>
                <ul>
                    <li>Formatet p&aring; ditt kodningsevenemang &auml;r upp till dig, men vi rekommenderar att du har med en del <strong>praktisk, konkret tid</strong>, d&aring; deltagarna kan skapa sj&auml;lva och/eller pilla lite med maskinvara.</li>
                    <li>Du kan anv&auml;nda vilka <strong>verktyg och tekniktyper</strong> du vill, men vi f&ouml;redrar <a
                                href="http://codeweek.eu/resources/">fritt tillg&auml;ngligt open source-material</a>.</li>
                    <li><strong>Le!</strong> En v&auml;nlig atmosf&auml;r bryter isen och motiverar till inl&auml;rning.</li>
                    <li><strong>Tilltugg och dryck</strong>. Om ditt evenemang h&aring;ller p&aring; ett par timmar beh&ouml;ver nog dina deltagare en rast. Om du inte kan st&aring; f&ouml;r tilltugg och dryck, be d&aring; deltagarna att ta med och dela med varandra.</li>
                    <li>Be deltagarna att <strong>visa och presentera</strong> f&ouml;r varandra vad de har skapat i slutet av evenemanget. Det g&ouml;r alla stolta!</li>
                    <li><strong>Tala om ditt evenemang!</strong> Tala om evenemanget p&aring; sociala medier. Anv&auml;nd #CodeEU och @CodeWeekEU. Tala med v&auml;nnerna, med lokalpressen, sl&auml;pp ett pressmeddelande!</li>
                    <li>Gl&ouml;m inte <a href="/add">l&auml;gga till ditt evenemang</a> p&aring; <a href="/">Code Week-kartan</a>!</li>
                </ul>


                <h2>Kampanjmaterial</h2>
                <p>Du f&aring;r g&auml;rna anv&auml;nda valfria delar av f&ouml;ljande pressmeddelande till din egen marknadsf&ouml;ring:</p>
                <ul>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/eu-code-week-celebrating-its-5th-birthday-7-22-october-get-ready-join-and-learn-how-create-code">EU Code Week firar 5-&aring;rsdag den 7&ndash;22 oktober &ndash; g&ouml;r dig klar, var med och l&auml;r dig skapa med kod!</a></li>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/million-coded-in-record-2016-EU-code-week">Nytt rekord f&ouml;r EU Code Week: En miljon kodade under 2016 &aring;rs upplaga</a></li>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/save-date-eu-code-week-10-18-october-2015-bringing-ideas-life-codeeu">EU Code Week: F&ouml;rverkliga dina id&eacute;er med #codeEU</a></li>
                </ul>
                <p>Du kan &auml;ven anv&auml;nda <a href="https://github.com/codeeu/codeeu-resources/tree/master/Logo - generic">EU Code Weeks logotyp</a>, s&aring; l&auml;nge evenemanget du planerar st&auml;mmer med v&aring;ra riktlinjer.</p>


                <h2>Fr&aring;gor?</h2>
                <p>Om du har fr&aring;gor om hur du ordnar och g&ouml;r kampanj f&ouml;r ditt evenemang f&ouml;r #codeEU, ta d&aring; kontakt med en av <a href="/ambassadors">ambassad&ouml;rerna f&ouml;r EU Code Week</a> i ditt land.</p>


            </div>
        </div>
    </section>@endsection