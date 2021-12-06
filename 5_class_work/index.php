<?php

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
    $num++;
    $sum += $book['year'];
}
echo '<br>';

$mid = $sum / $num;
echo 'Vidutinis knygų/metai: ' . $mid;
?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <title></title>
</head>
<body>
<div>
    <table>
    <?php foreach ($books as $book){?>
        <tr>
            <td><?php echo $book['title'];?></td>
            <td><?php echo $book['author'];?></td>
            <td><?php echo $book['year'];?></td>
            <td><?php echo $book['genre'];?></td>
        </tr>
   <?php } ?>
    </table>
</div>
</body>
</html>