<?php

//$textArea = $email = $name = $surname = '';
//$errors = ['name' => '', 'surname' => '','email'=>''];
//
//if(isset($_POST['submit'])) {
//
//    if(empty($_POST['name'])){
//        $errors['name'] = 'Nurodyti vardą yra būtina'. '<br>';
//    } else {
//        $name = $_POST['name'];
//        if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
//            $errors['name'] = 'Vardas gali būti sudarytas iš raidžių bei galimi tarpai';
//        }
//    }
//
//    if(empty($_POST['surname'])){
//        $errors['surname'] = 'Nurodyti pavardę yra būtina'. '<br>';
//    } else {
//        $surname = $_POST['surname'];
//        if(!preg_match('/^[a-zA-Z\s]+$/', $surname)){
//            $errors['surname'] = 'Pavardė gali būti sudarytas iš raidžių bei galimi tarpai';
//        }
//    }
//
//    if(empty($_POST['email'])){
//        $errors['email'] = 'An email is required'. '<br>';
//    } else {
//        $email = $_POST['email'];
//        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//            $errors['email'] = 'Paštas nurodytas klaidingai';
//        }
//    }
//
//    if(array_filter($errors)) {
//        echo 'Klaidos';
//    }else{
//       header('Location:add.php');
//    }
//}


?>


<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Class work 8</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h3>Registracija į kursus</h3>
    <hr>
</header>

<main>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <label for="nuotrauka">Įkelkite nuotrauka:</label>
        <input type="file" name="file" id="nuotrauka">
        <br>
        <br>
        <label for="name">Vardas:</label>
        <input name="name" type="text" id="name" value="Petras">
<!--        <div class="error">--><?php //echo $errors['name']; ?><!--</div>-->
        <br>
        <label for="surname">Pavardė:</label>
        <input name="surname" type="text" id="surname" value="Cvirka">
<!--        <div class="error">--><?php //echo $errors['surname']; ?><!--</div>-->
        <br>
        <label for="email">Paštas:</label>
        <input name="email" type="email" id="email" value="laiskas@praeitis.lt">
<!--        <div class="error">--><?php //echo $errors['email']; ?><!--</div>-->
        <br>
        <br>
        <label for="cities">Miestas, kuriame gyvenu:</label>
        <select name="cities" id="cities">
            <option value="Vilnius" selected>Vilnius</option>
            <option value="Kaunas">Kaunas</option>
            <option value="Klaipėda">Klaipėda</option>
            <option value="Šiauliai">Šiauliai</option>
        </select>

    <h3>Programavimo kalbos kurias moku:</h3>

        <label for="php">PHP</label>
        <input type="checkbox" name="lang[]" value="PHP" id="php" checked>
        <br>
        <label for="cpp">C++</label>
        <input type="checkbox" name="lang[]" value="C++" id="cpp">
        <br>
         <label for="python">Python</label>
         <input type="checkbox" name="lang[]" value="Python" id="python">
        <br>
            <label for="textarea"><h3>Pomėgiai ir laisvalaikio užsiėmimai:</h3></label>
             <textarea cols="30" rows="10" name="text_area" id="textarea">Knygos, savanorystė, biliardas, politika</textarea>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</main>
</body>
</html>