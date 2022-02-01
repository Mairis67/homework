<?php

$numbers = array_map(function () {
    return rand(1, 100);
}, array_fill(1, 10, null));

$otherNumbers = $numbers;

array_push($numbers, -7);
unset($numbers[10]);

echo 'Array 1:';
echo PHP_EOL;
foreach ($numbers as $key => $number)
{
    echo ($number) . PHP_EOL;
}

echo "Array 2: ";
echo PHP_EOL;
foreach ($otherNumbers as $otherNumber)
{
     echo ($otherNumber) . PHP_EOL;
}






