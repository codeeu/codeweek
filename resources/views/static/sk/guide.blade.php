@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Zorganizujte vlastn&uacute; aktivitu v&nbsp;r&aacute;mci t&yacute;ždňa programovania #CodeWeek</h1><span></span><div><a href="/add" target="_blank" class="btn btn-xl mt-8">Tu m&ocirc;žete zaregistrovať svoju aktivitu</a></div>
                    </div>


                </div>


                <h2>Čo je Eur&oacute;psky t&yacute;ždeň programovania?</h2>
                <p>Eur&oacute;psky t&yacute;ždeň programovania predstavuje hnutie na miestnej &uacute;rovni organizovan&eacute; dobrovoľn&iacute;kmi s&nbsp;podporou Eur&oacute;pskej komisie. Ktokoľvek m&ocirc;že usporiadať program&aacute;torsk&uacute; aktivitu #CodeWeek a&nbsp;pridať ju na mapu na str&aacute;nke <a href="/events">codeweek.eu</a>, či už &scaron;koly, učitelia, knižnice, program&aacute;torsk&eacute; kr&uacute;žky, podniky, alebo verejn&eacute; org&aacute;ny.</p>


                <h2>Čo treba na zorganizovanie aktivity?</h2>
                <ul>
                    <li><strong>Skupinu ľud&iacute;, ktor&iacute; sa chc&uacute; učiť.</strong> M&ocirc;žu to byť va&scaron;i priatelia, deti, t&iacute;nedžeri, dospel&iacute; kolegovia, rodičia, kamar&aacute;ti alebo star&iacute; rodičia. Nezabudnite, že aj dvaja tvoria skupinu!</li>
                    <li><strong>Učiteľov alebo &scaron;koliteľov</strong>, ktor&iacute; maj&uacute; sk&uacute;senosti s&nbsp;programovacou aktivitou a&nbsp;vedia, ako treba učiť či in&scaron;pirovať ostatn&yacute;ch. Ich počet z&aacute;vis&iacute; od typu a&nbsp;veľkosti podujatia.</li>
                    <li><strong>Miesto, kde sa bude &scaron;koliť.</strong> Triedy, knižnice, konferenčn&eacute; s&aacute;ly a&nbsp;rozličn&eacute; verejn&eacute; priestory m&ocirc;žu byť v&yacute;born&yacute;m miestom konania podujatia.</li>
                    <li><strong>Poč&iacute;tače a&nbsp;pripojenie na internet.</strong> Pri zohľadnen&iacute; cieľovej skupiny m&ocirc;žete &uacute;častn&iacute;kov vyzvať, aby si priniesli vlastn&eacute; notebooky.</li>

                    <li><strong>Programovanie bez poč&iacute;tačov.</strong> V&nbsp;skutočnosti nepotrebujete poč&iacute;tače a&nbsp;internetov&eacute; pripojenie, aby ste sa naučili v&yacute;počtov&eacute;mu mysleniu. M&ocirc;žete začať t&yacute;m, že si pozriete <a href="/training/coding-without-computers">Programovanie bez poč&iacute;tačov</a>.</li>


                    <li><strong>Učebn&eacute; materi&aacute;ly.</strong> Uk&aacute;žte &uacute;častn&iacute;kom, ako sa možno zabaviť s&nbsp;vlastn&yacute;mi v&yacute;tvormi. Pozrite si sekciu <a
                                href="/resources">Zdroje</a> a <a href="/training">Pre &scaron;tudentov</a>, kde n&aacute;jdete video n&aacute;vody aj učebn&eacute; pl&aacute;ny. Tie m&ocirc;žete prisp&ocirc;sobiť potreb&aacute;m svojej skupiny.</li>


                    <li><strong>Registrovať &uacute;častn&iacute;kov.</strong> Pri obmedzen&yacute;ch priestorov&yacute;ch možnostiach m&ocirc;žete na registr&aacute;ciu &uacute;častn&iacute;kov využiť online n&aacute;stroje, napr. <a href="https://docs.google.com/forms/">formul&aacute;re Google</a> či <a
                                href="https://www.eventbrite.com/">Eventbrite</a>.</li>
                    <li>Nezabudnite <a href="/add">poznačiť svoju aktivitu</a> na <a href="/events">mapu T&yacute;ždňa programovania</a>!</li>
                </ul>


                <h2>Ako zorganizovať aktivitu?</h2>
                <ul>
                    <li>Form&aacute;t v&aacute;&scaron;ho program&aacute;torsk&eacute;ho podujatia z&aacute;lež&iacute; na v&aacute;s, ale odpor&uacute;čame v&aacute;m, aby ste určit&yacute; <strong>čas vyhradili na praktick&eacute; cvičenia</strong>, v&nbsp;r&aacute;mci ktor&yacute;ch m&ocirc;žu &uacute;častn&iacute;ci samostatne tvoriť a&nbsp;pohrať sa s&nbsp;hardv&eacute;rom.</li>
                    <li>Použ&iacute;vajte <strong>n&aacute;stroje a&nbsp;technol&oacute;gie</strong> primeran&eacute; pre svoju cieľov&uacute; skupinu. Odpor&uacute;čame v&aacute;m využ&iacute;vať <a href="http://codeweek.eu/resources/">voľne dostupn&eacute; materi&aacute;ly z&nbsp;otvoren&yacute;ch zdrojov</a>.</li>

                    <li>Vyzvite &uacute;častn&iacute;kov, aby si na konci podujatia navz&aacute;jom <strong>uk&aacute;zali a&nbsp;predviedli</strong>, čo vytvorili.</li>

                    <li><strong>Hovorte o&nbsp;podujat&iacute;!</strong> Propagujte a&nbsp;spr&iacute;stupňujte v&yacute;sledky svojej aktivity na soci&aacute;lnych m&eacute;di&aacute;ch pod hashtagom #CodeWeek. Zverejniť ich m&ocirc;žete aj v&nbsp;<a
                                href="https://www.facebook.com/groups/774720866253044/">skupine učiteľov Eur&oacute;pskeho t&yacute;ždňa programovania</a> a&nbsp;na Twitteri (<a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>). Povedzte o&nbsp;aktivite priateľom, ďal&scaron;&iacute;m &scaron;koliteľom či miestnej tlači. Vydajte tlačov&uacute; spr&aacute;vu!</li>

                    <li>Nezabudnite <a href="/add">pridať svoju aktivitu</a> na <a href="/events">mapu t&yacute;ždňa programovania</a>!</li>


                </ul>


                <h2>Propagačn&eacute; materi&aacute;ly</h2>
                <p>Najnov&scaron;ie inform&aacute;cie si pozrite na na&scaron;om <a href="http://blog.codeweek.eu/">blogu</a>. Aktu&aacute;lne tlačov&eacute; spr&aacute;vy si pokojne prisp&ocirc;sobte svojim požiadavk&aacute;m alebo si vytvorte svoje vlastn&eacute;:</p>
                <ul>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/gearing-celebrate-eu-code-week-2019">Pr&iacute;prava na oslavy Eur&oacute;pskeho t&yacute;ždňa programovania 2019</a> (k&nbsp;dispoz&iacute;cii v&nbsp;29&nbsp;jazykoch)</li>

                </ul>


                <h2>Ako pom&ocirc;cku si na začiatok stiahnite tieto s&uacute;bory n&aacute;strojov:</h2>
                <ul>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BCommunications%2BToolkit.zip">S&uacute;bor komunikačn&yacute;ch n&aacute;strojov</a></li>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BTeachers%2BToolkit.zip">S&uacute;bor n&aacute;strojov pre učiteľov</a></li>
                </ul>

                <h2>M&aacute;te ot&aacute;zky?</h2>Ak m&aacute;te ot&aacute;zky o&nbsp;organizovan&iacute; a&nbsp;propag&aacute;cii v&aacute;&scaron;ho podujatia #codeEU, obr&aacute;ťte sa na niektor&eacute;ho z&nbsp;<a href="/ambassadors">veľvyslancov Eur&oacute;pskeho t&yacute;ždňa programovania</a> vo va&scaron;ej krajine.</div>
        </div>
    </section>@endsection