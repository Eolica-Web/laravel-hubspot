<?php

return [
    'default' => 'main',

    'connections' => [
        'main' => [
            'config' => [
                'key' => '',
                'oauth' => true,
            ],
            'retry_middleware' => [
                'rate_limit' => 'constant:5',
                'internal_errors' => 'exponential:2'
            ],
            'client_options' => [
                'http_errors' => true,
            ],
            'wrap_response' => true,
        ],
    ],
];
