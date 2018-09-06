@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Liituge ELi programmeerimisn&auml;dalaga Code Week ja hakake korraldamine #codeEU &uuml;ritusi</h1><span></span><div><a href="/add" target="_blank" class="btn btn-xl mt-8">Registreerige oma &uuml;ritus siin</a></div>
                    </div>


                </div>


                <h4><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/codeeu_toolkit.pdf"
                       alt="#codeEU Toolkit"><i class="fa fa-download"></i> Laadige alla k&otilde;ik #codeEU PDF-vormingus abivahendid</a></h4>
                <h2>#codeEU abivahendid</h2>
                <h2>Mida programmeerimisn&auml;dal Code Week endast kujutab?</h2>
                <p>ELi programmeerimisn&auml;dal Code Week on rohujuuretasandil toimuv liikumine, mida veavad <a
                            href="/ambassadors">programmeerimisn&auml;dala Code Week vabatahtlikest saadikud</a>. K&otilde;ik koolid, &otilde;petajad, raamatukogud, programmeerimisklubid, ettev&otilde;tted ja ametiasutused v&otilde;ivad luua #CodeEU &uuml;rituse ja lisada selle veebisaidi <a href="/">codeweek.eu</a> kaardile.</p>
                <h2>Kes v&otilde;ivad programmeerimisn&auml;dala Code Week &uuml;ritusi korraldada?</h2>
                <p>K&otilde;ik v&otilde;ivad programmeerimisn&auml;dala Code Week &uuml;ritusi korraldada. </p>
                <ul>
                    <li><strong>Lapsed/teismelised/t&auml;iskasvanud</strong> v&otilde;ivad korraldada programmeerimis&uuml;ritusi ja &otilde;petada teistele koodi loomist.</li>
                    <li><strong>Koolid / huviringid / t&auml;iskasvanute koolitajad</strong> v&otilde;ivad korraldada oma &otilde;pilastele &uuml;ritusi. Programmeerimine on p&otilde;nev ja arendab matemaatilist m&otilde;tlemist!</li>
                    <li><strong>&Otilde;petajad ja raamatukoguhoidjad</strong>, kes oskavad programmeerimist, v&otilde;ivad korraldada programmeerimistunde, jagada oma tunniplaane ja organiseerida t&ouml;&ouml;tubasid.</li>
                    <li><strong>&Otilde;petajad ja raamatukoguhoidjad, kes ei oska programmeerimist,</strong> v&otilde;ivad kutsuda lapsevanemaid v&otilde;i &otilde;pilasi teistele programmeerimist &otilde;petama.</li>
                    <li><strong>Programmeerijad</strong> v&otilde;ivad korraldada kohalikes koolides, keskustes v&otilde;i h&auml;kkimisruumides t&ouml;&ouml;tubasid ning kutsuda inimesi programmeerima.</li>
                    <li><strong>Programmeerimisklubid</strong> v&otilde;ivad korraldada uutele huvilistele t&ouml;&ouml;tubasid ja n&auml;idata neile, kuidas saab luua m&auml;ngu v&otilde;i rakendust.</li>
                    <li><strong>Ettev&otilde;tted ja mittetulundus&uuml;hingud</strong> v&otilde;ivad korraldada programmeerimise t&ouml;&ouml;tubasid ja p&otilde;nevaid v&auml;ljakutseid, &bdquo;laenata&ldquo; oma t&ouml;&ouml;tajaid erinevatele &uuml;ritustele &otilde;petama ning pakkuda programmeerimis&uuml;ritustele sponsorlust.</li>
                </ul>

                <h2>Mida &uuml;rituse jaoks vaja on?</h2>
                <ul>
                    <li><strong>Inimesi, kes soovivad &otilde;ppida.</strong> N&auml;iteks s&otilde;pru, lapsi, teismelisi, t&auml;iskasvanud kolleege, lapsevanemaid v&otilde;i vanavanemaid. Pidage meeles, et kaks ongi juba grupp!</li>
                    <li><strong>Juhendajaid v&otilde;i &otilde;petajaid</strong>, kes oskavad programmeerimist ja oskavad seda ka teistele inspireerivalt edasi anda. Inimeste arv s&otilde;ltub &uuml;rituse t&uuml;&uuml;bist ja suurusest. Praktilises t&ouml;&ouml;toas v&otilde;iks iga 5&ndash;8 osaleja kohta olla &uuml;ks juhendaja, kuid see k&otilde;ik s&otilde;ltub olukorrast. Osalejad saavad samuti &uuml;ksteist aidata! Suuremate &uuml;rituste puhul v&otilde;ib piisata ka sellest, kui juhendaja veendub, et osalejatel on k&otilde;ik vajalik olemas, ja hoiab jooksvalt silma peal.</li>
                    <li><strong>Kohta, kust &uuml;ritust pidada.</strong> Klassiruumid, raamatukogud, konverentsiruumid ja erinevad avalikud ruumid sobivad k&otilde;ik &uuml;rituse korraldamiseks.</li>
                    <li><strong>Arvuteid.</strong> Olenevalt sihtr&uuml;hmast v&otilde;ite paluda osalejatel oma s&uuml;learvutid kaasa v&otilde;tta, kuid sellisel juhul &auml;rge unustage tagada piisavas koguses pistikupesasid.</li>
                    <li><strong>Interneti&uuml;hendust</strong> (Wi-Fi v&otilde;i juhtmega &uuml;hendus). Veenduge, et teie &uuml;hendus tuleks toime l&auml;bituleva liiklusega.</li>
                    <li><strong>Interneti&uuml;henduseta programmeerimine.</strong> Tegelikult ei ole teil programmeerimise &otilde;ppimiseks arvuteid ja interneti&uuml;hendust vaja. Proovige &uuml;henduseta programmeerimist meie <a
                                href="http://codeweek.it/codyroby/">Cody-Roby</a> komplektiga.</li>
                    <li><strong>V&otilde;imalust millegi kallal t&ouml;&ouml;tada ja &otilde;ppida.</strong> N&auml;idake osalejatele, kui l&otilde;bus on midagi ise luua. Tutvuge meie <a href="http://codeweek.eu/resources/">ressursside valikuga</a> ja otsige veebist olemasolevaid tunniplaane, t&ouml;&ouml;tubade programme ja kohandage neid vastavalt oma grupile. Kui teil on toimumiskohas arvutite kasutamise v&otilde;imalus, siis veenduge, et neis on installitud vajalik tarkvaka ning andke osalejatele juhiseid, kuidas nad sama tarkvara ka oma arvutisse installida saaksid.</li>
                    <li><strong>Osalejate registreerimine.</strong> Kui teie ruum on piiratud, siis kasutage veebip&otilde;hiseid registreerumisvorme, nagu Wufoo, Google Forms, v&otilde;i &uuml;rituste jaoks m&otilde;eldud lehek&uuml;lgi Facebookis ja Eventbrite&rsquo;is. Kuigi me pooldame tasuta &uuml;ritusi, v&otilde;ite m&auml;&auml;rata ka v&auml;ikese osalustasu, mis kataks &uuml;rituse korraldamise kulusid. Teine v&otilde;imalus on p&ouml;&ouml;rduda kohalike IT-ettev&otilde;tete v&otilde;i idufirmade poole ja k&uuml;sida sponsorlust.</li>
                    <li><a href="/add">Lisage oma &uuml;ritus</a> programmeerimisn&auml;dala <a href="/">Code Week kaardile</a>!</li>
                </ul>


                <h2>Kuidas &uuml;ritust organiseerida?</h2>
                <ul>
                    <li>Teie programmeerimis&uuml;rituse formaat s&otilde;ltub teie valikust, kuid soovitame lisada natuke aega ka <strong>praktiliseks t&ouml;&ouml;ks</strong>, et osalejad saaksid ka omal k&auml;el luua ja natuke riistvara kallal k&otilde;pitseda.</li>
                    <li>V&otilde;ite kasutada mistahes <strong>vahendeid ja tehnoloogiaid</strong>, kuid meie ise eelistame <a
                                href="http://codeweek.eu/resources/">tasuta k&auml;ttesaadavat vabavara</a>.</li>
                    <li><strong>Naeratust!</strong> Naeratus on t&otilde;eline j&auml;&auml;murdja ja s&otilde;bralik &otilde;hkkond soodustab &otilde;ppimist.</li>
                    <li><strong>Sn&auml;kke ja jooke</strong>. Kui teie &uuml;ritus kestab mitu tundi, siis tuleks lasta osalejatel vahepeal puhata. Kui te ei saa sn&auml;kke ja jooke ise pakkuda, siis paluge osalejatel midagi kaasa v&otilde;tta ja tehke &uuml;hine Rootsi laud.</li>
                    <li>Paluge osalejatel &uuml;rituse l&otilde;ppedes oma t&ouml;id <strong>n&auml;idata ja jagada</strong>. Olge uhked!</li>
                    <li><strong>R&auml;&auml;kige oma &uuml;ritusest!</strong> R&auml;&auml;kige oma &uuml;ritusest sotsiaalmeedias. Kasutage teemaviidet #CodeEU ja @CodeWeekEU. R&auml;&auml;kige oma s&otilde;prade ja ajakirjandusega ning koostage pressiteade!</li>
                    <li>&Auml;rge unustage <a href="/add">oma &uuml;ritust</a> programmeerimisn&auml;dala <a href="/">Code Week kaardile</a> lisada!</li>
                </ul>


                <h2>Reklaammaterjal</h2>
                <p>V&otilde;ite &uuml;rituse reklaamimiseks kasutada k&otilde;iki j&auml;rgmisi pressiteateid.</p>
                <ul>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/eu-code-week-celebrating-its-5th-birthday-7-22-october-get-ready-join-and-learn-how-create-code">ELi programmeerimisn&auml;dal Code Week t&auml;histab 7.&ndash;22.&nbsp;oktoobrini oma viiendat s&uuml;nnip&auml;eva. Olge valmis liituma ja programmeerimist &otilde;ppima!</a></li>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/million-coded-in-record-2016-EU-code-week">Uus rekord ELi programmeerimisn&auml;dala Code Week jaoks: miljon osalejat 2016.&nbsp;aastal</a></li>
                    <li><a href="https://ec.europa.eu/digital-single-market/en/news/save-date-eu-code-week-10-18-october-2015-bringing-ideas-life-codeeu">ELi programmeerimisn&auml;dal Code Week: ideest teostuseni #codeEU</a></li>
                </ul>
                <p>Samuti v&otilde;ite kasutada <a href="https://github.com/codeeu/codeeu-resources/tree/master/Logo - generic">Euroopa programmeerimisn&auml;dala Code Week logo</a>, tingimusel et teie &uuml;ritus vastab meie visioonile.</p>


                <h2>K&uuml;simusi?</h2>
                <p>Kui teil on k&uuml;simusi selle kohta, kuidas korraldada ja reklaamida oma #codeEU &uuml;ritust, siis v&otilde;tke &uuml;hendust oma riigi <a href="/ambassadors">ELi programmeerimisn&auml;dala Code Week saadikutega</a>.</p>


            </div>
        </div>
    </section>@endsection