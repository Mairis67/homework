<?php

$fruits = [
    [
        'name' => 'apple',
        'weight' => 2
    ],
    [
        'name' => 'orange',
        'weight' => 11
    ]
];

$costs = [
    10 => 2,
];

function checkWeight(array $fruits): bool
{
    return $fruits['weight'] >= 10;
}

foreach ($fruits as $fruit)
{
    if(checkWeight($fruit) >= 10)
    {
        echo $fruit['weight'] . " You must pay 2" . PHP_EOL;
    } else {
        echo $fruit['weight'] . " You mus pay 1" . PHP_EOL;
    }
}

