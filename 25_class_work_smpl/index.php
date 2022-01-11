<?php

$data = file_get_contents('app/files/check.json');
$data = json_decode($data);

if (file_exists('vendor/autoload.php') == FALSE) {
    exit;
}

include_once 'vendor/autoload.php';

use App\classes\FormBuilder;


?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <link href="app/css/index.css" rel="stylesheet">
    <title>Class work</title>
</head>
<body>
<br>
<p> Kaip lietuvių kalba vadinasi filmas, kurio pagrindinis personažas yra keliautojas laiku Martis Makflajus (Marty
    McFly)? </p>
<?php

$form = new FormBuilder;

$form->setFile($data);

echo $form->open('index2.php', 'POST');
echo $form->label('1.) Atgal į ateitį');
echo $form->input('radio', 'firstOne', '1');
echo $form->label('2.) Artima kelionė');
echo $form->input('radio', 'firstOne', '2');
echo $form->label('3.) Ateities vaikai');
echo $form->input('radio', 'firstOne', '3');
echo $form->label('4.) Avataras');
echo $form->input('radio', 'firstOne', '4');
echo $form->submit('go');
echo $form->close();
?>
<br>
</body>
</html>