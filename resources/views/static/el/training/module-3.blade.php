@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>ΟΠΤΙΚΟΣ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ &ndash; ΕΙΣΑΓΩΓΗ ΣΤΗ SCRATCH</h1><span>του Margo Tinawi</span></div>

                    <hr>

                    <p>Ο οπτικός προγραμματισμός δίνει στους ανθρώπους τη δυνατότητα να περιγράψουν διαδικασίες χρησιμοποιώντας εικονογραφήσεις ή γραφήματα. Συνήθως μιλάμε για οπτικό προγραμματισμό σε αντιπαράθεση με τον προγραμματισμό που βασίζεται σε κείμενο. Οι γλώσσες οπτικού προγραμματισμού (VPLs) ενδείκνυνται ιδιαιτέρως για την παρουσίαση της αλγοριθμικής σκέψης σε παιδιά (αλλά ακόμη και σε ενήλικες). Με τις VPLs υπάρχουν λιγότερα στοιχεία να διάβασμα και δεν υπάρχει θέμα συντακτικού.</p>

                    <p>Σε αυτό το βίντεο, η Margo Tinawi, δασκάλα ανάπτυξης ιστού στο Le Wagon και συνιδρύτρια του Techies Lab asbl (Βέλγιο), θα σας βοηθήσει να ανακαλύψετε τη Scratch, μία από τις πιο δημοφιλείς VPL που χρησιμοποιούνται παγκοσμίως. Η Scratch αναπτύχθηκε από το MIT το 2002, και έκτοτε έχει δημιουργηθεί ευρεία κοινότητα γύρω της, όπου μπορεί κανείς να βρει εκατομμύρια έργων να αντιγράψει με τους μαθητές του και αμέτρητα μαθήματα σε αρκετές γλώσσες.</p>

                    <p>Δεν χρειάζεται να διαθέτετε εμπειρία στον προγραμματισμό για να χρησιμοποιήσετε τη Scratch, και μπορείτε να τη χρησιμοποιήσετε σε όλα τα μαθήματα! Για παράδειγμα, αν χρησιμοποιήσετε τη Scratch ως ψηφιακό εργαλείο αφήγησης ιστοριών, οι μαθητές μπορούν να δημιουργήσουν ιστορίες, να εικονογραφήσουν ένα πρόβλημα μαθηματικών ή να διαδραματίσουν παίζοντας έναν διαγωνισμό τέχνης ώστε να μάθουν περισσότερα για την πολιτιστική κληρονομιά και την υπολογιστική σκέψη, και πάνω από όλα, να διασκεδάσουν.</p>

                    <p>Η Scratch είναι δωρεάν εργαλείο, πολύ εύληπτο και ενδιαφέρον για τους μαθητές σας. Ρίξτε μια ματιά στο βίντεο της Margo για να μάθετε πώς να ξεκινήσετε.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">Κατεβάστε τα λόγια του βίντεο σε μορφή κειμένου</a></p>

                    <h2>Έτοιμοι να μεταδώσετε όσα μάθατε στους μαθητές σας;</h2>

                    <p>Επιλέξτε ένα από τα προγράμματα διδασκαλίας παρακάτω και διοργανώστε μια δραστηριότητα με τους μαθητές σας.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">Δραστηριότητα 1 &ndash; Τα βασικά της Scratch για το Δημοτικό</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">Δραστηριότητα 2 &ndash; Τα βασικά της Scratch για το Γυμνάσιο</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">Δραστηριότητα 3 &ndash; Τα βασικά της Scratch για το Λύκειο</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection