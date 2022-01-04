<?php

define('UPLOAD_DIR', dirname(__FILE__) . '/files');
define('ALLOWED_EXTENSION', ['jpg', 'jpeg', 'pdf', 'png']);

$textArea = $email = $name = $surname = '';
$errors = ['name' => '', 'surname' => '','email'=>''];
$link = '';

if(empty($_POST['name'])){
   $errors['name'] = 'Nurodyti vardą yra būtina';
} else {
   $name = $_POST['name'];

   if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
       $errors['name'] = 'Vardas gali būti sudarytas iš raidžių bei galimi tarpai';
   }
}

if(empty($_POST['surname'])){
   $errors['surname'] = 'Nurodyti pavardę yra būtina';
} else {
   $surname = $_POST['surname'];

   if(!preg_match('/^[a-zA-Z\s]+$/', $surname)){
       $errors['surname'] = 'Pavardė gali būti sudarytas iš raidžių bei galimi tarpai';
   }
}

if(empty($_POST['email'])){
   $errors['email'] = 'An email is required';
} else {
   $email = $_POST['email'];
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $errors['email'] = 'Paštas nurodytas klaidingai';
   }
}

$errors = array_filter($errors);

if ($errors) {

    header('Location: example.php?' . http_build_query($errors));
    exit;
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$profilePicture = false;

foreach ($_FILES as $key =>  $file) {
    if ($file['error'] == UPLOAD_ERR_OK) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);

        if (!in_array($ext, ALLOWED_EXTENSION)) {
            echo "File not allowed";
            exit;
        }

        $name = generateRandomString(16);

        $path = UPLOAD_DIR . '/' . date('Y/m/d');

        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

        $path = sprintf('%s/%s.%s', $path, $name, $ext);

        move_uploaded_file($file['tmp_name'], $path);

        $profilePicture = str_replace('/home/code-academy/PHP', '', $path);
    }
}


?><!DOCTYPE html>
<html lang='lt'>
<head>
    <title>My information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="container">
    <?php if ($profilePicture): ?>
    <img src="<?php echo $profilePicture; ?>" class="rounded mx-auto d-block mb-3 mt-3">
    <?php endif; ?>
<table class="table table-success table-striped container-md">
    <tbody>
<tr>
    <td>
    <p class="text-end">Vardas:</p>
    </td>
    <td><p class="text-start"><?php echo $_POST['name']; ?></p>
    </td>
</tr>
<tr>
    <td>
        <p class="text-end">Pavarde:</p>
    </td>
    <td><p class="text-start"><?php echo $_POST['surname']; ?></p>
    </td>
</tr>
<tr>
    <td>
        <p class="text-end">Paštas:</p>
    </td>
    <td><p class="text-start"><?php echo $_POST['email']; ?></p>
    </td>
</tr>
<tr>
    <td>
        <p class="text-end">Miestas, kuriame gyvenu:</p>
    </td>
    <td><p class="text-start"><?php echo $_POST['cities']; ?></p>
    </td>
</tr>
<tr>
    <td>
        <p class="text-end">Programavimo kalbos kurias moku:</p>
    </td>
    <td><p class="text-start">
        <?php foreach ($_POST['lang'] as $item):
        echo $item . ' '; ?>
    <?php endforeach; ?>
        </p>
    </td>
</tr>
<tr>
    <td>
        <p class="text-end">Papildoma informacija, pomėgiai:</p>
    </td>
    <td><p class ="text-start"><?php echo $_POST['text_area'] ?>
    </td>
</tr>
    </tbody>
</table>
</body>
</html>
