<?php

$fileJs = file_get_contents('https://randomuser.me/api/');
$data = json_decode($fileJs, true);

$username = $data['results'][0]['login']['username'];
$pass = $data['results'][0]['login']['password'];


$allData = [0 => $username, 1 => $pass];

$allData = http_build_query($allData);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"nginx/2021_12_01/13_class_work/Server/server.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,  $allData);

$response = curl_exec($ch);

curl_close ($ch);

var_dump($response);
