<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/index.css">
    <title>Class work 10</title>
</head>
<body class="container">
<header class="header">
    <div id="header-block">
        <div class="header1-text">Pilot Training Center</div>
        <div class="header2-text">High future possibilities in</div>
        <div class="header2-text">[ Full Stack Courses ]</div>

    </div>
</header>
<main>
    <div id="contact-form" data-action="add.php" data-method="POST">
        <label for="picture">Įkelkite nuotrauka:</label>
        <input type="file" name="picture" id="picture" accept="image/*">
        <br>
        <br>
        <label for="name">Vardas:</label>
        <input name="name" type="text" id="name" value="Petras">
        <br>
        <label for="surname">Pavardė:</label>
        <input name="surname" type="text" id="surname" value="Cvirka">
        <br>
        <label for="email">Paštas:</label>
        <input name="email" type="email" id="email" value="laiskas@praeitis.lt">
        <br>
        <br>
        <label for="cities">Miestas, kuriame gyvenu:</label>
        <select name="cities" id="cities">
            <option selected disabled>Pasirinkite miestą</option>
            <option value="Vilnius">Vilnius</option>
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
        <label for="textarea">Pomėgiai ir laisvalaikio užsiėmimai:</label>
        <br>
        <textarea cols="30" rows="10" name="text_area" id="textarea" placeholder="Biliardas, politika"></textarea>
        <br>
        <button type="submit" name="submit">Submit</button>
    </div>
</main>
<footer>
    <div class="output">
        <div class="output-main">
            <img class="output-img" alt="Naujas foto" src="">
        </div>
    </div>
</footer>
<script type="text/javascript" src="./assets/main.js"></script>

</body>
</html>