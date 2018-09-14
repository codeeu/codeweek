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

    'accepted'             => ':attribute mora biti sprejet.',
    'active_url'           => ':attribute ni veljaven URL.',
    'after'                => ':attribute mora biti datum, ki sledi :date.',
    'after_or_equal'       => ':attribute mora biti datum, ki sledi ali je enak :date.',
    'alpha'                => ':attribute lahko vsebuje samo črke.',
    'alpha_dash'           => ':attribute lahko vsebuje samo črke, številke in poševnice.',
    'alpha_num'            => ':attribute lahko vsebuje samo črke in številke.',
    'array'                => ':attribute mora biti polje.',
    'before'               => ':attribute mora biti datum, ki je predhoden :date.',
    'before_or_equal'      => ':attribute mora biti datum, ki je predhoden ali enak :date.',
    'between'              => [
        'numeric' => ':attribute mora biti med :min in :max.',
        'file'    => ':attribute mora biti med :min in :max kilobajtov.',
        'string'  => ':attribute mora biti med :min in :max znakov.',
        'array'   => ':attribute mora imeti med :min in :max postavk.',
    ],
    'boolean'              => 'Polje :attribute mora biti pravilno ali napačno.',
    'confirmed'            => 'Potrdilo :attribute ni ustrezno.',
    'date'                 => ':attribute ni veljaven datum.',
    'date_format'          => ':attribute ne ustreza formatu :format.',
    'different'            => ':attribute in :other morata biti različna.',
    'digits'               => ':attribute mora biti :digits številk.',
    'digits_between'       => ':attribute mora biti med :min in :max številkami.',
    'dimensions'           => ':attribute ima neveljavno velikost slike.',
    'distinct'             => ':attribute polje ima podvojeno vrednost.',
    'email'                => ':attribute mora biti veljaven elektronski naslov.',
    'exists'               => 'Izbrani :attribute je neveljaven.',
    'file'                 => ':attribute mora biti datoteka.',
    'filled'               => ':attribute polje ima mora imeti vrednost.',
    'image'                => ':attribute mora biti slika.',
    'in'                   => 'Izbrani :attribute je neveljaven.',
    'in_array'             => ':attribute polje ne obstaja v :other.',
    'integer'              => ':attribute mora biti celo število.',
    'ip'                   => ':attribute mora biti veljaven naslov IP.',
    'ipv4'                 => ':attribute mora biti veljaven naslov IPv4.',
    'ipv6'                 => ':attribute mora biti veljaven naslov IPv6.',
    'json'                 => ':attribute mora biti veljaven niz JSON.',
    'max'                  => [
        'numeric' => ':attribute ne sme biti večji od :max.',
        'file'    => ':attribute ne sme biti večji od :max kilobajtov.',
        'string'  => ':attribute ne sme biti večji od :max znakov.',
        'array'   => ':attribute ne sme biti večji od :max postavk.',
    ],
    'mimes'                => ':attribute mora biti datoteka vrste: :values.',
    'mimetypes'            => ':attribute mora biti datoteka vrste: :values.',
    'min'                  => [
        'numeric' => ':attribute mora biti najmanj :min.',
        'file'    => ':attribute mora biti najmanj :min kilobajtov.',
        'string'  => ':attribute mora biti najmanj :min znakov.',
        'array'   => ':attribute mora imeti najmanj :min postavk.',
    ],
    'not_in'               => 'Izbrani :attribute je neveljaven.',
    'not_regex'            => ':attribute je neveljavne oblike.',
    'numeric'              => ':attribute mora biti številka.',
    'present'              => 'Polje :attribute mora biti prisotno.',
    'regex'                => ':attribute je neveljavne oblikeo.',
    'required'             => 'Polje :attribute je obvezno.',
    'required_if'          => 'Polje :attribute je obvezno, kadar je :other :value.',
    'required_unless'      => 'Polje :attribute je obvezno, razen če je :other v :values.',
    'required_with'        => 'Polje :attribute je obvezno, kadar je prisotna vrednost :values.',
    'required_with_all'    => 'Polje :attribute je obvezno, kadar je prisotna vrendost :values.',
    'required_without'     => 'Polje :attribute je obvezno, kadar vrednost :values ni prisotna.',
    'required_without_all' => 'Polje :attribute je obveznoi, kadar ni prisotna nobena od vrednosti :values.',
    'same'                 => ':attribute in :other se morata ujemati.',
    'size'                 => [
        'numeric' => ':attribute mora biti :size.',
        'file'    => ':attribute mora biti :size kilobajtov.',
        'string'  => ':attribute mora biti :size znakov.',
        'array'   => ':attribute mora vsebovati :size postavk.',
    ],
    'string'               => ':attribute mora biti niz.',
    'timezone'             => ':attribute mora biti veljavno območje.',
    'unique'               => ':attribute je že v uporabi.',
    'uploaded'             => ':attribute se ni naložil.',
    'url'                  => ':attribute je neveljavne oblike.',

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
            'rule-name' => 'prilagojeno-sporočilo',
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
