@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ ΧΩΡΙΣ ΥΠΟΛΟΓΙΣΤΕΣ (ΧΩΡΙΣ ΣΥΝΔΕΣΗ ΣΤΟ ΔΙΑΔΥΚΤΙΟ)</h1><span>του Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Ο προγραμματισμός είναι η γλώσσα των πραγμάτων που μας επιτρέπει να συγγράφουμε προγράμματα ώστε να προσδίδουμε νέες λειτουργικές δυνατότητες σε δεκάδες δισεκατομμύρια προγραμματίσιμων αντικειμένων γύρω μας. Ο προγραμματισμός είναι ο ταχύτερος τρόπος να υλοποιήσουμε τις ιδέες μας και ο αποτελεσματικότερος τρόπος να αναπτύξουμε τις ικανότητες μας σε θέματα υπολογιστικής σκέψης. Ωστόσο, η τεχνολογία δεν είναι απολύτως απαραίτητη για την ανάπτυξη της υπολογιστικής σκέψης. Αντιθέτως, οι δικές μας δεξιότητες υπολογιστικής σκέψης είναι ουσιαστικής σημασίας προκειμένου να λειτουργήσει η τεχνολογία.</p>

                    <p>Σε αυτό το βίντεο ο Alessandro Bogliolo, καθηγητής συστημάτων πληροφορικής στην Ιταλία και συντονιστής της Ευρωπαϊκής Εβδομάδας Προγραμματισμού, παρουσιάζει δραστηριότητες προγραμματισμού εκτός διαδικτύου, στις οποίες μπορεί κανείς να εξασκηθεί χωρίς καμία ηλεκτρονική συσκευή. Ο βασικός σκοπός των δραστηριοτήτων χωρίς σύνδεση στο διαδίκτυο είναι να υποβαθμιστούν οι φραγμοί πρόσβασης, ώστε ο προγραμματισμός να εισέλθει σε κάθε σχολείο, ανεξαρτήτως από τη διαθέσιμη χρηματοδότηση κι εξοπλισμό.</p>

                    <p>Οι δραστηριότητες προγραμματισμού χωρίς σύνδεση στο διαδίκτυο αποκαλύπτουν πλευρές της υπολογιστικής λογικής του φυσικού κόσμου που μας περιβάλλει.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Κατεβάστε τα λόγια του βίντεο σε μορφή κειμένου</a></p>

                    <h2>Έτοιμοι να μεταδώσετε όσα μάθατε στους μαθητές σας;</h2>

                    <p>Επιλέξτε ένα από τα προγράμματα διδασκαλίας παρακάτω και διοργανώστε μια δραστηριότητα με τους μαθητές σας.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">Δραστηριότητα 1 &ndash; CodyRoby για το Δημοτικό</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">Δραστηριότητα 2 &ndash; CodyRoby για το Γυμνάσιο</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">Δραστηριότητα 3 &ndash; CodyRoby για το Λύκειο</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection