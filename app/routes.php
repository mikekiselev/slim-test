<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 19.09.18
 * Time: 15:43
 */

        $app->get('/locations/{id}', function ($request, $response, $args) {

            $result = $this->http->get("https://www.metaweather.com/api/location/{$args['id']}")->getBody()->getContents();

            return $response->withStatus(200)->withJson(json_decode($result));
            //write("Получено местоположение {$args['id']}");
        });

        $app->delete('/locations/{id}', function ($request, $response, $args) {

            return $response->withStatus(200)->write("Удалено местоположение {$args['id']}");
        });