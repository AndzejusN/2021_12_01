<?php

$city = $_GET['city'] ?? NULL;

if ($city == NULL) {
    $city = 'Vilnius';
}
$apiData = file_get_contents("https://api.meteo.lt/v1/places/" . $city . "/forecasts/long-term");
$weatherArr = json_decode($apiData, true);