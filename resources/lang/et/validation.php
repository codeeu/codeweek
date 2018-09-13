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

    'accepted'             => ':attribute peab olema aktsepteeritud.',
    'active_url'           => ':attribute ei ole kehtiv URL.',
    'after'                => ':attribute peab olema kuupäev pärast :date.',
    'after_or_equal'       => ':attribute peab olema :date või hilisem kuupäev.',
    'alpha'                => ':attribute tohib sisaldada ainult tähemärke.',
    'alpha_dash'           => ':attribute tohib sisaldada ainult tähemärke, numbreid ja kriipse.',
    'alpha_num'            => ':attribute tohib sisaldada ainult tähemärke ja numbreid.',
    'array'                => ':attribute peab olema massiiv.',
    'before'               => ':attribute peab olema kuupäev enne :date.',
    'before_or_equal'      => ':attribute peab olema kuupäev, mis on hiljemalt :date.',
    'between'              => [
        'numeric' => ':attribute peab olema vahemikus :min–:max.',
        'file'    => ':attribute peab olema vahemikus :min–:max kB.',
        'string'  => ':attribute peab olema vahemikus :min–:max märki.',
        'array'   => ':attribute peab olema vahemikus :min–:max üksust.',
    ],
    'boolean'              => ':attribute väli peab olema õige või väär.',
    'confirmed'            => ':attribute ei vasta kinnitusele.',
    'date'                 => ':attribute ei ole õige kuupäev.',
    'date_format'          => ':attribute ei ole vormingus :format.',
    'different'            => ':attribute ja :other peavad olema erinevad.',
    'digits'               => ':attribute peab olema :digits numbrikohta.',
    'digits_between'       => ':attribute peab olema vahemikus :min–:max numbrikohta.',
    'dimensions'           => ':attribute on valede pildimõõtuega.',
    'distinct'             => ':attribute omab duplikaatväärtust.',
    'email'                => ':attribute peab olema kehtiv e-posti aadress.',
    'exists'               => 'Valitud :attribute on kehtetu.',
    'file'                 => ':attribute peab olema fail.',
    'filled'               => ':attribute peab omama väärtust.',
    'image'                => ':attribute peab olema pilt.',
    'in'                   => 'Valitud :attribute on kehtetu.',
    'in_array'             => 'Välja :attribute ei ole asukohas :other.',
    'integer'              => ':attribute peab olema täisarv.',
    'ip'                   => ':attribute peab olema kehtiv IP-aadress.',
    'ipv4'                 => ':attribute peab olema kehtiv IPv4-aadress.',
    'ipv6'                 => ':attribute peab olema kehtiv IPv6-aadress.',
    'json'                 => ':attribute peab olema kehtiv JSON-string.',
    'max'                  => [
        'numeric' => ':attribute ei tohi olla suurem kui :max.',
        'file'    => ':attribute ei tohi olla suurem kui :max kB.',
        'string'  => ':attribute ei tohi olla pikem kui :max märki.',
        'array'   => ':attribute ei tohi sisaldada rohkem kui :max üksust.',
    ],
    'mimes'                => ':attribute peab olema järgmist tüüpi fail: :values.',
    'mimetypes'            => ':attribute peab olema järgmist tüüpi fail: :values.',
    'min'                  => [
        'numeric' => ':attribute peab olema vähemalt :min.',
        'file'    => ':attribute peab olema vähemalt :min kB.',
        'string'  => ':attribute peab olema vähemalt :min märgi pikkune.',
        'array'   => ':attribute peab sisaldama vähemalt :min üksust.',
    ],
    'not_in'               => 'Valitud :attribute on kehtetu.',
    'not_regex'            => ':attribute on vales vormingus.',
    'numeric'              => ':attribute peab olema arv.',
    'present'              => 'Väli :attribute peab olema olemas.',
    'regex'                => ':attribute on vales vormingus.',
    'required'             => 'Väli :attribute on nõutav.',
    'required_if'          => 'Väli :attribute on nõutav, kui :other on :value.',
    'required_unless'      => 'Väli :attribute on nõutav, v.a juhul kui :other on :value.',
    'required_with'        => 'Väli :attribute on nõutav, kui :values on olemas.',
    'required_with_all'    => 'Väli :attribute on nõutav, kui :values on olemas.',
    'required_without'     => 'Väli :attribute on nõutav, kui :values ei ole olemas.',
    'required_without_all' => 'Väli :attribute on nõutav, kui ühtegi :values väärtust ei ole.',
    'same'                 => 'Väli :attribute ja :other peavad olema samad.',
    'size'                 => [
        'numeric' => ':attribute peab olema :size suurune.',
        'file'    => ':attribute peab olema :size kB.',
        'string'  => ':attribute peab olema :size märgi pikkune.',
        'array'   => ':attribute peab sisaldama :size üksusi.',
    ],
    'string'               => ':attribute peab olema string.',
    'timezone'             => ':attribute peab olema kehtiv tsoon.',
    'unique'               => ':attribute on juba võetud.',
    'uploaded'             => 'Üksuse :attribute üleslaadimine ei õnnestunud.',
    'url'                  => ':attribute on vales vormingus.',

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
            'rule-name' => 'kohandatud-sõnum',
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
