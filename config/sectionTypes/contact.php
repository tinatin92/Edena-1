<?php

return [
    'id' => 3,
    'type' => 3,
    'folder' => 'contact',
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'slug' => [
                'type' => 'text',
                'error_msg' => 'slug_is_required',
                'required' => 'required',
            ],
            'address' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],

        ],
        'nonTrans' => [

            'email' => [
                'type' => 'text',
            ],

            'mobile' => [
                'type' => 'text',
            ],

        ],

    ],
];
