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

    'accepted'             => ':attribute duhet të pranohet.',
    'active_url'           => ':attribute nuk është URL e vlefshme.',
    'after'                => ':attribute duhet të jetë datë pas datës :date.',
    'after_or_equal'       => ':attribute duhet të jetë datë pas ose e barabartë me datën :date.',
    'alpha'                => ':attribute mund të përmbajë vetëm shkronja.',
    'alpha_dash'           => ':attribute mund të përmbajë vetëm shkronja, numra dhe vija.',
    'alpha_num'            => ':attribute mund të përmbajë vetëm shkronja dhe numra.',
    'array'                => ':attribute duhet të jetë një varg.',
    'before'               => ':attribute duhet të jetë datë përpara datës :date.',
    'before_or_equal'      => ':attribute duhet të jetë datë përpara ose e barabartë me datën :date.',
    'between'              => [
        'numeric' => ':attribute duhet të jetë mes :min dhe :max.',
        'file'    => ':attribute duhet të jetë mes :min dhe :max kilobajt.',
        'string'  => ':attribute duhet të jetë mes :min dhe :max karaktere.',
        'array'   => ':attribute duhet të ketë mes :min dhe :max artikuj.',
    ],
    'boolean'              => 'Fusha :attribute duhet të jetë e vërtetë ose e gabuar.',
    'confirmed'            => 'Konfirmimi i :attribute nuk përputhet.',
    'date'                 => ':attribute nuk është datë e vlefshme.',
    'date_format'          => ':attribute nuk përputhet me formatin :format.',
    'different'            => ':attribute dhe :other duhet të jenë të ndryshme.',
    'digits'               => ':attribute duhet të jetë :digits shifra.',
    'digits_between'       => ':attribute duhet të jetë mes :min dhe :max shifra.',
    'dimensions'           => ':attribute ka përmasa të pavlefshme imazhi.',
    'distinct'             => 'Fusha :attribute ka një vlerë të dublikuar.',
    'email'                => ':attribute duhet të jetë adresë e vlefshme emaili.',
    'exists'               => ':attribute i përzgjedhur është i pavlefshëm.',
    'file'                 => ':attribute duhet të jetë një skedar.',
    'filled'               => 'Fusha :attribute duhet të ketë një vlerë.',
    'image'                => ':attribute duhet të jetë një imazh.',
    'in'                   => ':attribute i përzgjedhur është i pavlefshëm.',
    'in_array'             => 'Fusha :attribute nuk ekziston te :other.',
    'integer'              => ':attribute duhet të jetë numër i plotë.',
    'ip'                   => ':attribute duhet të jetë adresë e vlefshme IP.',
    'ipv4'                 => ':attribute duhet të jetë adresë e vlefshme IPv4.',
    'ipv6'                 => ':attribute duhet të jetë adresë e vlefshme IPv6.',
    'json'                 => ':attribute duhet të jetë varg i vlefshëm JSON.',
    'max'                  => [
        'numeric' => ':attribute nuk mund të jetë më i madh se :max.',
        'file'    => ':attribute nuk mund të jetë më i madh se :max kilobajt.',
        'string'  => ':attribute nuk mund të jetë më i madh se :max karaktere.',
        'array'   => ':attribute nuk mund të ketë më shumë se :max artikuj.',
    ],
    'mimes'                => ':attribute duhet të jetë një skedar i llojit: :values.',
    'mimetypes'            => ':attribute duhet të jetë një skedar i llojit: :values.',
    'min'                  => [
        'numeric' => ':attribute duhet të jetë të paktën :min.',
        'file'    => ':attribute duhet të jetë të paktën :min kilobajt.',
        'string'  => ':attribute duhet të jetë të paktën :min karaktere.',
        'array'   => ':attribute duhet të ketë të paktën :min artikuj.',
    ],
    'not_in'               => ':attribute i përzgjedhur është i pavlefshëm.',
    'not_regex'            => 'Formati i :attribute është i pavlefshëm.',
    'numeric'              => ':attribute duhet të jetë një numër.',
    'present'              => 'Fusha :attribute duhet të jetë e pranishme.',
    'regex'                => 'Formati i :attribute është i pavlefshëm.',
    'required'             => 'Fusha :attribute është e detyrueshme.',
    'required_if'          => 'Fusha :attribute është e detyrueshme kur :other është :value.',
    'required_unless'      => 'Fusha :attribute është e detyrueshme përveçse kur :other është në :values.',
    'required_with'        => 'Fusha :attribute është e detyrueshme kur :values është e pranishme.',
    'required_with_all'    => 'Fusha :attribute është e detyrueshme kur :values është e pranishme.',
    'required_without'     => 'Fusha :attribute është e detyrueshme kur :values nuk është e pranishme.',
    'required_without_all' => 'Fusha :attribute është e detyrueshme kur asnjë prej :values nuk është e pranishme.',
    'same'                 => ':attribute dhe :other duhet të përputhen.',
    'size'                 => [
        'numeric' => ':attribute duhet të jetë :size.',
        'file'    => ':attribute duhet të jetë :size kilobajt.',
        'string'  => ':attribute duhet të jetë :size karaktere.',
        'array'   => ':attribute duhet të përmbajë :size artikuj.',
    ],
    'string'               => ':attribute duhet të jetë një varg.',
    'timezone'             => ':attribute duhet të jetë zonë e vlefshme.',
    'unique'               => ':attribute është e zënë tashmë.',
    'uploaded'             => 'Ngarkimi i :attribute dështoi.',
    'url'                  => 'Formati i :attribute është i pavlefshëm.',

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
            'rule-name' => 'mesazh i personalizuar',
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
