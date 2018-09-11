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

    'accepted'             => ':attribute turi bűti priimtas.',
    'active_url'           => ':attribute nëra tinkamas URL adresas.',
    'after'                => ':attribute turi bűti po :date.',
    'after_or_equal'       => ':attribute turi bűti po :date arba tŕ pačiŕ dienŕ.',
    'alpha'                => ':attribute gali bűti sudarytas tik iđ raidţiř.',
    'alpha_dash'           => ':attribute gali bűti sudarytas tik iđ raidţiř, skaitmenř ir brűkđneliř.',
    'alpha_num'            => ':attribute gali bűti sudarytas tik iđ raidţiř ir skaitmenř.',
    'array'                => ':attribute turi bűti masyvas.',
    'before'               => ':attribute turi bűti prieđ :date.',
    'before_or_equal'      => ':attribute turi bűti prieđ :date arba tŕ pačiŕ dienŕ.',
    'between'              => [
        'numeric' => ':attribute turi bűti tarp :min ir :max.',
        'file'    => ':attribute turi bűti ne maţesnis nei :min ir ne didesnis nei :max KB.',
        'string'  => ':attribute turi bűti sudarytas iđ ne maţiau nei :min ir ne daugiau nei :max simboliř.',
        'array'   => ':attribute privalo turëti nuo :min iki :max elementř.',
    ],
    'boolean'              => ':attribute laukelis turi bűti taip arba ne.',
    'confirmed'            => 'Nesutampa :attribute patvirtinimas.',
    'date'                 => ':attribute nëra tinkama data.',
    'date_format'          => ':attribute neatitinka :format formato.',
    'different'            => ':attribute ir :other turi skirtis.',
    'digits'               => ':attribute turi bűti sudarytas iđ :digits skaitmenř.',
    'digits_between'       => ':attribute turi bűti sudarytas iđ ne maţiau nei :min ir ne daugiau nei :max skaitmenř.',
    'dimensions'           => ':attribute yra netinkamř matmenř.',
    'distinct'             => ':attribute laukelyje kartojasi reikđmë.',
    'email'                => ':attribute turi bűti galiojantis el. pađto adresas.',
    'exists'               => 'Pasirinktas :attribute nëra tinkamas.',
    'file'                 => ':attribute turi bűti failas.',
    'filled'               => ':attribute laukelyje turi bűti nurodyta reikđmë.',
    'image'                => ':attribute turi bűti paveikslëlis.',
    'in'                   => 'Pasirinktas :attribute nëra tinkamas.',
    'in_array'             => ':attribute laukelio nëra :other.',
    'integer'              => ':attribute turi bűti sveikasis skaičius.',
    'ip'                   => ':attribute turi bűti galiojantis IP adresas.',
    'ipv4'                 => ':attribute turi bűti galiojantis IPv4 adresas.',
    'ipv6'                 => ':attribute turi bűti galiojantis IPv6 adresas.',
    'json'                 => ':attribute turi bűti galiojanti JSON eilutë.',
    'max'                  => [
        'numeric' => ':attribute negali bűti didesnis nei :max.',
        'file'    => ':attribute negali bűti didesnis nei :max KB.',
        'string'  => ':attribute negali bűti sudarytas iđ daugiau nei :max simboliř.',
        'array'   => ':attribute negali turëti daugiau nei :max elementř.',
    ],
    'mimes'                => ':attribute failas turi bűti vieno iđ điř tipř: :values.',
    'mimetypes'            => ':attribute failas turi bűti vieno iđ điř tipř: :values.',
    'min'                  => [
        'numeric' => ':attribute negali bűti maţesnis nei :min.',
        'file'    => ':attribute negali bűti maţesnis nei :min KB.',
        'string'  => ':attribute negali bűti sudarytas iđ maţiau nei :min simboliř.',
        'array'   => ':attribute negali turëti maţiau nei :min elementř.',
    ],
    'not_in'               => 'Pasirinktas :attribute nëra tinkamas.',
    'not_regex'            => 'Netinkamas :attribute formatas.',
    'numeric'              => ':attribute turi bűti skaičius.',
    'present'              => ':attribute laukelis yra privalomas.',
    'regex'                => 'Netinkamas :attribute formatas.',
    'required'             => 'Reikalingas :attribute laukelis.',
    'required_if'          => ':attribute laukelis reikalingas, kai :other yra :value.',
    'required_unless'      => ':attribute laukelis reikalingas, jei :other nëra :values.',
    'required_with'        => ':attribute laukelis reikalingas, kai vertë yra :values.',
    'required_with_all'    => ':attribute laukelis reikalingas, kai vertë yra :values.',
    'required_without'     => ':attribute laukelis yra reikalingas, kai vertë nëra :values.',
    'required_without_all' => ':attribute laukelis yra reikalingas, kai nëra në vieno iđ :values.',
    'same'                 => ':attribute ir :other turi sutapti.',
    'size'                 => [
        'numeric' => ':attribute turi bűti :size.',
        'file'    => ':attribute turi bűti :size KB.',
        'string'  => ':attribute turi bűti sudarytas iđ :size simboliř.',
        'array'   => ':attribute privalo turëti :size elementř.',
    ],
    'string'               => ':attribute turi bűti eilutë.',
    'timezone'             => ':attribute turi bűti galiojanti zona.',
    'unique'               => ':attribute jau panaudotas.',
    'uploaded'             => ':attribute nepavyko ákelti.',
    'url'                  => 'Netinkamas :attribute formatas.',

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
            'rule-name' => 'pritaikytasis praneđimas',
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
