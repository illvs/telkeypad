<?php
require 'trash.php';

$in = htmlspecialchars($_GET['q']);

echo $in ? $convert($in) : 'no input received';
