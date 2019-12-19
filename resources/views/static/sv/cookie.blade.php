@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Policy för kakor</h1>

            <h3><strong>Vad är kakor?</strong></h3>

            <p>
            <div>En kaka, även kallad cookie, är en liten textfil som en webbplats lagrar på din dator eller mobila enhet när du besöker den.</div>

            <div>
                <ul>
                    <li><strong>Förstapartskakor</strong> sätts av den webbplats som du är inne på. Endast den webbplatsen kan läsa dessa kakor. Därutöver kan en webbplats använda sig av externa tjänster som också sätter sina egna kakor, som kallas <strong>tredjepartskakor</strong>.</li>
                    <li>Beständiga kakor är kakor som sparas på din dator och inte automatiskt tas bort när du stänger webbläsaren – i motsats till sessionskakor som tas bort automatiskt.</li>
                </ul>

            </div>

            <p>Första gången du besöker webbplatsen för Codeweek blir du uppmanad att antingen <strong>acceptera eller stänga av kakor.</strong></p>

            <p>Kakorna hjälper webbplatsen att komma ihåg dina inställningar (t.ex. användarnamn och språk) under en viss tid.</p>

            <p>Tanken är att du inte ska behöva göra om inställningarna medan du är inne på webbplatsens olika sidor.</p>

            <p>Kakorna kan också användas för att samla anonym besöksstatistik för våra webbsidor.</p>
            </p>


            <h3><strong>Hur använder vi kakor?</strong></h3>

            <p>Codeweek använder främst ”förstapartskakor”, dvs. kakor som bara sätts och kontrolleras av oss och inte av någon extern organisation.</p>

            <p>En del av våra sidor kan du dock bara se om du accepterar kakor från externa organisationer. </p>

            <div>De <strong>tre olika typer av förstapartskakor</strong> vi använder är till för att<ul>
                    <li>spara dina inställningar,</li>
                    <li>få webbplatsen att fungera,</li>
                    <li>samla in analysdata (besöksstatistik).</li>
                </ul>
            </div>

            <h4>Kakor med besökares inställningar</h4>
            <p>De här kakorna sätter vi själva och vi är de enda som kan läsa dem. De kommer ihåg<ul>
                <li>om du har accepterat webbplatsens kakor (eller om du har stängt av dem)</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Namn</th>
                    <th>Användning</th>
                    <th>Syfte</th>
                    <th>Typ av kaka och varaktighet</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Cookie consent kit</td>
                    <td>Lagrar dina kakinställningar (så att du inte behöver bli tillfrågad igen)</td>
                    <td>Förstaparts sessionskaka som tas bort när du stänger webbläsaren</td>
                </tr>

                </tbody>
            </table><br/><h4>Funktionskakor</h4>
            <p>
            <div>En del kakor måste vi sätta för att vissa webbsidor ska fungera. Av den anledningen kräver de inte ditt samtycke. Det här gäller framför allt<ul>
                    <li>tekniska kakor som vissa IT-system behöver </li>
                </ul>
            </div>
            </p><br/><h4>Tekniska kakor</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Namn</th>
                    <th>Användning</th>
                    <th>Syfte</th>
                    <th>Typ av kaka och varaktighet</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>Ser till att din session är säker under ditt besök.</td>
                    <td>Förstaparts sessionskaka som tas bort när du stänger webbläsaren</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>Ser till att din session är säker under en längre tid så att du inte förlorar sessionen när webbläsaren stängs.</td>
                    <td>Beständig förstapartskaka, 60 månader</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Lagrar användarens språkinställningar</td>
                    <td>Förstaparts sessionskaka som tas bort när du stänger webbläsaren</td>
                </tr>

                </tbody>
            </table><br/><h4>Analyskakor</h4>

            <p>De här kakorna använder vi bara internt för att se hur vi kan förbättra de tjänster vi tillhandahåller till alla våra användare.</p>

            <p>Kakorna används bara för att analysera hur du använder vår webbplats – som en anonym besökare (de uppgifter som samlas in kan inte användas för att identifiera dig personligen).</p>

            <p>Uppgifterna delas inte heller med utomstående och används inte i andra syften. Den anonyma besöksstatistiken kan komma att delas med underleverantörer som arbetar med kommunikationsprojekt på uppdrag av kommissionen.</p>

            <p>Du kan dock stänga av den här typen av kakor – antingen i rutan för kakor på den första sidan du kommer in på eller genom att besöka den här <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">webbplatsen</a>.</p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Namn</th>
                    <th>Användning</th>
                    <th>Syfte</th>
                    <th>Typ av kaka och varaktighet</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>Besöksstatistik (Matomo-programvara med öppen källkod)</td>
                    <td>Räknar webbplatsbesök (anonymt – inga personuppgifter samlas in)</td>
                    <td>Beständig förstapartskaka, 20 dagar</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Besöksstatistik (Matomo-programvara med öppen källkod)</td>
                    <td>Identifierar vilka sidor du besöker under ett och samma besök. (anonymt – inga personuppgifter samlas in).</td>
                    <td>Beständig förstapartskaka, 30 minuter</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Tredjepartskakor</strong></h3>

            <div>
                <p>Några av våra sidor visar innehåll från externa leverantörer, t.ex. Youtube, Facebook och Twitter.</p>

                <p>För att se dessa leverantörers innehåll måste du först godkänna deras särskilda villkor för bland annat kakor, som vi inte har någon kontroll över.</p>

                <p>Om du inte vill se de externa leverantörernas innehåll sätts heller inga tredjepartskakor på din dator.</p>Externa leverantörer på Codeweek<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Dessa tredjepartstjänster ligger utanför Codeweek-webbplatsens kontroll. Leverantörerna kan när som helst ändra sina användarvillkor, syftet med sina kakor, användningen av kakor osv.</div><br/><h3><strong>Hur kan du kontrollera kakor?</strong></h3>

            <p>Du kan <strong>kontrollera och ta bort</strong> kakor precis som du vill. Läs mer på <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Ta bort kakor från din dator</strong></p>

            <p>Du kan ta bort alla kakor som redan finns på din dator genom att rensa webbläsarhistoriken i din webbläsare. På så sätt tar du bort kakorna från alla webbplatser som du besökt.</p>

            <p>Tänk på att du då eventuellt också förlorar vissa sparade uppgifter (t.ex. inloggningsuppgifter och webbplatsinställningar).</p><strong>Kontrollera webbplatsens kakor</strong><p>Välj inställningar för kakor och skydd av personuppgifter i din webbläsare för att detaljstyra webbplatsens användning av kakor.</p><strong>Blockera kakor</strong><p>I de flesta webbläsare kan du ställa in att du inte vill ha några kakor alls på din dator. Eventuellt måste du ändra inställningarna varje gång du går in på en webbplats eller webbsida. Om du blockerar kakor är det möjligt att en del tjänster och funktioner inte stöds längre (t.ex. inloggning med sparade uppgifter).</p><strong>Hantera våra analyskakor</strong><p>Du kan göra inställningar för analyskakor på den <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">särskilda webbplatsen</a>.</p>


        </section>

    </section>@endsection
