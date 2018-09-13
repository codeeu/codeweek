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

    'accepted'             => ':attribute ir jāakceptē.',
    'active_url'           => ':attribute nav derīgs URL.',
    'after'                => ':attribute ir jābūt datumam pēc :date.',
    'after_or_equal'       => ':attribute ir jābūt datumam pēc vai vienā laikā ar :date.',
    'alpha'                => ':attribute var ietvert tikai burtus.',
    'alpha_dash'           => ':attribute var ietvert tikai burtus, ciparus un domuzīmes.',
    'alpha_num'            => ':attribute var ietvert tikai burtus un ciparus.',
    'array'                => ':attribute ir jābūt masīvam.',
    'before'               => ':attribute ir jābūt datumam pirms :date.',
    'before_or_equal'      => ':attribute ir jābūt datumam pirms vai vienā laikā ar :date.',
    'between'              => [
        'numeric' => ':attribute ir jābūt robežās starp :min un :max.',
        'file'    => ':attribute ir jābūt robežās starp :min un :max kilobaitiem.',
        'string'  => ':attribute ir jābūt robežās starp :min un :max rakstzīmēm.',
        'array'   => ':attribute ir jābūt robežās starp :min un :max vienumiem.',
    ],
    'boolean'              => ':attribute laukam ir jābūt patiesam vai aplamam.',
    'confirmed'            => ':attribute apstiprinājums neatbilst.',
    'date'                 => ':attribute nav derīgs datums.',
    'date_format'          => ':attribute neatbilst formātam :format.',
    'different'            => ':attribute un :other ir jābūt atšķirīgiem.',
    'digits'               => ':attribute ir jābūt :digits cipariem.',
    'digits_between'       => ':attribute ir jābūt robežās starp :min un :max cipariem.',
    'dimensions'           => ':attribute ir nederīgi attēla izmēri.',
    'distinct'             => ':attribute laukā ir dublēta vērtība.',
    'email'                => ':attribute ir jābūt derīgai e-pasta adresei.',
    'exists'               => 'Atlasītais :attribute ir nederīgs.',
    'file'                 => ':attribute ir jābūt failam.',
    'filled'               => ':attribute laukā jābūt vērtībai.',
    'image'                => ':attribute ir jābūt attēlam.',
    'in'                   => 'Atlasītais :attribute ir nederīgs.',
    'in_array'             => ':attribute lauks neeksistē :other.',
    'integer'              => ':attribute ir jābūt veselam skaitlim.',
    'ip'                   => ':attribute ir jābūt derīgai IP adresei.',
    'ipv4'                 => ':attribute ir jābūt derīgai IPv4 adresei.',
    'ipv6'                 => ':attribute ir jābūt derīgai IPv6 adresei.',
    'json'                 => ':attribute ir jābūt derīgai JSON virknei.',
    'max'                  => [
        'numeric' => ':attribute nedrīkst būt lielāks par :max.',
        'file'    => ':attribute nedrīkst būt lielāks par :max kilobaitiem.',
        'string'  => ':attribute nedrīkst būt lielāks par :max rakstzīmēm.',
        'array'   => ':attribute nedrīkst būt vairāk par :max vienumiem.',
    ],
    'mimes'                => ':attribute ir jābūt šī tipa failam: :values.',
    'mimetypes'            => ':attribute ir jābūt šī tipa failam: :values.',
    'min'                  => [
        'numeric' => ':attribute ir jābūt vismaz :min.',
        'file'    => ':attribute ir jābūt vismaz :min kilobaitiem.',
        'string'  => ':attribute jābūt vismaz :min rakstzīmēm.',
        'array'   => ':attribute ir jābūt vismaz :min. vienumiem.',
    ],
    'not_in'               => 'Atlasītais :attribute ir nederīgs.',
    'not_regex'            => ':attribute formāts ir nederīgs.',
    'numeric'              => ':attribute ir jābūt skaitlim.',
    'present'              => 'Ir jābūt :attribute laukam.',
    'regex'                => ':attribute formāts ir nederīgs.',
    'required'             => 'Nepieciešams :attribute lauks.',
    'required_if'          => 'Nepieciešams :attribute lauks, kad :other ir :value.',
    'required_unless'      => 'Nepieciešams :attribute lauks, ja vien :other ir opcijā :values.',
    'required_with'        => 'Nepieciešams :attribute lauks, kad ir :values.',
    'required_with_all'    => 'Nepieciešams :attribute lauks, kad ir :values.',
    'required_without'     => 'Nepieciešams :attribute lauks, kad nav :values.',
    'required_without_all' => 'Nepieciešams :attribute lauks, kad nav nevienas no :values.',
    'same'                 => ':attribute un :other ir jābūt vienādiem.',
    'size'                 => [
        'numeric' => ':attribute ir jābūt :size.',
        'file'    => ':attribute ir jābūt :size kilobaitiem.',
        'string'  => ':attribute ir jābūt :size rakstzīmēm.',
        'array'   => ':attribute ir jāsatur :size vienumi.',
    ],
    'string'               => ':attribute ir jābūt virknei.',
    'timezone'             => ':attribute ir jābūt derīgai zonai.',
    'unique'               => ':attribute ir jau izmantots.',
    'uploaded'             => ':attribute augšupielāde neizdevās.',
    'url'                  => ':attribute formāts ir nederīgs.',

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
            'rule-name' => 'pielāgots ziņojums',
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
