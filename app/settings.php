<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 21.09.18
 * Time: 12:45
 */

return

 [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../log/app.log',
        ],

        // mysql settings
        'mysql' => [
            'host' => getenv('DATABASE_HOST'),
            'user' => getenv('DATABASE_USER'),
            'passwd' => getenv('DATABASE_PASSWORD'),
            'dbname' => getenv('DATABASE_NAME'),
            'port'   => (int) getenv('DATABASE_PORT')

        ],
    ],
];