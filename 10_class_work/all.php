<?php

define('UPLOAD_DIR', dirname(__FILE__) . '/files');
define('ALLOWED_EXTENSION', ['jpg', 'jpeg', 'pdf', 'png']);

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$path = '';

foreach ($_FILES as $key =>  $file) {
    if ($file['error'] == UPLOAD_ERR_OK) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);

        if (!in_array($ext, ALLOWED_EXTENSION)) {
            echo "File not allowed";
            exit;
        }

        $name = generateRandomString(16);

        $path = UPLOAD_DIR . '/' . date('Y/m/d');

        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

        $path = sprintf('%s/%s.%s', $path, $name, $ext);

        move_uploaded_file($file['tmp_name'], $path);

        $profilePicture = str_replace('/home/code-academy/PHP', '', $path);
    }
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$cities = $_POST['cities'];

if (isset($_POST['lang'])) {
    $lang = implode(", ", $_POST['lang']);
} else {
    $lang = null;
}

$textArea = $_POST['text_area'];
