<?php
require 'trash.php';

$in = htmlspecialchars($_GET['q']);

echo $in ? (preg_match('/^([0-9*#]+)$/', $in) ? $convert($in) : 'invalid char received') : 'no input received';
