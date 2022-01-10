<!DOCTYPE html>
<html>
<head>
    <link href="app/css/index.css" rel="stylesheet">
    <title>Class work</title>
</head>
<body>

<?php
$_SESSION["questionNr"] = 3;


$data = file_get_contents('app/files/check.json');
$data = json_decode($data);

if(isset($_COOKIE['uniqId'])) {
    if ($_COOKIE['userState'] == 0){
        header("Location: index.php");
    }elseif($_COOKIE['userState'] == 1){
        header("Location: index2.php");
    }elseif($_COOKIE['userState'] == 2){
        header("Location: index3.php");
    }elseif($_COOKIE['userState'] == 3){
        header("Location: index4.php");
    }
}



$value = $_POST['thirdOne'] ?? NULL;

$result = $_COOKIE['result'];

if ($value == '2') {
    $result += 1;
}

setcookie('result', $result, time() + 3600);
echo 'Jūsu rezultatas:' . $result . ' iš 3 galimų balų';


?>
</body>
</html>