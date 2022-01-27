<?php

namespace App\Classes;

class Helper
{
    public static function matchCity()
    {
        $city = $_GET['city'];

        if ($city == NULL) {
            $city = 'Vilnius';
        }
        return self::readData($city);
    }

    public static function readData($city)
    {
        return file_get_contents("http://localhost/weather/long-term/{$city}");
    }
}