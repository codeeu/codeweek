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

    'accepted'             => ':attribute musí byť schválené.',
    'active_url'           => ':attribute nie je platná adresa URL.',
    'after'                => ':attribute musí byť dátum po :date.',
    'after_or_equal'       => ':attribute musí byť dátum po alebo rovný :date.',
    'alpha'                => ':attribute môže obsahovať len písmená.',
    'alpha_dash'           => ':attribute môže obsahovať len písmená, čísla a pomlčky.',
    'alpha_num'            => ':attribute môže obsahovať len písmená a čísla.',
    'array'                => ':attribute musí byť rozmedzie.',
    'before'               => ':attribute musí byť dátum pred :date.',
    'before_or_equal'      => ':attribute musí byť dátum pred alebo rovný :date.',
    'between'              => [
        'numeric' => ':attribute musí mať od :min do :max.',
        'file'    => ':attribute musí mať od :min do :max kilobajtov.',
        'string'  => ':attribute musí mať od :min do :max znakov.',
        'array'   => ':attribute musí mať od :min do :max položiek.',
    ],
    'boolean'              => 'Pole :attribute musí byť pravdivé alebo nepravdivé.',
    'confirmed'            => 'Potvrdenie :attribute nie je zhodné.',
    'date'                 => ':attribute nie je platný dátum.',
    'date_format'          => ':attribute sa nezhoduje s formátom :format.',
    'different'            => ':attribute a :other musia byť odlišné.',
    'digits'               => ':attribute musí mať :digits číslic.',
    'digits_between'       => ':attribute musí mať od :min do :max číslic.',
    'dimensions'           => ':attribute má neplatné rozmery obrázku.',
    'distinct'             => 'V poli :attribute sa opakuje hodnota.',
    'email'                => ':attribute musí byť platná e-mailová adresa.',
    'exists'               => 'Zvolené :attribute je neplatné.',
    'file'                 => ':attribute musí byť súbor.',
    'filled'               => 'V poli :attribute musí byť hodnota.',
    'image'                => ':attribute musí byť obrázok.',
    'in'                   => 'Zvolené :attribute je neplatné.',
    'in_array'             => 'Pole :attribute neexistuje v :other.',
    'integer'              => ':attribute musí byť celé číslo.',
    'ip'                   => ':attribute musí byť platná adresa IP.',
    'ipv4'                 => ':attribute musí byť platná adresa IPv4.',
    'ipv6'                 => ':attribute musí byť platná adresa IPv6.',
    'json'                 => ':attribute musí byť platný reťazec JSON.',
    'max'                  => [
        'numeric' => ':attribute nemôže byť väčšie ako :max.',
        'file'    => ':attribute nemôže byť väčšie ako :max kilobajtov.',
        'string'  => ':attribute nemôže byť väčšie ako :max znakov.',
        'array'   => ':attribute nemôže mať viac ako :max položiek.',
    ],
    'mimes'                => ':attribute musí byť súbor typu: :values.',
    'mimetypes'            => ':attribute musí byť súbor typu: :values.',
    'min'                  => [
        'numeric' => ':attribute musí mať najmenej :min.',
        'file'    => ':attribute musí mať najmenej :min kilobajtov.',
        'string'  => ':attribute musí mať najmenej :min znakov.',
        'array'   => ':attribute musí mať najmenej :min položiek.',
    ],
    'not_in'               => 'Zvolené :attribute je neplatné.',
    'not_regex'            => 'Formát :attribute je neplatný.',
    'numeric'              => ':attribute musí byť číslo.',
    'present'              => 'Pole :attribute sa musí vyskytovať.',
    'regex'                => 'Formát :attribute je neplatný.',
    'required'             => 'Pole :attribute je povinné.',
    'required_if'          => 'Pole :attribute je povinné, keď :other je :value.',
    'required_unless'      => 'Pole :attribute je povinné, pokiaľ :other nie je v :values.',
    'required_with'        => 'Pole :attribute je povinné, keď sa vyskytujú :values.',
    'required_with_all'    => 'Pole :attribute je povinné, keď sa vyskytujú :values.',
    'required_without'     => 'Pole :attribute je povinné, keď sa nevyskytujú :values.',
    'required_without_all' => 'Pole :attribute je povinné, keď sa nevyskytuje nič z :values.',
    'same'                 => ':attribute a :other sa musia zhodovať.',
    'size'                 => [
        'numeric' => ':attribute musí mať :size.',
        'file'    => ':attribute musí mať :size kilobajtov.',
        'string'  => ':attribute musí mať najmenej :size znakov.',
        'array'   => ':attribute musí obsahovať :size položiek.',
    ],
    'string'               => ':attribute musí byť reťazec.',
    'timezone'             => ':attribute musí byť platná zóna.',
    'unique'               => ':attribute sa už používa.',
    'uploaded'             => ':attribute sa nepodarilo nahrať.',
    'url'                  => 'Formát :attribute je neplatný.',

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
