<?php
session_start();

$fileJs = file_get_contents('./files/users.json');

$arrData = json_decode($fileJs, true);

if (!isset($_SESSION['user_id'])) {

    $name = $_POST["name"] ?? NULL;
    $password = $_POST["password"] ?? NULL;

    for ($i = 0 ; $i < count($arrData["users"]) ; $i++) {

        if ($arrData["users"][$i]["username"] == $name && $arrData["users"][$i]["password"] === $password) {
            $_SESSION['last_login_time'] = time();
            $_SESSION['user_id'] = $i;
        }
    }
}

if(isset($_SESSION['user_id'])){


    $userName = $arrData["users"]["{$_SESSION['user_id']}"]["username"];
    $streetNum = $arrData["users"]["{$_SESSION['user_id']}"]["location"]["street"]["number"];
    $streetName = $arrData["users"]["{$_SESSION['user_id']}"]["location"]["street"]["name"];
    $city = $arrData["users"]["{$_SESSION['user_id']}"]["location"]["city"];
    $state = $arrData["users"]["{$_SESSION['user_id']}"]["location"]["state"];
    $country = $arrData["users"]["{$_SESSION['user_id']}"]["location"]["country"];
    $postCode = $arrData["users"]["{$_SESSION['user_id']}"]["location"]["postcode"];
    $latitude = $arrData["users"]["{$_SESSION['user_id']}"]["location"]["coordinates"]["latitude"];
    $longitude = $arrData["users"]["{$_SESSION['user_id']}"]["location"]["coordinates"]["longitude"];

    

}else{
    header("Location: example.php?id=error");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class work 11</title>
</head>
<link rel="stylesheet" href="./assets/location.css">

<body>
<table>
    <tbody>
    <tr>
        <th>User name:</th>
        <th><?php echo $userName;?></th>
    </tr>
    <tr>
        <td>
            Street name:
        </td>
        <td>
          <?php echo $streetName; ?>
        </td>
    </tr>
    <tr>
        <td>
            Street number:
        </td>
        <td>
            <?php echo $streetNum ; ?>
        </td>
    </tr>
    <tr>
        <td>
            City:
        </td>
        <td>
            <?php echo $city; ?>
        </td>
    </tr>
    <tr>
        <td>
            State:
        </td>
        <td>
            <?php echo $state; ?>
        </td>
    </tr>
    <tr>
        <td>
            Country:
        </td>
        <td>
            <?php echo $country; ?>
        </td>
    </tr>
    <tr>
        <td>
            Post code:
        </td>
        <td>
            <?php echo $postCode; ?>
        </td>
    </tr>
    <tr>
        <td>
            Latitude:
        </td>
        <td>
            <?php echo $latitude; ?>
        </td>
    </tr>
    <tr>
        <td>
            Longitude:
        </td>
        <td>
            <?php echo $longitude; ?>
        </td>
    </tr>
    <tr>
        <td>
            last time:
        </td>
        <td>
            <?php echo $_SESSION['last_login_time']; ?>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>