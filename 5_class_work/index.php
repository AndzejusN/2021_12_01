<?php
// Sukurti masyvą, kuris aprašytų knygos duomenis: title, author, year, genre
// Sukurti masyvą, kurio elementai būtų masyvai aprašantys knygas. Minimum 3.
// Išvesti visus knygų masyvo elementus su var_dump;
// Išvesti visus knygų masyvo elementus lentele;
// Išvesti visų visų knygų metų vidurkį;


$books = [[
    'title' => 'ŠUNIŠKOS KALĖDOS',
    'author' => 'Greg Kincaid',
    'year'=> 2015,
    'genre' => 'kids book'
]];


$books[] = [
    'title' => 'KAIP VINSTONAS KALĖDAS ATNEŠĖ',
    'author' => 'Alex T. Smith',
    'year'=> 2019,
    'genre' => 'kids book'
];

$books[] = [
    'title' => 'Auksinis kompasas',
    'author' => 'Philip Pullman',
    'year'=> 2020,
    'genre' => 'kids book'
];

var_dump($books);
echo '<br>';

$sum = 0;
$num = 0;

foreach ($books as $book){
    global $sum;
    global $num;
    $num++;
    $sum += $book['year'];
}
echo '<br>';

$mid = $sum / $num;
echo 'Vidutinis knygų metai: ' . $mid;

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div>
    <table>
    <tr>
    <?php foreach ($books as $book){?>
        <td><?php echo $book['title'];?></td>
        <td><?php echo $book['author'];?></td>
        <td><?php echo $book['year'];?></td>
        <td><?php echo $book['genre'];?></td>
   <?php } ?>
    </tr>
    </table>
</div>
</body>
</html>

