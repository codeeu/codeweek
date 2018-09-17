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

    'accepted'             => ':attribute måste godkännas.',
    'active_url'           => ':attribute är inte en giltig URL.',
    'after'                => ':attribute måste vara ett datum efter :date.',
    'after_or_equal'       => ':attribute måste vara ett datum efter eller samma som :date.',
    'alpha'                => ':attribute får bara innehålla bokstäver.',
    'alpha_dash'           => ':attribute får bara innehålla bokstäver, siffror och streck.',
    'alpha_num'            => ':attribute får bara innehålla bokstäver och siffror.',
    'array'                => ':attribute måste vara en array.',
    'before'               => ':attribute måste vara ett datum före :date.',
    'before_or_equal'      => ':attribute måste vara ett datum före eller samma som :date.',
    'between'              => [
        'numeric' => ':attribute måste vara mellan :min och :max.',
        'file'    => ':attribute måste vara mellan :min och :max kilobyte.',
        'string'  => ':attribute måste vara mellan :min och :max tecken.',
        'array'   => ':attribute måste ha mellan :min och :max objekt.',
    ],
    'boolean'              => 'Fältet :attribute måste vara sant eller falskt.',
    'confirmed'            => 'Bekräftelsen av :attribute stämmer inte.',
    'date'                 => ':attribute är inte ett giltigt datum.',
    'date_format'          => ':attribute stämmer inte med formatet :format.',
    'different'            => ':attribute och :other måste vara olika.',
    'digits'               => ':attribute måste vara :digits siffror.',
    'digits_between'       => ':attribute måste vara mellan :min och :max siffror.',
    'dimensions'           => ':attribute har ogiltiga bilddimensioner.',
    'distinct'             => 'Fältet :attribute har ett dubbelt värde.',
    'email'                => ':attribute måste vara en giltig e-postadress.',
    'exists'               => 'Vald :attribute är ogiltig.',
    'file'                 => ':attribute måste vara en fil.',
    'filled'               => 'Fältet :attribute måste ha ett värde.',
    'image'                => ':attribute måste vara en bild.',
    'in'                   => 'Vald :attribute är ogiltig.',
    'in_array'             => 'Fältet :attribute finns inte i :other.',
    'integer'              => ':attribute måste vara ett heltal.',
    'ip'                   => ':attribute måste vara en giltig IP-adress.',
    'ipv4'                 => ':attribute måste vara en giltig IPv4-adress.',
    'ipv6'                 => ':attribute måste vara en giltig IPv6-adress.',
    'json'                 => ':attribute måste vara en giltig JSON-sträng.',
    'max'                  => [
        'numeric' => ':attribute får inte vara större än :max.',
        'file'    => ':attribute får inte vara större än :max kilobyte.',
        'string'  => ':attribute får inte vara större än :max tecken.',
        'array'   => ':attribute får inte ha fler än :max objekt.',
    ],
    'mimes'                => ':attribute måste vara en fil av typen: :values.',
    'mimetypes'            => ':attribute måste vara en fil av typen: :values.',
    'min'                  => [
        'numeric' => ':attribute måste vara minst :min.',
        'file'    => ':attribute måste vara minst :min kilobyte.',
        'string'  => ':attribute måste vara minst :min tecken.',
        'array'   => ':attribute måste ha minst :min objekt.',
    ],
    'not_in'               => 'Vald :attribute är ogiltig.',
    'not_regex'            => 'Formatet :attribute är ogiltigt.',
    'numeric'              => ':attribute måste vara ett nummer.',
    'present'              => 'Fältet :attribute måste finnas.',
    'regex'                => 'Formatet :attribute är ogiltigt.',
    'required'             => 'Fältet :attribute krävs.',
    'required_if'          => 'Fältet :attribute krävs när :other är :value.',
    'required_unless'      => 'Fältet :attribute krävs om inte :other är i :value.',
    'required_with'        => 'Fältet :attribute krävs när :values finns.',
    'required_with_all'    => 'Fältet :attribute krävs när :values finns.',
    'required_without'     => 'Fältet :attribute krävs när :values inte finns.',
    'required_without_all' => 'Fältet :attribute krävs när inga av :values finns.',
    'same'                 => ':attribute och :other måste stämma överens.',
    'size'                 => [
        'numeric' => ':attribute måste vara :size.',
        'file'    => ':attribute måste vara :size kilobyte.',
        'string'  => ':attribute måste vara :size tecken.',
        'array'   => ':attribute måste innehålla :size objekt.',
    ],
    'string'               => ':attribute måste vara en sträng.',
    'timezone'             => ':attribute måste vara en giltig zon.',
    'unique'               => ':Attribute används redan.',
    'uploaded'             => ':attribute kunde inte laddas upp.',
    'url'                  => 'Formatet :attribute är ogiltigt.',

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
            'rule-name' => 'anpassat meddelande',
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
