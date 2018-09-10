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

    'accepted'             => 'Le/la :attribute doit être accepté(e).',
    'active_url'           => 'Le/la :attribute n’est pas un URL valide.',
    'after'                => 'Le/la :attribute doit être une date ultérieure à :date.',
    'after_or_equal'       => 'Le/la :attribute doit être une date ultérieure ou égale à :date.',
    'alpha'                => 'Le/la :attribute ne peut comporter que des lettres.',
    'alpha_dash'           => 'Le/la :attribute ne peut comporter que des lettres, des chiffres ou des tirets.',
    'alpha_num'            => 'Le/la :attribute ne peut comporter que des lettres et des chiffres.',
    'array'                => 'Le/la :attribute doit être un tableau (array).',
    'before'               => 'Le/la :attribute doit être une date antérieure à :date.',
    'before_or_equal'      => 'Le/la :attribute doit être une date antérieure ou égale à :date.',
    'between'              => [
        'numeric' => 'Le/la :attribute doit être compris(e) entre :min et :max.',
        'file'    => 'Le/la :attribute doit être compris(e) entre :min et :max. kilobytes.',
        'string'  => 'Le/la :attribute doit être compris(e) entre :min et :max. caractères.',
        'array'   => 'Le/la :attribute doit être compris(e) entre :min et :max. objets.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed'            => 'La confirmation de :attribute ne correspond pas.',
    'date'                 => 'Le/la :attribute n’est pas une date valide.',
    'date_format'          => 'Le/la :attribute ne correspond pas au format :format.',
    'different'            => 'Le/la :attribute et :other doivent être différents.',
    'digits'               => 'Le/la :attribute doit comporter des :digits chiffres.',
    'digits_between'       => 'Le/la :attribute doit comporter entre :min et :max. chiffres.',
    'dimensions'           => 'La taille de l’image de :attribute n’est pas valide.',
    'distinct'             => 'Le champ :attribute présente une valeur en double.',
    'email'                => 'Le/la :attribute doit être une adresse e-mail valide.',
    'exists'               => 'Le/la :attribute sélectionné(e) n’est pas valide.',
    'file'                 => 'Le/la :attribute doit être un fichier.',
    'filled'               => 'Le champ :attribute doit avoir une valeur.',
    'image'                => 'Le/la :attribute doit être une image.',
    'in'                   => 'Le/la :attribute sélectionné(e) n’est pas valide.',
    'in_array'             => 'Le champ :attribute n’existe pas dans :other.',
    'integer'              => 'Le/la :attribute doit être un nombre entier.',
    'ip'                   => 'Le/la :attribute doit être une adresse IP valide.',
    'ipv4'                 => 'Le/la :attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => 'Le/la :attribute doit être une adresse IPv6 valide.',
    'json'                 => 'Le/la :attribute doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => 'Le/la :attribute ne peut pas dépasser :max.',
        'file'    => 'Le/la :attribute ne peut pas dépasser :max kilobytes.',
        'string'  => 'Le/la :attribute ne peut pas dépasser :max caractères.',
        'array'   => 'Le/la :attribute ne peut pas dépasser :max objets.',
    ],
    'mimes'                => 'Le/la :attribute doit être un fichier de type: :values.',
    'mimetypes'            => 'Le/la :attribute doit être un fichier de type: :values.',
    'min'                  => [
        'numeric' => 'Le/la :attribute doit être supérieur(e) à :min.',
        'file'    => 'Le/la :attribute doit être supérieur(e) à :min kilobytes.',
        'string'  => 'Le/la :attribute doit être supérieur(e) à :min caractères.',
        'array'   => 'Le/la :attribute doit être supérieur(e) à :min objets.',
    ],
    'not_in'               => 'Le/la :attribute sélectionné(e) n’est pas valide.',
    'not_regex'            => 'Le format de :attribute n’est pas valide.',
    'numeric'              => 'Le/la :attribute doit être un nombre.',
    'present'              => 'Le champ :attribute doit être présent.',
    'regex'                => 'Le format de :attribute n’est pas valide.',
    'required'             => 'Le champ :attribute est obligatoire.',
    'required_if'          => 'Le champ :attribute est obligatoire lorsque :other est :value.',
    'required_unless'      => 'Le champ :attribute est obligatoire à moins que :other soit :values.',
    'required_with'        => 'Le champ :attribute est obligatoire lorsque :values est présent(e).',
    'required_with_all'    => 'Le champ :attribute est obligatoire lorsque :values est présent(e).',
    'required_without'     => 'Le champ :attribute est obligatoire lorsque :values est absent(e).',
    'required_without_all' => 'Le champ :attribute est obligatoire lorsque qu’aucun(e) :values n’est présent(e).',
    'same'                 => 'Le/la :attribute et :other doivent correspondre.',
    'size'                 => [
        'numeric' => 'Le/la :attribute doit être de :size.',
        'file'    => 'Le/la :attribute doit être de :size kilobytes.',
        'string'  => 'Le/la :attribute doit être de :size caractères.',
        'array'   => 'Le/la :attribute doit contenir :size objets.',
    ],
    'string'               => 'Le/la :attribute doit être une chaîne.',
    'timezone'             => 'Le/la :attribute doit être une zone valide.',
    'unique'               => 'Le/la :attribute a déjà été attribué.',
    'uploaded'             => 'Échec du téléchargement de :attribute.',
    'url'                  => 'Le format de :attribute n’est pas valide.',

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
            'rule-name' => 'message personnalisé',
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
