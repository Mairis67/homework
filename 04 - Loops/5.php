<?php

$persons = [
    [
        'name' => 'Mairis',
        'surname' => 'Alksnis',
        'age' => 31,
        'birthday' => '23.february'
    ],
    [
        'name' => 'Liene',
        'surname' => 'Rautmane',
        'age' => 27,
        'birthday' => '08.may'
    ]

];

foreach ($persons as $person) {
    var_dump(array_values($person));
}