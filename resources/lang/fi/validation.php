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

    'accepted'             => 'Attribuutin :attribute on oltava hyväksyttävä.',
    'active_url'           => ':attribute ei ole kelvollinen URL.',
    'after'                => 'Attribuutin :attribute pitää olla päivän :date jälkeinen päivä.',
    'after_or_equal'       => 'Attribuutin :attribute pitää olla päivän :date tai :date jälkeinen päivä.',
    'alpha'                => ':attribute saa sisältää vain kirjaimia.',
    'alpha_dash'           => ':attribute saa sisältää vain kirjaimia, numeroita ja ajatusviivoja.',
    'alpha_num'            => ':attribute saa sisältää vain kirjaimia ja numeroita.',
    'array'                => 'Attribuutin :attribute on oltava taulukko.',
    'before'               => 'Attribuutin :attribute pitää olla päivää :date edeltävä päivä.',
    'before_or_equal'      => 'Attribuutin :attribute pitää olla päivää :date tai :date edeltävä päivä.',
    'between'              => [
        'numeric' => 'Attribuutin :attribute on oltava välillä :min ja :max.',
        'file'    => 'Attribuutin :attribute on oltava välillä :min ja :max kilotavua.',
        'string'  => 'Attribuutin :attribute on oltava välillä :min ja :max merkkiä.',
        'array'   => 'Attribuutin :attribute on oltava välillä :min ja :max kappaletta.',
    ],
    'boolean'              => 'Kentän :attribute on oltava tosi tai epätosi.',
    'confirmed'            => 'Attribuutin :attribute vahvistus ei täsmää.',
    'date'                 => ':attribute ei ole kelvollinen päivämäärä.',
    'date_format'          => ':attribute ei vastaa formaattia :format.',
    'different'            => 'Attribuutin :attribute ja :other on oltava erilaisia.',
    'digits'               => 'Attribuutin :attribute pitää olla :digits merkkiä.',
    'digits_between'       => 'Attribuutin :attribute pitää olla välillä :min ja :max merkkiä.',
    'dimensions'           => 'Attribuutin :attribute kuvakoko ei ole kelvollinen.',
    'distinct'             => 'Kentässä :attribute on kaksi arvoa.',
    'email'                => 'Attribuutin :attribute pitää olla kelvollinen sähköpostiosoite.',
    'exists'               => 'Valittu :attribute ei ole kelvollinen.',
    'file'                 => 'Attribuutin :attribute pitää olla tiedosto.',
    'filled'               => 'Kentässä :attribute pitää olla arvo.',
    'image'                => 'Attribuutin :attribute pitää olla kuva.',
    'in'                   => 'Valittu :attribute ei ole kelvollinen.',
    'in_array'             => 'Kenttä :attribute ei ole olemassa kohteessa :other.',
    'integer'              => 'Attribuutin :attribute pitää olla kokonaisluku.',
    'ip'                   => 'Attribuutin :attribute pitää olla kelvollinen IP-osoite.',
    'ipv4'                 => 'Attribuutin :attribute pitää olla kelvollinen IPv4-osoite.',
    'ipv6'                 => 'Attribuutin :attribute pitää olla kelvollinen IPv6-osoite.',
    'json'                 => 'Attribuutin :attribute pitää olla kelvollinen JSON-merkkijono.',
    'max'                  => [
        'numeric' => ':attribute ei saa olla suurempi kuin :max.',
        'file'    => ':attribute ei saa olla suurempi kuin :max kilotavua.',
        'string'  => ':attribute ei saa olla suurempi kuin :max merkkiä.',
        'array'   => ':attribute ei saa olla suurempi kuin :max kappaletta.',
    ],
    'mimes'                => 'Attribuutin :attribute pitää olla tiedostotyyppi: :values.',
    'mimetypes'            => 'Attribuutin :attribute pitää olla tiedostotyyppi: :values.',
    'min'                  => [
        'numeric' => 'Attribuutin :attribute pitää olla vähintään :min.',
        'file'    => 'Attribuutissa :attribute pitää olla vähintään :min kilotavua.',
        'string'  => 'Attribuutissa :attribute pitää olla vähintään :min merkkiä.',
        'array'   => 'Attribuutissa :attribute pitää olla vähintään :min kappaletta.',
    ],
    'not_in'               => 'Valittu :attribute ei ole kelvollinen.',
    'not_regex'            => 'Attribuutin :attribute formaatti ei ole kelvollinen.',
    'numeric'              => 'Attribuutin :attribute pitää olla numero.',
    'present'              => 'Kentän :attribute on oltava läsnä.',
    'regex'                => 'Attribuutin :attribute formaatti ei ole kelvollinen.',
    'required'             => 'Kenttä :attribute on pakollinen.',
    'required_if'          => 'Kenttä :attribute on pakollinen, kun :other on :value.',
    'required_unless'      => 'Kenttä :attribute on pakollinen, ellei :other ole :values.',
    'required_with'        => 'Kenttä :attribute on pakollinen, kun :values on läsnä.',
    'required_with_all'    => 'Kenttä :attribute on pakollinen, kun :values on läsnä.',
    'required_without'     => 'Kenttä :attribute on pakollinen, kun :values ei ole läsnä.',
    'required_without_all' => 'Kenttä :attribute on pakollinen, kun yhtään :values ei ole läsnä.',
    'same'                 => 'Attribuuttien :attribute ja :other pitää täsmätä.',
    'size'                 => [
        'numeric' => 'Attribuutin :attribute koon on oltava :size.',
        'file'    => 'Attribuutin :attribute koko on oltava :size kilotavua.',
        'string'  => 'Attribuutin :attribute koko on oltava :size merkkiä.',
        'array'   => 'Attribuutin :attribute pitää sisältää :size kappaletta.',
    ],
    'string'               => 'Attribuutin :attribute pitää olla jono.',
    'timezone'             => 'Attribuutin :attribute pitää olla kelvollinen alue.',
    'unique'               => ':attribute on jo valittu.',
    'uploaded'             => 'Kohteen :attribute lataus epäonnistui.',
    'url'                  => 'Attribuutin :attribute formaatti ei ole kelvollinen.',

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
