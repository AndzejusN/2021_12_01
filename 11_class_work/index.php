<?php
date_default_timezone_set("Europe/Vilnius");
$time = date('Y-m-d h:i:s');
setcookie('cookietime', $time, time() + (86400 * 30),'/');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class work 11</title>
</head>
<link rel="stylesheet" href="./assets/main.css">
<body>

<form id="userident" action="location.php" method="POST">
    <label for="name"></label>
    <input name="name" type="text" id="name" placeholder="User name:">
    <label for="password"></label>
    <input name="password" type="text" id="password" placeholder="Password:">
    <button type="submit" name="submit">Submit</button>
</form>
<div>
    <span><?php if(isset($_GET['id'])) {
            echo 'Password or user name are not correct';
        }?>  </span>
</div>


</body>
</html>
