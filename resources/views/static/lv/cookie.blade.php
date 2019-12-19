@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Sīkfailu politika</h1>

            <h3><strong>Kas ir sīkfaili?</strong></h3>

            <p>
            <div>Sīkfails ir sīks teksta fails, ko tīmekļa vietne saglabā jūsu datorā vai mobilajā ierīcē, kad jūs apmeklējat attiecīgo vietni.</div>

            <div>
                <ul>
                    <li><strong>Pirmās puses sīkfaili</strong> ir sīkfaili, kurus iestata tīmekļa vietne, kuru jūs apmeklējat. Tos var lasīt tikai attiecīgā tīmekļa vietne. Papildus tam tīmekļa vietne var izmantot arī ārējus pakalpojumus, kas arī iestata paši savus sīkfailus, kas pazīstami kā <strong>trešo pušu sīkfaili</strong>.</li>
                    <li>Pastāvīgie sīkfaili ir sīkfaili, kurus saglabā jūsu datorā un kurus automātiski neizdzēš, kad jūs aizverat pārlūkprogrammu, pretstatā sesijas sīkfailiem, kurus izdzēš, kad jūs aizverat pārlūkprogrammu.</li>
                </ul>

            </div>

            <p>Pirmoreiz apmeklējot Programmēšanas nedēļas tīmekļa vietni, jums tiks prasīts <strong>akceptēt vai noraidīt sīkfailus</strong>.</p>

            <p>Mērķis ir ļaut vietnei noteiktu laiku atcerēties jūsu preferences (piemēram, lietotājvārdu, valodu u. c.).</p>

            <p>Šādi tiek nodrošināts, ka jums nav katru reizi no jauna jāievada šie dati, kad jūs pārlūkojat vietni viena un tā paša apmeklējuma laikā.</p>

            <p>Sīkfailus var arī izmantot, lai veidotu anonimizētu statistiku par mūsu vietņu pārlūkošanas paradumiem.</p>
            </p>


            <h3><strong>Kā mēs izmantojam sīkfailus?</strong></h3>

            <p>Programmēšanas nedēļas vietne lielākoties izmanto “pirmās puses sīkfailus”. Šos sīkfailus iestatām un pārvaldām mēs, nevis kāda ārēja organizācija.</p>

            <p>Tomēr, lai varētu aplūkot dažas mūsu lapas, jums būs jāakceptē sīkfaili no ārējām organizācijām.</p>

            <div><strong>Mēs izmantojam 3 veidu pirmās puses sīkfailus</strong> šādiem mērķiem:<ul>
                    <li>saglabāt apmeklētāju preferences;</li>
                    <li>nodrošināt mūsu tīmekļa vietņu darbību;</li>
                    <li>vākt analītiskos datus (par lietotāju uzvedību).</li>
                </ul>
            </div>

            <h4>Apmeklētāju preferences</h4>
            <p>Šīs preferences iestatām mēs, un tikai mēs varam tās lasīt. Tās saglabā šādu informāciju:<ul>
                <li>vai jūs piekritāt vai nepiekritāt šīs vietnes sīkfailu politikai</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Nosaukums</th>
                    <th>Pakalpojums</th>
                    <th>Mērķis</th>
                    <th>Sīkfailu veids un ilgums</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Sīkfailu piekrišanas komplekts</td>
                    <td>Saglabā jūsu sīkfailu preferences (lai jums netiktu jautāts atkārtoti)</td>
                    <td>Pirmās puses sesijas sīkfaili, kurus izdzēš, kad jūs aizverat pārlūkprogrammu</td>
                </tr>

                </tbody>
            </table><br/><h4>Darbības sīkfaili</h4>
            <p>
            <div>Ir tādi sīkfaili, kas mums jāiekļauj, lai nodrošinātu tīmekļa lapu darbību. Šī iemesla dēļ tiem nav nepieciešama jūsu piekrišana. Jo īpaši:<ul>
                    <li>tehniskie sīkfaili, kurus pieprasa noteiktas IT sistēmas</li>
                </ul>
            </div>
            </p><br/><h4>Tehniskie sīkfaili</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Nosaukums</th>
                    <th>Pakalpojums</th>
                    <th>Mērķis</th>
                    <th>Sīkfailu veids un darbības ilgums</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>Nodrošināt drošu sesiju jums jūsu apmeklējuma laikā.</td>
                    <td>Pirmās puses sesijas sīkfaili, kurus izdzēš, kad jūs aizverat pārlūkprogrammu</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>Nodrošināt drošu sesiju jums ilgāku laiku, lai nepieļautu sesijas zaudēšanu, kad tiek aizvērta pārlūkprogramma.</td>
                    <td>Pirmās puses pastāvīgi sīkfaili, 60 mēneši</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Saglabā lietotāja izvēlēto valodu</td>
                    <td>Pirmās puses sesijas sīkfaili, kurus izdzēš, kad jūs aizverat pārlūkprogrammu</td>
                </tr>

                </tbody>
            </table><br/><h4>Analītiskie sīkfaili</h4>

            <p>Mēs šos sīkfailus izmantojam vienīgi iekšējā izpētē, lai noskaidrotu, kā uzlabot pakalpojumu, ko mēs sniedzam visiem mūsu lietotājiem.</p>

            <p>Sīkfaili vienkārši analizē veidu, kā jūs mijiedarbojaties ar mūsu tīmekļa vietni kā anonīms lietotājs (savāktie dati neidentificē jūs personīgi).</p>

            <p>Tāpat šie dati netiek nodoti trešām pusēm vai izmantoti jebkādiem citiem mērķiem. Anonimizēto statistiku var nodot darbuzņēmējiem, kas strādā komunikāciju projektos saskaņā ar līgumiem, kas noslēgti ar Komisiju.</p>

            <p>Tomēr jūs varat brīvi noraidīt šo veidu sīkfailus, izmantojot sīkfailu akceptēšanas logu, kas parādās pirmajā jūsu apmeklētajā lapā, vai arī apmeklējot šo <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">īpašo lapu</a>.</p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Nosaukums</th>
                    <th>Pakalpojums</th>
                    <th>Mērķis</th>
                    <th>Sīkfailu veids un darbības ilgums</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>Tīmekļa analītikas pakalpojums, kura pamatā izmantota <i>Matomo</i> atklātā pirmkoda programmatūra</td>
                    <td>Atpazīst tīmekļa vietnes apmeklētājus (anonīmi — netiek vākta personas informācija par lietotāju).</td>
                    <td>Pirmās puses pastāvīgi sīkfaili, 20 dienas</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Tīmekļa analītikas pakalpojums, kura pamatā izmantota <i>Matomo</i> atklātā pirmkoda programmatūra</td>
                    <td>Identificē lapas, kuras viens un tas pats lietotājs aplūko viena apmeklējuma laikā. (Anonīmi — netiek vākta personas informācija par lietotāju).</td>
                    <td>Pirmās puses pastāvīgi sīkfaili, 30 minūtes</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Trešās puses sīkfaili</strong></h3>

            <div>
                <p>Dažās mūsu lapās tiek parādīts saturs no ārējiem pakalpojumu sniedzējiem, piemēram, <i>YouTube</i>, <i>Facebook</i> un <i>Twitter</i>.</p>

                <p>Lai aplūkotu šo trešo pušu saturu, jums vispirms ir jāakceptē to īpašie noteikumi. Tas ietver šo pušu sīkfailu politiku, kuru mēs nekontrolējam.</p>

                <p>Taču, ja jūs neaplūkojat šo saturu, trešās puses sīkfaili jūsu ierīcē netiek instalēti.</p>Trešo pušu pakalpojumu sniedzēji Programmēšanas nedēļas vietnē<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Programmēšanas nedēļas tīmekļa vietne nekontrolē šo trešo pušu pakalpojumus. Pakalpojumu sniedzēji var jebkurā laikā mainīt to pakalpojumu sniegšanas noteikumus, mērķi, sīkfailu lietošanas veidu u. tml.</div><br/><h3><strong>Kā jūs varat pārvaldīt sīkfailus?</strong></h3>

            <p>Jūs varat <strong>pārvaldīt/dzēst</strong> sīkfailus pēc saviem ieskatiem — sīkāku informāciju sk. <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Sīkfailu dzēšana no jūsu ierīces</strong></p>

            <p>Jūs varat izdzēst visus jūsu ierīcē esošos sīkfailus, notīrot jūsu pārlūkprogrammas pārlūkošanas vēsturi. Šādi tiek izdzēsti visi sīkfaili no visām jūsu apmeklētajām tīmekļa vietnēm.</p>

            <p>Lūdzam ņemt vērā, ka šādi jūs varat zaudēt arī daļu saglabātās informācijas (piemēram, saglabāto pieteikšanās informāciju, vietņu preferences).</p><strong>Vietnei raksturīgu sīkfailu pārvaldība</strong><p>Lai detalizētāk pārvaldītu vietnei raksturīgus sīkfailus, iepazīstieties ar privātuma un sīkfailu iestatījumiem jūsu izmantotajā pārlūkprogrammā</p><strong>Sīkfailu bloķēšana</strong><p>Lielāko daļu mūsdienu pārlūkprogrammu var iestatīt tā, lai nepieļautu nekādu sīkfailu ievietošanu jūsu ierīcē, bet jums var nākties pēc tam manuāli pielāgot noteiktas preferences ik reizi, kad jūs apmeklējat kādu vietni/lapu. Tāpat ir iespējams, ka daļa pakalpojumu vai funkciju var vispār nedarboties (piemēram, pieteikšanās profilā).</p><strong>Mūsu analītisko sīkfailu pārvaldība</strong><p>Jūs varat pārvaldīt jūsu sīkfailu preferences attiecībā uz mūsu veikto analīzi <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">īpašajā lapā.</a></p>


        </section>

    </section>@endsection
