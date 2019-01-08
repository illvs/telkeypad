<?php

$convert = function ($in) {
    // uses \1 as the backreference to the previous captured char
    $pattern = '/(.)\1*/';

    $map = [
    0 => [' ', ',', 0],
    1 => ['.', '!', '?', 1],
    2 => ['a', 'b', 'c', 2],
    3 => ['d', 'e', 'f', 3],
    4 => ['g', 'h', 'i', 4],
    5 => ['k', 'l', 'm', 5],
    6 => ['n', 'o', 'p', 6],
    7 => ['q', 'r', 's', 7],
    8 => ['t', 'u', 'v', 8],
    9 => ['w', 'x', 'y', 'z', 9],
];
    // * - break
    // # - toggle case

    // unfortunately preg_match_all mutates :(
    $r = preg_match_all($pattern, $in, $s);
    $upper = false;
    
    return implode('', array_filter(array_map(function ($part) use ($map, &$upper) {
        $f = $part[0];

        if ($f === '*') {
            return;
        }
        if ($f === '#') {
            if ((strlen($part) % 2) !== 0) {
                $upper = !$upper;
            }
            return;
        }
    
        $i = (strlen($part) - 1) % count($map[$f]);
        $char = $map[$f][$i];
    
        return $upper ? strtoupper($char) : $char;
    }, $s[0])));
};
