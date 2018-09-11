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

    'accepted'             => 'Das :attribute muss akzeptiert werden.',
    'active_url'           => 'Das :attribute ist keine gültige URL.',
    'after'                => 'Das :attribute muss ein Datum nach dem :date sein.',
    'after_or_equal'       => 'Das :attribute muss ein Datum nach dem oder am :date sein.',
    'alpha'                => 'Das :attribute darf nur Buchstaben umfassen.',
    'alpha_dash'           => 'Das :attribute darf nur Buchstaben, Zahlen und Striche umfassen.',
    'alpha_num'            => 'Das :attribute darf nur Buchstaben und Zahlen umfassen.',
    'array'                => 'Das :attribute muss eine Reihe sein.',
    'before'               => 'Das :attribute muss ein Datum vor dem :date sein.',
    'before_or_equal'      => 'Das :attribute muss ein Datum vor dem oder am :date sein.',
    'between'              => [
        'numeric' => 'Das :attribute muss zwischen :min und :max liegen.',
        'file'    => 'Das :attribute muss zwischen :min und :max Kilobyte liegen.',
        'string'  => 'Das :attribute muss zwischen :min und :max Zeichen haben.',
        'array'   => 'Das :attribute muss zwischen :min und :max Elemente haben.',
    ],
    'boolean'              => 'Das Feld :attribute muss wahr oder falsch sein.',
    'confirmed'            => 'Die :attribute Bestätigung passt nicht.',
    'date'                 => 'Das :attribute ist kein gültiges Datum.',
    'date_format'          => 'Das :attribute entspricht nicht dem Format :format.',
    'different'            => 'Das :attribute und :other müssen verschieden sein.',
    'digits'               => 'Das :attribute muss in Ziffern :digits angegeben werden.',
    'digits_between'       => 'Das :attribute muss zwischen :min und :max Ziffern haben.',
    'dimensions'           => 'Das :attribute hat ungültige Bildabmessungen.',
    'distinct'             => 'Das Feld :attribute hat einen doppelten Wert.',
    'email'                => 'Das :attribute muss eine gültige E-Mail-Adresse sein.',
    'exists'               => 'Das ausgewählte :attribute ist ungültig.',
    'file'                 => 'Das :attribute muss eine Datei sein.',
    'filled'               => 'Das Feld :attribute muss einen Wert haben.',
    'image'                => 'Das :attribute muss ein Bild sein.',
    'in'                   => 'Das ausgewählte :attribute ist ungültig.',
    'in_array'             => 'Das Feld :attribute ist in :other nicht vorhanden.',
    'integer'              => 'Das :attribute muss eine ganze Zahl sein.',
    'ip'                   => 'Das :attribute muss eine gültige IP-Adresse sein.',
    'ipv4'                 => 'Das :attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6'                 => 'Das :attribute muss eine gültige IPv6-Adresse sein.',
    'json'                 => 'Das :attribute muss eine gültige JSON-Zeichenfolge sein.',
    'max'                  => [
        'numeric' => 'Das :attribute darf nicht größer sein als :max.',
        'file'    => 'Das :attribute darf nicht größer sein als :max Kilobyte.',
        'string'  => 'Das :attribute darf nicht größer sein als :max Zeichen.',
        'array'   => 'Das :attribute darf nicht größer sein als :max Elemente.',
    ],
    'mimes'                => 'Das :attribute muss eine Datei vom Typ type: sein. :values.',
    'mimetypes'            => 'Das :attribute muss eine Datei vom Typ type: sein. :values.',
    'min'                  => [
        'numeric' => 'Das :attribute muss mindestens :min sein.',
        'file'    => 'Das :attribute muss mindestens:min Kilobyte groß sein.',
        'string'  => 'Das :attribute muss mindestens :min Zeichen haben.',
        'array'   => 'Das :attribute muss mindestens :min Elemente haben.',
    ],
    'not_in'               => 'Das ausgewählte :attribute ist ungültig.',
    'not_regex'            => 'Das Format von :attribute ist ungültig.',
    'numeric'              => 'Das :attribute muss eine Zahl sein.',
    'present'              => 'Das Feld :attribute muss vorhanden sein.',
    'regex'                => 'Das Format von :attribute ist ungültig.',
    'required'             => 'Das Feld :attribute ist erforderlich.',
    'required_if'          => 'Das Feld :attribute ist erforderlich, wenn :other :value ist.',
    'required_unless'      => 'Das Feld :attribute ist erforderlich, sofern :other im Bereich :values ist.',
    'required_with'        => 'Das Feld :attribute ist erforderlich, wenn :values vorhanden ist.',
    'required_with_all'    => 'Das Feld :attribute ist erforderlich, wenn :values vorhanden ist.',
    'required_without'     => 'Das Feld :attribute ist erforderlich, wenn ::values nicht vorhanden ist.',
    'required_without_all' => 'Das Feld :attribute ist erforderlich, wenn keiner der :values vorhanden ist.',
    'same'                 => 'Das :attribute und :other müssen zueinander passen.',
    'size'                 => [
        'numeric' => 'Das :attribute muss :size sein.',
        'file'    => 'Das :attribute muss :size Kilobyte sein.',
        'string'  => 'Das :attribute muss :size Zeichen sein.',
        'array'   => 'Das :attribute muss :size Elemente enthalten.',
    ],
    'string'               => 'Das :attribute muss eine Zeichenfolge sein.',
    'timezone'             => 'Das :attribute muss ein gültiges Gebiet sein.',
    'unique'               => 'Das :attribute wurde bereits genutzt.',
    'uploaded'             => 'Der Upload des :attribute ist fehlgeschlagen.',
    'url'                  => 'Das Format von :attribute ist ungültig.',

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
            'rule-name' => 'custom-message',
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
