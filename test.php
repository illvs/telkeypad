<?php

require 'trash.php';

$str = '22*2*222';
$str2 = '22#2##2223';

echo "Running tests\n";

var_dump($convert($str) === 'bac');
var_dump($convert($str2) === 'bACD');
