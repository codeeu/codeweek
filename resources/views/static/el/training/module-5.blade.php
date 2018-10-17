@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>ΑΣΧΟΛΟΥΜΑΣΤΕ ΜΕ ΤΗ ΡΟΜΠΟΤΙΚΗ ΚΑΙ ΤΑ ΜΑΣΤΟΡΕΜΑΤΑ ΜΕΣΑ ΣΤΙΣ ΣΧΟΛΙΚΕΣ ΤΑΞΕΙΣ</h1><span>της Tullia Urschitz</span></div>

                    <hr>

                    <p>Η ενσωμάτωση του προγραμματισμού, του μαστορέματος, της ρομποτικής και της μικροηλεκτρονικής στο σχολικό πρόγραμμα ως εργαλείων διδασκαλίας και μάθησης είναι το κλειδί για την εκπαίδευση του 21ου αιώνα.</p>

                    <p>Η χρήση του μαστορέματος και της ρομποτικής στα σχολεία προσφέρει πολλά οφέλη στους μαθητές, καθώς βοηθάει στην ανάπτυξη κρίσιμων δεξιοτήτων, όπως είναι η επίλυση προβλημάτων, η ομαδική εργασία και η συνεργασία. Επίσης, τονώνει τη δημιουργικότητα και την αυτοπεποίθηση των μαθητών και μπορεί να βοηθήσει τους μαθητές να αναπτύξουν την επιμονή και την αποφασιστικότητά τους απέναντι σε προκλήσεις. Η ρομποτική είναι επίσης ένα πεδίο το οποίο προάγει τον μη αποκλεισμό, καθώς είναι εύκολα προσβάσιμη για ευρύ φάσμα μαθητών με διάφορα ταλέντα και δεξιότητες (τόσο αγόρια όσο και κορίτσια) και έχει θετική επίδραση στους μαθητές στο φάσμα του αυτισμού.</p>

                    <p>Ρίξτε μια ματιά σε αυτό το βίντεο όπου η Tullia Urschitz, πρέσβης της Ιταλίας για το Scientix και δασκάλα θετικών επιστημών, τεχνολογίας, μηχανικής και μαθηματικών στο Sant&rsquo;Ambrogio Di Valpolicella, στην Ιταλία, δίνει ορισμένα πρακτικά παραδείγματα για το πώς οι δάσκαλοι μπορούν να εισαγάγουν το μαστόρεμα και τη ρομποτική στην τάξη, μεταμορφώνοντας έτσι παθητικούς μαθητές σε ενθουσιώδεις κατασκευαστές.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Κατεβάστε τα λόγια του βίντεο σε μορφή κειμένου</a></p>

                    <h2>Έτοιμοι να μεταδώσετε όσα μάθατε στους μαθητές σας;</h2>

                    <p>Επιλέξτε ένα από τα προγράμματα διδασκαλίας παρακάτω και διοργανώστε μια δραστηριότητα με τους μαθητές σας.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Δραστηριότητα 1 - Πώς να κατασκευάσετε ένα μηχανικό χέρι από χαρτόνι στο Δημοτικό</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Δραστηριότητα 2 - Πώς να κατασκευάσετε ένα μηχανικό ή ρομποτικό χέρι στο Γυμνάσιο</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Δραστηριότητα 3 - Πώς να κατασκευάσετε ένα μηχανικό ή ρομποτικό χέρι στο Λύκειο</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection