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

    'accepted'             => ':attribute трябва да се приеме.',
    'active_url'           => ':attribute не е валиден URL.',
    'after'                => ':attribute трябва да е дата след :date.',
    'after_or_equal'       => ':attribute трябва да е дата след или същата като :date.',
    'alpha'                => ':attribute може да съдържа само букви.',
    'alpha_dash'           => ':attribute може да съдържа само букви, цифри и тирета.',
    'alpha_num'            => ':attribute може да съдържа само букви и цифри.',
    'array'                => ':attribute трябва да е масив.',
    'before'               => ':attribute трябва да е дата преди :date.',
    'before_or_equal'      => ':attribute трябва да е дата преди или същата като :date.',
    'between'              => [
        'numeric' => ':attribute трябва да е в интервала от :min до :max.',
        'file'    => ':attribute трябва да е в интервала от :min до :max килобайта.',
        'string'  => ':attribute трябва да е в знаковия интервала от :min до :max.',
        'array'   => ':attribute трябва да има от :min до :max точки.',
    ],
    'boolean'              => 'Полето на :attribute трябва да е вярно или невярно.',
    'confirmed'            => 'Потвърждението на :attribute не съвпада.',
    'date'                 => ':attribute не е валидна дата',
    'date_format'          => ':attribute не съвпада с формата :format.',
    'different'            => ':attribute и :other трябва да са различни.',
    'digits'               => ':attribute трябва да има :digits цифри.',
    'digits_between'       => ':attribute трябва да има цифри в интервала от :min до :max.',
    'dimensions'           => ':attribute има невалидни размери на изображението.',
    'distinct'             => 'Полето на :attribute има дублираща се стойност.',
    'email'                => ':attribute трябва да е валиден имейл адрес.',
    'exists'               => 'Избраната стойност на :attribute е невалидна.',
    'file'                 => ':attribute трябва да е файл.',
    'filled'               => 'В полето на :attribute трябва да има стойност.',
    'image'                => ':attribute трябва да е изображение.',
    'in'                   => 'Избраната стойност на :attribute е невалидна.',
    'in_array'             => 'Полето :attribute не съществува в :other.',
    'integer'              => ':attribute трябва да е цяло число.',
    'ip'                   => ':attribute трябва да е валиден IP адрес.',
    'ipv4'                 => ':attribute трябва да е валиден IPv4 адрес.',
    'ipv6'                 => ':attribute трябва да е валиден IPv6 адрес.',
    'json'                 => ':attribute трябва да е валиден JSON низ.',
    'max'                  => [
        'numeric' => 'Стойността на :attribute не може да е по-голяма от :max.',
        'file'    => 'Стойността на :attribute не може да е по-голяма от :max килобайта.',
        'string'  => 'Стойността на :attribute не може да е по-голяма от :max знака.',
        'array'   => ':attribute не може да има повече от :max точки.',
    ],
    'mimes'                => ':attribute трябва да е файл от тип: :values.',
    'mimetypes'            => ':attribute трябва да е файл от тип: :values.',
    'min'                  => [
        'numeric' => ':attribute трябва да е най-малко :min.',
        'file'    => ':attribute трябва да е най-малко :min килобайта.',
        'string'  => ':attribute трябва да има най-малко :min знака.',
        'array'   => ':attribute трябва да има най-малко :min точки.',
    ],
    'not_in'               => 'Избраната стойност на :attribute е невалидна.',
    'not_regex'            => 'Форматът на :attribute е невалиден.',
    'numeric'              => ':attribute трябва да е число.',
    'present'              => 'Полето на :attribute трябва да присъства.',
    'regex'                => 'Форматът на :attribute е невалиден.',
    'required'             => 'Полето на :attribute е задължително.',
    'required_if'          => 'Полето на :attribute е задължително, когато :other е :value.',
    'required_unless'      => 'Полето на :attribute е задължително, освен ако :other е в :values.',
    'required_with'        => 'Полето на :attribute е задължително, когато :values присъства.',
    'required_with_all'    => 'Полето на :attribute е задължително, когато :values присъства.',
    'required_without'     => 'Полето на :attribute е задължително, когато :values не присъства.',
    'required_without_all' => 'Полето на :attribute е задължително, когато не присъстват :values.',
    'same'                 => ':attribute и :other трябва да съвпадат.',
    'size'                 => [
        'numeric' => ':attribute трябва да е :size.',
        'file'    => ':attribute трябва да е :size килобайта.',
        'string'  => ':attribute трябва да е :size знака.',
        'array'   => ':attribute трябва да съдържа :size точки.',
    ],
    'string'               => ':attribute трябва да е низ.',
    'timezone'             => ':attribute трябва да е валидна зона.',
    'unique'               => ':attribute вече се използва.',
    'uploaded'             => 'Неуспешно качване на :attribute.',
    'url'                  => 'Форматът на :attribute е невалиден.',

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
            'rule-name' => 'съобщение по избор',
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
