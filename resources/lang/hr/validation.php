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
    'active_url'           => ':attribute nije valjani URL.',
    'after'                => ':attribute mora biti datum nakon :date.',
    'after_or_equal'       => ':attribute mora biti datum nakon ili jednak :date.',
    'alpha'                => ':attribute može sadržavati samo slova.',
    'alpha_dash'           => ':attribute može sadržavati samo slova, brojeve i crtice.',
    'alpha_num'            => ':attribute može sadržavati samo slova i brojeve.',
    'array'                => ':attribute mora biti niz.',
    'before'               => ':attribute mora biti datum prije :date.',
    'before_or_equal'      => ':attribute mora biti datum prije ili jednak :date.',
    'between'              => [
        'numeric' => ':attribute mora biti između :min i :max.',
        'file'    => ':attribute mora imati između :min i :max kilobajta.',
        'string'  => ':attribute mora imati između :min i :max znakova.',
        'array'   => ':attribute mora imati između :min i :max stavaka.',
    ],
    'boolean'              => 'Polje :attribute mora biti točno ili netočno.',
    'confirmed'            => 'Potvrda :attribute ne odgovara.',
    'date'                 => ':attribute nije valjani datum.',
    'date_format'          => ':attribute nije u skladu s formatom :format.',
    'different'            => ':attribute i :other moraju se razlikovati.',
    'digits'               => ':attribute mora imati :digits znamenki.',
    'digits_between'       => ':attribute mora imati između :min i :max znamenki.',
    'dimensions'           => ':attribute ima nevaljane dimenzije slike.',
    'distinct'             => 'Polje :attribute ima dvostruku vrijednost.',
    'email'                => ':attribute mora biti valjana adresa e-pošte.',
    'exists'               => 'Odabrani :attribute nije valjan.',
    'file'                 => ':attribute mora biti datoteka.',
    'filled'               => 'Polje :attribute mora imati vrijednost.',
    'image'                => ':attribute mora biti slika.',
    'in'                   => 'Odabrani :attribute nije valjan.',
    'in_array'             => 'Polje :attribute ne postoji pod :other.',
    'integer'              => ':attribute mora biti cijeli broj.',
    'ip'                   => ':attribute mora biti valjana IP adresa.',
    'ipv4'                 => ':attribute mora biti valjana IPv4 adresa.',
    'ipv6'                 => ':attribute mora biti valjana IPv6 adresa.',
    'json'                 => ':attribute mora biti valjan JSON niz.',
    'max'                  => [
        'numeric' => ':attribute ne smije biti veći od :max.',
        'file'    => ':attribute ne smije biti veći od :max kilobajta.',
        'string'  => ':attribute ne smije biti dulji od :max znakova.',
        'array'   => ':attribute  ne smije imati više od :max stavaka.',
    ],
    'mimes'                => ':attribute mora biti datoteka tipa: :values.',
    'mimetypes'            => ':attribute mora biti datoteka tipa: :values.',
    'min'                  => [
        'numeric' => ':attribute mora imati najmanje :min.',
        'file'    => ':attribute mora imati najmanje :min kilobajta.',
        'string'  => ':attribute mora imati najmanje :min znakova.',
        'array'   => ':attribute mora imati najmanje :min stavaka.',
    ],
    'not_in'               => 'Odabrani :attribute nije valjan.',
    'not_regex'            => 'Format :attribute nije valjan.',
    'numeric'              => ':attribute mora biti broj.',
    'present'              => 'Polje :attribute mora biti prisutno.',
    'regex'                => 'Format :attribute nije valjan.',
    'required'             => 'Polje :attribute jest obavezno.',
    'required_if'          => 'Polje :attribute obavezno je kad :other iznosi :value.',
    'required_unless'      => 'Polje :attribute obavezno je osim ako je :other u :values.',
    'required_with'        => 'Polje :attribute obavezno je kad je prisutno :values.',
    'required_with_all'    => 'Polje :attribute obavezno je kad je prisutno :values.',
    'required_without'     => 'Polje :attribute obavezno je kad :values nije prisutno.',
    'required_without_all' => 'Polje :attribute obavezno je kada nijedan od :values nije prisutan.',
    'same'                 => ':attribute i :other se moraju podudarati.',
    'size'                 => [
        'numeric' => ':attribute mora biti :size.',
        'file'    => ':attribute mora imati :size kilobajta.',
        'string'  => ':attribute mora imati :size znakova.',
        'array'   => ':attribute mora sadržavati :size stavaka.',
    ],
    'string'               => ':attribute mora biti niz.',
    'timezone'             => ':attribute mora biti valjana zona.',
    'unique'               => ':attribute je već iskorišten.',
    'uploaded'             => ':attribute se nije uspio učitati.',
    'url'                  => 'Format :attribute nije valjan.',

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
            'rule-name' => 'poruka prilagođena korisniku',
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
