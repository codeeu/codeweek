@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Szervezze saj&aacute;t tev&eacute;kenys&eacute;g&eacute;t a #CodeWeek-kel</h1><span></span><div><a href="/add" target="_blank" class="btn btn-xl mt-8">Regisztr&aacute;lja tev&eacute;kenys&eacute;g&eacute;t itt</a></div>
                    </div>


                </div>


                <h2>Mi az eur&oacute;pai programoz&aacute;si h&eacute;t?</h2>
                <p>Az eur&oacute;pai  programoz&aacute;si h&eacute;t egy alulr&oacute;l szerveződő mozgalom, amelyet &ouml;nk&eacute;ntesek műk&ouml;dtetnek &eacute;s az Eur&oacute;pai Bizotts&aacute;g t&aacute;mogat. B&aacute;rki &ndash; iskol&aacute;k, tan&aacute;rok, k&ouml;nyvt&aacute;rak, programoz&oacute;klubok, v&aacute;llalkoz&aacute;sok, hat&oacute;s&aacute;gok &ndash; szervezhet #CodeWeek-tev&eacute;kenys&eacute;get, &eacute;s felteheti a <a href="/events">codeweek.eu</a> oldalon tal&aacute;lhat&oacute; t&eacute;rk&eacute;pre.</p>


                <h2>Mire van sz&uuml;ks&eacute;ge egy tev&eacute;kenys&eacute;g szervez&eacute;s&eacute;hez?</h2>
                <ul>
                    <li><strong>Egy csoportnyi tanulni v&aacute;gy&oacute; emberre.</strong> Ezek lehetnek a bar&aacute;tai, a gyermekei, fiatalok, felnőtt koll&eacute;g&aacute;k, bar&aacute;tok, sz&uuml;lők vagy nagysz&uuml;lők. Ne feledje, k&eacute;t ember m&aacute;r csoportnak sz&aacute;m&iacute;t!</li>
                    <li><strong>Tan&aacute;rokra vagy oktat&oacute;kra</strong>, akik j&aacute;rtasak a programoz&aacute;si tev&eacute;kenys&eacute;gekben, &eacute;s tudj&aacute;k, hogy mik&eacute;nt kell tan&iacute;tani &eacute;s &ouml;szt&ouml;n&ouml;zni m&aacute;sokat. A l&eacute;tsz&aacute;m az esem&eacute;ny t&iacute;pus&aacute;t&oacute;l &eacute;s m&eacute;ret&eacute;től f&uuml;gg.</li>
                    <li><strong>Egy tanul&aacute;si helysz&iacute;nre.</strong> Az oszt&aacute;lytermek, k&ouml;nyvt&aacute;rak, konferenciatermek &eacute;s a k&uuml;l&ouml;nb&ouml;ző nyilv&aacute;nos terek kiv&aacute;l&oacute; helysz&iacute;nek lehetnek.</li>
                    <li><strong>Sz&aacute;m&iacute;t&oacute;g&eacute;pekre &eacute;s internetkapcsolatra.</strong> C&eacute;lcsoportja f&uuml;ggv&eacute;ny&eacute;ben megk&eacute;rheti a r&eacute;sztvevőket, hogy hozz&aacute;k magukkal saj&aacute;t laptopjukat.</li>

                    <li><strong>Offline programoz&aacute;sra.</strong> A sz&aacute;m&iacute;t&aacute;stechnikai gondolkod&aacute;sm&oacute;d elsaj&aacute;t&iacute;t&aacute;s&aacute;hoz val&oacute;j&aacute;ban nincs sz&uuml;ks&eacute;ge sz&aacute;m&iacute;t&oacute;g&eacute;pekre &eacute;s internetkapcsolatra. Az első l&eacute;p&eacute;sekhez n&eacute;zze meg <a href="/training/coding-without-computers">Offline tud&aacute;smorzs&aacute;nkat</a> .</li>


                    <li><strong>Oktat&aacute;si anyagokra.</strong> Mutassa meg a r&eacute;sztvevőknek, hogy mennyire sz&oacute;rakoztat&oacute; lehet valamit &ouml;n&aacute;ll&oacute;an l&eacute;trehozni. N&eacute;zze meg <a
                                href="/resources">erőforr&aacute;sok oldalunkat</a> &eacute;s a <a href="/training">tud&aacute;smorzs&aacute;kat</a> az oktat&oacute;vide&oacute;kkal &eacute;s az &oacute;rav&aacute;zlatokkal egy&uuml;tt, &eacute;s igaz&iacute;tsa őket csoportjai ig&eacute;nyeihez.</li>


                    <li><strong>Regisztr&aacute;lja a r&eacute;sztvevőket.</strong> Ha korl&aacute;tozott hely &aacute;ll rendelkez&eacute;s&eacute;re, a r&eacute;sztvevők regisztr&aacute;l&aacute;s&aacute;hoz haszn&aacute;lhat online eszk&ouml;z&ouml;ket, mint p&eacute;ld&aacute;ul <a href="https://docs.google.com/forms/">Google űrlapokat</a> &eacute;s az <a
                                href="https://www.eventbrite.com/">Eventbrite</a>-ot.</li>
                    <li>Ne feledje <a href="/add">kitűzni tev&eacute;kenys&eacute;g&eacute;t</a> a <a href="/events">programoz&aacute;si h&eacute;t t&eacute;rk&eacute;p&eacute;re</a>!</li>
                </ul>


                <h2>Hogyan szervezze meg tev&eacute;kenys&eacute;g&eacute;t?</h2>
                <ul>
                    <li>A programoz&aacute;si esem&eacute;ny fel&eacute;p&iacute;t&eacute;se szabadon v&aacute;laszthat&oacute;, javasoljuk azonban, hogy legyen benne valamilyen <strong>gyakorlati foglalkoz&aacute;s</strong> is, amelynek sor&aacute;n a r&eacute;sztvevők saj&aacute;t programot hozhatnak l&eacute;tre &eacute;s/vagy bizonyos hardver elemet jav&iacute;thatnak.</li>
                    <li>Haszn&aacute;lja azokat az <strong>eszk&ouml;z&ouml;ket &eacute;s technol&oacute;gi&aacute;kat</strong>, amelyek megfelelnek c&eacute;lcsoportja sz&aacute;m&aacute;ra. A <a href="http://codeweek.eu/resources/">szabadon hozz&aacute;f&eacute;rhető ny&iacute;lt forr&aacute;sk&oacute;d&uacute; anyag</a> haszn&aacute;lat&aacute;t javasoljuk.</li>

                    <li>K&eacute;rje meg a r&eacute;sztvevőket, hogy az esem&eacute;ny v&eacute;g&eacute;n <strong>mutass&aacute;k be</strong> egym&aacute;snak, hogy mit hoztak l&eacute;tre.</li>

                    <li><strong>Terjessze a h&iacute;rt!</strong> A #CodeWeek hashtag felhaszn&aacute;l&aacute;s&aacute;val rekl&aacute;mozza &eacute;s ossza meg a k&ouml;z&ouml;ss&eacute;gi m&eacute;di&aacute;n, hogy tev&eacute;kenys&eacute;ge sor&aacute;n mit v&eacute;gzett. Ugyancsak megoszthatja ezeket az <a
                                href="https://www.facebook.com/groups/774720866253044/">eur&oacute;pai programoz&aacute;si h&eacute;t tan&aacute;ri csoportj&aacute;ban</a> &eacute;s a Twitteren (<a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>). Besz&eacute;ljen bar&aacute;taival, oktat&oacute;t&aacute;rsaival, a helyi sajt&oacute;val &eacute;s k&eacute;sz&iacute;tsen sajt&oacute;k&ouml;zlem&eacute;nyt.</li>

                    <li>Ne feledje <a href="/add">feltenni tev&eacute;kenys&eacute;g&eacute;t</a> a <a href="/events">programoz&aacute;si h&eacute;t t&eacute;rk&eacute;p&eacute;re</a>!</li>


                </ul>


                <h2>Prom&oacute;ci&oacute;s anyagok</h2>
                <p>Olvassa el <a href="http://blog.codeweek.eu/">blogunkat</a> a legfrissebb inform&aacute;ci&oacute;k&eacute;rt, &eacute;s m&oacute;dos&iacute;tsa a legfrissebb sajt&oacute;k&ouml;zlem&eacute;nyt saj&aacute;t ig&eacute;nyei szerint, vagy hozza l&eacute;tre saj&aacute;tj&aacute;t:</p>
                <ul>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/gearing-celebrate-eu-code-week-2019">R&aacute;hangol&oacute;d&aacute;s a 2019. &eacute;vi eur&oacute;pai programoz&aacute;si h&eacute;t meg&uuml;nnepl&eacute;s&eacute;re</a> (29 nyelven &aacute;ll rendelkez&eacute;sre)</li>

                </ul>


                <h2>Az első l&eacute;p&eacute;sek megt&eacute;tel&eacute;hez t&ouml;ltse le az al&aacute;bbi eszk&ouml;zt&aacute;rakat:</h2>
                <ul>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BCommunications%2BToolkit.zip">Kommunik&aacute;ci&oacute;s eszk&ouml;zt&aacute;r</a></li>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BTeachers%2BToolkit.zip">Tan&aacute;ri eszk&ouml;zt&aacute;r</a></li>
                </ul>

                <h2>K&eacute;rd&eacute;se mer&uuml;lt fel?</h2>Amennyiben k&eacute;rd&eacute;se van saj&aacute;t #CodeWeek-esem&eacute;ny&eacute;nek megszervez&eacute;s&eacute;vel &eacute;s n&eacute;pszerűs&iacute;t&eacute;s&eacute;vel kapcsolatban, vegye fel a kapcsolatot orsz&aacute;ga <a href="/ambassadors">programoz&aacute;si h&eacute;t&eacute;rt felelős nagyk&ouml;vet&eacute;vel</a> .</div>
        </div>
    </section>@endsection