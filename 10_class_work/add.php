<?php

require_once 'all.php';

function ImageResize($image, $w, $h)
{
    $oldw = imagesx($image);
    $oldh = imagesy($image);
    $temp = imagecreatetruecolor($w, $h);
    imagecopyresampled($temp, $image, 0, 0, 0, 0,
        $w, $h, $oldw, $oldh);
    return $temp;
}

$photo = imagecreatefromjpeg($path);
$id = imagecreatefromjpeg('./pictures/id.jpg');

$photo = ImageResize($photo,243,299);

$marge_right = 59;
$marge_bottom = 133;

$sx = imagesx($photo);
$sy = imagesy($photo);

imagecopy($id, $photo, imagesx($id) - $sx - $marge_right, imagesy($id) - $sy - $marge_bottom, 0, 0, imagesx($photo), imagesy($photo));

$textColor = imagecolorallocate($id, 0, 0, 0);

$font_path = './fonts/OpenSans-BoldItalic.ttf';

$idNumber = generateRandomString();

function getRandName($id, $textColor, string $font_path, $name, $surname, $idNumber, $cities, ?string $lang, $textArea): string
{
    imagettftext($id, 25, 0, 310, 270, $textColor, $font_path, $name);
    imagettftext($id, 25, 0, 430, 270, $textColor, $font_path, $surname);
    imagettftext($id, 25, 0, 310, 340, $textColor, $font_path, $idNumber);
    imagettftext($id, 25, 0, 310, 412, $textColor, $font_path, $cities);
    imagettftext($id, 25, 0, 310, 487, $textColor, $font_path, date('Y-m-d'));
    imagettftext($id, 25, 0, 700, 550, $textColor, $font_path, $lang);
    imagettftext($id, 25, 0, 370, 550, $textColor, $font_path, $textArea);

    return generateRandomString();
}

$randName = getRandName($id, $textColor, $font_path, $name, $surname,$idNumber, $cities, $lang, $textArea);
$path = "./files/new/jpg/{$randName}.jpg";
$pdfPath = "./files/new/pdf/{$randName}.pdf";

imagejpeg($id, $path);
imagedestroy($id);

echo $randName;




