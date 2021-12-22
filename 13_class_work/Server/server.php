<?php


if(isset($_POST)){
$result = 'Name: ' . $_POST[0] . ', ' . 'Password: ' . $_POST[1] . ';';
file_put_contents("./data/{$_POST[0]}.txt", $result);}


