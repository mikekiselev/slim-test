<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 19.09.18
 * Time: 12:33
 */
        require 'vendor/autoload.php';


        $settings = require_once 'app/settings.php';

        $app = new Slim\App($settings);

        require_once 'app/container.php';

        require_once 'app/routes.php';

        $app->run();
