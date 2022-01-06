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
<html>
<head>
    <link href="app/css/index.css" rel="stylesheet">
    <title>Class work</title>
</head>
<body>

<?php

$form = new FormBuilder;

$form->setFile($data);

echo $form->open('index.php', 'POST');
echo $form->label('label_text');
echo $form->input('text', 'Enter value', 'some');
echo $form->input('password', 'Enter password', 'some');
echo $form->password('Enter password');
echo $form->textarea('Enter text');
echo $form->submit('go');
echo $form->close();
?>

</body>
</html>

