<?php
return [
    'settings' => [
        'displayErrorDetails' => false,
        'logger' => [
            'name' => 'logger',
            'level' => Monolog\Logger::DEBUG,
            'path' => __DIR__ . '/../../logs/blog.log',
            'debug' => false,
        ],
        'db' => [
            'host' => '',
            'name' => '',
            'user' => '',
            'pass' => '',
        ]
    ],
];