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

    'accepted'             => 'O campo :attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute não é um URL válido.',
    'after'                => 'O campo :attribute deve ser uma data posterior de :date.',
    'after_or_equal'       => 'O campo :attribute deve ser uma data posterior ou igual a :date.',
    'alpha'                => 'O campo :attribute pode conter apenas letras.',
    'alpha_dash'           => 'O campo :attribute pode conter apenas letras, números, traços e sublinhados.',
    'alpha_num'            => 'O campo :attribute pode conter apenas letras e números.',
    'array'                => 'O campo :attribute deve ser uma matriz.',
    'before'               => 'O campo :attribute deve ser uma data anterior a :date.',
    'before_or_equal'      => 'O campo :attribute deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O campo :attribute deve estar entre :min e :max.',
        'file'    => 'O campo :attribute deve estar entre :min e :max kilobytes.',
        'string'  => 'O campo :attribute deve estar entre :min e :max caracteres.',
        'array'   => 'O campo :attribute deve possuir entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'O campo :attribute de confirmação não confere.',
    'date'                 => 'O campo :attribute não é uma data valida.',
    'date_format'          => 'O campo :attribute não corresponde ao formato :format.',
    'different'            => 'O campo :attribute e :other devem ser diferentes.',
    'digits'               => 'O campo :attribute deve ser :digits dígitos.',
    'digits_between'       => 'O :attribute must be between :min and :max digits.',
    'dimensions'           => 'O campo :attribute possui dimensões de imagem inválidas.',
    'distinct'             => 'O campo :attribute possui valor duplicado.',
    'email'                => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'exists'               => 'O campo selecionado :attribute é inválido.',
    'file'                 => 'O campo :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute deve possuir um valor.',
    'gt'                   => [
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'file'    => 'O campo :attribute deve ser maior que :value kilobytes.',
        'string'  => 'O campo :attribute deve ser maior que :value caracteres.',
        'array'   => 'O campo :attribute deve possuir mais que :value itens.',
    ],
    'gte'                  => [
        'numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
        'file'    => 'O campo :attribute deve ser maior ou igual a :value kilobytes.',
        'string'  => 'O campo :attribute deve ser maior ou igual a :value caracteres.',
        'array'   => 'O campo :attribute deve ter :value itens ou mais.',
    ],
    'image'                => 'O campo :attribute deve ser uma imagem.',
    'in'                   => 'O campo :attribute selecionado é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O campo :attribute deve ser um inteiro.',
    'ip'                   => 'O campo :attribute deve ser um endereço de IP válido.',
    'ipv4'                 => 'O campo :attribute deve ser um endereço de IPv4 válido.',
    'ipv6'                 => 'O campo :attribute deve ser um endereço de IPv6 válido.',
    'json'                 => 'O campo :attribute deve ser uma string de JSON válida.',
    'lt'                   => [
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'file'    => 'O campo :attribute deve ser menor que :value kilobytes.',
        'string'  => 'O campo :attribute deve ser menor que :value caracteres.',
        'array'   => 'O campo :attribute deve possuir menos que :value itens.',
    ],
    'lte'                  => [
        'numeric' => 'O campo :attribute deve ser menor ou igual :value.',
        'file'    => 'O campo :attribute deve ser menor ou igual :value kilobytes.',
        'string'  => 'O campo :attribute deve ser menor ou igual :value caracteres.',
        'array'   => 'O campo :attribute não deve possuir mais que :value itens.',
    ],
    'max'                  => [
        'numeric' => 'O campo :attribute não deve ser maior que :max.',
        'file'    => 'O campo :attribute não deve ser maior que :max kilobytes.',
        'string'  => 'O campo :attribute não deve ser maior que :max caracteres.',
        'array'   => 'O campo :attribute não deve possuir mais que :max itens.',
    ],
    'mimes'                => 'O campo :attribute deve ser um arquivo do tipo : :values.',
    'mimetypes'            => 'O campo :attribute deve ser um arquivo do tipo : :values.',
    'min'                  => [
        'numeric' => 'O campo :attribute deve ser no mínimo :min.',
        'file'    => 'O campo :attribute deve ser no mínimo :min kilobytes.',
        'string'  => 'O campo :attribute deve ser no mínimo :min caracteres.',
        'array'   => 'O campo :attribute deve possuir no mínimo :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'not_regex'            => 'O formato :attribute é inválido.',
    'numeric'              => 'O campo :attribute deve ser um número.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O formato :attribute é inválido.',
    'required'             => 'O campo :attribute é necessário.',
    'required_if'          => 'O campo :attribute é necessário quando :other é :value.',
    'required_unless'      => 'O campo :attribute é necessário a menos que :other esteja em :values.',
    'required_with'        => 'O campo :attribute é necessário quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é necessário quando :values está presente.',
    'required_without'     => 'O campo :attribute é necessário quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é necessário quando nenhum dos :values estão presentes.',
    'same'                 => 'O campo :attribute e :other devem corresponder.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ser :size.',
        'file'    => 'O campo :attribute deve ser :size kilobytes.',
        'string'  => 'O campo :attribute deve ser :size caracteres.',
        'array'   => 'O campo :attribute deve conter :size itens.',
    ],
    'string'               => 'O campo :attribute deve ser uma string.',
    'timezone'             => 'O campo :attribute deve ser uma zona válida.',
    'unique'               => 'O campo :attribute já está sendo utilizado.',
    'uploaded'             => 'Ocorreu uma falha no upload no campo :attribute.',
    'url'                  => 'O formato do campo :attribute é inválido.',

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
