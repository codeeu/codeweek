@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>ΥΠΟΛΟΓΙΣΤΙΚΗ ΣΚΕΨΗ ΚΑΙ ΕΠΙΛΥΣΗ ΠΡΟΒΛΗΜΑΤΩΝ</h1><span>του Miles Berry</span></div>

                    <hr>

                    <p>Η υπολογιστική σκέψη περιγράφει έναν τρόπο εξέτασης των προβλημάτων και των συστημάτων ώστε να μπορεί να χρησιμοποιείται υπολογιστής για να μας βοηθάει να τα επιλύουμε ή να τα κατανοούμε. Η υπολογιστική σκέψη δεν είναι θεμελιώδης μόνο για την ανάπτυξη των προγραμμάτων υπολογιστών, αλλά μπορεί επίσης να χρησιμοποιείται για την υποβοήθηση της επίλυσης προβλημάτων σε όλους τους κλάδους.</p>

                    <p>Μπορείτε να διδάξετε την υπολογιστική σκέψη στους μαθητές σας βάζοντάς τους να κατατμήσουν περίπλοκα προβλήματα σε μικρότερα (αποσύνθεση), να αναγνωρίσουν επαναλαμβανόμενες μορφές (αναγνώριση μορφών), να εντοπίσουν τις λεπτομέρειες που είναι καίριες για την επίλυση ενός προβλήματος (αφαίρεση)· ή ορίζοντας τους κανόνες ή τις εντολές που πρέπει να ακολουθηθούν προκειμένου να επιτευχθεί το επιθυμητό αποτέλεσμα (σχεδιασμός αλγόριθμου). Η υπολογιστική σκέψη μπορεί να διδαχθεί μέσα από διάφορα μαθήματα, για παράδειγμα τα μαθηματικά (να καταλάβουν τους κανόνες για την παραγώγιση πολυώνυμων 2ης τάξης), τη λογοτεχνία (να κατατμήσουν την ανάλυση ενός ποιήματος σε ανάλυση μέτρου, ρυθμού και δομής), τις γλώσσες (να βρουν μορφές στα καταληκτικά γράμματα ενός ρήματος που επηρεάζουν την ορθογραφία όταν αλλάζει ο χρόνος), και πολλά άλλα.</p>

                    <p>Σε αυτό το βίντεο, ο Miles Berry, Τακτικός Λέκτορας στο Πανεπιστήμιο του Roehampton στην Παιδαγωγική σχολή του Guildford (Ηνωμένο Βασίλειο), παρουσιάζει την έννοια της υπολογιστικής σκέψης και τους διάφορους τρόπους με τους οποίος ένας δάσκαλος μπορεί να την ενσωματώσει στην τάξη με απλά παιχνίδια.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">Κατεβάστε τα λόγια του βίντεο σε μορφή κειμένου</a></p>

                    <h2>Έτοιμοι να μεταδώσετε όσα μάθατε στους μαθητές σας;</h2>

                    <p>Επιλέξτε ένα από τα προγράμματα διδασκαλίας παρακάτω και διοργανώστε μια δραστηριότητα με τους μαθητές σας.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Δραστηριότητα 1 &ndash; Ανάπτυξη της λογικής των μαθηματικών για το Δημοτικό</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Δραστηριότητα 2 &ndash; Γνωριμία με τους αλγόριθμους για το Γυμνάσιο</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Δραστηριότητα 3 &ndash; Αλγόριθμοι για το Λύκειο</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection