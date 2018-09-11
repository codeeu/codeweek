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

    'accepted'             => ':attribute moet geaccepteerd worden.',
    'active_url'           => ':attribute is geen geldige URL.',
    'after'                => ':attribute moet een datum na :date zijn.',
    'after_or_equal'       => ':attribute moet een datum na of gelijk aan :date zijn.',
    'alpha'                => ':attribute mag alleen letters bevatten.',
    'alpha_dash'           => ':attribute mag alleen letters, nummers en streepjes bevatten.',
    'alpha_num'            => ':attribute mag alleen letters en cijfers bevatten.',
    'array'                => ':attribute moet een matrix zijn.',
    'before'               => ':attribute moet een datum vóór :date zijn.',
    'before_or_equal'      => ':attribute moet een datum vóór of gelijk aan :date zijn.',
    'between'              => [
        'numeric' => ':attribute moet tussen :min en :max liggen.',
        'file'    => ':attribute moet tussen :min en :max kilobytes groot zijn.',
        'string'  => ':attribute moet tussen :min en :max tekens lang zijn.',
        'array'   => ':attribute moet tussen :min en :max items bevatten.',
    ],
    'boolean'              => 'Het veld :attribute moet waar of onwaar zijn.',
    'confirmed'            => 'De bevestiging van :attribute stemt niet overeen met de eigenlijke waarde.',
    'date'                 => ':attribute is geen geldige datum.',
    'date_format'          => ':attribute heeft niet de indeling :format.',
    'different'            => ':attribute en :other moeten verschillen.',
    'digits'               => ':attribute moet :digits digits bevatten.',
    'digits_between'       => ':attribute moet tussen :min en :max digits bevatten.',
    'dimensions'           => 'De afmetingen van de afbeelding van :attribute zijn ongeldig.',
    'distinct'             => 'Het veld :attribute is niet uniek.',
    'email'                => ':attribute moet geldig e-mailadres zijn.',
    'exists'               => 'De geselecteerde :attribute is niet geldig.',
    'file'                 => ':attribute moet een bestand zijn.',
    'filled'               => 'Het veld :attribute moet een waarde bevatten.',
    'image'                => ':attribute moet een afbeelding zijn.',
    'in'                   => 'Geselecteerde :attribute is niet geldig.',
    'in_array'             => 'Het veld :attribute bestaat niet in :other.',
    'integer'              => ':attribute moet een geheel getal zijn.',
    'ip'                   => ':attribute moet een geldig IP-adres zijn.',
    'ipv4'                 => ':attribute moet een geldig IPv4-adres zijn.',
    'ipv6'                 => ':attribute moet een geldig IPv6-adres zijn.',
    'json'                 => ':attribute moet een geldige JSON-string zijn.',
    'max'                  => [
        'numeric' => ':attribute mag niet groter zijn dan :max.',
        'file'    => ':attribute mag niet groter zijn dan :max kilobytes.',
        'string'  => ':attribute mag niet langer zijn dan :max tekens.',
        'array'   => ':attribute mag niet meer dan dan :max items bevatten.',
    ],
    'mimes'                => ':attribute moet een bestand zijn van het type: :values.',
    'mimetypes'            => ':attribute moet een bestand zijn van het type: :values.',
    'min'                  => [
        'numeric' => ':attribute moet ten minste :min zijn.',
        'file'    => ':attribute moet ten minste :min kilobytes groot zijn.',
        'string'  => ':attribute moet ten minste :min tekens lang zijn.',
        'array'   => ':attribute moet ten minste :min items bevatten.',
    ],
    'not_in'               => 'Geselecteerde :attribute is niet geldig.',
    'not_regex'            => 'De indeling van :attribute is ongeldig.',
    'numeric'              => ':attribute moet een getal zijn.',
    'present'              => 'Het veld :attribute moet aanwezig zijn.',
    'regex'                => 'De indeling van :attribute is ongeldig.',
    'required'             => 'Het veld :attribute is vereist.',
    'required_if'          => 'Het veld :attribute is vereist wanneer :other :value is.',
    'required_unless'      => 'Het veld :attribute is vereist wanneer :other in :value is.',
    'required_with'        => 'Het veld :attribute is vereist wanneer :values aanwezig is.',
    'required_with_all'    => 'Het veld :attribute is vereist wanneer :values aanwezig is.',
    'required_without'     => 'Het veld :attribute is vereist wanneer :values niet aanwezig is.',
    'required_without_all' => 'Het veld :attribute is vereist wanneer geen van de :values aanwezig zijn.',
    'same'                 => ':attribute en :other moeten overeenstemmen.',
    'size'                 => [
        'numeric' => ':attribute moet :size zijn.',
        'file'    => ':attribute moet :size kilobytes zijn.',
        'string'  => ':attribute moet :size tekens lang zijn.',
        'array'   => ':attribute moet :size items bevatten.',
    ],
    'string'               => ':attribute moet een tekenreeks zijn.',
    'timezone'             => ':attribute moet een geldige zone zijn.',
    'unique'               => ':attribute is al ingenomen.',
    'uploaded'             => ':attribute kan niet worden geüpload.',
    'url'                  => 'De indeling van :attribute is ongeldig.',

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
