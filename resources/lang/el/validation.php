<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Το :attribute πρέπει να γίνει αποδεκτό.',
    'active_url'           => 'Το :attribute δεν είναι έγκυρη URL.',
    'after'                => 'Το :attribute πρέπει να είναι μια ημερομηνία πριν από τις :date.',
    'after_or_equal'       => 'Το :attribute πρέπει να είναι μια ημερομηνία πριν από τις ή να ισούται με τις :date.',
    'alpha'                => 'Το :attribute μπορεί να περιλαμβάνει μόνο γράμματα.',
    'alpha_dash'           => 'Το :attribute μπορεί να περιλαμβάνει μόνο γράμματα, αριθμούς και παύλες.',
    'alpha_num'            => 'Το :attribute μπορεί να περιλαμβάνει μόνο γράμματα και αριθμούς.',
    'array'                => 'Το :attribute πρέπει να είναι ένα βέλος.',
    'before'               => 'Το :attribute πρέπει να είναι μια ημερομηνία πριν από τις :date.',
    'before_or_equal'      => 'Το :attribute πρέπει να είναι μια ημερομηνία πριν από τις ή να ισούται με τις :date.',
    'between'              => [
        'numeric' => 'Το :attribute πρέπει να είναι από :min έως :max.',
        'file'    => 'Το :attribute πρέπει να είναι από :min έως :max kilobytes.',
        'string'  => 'Το :attribute πρέπει να περιλαμβάνει από :min έως :max χαρακτήρες.',
        'array'   => 'Το :attribute πρέπει να περιλαμβάνει από :min έως :max αντικείμενα.',
    ],
    'boolean'              => 'Το πεδίο :attribute πρέπει να είναι σωστό ή λάθος.',
    'confirmed'            => 'Η επιβεβαίωση :attribute δεν συμπίπτει.',
    'date'                 => 'Το :attribute δεν είναι έγκυρη ημερομηνία.',
    'date_format'          => 'Το :attribute δεν αντιστοιχεί στον μορφότυπο :format.',
    'different'            => 'Το :attribute και το :other πρέπει να είναι διαφορετικά.',
    'digits'               => 'Το :attribute πρέπει να αποτελείται από :digits ψηφία.',
    'digits_between'       => 'Το :attribute πρέπει να αποτελείται από :min έως :max ψηφία.',
    'dimensions'           => 'Το :attribute διαθέτει μη έγκυρες διαστάσεις εικόνας.',
    'distinct'             => 'Το πεδίο :attribute έχει διπλότυπη τιμή.',
    'email'                => 'Το :attribute πρέπει να είναι ένα έγκυρο email.',
    'exists'               => 'Το επιλεγμένο :attribute δεν είναι έγκυρο.',
    'file'                 => 'Το :attribute πρέπει να είναι αρχείο.',
    'filled'               => 'Το πεδίο :attribute πρέπει να έχει μια τιμή.',
    'image'                => 'Το :attribute πρέπει να είναι εικόνα.',
    'in'                   => 'Το επιλεγμένο :attribute δεν είναι έγκυρο.',
    'in_array'             => 'Το πεδίο :attribute field δεν υπάρχει στο :other.',
    'integer'              => 'Το :attribute πρέπει να είναι ακέραιος αριθμός.',
    'ip'                   => 'Το :attribute πρέπει να είναι μια έγκυρη διεύθυνση IP.',
    'ipv4'                 => 'Το :attribute πρέπει να είναι μια έγκυρη διεύθυνση IPv4.',
    'ipv6'                 => 'Το :attribute πρέπει να είναι μια έγκυρη διεύθυνση IPv6.',
    'json'                 => 'Το :attribute πρέπει να είναι μια έγκυρη συμβολοσειρά JSON.',
    'max'                  => [
        'numeric' => 'Το :attribute δεν μπορεί να ξεπερνά τα :max.',
        'file'    => 'Το :attribute δεν μπορεί να ξεπερνά τα :max kilobytes.',
        'string'  => 'Το :attribute δεν μπορεί να ξεπερνά τους :max χαρακτήρες.',
        'array'   => 'Το :attribute δεν μπορεί να έχει περισσότερα από :max αντικείμενα.',
    ],
    'mimes'                => 'Το :attribute πρέπει να είναι ένας τύπος αρχείου: :values.',
    'mimetypes'            => 'Το :attribute πρέπει να είναι ένας τύπος αρχείου: :values.',
    'min'                  => [
        'numeric' => 'Το :attribute πρέπει να είναι τουλάχιστον :min.',
        'file'    => 'Το :attribute πρέπει να είναι τουλάχιστον :min kilobytes.',
        'string'  => 'Το :attribute πρέπει να περιλαμβάνει τουλάχιστον :min χαρακτήρες.',
        'array'   => 'Το :attribute πρέπει να περιλαμβάνει τουλάχιστον :min αντικείμενα.',
    ],
    'not_in'               => 'Το επιλεγμένο :attribute δεν είναι έγκυρο.',
    'not_regex'            => 'Ο μορφότυπος του :attribute δεν είναι έγκυρος.',
    'numeric'              => 'Το :attribute πρέπει να είναι ένας αριθμός.',
    'present'              => 'Το πεδίο :attribute πρέπει να υπάρχει.',
    'regex'                => 'Ο μορφότυπος του :attribute δεν είναι έγκυρος.',
    'required'             => 'Το πεδίο :attribute είναι υποχρεωτικό.',
    'required_if'          => 'Το πεδίο :attribute είναι υποχρεωτικό όταν το :other είναι :value.',
    'required_unless'      => 'Το πεδίο :attribute είναι υποχρεωτικό εκτός αν το :other είναι σε :values.',
    'required_with'        => 'Το πεδίο :attribute είναι υποχρεωτικό όταν υπάρχει :values.',
    'required_with_all'    => 'Το πεδίο :attribute είναι υποχρεωτικό όταν υπάρχει :values.',
    'required_without'     => 'Το πεδίο :attribute είναι υποχρεωτικό όταν δεν υπάρχει :values.',
    'required_without_all' => 'Το :attribute είναι υποχρεωτικό όταν δεν υπάρχει κανένα από τα :values.',
    'same'                 => 'Το :attribute και το :other πρέπει να συμπίπτουν.',
    'size'                 => [
        'numeric' => 'Το :attribute πρέπει να είναι :size.',
        'file'    => 'Το :attribute πρέπει να είναι :size kilobytes.',
        'string'  => 'Το :attribute πρέπει να περιλαμβάνει :size χαρακτήρες.',
        'array'   => 'Το :attribute πρέπει να περιλαμβάνει :size αντικείμενα.',
    ],
    'string'               => 'Το :attribute πρέπει να είναι μια συμβολοσειρά.',
    'timezone'             => 'Το :attribute πρέπει να είναι μια έγκυρη ζώνη.',
    'unique'               => 'Το :attribute χρησιμοποιείται ήδη.',
    'uploaded'             => 'Το :attribute δεν απεστάλη.',
    'url'                  => 'Ο μορφότυπος του :attribute δεν είναι έγκυρος.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'εξατομικευμένο μήνυμα',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
