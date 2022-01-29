<?php

namespace App\Classes\Controllers;


class WeatherController
{

    public function index()
    {
        return file_get_contents(ROOT_PATH . '/views/index.phtml');
    }

}