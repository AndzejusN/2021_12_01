<?php


$word = 'Hello';


for ($i = 0; $i < strlen($word); $i++){

    if ($word[$i] === 'l'){
        continue;
    }

    echo $word[$i];
}


