<?php

// Sukurkite dvimatį masyvą. Pirmieji du raktai yra lt ir en.
// Raktai turi savaitės dienų vardų masyvus lietuviškai ir angliškai.
// Naudodamiesi šiuo masyvu, pirmadienį parodykite lietuvių kalba, o trečiadienį - anglų kalba.
// Sukurkite kintamuosius lang (reikšmės lt arba en) ir parodykite dieną

$dateTime = [
    'LT'=>['Pirmadienis', 'Antradienis', 'Trečiadienis','Ketvirtadienis','Penktadienis','Šeštadienis','Sekmadienis'],
    'EN'=>['Monday','Tuesday','Wednesday','Thursday','Friday','Sunday']
];

var_dump($dateTime['LT'][0]);
echo '<br>';
var_dump($dateTime['EN'][2]);

$lang = ['EN','LT'];
echo '<br>';
var_dump($dateTime[$lang[0]][0]);
echo '<br>';
var_dump($dateTime[$lang[1]][0]);
