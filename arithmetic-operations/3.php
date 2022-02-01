<?php

$min = 1;
$max = 100;

$numbers = range($min, $max);
$sum = array_sum($numbers);
$average = $sum / count($numbers);

echo "The sum of $min to $max is $sum" . PHP_EOL;
echo "The average is $average" . PHP_EOL;