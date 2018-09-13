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

    'accepted'             => 'Należy zaakceptować :attribute.',
    'active_url'           => ':attribute nie jest prawidłowym adresem URL.',
    'after'                => ':attribute musi być datą późniejszą niż :date.',
    'after_or_equal'       => ':attribute nie może być datą wcześniejszą niż :date.',
    'alpha'                => ':attribute może zawierać wyłącznie litery.',
    'alpha_dash'           => ':attribute może zawierać wyłącznie litery, cyfry i myślniki.',
    'alpha_num'            => ':attribute może zawierać wyłącznie litery i cyfry.',
    'array'                => ':attribute musi być tablicą.',
    'before'               => ':attribute musi być datą wcześniejszą niż :date.',
    'before_or_equal'      => ':attribute nie może być datą późniejszą niż :date.',
    'between'              => [
        'numeric' => ':attribute musi mieścić się w zakresie od :min do :max.',
        'file'    => ':attribute musi wynosić od :min do :max kilobajtów.',
        'string'  => ':attribute musi zawierać od :min do :max znaków.',
        'array'   => ':attribute musi zawierać od :min do :max elementów.',
    ],
    'boolean'              => 'Pole :attribute musi mieć wartość „prawda” lub „fałsz”.',
    'confirmed'            => 'Wartość w polu potwierdzenia :attribute jest niezgodna.',
    'date'                 => ':attribute nie jest prawidłową datą.',
    'date_format'          => ':attribute i format :format nie są zgodne.',
    'different'            => ':attribute i :other muszą się różnić.',
    'digits'               => ':attribute musi składać się z :digits cyfr.',
    'digits_between'       => ':attribute musi zawierać od :min do :max cyfr.',
    'dimensions'           => ':attribute ma nieprawidłowe wymiary obrazu.',
    'distinct'             => 'Pole :attribute zawiera zduplikowaną wartość.',
    'email'                => ':attribute musi być prawidłowym adresem e-mail.',
    'exists'               => 'Wybrano nieprawidł. :attribute.',
    'file'                 => ':attribute musi być plikiem.',
    'filled'               => 'Pole :attribute zmusi zawierać wartość.',
    'image'                => ':attribute musi być obrazem.',
    'in'                   => 'Wybrano nieprawidł. :attribute.',
    'in_array'             => 'Pole :attribute nie istnieje w :other.',
    'integer'              => ':attribute musi być liczbą całkowitą.',
    'ip'                   => ':attribute musi być prawidłowym adresem IP.',
    'ipv4'                 => ':attribute musi być prawidłowym adresem IPv4.',
    'ipv6'                 => ':attribute musi być prawidłowym adresem IPv6.',
    'json'                 => ':attribute musi być prawidłowym ciągiem JSON.',
    'max'                  => [
        'numeric' => ':attribute nie może przekraczać :max.',
        'file'    => ':attribute nie może przekraczać :max kilobajtów.',
        'string'  => ':attribute nie może przekraczać :max znaków.',
        'array'   => ':attribute nie może zawierać więcej niż :max elementów.',
    ],
    'mimes'                => ':attribute musi być plikiem typu: :values.',
    'mimetypes'            => ':attribute musi być plikiem typu: :values.',
    'min'                  => [
        'numeric' => ':attribute musi wynosić co najmniej :min.',
        'file'    => ':attribute musi wynosić co najmniej :min kilobajtów.',
        'string'  => ':attribute musi zawierać co najmniej :min znaków.',
        'array'   => ':attribute musi zawierać co najmniej :min elementów.',
    ],
    'not_in'               => 'Wybrano nieprawidł. :attribute.',
    'not_regex'            => 'Format :attribute jest nieprawidłowy.',
    'numeric'              => ':attribute musi być liczbą.',
    'present'              => 'Pole :attribute musi być obecne.',
    'regex'                => 'Format :attribute jest nieprawidłowy.',
    'required'             => 'Pole :attribute jest wymagane.',
    'required_if'          => 'Pole :attribute jest wymagane, gdy :other ma wartość :value.',
    'required_unless'      => 'Pole :attribute jest wymagane, chyba że :other wyrażono w :values.',
    'required_with'        => 'Pole :attribute jest wymagane, gdy wartość :values jest obecna.',
    'required_with_all'    => 'Pole :attribute jest wymagane, gdy wartość :values jest obecna.',
    'required_without'     => 'Pole :attribute jest wymagane, gdy wartość :values nie jest obecna.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy żadna z wartości :values nie jest obecna.',
    'same'                 => ':attribute i :other muszą być zgodne.',
    'size'                 => [
        'numeric' => ':attribute musi wynosić :size.',
        'file'    => ':attribute musi wynosić :size kilobajtów.',
        'string'  => ':attribute musi zawierać :size znaków.',
        'array'   => ':attribute musi zawierać :size elementów.',
    ],
    'string'               => ':attribute musi być ciągiem.',
    'timezone'             => ':attribute musi być prawidłową strefą.',
    'unique'               => ':attribute jest już w użyciu.',
    'uploaded'             => 'Nie udało się przesłać :attribute.',
    'url'                  => 'Format :attribute jest nieprawidłowy.',

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
