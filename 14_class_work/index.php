<?php
date_default_timezone_set("Europe/Vilnius");
$time = date('Y-m-d h:i:s');
setcookie('cookietime', $time, time() + (86400 * 30),'/');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class work 14</title>
</head>
<link rel="stylesheet" href="./assets/main.css">
<body>

<form action="server.php" method="POST">
    <label for="name"></label>
    <input name="name" type="text" id="name" placeholder="Url name:" value="www.vz.lt">
    <button type="submit" name="submit">Submit</button>
</form>
<div>
    <span><?php if(isset($_GET['name'])) { ?>
        <a href="<?php echo $_GET['name']; ?>"> <?php echo $_GET['name']; ?></a>
<?php }
        if (isset($_GET['id'])){
            echo 'No data was set';
            }?>  </span>
</div>


</body>
</html>
