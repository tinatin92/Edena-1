<?php

return [
    'id' => 6,
    'type' => 6,
    'folder' => 'products',
    'paginate' => 10,
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
                'max' => '100',
                'min' => '3',

            ],

            'desc' => [
                'type' => 'textarea',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '1000',
                'min' => '3',

            ],
            'text' => [
                'type' => 'textarea',
            ],

            'active' => [
                'type' => 'checkbox',
            ],
        ],

        'nonTrans' => [

            'category' => [
                'type' => 'category',
            ],

            'images' => [
                'type' => 'images',
            ],

        ],
    ],
];
