<?php

require_once 'classes/Tag.php';

$tag = new Tag('div');

$tag->setText('title')->setAttr('style', 'background-color:#8ebf42')->show();
// prints <a href="index.php">title</a>
$tag->setText('text')->setAttr('style', 'background-color:#8ebf42')->get();
// returns <a href="index.php">text</a>

$tag = new Tag('a');

$tag->setText('title')->setAttr('href', 'index.php')->show();
// prints <a href="index.php">title</a>
$tag->setText('text')->setAttr('href', 'index.php')->get();
// returns <a href="index.php">text</a>