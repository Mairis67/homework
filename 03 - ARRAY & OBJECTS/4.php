<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];
$jane = $items[0][1];
echo $jane['name']. ' '.$jane['surname']. ' '.$jane['age'] . PHP_EOL;