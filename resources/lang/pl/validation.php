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

    'accepted'             => 'Nale¿y zaakceptowaæ :attribute.',
    'active_url'           => ':attribute nie jest prawid³owym adresem URL.',
    'after'                => ':attribute musi byæ dat¹ póŸniejsz¹ ni¿ :date.',
    'after_or_equal'       => ':attribute nie mo¿e byæ dat¹ wczeœniejsz¹ ni¿ :date.',
    'alpha'                => ':attribute mo¿e zawieraæ wy³¹cznie litery.',
    'alpha_dash'           => ':attribute mo¿e zawieraæ wy³¹cznie litery, cyfry i myœlniki.',
    'alpha_num'            => ':attribute mo¿e zawieraæ wy³¹cznie litery i cyfry.',
    'array'                => ':attribute musi byæ tablic¹.',
    'before'               => ':attribute musi byæ dat¹ wczeœniejsz¹ ni¿ :date.',
    'before_or_equal'      => ':attribute nie mo¿e byæ dat¹ póŸniejsz¹ ni¿ :date.',
    'between'              => [
        'numeric' => ':attribute musi mieœciæ siê w zakresie od :min do :max.',
        'file'    => ':attribute musi wynosiæ od :min do :max kilobajtów.',
        'string'  => ':attribute musi zawieraæ od :min do :max znaków.',
        'array'   => ':attribute musi zawieraæ od :min do :max elementów.',
    ],
    'boolean'              => 'Pole :attribute musi mieæ wartoœæ „prawda” lub „fa³sz”.',
    'confirmed'            => 'Wartoœæ w polu potwierdzenia :attribute jest niezgodna.',
    'date'                 => ':attribute nie jest prawid³ow¹ dat¹.',
    'date_format'          => ':attribute i format :format nie s¹ zgodne.',
    'different'            => ':attribute i :other musz¹ siê ró¿niæ.',
    'digits'               => ':attribute musi sk³adaæ siê z :digits cyfr.',
    'digits_between'       => ':attribute musi zawieraæ od :min do :max cyfr.',
    'dimensions'           => ':attribute ma nieprawid³owe wymiary obrazu.',
    'distinct'             => 'Pole :attribute zawiera zduplikowan¹ wartoœæ.',
    'email'                => ':attribute musi byæ prawid³owym adresem e-mail.',
    'exists'               => 'Wybrano nieprawid³. :attribute.',
    'file'                 => ':attribute musi byæ plikiem.',
    'filled'               => 'Pole :attribute zmusi zawieraæ wartoœæ.',
    'image'                => ':attribute musi byæ obrazem.',
    'in'                   => 'Wybrano nieprawid³. :attribute.',
    'in_array'             => 'Pole :attribute nie istnieje w :other.',
    'integer'              => ':attribute musi byæ liczb¹ ca³kowit¹.',
    'ip'                   => ':attribute musi byæ prawid³owym adresem IP.',
    'ipv4'                 => ':attribute musi byæ prawid³owym adresem IPv4.',
    'ipv6'                 => ':attribute musi byæ prawid³owym adresem IPv6.',
    'json'                 => ':attribute musi byæ prawid³owym ci¹giem JSON.',
    'max'                  => [
        'numeric' => ':attribute nie mo¿e przekraczaæ :max.',
        'file'    => ':attribute nie mo¿e przekraczaæ :max kilobajtów.',
        'string'  => ':attribute nie mo¿e przekraczaæ :max znaków.',
        'array'   => ':attribute nie mo¿e zawieraæ wiêcej ni¿ :max elementów.',
    ],
    'mimes'                => ':attribute musi byæ plikiem typu: :values.',
    'mimetypes'            => ':attribute musi byæ plikiem typu: :values.',
    'min'                  => [
        'numeric' => ':attribute musi wynosiæ co najmniej :min.',
        'file'    => ':attribute musi wynosiæ co najmniej :min kilobajtów.',
        'string'  => ':attribute musi zawieraæ co najmniej :min znaków.',
        'array'   => ':attribute musi zawieraæ co najmniej :min elementów.',
    ],
    'not_in'               => 'Wybrano nieprawid³. :attribute.',
    'not_regex'            => 'Format :attribute jest nieprawid³owy.',
    'numeric'              => ':attribute musi byæ liczb¹.',
    'present'              => 'Pole :attribute musi byæ obecne.',
    'regex'                => 'Format :attribute jest nieprawid³owy.',
    'required'             => 'Pole :attribute jest wymagane.',
    'required_if'          => 'Pole :attribute jest wymagane, gdy :other ma wartoœæ :value.',
    'required_unless'      => 'Pole :attribute jest wymagane, chyba ¿e :other wyra¿ono w :values.',
    'required_with'        => 'Pole :attribute jest wymagane, gdy wartoœæ :values jest obecna.',
    'required_with_all'    => 'Pole :attribute jest wymagane, gdy wartoœæ :values jest obecna.',
    'required_without'     => 'Pole :attribute jest wymagane, gdy wartoœæ :values nie jest obecna.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy ¿adna z wartoœci :values nie jest obecna.',
    'same'                 => ':attribute i :other musz¹ byæ zgodne.',
    'size'                 => [
        'numeric' => ':attribute musi wynosiæ :size.',
        'file'    => ':attribute musi wynosiæ :size kilobajtów.',
        'string'  => ':attribute musi zawieraæ :size znaków.',
        'array'   => ':attribute musi zawieraæ :size elementów.',
    ],
    'string'               => ':attribute musi byæ ci¹giem.',
    'timezone'             => ':attribute musi byæ prawid³ow¹ stref¹.',
    'unique'               => ':attribute jest ju¿ w u¿yciu.',
    'uploaded'             => 'Nie uda³o siê przes³aæ :attribute.',
    'url'                  => 'Format :attribute jest nieprawid³owy.',

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
