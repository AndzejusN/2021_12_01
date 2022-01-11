<?php

$data = file_get_contents('app/files/check.json');
$data = json_decode($data);

if (file_exists('vendor/autoload.php') == FALSE) {
    exit;
}

$value = $_POST['firstOne'] ?? NULL;

$result = 0;

if ($value == '1') {
    $result += 1;
}


setcookie('result', $result, time() + 3600);

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
<p> Kokios sporto šakos atstovas buvo JAV pagarsėjęs lietuvių kilmės sportininkas Jack Sharkey (lietuviškas jo vardas –
    Juozas Žukauskas)? </p>
<?php

$form = new FormBuilder;

$form->setFile($data);

echo $form->open('index3.php', 'POST');
echo $form->label('1.) Bokso');
echo $form->input('radio', 'secondOne', '1');
echo $form->label('2.) Badmintono');
echo $form->input('radio', 'secondOne', '2');
echo $form->label('3.) Beisbolo');
echo $form->input('radio', 'secondOne', '3');
echo $form->label('4.) Bėgimo su kliūtimis');
echo $form->input('radio', 'secondOne', '4');
echo $form->submit('go');
echo $form->close();
?>

</body>
</html>