<?php

return [
    'paths' => [
        'lang'   => __DIR__ . '/../lang',
        'views'  => __DIR__ . '/../resources/views',
    ],
    'gateway_url' => '/silo-gateway.php?section=cookies',
    'auth_token'  => 'silo_v1_secure_' . bin2hex(random_bytes(16)), // Unikalny token
    'gui_options' => [
        'consent_modal' => [
            'layout' => 'box',
            'position' => 'bottom left',
            'equal_weight_buttons' => true
        ],
        'preferences_modal' => [
            'layout' => 'box',
            'position' => 'right'
        ]
    ],
    'categories' => [
        'necessary'   => ['enabled' => true, 'readonly' => true],
        'preferences' => ['enabled' => true],
        'statistics'  => ['enabled' => true],
        'marketing'   => ['enabled' => true],
    ]
];
