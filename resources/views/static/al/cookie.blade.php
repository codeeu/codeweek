@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Politika e kukive</h1>

            <h3><strong>Çfarë janë kukit?</strong></h3>

            <p>
            <div>Një kuki është një skedar i vogël me tekst që një faqe interneti ruan në kompjuterin ose pajisjen celulare tuaj kur vizitoni faqen.</div>

            <div>
                <ul>
                    <li><strong>Kuki e palës së parë</strong> janë kuki të vendosura nga faqja e internetit që po vizitoni. Vetëm ajo faqe interneti mund t'i lexojë ato. Për më tepër, një faqe interneti mund të përdorë shërbime të jashtme, të cilat gjithashtu vendosin kukit e tyre, të njohura si <strong>kuki të palëve të treta</strong>.</li>
                    <li>Kuki këmbëngulëse janë kuki të ruajtura në kompjuterin tuaj dhe që nuk fshihen automatikisht kur mbyllni shfletuesin tuaj, ndryshe nga një kuki seance, e cila fshihet kur mbyllni shfletuesin.</li>
                </ul>

            </div>

            <p>Herën e parë që vizitoni faqen e internetit të Codeweek, do t'ju kërkohet <strong>të pranoni ose refuzoni kukit</strong>.</p>

            <p>Qëllimi është të lejohet faqja të mbajë mend preferencat tuaja (siç janë emri i përdoruesit, gjuha, etj.) për një periudhë kohore të caktuar.</p>

            <p>Në atë mënyrë, nuk do t’ju duhet ti rishkruani kur të kërkoni nëpër faqe gjatë të njëjtës vizitë.</p>

            <p>Kukit gjithashtu mund të përdoren për të vendosur statistika anonimizuese në lidhje me përvojën e shfletimit në faqet tona.</p>
            </p>


            <h3><strong>Si i përdorim kukit?</strong></h3>

            <p>Codeweek përdor kryesisht “kuki të palës së parë”. Këto janë kuki të vendosura e kontrollohen nga ne dhe jo nga ndonjë organizatë e jashtme.</p>

            <p>Sidoqoftë, për të parë disa nga faqet tona, do t'ju duhet të pranoni kuki nga organizata të jashtme.</p>

            <div><strong>3 llojet e kukive të palës së parë</strong> që ne përdorim janë për:<ul>
                    <li>të ruajtur preferencat e vizitorëve të dyqaneve</li>
                    <li>t’i bërë funksionale faqet e internetit</li>
                    <li>të mbledhur të dhëna analitike (në lidhje me sjelljen e përdoruesit)</li>
                </ul>
            </div>

            <h4>Preferencat e vizitorëve</h4>
            <p>Këto vendosen nga ne dhe vetëm ne mund t'i lexojmë ato. Ato kujtojnë:<ul>
                <li>nëse keni pranuar (ose refuzuar) politikën e kukive të kësaj faqeje</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Emri</th>
                    <th>Shërbimi</th>
                    <th>Qëllimi</th>
                    <th>Lloji dhe kohëzgjatja e kukive</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Paketa e pëlqimit të kukive</td>
                    <td>Ruan preferencat tuaja të kukive (kështu që nuk pyeteni përsëri)</td>
                    <td>Kukit e seancës së palës së parë fshihen pasi mbyllni shfletuesin</td>
                </tr>

                </tbody>
            </table><br/><h4>Kuki operative</h4>
            <p>
            <div>Ka disa kuki që duhet t'i përfshijmë në mënyrë që disa faqe interneti të funksionojnë. Për këtë arsye, ato nuk kërkojnë pëlqimin tuaj. Veçanërisht:<ul>
                    <li>Kuki teknike të kërkuara nga disa sisteme TI</li>
                </ul>
            </div>
            </p><br/><h4>Kuki teknike</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Emri</th>
                    <th>Shërbimi</th>
                    <th>Qëllimi</th>
                    <th>Lloji dhe kohëzgjatja e kukive</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>E ruan seancën të sigurt për ju, gjatë vizitës suaj.</td>
                    <td>Kukit e seancës së palës së parë fshihen pasi mbyllni shfletuesin</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>E ruan seancën të sigurt për ju për kohë më të gjatë duke mos lejuar të humbni seancën me mbylljen e shfletuesit.</td>
                    <td>Kuki këmbëngulëse të palës së parë, 60 muaj</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Ruan gjuhën e preferuar të përdoruesit</td>
                    <td>Kukit e seancës së palës së parë fshihen pasi mbyllni shfletuesin</td>
                </tr>

                </tbody>
            </table><br/><h4>Kuki analitike</h4>

            <p>Ne i përdorim këto vetëm për kërkime të brendshme se si mund të përmirësojmë shërbimin që u ofrojmë të gjithë përdoruesve tanë.</p>

            <p>Kukit vetëm vlerësojnë se si bashkëveproni me faqen tonë të internetit - si përdorues anonim (të dhënat e mbledhura nga to nuk ju identifikojnë personalisht).</p>

            <p>Gjithashtu, këto të dhëna nuk ndahen me asnjë palë të tretë ose nuk përdoren për ndonjë qëllim tjetër. Statistika të anonimizuara mund të shpërndahen me kontraktorët që punojnë në projekte të komunikimit në bazë të marrëveshjes kontraktuale me Komisionin.</p>

            <p>Sidoqoftë, ju jeni të lirë t’i refuzoni këto lloje të kukive - qoftë përmes banderolës së kukive që shihni në faqen e parë që vizitoni ose duke vizituar këtë <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">faqe të dedikuar</a>.</p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Emri</th>
                    <th>Shërbimi</th>
                    <th>Qëllimi</th>
                    <th>Lloji dhe kohëzgjatja e kukive</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>Shërbim analitik interneti, bazuar në softuerin me burim të hapur Matomo</td>
                    <td>Njeh vizitorët e faqes së internetit (në mënyrë anonime - nuk mblidhet informacion personal nga përdoruesi).</td>
                    <td>Kuki këmbëngulëse e palës së parë, 20 ditë</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Shërbim analitik interneti, bazuar në softuerin me burim të hapur Matomo</td>
                    <td>Identifikon faqet e shikuara nga i njëjti përdorues gjatë së njëjtës vizitë. (në mënyrë anonime - nuk mblidhet informacion personal nga përdoruesi).</td>
                    <td>Kuki këmbëngulëse e palës së parë, 30 minuta</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Kuki e palëve të treta</strong></h3>

            <div>
                <p>Disa nga faqet tona shfaqin përmbajtje nga ofrues të jashtëm, p.sh. YouTube, Facebook dhe Twitter.</p>

                <p>Për të parë këtë përmbajtje të palëve të treta, së pari duhet të pranoni termat dhe kushtet e tyre specifike. Kjo përfshin politikat e tyre të kukive, të cilat nuk i kontrollojmë ne.</p>

                <p>Por nëse nuk e shihni këtë përmbajtje, asnjë kuki e palëve të treta nuk është instaluar në pajisjen tuaj.</p>Ofruesit e palëve të treta në Codeweek<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Këto shërbime të palëve të treta janë jashtë kontrollit të faqes së internetit Codeweek. Ofruesit munden, në çdo kohë, të ndryshojnë kushtet e tyre të shërbimit, qëllimin dhe përdorimin e kukive etj.</div><br/><h3><strong>Si mund të menaxhoni kukit?</strong></h3>

            <p>Ju mundeni të <strong>menaxhoni/fshini</strong> kukit sipas dëshirës - për detaje, shikoni <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Heqja e kukive nga pajisja juaj</strong></p>

            <p>Ju mund të fshini të gjitha kukit që ndodhen tashmë në pajisjen tuaj duke pastruar historinë e shfletimit të shfletuesit tuaj. Kjo gjë heq të gjitha kukit nga të gjitha faqet e internetit që keni vizituar.</p>

            <p>Duhet të jini të vetëdijshëm se mund të humbni disa informacione të ruajtura (p.sh. detajet e ruajtura të identifikimit, preferencat e faqes).</p><strong>Menaxhimi i kukive specifike të faqes</strong><p>Për një kontroll më të detajuar të kukive specifike të faqes, kontrolloni cilësimet dhe privatësinë e kukive në shfletuesin tuaj të preferuar</p><strong>Kuki bllokuese</strong><p>Ju mund të caktoni shfletuesit më modernë që të parandalojnë vendosjen e kukive në pajisjen tuaj, por atëherë do t'ju duhet të rregulloni manualisht disa preferenca çdo herë që vizitoni një sajt/faqe. Dhe disa shërbime e funksionalitete mund të mos funksionojnë siç duhet (p.sh. identifikimi në profil).</p><strong>Menaxhimi i kukive tona analitike</strong><p>Ju mund të menaxhoni preferencat tuaja në lidhje me kukit nga Analitika jonë në <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">faqen e dedikuar.</a></p>


        </section>

    </section>@endsection
