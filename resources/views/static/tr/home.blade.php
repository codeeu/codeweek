@extends('layout.base')

@section('content')


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>

    <div id="slider"
         class="slider-parallax full-screen force-full-screen with-header swiper_wrapper page-section clearfix">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark" style="background-image: url('img/codeweek-2018.jpg');width: 100%;">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <div id="countdown-ex1" class="countdown countdown-large coming-soon divcenter bottommargin"
                                 style="max-width:700px;"></div>


                            <h2 data-caption-animate="fadeInUp">CODEWEEK.EU</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200"><a
                                        href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a></p>
                        </div>
                    </div>
                </div>
            </div><a href="#" data-scrollto="#section-codeweek" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a></div>


    </div><!-- Page Sub Menu --><div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title">CodeWeek <span>EU</span></div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Katıl</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Partnerler</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>İrtibat</div></a></li>
                    </ul>
                </nav>

                <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

            </div>

        </div>

    </div><!-- #page-menu end --> <!-- Content --><section id="content">

        <div>


            <section id="section-intro" class="page-section section section-intro">

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Nedir?</h4>
                        </div>

                        <p>AB Kod Haftası, kodlama ve dijital okuryazarlığı eğlenceli ve ilgi &ccedil;ekici bir şekilde herkesin ayağına getirmeyi ama&ccedil;layan bir taban girişimidir.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Ne Zaman?</h4>
                        </div>

                        <p>6-21 Ekim 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Neden?</h4>
                        </div>

                        <p>Kodlamayı &ouml;ğrenmek, &ccedil;evremizde hızla değişen d&uuml;nyayı anlamamıza, teknolojinin nasıl &ccedil;alıştığına dair ufkumuzu genişletmemize ve yeni fikirlerle yenilikleri keşfetmek i&ccedil;in becerilerimizi geliştirip kapasitemizi artırmamıza yardımcı olur.</p>



                    </div>

                </div>

            </section>

            <section id="section-banner-teacher" class="section section-banner">
                <a href="/schools">
                    @include('static.banner_teacher')
                </a>
            </section>


            <section id="section-join" class="page-section section">

                <div class="heading-block center">
                    <h2>Hemen katıl!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Aktivite d&uuml;zenle</h4>
                        </div>

                        <p>Aktivite d&uuml;zenleyerek Kod Haftasının bir par&ccedil;ası olun. Başkalarına ilham verip motivasyon sağlayarak bir fark yaratın.</p>

                        <p>Herkes aktivite d&uuml;zenleyebilir. Konunuzu ve hedef kitlenizi se&ccedil;ip <a
                                    href="/add">aktivitenizi</a> <a
                                    href="/events">haritaya</a> eklemeniz yeterlidir. İşe başlarken <a
                                    href="/guide">organizat&ouml;rler i&ccedil;in ara&ccedil; kitimizi</a> de kullanabilirsiniz.</p>

                        <p>Yardıma ihtiya&ccedil; duyarsanız ya da herhangi bir sorunuz olursa, &uuml;lkenizdeki <a
                                    href="/ambassadors">AB Kod Haftası El&ccedil;ileri</a> ile irtibat kurabilirsiniz.</p><a href="/events" class="button button-border button-rounded button-large">Organizat&ouml;r ol</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Bir aktiviteye katıl</h4>
                        </div>

                        <p>Kodlama herkes i&ccedil;indir. Hadi yeni bir şey deneyin ve <a
                                    href="/events">yakınınızdaki bir etkinliğe katılarak</a> kodlamanın ne kadar eğlenceli bir şey olduğunu keşfedin.</p>

                        <p>Her yaşa uygun farklı konularda pek &ccedil;ok etkinlik mevcuttur. Katılım &uuml;cretsizdir ve herhangi bir &ouml;n koşul bulunmamaktadır.</p>

                        <p>Hemen &ccedil;evrim i&ccedil;i kodlamaya başlamanıza yardımcı olacak <a href="/resources/">bir kaynak listesi</a> de mevcuttur.</p><a href="/events" class="button button-border button-rounded button-large">Aktiviteye g&ouml;z at</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>Haber ver</h4>
                        </div>

                        <p>Daha fazla kişinin Kod Haftası hakkında bilgi edinebilmesi i&ccedil;in <a href="http://blog.codeweek.eu">&ccedil;evrenizdekilere haber vererek</a> etkinliği duyurun. Bir etkinlik d&uuml;zenlemek isteyecek kişiler tanıyorsanız, bu kişileri Kod Haftası hakkında bilgilendirin.</p>

                        <p>Paylaşmak istediğiniz ilham verici bir hikayeniz mi var? <a href="http://blog.codeweek.eu/submit">Blogumuza g&ouml;nderin,</a> paylaşalım.</p>

                        <p>Bize <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a> adı ile Twitter ve <a
                                    href="https://www.facebook.com/codeweek">Facebook</a> &uuml;zerinden ulaşabilirsiniz; paylaşımlarımızda <a
                                    href="https://twitter.com/search?q=%23codeEU&amp;f=realtime">#codeweek</a> etiketini kullanıyoruz.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">Neler oluyor hemen incele</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>Partnerler ve Sponsorlar</h2><span>Kod Haftasının etki alanını genişletmemize yardımcı olun</span><p>Kod Haftası, d&uuml;nya &ccedil;apında y&uuml;z binlerce insana ulaşabilen g&ouml;n&uuml;ll&uuml;ler tarafından y&ouml;netilen bir taban girişimidir. S&uuml;rekli olarak b&uuml;y&uuml;memize yardımcı olacak partnerler ve sponsorlar arıyoruz. Topluluğumuzun bir par&ccedil;ası olmak ve aktivitelerimize sponsorluk yapmak isterseniz, l&uuml;tfen bizimle irtibat kurun.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">İrtibat kur</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>Bizimle irtibat kurun</h2><span>Sorularınız mı var? <a href="mailto:info@codeweek.eu">Bize yazabilirsiniz</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end -->

@endsection
@push('scripts')
    @include('static.countdown')
@endpush
@section('extra-css')
    <style>

        .section-intro, .section-banner {

            background: transparent;

        }

    </style>
@endsection