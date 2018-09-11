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

    'accepted'             => ':attribute мора да биде прифатен.',
    'active_url'           => ':attribute не е важечки УРЛ.',
    'after'                => ':attribute мора да биде датумот по :date.',
    'after_or_equal'       => ':attribute мора да биде датумот по или еднаков на :date.',
    'alpha'                => ':attribute може да содржи само букви.',
    'alpha_dash'           => ':attribute може да содржи само букви, броеви и цртички.',
    'alpha_num'            => ':attribute може да содржи само букви и броеви.',
    'array'                => ':attribute мора да биде низа.',
    'before'               => ':attribute мора да биде датумот пред :date.',
    'before_or_equal'      => ':attribute мора да биде датумот пред или еднаков на :date.',
    'between'              => [
        'numeric' => ':attribute мора да биде помеѓу :min и :max.',
        'file'    => ':attribute мора да биде помеѓу :min и :max килобајти.',
        'string'  => ':attribute мора да биде помеѓу :min и :max карактери.',
        'array'   => ':attribute мора да има помеѓу :min и :max ставки.',
    ],
    'boolean'              => ':аttribute полето мора да биде точно или неточно.',
    'confirmed'            => ':attribute потврдувањето не се совпаѓа.',
    'date'                 => ':attribute не е важечки датум.',
    'date_format'          => ':attribute не се совпаѓа форматот :format.',
    'different'            => ':attribute и :other мора да се различни.',
    'digits'               => ':attribute мора да биде :digits цифри.',
    'digits_between'       => ':attribute мора да биде помеѓу :min и :max цифри.',
    'dimensions'           => ':attribute има неважечки димензии на слика.',
    'distinct'             => ':attribute полето има дуплирана вредност.',
    'email'                => ':attribute мора да биде важечка адреса за е-пошта.',
    'exists'               => 'Избраниот :attribute е неважечки.',
    'file'                 => ':attribute мора да биде датотека.',
    'filled'               => ':attribute полето мора да има вредност.',
    'image'                => ':attribute мора да биде слика.',
    'in'                   => 'Избраниот :attribute е неважечки.',
    'in_array'             => ':attribute полето не постои во :other.',
    'integer'              => ':attribute мора да биде цел број.',
    'ip'                   => ':attribute мора да биде важечка IP адреса.',
    'ipv4'                 => ':attribute мора да биде важечка IPv4 адреса.',
    'ipv6'                 => ':attribute мора да биде важечка IPv6 адреса.',
    'json'                 => ':attribute мора да биде важечка JSON низа.',
    'max'                  => [
        'numeric' => ':attribute не смее да биде поголем од :max.',
        'file'    => ':attribute не смее да биде поголем од :max килобајти.',
        'string'  => ':attribute не смее да биде поголем од :max знаци.',
        'array'   => ':attribute не смее да има повеќе од :max ставки.',
    ],
    'mimes'                => ':attribute мора да биде датотека од тип: :values.',
    'mimetypes'            => ':attribute мора да биде датотека од тип: :values.',
    'min'                  => [
        'numeric' => ':attribute мора да биде најмалку :min.',
        'file'    => ':attribute мора да биде најмалку :min килобајти.',
        'string'  => ':attribute мора да биде најмалку :min знаци.',
        'array'   => ':attribute мора да биде најмалку :min ставки.',
    ],
    'not_in'               => 'Избраниот :attribute е неважечки.',
    'not_regex'            => ':attribute форматот е неважечки.',
    'numeric'              => ':attribute мора да биде број.',
    'present'              => ':аttribute полето мора да биде присутно.',
    'regex'                => ':attribute форматот е неважечки.',
    'required'             => ':attribute полето е потребно.',
    'required_if'          => ':attribute полето е потребно кога :other е :value.',
    'required_unless'      => ':attribute полето е потребно освен ако :other е во :values.',
    'required_with'        => ':attribute полето е потребно кога :values е присутно.',
    'required_with_all'    => ':attribute полето е потребно кога :values е присутно.',
    'required_without'     => ':attribute полето е потребно кога :values не е присутно.',
    'required_without_all' => ':attribute полето е потребно кога ниедно од :values не се присутни.',
    'same'                 => ':attribute и :other мора да се совпаѓаат.',
    'size'                 => [
        'numeric' => ':attribute мора да биде :size.',
        'file'    => ':attribute мора да биде :size килобајти.',
        'string'  => ':attribute мора да биде :size знаци.',
        'array'   => ':attribute мора да содржи :size ставки.',
    ],
    'string'               => ':attribute мора да биде низа.',
    'timezone'             => ':attribute мора да биде важечка зона.',
    'unique'               => ':attribute веќе е зафатен.',
    'uploaded'             => ':attribute не успеа да постави.',
    'url'                  => ':attribute форматот е неважечки.',

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
            'rule-name' => 'приспособена-порака',
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
