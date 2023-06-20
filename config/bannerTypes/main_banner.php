<?php

return [
    'id' => 1,
    'type' => 1,
    'name' => 'main_banner',
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'redirect_link' => [
                'type' => 'text',

            ],
            'active' => [
                'type' => 'checkbox',
            ],

        ],

        'nonTrans' => [
            'images' => [
                'type' => 'images',

            ],
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20',
                'placeholder' => 'sdf',
            ],

        ],

    ],

];
