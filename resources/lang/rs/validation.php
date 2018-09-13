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

    'accepted'             => ':attribute mora da bude prihvaćen.',
    'active_url'           => ':attribute nije važeći URL.',
    'after'                => ':attribute mora da bude datum nakon :date.',
    'after_or_equal'       => ':attribute mora da bude datum nakon ili na dan :date.',
    'alpha'                => ':attribute može da sadrži samo slova.',
    'alpha_dash'           => ':attribute može da sadrži samo slova, brojeve i crtice.',
    'alpha_num'            => ':attribute može da sadrži samo slova i brojeve.',
    'array'                => ':attribute mora da bude niz.',
    'before'               => ':attribute mora da bude datum pre :date.',
    'before_or_equal'      => ':attribute mora da bude datum pre ili na dan :date.',
    'between'              => [
        'numeric' => ':attribute mora da bude između :min i :max.',
        'file'    => ':attribute mora da bude između :min i :max kilobajta.',
        'string'  => ':attribute mora da bude između :min i :max znakova.',
        'array'   => ':attribute mora da bude između :min i :max stavki.',
    ],
    'boolean'              => 'Polje :attribute mora da bude tačno ili netačno.',
    'confirmed'            => 'Potvrda za :attribute se ne podudara.',
    'date'                 => ':attribute nije validan datum.',
    'date_format'          => ':attribute ne odgovara formatu :format.',
    'different'            => ':attribute i :other moraju da se razlikuju.',
    'digits'               => 'Broj cifara za :attribute mora da bude :digits.',
    'digits_between'       => 'Broj cifara za :attribute mora da bude između :min i :max.',
    'dimensions'           => ':attribute ima neodgovarajuće dimenzije slike.',
    'distinct'             => ':attribute polje ima duplu vrednost.',
    'email'                => ':attribute imejl adresa mora da bude važeća.',
    'exists'               => 'Izabrani :attribute je nevažeći.',
    'file'                 => ':attribute mora da bude datoteka.',
    'filled'               => 'Polje :attribute mora da ima vrednost.',
    'image'                => ':attribute mora da bude fotografija.',
    'in'                   => 'Izabrani atribut :attribute je nevažeći.',
    'in_array'             => 'Polje :attribute ne postoji u :other.',
    'integer'              => ':attribute mora da bude ceo broj.',
    'ip'                   => ':attribute mora da bude validna IP adresa.',
    'ipv4'                 => ':attribute mora da bude validna IPv4 adresa.',
    'ipv6'                 => ':attribute mora da bude validna IPv6 adresa.',
    'json'                 => ':attribute mora da bude validan JSON format.',
    'max'                  => [
        'numeric' => ':attribute ne sme biti veći od :max.',
        'file'    => 'Broj kilobajta za :attribute ne sme da bude veći do :max.',
        'string'  => 'Broj znakova za :attribute ne sme da bude veći od :max.',
        'array'   => 'Maksimalan broj stavki za :attribute ne sme da bude veći od :max.',
    ],
    'mimes'                => ':attribute mora da bude vrsta datoteke: :values.',
    'mimetypes'            => ':attribute mora da bude datoteka tipa: :values.',
    'min'                  => [
        'numeric' => ':attribute mora da ima najmanje :min.',
        'file'    => 'Broj kilobajta za :attribute mora da bude najmanje :min.',
        'string'  => 'Broj znakova za :attribute mora da bude najmanje :min.',
        'array'   => 'Broj stavki za :attribute mora da bude najmanje :min.',
    ],
    'not_in'               => 'Izabrani atribut :attribute je nevažeći.',
    'not_regex'            => 'Format :attribute je nevažeći.',
    'numeric'              => ':attribute mora da bude broj.',
    'present'              => 'Polje :attribute mora biti popunjeno.',
    'regex'                => 'Format :attribute je nevažeći.',
    'required'             => 'Polje :attribute je obavezno.',
    'required_if'          => 'Polje :attribute je obavezno kada :other ima vrednost :value.',
    'required_unless'      => 'Polje :attribute je obavezno osim ako :other ima vrednost :values.',
    'required_with'        => 'Polje :attribute je obavezno kada su dostupne vrednosti :values.',
    'required_with_all'    => 'Polje :attribute je obavezno kada su dostupne vrednosti :values.',
    'required_without'     => 'Polje :attribute je obavezno kada nisu dostupne vrednosti :values.',
    'required_without_all' => 'Polje :attribute je obavezno kada nije dostupna nijedna vrednost od :values.',
    'same'                 => 'Polja :attribute i :other moraju da se podudaraju.',
    'size'                 => [
        'numeric' => ':attribute mora da ima veličinu :size.',
        'file'    => 'Veličina za :attribute mora da bude :size.',
        'string'  => 'Broj znakova za :attribute mora da bude :size.',
        'array'   => 'Broj stavki koje :attribute mora da sadrži je :size.',
    ],
    'string'               => ':attribute mora da bude niz.',
    'timezone'             => ':attribute mora biti važeća zona.',
    'unique'               => ':attribute je već zauzet.',
    'uploaded'             => 'Otpremanje :attribute nije uspelo.',
    'url'                  => 'Format :attribute je nevažeći.',

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
            'rule-name' => 'prilagođena poruka',
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
