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

    'accepted'             => ':attribute kabul edilmelidir.',
    'active_url'           => ':attribute geçerli bir URL değil.',
    'after'                => ':attribute :date tarihinden sonraki bir tarih olmalıdır.',
    'after_or_equal'       => ':attribute :date tarihinden sonraki ya da bununla aynı bir tarih olmalıdır.',
    'alpha'                => ':attribute yalnızca harf içerebilir.',
    'alpha_dash'           => ':attribute yalnızca harf, rakam ya da çizgi içerebilir.',
    'alpha_num'            => ':attribute yalnızca harf ya da rakam içerebilir.',
    'array'                => ':attribute bir dizi halinde olmalıdır.',
    'before'               => ':attribute :date tarihinden önceki bir tarih olmalıdır.',
    'before_or_equal'      => ':attribute :date tarihinden önceki ya da bununla aynı bir tarih olmalıdır.',
    'between'              => [
        'numeric' => ':attribute :min ile :max arasında olmalıdır.',
        'file'    => ':attribute :min ile :max kilobayt arasında olmalıdır.',
        'string'  => ':attribute :min ile :max karakter arasında olmalıdır.',
        'array'   => ':attribute :min ile :max öge arasında olmalıdır.',
    ],
    'boolean'              => ':attribute alanı doğru ya da yanlış şeklinde olmalıdır.',
    'confirmed'            => ':attribute onayı eşleşmiyor.',
    'date'                 => ':attribute geçerli bir tarih değil.',
    'date_format'          => ':attribute :format biçimi ile eşleşmiyor.',
    'different'            => ':attribute ve :other farklı olmalıdır.',
    'digits'               => ':attribute :digits haneli olmalıdır.',
    'digits_between'       => ':attribute :min ile :max hane arasında olmalıdır.',
    'dimensions'           => ':attribute resim boyutu geçersiz.',
    'distinct'             => ':attribute alanında aynı değerler mevcut.',
    'email'                => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'exists'               => 'Seçili :attribute geçersiz.',
    'file'                 => ':attribute bir dosya olmalıdır.',
    'filled'               => ':attribute alanında bir değer olmalıdır.',
    'image'                => ':attribute bir resim olmalıdır.',
    'in'                   => 'Seçili :attribute geçersiz.',
    'in_array'             => ':attribute alanı :other kısmında yer almıyor.',
    'integer'              => ':attribute bir tam sayı olmalıdır.',
    'ip'                   => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4'                 => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6'                 => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json'                 => ':attribute geçerli bir JSON dizgisi olmalıdır.',
    'max'                  => [
        'numeric' => ':attribute :max değerinden daha büyük olamaz.',
        'file'    => ':attribute :max kilobayttan daha büyük olamaz.',
        'string'  => ':attribute :max karakterden daha büyük olamaz.',
        'array'   => ':attribute :max ögeden daha fazlasını içeremez.',
    ],
    'mimes'                => ':attribute bir :values dosya tipi olmalıdır.',
    'mimetypes'            => ':attribute bir :values dosya tipi olmalıdır.',
    'min'                  => [
        'numeric' => ':attribute en az :min olmalıdır.',
        'file'    => ':attribute en az :min kilobayt olmalıdır.',
        'string'  => ':attribute en az :min karakter olmalıdır.',
        'array'   => ':attribute en az :min öge içermelidir.',
    ],
    'not_in'               => 'Seçili :attribute geçersiz.',
    'not_regex'            => ':attribute biçimi geçersiz.',
    'numeric'              => ':attribute bir sayı olmalıdır.',
    'present'              => ':attribute alanı mevcut olmalıdır.',
    'regex'                => ':attribute biçimi geçersiz.',
    'required'             => ':attribute alanı gereklidir.',
    'required_if'          => ':other :value olduğunda :attribute alanı gereklidir.',
    'required_unless'      => ':other :value olmadığında :attribute alanı gereklidir.',
    'required_with'        => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_with_all'    => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_without'     => ':values mevcut olmadığında :attribute alanı gereklidir.',
    'required_without_all' => ':values değerlerinin hiçbiri mevcut olmadığında :attribute alanı gereklidir.',
    'same'                 => ':attribute ve :other birbiriyle eşleşmelidir.',
    'size'                 => [
        'numeric' => ':attribute :size olmalıdır.',
        'file'    => ':attribute :size kilobayt olmalıdır.',
        'string'  => ':attribute :size karakter olmalıdır.',
        'array'   => ':attribute :size öge içermelidir.',
    ],
    'string'               => ':attribute bir dizgi olmalıdır.',
    'timezone'             => ':attribute geçerli bir bölge olmalıdır.',
    'unique'               => ':attribute zaten alınmış.',
    'uploaded'             => ':attribute yüklenemedi.',
    'url'                  => ':attribute biçimi geçersiz.',

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
