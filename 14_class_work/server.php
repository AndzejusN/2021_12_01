<?php
session_start();

$mainUrl = 'http://localhost/2021_12_01/14_class_work/redirect.php?code=';

if(isset($_POST['name'])){

    $rand = random_int(1000, 9999);
    $userAdd = $_POST['name'];

    $data = file_get_contents('./data/data.json');
    $data = json_decode($data, true);

    $newLoc = $mainUrl . $rand;

    $data[] = [$userAdd => $newLoc];

    file_put_contents("./data/data.json", json_encode($data));

    header("Location: index.php?name={$newLoc}");
    exit();
}else{
    header("Location: index.php?id=error");
    exit();
}


