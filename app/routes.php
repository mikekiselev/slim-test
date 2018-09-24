<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 19.09.18
 * Time: 15:43
 */

        $app->get('/locations/{id}', function ($request, $response, $args) {

            // Получить местоположение из базы данных
            $id = $this->mysql->real_escape_string($args['id']);
            $results = $this->mysql->query("SELECT * FROM locations WHERE id='{$id}'");
            if ($results->num_rows > 0) {
                $result = $results->fetch_assoc()['weather'];
            } else {

                $result = $this->http->get("https://www.metaweather.com/api/location/{$args['id']}")->getBody()->getContents();

                $cleanResult = $this->mysql->real_escape_string($result);
                if (!$this->mysql->query("INSERT into locations (id, weather) VALUES ('{$id}', '{$cleanResult}')")){
                    throw new Exception("Местоположение не может быть обновлено.");
                }
            }
            return $response->withStatus(200)->withJson(json_decode($result));
            //write("Получено местоположение {$args['id']}");
        });

        $app->delete('/locations/{id}', function ($request, $response, $args) {

            return $response->withStatus(200)->write("Удалено местоположение {$args['id']}");
        });