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

    'accepted'             => ':attribute skal accepteres.',
    'active_url'           => ':attribute er ikke en gyldig URL.',
    'after'                => ':attribute skal være en dato efter :date.',
    'after_or_equal'       => ':attribute skal være en dato efter eller lig med :date.',
    'alpha'                => ':attribute må kun indeholde bogstaver.',
    'alpha_dash'           => ':attribute må kun indeholde bogstaver, tal og streger.',
    'alpha_num'            => ':attribute må kun indeholde bogstaver og tal.',
    'array'                => ':attribute skal være et område.',
    'before'               => ':attribute skal være en dato før :date.',
    'before_or_equal'      => ':attribute skal være en dato før eller lig med :date.',
    'between'              => [
        'numeric' => ':attribute skal være mellem :min og :max.',
        'file'    => ':attribute skal være mellem :min og :max kilobyte.',
        'string'  => ':attribute skal være mellem :min og :max tegn.',
        'array'   => ':attribute skal have mellem :min og :max elementer.',
    ],
    'boolean'              => 'Feltet :attribute skal være sandt eller falsk.',
    'confirmed'            => 'Bekræftelsen af :attribute matcher ikke.',
    'date'                 => ':attribute er ikke en gyldig dato.',
    'date_format'          => ':attribute matcher ikke formatet :format.',
    'different'            => ':attribute og :other skal være forskellige.',
    'digits'               => ':attribute skal være :digits cifre.',
    'digits_between'       => ':attribute skal have mellem :min og :max cifre.',
    'dimensions'           => ':attribute har ugyldige billeddimensioner.',
    'distinct'             => 'Feltet :attribute har en duplikeret værdi.',
    'email'                => ':attribute skal være en gyldig e-mailadresse.',
    'exists'               => 'Den/det valgte :attribute er ugyldig(t).',
    'file'                 => ':attribute skal være en fil.',
    'filled'               => 'Feltet :attribute skal have en værdi.',
    'image'                => ':attribute skal være et billede.',
    'in'                   => 'Den/det valgte :attribute er ugyldig(t).',
    'in_array'             => 'Feltet :attribute findes ikke i :other.',
    'integer'              => ':attribute skal være et heltal.',
    'ip'                   => ':attribute skal være en gyldig IP-adresse.',
    'ipv4'                 => ':attribute skal være en gyldig IPv4-adresse.',
    'ipv6'                 => ':attribute skal være en gyldig IPv6-adresse.',
    'json'                 => ':attribute skal være en gyldig JSON-streng.',
    'max'                  => [
        'numeric' => ':attribute må ikke være større end :max.',
        'file'    => ':attribute må ikke være større end :max kilobyte.',
        'string'  => ':attribute må ikke være på over :max tegn.',
        'array'   => ':attribute må ikke have mere end :max elementer.',
    ],
    'mimes'                => ':attribute skal være en fil af typen: :values.',
    'mimetypes'            => ':attribute skal være en fil af typen: :values.',
    'min'                  => [
        'numeric' => ':attribute skal være mindst :min.',
        'file'    => ':attribute skal være mindst :min kilobyte.',
        'string'  => ':attribute skal have mindst :min tegn.',
        'array'   => ':attribute skal have mindst :min elementer.',
    ],
    'not_in'               => 'Den/det valgte :attribute er ugyldig(t).',
    'not_regex'            => ':attribute-formatet er ugyldigt.',
    'numeric'              => ':attribute skal være et tal.',
    'present'              => 'Feltet :attribute skal være til stede.',
    'regex'                => ':attribute-formatet er ugyldigt.',
    'required'             => 'Feltet :attribute er obligatorisk.',
    'required_if'          => 'Feltet :attribute er obligatorisk, når :other er :value.',
    'required_unless'      => 'Feltet :attribute er obligatorisk, medmindre :other er i :values.',
    'required_with'        => 'Feltet :attribute er påkrævet, når :values er til stede.',
    'required_with_all'    => 'Feltet :attribute er påkrævet, når :values er til stede.',
    'required_without'     => 'Feltet :attribute er obligatorisk, når :values ikke er til stede.',
    'required_without_all' => 'Feltet :attribute er obligatorisk, når ingen af :values er til stede.',
    'same'                 => ':attribute og :other skal matche.',
    'size'                 => [
        'numeric' => ':attribute skal være :size.',
        'file'    => ':attribute skal være :size kilobyte.',
        'string'  => ':attribute skal være på :size tegn.',
        'array'   => ':attribute skal indeholde :size elementer.',
    ],
    'string'               => ':attribute skal være en streng.',
    'timezone'             => ':attribute skal være en gyldig zone.',
    'unique'               => ':attribute er allerede taget.',
    'uploaded'             => ':attribute blev ikke uploadet.',
    'url'                  => ':attribute-formatet er ugyldigt.',

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
