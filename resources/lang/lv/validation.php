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

    'accepted'             => ':attribute ir jâakceptç.',
    'active_url'           => ':attribute nav derîgs URL.',
    'after'                => ':attribute ir jâbût datumam pçc :date.',
    'after_or_equal'       => ':attribute ir jâbût datumam pçc vai vienâ laikâ ar :date.',
    'alpha'                => ':attribute var ietvert tikai burtus.',
    'alpha_dash'           => ':attribute var ietvert tikai burtus, ciparus un domuzîmes.',
    'alpha_num'            => ':attribute var ietvert tikai burtus un ciparus.',
    'array'                => ':attribute ir jâbût masîvam.',
    'before'               => ':attribute ir jâbût datumam pirms :date.',
    'before_or_equal'      => ':attribute ir jâbût datumam pirms vai vienâ laikâ ar :date.',
    'between'              => [
        'numeric' => ':attribute ir jâbût robeþâs starp :min un :max.',
        'file'    => ':attribute ir jâbût robeþâs starp :min un :max kilobaitiem.',
        'string'  => ':attribute ir jâbût robeþâs starp :min un :max rakstzîmçm.',
        'array'   => ':attribute ir jâbût robeþâs starp :min un :max vienumiem.',
    ],
    'boolean'              => ':attribute laukam ir jâbût patiesam vai aplamam.',
    'confirmed'            => ':attribute apstiprinâjums neatbilst.',
    'date'                 => ':attribute nav derîgs datums.',
    'date_format'          => ':attribute neatbilst formâtam :format.',
    'different'            => ':attribute un :other ir jâbût atðíirîgiem.',
    'digits'               => ':attribute ir jâbût :digits cipariem.',
    'digits_between'       => ':attribute ir jâbût robeþâs starp :min un :max cipariem.',
    'dimensions'           => ':attribute ir nederîgi attçla izmçri.',
    'distinct'             => ':attribute laukâ ir dublçta vçrtîba.',
    'email'                => ':attribute ir jâbût derîgai e-pasta adresei.',
    'exists'               => 'Atlasîtais :attribute ir nederîgs.',
    'file'                 => ':attribute ir jâbût failam.',
    'filled'               => ':attribute laukâ jâbût vçrtîbai.',
    'image'                => ':attribute ir jâbût attçlam.',
    'in'                   => 'Atlasîtais :attribute ir nederîgs.',
    'in_array'             => ':attribute lauks neeksistç :other.',
    'integer'              => ':attribute ir jâbût veselam skaitlim.',
    'ip'                   => ':attribute ir jâbût derîgai IP adresei.',
    'ipv4'                 => ':attribute ir jâbût derîgai IPv4 adresei.',
    'ipv6'                 => ':attribute ir jâbût derîgai IPv6 adresei.',
    'json'                 => ':attribute ir jâbût derîgai JSON virknei.',
    'max'                  => [
        'numeric' => ':attribute nedrîkst bût lielâks par :max.',
        'file'    => ':attribute nedrîkst bût lielâks par :max kilobaitiem.',
        'string'  => ':attribute nedrîkst bût lielâks par :max rakstzîmçm.',
        'array'   => ':attribute nedrîkst bût vairâk par :max vienumiem.',
    ],
    'mimes'                => ':attribute ir jâbût ðî tipa failam: :values.',
    'mimetypes'            => ':attribute ir jâbût ðî tipa failam: :values.',
    'min'                  => [
        'numeric' => ':attribute ir jâbût vismaz :min.',
        'file'    => ':attribute ir jâbût vismaz :min kilobaitiem.',
        'string'  => ':attribute jâbût vismaz :min rakstzîmçm.',
        'array'   => ':attribute ir jâbût vismaz :min. vienumiem.',
    ],
    'not_in'               => 'Atlasîtais :attribute ir nederîgs.',
    'not_regex'            => ':attribute formâts ir nederîgs.',
    'numeric'              => ':attribute ir jâbût skaitlim.',
    'present'              => 'Ir jâbût :attribute laukam.',
    'regex'                => ':attribute formâts ir nederîgs.',
    'required'             => 'Nepiecieðams :attribute lauks.',
    'required_if'          => 'Nepiecieðams :attribute lauks, kad :other ir :value.',
    'required_unless'      => 'Nepiecieðams :attribute lauks, ja vien :other ir opcijâ :values.',
    'required_with'        => 'Nepiecieðams :attribute lauks, kad ir :values.',
    'required_with_all'    => 'Nepiecieðams :attribute lauks, kad ir :values.',
    'required_without'     => 'Nepiecieðams :attribute lauks, kad nav :values.',
    'required_without_all' => 'Nepiecieðams :attribute lauks, kad nav nevienas no :values.',
    'same'                 => ':attribute un :other ir jâbût vienâdiem.',
    'size'                 => [
        'numeric' => ':attribute ir jâbût :size.',
        'file'    => ':attribute ir jâbût :size kilobaitiem.',
        'string'  => ':attribute ir jâbût :size rakstzîmçm.',
        'array'   => ':attribute ir jâsatur :size vienumi.',
    ],
    'string'               => ':attribute ir jâbût virknei.',
    'timezone'             => ':attribute ir jâbût derîgai zonai.',
    'unique'               => ':attribute ir jau izmantots.',
    'uploaded'             => ':attribute augðupielâde neizdevâs.',
    'url'                  => ':attribute formâts ir nederîgs.',

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
            'rule-name' => 'pielâgots ziòojums',
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
