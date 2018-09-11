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

    'accepted'             => 'Se debe aceptar :attribute.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute solo puede contener letras.',
    'alpha_dash'           => ':attribute solo puede contener letras, números y guiones.',
    'alpha_num'            => ':attribute solo puede contener letras y números.',
    'array'                => ':attribute debe ser una selección.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => ':attribute debe situarse entre :min y :max.',
        'file'    => ':attribute debe situarse entre :min y :max kilobytes.',
        'string'  => ':attribute debe tener entre :min y :max caracteres.',
        'array'   => ':attribute debe constar de entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'La confirmación :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no se ajusta al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe constar de :digits dígitos.',
    'digits_between'       => ':attribute debe contener entre :min y :max dígitos.',
    'dimensions'           => ':attribute tiene unas dimensiones de imagen no válidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => ':attribute debe ser una dirección de correo electrónico válida.',
    'exists'               => 'El :attribute seleccionado no es válido.',
    'file'                 => ':attribute debe ser un archivo.',
    'filled'               => 'Se debe introducir un valor en el campo :attribute.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute seleccionado no es válido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => ':attribute debe ser una dirección IPv6 válida.',
    'json'                 => ':attribute debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no puede ser mayor que :max.',
        'file'    => ':attribute no puede ser mayor que :max kilobytes.',
        'string'  => ':attribute no puede ser mayor que :max caracteres.',
        'array'   => ':attribute no puede constar de más de :max elementos.',
    ],
    'mimes'                => ':attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => ':attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute debe ser al menos :min.',
        'file'    => ':attribute debe ser al menos :min kilobytes.',
        'string'  => ':attribute debe ser al menos :min caracteres.',
        'array'   => ':attribute debe constar de al menos :min elementos.',
    ],
    'not_in'               => 'El campo :attribute seleccionado no es válido.',
    'not_regex'            => 'El formato :attribute no es válido.',
    'numeric'              => ':attribute debe ser un número.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato :attribute no es válido.',
    'required'             => 'El campo :attribute es un campo requerido.',
    'required_if'          => 'El campo :attribute es un campo requerido siempre que :other sea :value.',
    'required_unless'      => 'El campo :attribute es un campo requerido salvo que :other se encuentre entre :values.',
    'required_with'        => 'El campo :attribute es un campo requerido siempre que :values esté presente.',
    'required_with_all'    => 'El campo :attribute es un campo requerido siempre que :values estén presentes.',
    'required_without'     => 'El campo :attribute es un campo requerido siempre que :values no estén presentes.',
    'required_without_all' => 'El campo :attribute es un campo requerido siempre que no estén presentes :values.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => ':attribute debe ser :size.',
        'file'    => ':attribute debe ser :size kilobytes.',
        'string'  => ':attribute debe ser :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],
    'string'               => ':attribute debe ser una cadena.',
    'timezone'             => ':attribute debe ser una zona válida.',
    'unique'               => ':attribute ya está ocupado.',
    'uploaded'             => 'No se ha podido cargar :attribute.',
    'url'                  => 'El formato :attribute no es válido.',

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
            'rule-name' => 'mensaje-personalizado',
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
