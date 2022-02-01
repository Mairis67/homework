<?php

$person = new stdClass();
$person->name = 'Mairis';
$person->surname = 'Alksnis';
$person->age = 31;

function isAdult(stdClass $person): bool
{
    return $person->age >= 18;
}

echo "{$person->name} {$person->surname}";
echo isAdult($person) ? "is an adult" : "is underage";

// if(isAdult($person)) {
//     echo 'is an adult';
// } else {
//     echo 'is underage';
// }