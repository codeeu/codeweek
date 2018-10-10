@extends('layout.base')

@section('content')
  <section>
    <div class="container">              @include ('resources.title')
  <h3>Run Marco</h3>
  <p>Ένα Ελληνικό παιχνίδι περιπέτειας που διδάσκει προγραμματισμό σε παιδιά ηλικίας 6-12 ετών.</p>
  <ul>
    <li><a href="https://www.allcancode.com/">all can code</a></li>
  </ul>

  <h3>Υλικό για Python</h3>
  <p>Υλικό για την γλώσσα Python.</p>
  <ul>
    <li><a href="http://pygamegr.wordpress.com/presentations/">Παρουσιάσεις python και pygame</a></li>
    <li>Δύο αυτοτελή φύλλα εργασίας από τις <a href="http://pythonies.mysch.gr/">pythonies</a>: <a href="http://pythonies.mysch.gr/chapters/answer-worksheet.pdf">Η Απάντηση</a> και <a href="http://pythonies.mysch.gr/chapters/guess-standalone.pdf">Μάντεψε τον Αριθμό</a>.</li>
  </ul>

  <h3> Υλικό για Scratch</h3>
  <p>Υλικό για το εργαλείο Scratch.</p>
  <ul>
    <li><a href="http://www.scratchplay.gr/">Ένα βιβλίο για τη δημιουργία παιχνιδιών στο Scratch</a></li>
  </ul>

  <h3>Υλικό για App Inventor</h3>
  <p>Υλικό για το εργαλείο App Inventor.</p>
  <ul>
    <li><a href="{{asset('docs/greece/AppInventor_NXT.pdf')}}">App Inventor και Lego Mindstorm</a></li>
    <li><a href="{{asset('docs/greece/Mole_Mash.pdf')}}">Φτιάχνοντας μία εφαρνογή στο App Inventor</a></li>
    <li><a href="{{asset('docs/greece/quiz_v2.pdf')}}">Δημιουργία κουίζ στο App Inventor</a></li>
    <li><a href="{{asset('docs/greece/AppInvnentor_DB.pdf')}}">Διδασκαλία Βάσεων Δεδομένων με χρήση του AppInventor</a></li>
    <li><a href="{{asset('docs/greece/AppInvnentor_Loop.pdf')}}">H χρήση της δομής επανάληψης ΟΣΟ στο AppInventor</a></li>
    <li><a href="{{asset('docs/greece/AppInventor_if.pdf')}}">H χρήση της δομής επιλογής στο AppInventor</a></li>
    <li><a href="{{asset('docs/greece/AppInventor_IDE.pdf')}}">Εισαγωγή στο διαδικτυακό προγραμματιστικό περιβάλλον AppInventor</a></li>
    <li><a href="{{asset('docs/greece/fe1.pdf')}}">ΦΥΛΛΟ ΕΡΓΑΣΙΑΣ 1 Δημιουργία διεπαφής</a></li>
    <li><a href="{{asset('docs/greece/fe2.pdf')}}">ΦΥΛΛΟ ΕΡΓΑΣΙΑΣ 2 Σύνταξη μπλοκ εντολών</a></li>
    <li><a href="{{asset('docs/greece/fe3.pdf')}}">ΦΥΛΛΟ ΕΡΓΑΣΙΑΣ 3 Σύνταξη μπλοκ εντολών</a></li>
    <li><a href="{{asset('docs/greece/fe4.pdf')}}">ΦΥΛΛΟ ΕΡΓΑΣΙΑΣ 4 Σύνταξη μπλοκ εντολών</a></li>
    <li><a href="{{asset('docs/greece/fe5.pdf')}}">ΦΥΛΛΟ ΕΡΓΑΣΙΑΣ 5 Επανάληψη - Εμπέδωσης</a></li>
    <li><a href="{{asset('docs/greece/fe6.pdf')}}">ΦΥΛΛΟ ΕΡΓΑΣΙΑΣ 6 Περαιτέρω Δραστηριότητες</a></li>
    <li><a href="http://sepchiou.gr/docs/appinventor_code_club/App%20Inventor%20Programming%20(Part%20A).pdf">Ανάπτυξη εφαρμογών σε App Inventor (Μέρος Α)</a> και <a href="http://sepchiou.gr/docs/appinventor_code_club/AppInventor.A.zip">συνοδευτικά αρχεία</a></li>
    <li><a href="http://sepchiou.gr/docs/appinventor_code_club/App%20Inventor%20Programming%20(Part%20B).pdf">Ανάπτυξη εφαρμογών σε App Inventor (Μέρος Β)</a> και <a href="http://sepchiou.gr/docs/appinventor_code_club/AppInventor%20B.zip">συνοδευτικά αρχεία</a></li>
  </ul>

  <h3>Υλικό για ανάπτυξη εφαρμογών Web</h3>
  <p>Υλικό για ανάπτυξη εφαρμογών σε τεχνολογίες του web.</p>
  <ul>
    <li><a href="http://www.academy-of-code.com/el/getstarted/html/lesson/1/step/1">Online εκμάθηση HTML </a></li>
    <li><a href="http://www.academy-of-code.com/el/getstarted/css/lesson/1/step/1">Online εκμάθηση CSS  </a></li>
    <li><a href="http://www.academy-of-code.com/el/getstarted/javascript/lesson/1/step/1">Online εκμάθηση JavaScript </a></li>
    <li><a href="http://www.academy-of-code.com/el/getstarted/php/lesson/1/step/1">Online εκμάθηση PHP </a></li>
    <li><a href="http://www.academy-of-code.com/el/getstarted/mysql/lesson/1/step/1">Online εκμάθηση MySQL </a></li>
    <li><a href="http://www.academy-of-code.com/el">Το Academy of Code</a>, θα σας βοηθήσει:Να εξοικειωθείτε με την επεξεργασία κώδικα -- να επεξεργαστείτε τον κώδικα απλών παιχνιδιών -- να δείτε το αποτέλεσμα και να το μοιραστείτε με την οικογένειά σας και τους φίλους σας.</li>
  </ul>
  
    <h3>Υλικό για δραστηριότητες χωρίς Η/Υ</h3>
  <p>Υλικό για δραστηριότητες χωρίς υπολογιστές.</p>
  <ul>
    <li><a href="http://olympos.greeklug.gr/uploads/Computer_Science.pdf">CS Unplugged (in Greek)</a>, βιβλίο για δραστηριότητες χωρίς υπολογιστές</li>
    <li><a href="http://goo.gl/ttzMWz">Δραστηριότητα Γυμνασίου</a>, προσομοίωση προγραμματισμού στο προαύλιο του σχολείου, σε συνδυασμό με γεωγραφικό εντοπισμό σημείου ενδιαφέροντος.</li>
    <li>Το Έξυπνο Χαρτί: η <a href="http://csunplugged.org/wp-content/uploads/2014/12/intelligent-piece-of-paper.el_.v6.pdf">μετάφραση της δραστηριότητας</a> και <a href="http://www.sepchiou.gr/docs/edu/just%20the%20paper.extended.v5.pdf">επεκτάσεις</a>.</li>
    <li><a href="http://sepchiou.gr/index.php/yliko/unpluggedforfunmenu">Υλικό για Unplugged δραστηριότητες</a> από τον Σύλλογο Εκπαιδευτικών Πληροφορικής Χίου</li>
  </ul>

  <h3>Γενικό υλικό</h3>
  <ul>
    <li><a href="http://www.sepchiou.gr/">Εκπαιδευτικό υλικό</a>, από τον Σύλλογο Εκπαιδευτικών Πληροφορικής Χίου</li>
    <li><a href="https://www.youtube.com/watch?v=M-mqHtFtXiI/">What most schools don't teach</a>, βίντεο από Code.org με Ελληνικούς υπότιτλους</li>
    <li><a href="http://www.koduplay.gr/">Koduplay</a>, βιβλίο και υλικό για τη δημιουργία παιχνιδιών με το MS Kodu</li>
    <li><a href="http://algo.pk/">algo.pk</a>, μία πλατφόρμα με ασκήσεις και προβλήματα στους αλγόριθμους για προγραμματισμό με τον διερμηνευτή του <a href="http://www.pseudoglossa.gr/">pseudoglossa.gr</a></li>
    <li><a href="http://lyk-tragaias.mysch.gr/lightbot/">Lightbot</a>, το παιχνίδι προγραμματισμού lightbot μεταφρασμένο στα Ελληνικά, με επιπλέον πίστες</li>
    <li><a href="http://hellenico.gr">Hellenic Computing Olympiad</a> εκμάθηση, εξάσκηση και online διαγωνισμοί για την αλγοριθμική επίλυση προβλημάτων με τις γλώσσες C/C++/Pascal. Επίσημη ιστοσελίδα προετοιμασίας των μαθητών στην Ελλάδα για τον ΠΔΠ (Πανελλήνιο Διαγωνισμό Πληροφορικής) και τη συμμετοχή τους στην Διεθνή Ολυμπιάδα Πληροφορικής (IOI) και τη Βαλκανική Ολυμπιάδα Πληροφορικής (ΒΟΙ).
  </ul>
  
  <h3>Code Avengers</h3>
  <ul>
    <li><a href="http://www.codeavengers.com/javascript/17?l=el">Μάθε να φτιάχνεις ένα παιχνίδι με την Code Avengers</a> Σε αυτή την 40λεπτη εισαγωγή, θα χρησμοποιήσεις την JavaScript έτσι ώστε να φτιάξεις ένα παιχνίδι το οποίο θα μπορείς να μοιραστείς με τους φίλους σου.</li>
  </ul>

      <ul>
        <li>
          <a href="https://www.apple.com/swift/playgrounds/" target="_blank">Swift Playgrounds</a>:
          Learn to code in a playful way, solving puzzles and getting acquainted the same time with Swift, a powerful programming language created by Apple and used by the pros to build today’s most popular apps. Translations in 18 languages have been provided in this link to be used in the national Code Week website pages.
          <a href="https://apple.ent.box.com/s/ma3mycpc7wrqh25izbkm9qut6ktvtdqp">A guide for Swift with hyperlinks leading to tutorials can be found here in this PDF.</a>
        </li>
      </ul>


    </div></section>
@endsection