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

    'accepted'             => 'L-:attribute għandu jiġi aċċettat.',
    'active_url'           => 'L-:attribute mhuwiex URL validu.',
    'after'                => 'L-:attribute għandu jkun data wara :data.',
    'after_or_equal'       => 'L-:attribute għandu jkun data wara jew daqs :data.',
    'alpha'                => 'L-:attribute jista’ jkun fih ittri biss.',
    'alpha_dash'           => 'L-:attribute jista’ jkun fih biss ittri, numri, singijiet.',
    'alpha_num'            => 'L-:attribute jista’ jkun fih biss ittri u numri.',
    'array'                => 'L-:attribute għandu jkun firxa.',
    'before'               => 'L-:attribute għandu jkun data qabel :data.',
    'before_or_equal'      => 'L-:attribute għandu jkun data qabel jew daqs :data.',
    'between'              => [
        'numeric' => 'L-:attribute għandu jkun bejn :min u :mass.',
        'file'    => 'L-:attribute għandu jkun bejn :min u :mass kilobytes.',
        'string'  => 'L-:attribute għandu jkun bejn :min u :mass karattri.',
        'array'   => 'L-:attribute għandu jkun bejn :min u :mass oġġetti.',
    ],
    'boolean'              => 'Il-qasam tal-:attribute għandu jkun veru jew falz.',
    'confirmed'            => 'Il-konferma tal-:attribute ma taqbilx.',
    'date'                 => 'L-:attribute mhuwiex data valida.',
    'date_format'          => 'L-:attribute ma jaqbilx mal-format :format.',
    'different'            => 'L-:attribute u :oħrajn għandu jkun differenti.',
    'digits'               => 'L-:attribute għandu jkun :ċifri ċifri.',
    'digits_between'       => 'L-:attribute għandu jkun bejn :min u :mass figuri.',
    'dimensions'           => 'L-:attribute għandu dimensjonijiet tal-immaġni mhux validi.',
    'distinct'             => 'Il-qasam tal-attribut għandu valur duplikat.',
    'email'                => 'L-:attribute għandu jkun indirizz tal-posta elettronika validu.',
    'exists'               => 'L-:attribute magħżul mhuwiex validu.',
    'file'                 => 'L-:attribute għandu jkun fajl.',
    'filled'               => 'Il-qasam tal-:attribute għandu jkollu valur.',
    'image'                => 'L-:attribute għandu jkun immaġni.',
    'in'                   => 'L-:attribute magħżul mhuwiex validu.',
    'in_array'             => 'Il-qasam tal-:attribute ma jaqbilx ma’ :oħrajn.',
    'integer'              => 'L-:attribute għandu jkun numru sħiħ.',
    'ip'                   => 'L-:attribute għandu jkun indirizz tal-IP validu.',
    'ipv4'                 => 'L-:attribute għandu jkun indizz tal-IPv4 validu.',
    'ipv6'                 => 'L-:attribute għandu jkun indirizz tal-IPv6 validu.',
    'json'                 => 'L-:attribute għandu jkun string JSON valida.',
    'max'                  => [
        'numeric' => 'L-:attribute ma jistax ikun ikbar minn :mass.',
        'file'    => 'L-:attribute ma jistax ikun ikbar minn :mass kilobytes.',
        'string'  => 'L-:attribute ma jistax ikun ikbar minn :mass karattri.',
        'array'   => 'L-:attribute ma jistax ikollu aktar minn :mass oġġetti.',
    ],
    'mimes'                => 'L-:attribute għandu jkun fajl ta’ tip: :valuri.',
    'mimetypes'            => 'L-:attribute għandu jkun fajl ta’ tip: :valuri.',
    'min'                  => [
        'numeric' => 'L-:attribute għandu jkun tal-inqas :min.',
        'file'    => 'L-:attribute għandu jkun tal-inqas :min kilobytes.',
        'string'  => 'L-:attribute għandu jkun tal-inqas :min karattri.',
        'array'   => 'L-:attribute għandu jkun tal-inqas :min oġġetti.',
    ],
    'not_in'               => 'L-:attribute magħżul mhuwiex validu.',
    'not_regex'            => 'Il-format tal-:attribute mhuwiex validu.',
    'numeric'              => 'L-:attribute għandu jkun numru.',
    'present'              => 'Il-qasam tal-:attribute għandu jkun preżenti.',
    'regex'                => 'Il-format tal-:attribute mhuwiex validu.',
    'required'             => 'Il-qasam tal-:attribute huwa meħtieġ.',
    'required_if'          => 'Il-qasam tal-:attribute huwa meħtieġ meta :oħrajn ikun :valur.',
    'required_unless'      => 'Il-qasam tal-:attribute huwa meħtieġ sakemm :oħrajn ma jkunx fi :valuri.',
    'required_with'        => 'Il-qasam tal-:attribute huwa meħtieġ meta :valuri jkun preżenti.',
    'required_with_all'    => 'Il-qasam tal-:attribute huwa meħtieġ meta :valuri jkun preżenti.',
    'required_without'     => 'Il-qasam tal-:attribute huwa meħtieġ meta :valuri ma jkunx preżenti.',
    'required_without_all' => 'Il-qasam tal-:attribute huwa meħtieġ meta ebda wieħed minn :valuri ma jkun preżenti.',
    'same'                 => 'L-:attribute u :oħrajn għandhom jaqblu.',
    'size'                 => [
        'numeric' => 'L-:attribute għandu jkun :daqs.',
        'file'    => 'L-:attribute għandu jkun :daqs kilobytes.',
        'string'  => 'L-:attribute għandu jkun :daqs karattri.',
        'array'   => 'L-:attribute għandu jkun :daqs oġġetti.',
    ],
    'string'               => 'L-:attribute għandu jkun string.',
    'timezone'             => 'L-:attribute għandu jkun żona valida.',
    'unique'               => 'L-:attribute diġà ttieħed.',
    'uploaded'             => 'L-:attribute ma ttellax b’suċċess.',
    'url'                  => 'Il-format tal-:attribute mhuwiex validu.',

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
            'rule-name' => 'messaġġ-personalizzat',
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
