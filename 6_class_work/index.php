<?php

$dateTime = [
    'LT'=>['Sekmadienis','Pirmadienis', 'Antradienis', 'Trečiadienis','Ketvirtadienis','Penktadienis','Šeštadienis'],
    'EN'=>['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']
];

$today = date("Y-m-d");
$lang = ['EN','LT'];

$result = date('w', strtotime($today));

if(isset($_POST['submit'])) {
     $today = $_POST['date'];
     $result =  date('w', strtotime($today));
    }

?>

<!DOCTYPE html>
<html lang='lt'>
<head>
    <title>
    </title>
</head>

<body>

<section>
    <form action="index.php" method="POST">
        <label>Please add date to know a week day of it:</label>
        <br>
        <input type="text" name="date" value="<?php echo htmlspecialchars($today); ?>">
            <input type="submit" name="submit" value="submit">
        <div><?php echo $dateTime[$lang[1]][$result]; ?></div>
    </form>
</section>
</body>
</html>