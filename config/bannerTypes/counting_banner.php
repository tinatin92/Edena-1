<?php

return [
    'id' => 2,
    'type' => 2,
    'name' => 'counting_banner',
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'Counting_numbers' => [
                'type' => 'text',
                'required' => 'required|numeric',
            ],
            'Counting_numbers_symbol' => [
                'type' => 'text',
            ],
            'active' => [
                'type' => 'checkbox',
            ],

        ],

        'nonTrans' => [

            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20',
                'placeholder' => 'sdf',
            ],

        ],

    ],

];
