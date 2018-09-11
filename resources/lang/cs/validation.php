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

    'accepted'             => ':attribute musí být přijat.',
    'active_url'           => ':attribute není platná URL.',
    'after'                => ':attribute musí být datum po :date.',
    'after_or_equal'       => ':attribute musí být datum po nebo stejné jako :date.',
    'alpha'                => ':attribute může obsahovat pouze písmena.',
    'alpha_dash'           => ':attribute může obsahovat pouze písmena, čísla a pomlčky.',
    'alpha_num'            => ':attribute může obsahovat pouze písmena a čísla.',
    'array'                => ':attribute musí být pole.',
    'before'               => ':attribute musí být datum před :date.',
    'before_or_equal'      => ':attribute musí být datum před nebo stejné jako :date.',
    'between'              => [
        'numeric' => ':attribute musí být mezi :min a :max.',
        'file'    => ':attribute musí být mezi :min a :max kilobyty.',
        'string'  => ':attribute musí být mezi :min a :max znaky.',
        'array'   => ':attribute musí být mezi :min a :max položkami.',
    ],
    'boolean'              => 'Pole :attribute musí být true nebo false.',
    'confirmed'            => 'Potvrzení :attribute neodpovídá.',
    'date'                 => ':attribute není platné datum.',
    'date_format'          => ':attribute neodpovídá formátu :format.',
    'different'            => ':attribute a :other se musí lišit.',
    'digits'               => ':attribute musí být :digits číslic.',
    'digits_between'       => ':attribute musí být mezi :min a :max číslic.',
    'dimensions'           => ':attribute má neplatné rozměry obrázku.',
    'distinct'             => 'Pole :attribute má duplicitní hodnotu.',
    'email'                => ':attribute musí být platná emailová adresa.',
    'exists'               => 'Vybraný :attribute je neplatný.',
    'file'                 => ':attribute musí být soubor.',
    'filled'               => 'Pole :attribute musí být hodnota.',
    'image'                => ':attribute musí být obrázek.',
    'in'                   => 'Vybraný :attribute je neplatný.',
    'in_array'             => 'Pole :attribute neexistuje v :other.',
    'integer'              => ':attribute musí být integer.',
    'ip'                   => ':attribute musí být platná IP adresa.',
    'ipv4'                 => ':attribute musí být platná IPv4 adresa.',
    'ipv6'                 => ':attribute musí být platná IPv6 adresa.',
    'json'                 => ':attribute musí být platný řetězec JSON.',
    'max'                  => [
        'numeric' => ':attribute nemůže být větší než :max.',
        'file'    => ':attribute nemůže být větší než :max kilobytů.',
        'string'  => ':attribute nemůže být větší než :max znaků.',
        'array'   => ':attribute nemůže být větší než :max položek.',
    ],
    'mimes'                => ':attribute musí být soubor typu: :values.',
    'mimetypes'            => ':attribute musí být soubor typu: :values.',
    'min'                  => [
        'numeric' => ':attribute musí být nejméně :min.',
        'file'    => ':attribute musí být nejméně :min kilobytů.',
        'string'  => ':attribute musí mít nejméně :min znaků.',
        'array'   => ':attribute musí mít nejméně :min položek.',
    ],
    'not_in'               => 'Vybraný :attribute je neplatný.',
    'not_regex'            => 'Formát :attribute je neplatný.',
    'numeric'              => ':attribute musí být číslo.',
    'present'              => 'Pole :attribute musí být přítomné.',
    'regex'                => 'Formát :attribute je neplatný.',
    'required'             => 'Pole :attribute je vyžadováno.',
    'required_if'          => 'Pole :attribute je vyžadováno, když :other je :value.',
    'required_unless'      => 'Pole :attribute je vyžadováno, pokud :other není v :values.',
    'required_with'        => 'Pole :attribute je vyžadováno, když :values je přítomná.',
    'required_with_all'    => 'Pole :attribute je vyžadováno, když :values je přítomná.',
    'required_without'     => 'Pole :attribute je vyžadováno, když :values není přítomná.',
    'required_without_all' => 'Pole :attribute je vyžadováno, když žádná z :values není přítomná.',
    'same'                 => ':attribute a :other musí být shodné.',
    'size'                 => [
        'numeric' => ':attribute musí být :size.',
        'file'    => ':attribute musí být :size kilobytů.',
        'string'  => ':attribute musí být :size znaků.',
        'array'   => ':attribute musí obsahovat :size položek.',
    ],
    'string'               => ':attribute musí být řetězec.',
    'timezone'             => ':attribute musí být platná zóna',
    'unique'               => ':attribute je již obsazen.',
    'uploaded'             => ':attribute se nepodařilo nahrát.',
    'url'                  => 'Formát :attribute je neplatný.',

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
            'rule-name' => 'vlastní zpráva',
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
