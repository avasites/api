<?php

return [
    'routerClass' => 'app\\Router',
    'urlManager' => [
        'category' => [
            'class' => 'app\\controllers\\Category',
            'arguments' => [
                'get' => 'int',
                'add' => ''
            ]
        ]
    ]
];