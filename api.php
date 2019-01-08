<?php
require 'trash.php';

$in = htmlspecialchars($_GET['q']);

if ($in !== '' && preg_match('/^([0-9*#]+)$/', $in)) {
    echo $convert($in);
} else {
    echo 'invalid input';
}
