<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 19.09.18
 * Time: 16:16
 */

$container = $app->getContainer();

$container['http'] = function () {
    return new GuzzleHttp\Client();
};

$container['logger'] = function ($c) {

    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['pathr'], Monolog\Logger::DEBUG));
    return $logger;

};

$container['mysql'] = function ($c) {

    $settings = $c->get('settings')['mysql'];

    $mysqli = new mysqli(
        $settings['host'],
        $settings['user'],
        $settings['passwd'],
        $settings['dbname'],
        $settings['port']
    );

    if ($mysqli->connect_errno) { var_dump($settings);
        throw  new Exception("Не удалось подключиться к MySQL: " . $mysqli->connect_error);

    }
        return $mysqli;


};
