<?php

$dateTime = [
    'LT'=>['Sekmadienis','Pirmadienis', 'Antradienis', 'Trečiadienis','Ketvirtadienis','Penktadienis','Šeštadienis'],
    'EN'=>['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday']
];

$today = date("Y-m-d");

$lang = ['EN','LT'];


function getWeekday($today,$lang) {
    return $data = [$numberDate = date('w', strtotime($today)),$lang];

}


$numberDate = getWeekday($today,$lang[0]);

var_dump($dateTime['LT'][1]);
echo '<br>';
var_dump($dateTime['EN'][3]);
echo '<br>';

var_dump($dateTime[$numberDate[1]][$numberDate[0]]);
