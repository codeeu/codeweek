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

    'accepted'             => ':attribute mora biti prihvaćen.',
    'active_url'           => ':attribute nije važeći URL.',
    'after'                => ':attribute mora biti datum nakon :date.',
    'after_or_equal'       => ':attribute mora biti datum nakon ili isti kao :date.',
    'alpha'                => ':attribute smije sadržavati samo slova.',
    'alpha_dash'           => ':attribute smije sadržavati samo slova, brojeve i crte.',
    'alpha_num'            => ':attribute smije sadržavati samo slova i brojeve.',
    'array'                => ':attribute mora biti niz.',
    'before'               => ':attribute mora biti datum prije :date.',
    'before_or_equal'      => ':attribute mora biti datum prije ili isti kao :date.',
    'between'              => [
        'numeric' => ':attribute mora biti između :min i :max.',
        'file'    => ':attribute mora biti između :min i :max kilobajta.',
        'string'  => ':attribute mora biti između :min i :max karaktera.',
        'array'   => ':attribute mora imati između :min i :max stavki.',
    ],
    'boolean'              => ':attribute polje mora biti tačno ili pogrešno.',
    'confirmed'            => ':attribute potvrda ne odgovara.',
    'date'                 => ':attribute nije važeći datum.',
    'date_format'          => ':attribute ne odgovara formatu :format.',
    'different'            => ':attribute i :other moraju se razlikovati.',
    'digits'               => ':attribute moraju biti :digits cifre.',
    'digits_between'       => ':attribute mora biti između :min i :max cifara.',
    'dimensions'           => ':attribute ima nevažeće dimenzije slika.',
    'distinct'             => ':attribute polje ima dvostruku vrijednost.',
    'email'                => ':attribute mora biti važeća adresa e-pošte.',
    'exists'               => 'Odabrani :attribute je nevažeći.',
    'file'                 => ':attribute mora biti datoteka.',
    'filled'               => ':attribute polje mora imati vrijednost.',
    'image'                => ':attribute mora biti slika.',
    'in'                   => 'Odabrani :attribute je nevažeći.',
    'in_array'             => ':attribute polje ne postoji u :other.',
    'integer'              => ':attribute mora biti cijeli broj.',
    'ip'                   => ':attribute mora biti važeća IP adresa.',
    'ipv4'                 => ':attribute mora biti važeća IPv4 adresa.',
    'ipv6'                 => ':attribute mora biti važeća IPv6 adresa.',
    'json'                 => ':attribute mora biti važeći JSON niz znakova.',
    'max'                  => [
        'numeric' => ':attribute ne smije biti veći od :max.',
        'file'    => ':attribute ne smije biti veći od :max kilobajta.',
        'string'  => ':attribute ne smije biti veći od :max karaktera.',
        'array'   => ':attribute ne smije imati više od :max stavki.',
    ],
    'mimes'                => ':attribute mora biti datoteka tipa: :values.',
    'mimetypes'            => ':attribute mora biti datoteka tipa: :values.',
    'min'                  => [
        'numeric' => ':attribute mora biti najmanje :min.',
        'file'    => ':attribute mora biti najmanje :min kilobajta.',
        'string'  => ':attribute mora biti najmanje :min karaktera.',
        'array'   => ':attribute mora imati najmanje :min stavki.',
    ],
    'not_in'               => 'Odabrani :attribute je nevažeći.',
    'not_regex'            => ':attribute format je nevažeći.',
    'numeric'              => ':attribute mora biti broj.',
    'present'              => ':attribute polje mora biti prisutno.',
    'regex'                => ':attribute format je nevažeći.',
    'required'             => ':attribute polje je obavezno.',
    'required_if'          => ':attribute polje je obavezno kad je :other :value.',
    'required_unless'      => ':attribute polje je obavezno osim ako :other nije u :values.',
    'required_with'        => ':attribute polje je obavezno kada je :values prisutno.',
    'required_with_all'    => ':attribute polje je obavezno kada je :values prisutno.',
    'required_without'     => ':attribute je obavezno kada :values nije prisutno.',
    'required_without_all' => ':attribute je obavezno kada nijedna od :values nije prisutna.',
    'same'                 => ':attribute i :other moraju odgovarati.',
    'size'                 => [
        'numeric' => ':attribute mora biti :size.',
        'file'    => ':attribute mora biti :size kilobajta.',
        'string'  => ':attribute mora biti :size karaktera.',
        'array'   => ':attribute mora sadržavati :size stavki.',
    ],
    'string'               => ':attribute mora biti niz znakova.',
    'timezone'             => ':attribute mora biti važeća zona.',
    'unique'               => ':attribute je već uzet.',
    'uploaded'             => ':attribute se nije uspio učitati.',
    'url'                  => ':attribute format je nevažeći.',

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
            'rule-name' => 'standardna-poruka',
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
