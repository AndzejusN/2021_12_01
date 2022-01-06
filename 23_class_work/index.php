<?php

require_once 'classes/Tag.php';

$tag = new Tag('div');

$tag->setText('title')->setAttr('style', 'background-color:#8ebf42')->show();
// prints <a href="index.html">title</a>
$tag->setText('text')->setAttr('style', 'background-color:#8ebf42')->get();
// returns <a href="index.html">text</a>

$tag = new Tag('a');

$tag->setText('title')->setAttr('href', 'index.html')->show();
// prints <a href="index.html">title</a>
$tag->setText('text')->setAttr('href', 'index.html')->get();
// returns <a href="index.html">text</a>