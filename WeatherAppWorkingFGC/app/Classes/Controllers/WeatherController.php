<?php

namespace App\Classes\Controllers;

use App\Classes\Helper;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class WeatherController
{

    public function index()
    {
        return file_get_contents(ROOT_PATH . '/views/index.phtml');
    }

}