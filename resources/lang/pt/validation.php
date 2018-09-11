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

    'accepted'             => 'O :attribute tem de ser aceite.',
    'active_url'           => 'O :attribute não é um endereço URL válido.',
    'after'                => 'O :attribute tem de ser uma data posterior: date.',
    'after_or_equal'       => 'O :attribute tem de ser uma data posterior ou igual a: date.',
    'alpha'                => 'O :attribute só pode conter letras.',
    'alpha_dash'           => 'O :attribute  só pode conter letras, números e travessões.',
    'alpha_num'            => 'O :attribute só pode conter letras e números.',
    'array'                => 'O :attribute tem de ser um vetor.',
    'before'               => 'O :attribute tem de ser uma data anterior: date.',
    'before_or_equal'      => 'O :attribute tem de ser uma data anterior ou igual a: date.',
    'between'              => [
        'numeric' => 'O :attribute  deve estar entre :min e :max.',
        'file'    => 'O :attribute deve estar entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve estar entre :min e :max carateres.',
        'array'   => 'O :attribute deve estar entre :min e :max. itens.',
    ],
    'boolean'              => 'O campo do :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação do :attribute não corresponde.',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute não corresponde ao formato: format.',
    'different'            => 'O :attribute e :other devem ser diferentes.',
    'digits'               => 'O :attribute tem de ser :digits dígitos.',
    'digits_between'       => 'O :attribute  deve estar entre :min e :max dígitos.',
    'dimensions'           => 'O :attribute  tem dimensões de imagem inválidas.',
    'distinct'             => 'O campo do :attribute tem um valor duplicado.',
    'email'                => 'O :attribute tem de ser um endereço de e-mail válido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'file'                 => 'O :attribute tem de ser um ficheiro.',
    'filled'               => 'O campo do :attribute tem de ter um valor.',
    'image'                => 'O :attribute tem de ser uma imagem.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => 'O campo do :attribute não existe em :other.',
    'integer'              => 'O :attribute tem de ser um número inteiro.',
    'ip'                   => 'O :attribute tem de ser um endereço de IP válido.',
    'ipv4'                 => 'O :attribute tem de ser um endereço de IPv4 válido.',
    'ipv6'                 => 'O :attribute tem de ser um endereço de IPv6 válido.',
    'json'                 => 'O :attribute tem de ser uma sequência JSON válida.',
    'max'                  => [
        'numeric' => 'O :attribute não pode ser superior a :max.',
        'file'    => 'O :attribute não pode ser superior a :max kilobytes.',
        'string'  => 'O :attribute não pode ser superior a :max carateres.',
        'array'   => 'O :attribute não pode ter mais do que :max itens.',
    ],
    'mimes'                => 'O :attribute tem de ser um ficheiro de tipo: :values.',
    'mimetypes'            => 'O :attribute tem de ser um ficheiro de tipo: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve ter pelo menos :min.',
        'file'    => 'O :attribute deve ter pelo menos :min kilobytes.',
        'string'  => 'O :attribute deve ter pelo menos :min carateres.',
        'array'   => 'O :attribute deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'not_regex'            => 'O formato do :attribute é inválido.',
    'numeric'              => 'O :attribute  tem de ser um número.',
    'present'              => 'O campo do :attribute deve estar presente.',
    'regex'                => 'O formato do :attribute é inválido.',
    'required'             => 'O campo do :attribute é necessário.',
    'required_if'          => 'O campo do :attribute é necessário quando :other é :value.',
    'required_unless'      => 'O campo do :attribute é necessário, exceto se :other estiver em :values.',
    'required_with'        => 'O campo do :attribute é necessário quando :values está presente.',
    'required_with_all'    => 'O campo do :attribute é necessário quando :values está presente.',
    'required_without'     => 'O campo do :attribute é necessário quando :values não está presente.',
    'required_without_all' => 'O campo do :attribute é necessário quando nenhum dos :values estão presentes.',
    'same'                 => 'O :attribute e :other devem corresponder.',
    'size'                 => [
        'numeric' => 'O :attribute tem de ser :size.',
        'file'    => 'O :attribute tem de ser :size kilobytes.',
        'string'  => 'O :attribute tem de ser :size carateres.',
        'array'   => 'O :attribute tem de conter :size itens.',
    ],
    'string'               => 'O :attribute tem de ser uma sequência.',
    'timezone'             => 'O :attribute tem de ser uma zona válida.',
    'unique'               => 'O :attribute já foi utilizado.',
    'uploaded'             => 'O :attribute não efetuou o carregamento.',
    'url'                  => 'O formato do :attribute é inválido.',

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
            'rule-name' => 'mensagem personalizada',
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
