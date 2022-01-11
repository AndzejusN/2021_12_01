<?php

$data = file_get_contents('app/files/check.json');
$data = json_decode($data);

$value = $_POST['secondOne'] ?? NULL;

$result = $_COOKIE['result'];

if ($value == '1') {
    $result += 1;
}

setcookie('result', $result, time() + 3600);

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
<p> Kokio cheminio elemento pavadinimas kilo iš graikiško žodžio, kuris reiškia „spalva“? </p>
<?php

$form = new FormBuilder;

$form->setFile($data);

echo $form->open('index4.php', 'POST');
echo $form->label('1.) Chloro');
echo $form->input('radio', 'thirdOne', '1');
echo $form->label('2.) Chromo');
echo $form->input('radio', 'thirdOne', '2');
echo $form->label('3.) Cinko');
echo $form->input('radio', 'thirdOne', '3');
echo $form->label('4.) Cezio');
echo $form->input('radio', 'thirdOne', '4');
echo $form->submit('go');
echo $form->close();
?>


</body>
</html>

