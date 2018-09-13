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

    'accepted'             => ':atribut trebuie acceptat.',
    'active_url'           => ':atribut nu este un URL valid.',
    'after'                => ':atribut trebuie să fie o dată după :data.',
    'after_or_equal'       => ':atribut trebuie să fie o dată după sau egală cu :data.',
    'alpha'                => ':atribut poate conține numai litere.',
    'alpha_dash'           => ':atribut poate conține numai litere, cifre și linii.',
    'alpha_num'            => ':atribut poate conține numai litere și cifre.',
    'array'                => ':atribut trebuie să fie un vector.',
    'before'               => ':atribut trebuie să fie o dată înainte de :data.',
    'before_or_equal'      => ':atribut trebuie să fie o dată înainte sau egală cu :data.',
    'between'              => [
        'numeric' => ':atribut trebuie să fie între :min și :max.',
        'file'    => ':atribut trebuie să aibă între :min și :max kilobaiți.',
        'string'  => ':atribut trebuie să aibă între :min și :max caractere.',
        'array'   => ':atribut trebuie să aibă între :min și :max elemente.',
    ],
    'boolean'              => 'Câmpul :atribut trebuie să fie adevărat sau fals.',
    'confirmed'            => 'Confirmarea :atribut nu corespunde.',
    'date'                 => ':atribut nu este o dată validă.',
    'date_format'          => ':atribut nu corespunde formatului :format.',
    'different'            => ':atribut și :altele trebuie să fie diferite.',
    'digits'               => ':atribut trebuie să aibă :cifre cifre.',
    'digits_between'       => ':atribut trebuie să aibă între :min și :max cifre.',
    'dimensions'           => ':atribut are dimensiuni nevalide pentru imagine.',
    'distinct'             => 'Câmpul :atribut are o valoare dublată.',
    'email'                => ':atribut trebuie să fie o adresă de e-mail validă.',
    'exists'               => ':atribut selectat este nevalid.',
    'file'                 => ':atribut trebuie să fie un fișier.',
    'filled'               => ':atribut trebuie să aibă o valoare.',
    'image'                => ':atribut trebuie să fie o imagine.',
    'in'                   => ':atribut selectat este nevalid.',
    'in_array'             => 'Câmpul :atribut nu există în :altele.',
    'integer'              => ':atribut trebuie să fie un număr întreg.',
    'ip'                   => ':atribut trebuie să fie o adresă IP validă.',
    'ipv4'                 => ':atribut trebuie să fie o adresă IPv4 validă.',
    'ipv6'                 => ':atribut trebuie să fie o adresă IPv6 validă.',
    'json'                 => ':atribut trebuie să fie un șir JSON valid.',
    'max'                  => [
        'numeric' => ':atribut nu trebuie să fie mai mare decât :max.',
        'file'    => ':atribut nu trebuie să fie mai mare decât :max kilobaiți.',
        'string'  => ':atribut nu trebuie să aibă mai mult de :max caractere.',
        'array'   => ':atribut nu trebuie să aibă mai mult de :max elemente.',
    ],
    'mimes'                => ':atribut trebuie să fie un fișier de tipul: :valori.',
    'mimetypes'            => ':atribut trebuie să fie un fișier de tipul: :valori.',
    'min'                  => [
        'numeric' => ':atribut trebuie să fie cel puțin :min.',
        'file'    => ':atribut trebuie să aibă cel puțin :min kilobaiți.',
        'string'  => ':atribut trebuie să aibă cel puțin :min caractere.',
        'array'   => ':atribut trebuie să aibă cel puțin :min elemente.',
    ],
    'not_in'               => ':atribut selectat este nevalid.',
    'not_regex'            => 'Formatul :atribut este nevalid.',
    'numeric'              => ':atribut trebuie să fie un număr.',
    'present'              => 'Câmpul :atribut trebuie să fie prezent.',
    'regex'                => 'Formatul :atribut este nevalid.',
    'required'             => 'Câmpul :atribut este obligatoriu.',
    'required_if'          => 'Câmpul :atribut este obligatoriu dacă :altele este :valoare.',
    'required_unless'      => 'Câmpul :atribut este obligatoriu dacă :altele nu este în :valori.',
    'required_with'        => 'Câmpul :atribut este obligatoriu dacă :valori este prezent.',
    'required_with_all'    => 'Câmpul :atribut este obligatoriu dacă :valori este prezent.',
    'required_without'     => 'Câmpul :atribut este obligatoriu dacă :valori nu este prezent.',
    'required_without_all' => 'Câmpul :atribut este obligatoriu dacă niciuna dintre :valori nu este prezentă.',
    'same'                 => ':atribut și :altele trebuie să coincidă.',
    'size'                 => [
        'numeric' => ':atribut trebuie să aibă :dimensiune.',
        'file'    => ':atribut trebuie să aibă :dimensiune kilobaiți.',
        'string'  => ':atribut trebuie să aibă :dimensiune caractere.',
        'array'   => ':atribut trebuie să conțină :dimensiune elemente.',
    ],
    'string'               => ':atribut trebuie să fie un șir.',
    'timezone'             => ':atribut trebuie să fie o zonă validă.',
    'unique'               => ':atribut a fost deja alocat.',
    'uploaded'             => ':atribut nu s-a încărcat.',
    'url'                  => 'Formatul :atribut este nevalid.',

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
            'rule-name' => 'mesaj personalizat',
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
