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
    'active_url'           => ':attribute nije validan URL.',
    'after'                => ':attribute mora biti datum nakon :date.',
    'after_or_equal'       => ':attribute mora biti datum nakon ili na :date.',
    'alpha'                => ':attribute može sadržati samo slova.',
    'alpha_dash'           => ':attribute može sadržati samo slova, brojeve i crtice. ',
    'alpha_num'            => ':attribute može sadržati samo slova i brojeve.',
    'array'                => ':attribute mora biti niz.',
    'before'               => ':attribute mora biti datum prije :date.',
    'before_or_equal'      => ':attribute mora biti datum prije ili na :date.',
    'between'              => [
        'numeric' => ':attribute mora biti između :min i :max.',
        'file'    => ':attribute mora biti između:min i :max kilobajta.',
        'string'  => ':attribute mora biti između :min i :max znakova. ',
        'array'   => ':attribute mora biti između :min i :max stavki.',
    ],
    'boolean'              => 'Polje :attribute mora biti tačno ili netačno.',
    'confirmed'            => 'Potvrda vezano za :attribute se ne podudara. ',
    'date'                 => ':attribute nije validan datum. ',
    'date_format'          => ':attribute ne odgovara formatu :format.',
    'different'            => ':attribute i :other se mora razlikovati.',
    'digits'               => ':attribute mora biti :digits cifra. ',
    'digits_between'       => ':attribute mora biti između :min i :max cifara.',
    'dimensions'           => ':attribute nema validne dimenzije slike.',
    'distinct'             => 'Polje :attribute ima dvostruku vrijednost. ',
    'email'                => ':attribute mora biti važeća e-mail adresa. ',
    'exists'               => 'Odabrani :attribute nije validan.',
    'file'                 => ':attribute mora biti dokument.',
    'filled'               => 'Polje :attribute mora imati vrijednost. ',
    'image'                => ':attribute mora biti slika. ',
    'in'                   => 'Odabrani :attribute nije validan.',
    'in_array'             => 'Polje :attribute ne postoji u :other. ',
    'integer'              => ':attribute mora biti cjelobrojna vrijednost. ',
    'ip'                   => ':attribute mora biti validna IP adresa.',
    'ipv4'                 => ':attribute mora biti validna IPv4 adresa.',
    'ipv6'                 => ':attribute mora biti validna IPv6 adresa.',
    'json'                 => ':attribute mora biti validan JSON niz podataka.',
    'max'                  => [
        'numeric' => ':attribute ne može biti veći od :max.',
        'file'    => ':attribute ne može biti veći od :max kilobajta. ',
        'string'  => ':attribute ne može biti veći od:max karaktera.',
        'array'   => ':attribute ne može imati više od :max stavki.',
    ],
    'mimes'                => ':attribute mora biti datoteka tipa:  :values.',
    'mimetypes'            => ':attribute mora biti datoteka tipa:  :values.',
    'min'                  => [
        'numeric' => ':attribute mora biti najmanje :min.',
        'file'    => ':attribute mora biti najmanje :min kilobajta. ',
        'string'  => ':attribute mora biti najmanje :min karaktera. ',
        'array'   => ':attribute mora imati najmanje :min stavki.',
    ],
    'not_in'               => 'Odabrani :attribute nije validan.',
    'not_regex'            => 'Format :attribute a nije validan.',
    'numeric'              => ':attribute mora biti broj. ',
    'present'              => 'Polje za :attribute mora postojati.',
    'regex'                => 'Format :attribute a nije validan.',
    'required'             => 'Polje za :attribute je obavezno.',
    'required_if'          => 'Polje za :attribute je obavezno kada :other ima :vrijednost. ',
    'required_unless'      => 'Polje za :attribute je obavezno, osim ako :other ima :vrijednost.',
    'required_with'        => 'Polje za :attribute je obavezno kada su prisutne :values.',
    'required_with_all'    => 'Polje za :attribute je obavezno kada su prisutne :values.',
    'required_without'     => 'Polje za :attribute je obavezno kada nijesu prisutne :values.',
    'required_without_all' => 'Polje za :attribute je obavezno kada nijedna :values nije prisutna.',
    'same'                 => ':attribute i :other se mora podudarati.',
    'size'                 => [
        'numeric' => ':attribute mora biti :size.',
        'file'    => ':attribute mora biti :size kilobajta',
        'string'  => ':attribute mora biti :size znakova.',
        'array'   => ':attribute mora sadržati :size stavke.',
    ],
    'string'               => ':attribute mora biti niz.',
    'timezone'             => ':attribute mora biti važeća zona. ',
    'unique'               => ':attribute je već uzet. ',
    'uploaded'             => ':attribute nije poslat na server. ',
    'url'                  => 'Format :attribute a nije validan.',

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
            'rule-name' => 'Prilagođena poruka',
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
