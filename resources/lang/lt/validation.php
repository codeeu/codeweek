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

    'accepted'             => ':attribute turi būti priimtas.',
    'active_url'           => ':attribute nėra tinkamas URL adresas.',
    'after'                => ':attribute turi būti po :date.',
    'after_or_equal'       => ':attribute turi būti po :date arba tą pačią dieną.',
    'alpha'                => ':attribute gali būti sudarytas tik iš raidžių.',
    'alpha_dash'           => ':attribute gali būti sudarytas tik iš raidžių, skaitmenų ir brūkšnelių.',
    'alpha_num'            => ':attribute gali būti sudarytas tik iš raidžių ir skaitmenų.',
    'array'                => ':attribute turi būti masyvas.',
    'before'               => ':attribute turi būti prieš :date.',
    'before_or_equal'      => ':attribute turi būti prieš :date arba tą pačią dieną.',
    'between'              => [
        'numeric' => ':attribute turi būti tarp :min ir :max.',
        'file'    => ':attribute turi būti ne mažesnis nei :min ir ne didesnis nei :max KB.',
        'string'  => ':attribute turi būti sudarytas iš ne mažiau nei :min ir ne daugiau nei :max simbolių.',
        'array'   => ':attribute privalo turėti nuo :min iki :max elementų.',
    ],
    'boolean'              => ':attribute laukelis turi būti taip arba ne.',
    'confirmed'            => 'Nesutampa :attribute patvirtinimas.',
    'date'                 => ':attribute nėra tinkama data.',
    'date_format'          => ':attribute neatitinka :format formato.',
    'different'            => ':attribute ir :other turi skirtis.',
    'digits'               => ':attribute turi būti sudarytas iš :digits skaitmenų.',
    'digits_between'       => ':attribute turi būti sudarytas iš ne mažiau nei :min ir ne daugiau nei :max skaitmenų.',
    'dimensions'           => ':attribute yra netinkamų matmenų.',
    'distinct'             => ':attribute laukelyje kartojasi reikšmė.',
    'email'                => ':attribute turi būti galiojantis el. pašto adresas.',
    'exists'               => 'Pasirinktas :attribute nėra tinkamas.',
    'file'                 => ':attribute turi būti failas.',
    'filled'               => ':attribute laukelyje turi būti nurodyta reikšmė.',
    'image'                => ':attribute turi būti paveikslėlis.',
    'in'                   => 'Pasirinktas :attribute nėra tinkamas.',
    'in_array'             => ':attribute laukelio nėra :other.',
    'integer'              => ':attribute turi būti sveikasis skaičius.',
    'ip'                   => ':attribute turi būti galiojantis IP adresas.',
    'ipv4'                 => ':attribute turi būti galiojantis IPv4 adresas.',
    'ipv6'                 => ':attribute turi būti galiojantis IPv6 adresas.',
    'json'                 => ':attribute turi būti galiojanti JSON eilutė.',
    'max'                  => [
        'numeric' => ':attribute negali būti didesnis nei :max.',
        'file'    => ':attribute negali būti didesnis nei :max KB.',
        'string'  => ':attribute negali būti sudarytas iš daugiau nei :max simbolių.',
        'array'   => ':attribute negali turėti daugiau nei :max elementų.',
    ],
    'mimes'                => ':attribute failas turi būti vieno iš šių tipų: :values.',
    'mimetypes'            => ':attribute failas turi būti vieno iš šių tipų: :values.',
    'min'                  => [
        'numeric' => ':attribute negali būti mažesnis nei :min.',
        'file'    => ':attribute negali būti mažesnis nei :min KB.',
        'string'  => ':attribute negali būti sudarytas iš mažiau nei :min simbolių.',
        'array'   => ':attribute negali turėti mažiau nei :min elementų.',
    ],
    'not_in'               => 'Pasirinktas :attribute nėra tinkamas.',
    'not_regex'            => 'Netinkamas :attribute formatas.',
    'numeric'              => ':attribute turi būti skaičius.',
    'present'              => ':attribute laukelis yra privalomas.',
    'regex'                => 'Netinkamas :attribute formatas.',
    'required'             => 'Reikalingas :attribute laukelis.',
    'required_if'          => ':attribute laukelis reikalingas, kai :other yra :value.',
    'required_unless'      => ':attribute laukelis reikalingas, jei :other nėra :values.',
    'required_with'        => ':attribute laukelis reikalingas, kai vertė yra :values.',
    'required_with_all'    => ':attribute laukelis reikalingas, kai vertė yra :values.',
    'required_without'     => ':attribute laukelis yra reikalingas, kai vertė nėra :values.',
    'required_without_all' => ':attribute laukelis yra reikalingas, kai nėra nė vieno iš :values.',
    'same'                 => ':attribute ir :other turi sutapti.',
    'size'                 => [
        'numeric' => ':attribute turi būti :size.',
        'file'    => ':attribute turi būti :size KB.',
        'string'  => ':attribute turi būti sudarytas iš :size simbolių.',
        'array'   => ':attribute privalo turėti :size elementų.',
    ],
    'string'               => ':attribute turi būti eilutė.',
    'timezone'             => ':attribute turi būti galiojanti zona.',
    'unique'               => ':attribute jau panaudotas.',
    'uploaded'             => ':attribute nepavyko įkelti.',
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
            'rule-name' => 'pritaikytasis pranešimas',
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
