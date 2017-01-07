<?php
return [
    'settings' => [
        'displayErrorDetails' => true,
        'logger' => [
            'name' => 'logger',
            'level' => Monolog\Logger::DEBUG,
            'path' => __DIR__ . '/../../logs/blog.log',
            'debug' => true,
        ],
        'db' => [
            'host' => 'localhost',
            'name' => 'Blog',
            'user' => 'homestead',
            'pass' => 'secret',
        ]
    ],
];