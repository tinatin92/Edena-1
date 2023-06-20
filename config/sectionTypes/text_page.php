<?php

return [
    'id' => 4,
    'type' => 4,
    'folder' => 'text_page',
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
                'max' => '2000',
                'min' => '3',
                'validation' => 'min:3|max:20',
            ],

            'active' => [
                'type' => 'checkbox',
            ],
        ],

        'nonTrans' => [

            'image' => [
                'type' => 'images',

            ],

        ],
    ],
];
