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

    'accepted'             => 'L’ :attribute deve essere accettato.',
    'active_url'           => 'L’ :attribute non è una URL valida.',
    'after'                => 'L’:attribute deve essere una data successiva a :date.',
    'after_or_equal'       => 'L’ :attribute deve essere una data successiva o uguale a :date.',
    'alpha'                => 'L’ :attribute può contenere solo lettere.',
    'alpha_dash'           => 'L’ :attribute può contenere solo lettere, numeri e trattini.',
    'alpha_num'            => 'L’ :attribute può contenere solo lettere e numeri.',
    'array'                => 'L’ :attribute deve essere una matrice.',
    'before'               => 'L’ :attribute deve essere una data precedente a :date.',
    'before_or_equal'      => 'L’ :attribute deve essere una data precedente o uguale a :date.',
    'between'              => [
        'numeric' => 'L’ :attribute deve essere compreso tra :min e :max.',
        'file'    => 'L’ :attribute deve essere compreso tra :min e :max kilobytes.',
        'string'  => 'L’ :attribute deve essere compreso tra :min e :max caratteri.',
        'array'   => 'L’ :attribute deve essere compreso tra :min e :max voci.',
    ],
    'boolean'              => 'Il campo :attribute deve essere vero o falso.',
    'confirmed'            => 'La conferma dell’ :attribute non corrisponde.',
    'date'                 => 'L’ :attribute non è una data valida.',
    'date_format'          => 'L’ :attribute non corrisponde al formato :format.',
    'different'            => 'L’ :attribute e :other devono essere diversi.',
    'digits'               => 'L’ :attribute deve essere composto da :digits cifre.',
    'digits_between'       => 'L’ :attribute deve essere compreso tra :min e :max cifre.',
    'dimensions'           => 'L’ :attribute ha dimensioni dell’immagine non valide.',
    'distinct'             => 'Il campo :attribute ha un valore duplicato.',
    'email'                => 'L’ :attribute deve essere un indirizzo e-mail valido.',
    'exists'               => 'L’:attribute selezionato non è valido.',
    'file'                 => 'L’:attribute deve essere un file.',
    'filled'               => 'Il campo :attribute deve avere un valore.',
    'image'                => 'L’:attribute deve essere un’immagine.',
    'in'                   => 'L’:attribute selezionato non è valido.',
    'in_array'             => 'Il campo :attribute non esiste in :other.',
    'integer'              => 'L’ :attribute deve essere un numero intero.',
    'ip'                   => 'L’ :attribute deve essere un indirizzo IP valido.',
    'ipv4'                 => 'L’ :attribute deve essere un indirizzo IPv4 valido.',
    'ipv6'                 => 'L’ :attribute deve essere un indirizzo IPv6 valido.',
    'json'                 => 'L’ :attribute deve essere una stringa JSON valida.',
    'max'                  => [
        'numeric' => 'L’ :attribute non può essere superiore a :max.',
        'file'    => 'L’ :attribute non può essere superiore a :max kilobytes.',
        'string'  => 'L’ :attribute non può essere superiore a :max caratteri.',
        'array'   => 'L’ :attribute non può contenere più di :max voci.',
    ],
    'mimes'                => 'L’ :attribute deve essere un file di type: :values.',
    'mimetypes'            => 'L’ :attribute deve essere un file di type: :values.',
    'min'                  => [
        'numeric' => 'L’ :attribute deve essere almeno :min.',
        'file'    => 'L’ :attribute deve essere almeno :min kilobytes.',
        'string'  => 'L’ :attribute deve essere almeno :min caratteri.',
        'array'   => 'L’ :attribute deve avere almeno :min voci.',
    ],
    'not_in'               => 'L’:attribute selezionato non è valido.',
    'not_regex'            => 'Il formato dell’ :attribute non è valido.',
    'numeric'              => 'L’ :attribute deve essere un numero.',
    'present'              => 'Il campo dell’:attribute deve essere presente.',
    'regex'                => 'Il formato dell’ :attribute non è valido.',
    'required'             => 'Il campo dell’ :attribute è obbligatorio.',
    'required_if'          => 'Il campo dell’ :attribute è obbligatorio quando :other è :value.',
    'required_unless'      => 'Il campo dell’ :attribute è obbligatorio a meno che :other sia in :values.',
    'required_with'        => 'Il campo dell’ :attribute è obbligatorio quando :values è presente.',
    'required_with_all'    => 'Il campo dell’ :attribute è obbligatorio quando :values è presente.',
    'required_without'     => 'Il campo dell’ :attribute è obbligatorio quando :values non è presente.',
    'required_without_all' => 'Il campo dell’ :attribute è obbligatorio quando nessuno dei :values è presente.',
    'same'                 => 'L’ :attribute e :other devono corrispondere.',
    'size'                 => [
        'numeric' => 'L’ :attribute deve essere :size.',
        'file'    => 'L’ :attribute deve essere :size kilobytes.',
        'string'  => 'L’ :attribute deve essere :size caratteri.',
        'array'   => 'L’ :attribute deve contenere :size voci.',
    ],
    'string'               => 'L’ :attribute deve essere una stringa.',
    'timezone'             => 'L’ :attribute deve essere un\'area valida.',
    'unique'               => 'L’ :attribute è stato già preso.',
    'uploaded'             => 'È impossibile caricare l’ :attribute.',
    'url'                  => 'Il formato dell’ :attribute non è valido.',

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
            'rule-name' => 'messaggio personalizzato',
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
