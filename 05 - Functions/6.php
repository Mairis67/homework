<?php

$x = [
    67,
    88,
    55,
    10.67,
    'Mairis'
];

function countElements(array $x): int {
    return count($x);
}

echo countElements($x) . PHP_EOL;

function double(array $x) {
foreach ($x as $key) {
    if((is_numeric($key))) {
        $sum = $key * 2;
//        var_dump($sum);
    }
}
    return $sum;
}

echo double($x) . PHP_EOL;