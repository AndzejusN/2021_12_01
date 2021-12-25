<?php
$genCode = $_GET['code'];
$url = 'http://localhost/2021_12_01/14_class_work/redirect.php' . '?code=' . $genCode;

$fileJs = file_get_contents('./data/data.json');
$dataArr = json_decode($fileJs, true);

foreach ($dataArr as $keyArr) {
    foreach ($keyArr as $key => $value) {
        if ($value == $url) {
            header("Location: https://" . $key);
            exit;
        }
    }
}