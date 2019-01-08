<?php

$convert = function ($in) {
    // uses \1 as the backreference to the previous captured char
    $pattern = '/(.)\1*/';

    $map = [
        [' ', ',', 0],
        ['.', '!', '?', 1],
        ['a', 'b', 'c', 2],
        ['d', 'e', 'f', 3],
        ['g', 'h', 'i', 4],
        ['k', 'l', 'm', 5],
        ['n', 'o', 'p', 6],
        ['q', 'r', 's', 7],
        ['t', 'u', 'v', 8],
        ['w', 'x', 'y', 'z', 9],
    ];
    // * - break
    // # - toggle case

    // unfortunately preg_match_all mutates :(
    $r = preg_match_all($pattern, $in, $s);
    $upper = false;
    
    return implode('', array_filter(array_map(function ($part) use ($map, &$upper) {
        $f = $part[0];

        // we simply return and filter this out later
        if ($f === '*') {
            return;
        }
        if ($f === '#') {
            // toggle this correctly since we don't split
            if ((strlen($part) % 2) !== 0) {
                $upper = !$upper;
            }
            return;
        }
    
        // get the index
        $i = (strlen($part) - 1) % count($map[$f]);
        $char = $map[$f][$i];
    
        return $upper ? strtoupper($char) : $char;
    }, $s[0])));
};
