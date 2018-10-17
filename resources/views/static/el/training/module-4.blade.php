@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>ΔΗΜΙΟΥΡΓΙΑ ΕΚΠΑΙΔΕΥΤΙΚΩΝ ΠΑΙΧΝΙΔΙΩΝ ΜΕ SCRATCH</h1><span>του Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Κριτική σκέψη, επιμονή, επίλυση προβλημάτων, υπολογιστική σκέψη και δημιουργικότητα είναι μόνο λίγες από τις καίριες δεξιότητες που χρειάζονται οι μαθητές σας για να επιτύχουν στον 21ο αιώνα, και η συγγραφή κώδικα μπορεί να βοηθήσει να επιτευχθούν τα παραπάνω με διασκεδαστικό και ενδιαφέροντα τρόπο.</p>

                    <p>Αλγοριθμικές έννοιες ελέγχου ροής που χρησιμοποιούν αλληλουχία εντολών και βρόγχους, απεικόνιση δεδομένων χρησιμοποιώντας μεταβλητές και λίστες ή συγχρονισμός διεργασιών: όλα τα παραπάνω μπορεί να ηχούν περίπλοκα, αλλά σε αυτό το βίντεο θα ανακαλύψετε ότι είναι ευκολότερο να τα μάθετε από όσο φαντάζεστε.</p>

                    <p>Σε αυτό το βίντεο, ο Jes&uacute;s Moreno Le&oacute;n, δάσκαλος της επιστήμης των υπολογιστών και ερευνητής από την Ισπανία, εξηγεί πώς μπορείτε να αναπτύξετε αυτές και άλλες δεξιότητες στους μαθητές σας, ενώ παράλληλα διασκεδάζουν. Πώς μπορεί να γίνει αυτό; Δημιουργώντας ένα παιχνίδι ερωτήσεων-απαντήσεων σε Scratch, στην πιο δημοφιλή γλώσσα προγραμματισμού που χρησιμοποιείται στα σχολεία παγκοσμίως. Η Scratch δεν ενδυναμώνει μόνο την υπολογιστική σκέψη, άλλα επιτρέπει επίσης την εισαγωγή στοιχείων παιχνιδιού στην τάξη ώστε το ενδιαφέρον των μαθητών σας να παραμένει ζωντανό ενώ παράλληλα μαθαίνουν και διασκεδάζουν.</p>

                    <p>Ρίξτε μια ματιά στο βίντεο για να μάθετε πώς να ξεκινήσετε:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Κατεβάστε τα λόγια του βίντεο σε μορφή κειμένου</a></p>

                    <h2>Έτοιμοι να μεταδώσετε όσα μάθατε στους μαθητές σας;</h2>

                    <p>Επιλέξτε ένα από τα προγράμματα διδασκαλίας παρακάτω και διοργανώστε μια δραστηριότητα με τους μαθητές σας.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Δραστηριότητα 1 - Παιχνίδι ερωτήσεων και απαντήσεων με Scratch για το Δημοτικό</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Δραστηριότητα 2 - Παιχνίδι ερωτήσεων και απαντήσεων με Scratch για το Γυμνάσιο</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Δραστηριότητα 3 - Παιχνίδι ερωτήσεων και απαντήσεων με Scratch για το Λύκειο</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection