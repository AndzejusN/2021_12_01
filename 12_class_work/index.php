<?php

$fileJs = file_get_contents('https://randomuser.me/api/');
$data = json_decode($fileJs, true);

file_put_contents("new.json", json_encode($data['results'][0]));


$data = file_get_contents('new.json');
$data = json_decode($data, true);

$csvFileName = 'new.csv';

$fp = fopen($csvFileName, 'w');

foreach ($data as $row){
    fputcsv($fp, $row);
}

fclose($fp);

