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

    'accepted'             => ':attribute mĺste godkännas.',
    'active_url'           => ':attribute är inte en giltig URL.',
    'after'                => ':attribute mĺste vara ett datum efter :date.',
    'after_or_equal'       => ':attribute mĺste vara ett datum efter eller samma som :date.',
    'alpha'                => ':attribute fĺr bara innehĺlla bokstäver.',
    'alpha_dash'           => ':attribute fĺr bara innehĺlla bokstäver, siffror och streck.',
    'alpha_num'            => ':attribute fĺr bara innehĺlla bokstäver och siffror.',
    'array'                => ':attribute mĺste vara en matris.',
    'before'               => ':attribute mĺste vara ett datum före :date.',
    'before_or_equal'      => ':attribute mĺste vara ett datum före eller samma som :date.',
    'between'              => [
        'numeric' => ':attribute mĺste vara mellan :min och :max.',
        'file'    => ':attribute mĺste vara mellan :min och :max kilobyte.',
        'string'  => ':attribute mĺste vara mellan :min och :max tecken.',
        'array'   => ':attribute mĺste ha mellan :min och :max objekt.',
    ],
    'boolean'              => 'Fältet :attribute mĺste vara sant eller falskt.',
    'confirmed'            => 'Bekräftelsen av :attribute stämmer inte.',
    'date'                 => ':attribute är inte ett giltigt datum.',
    'date_format'          => ':attribute stämmer inte med formatet :format.',
    'different'            => ':attribute och :other mĺste vara olika.',
    'digits'               => ':attribute mĺste vara :digits siffror.',
    'digits_between'       => ':attribute mĺste vara mellan :min och :max siffror.',
    'dimensions'           => ':attribute har ogiltiga bilddimensioner.',
    'distinct'             => 'Fältet :attribute har ett dubbelt värde.',
    'email'                => ':attribute mĺste vara en giltig e-postadress.',
    'exists'               => 'Vald :attribute är ogiltig.',
    'file'                 => ':attribute mĺste vara en fil.',
    'filled'               => 'Fältet :attribute mĺste ha ett värde.',
    'image'                => ':attribute mĺste vara en bild.',
    'in'                   => 'Vald :attribute är ogiltig.',
    'in_array'             => 'Fältet :attribute finns inte i :other.',
    'integer'              => ':attribute mĺste vara ett heltal.',
    'ip'                   => ':attribute mĺste vara en giltig IP-adress.',
    'ipv4'                 => ':attribute mĺste vara en giltig IPv4-adress.',
    'ipv6'                 => ':attribute mĺste vara en giltig IPv6-adress.',
    'json'                 => ':attribute mĺste vara en giltig JSON-sträng.',
    'max'                  => [
        'numeric' => ':attribute fĺr inte vara större än :max.',
        'file'    => ':attribute fĺr inte vara större än :max kilobyte.',
        'string'  => ':attribute fĺr inte vara större än :max tecken.',
        'array'   => ':attribute fĺr inte ha fler än :max objekt.',
    ],
    'mimes'                => ':attribute mĺste vara en fil av typen: :values.',
    'mimetypes'            => ':attribute mĺste vara en fil av typen: :values.',
    'min'                  => [
        'numeric' => ':attribute mĺste vara minst :min.',
        'file'    => ':attribute mĺste vara minst :min kilobyte.',
        'string'  => ':attribute mĺste vara minst :min tecken.',
        'array'   => ':attribute mĺste ha minst :min objekt.',
    ],
    'not_in'               => 'Vald :attribute är ogiltig.',
    'not_regex'            => 'Formatet :attribute är ogiltigt.',
    'numeric'              => ':attribute mĺste vara ett nummer.',
    'present'              => 'Fältet :attribute mĺste finnas.',
    'regex'                => 'Formatet :attribute är ogiltigt.',
    'required'             => 'Fältet :attribute krävs.',
    'required_if'          => 'Fältet :attribute krävs när :other är :value.',
    'required_unless'      => 'Fältet :attribute krävs om inte :other är i :value.',
    'required_with'        => 'Fältet :attribute krävs när :values finns.',
    'required_with_all'    => 'Fältet :attribute krävs när :values finns.',
    'required_without'     => 'Fältet :attribute krävs när :values inte finns.',
    'required_without_all' => 'Fältet :attribute krävs när inga av :values finns.',
    'same'                 => ':attribute och :other mĺste stämma överens.',
    'size'                 => [
        'numeric' => ':attribute mĺste vara :size.',
        'file'    => ':attribute mĺste vara :size kilobyte.',
        'string'  => ':attribute mĺste vara :size tecken.',
        'array'   => ':attribute mĺste innehĺlla :size objekt.',
    ],
    'string'               => ':attribute mĺste vara en sträng.',
    'timezone'             => ':attribute mĺste vara en giltig zon.',
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
