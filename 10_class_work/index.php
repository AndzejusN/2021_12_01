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

<header>
    <h3>Registracija į kursus</h3>
    <hr>
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
        <label for="textarea">Pomėgiai ir laisvalaikio užsiėmimai:</label>
        <br>
        <textarea cols="30" rows="10" name="text_area" id="textarea">Biliardas, politika</textarea>
        <br>
        <button type="submit" name="submit">Submit</button>
    </div>
</main>
<footer>
    <div class="output">
        <div class="output-main">
            <img alt="Naujas foto" src="">
        </div>
    </div>
</footer>
<script>

    let output = document.querySelector('.output');
    let image = document.querySelector('.output-main img');
    let lang = document.getElementsByName('lang[]');
    image.hidden = true;

    document.addEventListener('DOMContentLoaded', function() {
        const formBlock = document.getElementById('contact-form');

        const ACTION = formBlock.getAttribute('data-action');
        const METHOD = formBlock.getAttribute('data-method');

        document.querySelector('button').addEventListener('click', async function() {
            let elements = document.querySelectorAll('#contact-form [name]');
            image.hidden = false;

            const formData = new FormData();

            [...elements].map(element => {

                if (element.files){
                    for (let file of element.files) {
                        formData.append(element.name, file);
                }
                }else if(element.name !== 'lang[]'){
                        formData.append(element.name, element.value);
                }
                else if(element.name === 'lang[]'){
                    if (element.checked) {
                        formData.append(element.name, element.value);
                }
                }
            });


            let response = await fetch(ACTION, {
                method: METHOD,
                body: formData
            });

            response = await response.text();

            image.src = `files/new/jpg/${response}.jpg`;
        });
    });

</script>
</body>
</html>