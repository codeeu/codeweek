@extends('layout.base') @section('content')<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
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


                            <h2 data-caption-animate="fadeInUp">ΕΥΡΩΠΑΪΚΗ ΕΒΔΟΜΑΔΑ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΥ</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200"><a
                                        href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a></p>
                        </div>
                    </div>
                </div>
            </div><a href="#" data-scrollto="#section-codeweek" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a></div>


    </div><!-- Page Sub Menu --><div id="page-menu">

        <div id="page-menu-wrap">

            <div class="container clearfix">

                <div class="menu-title"><span>Ευρωπαϊκή</span> Εβδομάδα Προγραμματισμού</div>

                <nav class="one-page-menu">
                    <ul>
                        <li><a href="#section-join" data-href="#section-join"><div>Δήλωσε συμμετοχή</div></a></li>
                        <li><a href="#section-partners" data-href="#section-partners"><div>Εταίροι</div></a></li>
                        <li><a href="#section-contact" data-href="#section-contact"><div>Επικοινωνία</div></a></li>
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
                            <h4>ΤΙ ΕΙΝΑΙ;</h4>
                        </div>

                        <p>Η Ευρωπαϊκή Εβδομάδα Προγραμματισμού είναι μια πρωτοβουλία βάσης που έχει ως στόχο να κάνει τον προγραμματισμό και τον ψηφιακό γραμματισμό προσιτό σε όλους, με διασκεδαστικό και ενδιαφέροντα τρόπο.</p>



                    </div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>ΠΟΤΕ;</h4>
                        </div>

                        <p>6-21 Οκτωβρίου 2018</p>


                    </div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>ΓΙΑΤΙ;</h4>
                        </div>

                        <p>Η εκμάθηση συγγραφής κώδικα μας βοηθάει να κατανοούμε τον κόσμο που εξελίσσεται ταχύτατα γύρω μας, να διευρύνουμε τις γνώσεις μας για τον τρόπο λειτουργίας της τεχνολογίας και να αναπτύσσουμε δεξιότητες και ικανότητες, ώστε να ανακαλύπτουμε νέες ιδέες και να καινοτομούμε.</p>



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
                    <h2>ΔΗΛΩΣΕ ΣΥΜΜΕΤΟΧΗ!</h2><span></span></div>

                <div class="container clearfix">


                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>ΔΙΟΡΓΑΝΩΣΕ ΜΙΑ ΔΡΑΣΤΗΡΙΟΤΗΤΑ</h4>
                        </div>

                        <p>Γίνε κι εσύ μέρος της Εβδομάδας Προγραμματισμού διοργανώνοντας μια δραστηριότητα. Κάνε τη διαφορά προσφέροντας έμπνευση και κίνητρο σε άλλους.</p>

                        <p>Οποιοσδήποτε μπορεί να διοργανώσει μια δραστηριότητα. Απλώς διάλεξε ένα θέμα και ένα κοινό-στόχο και <a
                                    href="/add">πρόσθεσε τη δραστηριότητά σου</a> στον <a
                                    href="/events">χάρτη</a>. Μπορείς να χρησιμοποιήσεις μάλιστα και την <a
                                    href="/guide">εργαλειοθήκη των διοργανωτών</a> για να ξεκινήσεις.</p>

                        <p>Αν χρειάζεσαι βοήθεια ή έχεις κάποια απορία μπορείς να επικοινωνήσεις με τους <a
                                    href="/ambassadors">Πρέσβεις της Ευρωπαϊκής Εβδομάδας Προγραμματισμού</a> της χώρας σου.</p><a href="/events" class="button button-border button-rounded button-large">ΓΙΝΕ ΔΙΟΡΓΑΝΩΤΗΣ</a></div>

                    <div class="col_one_third">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>ΔΗΛΩΣΕ ΣΥΜΜΕΤΟΧΗ ΣΕ ΜΙΑ ΔΡΑΣΤΗΡΙΟΤΗΤΑ</h4>
                        </div>

                        <p>Η συγγραφή κώδικα τους αφορά όλους. Δοκίμασε κάτι καινούργιο και ανακάλυψε πόσο διασκεδαστική είναι η συγγραφή κώδικα συμμετέχοντας σε <a
                                    href="/events">μια δραστηριότητα στην περιοχή σου</a>.</p>

                        <p>Υπάρχουν πολλές εκδηλώσεις για κάθε ηλικία καθώς και ποικιλία θεμάτων. Η συμμετοχή είναι δωρεάν και δεν υπάρχουν προϋποθέσεις συμμετοχής.</p>

                        <p>Επίσης, υπάρχει ένας <a href="/resources/">κατάλογος πόρων</a> που θα σε βοηθήσουν να ξεκινήσεις να μαθαίνεις για τον προγραμματισμό στο διαδίκτυο αμέσως τώρα.</p><a href="/events" class="button button-border button-rounded button-large">ΠΕΡΙΗΓΗΣΟΥ ΣΤΙΣ ΔΡΑΣΤΗΡΙΟΤΗΤΕΣ</a></div>

                    <div class="col_one_third col_last">

                        <div class="heading-block fancy-title nobottomborder title-bottom-border">
                            <h4>ΕΝΗΜΕΡΩΣΕ ΚΙ ΑΛΛΟΥΣ</h4>
                        </div>

                        <p>Βοήθησε τον σκοπό μας <a href="http://blog.codeweek.eu">ενημερώνοντας κι άλλους</a>, έτσι ώστε και άλλοι άνθρωποι να μάθουν για την Εβδομάδα Προγραμματισμού. Αν γνωρίζεις άτομα που θα ήθελαν να διοργανώσουν μια εκδήλωση, ενημέρωσέ τους για την Εβδομάδα Προγραμματισμού.</p>

                        <p>Μήπως μπορείς να αφηγηθείς μια ιστορία που μπορεί να αποτελέσει έμπνευση για άλλους; <a href="http://blog.codeweek.eu/submit">Ανάρτησέ την στο ιστολόγιό μας</a> και θα την κοινοποιήσουμε.</p>

                        <p>Θα μας βρεις στο Twitter ως <a href="https://twitter.com/CodeWeekEU">@CodeWeekEU</a>, στο <a
                                    href="https://www.facebook.com/codeEU">Facebook</a> και χρησιμοποιούμε το hashtag <a
                                    href="https://twitter.com/search?q=%23codeweek&amp;f=realtime">#codeweek</a>.</p><a href="http://blog.codeweek.eu" class="button button-border button-rounded button-large">ΔΕΣ ΤΙ ΣΥΜΒΑΙΝΕΙ</a></div>

                    <div class="clear"></div>
                </div>

            </section>

            <section id="section-partners" class="page-section topmargin-lg">
                <div class="container clearfix">

                    <div class="heading-block bottommargin-lg center">
                        <h2>ΕΤΑΙΡΟΙ ΚΑΙ ΧΟΡΗΓΟΙ</h2><span>Βοήθησέ μας να προβληθούμε περισσότερο, αλλά και να αυξήσουμε τον αντίκτυπο της Εβδομάδας Προγραμματισμού.</span><p>Η Εβδομάδα Προγραμματισμού είναι μια πρωτοβουλία βάσης που διαχειρίζονται εθελοντές, και στην οποία συμμετέχουν εκατοντάδες χιλιάδες άνθρωποι από όλον τον κόσμο. Αναζητούμε διαρκώς εταίρους και χορηγούς που θα μας βοηθήσουν να επεκταθούμε. Αν θέλεις να συμμετέχεις στην κοινότητά μας και να γίνεις χορηγός στις δραστηριότητές μας, επικοινώνησε μαζί μας.</p><a href="mailto:info@codeweek.eu" class="button button-border button-rounded button-large">ΕΠΙΚΟΙΝΩΝΙΑ</a></p>
                    </div>

                    <div class="">

                    </div>

                    <div class="clear"></div>

                    @include('static.sponsors')

                </div>
            </section>

            <section id="section-contact" class="page-section section">

                <div class="heading-block title-center">
                    <h2>ΕΠΙΚΟΙΝΩΝΗΣΕ ΜΑΖΙ ΜΑΣ</h2><span>Έχεις άλλες απορίες; Απλώς <a href="mailto:info@codeweek.eu">γράψε μας</a>.</span></div>

            </section>

        </div>

    </section><!-- #content end --> @endsection @push('scripts')
    @include('static.countdown')
@endpush @section('extra-css')<style> .section-intro, .section-banner { background: transparent; } </style>@endsection