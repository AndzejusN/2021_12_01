<?php

if(isset($_COOKIE["cookietime"])){
    echo 'Connection time:'. '<br>' . $_COOKIE["cookietime"] . '<br><br>';
}

$name = $_POST["name"];
$password = $_POST["password"];

$fileJs = file_get_contents('./files/users.json');

$arrData = json_decode($fileJs, true);

$flag = FALSE;
for ($i = 0 ; $i < count($arrData["users"]) ; $i++) {

    if (($arrData["users"][$i]["username"]) == $name && ($arrData["users"][$i]["password"]) == $password) {
        $flag = TRUE;
        $numUser = $i;
    }
}

if($flag == TRUE){
$userName = $arrData["users"]["{$numUser}"]["username"];
$streetNum = $arrData["users"]["{$numUser}"]["location"]["street"]["number"];
$streetName = $arrData["users"]["{$numUser}"]["location"]["street"]["name"];
$city = $arrData["users"]["{$numUser}"]["location"]["city"];
$state = $arrData["users"]["{$numUser}"]["location"]["state"];
$country = $arrData["users"]["{$numUser}"]["location"]["country"];
$postCode = $arrData["users"]["{$numUser}"]["location"]["postcode"];
$latitude = $arrData["users"]["{$numUser}"]["location"]["coordinates"]["latitude"];
$longitude = $arrData["users"]["{$numUser}"]["location"]["coordinates"]["longitude"];


}else{
    header("Location: index.php?id=error");
    exit();
}


//if(isset($_COOKIE["cookietime"])){
//    $arrData["users"][$numUser][] = ["lastlog" => $_COOKIE["cookietime"]];
//}

//$json = json_encode($arrData);

//if (file_put_contents('./files/users.json', $json))
//    echo "JSON file created successfully...";
//else
//    echo Error creating json file...";

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
    </tbody>
</table>
</body>
</html>

