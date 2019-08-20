@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Zorganizujte vlastn&iacute; aktivitu v r&aacute;mci #CodeWeek</h1><span></span><div><a href="/add" target="_blank" class="btn btn-xl mt-8">Zaregistrujte svou aktivitu zde</a></div>
                    </div>


                </div>


                <h2>Co je Evropsk&yacute; t&yacute;den programov&aacute;n&iacute;?</h2>
                <p>Evropsk&yacute; t&yacute;den programov&aacute;n&iacute; je projekt, kter&yacute; spatřil světlo světa d&iacute;ky nad&scaron;en&iacute; dobrovoln&iacute;ků a kter&yacute; podporuje Evropsk&aacute; komise. Kdokoli &ndash; &scaron;koly, učitel&eacute;, knihovny, kluby programov&aacute;n&iacute;, podniky, veřejn&eacute; org&aacute;ny &ndash; může zorganizovat aktivitu #CodeWeek a přidat ji na mapu na str&aacute;nk&aacute;ch <a href="/events">codeweek.eu</a>.</p>


                <h2>Co potřebujete ke zorganizov&aacute;n&iacute; aktivity?</h2>
                <ul>
                    <li><strong>Skupinu lid&iacute;, kteř&iacute; jsou ochotn&iacute; se učit.</strong> Můžou to b&yacute;t třeba va&scaron;i kamar&aacute;di, děti, ml&aacute;dež, kolegov&eacute; z pr&aacute;ce, rodiče nebo prarodiče. A pamatujte na to, že skupinu už tvoř&iacute; dva.</li>
                    <li><strong>Učitele nebo &scaron;kolitele,</strong> kteř&iacute; znaj&iacute; programov&aacute;n&iacute; a věd&iacute;, jak vyučovat a inspirovat ostatn&iacute;. Jejich počet z&aacute;vis&iacute; na druhu a velikosti akce.</li>
                    <li><strong>M&iacute;sto, kde akce proběhne.</strong> Ide&aacute;ln&iacute;m m&iacute;stem jsou tř&iacute;dy, knihovny, konferenčn&iacute; s&aacute;ly i různ&eacute; veřejn&eacute; prostory.</li>
                    <li><strong>Poč&iacute;tače a internetov&eacute; připojen&iacute;.</strong> V z&aacute;vislosti na c&iacute;lov&eacute; skupině můžete &uacute;častn&iacute;ky pož&aacute;dat, aby si každ&yacute; přinesl vlastn&iacute; notebook.</li>

                    <li><strong>Unplugged programov&aacute;n&iacute;.</strong> K tomu, aby se člověk naučil informatick&eacute; my&scaron;len&iacute;, vlastně nepotřebuje poč&iacute;tač ani internetov&eacute; připojen&iacute;. Pod&iacute;vejte se pro zač&aacute;tek na <a href="/training/coding-without-computers">&Scaron;kolic&iacute; materi&aacute;ly o unplugged programov&aacute;n&iacute;</a>.</li>


                    <li><strong>Studijn&iacute; materi&aacute;ly.</strong> Ukažte &uacute;častn&iacute;kům, jak z&aacute;bavn&eacute; je vytvořit něco vlastn&iacute;ho. Pod&iacute;vejte se na na&scaron;i <a
                                href="/resources">str&aacute;nku o zdroj&iacute;ch</a> a <a href="/training">&scaron;kolic&iacute; materi&aacute;ly</a> s video kurzy a &scaron;kolic&iacute;mi pl&aacute;ny a upravte si je podle potřeb va&scaron;&iacute; skupiny.</li>


                    <li><strong>Registrace &uacute;častn&iacute;ků.</strong> Pokud m&aacute;te k dispozici omezen&yacute; prostor, můžete použ&iacute;vat n&aacute;stroje online, jako jsou <a href="https://docs.google.com/forms/">formul&aacute;ře Google</a> a <a
                                href="https://www.eventbrite.com/">Eventbrite</a> k registraci &uacute;častn&iacute;ků.</li>
                    <li>Nezapomeňte <a href="/add">přidat svou akci</a> na <a href="/events">mapu T&yacute;dne programov&aacute;n&iacute;</a>!</li>
                </ul>


                <h2>Jak svou aktivitu zorganizovat?</h2>
                <ul>
                    <li>Jak&yacute; form&aacute;t bude va&scaron;e programovac&iacute; akce m&iacute;t, je na to v&aacute;s. Doporučujeme ale, abyste do n&iacute; zařadil/a nějakou <strong>praktickou č&aacute;st</strong>, ve kter&eacute; si &uacute;častn&iacute;ci budou moci vytvořit něco vlastn&iacute;ho a/nebo si pohr&aacute;t s nějak&yacute;m hardwarem.</li>
                    <li>Využijte <strong>n&aacute;stroje a technologie</strong> vhodn&eacute; pro va&scaron;i c&iacute;lovou skupinu. Doporučujeme použ&iacute;vat <a href="http://codeweek.eu/resources/">volně dostupn&eacute; open source materi&aacute;ly</a>.</li>

                    <li>Na konci akce vyb&iacute;dněte &uacute;častn&iacute;ky, aby <strong>uk&aacute;zali a předvedli</strong>, co se jim podařilo vytvořit.</li>

                    <li><strong>Nenechte si to pro sebe!</strong> Propagujte a sd&iacute;lejte, co jste dělali během sv&eacute; aktivity, na soci&aacute;ln&iacute;ch s&iacute;t&iacute;ch s použit&iacute;m hashtagu #CodeWeek. Sd&iacute;let lze tak&eacute; na <a
                                href="https://www.facebook.com/groups/774720866253044/">skupině učitelů Evropsk&eacute;ho t&yacute;dne programov&aacute;n&iacute;</a> a na Twitteru (<a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>). Řekněte o tom př&aacute;telům, kolegům pedagogům, m&iacute;stn&iacute;m m&eacute;di&iacute;m a připravte tiskovou zpr&aacute;vu.</li>

                    <li>Nezapomeňte <a href="/add">přidat svou aktivitu</a> na <a href="/events">mapu T&yacute;dne programov&aacute;n&iacute;</a>!</li>


                </ul>


                <h2>Propagačn&iacute; materi&aacute;ly</h2>
                <p>Nejnověj&scaron;&iacute; informace můžete hledat na na&scaron;em <a href="http://blog.codeweek.eu/">blogu</a> a nev&aacute;hejte upravit posledn&iacute; tiskov&eacute; zpr&aacute;vy podle sv&yacute;ch potřeb nebo si vytvořte vlastn&iacute;:</p>
                <ul>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/gearing-celebrate-eu-code-week-2019">Př&iacute;pravy na oslavu Evropsk&eacute;ho t&yacute;dne programov&aacute;n&iacute; 2019</a> (k dispozici v 29 jazyc&iacute;ch)</li>

                </ul>


                <h2>St&aacute;hněte si n&aacute;sleduj&iacute;c&iacute; n&aacute;stroje, kter&eacute; v&aacute;m pomohou do zač&aacute;tku:</h2>
                <ul>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BCommunications%2BToolkit.zip">Komunikačn&iacute; n&aacute;stroje</a></li>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BTeachers%2BToolkit.zip">N&aacute;stroje pro učitele</a></li>
                </ul>

                <h2>Ot&aacute;zky?</h2>Pokud m&aacute;te ot&aacute;zky k organizov&aacute;n&iacute; a propagaci sv&eacute; #CodeWeek akce, obraťte se na <a href="/ambassadors">ambasadory Evropsk&eacute;ho t&yacute;dne programov&aacute;n&iacute;</a> ve sv&eacute; zemi.</div>
        </div>
    </section>@endsection