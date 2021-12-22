<?php

$fileJs = file_get_contents('https://randomuser.me/api/');
$data = json_decode($fileJs, true);

file_put_contents("new.json", json_encode($data['results'][0]));


$newData = file_get_contents('new.json');
$workData = json_decode($newData, true);

$csvFileName = 'new.csv';

$fp = fopen($csvFileName, 'w');

foreach ($workData as $row){
    fputcsv($fp, $row);
}

fclose($fp);

