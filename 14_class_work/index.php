<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class work 14</title>
    <link rel="stylesheet" href="assets/main.css">
</head>

<img src="img/cut.png">
<form action="server.php" method="POST" autocomplete="off">
    <input name="name" type="text" id="name" placeholder="URL address:">
    <button type="submit" name="submit">Submit</button>
</form>

<div id="info">
    <span><?php if(isset($_GET['name'])) { ?>
        <a target="_blank" href="<?php echo htmlspecialchars($_GET['name']); ?>"> <?php echo htmlspecialchars($_GET['name']); ?></a>
<?php }
        if (isset($_GET['id'])){
            echo 'No data was set';
            }?>  </span>
</div>
</body>
</html>
