<?php

function hasReachedAgeOf(stdClass $person, int $ageOf = 18): bool
{
    return $person->age >= $ageOf;
}

$person1 = new stdClass();
$person1->name = 'Mairis';
$person1->surname = 'Alksnis';
$person1->age = 31;

$person2 = new stdClass();
$person2->name = 'Liene';
$person2->surname = 'Rautmane';
$person2->age = 27;

$person3 = new stdClass();
$person3->name = 'Lauris';
$person3->surname = 'Alksnis';
$person3->age = 29;

$persons = [
    $person1, $person2, $person3
];

$age = (int) readline('Enter your age ');

foreach ($persons as $person)
{
    echo "{$person->name}";

    echo (hasReachedAgeOf($person, $age))
        ? " has reached age of " . $age
        : " has not reached age of " . $age;

    echo PHP_EOL;
}
