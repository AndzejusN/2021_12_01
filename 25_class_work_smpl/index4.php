<!DOCTYPE html>
<html lang="lt">
<head>
    <link href="app/css/index.css" rel="stylesheet">
    <title>Class work</title>
</head>
<body>

<?php

$data = file_get_contents('app/files/check.json');
$data = json_decode($data);

$value = $_POST['thirdOne'] ?? NULL;

$result = $_COOKIE['result'];

if ($value == '2') {
    $result += 1;
}

echo 'Jūsu rezultatas:' . $result . ' iš 3 galimų balų';

?>
<br>
<a href="index.php">
    <button>Pradėti iš naujo</button>
</a>
</body>
</html>