@extends('layout.base') @section('content')<section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">Tanımlama Bilgisi İlkesi</h1>

            <h3><strong>Tanımlama bilgileri nelerdir?</strong></h3>

            <p>
            <div>Tanımlama bilgisi, siteyi ziyaret ettiğinizde web sitesinin bilgisayarınızda veya mobil cihazınızda depoladığı küçük bir metin dosyasıdır.</div>

            <div>
                <ul>
                    <li><strong>Birinci taraf tanımlama bilgileri</strong>, ziyaret ettiğiniz web sitesi tarafından belirlenen tanımlama bilgileridir. Bu bilgileri yalnızca o web sitesi okuyabilir. Ayrıca, bir web sitesi <strong>birinci taraf tanımlama bilgileri</strong> olarak bilinen kendi tanımlama bilgilerini belirleyen haricî hizmetleri de potansiyel olarak kullanabilir.</li>
                    <li>Kalıcı tanımlama bilgileri, bilgisayarınızda depolanan ve tarayıcınızdan çıktığınızda silinen oturum tanımlama bilgilerinin aksine tarayıcıdan çıktığınızda otomatik olarak silinmeyen tanımlama bilgileridir.</li>
                </ul>

            </div>

            <p>Codeweek web sitesini ilk ziyaretinizde, <strong>tanımlama bilgilerini kabul etmeniz veya reddetmeniz</strong> istenir.</p>

            <p>Burada amaç, sitenin belirli bir süre tercihlerinizi (kullanıcı adı, dil vb.) hatırlamasıdır.</p>

            <p>Bu şekilde, aynı ziyaret esnasında sitede gezinirken bu bilgileri yeniden girmek zorunda kalmazsınız.</p>

            <p>Tanımlama bilgileri ayrıca sitelerimizde gezinme deneyimi hakkında anonim istatistikleri tesis etmek için de kullanılabilir.</p>
            </p>


            <h3><strong>Tanımlama bilgilerini nasıl kullanıyoruz?</strong></h3>

            <p>Codeweek çoğunlukla “birinci taraf tanımlama bilgilerini” kullanır. Bunlar herhangi bir haricî kuruluş tarafından değil, bizim tarafımızdan belirlenen ve denetlenen tanımlama bilgileridir.</p>

            <p>Ancak, sayfalarımızın bazılarını görüntülemek için haricî kuruluşların tanımlama bilgilerini kabul etmeniz gerekir.</p>

            <div>Kullandığımız <strong>3 tür birinci taraf tanımlama bilgisini</strong> şu amaçlarla kullanırız:<ul>
                    <li>ziyaretçi tercihlerini depolamak</li>
                    <li>web sitelerimizi operasyonel hâle getirmek</li>
                    <li>analiz verilerini toplamak (kullanıcı davranışı hakkında)</li>
                </ul>
            </div>

            <h4>Ziyaretçi tercihleri</h4>
            <p>Bu tercihler tarafımızdan belirlenir ve bunları yalnızca biz okuyabiliriz. Bunlar şu unsurları hatırlar:<ul>
                <li>sitenin tanımlama bilgisi ilkesini kabul edip (veya reddedip) etmediğinizi</li>

            </ul>
            </p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Ad</th>
                    <th>Hizmet</th>
                    <th>Amaç</th>
                    <th>Tanımlama bilgisi ve süresi</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>Tanımlama bilgisi onay paketi</td>
                    <td>Tanımlama bilgisi tercihlerinizi depolar (böylece sizden tekrar istenmez)</td>
                    <td>Tarayıcınızdan çıktıktan sonra silinen birinci taraf tanımlama bilgisi</td>
                </tr>

                </tbody>
            </table><br/><h4>Operasyonel tanımlama bilgileri</h4>
            <p>
            <div>Belli web sayfalarının çalışması için dâhil etmemiz gereken bazı tanımlama bilgileri bulunmaktadır. Bu sebeple bu bilgiler onayınızı gerektirmez. Özellikle:<ul>
                    <li>belli BT sistemlerinin gerektirdiği teknik tanımlama bilgileri</li>
                </ul>
            </div>
            </p><br/><h4>Teknik tanımlama bilgileri</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Ad</th>
                    <th>Hizmet</th>
                    <th>Amaç</th>
                    <th>Tanımlama bilgisi ve süresi</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>Ziyaretiniz esnasında sizin için güvenli bir oturum sağlar.</td>
                    <td>Tarayıcınızdan çıktıktan sonra silinen birinci taraf tanımlama bilgisi</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>Sizin için daha uzun süre güvenli bir oturum sağlayarak tarayıcı kapandığında oturumu kaybetmenizi önler.</td>
                    <td>Birinci taraf kalıcı tanımlama bilgisi, 60 ay</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>Kullanıcının tercih ettiği dili depolar</td>
                    <td>Tarayıcınızdan çıktıktan sonra silinen birinci taraf tanımlama bilgisi</td>
                </tr>

                </tbody>
            </table><br/><h4>Analiz tanımlama bilgileri</h4>

            <p>Bu bilgileri tamamen tüm kullanıcılarımız için sağladığımız hizmeti nasıl geliştirebileceğimiz hususunda kurum içi araştırma yapmak üzere kullanıyoruz.</p>

            <p>Tanımlama bilgileri basit bir şekilde anonim bir kullanıcı olarak web sitemizle nasıl etkileşime geçtiğinizi değerlendirir (toplanan veriler kişisel olarak kimliğinizi belirlemez).</p>

            <p>Ayrıca, bu veriler üçüncü taraflarla paylaşılmaz ve başka bir amaçla kullanılmaz. Anonimleştirilen istatistikler, Komisyonla sözleşmeye dayalı anlaşma altında iletişim projelerinde çalışan yüklenicilerle paylaşılabilir.</p>

            <p>Ancak, bu tanımlama bilgisi türlerini ziyaret ettiğiniz ilk sayfada göreceğiniz tanımlama bilgisi başlığından veya bu <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">özel sayfayı</a> ziyaret ederek reddedebilirsiniz.</p>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Ad</th>
                    <th>Hizmet</th>
                    <th>Amaç</th>
                    <th>Tanımlama bilgisi ve süresi</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>Matomo açık kaynak yazılımına dayalı web çözümleme hizmeti</td>
                    <td>Web sitesi ziyaretçilerini tanır (anonim olarak - kullanıcı ile ilgili kişisel bilgi toplanmaz).</td>
                    <td>Birinci taraf kalıcı tanımlama bilgisi, 20 gün</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>Matomo açık kaynak yazılımına dayalı web çözümleme hizmeti</td>
                    <td>Aynı ziyaret esnasında aynı kullanıcı tarafından görüntülenen sayfaları belirler. (anonim olarak - kullanıcı ile ilgili kişisel bilgi toplanmaz).</td>
                    <td>Birinci taraf kalıcı tanımlama bilgisi, 30 dakika</td>
                </tr>

                </tbody>
            </table><br/><h3><strong>Birinci taraf tanımlama bilgileri</strong></h3>

            <div>
                <p>Sayfalarımızın bazıları haricî sağlayıcıların içeriğini görüntüler, ör. YouTube, Facebook ve Twitter.</p>

                <p>Üçüncü taraf içeriği görüntülemek için, öncelikle bu sağlayıcılara ait özel hükümleri ve koşulları kabul etmeniz gerekir. Bu, sağlayıcıların, bizim denetimimizde olmayan, tanımlama bilgisi ilkelerini içerir.</p>

                <p>Ancak bu içeriği görüntülemek istemezseniz, cihazınıza hiçbir üçüncü taraf tanımlama bilgisi yüklenmez.</p>Codeweek'teki üçüncü taraf sağlayıcılar<ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>Bu üçüncü taraf hizmetler Codeweek web sitesinin denetimi dışındadır. Sağlayıcılar herhangi bir zamanda hizmet, amaç, tanımlama bilgisi vb. unsurların hükümlerini değiştirebilir.</div><br/><h3><strong>Tanımlama bilgilerini nasıl yönetebilirsiniz?</strong></h3>

            <p>İstediğiniz zaman tanımlama bilgilerini <strong>yönetebilirsiniz/silebilirsiniz</strong> - ayrıntılar için bkz. <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.<p><strong>Tanımlama bilgilerinin cihazınızdan kaldırılması</strong></p>

            <p>Tarayıcınızın göz atma geçmişini temizleyerek, hâlihazırda cihazınızda bulunan tüm tanımlama bilgilerini silebilirsiniz. Bu işlem, tanımlama bilgilerinin tümünü ziyaret ettiğiniz web sitelerinin hepsinden kaldırır.</p>

            <p>Bazı kayıtlı bilgilerinizi de kaybedebileceğinizi göz önünde bulundurun (ör. kayıtlı oturum açma ayrıntıları, site tercihleri).</p><strong>Siteye özel tanımlama bilgilerinin yönetimi</strong><p>Siteye özel tanımlama bilgileri hakkında daha fazla ayrıntı için, tercih ettiğiniz tarayıcıda gizlilik ve tanımlama bilgisi ayarlarını kontrol edin</p><strong>Tanımlama bilgilerinin engellenmesi</strong><p>Çoğu modern tarayıcıyı, tanımlama bilgilerinin cihazınıza yerleştirilmesini önlemek üzere ayarlayabilirsiniz ancak bir siteyi/sayfayı her ziyaret edişinizde bazı tercihleri manuel olarak ayarlamak zorunda kalabilirsiniz. Ve bazı hizmetler ve işlevler düzgün şekilde çalışmayabilir (ör. profil oturum açma).</p><strong>Analiz tanımlama bilgilerimizin yönetimi</strong><p>Tanımlama bilgileri ile ilgili tercihlerinizi <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">özel sayfadaki</a> Analytics uygulamasından yönetebilirsiniz.</p>


        </section>

    </section>@endsection
