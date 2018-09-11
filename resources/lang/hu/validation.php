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

    'accepted'             => 'A(z) :attribute elfogadása kötelezõ.',
    'active_url'           => 'A(z) :attribute nem érvényes URL.',
    'after'                => 'A(z) :attribute :date utáni dátum kell, hogy legyen.',
    'after_or_equal'       => 'A(z) :attribute :date utáni vagy a(z) :date dátummal megegyezõ kell, hogy legyen.',
    'alpha'                => 'A(z) :attribute kizárólag betûket tartalmazhat.',
    'alpha_dash'           => 'A(z) :attribute kizárólag betûket, számokat és kötõjeleket tartalmazhat.',
    'alpha_num'            => 'A(z) :attribute kizárólag betûket és számokat tartalmazhat.',
    'array'                => 'A(z) :attribute egy tömb kell, hogy legyen.',
    'before'               => 'A(z) :attribute :date elõtti dátum kell, hogy legyen.',
    'before_or_equal'      => 'A(z) :attribute :date elõtti vagy a(z) :date dátummal megegyezõ kell, hogy legyen.',
    'between'              => [
        'numeric' => 'A(z) :attribute :min és :max közötti érték kell, hogy legyen.',
        'file'    => 'A(z) :attribute :min és :max kilobájt között kell, hogy legyen.',
        'string'  => 'A(z) :attribute :min és :max karakter között kell, hogy legyen.',
        'array'   => 'A(z) :attribute :min és :max darab között kell, hogy legyen.',
    ],
    'boolean'              => 'A(z) :attribute mezõ igaz vagy hamis kell, hogy legyen.',
    'confirmed'            => 'A(z) :attribute megerõsítés nem egyezik.',
    'date'                 => 'A(z) :attribute nem érvényes dátum.',
    'date_format'          => 'A(z) :attribute nem egyezik a(z) :format formátummal.',
    'different'            => 'A(z) :attribute és a(z) :other különbözõ kell, hogy legyen.',
    'digits'               => 'A(z) :attribute :digits számjegybõl kell, hogy álljon.',
    'digits_between'       => 'A(z) :attribute :min és :max közötti számjegyet kell, hogy tartalmazzon.',
    'dimensions'           => 'A(z) :attribute érvénytelen képméretet tartalmaz.',
    'distinct'             => 'A(z) :attribute mezõnek kettõs értéke van.',
    'email'                => 'A(z) :attribute érvényes e-mail cím kell, hogy legyen.',
    'exists'               => 'A kijelölt :attribute érvénytelen.',
    'file'                 => 'A(z) :attribute egy állomány kell, hogy legyen.',
    'filled'               => 'A(z) :attribute mezõnek értéke kell, hogy legyen.',
    'image'                => 'A(z) :attribute egy kép kell, hogy legyen.',
    'in'                   => 'A kijelölt :attribute érvénytelen.',
    'in_array'             => 'A(z) :attribute mezõ nem létezik ebben: :other.',
    'integer'              => 'A(z) :attribute egész szám kell, hogy legyen.',
    'ip'                   => 'A(z) :attribute érvényes IP-cím kell, hogy legyen.',
    'ipv4'                 => 'A(z) :attribute érvényes IPv4-cím kell, hogy legyen.',
    'ipv6'                 => 'A(z) :attribute érvényes IPv6-cím kell, hogy legyen.',
    'json'                 => 'A(z) :attribute érvényes JSON karakterlánc kell, hogy legyen.',
    'max'                  => [
        'numeric' => 'A(z) :attribute nem lehet nagyobb mint :max.',
        'file'    => 'A(z) :attribute nem lehet nagyobb mint :max kilobájt.',
        'string'  => 'A(z) :attribute nem lehet nagyobb mint :max karakter.',
        'array'   => 'A(z) :attribute nem tartalmazhat több mint :max darabot.',
    ],
    'mimes'                => 'A(z) :attribute a következõ típusú állomány kell, hogy legyen: :values.',
    'mimetypes'            => 'A(z) :attribute a következõ típusú állomány kell, hogy legyen: :values.',
    'min'                  => [
        'numeric' => 'A(z) :attribute legalább :min kell, hogy legyen.',
        'file'    => 'A(z) :attribute legalább :min kilobájt kell, hogy legyen.',
        'string'  => 'A(z) :attribute legalább :min karakter kell, hogy legyen.',
        'array'   => 'A(z) :attribute legalább :min darabot kell, hogy tartalmazzon.',
    ],
    'not_in'               => 'A kijelölt :attribute érvénytelen.',
    'not_regex'            => 'A(z) :attribute formátum érvénytelen.',
    'numeric'              => 'A(z) :attribute egy szám kell, hogy legyen.',
    'present'              => 'A(z) :attribute mezõ meg kell, hogy jelenjen.',
    'regex'                => 'A(z) :attribute formátum érvénytelen.',
    'required'             => 'A(z) :attribute mezõ kötelezõ.',
    'required_if'          => 'A(z) :attribute mezõ kötelezõ amikor :other :value.',
    'required_unless'      => 'A(z) :attribute mezõ kötelezõ amikor :other :value.',
    'required_with'        => 'A(z) :attribute mezõ kötelezõ, kivéve ha :values megjelenik.',
    'required_with_all'    => 'A(z) :attribute mezõ kötelezõ, kivéve ha :values megjelenik.',
    'required_without'     => 'A(z) :attribute mezõ kötelezõ amikor :values nem jelenik meg.',
    'required_without_all' => 'A(z) :attribute mezõ kötelezõ amikor egy :values sem jelenik meg.',
    'same'                 => 'A(z) :attribute és a(z) :other meg kell, hogy egyezzen.',
    'size'                 => [
        'numeric' => 'A(z) :attribute :size kell, hogy legyen.',
        'file'    => 'A(z) :attribute :size kilobájt kell, hogy legyen.',
        'string'  => 'A(z) :attribute :size karakter kell, hogy legyen.',
        'array'   => 'A(z) :attribute :size darabot kell, hogy tartalmazzon.',
    ],
    'string'               => 'A(z) :attribute karaktersorozat kell, hogy legyen.',
    'timezone'             => 'A(z) :attribute érvényes mezõ kell, hogy legyen.',
    'unique'               => 'A(z) :attribute már foglalt.',
    'uploaded'             => 'A(z) :attribute feltöltése nem sikerült.',
    'url'                  => 'A(z) :attribute formátum érvénytelen.',

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
            'rule-name' => 'testreszabott-üzenet',
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
