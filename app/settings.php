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
    ],
];