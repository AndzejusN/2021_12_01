<?php
// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('stampimg.png');
$im = imagecreatefrompng('mainimage.png');

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

$imgx = imagesx($im);
$imgy = imagesy($im);
$centerX=round($imgx/2);
$centerY=round($imgy/2);

// Copy the stamp image onto our photo using the margin offsets and the photo
// width to calculate positioning of the stamp.
imagecopy($im, $stamp, $centerX, $centerY, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>