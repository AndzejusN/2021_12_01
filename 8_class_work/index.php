<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Class work 8</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="container">

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
        <input name="name" type="text" id="name">
        <?php if (isset($_GET['name'])): ?>
        <div class="error"><?php echo $_GET['name']; ?></div>
        <?php endif; ?>
        <br>
        <label for="surname">Pavardė:</label>
        <input name="surname" type="text" id="surname" value="Cvirka">
        <?php if (isset($_GET['surname'])): ?>
        <div class="error"><?php echo $_GET['surname']; ?></div>
        <?php endif; ?>
        <br>
        <label for="email">Paštas:</label>
        <input name="email" type="email" id="email" value="laiskas@praeitis.lt">
        <?php if (isset($_GET['email'])): ?>
        <div class="error"><?php echo $_GET['email']; ?></div>
        <?php endif; ?>        <br>
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