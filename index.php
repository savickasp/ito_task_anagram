<?php
include 'Anagram.php';

var_dump(Anagram::check('Elvis','lives'));
var_dump(Anagram::check('Elvis','lifes'));
var_dump(Anagram::check('kas','Sak'));
var_dump(Anagram::check('kas 5#','Sak'));
