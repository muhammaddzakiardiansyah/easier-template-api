<?php

class Response
{

    /**
     * @var $data type array for configurate response data
     * @var $http_code type int for http response code
     */

    public static function json(array $data, int $http_code)
    {
        http_response_code($http_code);
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
